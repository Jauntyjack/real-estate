<?php 

class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index (){
		$username_session = $this->session->userdata('username');
		if(!isset($username_session)){
			redirect('account');
		} else {
			$data['dogenerate'] = $this->input->post('dogenerate');
			if($data['dogenerate'] == "yes"){
				$this->generate_report();	
			} else {
			$data['pos_name'] = 'laporan';
			$data['title'] = 'Laporan';
			$this->load->view('templates/laporan',$data);
		}
		}
	}

	public function generate_report(){
		$data['startdate'] = date("Y-m-d", strtotime($this->input->post('tanggalaw')));
		$data['enddate'] = date("Y-m-d", strtotime($this->input->post('tanggalak')));
		$data['kantor'] = $this->laporan_model->get_laporan_kantor($data);
		$data['marketing'] = $this->laporan_model->get_laporan_marketing($data);
		$data['performa'] = $this->laporan_model->get_laporan_performa($data);
		$data['pos_name'] = 'laporan';
		$data['title'] = 'Laporan';
		$this->load->view('templates/laporan',$data);
	}

	public function export(){
		$data['startdate'] = date("Y-m-d", strtotime($this->input->post('startdate')));
		$data['enddate'] = date("Y-m-d", strtotime($this->input->post('enddate')));
		$tipe_laporan = $this->uri->segment(3, 0);
		if($tipe_laporan=="kantor"){
			$data['laporan'] = $this->laporan_model->get_laporan_kantor($data);
			$data['startdate'] = date("j F Y", strtotime($this->input->post('startdate')));
			$data['enddate'] = date("j F Y", strtotime($this->input->post('enddate')));
			$this->load->view('templates/hasil_laporan',$data);
		} else if ($tipe_laporan=="marketing"){
			$data['laporan'] = $this->laporan_model->get_laporan_marketing($data);
			$data['startdate'] = date("j F Y", strtotime($this->input->post('startdate')));
			$data['enddate'] = date("j F Y", strtotime($this->input->post('enddate')));
			$this->load->view('templates/hasil_laporan2',$data);
		} else {
			$data['laporan'] = $this->laporan_model->get_laporan_performa($data);
			$data['startdate'] = date("j F Y", strtotime($this->input->post('startdate')));
			$data['enddate'] = date("j F Y", strtotime($this->input->post('enddate')));
			$this->load->view('templates/hasil_laporan3',$data);
		}
	}
}
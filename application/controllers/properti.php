<?php 

class Properti extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index (){
		$username_session = $this->session->userdata('username');
		if(!isset($username_session)){
			redirect('account');
		} else {
			$data['dosearch'] = $this->input->post('dosearch');
			if($data['dosearch'] == "yes"){
				$this->search_properti("");	
			} else {
				$data['pemula'] = "";
				$data['alamat'] = "";
				$data['minp'] = 0;
				$data['maxp'] = 50000000000;
				$data['alamat_properti'] = "";
				$data['tipe_properti'] = "";
				$data['jenis_transaksi'] = "";
				$data['luas_tanah_min'] = 0;
				$data['luas_tanah_max'] = 1000;
				$data['luas_bangunan_min'] = 0;
				$data['luas_bangunan_max'] = 1000;
				$data['orientasi'] = "";
				$data['tingkat'] = "";
				$data['kamar_tidur'] = 0;
				$data['kamar_mandi'] = 0;
				$data['status_kepemilikan'] = "";
				$data['sortcol']="penawaran_terakhir";
				$data['sortnav']="asc";
				$data['properti'] = $this->properti_model->get_properti_result($data);
				$data['result_num'] = 1;
				$data['propertifound'] = $this->properti_model->get_properti_result($data);
				$data['pos_name'] = 'properti';
				$data['title'] = 'Cari Properti';
				$this->load->view('templates/search',$data);	
			}
		}
	}

	public function detailproperti(){
		$data['properticode'] = $this->uri->segment(3);
		$data['properti'] = $this->properti_model->get_properti_detail($data);
		$data['pos_name'] = 'properti';
		$data['title'] = 'Detail Properti';
		$this->load->view('templates/detailproperti',$data);	
	}

	public function search_properti($source){

		$this->form_validation->set_rules('luas_tanah_min', 'Luas Tanah', 'numeric')
		->set_rules('luas_tanah_max', 'Luas Tanah Maximal', 'numeric')
		->set_rules('luas_bangunan_min', 'Luas Bangunan Minimal', 'numeric')
		->set_rules('luas_bangunan_max', 'Luas Bangunan Maximal', 'numeric')
		->set_rules('tingkat', 'Tingkat', 'numeric')
		->set_rules('kamar_tidur', 'Kamar Tidur', 'numeric')
		->set_rules('kamar_mandi', 'Kamar Mandi', 'numeric');
		$this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');

		if ($this->form_validation->run() == FALSE){
			$data['pemula'] = "";
			$data['alamat'] = "";
			$data['minp'] = 0;
			$data['maxp'] = 100000;
			$data['alamat_properti'] = "";
			$data['tipe_properti'] = "";
			$data['jenis_transaksi'] = "";
			$data['luas_tanah_min'] = 0;
			$data['luas_tanah_max'] = 1000;
			$data['luas_bangunan_min'] = 0;
			$data['luas_bangunan_max'] = 1000;
			$data['orientasi'] = "";
			$data['tingkat'] = "";
			$data['kamar_tidur'] = 0;
			$data['kamar_mandi'] = 0;
			$data['status_kepemilikan'] = "";
			$data['sortcol']="penawaran_terakhir";
			$data['sortnav']="asc";
			$data['properti'] = $this->properti_model->get_properti_result($data);
			$data['result_num'] = 1;
			$data['propertifound'] = $this->properti_model->get_properti_result($data);
		 	$data['title'] = 'Insert';
		 	$data['pos_name'] = 'properti';
         	if($source=="compare"){
				$data['pal1'] = $this->input->post('pal1');
				$data['pha1'] = $this->input->post('pha1');
				$data['pal2'] = $this->input->post('pal2');
				$data['pha2'] = $this->input->post('pha2');
				$data['pal3'] = $this->input->post('pal3');
				$data['pha3'] = $this->input->post('pha3');
				$data['pids1'] = $this->input->post('pids1');
				$data['pids2'] = $this->input->post('pids2');
				$data['pids3'] = $this->input->post('pids3');
				$this->load->view('templates/compare',$data);	
			} else {
				$this->load->view('templates/search',$data);	
			}
         } else {

         	$data['pemula'] = $this->input->post('pemula');
	        $data['minp'] = $this->input->post('minp')*1000000;
			$data['maxp'] = $this->input->post('maxp')*1000000;
			$data['alamat_properti'] = $this->input->post('alamat_properti');
			$data['tipe_properti'] = $this->input->post('tipe_properti');
			$data['jenis_transaksi'] = $this->input->post('jenis_transaksi');
			$data['luas_tanah_min'] = $this->input->post('luas_tanah_min');
			$data['luas_tanah_max'] = $this->input->post('luas_tanah_max');
			$data['luas_bangunan_min'] = $this->input->post('luas_bangunan_min');
			$data['luas_bangunan_max'] = $this->input->post('luas_bangunan_max');
			$data['orientasi'] = $this->input->post('orientasi');
			$data['tingkat'] = $this->input->post('tingkat');
			$data['kamar_tidur'] = $this->input->post('kamar_tidur');
			$data['kamar_mandi'] = $this->input->post('kamar_mandi');
			$data['status_kepemilikan'] = $this->input->post('status_milik');

			$data['sortby'] = $this->input->post('sortby');
			if($data['sortby']=="priceasc"){
				$data['sortcol']="penawaran_terakhir"; $data['sortnav']="asc";
			} else if ($data['sortby']=="pricedesc"){
				$data['sortcol']="penawaran_terakhir"; $data['sortnav']="desc";
			} else {
				$data['sortcol']="b.tanggal"; $data['sortnav']="desc";
			}

			$data['properti'] = $this->properti_model->get_properti_result($data);
			$data['result_num'] = 1;
			$data['propertifound'] = $this->properti_model->get_properti_result($data);
			$data['title'] = 'Properti';
			$data['pos_name'] = 'properti';

			if($source=="compare"){
				$data['pal1'] = $this->input->post('pal1');
				$data['pha1'] = $this->input->post('pha1');
				$data['pal2'] = $this->input->post('pal2');
				$data['pha2'] = $this->input->post('pha2');
				$data['pal3'] = $this->input->post('pal3');
				$data['pha3'] = $this->input->post('pha3');
				$data['pids1'] = $this->input->post('pids1');
				$data['pids2'] = $this->input->post('pids2');
				$data['pids3'] = $this->input->post('pids3');
				$data['minp'] = $data['minp']/1000000;
				$data['maxp'] = $data['maxp']/1000000;
				$data['pos_name'] = 'compare';
				$data['title'] = 'Komparasi Properti';
				$this->load->view('templates/compare',$data);	
			} else {
				$data['minp'] = $data['minp']/1000000;
				$data['maxp'] = $data['maxp']/1000000;
				$this->load->view('templates/search',$data);	
			}

         }


		
	}
	public function kpr(){
		$data['pos_name'] = 'kpr';
		$data['title'] = 'Simulasi KPR';
		$this->load->view('templates/kpr',$data);	
	}

	public function compare(){
		$data['dosearch'] = $this->input->post('dosearch');
		if($data['dosearch'] == "yes"){
			$this->search_properti("compare");	
		} else {
			$data['pemula'] = "";
			$data['alamat'] = "";
			$data['minp'] = 0;
			$data['maxp'] = 50000000000;
			$data['alamat_properti'] = "";
			$data['tipe_properti'] = "";
			$data['jenis_transaksi'] = "";
			$data['luas_tanah_min'] = 0;
			$data['luas_tanah_max'] = 1000;
			$data['luas_bangunan_min'] = 0;
			$data['luas_bangunan_max'] = 1000;
			$data['orientasi'] = "";
			$data['tingkat'] = "";
			$data['kamar_tidur'] = 0;
			$data['kamar_mandi'] = 0;
			$data['status_kepemilikan'] = "";
			$data['sortcol']="penawaran_terakhir";
			$data['sortnav']="asc";
			$data['properti'] = $this->properti_model->get_properti_result($data);	
			$data['result_num'] = 1;
		    $data['propertifound'] = $this->properti_model->get_properti_result($data);	
			$data['pos_name'] = 'compare';
			$data['title'] = 'Komparasi Properti';
			$data['minp'] = $data['minp']/1000000;
			$data['maxp'] = $data['maxp']/1000000;
			if($this->input->post('doredir') == "yes"){
				$data['pal1'] = $this->input->post('pal1');
				$data['pha1'] = $this->input->post('pha1');
				$data['pids1'] = $this->input->post('pids1');
			}
			$this->load->view('templates/compare',$data);	
		}
	}

	public function comparison(){
		$data['pid1'] = $this->input->post('pid1');
		$data['pid2'] = $this->input->post('pid2');
		$data['pid3'] = $this->input->post('pid3');
		$data['comparison'] = $this->properti_model->get_comparison_table($data);	
		$data['pos_name'] = 'compare';
		$data['title'] = 'Komparasi Properti';
		$this->load->view('templates/comparison',$data);	
	}

}
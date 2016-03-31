<?php 

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index (){
		$username_session = $this->session->userdata('username');
		if(!isset($username_session)){
			redirect('account');
		} else{
			$data['pos_name'] = 'home';
			$data['title'] = 'Beranda';
			$data['properti'] = $this->properti_model->get_recent_properti();
			$data['transaksi'] = $this->transaksi_model->get_recent_transaksi();
			$this->load->view('templates/beranda',$data);
		}
	}
}
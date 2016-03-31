<?php 

class Account extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index (){
		$username_session = $this->session->userdata('username');
		if(isset($username_session)){
			$data['pos_name'] = 'home';
			$data['title'] = 'Beranda';
			$this->load->view('templates/beranda',$data);
		} else {
			$data['dologin'] = $this->input->post('dologin');
			if($data['dologin'] == "yes"){
				$this->dologin();	
			} else {
				$data['title'] = 'Login';
				$this->load->view('templates/login',$data);
			}
		}
	}

	public function register(){
		$data['title'] = 'Register';
		$data['doregister'] = $this->input->post('doregister');
		if($data['doregister'] == "yes"){
			$this->doregister();	
		} else {
			$this->load->view('templates/register',$data);
		}
	}

	public function dologin(){
		$data['userid'] = $this->input->post('userid');
		$data['password'] = $this->input->post('password');
		if ($this->account_model->getlogin($data)>0){
			$this->session->set_userdata('username',$data['userid']);
			$userinfo = $this->account_model->getuserinfo($data);
			$this->session->set_userdata('role',$userinfo[0]->jabatan);
			$this->session->set_userdata('name',$userinfo[0]->nama_marketing);
			$this->session->set_userdata('profilepic',$userinfo[0]->foto_marketing);
			redirect('home/index');
		} else {
			$data['err'] = "Wrong UserID or Password";
			$data['title'] = 'Login';
			$this->load->view('templates/login',$data);
		}
	}

	public function dologout(){
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('account');
	}

	public function _taken($data){
		if($this->account_model->check_userid($data)==1){
			$this->form_validation->set_message('_taken','UserID tidak tersedia.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	private function doregister(){
		$data['nama_marketing'] = $this->input->post('nama_lengkap');
		$data['kode_marketing'] = $this->input->post('user_id');
		$data['password_marketing'] = $this->input->post('password');
		$data['jk_marketing'] = $this->input->post('jk');

		$name = $_FILES['foto']['name'];
		$ext = end((explode(".", $name)));
		$data['foto_marketing'] = $data['kode_marketing'] . "." . $ext;




		$data['no_hp_marketing'] = $this->input->post('nohp');
		$data['email_marketing'] = $this->input->post('email');
		$data['jabatan'] = "marketing";
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('user_id', 'User ID', 'required|min_length[5]|max_length[32]|callback__taken');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]|min_length[5]|max_length[32]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nohp', 'No. HP', 'required|numeric');
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');

		 if ($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Register';
         	$this->load->view('templates/register',$data);
         } else {
         	if($data['foto_marketing']==""){
				$data['foto_marketing']="default.jpg";
			} else {
				$config['upload_path']          =  "../CodeIgniter/assets/images/marketing/";
		        $config['allowed_types']        = 'gif|jpg|png';
		        $config['file_name']            = $data['kode_marketing'];
		        $config['max_size']             = 0;
		        $config['overwrite']            = TRUE;
		        $this->upload->initialize($config);
		        if ( ! $this->upload->do_upload('foto')){        
		            $error = array('error' => $this->upload->display_errors());
		            foreach($error as $e){
		            	echo $e . "<br>";
		            }
		        } else {
		            $complete = array('upload_data' => $this->upload->data());
		        }
			}
	        $this->account_model->register($data);
	        redirect('account');
        }


		

		// $this->account_model->register($data);
		// redirect('account');
	}
}
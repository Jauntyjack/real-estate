<?php 

class Listing extends CI_Controller{


	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index (){
		$username_session = $this->session->userdata('username');
		if(!isset($username_session)){
			redirect('account');
		} else { 
			
			$jabatan = $this->session->userdata('role');
			$userid = $this->session->userdata('username');
			$config['base_url'] = base_url().'listing/page';
			$config['total_rows'] = $this->listing_model->listing_rows($jabatan,$userid);
			$config['per_page'] = 5;
			$config['use_page_numbers'] = TRUE;
			$config['cur_tag_open'] = '<li class="active white-text">';
			$config['cur_tag_close'] = '</li>';

			$config['num_tag_open'] = '<li>';
   			$config['num_tag_close'] = '</li>';
			$config['next_link'] = '<li><i class="material-icons">chevron_right</i></li>';
			$config['prev_link'] = '<li><i class="material-icons">chevron_left</i></li>';

			//inisialisasi config
			$this->pagination->initialize($config);
			$data['paging'] = $this->pagination->create_links();
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) :0;
			$data['listing'] = $this->listing_model->get_listing($config['per_page'],$page,$jabatan,$userid);
			$data['pos_name'] = 'listing';
			$data['title'] = 'Listing';
			$this->load->view('templates/listing',$data);
		}
	}


	public function page ($page_num=1){
		$config['base_url'] = base_url().'listing/page';
		$jabatan = $this->session->userdata('role');
		$userid = $this->session->userdata('username');
		$config['total_rows'] = $this->listing_model->listing_rows($jabatan,$userid);
		$config['per_page'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['cur_tag_open'] = '<li class="active white-text">';
		$config['cur_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
		$config['next_link'] = '<li><i class="material-icons">chevron_right</i></li>';
		$config['prev_link'] = '<li><i class="material-icons">chevron_left</i></li>';

		//inisialisasi config
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		$jabatan = $this->session->userdata('role');
		$userid = $this->session->userdata('username');
		$data['listing'] = $this->listing_model->get_listing($config['per_page'],($page_num-1)*$config['per_page'],$jabatan,$userid);
		$data['pos_name'] = 'listing';
		$data['title'] = 'Listing';
		$this->load->view('templates/listing',$data);
	}

	public function insert(){
		$data['doinsert'] = $this->input->post('doinsert');
		if($data['doinsert'] == "yes"){
			$this->insert_listing();	
		} else {
			$data['pos_name'] = 'listing';
			$data['title'] = 'Insert Listing';
			$this->load->view('templates/insert',$data);
		}
	}


	public function lastcode($ct){
		$result = $this->listing_model->getlastcode($ct);
		$code = $result->$ct['column'];
		$length = strlen($code) - 2;
		$codenum = substr($code, 2, $length);
		$codenum = (int)$codenum+1;
		$code = $ct['prefix'] . "$codenum";
		return $code;
	}


	public function validate_listing(){
		$id = $this->input->post('idlisting');
		$this->form_validation
		//->set_rules('jtrans[]', 'Jenis Transaksi', 'required')
		->set_rules('alamat_properti', 'Alamat Properti', 'required')
		->set_rules('kode_pos', 'Kode Pos', 'required|numeric')
		->set_rules('kelurahan', 'Kelurahan', 'required')
		->set_rules('kecamatan', 'Kecamatan', 'required')
		->set_rules('tipepro', 'Tipe Properti', 'required')
		->set_rules('luas_tanah', 'Luas Tanah', 'required|numeric')
		->set_rules('luas_bangunan', 'Luas Bangunan', 'required|numeric')
		->set_rules('orientasi', 'Orientasi', 'required')
		->set_rules('tingkat', 'Tingkat', 'required|numeric')
		->set_rules('kamar_tidur', 'Kamar Tidur', 'required|numeric')
		->set_rules('kamar_mandi', 'Kamar Mandi', 'required|numeric')
		// ->set_rules('listrik', 'Listrik', 'required|numeric')
		// ->set_rules('telepon', 'Telepon', 'required|numeric')
		// ->set_rules('ac', 'AC', 'required|numeric')
		// ->set_rules('air', 'Air', 'required')
		->set_rules('nama_penjual', 'Nama Penjual', 'required')
		->set_rules('alamat_penjual', 'Alamat Penjual', 'required')
		->set_rules('email_penjual', 'Email Penjual', 'required|valid_email')
		->set_rules('notelp', 'No. Telepon', 'required|numeric')
		->set_rules('no_hp', 'No. HP', 'required|numeric')
		->set_rules('nama_disertif', 'Nama Disertifikat', 'required')
		->set_rules('hub_disertif', 'Hub. Disertifikat', 'required')
		->set_rules('waktu_kosong', 'Waktu Pengosongan', 'required')
		->set_rules('harga_permintaan', 'Harga Permintaan', 'required|numeric')
		->set_rules('hargamin', 'Harga Minimal', 'required|numeric')
		->set_rules('tawar_akhir', 'Harga Penawaran', 'required|numeric')
		->set_rules('tanggal', 'Tanggal Perjanjian', 'required')
		->set_rules('namawakil', 'Nama Perwakilan', 'required')
		->set_rules('kodemar', 'UserID Marketing', 'required')
		->set_rules('namamanager', 'Nama Manager', 'required');

		//$this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() == FALSE){


			$data['listing'] = $this->listing_model->get_selected_listing($id);

		 	$data['title'] = 'Listing';
		 	$data['pos_name'] = 'listing';
		 	$data['err'] = validation_errors();
         	//$this->load->view('templates/modallisting',$data);
         	echo validation_errors();
         } 
     }



	public function insert_listing(){
		$this->form_validation->set_rules('jtrans[]', 'Jenis Transaksi', 'required')
		->set_rules('alamat_properti', 'Alamat Properti', 'required')
		//->set_rules('kode_pos', 'Kode Pos', 'required|numeric')
		->set_rules('kelurahan', 'Kelurahan', 'required')
		->set_rules('kecamatan', 'Kecamatan', 'required')
		->set_rules('tipepro', 'Tipe Properti', 'required')
		->set_rules('luas_tanah', 'Luas Tanah', 'required|numeric')
		->set_rules('luas_bangunan', 'Luas Bangunan', 'required|numeric')
		->set_rules('orientasi', 'Orientasi', 'required')
		->set_rules('tingkat', 'Tingkat', 'required|numeric')
		->set_rules('kamar_tidur', 'Kamar Tidur', 'required|numeric')
		->set_rules('kamar_mandi', 'Kamar Mandi', 'required|numeric')
		// ->set_rules('listrik', 'Listrik', 'required|numeric')
		// ->set_rules('telepon', 'Telepon', 'required|numeric')
		// ->set_rules('ac', 'AC', 'required|numeric')
		// ->set_rules('air', 'Air', 'required')
		->set_rules('nama_penjual', 'Nama Penjual', 'required')
		->set_rules('alamat_penjual', 'Alamat Penjual', 'required')
		->set_rules('notelp', 'No. Telepon', 'required|numeric')
		->set_rules('no_hp', 'No. HP', 'required|numeric')
		->set_rules('nama_disertif', 'Nama Disertifikat', 'required')
		->set_rules('hub_disertif', 'Hub. Disertifikat', 'required')
		->set_rules('waktu_kosong', 'Waktu Pengosongan', 'required')
		->set_rules('harga_permintaan', 'Harga Permintaan', 'required|numeric')
		->set_rules('hargamin', 'Harga Minimal', 'required|numeric')
		->set_rules('tawar_akhir', 'Harga Penawaran', 'required|numeric')
		->set_rules('tanggal', 'Tanggal Perjanjian', 'required')
		->set_rules('namawakil', 'Nama Perwakilan', 'required')
		->set_rules('kodemarketing', 'UserID Marketing', 'required')
		->set_rules('namamanager', 'Nama Manager', 'required');

		$this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');

		if ($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Insert';
		 	$data['pos_name'] = 'listing';
         	$this->load->view('templates/insert',$data);
         } else {
	        // autonumber  PR1, PR2, PR3, dst
			$ct1['column'] = "kode_properti";
			$ct1['table'] = "properti";
			$ct1['prefix'] = "PR";

			$data['kode_properti'] = $this->lastcode($ct1);
			$data['alamat_properti'] = $this->input->post('alamat_properti');
			$data['kode_pos'] = $this->input->post('kode_pos');
			$data['kelurahan'] = $this->input->post('kelurahan');
			$data['kecamatan'] = $this->input->post('kecamatan');
			$data['tipe_properti'] = $this->input->post('tipepro');
			$data['luas_tanah'] = $this->input->post('luas_tanah');
			$data['luas_bangunan'] = $this->input->post('luas_bangunan');
			$data['orientasi'] = $this->input->post('orientasi');
			$data['tingkat'] = $this->input->post('tingkat');
			$data['kamar_tidur'] = $this->input->post('kamar_tidur');
			$data['kamar_mandi'] = $this->input->post('kamar_mandi');
			$data['ruangan_lain'] = $this->input->post('rlain');
			$data['listrik'] = $this->input->post('listrik');
			$data['telepon'] = $this->input->post('telepon');
			$data['ac'] = $this->input->post('ac');
			$data['air'] = $this->input->post('air');
			$data['fasilitas_lain'] = $this->input->post('flain');
			$data['status_kepemilikan'] = $this->input->post('status_milik');

			$ct2['column'] = "kode_penjual";
			$ct2['table'] = "penjual";
			$ct2['prefix'] = "JL";

			$jual['kode_penjual'] = $this->lastcode($ct2);
			$jual['nama_penjual'] = $this->input->post('nama_penjual');
			$jual['alamat_penjual'] = $this->input->post('alamat_penjual');
			$jual['email_penjual'] = $this->input->post('email_penjual');
			$jual['status_kawin_penjual'] = $this->input->post('status_perkawinan');
			$jual['no_telepon_penjual'] = $this->input->post('notelp');
			$jual['no_hp_penjual'] = $this->input->post('no_hp');

			$ct3['column'] = "kode_pemasaran";
			$ct3['table'] = "pemasaran";
			$ct3['prefix'] = "PS";

			$pasar['kode_pemasaran'] = $this->lastcode($ct3);
			$pasar['nama_disertifikat'] = $this->input->post('nama_disertif');
			$pasar['hub_penjual'] = $this->input->post('hub_disertif');
			$pasar['waktu_pengosongan'] = date("Y-m-d", strtotime($this->input->post('waktu_kosong')));


			$pasar['harga_permintaan'] = $this->input->post('harga_permintaan');
			$pasar['harga_minimal'] = $this->input->post('hargamin');
			$pasar['penawaran_terakhir'] = $this->input->post('tawar_akhir');

			$ct4['column'] = "kode_listing";
			$ct4['table'] = "listing";
			$ct4['prefix'] = "LS";
			$trans['kode_listing'] = $this->lastcode($ct4);
			if (count($this->input->post('jtrans[]'))>1) {
			    $trans['jenis_transaksi'] = implode("/", $this->input->post('jtrans[]'));
			} else {
				$trans['jenis_transaksi'] = $this->input->post('jtrans[0]');
			}
			
			$trans['kode_properti'] = $data['kode_properti'];
			$trans['kode_penjual'] = $jual['kode_penjual'];
			$trans['kode_pemasaran'] = $pasar['kode_pemasaran'];
			$trans['nama_perwakilan'] = $this->input->post('namawakil');
			$trans['tanggal'] = date("Y-m-d", strtotime($this->input->post('tanggal')));
			$trans['kode_marketing'] = $this->input->post('kodemarketing');
			$trans['nama_manager'] = $this->input->post('namamanager');

			if($this->input->post('picname[]')!=""){
				$files = $_FILES;
				$count = count($files['gambar']['name']);
				$image_path = "../CodeIgniter/assets/images/properti/{$data['kode_properti']}";
				if(!file_exists($image_path)){
					mkdir($image_path);	
				}
				for($i=0;$i<$count;$i++){
					$_FILES['gambar']['name'] = $files['gambar']['name'][$i];
					$_FILES['gambar']['type'] = $files['gambar']['type'][$i];
					$_FILES['gambar']['tmp_name'] = $files['gambar']['tmp_name'][$i];
					$_FILES['gambar']['size'] = $files['gambar']['size'][$i];
					$_FILES['gambar']['error'] = $files['gambar']['error'][$i];
					$config['upload_path']          =  $image_path;
		            $config['allowed_types']        = 'gif|jpg|png';
		            $config['max_size']             = 0;
		            $config['overwrite']            = TRUE;
		            $this->upload->initialize($config);
		            if ( ! $this->upload->do_upload('gambar')){	        
		                // $error = array('error' => $this->upload->display_errors());
		                // foreach($error as $e){
		                // 	echo $e . "<br>";
		                // }
		            	$this->delete_directory($image_path);
			            $err['title'] = 'Insert';
					 	$err['pos_name'] = 'listing';
					 	$err['invalidfile'] = 'yes';
			         	$this->load->view('templates/insert',$err);
		            } else {
		                $upload = array('upload_data' => $this->upload->data());
						//echo var_dump($data);
		            }
				}
					$data['gambar'] = implode("/",$files['gambar']['name']);
			} else {
				$data['gambar'] = "";
			}
			
			$this->listing_model->insert_listing($trans);
			$this->properti_model->insert_properti($data);
			$this->listing_model->insert_penjual($jual);
			$this->listing_model->insert_pemasaran($pasar);
			redirect('listing');
         }

		
	}


	public function update_listing(){

		$this->form_validation->set_rules('jtrans[]', 'Jenis Transaksi', 'required')
		->set_rules('alamat_properti', 'Alamat Properti', 'required')
		->set_rules('kode_pos', 'Kode Pos', 'required|numeric')
		->set_rules('kelurahan', 'Kelurahan', 'required')
		->set_rules('kecamatan', 'Kecamatan', 'required')
		->set_rules('tpp', 'Tipe Properti', 'required')
		->set_rules('luas_tanah', 'Luas Tanah', 'required|numeric')
		->set_rules('luas_bangunan', 'Luas Bangunan', 'required|numeric')
		->set_rules('orientasi', 'Orientasi', 'required')
		->set_rules('tingkat', 'Tingkat', 'required|numeric')
		->set_rules('kamar_tidur', 'Kamar Tidur', 'required|numeric')
		->set_rules('kamar_mandi', 'Kamar Mandi', 'required|numeric')
		->set_rules('listrik', 'Listrik', 'required|numeric')
		->set_rules('telepon', 'Telepon', 'required|numeric')
		->set_rules('ac', 'AC', 'required|numeric')
		->set_rules('air', 'Air', 'required')
		->set_rules('nama_penjual', 'Nama Penjual', 'required')
		->set_rules('alamat_penjual', 'Alamat Penjual', 'required')
		->set_rules('email_penjual', 'Email Penjual', 'required|valid_email')
		->set_rules('notelp', 'No. Telepon', 'required|numeric')
		->set_rules('no_hp', 'No. HP', 'required|numeric')
		->set_rules('nama_disertif', 'Nama Disertifikat', 'required')
		->set_rules('hub_disertif', 'Hub. Disertifikat', 'required')
		->set_rules('waktu_kosong', 'Waktu Pengosongan', 'required')
		->set_rules('harga_permintaan', 'Harga Permintaan', 'required|numeric')
		->set_rules('hargamin', 'Harga Minimal', 'required|numeric')
		->set_rules('tawar_akhir', 'Harga Penawaran', 'required|numeric')
		->set_rules('tanggal', 'Tanggal Perjanjian', 'required')
		->set_rules('namawakil', 'Nama Perwakilan', 'required')
		->set_rules('kodemar', 'UserID Marketing', 'required')
		->set_rules('namamanager', 'Nama Manager', 'required');

		$this->form_validation->set_error_delimiters('<div class="red-text">', '</div>');

		if ($this->form_validation->run() == FALSE){

		 	$data['title'] = 'Listing';
		 	$data['pos_name'] = 'listing';
		 	//$data['err'] = validation_errors();
         	//$this->load->view('templates/listing',$data);
         	echo validation_errors();
         } else {
	        $properti['alamat_properti'] = $this->input->post('alamat_properti');
			$properti['kode_pos'] = $this->input->post('kode_pos');
			$properti['kelurahan'] = $this->input->post('kelurahan');
			$properti['kecamatan'] = $this->input->post('kecamatan');
			$properti['tipe_properti'] = $this->input->post('tpp');
			$properti['luas_tanah'] = $this->input->post('luas_tanah');
			$properti['luas_bangunan'] = $this->input->post('luas_bangunan');
			$properti['orientasi'] = $this->input->post('orientasi');
			$properti['tingkat'] = $this->input->post('tingkat');
			$properti['kamar_tidur'] = $this->input->post('kamar_tidur');
			$properti['kamar_mandi'] = $this->input->post('kamar_mandi');
			$properti['ruangan_lain'] = $this->input->post('rlain');
			$properti['listrik'] = $this->input->post('listrik');
			$properti['telepon'] = $this->input->post('telepon');
			$properti['ac'] = $this->input->post('ac');
			$properti['air'] = $this->input->post('air');
			$properti['fasilitas_lain'] = $this->input->post('flain');
			$properti['status_kepemilikan'] = $this->input->post('status_milik');
			if(!empty($_FILES['gambar']['name'][0])){
				// $this->upload_image('ktp_penjual', 'fotoktpjual',$properti['kode_data_jual']);
				// $properti['ktp_penjual'] = $this->image_name;
				$files = $_FILES;
				$count = count($files['gambar']['name']);
				$image_path = "../CodeIgniter/assets/images/properti/{$this->input->post('kode_properti')}";
				if(!file_exists($image_path)){
					mkdir($image_path);	
				}
				for($i=0;$i<$count;$i++){
					$_FILES['gambar']['name'] = $files['gambar']['name'][$i];
					$_FILES['gambar']['type'] = $files['gambar']['type'][$i];
					$_FILES['gambar']['tmp_name'] = $files['gambar']['tmp_name'][$i];
					$_FILES['gambar']['size'] = $files['gambar']['size'][$i];
					$_FILES['gambar']['error'] = $files['gambar']['error'][$i];
					$config['upload_path']          =  $image_path;
		            $config['allowed_types']        = 'gif|jpg|png';
		            $config['max_size']             = 0;
		            $config['overwrite']            = TRUE;
		            $this->upload->initialize($config);
		            if ( ! $this->upload->do_upload('gambar')){	        
		            	$this->delete_directory($image_path);
			            $err['title'] = 'Listing';
					 	$err['pos_name'] = 'listing';
					 	$error = array('error' => $this->upload->display_errors());
		                foreach($error as $e){
		                	echo $e . "<br>";
		                }
			         	//$this->load->view('templates/listing',$err);
		            } else {
		                $upload = array('upload_data' => $this->upload->data());
		            }
				}
				$properti['gambar'] = implode("/",$files['gambar']['name']);
			}

			$jual['nama_penjual'] = $this->input->post('nama_penjual');
			$jual['alamat_penjual'] = $this->input->post('alamat_penjual');
			$jual['email_penjual'] = $this->input->post('email_penjual');
			$jual['status_kawin_penjual'] = $this->input->post('status_perkawinan');
			$jual['no_telepon_penjual'] = $this->input->post('notelp');
			$jual['no_hp_penjual'] = $this->input->post('no_hp');

			$pasar['nama_disertifikat'] = $this->input->post('nama_disertif');
			$pasar['hub_penjual'] = $this->input->post('hub_disertif');
			$pasar['waktu_pengosongan'] = date("Y-m-d", strtotime($this->input->post('waktu_kosong')));
			$pasar['harga_permintaan'] = $this->input->post('harga_permintaan');
			$pasar['harga_minimal'] = $this->input->post('hargamin');
			$pasar['penawaran_terakhir'] = $this->input->post('tawar_akhir');

			$trans['jenis_transaksi'] = implode("/", $this->input->post('jtrans[]'));
			$trans['nama_perwakilan'] = $this->input->post('namawakil');
			$trans['tanggal'] = date("Y-m-d", strtotime($this->input->post('tanggal')));
			$trans['kode_marketing'] = $this->input->post('kodemar');
			$trans['nama_manager'] = $this->input->post('namamanager');

			$this->properti_model->update_properti($properti,$this->input->post('kode_properti'));
			$this->listing_model->update_penjual($jual,$this->input->post('kode_penjual'));
			$this->listing_model->update_pemasaran($pasar,$this->input->post('kode_pemasaran'));
			$this->listing_model->update_listing($trans,$this->input->post('kode_listing'));
			redirect('listing');
         } 

		
	}

	public function delete_listing($id){
		$this->listing_model->delete_listing($id);
		redirect('home/index');
	}

	public function selectedlisting($id){
		$data['listing'] = $this->listing_model->get_selected_listing($id);
		$this->load->view('templates/selected_listing',$data);
	}

	private function delete_directory($dir) {
	    if (!file_exists($dir)) {
	        return true;
	    }
	    if (!is_dir($dir)) {
	        return unlink($dir);
	    }
	    foreach (scandir($dir) as $item) {
	        if ($item == '.' || $item == '..') {
	            continue;
	        }
	        if (!$this->delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
	            return false;
	        }
	    }
	    return rmdir($dir);
	}
}
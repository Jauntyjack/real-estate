<?php 
class Transaksi extends CI_Controller{

	private $image_name = "";

	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index (){
		$username_session = $this->session->userdata('username');
		if(!isset($username_session)){
			redirect('account');
		} else{ 
			$data['dopurchase'] = $this->input->post('dopurchase');
			$data['doupdate'] = $this->input->post('doupdate');
			if($data['dopurchase'] == "yes"){
				$this->purchase();	
			} else if($data['doupdate'] == "yes") {
				$this->update_transaksi();
			} else {
				$jabatan = $this->session->userdata('role');
				$userid = $this->session->userdata('username');
				$data['transaksi'] = $this->transaksi_model->get_transaksi($jabatan,$userid);
				$data['pos_name'] = 'transaksi';
				$data['title'] = 'Transaksi';
				$this->load->view('templates/transaksi',$data);
			}
		}
	}

	public function lastcode($ct){
		$result = $this->transaksi_model->getlastcode($ct);
		if($result=="empty"){
			$code =  $ct['prefix'] . "0";
		} else {
			$code = $result->$ct['column'];
		}
		$codenum = substr($code, 2, 1);
		$codenum = (int)$codenum+1;
		$code = $ct['prefix'] . "$codenum";
		return $code;
	}

	public function validate_transaksi($id){
		if($id==1){
			$this->form_validation
			->set_rules('harga', 'Harga', 'required|numeric')
			->set_rules('nama_pembeli', 'Nama Pembeli', 'required')
			->set_rules('alamat_pembeli', 'Alamat Pembeli', 'required')
			->set_rules('email_pembeli', 'Email Pembeli', 'required|valid_email')
			->set_rules('no_telepon_pelanggan', 'No Telepon', 'required|numeric')
			->set_rules('no_hp_pelanggan', 'No. HP', 'required|numeric')
			->set_rules('lama_sewa', 'Lama Sewa', 'required|numeric');
		} else {
			$this->form_validation
			->set_rules('harga', 'Harga', 'required|numeric')
			->set_rules('nama_pelanggan', 'Nama', 'required')
			->set_rules('alamat_pelanggan', 'Alamat', 'required');
		}
		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == FALSE){
		 	$data['err'] = validation_errors();
         	echo validation_errors();
         } 
     }

	public function purchase(){
		$ct1['column'] = "kode_pelanggan";
		$ct1['table'] = "pelanggan";
		$ct1['prefix'] = "LG";
		$lg['kode_pelanggan'] = $this->lastcode($ct1);
		$lg['nama_pelanggan'] = $this->input->post('nama_pelanggan');
		$lg['alamat_pelanggan'] = $this->input->post('alamat_pelanggan');
		$lg['email_pelanggan'] = $this->input->post('email_pelanggan');
		$lg['status_kawin_pelanggan'] = $this->input->post('status_perkawinan');
		$lg['no_telepon_pelanggan'] = $this->input->post('notelp');
		$lg['no_hp_pelanggan'] = $this->input->post('no_hp');

		$ct2['column'] = "kode_transaksi";
		$ct2['table'] = "transaksi";
		$ct2['prefix'] = "TR";
		$tr['kode_transaksi'] = $this->lastcode($ct2);

		$tr['kode_pelanggan'] = $lg['kode_pelanggan'];
		$tr['kode_listing'] = $this->input->post('kode_listing');
		$tr['jenis_transaksi_akhir'] = $this->input->post('jenis_transaksi_akhir');
		$tr['harga'] = $this->input->post('harga');
		$tr['tgl_transaksi'] = date("Y-m-d");
		$tr['kode_marketing_trans'] = $this->input->post('userid');
		$tr['status'] = "Nego";

		if($tr['jenis_transaksi_akhir']=="Jual"){
			$dj['kpr'] = $this->input->post('kpr');
			$ct3['column'] = "kode_data_jual";
			$ct3['table'] = "data_jual";
			$ct3['prefix'] = "DJ";
			$tr['kode_data_jual'] = $this->lastcode($ct3);
			$dj['kode_data_jual'] = $tr['kode_data_jual'];
			$this->transaksi_model->insert_data_jual($dj);

		} else if ($tr['jenis_transaksi_akhir']=="Sewa"){
			$ds['lama_sewa'] = $this->input->post('lama_sewa');
			$ct3['column'] = "kode_data_sewa";
			$ct3['table'] = "data_sewa";
			$ct3['prefix'] = "DS";
			$tr['kode_data_sewa'] = $this->lastcode($ct3);
			$ds['kode_data_sewa'] = $tr['kode_data_sewa'];
			$this->transaksi_model->insert_data_sewa($ds);
		} else {}
		$this->transaksi_model->insert_pelanggan($lg);
		$this->transaksi_model->insert_transaksi($tr);
		redirect('transaksi');
	}

	public function update_transaksi(){
		$lg['nama_pelanggan'] = $this->input->post('nama_pelanggan');
		$lg['alamat_pelanggan'] = $this->input->post('alamat_pelanggan');
		$lg['email_pelanggan'] = $this->input->post('email_pelanggan');
		$lg['status_kawin_pelanggan'] = $this->input->post('status_kawin_pelanggan');
		$lg['no_telepon_pelanggan'] = $this->input->post('no_telepon_pelanggan');
		$lg['no_hp_pelanggan'] = $this->input->post('no_hp_pelanggan');


		$trans['jenis_transaksi_akhir'] = $this->input->post('jenis_transaksi_akhir');
		$trans['harga'] = $this->input->post('harga');
		$trans['status'] = $this->input->post('status');
		$trans['tgl_transaksi'] = date("Y-m-d", strtotime($this->input->post('tgl_transaksi')));

		if($trans['jenis_transaksi_akhir']=="Jual"){
			$dj['kpr'] = $this->input->post('kpr');
			$dj['kode_data_jual'] = $this->input->post('kode_data_jual');


			if(!empty($_FILES['fotoktpjual']['name'])){
				$this->upload_image('ktp_penjual', 'fotoktpjual',$dj['kode_data_jual']);
				$dj['ktp_penjual'] = $this->image_name;
			}
			if(!empty($_FILES['fotoktpbeli']['name'])){	
				$this->upload_image('ktp_pembeli', 'fotoktpbeli',$dj['kode_data_jual']);
				$dj['ktp_pembeli'] = $this->image_name;
			}
			if(!empty($_FILES['fotonpwpjual']['name'])){	
				$this->upload_image('npwp_penjual', 'fotonpwpjual',$dj['kode_data_jual']);
				$dj['npwp_penjual'] = $this->image_name;
			}
			if(!empty($_FILES['fotonpwpbeli']['name'])){	
				$this->upload_image('npwp_pembeli', 'fotonpwpbeli',$dj['kode_data_jual']);
				$dj['npwp_pembeli'] = $this->image_name;		
			}
			if(!empty($_FILES['fotosuratnikahjual']['name'])){	
				$this->upload_image('surat_nikah_penjual', 'fotosuratnikahjual',$dj['kode_data_jual']);
				$dj['surat_nikah_penjual'] = $this->image_name;
			}
			if(!empty($_FILES['fotosuratnikahbeli']['name'])){	
				$this->upload_image('surat_nikah_pembeli', 'fotosuratnikahbeli',$dj['kode_data_jual']);
				$dj['surat_nikah_pembeli'] = $this->image_name;	
			} 
			$this->transaksi_model->update_data_jual($dj,$dj['kode_data_jual']);

		} else {
			$ds['lama_sewa'] = $this->input->post('lama_sewa');	
			$ds['kode_data_sewa'] = $this->input->post('kode_data_sewa');
			
			if(!empty($_FILES['fotoktpmilik']['name'])){
				$this->upload_image('ktp_pemilik', 'fotoktpmilik',$ds['kode_data_sewa']);
				$ds['ktp_pemilik'] = $this->image_name;
			} else if(!empty($_FILES['fotoktpsewa']['name'])){	
				$this->upload_image('ktp_penyewa', 'fotoktpsewa',$ds['kode_data_sewa']);
				$ds['ktp_penyewa'] = $this->image_name;
				
			} else {}
			$this->transaksi_model->update_data_sewa($ds,$ds['kode_data_sewa']);
		}
		$this->transaksi_model->update_transaksi($trans,$this->input->post('kode_transaksi'));
		$this->transaksi_model->update_pelanggan($lg,$this->input->post('kode_pelanggan'));
		redirect('transaksi');
	}

	public function selectedtransaksi($id){
		$data['transaksi'] = $this->transaksi_model->get_selected_transaksi($id);
		$this->load->view('templates/selected_transaksi',$data);
	}

	private function upload_image($ttype, $ftype, $kdata){

		if(substr($kdata,0,2)=="DJ"){
			$config['upload_path']          =  "../CodeIgniter/assets/images/kelengkapan data jual/";
		} else {
			$config['upload_path']          =  "../CodeIgniter/assets/images/kelengkapan data sewa/";
		}

        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $kdata ."_". $ttype;
        $config['max_size']             = 0;
        $config['overwrite']            = TRUE;
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload($ftype)){        
            $error = array('error' => $this->upload->display_errors());
            foreach($error as $e){
            	echo $e . "<br>";
            }
        } else {
            $complete = array('upload_data' => $this->upload->data());
            $name = $_FILES[$ftype]['name'];
			$ext = end((explode(".", $name)));
			$this->image_name = $config['file_name'] . "." .$ext;
        }
	}
}
?>
<?php 

class Account_model extends CI_Model {
	public function getlogin($data){
  		$this->db->select('*');	
  		$this->db->where('kode_marketing',$data['userid']);
  		$this->db->where('password_marketing',$data['password']);
  		$query = $this->db->get('marketing');
		return $query->num_rows();
	}

	public function register($data){
		$this->db->insert('marketing',$data);
	}

	public function check_userid($data){
		$query = $this->db->select('kode_marketing')
  		->where('kode_marketing',$data)
  		->get('marketing');
		return $query->num_rows();
	}

	public function getuserinfo($data){
		$query = $this->db->select('nama_marketing, jabatan, foto_marketing')
  		->where('kode_marketing',$data['userid'])
  		->get('marketing');
		return $query->result();
	}
}
?>
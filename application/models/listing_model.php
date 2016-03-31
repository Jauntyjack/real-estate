<?php 

class Listing_model extends CI_Model {

	private $pemasaran;
	private $penjual;

	public function get_listing($limit,$start,$jabatan,$userid){
  		$this->db->select('*');
        $this->db->from('listing a'); 
        $this->db->join('properti b', 'b.kode_properti=a.kode_properti', 'left');
        $this->db->join('penjual c', 'c.kode_penjual=a.kode_penjual', 'left');
        $this->db->join('pemasaran d', 'd.kode_pemasaran=a.kode_pemasaran', 'left');
        $this->db->join('marketing e', 'e.kode_marketing=a.kode_marketing', 'left');
        if($jabatan=="marketing"){
        	$this->db->where(['a.kode_marketing'=>$userid]);
        }
        $this->db->order_by('a.tanggal','desc'); 
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();	
	}

	public function listing_rows($jabatan, $userid){
		$this->db->select('a.kode_listing');
        $this->db->from('listing a'); 
        $this->db->join('properti b', 'b.kode_properti=a.kode_properti', 'left');
        $this->db->join('penjual c', 'c.kode_penjual=a.kode_penjual', 'left');
        $this->db->join('pemasaran d', 'd.kode_pemasaran=a.kode_pemasaran', 'left');
        $this->db->join('marketing e', 'e.kode_marketing=a.kode_marketing', 'left');
        if($jabatan=="marketing"){
        	$this->db->where(['a.kode_marketing'=>$userid]);
        }
        $query = $this->db->get();
        return $query->num_rows();	
	}

	public function insert_penjual($jual){
		$this->db->insert('penjual',$jual);
	}

	public function insert_pemasaran($pasar){
		$this->db->insert('pemasaran',$pasar);
	}

	public function insert_listing($trans){
		$this->db->insert('listing',$trans);
	}

	public function update_listing($data, $kode_listing){
		$this->db->where(['kode_listing'=>$kode_listing]);
		$this->db->update('listing',$data);
	}

	public function update_penjual($data, $kode_penjual){
		$this->db->where(['kode_penjual'=>$kode_penjual]);
		$this->db->update('penjual',$data);
	}

	public function update_pemasaran($data, $kode_pemasaran){
		$this->db->where(['kode_pemasaran'=>$kode_pemasaran]);
		$this->db->update('pemasaran',$data);
	}

	public function getlastcode($data){
		$idcol = $data['column']; 
		$this->db->select($data['column']);
		$this->db->order_by('CAST(SUBSTR('.$idcol.' FROM 3) AS UNSIGNED)','desc');
		$query = $this->db->get($data['table']);
		return $query->row();
	}

	public function get_selected_listing($id){
		$this->db->select('*');
        $this->db->from('listing a'); 
        $this->db->join('properti b', 'b.kode_properti=a.kode_properti', 'left');
        $this->db->join('penjual c', 'c.kode_penjual=a.kode_penjual', 'left');
        $this->db->join('pemasaran d', 'd.kode_pemasaran=a.kode_pemasaran', 'left');
        $this->db->join('marketing e', 'e.kode_marketing=a.kode_marketing', 'left');
        $this->db->order_by('a.kode_listing','desc');  
        $this->db->where('a.kode_listing',$id); 
        $query = $this->db->get();
		return $query->result();
	}
}
?>
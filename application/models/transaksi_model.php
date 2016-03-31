<?php 

class Transaksi_model extends CI_Model {

	private $data_jual;
	private $data_beli;
	private $pelanggan;

	public function get_transaksi($jabatan,$userid){
		$this->db->select('*');
        $this->db->from('transaksi a'); 
        $this->db->join('pelanggan b', 'b.kode_pelanggan=a.kode_pelanggan', 'left');
        $this->db->join('listing c', 'c.kode_listing=a.kode_listing', 'left');
        $this->db->join('properti d', 'd.kode_properti=c.kode_properti', 'left');
        $this->db->join('penjual f', 'f.kode_penjual=c.kode_penjual', 'left');
        $this->db->join('data_jual g', 'g.kode_data_jual=a.kode_data_jual', 'left');
        $this->db->join('data_sewa h', 'h.kode_data_sewa=a.kode_data_sewa', 'left');
        $this->db->join('marketing i', 'i.kode_marketing=c.kode_marketing', 'left');
        if($jabatan=="marketing"){
        	$this->db->where(['a.kode_marketing_trans'=>$userid]);
        }
        $this->db->order_by('a.kode_transaksi','desc');  
        $query = $this->db->get();
		return $query->result();
	}

	public function insert_data_jual($data){
		$this->db->insert('data_jual',$data);
	}

	public function update_data_jual($data, $kode_data_jual){
		$this->db->where(['kode_data_jual'=>$kode_data_jual]);
		$this->db->update('data_jual',$data);
	}

	public function insert_data_sewa($data){
		$this->db->insert('data_sewa',$data);
	}

	public function update_data_sewa($data, $kode_data_sewa){
		$this->db->where(['kode_data_sewa'=>$kode_data_sewa]);
		$this->db->update('data_sewa',$data);
	}

	public function insert_transaksi($data){
		$this->db->insert('transaksi',$data);
	}

	public function update_transaksi($data, $kode_transaksi){
		$this->db->where(['kode_transaksi'=>$kode_transaksi]);
		$this->db->update('transaksi',$data);
	}

	public function insert_pelanggan($data){
		$this->db->insert('pelanggan',$data);
	}

	public function update_pelanggan($data, $kode_pelanggan){
		$this->db->where(['kode_pelanggan'=>$kode_pelanggan]);
		$this->db->update('pelanggan',$data);
	}

	public function getlastcode($data){
		$idcol = $data['column']; 
		$this->db->select($data['column']);
		$this->db->order_by('CAST(SUBSTR('.$idcol.' FROM 3) AS UNSIGNED)','desc');
		$query = $this->db->get($data['table']);
		if($query->num_rows()>0){
			return $query->row();
		} else {
			return "empty";
		}
	}

	public function get_selected_transaksi($id){
		$this->db->select('*');
        $this->db->from('transaksi a'); 
        $this->db->join('listing b', 'b.kode_listing=a.kode_listing', 'left');
        $this->db->join('pelanggan c', 'c.kode_pelanggan=a.kode_pelanggan', 'left');
        $this->db->join('properti d', 'd.kode_properti=b.kode_properti', 'left');
        $this->db->join('data_jual e', 'e.kode_data_jual=a.kode_data_jual', 'left');
        $this->db->join('data_sewa f', 'f.kode_data_sewa=a.kode_data_sewa', 'left');
        $this->db->join('marketing g', 'g.kode_marketing=b.kode_marketing', 'left');
        $this->db->join('penjual h', 'h.kode_penjual=b.kode_penjual', 'left');
        $this->db->order_by('a.kode_transaksi','desc');  
        $this->db->where('a.kode_transaksi',$id); 
        $query = $this->db->get();
		return $query->result();
	}

	public function get_recent_transaksi(){
		$query = $this->db->select('*')
		->from('transaksi a')
        ->join('listing b', 'b.kode_listing=a.kode_listing', 'left')
        ->join('marketing c', 'c.kode_marketing=b.kode_marketing', 'left')
        ->join('properti d', 'd.kode_properti=b.kode_properti', 'left')
		->order_by('tgl_transaksi','desc')
		->limit(3)
		->get();
		return $query->result();
	}
}
?>
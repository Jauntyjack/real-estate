<?php 

class Properti_model extends CI_Model {
	public function get_properti_result($data){
		$query = $this->db->select('*')
		->from('properti a')
        ->join('listing b', 'a.kode_properti=b.kode_properti', 'left')
        ->join('pemasaran c', 'c.kode_pemasaran=b.kode_pemasaran', 'left')
        ->join('transaksi d', 'd.kode_listing=b.kode_listing', 'left')
		->where('penawaran_terakhir >=',$data['minp'])
		->where('penawaran_terakhir <=',$data['maxp'])
		->like('alamat_properti',$data['alamat_properti'])
		->like('tipe_properti',$data['tipe_properti'])
		->like('jenis_transaksi',$data['jenis_transaksi'])

		->where('luas_tanah >=',$data['luas_tanah_min'])
		->where('luas_tanah <=',$data['luas_tanah_max'])
		->where('luas_bangunan >=',$data['luas_bangunan_min'])
		->where('luas_bangunan <=',$data['luas_bangunan_max'])
		->where('kamar_tidur >=',$data['kamar_tidur'])
		->where('kamar_mandi >=',$data['kamar_mandi'])
		->like('orientasi',$data['orientasi'])
		->where('tingkat >=',$data['tingkat'])
		->like('status_kepemilikan',$data['status_kepemilikan'])

		->like('kelurahan',$data['pemula'])
		//->or_like('kelurahan',$data['pemula'])

		->where('d.kode_listing IS NULL')

		->order_by($data['sortcol'], $data['sortnav'])
		->get();
		if(isset($data['result_num'])){
			return $query->num_rows();
		} else {
			return $query->result();
		}
	}

	public function get_properti_detail($data){
		$query=$this->db->select('*')
		->from('properti a')
        ->join('listing b', 'a.kode_properti=b.kode_properti', 'left')
        ->join('pemasaran c', 'c.kode_pemasaran=b.kode_pemasaran', 'left')
        ->join('marketing d', 'd.kode_marketing=b.kode_marketing', 'left')
		->like('a.kode_properti',$data['properticode'])
		->get();
		return $query->result();
	}

	public function get_comparison_table($data){
		$query=$this->db->select('a.kode_properti,kelurahan,kecamatan,gambar,jenis_transaksi,alamat_properti,penawaran_terakhir,tipe_properti,
			luas_tanah,luas_bangunan,kamar_tidur,kamar_mandi,tingkat,listrik,telepon,
			ac,air,ruangan_lain,fasilitas_lain,status_kepemilikan,gambar')
		->from('properti a')
        ->join('listing b', 'a.kode_properti=b.kode_properti', 'left')
        ->join('pemasaran c', 'c.kode_pemasaran=b.kode_pemasaran', 'left')
		->where('a.kode_properti',$data['pid1'])
		->or_where('a.kode_properti',$data['pid2'])
		->or_where('a.kode_properti',$data['pid3'])
		->get();
		return $query->result();
	}

	public function get_recent_properti(){
		$query = $this->db->select('*')
		->from('properti a')
        ->join('listing b', 'a.kode_properti=b.kode_properti', 'left')
        ->join('pemasaran c', 'c.kode_pemasaran=b.kode_pemasaran', 'left')
        ->join('marketing d', 'd.kode_marketing=b.kode_marketing', 'left')
		->order_by('tanggal','desc')
		->limit(3)
		->get();
		return $query->result();
	}

	public function insert_properti($data){
		$this->db->insert('properti',$data);
	}

	public function update_properti($data, $kode_properti){
		$this->db->where(['kode_properti'=>$kode_properti]);
		$this->db->update('properti',$data);
	}

}
?>
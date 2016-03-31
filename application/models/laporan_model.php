<?php 

class Laporan_model extends CI_Model {

	public function get_laporan_kantor($data){
	$query = $this->db->select('*')
        ->from('transaksi a')
        ->join('pelanggan b', 'b.kode_pelanggan=a.kode_pelanggan', 'left')
        ->join('listing c', 'c.kode_listing=a.kode_listing', 'left')
        ->join('properti d', 'd.kode_properti=c.kode_properti', 'left')
        ->join('pemasaran e', 'e.kode_pemasaran=c.kode_pemasaran', 'left')
        ->join('penjual f', 'f.kode_penjual=c.kode_penjual', 'left')
        ->join('data_jual g', 'g.kode_data_jual=a.kode_data_jual', 'left')
        ->join('data_sewa h', 'h.kode_data_sewa=a.kode_data_sewa', 'left')
        ->join('marketing i', 'i.kode_marketing=a.kode_marketing_trans', 'left')
        ->where('tgl_transaksi >= ' ,$data['startdate'])
        ->where('tgl_transaksi <= ' ,$data['enddate'])
        ->where('a.status =','Selesai')
        ->order_by('a.tgl_transaksi','desc')
        ->get();
        return $query->result();   
	}

        public function get_laporan_marketing($data){
        $query = $this->db->select('*')
        ->from('transaksi a')
        ->join('pelanggan b', 'b.kode_pelanggan=a.kode_pelanggan', 'left')
        ->join('listing c', 'c.kode_listing=a.kode_listing', 'left')
        ->join('properti d', 'd.kode_properti=c.kode_properti', 'left')
        ->join('pemasaran e', 'e.kode_pemasaran=c.kode_pemasaran', 'left')
        ->join('penjual f', 'f.kode_penjual=c.kode_penjual', 'left')
        ->join('data_jual g', 'g.kode_data_jual=a.kode_data_jual', 'left')
        ->join('data_sewa h', 'h.kode_data_sewa=a.kode_data_sewa', 'left')
        ->join('marketing i', 'i.kode_marketing=a.kode_marketing_trans', 'left')
        ->where('tgl_transaksi >= ' ,$data['startdate'])
        ->where('tgl_transaksi <= ' ,$data['enddate'])
        ->where('a.status =','Selesai')
        ->order_by('a.kode_marketing_trans','desc')
        ->get();
        return $query->result();   
        }

        public function get_laporan_performa($data){
                $query = $this->db->select('c.nama_marketing, foto_marketing,
                count(b.kode_listing) as listsum, count(a.kode_transaksi) as transsum, sum(harga) AS nominal')
                ->from('transaksi a')
                ->join('listing b', 'b.kode_listing=a.kode_listing', 'left')
                ->join('marketing c', 'c.kode_marketing=a.kode_marketing_trans', 'left')
                ->where('tgl_transaksi >= ' ,$data['startdate'])
                ->where('tgl_transaksi <= ' ,$data['enddate'])
                ->where('a.status =','Selesai')
                ->group_by('a.kode_marketing_trans, foto_marketing')
                ->order_by('nominal','desc')
                ->get();
                return $query->result();
        }

}
?>
<?php foreach ($transaksi as $list) { 
$arr = array('jenis_transaksi_akhir' => $list->jenis_transaksi_akhir, 
		     'lama_sewa' => $list->lama_sewa,
			 'kpr' => $list->kpr,
			 'harga' => $list->harga, 
			 'status' => $list->status, 
			 'tgl_transaksi' => date("j-M-y", strtotime($list->tgl_transaksi)),
			 'kode_data_jual' => $list->kode_data_jual,
			 'kode_data_sewa' => $list->kode_data_sewa,
			 'nama_pelanggan' => $list->nama_pelanggan,
			 'alamat_pelanggan' => $list->alamat_pelanggan, 
			 'email_pelanggan' => $list->email_pelanggan, 
			 'status_kawin_pelanggan' => $list->status_kawin_pelanggan,
			 'no_telepon_pelanggan' => $list->no_telepon_pelanggan, 
			 'no_hp_pelanggan' => $list->no_hp_pelanggan,
			 'foto_ktp_milik' => $list->ktp_pemilik,
			 'foto_ktp_sewa' => $list->ktp_penyewa,
			 'foto_ktp_jual' => $list->ktp_penjual,
			 'foto_ktp_beli' => $list->ktp_pembeli,
			 'foto_npwp_jual' => $list->npwp_penjual,
			 'foto_npwp_beli' => $list->npwp_pembeli,
			 'foto_surat_nikah_jual' => $list->surat_nikah_penjual,
			 'foto_surat_nikah_beli' => $list->surat_nikah_pembeli,
			 'alamat_properti' => $list->alamat_properti,
			 'tipe_properti' => $list->tipe_properti,
			 'tanggal' => date("j-M-y", strtotime($list->tanggal)),
			 'nama_marketing' => $list->nama_marketing,
			 );
echo json_encode($arr);
 } ?>
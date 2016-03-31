<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<center><?php $this->load->view('templates/header');?></center>
</div>

	<div class="container">
	<div class="row">
	<div class="col-xs-2"></div>
		<div class="col-xs-8">


<h3 align="center">Jenis Transaksi</h3>

<?php $attributes = array('id'=>'insert_form','class'=>'form_horizontal');?>

<?php
echo form_open('home/doinsert', $attributes);
?>

<div class="form-group">
 <?php echo form_radio('jtrans', 'dijual', @$mchecked, 'id=dijual').form_label('Dijual', 'dijual'); ?>
    <?php echo  form_radio('jtrans', 'disewakan', @$fchecked, 'id=disewakan').form_label('Disewakan','disewakan'); ?>
</div>

<h3 align="center">Data Properti</h3>

<div class="form-group">
<?php echo form_label('Alamat');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'alamat_properti',
	'placeholder'=> 'Masukkan alamat'
	);
?>
<?php echo form_input($data);?>
</div>
<div class="row">
	<div class="col-xs-4">
		<div class="form-group">
		<?php echo form_label('Kode Pos');?>
		<?php 
		$data = array(
			'class'=>'form-control',
			'name'=>'kode_pos',
			'placeholder'=> 'Masukkan kode pos'
			);
		?>
		<?php echo form_input($data);?>
		</div>
	</div>
	<div class="col-xs-4">
	<div class="form-group">
	<?php echo form_label('Kelurahan');?>
	<?php 
	$data = array(
		'class'=>'form-control',
		'name'=>'kelurahan',
		'placeholder'=> 'Masukkan kelurahan'
		);
	?>
	<?php echo form_input($data);?>
	</div>
	</div>
	<div class="col-xs-4">
	<div class="form-group">
	<?php echo form_label('Kecamatan');?>
	<?php 
	$data = array(
		'class'=>'form-control',
		'name'=>'kecamatan',
		'placeholder'=> 'Masukkan kecamatan'
		);
	?>
	<?php echo form_input($data);?>
	</div>
</div>
</div>

<div class="form-group">
<?php
	$options = array(
                  'Rumah Tinggal'  => 'Rumah Tinggal',
                  'Ruko / R. Usaha'    => 'Ruko / R. Usaha',
                  'Apartement'   => 'Apartement',
                  'Villa / Resort' => 'Villa / Resort',
                  'Kavling' => 'Kavling',
                );
echo form_label('Tipe Properti');
echo form_dropdown('tipepro', $options, 'large','class="form-control" id="tipe_properti"');
?>
</div>

<div class="row">
	<div class="col-xs-6">
		<div class="form-group">
		<?php echo form_label('Luas Tanah');?>
		<?php 
			$data = array(
				'class'=>'form-control',
				'name'=>'luas_tanah',
				'placeholder'=> 'luas tanah (m2)'
			);
			echo form_input($data);
		?>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="form-group">
		<?php echo form_label('Luas Bangunan');?>
		<?php 
			$data2 = array(
				'class'=>'form-control',
				'name'=>'luas_bangunan',
				'placeholder'=> 'luas bangunan (m2)'
			);
			echo form_input($data2);
		?>	
		</div>
	</div>
</div>

<div class="form-group">
<?php echo form_label('Orientasi / Arah');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'orientasi',
	'placeholder'=> 'Masukkan orientasi'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Tingkat / Lantai');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'tingkat',
	'placeholder'=> 'Masukkan jumlah tingkat / lantai'
	);
?>
<?php echo form_input($data);?>
</div>


<div class="row">
	<div class="col-xs-6">
		<div class="form-group">
		<?php echo form_label('Kamar Tidur');?>
		<?php 
			$data = array(
				'class'=>'form-control',
				'name'=>'kamar_tidur',
				'placeholder'=> 'Kt'
			);
			echo form_input($data);
		?>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="form-group">
		<?php echo form_label('Kamar Mandi');?>
		<?php 
			$data2 = array(
				'class'=>'form-control',
				'name'=>'kamar_mandi',
				'placeholder'=> 'Km'
			);
			echo form_input($data2);
		?>	
		</div>
	</div>
</div>


<div class="form-group">
<?php echo form_label('Ruangan Lainnya');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'rlain',
	'rows'=>'3',
	'cols'=>'30',
	'placeholder'=> 'Masukkan ruangan lainnya'
	);
?>
<?php echo form_input($data);?>
</div>

<?php echo form_label('Fasilitas yang termasuk dalam transaksi properti :');?>

<div class="form-group">
<?php echo form_label('Listrik');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'listrik',
	'placeholder'=> 'Masukkan listrik (watt)'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Telepon');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'telepon',
	'placeholder'=> 'Masukkan telepon (line)'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('AC');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'ac',
	'placeholder'=> 'Masukkan AC (set)'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Air');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'air',
	'placeholder'=> 'Masukkan air'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Fasilitas Lain');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'flain',
	'placeholder'=> 'Masukkan fasilitas lain'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php
	$options = array(
                  'HGB s/d tahun'  => 'HGB s/d tahun',
                  'Hak Milik'    => 'Hak Milik',
                  'Lain-lain'   => 'Lain-lain',
                );
echo form_label('Status Pemilikan (Sertifikat)');
echo form_dropdown('status_milik', $options, 'hgb','class="form-control" id="status_milik"');
?>
</div>


<h3 align="center">Data Penjual</h3>

<div class="form-group">
<?php echo form_label('Nama');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'nama_penjual',
	'placeholder'=> 'Masukkan nama penjual'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Alamat');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'alamat_penjual',
	'placeholder'=> 'Masukkan alamat penjual'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Email');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'email_penjual',
	'placeholder'=> 'Masukkan email penjual'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Status Perkawinan');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'status_perkawinan',
	'placeholder'=> 'Masukkan status perkawinan'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('No. Telepon');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'notelp',
	'placeholder'=> 'Masukkan No. Telp'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('No. HP');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'no_hp',
	'placeholder'=> 'Masukkan No. HP'
	);
?>
<?php echo form_input($data);?>
</div>


<h3 align="center">Data Pemasaran</h3>

<div class="form-group">
<?php echo form_label('Nama Disertifikat');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'nama_disertif',
	'placeholder'=> 'Masukkan nama disertifikat'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Hubungan penjual dengan nama di sertifikat');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'hub_disertif',
	'placeholder'=> 'Masukkan hubungan penjual dengan nama di sertifikat'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Waktu Pengosongan');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'waktu_kosong',
	'placeholder'=> 'Masukkan waktu pengosongan'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Harga Permintaan');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'harga_permintaan',
	'placeholder'=> 'Masukkan harga permintaan'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Harga Minimal');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'hargamin',
	'placeholder'=> 'Masukkan Harga Minimal'
	);
?>
<?php echo form_input($data);?>
</div>

<div class="form-group">
<?php echo form_label('Penawaran Terakhir');?>
<?php 
$data = array(
	'class'=>'form-control',
	'name'=>'tawar_akhir',
	'placeholder'=> 'Masukkan Penawaran Terakhir'
	);
?>
<?php echo form_input($data);?>
</div>	

<div class="form-group">
<?php 
$data = array(
	'class'=>'btn btn-primary',
	'name'=>'submit',
	'value'=>'Insert'
	);
?>
<?php echo form_submit($data);?>
</div>


<?php
echo form_close();
?>

</div>

<div class="col-xs-2"></div>
</div>

<div class="container">
<div class="row">
	<center><?php $this->load->view('templates/footer');?></center>
</div>
</div>

</body>
</html>
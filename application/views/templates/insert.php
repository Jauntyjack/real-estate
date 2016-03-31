<?php $this->load->view('templates/header');?>
   <?php $this->load->view('templates/sidenav');?>
 <main>
      <div class="section no-pad-bot">

	<div class="row">
	  <nav class="grey darken-4" >
	    <div class="nav-wrapper">
	      <div class="col s12">
	        <font size="5" class="hide-on-med-and-down">Insert Listing</font>
	        <div style="float: right;">
	          <a href="<?php echo site_url() ?>home" class="breadcrumb">Beranda</a>
	          <a href="<?php echo site_url() ?>listing" class="breadcrumb">Listing</a>
	          <a href="<?php echo site_url() ?>listing/insert" class="breadcrumb">Insert</a>
	        </div>
	      </div>
	    </div>
	  </nav>
  	</div>

<div class="container">
	<div class="row">


<div class="col s12 m11 l10">

<h5 align="center" id="jenistrans" class="section scrollspy">Jenis Transaksi</h5>
<?php $attributes = array('id'=>'insert_formx','class'=>'col s12');
echo form_open_multipart('listing/insert', $attributes);
echo form_hidden('doinsert', 'yes'); ?>

<div class="input-field col s12">
<?php $data = array(
				'type'=>'checkbox',
			    'name'=> 'jtrans[]',
			    'id' => 'dijual',
			    'value' => 'Dijual',
			    'checked' => set_checkbox('jtrans', 'Dijual')

);
echo form_checkbox($data);
echo form_label('Dijual','dijual');
$data = array(
				'type'=>'checkbox',
			    'name'          => 'jtrans[]',
			    'id'            => 'disewakan',
			    'value'            => 'Disewakan',
			    'checked' => set_checkbox('jtrans', 'Disewakan')
);
echo form_checkbox($data);
echo form_label('Disewakan','disewakan');
echo "<br><br>".form_error('jtrans[]');
?>
<span id="jtrans" class="red-text"></span>
</div>
<br><br><br><br>
<h5 align="center" id="dataproperti" class="section scrollspy">Data Properti</h5>


<div class="input-field col s12">

<?php $data = array(
	'class'=>'validate',
	'id'=>'alamat_properti',
	'name'=>'alamat_properti',
	'value'=>set_value('alamat_properti')
	);
echo form_input($data);
echo form_label('Alamat','alamat_properti'); echo form_error('alamat_properti'); ?>
<span id="alamat_properti" class="red-text"></span>
</div>

<div class="input-field col s4">
<?php echo form_label('Kode Pos','kode_pos');
$data = array(
	'class'=>'validate',
	'id'=>'kode_pos',
	'name'=>'kode_pos',
	'value'=>set_value('kode_pos')
	);
echo form_input($data); echo form_error('kode_pos'); ?>
<span id="kode_pos" class="red-text"></span>
</div>

<div class="input-field col s4">
<?php echo form_label('Kelurahan','kelurahan'); 
$data = array(
	'class'=>'validate',
	'id'=>'kelurahan',
	'name'=>'kelurahan',
	'value'=>set_value('kelurahan')
	);
echo form_input($data);echo form_error('kelurahan'); ?>
</div>


<div class="input-field col s4">
<?php echo form_label('Kecamatan','kecamatan');
$data = array(
	'class'=>'validate',
	'id'=>'kecamatan',
	'name'=>'kecamatan',
	'value'=>set_value('kecamatan')
	);
echo form_input($data); echo form_error('kecamatan'); ?>
</div>


<div class="input-field col s12">
<?php $options = array(
                  'Rumah Tinggal'  => 'Rumah Tinggal',
                  'Ruko / R. Usaha'    => 'Ruko / R. Usaha',
                  'Apartement'   => 'Apartement',
                  'Villa / Resort' => 'Villa / Resort',
                  'Kavling' => 'Kavling',
                );
echo form_dropdown('tipepro', $options, 'Rumah Tinggal','id="tipe_properti"');
echo form_label('Tipe Properti');
?>
</div>


<div class="input-field col s6">
<?php echo form_label('Luas Tanah (m<sup>2</sup>)', 'luas_tanah');
$data = array(
	'class'=>'validate',
	'id'=>'luas_tanah',
	'name'=>'luas_tanah',
	'value'=>set_value('luas_tanah')
	);
echo form_input($data); echo form_error('luas_tanah'); ?>
</div>


<div class="input-field col s6">
<?php echo form_label('Luas Bangunan (m<sup>2</sup>)','luas_bangunan');
$data = array(
	'class'=>'validate',
	'id'=>'luas_bangunan',
	'name'=>'luas_bangunan',
	'value'=>set_value('luas_bangunan')
	);
echo form_input($data); echo form_error('luas_bangunan'); ?>
</div>


<div class="input-field col s6">
		<?php echo form_label('Orientasi','orientasi');
		$data = array(
			'class'=>'validate',
			'id'=>'orientasi',
			'name'=>'orientasi',
			'value'=>set_value('orientasi')
			);
 		echo form_input($data); echo form_error('orientasi'); ?>
		</div>

<div class="input-field col s6">
		<?php echo form_label('Tingkat / Lantai','tingkat');
		$data = array(
			'class'=>'validate',
			'id'=>'tingkat',
			'name'=>'tingkat',
			'value'=>set_value('tingkat')
			);
		echo form_input($data); echo form_error('tingkat'); ?>
		</div>


	<div class="input-field col s6">
		<?php echo form_label('Kamar Tidur','kamar_tidur');
		$data = array(
			'class'=>'validate',
			'id'=>'kamar_tidur',
			'name'=>'kamar_tidur',
			'value'=>set_value('kamar_tidur')
			);
		echo form_input($data); echo form_error('kamar_tidur'); ?>
		</div>

		<div class="input-field col s6">
		<?php echo form_label('Kamar Mandi','kamar_mandi');
		$data = array(
			'class'=>'validate',
			'id'=>'kamar_mandi',
			'name'=>'kamar_mandi',
			'value'=>set_value('kamar_mandi')
			);
		echo form_input($data); echo form_error('kamar_mandi'); ?>
		</div>


	<div class="input-field col s12">
		<?php echo form_label('Ruangan Lainnya','rlain');
		$data = array(
			'class'=>'validate',
			'id'=>'rlain',
			'name'=>'rlain',
			'value'=>set_value('rlain')
			);
		echo form_input($data);?>
		</div>
<div class="col s12">
<br>
<?php echo form_label('Fasilitas yang termasuk dalam transaksi properti :');?>
</div>
<br>
<div class="input-field col s3">
		<?php echo form_label('Listrik','listrik');
		$data = array(
			'class'=>'validate',
			'id'=>'listrik',
			'name'=>'listrik',
			'value'=>set_value('listrik')
			);
		echo form_input($data); echo form_error('listrik'); ?>
		</div>

<div class="input-field col s3">
		<?php echo form_label('Telepon (line)','telepon');
		$data = array(
			'class'=>'validate',
			'id'=>'telepon',
			'name'=>'telepon',
			'value'=>set_value('telepon')
			);
		echo form_input($data); echo form_error('telepon'); ?>
		</div>

<div class="input-field col s3">
		<?php echo form_label('AC (Set)','ac');
		$data = array(
			'class'=>'validate',
			'id'=>'ac',
			'name'=>'ac',
			'value'=>set_value('ac')
			);
		echo form_input($data); echo form_error('ac'); ?>
		</div>

<div class="input-field col s3">
		<?php echo form_label('Air','air');
		$data = array(
			'class'=>'validate',
			'id'=>'air',
			'name'=>'air',
			'value'=>set_value('air')
			);
		echo form_input($data); echo form_error('air'); ?>
		</div>

<div class="input-field col s12">
		<?php echo form_label('Fasilitas Lain','flain');
		$data = array(
			'class'=>'validate',
			'id'=>'flain',
			'name'=>'flain',
			'value'=>set_value('flain')
			);
		echo form_input($data);?>
		</div>

		<div class="file-field input-field col s12">
			<div class="btn">
		        File
		        <input type="file" name="gambar[]" multiple>
	     	 </div>
	     	 <div class="file-path-wrapper">
				<?php
				$data = array(
					'type'=>'text',
					'class'=>'file-path validate',
					'id'=>'gambar',
					'name'=>'picname',
					'placeholder'=>'Masukkan gambar properti',
					);
				echo form_input($data);?>
			</div>
			<div class="red-text">
				<?php if(isset($invalidfile)){
					echo "File tidak valid. Pastikan file berformat jpg/png/gif";
				}
				?>
			</div>
		</div>

<div class="input-field col s12">
<?php
	$options = array(
                  'HGB'  => 'HGB',
                  'Hak Milik'    => 'Hak Milik',
                  'Lain-lain'   => 'Lain-lain',
                );
echo form_dropdown('status_milik', $options, 'hgb',' id="status_milik"');
echo form_label('Status Pemilikan (Sertifikat)');
?>
<br><br>
</div>


<p style="visibility: hidden;">Data Penjual</p>

<h5 align="center" id ="datapenjual" class="section scrollspy">Data Penjual</h5>
<div class="input-field col s12" id="pnx">
		<?php echo form_label('Nama','nama_penjual');
		$data = array(
			'class'=>'validate',
			'id'=>'nama_penjual',
			'name'=>'nama_penjual',
			'value'=>set_value('nama_penjual')
			);
		echo form_input($data); echo form_error('nama_penjual'); ?>
		</div>

<div class="input-field col s12">
		<?php echo form_label('Alamat','alamat_penjual');
		$data = array(
			'class'=>'validate',
			'id'=>'alamat_penjual',
			'name'=>'alamat_penjual',
			'value'=>set_value('alamat_penjual')
			);
		echo form_input($data); echo form_error('alamat_penjual'); ?>
</div>

<div class="input-field col s12">
	<?php echo form_label('Email','email_penjual');
	$data = array(
		'class'=>'validate',
		'id'=>'email_penjual',
		'name'=>'email_penjual',
		'value'=>set_value('email_penjual')
		);
	echo form_input($data); echo form_error('email_penjual'); ?>
</div>


<div class="input-field col s12">
<?php
	$options = array(
                  'Belum Kawin'  => 'Belum Kawin',
                  'Kawin'    => 'Kawin',
                  'Cerai Hidup'   => 'Cerai Hidup',
                  'Cerai Mati'   => 'Cerai Mati',
                );
echo form_dropdown('status_perkawinan', $options, 'Belum Kawin',' id="status_perkawinan"');
echo form_label('Status Perkawinan');
?>
</div>

<div class="input-field col s6">
	<?php echo form_label('No. Telepon','notelp');
	$data = array(
		'class'=>'validate',
		'id'=>'notelp',
		'name'=>'notelp',
		'value'=>set_value('notelp')
		);
	echo form_input($data); echo form_error('notelp'); ?>
</div>

<div class="input-field col s6">
	<?php echo form_label('No. HP','no_hp');
	$data = array(
		'class'=>'validate',
		'id'=>'no_hp',
		'name'=>'no_hp',
		'value'=>set_value('no_hp')
		);
	echo form_input($data); echo form_error('no_hp'); ?>
	<br><br><br>
</div>

<p style="visibility: hidden;">Data Pemasaran</p>
<h5 align="center" id="datapemasaran" class="section scrollspy">Data Pemasaran</h5>

<div class="input-field col s12">
	<?php echo form_label('Nama Disertifikat','nama_disertif');
	$data = array(
		'class'=>'validate',
		'id'=>'nama_disertif',
		'name'=>'nama_disertif',
		'value'=>set_value('nama_disertif')
		);
	echo form_input($data); echo form_error('nama_disertif'); ?>
</div>

<div class="input-field col s12">
	<?php echo form_label('Hubungan penjual dengan nama di sertifikat','hub_disertif');
	$data = array(
		'class'=>'validate',
		'id'=>'hub_disertif',
		'name'=>'hub_disertif',
		'value'=>set_value('hub_disertif')
		);
	echo form_input($data); echo form_error('hub_disertif'); ?>
</div>
<div class="input-field col s12">
<?php echo form_label('Waktu Pengosongan','waktu_kosong');?>
<br>
</div>

<div class="input-field col s12">
<input type="date" name="waktu_kosong" class="datepicker" 
onclick="$('.datepicker').pickadate();" id="waktu_kosong" value="<?php echo set_value('waktu_kosong');?>">
</div>


<div class="input-field col s4">
	<?php echo form_label('Harga Permintaan','harga_permintaan'); 
	$data = array(
		'class'=>'validate',
		'id'=>'harga_permintaan',
		'name'=>'harga_permintaan',
		'value'=>set_value('harga_permintaan')
		);
	echo form_input($data); echo form_error('harga_permintaan'); ?>
</div>

<div class="input-field col s4">
	<?php echo form_label('Harga Minimal','hargamin'); 
	$data = array(
		'class'=>'validate',
		'id'=>'hargamin',
		'name'=>'hargamin',
		'value'=>set_value('hargamin')
		);
	echo form_input($data); echo form_error('hargamin'); ?>
</div>

<div class="input-field col s4">
	<?php echo form_label('Penawaran Terakhir','tawar_akhir');
	$data = array(
		'class'=>'validate',
		'id'=>'tawar_akhir',
		'name'=>'tawar_akhir',
		'value'=>set_value('tawar_akhir')
		);
	echo form_input($data); echo form_error('tawar_akhir'); ?>
	<br><br><br>
</div>

<p style="visibility: hidden;">Data Perjanjian</p>

<h5 align="center" id="dataperjanjian" class="section scrollspy">Data Perjanjian</h5>


<div class="input-field col s12">
<?php echo form_label('Tanggal Perjanjian','tanggal');?>
<br>
</div>

<div class="input-field col s12">
<input type="date" name="tanggal" class="datepicker" 
onclick="$('.datepicker').pickadate();" id="tanggal" value="<?php echo set_value('tanggal');?>">
</div>

<div class="input-field col s4">
	<?php echo form_label('Nama Perwakilan','namawakil');
	$data = array(
		'class'=>'validate',
		'id'=>'namawakil',
		'name'=>'namawakil',
		'value'=>set_value('namawakil')
		);
	echo form_input($data); echo form_error('namawakil'); ?>
</div>

<div class="input-field col s4">
	<?php echo form_label('UserID Marketing','kodemarketing');
	$data = array(
		'class'=>'validate',
		'id'=>'kodemarketing',
		'name'=>'kodemarketing',
		'value'=>set_value('kodemarketing')
		);
	echo form_input($data); echo form_error('kodemarketing'); ?>
</div>

<div class="input-field col s4">
	<?php echo form_label('Nama Manager','namamanager');
	$data = array(
		'class'=>'validate',
		'id'=>'namamanager',
		'name'=>'namamanager',
		'value'=>set_value('namamanager')
		);
	echo form_input($data); echo form_error('namamanager'); ?>
</div>



<div class="col s12">
	<?php 
	$data = array(
		'class'=>'btn yellow black-text',
		'name'=>'submit',
		'value'=>'Insert',
		);
	echo form_submit($data);?>
</div>


<?php echo form_close(); ?>
</div>

    <div class="col hide-on-med-and-down m3 l2">
      <div class="toc-wrapper">
        <div style="">
	      <ul class="section table-of-contents">
	        <li><a href="#jenistrans">Jenis Transaksi</a></li>
	        <li><a href="#dataproperti">Data Properti</a></li>
	        <li><a href="#datapenjual">Data Penjual</a></li>
	        <li><a href="#datapemasaran">Data Pemasaran</a></li>
	        <li><a href="#dataperjanjian">Data Perjanjian</a></li>
	      </ul>
        </div>
      </div>
    </div>



</div>

</div>


</div>
</div>
</main> 
<?php $this->load->view('templates/footer');?>
 <?php foreach ($listing as $list) { ?>
 <div class="modal-content">
    <?php
    
    $data['kode_listing'] = $list->kode_listing;
    $data['kode_properti'] = $list->kode_properti;
    $data['kode_penjual'] = $list->kode_penjual;
    $data['kode_pemasaran'] = $list->kode_pemasaran;
    $attributes = array('id'=>'update_form','class'=>'col s12', 'name'=> 'update'. $list->kode_listing);
    echo form_open('listing/update_listing/', $attributes); ?>

    <input type = "hidden" id="klis" name ="kode_listing" value= "<?php echo $list->kode_listing; ?>" />
    <input type = "hidden" id="kpro" name ="kode_properti" value= "<?php echo $list->kode_properti; ?>" />
    <input type = "hidden" id="kpen" name ="kode_penjual" value= "<?php echo $list->kode_penjual; ?>" />
    <input type = "hidden" id="kpem" name ="kode_pemasaran" value= "<?php echo $list->kode_pemasaran; ?>" />

    <h5>Update Listing</h5><hr>
    <h5 align="center">Jenis Transaksi</h5>

    <div class="row">
    <div class="col s12 l12 no-padding">

    <div class="input-field col s12">
      <?php $data = array(
              'type'=>'checkbox',
                'name'          => 'jtrans[]',
                'id'            => 'Dijual',
                'value'            => 'Dijual',
      );
      echo form_checkbox($data);
      echo form_label('Dijual','Dijual');
      $data = array(
              'type'=>'checkbox',
                'name'          => 'jtrans[]',
                'id'            => 'Disewakan',
                'value'            => 'Disewakan',
      );
      echo form_checkbox($data);
      echo form_label('Disewakan','Disewakan');
      ?>
      <br><br>
    </div>
    <br><br><br>
    <h5 align="center">Data Properti</h5>

    <div class="input-field col s12">
    <?php echo form_label('Alamat','alamat_properti');
    $data = array(
      'class'=>'validate',
      'value'=> $list->alamat_properti,
      'id'=>'alamat_properti',
      'name'=>'alamat_properti');
    echo form_input($data);?>
    </div>

    <div class="input-field col l4">
    <?php echo form_label('Kode Pos','kode_pos');
    $data = array(
      'class'=>'validate',
      'value'=> $list->kode_pos,
      'id'=>'kode_pos',
      'name'=>'kode_pos',
      );
    echo form_input($data);?>
    </div>

    <div class="input-field col l4">
    <?php echo form_label('Kelurahan','kelurahan');
    $data = array(
      'class'=>'validate',
      'id'=>'kelurahan',
      'value'=> $list->kelurahan,
      'name'=>'kelurahan',
      );
    echo form_input($data);?>
    </div>

    <div class="input-field col l4">
    <?php echo form_label('Kecamatan','kecamatan');
    $data = array(
      'class'=>'validate',
      'id'=>'kecamatan',
      'value'=> $list->kecamatan,
      'name'=>'kecamatan',
      );
    echo form_input($data);?>
    </div>

    <div id ="spacex" name="here" class="input-field col s12">
    <?php $options = array(
                      'Rumah Tinggal'  => 'Rumah Tinggal',
                      'Ruko / R. Usaha'    => 'Ruko / R. Usaha',
                      'Apartement'   => 'Apartement',
                      'Villa / Resort' => 'Villa / Resort',
                      'Kavling' => 'Kavling',
                    );
    echo form_dropdown('tpp', $options, $list->tipe_properti,'id="tpp"');
    echo form_label('Tipe Properti');
    ?>
    </div>

    <div class="input-field col s6">
    <?php echo form_label('Luas Tanah (m<sup>2</sup>)', 'luas_tanah');
    $data = array(
      'class'=>'validate',
      'id'=>'luas_tanah',
      'value'=> $list->luas_tanah,
      'name'=>'luas_tanah',
      );
    echo form_input($data);?>
    </div>

    <div class="input-field col s6">
    <?php echo form_label('Luas Bangunan (m<sup>2</sup>)','luas_bangunan');
    $data = array(
      'class'=>'validate',
      'id'=>'luas_bangunan',
      'value'=> $list->luas_bangunan,
      'name'=>'luas_bangunan',
      );
    echo form_input($data);?>
    </div>

    <div class="input-field col s6">
      <?php echo form_label('Orientasi','orientasi');
        $data = array(
        'class'=>'validate',
        'id'=>'orientasi',
        'value'=> $list->orientasi,
        'name'=>'orientasi',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s6">
      <?php echo form_label('Tingkat / Lantai','tingkat'); 
      $data = array(
        'class'=>'validate',
        'id'=>'tingkat',
        'value'=> $list->tingkat,
        'name'=>'tingkat',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s6">
    <?php echo form_label('Kamar Tidur','kamar_tidur');
    $data = array(
      'class'=>'validate',
      'id'=>'kamar_tidur',
      'value'=> $list->kamar_tidur,
      'name'=>'kamar_tidur',
      );
    echo form_input($data);?>
    </div>

    <div class="input-field col s6">
      <?php echo form_label('Kamar Mandi','kamar_mandi');
      $data = array(
        'class'=>'validate',
        'id'=>'kamar_mandi',
        'value'=> $list->kamar_mandi,
        'name'=>'kamar_mandi',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s12">
      <?php echo form_label('Ruangan Lainnya','rlain');
      $data = array(
        'class'=>'validate',
        'id'=>'rlain',
        'value'=> $list->ruangan_lain,
        'name'=>'rlain',
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
        'value'=> $list->listrik,
        'name'=>'listrik',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s3">
      <?php echo form_label('Telepon (line)','telepon'); 
      $data = array(
        'class'=>'validate',
        'id'=>'telepon',
        'value'=> $list->telepon,
        'name'=>'telepon',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s3">
      <?php echo form_label('AC (Set)','ac'); 
      $data = array(
        'class'=>'validate',
        'id'=>'ac',
        'value'=> $list->ac,
        'name'=>'ac',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s3">
      <?php echo form_label('Air','air');
      $data = array(
        'class'=>'validate',
        'id'=>'air',
        'value'=> $list->air,
        'name'=>'air',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s12">
      <?php echo form_label('Fasilitas Lain','flain'); 
      $data = array(
        'class'=>'validate',
        'id'=>'flain',
        'value'=> $list->fasilitas_lain,
        'name'=>'flain',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s12">
      <?php
        $options = array(
                        'HGB s/d tahun'  => 'HGB s/d tahun',
                        'Hak Milik'    => 'Hak Milik',
                        'Lain-lain'   => 'Lain-lain',
                      );
      echo form_dropdown('status_milik', $options, $list->status_kepemilikan,' id="status_milik"');
      echo form_label('Status Pemilikan (Sertifikat)');?>
      <br><br>
    </div>

    <h5 align="center">Data Penjual</h5>

    <div class="input-field col s12">
      <?php echo form_label('Nama','nama_penjual');
      $data = array(
        'class'=>'validate',
        'id'=>'nama_penjual',
        'value'=> $list->nama_penjual,
        'name'=>'nama_penjual',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s12">
      <?php echo form_label('Alamat','alamat_penjual');
      $data = array(
        'class'=>'validate',
        'id'=>'alamat_penjual',
        'value'=> $list->alamat_penjual,
        'name'=>'alamat_penjual',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s12">
      <?php echo form_label('Email','email_penjual');
      $data = array(
        'class'=>'validate',
        'id'=>'email_penjual',
        'value'=> $list->email_penjual,
        'name'=>'email_penjual',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s12">
      <?php
        $options = array(
                        'Belum Kawin'  => 'Belum Kawin',
                        'Kawin'    => 'Kawin',
                        'Cerai Hidup'   => 'Cerai Hidup',
                        'Cerai Mati'   => 'Cerai Mati',
                      );
      echo form_dropdown('status_perkawinan', $options, $list->status_kawin_penjual,' id="status_perkawinan"');
      echo form_label('Status Perkawinan');
      ?>
    </div>

    <div class="input-field col s6">
        <?php echo form_label('No. Telepon','notelp'); 
        $data = array(
          'class'=>'validate',
          'id'=>'notelp',
          'value'=> $list->no_telepon_penjual,
          'name'=>'notelp',
          );
    echo form_input($data);?>
    </div>

    <div class="input-field col s6">
      <?php echo form_label('No. HP','no_hp');
      $data = array(
        'class'=>'validate',
        'id'=>'no_hp',
        'value'=> $list->no_hp_penjual,
        'name'=>'no_hp',
        );
      echo form_input($data);?>
    <br><br><br>
    </div>

    <h5 align="center">Data Pemasaran</h5>

    <div class="input-field col s12">
        <?php echo form_label('Nama Disertifikat','nama_disertif');
        $data = array(
          'class'=>'validate',
          'id'=>'nama_disertif',
          'value'=> $list->nama_disertifikat,
          'name'=>'nama_disertif',
          );
        echo form_input($data);?>
    </div>

    <div class="input-field col s12">
        <?php echo form_label('Hubungan penjual dengan nama di sertifikat','hub_disertif'); 
        $data = array(
          'class'=>'validate',
          'id'=>'hub_disertif',
          'value'=> $list->hub_penjual,
          'name'=>'hub_disertif',
          );
        echo form_input($data);?>
    </div>
    <div class="input-field col s12">
      <?php echo form_label('Waktu Pengosongan','waktu_kosong');?>
      <br>
    </div>

    <div class="input-field col s12">
    <input type="date" name="waktu_kosong" class="datepicker" 
    onclick="$('.datepicker').pickadate();" id="waktu_kosong" 
    value="<?php echo date("j-M-y", strtotime($list->waktu_pengosongan));?>">
    </div>


    <div class="input-field col s4">
      <?php echo form_label('Harga Permintaan','harga_permintaan'); 
      $data = array(
        'class'=>'validate',
        'id'=>'harga_permintaan',
        'value'=> $list->harga_permintaan,
        'name'=>'harga_permintaan',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s4">
      <?php echo form_label('Harga Minimal','hargamin');
      $data = array(
        'class'=>'validate',
        'id'=>'hargamin',
        'value'=> $list->harga_minimal,
        'name'=>'hargamin',
        );
      echo form_input($data);?>
    </div>

    <div class="input-field col s4">
      <?php echo form_label('Penawaran Terakhir','tawar_akhir');
      $data = array(
        'class'=>'validate',
        'id'=>'tawar_akhir',
        'value'=> $list->penawaran_terakhir,
        'name'=>'tawar_akhir',
        );
      echo form_input($data);?>
      <br><br><br>
    </div>

    <h5 align="center">Data Perjanjian</h5>

    <div class="input-field col s12">
      <?php echo form_label('Tanggal Perjanjian','tanggal');?>
      <br>
    </div>

    <div class="input-field col s12">
      <input type="date" name="tanggal" value="<?php echo date("j-M-y", strtotime($list->tanggal));?>" class="datepicker" onclick="$('.datepicker').pickadate();" id="tanggal">
    </div>

    <div class="input-field col s4">
      <?php echo form_label('Nama Perwakilan','namawakil');
      $data = array(
        'class'=>'validate',
        'id'=>'namawakil',
        'value'=> $list->nama_perwakilan,
        'name'=>'namawakil',
        );
        echo form_input($data);?>
    </div>

    <div class="input-field col s4">
      <?php echo form_label('Nama Marketing','namamarketing');
      $data = array(
        'class'=>'validate',
        'id'=>'namamarketing',
        'value'=> $list->nama_marketing,
        'name'=>'namamarketing',
        );
        echo form_input($data);?>
    </div>

    <div class="input-field col s4">
      <?php echo form_label('Nama Manager','namamanager'); 
      $data = array(
        'class'=>'validate',
        'id'=>'namamanager',
        'value'=> $list->nama_manager,
        'name'=>'namamanager',
        );
        echo form_input($data);?>
      </div>
    </div>
  </div>
</div>

<div class="modal-footer">
  <?php 
  $toast = "Materialize.toast('Data Updated !', 8000)";
  $data = array(
    'class'=>'btn green darken-1',
    'name'=>'submit' . $list->kode_properti,
    'value'=>'Update',
    'onclick'=> $toast
    );
  echo form_submit($data);?>
  <?php echo form_close(); ?>
  <a class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
</div>
<?php } ?>
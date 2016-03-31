<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidenav');?>
<main>
  <div class="section no-pad-bot">
  <?php $this->load->view('templates/header');?>

  <div class="row">
    <nav class="grey darken-4" >
      <div class="nav-wrapper">
        <div class="col s12">
          <font size="5" class="hide-on-med-and-down">Transaksi</font>
          <div style="float: right;">
            <a href="<?php echo site_url() ?>home" class="breadcrumb">Beranda</a>
            <a href="<?php echo site_url() ?>transaksi" class="breadcrumb">Transaksi</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div class="row">
      <div class="col s12">
        <br><br>
        <?php
             //jika data tidak ada di dalam database
             if(empty($transaksi)){
                echo "Data transaksi anda kosong";
             } else {
        ?>
        <table class="highlight">
        <thead>
          <tr>
            <th>Kode Transaksi</th>
            <th>Alamat Properti</th>
            <th>Tipe Properti</th>
            <th>Pelanggan</th>
            <th>Jenis Transaksi</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tr>
        <?php foreach ($transaksi as $list) { ?>
          <td><?php echo $list->kode_transaksi; ?></td>
          <td><?php echo $list->alamat_properti; ?></td>
          <td><?php echo $list->tipe_properti; ?></td>
          <td><?php echo $list->nama_pelanggan; ?></td>
          <td><?php echo $list->jenis_transaksi_akhir; ?></td>
          <td><?php echo number_format($list->harga,0,',','.'); ?></td>
          <td><?php echo $list->status; ?></td>
          <td>
          <a id="<?php echo $list->kode_transaksi; ?>" name="edit" onclick="reset()"
          data-kpel="<?php echo $list->kode_pelanggan; ?>" 
          class="modal-trigger" href="#modal">Update</a>
          </td>
          </tr>       
          <?php } ?>
        </table>
        <?php } ?>
      </div></div></div>
</main>    



<div id="modal" class="modal modal-fixed-footer">
  <div class="modal-content">
  <?php
   if(!empty($transaksi)){
    $data['kode_transaksi'] = $list->kode_transaksi;
    $data['kode_penjual'] = $list->kode_penjual;
    $attributes = array('id'=> 'update_form' ,'class'=>'col s12', 'name'=> 'update'. $list->kode_transaksi);
    echo form_open_multipart('transaksi/update_transaksi/', $attributes); ?>
  <input type = "hidden" id="isvalid" value= "" />
  <input type = "hidden" id="ktr" name ="kode_transaksi" value= "<?php echo $list->kode_transaksi; ?>" />
  <input type = "hidden" id="kpel" name ="kode_pelanggan" value= "<?php echo $list->kode_pelanggan; ?>" />
  <input type = "hidden" id="jtrans" name ="jenis_transaksi_akhir" value= "<?php echo $list->jenis_transaksi_akhir; ?>" />
  <h5>Update Transaksi</h5>
  <hr>

  <ul class="collapsible" data-collapsible="accordion">
  <li>
    <div class="collapsible-header"><i class="material-icons">toc</i>Detail Listing</div>
    <div class="collapsible-body">
    <p>Alamat Properti : <span id="alamat_properti"><?php echo $list->alamat_properti?></span><br>
    Tipe Properti : <span id="tipe_properti"><?php echo $list->tipe_properti?></span><br>
    Tanggal Listing : <span id="tanggal"><?php echo date("j-M-y", strtotime($list->tanggal));?></span><br>
    Marketing : <span id="nama_marketing"><?php echo $list->nama_marketing?></span>
    </p>
    </div>
  </li>
</ul>

    <div class="row">
    <div class="col s12 l12 no-padding">

<!--   <div class="input-field col s12">
  <?php echo form_label('Jenis Transaksi','jtrans');?>
  <br><br>
    <input class="with-gap" type="radio" name="jtrans" value="Jual" id="jual" checked = "" />
    <label for="jual">Jual</label>
    <input class="with-gap" type="radio" name="jtrans" value="Sewa" id="sewa" checked = ""/>
    <label for="sewa">Sewa</label>
    <br><br>
  </div> -->
  
  <div class="input-field col s12">
  <?php echo form_label('Harga','harga');
  $data = array(
    'class'=>'validate',
    'value'=> $list->harga,
    'id'=>'harga',
    'name'=>'harga');
  echo form_input($data);?>
  </div>
  
  <div class="input-field col s12">
    <?php $options = array(
                      'Batal'  => 'Batal',
                      'Nego'  => 'Nego',
                      'Diproses'    => 'Diproses',
                      'DP'    => 'DP',
                      'Lunas'    => 'Lunas',
                      'Selesai'   => 'Selesai',
                    );
    echo form_dropdown('status', $options, 'Nego','id="status"');
    echo form_label('Status');?>
  </div>

      <div class="input-field col s12">
      <?php echo form_label('Tanggal Transaksi','tgl_transaksi');?>
      <br>
    </div>

    <div class="input-field col s12">
      <input type="date" name="tgl_transaksi" value="<?php echo date("j-M-y", strtotime($list->tanggal));?>" 
      class="datepicker" onclick="$('.datepicker').pickadate();" id="tgl_transaksi">
    </div>

<div id="kpr_div" class="input-field col s12">
  <input type="hidden" name="kode_data_jual" id="kode_data_jual">
  <?php echo form_label('KPR','kpr');?><br><br>
    <input class="with-gap" type="radio" name="kpr" value="Ya" id="ya" checked = "" />
    <label for="ya">Ya</label>
    <input class="with-gap" type="radio" name="kpr" value="Tidak" id="tidak" checked = ""/>
    <label for="tidak">Tidak</label><br><br>

    <div class="file-field input-field col l6">
      <br><?php echo form_label('KTP Penjual');?><br>
      <div class="btn">
        File<input type="file" name="fotoktpjual" onchange="readURL(this);">
      </div>
      <div class="file-path-wrapper">
        <?php
        $data = array(
          'type'=>'text',
          'class'=>'file-path validate',
          'id'=>'foto_ktp_jual',
          'name'=>'foto_ktp_jual',
          'placeholder'=>'Unggah foto KTP',
          //'value'=>set_value('foto_marketing')
          );
        echo form_input($data);?>
      </div>
      <img id="kjprev" alt="" src="" class="responsive-img" />
    </div>

    <div class="file-field input-field col l6">
      <br>
      <?php echo form_label('KTP Pembeli');?>
      <br>
      <div class="btn">
        File<input type="file" name="fotoktpbeli" onchange="readURL(this);">
      </div>
      <div class="file-path-wrapper">
        <?php
        $data = array(
          'type'=>'text',
          'class'=>'file-path validate',
          'id'=>'foto_ktp_beli',
          'name'=>'foto_ktp_beli',
          'placeholder'=>'Unggah foto KTP',
          //'value'=>set_value('foto_marketing')
          );
        echo form_input($data);?>
      </div>
      <img id="kbprev" alt="" src="" class="responsive-img" />
    </div>

    <div class="file-field input-field col l6">
      <br><?php echo form_label('NPWP Penjual');?><br>
      <div class="btn">
        File<input type="file" name="fotonpwpjual" onchange="readURL(this);">
      </div>
      <div class="file-path-wrapper">
      <?php
      $data = array(
        'type'=>'text',
        'class'=>'file-path validate',
        'id'=>'foto_npwp_jual',
        'name'=>'foto_npwp_jual',
        'placeholder'=>'Unggah foto NPWP',
        );
      echo form_input($data);?>
      </div>
      <img id="njprev" alt="" src="" class="responsive-img" />
    </div>

    <div class="file-field input-field col l6">
      <br><?php echo form_label('NPWP Pembeli');?><br>
      <div class="btn">
        File
        <input type="file" name="fotonpwpbeli" onchange="readURL(this);">
      </div>
      <div class="file-path-wrapper">
        <?php
        $data = array(
          'type'=>'text',
          'class'=>'file-path validate',
          'id'=>'foto_npwp_beli',
          'name'=>'foto_npwp_beli',
          'placeholder'=>'Unggah foto NPWP',
          //'value'=>set_value('foto_marketing')
          );
        echo form_input($data);?>
      </div>
      <img id="nbprev" alt="" src="" class="responsive-img" />
    </div>


    <div class="file-field input-field col l6">
      <br><?php echo form_label('Surat Nikah Penjual');?><br>
      <div class="btn">
        File
        <input type="file" name="fotosuratnikahjual" onchange="readURL(this);">
      </div>
      <div class="file-path-wrapper">
        <?php
        $data = array(
          'type'=>'text',
          'class'=>'file-path validate',
          'id'=>'foto_surat_nikah_jual',
          'name'=>'foto_surat_nikah_jual',
          'placeholder'=>'Unggah foto surat nikah',
          //'value'=>set_value('foto_marketing')
          );
        echo form_input($data);?>
      </div>
      <img id="sjprev" alt="" src="" class="responsive-img" />
    </div>

    <div class="file-field input-field col l6">
      <br><?php echo form_label('Surat Nikah Pembeli');?><br>
      <div class="btn">
        File<input type="file" name="fotosuratnikahbeli" onchange="readURL(this);">
      </div>
      <div class="file-path-wrapper">
        <?php
        $data = array(
          'type'=>'text',
          'class'=>'file-path validate',
          'id'=>'foto_surat_nikah_beli',
          'name'=>'foto_surat_nikah_beli',
          'placeholder'=>'Unggah foto surat nikah',
          //'value'=>set_value('foto_marketing')
          );
        echo form_input($data);?>
      </div>
      <img id="sbprev" alt="" src="" class="responsive-img" />
    </div>

</div>

<div id="lama_sewa_div" class="input-field col s12">
  <input type="hidden" name="kode_data_sewa" id="kode_data_sewa">
  <?php echo form_label('Lama Sewa','lama_sewa');
  $data = array(
    'class'=>'validate',
    'id'=>'lama_sewa',
    'value'=>'0',
    'name'=>'lama_sewa',
    );
  echo form_input($data);?>


  <div class="file-field input-field col l6">
    <br><?php echo form_label('KTP Pemilik');?><br>
    <div class="btn">
      File
      <input type="file" name="fotoktpmilik" onchange="readURL(this);">
    </div>
    <div class="file-path-wrapper">
      <?php
      $data = array(
        'type'=>'text',
        'class'=>'file-path validate',
        'id'=>'foto_ktp_milik',
        'name'=>'foto_ktp_milik',
        'placeholder'=>'Unggah foto KTP',
        //'value'=>set_value('foto_marketing')
        );
      echo form_input($data);?>
    </div>
      <img id="kmprev" alt="" src="" class="responsive-img"/>
  </div>


  <div class="file-field input-field col l6">
    <br>
    <?php echo form_label('KTP Penyewa');?>
    <br>
    <div class="btn">
          File
          <input type="file" name="fotoktpsewa" onchange="readURL(this);">
       </div>
       <div class="file-path-wrapper">
      <?php
      $data = array(
        'type'=>'text',
        'class'=>'file-path validate',
        'id'=>'foto_ktp_sewa',
        'name'=>'foto_ktp_sewa',
        'placeholder'=>'Unggah foto KTP',
        //'value'=>set_value('foto_marketing')
        );
      echo form_input($data);?>
    </div>
    <img id="ksprev" alt="" src="" class="responsive-img" />
  </div>

</div>

  <h5 align="center">Data Pelanggan</h5>

      <div class="input-field col s12">
        <?php echo form_label('Nama','nama_pelanggan');
        $data = array(
          'class'=>'validate',
          'id'=>'nama_pelanggan',
          'value'=> $list->nama_pelanggan,
          'name'=>'nama_pelanggan',
          );
        echo form_input($data);?>
      </div>

      <div class="input-field col s12">
        <?php echo form_label('Alamat','alamat_pelanggan');
        $data = array(
          'class'=>'validate',
          'id'=>'alamat_pelanggan',
          'value'=> $list->alamat_pelanggan,
          'name'=>'alamat_pelanggan',
          );
        echo form_input($data);?>
      </div>

      <div class="input-field col s12">
        <?php echo form_label('Email','email_pelanggan');
        $data = array(
          'class'=>'validate',
          'id'=>'email_pelanggan',
          'value'=> $list->email_pelanggan,
          'name'=>'email_pelanggan',
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
      echo form_dropdown('status_kawin_pelanggan', $options, $list->status_kawin_pelanggan,' id="status_kawin_pelanggan"');
      echo form_label('Status Perkawinan');
      ?>
    </div>

    <div class="input-field col s6">
        <?php echo form_label('No. Telepon','no_telepon_pelanggan'); 
        $data = array(
          'class'=>'validate',
          'id'=>'no_telepon_pelanggan',
          'value'=> $list->no_telepon_pelanggan,
          'name'=>'no_telepon_pelanggan',
          );
    echo form_input($data);?>
    </div>

    <div class="input-field col s6">
      <?php echo form_label('No. HP','no_hp_pelanggan');
      $data = array(
        'class'=>'validate',
        'id'=>'no_hp_pelanggan',
        'value'=> $list->no_hp_pelanggan,
        'name'=>'no_hp_pelanggan',
        );
      echo form_input($data);?>
    </div>
</div>
</div>
</div>

          <div class="modal-footer">
            <?php 
            $data = array(
              'id' =>'btnUpdate',
              'class'=>'btn green darken-1',
              'name'=>'submit' . $list->kode_properti,
              'value'=>'Update',
              );
            echo form_submit($data);?>
            <?php echo form_close();?>
            <a class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            <?php }?>
          </div>
</div>


<?php $this->load->view('templates/footer');?>

<script type="text/javascript">

function reset(){
  $('#isvalid').val("yes");
}


  $('a[name="edit"]').click(function(e) {

// var tpro = $(this).data('tpro');
// $("#tpp").attr('value',tpro);

$('#ktr').val(this.id);
$('#kpel').val($(this).data('kpel'));

    var base_url = window.location.href;
    var listingurl = base_url + '/selectedtransaksi/' + this.id;
    $.ajax({
        url : listingurl,
        type : 'post',
        success : function(data){
          var obj = JSON.parse(data);


          if(obj.jenis_transaksi_akhir=="Jual"){
            $jualpath='http://localhost/CodeIgniter/assets/images/kelengkapan data jual/';
            $("#jtrans").val(obj.jenis_transaksi_akhir);
            $('#kode_data_jual').val(obj.kode_data_jual);
            $('#foto_ktp_jual').val(obj.foto_ktp_jual);
            $('#foto_ktp_beli').val(obj.foto_ktp_beli);
            $('#foto_npwp_jual').val(obj.foto_npwp_jual);
            $('#foto_npwp_beli').val(obj.foto_npwp_beli);
            $('#foto_surat_nikah_jual').val(obj.foto_surat_nikah_jual);
            $('#foto_surat_nikah_beli').val(obj.foto_surat_nikah_beli);
            $('#kjprev').attr('src', $jualpath + obj.foto_ktp_jual + '?timestamp=' + new Date().getTime());
            $('#kbprev').attr('src', $jualpath + obj.foto_ktp_beli + '?timestamp=' + new Date().getTime());
            $('#njprev').attr('src', $jualpath + obj.foto_npwp_jual + '?timestamp=' + new Date().getTime());
            $('#nbprev').attr('src', $jualpath + obj.foto_npwp_beli + '?timestamp=' + new Date().getTime());
            $('#sjprev').attr('src', $jualpath + obj.foto_surat_nikah_jual + '?timestamp=' + new Date().getTime());
            $('#sbprev').attr('src', $jualpath + obj.foto_surat_nikah_beli + '?timestamp=' + new Date().getTime());

            if(obj.kpr=="Ya"){
              $("#ya").prop('checked', 'checked');
            } else {
              $("#tidak").prop('checked', 'checked');
            }
            //$('#kpr').val(obj.kpr);
            $('#kpr_div').show();
            $('#lama_sewa_div').hide();
          } else {
            $sewapath='http://localhost/CodeIgniter/assets/images/kelengkapan data sewa/';
            $("#jtrans").val(obj.jenis_transaksi_akhir);
            $('#kode_data_sewa').val(obj.kode_data_sewa);
            $('#lama_sewa').val(obj.lama_sewa);
            $('#foto_ktp_milik').val(obj.foto_ktp_milik);
            $('#foto_ktp_sewa').val(obj.foto_ktp_sewa);
            $('#kmprev').attr('src', $sewapath + obj.foto_ktp_milik + '?timestamp=' + new Date().getTime());
            $('#ksprev').attr('src', $sewapath + obj.foto_ktp_sewa + '?timestamp=' + new Date().getTime());
            

            $('#lama_sewa_div').show();
            $('#kpr_div').hide();
          }
            $('#alamat_properti').html(obj.alamat_properti);
            $('#tipe_properti').html(obj.tipe_properti);
            $('#tanggal').html(obj.tanggal);
            $('#nama_marketing').html(obj.nama_marketing);

            $('#harga').val(obj.harga);
            $('#status').val(obj.status);
            $('#tgl_transaksi').val(obj.tgl_transaksi);        
            $('#nama_pelanggan').val(obj.nama_pelanggan);
            $('#alamat_pelanggan').val(obj.alamat_pelanggan);
            $('#email_pelanggan').val(obj.email_pelanggan);
            $('#status_kawin_pelanggan').val(obj.status_kawin_pelanggan);
            $('#no_telepon_pelanggan').val(obj.no_telepon_pelanggan);
            $('#no_hp_pelanggan').val(obj.no_hp_pelanggan);
            $('select').material_select();
        }
    });

    });

$('#update_form').submit(function(event){
  if($('#isvalid').val()=="no"){
    event.preventDefault();
    Materialize.toast("Data yang tidak valid tidak dapat diupdate", 2000);
  } else {
    Materialize.toast("Data berhasil diupdate!", 2000);
  }
});

$('#btnUpdate').mouseover(function(event){
  //$('input').focusout(function(event){
   //event.preventDefault();
   //var jtrans = $('#jtrans').val();
  var idtrans = $('#ktr').val();
  var harga = $('#harga').val();
  var nama_pembeli = $('#nama_pelanggan').val();
  var alamat_pembeli = $('#alamat_pelanggan').val();
  var email_pembeli = $('#email_pelanggan').val();
  var no_telepon_pelanggan = $('#no_telepon_pelanggan').val();
  var no_hp_pelanggan = $('#no_hp_pelanggan').val();
  var lama_sewa = $('#lama_sewa').val();

  var base_url = window.location.href;
  var transurl = base_url + '/validate_transaksi/1';

  $.ajax({
          type: 'POST',
          url: transurl,
          data: {
           'idtrans': idtrans,
           'harga': harga,
           'nama_pembeli': nama_pembeli,
           'alamat_pembeli': alamat_pembeli,
           'email_pembeli': email_pembeli,
           'no_telepon_pelanggan': no_telepon_pelanggan,
           'no_hp_pelanggan': no_hp_pelanggan,
           'lama_sewa': lama_sewa,
          },
          success: function(results){
                //alert(results);
                Materialize.toast(results, 2000);
                //$('#insidemodal').html(results)
                //return false;
                if(results==""){
                  $('#isvalid').val("yes");
                } else {
                  $('#isvalid').val("no");
                }
          }
    });


});

</script>
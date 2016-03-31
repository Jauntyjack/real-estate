<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidenav');?>
<main>
  <div class="section no-pad-bot">
    <div class="row">
      <nav class="grey darken-4" >
        <div class="nav-wrapper">
          <div class="col s12">
            <font size="5" class="hide-on-med-and-down">Properti</font>
            <div style="float: right;">
              <a href="<?php echo site_url() ?>home" class="breadcrumb">Beranda</a>
              <a href="<?php echo site_url() ?>properti" class="breadcrumb">Properti</a>
              <a href="<?php echo site_url() ?>properti" class="breadcrumb">Cari</a>
            </div>
          </div>
        </div>
      </nav>
    </div>

<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">

    <div class="row">

      <?php foreach ($properti as $pro) { ?>
      <div id="sliderleft" class="col s12 l6">
        <div id="detailleft">
          <div class="col s12 l12 z-depth-1 ">
            <span>
              <h4><?php echo $pro->jenis_transaksi ?></h4>
              <h5>
              <?php $price = number_format($pro->penawaran_terakhir,0,',','.'); echo "Rp. ".$price; ?>
              </h5> 
              Tipe Properti : <?php echo $pro->tipe_properti ?><br>
              Alamat : <?php echo $pro->alamat_properti?>, <?php echo $pro->kelurahan?> <br>
              Status Kepemilikan : <?php echo $pro->status_kepemilikan ?> <br><br>
            </span>
          </div>
          <br><br><br><br><br><br><br><br><br>
        </div>
        <div class="slider">
          <ul class="slides">
            <?php 
              $gambar = explode("/", $pro->gambar); $size = count($gambar);
              if($gambar[0]=="") { ?>
                <li><img src="<?php echo base_url() ?>assets/images/properti/default.jpg"></li>
              <?php } else { 
              for($i=0;$i<$size;$i++){ ?>
            <li>
              <img src="<?php echo base_url()?>assets/images/properti/<?php echo $pro->kode_properti ."/". $gambar[$i];?>"  >
            </li>
            <?php } }?>


          </ul>
        </div>  
      </div>


    <div class="row">
<div id ="menubeli" class="col s12 l6 z-depth-1">

<h5 id="customer">Data Pembeli</h5>


<?php $attributes = array('class'=>'col s12','id'=> 'purchase_form');
echo form_open('transaksi', $attributes);
echo form_hidden('dopurchase', 'yes');
echo form_hidden('kode_listing', $pro->kode_listing); 
echo form_hidden('jenis_transaksi_akhir', 'Empty'); 
?>
<input type = "hidden" id="isvalid" value= "" />

<div class="input-field col s12" id="pnx">
  <?php echo form_label('Nama','nama_pelanggan');
  $data = array(
    'class'=>'validate',
    'id'=>'nama_pelanggan',
    'name'=>'nama_pelanggan',
    );
  echo form_input($data); echo form_error('nama_pelanggan');?>
</div>

<div class="input-field col s12">
  <?php echo form_label('Alamat','alamat_pelanggan');
  $data = array(
    'class'=>'validate',
    'id'=>'alamat_pelanggan',
    'name'=>'alamat_pelanggan',
    );
  echo form_input($data);?>
</div>

<div class="input-field col s12">
  <?php echo form_label('Email','email_pelanggan');
  $data = array(
    'class'=>'validate',
    'id'=>'email_pelanggan',
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
    );
  echo form_input($data);?>
</div>

<div class="input-field col s6">
  <?php echo form_label('No. HP','no_hp');
  $data = array(
    'class'=>'validate',
    'id'=>'no_hp',
    'name'=>'no_hp',
    );
  echo form_input($data);?>
  <br>
</div>

<div class="input-field col s12">
  <?php echo form_label('Harga Penawaran','harga');
  $data = array(
    'class'=>'validate',
    'id'=>'harga',
    'name'=>'harga',
    );
  echo form_input($data);?>
</div>

<div class="input-field col s12">
  <?php echo form_label('UserID Marketing','userid');
  $data = array(
    'class'=>'validate',
    'id'=>'userid',
    'name'=>'userid',
    );
  echo form_input($data);?>
  <br>
</div>

<div id="bel">
  <div class="input-field col s12">
  <?php echo form_label('KPR','kpr');?>
  <br>
    <input class="with-gap" type="radio" name="kpr" value="Ya" id="ya" checked = "" />
    <label for="ya">Ya</label>
    <input class="with-gap" type="radio" name="kpr" value="Tidak" id="tidak" checked = ""/>
    <label for="tidak">Tidak</label>
    <br><br><br>
  </div>
<input type="reset" onclick="purchase('beli')" class="btn red" style="float:right;" value="Cancel">
</div>

<div id="sew">
<div class="input-field col s12">
  <?php echo form_label('Lama Sewa','lama_sewa');
  $data = array(
    'class'=>'validate',
    'id'=>'lama_sewa',
    'name'=>'lama_sewa',
    );
  echo form_input($data);?>
  <br>
</div>
<input type="reset" onclick="purchase('sewa')" class="btn red" style="float:right;" value="Cancel">
</div>



  <?php 
  $data = array(
    'class'=>'btn green',
    'style'=>'float:right; margin-right: 10px;',
    'name'=>'submit',
    'id'=>'areasubmit',
    'value'=>'Submit',
    );
  echo form_submit($data);?>

<?php echo form_close(); ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>


      <div id="detailright" class="col s12 l6 z-depth-1">
          <span>
          <h4><?php echo $pro->jenis_transaksi ?></h4>
          <h5><?php $price = "Rp. " . number_format($pro->penawaran_terakhir,0,',','.'); echo $price; ?></h5> 

          

          Tipe Properti : <?php echo $pro->tipe_properti ?><br>
          Alamat : <?php echo $pro->alamat_properti?><br>
          Status Kepemilikan : <?php echo $pro->status_kepemilikan ?> <br><br>
          </span>
           <?php 
           $attributes = array('id'=>'compare_form');
              echo form_open('properti/compare', $attributes);?>
              

          <input type="hidden" name="doredir" value="yes">
          <input type="hidden" name="pids1" value="<?php echo $pro->kode_properti ?>">
          <input type="hidden" name="pal1" id="pal1" value="<?php echo $pro->alamat_properti ?>">
          <input type="hidden" name="pha1" id="pha1" value="<?php echo '<b>'.$price.'</b>'?> ">
          <input type="submit" class="btn indigo" style="float:right;" value="Komparasi">
          </form>
          <div class="chip">
            <img src="<?php echo site_url()?>/assets/images/marketing/<?php echo $pro->foto_marketing;?>">
            <?php echo $pro->nama_marketing; ?>
         </div>

          <?php $jtrans = explode("/", $pro->jenis_transaksi); $size = count($jtrans);
          if($size==2) { ?>
          <a id="btnsewa" onclick="purchase('sewa')" class="waves-effect waves-light btn green" style="float:right; margin-right: 10px;">Sewa</a>
          <a id="btnbeli" onclick="purchase('beli')" class="waves-effect waves-light btn green" style="float:right; margin-right: 10px;">Beli</a>
          <?php } else if($jtrans[0]=="Dijual"){ ?>
          <a id="btnbeli" onclick="purchase('beli')" class="waves-effect waves-light btn green" style="float:right; margin-right: 10px;">Beli</a>
          <?php } else {?>
            <a id="btnsewa" onclick="purchase('sewa')" class="waves-effect waves-light btn green" style="float:right; margin-right: 10px;">Sewa</a>
          <?php } ?>
          </a>
          <br><br>
      </div>
      
      <div class="col s12 l6 grey lighten-4 z-depth-1 no-padding">
      <br>
      <?php 
              $gambar = explode("/", $pro->gambar); $size = count($gambar);
              if($gambar[0]=="") {
                ?>
                <div class="col s6 m3 l3 no-padding">
                <img src="<?php echo base_url() ?>assets/images/properti/default.jpg" 
                class="materialboxed" width="100%" height="80px" style="float:left;">
                </div>
              <?php } else {
              for($i=0;$i<$size;$i++){ ?>
      <div class="col s6 m3 l3 no-padding">
      <img src="<?php echo base_url()?>assets/images/properti/<?php echo $pro->kode_properti ."/". $gambar[$i];?>" class="materialboxed" width="100%" height="80px" style="float:left;">
      </div>
      <?php } } ?>
      <br><br><br><br>
      </div>
    </div>
          
              <div class="row">
      <div class="col s12">
        <div class="col s12 grey lighten-4 z-depth-1">
          <span class="black-text">
          <h4>Spesifikasi</h4> 
          <hr style="color:#f5f5f5 ">   
          <div class="col s12 m6 l6">      
          <p>
          Luas Tanah / Bangunan: <?php echo $pro->luas_tanah?> / <?php echo $pro->luas_bangunan?><br>
          Tingkat : <?php echo $pro->tingkat?> <br>
          Orientasi : <?php echo $pro->orientasi?> <br>
          Kamar Tidur / Mandi : <?php echo $pro->kamar_tidur?> / <?php echo $pro->kamar_mandi?> <br>
          Ruangan Lainnya : <?php echo $pro->ruangan_lain ?> <br>
          Fasilitas Lain : <?php echo $pro->fasilitas_lain ?> <br>
          </p>
          </div>

          <div class = "col l6">
          <div class = "col l6">
          <div class="section">
            <h5><?php echo $pro->listrik ?> Watt</h5>
            Listrik
          </div>

          <div class="section">
            <h5><?php echo $pro->telepon ?> Line</h5>
            Telepon
          </div>
          </div>

          <div class = "col l6">
          <div class="section">
            <h5><?php echo $pro->ac ?> Set</h5>
            AC
          </div>

          <div class="section">
            <h5><?php echo $pro->air ?></h5>
            Air
          </div>
          </div>

          </div>
          </span>
        </div>
      </div>
    </div>  

        <?php } ?>


      </div>
      
      </div>
      </main>


<?php $this->load->view('templates/footer');?>


 <script type="text/javascript">

$('#purchase_form').submit(function(event){
  if($('#isvalid').val()=="no"){
    event.preventDefault();
    Materialize.toast("Pastikan data yang diinput valid", 2000);
  }
});

 $('#areasubmit').mouseover(function(event){
  var nama_pelanggan = $('#nama_pelanggan').val();
  var alamat_pelanggan = $('#alamat_pelanggan').val();
  var harga = $('#harga').val();
  var baseurl = $('#baseurl').val();
  var listingurl = baseurl + 'transaksi/validate_transaksi/2';

  $.ajax({
          type: 'POST',
          url: listingurl,
          data: {
           'nama_pelanggan': nama_pelanggan,
           'alamat_pelanggan': alamat_pelanggan,
           'harga': harga
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

 $('#btnbeli').click(function(){
  $('input:hidden[name=jenis_transaksi_akhir]').val('Jual');
  $('#customer').html('Data Pembeli');
 });

  $('#btnsewa').click(function(){
  $('input:hidden[name=jenis_transaksi_akhir]').val('Sewa');
  $('#customer').html('Data Penyewa');
 });

//purchase
$("#menubeli").hide();
$("#detailleft").hide();
$("#bel").hide();
$("#sew").hide();

 function purchase($kena){
    $("#menubeli").toggle('fast');
    $("#detailleft").toggle('fast');
    $("#detailright").toggle('fast');
    if($kena=="beli"){
      $("#bel").toggle('fast');
    } else if($kena=="sewa"){
      $("#sew").toggle('fast');
    } else {

    }
}


 $(document).ready(function()
{

$("#menubeli").hide();


});

      var slider = document.getElementById('range-input');
      noUiSlider.create(slider, {
       start: [0, 150],
       connect: true,
       step: 1,
       range: {
         'min': 0,
         'max': 1000
       },
       format: wNumb({
         decimals: 0
       })
      });
    </script>
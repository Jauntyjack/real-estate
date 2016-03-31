<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidenav');?>

<?php
header('Cache-Control: max-age=900');
?>

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

    <div class="row">
      <div class="col s12">

        <nav>
          <div class="nav-wrapper white" id="top">

            <div class="input-field">
              <input id="search" type="search" placeholder="Masukkan lokasi yang diinginkan" name="lokasi" value="<?php echo $pemula;?>">
              <label for="search"><i class="material-icons">room</i></label>
              <i class="material-icons">close</i>
            </div>



          </div>
        </nav>
        <br>
      </div>

      <div id="advmenu">
            <?php $attributes = array('id'=>'search_form','class'=>'col s12');
              echo form_open('properti', $attributes);?>
<?php echo form_hidden('dosearch', 'yes'); ?>
<input type="hidden" id="pemula" name="pemula" value="">

<div class="input-field col s12 m6 l6">

<div id="range">
</div>

  <br>
  <input type="hidden" id="search2" value="value">
  Kisaran Harga:
  <span class="example-val" id="minprice"><?php echo $minp ?></span>
  <span class="example-val" id="maxprice"><?php echo $maxp ?></span>

<input type="hidden" id="minp" name="minp" value="<?php echo $minp; ?>">
<input type="hidden" id="maxp" name="maxp" value="<?php echo $maxp; ?>">
</div>

        <div class="input-field col s12 m6 l6">
        <?php echo form_label('Alamat','alamat_properti');?>
        <?php $data = array(
          'class'=>'validate',
          'id'=>'alamat_properti',
          'name'=>'alamat_properti',
          'value'=>$alamat_properti
          );
        ?>
        <?php echo form_input($data);?>
        </div>
        

        <div class="input-field col s12 m6 l6">
          <?php $options = array(
                            ''  => 'Semua Tipe',
                            'Rumah Tinggal'  => 'Rumah Tinggal',
                            'Ruko / R. Usaha'    => 'Ruko / R. Usaha',
                            'Apartement'   => 'Apartement',
                            'Villa / Resort' => 'Villa / Resort',
                            'Kavling' => 'Kavling',
                          );
          echo form_dropdown('tipe_properti', $options, $tipe_properti,'id="tipe_properti"');
          echo form_label('Tipe Properti');
          ?>
        </div>

        <div class="input-field col s12 m6 l6">
          <?php $options = array(
                            'Dijual'  => 'Dijual',
                            'Disewakan'    => 'Disewakan',
                            ''  => 'Dijual / Disewakan',
                          );
          echo form_dropdown('jenis_transaksi', $options, $jenis_transaksi,'id="jenis_transaksi"');
          echo form_label('Status');
          ?>
        </div>


        <div class="input-field col s6 l3">
          <?php echo form_label('Luas Tanah Minimal (m<sup>2</sup>)', 'luas_tanah_min');
          $data = array(
            'class'=>'validate',
            'id'=>'luas_tanah_min',
            'name'=>'luas_tanah_min',
            'value'=>$luas_tanah_min,
            );
          echo form_input($data); //echo form_error('luas_tanah_min');?>
        </div>


        <div class="input-field col s6 l3">
          <?php echo form_label('Luas Tanah Maksimal (m<sup>2</sup>)','luas_tanah_max');
          $data = array(
            'class'=>'validate',
            'id'=>'luas_tanah_max',
            'name'=>'luas_tanah_max',
            'value'=>$luas_tanah_max,
            );
          echo form_input($data); //echo form_error('luas_tanah_max');?>
        </div>


        <div class="input-field col s6 l3">
          <?php echo form_label('Luas Bangunan Minimal (m<sup>2</sup>)', 'luas_bangunan_min');
          $data = array(
            'class'=>'validate',
            'id'=>'luas_bangunan_min',
            'name'=>'luas_bangunan_min',
            'value'=>$luas_bangunan_min,
            );
          echo form_input($data); //echo form_error('luas_bangunan_min');?>
        </div>


        <div class="input-field col s6 l3">
          <?php echo form_label('Luas Bangunan Maksimal (m<sup>2</sup>)','luas_bangunan_max');
          $data = array(
            'class'=>'validate',
            'id'=>'luas_bangunan_max',
            'name'=>'luas_bangunan_max',
            'value'=>$luas_bangunan_max,
            );
          echo form_input($data); //echo form_error('luas_bangunan_max');?>
        </div>


        <div class="input-field col l3 s6">
          <?php echo form_label('Orientasi','orientasi'); 
          $data = array(
            'class'=>'validate',
            'id'=>'orientasi',
            'name'=>'orientasi',
            'value'=>$orientasi,
            );
          echo form_input($data);?>
        </div>

        <div class="input-field col l3 s6">
          <?php echo form_label('Tingkat / Lantai Minimal','tingkat');
          $data = array(
            'class'=>'validate',
            'id'=>'tingkat',
            'name'=>'tingkat',
            'value'=>$tingkat,
            );
          echo form_input($data); //echo form_error('tingkat');?>
        </div>


        <div class="input-field col l3 s6">
          <?php echo form_label('Kamar Tidur Minimal','kamar_tidur');
          $data = array(
            'class'=>'validate',
            'id'=>'kamar_tidur',
            'name'=>'kamar_tidur',
            'value'=>$kamar_tidur,
            );
          echo form_input($data); //echo form_error('kamar_tidur');?>
        </div>

        <div class="input-field col l3 s6">
          <?php echo form_label('Kamar Mandi Minimal','kamar_mandi');
          $data = array(
            'class'=>'validate',
            'id'=>'kamar_mandi',
            'name'=>'kamar_mandi',
            'value'=>$kamar_mandi,
            );
          echo form_input($data); //echo form_error('kamar_mandi');?>
        </div>

      <div class="input-field col s6 l6">
        <?php
          $options = array(
                          ''   => 'Bebas',
                          'HGB'  => 'HGB',
                          'Hak Milik'    => 'Hak Milik',
                          'Lain-lain'   => 'Lain-lain',
                        );
        echo form_dropdown('status_milik', $options, $status_kepemilikan,' id="status_milik"');
        echo form_label('Status Pemilikan (Sertifikat)');
        ?>
        <br><br>
      </div>

      <div class="input-field col s6 l6">
          <?php $options = array(
                            'priceasc'  => 'Harga: Rendah ke Tinggi',
                            'pricedesc'  => 'Harga: Tinggi ke Rendah',
                            'newlisting'  => 'Entri Terbaru',
                          );
          echo form_dropdown('sortby', $options);
          echo form_label('Urut Berdasarkan');
          ?>
        <br><br>
      </div>


    </div>


    <div class="col s12 center-align">
      <?php 
      $data = array(
        'class'=>'btn yellow black-text',
        'name'=>'submit',
        'id'=>'yelcari',
        'value'=>'Cari'
        );
      echo form_submit($data);?>
    </div>
    </form>

    <div class="col s12">
      <p style="float: left;">
         <?php
            if(isset($propertifound)){
              if($propertifound>0){
                echo 'Menampilkan ' . $propertifound . ' hasil pencarian' . '<br><br>';                   
              } else {
                echo 'Hasil pencarian tidak dapat ditemukan';
              }        
            } 
         ?>
      </p>
      <p style="float: right;"><a href="#adv" id="adv">Tampilkan penelusuran lanjutan</a></p>
      <p style="float: right;"><a href="#adv2" id="adv2">Sembunyikan penelusuran lanjutan</a></p>
    <br><br><br>
<!--
<p style="float: right;">
          <?php $options = array(
                            'priceasc'  => 'Harga: Rendah ke Tinggi',
                            'pricedesc'  => 'Harga: Tinggi ke Rendah',
                          );
          echo form_dropdown('sortbyold', $options);
          ?>
          </p>
<p style="float: right; margin-top: 30px; margin-right: 10px;">Atur Berdasarkan: </p>
-->
    </div>

            <?php 
$err = validation_errors();
if($err!=""){
  echo '<div class="col s12 red-text">Spesifikasi properti tidak valid, silahkan masukkan format data yang valid </div>';
}
?>

        <?php
          foreach ($properti as $pro) {
           $gambar = explode("/", $pro->gambar);
        ?>
        <div class="col s12 m6 l6">
          <div class="card large">
            <div class="card-image">
              <?php if($gambar[0]=="") {?>
              <img src="<?php echo base_url() ?>assets/images/properti/default.jpg">
              <?php } else { ?>
              <img src="<?php echo base_url() ?>assets/images/properti/<?php echo $pro->kode_properti ."/". $gambar[0]; ?>">
              <?php } ?>
              <span class="card-title"><?php echo $pro->tipe_properti; ?></span>
            </div>
            <div class="card-content">
              <b><?php $price = number_format($pro->penawaran_terakhir,0,',','.'); echo "Rp. ".$price; ?></b>
              <p><?php echo $pro->alamat_properti; ?>, <?php echo $pro->kelurahan; ?></p>
               <p>Luas Tanah / Bangunan : <?php echo $pro->luas_tanah; ?> / <?php echo $pro->luas_bangunan; ?> </p>
               <p>Kamar Tidur / Mandi : <?php echo $pro->kamar_tidur; ?> / <?php echo $pro->kamar_mandi; ?> </p>
               <p>Lantai : <?php echo $pro->tingkat; ?></p>
               <p>Listrik : <?php echo $pro->listrik; ?> Watt</p>

            </div>
            <div class="card-action">
            <?php $jtrans = explode("/", $pro->jenis_transaksi); $size = count($jtrans);
            if($size==2) { ?>
              <div class="chip green white-text">Dijual</div><div class="chip blue white-text">Disewakan</div>
            <?php } else if($jtrans[0]=="Dijual"){ ?>
              <div class="chip green white-text">Dijual</div>
            <?php } else if($jtrans[0]=="Disewakan") { ?>
              <div class="chip blue white-text">Disewakan</div>
            <?php } else {}?>
              <a href="<?php echo base_url() ?>properti/detailproperti/<?php echo $pro->kode_properti;?>" style="float: right;" class="blue-text">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>
        <?php } ?>

        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large orange" href="#top">
            <i class="large material-icons white-text">search</i>
          </a>
        </div>

    </div>
  </div>
</main>




<?php $this->load->view('templates/footer');?>

<script type="text/javascript">

 $(document).ready(function()
{
  $("#advmenu").hide();$("#adv2").hide();
      $("#adv").click(function(){
    $("#advmenu").show('fast');
    $("#adv").hide();$("#adv2").show();
});
      $("#adv2").click(function(){
    $("#advmenu").hide('fast');
    $("#adv2").hide();$("#adv").show();
});
});

// $hargamin = $('#minp').val;
// $hargamax = $('#maxp').val;

$hargamin = $('#minp').val();
$hargamax = $('#maxp').val();

      var slider = document.getElementById('range');
      noUiSlider.create(slider, {
       start: [$hargamin, $hargamax],
       connect: true,
       tooltips: true,
       step: 100,
       range: {
         'min': 0,
         'max': 50000
       },
       format: wNumb({
         decimals: 0
       })
      });

      // Read the slider value.
document.getElementById('search2').addEventListener('click', function(){
    alert( slider.noUiSlider.get() );


});



var lowerValue = document.getElementById('minprice');
var upperValue = document.getElementById('maxprice');

var minp = document.getElementById('minp');
var maxp = document.getElementById('maxp');

// Show the value for the *last* moved handle.
slider.noUiSlider.on('update', function( values, handle ) {
    if ( !handle ) {
        lowerValue.innerHTML = values[handle]+ ' juta - ';

        minp.setAttribute("value",values[handle]);

       // #('#minp').attr("value",values[handle]);
    } else {
        upperValue.innerHTML = values[handle]+ ' juta';
        maxp.setAttribute("value",values[handle]);
       // #('#maxp').attr("value",values[handle]);
    }
});

$("#search").keydown(function(event) {
    if(event.which == 113) { //F2
      $("#advmenu").show('fast');
      $("#adv").hide();$("#adv2").show();
    }
    else if(event.which == 114) { //F3
      $("#advmenu").hide('fast');
      $("#adv2").hide();$("#adv").show();
    }
});

$('#yelcari').mouseover(function(event){
  $('#pemula').val($('#search').val());
});

</script>








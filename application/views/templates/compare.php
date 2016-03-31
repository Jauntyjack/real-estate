<?php $this->load->view('templates/header');?>
   <?php $this->load->view('templates/sidenav');?>
<?php //header('Cache-Control: max-age=900');?>
    <main>
      <div class="section no-pad-bot">

<div class="row">
  <nav class="grey darken-4" >
    <div class="nav-wrapper">
      <div class="col s12">
        <font size="5" class="hide-on-med-and-down">Komparasi Properti</font>
        <div style="float: right;">
          <a href="<?php echo site_url() ?>home" class="breadcrumb">Beranda</a>
          <a href="<?php echo site_url() ?>properti" class="breadcrumb">Properti</a>
          <a href="<?php echo site_url() ?>properti/compare" class="breadcrumb">Komparasi</a>
        </div>
      </div>
    </div>
  </nav>
</div>


<div class="row">
<div class="col s12 grey lighten-4 z-depth-1">

<div class="col s12">
<b>Properti Ditambahkan</b>
</div>
      <div id="panel1" class="col s12 m4 l4">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s12">
              <span id="phead1" class="grey-text">
              <h5>Properti 1</h5>
              </span>
              <span id="compal1">
              <?php if(isset($pal1)) {echo $pal1;} ?>
              </span><br>
                <span id="compha1">
                  <?php if(isset($pha1)) {echo $pha1;} ?>
                </span>
            </div>
          </div>
        </div>
      </div>

      <div id="panel2" class="col s12 m4 l4">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s12">
             <span id="phead2" class="grey-text"><h5>Properti 2</h5></span>
              <span id="compal2"><?php if(isset($pal2)) {echo $pal2;} ?></span><br>
                <span id="compha2"><?php if(isset($pha2)) {echo $pha2;} ?></span>
            </div>
          </div>
        </div>
      </div>

      <div id="panel3" class="col s12 m4 l4">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s12">
             <span id="phead3" class="grey-text"><h5>Properti 3</h5></span>
              <span id="compal3"><?php if(isset($pal3)) {echo $pal3;} ?></span><br>
                <span id="compha3"><?php if(isset($pha3)) {echo $pha3;} ?></span>
            </div>
          </div>
        </div>
      </div>

<div class="col s12">
<?php $attributes = array('id'=>'compare_form','class'=>'col s12');
echo form_open('properti/comparison', $attributes);
?>

<input type="hidden" name="pid1" id="pid1" value="<?php if(isset($pids1))echo $pids1;?>">
<input type="hidden" name="pid2" id="pid2" value="<?php if(isset($pids2))echo $pids2;?>">
<input type="hidden" name="pid3" id="pid3" value="<?php if(isset($pids3))echo $pids3;?>">


<?php
  $data = array(
    'class'=>'btn yellow black-text',
    'name'=>'submit',
    'id'=>'btnCompare',
    'value'=>'Compare',
    );
  echo form_submit($data);
  echo form_close();?>

<br><br>
</div>
</div>

     <div id="advmenu">
 <?php $attributes = array('id'=>'search_form','class'=>'col s12');
              echo form_open('properti/compare', $attributes);?>

<?php echo form_hidden('dosearch', 'yes'); ?>

<input type="hidden" name="pal1" id="pal1" value="<?php if(isset($pal1))echo $pal1;?>">
<input type="hidden" name="pha1" id="pha1" value="<?php if(isset($pha1))echo $pha1;?>">
<input type="hidden" name="pal2" id="pal2" value="<?php if(isset($pal2))echo $pal2;?>">
<input type="hidden" name="pha2" id="pha2" value="<?php if(isset($pha2))echo $pha2;?>">
<input type="hidden" name="pal3" id="pal3" value="<?php if(isset($pal3))echo $pal3;?>">
<input type="hidden" name="pha3" id="pha3" value="<?php if(isset($pha3))echo $pha3;?>">

<input type="hidden" name="pids1" id="pids1" value="<?php if(isset($pids1))echo $pids1;?>">
<input type="hidden" name="pids2" id="pids2" value="<?php if(isset($pids2))echo $pids2;?>">
<input type="hidden" name="pids3" id="pids3" value="<?php if(isset($pids3))echo $pids3;?>">

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
          echo form_input($data);?>
        </div>


        <div class="input-field col s6 l3">
          <?php echo form_label('Luas Tanah Maksimal (m<sup>2</sup>)','luas_tanah_max');
          $data = array(
            'class'=>'validate',
            'id'=>'luas_tanah_max',
            'name'=>'luas_tanah_max',
            'value'=>$luas_tanah_max,
            );
          echo form_input($data);?>
        </div>


        <div class="input-field col s6 l3">
          <?php echo form_label('Luas Bangunan Minimal (m<sup>2</sup>)', 'luas_bangunan_min');
          $data = array(
            'class'=>'validate',
            'id'=>'luas_bangunan_min',
            'name'=>'luas_bangunan_min',
            'value'=>$luas_bangunan_min,
            );
          echo form_input($data);?>
        </div>


        <div class="input-field col s6 l3">
          <?php echo form_label('Luas Bangunan Maksimal (m<sup>2</sup>)','luas_bangunan_max');
          $data = array(
            'class'=>'validate',
            'id'=>'luas_bangunan_max',
            'name'=>'luas_bangunan_max',
            'value'=>$luas_bangunan_max,
            );
          echo form_input($data);?>
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
          <?php echo form_label('Tingkat / Lantai','tingkat');
          $data = array(
            'class'=>'validate',
            'id'=>'tingkat',
            'name'=>'tingkat',
            'value'=>$tingkat,
            );
          echo form_input($data);?>
        </div>


        <div class="input-field col l3 s6">
          <?php echo form_label('Kamar Tidur','kamar_tidur');
          $data = array(
            'class'=>'validate',
            'id'=>'kamar_tidur',
            'name'=>'kamar_tidur',
            'value'=>$kamar_tidur,
            );
          echo form_input($data);?>
        </div>

        <div class="input-field col l3 s6">
          <?php echo form_label('Kamar Mandi','kamar_mandi');
          $data = array(
            'class'=>'validate',
            'id'=>'kamar_mandi',
            'name'=>'kamar_mandi',
            'value'=>$kamar_mandi,
            );
          echo form_input($data);?>
        </div>

      <div class="input-field col s6 l6">
        <?php
          $options = array(
                          ''   => 'Bebas',
                          'HGB s/d tahun'  => 'HGB s/d tahun',
                          'Hak Milik'    => 'Hak Milik',
                          'Lain-lain'   => 'Lain-lain',
                        );
        echo form_dropdown('status_milik', $options, 'hgb',' id="status_milik"');
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

      <div class="col s12 center-align">
        <?php 
        $data = array(
          'class'=>'btn yellow black-text',
          'name'=>'submit',
          'value'=>'Cari'
          );
        echo form_submit($data);?>
     </div>

    </div>


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
    </div>

 <?php
          foreach ($properti as $pro) {
             $gambar = explode("/", $pro->gambar);
        ?>

        <div class="col s12 m6 l4">
          <div class="card large">
            <div class="card-image">
              <?php if($gambar[0]=="") {?>
              <img src="<?php echo base_url() ?>assets/images/properti/default.jpg">
              <?php } else { ?>
              <img src="<?php echo base_url() ?>/assets/images/properti/<?php echo $pro->kode_properti ."/". $gambar[0]; ?>">
              <?php } ?>
              <span class="card-title"><?php echo $pro->tipe_properti; ?>
              <br>
              <?php $jtrans = explode("/", $pro->jenis_transaksi); $size = count($jtrans);
            if($size==2) { ?>
              <div class="chip green white-text">Dijual</div><div class="chip blue white-text">Disewakan</div>
            <?php } else if($jtrans[0]=="Dijual"){ ?>
              <div class="chip green white-text">Dijual</div>
            <?php } else if($jtrans[0]=="Disewakan") { ?>
              <div class="chip blue white-text">Disewakan</div>
            <?php } else {}?>
              </span>



            </div>
            <div class="card-content">
              <p id="Harga<?php echo $pro->kode_properti; ?>"><b><?php $price = number_format($pro->penawaran_terakhir,0,',','.'); echo "Rp. ".$price; ?></b></p>
              <p id="Alamat<?php echo $pro->kode_properti; ?>"><?php echo $pro->alamat_properti; ?></p>
               <p>LT / LB : <?php echo $pro->luas_tanah; ?> / <?php echo $pro->luas_bangunan; ?> </p>
               <p>KT / KM : <?php echo $pro->kamar_tidur; ?> / <?php echo $pro->kamar_mandi; ?> </p>
               <p>Lantai : <?php echo $pro->tingkat; ?></p>
               <p>Listrik : <?php echo $pro->listrik; ?> Watt</p>
            </div>
            <div class="card-action">
            <?php $toast = "Materialize.toast('Properti ditambahkan !', 1000)"; ?>

              <input type="button" name="add" style="float: right;" 
              class="btn green" value="Tambah" data-pid="<?php echo $pro->kode_properti; ?>"
              onclick="<?php echo $toast;?>">
            </div>
          </div>
        </div>
        <?php } ?>


</div>
    </main>    

      <script type="text/javascript">
      $(document).ready(function() {
          console.log("message for you sir");
          $('select').material_select();
          $('.modal-trigger').leanModal();
    });
  </script>

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

// $('#panel2').hide();$('#panel3').hide();
// $('#phead2').hide();$('#phead3').hide();

if($('#compal2').html()==""){
  $('#phead2').hide();$('#panel2').hide();
}
if($('#compal3').html()==""){
  $('#phead3').hide();$('#panel3').hide();
}

});

$( "input[name='add']" ).click(function() {

  if($('#pal1').val()==""){
    $pid = $(this).data('pid');
    $('#pid1').val($pid);$('#pids1').val($pid);
    $alid = '#Alamat' + $pid;
    $alamat = $($alid).html();
    $('#compal1').html($alamat);
    $('#pal1').val($alamat);

    $hid = '#Harga' + $pid;
    $harga = $($hid).html();
    $('#compha1').html($harga);
    $('#pha1').val($harga);
    $('#panel1').show();$('#phead1').show();
  } else if ($('#pal2').val()==""){
    $pid = $(this).data('pid');
    $('#pid2').val($pid);$('#pids2').val($pid);
    $alid = '#Alamat' + $pid;
    $alamat = $($alid).html();
    $('#compal2').html($alamat);
    $('#pal2').val($alamat);

    $hid = '#Harga' + $pid;
    $harga = $($hid).html();
    $('#compha2').html($harga);
    $('#pha2').val($harga);
    $('#panel2').show();$('#phead2').show();
  } else {
    $pid = $(this).data('pid');
    $('#pid3').val($pid);$('#pids3').val($pid);
    $alid = '#Alamat' + $pid;
    $alamat = $($alid).html();
    $('#compal3').html($alamat);
    $('#pal3').val($alamat);

    $hid = '#Harga' + $pid;
    $harga = $($hid).html();
    $('#compha3').html($harga);
    $('#pha3').val($harga);
    $('#panel3').show();$('#phead3').show();
  }


});

$('#btnCompare').click(function(e){
  if($('#pid1').val()==""){
    e.preventDefault();
    Materialize.toast('Pilih properti yang ingin dibandingkan',2000);
  }
})


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
         'max': 100000
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


</script>

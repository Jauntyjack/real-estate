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
<div class="col s12">
<h5>Hasil Komparasi</h5>
</div>
 <?php foreach ($comparison as $pro) { 
   $gambar = explode("/", $pro->gambar);
  ?>
        <div class="col s12 m6 l4">
          <div class="card medium">
            <div class="card-image">
              <img src="<?php echo base_url() ?>/assets/images/properti/<?php echo $pro->kode_properti ."/". $gambar[0]; ?>">
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
              <p><b><?php $price = number_format($pro->penawaran_terakhir,0,',','.'); echo "Rp. ".$price; ?></b></p>
              <p><?php echo $pro->kelurahan; ?> - <?php echo $pro->kecamatan; ?></p>
              <p><?php echo $pro->status_kepemilikan; ?></p>
            </div>

             <div class="card-action">
              <a href="<?php echo base_url() ?>properti/detailproperti/<?php echo $pro->kode_properti;?>" style="float: right;" class="blue-text">Lihat Selengkapnya</a>
            </div>

          </div>
        </div>

        <?php } ?>
<div class="col s12">
<table class="highlight"> 
<thead>
  <tr>
    <th>Aspek</th>
    <?php $i=1; foreach($comparison as $key){?>
    <th>Properti <?php echo $i;?></th>
    <?php $i++; } ?>
  </tr>
</thead>
<tbody>

<tr>
    <td>Alamat</td><?php foreach($comparison as $key)echo "<td>".$key->alamat_properti."</td>";?>
</tr>
<tr>
    <td>LT / LB (m&#178) </td><?php foreach($comparison as $key)echo "<td>".$key->luas_tanah." / ".$key->luas_bangunan."</td>";?>
</tr>
<tr>
  <td>KT / KM</td><?php foreach($comparison as $key)echo "<td>".$key->kamar_tidur." / ".$key->kamar_mandi." </td>";?>
</tr>
<tr>
    <td>Lantai</td><?php foreach($comparison as $key)echo "<td>".$key->tingkat."</td>";?>
</tr>
<tr>
    <td>Listrik</td><?php foreach($comparison as $key)echo "<td>".$key->listrik." Watt</td>";?>
</tr>
<tr>
    <td>AC</td><?php foreach($comparison as $key)echo "<td>".$key->ac." Set</td>";?>
</tr>
<tr>
    <td>Telepon</td><?php foreach($comparison as $key)echo "<td>".$key->telepon." Line</td>";?>
</tr>
<tr>
    <td>Air</td><?php foreach($comparison as $key)echo "<td>".$key->air."</td>";?>
</tr>
<tr>
    <td>Ruangan Lain</td><?php foreach($comparison as $key)echo "<td>".$key->ruangan_lain."</td>";?>
</tr>
<tr>
    <td>Fasilitas Lain</td><?php foreach($comparison as $key)echo "<td>".$key->fasilitas_lain."</td>";?>
</tr>
</tbody>
</table>
</div>



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

});

$( "input[name='add']" ).click(function() {

  if($('#compal1').html()==""){
    $pid = $(this).data('pid');
    $alid = '#Alamat' + $pid;
    $alamat = $($alid).html();
    $('#compal1').html($alamat);

    $hid = '#Harga' + $pid;
    $harga = $($hid).html();
    $('#compha1').html($harga);
  } else if ($('#compal2').html()==""){
    $pid = $(this).data('pid');
    $alid = '#Alamat' + $pid;
    $alamat = $($alid).html();
    $('#compal2').html($alamat);

    $hid = '#Harga' + $pid;
    $harga = $($hid).html();
    $('#compha2').html($harga);
  } else {
    $pid = $(this).data('pid');
    $alid = '#Alamat' + $pid;
    $alamat = $($alid).html();
    $('#compal3').html($alamat);

    $hid = '#Harga' + $pid;
    $harga = $($hid).html();
    $('#compha3').html($harga);
  }


});


</script>

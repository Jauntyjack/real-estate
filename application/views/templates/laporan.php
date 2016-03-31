<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidenav');?>

<?php header('Cache-Control: max-age=900');?>
<main>
  <div class="section no-pad-bot">

  <div class="row">
    <nav class="grey darken-4" >
      <div class="nav-wrapper">
        <div class="col s12">
          <font size="5" class="hide-on-med-and-down">Laporan</font>
          <div style="float: right;">
            <a href="<?php echo site_url() ?>home" class="breadcrumb">Beranda</a>
            <a href="<?php echo site_url() ?>laporan" class="breadcrumb">Laporan</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div class="row">
      <div class="col s12">

      <?php $attributes = array('id'=>'generate_form');
      echo form_open('laporan', $attributes); ?>
      <?php echo form_hidden('dogenerate', 'yes'); ?>
      <div class="input-field col s12">

     <?php 
//      $data = array(
//         'type'=>'checkbox',
//           'name'          => 'lapkantor',
//           'id'            => 'lapkantor',
//           'value'            => 'lapkantor',
// );
// echo form_checkbox($data);
// echo form_label('Laporan per Kantor','lapkantor');
// echo "<br>";

//  $data = array(
//         'type'=>'checkbox',
//           'name'          => 'lapmarketing',
//           'id'            => 'lapmarketing',
//           'value'            => 'lapmarketing',
// );
// echo form_checkbox($data);
// echo form_label('Laporan per Marketing','lapmarketing');
// echo "<br>";



// $data = array(
//         'type'=>'checkbox',
//           'name'          => 'lapperforma',
//           'id'            => 'lapperforma',
//           'value'            => 'lapperforma',
// );
// echo form_checkbox($data);
// echo form_label('Laporan Performa Marketing','lapperforma');
?>

<span id="jtrans" class="red-text"></span>
</div>

<div class="col l3">
<div class="input-field col s12">
<?php echo form_label('Tanggal Awal','tanggalaw');?><br>
</div><div class="input-field col l12">
<input type="date" name="tanggalaw" class="datepicker" 
onclick="$('.datepicker').pickadate();" id="tanggalaw" 
value="<?php if(isset($startdate)) echo date("j-M-y", strtotime($startdate));?>">
</div>
</div>

<div class="col l3">
  <div class="input-field col s12 ">
  <?php echo form_label('Tanggal Akhir','tanggalak');?><br>
  </div>
  <div class="input-field col l12">
  <input type="date" name="tanggalak" class="datepicker" 
  onclick="$('.datepicker').pickadate();" id="tanggalak" 
  value="<?php if(isset($enddate)) echo date("j-M-y", strtotime($enddate));?>">
  </div>
</div>

<div class="col s12">
  <?php 
  $data = array(
    'class'=>'btn yellow black-text',
    'name'=>'submit',
    'value'=>'Generate',
    );
  echo form_submit($data);?>
</div>
<?php echo form_close(); ?>
</div>

<!-- <div class="col s12">
<canvas id="myChart" width="1000" height="400"></canvas>
</div> -->



<?php if(isset($kantor)){ ?>
<div id="result" class="col s12">


<!-- <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Test 1</a></li>
        <li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
        <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li>
        <li class="tab col s3"><a href="#test4">Test 4</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">Test 1</div>
    <div id="test2" class="col s12">Test 2</div>
    <div id="test3" class="col s12">Test 3</div>
    <div id="test4" class="col s12">Test 4</div>
  </div> -->





  <div class="row">
    <br>
      <ul class="tabs">
        <li class="tab col s4"><a class="active" href="#test1">Kantor</a></li>
        <li class="tab col s4"><a href="#test2">Marketing</a></li>
        <li class="tab col s4"><a href="#test3">Performa</a></li>
        
      </ul>
    <div id="test1" class="col s12">
      <br><h5>Laporan Transaksi Kantor</h5><br>
      <?php
      echo form_open('laporan/export/kantor');
      $tgaw="";$tgak="";
      if(isset($startdate)) $tgaw = date("j-M-y", strtotime($startdate));
      if(isset($enddate)) $tgak = date("j-M-y", strtotime($enddate));
      echo form_hidden('startdate', $tgaw);
      echo form_hidden('enddate', $tgak);
        $data = array(
          'class'=>'btn green darken-1',
          'name'=>'submit',
          'value'=>'Export',
          );
        echo form_submit($data);?>
      <?php echo form_close(); ?>
      <table class="highlight">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Marketing</th>
            <th>Alamat Properti</th>
            <th>Jenis Transaksi</th>
            <th>Harga</th>
            <th>Penjual</th>
            <th>Pembeli</th>
          </tr>
        </thead>
        <tr>
          <?php $num=1; foreach ($kantor as $list) { ?>
          <td><?php echo $num; ?></td>
          <td><?php echo date("j-M-y", strtotime($list->tgl_transaksi)); ?></td>
          <td><?php echo $list->nama_marketing; ?></td>
          <td><?php echo $list->alamat_properti; ?></td>
          <td><?php echo $list->jenis_transaksi_akhir; ?></td>
          <td><?php echo number_format($list->harga,0,',','.') ?></td>
          <td><?php echo $list->nama_penjual; ?></td>
          <td><?php echo $list->nama_pelanggan; ?></td>
        </tr>       
      <?php $num++; } ?>
      </table>
    </div>

    <div id="test2" class="col s12">
      <br><h5>Laporan Transaksi per Marketing</h5><br>
      <?php
      echo form_open('laporan/export/marketing');
      $tgaw="";$tgak="";
      if(isset($startdate)) $tgaw = date("j-M-y", strtotime($startdate));
      if(isset($enddate)) $tgak = date("j-M-y", strtotime($enddate));
      echo form_hidden('startdate', $tgaw);
      echo form_hidden('enddate', $tgak);
        $data = array(
          'class'=>'btn green darken-1',
          'name'=>'submit',
          'value'=>'Export',
          );
        echo form_submit($data);?>
      <?php echo form_close(); ?>
      <br><br>
      <?php 
      $cur=false;$num=1;
      foreach ($marketing as $list) { 
        if($list->kode_marketing_trans!=$cur) {
            if($cur!==false) {
      ?>
           </table><br><br>
      <?php } ?>
        <b>Marketing :</b>
          <div class="chip">
            <img src="<?php echo site_url()?>/assets/images/marketing/<?php echo $list->foto_marketing;?>">
            <?php echo $list->nama_marketing; ?>
         </div>
        <table class="highlight">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Alamat Properti</th>
            <th>Jenis Transaksi</th>
            <th>Harga</th>
            <th>Penjual</th>
            <th>Pembeli</th>
          </tr>
        </thead>
        <?php $cur = $list->kode_marketing_trans; $num=1;
        }?>
        <tr>
          <td><?php echo $num; ?></td>
          <td><?php echo date("j-M-y", strtotime($list->tgl_transaksi)); ?></td>
          <td><?php echo $list->alamat_properti; ?></td>
          <td><?php echo $list->jenis_transaksi_akhir; ?></td>
          <td><?php echo number_format($list->harga,0,',','.') ?></td>
          <td><?php echo $list->nama_penjual; ?></td>
          <td><?php echo $list->nama_pelanggan; ?></td>
        </tr>       
      <?php $num++; } ?>
      </table>
    </div>

    <div id="test3" class="col s12">
        <br><h5>Laporan Performa Marketing</h5><br>
        <?php
        echo form_open('laporan/export/performa');
        $tgaw="";$tgak="";
        if(isset($startdate)) $tgaw = date("j-M-y", strtotime($startdate));
        if(isset($enddate)) $tgak = date("j-M-y", strtotime($enddate));
        echo form_hidden('startdate', $tgaw);
        echo form_hidden('enddate', $tgak);
          $data = array(
            'class'=>'btn green darken-1',
            'name'=>'submit',
            'value'=>'Export',
            );
          echo form_submit($data);?>
        <?php echo form_close(); ?>
        <table class="highlight">
          <thead>
            <tr>
              <th>No.</th>
              <th>Foto</th>
              <th>Marketing</th>
              <th>Jumlah Transaksi</th>
              <th>Jumlah Nominal</th>
            </tr>
          </thead>
          <tr>
            <?php $num = 1; foreach ($performa as $list) { ?>
            <td><?php echo $num;?></td>
            <td><img src="<?php echo site_url() ?>assets/images/marketing/<?php echo $list->foto_marketing; ?>"
            width="30px;" height="30px;" class="circle">
            </td>
            <td><?php echo $list->nama_marketing; ?></td>
            <td><?php echo $list->transsum ?></td>
            <td><?php echo number_format($list->nominal,0,',','.') ?></td>
          </tr>       
          <?php $num++;} ?>
        </table>
    </div>

  </div>




</div>
<?php } ?>

      </div>
      </div>
</main>    

<?php $this->load->view('templates/footer');?>

<script>

// Get context with jQuery - using jQuery's .get() method.
var ctx = $("#myChart").get(0).getContext("2d");



var data = {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
    "Agustus", "September", "Oktober", "November", "Desember"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(255,193,7,0.2)",
            strokeColor: "rgba(255,193,7,1)",
            pointColor: "rgba(255,193,7,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90, 23, 57, 65, 30, 35]
        }
    ]
};




var myLineChart = new Chart(ctx).Line(data);
</script>
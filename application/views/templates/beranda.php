<?php $this->load->view('templates/header');?>
   <?php $this->load->view('templates/sidenav');?>

    <main>
      <div class="section no-pad-bot">


<div class="row">
      <nav class="grey darken-4" >
    <div class="nav-wrapper">
      <div class="col s12">
        <font size="5" class="hide-on-med-and-down">Beranda</font>
        <div style="float: right;">
          <a href="<?php echo site_url() ?>home" class="breadcrumb">Beranda</a>
        </div>
      </div>
    </div>
  </nav>
</div>


<div class="row">
    <div class="col s12">


<div class="col l6">

<font size="4"><b>Listing Terbaru</b></font>
<ul class="collection">
    <?php foreach($properti as $pro) { ?>

    <li class="collection-item avatar">
                <?php 
              $gambar = explode("/", $pro->gambar); $size = count($gambar);
              if($gambar[0]=="") { ?>
       <img src="<?php echo base_url() ?>assets/images/properti/default.jpg" class="circle" width="50px" height="50px">
      <?php } else { ?>
      <img width="50px" height="50px" class="circle" src="<?php echo base_url() ?>assets/images/properti/<?php echo $pro->kode_properti ."/". $gambar[0]; ?>">
      <?php } ?>
      <span class="title"><?php echo $pro->alamat_properti ?></span>
      <p><?php echo $pro->tipe_properti ?> <br>
         <?php $price = number_format($pro->penawaran_terakhir,0,',','.'); echo "Rp. ".$price; ?></p>
  

         <div class="chip">
          <img src="<?php echo site_url()?>/assets/images/marketing/<?php echo $pro->foto_marketing;?>">
          <?php echo $pro->nama_marketing; ?>
         </div> 
      <a class="secondary-content">
      <br><br><br>
      <?php echo date("j-M-y", strtotime($pro->tanggal));?>
      </a>
    </li>

    <?php } ?>
  </ul>
</div>




<div class="col l6">

<font size="4"><b>Transaksi Terbaru</b></font>
<ul class="collection">
    <?php foreach($transaksi as $tr) { ?>

    <li class="collection-item avatar">
                <?php 
              $gambar = explode("/", $tr->gambar); $size = count($gambar);
              if($gambar[0]=="") { ?>
       <img src="<?php echo base_url() ?>assets/images/properti/default.jpg" class="circle" width="50px" height="50px">
      <?php } else { ?>
      <img width="50px" height="50px" class="circle" src="<?php echo base_url() ?>assets/images/properti/<?php echo $tr->kode_properti ."/". $gambar[0]; ?>">
      <?php } ?>
      <span class="title"><?php echo $tr->alamat_properti ?></span>
      <p><?php echo $tr->tipe_properti ?> <br>
         <?php $price = number_format($tr->harga,0,',','.'); echo "Rp. ".$price; ?></p>
  

         <div class="chip">
          <img src="<?php echo site_url()?>/assets/images/marketing/<?php echo $tr->foto_marketing;?>">
          <?php echo $tr->nama_marketing; ?>
         </div> 
      <a class="secondary-content">
      <br><br><br>
      <?php echo date("j-M-y", strtotime($tr->tgl_transaksi));?>
      </a>
    </li>

    <?php } ?>
  </ul>
</div>



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
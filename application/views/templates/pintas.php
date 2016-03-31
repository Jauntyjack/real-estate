<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidenav');?>
<main>
  <div class="section no-pad-bot">
  <?php $this->load->view('templates/header');?>



  <div class="row">
    <div class="col s12 grey darken-4">
    <p style="float: left; color:white;">
    <a href="" style="font-size: 24px; " class="breadcrumb">Listing</a></p>
  	<p style="float: right; color:white;">
  	<a href="<?php echo base_url() ?>index.php/home" style="color:white;" class="breadcrumb">Beranda</a>
  	<a href="<?php echo base_url() ?>index.php/home/listing" style="color:white;" class="breadcrumb">Listing</a> 
  	</p>
    </div>
  </div>

  <div class="row">
      <div class="col s12">
        <a href="<?php echo base_url() ?>index.php/home/insert" class="btn yellow black-text">Insert Listing</a>
        <br><br>
        
            <?php $attributes = array('id'=>'search_form','class'=>'col s12');
              echo form_open('home/dopintas', $attributes);?>

            <div class="input-field col l6">
        <?php echo form_label('Alamat','alamat_properti');?>
        <?php $data = array(
          'class'=>'validate',
          'id'=>'alamat_properti',
          'name'=>'alamat_properti');
        ?>
        <?php echo form_input($data);?>
        </div>
        

        <div class="input-field col l6">
          <?php $options = array(
                            'Rumah Tinggal'  => 'Rumah Tinggal',
                            'Ruko / R. Usaha'    => 'Ruko / R. Usaha',
                            'Apartement'   => 'Apartement',
                            'Villa / Resort' => 'Villa / Resort',
                            'Kavling' => 'Kavling',
                          );
          echo form_dropdown('tipepro', $options, 'Kavling','id="tipe_properti"');
          echo form_label('Tipe Properti');
          ?>
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
        </form>


      </div></div></div>
</main>    

<?php $this->load->view('templates/footer');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title;?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>





</head>
<body>

<div class="container">
	<center><?php $this->load->view('templates/header');?></center>
</div>


	<div class="container">
		<div class="col-xs-3">
			<?php $this->load->view('users/login_view');
			?>
		</div>
		<div class="col-xs-9">
			<a href="<?php echo base_url() ?>index.php/home/insert" class="btn btn-success">Insert Listing</a>
		<br><br>
		<table class="table table-hover">
  			<tr>
  				<th>Kode Properti</th>
  				<th>Alamat Properti</th>
  				<th>Tipe Properti</th>
  				<th>Status Pemilikan</th>
  				<th>Action</th>
  			</tr>
  			<tr>
  				<?php
				foreach ($listing as $list) {
				?>
				<td><?php echo $list->kode_properti; ?></td>
				<td><?php echo $list->alamat_properti; ?></td>
				<td><?php echo $list->tipe_properti; ?></td>
				<td><?php echo $list->status_kepemilikan; ?></td>
				<td>
				<!--idnya harus kode transaksi-->
				<button type="button" class="btn btn-success btn-large" data-toggle="modal" data-target="#myModal<?php echo $list->kode_properti; ?>" value="<?php echo $list->kode_properti; ?>">Update</button> 
					
<div class="modal fade" id="myModal<?php echo $list->kode_properti; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Listing</h4>
      </div>
      <div class="modal-body">
    	<?php $attributes = array('id'=>'insert_form','class'=>'form_horizontal');?>
		<?php echo form_open('home/update_listing/'.$list->kode_properti, $attributes); ?>
		<div class="form-group">
		<?php echo form_label('Alamat Properti');?>
		<?php 
		$data = array(
			'class'=>'form-control',
			'name'=>'username',
			'value'=> $list->alamat_properti,
			'placeholder'=> 'Masukkan alamat properti'
			);
		?>
		<?php echo form_input($data);?>
		</div>

		<div class="form-group">
		<?php echo form_label('Tipe Properti');?>
		<?php 
		$data = array(
			'class'=>'form-control',
			'name'=>'password',
			'value'=>$list->tipe_properti,
			'placeholder'=> 'Masukkan tipe properti'
			);
		?>
		<?php echo form_input($data);?>
		</div>

		<div class="form-group">
		<?php echo form_label('Status Pemilikan (Sertifikat)');?>
		<?php 
		$data = array(
			'class'=>'form-control',
			'name'=>'password2',
			'value'=>$list->status_kepemilikan,
			'placeholder'=> 'Masukkan status kepemilikan'
			);
		?>
		<?php echo form_input($data);?>
		</div>


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<?php 
		$data = array(
			'class'=>'btn btn-primary',
			'name'=>'submit',
			'value'=>'Save Changes'
			);
		?>

		<?php echo form_submit($data);?>
		<?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
					
					<a href="<?php echo site_url('home/delete_listing/'.$list->kode_properti.'')?>">
						<button type="button" class="btn btn-danger">Delete</button>
					</a>
				</td>
			</tr>				
			<?php } ?>
		</table>
		
		</div>

	</div>

<div class="container">
	<center><?php $this->load->view('templates/footer');?></center>
</div>

</body>
</html>
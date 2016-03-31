<?php $this->load->view('templates/header');?>
<?php header('Cache-Control: max-age=900');?>
<div class="container">
	<div class="row">
		<div class="col s12 m8 l6 offset-m2 offset-l3">
		<h5 class="center-align black-text"><br><b>REGISTER</b></h5>

		<?php $attributes = array('id'=>'register_form','class'=>'col s12');
		echo form_open_multipart('account/register', $attributes);?>

		<?php echo form_hidden('doregister', 'yes'); ?>

		<div class="input-field col s12">
		<?php echo form_label('Nama Lengkap','nama_lengkap');
		$data = array(
			'class'=>'validate',
			'id'=>'nama_lengkap',
			'name'=>'nama_lengkap',
			'value'=>set_value('nama_lengkap')
			);
		echo form_input($data); echo form_error('nama_lengkap'); ?>
		</div>

		<div class="input-field col s12">
		<?php echo form_label('User ID','user_id'); 
		$data = array(
			'class'=>'validate',
			'id'=>'user_id',
			'name'=>'user_id',
			'value'=>set_value('user_id')
			);
		echo form_input($data); echo form_error('user_id'); ?>
		</div>

		<div class="input-field col s12">
		<?php echo form_label('Password','password'); 
		$data = array(
			'type'=> 'password',
			'class'=>'validate',
			'id'=>'password',
			'name'=>'password',
			'value'=>set_value('password')
			);
		 echo form_input($data); echo form_error('password'); ?>
		</div>

		<div class="input-field col s12">
		<?php echo form_label('Konfirmasi Password','password2'); 
		$data = array(
			'type'=> 'password',
			'class'=>'validate',
			'id'=>'password2',
			'name'=>'password2',
			'value'=>set_value('password2')
			);
		 echo form_input($data); echo form_error('password2'); ?>
		</div>

		<div class="input-field col s12">
		<?php echo form_label('Jenis Kelamin','jkel'); ?><br><br>
		<?php $data = array(
			    'name'=> 'jk',
			    'id' => 'laki',
			    'class'=> 'with-gap',
			    'value' => 'Laki-Laki',
			    'checked' => set_radio('jk', 'Laki-Laki')
		);
		echo form_radio($data);
		echo form_label('Laki-Laki','laki');
		$data = array(
			    'name' => 'jk',
			    'id' => 'perempuan',
			    'class'=> 'with-gap',
			    'value' => 'Perempuan',
			    'checked' => set_radio('jk', 'Perempuan')
		);
		echo form_radio($data);
		echo form_label('Perempuan','perempuan');
		?>
		<br><br>
		<?php echo form_error('jk'); ?>
		</div>

		<div class="col s12">
			<?php echo form_label('Foto Profil'); ?>
		</div>

		<div class="file-field input-field col s12">

			<div class="btn">
		        File
		        <input type="file" name="foto" onchange="readURL(this);">
	     	 </div>
	     	 <div class="file-path-wrapper">
				<?php
				$data = array(
					'type'=>'text',
					'class'=>'file-path validate',
					'id'=>'foto',
					'name'=>'foto_marketing',
					'placeholder'=>'Unggah foto profil',
					//'value'=>set_value('foto_marketing')
					);
				echo form_input($data);?>
			</div>
			<img id="imgpreview" src="
			<?php echo site_url()?>assets/images/marketing/default.jpg"
			alt="your image" width="200" height="200" />
		</div>

		<div class="input-field col s12">
		<?php echo form_label('No. HP','nohp'); 
		$data = array(
			'class'=>'validate',
			'id'=>'nohp',
			'name'=>'nohp',
			'value'=>set_value('nohp')
			);
		 echo form_input($data); echo form_error('nohp'); ?>
		</div>

		<div class="input-field col s12">
		<?php echo form_label('Alamat Email','email'); 
		$data = array(
			'class'=>'validate',
			'id'=>'email',
			'name'=>'email',
			'value'=>set_value('email')
			);
		 echo form_input($data); echo form_error('email'); ?>
		 <br>
		</div>

		<div class="col s12">	
		<?php 
		$data = array(
			'class'=>'btn yellow black-text',
			'name'=>'submit',
			'value'=>'Register'
			);
		?>
		<?php echo form_submit($data);?>
			<a href="../account" class="btn white">
				<span class="black-text">Cancel</span>
			</a>

		<br><br>
		</div>
		</div>
	</div>
</div>
<?php $this->load->view('templates/footer');?>

<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgpreview')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
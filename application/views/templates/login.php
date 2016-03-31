<?php $this->load->view('templates/header');?>
<?php header('Cache-Control: max-age=900');?>
	<div class="row">
				<div class="col s12">
				<div style="height: 100px;"></div>
			</div>
		<div class="col s8 l4 offset-s2 offset-l4">
			<h5 class="center-align">
			<br><br>
			<b>LOGIN</b>
			</h5>
			<?php $attributes = array('id'=>'login_form','class'=>'col s12');
				echo form_open('account', $attributes);
			?>

			<?php echo form_hidden('dologin', 'yes'); ?>
			<div class="input-field col s12">
			<?php echo form_label('User ID','userid');
 			$data = array(
				'class'=>'validate',
				'id'=>'userid',
				'name'=>'userid');
			echo form_input($data);?>
			</div>

			<div class="input-field col s12">
			<?php echo form_label('Password','password');
			$data = array(
				'class'=>'validate',
				'type'=>'password',
				'id'=>'password',
				'name'=>'password');
			echo form_input($data);?>
			</div>

<!-- 			<div class="col s12">
				<span class="pink-text right-align">
				<p align="right" style="float:left;">
				 <input type="checkbox" id="test5" />
	     		 <label for="test5">Remember Me</label>
	 				<br><br>
	     		 </p>
				</span>
			</div> -->
     		
			<div class="col s12">
			<br>	
			<?php 
			$data = array(
				'class'=>'btn yellow black-text',
				'name'=>'submit',
				'value'=>'Login'
				);
			echo form_submit($data);?>
			<a href="account/register" class="btn white">
			<span class="black-text">Register</span>
			</a>
			<br><br>
			</div>

			<?php
			echo form_close();
			?>
			
			<p class="pink-text center-align">

			<?php 
				if(isset($err)){
					echo $err;	
				}
			?>
			</p>

			<div class="col s12">
				<div style="height: 100px;"></div>
			</div>
		</div>
	</div>


<?php $this->load->view('templates/footer');?>
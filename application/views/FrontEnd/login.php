<div class="col-md-12">
	<div id="content" align="center">
		<div id="whiteBlock">
			LOGIN
		</div>
		<?php if(isset($error)){ ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Failed to Login!</strong> <?php echo $error; ?>
		</div>
		<?php } ?>
			<div class="col-md-12" id="fontStyle" style="color:white; margin-top:2em;">
				<?php
				$attributes = array();
				echo form_open('Login/input', $attributes); ?>

				<div class="form-group col-md-12 no-padding">
					<div class="col-md-2 col-md-offset-3" style="overflow:hidden;">
			 			<label for="username">Username <span class="required">*</span></label>
			 		</div>
			 		<div class="col-md-4" style="overflow:hidden;">
				        <input class="form-control" id="username" type="text" name="username" maxlength="100" value="<?php echo set_value('username'); ?>"  />
				        <?php echo form_error('username'); ?>
			        </div>
				</div>
				<div class="form-group col-md-12 no-padding">
					<div class="col-md-2 col-md-offset-3" style="overflow:hidden;">
				    	<label for="password">Password <span class="required">*</span></label>
				    </div>
				    <div class="col-md-4" style="overflow:hidden;">
				        <input class="form-control" id="password" type="password" name="password" maxlength="100" value="<?php echo set_value('password'); ?>"  />
				        <?php echo form_error('password'); ?>
			        </div>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<?php echo form_submit( 'submit', 'Login','style="width:100%; background-color:#774c29; border:none;" class="btn btn-default col-md-12"'); ?>
					<?php echo form_close(); ?>
				</div>
			</div>
	</div>
</div>
<style type="text/css">
	input[type="text"],[type="password"]{
		color :black;
		float: left;
		/*width: 	300px;*/
	}
	label{
	/*	width: 	150px;*/
		float: left;
		text-align: left;
	}
</style>
<?php $this->load->view('FrontEnd/footer'); ?> 
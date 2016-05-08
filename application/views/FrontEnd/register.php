<div class="col-md-12">
	<div id="content" align="center">
		<div id="whiteBlock">
			REGISTER
		</div>
		<div id="fontStyle" class="innerContent" style="color:white;">
			<?php if(isset($error)){ ?>
			<div class="alert alert-danger" role="alert">
			  <strong>Failed to Register!</strong> <?php echo $error; ?>
			</div>
			<?php } ?>
			<?php
				$attributes = array();
				echo form_open('Register/input', $attributes); ?>

				  <div class="form-group col-md-12" style="padding:0">
				  	<div class="col-md-2 col-md-offset-3" style="padding:0">
				 		<label for="username">Username <span class="required">*</span></label>
				 	</div>
				 	<div class="col-md-4" style="padding:0">
				        <input onkeyup="passCheck()" required class="form-control" id="username" type="text" name="username" maxlength="100" value="<?php echo set_value('username'); ?>"  />
				        <?php echo form_error('username'); ?>
				    </div>
				  </div>
				  <div class="form-group col-md-12" style="padding:0">
				  	<div class="col-md-2 col-md-offset-3" style="padding:0">
					    <label for="name">Full Name <span class="required">*</span></label>
					 </div>
					 <div class="col-md-4" style="padding:0;">
				        <input onkeyup="passCheck()" required class="form-control" id="name" type="text" name="name" maxlength="100" value="<?php echo set_value('name'); ?>"  />
				       	<?php echo form_error('name'); ?>
				    </div>
				  </div>
				  <div class="form-group col-md-12" style="padding:0">
				  	<div class="col-md-2 col-md-offset-3" style="padding:0">
					    <label for="email">Email <span class="required">*</span></label>
					 </div>
					 <div class="col-md-4" style="padding:0;">
				        <input  onkeyup="passCheck()" required class="form-control" id="email" type="text" name="email" maxlength="100" value="<?php echo set_value('email'); ?>"  />
				        <?php echo form_error('email'); ?>
				    </div>
				  </div>
				  <div class="form-group col-md-12" style="padding:0">
				  	<div class="col-md-2 col-md-offset-3" style="padding:0">
					   <label for="phone_number">Phone Number <span class="required">*</span></label>
					</div>
					<div class="col-md-4" style="padding:0;">
				        <input  onkeyup="passCheck()" required class="form-control" id="phone_number" type="text" name="phone_number" maxlength="100" value="<?php echo set_value('phone_number'); ?>"  />
				        <?php echo form_error('phone_number'); ?>
				    </div>
				  </div>
				  <div class="form-group col-md-12" style="padding:0">
				  	<div class="col-md-2 col-md-offset-3" style="padding:0">
					   <label for="date_of_birth">Date of Birth</label>
					</div>
					<div class="col-md-4" style="padding:0;">
				        <input required onchange="passCheck()" class="form-control" type="date" id="date_of_birth" name="date_of_birth" maxlength="100" value="<?php echo set_value('date_of_birth'); ?>"  required/>
				        <?php echo form_error('date_of_birth'); ?>
				    </div>
				  </div>
				  <div class="form-group col-md-12" style="padding:0">
				  	<div class="col-md-2 col-md-offset-3" style="padding:0">
					   <label for="address" style="vertical-align:top; line-height:7;">Address <span class="required">*</span></label>
					</div>
					<div class="col-md-4" style="padding:0">
						<?php echo form_textarea( array( 'name' => 'address', 'rows' => '5', 'cols' => '80', 'value' => set_value('address') ) )?>
						<?php echo form_error('address'); ?>
					</div>
				  </div>
				  <div class="form-group col-md-12" style="padding:0">
				  	<div class="col-md-2 col-md-offset-3" style="padding:0">
					    <label for="password">Password <span class="required">*</span></label>
					</div>
					<div class="col-md-4" style="padding:0">
				        <input onchange="passCheck()"  onkeyup="passCheck()" required class="form-control" id="password" type="password" name="password" maxlength="100" value="<?php echo set_value('password'); ?>"  />
				        <?php echo form_error('password'); ?>
				     </div>
				  </div>
				  <div class="form-group col-md-12" style="padding:0">
				  	<div class="col-md-2 col-md-offset-3" style="padding:0">
					    <label for="confirm_password">Confirm Password <span class="required">*</span></label>
					</div>
					<div class="col-md-4" style="padding:0">
				       	<input onchange="passCheck()" onkeyup="passCheck()" required class="form-control" id="confirm_password" style="width:100%" type="password"  maxlength="100" name="confirm_password"  value="<?php echo set_value('confirm_password'); ?>"  />
				       	<?php echo form_error('confirm_password'); ?>
				     </div>
				  </div>
				<br>
				<div class="col-md-12">
			  		<?php echo form_submit( 'submit', 'Register','id="btnSubmit" style="background-color:#774c29; border:none;" class="btn btn-primary col-md-6 col-md-offset-3"'); ?>
					<?php echo form_close(); ?>
				</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#btnSubmit").attr('disabled','disabled');
	});
	function passCheck()
	{
		if($("#confirm_password").val()==$("#password").val())
			$("#btnSubmit").removeAttr('disabled');
		else
			$("#btnSubmit").attr('disabled','disabled');
	}
</script>
<style type="text/css">
	input[type="text"],[type="password"],[type="date"]{
		color :black;
	}
	label{
		text-align: left;
		float:left;
	}
	textarea{
		color :black;
		width:100%;
	}
</style>
<?php $this->load->view('FrontEnd/footer'); ?> 
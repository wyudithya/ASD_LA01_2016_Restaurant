<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/login.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<!--<script type="text/javascript" src="<?php echo base_url();?>application/assets/js/login.js"></script>-->

</head>
<body>
	<div class="container">
		<div class="login-container">
        	<div id="output"></div>
        	<img src="<?php echo base_url();?>assets/images/logo.png" class= "avatar">
            <div class="form-box">
            <?php
        		echo $err;
				echo form_open('BackEnd/Login/checkLogin');

				$opts = 'placeholder="username"';
				echo form_input('username', '', $opts);

				$opts = 'placeholder="password"';
				echo form_password('password', '', $opts);

				echo form_submit('submit','Log In',"class='btn btn-info btn-block login' style='background-color:#5bc0de; margin-top:10px;'");
			?>
            </div>
        </div>  
	</div>
</body>
</html>
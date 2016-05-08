<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="header">
<div class="container"

<!-- Navbar ================================================== -->
<?php //counting cart item
	$cartItem = 0;
	foreach($this->cart->contents() as $item)
	{
		$cartItem += $item['qty'];
	}
?>
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?php echo base_url('Home'); ?>"><img src="<?php echo base_url();?>assets/themes/images/logo.png" alt="Bootsshop"/></a>
<!-- 	<form class="form-inline navbar-search col-md-" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form> -->
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="<?php echo base_url('Home'); ?>">Home</a></li>
	 <li class=""><a href="<?php echo base_url('Menu'); ?>">Menu</a></li>
	 <li class=""><a href="<?php echo base_url('ContactUs'); ?>">Contact</a></li>
	 
	
	<?php if($this->session->userdata('username')==null || $this->session->userdata('username')=="" ){?>
	<li><a href="<?php echo base_url() ?>Cart"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [<?php echo $cartItem; ?>] Itemes in your cart </span> </a>
	</li>
	<li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" role="form" method="post" action="<?php echo site_url('Login/input');?>">
			  <div class="control-group">								
				<input type="text" id="username" type="text" name="username" maxlength="100" placeholder="Username">
			  </div>
			  <div class="control-group">
				<input type="password" id="password" name="password" maxlength="100" placeholder="Password">
			  </div>
			 <div class="control-group">
			  <button type="submit" class="btn btn-success">Sign in</button>
			  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			  </div>
			</form>		
		  </div>
	</div>
	</li>
	<?php }else{ ?>
	<li class=""><a href="<?php echo base_url() ?>Order/track">Track Order</a></li>
	<li class=""><a href="<?php echo base_url() ?>Order/history">Order History</a></li>
	<li><a href="<?php echo base_url() ?>Cart"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [<?php echo $cartItem; ?>] Itemes in your cart </span> </a>
	</li>
	<li class="">
	 <a href="<?php echo base_url() ?>Login/logout" role="button" style="padding-right:0"><span class="btn btn-large btn-warning">Logout</span></a>
	 </li>
	<?php  } ?>

    </ul>
  </div>
</div>
</div>
</div>
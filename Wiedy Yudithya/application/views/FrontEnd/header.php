<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="header">
<div class="container"

<!-- Navbar ================================================== -->
<?php //counting cart item
	$cartItem = 0;
	foreach($this->cart->contents() as $item)
	{
		$cartItem += 1;
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
	 
	

	<li><a href="<?php echo base_url() ?>Cart"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [<?php echo $cartItem; ?>] Itemes in your cart </span> </a>
	</li>
	

    </ul>
  </div>
</div>
</div>
</div>
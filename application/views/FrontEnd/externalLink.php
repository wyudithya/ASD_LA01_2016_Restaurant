    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
	<title>
		<?php echo $title; ?>
    </title>
    <?php if($title=='Cart' || $title=='CheckOut'){ ?>
        <meta name="viewport" content="width=device-width, initial-scale=0.6">
        <?php } else { ?>
         <meta name="viewport" content="width=device-width, initial-scale=0.75">
     <?php } ?>
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo base_url();?>assets/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo base_url();?>assets/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
    <link href="<?php echo base_url();?>assets/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->   
    <link href="<?php echo base_url();?>assets/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico">
    </style>
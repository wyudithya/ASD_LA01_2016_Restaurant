<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/favicon.png">
	<?php 
	$data['title']=$title;
	$this->load->view('FrontEnd/externalLink',$data); 
	?>
</head>
<body>
	<?php $this->load->view('FrontEnd/header',$data); ?>
	<?php $this->load->view($content,$data); ?>
	<?php $this->load->view('FrontEnd/footer'); ?>
</body>
<script type="text/javascript">

</script>
</html>
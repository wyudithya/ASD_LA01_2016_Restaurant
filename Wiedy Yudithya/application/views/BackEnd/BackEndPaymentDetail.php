<?php require("template/header.php") ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Payment Detail - <a href="<?php echo base_url() ?>BackEnd/Users/detail/<?php 
            echo $paymentDetail->userID ?>"><?php echo $paymentDetail->name ?></a></h1>
        </div>
    </div>
    <div class="row">
      <?php 
        $folder = 'assets/payment/'.$paymentID.'.*';
        $files = glob($folder);
      ?>
      <img style="max-width:80%; resize:auto;" src="<?php echo base_url().$files[0]; ?>">
      <br>
      <br>
    	<div class="col-md-12">
      <table>
	    	<tr><td><h4>Name </h4></td><td><h4> : <?php echo $paymentDetail->name ?></h4></td></tr>
	    	<tr><td><h4>Bank Name </h4></td><td><h4> : <?php echo $paymentDetail->bankName ?></h4></td></tr>
	    	<tr><td><h4>Account Number </h4></td><td><h4> : <?php echo $paymentDetail->accountNumber ?></h4></td></tr>
	    	<tr><td><h4>Account Holder Name </h4></td><td><h4> : <?php echo $paymentDetail->accountHolder ?></h4></td></tr>
        <tr><td><h4>Transfer Date </h4></td><td><h4> : <?php echo $paymentDetail->transferDate ?></h4></td></tr>
        <tr><td><h4>Total Payment </h4></td><td><h4> : <?php echo $paymentDetail->total ?></h4></td></tr>
        <tr><td><h4>Transfer Destination </h4></td><td><h4> : <a href="<?php echo base_url() ?>BackEnd/Destination/detail/<?php echo $paymentDetail->destinationID ?>"> <?php echo $paymentDetail->destinationBank ?></h4></td></tr>
        </table><br><br>
        <button class="btn btn-primary" onclick="document.location='<?php echo base_url() ?>BackEnd/Orders/detail/<?php echo $paymentDetail->orderID ?>'">View Order</button>
	    	<button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
	    		Process Payment
	    	</button>
    	</div>
    </div>
</div>

 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to process this payment?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="document.location = '<?php echo base_url() ?>BackEnd/Payment/process/<?php echo $paymentDetail->paymentID ?>'">Yes</button>
      </div>
    </div><!-- /.modal-content -->
</div> 

<?php require("template/footer.php") ?>
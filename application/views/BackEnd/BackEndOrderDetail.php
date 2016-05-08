<?php require("template/header.php") ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order Detail - <a href="<?php echo base_url() ?>BackEnd/Users/detail/<?php echo $orderHeader->userID ?>"><?php echo $orderHeader->name ?></a>
            	<a href="<?php echo base_url() ?>CheckOut/invoice/<?php echo $orderHeader->trackingID ?>" target="_blank"><button class="btn btn-default" style="float:right"><span class="fa fa-book"></span> View Invoice</button></a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
    	<div class="col-md-12">
	    	<h3>Status : <?php echo $orderHeader->orderStatus; ?></h3>
	    	<table>
	    	<tr><td><h4>Payment Type </h4></td><td><h4> : <?php echo $orderHeader->paymentType ?></h4></td></tr>
	    	<tr><td><h4>Tracking ID </h4></td><td><h4> : <?php echo $orderHeader->trackingID ?></h4></td></tr>
	    	<tr><td><h4>Nomor Resi </h4></td><td><h4> : <?php echo $orderHeader->nomorResi ?></h4></td></tr>
	    	<tr><td><h4>Order Date </h4></td><td><h4> : <?php echo $orderHeader->orderDate ?></h4></td></tr>
	    	<tr><td><h4>Address </h4></td><td><h4> : <?php echo $orderHeader->address ?></h4></td></tr>
	    	<tr><td><h4>Email </h4></td><td><h4> : <?php echo $orderHeader->email ?></h4></td></tr>
	    	<tr><td><h4>Phone Number </h4></td><td><h4> : <?php echo $orderHeader->phoneNumber ?></h4></td></tr>
	    	<tr><td><h4>Recipient Name </h4></td><td><h4> : <?php echo $orderHeader->recipientName ?></h4></td></tr>
	    	<tr><td><h4>Order Delivered </h4></td><td><h4> : <?php echo $orderHeader->deliveryDate ?></h4></td></tr>
	    	<tr><td><h4>Order Received </h4></td><td><h4> : <?php echo $orderHeader->receivedDate ?></h4></td></tr>
	    	<tr><td><h4>Notes </h4></td><td><h4> : <?php echo $orderHeader->notes ?></h4></td></tr>
	    	</table>
	    	<h4>Orders: </h4>
	    	<?php $grandTotal = 0; ?>
	    	<table class="table table-bordered table-hover table-striped">
	    		<tr>
	    			<th>Product Name</th>
	    			<th>Detail</th>
	    			<th>Category</th>
	    			<th>Price</th>
	    			<th>Qty</th>
	    			<th>Discount</th>
	    			<th>Total</th>
	    		</tr>
	    		<?php for($i=0;$i<count($orderDetail);$i++){ ?>
	    			<tr>
	    				<td><a href="<?php echo base_url() ?>BackEnd/Products/detail/<?php echo $orderDetail[$i]->productID ?>"><?php echo $orderDetail[$i]->productName ?></a></td>
	    				<?php if(strpos($orderDetail[$i]->color,'#')!==false){ ?>
		    				<td><div style="width:100%; height:2em; border: 1px solid black; background-color:<?php echo $orderDetail[$i]->color ?>"></div></td>
	    				<?php } else { ?>
	    					<td><?php echo $orderDetail[$i]->color; ?></td>
	    				<?php } ?>
	    				<td><?php echo $orderDetail[$i]->category ?></td>
	    				<td><?php echo $orderDetail[$i]->price ?></td>
	    				<td><?php echo $orderDetail[$i]->qty ?></td>
	    				<td><?php echo $orderDetail[$i]->discount ?></td>
	    				<td><?php echo $orderDetail[$i]->finalPrice; $grandTotal+=$orderDetail[$i]->finalPrice ?></td>
	    			</tr>
	    		<?php } ?>
	    		<tr>
	    			<th colspan="6">Shipping Cost</th>
	    			<th><?php echo $orderHeader->shippingCost; $grandTotal+=$orderHeader->shippingCost; ?></th>
	    		</tr>
	    		<tr>
	    			<th colspan="6">Grand Total</th>
	    			<th><?php echo $grandTotal ?></th>
	    		</tr>
	    	</table>
	    	<?php if($orderHeader->orderStatusID==3){ ?>
	    	<div class="form-group">
	            <div class="row">
	                <div class="col-md-2">
	                    <label for="nomorResi">Nomor Resi</label>
	                </div>
	                <div class="col-md-10">
	                    <input  type="text" onkeydown="checkResi()" class="form-control" id="nomorResi" name="nomorResi" value=""/>
	                </div>
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="row">
	                <div class="col-md-2">
	                    <label for="deliveryDate">Delivery Date</label>
	                </div>
	                <div class="col-md-10">
	                    <input  type="date" class="form-control" id="deliveryDate" name="deliveryDate" value="<?php echo date('Y-m-d',strtotime('now')) ?>"/>
	                </div>
	            </div>
	        </div>
	        <?php } else if($orderHeader->orderStatusID==4) { ?>
	        <div class="form-group">
	            <div class="row">
	                <div class="col-md-2">
	                    <label for="receivedDate">Received Date</label>
	                </div>
	                <div class="col-md-10">
	                    <input  type="date" class="form-control" id="receivedDate" name="receivedDate" value="<?php echo date('Y-m-d',strtotime('now')) ?>"/>
	                </div>
	            </div>
	        </div>
	        <?php } ?>
	    	<?php if(isset($nextStep)&&$nextStep!=""&&$orderHeader->orderStatusID!=1){ ?>
	    	<button id="btnProcess" class="btn btn-primary col-md-12" data-toggle="modal" data-target="#myModal">
	    		Move to <?php echo $nextStep; ?>
	    	</button>
	    	<?php } ?>
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
        <p>Are you sure want to move this order to <?php echo $nextStep; ?>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php if($orderHeader->orderStatusID==3||$orderHeader->orderStatusID==4) { ?>
        <button type="button" class="btn btn-primary" onclick="clickNext()">Yes</button>
        <?php } else { ?>
        <button type="button" class="btn btn-primary" onclick="window.location='<?php echo base_url() ?>BackEnd/Orders/next/<?php echo $orderHeader->orderID."/".$orderHeader->orderStatusID; ?>'">Yes</button>
        <?php } ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php require("template/footer.php") ?>
<?php if($orderHeader->orderStatusID==3) {?>
<script type="text/javascript">
	$(document).ready(function()
	{
		checkResi();
	});

	function clickNext()
	{
		window.location = '<?php echo base_url() ?>BackEnd/Orders/next/<?php echo $orderHeader->orderID ?>/<?php echo $orderHeader->orderStatusID ?>/'+$("#nomorResi").val()+"/"+$("#deliveryDate").val();
	}

	function checkResi()
	{
		if($("#nomorResi").val()=="")
			$("#btnProcess").attr('disabled','disabled');
		else
			$("#btnProcess").removeAttr('disabled');
	}
</script>
<?php } else if($orderHeader->orderStatusID==4){ ?>
<script type="text/javascript">
	function clickNext()
	{
		window.location = '<?php echo base_url() ?>BackEnd/Orders/next/<?php echo $orderHeader->orderID ?>/<?php echo $orderHeader->orderStatusID ?>/'+$("#receivedDate").val();
	}
</script>
<?php } ?>
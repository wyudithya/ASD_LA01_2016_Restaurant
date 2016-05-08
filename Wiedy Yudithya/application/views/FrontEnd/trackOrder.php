<div class="col-md-12">
	<div id="content" align="center">
		<div id="whiteBlock">
			Track Your Order
		</div>
		<br>
		<div class="col-md-8 col-md-offset-2">
			<form action="<?php echo base_url() ?>Order/track">
			<div class="form-group col-md-12 no-padding">
				<div class="col-md-3 no-padding" style="overflow:hidden; text-align:left">
		 			<label for="orderNumber" style="font-size:1.2em;line-height:2.3em">Order Number <span class="required">*</span></label>
		 		</div>
		 		<div class="col-md-9 no-padding" style="overflow:hidden;">
			        <input class="form-control" id="orderNumber" type="text" name="orderNumber" maxlength="100" value="<?php echo set_value('username'); ?>"  />
		        </div>
			</div>
			<button class="btn brown col-md-12">Track Order</button>
			</form>
		</div>
		<?php if(isset($orderHeader)){ ?>
			<div class="col-md-12 no-padding" id="whiteBlock" style="margin-top:2em;">
			<?php if(!isset($orderHeader->userID)) 
				{
					echo "Order not found, please check your tracking number again.";
				}
				else if($this->session->userdata('userID')!=$orderHeader->userID) 
				{
					echo "You are not permitted to see this order</div>"; 
				}
				else{ ?>
				Order Number: <?php echo $orderHeader->trackingID ?>

			</div>
			<div class="col-md-8 col-md-offset-2" style="background: rgba(255,255,255,0.3); margin-top:3em;">
				<table class="col-md-12">
					<tr>
						<td><h3>Status</h3></td>
						<td><h3>: <?php echo $orderHeader->orderStatus ?></h3></td>
					</tr>
					<tr>
						<td><h4>Order Date</h4></td>
						<td><h4>: <?php echo $orderHeader->orderDate ?></h4></td>
					</tr>
					<tr>
						<td><h4>Payment Type</h4></td>
						<td><h4>: <?php echo $orderHeader->paymentType ?></h4></td>
					</tr>
					<tr>
						<td><h4>Tracking Number</h4></td>
						<td><h4>: <?php echo $orderHeader->trackingID ?></h4></td>
					</tr>
					<tr>
						<td><h4>Nomor Resi</h4></td>
						<td><h4>: <a href="http://www.cekresi.com?noresi=<?php echo $orderHeader->nomorResi ?>"><?php echo $orderHeader->nomorResi ?></a></h4></td>
					</tr>
					<tr>
						<td><h4>Address</h4></td>
						<td><h4>: <?php $orderHeader->address; ?></h4></td>
					</tr>
					<tr>
						<td><h4>Email</h4></td>
						<td><h4>: <?php echo $orderHeader->email ?></h4></td>
					</tr>
					<tr>
						<td><h4>Phone Number</h4></td>
						<td><h4>: <?php echo $orderHeader->phoneNumber ?></h4></td>
					</tr>
					<tr>
						<td><h4>Recipient Name</h4></td>
						<td><h4>: <?php echo $orderHeader->recipientName ?></h4></td>
					</tr>
					<tr>
						<td><h4>Order Received</h4></td>
						<td><h4>: <?php echo $orderHeader->receivedDate ?></h4></td>
					</tr>
					<tr>
						<td><h4>Order Delivered</h4></td>
						<td><h4>: <?php echo $orderHeader->deliveryDate ?></h4></td>
					</tr>
					<tr>
						<td><h4>Notes</h4></td>
						<td><h4>: <?php echo $orderHeader->notes ?></h4></td>
					</tr>
				</table>
				<table class="col-md-12 table table-bordered table-hover" style="margin-top:3em; background:rgba(255,255,255,0.5)">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Detail</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Discount</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
					<?php $grandTotal=0; for($i=0;$i<count($orderDetail);$i++){ ?>
		    			<tr>
		    				<td><a href="<?php echo base_url() ?>Home/detail_product/<?php echo $orderDetail[$i]->productID ?>"><?php echo $orderDetail[$i]->productName ?></a></td>
		    				<?php if(strpos($orderDetail[$i]->color, '#')!==false){ ?>
		    					<td><div style="width:100%; height:1.5em; border:1px solid black; background-color:<?php echo $orderDetail[$i]->color ?>"></div></td>
		    				<?php } else { ?>
		    					<td><?php echo $orderDetail[$i]->color ?></td>
		    				<?php } ?>
		    				<td><?php echo $orderDetail[$i]->price ?></td>
		    				<td><?php echo $orderDetail[$i]->qty ?></td>
		    				<td><?php echo $orderDetail[$i]->discount ?></td>
		    				<td><?php echo $orderDetail[$i]->finalPrice; $grandTotal+=$orderDetail[$i]->finalPrice ?></td>
		    			</tr>
		    		<?php } ?>
		    		<tr>
		    			<th colspan="5">Shipping Cost</th>
		    			<th><?php echo $orderHeader->shippingCost; $grandTotal+=$orderHeader->shippingCost; ?></th>
		    		</tr>
		    		<tr>
		    			<th colspan="5">Grand Total</th>
		    			<th><?php echo $grandTotal ?></th>
		    		</tr>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>CheckOut/invoice/<?php echo $orderHeader->trackingID ?>">
					<button class="col-md-12 btn brown" style="background-color:#774c29; border:none; margin-bottom:1em;">
						<span class="fa fa-book"></span> View Invoice
					</button>
				</a>
			</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<?php $this->load->view('FrontEnd/footer'); ?> 
<div class="col-md-12">
	<div id="content" align="center">
		<div id="whiteBlock">
			Order History
		</div>
		<br>
		<div class="col-md-12 no-padding">
		<?php for($i=0;$i<count($order);$i++) { ?>
			<div class="col-md-6">
				<div class="col-md-12"  style="background:rgba(255,255,255,0.3); cursor:pointer;" onclick="document.location = '<?php echo base_url() ?>Order/track?orderNumber=<?php echo $order[$i]->trackingID ?>'">
					<h2>Tracking ID: <?php echo $order[$i]->trackingID ?></h2>
					<h3>Order Date: <?php echo $order[$i]->orderDate ?></h3>
					<table class="col-md-12">
						<tr>
							<td><h3>Order Status</h3></td>
							<td><h3>: <?php echo $order[$i]->orderStatus ?></h3></td>
						</tr>
						<tr>
							<td><h4>Payment Type</h4></td>
							<td><h4>: <?php echo $order[$i]->paymentType ?></h4></td>
						</tr>
						<tr>
							<td><h4>Nomor Resi</h4></td>
							<td><h4>: <a href="http://www.cekresi.com?noresi=<?php echo $order[$i]->nomorResi ?>"><?php echo $order[$i]->nomorResi ?></a></h4></td>
						</tr>
						<tr>
							<td><h4>Delivery Date</h4></td>
							<td><h4>: <?php echo $order[$i]->deliveryDate ?></h4></td>
						</tr>
						<tr>
							<td><h4>Total</h4></td>
							<td><h4>: <?php echo $order[$i]->total+$order[$i]->shippingCost ?></h4></td>
						</tr>
					</table>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php $this->load->view('FrontEnd/footer'); ?> 
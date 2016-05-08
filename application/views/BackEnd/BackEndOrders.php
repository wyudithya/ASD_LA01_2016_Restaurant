<?php require("template/header.php"); ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(isset($header)) echo "Orders - ".$header; else echo "All Orders"; ?></h1>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped tablesorter">
			<thead>
			<tr>
				<th>Name</th>
				<th>Tracking ID</th>
				<th>Payment Type</th>
				<th>Order Date</th>
				<th>Delivered</th>
				<th>Notes</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
			<?php
				if(count($orders)==0)
				{?>
			<tr><td colspan="7" style="text-align:center">No Data Available</td></tr>
			<?php
				}
				for($i=0;$i<count($orders);$i++)
				{ ?>
					<tr onclick="document.location = '<?php echo base_url() ?>BackEnd/Orders/detail/<?php echo $orders[$i]->orderID ?>'" style="cursor:pointer; <?php if($orders[$i]->isRead=='0') echo "background-color:#f99;"; ?>">
						<td><?php echo $orders[$i]->name ?></td>
						<td><?php echo $orders[$i]->trackingID ?></td>
						<td><?php echo $orders[$i]->paymentType ?></td>
						<td><?php echo $orders[$i]->orderDate ?></td>
						<td><?php echo $orders[$i]->deliveryDate ?></td>
						<td><?php echo $orders[$i]->notes ?></td>
						<td><?php echo $orders[$i]->orderStatus ?></td>
					</tr>
			<?php } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>

<?php require("template/footer.php"); ?>

<script type="text/javascript">
$(document).ready(function(){
    $(".tablesorter").tablesorter();
});
</script>
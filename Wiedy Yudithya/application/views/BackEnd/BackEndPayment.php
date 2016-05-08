<?php require("template/header.php"); ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(isset($header)) echo "Contact - ".$header; else echo "Payment Confirmation"; ?></h1>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped tablesorter">
			<thead>
				<tr>
					<th>Name</th>
					<th>Total Payment</th>
					<th>Time</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(count($paymentNotification) != 0 )
			{ 
				for($i=0;$i<count($paymentNotification);$i++)
				{ ?>
					<tr style="cursor:pointer; <?php if($paymentNotification[$i]->isRead=='0') echo "background-color: #f99;"; ?>">
						<td><a href="<?php echo base_url(); ?>BackEnd/Users/detail/<?php echo $paymentNotification[$i]->userID ?>"><?php echo $paymentNotification[$i]->name ?></a></td>
						<td><?php echo $paymentNotification[$i]->total ?></td>
						<td><?php echo $paymentNotification[$i]->time ?></td>
						<td>
							<button class="btn btn-default" onclick="document.location = '<?php echo base_url() ?>BackEnd/Orders/detail/<?php echo $paymentNotification[$i]->orderID ?>'">View Order</button>
							<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="document.location = '<?php echo base_url() ?>BackEnd/Payment/detail/<?php echo $paymentNotification[$i]->referenceID ?>';">View Payment</button>
						</td>
					</tr>
				<?php  } 
			} else{ ?>
				<tr>
						<td colspan="6" style="text-align: center;">No Data Available</td>
					
					</tr>
					<?php
			}
			?>
			</tbody>
			</table>
		</div>
	</div>
</div>

<?php require("template/footer.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
    $(".tablesorter").tablesorter({
        headers: {3: {sorter: false}}
    });
});
</script>

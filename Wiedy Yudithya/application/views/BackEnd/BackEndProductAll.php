<?php require("template/header.php"); ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(isset($header)) echo "Product - ".$header; else echo "All Product"; ?></h1>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped tablesorter">
			<thead>
				<tr>
					<th>ProductName</th>
					<th>CategoryName</th>
					<th>Price</th>
					<th>ProductDesc</th>
					<th>TransactionCount</th>
					<th>Discount</th>
					<th>Detail</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(count($product) != 0 )
			{ 
				for($i=0;$i<count($product);$i++)
				{ ?>
					<tr onclick="document.location = '<?php echo base_url() ?>BackEnd/Products/viewProductbyID/<?php echo $product[$i]->ProductID ?>';" style="cursor:pointer">
						<td><?php echo $product[$i]->ProductName ?></td>
						<td><?php echo $product[$i]->CategoryName ?></td>
						<td><?php echo $product[$i]->Price ?></td>
						<td><?php echo $product[$i]->ProductDesc ?></td>
						<td><?php echo $product[$i]->TransactionCount ?></td>
						<td><?php echo $product[$i]->Discount ?></td>
						<?php if(strpos($product[$i]->color,'#')!==false){ ?>
							<td><?php if($product[$i]->color!="") { ?><div style="border: 1px solid #000; width:25px; height:25px; background-color:<?php echo $product[$i]->color ?>"><?php } ?></td>
						<?php } else { ?>
							<td><?php echo $product[$i]->color ?></td>
						<?php } ?>
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
            headers: {6: {sorter: false}}
        });
});
</script>

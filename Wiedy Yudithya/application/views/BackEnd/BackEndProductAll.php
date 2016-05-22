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
					<th>Name</th>
					<th>Price</th>
					<th>Desc</th>
					<th>Action</th>
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
						<td><?php echo $product[$i]->Price ?></td>
						<td><?php echo $product[$i]->Desc?></td>
						<td>
						<button class="btn btn-primary" onclick="document.location = 'http://localhost:8080/vapebeta/BackEnd/BankAccount/edit/1';"><span class="fa fa-pencil"></span> Edit</button>
						<button class="btn btn-danger" onclick="prepareToDelete('1')" data-toggle="modal" data-target="#myModal"><span class="fa fa-trash-o"></span> Delete</button>
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
            headers: {6: {sorter: false}}
        });
});
</script>

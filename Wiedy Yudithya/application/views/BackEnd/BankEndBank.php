<?php require("template/header.php"); ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(isset($header)) echo "User - ".$header; else echo "All Bank Account"; ?>
            	<button class="btn btn-primary" style="float:right" onclick="document.location='<?php echo base_url(); ?>BackEnd/BankAccount/edit'"><span class="fa fa-plus"></span> Add Bank Account</button>
            </h1>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped tablesorter">
			<thead>
			<tr>
				<th>No</th>
				<th>Bank Name</th>
				<th>Account Number</th>
				<th>Account Holder Name</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(count($bank) != 0 )
			{
				for($i=0;$i<count($bank);$i++)
				{ ?>
					<tr>
						<td><?php echo ($i+1) ?></td>
						<td><?php echo $bank[$i]->name ?></td>
						<td><?php echo $bank[$i]->accountNumber ?></td>
						<td><?php echo $bank[$i]->holderName ?></td>
						<td>
							<button class="btn btn-primary" onclick="document.location = '<?php echo base_url() ?>BackEnd/BankAccount/edit/<?php echo $bank[$i]->bankID ?>';"><span class="fa fa-pencil"></span> Edit</button>
							<button class="btn btn-danger" onclick="prepareToDelete('<?php echo $bank[$i]->bankID ?>')" data-toggle="modal" data-target="#myModal"><span class="fa fa-trash-o"></span> Delete</button>
						</td>
					</tr>
				<?php } 
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <div class="modal-body">
        <p id="msg">Are you sure want to delete this category?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="deleteBank()">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php require("template/footer.php"); ?>
<script type="text/javascript">

var bankID = "";

function prepareToDelete(id)
{
	bankID = id;
}

function deleteBank()
{
	document.location = '<?php echo base_url() ?>BackEnd/BankAccount/delete/'+bankID;
}

$(document).ready(function(){
    $(".tablesorter").tablesorter({
        headers: {4: {sorter: false}}
    });
});
</script>
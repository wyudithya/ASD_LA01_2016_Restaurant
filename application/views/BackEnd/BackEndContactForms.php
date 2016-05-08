<?php require("template/header.php"); ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(isset($header)) echo "Contact - ".$header; else echo "All Contact"; ?></h1>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped tablesorter">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Message</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(count($contact) != 0 )
			{ 
				for($i=0;$i<count($contact);$i++)
				{ ?>
					<tr onclick="document.location = '<?php echo base_url() ?>BackEnd/ContactForms/detail/<?php echo $contact[$i]->ContactID ?>';" style="cursor:pointer; <?php if($contact[$i]->IsRead=='0') echo "background-color:#ff9999;"; ?>">
						<td><?php echo $contact[$i]->Name ?></td>
						<td><?php echo $contact[$i]->Email ?></td>
						<td><?php echo $contact[$i]->PhoneNumber ?></td>
						<td><?php echo $contact[$i]->Message ?></td>
						<td><?php echo $contact[$i]->Time ?></td>
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
    $(".tablesorter").tablesorter();
});
</script>

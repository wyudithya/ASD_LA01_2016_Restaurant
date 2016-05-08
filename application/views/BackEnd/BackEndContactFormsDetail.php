<?php require("template/header.php") ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contact Detail - <a href="<?php echo base_url() ?>BackEnd/Users/detail/<?php 
            echo $contactDetail->UserID ?>"><?php echo $contactDetail->Name ?></a></h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
      <table>
	    	<tr><td><h4>Name </h4></td><td><h4> : <?php echo $contactDetail->Name ?></h4></td></tr>
	    	<tr><td><h4>Email </h4></td><td><h4> : <?php echo $contactDetail->Email ?></h4></td></tr>
	    	<tr><td><h4>PhoneNumber </h4></td><td><h4> : <?php echo $contactDetail->PhoneNumber ?></h4></td></tr>
	    	<tr><td><h4>Time </h4></td><td><h4> : <?php echo $contactDetail->Time ?></h4>	    	</td></tr>
        </table>
	    	<p><h4>Message :</h4> <?php echo $contactDetail->Message ?><p><br><br>
	    	<button class="btn btn-danger col-md-12" data-toggle="modal" data-target="#myModal">
	    		Delete 		
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
        <p>Are you sure want to delete this contact</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="document.location = '<?php echo base_url() ?>BackEnd/ContactForms/deleteContact/<?php echo $contactDetail->ContactID ?>'">Yes</button>
      </div>
    </div><!-- /.modal-content -->
</div> 

<?php require("template/footer.php") ?>
<?php require("template/header.php") ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Detail - <a href="<?php echo base_url() ?>BackEnd/Users/detail/<?php 
            echo $userdetail->UserID ?>"><?php echo $userdetail->Name ?></a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
    	<div class="col-md-12">
      <table>
	    	<tr><td><h4>Name </h4></td><td><h4> : <?php echo $userdetail->Name ?></h4></td></tr>
	    	<tr><td><h4>Username </h4></td><td><h4> : <?php echo $userdetail->Username ?></h4></td></tr>
	    	<tr><td><h4>UserType </h4></td><td><h4> : <?php echo $userdetail->UserType ?></h4>	    	</td></tr>
	    	<tr><td><h4>Address </h4></td><td><h4> : <?php echo $userdetail->Address ?></h4></td></tr>
	     	<tr><td><h4>DOB </h4></td><td><h4> : <?php echo $userdetail->DOB ?></h4></td></tr>
        <tr><td><h4>Email Address </h4></td><td><h4> : <?php echo $userdetail->Email ?></h4></td></tr>
        <tr><td><h4>Phone Number </h4></td><td><h4> : <?php echo $userdetail->PhoneNumber ?></h4></td></tr>
	    </table>
		<?php if($userdetail->UserTypeID <= $this->session->userdata('userTypeID')) {?>
			<button class="btn btn-primary col-md-1" disabled="true">
	    	Edit	
	    	</button>
	    	<button class="btn btn-danger col-md-1" disabled="true">
	    		Delete 		
	    	</button>


		<?php } else{?>
	    	<button class="btn btn-primary col-md-1" onclick="document.location = '<?php echo base_url() ?>BackEnd/Users/updateUser/<?php echo $userdetail->UserID ?>'">
	    	Edit	
	    	</button>
	    	<button class="btn btn-danger col-md-1" data-toggle="modal" data-target="#myModal">
	    		Delete 		
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
        <p>Are you sure want to delete this user</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="document.location = '<?php echo base_url() ?>BackEnd/Users/deleteUser/<?php echo $userdetail->UserID ?>'">Yes</button>
      </div>
    </div><!-- /.modal-content -->
</div> 

<?php require("template/footer.php") ?>
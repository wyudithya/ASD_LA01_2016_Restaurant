<?php require("template/header.php"); ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Banner 
                <button style="float:right" class="btn btn-primary" onclick="document.location='<?php echo base_url(); ?>BackEnd/Banner/addBanner'">
                    <span class="fa fa-plus"></span> Add Banner
                </button>
            </h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<table class="table table-bordered table-hover table-striped tablesorter">
    			<thead>
                <tr>		
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Category Name</th>
    				<th>Actions</th>
    			</tr>
                </thead>
                <tbody>
    			<?php 
                    if(count($banner)==0)
                    {?>
                <tr><td colspan="4" style="text-align:center">No Data Available</td></tr>
                <?php
                    }
                    for($i=0;$i<count($banner);$i++){ 
                ?>
    			<tr>

					<td><?php echo $banner[$i]->ProductID ?></td>
					<td><?php echo $banner[$i]->ProductName ?></td>
					<td><?php echo $banner[$i]->CategoryName ?></td>
    				<td>
    					<button class="btn btn-default" onclick="document.location='<?php echo base_url()?>BackEnd/Banner/editBanner/<?php echo $banner[$i]->BannerID ?>'"><span class="fa fa-pencil"></span>Edit</button>
    					<button class="btn btn-danger" data-toggle="modal" 
                        data-target="#myModal" 
                        onclick="changeModal('<?php echo $banner[$i]->BannerID ?>')">
                        <span class="fa fa-trash-o"
    					></span>Delete</button>
    				</td>
    			</tr>
    			<?php } ?>
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
        <p id="msg">Are you sure want to delete this banner?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="deleteCategory()">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php require("template/footer.php") ?>
<script type="text/javascript">
var currentID = 0;
function deleteCategory()
{
    document.location = '<?php echo base_url(); ?>BackEnd/Banner/deleteBannerByID/'+currentID;
}

function changeModal(id)
{
    currentID = id;
}
$(document).ready(function(){
    $(".tablesorter").tablesorter({
        headers: {3: {sorter: false}}
    });
});
</script>

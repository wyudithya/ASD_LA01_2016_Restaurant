<?php require("template/header.php"); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category 
                <button style="float:right" class="btn btn-primary" onclick="document.location='<?php echo base_url(); ?>BackEnd/Category/addNew'">
                    <span class="fa fa-plus"></span> Add Category
                </button>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Product Count</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    if(count($categories)==0)
                    {?>
                <tr><td colspan="3" style="text-align:center">No Data Available</td></tr>
                <?php
                    }
                    for($i=0;$i<count($categories);$i++){ 
                ?>
                <tr>
                    <?php if(count($categories[$i]->childCategory)==0){ ?>
                    <td><?php echo $categories[$i]->categoryName ?></td>
                    <td><?php echo $categories[$i]->productCount ?></td>
                    <td>
                        <button class="btn btn-default" onclick="document.location='<?php echo base_url()?>BackEnd/Category/edit/<?php echo $categories[$i]->categoryID ?>'"><span class="fa fa-pencil"></span>Edit</button>
                        <button class="btn btn-danger<?php if($categories[$i]->productCount>0) echo 
                        " disabled";?>" data-toggle="modal" data-target="#myModal" 
                        onclick="changeModal('<?php echo $categories[$i]->categoryName; ?>',
                        <?php echo $categories[$i]->categoryID ?>)"><span class="fa fa-trash-o"></span>Delete</button>
                    </td>
                    <?php }else { ?>
                    <td colspan="3">
                        <strong><?php echo $categories[$i]->categoryName; ?></strong>
                        <button style="float:right; margin-right:23em;" onclick="document.location='<?php echo base_url()?>BackEnd/Category/edit/<?php echo $categories[$i]->categoryID ?>'" class="btn btn default"><span class="fa fa-pencil"></span>Edit</button>
                        <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th>Category Name</th>
                            <th>Product Count</th>
                            <th>Actions</th>
                        </tr>
                        <?php for($j=0;$j<count($categories[$i]->childCategory);$j++){ ?>
                        <tr>
                            <td><?php echo $categories[$i]->childCategory[$j]->categoryName; ?></td>
                            <td><?php echo $categories[$i]->childCategory[$j]->productCount; ?></td>
                            <td>
                                <button class="btn btn-default" onclick="document.location='<?php echo base_url()?>BackEnd/Category/edit/<?php echo $categories[$i]->childCategory[$j]->categoryID ?>'"><span class="fa fa-pencil"></span>Edit</button>
                                <button class="btn btn-danger<?php if($categories[$i]->childCategory[$j]->productCount>0) echo 
                                " disabled";?>" data-toggle="modal" data-target="#myModal" 
                                onclick="changeModal('<?php echo $categories[$i]->childCategory[$j]->categoryName; ?>',
                                <?php echo $categories[$i]->childCategory[$j]->categoryID ?>)"><span class="fa fa-trash-o"></span>Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                        </table>
                    </td>
                    <?php } ?>
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
        <p id="msg">Are you sure want to delete this category?</p>
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
    document.location = '<?php echo base_url(); ?>BackEnd/Category/delete/'+currentID;
}
function changeModal(c,id)
{
    currentID = id;
    $("#msg").html("Are you sure want to delete category <strong>"+c+"</strong> from this list?")
}
$(document).ready(function(){
    $(".tablesorter").tablesorter({
        headers: {2: {sorter: false}}
    });
});
</script>
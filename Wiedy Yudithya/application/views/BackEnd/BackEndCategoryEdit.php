<?php require("template/header.php"); ?>

<div id="page-wrapper">
  <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(!isset($currentData)) echo "Add New "; else echo "Update "; ?>Category 
            </h1>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <form method="post"  method="POST" action="<?php if(!isset($currentData)) {
        echo base_url() 
        ?>BackEnd/Category/addCategory<?php } else { echo base_url()?>BackEnd/Category/update/<?php echo $currentID; } ?>">
               <div class="form-group">
                  <div class="row">
                      <div class="col-md-3">
                          <label for="chkfeatured">Sub-Category</label>
                      </div>
                      <div class="col-md-9">
                          <input type="checkbox" onchange="checkChange()" <?php if(isset($detail)&&$detail->isSubCategory=='1') echo 'checked'; ?> id="chkfeatured" name="chkSubCategory"> Is This a sub-category?</span>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="ddlcategory">Parent Category</label>
                            </div>
                            <div class="col-md-9">
                            <select class="form-control" id="ddlcategory" name="parentCategory" disabled>
                                 <?php 
                                     for($i=0;$i<count($parentCategory);$i++) { 
                                      if($parentCategory[$i]->categoryID==$currentID) continue;
                                        ?>
                               <option value="<?php echo $parentCategory[$i]->categoryID;?>" <?php if(isset($detail)&&$detail->parentCategoryID==$parentCategory[$i]->categoryID) echo 'selected' ?>>
                                <?php echo $parentCategory[$i]->categoryName;?> </option>
                               <?php }?>
                              </select>
                                
                            </div>
                        </div>
                    </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-3">
                          <label for="txt_name">Name</label>
                      </div>
                      <div class="col-md-9">
                          <input  type="text" class="form-control" id="txt_name" name="txt_name" value="<?php if(isset($currentData)) echo $currentData ?>" required/>
                      </div>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
          </form><!-- Close Form -->
        </div>
    </div>
</div>

<?php require("template/footer.php"); ?>
<script type="text/javascript">

 $(document).ready(function()
 {
    checkChange();
 });
  function checkChange()
  {
    if($("#chkfeatured:checkbox:checked").length==1)
    {
      $("#ddlcategory").removeAttr("disabled");
    }
    else
      $("#ddlcategory").attr("disabled","disabled");
  }
</script>
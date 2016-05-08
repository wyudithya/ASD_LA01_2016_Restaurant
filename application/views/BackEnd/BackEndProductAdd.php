 <?php require("template/header.php") ?>

<div id="page-wrapper">
<div class="row" id="input_customer_form">
            <div class="col-md-offset-2 col-md-8">
                <form method="post"  method="POST" enctype ="multipart/form-data" action="<?php echo base_url() ?>BackEnd/Products/addProduct">
                    <h2>Add Product</h2>                  
                    <hr />
                    <!-- modified by FS 28 OKT
                    ubah urutan, tambah tiny mce, tambah prefix sama postfix input -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_productname">Product Name</label>
                            </div>
                            <div class="col-md-10">
                                <input  type="text" class="form-control" id="txt_productname" name="txt_productname" value="" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="chkfeatured">Featured</label>
                            </div>
                            <div class="col-md-10">
                                <input type="checkbox" id="chkfeatured" name="chkfeatured"><span data-placement="right" title="Will this product added as featured product?" data-toggle="tooltip"> Is This product featured?</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="ddlcategory">Category</label>
                            </div>
                            <div class="col-md-10">
                            <select class="form-control" id="ddlcategory" name="ddlcategory" onchange="ddlCategoryChanged()">
                                 <?php 
                                     for($i=0;$i<count($parentCategory);$i++) { 
                                        ?>
                               <option value="<?php echo $parentCategory[$i]->categoryID;?>" <?php if(isset($currentCategory)&&$parentCategory[$i]->categoryID==$currentCategory) echo "selected" ?>>
                                <?php echo $parentCategory[$i]->categoryName;?> </option>
                               <?php }?>
                              </select>
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="ddlSubCategory">Sub-Category</label>
                            </div>
                            <div class="col-md-10">
                            <select class="form-control" id="ddlSubCategory" name="ddlSubCategory" value="7" required>
                                <option id="default" value="0" <?php if(!isset($currentCategory)) echo "selected"; ?> >-- No Sub Category --</option>
                                 <?php
                                     for($i=0;$i<count($category);$i++) { 
                                        ?>
                               <option class="parent<?php echo $category[$i]->parentID ?>" value="<?php echo $category[$i]->categoryID;?>" <?php if(isset($currentCategory)&&$category[$i]->categoryID==$currentCategory) echo "selected" ?>>
                                <?php echo $category[$i]->categoryName;?> </option>
                               <?php }?>
                              </select>
                                
                            </div>
                        </div>
                    </div>

                    <!-- modified by FS 1 Des -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="color">Color / Taste</label><br />
                            </div>
                            <div class="col-md-10">
                            <input type="color" class="form-control" id="color" name="color">
                            <input type="text" class="form-control" id="taste" name="taste" placeholder="taste">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="shortDescription">Short Description</label><br />
                            </div>
                            <div class="col-md-10">
                            <textarea  rows="2" cols="20" class="form-control"  id="shortDescription" name="shortDescription" ></textarea>
                            </div>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_productdesc">Product Description</label><br />
                            </div>
                            <div class="col-md-10">
                         <textarea  rows="2" cols="20" class="form-control"  id="txt_productdesc" name="txt_productdesc" ></textarea>
                            </div>
                        </div>
                    </div>
                    
                  
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_price">Price</label>
                            </div>
                            <div class="col-md-10 input-group" style="padding-left:15px; padding-right:15px">
                                <span class="input-group-addon">Rp. </span>
                                <input  type="number" class="form-control" id="txt_price" name="txt_price" value="" required/>
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_discount">Discount</label>
                            </div>
                            <div class="col-md-10 input-group" style="padding-left:15px; padding-right:15px">
                                <input  type="number" class="form-control" max="100" id="txt_discount" name="txt_discount" value="" required/>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                    </div>

                       <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_keyword">Keyword</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="txt_keyword" name="txt_keyword" value="" required data-toggle="tooltip" data-placement="left" title="Separate each keyword using space"/>
                            </div>
                        </div>
                    </div>            

                    <!-- modified by FS 30 okt -->
                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Image">Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="ImageName1" class="form-control" accept="image/*" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="image2">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Image">Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="ImageName2" class="form-control" accept="image/*" >
                            </div>
                            <div class="col-md-1">
                                <button type="button" onclick="removeImage(2)" class="btn btn-danger"><span class="fa fa-times"></span></button>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group" id="image3">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Image">Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="ImageName3" class="form-control" accept="image/*" >
                               
                            </div>
                            <div class="col-md-1">
                                <button type="button" onclick="removeImage(3)" class="btn btn-danger"><span class="fa fa-times"></span></button>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group" id="image4">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Image">Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="ImageName4" class="form-control" accept="image/*" >
                            </div>
                            <div class="col-md-1">
                                <button type="button" onclick="removeImage(4)" class="btn btn-danger"><span class="fa fa-times"></span></button>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group" id="image5">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Image">Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="ImageName5" class="form-control" accept="image/*" >
                            </div>
                            <div class="col-md-1">
                                <button type="button" onclick="removeImage(5)" class="btn btn-danger"><span class="fa fa-times"></span></button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="addImage">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                                <button type="button" class="btn btn-primary" onclick="incrementImage()"><span class="fa fa-plus"></span> Add more image</button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
                </form><!-- Close Form -->
            </div><!-- Close Col -->
        </div>

<?php require("template/footer.php") ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    //added by FS 28 Okt
    tinymce.init({
        selector: "#txt_productdesc",
        theme: "modern"
    });
    //modified by FS 1 Des
    tinymce.init({
        selector: "#shortDescription",
        theme: "modern"
    });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    //added by FS 30 okt

    $(document).ready(function()
    {
        for(var i=2;i<6;i++)
            $("#image"+i).hide();
        ddlCategoryChanged();
    });

    function removeImage(index)
    {
        isShown[index-1] = 0;
        $("#image"+index).hide();
        $("#addImage").show();
    }

    var isShown = [1,0,0,0,0];
    function incrementImage()
    {
        for(var i=0;i<isShown.length;i++)
        {
            if(isShown[i]==0)
            {
                isShown[i]=1;
                $("#image"+(i+1)).show();
                break;
            }
        }
        for(var i=0;i<isShown.length;i++)
        {
            if(isShown[i]==0)
                return;
        }
        $("#addImage").hide();
    }
    function ddlCategoryChanged()
    {

        var value = $("#ddlcategory").val();
        $("#ddlSubCategory").children().hide();
        $("#ddlSubCategory").find(".parent"+value).show();
        $("#ddlSubCategory").find("#default").show();
        $("#ddlSubCategory").val("0");
    }
</script>
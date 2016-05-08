 <?php require("template/header.php") ?>

<div id="page-wrapper">
<div class="row" id="input_customer_form">
            <div class="col-md-offset-2 col-md-8">
                <form method="post"  method="POST" enctype ="multipart/form-data" action="<?php echo base_url() ?>BackEnd/Banner/editBanner/<?php echo $current->BannerID ?>">
                    <h2>Edit Banner</h2>                  
                    <hr />
                    <!-- modified by FS 28 OKT
                    ubah urutan, tambah tiny mce, tambah prefix sama postfix input -->

                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="ddlcategory">Category</label>
                            </div>
                            <div class="col-md-10">
                            <select class="form-control" id="ddlcategory" name="ddlcategory" value="7" onchange="Modalddlproduct()" required>
                            <option value="">--Select Category-- </option>
                                 <?php 
                                     for($i=0;$i<count($category);$i++) { 
                                        ?>
                               <option <?php if(!empty($current->CategoryID)&&$category[$i]->categoryID==$current->CategoryID) echo "selected" ?>
                               value="<?php echo $category[$i]->categoryID;?>">
                                <?php echo $category[$i]->categoryName;?> </option>
                               <?php }?>
                              </select>
                            </div>
                        </div>
                    </div>
                          <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="ddlproduct">Product</label>
                            </div>
                            <div class="col-md-10">
                            <select class="form-control" id="ddlproduct" name="ddlproduct" value="7" required>
                            <option value=""> --Select Product-- </option>
                                 <?php 
                                     for($i=0;$i<count($product);$i++) {  ?>
                               <option <?php if(!empty($current->ProductID)&&$product[$i]->ProductID==$current->ProductID) echo "selected" ?>
                               value="<?php echo $product[$i]->ProductID;?>">
                                <?php echo $product[$i]->ProductName;?> </option>
                               <?php }?>
                              </select>
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Image">Image</label>
                            </div>
                            <div class="col-md-5">
                                <input type="file" name="ImageName1" class="form-control" change="inputNewImage();" accept="image/*" required>
                            </div>
                            <div class="col-md-5" style="color:red;"><label id='rImage'></div>
                            </div>
                        <div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
                </form><!-- Close Form -->
            </div><!-- Close Col -->
        </div>

<?php require("template/footer.php") ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    //added by FS 28 Okt
    inputNewImage();
           <?php
                if(isset($error['Banner'])){
            ?> 
                document.getElementById("rImage").innerHTML = "<?php echo $error['Banner']; ?>";
            <?php
                 }
             ?> 
function inputNewImage(){
    document.getElementById("rImage").innerHTML = "";
}

function Modalddlproduct(){

            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>BackEnd/Banner/showProduct",
                data:{"CategoryID":$("#ddlcategory").val()},
                 dateType : 'json',
                success: function(data){
                    $('#ddlproduct option').remove();
                    var json_data = $.parseJSON(data),options;
                    for(var i = 0; i<json_data.length; i++){
                        if(i == 0 ){
                            options += '<option value="0">--Select Product -- </option>';
                        }
                        var a = json_data[i].ProductID;
                      options += '<option value="'+a+'">'+json_data[i].ProductName+'</option>';

                    }
                    $("#ddlproduct").html(options);
            }
        });

}


    tinymce.init({
        selector: "#txt_productdesc",
        theme: "modern"
    });
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>
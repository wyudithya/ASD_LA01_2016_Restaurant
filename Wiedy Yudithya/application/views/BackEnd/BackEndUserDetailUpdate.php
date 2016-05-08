 <?php require("template/header.php") ?>

<div id="page-wrapper">
<div class="row" id="input_customer_form">
            <div class="col-md-offset-2 col-md-8">
                <form method="post"  method="POST" action="<?php echo base_url() ?>BackEnd/Users/updateUser/<?php 
            echo $userdetail->UserID ?>">
                    <h2>Edit User</h2>                  
                    <hr />
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_name">Name</label>
                            </div>
                            <div class="col-md-10">
                                <input  type="text" class="form-control" id="txt_name" name="txt_name" value="<?php echo $userdetail->Name ?>" required/>
                            </div>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_address">Address</label><br />
                            </div>
                            <div class="col-md-10">
                                <textarea  rows="2" cols="20" class="form-control"  id="txt_address" name="txt_address" required><?php echo $userdetail->Address ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="txt_DOB">DOB</label>
                            </div>
                            <div class="col-md-10">
                                <input  type="date" class="form-control" id="txt_DOB" value="<?php $t = strtotime($userdetail->DOB); echo date('Y-m-d',$t); ?>" name="txt_DOB" required/>
                            </div>
                        </div>
                    </div>
                                       
                    <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
                </form><!-- Close Form -->
            </div><!-- Close Col -->
        </div>

<?php require("template/footer.php") ?>
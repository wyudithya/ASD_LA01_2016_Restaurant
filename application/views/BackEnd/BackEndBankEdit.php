 <?php require("template/header.php") ?>

<div id="page-wrapper">
<div class="row" id="input_customer_form">
            <div class="col-md-offset-2 col-md-8">
                <form method="post"  method="POST" enctype ="multipart/form-data" action="<?php echo base_url() ?>BackEnd/BankAccount/update/<?php if(isset($bank)) echo $bank->bankID ?>">
                    <h2><?php if(isset($bank)) echo "Edit Bank - ".$bank->name; else echo "Add Bank Account"; ?></h2>                  
                    <hr />
                    <!-- modified by FS 28 OKT
                    ubah urutan, tambah tiny mce, tambah prefix sama postfix input -->

                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="bankName">Bank Name</label>
                            </div>
                            <div class="col-md-10">
                                <input  type="text" class="form-control" id="bankName" name="bankName" value="<?php if(isset($bank)) echo $bank->name ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="accountNumber">Account Number</label>
                            </div>
                            <div class="col-md-10">
                                <input  type="text" class="form-control" id="accountNumber" name="accountNumber" value="<?php if(isset($bank)) echo $bank->accountNumber ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="holderName">Account Holder Name</label>
                            </div>
                            <div class="col-md-10">
                                <input  type="text" class="form-control" id="holderName" name="holderName" value="<?php if(isset($bank)) echo $bank->holderName ?>" required/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
                </form><!-- Close Form -->
            </div><!-- Close Col -->
        </div>

<?php require("template/footer.php") ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js"></script>
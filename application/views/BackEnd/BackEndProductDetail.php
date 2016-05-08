<?php require("template/header.php") ?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Detail - <?php echo $product->ProductName ?> </h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
        <table>
		   	<tr><td><h4>Product Name </h4></td><td><h4> : <?php echo $product->ProductName ?></h4></td></tr>
	    	<tr><td><h4>CategoryName </h4></td><td><h4> : <?php echo $product->CategoryName ?></h4></td></tr>
        <tr><td><h4>Color / Taste </h4></td><td><h4>
          <?php if(strpos($product->color,'#')!==false){ ?>
            <div style="border: 1px solid #000; width:50px; height:25px; background-color:<?php echo $product->color ?>"></div>
          <?php } else { ?>
           : <?php echo $product->color; ?>
          <?php } ?>
        </h4></td></tr>
	    	<tr><td><h4>Price </h4></td><td><h4> : <?php echo $product->Price ?></h4></td></tr>
	    	<tr><td><h4>Transaction Count </h4></td><td><h4> : <?php echo $product->TransactionCount ?></h4></td></tr>
        <tr><td><h4>Discount </h4></td><td><h4> : <?php echo $product->Discount ?></h4></td></tr>
	    	<tr><td><h4>Keyword </h4></td><td><h4> : <?php echo $product->Keyword ?></h4></td></tr>
        <tr><td><h4>Other Color / Taste </h4></td><td>
          <?php if(strpos($product->color,'#')!==false){ ?>
            <?php for($i=0;$i<count($product->otherColor);$i++){ ?>
              <div onclick="document.location = '<?php echo base_url() ?>BackEnd/Products/viewProductbyID/<?php echo $product->otherColor[$i]->productID ?>'" style="border: 1px solid #000; width:50px; height:25px; margin-right:1em; background-color:<?php echo $product->otherColor[$i]->color ?>"></div>
            <?php } ?>
          <?php } else { ?>
            <ul>
            <?php for($i=0;$i<count($product->otherColor);$i++){ ?>
              <ul>
                <li><a href="document.location = '<?php echo base_url() ?>BackEnd/Products/viewProductbyID/<?php echo $product->otherColor[$i]->productID ?>'"></a></li>
            <?php } ?>
            </ul>
          <?php } ?>
        </td></tr>
        </table>
	    	<p><h4>ProductDesc :</h4> <?php echo $product->ProductDesc ?><p><br><br>
        <h4>Image : </h4>
        <p>
        <?php $photo = explode(';', $product->Photo);
        //modified by FS 30 Okt
        for ($i=0; $i < count($photo); $i++) { if(isset($photo[$i])&&$photo[$i]!=""){ ?>
            <img src="<?php echo base_url()?>assets/Products/thumb/<?php echo $photo[$i];?>" style="margin:1em;">
        <?php }  }?>
        </p>
	    	<button class="btn btn-primary col-md-1" onclick="document.location = '<?php echo base_url() ?>BackEnd/Products/updateProduct/<?php echo $product->ProductID ?>'">
	    	Edit	
	    	</button>
	    	<button class="btn btn-danger col-md-1" data-toggle="modal" data-target="#myModal">
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
        <button type="button" class="btn btn-primary" onclick="document.location = '<?php echo base_url() ?>BackEnd/Products/deleteProduct/<?php echo $product->ProductID ?>'">Yes</button>
      </div>
    </div><!-- /.modal-content -->
</div> 

<?php require("template/footer.php") ?>
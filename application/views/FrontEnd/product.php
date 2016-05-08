<!-- view product by newest, featured, dkk -->
<style type="text/css">
	div.inline { display: inline-block; }
	.customNavigation{ float: right!important;margin: 3px;}
</style>
<div class="col-md-12">
	<div id="content">
		<div class="col-md-12 no-padding">
			<div id="whiteBlock">
				<?php echo $header; ?>
				<?php if(strstr($header, "Search")) { ?>
					<form action="<?php echo base_url() ?>Home/search" method="get" id="sortForm">
						<input name="q" type="text" value="<?php echo $q; ?>" style="display:none">
						<select class="form-control" id="sort" name="sort" onchange='$("#sortForm").submit()'>
							 <option <?php if(!isset($sortBy)) echo "selected" ?> disabled>Sort By</option>
							 <option value="ProductName ASC" <?php if(isset($sortBy)&&$sortBy=="ProductName ASC") echo "selected" ?>>Product Name Ascending</option>
							 <option value="ProductName DESC" <?php if(isset($sortBy)&&$sortBy=="ProductName DESC") echo "selected" ?>>Product Name Descending</option>
				        	 <option value="Price ASC" <?php if(isset($sortBy)&&$sortBy=="Price ASC") echo "selected" ?>>Lowest Price</option>
				        	 <option value="Price DESC" <?php if(isset($sortBy)&&$sortBy=="Price DESC") echo "selected" ?>>Highest Price</option>
				        	 <option value="AuditedActivity DESC" <?php if(isset($sortBy)&&$sortBy=="AuditedActivity DESC") echo "selected" ?>>Latest Product</option>
				        	 <option value="Discount DESC" <?php if(isset($sortBy)&&$sortBy=="Discount DESC") echo "selected" ?>>Highest Discount</option>
				        </select>
					</form>
				<?php } ?>
			</div>
		</div>
		<br>
		<div class="col-md-12 no-padding">
		<?php if(strstr($header,"Search")&&count($product)==0) { ?>
			<h2 style="text-align:center">No Product found</h2>
		<?php } ?>
		<?php 
		$tempName = "";
		for($i=0;$i<count($product);$i++){ 
			if($tempName==$product[$i]['ProductName'])
				continue;
			else
				$tempName = $product[$i]['ProductName'];
		?>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<a href="<?php echo base_url('Home/detail_product'."/".$product[$i]['ProductID']);?>" style="color:black;text-decoration: none;">
					<div class="item" style="background-color:white; padding:1em;">
						<div class="product">
							<?php if(isset($product[$i]['Discount'])&&$product[$i]['Discount']>0){ ?>
							<div class="box-discount">
								<img src="<?php echo base_url() ?>assets/images/star.png" class="discount-star">
								<span class="dicount-text">
									<?php echo $product[$i]['Discount']; ?>% OFF
								</span>
							</div>
							<?php } ?>
							<div class="box-product">
								<?php
									if(isset($product[$i]['Thumbnail'])){
								?>
									<img class="product-thumb img-responsive centered" src="<?php echo base_url().'assets/Products/thumb/'.$product[$i]['Thumbnail']?>" onError="this.onerror=null; this.src='<?php echo base_url(); ?>assets/images/notAvailable.jpg';"alt="..." >
								<?php } ?>
							</div>
							<h4>
								<?php 
									if(isset($product[$i]['ProductName']))
										echo $product[$i]['ProductName'];
									else
										echo '-';
								?>
							</h4>
							<div class="box-price">
								<?php 
									if(isset($product[$i]['Price'])){
										echo "Rp. ";
										echo number_format($product[$i]['Price']*(100-$product[$i]['Discount'])/100, 0, ',', '.');
									}else{
										echo "Rp. ";
										echo '-';
									}
								?>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php $this->load->view('FrontEnd/footer'); ?>
<style type="text/css">
@media screen and (max-width: 600px)
{
    .col-xs-12
    {
    	margin-top:1em;
    	margin-bottom: 1em;
    }
}
</style>
<script src="<?php echo base_url();?>assets/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-collapse.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-transition.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-tab.js"></script>
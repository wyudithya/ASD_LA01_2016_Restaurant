<div id="mainBody">
	<div class="container">
		<ul class="breadcrumb">
    		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
   			<li><a>Products</a> <span class="divider">/</span></li>
    		<li class="active">Product Details</li>
    	</ul>
    	<div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
			  	<div id="gallery" class="span3">
				<img src="<?php echo base_url().$product['ProductPhoto'];?>" style="width:100%" alt="">
				</div>
			</div>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Name</td><td class="techSpecTD2"><?php echo $product['ProductName']?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Desc</td><td class="techSpecTD2"><?php echo $product['ProductDecription']?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Ingridients</td><td class="techSpecTD2"><?php echo $product['ingredientName']?></td></tr>
				
				</tbody>
				</table>
				
				
              </div>
             </div>	
	</div>
</div>
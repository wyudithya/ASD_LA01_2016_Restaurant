<div id="carouselBlk">
  <div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
      <div class="item active">
      <div class="container">
      <a href="register.html"><img style="width:100%" src="<?php echo base_url();?>assets/themes/images/carousel/1.png" alt="special offers"/></a>
      <div class="carousel-caption">
          <h4>Second Thumbnail label</h4>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>
      </div>
      </div>

    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div> 
</div>
<div id="mainBody">
  <div class="container">
  <div class="row">
<!-- Sidebar ================================================== -->
  
<!-- Sidebar end=============================================== --> 
      <div class="well well-small">
        <h4>Pizza </h4>
        <ul class="thumbnails">
        <?php foreach($food as $f) {?>
        <li class="span3">
          <form action="Home/addtocart" method="post" name="addtocart<?php echo $f['ProductID']; ?>">
          <input type="hidden" name="id" value="<?php echo $f['ProductID']; ?>">
          <input type="hidden" name="name" value="<?php echo $f['ProductDescription']; ?>">
          <input type="hidden" name="price" value="<?php echo $f['ProductPrice']; ?>">
          <input type="hidden" name="desc" value="<?php echo $f['ProductName']; ?>">
          <input type="hidden" name="photo" value="<?php echo $f['ProductPhoto']; ?>">
          <div class="thumbnail">
            <a href="<?php echo base_url();?>Product/detail/<?php echo $f['ProductID'];?>"><img src="<?php echo base_url().$f['ProductPhoto'];?>" alt=""/></a>
          <div class="caption">
            <h5><?php echo $f['ProductName']; ?></h5>
            <p> 
              <?php echo "Rp " . number_format($f['ProductPrice'],2,',','.'); ?>
            </p>
           
            <h4 style="align:center;">
            
            <input class="span1" type="number" name="qty" placeholder="0" style="max-width: 50px;margin-top: 10px;margin-left:10px" min="0">
            <a class="btn" href="#" onclick="return document.forms.addtocart<?php echo $f['ProductID'];?>.submit();">
                Add to 
              <i class="icon-shopping-cart"></i>
            </a> 
            <a class="btn btn-primary" href="<?php echo base_url();?>Product/detail/<?php echo $f['ProductID'];?>"> <i class="icon-zoom-in"></i></a>
            </h4>
          </div>
          </div>
          </form>
        </li>
        <?php } ?> 
        </ul> 
      </div>

      <div class="well well-small">
        <h4>Drink </h4>
        <ul class="thumbnails">
        <?php foreach($drink as $d) {?>
        <li class="span3">
          <form action="Home/addtocart" method="post" name="addtocart<?php echo $d['ProductID']; ?>">
          <input type="hidden" name="id" value="<?php echo $d['ProductID']; ?>">
          <input type="hidden" name="name" value="<?php echo $d['ProductDescription']; ?>">
          <input type="hidden" name="price" value="<?php echo $d['ProductPrice']; ?>">
          <input type="hidden" name="desc" value="<?php echo $d['ProductName']; ?>">
          <input type="hidden" name="photo" value="<?php echo $d['ProductPhoto']; ?>">
          <div class="thumbnail">
            <a href="<?php echo base_url();?>Product/detail/<?php echo $f['ProductID'];?>"><img src="<?php echo base_url().$d['ProductPhoto'];?>" alt=""/></a>
          <div class="caption">
            <h5><?php echo $d['ProductName']; ?></h5>
            <p> 
              <?php echo "Rp " . number_format($d['ProductPrice'],2,',','.'); ?>
            </p>
           
            <h4 style="align:center;">
            
            <input class="span1" type="number" name="qty" placeholder="0" style="max-width: 50px;margin-top: 10px;margin-left:10px" min="0">
            <a class="btn" href="#" onclick="return document.forms.addtocart<?php echo $d['ProductID'];?>.submit();">
                Add to 
              <i class="icon-shopping-cart"></i>
            </a> 
            <a class="btn btn-primary" href="<?php echo base_url();?>Product/detail/<?php echo $d['ProductID'];?>"> <i class="icon-zoom-in"></i></a>
            </h4>
          </div>
          </div>
          </form>
        </li>
        <?php } ?> 
        </ul> 
      </div>


       


    </div>
    </div>
  </div>
</div>
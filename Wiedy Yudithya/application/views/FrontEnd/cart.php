<div id="mainBody">
    <div class="container">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product</th>
              <th>Description</th>
              <th>Quantity/Update</th>
              <th>Price</th>
              <th>Tax</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $totalprice=0;
              $totaltax=0; 
              foreach($this->cart->contents() as $item){ 


              ?>
            <tr>
              <td style="text-align:center;"> 
                <img style="width:100px;" src="<?php echo base_url().$item['photo'];?>" alt=""/></td>
              <td><?php echo $item['name']?><br/><?php $item['desc'];?></td>
              <td>
               <div class="input-append">
                <input class="span1" style="max-width:34px" type="text" value="<?php echo $item['qty']?>">
                <a href="<?php echo base_url();?>Cart/decrease/<?php echo $item['rowid']?>/<?php echo $item['qty'];?>">
                <button class="btn" type="button"><i class="icon-minus"></i></button>
                </a>
                <a href="<?php echo base_url();?>Cart/increase/<?php echo $item['rowid']?>/<?php echo $item['qty'];?>">
                <button class="btn" type="button"><i class="icon-plus"></i></button>
                </a>
                <a href="<?php echo base_url();?>Cart/remove/<?php echo $item['rowid']?>">
                <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>
                </a>				
               </div>
             </td>
             <td><?php 
                      $totalprice = $totalprice + ($item['price'] * $item['qty']);
                       echo "Rp " . number_format($item['price'] * $item['qty'],2,',','.');
                  ?>
              </td>
             <td><?php 
                      $totaltax = $totaltax + ($item['price'] * $item['qty'] / 10);
                      echo "Rp " . number_format($item['price'] * $item['qty'] / 10,2,',','.');?>
                 </td>
             <td><?php 
                  $total = $item['price'] * $item['qty'] * 110/100;
                  echo "Rp " . number_format($total,2,',','.');
             ?>
             </td>
           </tr>
           
       <?php } ?>
       <tr>
        <td colspan="5" style="text-align:right">Total Price:	</td>
        <td> <?php echo "Rp " . number_format($totalprice,2,',','.'); ?></td>
      </tr>
      <tr>
        <td colspan="5" style="text-align:right">Total Tax:	</td>
        <td> <?php echo "Rp " . number_format($totaltax,2,',','.'); ?></td>
      </tr>
      <tr>
        <td colspan="5" style="text-align:right"><strong>TOTAL (<?php echo "Rp " . number_format($totalprice,2,',','.'); ?> + <?php echo "Rp " . number_format($totaltax,2,',','.'); ?>) =</strong></td>
        <td class="label label-important" style="display:block"> <strong> <?php echo "Rp " . number_format(($totalprice+$totaltax),2,',','.');?></strong></td>
      </tr>
    </tbody>
  </table>
    <div style="text-align:right; ">
      <button class="btn btn-primary">Finalize</button>
    </div>
  </div>
</div>
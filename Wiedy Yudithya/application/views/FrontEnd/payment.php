<!DOCTYPE html>
<div class="col-md-12">
	<div id="content">
		<div class="col-xs-8 col-xs-offset-2 no-padding" style="margin-top:2em;">
			<div class="box white bottom" style="width:100%;">
				<h2 class="title">Payment Information</h2>
				<div class="contact" >		
					<h2 class="center" style="margin-top:1.5em;"><b>Pay via</b></h2>
				</div>
				<form action="">
					<div class="col-md-offset-2 col-md-8 payment">
						<h4><b><input type="radio" value="trf" name="payment-type">Bank Transfer</h4></b><br>
						<div class="content-radio-payment">
							Penjelasan tentang transfer seperti rekening dan lain-lain.<br>
							Paling lambat 5 hari BLABLABLA.<br>
							Cantumkan nomor transaksi BLABLABLA<br>
							<div class="col-md-3 no-padding">
								BCA :
							</div>
							<div>
								123123123123123
							</div>
							<div class="col-md-3 no-padding">
								Mandiri :
							</div>
							<div>
								123123123123123
							</div>
						</div>
						<h4><b><input type="radio" value="cash" name="payment-type">Cash On Delivery</h4></b><br>
						<div class="content-radio-payment">
							Pembayaran dilakukan saat barang pada tujuan BLABLABLA.<br>
							Siapkan uang yang pas BLABLABLA									
						</div>
					</div>
					<button type="submit" class="btn brown center col-md-offset-5 col-md-3 col-sm-offset-4 col-sm-3" style="width:10em;margin-top:1.5em;">
					Review Order
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
	<?php $this->load->view('FrontEnd/footer'); ?>

<script>
    $('.carousel').carousel({
        interval: 3000
    })
</script>
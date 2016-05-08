<?php

$html = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB; "><img src="'.base_url().'assets/images/logo.png" style="height:100px;">
</td>
<td width="50%" style="text-align: right;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">'.$trackingID.'</span><br><br>Date: '.$order->orderDate.'</td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

<div style="text-align: right"></div>
<table width="100%">';

for($i=0;$i<count($bank);$i++)
{
	$html .= '<tr>
			<td width="55%"></td>
			<td width="45%" style="border:0.1mm solid #888888;padding:15px"><b style="font-size:x-large">'.$bank[$i]->name.'</b><br>'.$bank[$i]->accountNumber.'<br>a/n '.$bank[$i]->holderName.'</td>
		</tr>';
}

$html .= '</table><br><br>

<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br /><br />'.$user->Name.'<br>'.$user->PhoneNumber.'<br>'.$user->Address.'</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />'.$order->recipientName.'<br>'.$order->phoneNumber.'<br>'.$order->email.'<br>'.$order->address.'</td>
</tr></table>

<br />

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="45%">Product Name</td>
<td width="5%">Detail</td>
<td width="10%">Qty</td>
<td width="10%">Discount</td>
<td width="15%">Unit Price</td>
<td width="15%">Amount</td>
</tr>
</thead>
<tbody>';

for($i=0;$i<count($detail);$i++)
{
	$html.= '<tr>
	<td align="center">'.$detail[$i]->productName.'</td>';
	if(strpos($detail[$i]->color, '#')!==false)
		$html .= '<td style="background-color:'.$detail[$i]->color.'"></td>';
	else
		$html .= '<td>'.$detail[$i]->color.'</td>'
	$html .= '<td align="center">'.$detail[$i]->qty.'</td>
	<td>'.$detail[$i]->discount.'%</td>
	<td align="right">'.$detail[$i]->price.'</td>
	<td align="right">'.$detail[$i]->finalPrice.'</td>
	</tr>';
}

$html.='<tr>
<td class="blanktotal" colspan="4" rowspan="3"></td>
<td class="totals">Subtotal:</td>
<td class="totals">'.$order->total.'</td>
</tr>
<tr>
<td class="totals">Shipping:</td>
<td class="totals">'.$order->shippingCost.'</td>
</tr>
<tr>
<td class="totals"><b>TOTAL:</b></td>
<td class="totals"><b>'.($order->total+$order->shippingCost).'</b></td>
</tr>
</tbody>
</table>

<br>
<div style="text-align: center; font-style: italic;">Payment terms: payment due in 7 days</div>


</body>
</html>
';
//==============================================================
//==============================================================
//==============================================================
//==============================================================
//==============================================================
//==============================================================
define('_MPDF_PATH','mpdf/');
include("mpdf/mpdf.php");

$mpdf=new mPDF('c','A4','','',20,15,48,25,10,10); 
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("54 Vape - Invoice");
$mpdf->SetAuthor("54 Vape");
// $mpdf->SetWatermarkText("Paid");
// $mpdf->showWatermarkText = true;
// $mpdf->watermark_font = 'DejaVuSansCondensed';
// $mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();


exit;

?>
<?php
include "../admin/AMframe/config.php";

function currency($from_Currency, $to_Currency, $amount) {
    $amount = urlencode($amount);
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
    $url = "http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('bld>', $rawdata);
    $data = explode($to_Currency, $data[1]);
    return round($data[0], 2);
}

//$formaction = "https://www.sandbox.paypal.com/cgi-bin/webscr"; // Test account
$formaction = "https://www.paypal.com/cgi-bin/webscr";// Live account
$paypalmail=$sitepaypalemil;
$x_ordid=base64_encode($_SESSION['pay_user'].'-'.$_SESSION['pay_plan_id']);
$product_price=$_SESSION['pay_amount'];
$productprice=$product_price;
$item_number=$_SESSION['pay_user'].'-'.$_SESSION['pay_plan_id'];
$return_url=$siteurl."/paypal/success.php?tidd=$x_ordid";
$cancel=$siteurl."/paypal/cancel.php?tidd=$x_ordid";
$item_name = $_SESSION['pay_plan_name'];


if($product_price<1){
	header("location:$return_url&payment_status=Completed&mc_gross=$product_price&payment_date=$today&txn_id=$item_number");
	echo "<script>location.href='$return_url&payment_status=Completed&mc_gross=$product_price&payment_date=$today&txn_id=$item_number';</script>";
	exit;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sitetitle;  ?></title>
</head>
<script>
function FormSubmit(){
document.frm_process.submit();	
}
</script>

<body onload="Javascript:FormSubmit();">
	<table width="100%" height="600" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td  align="center" valign="middle">
				<form name="frm_process" method="get" action="<?php echo $formaction; ?>">
					<center>&nbsp;<font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="333333">Processing &nbsp;<img src="loading.gif" border="0" alt="loading" />&nbsp; Transaction . . . </font></center>
					<input type="hidden" name="cmd" value="_xclick" />
					<input type="hidden" name="business" value="<?php echo $paypalmail; ?>" />
					<input type="hidden" name="item_name" value="<?php echo $item_name; ?>" />
					<input type="hidden" name="amount" value="<?php echo $productprice; ?>" />
					<input type="hidden" name="no_note" value="2" />
					<input type="hidden" name="rm" value="2" />
					<input type="hidden" name="currency_code" value="INR" />
					<input type="hidden" name="bn" value="PP-BuyNowBF" />
					<input type="hidden" name="item_number" value="<?php echo $item_number; ?>">
					<input type="hidden" name="notify_url" value="<?php echo $return_url; ?>">
					<input type="hidden" name="return" value="<?php echo $return_url; ?>">
					<input type="hidden" name="cancel_return" value="<?php echo $cancel; ?>" />
				</form>
			</td>	
		</tr>
	</table>
</body>
</html>
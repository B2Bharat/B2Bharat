<?
include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
$uinfo = $db->singlerec("select * from register where id='$user_id'");
$acn = isset($acn)?$acn:'';

$userid = $user_id;
include "include/checkPlanstatus.php";

/*
$item_transaction   = $_REQUEST['txn_id']; // Paypal transaction ID
$item_price         = $_REQUEST['mc_gross']; // Paypal received amount
$item_currency      = $_REQUEST['mc_currency']; // Paypal received currency type
*/
$txn_id=isset($txn_id)?$txn_id:'';
$mc_gross=isset($mc_gross)?$mc_gross:'';
$mc_currency=isset($mc_currency)?$mc_currency:'';
$py=isset($py)?$py:'';
$currency='USD';
if($mc_gross==$max_price && $mc_currency==$currency){ //Rechecking the product price and currency details
	$db->insertrec("update register set tranx_st='1',trnx_no='$txn_id' where id='$user_id'");
	echo "<script>location.href='membership-details.php?py=scs';</script>";
}
if($py=="scs"){
	 echo "<h1 style='color:#71ab05;font-weight:bold;'><center>Payment paid successfully</center></h1>";
}
else if($py=="cn"){
	echo "<h1 style='color:#f3461c;font-weight:bold;'><center>Payment Failed</center></h1>";
}

//if(isset($upgrade)){
$current_plan=$uinfo['mem_pack'];
$current_plan = $db->escapstr($current_plan);
	$plan_arr = $db->singlerec("select id from membership where id = (select min(id) from membership where id > $current_plan)");
	$plan = (!empty($plan_arr) || count($plan_arr)>0)?$plan_arr[0]:$current_plan;
	$pack = $plan;
	$_SESSION['pay_user']=$user_id;
	$_SESSION['pay_plan_name']=getPlan($pack,'name');
	$_SESSION['pay_plan_id']=$pack;
	$_SESSION['pay_amount']=getPlan($pack,'base_price_afdis');
	$_SESSION['pay_username']=$uinfo['fname'].' '.$uinfo['lname'];
	
 //print_r($_SESSION);die;

//}
?>

<?php  


define('MERCHANT_KEY', 'aLipYnVe');//live details
define('SALT', 'tdIAIc2anT');//live details

define('PAYU_BASE_URL', 'https://secure.payu.in');  //actual URL

define('SUCCESS_URL', 'https://www.b2bharat.com/paypal/success.php');  //have complete url
define('FAIL_URL', 'https://www.b2bharat.com/failure1.php');    //add complete url 

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$email = $uinfo['email'];
$mobile =  $uinfo['mobile'];
$firstName = $uinfo['fname'];
$lastName = $uinfo['lname'];
$totalCost = $_SESSION['pay_amount'];
$hash         = '';
//Below is the required format need to hash it and send it across payumoney page. UDF means User Define Fields.
//$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

$hash_string = MERCHANT_KEY."|".$txnid."|".$totalCost."|"."productinfo|".$firstName."|".$email."|||||||||||".SALT;
$hash = strtolower(hash('sha512', $hash_string));
$action = PAYU_BASE_URL . '/_payment'; 

?>

  <form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm" style="display: none">
    <input type="hidden" name="key" value="<?php echo MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input name="amount" type="number" value="<?php echo $totalCost; ?>" />
    <input type="text" name="firstname" id="firstname" value="<?php echo $firstName; ?>" />
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" />
    <input type="text" name="phone" value="<?php echo $mobile; ?>" />
    <textarea name="productinfo"><?php echo "productinfo"; ?></textarea>
    <input type="text" name="surl" value="<?php echo SUCCESS_URL; ?>" />
    <input type="text" name="furl" value="<?php echo  FAIL_URL?>"/>
    <input type="text" name="service_provider" value="payu_paisa"/>
    <input type="text" name="lastname" id="lastname" value="<?php echo $lastName ?>" />
</form>
<script type="text/javascript">
    var payuForm = document.forms.payuForm;
    payuForm.submit();
</script>














<?php include "footer.php"; ?>


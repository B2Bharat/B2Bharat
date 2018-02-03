<?php
include "../admin/AMframe/config.php";

$amountusd=$_REQUEST['mc_gross'];
$payment_date=$_REQUEST['payment_date'];
$payer_email=isset($_REQUEST['payer_email'])?$_REQUEST['payer_email']:'';
$item_num=$_REQUEST['item_number'];
$txn_id=$_REQUEST['txn_id'];
$user_id = $_SESSION['pay_user'];
$plan = $_SESSION['pay_plan_id'];

$now = date("Y-m-d H:i:s");

if($payment_status=="Completed" || $payment_status=="Pending"){
	$set = "trans_id = '$txn_id'";
	$set .= ",amount = '$amountusd'";
	$set .= ",user_id = '$user_id'";
	$set .= ",payer_email = '$payer_email'";
	$set .= ",payment_date	= '$payment_date'";
	$db->insertrec("insert into transaction set $set");
	$db->insertrec("update register set tranx_st='1',mem_pack='$plan',crcdt='$now' where id='$user_id'");
	
	echo "<script>location.href='$siteurl?rdone';</script>";
	header("Location:$siteurl?rdone"); 
}
?>

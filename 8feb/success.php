<?php
include "../admin/AMframe/config.php";

$amountusd=$_SESSION['mc_gross'];
$payment_date=$_SESSION['payment_date'];

$item_num=$_SESSION['pay_amount'];
$txn_id=$_SESSION['txn_id'];
$user_id = $_SESSION['pay_user'];
$plan = $_SESSION['pay_plan_id'];
$status=$_POST["status"];
$now = date("Y-m-d H:i:s");
$uinfo = $db->singlerec("select * from register where id='$user_id'");

$txn_id=$_POST['txnid'];
 $payer_email= $uinfo['email'];

if($status == 'success'){
	$set = "trans_id = '$txn_id'";
	$set .= ",amount = '$amountusd'";
	$set .= ",user_id = '$user_id'";
	$set .= ",payer_email = '$payer_email'";
	$set .= ",payment_date	= '$now'";
	$db->insertrec("insert into transaction set $set");
	$db->insertrec("update register set tranx_st='1',mem_pack='$plan',crcdt='$now' where id='$user_id'");
	
	echo "<script>location.href='$siteurl/membership-details.php';</script>";
	header("Location:$siteurl?rdone"); 
}
?>

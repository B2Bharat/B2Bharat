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

if(isset($upgrade)){
	$current_plan = $db->escapstr($current_plan);
	$plan_arr = $db->singlerec("select id from membership where id = (select min(id) from membership where id > $current_plan)");
	$plan = (!empty($plan_arr) || count($plan_arr)>0)?$plan_arr[0]:$current_plan;
	$pack = $plan;
	$_SESSION['pay_user']=$user_id;
	$_SESSION['pay_plan_name']=getPlan($pack,'name');
	$_SESSION['pay_plan_id']=$pack;
	$_SESSION['pay_amount']=getPlan($pack,'base_price_afdis');
	$_SESSION['pay_username']=$uinfo['fname'].' '.$uinfo['lname'];
	echo "<script>location.href='$siteurl/paypal/process.php';</script>";
	header("Location:$siteurl/paypal/process.php"); 
	exit;			 
}
?>

  
    <form action="" method="POST">
        <input type="hidden" name="current_plan" value="<?= $uinfo['mem_pack']; ?>">
        
        <input  style="text-align: center;"type="submit" name="upgrade" class="btn view-more-btn-3" value="paypal">
        <a  class="btn view-more-btn-3" href="payumoney.php">Payumoney</a>
      
    </form>
   















<?php include "footer.php"; ?>


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
$currency='INR';
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

      <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
         <div class="container">
           <?php include "include/profile-left.php";?> 
            <div class="col-sm-9 col-md-9">
               <div class="well">
				
                  <h3>Membership Details</h3><br>
                  <div class="row">
				  <div class="well">
				    <div class="table-responsive">
						<table class="table table-striped brdr" style="width:100%">
						   <tbody>
							  <tr>
								 <td style="width:16.67%" class="my_planHeader my_plan1">
									<div class="my_planTitle">									    
									   Information
									</div>
								 </td>
								 <td style="width:16.67%" class="my_planHeader my_plan1">
									<div class="my_planTitle">
									   Current Plan									  
									</div>
									<div class="my_planPrice"><span style="color:#fffff;"><?echo ucfirst($memInfo['name']);?></div>
								 </td>
								 <td style="width:16.67%" class="my_planHeader my_plan1">
									<div class="my_planTitle">
									   Used									  
									</div>
								 </td>
								 <td style="width:16.67%" class="my_planHeader my_plan1">
									<div class="my_planTitle">
									   Remaining 								  
									</div>
								 </td>
							  </tr>
							  
							  <?php 
							  $pdays = $plandays;
							  $udays = $usedDays;
							  $bdays = $balancedays;
							  if((int)$pdays===0){
								  $pdays = 'unlimited';
								  $bdays = 'unlimited';
							  }
							  ?>
							  
							  
							  <tr class="my_planFeature">
								 <td>Valid For</td>
								 <td class="plan-detail"><?=$pdays;?> Days</td>
								 <td class="plan-detail"><?=$udays;?> Days</td>
								 <td class="plan-detail"><?=$bdays;?></td>
							  </tr> 
							  <tr class="my_planFeature">
								 <td>No.of Product Can Post</td>
								 <td class="plan-detail"><?echo $pLimit;?></td>
								 <td class="plan-detail"><?echo $pCount;?></td>
								 <td class="plan-detail"><?echo $pBal;?></td>
							  </tr>
							  <tr class="my_planFeature">
								 <td>No.of Selling Leads</td>
								 <td class="plan-detail"><?echo $sLimit;?></td>
								 <td class="plan-detail"><?echo $sCount;?></td>
								 <td class="plan-detail"><?echo $sBal;?></td>
							  </tr>
							  <tr class="my_planFeature">
								 <td>No.of Buying Leads</td>
								 <td class="plan-detail"><?echo $bLimit;?></td>
								 <td class="plan-detail"><?echo $bCount;?></td>
								 <td class="plan-detail"><?echo $bBal;?></td>
							  </tr>
							  <tr class="my_planFeature">
								 <td>Display Company Profile</td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['dis_profile']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['dis_profile']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['dis_profile']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
							  </tr>
							  <tr class="my_planFeature">
								 <td>Send / Receive Message</td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['send_receive']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['send_receive']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['send_receive']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
							  </tr>
							  <tr class="my_planFeature">
								 <td>Appear On Product Showcase</td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['product_show_gallery']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['product_show_gallery']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['product_show_gallery']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
							  </tr>
							  <tr class="my_planFeature">
								 <td>Publishing Trade Shows</td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['pub_tradeshow']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['pub_tradeshow']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['pub_tradeshow']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
							  </tr>
							  <tr class="my_planFeature">
								 <td>Priority Listing</td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['priority_listing']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['priority_listing']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								 <td class="plan-detail"><i class="<?echo ($memInfo['priority_listing']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
							  </tr>
							  <tr class="my_planFeature text-center">
								 <td></td>
								 <td class="plan-detail">
								 </td>
								 
								 <td class="plan-detail">
								 <form action="" method="POST">
									<input type="hidden" name="current_plan" value="<?=$uinfo['mem_pack'];?>">
								<!--	<input type="submit" name="upgrade" class="btn view-more-btn-3" value="Upgrade">-->
							<!-- new code for payumoney-->
								<a class="btn view-more-btn-3" href="processtopayment.php"> Upgrade </a>
								
								 </form>
								 </td>
								 
								 <td class="plan-detail">
								 </td>
							  </tr>
						   </tbody>
						</table>
						 <!-- <div class="text-center col-md-12">
						     <a href="#" type="button" class="btn view-more-btn-3">Upgrade</a>
						 </div> -->
					</div>
					</div>
				</div>
               </div>
            </div>
			<!-- <div class="text-center col-md-12 mt15" style="background-color:#FFF;">
				     <h4 style="padding-top:10px;">BUSINESS LISTING</h4>
					<ul class="pagination " style="padding:0; margin-top:5px;">
						
						<li><a href="#">A</a></li>
						<li><a href="#">B</a></li>
						<li><a href="#">C</a></li>
						<li><a href="#">D</a></li>
						<li><a href="#">E</a></li>
						<li><a href="#">F</a></li>
						<li><a href="#">G</a></li>
						<li><a href="#">H</a></li>
						<li><a href="#">I</a></li>
						<li><a href="#">J</a></li>
						<li><a href="#">K</a></li>
						<li><a href="#">L</a></li>
						<li><a href="#">M</a></li>
						<li><a href="#">N</a></li>
						<li><a href="#">O</a></li>
						<li><a href="#">P</a></li>
						<li><a href="#">Q</a></li>
						<li><a href="#">R</a></li>
						<li><a href="#">S</a></li>
						<li><a href="#">T</a></li>
						<li><a href="#">U</a></li>
						<li><a href="#">V</a></li>
						<li><a href="#">W</a></li>
						<li><a href="#">X</a></li>
						<li><a href="#">Y</a></li>
						<li><a href="#">Z</a></li>
						
					</ul>
				</div>-->
         </div>
         <!-- container -->
      </div>
	 
<?php include "footer.php"; ?>
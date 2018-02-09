<?		
function generateRandomString($length = 6) 
{    
	$characters = '0123456789';    
	$charactersLength = strlen($characters);    
	$randomString = '';    
	for ($i = 0; $i < $length; $i++) 
	{        
	$randomString .= $characters[rand(0, $charactersLength - 1)];    
	}    
	return $randomString;
}
if(isset($signup)){
	$pack=trim(addslashes($pack));
	$fname=trim(addslashes($fname));
	$lname=trim(addslashes($lname));
	$cname=trim(addslashes($cname));
	$mail=trim(addslashes($mail));
	$pass=trim(addslashes($pass));
	$cpass=trim(addslashes($cpass));
	$mpass=md5($pass);	$mobileone=trim(addslashes($mobileone));
	$mobile=$mobileone.trim(addslashes($mobile));
	$tel=trim(addslashes($tel));
	//$fax=trim(addslashes($fax));
	$addr=trim(addslashes($addr));
	$postal=trim(addslashes($postal));
	$country=trim(addslashes($country));
	$state=trim(addslashes($state));
	$city=trim(addslashes($city));
	$site=trim(addslashes($site));
	$cpt=trim(addslashes(isset($_POST['cpt'])?$_POST['cpt']:null));
	$cptn=trim(addslashes($cptn));
	/* Changed/Commented by Abhishek- Start*/
	$cptn=trim(addslashes(isset($_POST['cptn'])?$_POST['cptn']:null));
	/* Comment by Abhishek- End*/
	/* $user_type=(isset($user_type) && !empty($user_type))?addslashes($user_type):'2'; */
	$dt=date("Y-m-d H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	$cf=base64_encode(time()*27);
	
	$check = $db->singlerec("select count(*) from register where email='$mail'");
	
	if($pack=="" || $fname=="" || $lname=="" || $mail=="" || $pass=="" || $cpass=="" || $cpt=="") {
		echo "<script>swal('Oops..', 'Fill all the required fields!', 'error');</script>";
	}
	else if($cpt!=$cptn) {
		echo "<script>swal('Oops..','".$cptn."---".$cpt."Invalid captcha code. Try again!', 'error');</script>";
	}
	else if($pass!=$cpass) {
		echo "<script>swal('Oops..', 'Password does not match!', 'error');</script>";
	}else if((int)$check[0] > 0 ){
		echo "<script>swal('Account already exist!', 'We already had this mail-id in our records!', 'error');</script>";
	}
	else {
		$set="mem_pack='$pack'";
		$set.=",fname='$fname'";
		$set.=",lname='$lname'";
		$set.=",company_name='$cname'";
		$set.=",email='$mail'";
		$set.=",password='$mpass'";
		$set.=",decript_password='$pass'";
		$set.=",mobile='$mobile'";
		$set.=",company_number='$tel'";
		//$set.=",fax='$fax'";
		$set.=",address='$addr'";
		$set.=",zip_code='$postal'";
		$set.=",country='$country'";
		$set.=",state='$state'";
		$set.=",city='$city'";
		$set.=",website='$site'";
		$set.=",user_type='$user_type'";
		$set.=",img='noimage.png'";
		$set.=",active_status='0'";
		$set.=",temp_key='$cf'";
		$set.=",login_ip_addr='$ip'";
		$set.=",tranx_st='0'";
		$set.=",crcdt='$dt'";
		
		
		$user_id = $db->insertid("insert into register set $set");
		
	
       $OTPP = generateRandomString(6);$m=urlencode($OTPP." is your OTP to verify your b2b account. Please verify to proceed. OTP will be valid for only 15 minutes");
	  
	   $ch =curl_init("http://priority.thesmsworld.com/api/mt/SendSMS?user=BlueBD&password=123456&senderid=BlueBD&channel=2&DCS=0&flashsms=0&number=$mobile&text=$m&route=2"); 
	   curl_setopt($ch, CURLOPT_HEADER, 0); 
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	   $output = curl_exec($ch); 
	   curl_close($ch);// Display MSGID of the successful sms pushecho $output;
	   
	   $datek=date("Y-m-d H:i:s");
		$new="user_id='$user_id'";				
		$new.=",email='$mail'";
		$new.=",otp='$OTPP'";
		$new.=",mobile='$mobile'";
		$new.=",time='$datek'";
	   $otpdata= $db->insertid("insert into otpsaveid set $new");				 
		
		$from = $db->singlerec("select admin_email from general_setting where id='1'");
		$sub = "Registration confirm mail B2B";
		$url ="$siteurl/confirmation.php?cf=$cf";
		$msg ="<div style='background:#f5f5f5;margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' style='background:#ffffff;border:1px solid #e2e2e2'> <tbody> <tr> <td> <table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='$siteurl/assets/images/sitelogo593eafdb0fa64.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;padding-left:0px;font:bold 11px arial; color:#a2a2a2;'> Toll Free </td> <td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#a2a2a2;line-height:20px'> 1800-33-552 </td> 
</tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0px;font:bold 11px arial;color:#a2a2a2;line-height:17px'> International Helpline <span style='font:normal 11px arial'> (+97)000 000 0000 </span> </td> 
</tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#a2a2a2' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> </tr> <tr style=''> <td align='center' > <div style='font:bold 20px arial;padding:10px 5px 15px;color:#a2a2a2; '> Welcome to&nbsp; B2B 
  <!-- <span style='color:#D61C23'>B</span><span style='color:#4E68A1;'>2</span><span style='color:#D61C23'>B</span> --> </div> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>www.bluebead.com Secured Trading Services (STS), world wide we are easy to find the buyers and sellers and traders, Importer and exporter easy to can find. This is a good solution for customers. </td> 
  </tr>
<tr> <td align='center'> <table> <tbody> <tr> <td align='center' bgcolor='#1A54BA' style='background:#DC2828; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'> <div class='contentEditableContainer contentTextEditable'> <div class='contentEditable' align='center'> <a target='_blank' href='$url' style='color:#ffffff;font:bold 12px arial;text-decoration:none;'>Activate your Account</a> </div> </div> </td> </tr> </tbody> </table> </td> </tr> 
<tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>Thousands of companies trust our reliable and secure multi-channel payment gateway with their payments every day. </td> </tr><tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>our FREE, 24/7 Tech Support hotline is a trusted resource for thousands of customers just like you. Rely on us for support before, during, or after the sale. <br>

We also offer 24/7 Customer Service so you can contact us anytime you need help ww.bluebead.com
1800-33-552</td> 
</tr>
<tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>Warm Regards,<br> 
  <span style='color:#D61C23'><b>Team Smart Bluebead</b></span> </td> 
</tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> <td style='border-top:1px solid #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> <tr> <td valign='top' style='padding:10px 0px 3px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:10px'> <img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'> </td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px'> CALL <br>
                                      1800-33-552<br> </td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'> <a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'> <img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> EMAIL <br> <a href='mailto:info@smartb2b.com' style='color:#D61C23;font:bold 12px arial;text-decoration:none;' target='_blank'> info@bluebead.com </a> </td> 
                                      </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='#' style='color:#D61C23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> www.bluebead.com </a> </span> </td> 
                                      </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%;' bgcolor='#ffffff'> <tbody> <tr style='width:20%;'> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:none;text-decoration:none;border:none; width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> <tr> <td valign='top' style='padding:0px 6px 1px;border:0px'> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'> Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='#' target='_blank'>Unsubscribe</a> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>";  
		$com_obj->email_old($from[0],$mail,$sub,$msg);
		
		$_SESSION['pay_user']=$user_id;
		$_SESSION['user']=$user_id;
		$_SESSION["usertype"]=4;
		$_SESSION['pay_plan_name']=getPlan($pack,'name');
		$_SESSION['pay_plan_id']=$pack;
		$_SESSION['pay_amount']=getPlan($pack,'base_price_afdis');
		$_SESSION['pay_username']="$fname $lname";
		
		echo "<script>location.href='$siteurl/processtopayment.php';</script>";
		header("Location:$siteurl/processtopayment.php"); 
		exit;
		
	}
}
?>
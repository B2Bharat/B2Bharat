<?
include "header.php";
include "include/searchDiv.php";
include "pagination.php";

if(isset($_POST['enq_submit'])){
	
	$cpt = isset($cpt)?$cpt:'';
	$cptn = isset($cptn)?$cptn:'';
	
	if($cpt!=$cptn){
	echo "<script>swal('Incorrect captcha!','incorrect captcha code before submit!','error');</script>";
?>
<script>
				setTimeout(function(){ window.location.href="http://<? echo $url;?>"; }, 2000);
				</script>
<?	
	}else{
		$efrom = $db->singlerec("select admin_email from general_setting where id='1'");
		$enq_from = $efrom[0];
		$enq_to = isset($enq_email)?$db->escapstr($enq_to):'';
		$username1 = isset($enq_name1)?$db->escapstr($enq_name1):'';
		$username2 = isset($enq_name2)?$db->escapstr($enq_name2):'';
		
		$enqs_email = isset($enq_email)?$db->escapstr($enq_email):'';
		$enq_phone = isset($enq_phone)?$db->escapstr($enq_phone):'';
		$enq_subject = isset($enq_subject)?$db->escapstr($enq_subject):'';
		
                $enq_prod_name = isset($enq_prod_name)?$db->escapstr($enq_prod_name):'';
                 $enq_company = isset($enq_company)?$db->escapstr($enq_company):'';
                  $enq_state = isset($enq_state)?$db->escapstr($enq_state):'';
                  $enq_address = isset($enq_address)?$db->escapstr($enq_address):'';
                    $enq_city = isset($enq_city)?$db->escapstr($enq_city):'';
                
                $enq_quantity = isset($enq_quantity)?$db->escapstr($enq_quantity):'';
$enq_unit_type = isset($enq_unit_type)?$db->escapstr($enq_unit_type):'';
$order_value = isset($order_value)?$db->escapstr($order_value):'';

//$currency_value = isset($currency_value)?$db->escapstr($currency_value):'';
     $currency_value =$db->escapstr($_POST['currency_value']);
     
//$enq_supplier_location= isset($enq_supplier_location)?$db->escapstr($enq_supplier_location):'';
 $enq_supplier_location =$db->escapstr($_POST['enq_supplier_location']);
 
//$enq_Requirement_urgency = isset($enq_Requirement_urgency)?$db->escapstr($enq_Requirement_urgency):'';
$enq_Requirement_urgency =$db->escapstr($_POST['enq_Requirement_urgency']);

//$enq_Requirement_frequency = isset($enq_Requirement_frequency)?$db->escapstr($enq_Requirement_frequency):'';
$enq_Requirement_frequency =$db->escapstr($_POST['enq_Requirement_frequency']);

//$enq_Requirement_purchase = isset($enq_Requirement_purchase)?$db->escapstr($enq_Requirement_purchase):'';
$enq_Requirement_purchase =$db->escapstr($_POST['enq_Requirement_purchase']);
                
		$enq_msg = isset($enq_msg)?$db->escapstr($enq_msg):'';
		
		$set  = "to_mail = '$enq_to'";
		$set .= ",from_mail = '$enq_from'";
		$set .= ",name = '$username1'";
		$set .= ",email = '$enq_email'";
		
		$set .= ",enq_company = '$enq_company'";
		
		$set .= ",enq_state = '$enq_state'";
		$set .= ",sub = '$enq_subject'";
		$set .= ",phone = '$enq_phone'";
                $set .= ",enq_prod_name = '$enq_prod_name'";
                 $set .= ",enq_address = '$enq_address'";
                  $set .= ",enq_city = '$enq_city'";
                
                $set .= ",enq_quantity = '$enq_quantity'";
                
                $set .= ",enq_unit_type = '$enq_unit_type'";
                $set .= ",order_value = '$order_value'";
                $set .= ",currency_value = '$currency_value'";
                $set .= ",enq_supplier_location = '$enq_supplier_location'";
                $set .= ",enq_Requirement_urgency = '$enq_Requirement_urgency'";
                $set .= ",enq_Requirement_frequency = '$enq_Requirement_frequency'";
                $set .= ",enq_Requirement_purchase = '$enq_Requirement_purchase'";

		$set .= ",msg = '$enq_msg'";
		$set .= ",ipaddress = '$ipaddress'";
		$dt = date('Y-m-d h:i:s');
		$set .= ",send_date = '$dt'";
              // print_r($set); die();
		$db->insertrec("insert into enquiries set $set");
             //  print_r($db);die();
                

		$enq_from_encode = base64_encode($enq_email);
		$enq_email_encode = base64_encode($enq_to);		
		$unurl1 = "$siteurl/index.php?unsubs_news=true&subs_email=$enq_from_encode";
		$unurl2 = "$siteurl/index.php?unsubs_news=true&subs_email=$enq_email_encode";
		
		$enq_msg_user = "<div style='background:#f5f5f5; padding: 2% 0 0; margin:0 auto'><table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'><tbody><tr><td valign='top' style='padding-left:0px'></td></tr><tr><td><table width='600' style='background:#fff;border:1px solid #e2e2e2'><tbody><tr><td><table style='width:100%'><tbody><tr><td valign='top' style='padding:2px 6px;border:0'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'><tbody><tr><td valign='top' style='padding:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' src='$siteurl/assets/images/$sitelogo' alt='' style='display:block' class='CToWUd'></a></td><td align='right' valign='top' style='padding:0;padding:12px 10px 5px 5px'><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0;font:bold 11px arial'>Toll Free</td><td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>$_tel</td></tr></tbody></table><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td align='right' valign='top' style='padding:3px 0;font:bold 11px arial;color:#999;line-height:17px'>International Helpline<span style='font:normal 11px arial'>$_mob</span></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td valign='top' style='padding:0px;border:0px'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'><tbody><tr></tr></tbody></table></td></tr></tbody></table></td></tr><tr></tr><tr><td valign='top' style='padding:0 6px 0;border:0'><table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'><tbody><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial;color:#141313'>Dear $username1,</span><span style='display:block;padding:15px 0 15px 0;color:#999;font:bold 12px arial'>Your enquiry has been submited successfully!</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Thank you! For selecting our service.. We are happy to work with you! </span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Any Query Call Us : +91 89281131130</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Mail Us : Support@smartb2b.com</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td></tr></tbody></table></td></tr><tr><td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000'>Warm Regards,<br><span style='color:#D61C23'><b>Team 
                </b></span></td></tr></tbody><tbody><tr><td><table><tbody><tr><td style='border-top:1px solid #ccc;border-bottom:0;border-right:0;border-left:none'></td></tr><tr><td valign='top' style='padding:10px 0 3px;border:0'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'><tbody><tr><td valign='top' style='padding-left:0px;padding-bottom:13px'><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td valign='top' style='padding-left:0px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:10px'><img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'></td><td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000;font:bold 16px arial;line-height:20px'>CALL<br><span style='font:bold 12px arial;color:#d61c23;line-height:20px'>$_tel</span><br></td></tr></tbody></table></td><td valign='middle' style='padding-left:20px'><img border='0' width='1' height='60' alt='' style='display:block'></td><td valign='middle' style='vertical-align:middle;padding-left:0px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:20px'><a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'><img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'></a></td><td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>EMAIL<br><a href='mailto:info@smartb2b.com' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank'>info@smartb2b.com</a></td></tr></tbody></table></td><td valign='middle' style='vertical-align:middle;padding-left:15px'><img border='0' width='1' height='60' alt='' style='display:block'></td><td valign='top' style='padding-left:15px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'></a></td><td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>Website<br><span style='color:#006fb4;text-decoration:none;font:normal 12px arial'><a href='#' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'>www.smartb2b.com</a></span></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style='width:100%'><table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%' bgcolor='#ffffff'><tbody><tr style='width:20%'><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:0;text-decoration:none;border:0;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px' class='CToWUd'></a></td></tr></tbody></table></td></tr><tr><td style='border-top:1px dashed #ccc;border-bottom:0;border-right:0;border-left:none'></td></tr><tr><td valign='top' style='padding:0 6px 1px;border:0'></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table><tbody><tr><td><table width='600'><tbody><tr><td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='$unurl1' target='_blank'>Unsubscribe</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><div class='yj6qo'></div><div class='adL'></div></div>";
		
		
		$enq_msg_company = "<div style='background:#f5f5f5;padding: 2% 0 0; margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' 
		style='background:#ffffff;border:1px solid #e2e2e2'> <tbody> <tr> <td>
		<table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0px'> 
		<table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'> 
		<a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='$siteurl/assets/images/$sitelogo' alt='' style='display:block' class='CToWUd'> 
		</a> </td><td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> 
		<tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0px;font:bold 11px arial'> Contact Us </td> <td align='right' valign='middle'
		style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>8928131130 </td> </tr> </tbody> </table> 
		<table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0px;font:bold 11px 
		arial;color:#999;line-height:17px'>  <span style='font:normal 11px arial'>  </span> </td> </tr> </tbody>
		</table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' 
		cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> </tr> <tr> 
		<td valign='top' style='padding:0px 6px 0px;border:0px'>
		
		
		<h4 style='border:1px solid; font-size:large; background-color: #337ab7; color: white; text-align: center;padding: 7px;' class='center'> Enquiry Details</h4>
		
		<table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'>
		<tbody> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'>
		<span style='font:bold 16px arial; color:#141313;'>Dear $username2,</span>
		<span style='display:block;padding:15px 0px 15px 0px;color:blue;font:bold 12px arial;'>You got a Enquiry! Please view your enquiry details
		</span></td> </tr> <tr>
		<td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'>
	
		<table cellpadding='8' style='border-color: #666;'>
			<tr ><td style='font:bold 16px arial;color:#141313'> <b>Subject</b> </td><td> :</td><td  style='color:red;'>$enq_subject </td></tr>
		<tr style='border-style: solid;'><td style='font:bold 16px arial;color:#141313'> <b>Product Name</b> </td><td> :</td><td  style='color:red;'>$enq_prod_name </td></tr>
			<tr><td style='font:bold 16px arial;color:#141313'> <b>Estimated Quantity</b> </td><td> :</td><td  style='color:red;'>$enq_quantity - $enq_unit_type </td></tr>
	<!--	<tr><td style='font:bold 16px arial;color:#141313'> <b>Unit Type</b> </td><td> :</td><td  style='color:red;'>$enq_unit_type </td></tr>-->
		<tr><td style='font:bold 16px arial;color:#141313' > <b>Approximate Order Value </b> </td><td> :</td><td style='color:red;'>$order_value INR </td> </tr>
		<!--	<tr><td> <b>Curruncy</b> </td><td> :</td><td>$currency_value </td></tr>-->
				<tr><td style='font:bold 16px arial;color:#141313'> <b>Preferred Supplier</b> </td><td> :</td><td style='color:red;'>$enq_supplier_location </td></tr>
			<tr><td style='font:bold 16px arial;color:#141313'> <b> Want to Buy</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'>$enq_Requirement_urgency </td></tr>
			<tr><td style='font:bold 16px arial;color:#141313'> <b>Requirement Type</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$enq_Requirement_frequency </td></tr>
				<tr><td style='font:bold 16px arial;color:#141313'> <b>Purpose </b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$enq_Requirement_purchase </td></tr>
	
		<tr><td style='font:bold 16px arial;color:#141313'> <b>Requirement Details</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$enq_msg </td></tr>
		
		
		</table>
		
		<div style='border-style: inset; background-color:#eadff173;'>
		<h3 style='font:bold 16px arial;color:#141313'>Buyer Contact Details:-</h3>

		<table>
	    
			<tr><td style='font:bold 16px arial;color:#141313'> <b>Name  </b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$username1 </td></tr>
				<tr><td style='font:bold 16px arial;color:#141313'> <b>Company Name </b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$enq_company </td></tr>
					<tr><td style='font:bold 16px arial;color:#141313'> <b>Mobile No.</b> </td><td> :</td><td  style='font:bold 14px arial;color:#141313;color:blue;'>$enq_phone </td>
		
			<tr><td style='font:bold 16px arial;color:#141313'> <b>From</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'> $enq_email </td></tr>
		<tr><td style='font:bold 16px arial;color:#141313'> <b>City</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'>$enq_city </td></tr>
		<tr><td style='font:bold 16px arial;color:#141313' > <b>State</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'>$enq_state </td></tr>
	<tr><td style='font:bold 16px arial;color:#141313' > <b>Address</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'>$enq_address </td></tr>
	
		</tr>
	
		</table>
	
		</div>
		
		
		</span><br/></td> </tr>
		<tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'>
		<span style='font:bold 12px arial; color:#999;'>Any Query Call Us : +91 8928131130</span></td> </tr> <tr> <td valign='top'
		style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'>Mail Us :
		    admin@b2bharat.com</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td> </tr> </tbody>
		    </table> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>Warm Regards,<br>
		    <span style='color:#D61C23'><b>Team $siteurl </b></span> </td> </tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> 
		    <td style='border-top:1px solid #cccccc;border-bottom:none;border-right:none;border-left:none'> </td>
		    </tr> <tr> <td valign='top' style='padding:10px 0px 3px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'>
		    <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top'
		    style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle'
		    style='vertical-align:middle;padding-left:10px'> <img border='0' width='49' height='49' src='$siteurl/images/phone.png' 
		    alt='' style='display:block' class='CToWUd'> </td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px'> CALL <br> 
		    <span style='font:bold 12px arial;color:#D61C23;line-height:20px'> 8928131130 </span> <br> </td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'> 
		    <img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='middle' style='vertical-align:middle;padding-left:0px'>
		    <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'> 
		    
		    <a style='color:#006fb4;text-decoration:none' href='mailto:admin@b2bharat.com' target='_blank'> 
		    <img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'> </a> </td>
		    <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> EMAIL <br>
		    <a href='mailto:admin@b2bharat.com' style='color:#D61C23;font:bold 12px arial;text-decoration:none;' target='_blank'> admin@b2bharat.com </a> </td>
		    </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'>
		    </td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'> 
		    <a href='#' target='_blank' data-saferedirecturl='#'> 
		    <img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='#' style='color:#D61C23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> www.b2bharat.com </a> </span> </td> </tr> </tbody> 
		    </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%;' bgcolor='#ffffff'> <tbody> <tr style='width:20%;'> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:none;text-decoration:none;border:none; width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> <tr> <td valign='top' style='padding:0px 6px 1px;border:0px'> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>
		    Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='$unurl2' target='_blank'>Unsubscribe</a> 
		    </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>";
	//	$com_obj->email($enq_from,$enq_email,"Successfully submited!",$enq_msg_user,);
		
		
		$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <admin@b2bharat.com>' . "\r\n";
$headers .= 'Cc: inqury@b2bharat.com' . "\r\n";

mail($enq_email,'Successfully submited!',$enq_msg_user,$headers);
		
		//$com_obj->email($enq_from,$enq_to,"User enquiry submission from B2B",$enq_msg_company);
		mail($enq_to,'User enquiry submission from B2B',$enq_msg_company,$headers);
		echo "<script>swal('Sent successfully!', 'your enquiry has been submited successfully!','success'); 
				</script>";
				?>
				<script>
				setTimeout(function(){ window.location.href="http://<? echo $url;?>"; }, 2000);
				</script>
				<?
		
	}
}


if(isset($_POST['enqs_submit'])){
	
	$cpt = isset($cpt)?$cpt:'';
	$cptn = isset($cptn)?$cptn:'';
	
	if($cpt!=$cptn){
	echo "<script>swal('Incorrect captcha!','incorrect captcha code before submit!','error');</script>";	
	?>
	<script>
				setTimeout(function(){ window.location.href="http://<? echo $url;?>"; }, 2000);
				</script>
	<?
	}else{
		$efrom = $db->singlerec("select admin_email from general_setting where id='1'");
		$enq_from = $efrom[0];
		$username1 = isset($enq_name1)?$db->escapstr($enq_name1):'';
	$username2 = isset($enq_name2)?$db->escapstr($enq_name2):'';
		$enq_email = isset($enq_email)?$db->escapstr($enq_email):'';
		$enqs_email = isset($enqs_email)?$db->escapstr($enqs_email):'';
		$to_emails = explode(" ",$enqs_email);
		 $enq_prod_name = isset($enq_prod_name)?$db->escapstr($enq_prod_name):'';
                 $enq_company = isset($enq_company)?$db->escapstr($enq_company):'';
                  $enq_state = isset($enq_state)?$db->escapstr($enq_state):'';
                  $enq_address = isset($enq_address)?$db->escapstr($enq_address):'';
                    $enq_city = isset($enq_city)?$db->escapstr($enq_city):'';
                
                $enq_quantity = isset($enq_quantity)?$db->escapstr($enq_quantity):'';
$enq_unit_type = isset($enq_unit_type)?$db->escapstr($enq_unit_type):'';
$order_value = isset($order_value)?$db->escapstr($order_value):'';

//$currency_value = isset($currency_value)?$db->escapstr($currency_value):'';
     $currency_value =$db->escapstr($_POST['currency_value']);
     
//$enq_supplier_location= isset($enq_supplier_location)?$db->escapstr($enq_supplier_location):'';
 $enq_supplier_location =$db->escapstr($_POST['enq_supplier_location']);
 
//$enq_Requirement_urgency = isset($enq_Requirement_urgency)?$db->escapstr($enq_Requirement_urgency):'';
$enq_Requirement_urgency =$db->escapstr($_POST['enq_Requirement_urgency']);

//$enq_Requirement_frequency = isset($enq_Requirement_frequency)?$db->escapstr($enq_Requirement_frequency):'';
$enq_Requirement_frequency =$db->escapstr($_POST['enq_Requirement_frequency']);

//$enq_Requirement_purchase = isset($enq_Requirement_purchase)?$db->escapstr($enq_Requirement_purchase):'';
$enq_Requirement_purchase =$db->escapstr($_POST['enq_Requirement_purchase']);
		
		$enq_phone = isset($enq_phone)?$db->escapstr($enq_phone):'';
		$enq_subject = isset($enq_subject)?$db->escapstr($enq_subject):'';
		$enq_msg = isset($enq_msg)?$db->escapstr($enq_msg):'';
		$set  = "to_mail = '$enqs_email'";
		$set .= ",from_mail = '$enq_from'";
		$set .= ",name = '$username1'";
		$set .= ",email = '$enq_email'";
		$set .= ",sub = '$enq_subject'";
		$set .= ",enq_company = '$enq_company'";
		
		$set .= ",enq_state = '$enq_state'";
		$set .= ",phone = '$enq_phone'";
		 $set .= ",enq_prod_name = '$enq_prod_name'";
                 $set .= ",enq_address = '$enq_address'";
                  $set .= ",enq_city = '$enq_city'";
                
                $set .= ",enq_quantity = '$enq_quantity'";
                
                $set .= ",enq_unit_type = '$enq_unit_type'";
                $set .= ",order_value = '$order_value'";
                $set .= ",currency_value = '$currency_value'";
                $set .= ",enq_supplier_location = '$enq_supplier_location'";
                $set .= ",enq_Requirement_urgency = '$enq_Requirement_urgency'";
                $set .= ",enq_Requirement_frequency = '$enq_Requirement_frequency'";
                $set .= ",enq_Requirement_purchase = '$enq_Requirement_purchase'";
		$set .= ",msg = '$enq_msg'";
		echo $set .= ",ipaddress = '$ipaddress'";
		$dt = date('Y-m-d h:i:s');
		$set .= ",send_date = '$dt'";
		$db->insertrec("insert into enquiries set $set");

		$enq_from_encode = base64_encode($enq_email);
		$enq_email_encode = base64_encode($enq_to);		
		$unurl1 = "$siteurl/index.php?unsubs_news=true&subs_email=$enq_from_encode";
		$unurl2 = "$siteurl/index.php?unsubs_news=true&subs_email=$enq_email_encode";
		
		$enq_msg_user = "<div style='background:#f5f5f5; padding: 2% 0 0; margin:0 auto'><table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'><tbody><tr><td valign='top' style='padding-left:0px'></td></tr><tr><td><table width='600' style='background:#fff;border:1px solid #e2e2e2'><tbody><tr><td><table style='width:100%'><tbody><tr><td valign='top' style='padding:2px 6px;border:0'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'><tbody><tr><td valign='top' style='padding:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' src='$siteurl/images/logo.png' alt='' style='display:block' class='CToWUd'></a></td><td align='right' valign='top' style='padding:0;padding:12px 10px 5px 5px'><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0;font:bold 11px arial'>Toll Free</td><td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>$_tel</td></tr></tbody></table><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td align='right' valign='top' style='padding:3px 0;font:bold 11px arial;color:#999;line-height:17px'>International Helpline<span style='font:normal 11px arial'>$_mob</span></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td valign='top' style='padding:0px;border:0px'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'><tbody><tr></tr></tbody></table></td></tr></tbody></table></td></tr><tr></tr><tr><td valign='top' style='padding:0 6px 0;border:0'><table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'><tbody><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial;color:#141313'>Dear $username1,</span><span style='display:block;padding:15px 0 15px 0;color:#999;font:bold 12px arial'>Your enquiry has been submited successfully!</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Thank you! For selecting our service.. We are happy to work with you! </span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Any Query Call Us : +91 987 654 3210</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Mail Us : Support@smartb2b.com</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td></tr></tbody></table></td></tr><tr><td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000'>Warm Regards,<br><span style='color:#D61C23'><b>Team $sitename</b></span></td></tr></tbody><tbody><tr><td><table><tbody><tr><td style='border-top:1px solid #ccc;border-bottom:0;border-right:0;border-left:none'></td></tr><tr><td valign='top' style='padding:10px 0 3px;border:0'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'><tbody><tr><td valign='top' style='padding-left:0px;padding-bottom:13px'><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td valign='top' style='padding-left:0px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:10px'><img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'></td><td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000;font:bold 16px arial;line-height:20px'>CALL<br><span style='font:bold 12px arial;color:#d61c23;line-height:20px'>$_tel</span><br></td></tr></tbody></table></td><td valign='middle' style='padding-left:20px'><img border='0' width='1' height='60' alt='' style='display:block'></td><td valign='middle' style='vertical-align:middle;padding-left:0px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:20px'><a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'><img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'></a></td><td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>EMAIL<br><a href='mailto:$siteemail' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank'>$siteemail</a></td></tr></tbody></table></td><td valign='middle' style='vertical-align:middle;padding-left:15px'><img border='0' width='1' height='60' alt='' style='display:block'></td><td valign='top' style='padding-left:15px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'></a></td><td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>Website<br><span style='color:#006fb4;text-decoration:none;font:normal 12px arial'><a href='#' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'>$sitename</a></span></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style='width:100%'><table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%' bgcolor='#ffffff'><tbody><tr style='width:20%'><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:0;text-decoration:none;border:0;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px' class='CToWUd'></a></td></tr></tbody></table></td></tr><tr><td style='border-top:1px dashed #ccc;border-bottom:0;border-right:0;border-left:none'></td></tr><tr><td valign='top' style='padding:0 6px 1px;border:0'></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table><tbody><tr><td><table width='600'><tbody><tr><td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='$unurl1' target='_blank'>Unsubscribe</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><div class='yj6qo'></div><div class='adL'></div></div>";
$enq_msg_company = "<div style='background:#f5f5f5;padding: 2% 0 0; margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' 
		style='background:#ffffff;border:1px solid #e2e2e2'> <tbody> <tr> <td>
		<table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0px'> 
		<table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'> 
		<a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='$siteurl/assets/images/$sitelogo' alt='' style='display:block' class='CToWUd'> 
		</a> </td><td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> 
		<tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0px;font:bold 11px arial'> Contact Us </td> <td align='right' valign='middle'
		style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>8928131130 </td> </tr> </tbody> </table> 
		<table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0px;font:bold 11px 
		arial;color:#999;line-height:17px'>  <span style='font:normal 11px arial'>  </span> </td> </tr> </tbody>
		</table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' 
		cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> </tr> <tr> 
		<td valign='top' style='padding:0px 6px 0px;border:0px'>
		
		
		<h4 style='border:1px solid; font-size:large; background-color: #337ab7; color: white; text-align: center;padding: 7px;' class='center'> Enquiry Details</h4>
		
		<table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'>
		<tbody> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'>
		<span style='font:bold 16px arial; color:#141313;'>Dear $username2,</span>
		<span style='display:block;padding:15px 0px 15px 0px;color:blue;font:bold 12px arial;'>You got a Enquiry! Please view your enquiry details
		</span></td> </tr> <tr>
		<td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'>
	
		<table cellpadding='8' style='border-color: #666;'>
			<tr ><td style='font:bold 16px arial;color:#141313'> <b>Subject</b> </td><td> :</td><td  style='color:red;'>$enq_subject </td></tr>
		<tr style='border-style: solid;'><td style='font:bold 16px arial;color:#141313'> <b>Product Name</b> </td><td> :</td><td  style='color:red;'>$enq_prod_name </td></tr>
			<tr><td style='font:bold 16px arial;color:#141313'> <b>Estimated Quantity</b> </td><td> :</td><td  style='color:red;'>$enq_quantity - $enq_unit_type </td></tr>
	<!--	<tr><td style='font:bold 16px arial;color:#141313'> <b>Unit Type</b> </td><td> :</td><td  style='color:red;'>$enq_unit_type </td></tr>-->
		<tr><td style='font:bold 16px arial;color:#141313' > <b>Approximate Order Value </b> </td><td> :</td><td style='color:red;'>$order_value INR </td> </tr>
		<!--	<tr><td> <b>Curruncy</b> </td><td> :</td><td>$currency_value </td></tr>-->
				<tr><td style='font:bold 16px arial;color:#141313'> <b>Preferred Supplier</b> </td><td> :</td><td style='color:red;'>$enq_supplier_location </td></tr>
			<tr><td style='font:bold 16px arial;color:#141313'> <b> Want to Buy</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'>$enq_Requirement_urgency </td></tr>
			<tr><td style='font:bold 16px arial;color:#141313'> <b>Requirement Type</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$enq_Requirement_frequency </td></tr>
				<tr><td style='font:bold 16px arial;color:#141313'> <b>Purpose </b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$enq_Requirement_purchase </td></tr>
	
		<tr><td style='font:bold 16px arial;color:#141313'> <b>Requirement Details</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$enq_msg </td></tr>
		
		
		</table>
		
		<div style='border-style: inset; background-color:#eadff173;'>
		<h3 style='font:bold 16px arial;color:#141313'>Buyer Contact Details:-</h3>

		<table>
	    
			<tr><td style='font:bold 16px arial;color:#141313'> <b>Name  </b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$username1 </td></tr>
				<tr><td style='font:bold 16px arial;color:#141313'> <b>Company Name </b> </td><td> :</td><td style='font:bold 14px arial;color:#141313' >$enq_company </td></tr>
					<tr><td style='font:bold 16px arial;color:#141313'> <b>Mobile No.</b> </td><td> :</td><td  style='font:bold 14px arial;color:#141313;color:blue;'>$enq_phone </td>
		
			<tr><td style='font:bold 16px arial;color:#141313'> <b>From</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'> $enq_email </td></tr>
		<tr><td style='font:bold 16px arial;color:#141313'> <b>City</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'>$enq_city </td></tr>
		<tr><td style='font:bold 16px arial;color:#141313' > <b>State</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'>$enq_state </td></tr>
	<tr><td style='font:bold 16px arial;color:#141313' > <b>Address</b> </td><td> :</td><td style='font:bold 14px arial;color:#141313'>$enq_address </td></tr>
	
		</tr>
	
		</table>
	
		</div>
		
		
		</span><br/></td> </tr>
		<tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'>
		<span style='font:bold 12px arial; color:#999;'>Any Query Call Us : +91 8928131130</span></td> </tr> <tr> <td valign='top'
		style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'>Mail Us :
		    admin@b2bharat.com</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td> </tr> </tbody>
		    </table> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>Warm Regards,<br>
		    <span style='color:#D61C23'><b>Team $siteurl </b></span> </td> </tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> 
		    <td style='border-top:1px solid #cccccc;border-bottom:none;border-right:none;border-left:none'> </td>
		    </tr> <tr> <td valign='top' style='padding:10px 0px 3px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'>
		    <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top'
		    style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle'
		    style='vertical-align:middle;padding-left:10px'> <img border='0' width='49' height='49' src='$siteurl/images/phone.png' 
		    alt='' style='display:block' class='CToWUd'> </td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px'> CALL <br> 
		    <span style='font:bold 12px arial;color:#D61C23;line-height:20px'> 8928131130 </span> <br> </td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'> 
		    <img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='middle' style='vertical-align:middle;padding-left:0px'>
		    <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'> 
		    
		    <a style='color:#006fb4;text-decoration:none' href='mailto:admin@b2bharat.com' target='_blank'> 
		    <img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'> </a> </td>
		    <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> EMAIL <br>
		    <a href='mailto:admin@b2bharat.com' style='color:#D61C23;font:bold 12px arial;text-decoration:none;' target='_blank'> admin@b2bharat.com </a> </td>
		    </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'>
		    </td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'> 
		    <a href='#' target='_blank' data-saferedirecturl='#'> 
		    <img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='#' style='color:#D61C23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> www.b2bharat.com </a> </span> </td> </tr> </tbody> 
		    </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%;' bgcolor='#ffffff'> <tbody> <tr style='width:20%;'> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:none;text-decoration:none;border:none; width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> <tr> <td valign='top' style='padding:0px 6px 1px;border:0px'> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>
		    Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='$unurl2' target='_blank'>Unsubscribe</a> 
		    </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>";
		
		
		$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <admin@b2bharat.com>' . "\r\n";
$headers .= 'Cc: inqury@b2bharat.com' . "\r\n";


		foreach($to_emails as $to){
			//$com_obj->email($enq_from,$to,"User enquiry submission from B2B",$enq_msg_company);
			mail($to,'User enquiry submission from B2B',$enq_msg_company,$headers);
		}
		//$com_obj->email($enq_from,$enq_email,"multiple enquires sent successfully!",$enq_msg_user);
		mail($enq_email,'multiple enquires sent successfully!',$enq_msg_company,$headers);
		echo "<script>swal('Sent successfully!', 'your enquiry has been submited successfully!','success');
		</script>";
		?>
				<script>
				setTimeout(function(){ window.location.href="http://<? echo $url;?>"; }, 2000);
				</script>
				<?
		
	}
}
?>
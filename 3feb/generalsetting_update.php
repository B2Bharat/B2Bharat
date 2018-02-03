<?
include "./AMframe/config.php";
if(isset($genupdate)) {
	
    $crcdt = time();
	$website_name = trim(addslashes($website_name));
	$website_title = trim(addslashes($website_title));
	$website_url = trim(addslashes($website_url));
	$admin_email = trim(addslashes($admin_email));
	$home_block1 = trim(addslashes($home_block1));
	$home_block1title = trim(addslashes($home_block1title));
	$home_block2 = trim(addslashes($home_block2));
	$home_block2title = trim(addslashes($home_block2title));
	$home_block3title = trim(addslashes($home_block3title));
	$home_block3 = trim(addslashes($home_block3));
	$admin_email = trim(addslashes($admin_email));
	$default_country = trim(addslashes($default_country));
	$default_currency = trim(addslashes($default_currency));
	$seo = trim(addslashes($seo));
	$maintenance = trim(addslashes($maintenance));
	$message = trim(addslashes($message));
	$account_owner = trim(addslashes($account_owner));
	$billing = trim(addslashes($billing));
	$shopping = trim(addslashes($shopping));
	$pay_person = trim(addslashes($pay_person));
	$logo_invoice = trim(addslashes($logo_invoice));
	$paytotext = trim(addslashes($paytotext));
	$keywords = trim(addslashes($keywords));
	$description = trim(addslashes($description));

	
			$set  = "website_name = '$website_name'";		
			$set  .= ",website_title = '$website_title'";
			$set  .= ",website_url = '$website_url'";
			$set  .= ",admin_email = '$admin_email'";
			$set  .= ",default_country = '$default_country'";
			$set  .= ",default_currency = '$default_currency'";
			$set  .= ",home_block1 = '$home_block1'";
			$set  .= ",home_block1title = '$home_block1title'";
			$set  .= ",home_block2 = '$home_block2'";
			$set  .= ",home_block2title = '$home_block2title'";
			$set  .= ",home_block3 = '$home_block3'";
			$set  .= ",home_block3title = '$home_block3title'";
			$set  .= ",seo = '$seo'";
			$set  .= ",maintenance = '$maintenance'";
			$set  .= ",message = '$message'";
			$set  .= ",account_owner = '$account_owner'";
			$set  .= ",billing = '$billing'";
			$set  .= ",shopping = '$shopping'";
			$set  .= ",pay_person = '$pay_person'";
			$set  .= ",logo_invoice = '$logo_invoice'";
			$set  .= ",paytotext = '$paytotext'";
			$set  .= ",keywords = '$keywords'";
			$set  .= ",description = '$description'";
			$set  .= ",ipaddr = '$ipaddress'";		
			$set  .= ",chngdt = '$crcdt'";    
			//$set  .= ",userchng = '$usrcre_name'";
			$acn="";
			
		if($_FILES['img']['tmp_name']!=""){
		$NgImg='sitelogo'.uniqid();
		$isUploaded = $com_obj->upload_image('img',$NgImg,156,79,156,79,"../assets/images/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;  
		$set.=",img='$NgImg'";
		}else{
		echo "<br/><center style='color:red;'>".$com_obj->img_Err."</center>"; 
		echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
		exit;
		}
	}
	if($_FILES['admin_headerlogo']['tmp_name']!=""){
		$NgImg='adminheader'.uniqid();
		$isUploaded = $com_obj->upload_image('admin_headerlogo',$NgImg,156,79,156,79,"../assets/images/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",admin_headerlogo ='$NgImg'";
		}
	}
	if($_FILES['admin_dashlogo']['tmp_name']!=""){
	    $NgImg='admindash'.uniqid();
		$isUploaded = $com_obj->upload_image('admin_dashlogo',$NgImg,156,79,156,79,"../assets/images/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",admin_dashlogo ='$NgImg'";
		}	
	}
	if($_FILES['frontend_favicon']['tmp_name']!=""){
		$NgImg='frontendfavi'.uniqid();
		$isUploaded = $com_obj->upload_image('frontend_favicon',$NgImg,16,16,1,1,"../assets/images/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",frontend_favicon='$NgImg'";
		}
	}
	if($_FILES['admin_favicon']['tmp_name']!=""){
		$NgImg='adminfavi'.uniqid();
		$isUploaded = $com_obj->upload_image('admin_favicon',$NgImg,16,16,1,1,"../assets/images/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",admin_favicon='$NgImg'";
		}
	}
	
			$db->insertid("update general_setting set $set where id='1'");
			echo "<script>location.href='general_settingupd.php?succ';</script>";
			header("location:general_settingupd.php?succ");
			exit;
		
}
?>
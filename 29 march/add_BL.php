<?php

if(isset($BL_submit)) {	

	$blid = isset($_SESSION['BL_id'])?$_SESSION['BL_id']:'';
	
	$BL_image = isset($_FILES['BL_product_img']['tmp_name'])?$_FILES['BL_product_img']['tmp_name']:'';
	
	$BL_cat=trim(addslashes($BL_cat));
	$sub_cat_id = isset($BL_cat_sub)?$BL_cat_sub:'';
	//$subcategory2 = isset($subcategory2)?$subcategory2:'';
	$BL_off_name=trim(addslashes($BL_off_name));
	$BL_ex_date=date("Y-m-d",strtotime($BL_ex_date));
	$BL_key1=trim(addslashes($BL_key1));
	$BL_key2=trim(addslashes($BL_key2));
	$BL_key3=trim(addslashes($BL_key3));
	$BL_key4=trim(addslashes($BL_key4));
	$BL_desc=trim(addslashes($BL_desc));
	$BL_subject=trim(addslashes($BL_subject));
	$BL_C_code=trim(addslashes($BL_C_code));
	$BL_C_desc=trim(addslashes($BL_C_desc));
	
	$BL_d_price=trim(addslashes($BL_d_price));
	$BL_d_per = addslashes($BL_d_price_unit);
	
	$BL_quantity=trim(addslashes($BL_quantity));
	$BL_q_per = addslashes($BL_quantity_unit);
	
	$BL_specs=trim(addslashes($BL_specs));
	$BL_pack=trim(addslashes($BL_pack));
	
	$BL_deli_duration=trim(addslashes($BL_deli_duration));
	$BL_deli_per = addslashes($BL_deli_duration_unit);
	
	$BL_buy_capacity=trim(addslashes($BL_buy_capacity));
	$BL_buy_cap_per = addslashes($BL_buy_capacity_unit);
	
	$BL_ship_details=trim(addslashes($BL_ship_details));
	$BL_shipping_terms=trim(addslashes($BL_shipping_terms));
        //$pref_supplier_location=trim(addslashes($pref_supplier_location));
        $pref_supplier_location =$db->escapstr($_POST['pref_supplier_location']);
          $Requirement_frequency =$db->escapstr($_POST['Requirement_frequency']);
          
             $Requirement_urgency =$db->escapstr($_POST['Requirement_urgency']);
                $Requirement_purpose =$db->escapstr($_POST['Requirement_purpose']);
           
          
          
	$BL_pmethods=@implode(",",$BL_pmethod);
	$BL_com_name=trim(addslashes($BL_com_name));
	$BL_buss_type=trim(addslashes($BL_buss_type));
	$BL_email=trim(addslashes($BL_email));
	$BL_country=trim(addslashes($BL_country));
	$BL_contact_desc=trim(addslashes($BL_contact_desc));
	$BL_website=trim(addslashes($BL_website));
	$BL_buss_group=trim(addslashes($BL_buss_group));
	$ready_to_publish=trim(addslashes($ready_to_publish));
	$dt=date("Y-m-d H:i:s");
	
	$set="user_id='$user_id'";
	$set.=",sub_cat_id='$sub_cat_id'";
	$set.=",cat_id='$BL_cat'";
	//$set.=",subcategory2='$subcategory2'";
	$set.=",offer_name='$BL_off_name'";
	$set.=",subject='$BL_subject'";
	$set.=",keyword1='$BL_key1'";
	$set.=",keyword2='$BL_key2'";
	$set.=",keyword3='$BL_key3'";
	$set.=",keyword4='$BL_key4'";
	$set.=",det_desc='$BL_desc'";
	$set.=",valid_until='$BL_ex_date'";
	$set.=",currency='$BL_C_code'";
	$set.=",currency_desc='$BL_C_desc'";
	$set.=",price='$BL_d_price'";
	$set.=",specification='$BL_specs'";
	$set.=",exquantity='$BL_quantity'";
	$set.=",package='$BL_pack'";
	$set.=",delivery_time='$BL_deli_duration'";
	$set.=",maxbuy_capacity='$BL_buy_capacity'";
	$set.=",shipping='$BL_ship_details'";
	$set.=",ship_terms='$BL_shipping_terms'";
        $set.=",pref_supplier_location='$pref_supplier_location'";
          $set.=",Requirement_frequency='$Requirement_frequency'";
        $set.=",Requirement_urgency='$Requirement_urgency'";
        $set.=",Requirement_purpose='$Requirement_purpose'";
           
          
          $set.=",pay_method='$BL_pmethods'";
	$set.=",company_name='$BL_com_name'";
	$set.=",businesstype='$BL_buss_type'";
	$set.=",email='$BL_email'";
	$set.=",country='$BL_country'";
	$set.=",contact_desc='$BL_contact_desc'";
	$set.=",website='$BL_website'";
	$set.=",action='$ready_to_publish'";
	$set.=",business_group='$BL_buss_group'";
	
	$set.=",price_unit='$BL_d_per'";
	$set.=",quan_unit='$BL_q_per'";
	$set.=",deliver_duration_unit='$BL_deli_per'";
	$set.=",buy_capacity_unit='$BL_buy_cap_per'";
       //santosh
      //  print_r($set);
       // die();
        
	
	
	
	
	$acn = "";
	if($blid!=''){
	$acn = "update";	
	$set.=",chng_date='$dt'";		
	}else{
	$acn = "new";	
	$set.=",post_date='$dt'";	
	}
	
	$NgImg='01'.$user_id.uniqid();
	$isUploaded = $com_obj->upload_image('BL_product_img',$NgImg,1000,600,5,3,"uploads/BL_images/banner1/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;  
		$set.=",photo1='$NgImg'";
	}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
	$NgImg='02'.$user_id.uniqid();
	$isUploaded = $com_obj->upload_image('BL_product_img2',$NgImg,1000,600,5,3,"uploads/BL_images/banner2/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo2='$NgImg'";
	}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
		
	$NgImg='03'.$user_id.uniqid();
	$isUploaded = $com_obj->upload_image('BL_product_img3',$NgImg,1000,600,5,3,"uploads/BL_images/banner3/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo3='$NgImg'";
	}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
		
	$NgImg='04'.$user_id.uniqid();
	$isUploaded = $com_obj->upload_image('BL_product_img4',$NgImg,1000,600,5,3,"uploads/BL_images/banner4/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo4='$NgImg'";
	}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
		
	$NgImg='05'.$user_id.uniqid();
	$isUploaded = $com_obj->upload_image('BL_product_img5',$NgImg,1000,600,5,3,"uploads/BL_images/banner5/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo5='$NgImg'";
	}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
	
	
			/*if($BL_image != "" || $BL_image != null)
			{
				$fpath = $_FILES['BL_product_img']['tmp_name'] ;
				$fname = $_FILES['BL_product_img']['name'] ;
				$image_info = getimagesize($_FILES["BL_product_img"]["tmp_name"]);
				$image_width = $image_info[0];
				$image_height = $image_info[1];
				
				$size=filesize($_FILES['BL_product_img']['tmp_name']);
				$getext = substr(strrchr($fname, '.'), 1);
				$ext = strtolower($getext);

				if($size>1048576) { //1048576 Bytes =  MB
					echo "<br/><center style='color:red;'>Too big! image size should be lesser then 1 MB</center>"; 
					echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
					exit;
				}
				if($image_width<1000 || $image_height<600) { 
					echo "<br/><center style='color:red;'>Too small! You are upload ($image_width x $image_height) image. it must be (1000 x 600) or greater..</center>"; 
					echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
					exit;
				}
				if(($image_width*3)!=($image_height*5)) { 
					echo "<br/><center style='color:red;'>Invalid aspect ratio! Product image aspect ratio must be 5:3 <br/> Image must be (1000 x 600) or greater.. </center>"; 
					echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
					exit;
				}
				
				//$set .= "product_img = '$NgImg',";
				if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'bmp')
				{
					$NgImg= "BL-product-".$user_id."-".uniqid().".".$ext;
					$img_org = "uploads/BL_images/$NgImg";
					$img_size = "uploads/BL_images/300x300/$NgImg";
					move_uploaded_file($fpath,$img_org);
					$resizeObj = new resize($img_org);
					$resizeObj -> resizeImage(300, 300, 'exact');
					$resizeObj -> saveImage($img_size, 72);
					@unlink($img_org);
					
					$set.=",photo1='$NgImg'";
				}
				else{
				echo "<center style='color:red;'>jpg or png file will only accepted..</center>";
				echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
				}
			}else{
				if($blid==''){
				echo "<br/><center style='color:red;'>Product image missing!</center>"; 
				echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
				exit;	
				}
			}*/
			
			
	if($blid!=''){
	$_SESSION['BL_id']='';
	$db->insertrec("update buying_leads set $set where id='$blid'");	
	}else{
		echo $nblid=$db->insertid("insert into buying_leads set $set");
		$uinfo = $db->singlerec("select email,fname from register where id='$user_id' LIMIT 1");
		
		$enblid=$com_obj->encid($nblid);
		$blname=strtolower(str_replace(' ','-',$BL_off_name));
		$from = $db->singlerec("select admin_email from general_setting where id='1'");
		$to=$uinfo['email'];
		$username=$uinfo['fname'];
		$url="$siteurl/buying-leads-detail/$blname/$enblid";
		$bmsg="<div style='background:#f5f5f5; padding: 2% 0 0; margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' style='background:#fff;border:1px solid #e2e2e2'> <tbody> <tr> <td> <table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' src='$siteurl/assets/images/$sitelogo' alt='' style='display:block' class='CToWUd'></a></td> <td align='right' valign='top' style='padding:0;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0;font:bold 11px arial'>Toll Free</td> <td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>$_tel</td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0;font:bold 11px arial;color:#999;line-height:17px'>International Helpline<span style='font:normal 11px arial'>$_mob</span></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr></tr> <tr> <td valign='top' style='padding:0 6px 0;border:0'> <table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'> <tbody> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial;color:#141313'>Dear $username,</span><span style='display:block;padding:15px 0 15px 0;color:#999;font:bold 12px arial'>Your buying lead $BL_name has been added successfully..!!!</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'><a href='$url'>more info</a></span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Mail Us : Support@smartb2b.com</span></td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000'>Warm Regards,<br><span style='color:#D61C23'><b>Team </b></span></td> </tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> <td style='border-top:1px solid #ccc;border-bottom:0;border-right:0;border-left:none'></td> </tr> <tr> <td valign='top' style='padding:10px 0 3px;border:0'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:10px'><img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'></td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000;font:bold 16px arial;line-height:20px'>CALL<br><span style='font:bold 12px arial;color:#d61c23;line-height:20px'>$_tel</span><br></td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'><img border='0' width='1' height='60' alt='' style='display:block'></td> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'><a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'><img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'></a></td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>EMAIL<br><a href='mailto:$siteemail' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank'>$siteemail</a></td> </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'><img border='0' width='1' height='60' alt='' style='display:block'></td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'></a></td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>Website<br><span style='color:#006fb4;text-decoration:none;font:normal 12px arial'><a href='#' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'>$sitename</a></span></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%' bgcolor='#ffffff'> <tbody> <tr style='width:20%'> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:0;text-decoration:none;border:0;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px' class='CToWUd'></a></td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #ccc;border-bottom:0;border-right:0;border-left:none'></td> </tr> <tr> <td valign='top' style='padding:0 6px 1px;border:0'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='#' target='_blank'>Unsubscribe</a></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>";
		$sub="Your buying lead posted successfully!";
		$com_obj->email($from[0],$to,$sub,$bmsg);
		
		$related_SLs=$db->get_all_asso("select a.user_id, b.user_id,c.fname,c.email from selling_leads as a,company as b,register as c where a.user_id = b.user_id AND a.user_id = c.id AND a.cat_id='$BL_cat' LIMIT 20");
		if(!empty($related_SLs)){
			foreach($related_SLs as $SL){
				$username = $SL['fname'];
				$to =  $SL['email'];
				$url="$siteurl/buying-leads-detail/$blname/$enblid";
				$msg="<div style='background:#f5f5f5; padding: 2% 0 0; margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' style='background:#fff;border:1px solid #e2e2e2'> <tbody> <tr> <td> <table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' src='$siteurl/images/logo.png' alt='' style='display:block' class='CToWUd'></a></td> <td align='right' valign='top' style='padding:0;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0;font:bold 11px arial'>Toll Free</td> <td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>$_tel</td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0;font:bold 11px arial;color:#999;line-height:17px'>International Helpline<span style='font:normal 11px arial'>$_mob</span></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr></tr> <tr> <td valign='top' style='padding:0 6px 0;border:0'> <table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'> <tbody> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial;color:#141313'>Dear $username,</span><span style='display:block;padding:15px 0 15px 0;color:#999;font:bold 12px arial'>New buying lead alert!</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>New buying lead $BL_name has been posted in same category of your selling lead..</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'><a href='$url'>More info</a></span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Mail Us : Support@smartb2b.com</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000'>Warm Regards,<br><span style='color:#D61C23'><b>Team $sitetitle</b></span></td> </tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> <td style='border-top:1px solid #ccc;border-bottom:0;border-right:0;border-left:none'></td> </tr> <tr> <td valign='top' style='padding:10px 0 3px;border:0'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:10px'><img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'></td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000;font:bold 16px arial;line-height:20px'>CALL<br><span style='font:bold 12px arial;color:#d61c23;line-height:20px'>$_tel</span><br></td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'><img border='0' width='1' height='60' alt='' style='display:block'></td> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'><a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'><img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'></a></td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>EMAIL<br><a href='mailto:$siteemail' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank'>$siteemail</a></td> </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'><img border='0' width='1' height='60' alt='' style='display:block'></td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'></a></td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>Website<br><span style='color:#006fb4;text-decoration:none;font:normal 12px arial'><a href='#' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'>$sitename</a></span></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%' bgcolor='#ffffff'> <tbody> <tr style='width:20%'> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:0;text-decoration:none;border:0;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px' class='CToWUd'></a></td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #ccc;border-bottom:0;border-right:0;border-left:none'></td> </tr> <tr> <td valign='top' style='padding:0 6px 1px;border:0'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='#' target='_blank'>Unsubscribe</a></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>"; 
				$sub="New buying lead alert!";
				$com_obj->email($from[0],$to,$sub,$msg);
			}
		}
	}
	
	
	
	
	echo "<script>location.href='$siteurl/add-buying-offer?acn=addsuc';</script>";
	header("Location: $siteurl/add-buying-offer?acn=addsuc"); exit;
	}

?>
<?php

if(isset($SL_submit)) {	

	$slid = isset($_SESSION['SL_id'])?$_SESSION['SL_id']:'';
	$blid1 = addslashes($slid);
	$SL_image = isset($_FILES['SL_product_img']['tmp_name'])?$_FILES['SL_product_img']['tmp_name']:'';
	
	$SL_cat=trim(addslashes($SL_cat));
	$sub_cat_id = isset($SL_cat_sub)?$SL_cat_sub:'';
	$subcategory2 = isset($subcategory2)?$subcategory2:'';
	$SL_off_name=trim(addslashes($SL_off_name));
	$SL_ex_date=date("Y-m-d",strtotime($SL_ex_date));
	$SL_key1=trim(addslashes($SL_key1));
	$SL_key2=trim(addslashes($SL_key2));
	$SL_key3=trim(addslashes($SL_key3));
	$SL_key4=trim(addslashes($SL_key4));
	//$SL_desc=trim(addslashes($SL_desc));
	$SL_bf_desc=trim(addslashes($SL_bf_desc));
	$SL_det_desc=trim(addslashes($SL_det_desc));
         $pref_supplier_location =$db->escapstr($_POST['pref_supplier_location']);
          $Requirement_frequency =$db->escapstr($_POST['Requirement_frequency']);
          
             $Requirement_urgency =$db->escapstr($_POST['Requirement_urgency']);
                $Requirement_purpose =$db->escapstr($_POST['Requirement_purpose']);


	
	$SL_subject=trim(addslashes($SL_subject));
	$SL_C_code=trim(addslashes($SL_C_code));
	$SL_C_desc=trim(addslashes($SL_C_desc));
	
	$SL_base_price=trim(addslashes($SL_base_price));
	$SL_d_price_unit =addslashes($SL_d_price_unit);
	
	$SL_max_price=trim(addslashes($SL_max_price));
	
	$SL_size=trim(addslashes($SL_size));
	$SL_size_unit = addslashes($SL_size_unit);
	
	$SL_quantity=trim(addslashes($SL_quantity));
	$SL_quantity_unit = addslashes($SL_quantity_unit);
	
	$SL_specs=trim(addslashes($SL_specs));
	$SL_pack=trim(addslashes($SL_pack));
	
	$SL_deli_duration=trim(addslashes($SL_deli_duration));
	$SL_deli_duration_unit = addslashes($SL_deli_duration_unit);
	
	$SL_ship_details=trim(addslashes($SL_ship_details));
	$SL_shipping_terms=trim(addslashes($SL_shipping_terms));
	$SL_pmethods=@implode(",",$SL_pmethod);
	
	$SL_brand_name=trim(addslashes($SL_brand_name));
	//$SL_buss_type=trim(addslashes($SL_buss_type));
	$SL_model_num=trim(addslashes($SL_model_num));
	$SL_manfuc=trim(addslashes($SL_manfuc));
	$SL_origin=trim(addslashes($SL_origin));
	$SL_material=trim(addslashes($SL_material));
	$SL_colors=trim(addslashes($SL_colors));
	$SL_mb_price=trim(addslashes($SL_mb_price));
	$SL_negotiable=trim(addslashes($SL_negotiable));
	
	
	
	//$SL_buss_group=trim(addslashes($SL_buss_group));
	$ready_to_publish=trim(addslashes($ready_to_publish));
	$dt=date("Y-m-d H:i:s");
	
	$set="user_id='$user_id'";
	//$set.=",sub_cat_id='$sub_cat_id'";
	$set.=",cat_id='$SL_cat'";
	//$set.=",subcategory2='$subcategory2'";
	$set.=",offer_name='$SL_off_name'";
	$set.=",subject='$SL_subject'";
	$set.=",keyword1='$SL_key1'";
	$set.=",keyword2='$SL_key2'";
	$set.=",keyword3='$SL_key3'";
	$set.=",keyword4='$SL_key4'";
	$set.=",valid_until='$SL_ex_date'";
	$set.=",currency='$SL_C_code'";
	$set.=",currency_desc='$SL_C_desc'";
	$set.=",specification='$SL_specs'";
	$set.=",min_order_quantity='$SL_quantity'";
	$set.=",package='$SL_pack'";
	$set.=",delivery_time='$SL_deli_duration'";
	$set.=",shipping='$SL_ship_details'";
	$set.=",ship_terms='$SL_shipping_terms'";
	$set.=",pay_method='$SL_pmethods'";
	$set.=",action='$ready_to_publish'";
	//$set.=",business_group='$SL_buss_group'";
	// need to add in design page
	$set.=",brief_description='$SL_bf_desc'";
	$set.=",det_description='$SL_det_desc'";
	$set.=",base_price='$SL_base_price'";
	$set.=",max_price='$SL_max_price'";
	$set.=",size='$SL_size'";
	
	$set.=",brand_name='$SL_brand_name'";
	$set.=",model_num='$SL_model_num'";
	$set.=",manufacturers='$SL_manfuc'";
	$set.=",place_of_origin='$SL_origin'";
	$set.=",materials='$SL_material'";
	$set.=",colors='$SL_colors'";
	$set.=",min_bid_price='$SL_mb_price'";
	$set.=",price_negotiable='$SL_negotiable'";
	$set.=",other_related='$SL_other'";
	$set.=",price_unit ='$SL_d_price_unit'";
	$set.=",size_unit='$SL_size_unit'";
	$set.=",quan_unit ='$SL_quantity_unit'";
	$set.=",deliver_duration_unit ='$SL_deli_duration_unit'";
         $set.=",pref_supplier_location='$pref_supplier_location'";
          $set.=",Requirement_frequency='$Requirement_frequency'";
        $set.=",Requirement_urgency='$Requirement_urgency'";
        $set.=",Requirement_purpose='$Requirement_purpose'";
	
	$acn = "";
	if($slid!=''){
	$acn = "update";	
	$set.=",chng_date='$dt'";		
	}else{
	$acn = "new";	
	$set.=",post_date='$dt'";	
	}
	
	
	$NgImg = ($acn=='new')?'01'.$user_id.uniqid():substr($sl_info['photo1'],0,strpos($sl_info['photo1'],'.'));
	
	$isUploaded = $com_obj->upload_image('SL_product_img',$NgImg,100,100,5,3,"uploads/SL_images/banner1/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;  
		$set.=",photo1='$NgImg'";
	}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
	
	$NgImg = ($acn=='new')?'02'.$user_id.uniqid():substr($sl_info['photo2'],0,strpos($sl_info['photo2'],'.'));
	
	$isUploaded = $com_obj->upload_image('SL_product_img2',$NgImg,100,100,5,3,"uploads/SL_images/banner2/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo2='$NgImg'";
	}
	else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
		
	$NgImg = ($acn=='new')?'03'.$user_id.uniqid():substr($sl_info['photo3'],0,strpos($sl_info['photo3'],'.'));
	
	$isUploaded = $com_obj->upload_image('SL_product_img3',$NgImg,1000,600,5,3,"uploads/SL_images/banner3/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo3='$NgImg'";
	}
	else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
	$NgImg = ($acn=='new')?'04'.$user_id.uniqid():substr($sl_info['photo4'],0,strpos($sl_info['photo4'],'.'));
	
	$isUploaded = $com_obj->upload_image('SL_product_img4',$NgImg,1000,600,5,3,"uploads/SL_images/banner4/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo4='$NgImg'";
	}
	else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
	
	$NgImg = ($acn=='new')?'05'.$user_id.uniqid():substr($sl_info['photo5'],0,strpos($sl_info['photo5'],'.'));
	
	$isUploaded = $com_obj->upload_image('SL_product_img5',$NgImg,1000,600,5,3,"uploads/SL_images/banner5/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo5='$NgImg'";
	}
	else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
			
	if($slid!=''){
	$_SESSION['SL_id']='';
	$db->insertrec("update selling_leads set $set where id='$slid'");
    //echo "<script>location.href='$siteurl/add-selling-offer?acn=addsuc&slid=$blid1';</script>";
	//header("Location: $siteurl/add-selling-offer?acn=addsuc&slid=$blid1"); exit;	
	}else{
		$nslid=$db->insertid("insert into selling_leads set $set");
		$uinfo = $db->singlerec("select email,fname from register where id='$user_id' LIMIT 1");
		
		$enslid=$com_obj->encid($nslid);
		$slname=strtolower(str_replace(' ','-',$SL_off_name));
		$url="$siteurl/buying-leads-detail/$slname/$enslid";
		$from = $db->singlerec("select admin_email from general_setting where id='1'");
		$to=$uinfo['email'];
		$username=$uinfo['fname'];
		$bmsg="<div style='background:#f5f5f5; padding: 2% 0 0; margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' style='background:#fff;border:1px solid #e2e2e2'> <tbody> <tr> <td> <table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' src='$siteurl/images/logo.png' alt='' style='display:block' class='CToWUd'></a></td> <td align='right' valign='top' style='padding:0;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0;font:bold 11px arial'>Toll Free</td> <td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>$_tel</td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0;font:bold 11px arial;color:#999;line-height:17px'>International Helpline<span style='font:normal 11px arial'>$_mob</span></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr></tr> <tr> <td valign='top' style='padding:0 6px 0;border:0'> <table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'> <tbody> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial;color:#141313'>Dear $username,</span><span style='display:block;padding:15px 0 15px 0;color:#999;font:bold 12px arial'>Your selling lead $SL_name has been added successfully..!!!</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'><a href='$url'>more info</a></span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Mail Us : Support@smartb2b.com</span></td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000'>Warm Regards,<br><span style='color:#D61C23'><b>Team $sitetitle.com</b></span></td> </tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> <td style='border-top:1px solid #ccc;border-bottom:0;border-right:0;border-left:none'></td> </tr> <tr> <td valign='top' style='padding:10px 0 3px;border:0'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:10px'><img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'></td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000;font:bold 16px arial;line-height:20px'>CALL<br><span style='font:bold 12px arial;color:#d61c23;line-height:20px'>$_tel</span><br></td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'><img border='0' width='1' height='60' alt='' style='display:block'></td> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'><a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'><img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'></a></td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>EMAIL<br><a href='mailto:$siteemail' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank'>$siteemail</a></td> </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'><img border='0' width='1' height='60' alt='' style='display:block'></td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'></a></td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>Website<br><span style='color:#006fb4;text-decoration:none;font:normal 12px arial'><a href='#' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'>$sitename</a></span></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%' bgcolor='#ffffff'> <tbody> <tr style='width:20%'> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:0;text-decoration:none;border:0;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px' class='CToWUd'></a></td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #ccc;border-bottom:0;border-right:0;border-left:none'></td> </tr> <tr> <td valign='top' style='padding:0 6px 1px;border:0'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>";
		$sub="Your selling lead added successfully!";
		$com_obj->email($from[0],$to,$sub,$bmsg);
		$related_BLs=$db->get_all_asso("select a.user_id, b.user_id,c.fname,c.email from buying_leads as a,company as b,register as c where a.user_id = b.user_id AND a.user_id = c.id AND a.cat_id='$SL_cat' LIMIT 20");
		if(!empty($related_BLs)){
			foreach($related_BLs as $BL){
				$username = $BL['fname'];
				$to =  $BL['email'];
				$msg="<div style='background:#f5f5f5; padding: 2% 0 0; margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' style='background:#fff;border:1px solid #e2e2e2'> <tbody> <tr> <td> <table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' src='$siteurl/images/logo.png' alt='' style='display:block' class='CToWUd'></a></td> <td align='right' valign='top' style='padding:0;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0;font:bold 11px arial'>Toll Free</td> <td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>$_tel</td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0;font:bold 11px arial;color:#999;line-height:17px'>International Helpline<span style='font:normal 11px arial'>$_mob</span></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr></tr> <tr> <td valign='top' style='padding:0 6px 0;border:0'> <table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'> <tbody> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial;color:#141313'>Dear $username,</span><span style='display:block;padding:15px 0 15px 0;color:#999;font:bold 12px arial'>New buying lead alert!</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>New selling lead $SL_name has been posted in same category of your buying lead..</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'><a href='$url'>More info</a></span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Mail Us : Support@smartb2b.com</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000'>Warm Regards,<br><span style='color:#D61C23'><b>Team $sitetitle.com</b></span></td> </tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> <td style='border-top:1px solid #ccc;border-bottom:0;border-right:0;border-left:none'></td> </tr> <tr> <td valign='top' style='padding:10px 0 3px;border:0'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:10px'><img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'></td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000;font:bold 16px arial;line-height:20px'>CALL<br><span style='font:bold 12px arial;color:#d61c23;line-height:20px'>$_tel</span><br></td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'><img border='0' width='1' height='60' alt='' style='display:block'></td> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'><a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'><img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'></a></td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>EMAIL<br><a href='mailto:$siteemail' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank'>$siteemail</a></td> </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'><img border='0' width='1' height='60' alt='' style='display:block'></td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'></a></td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>Website<br><span style='color:#006fb4;text-decoration:none;font:normal 12px arial'><a href='#' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'>$sitename</a></span></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%' bgcolor='#ffffff'> <tbody> <tr style='width:20%'> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:0;text-decoration:none;border:0;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td> <td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px' class='CToWUd'></a></td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #ccc;border-bottom:0;border-right:0;border-left:none'></td> </tr> <tr> <td valign='top' style='padding:0 6px 1px;border:0'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>"; 
				$sub="New buying lead alert!";
				$com_obj->email($from[0],$to,$sub,$msg);
			}
	}
	
	echo "<script>location.href='$siteurl/add-selling-offer?acn=addsuc';</script>";
	header("Location: $siteurl/add-selling-offer?acn=addsuc"); exit;
	}
}
?>
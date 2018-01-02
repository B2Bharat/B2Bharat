<?php 
include "./AMframe/config.php";
if(isset($prosubmit)) {
$prod_crtdate = date('Y-m-d');
$id=trim(addslashes($id));
$prod_group=trim(addslashes($prod_group));
$prod_category=trim(addslashes($prod_category));
$prod_subcategory=trim(addslashes($prod_subcategory));
$subcategory2=trim(addslashes($subcategory2));
$userid=trim(addslashes($userid));
//$prod_currency_loc=trim(addslashes($prod_currency_loc));
$unit_price=trim(addslashes($unit_price));
$unitp_quan_type=trim(addslashes($unitp_quan_type));
//$unit_price = $unit_price.'/'.addslashes($unitp_quan_type);
$prod_maxprice=trim(addslashes($prod_maxprice));
//$prod_minprice=trim(addslashes($prod_minprice));
$price_negotiable=trim(addslashes($price_negotiable)); 
$type_or_status=@join(",",$type_or_status);
$payment_type=@join(",",$payment_type);
$prod_size=trim(addslashes($prod_size));
$size_quan_type=trim(addslashes($size_quan_type));
//$prod_size = $prod_size.'/'.addslashes($size_quan_type);
$prod_minquantity=trim(addslashes($prod_minquantity));
$min_quan_type=trim(addslashes($min_quan_type));
//$prod_minquantity = $prod_minquantity.'/'.addslashes($min_quan_type);
$prod_expdate=trim(addslashes($prod_expdate));
$video_embed_code=trim(addslashes($video_embed_code));
$other_relateditems=trim(addslashes($other_relateditems));
$color=trim(addslashes($color));
$prod_group_name=trim(addslashes($prod_group_name));
$prod_name=trim(addslashes($prod_name));
$prod_status=trim(addslashes($prod_status));
$prod_briefdes=trim(addslashes($prod_briefdes));
$prod_gdes=trim(addslashes($prod_gdes));
$prod_detaildes=trim(addslashes($prod_detaildes));
$place_of_origin=trim(addslashes($place_of_origin));	 
$specifications=trim(addslashes($specifications));
$certificates=trim(addslashes($certificates));	
$brand_name=trim(addslashes($brand_name));
$materials=trim(addslashes($materials));
$hs_code=trim(addslashes($hs_code));
$mode_article_num=trim(addslashes($mode_article_num));
$manufacturers=trim(addslashes($manufacturers));
$shipping_terms=trim(addslashes($shipping_terms));
$packaging_details=trim(addslashes($packaging_details));
$shipment=trim(addslashes($shipment));
$contract_period=trim(addslashes($contract_period));
$terms_and_policy=trim(addslashes($terms_and_policy));
$warranty_period=trim(addslashes($warranty_period));
$garranty_period=trim(addslashes($garranty_period));
$keyword1=trim(addslashes($keyword1));
$keyword2=trim(addslashes($keyword2));
$keyword3=trim(addslashes($keyword3));
$keyword4=trim(addslashes($keyword4));
$max_supply_quantity=trim(addslashes($max_supply_quantity));
$max_quan_type=trim(addslashes($max_quan_type));
$prod_no=trim(addslashes($prod_no));
$featured=trim(addslashes($featured));
//$max_supply_quantity = $max_supply_quantity.'/'.addslashes($max_quan_type);


   	
$set  = "prod_group = '$prod_group'";
$set  .= ",prod_category = '$prod_category'";
$set  .= ",prod_subcategory = '$prod_subcategory'";
$set  .= ",subcategory2 = '$subcategory2'";
$set  .= ",userid = '$userid'";
//$set  .= ",prod_currency_loc = '$prod_currency_loc'";
$set  .= ",unit_price = '$unit_price'";
$set  .= ",unit_price_unit = '$unitp_quan_type'";
$set  .= ",prod_maxprice = '$prod_maxprice'";
//$set  .= ",prod_minprice = '$prod_minprice'";
$set  .= ",price_negotiable = '$price_negotiable'";
$set  .= ",type_or_status = '$type_or_status'";
$set  .= ",payment_type = '$payment_type'";
$set  .= ",prod_size = '$prod_size'";
$set  .= ",prod_size_unit = '$size_quan_type'";
$set  .= ",prod_minquantity = '$prod_minquantity'";
$set  .= ",prod_quantitytype = '$min_quan_type'";
$set  .= ",prod_expdate = '$prod_expdate'";
$set  .= ",video_embed_code = '$video_embed_code'";
//$set  .= ",other_relateditems = '$other_relateditems'";
$set  .= ",color = '$color'";
$set  .= ",prod_group_name = '$prod_group_name'";
$set  .= ",prod_name = '$prod_name'";
$set  .= ",prod_status = '$prod_status'";
$set  .= ",prod_briefdes = '$prod_briefdes'";
$set  .= ",prod_gdes = '$prod_gdes'";
$set  .= ",prod_detaildes = '$prod_detaildes'";
$set  .= ",place_of_origin = '$place_of_origin'";
$set  .= ",specifications = '$specifications'";
$set  .= ",certificates = '$certificates'";
$set  .= ",brand_name = '$brand_name'";
$set  .= ",materials = '$materials'";
$set  .= ",hs_code = '$hs_code'";
$set  .= ",mode_article_num = '$mode_article_num'";
$set  .= ",manufacturers = '$manufacturers'";
$set  .= ",shipping_terms = '$shipping_terms'";
$set  .= ",packaging_details = '$packaging_details'";
$set  .= ",shipment = '$shipment'";
$set  .= ",contract_period = '$contract_period'";
$set  .= ",terms_and_policy = '$terms_and_policy'";
$set  .= ",warranty_period = '$warranty_period'";
$set  .= ",garranty_period = '$garranty_period'";
$set  .= ",keyword1 = '$keyword1'";
$set  .= ",keyword2 = '$keyword2'";
$set  .= ",keyword3 = '$keyword3'";
$set  .= ",keyword4 = '$keyword4'";
$set  .= ",max_supply_quantity = '$max_supply_quantity'";
$set  .= ",max_sup_unit = '$max_quan_type'";
$set  .= ",supply_duration = '$supply_duration'";
$set  .= ",prod_no = '$prod_no'";
$set  .= ",featured = '$featured'";
$imagg="";

$acn = "";
	if($id!=''){
	$acn = "update";			
	}else{
	$acn = "new";		
	}	

if($_FILES['photo1']['tmp_name']!=""){
		$NgImg='01'.$userid.uniqid();
		$isUploaded = $com_obj->upload_image('photo1',$NgImg,1000,600,5,3,"../uploads/product/1000x600/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;  
		$set.=",photo1='$NgImg'";
		}else{
		echo "<br/><center style='color:red;'>".$com_obj->img_Err."</center>"; 
		echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
		exit;
		}
	}
	if($_FILES['photo2']['tmp_name']!=""){
		$NgImg='02'.$userid.uniqid();
		$isUploaded = $com_obj->upload_image('photo2',$NgImg,1000,600,5,3,"../uploads/product/1000x600/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo2='$NgImg'";
		}
	}
	if($_FILES['photo3']['tmp_name']!=""){
	    $NgImg='03'.$userid.uniqid();
		$isUploaded = $com_obj->upload_image('photo3',$NgImg,1000,600,5,3,"../uploads/product/1000x600/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo3='$NgImg'";
		}	
	}
	if($_FILES['photo4']['tmp_name']!=""){
		$NgImg='04'.$userid.uniqid();
		$isUploaded = $com_obj->upload_image('photo4',$NgImg,1000,600,5,3,"../uploads/product/1000x600/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo4='$NgImg'";
		}
	}
	if($_FILES['photo5']['tmp_name']!=""){
		$NgImg='05'.$userid.uniqid();
		$isUploaded = $com_obj->upload_image('photo5',$NgImg,1000,600,5,3,"../uploads/product/1000x600/",$acn);
		if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photo5='$NgImg'";
		}
	}
	
			if($upd == 1){
				$set  .= ",prod_crtdate = '$prod_crtdate'";
				$idvalue=$db->insertid("insert into product set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chng_date = '$prod_crtdate'";
				$db->insertrec("update product set $set where id='$id'");
				$act = "upd";
			}
			
			echo "<script>location.href='product.php?act=$act';</script>";
			header("location:product.php?act=$act");
			exit;	

}
?>
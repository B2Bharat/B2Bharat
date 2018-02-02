<?

if(isset($add_Prod)) {
	$brch = isset($_FILES['brch']['tmp_name'])?$_FILES['brch']['tmp_name']:'';
	
	
	$cat=trim(addslashes($cat));
	$sub_cat=trim(addslashes($sub_cat));
	$subcategory2=trim(addslashes($subcategory2));
	//$curren_unit=trim(addslashes($curren_unit));
	//$curren_val=trim(addslashes($curren_val));
	$unit_price=trim(addslashes($unit_price));
	
	$unit_type=trim(addslashes($unit_type));
	
	$max_price=trim(addslashes($_POST['max_price']));
	//$minb_price=trim(addslashes($minb_price));
    $nego=trim(addslashes($nego));
    $shipping_terms=trim(addslashes($shipping_terms));
    $prod_st=@implode(",",$prod_st);
	$prod_st=trim(addslashes($prod_st));
	$size_val=trim(addslashes($size_val));
	$size_unit=trim(addslashes($size_unit));
	$pay_method=trim(addslashes($pay_method));
	$pay_method=@implode(",",$pay_method);
	$ord_quan=trim(addslashes($ord_quan));
	$ord_qunit=trim(addslashes($ord_qunit));
	$exp_time=trim(addslashes($exp_time));
	$exp_time=date("Y-m-d H:i:s", strtotime($exp_time));
	
	$vdeo=trim(addslashes($vdeo));
	
	$color=trim(addslashes($color));
	$prod_group_name=trim(addslashes($prod_group_name));
	$perm=str_replace(" ", "-", $prod_group_name);
	$perm=strtolower($perm);
	$prod_name=trim(addslashes($prod_name));
	$perm=str_replace(" ", "-", $prod_name);
	$perm=strtolower($perm);
	$publish=trim(addslashes($publish));
	$key1=trim(addslashes($key1));
	$key2=trim(addslashes($key2));
	$key3=trim(addslashes($key3));
	$key4=trim(addslashes($key4));
	$prod_gdes=trim(addslashes($prod_gdes));
	$b_des=trim(addslashes($b_des));
	$d_des=trim(addslashes($d_des));
	$origin=trim(addslashes($origin));
	$specif=trim(addslashes($specif));
	$certif=trim(addslashes($certif));
	$bname=trim(addslashes($bname));
	$material=trim(addslashes($material));
	$hscode=trim(addslashes($hscode));
	$model=trim(addslashes($model));
	$manufac=trim(addslashes($manufac));
        $related=trim(addslashes($related));
	
	$max_capacity=trim(addslashes($max_capacity));
	$max_unit=trim(addslashes($max_unit));
	$shipping_terms=trim(addslashes($shipping_terms));
	$pack_det=trim(addslashes($pack_det));
	$shipment=trim(addslashes($shipment));
	//$cfn1=trim(addslashes($cfn2));
	//$cfn2=trim(addslashes($cfn2));
	$c_period=trim(addslashes($c_period));
	$terms=trim(addslashes($terms));
	$w_period=trim(addslashes($w_period));
	$g_period=trim(addslashes($g_period));
	$prod_no=trim(addslashes($prod_no));
	$dt=date("Y-m-d H:i:s");
	$BrImg= "Brochure-".$userid."-".uniqid().".jpg";
	$com_obj->upload_image("brch",$BrImg,1000,600,5,3,"uploads/product/Brochures/","new");
		
	if($prod_name=="" ) {
		echo "<script>swal('Oops..', 'You must need to enter the product name!', 'error');</script>";
	}
	else {
		$set="userid='".$_SESSION['user']."'";
		$set.=",prod_group_name='$prod_group_name'";

		$set.=",prod_name='$prod_name'";

		$set.=",permalink='$perm'";
		$set.=",prod_category='$cat'";
		$set.=",prod_subcategory='$sub_cat'";
		$set.=",subcategory2 = '$subcategory2'";
		$set.=",keyword1='$key1'";
		$set.=",keyword2='$key2'";
		$set.=",keyword3='$key3'";
		$set.=",keyword4='$key4'";
		//$set.=",prod_currency_loc='$curren_unit'";
		$set.=",unit_price='$unit_price'";
		$set.=",prod_maxprice='$max_price'";
		//$set.=",prod_minprice='$minb_price'";
		$set.=",price_negotiable='$nego'";
                $set.=",shipping_terms='$shipping_terms'";
		$set.=",publish='$publish'";
		$set.=",type_or_status='$prod_st'";
		$set.=",prod_size='$size_val'";
		$set.=",payment_type='$pay_method'";
		$set.=",prod_minquantity='$ord_quan'";
		$set.=",prod_quantitytype='$ord_qunit'";
		$set.=",video_embed_code='$vdeo'";
		
		$set.=",color='$color'";
		$set.=",max_supply_quantity='$max_capacity'";
		$set.=",prod_gdes='$prod_gdes'";
		$set.=",prod_briefdes='$b_des'";
		$set.=",prod_detaildes='$d_des'";
		$set.=",place_of_origin='$origin'";
		$set.=",specifications='$specif'";
		$set.=",certificates='$certif'";
		$set.=",brand_name='$bname'";
		$set.=",materials='$material'";
		$set.=",hs_code='$hscode'";
		$set.=",mode_article_num='$model'";
		$set.=",manufacturers='$manufac'";
                $set.=",other_relateditems='$related'";
		
		$set.=",packaging_details='$pack_det'";
		$set.=",shipment='$shipment'";
		$set.=",contract_period='$c_period'";
		$set.=",terms_and_policy='$terms'";
		$set.=",warranty_period='$w_period'";
		$set.=",garranty_period='$g_period'";
		$set.=",prod_crtdate='$dt'";
		$set.=",prod_expdate='$exp_time'";
		$set.=",featured='0'";
		$set.=",prod_status='0'";
		$set.=",brochure='$BrImg'";
		
		$set.=",unit_price_unit='$unit_type'";
		$set.=",prod_size_unit='$size_unit'";
		
		$set.=",prod_no='$prod_no'";
		
		
		
		
		for($i=1;$i<5;$i++){
			$P_image = isset($_FILES['photo'.$i.'']['tmp_name'])?$_FILES['photo'.$i.'']['tmp_name']:'';
			$fname = $_FILES['photo'.$i.'']['name'];
			$set.=imageupd($P_image,$fname,$userid,$i);
		}
		
		

		
		$idval=$db->insertid("insert into product set $set ");
		//echo "<script>location.href='$siteurl/manage-product?add_prd';</script>";
		//header("Location: $siteurl/manage-product?add_prd"); exit;
	}
}

function imageupd($P_image,$fname,$userid,$sno) {
	if($P_image != "" || $P_image != null) {
		$fpath = $P_image;
		$fname = $fname;
		$image_info = getimagesize($P_image);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		
		$size=filesize($P_image);
		$getext = substr(strrchr($fname, '.'), 1);
		$ext = strtolower($getext);

		if($size>2097152) { //1048576 Bytes =  MB
			echo "<br/><center style='color:red;'>Too big! image size should be lesser then 2 MB</center>"; 
			echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
			exit;
		}
		/*if($image_width<1000 || $image_height<600) { 
			 echo "<br/><center style='color:red;'>Too small! You are upload ($image_width x $image_height) image. it must be (1000 x 600) or grater..</center>"; 
			echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
			exit;
		}
		if(($image_width*3)!=($image_height*5)) { 
			 echo "<br/><center style='color:red;'>Invalid aspect ratio! Product image aspect ratio must be 5:3 <br/> Image must be (1000 x 600) or grater.. </center>"; 
			echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
			exit;
		}*/
		
		if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'bmp')
		{
			$NgImg= "Product-".$userid."-".uniqid().".".$ext;
			$img_org = "uploads/product/$NgImg";
			$img_size = "uploads/product/1000x600/$NgImg";
			move_uploaded_file($fpath,$img_org);
			$resizeObj = new resize($img_org);
			$resizeObj -> resizeImage(1000, 600, 'exact');
			$resizeObj -> saveImage($img_size, 72);
			@unlink($img_org);
			
			$setp=",photo$sno='$NgImg'";
			return $setp;
		}
		else{
		echo "<center style='color:red;'>jpg or png file will only accepted..</center>";
		echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
		}
	}
}
?>
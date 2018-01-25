<?php
if(isset($COM_submit)) {	

	$cid = isset($_SESSION['COM_id'])?$_SESSION['COM_id']:'';
	
	$COM_name=trim(addslashes($COM_name));
	$COM_store_name = isset($COM_store_name)?$COM_store_name:'';
	$COM_type=trim(addslashes($COM_type));
	$COM_country=trim(addslashes($COM_country));
	$COM_state=trim(addslashes($COM_state));
	$COM_lowner=trim(addslashes($COM_lowner));
	$COM_fb=trim(addslashes($COM_fb));
	$COM_tw=trim(addslashes($COM_tw));
	$COM_gp=trim(addslashes($COM_gp));
	$COM_fk=trim(addslashes($COM_fk));
	$COM_yt=trim(addslashes($COM_yt));
        
       //code by santosh bhosale
        $gst_no=trim(addslashes($gst_no));
         $pan_no=trim(addslashes($pan_no));
         $reg_no=trim(addslashes($reg_no));
          $reg_auth=trim(addslashes($reg_auth));
            $cin_no=trim(addslashes($cin_no));
              $tan_no=trim(addslashes($tan_no));
              $service_tax_no=trim(addslashes($service_tax_no));
            $excise_reg_no=trim(addslashes($excise_reg_no));
             $vat_no=trim(addslashes($vat_no));
              $dgft_no=trim(addslashes($dgft_no));
           $cst_no=trim(addslashes($cst_no));
              $ssimsme_no=trim(addslashes($ssimsme_no));
              $epf_no=trim(addslashes($epf_no));
              $esi_no=trim(addslashes($esi_no));
              $sct_no=trim(addslashes($sct_no));
              $dnb_no=trim(addslashes($dnb_no));
               $rbi_no=trim(addslashes($rbi_no));  
               $fssai_liscene_no=trim(addslashes($fssai_liscene_no)); 
                $nsic_no=trim(addslashes($nsic_no));  
               $sst_no=trim(addslashes($sst_no));
             $prod_portfolio=trim(addslashes($prod_portfolio));
                
                
                
                
                
	$COM_city=trim(addslashes($COM_city));
	$COM_street=trim(addslashes($COM_street));
	$COM_zip=trim(addslashes($COM_zip));
	$COM_site=trim(addslashes($COM_site));
	//$COM_ex_contries=trim(addslashes($COM_ex_contries));
	$COM_package=trim(addslashes($COM_package));
	$COM_off_size=trim(addslashes($COM_off_size));
	$COM_emps=trim(addslashes($COM_emps));
	$COM_annrev=trim(addslashes($COM_annrev));
	$COM_intro=trim(addslashes($COM_intro));
	$COM_policy=trim(addslashes($COM_policy));
	$COM_pterms=trim(addslashes($COM_terms));
	$COM_qcountrol=trim(addslashes($COM_qcountrol));
	$COM_terms=trim(addslashes($COM_terms));
	$COM_keyword=trim(addslashes($COM_keyword));
	$COM_mdesc=trim(addslashes($COM_mdesc));
	$COM_mclients=trim(addslashes($COM_mclients));
	$COM_mproduct=trim(addslashes($COM_mproduct));
	$COM_bproduct=trim(addslashes($COM_bproduct));
	$COM_mproduct1=trim(addslashes($COM_mproduct1));
	$COM_mproduct2=trim(addslashes($COM_mproduct2));
	$COM_mproduct3=trim(addslashes($COM_mproduct3));
	$COM_mproduct4=trim(addslashes($COM_mproduct4));
	$COM_oproducts=trim(addslashes($COM_oproducts));
	$COM_production_limit=trim(addslashes($COM_production_limit));
	$COM_factory_loc=trim(addslashes($COM_factory_loc));
	$COM_factory_size=trim(addslashes($COM_factory_size));
	$COM_lead_time=trim(addslashes($COM_lead_time));
	$COM_near_port=trim(addslashes($COM_near_port));
	$COM_percentage=trim(addslashes($COM_percentage));
	$COM_acpt_order = trim(addslashes($COM_acpt_order));
	$COM_trade_show = trim(addslashes($COM_trade_show));
	$COM_an_sales = trim(addslashes($COM_an_sales));
	
	//$old_ad_currency = isset($COM['ap_currency'])?$COM['ap_currency']:'';
	//$COM_ap_currency = trim(addslashes($COM_ap_currency));
	$COM_ap_currencys=@implode(",",$COM_ap_currency);
	//$COM_ap_currencys = $old_ad_currency.",".$COM_ap_currencys;
	
	//$old_ad_terms = isset($COM['ad_terms'])?$COM['ad_terms']:'';
	//$COM_ad_terms = trim(addslashes($COM_ad_terms));
	$COM_ad_term=@implode(",",$COM_ad_terms);
	//$COM_ad_term = $old_ad_terms.",".$COM_ad_term;
	
	//$old_pay = isset($COM['payment_mths'])?$COM['payment_mths']:'';
	$COM_pay_methods=@implode(",",$COM_pay_method);
	//$COM_pay_methods = substr($COM_pay_methods,1,strlen($COM_pay_methods));
	//$COM_pay_methods = $old_pay.",".$COM_pay_methods;
	
	//$old_ex = isset($COM['export_markets'])?$COM['export_markets']:'';
	$COM_exmarkets = @implode(",",$COM_exmarket);
	//$COM_exmarkets = substr($COM_exmarkets,1,strlen($COM_exmarkets));
	//$COM_exmarkets = $old_ex.",".$COM_exmarkets; 
	
	//$COM_language = trim(addslashes($COM_language));
	//$old_language = isset($COM['language'])?$COM['language']:'';	
	$COM_languages=@implode(",",$COM_language);
	//$COM_languages = $old_language.",".$COM_languages;	
	
	//$COM_certificate = trim(addslashes($COM_certificate));
	//$old_certificate = isset($COM['certification'])?$COM['certification']:'';	
	$COM_certificates=@implode(",",$COM_certificate);
	//$COM_certificates = $old_certificate.",".$COM_certificates;
	
	$COM_buss_group = trim(addslashes($COM_buss_group));
	//$COM_cat_title = trim(addslashes($COM_cat_title));
	$COM_start_yr=date("Y-m-d",strtotime($COM_start_yr));
	$COM_rdate=date("Y-m-d",strtotime($COM_rdate));
	$COM_compliances=@join(",",$COM_compliance);
	$COM_btypes=@join(",",$COM_btype);
	$COM_cat = @join(",",$COM_cat);
	$dt=date("Y-m-d H:i:s");
	
	$set="user_id='$user_id'";
	$set.=",name='$COM_name'";
	$set.=",store_name='$COM_store_name'";
	$set.=",type='$COM_type'";
	$set.=",country='$COM_country'";
	$set.=",state='$COM_state'";
	$set.=",legal_owner_name='$COM_lowner'";
	$set.=",business_type='$COM_btypes'";
	$set.=",facebook='$COM_fb'";
	$set.=",twitter='$COM_tw'";
	$set.=",gplus='$COM_gp'";
	$set.=",youtube='$COM_yt'";
	$set.=",flickr='$COM_fk'";
        //code by santosh bhosale
        $set.=",gst_no='$gst_no'";
        $set.=",pan_no='$pan_no'";
         $set.=",reg_no='$reg_no'";
        
         $set.=",reg_auth='$reg_auth'";
         $set.=",cin_no='$cin_no'";
         $set.=",tan_no='$tan_no'";
          $set.=",service_tax_no='$service_tax_no'";
          $set.=",excise_reg_no='$excise_reg_no'";
            $set.=",vat_no='$vat_no'";
             $set.=",dgft_no='$dgft_no'";
             $set.=",cst_no='$cst_no'";
              $set.=",ssimsme_no='$ssimsme_no'";
               $set.=",epf_no='$epf_no'";
               $set.=",esi_no='$esi_no'";
               $set.=",sct_no='$sct_no'";
                $set.=",dnb_no='$dnb_no'";   
               $set.=",rbi_no='$rbi_no'"; 
                $set.=",fssai_liscene_no='$fssai_liscene_no'";  
                   $set.=",nsic_no='$nsic_no'";  
                   $set.=",sst_no='$sst_no'";  
              $set.=",prod_portfolio='$prod_portfolio'";  
         
	$set.=",street='$COM_street'";
	$set.=",city='$COM_city'";
	$set.=",zip_code='$COM_zip'";
	$set.=",website='$COM_site'";
	//$set.=",export_countries='$COM_ex_contries'";
	$set.=",package_det='$COM_package'";
	$set.=",office_size='$COM_off_size'";
	$set.=",start_date='$COM_start_yr'";
	$set.=",emp_count='$COM_emps'";
	$set.=",ann_revenue='$COM_annrev'";
	$set.=",export_markets='$COM_exmarkets'";
	$set.=",company_intro='$COM_intro'";
	$set.=",company_policy='$COM_policy'";
	$set.=",payment_terms='$COM_pterms'";
	$set.=",qc_policy='$COM_qcountrol'";
	$set.=",terms_con='$COM_terms'";
	$set.=",close_keyword='$COM_keyword'";
	$set.=",meta_desc='$COM_mdesc'";
	$set.=",main_clients='$COM_mclients'";
	$set.=",registration_date='$COM_rdate'";
	$set.=",major_product_sell='$COM_mproduct'";
	$set.=",major_product_buy='$COM_bproduct'";
	$set.=",main_product1='$COM_mproduct1'";
	$set.=",main_product2='$COM_mproduct2'";
	$set.=",main_product3='$COM_mproduct3'";
	$set.=",main_product4='$COM_mproduct4'";
	$set.=",other_product='$COM_oproducts'";
	$set.=",production_capacity	='$COM_production_limit'";
	$set.=",factory_location='$COM_factory_loc'";
	$set.=",factory_size='$COM_factory_size'";
	$set.=",avg_lead_time='$COM_lead_time'";
	$set.=",nearest_port='$COM_near_port'";
	$set.=",compliance='$COM_compliances'";
	$set.=",ex_percentage='$COM_percentage'";
	$set.=",acpt_order='$COM_acpt_order'";
	$set.=",trade_show	='$COM_trade_show'";
	$set.=",annual_sales='$COM_an_sales'";
	$set.=",ap_currency='$COM_ap_currencys'";
	$set.=",ad_terms='$COM_ad_term'";
	$set.=",payment_mths='$COM_pay_methods'";
	$set.=",language='$COM_languages'";
	$set.=",certification='$COM_certificates'";
	$set.=",buss_group='$COM_buss_group'";
	$set.=",category='$COM_cat'";
	//$set.=",category_title='$COM_cat_title'";
	
	if($cid!=''){
		$set.=",change_date='$dt'";		
		$acn = 'update';
	}else{
		$set.=",create_date='$dt'";	
		$acn = 'new';
	}
	
		$NgImg=$user_id;
		
		$isUploaded = $com_obj->upload_image('COM_logo',$NgImg,200,200,1,1,"uploads/company/logo/",$acn);
		
		if($isUploaded){
			$iname = $com_obj->img_Name;
			$set.=",logo='$iname'";
		}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
		
		$NgImg=$user_id;
		$isUploaded = $com_obj->upload_image('COM_avatar',$NgImg,300,300,1,1,"uploads/company/avatar/",$acn);
		
		if($isUploaded){
			$iname = $com_obj->img_Name;	
			$set.=",avatar='$iname'";
		}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
		
		$NgImg=$user_id;
		$isUploaded = $com_obj->upload_image('COM_banner',$NgImg,1000,600,5,3,"uploads/company/banner/",$acn);
		
		if($isUploaded){
			$iname = $com_obj->img_Name;	
			$set.=",banner='$iname'";
		}else{
			if($acn!='update'){
				echo $com_obj->img_Err; exit;	
			}
		}
	
	if($cid!=''){
		$_SESSION['COM_id']='';
		$db->insertrec("update company set $set where id='$cid'");	
		echo "<script>location.href='manage-company.php';</script>";
		header('location:manage-company.php');
	}else{
		$db->insertrec("insert into company set $set");
		echo "<script>location.href='manage-company.php';</script>";
		header('location:manage-company.php');
	}
	
}

?>
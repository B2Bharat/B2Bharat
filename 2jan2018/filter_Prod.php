<?

$view=isset($view)?$view:'';
$Main_Srch=isset($Main_Srch)?$Main_Srch:'';
$filter_Prod=isset($filter_Prod)?$filter_Prod:'';
$MS_SCateg=isset($MS_SCateg)?$MS_SCateg:'';
$MS_Country=isset($MS_Country)?$MS_Country:'';
$MS_Key=isset($MS_Key)?$MS_Key:'';
$que="select a.id,a.prod_no,a.userid,a.prod_briefdes,a.prod_minprice,a.prod_expdate,a.prod_crtdate,a.max_supply_quantity,a.prod_category,a.prod_group_name,a.prod_name,a.photo1,a.featured,a.prod_status,a.permalink,a.prod_currency_loc from product as a inner join register as b on a.userid=b.id inner join category as c on c.id=a.prod_category where a.prod_status='1'";
if(!empty($Main_Srch)){
	
	$MS_Categ=$db->escapstr($MS_Categ);
	$MS_SCateg=$db->escapstr($MS_SCateg);
	$MS_Country=$db->escapstr($MS_Country);
	$MS_Key=$db->escapstr($MS_Key);
	
	if(empty($MS_Categ) && empty($MS_SCateg))
	{
		if($MS_Categ !=""){
			$getparntid=$db->singlerec("select category_name from category where id='$MS_Categ'");
			$parntNam=$getparntid['category_name'];
			$parntid=$db->Extract_Single("select id from category where category_name='$parntNam'");
			$que.=" and find_in_set(a.prod_category,'$parntid')";
		}
		if($MS_SCateg !="")
			$que.=" and a.prod_subcategory='$MS_SCateg'";
		if($MS_Country !="") 
			$que.=" and b.country='$MS_Country'";
		if($MS_Key !="")
			$que.=" and (a.prod_group_name like '%$MS_Key%' or a.prod_name like '%$MS_Key%' or a.keyword1 like '%$MS_Key%' or a.keyword2 like '%$MS_Key%' or a.keyword3 like '%$MS_Key%' or a.keyword4 like '%$MS_Key%')";
		
		
		$que_company="SELECT `id`,`name`,`store_name`,`legal_owner_name`,`phone`,`mobile`,`street`,`city`,`website`,`company_intro`,`logo` FROM company where store_name like '%$MS_Key%' and `active_status`=1";
		
		$que_supliyer="SELECT `name`,`store_name`,`legal_owner_name`,`phone`,`mobile`,`street`,`city`,`website`,`company_intro`,`logo` FROM company where store_name like '%$MS_Key%'   and (`type`='seller' or `type`='both') and `active_status`=1 ";
		
		$que_byer="SELECT 	`id`, `name`,`store_name`,`legal_owner_name`,`phone`,`mobile`,`street`,`city`,`website`,`company_intro`,`logo` FROM company where store_name like '%$MS_Key%'   and (`type`='buyer' or `type`='both') and `active_status`=1 ";
		
		
		$que_byleads="select `id`,`offer_name`,`subject`,`country`,`photo1`,`price`,`currency`,`keyword1`,`keyword2`,`keyword3`,`keyword4`,`det_desc`,`delivery_time`,`valid_until`,`maxbuy_capacity`,`exquantity`,`contact_desc`,`post_date` from `buying_leads` where `active_status`='1' and `offer_name` like '%$MS_Key%' or `keyword1` like '%$MS_Key%' or `keyword2` like '%$MS_Key%' or `keyword3` like '%$MS_Key%' or `keyword4` like '%$MS_Key%' ";
		
		$que_sellingleads="select `id`,`offer_name`,`subject`,`photo1`,`base_price`,`currency`,`keyword1`,`keyword2`,`keyword3`,`keyword4`,`brief_description`,`delivery_time`,`valid_until`,`post_date`,`pay_method`,`min_order_quantity` from `selling_leads` where `active_status`='1' and `offer_name` like '%$MS_Key%' or `keyword1` like '%$MS_Key%' or `keyword2` like '%$MS_Key%' or `keyword3` like '%$MS_Key%' or `keyword4` like '%$MS_Key%' ";
		
		
	}
	else
	{
	
		if($MS_Categ !=""){
			$getparntid=$db->singlerec("select category_name from category where id='$MS_Categ'");
			$parntNam=$getparntid['category_name'];
			$parntid=$db->Extract_Single("select id from category where category_name='$parntNam'");
			$que.=" and find_in_set(a.prod_category,'$parntid')";
		}
		if($MS_SCateg !="")
			$que.=" and a.prod_subcategory='$MS_SCateg'";
		if($MS_Country !="") 
			$que.=" and b.country='$MS_Country'";
		if($MS_Key !="")
			$que.=" and (a.prod_name like '%$MS_Key%' or a.keyword1 like '%$MS_Key%' or a.keyword2 like '%$MS_Key%' or a.keyword3 like '%$MS_Key%' or a.keyword4 like '%$MS_Key%')";
	}
}
elseif(!empty($filter_Prod)){
	
	$pr_Name=$db->escapstr($pr_Name);
	$pr_Memname=$db->escapstr($pr_Memname);
	$pr_Key=$db->escapstr($pr_Key);
	$pr_Desc=$db->escapstr($pr_Desc);
	$pr_Publish=$db->escapstr($pr_Publish);
	$pr_Featured=$db->escapstr($pr_Featured);
	$pr_Cat=$db->escapstr($pr_Cat);
	$pr_Country=$db->escapstr($pr_Country);
	$pr_Range=$db->escapstr($pr_Range);
	$pr_Price=$db->escapstr($pr_Price);
	if($pr_Name!="")
		$que.=" and a.prod_name like '%$pr_Name%'";
	if($pr_Memname!="")
		$que.=" and b.fname like '%$pr_Memname%'";
	if($pr_Key!="")
		$que.=" and a.keyword1 like '%$pr_Key%' or a.keyword2 like '%$pr_Key%' or a.keyword3 like '%$pr_Key%' or a.keyword4 like '%$pr_Key%'";
	if($pr_Desc!="")
		$que.=" and a.prod_briefdes like '%$pr_Desc%'";
	if($pr_Publish!="")
		$que.=" and a.publish='$pr_Publish'";
	if($pr_Featured!="")
		$que.=" and a.featured='$pr_Featured'";
	if($pr_Cat!="")
		$que.=" and a.prod_category='$pr_Cat'";
	if($pr_Country!="")
		$que.=" and b.country='$pr_Country'";
	if($pr_Range!="" && $pr_Price!="") {
		if($pr_Range=='equal') $que.=" and a.prod_minprice = '$pr_Price'";
		if($pr_Range=='min') $que.=" and a.prod_minprice >= '$pr_Price' order by a.prod_minprice desc";
		if($pr_Range=='max') $que.=" and a.prod_minprice <= '$pr_Price' order by a.prod_minprice desc";
	}
	else $que.=" order by a.viewcount desc";
}
else if(isset($mccat)!=""){
	$mccat=$db->escapstr($mccat);
	$mccat = str_replace('-',' ',$mccat);
	$que .=" and c.category_name like '%$mccat%'";
	if(isset($sccat)!="") {
		$sccat = $db->escapstr($sccat);
		$sccat = str_replace('-',' ',$sccat);
		$que.=" OR c.category_name like '%$sccat%'";
	}
	$que .=" order by a.viewcount desc";
}
else if($view=="featured"){
	$que .="and a.featured = '1' order by a.featured desc";
}
else if($view=="new"){
	$que .="order by a.id desc";
}
else if($view=="best"){
	 $que .="order by a.featured desc";
}
?>
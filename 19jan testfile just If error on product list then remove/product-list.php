 <?
$tpTitle = 'Product-list | Search all types of buyers and suppliers product list';
$pgDesc = 'Online business directory for industrial paints, Industrial Fabrication, Storage Tanks, Heavy Fabrication, Welding Equiepments, Manufacturing Plants, Rubber and Plastic.';
$pgKeywords = 'Agricultural, Food Machinery, Apparel and Garments, Arts and Handicrafts, Automobile and parts, Ayurved,Books and Stationery, Office Supplies, Chemicals and Solvents, Construction plant and machinery, Electricales and Electronics, Furniture, Health and Medical, Industrial Fabrication, Jewellery and Gems Stone, Machine Tools and Hardware, Manufacturing Plant and Machinery, Metals, Mineral and Energy, Packaging Goods and Machinery, Paper, Rubber and Plastic, Safety product, Security and Protection Equipment, Services, Sports, Toys and Fitness Equipment, Textile and Furnishing.';

include "header.php";
include "include/searchDiv.php";
include "filter_Prod.php";

$poff = isset($poff)?$com_obj->decid(addslashes($poff)):'';
if($poff!=''){
	$que = "select * from product where userid='$poff'";
	$userid=$poff;
}

include "pagination.php";
$rowsPerPage=$Prod_RecPerPage;
$limit=limitation(15);

if((!isset($_POST['MS_Categ'])) && (!isset($_POST['MS_SCateg'])) && (isset($_POST['Main_Srch'])))
{
	
	
	?>

	
       <div class="container">
	   <!-- accordion-->
	            <div class="secwrp_holder">
					<div class="col-md-12 col-sm-12">
					    <?if($poff==''){?><div class="row">
						<div class="well">
						<form action="<? echo $siteurl; ?>/product-list" method="post" role="form">
					      <div class="form-group form-btm model-name">
                      
                            <input type="text" name="pr_Name" class="form-control form-height" value="<? echo @$pr_Name; ?>" placeholder="Name of Product">
                          </div>
						  
						  <?php /*?><div class="form-group form-btm model-name">
                            
                            <input type="text" name="pr_Memname" class="form-control form-height" value="<? echo @$pr_Memname; ?>" placeholder="Refine by Member Names">
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            
                            <input type="text" name="pr_Key" class="form-control form-height" value="<? echo @$pr_Key; ?>" placeholder="Refine by Keywords">
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            
                            <input type="text" name="pr_Desc" class="form-control form-height" value="<? echo @$pr_Desc; ?>" placeholder="Refine by Description">
                          </div>
						  
						 
						  
						  <div class="form-group form-btm model-name">
                
                            <select class="form-control form-height" name="pr_Publish">
                                <option value="">Hidden or Lives Listings</option>
                                <option value="1">Live Listing Only</option>
                                <option value="0">Hidden Listing Only</option>
                              </select>
                          </div>
						  
						  <div class="form-group form-btm model-name unfeat">
                            
                            <select class="form-control form-height" name="pr_Featured">
                                <option value="">Featured and Unfeatured</option>
                                <option value="1">Featured Listing Only</option>
                                <option value="0">General Listing Only</option>
                              </select>
                          </div>
						
						  
						  <div class="form-group form-btm model-name refinerr">
                            
                            <select class="form-control form-height" name="pr_Cat">
                                <option value="">Refine by Category</option>
								<?
								$pr_Cat = isset($pr_Cat)?$pr_Cat:'';
								echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0' and dis_status='1'",$pr_Cat);
								?>
                              </select>
                          </div>
						  <?php */?>
						  <div class="form-group form-btm model-name countryselectcl">
                           
                            <select class="form-control form-height" name="pr_Country">
                                <option value="">Refine by Country</option>
								<?
								$pr_Country = isset($pr_Country)?$pr_Country:'';
								echo $drop->get_dropdown($db,"select nicename,nicename from countries order by id",$pr_Country);
								?>
                              </select>
                          </div>
						  
						  <div class="form-group model-name rangemod">

                            
							
							<select class="form-control form-height" name="pr_Range">
							    <? $pr_Range=isset($pr_Range)?$pr_Range:''; ?>
                                <option value="equal" <? if($pr_Range=="equal") echo "selected"; ?>>Price Equal To-></option>
                                <option value="min" <? if($pr_Range=="min") echo "selected"; ?>>Minimum</option>
								<option value="max" <? if($pr_Range=="max") echo "selected"; ?>>Maximum</option>
                              </select>
							</div>  
							
							<div class="form-group form-btm model-name pricemod">  
							   <input type="text" name="pr_Price" placeholder="Enter Price Range" class="form-control form-height" value="<? echo @$pr_Price; ?>">
							
						    </div>
							
                          
						  
						  <div class="form-group form-btm text-center model-name filmod">
						     <button type="submit" name="filter_Prod" class="btn view-more-btn-3">Filter</button>
						  </div>
						  </form>
						  
						  
                        </div>
						
						
						
						</div>
						<?}?>
						</div>
				 </div>
        <div class="row">
		
	<?
					/* added by abhishek kandari	--start*/
						$que = ltrim(trim($que), "select ");
						$que = 'select b.website,'. $que;
						/* added by abhishek kandari	--end*/
						$prod_Lst=$db->get_all_asso($que . $limit);
							if(!empty($prod_Lst)) {?>
							
							 <div class="featured_title_sec">
            <h2>Products</h2>
          </div>
							<?php
								
							
						foreach($prod_Lst as $prd){
							// check is the user is existe in db start
							/* added by abhishek kandari	--start*/
							$ownerweburl = $prd['website'];
							if(!empty($ownerweburl))
							{$ownerweburl = empty(parse_url($prd['website'])['scheme']) ? 'http://' . ltrim($prd['website'], '/') : $prd['website'];}
							/* added by abhishek kandari	--end*/
							$isThereC = $db->singlerec("select count(*) from company where user_id = '".$prd['userid']."'");
							$isThereR = $db->singlerec("select count(*) from register where id = '".$prd['userid']."'");
							if((int)$isThereC[0]===0  || (int)$isThereR[0]===0){continue;}	
							//end
								
							/* $prc=explode('/', $prd['prod_minprice']);
							$price=$prc[0]; */
							
							$ccode = $db->singlerec("select currencycode from currency_code where id ='".$prd['prod_currency_loc']."' LIMIT 1");
                                                        var_dump($ccode);
							$price=$prd['prod_minprice'];
							if($price)
								$price=$price.' '.$ccode[0];
							else
								$price="&nbsp;";
							
							$exp_dt=date("d/m/Y", strtotime($prd['prod_expdate']));
							$post_dt=date("d M Y", strtotime($prd['prod_crtdate']));
							$bcap=explode('/', $prd['max_supply_quantity']);
							$b_cap=$bcap[0];
							if($b_cap=="") $b_cap="None Specified";
							$fcat=$db->singlerec("select category_name from category where id='".$prd['prod_category']."'");
							$cat=ucwords($fcat['category_name']);
							$pname=ucwords($prd['prod_name']);
                                                        $unit_price=ucwords($prd['unit_price']);
                                                        
                                                    
							var_dump($pname);
							if(41<(strlen($pname)))
								$pname=substr($pname,0,42)."...";
							
							$encid=$com_obj->encid($prd['id']);
							$perma=strtolower(str_replace(" ", "-", $prd['prod_name']));
							
							$mem_pack = $db->singlerec("select mem_pack from register where id='".$prd['userid']."'");
							$mem_pack_name = $db->singlerec("select name from membership where id = '".$mem_pack[0]."'");
							
							$country = $db->singlerec("select * from register where id = '".$prd['userid']."'");
                                                        
							
							$prod_no=$prd['prod_no'];
	

?>

		<div class="col-md-4 product_sec">    
			<div class="prd_wrapper">
			   <div class="col-md-6 pr_img">
					<h2><a target="_blank" href="<? if(!empty($ownerweburl)) {echo $ownerweburl;}else{ 
					echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perma; }?>"><? echo substr($pname,0,15); ?></a></h2>
                               <a href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perma; ?>" style="border-color:red; "><img src="<? echo $siteurl; ?>/uploads/product/1000x600/<? echo $prd['photo1']; ?>" alt="<? echo $pname;//$name; ?>" class="img-responsive" ></a>
			   </div>
			   <div class="col-md-6 pr_descript">
				 <p><? echo substr($prd['prod_briefdes'],0,120).'...'; ?> </p>
			   </div>
			 
		   <div class="en_wrap" >
				<div class="col-md-7 enqiry_sec">
					<h3><? echo $country['company_name']; ?></h3>
					<p><? echo $country['address']; ?></p>
					<span><i class="fa fa-phone" aria-hidden="true"></i><? echo $country['mobile']; ?></span>		
				</div>
				<div class="col-md-5 cta_en">
					<button onclick="setToemail('<?echo $country['email'];?>','<?echo ucfirst($country['fname']);?>');" class="btn" data-toggle="modal" data-target="#send-an-inquiry" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                           Send Enquiry</button>
				</div>
			</div>
                            </div>   
		</div>	
	
		
<?
  }
							}
  
 
  
  $compa_Lst=$db->get_all_asso($que_company . $limit);
  
if(!empty($compa_Lst))
{?>
<div class="featured_title_sec">
            <h2>Companies</h2>
          </div>
<?php
 foreach($compa_Lst as $cinfo){
						
						if(file_exists("uploads/company/logo/".$cinfo['logo'])){
						$logourl =  "$siteurl/uploads/company/logo/".$cinfo['logo'];	
						}else{
						$logourl =  "$siteurl/uploads/company/logo/noimage.jpg";
						}
						$bizz_types = explode(',',$cinfo['business_type']);
						$bizzs = array();
						foreach($bizz_types as $bz){
							$biz = $db->singlerec("select business_name from business_type where id = '$bz'");
						   array_push($bizzs,ucfirst($biz[0]));	
						}
						$biz_type = implode(' , ',$bizzs);
						$mem_pack = $db->singlerec("select mem_pack from register where id='".$cinfo['user_id']."'");
						$mem_pack_name = $db->singlerec("select name from membership where id = '".$mem_pack[0]."'");
						$country = $db->singlerec("select nicename from countries where id = '".$cinfo['country']."'");
						$cemail = $db->singlerec("select email,fname from register where id = '".$cinfo['user_id']."'");
	?>
<div class="col-md-4 product_sec companylist">    
			<div class="prd_wrapper">
			
			   <div class="col-md-6 pr_img">
					<h2><a href="<?echo $siteurl;?>/company-detail/<?echo strtolower(str_replace(' ','-',$cinfo['name']));?>/<?echo $com_obj->encid($cinfo['id']);?>"><?echo ucfirst($cinfo['name']);?></a></h2>
					 <a href="<?echo $siteurl;?>/company-detail/<?echo strtolower(str_replace(' ','-',$cinfo['name']));?>/<?echo $com_obj->encid($cinfo['id']);?>"><img src="<?echo $logourl;?>" alt="Image" class="img-responsive"></a>
			   </div>
			   <div class="col-md-6 pr_descript">
				 <p><?echo (strlen($cinfo['company_intro'])>200)?substr($cinfo['company_intro'],0,170).'...':ucfirst($cinfo['company_intro']);?> </p>
			   </div>
			</div>    
		   <div class="en_wrap">
				<div class="col-md-7 enqiry_sec">
					<h3><? echo $cinfo['store_name']; ?></h3>
					<p><? echo $cinfo['street']; ?></p>
					<span><i class="fa fa-phone" aria-hidden="true"></i><? echo $cinfo['mobile']; ?></span>		
				</div>
				<div class="col-md-5 cta_en">
					 <button onclick="setToemail('<?echo $cemail[0];?>','<?echo ucfirst($cemail[1]);?>');" class="btn view-more-btn-2-2 ml20" data-toggle="modal" data-target="#send-an-inquiry"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>   Send An Enquiry </button>
				</div>
			</div>
		</div>	

<?php 	
  
  
  
  
  
 }
}
  
  
  

$BL_all=$db->get_all_asso($que_byleads.$limit);


if(!empty($BL_all))
{?>
	<div class="featured_title_sec">
            <h2>Buying Leads</h2>
          </div>
	
<?php 
foreach($BL_all as $BL)
 {
		$BL_img = !empty($BL['photo1'])?$BL['photo1']:'noimage.jpg';
				
				if(file_exists("uploads/BL_images/banner1/$BL_img")){
				$logourl =  "$siteurl/uploads/BL_images/banner1/$BL_img";	
				}else{
				$logourl =  "$siteurl/uploads/BL_images/banner1/noimage.jpg";
				}	

				$ccode = $db->singlerec("select currencycode from currency_code where id ='".$BL['currency']."'");
				$price=$BL['price'];
			
				$perm=str_replace(" ", "-", $BL['offer_name']);
				$perm=strtolower($perm);
				$cat=$BL['category_name'];
				$mem_pack_name = $db->singlerec("select name from membership where id = '".$BL['mem_pack']."'");;
				$country_name = $db->singlerec("select nicename from countries where id='".$BL['country']."'");





?>
<div class="col-md-4 product_sec byuinglist">    
			<div class="prd_wrapper">
			
			   <div class="col-md-6 pr_img">
					<h2><a href="<? echo $siteurl; ?>/buying-leads-detail/<? echo $perm; ?>/<? echo $com_obj->encid($BL['id']); ?>"><?echo ($BL['offer_name']>15)?ucfirst(substr($BL['offer_name'],0,16).'...'):$BL['offer_name'];?></a></h2>
					
					
					
					 <a href="<? echo $siteurl; ?>/buying-leads-detail/<? echo $perm; ?>/<? echo $com_obj->encid($BL['id']); ?>"><img src="<?echo $logourl;?>" alt="Image" class="img-responsive"></a>
			   </div>
			   <div class="col-md-6 pr_descript">
				 <p><?echo substr($BL['det_desc'],0,175).'...';?> </p>
			   </div>
			</div>    
		   <div class="en_wrap">
				<div class="col-md-7 enqiry_sec">
					<h3><? echo $BL['subject']; ?></h3>
					<p><? echo $country_name; ?></p>
					<span></span>		
				</div>
				<div class="col-md-5 cta_en">
					 <button onclick="setToemail('<?echo $country[1];?>','<?echo ucfirst($country[1]);?>');" class="btn view-more-btn-2-2 ml20" data-toggle="modal" data-target="#send-an-inquiry"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send An Enquiry </button>
				</div>
			</div>
		</div>	


<?php

 }


}
  
  
  
  $SL_Lst=$db->get_all_asso($que_sellingleads.$limit);


if(!empty($SL_Lst))
{?>
	<div class="featured_title_sec">
            <h2>Selling Leads</h2>
          </div>
	
<?php 
foreach($SL_Lst as $SL) {
					
					
					
					if(file_exists("uploads/SL_images/banner1/".$SL['photo1'])){
							$logourl =  "$siteurl/uploads/SL_images/banner1/".$SL['photo1'];	
						}else{
							$logourl =  "$siteurl/uploads/SL_images/banner1/noimage.jpg";
						}
					
				//echo $SL['id'];
				$ccode = $db->singlerec("select currencycode from currency_code where id ='".$SL['currency']."'");
				$price=$SL['base_price'];
				if($price)
					$price=$price.' '.$ccode[0];
				else
					$price="&nbsp;";
				
				$des=substr($SL['brief_description'],0,175);
				$durat=$SL['delivery_time'];
				$payt = substr($SL['pay_method'],0,11).'..';
				$key=$SL['keyword1'].','.$SL['keyword2'].','.$SL['keyword1'].','.$SL['keyword3'].','.$SL['keyword4'];
				$mem_pack_name = $db->singlerec("select name from membership where id = '".$SL['mem_pack']."'");




?>
<div class="col-md-4 product_sec sellinglist">    
			<div class="prd_wrapper">
			
			   <div class="col-md-6 pr_img">
					<h2><a href="<?echo $siteurl;?>/selling-leads-detail/<?echo strtolower(str_replace(' ','-',$SL['offer_name']));?>/<?echo $com_obj->encid($SL['id']);?>"><? echo ucwords($SL['offer_name']); ?></a></h2>
					
					
					
					 <a href="<?echo $siteurl;?>/selling-leads-detail/<?echo strtolower(str_replace(' ','-',$SL['offer_name']));?>/<?echo $com_obj->encid($SL['id']);?>"><img src="<?echo $logourl;?>" alt="Image" class="img-responsive"></a>
			   </div>
			   <div class="col-md-6 pr_descript">
				 <p><?echo $des.'...';?> </p>
			   </div>
			</div>    
		   <div class="en_wrap">
				<div class="col-md-7 enqiry_sec">
					<h3><? echo $SL['subject']; ?></h3>
					<p><? echo $mem_pack_name; ?></p>
					<span></span>		
				</div>
				<?php 
		$country=$db->singlerec("select nicename,nicename from countries order by id");
		?>	
				<div class="col-md-5 cta_en">
					 	<button onclick="setToemail('<?echo $country[1];?>','<?echo ucfirst($country[1]);?>');" class="btn view-more-btn-2-1 ml20" data-toggle="modal" data-target="#send-an-inquiry"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send An Enquiry </button>
				</div>
			</div>
		</div>	


<?php

 }


}
  
  
  
  
  
  
  
  
  
  
  
?>
  </div>
</div>
		
	
	
	
<?php }
elseif(isset($_POST['Main_Srch']))
{
	?>
       <div class="container" >
	   <!-- accordion-->
	            <div class="secwrp_holder">
					<div class="col-md-12 col-sm-12">
					    <?if($poff==''){?><div class="row">
						<div class="well">
						<form action="<? echo $siteurl; ?>/product-list" method="post" role="form">
					      <div class="form-group form-btm model-name">
                      
                            <input type="text" name="pr_Name" class="form-control form-height" value="<? echo @$pr_Name; ?>" placeholder="Name of Product">
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            
                            <input type="text" name="pr_Memname" class="form-control form-height" value="<? echo @$pr_Memname; ?>" placeholder="Refine by Member Names">
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            
                            <input type="text" name="pr_Key" class="form-control form-height" value="<? echo @$pr_Key; ?>" placeholder="Refine by Keywords">
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            
                            <input type="text" name="pr_Desc" class="form-control form-height" value="<? echo @$pr_Desc; ?>" placeholder="Refine by Description">
                          </div>
						  
						  <!--<div class="form-group form-btm model-name">
                            <label class="label-title">Package Name</label>
                            <select class="form-control form-height">
                                <option>Any</option>
                                <option>premium 1</option>
                                <option>premium 2</option>
                              </select>
                          </div>-->
						  
						  <div class="form-group form-btm model-name">
                
                            <select class="form-control form-height" name="pr_Publish">
                                <option value="">Hidden or Lives Listings</option>
                                <option value="1">Live Listing Only</option>
                                <option value="0">Hidden Listing Only</option>
                              </select>
                          </div>
						  
						  <div class="form-group form-btm model-name unfeat">
                            
                            <select class="form-control form-height" name="pr_Featured">
                                <option value="">Featured and Unfeatured</option>
                                <option value="1">Featured Listing Only</option>
                                <option value="0">General Listing Only</option>
                              </select>
                          </div>
						  
						  <!--<div class="form-group form-btm model-name">
                            <label class="label-title">Business Type</label>
                            <select class="form-control form-height">
                                <option>Any</option>
                                <option>Featured Listing Only</option>
                                <option>General Listing Only</option>
                              </select>
                          </div>-->
						  
						  <div class="form-group form-btm model-name refinerr">
                            
                            <select class="form-control form-height" name="pr_Cat">
                                <option value="">Refine by Category</option>
								<?
								$pr_Cat = isset($pr_Cat)?$pr_Cat:'';
								echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0' and dis_status='1'",$pr_Cat);
								?>
                              </select>
                          </div>
						  
						  <div class="form-group form-btm model-name countryselectcl">
                           
                            <select class="form-control form-height" name="pr_Country">
                                <option value="">Refine by Country</option>
								<?
								$pr_Country = isset($pr_Country)?$pr_Country:'';
								echo $drop->get_dropdown($db,"select nicename,nicename from countries order by id",$pr_Country);
								?>
                              </select>
                          </div>
						  
						  <div class="form-group model-name rangemod">

                            
							
							<select class="form-control form-height" name="pr_Range">
							    <? $pr_Range=isset($pr_Range)?$pr_Range:''; ?>
                                <option value="equal" <? if($pr_Range=="equal") echo "selected"; ?>>Price Equal To-></option>
                                <option value="min" <? if($pr_Range=="min") echo "selected"; ?>>Minimum</option>
								<option value="max" <? if($pr_Range=="max") echo "selected"; ?>>Maximum</option>
                              </select>
							</div>  
							
							<div class="form-group form-btm model-name pricemod">  
							   <input type="text" name="pr_Price" placeholder="Enter Price Range" class="form-control form-height" value="<? echo @$pr_Price; ?>">
							
						    </div>
							
                          
						  
						  <div class="form-group form-btm text-center model-name filmod">
						     <button type="submit" name="filter_Prod" class="btn view-more-btn-3">Filter</button>
						  </div>
						  </form>
						  
						  
                        </div>
						
						
						
						</div>
						<?}?>
						</div>
				 </div>
        <div class="row">
	<?

						$prod_Lst=$db->get_all_asso($que . $limit);

							if(empty($prod_Lst)) {
								echo "<hr><center><h3>No records found..!!</h3></center><hr>";
							}
						foreach($prod_Lst as $prd){
							// check is the user is existe in db start
							$isThereC = $db->singlerec("select count(*) from company where user_id = '".$prd['userid']."'");
							$isThereR = $db->singlerec("select count(*) from register where id = '".$prd['userid']."'");
							if((int)$isThereC[0]===0  || (int)$isThereR[0]===0){continue;}	
							//end
								
							/* $prc=explode('/', $prd['prod_minprice']);
							$price=$prc[0]; */
							
							$ccode = $db->singlerec("select currencycode from currency_code where id ='".$prd['prod_currency_loc']."' LIMIT 1");
							$price=$prd['prod_minprice'];
							if($price)
								$price=$price.' '.$ccode[0];
							else
								$price="&nbsp;";
							
							$exp_dt=date("d/m/Y", strtotime($prd['prod_expdate']));
							$post_dt=date("d M Y", strtotime($prd['prod_crtdate']));
							$bcap=explode('/', $prd['max_supply_quantity']);
							$b_cap=$bcap[0];
							if($b_cap=="") $b_cap="None Specified";
							$fcat=$db->singlerec("select category_name from category where id='".$prd['prod_category']."'");
							$cat=ucwords($fcat['category_name']);
							$pname=ucwords($prd['prod_name']);
							if(41<(strlen($pname)))
								$pname=substr($pname,0,42)."...";
                                                         $unit_price=ucwords($prd['unit_price']);
							
							$encid=$com_obj->encid($prd['id']);
							$perma=strtolower(str_replace(" ", "-", $prd['prod_name']));
							
							$mem_pack = $db->singlerec("select mem_pack from register where id='".$prd['userid']."'");
							$mem_pack_name = $db->singlerec("select name from membership where id = '".$mem_pack[0]."'");
							
							$country = $db->singlerec("select * from register where id = '".$prd['userid']."'");
							
							$prod_no=$prd['prod_no'];
	

?>

		<div class="col-md-4 product_sec" style="display: table-cell;">    
                    <div class="prd_wrapper"  >
			   <div class="col-md-6 pr_img">
					<h2><a href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perma; ?>"><? echo substr($pname,0,15); ?></a></h2>
					<a href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perma; ?>"><img src="<? echo $siteurl; ?>/uploads/product/1000x600/<? echo $prd['photo1']; ?>" alt="<? echo $pname;//$name; ?>" class="img-responsive"></a>
			   </div>
			   <div class="col-md-6 pr_descript">
				 <p><? echo substr($prd['prod_briefdes'],0,170).'...'; ?> </p>
			   </div>
			</div>    
		   <div class="en_wrap">
				<div class="col-md-7 enqiry_sec">
					<h3><? echo $country['company_name']; ?></h3>
					<p><? echo $country['address']; ?></p>
					<span><i class="fa fa-phone" aria-hidden="true"></i><? echo $country['mobile']; ?></span>		
				</div>
				<div class="col-md-5 cta_en">
					<button onclick="setToemail('<?echo $country['email'];?>','<?echo ucfirst($country['fname']);?>');" class="btn" data-toggle="modal" data-target="#send-an-inquiry" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                           Send Enquiry</button>
				</div>
			</div>
		</div>	
<?
  }
?>
  </div>
</div>
            <?
	$getnewprod=$db->get_all_asso("select a.id,a.prod_no,a.userid,a.prod_name,a.prod_category,a.photo1,a.prod_minprice,a.unit_price,a.prod_crtdate from product as a,company as b where a.userid = b.user_id AND a.photo1!='' AND a.photo1!='noimage.jpg' AND a.photo1!='noimage.png' and prod_status='1' order by id desc LIMIT 12");
		   ?>
		  
<?  
}

else{
	?>
<div class="container-fulid pdt25" style="background-color:#f5f5f5;">
	  <div class="container">
	  <? if($poff!=''){?>
	  <?include "include/company_tap.php";?>
	  <? }?>
	  <div class="category-info">	
				<div class="row">
					<!-- accordion-->
					<div class="col-md-3 col-sm-3">
					    <?if($poff==''){?><div class="row">
						<div class="well">
						<form action="<? echo $siteurl; ?>/product-list" method="post" role="form">
					      <div class="form-group form-btm model-name">
                            <label class="label-title">Name of Product</label>
                            <input type="text" name="pr_Name" class="form-control form-height" value="<? echo @$pr_Name; ?>">
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            <label class="label-title">Refine by Member Names</label>
                            <input type="text" name="pr_Memname" class="form-control form-height" value="<? echo @$pr_Memname; ?>">
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            <label class="label-title">Refine by Keywords</label>
                            <input type="text" name="pr_Key" class="form-control form-height" value="<? echo @$pr_Key; ?>">
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            <label class="label-title">Refine by Description</label>
                            <input type="text" name="pr_Desc" class="form-control form-height" value="<? echo @$pr_Desc; ?>">
                          </div>
						  
						  <!--<div class="form-group form-btm model-name">
                            <label class="label-title">Package Name</label>
                            <select class="form-control form-height">
                                <option>Any</option>
                                <option>premium 1</option>
                                <option>premium 2</option>
                              </select>
                          </div>-->
						  
						  <div class="form-group form-btm model-name">
                            <label class="label-title">Hidden or Lives Listings</label>
                            <select class="form-control form-height" name="pr_Publish">
                                <option value="">Any</option>
                                <option value="1">Live Listing Only</option>
                                <option value="0">Hidden Listing Only</option>
                              </select>
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            <label class="label-title">Featured and Unfeatured</label>
                            <select class="form-control form-height" name="pr_Featured">
                                <option value="">Any</option>
                                <option value="1">Featured Listing Only</option>
                                <option value="0">General Listing Only</option>
                              </select>
                          </div>
						  
						  <!--<div class="form-group form-btm model-name">
                            <label class="label-title">Business Type</label>
                            <select class="form-control form-height">
                                <option>Any</option>
                                <option>Featured Listing Only</option>
                                <option>General Listing Only</option>
                              </select>
                          </div>-->
						  
						  <div class="form-group form-btm model-name">
                            <label class="label-title">Refine by Category</label>
                            <select class="form-control form-height" name="pr_Cat">
                                <option value="">Any</option>
								<?
								$pr_Cat = isset($pr_Cat)?$pr_Cat:'';
								echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0' and dis_status='1'",$pr_Cat);
								?>
                              </select>
                          </div>
						  
						  <div class="form-group form-btm model-name">
                            <label class="label-title">Refine by country</label>
                            <select class="form-control form-height" name="pr_Country">
                                <option value="">Any</option>
								<?
								$pr_Country = isset($pr_Country)?$pr_Country:'';
								echo $drop->get_dropdown($db,"select nicename,nicename from countries order by id",$pr_Country);
								?>
                              </select>
                          </div>
						  
						  <div class="form-group model-name">
                            <label class="label-title col-md-12">Price</label>
                            <div class="row">
							<div class="col-xs-6">
							<select class="form-control form-height" name="pr_Range">
							    <? $pr_Range=isset($pr_Range)?$pr_Range:''; ?>
                                <option value="equal" <? if($pr_Range=="equal") echo "selected"; ?>>Equal To</option>
                                <option value="min" <? if($pr_Range=="min") echo "selected"; ?>>Minimum</option>
								<option value="max" <? if($pr_Range=="max") echo "selected"; ?>>Maximum</option>
                              </select>
							  </div>
							  <div class="col-xs-6">
							   <input type="text" name="pr_Price" class="form-control form-height" value="<? echo @$pr_Price; ?>">
							</div>
							</div>
							
                          </div>
						  
						  <div class="form-group form-btm text-center model-name">
						     <button type="submit" name="filter_Prod" class="btn view-more-btn-3" value="filterpro">Filter</button>
						  </div>
						  </form>
						  
						  
                        </div>
						
						
						
						</div>
						<?}?>
						
						
						
						
						<div class="row" style="min-width:25%;">
							<?include "include/leftBanner_slide3.php";?>   
						</div>
					</div><!-- accordion-->

					<!-- recommended-ads -->
					<div class="col-sm-6 col-md-6">				
						<div class="section recommended-ads">
							<!-- featured-top -->
							<div class="featured-top">
								<h4>List of Products</h4>
								
								<button class="btn hidden view-more-btn-2-2 ml20 pull-right" data-toggle="modal" data-target="#send-multiple-inquiry"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Multiple Inquiry </button>
								<div class="dropdown pull-right">
								
								<!-- category-change -->
								<div class="dropdown category-dropdown">
									<h5>Sort by:</h5>
									<?
									if($view=="featured") $srt_By="Featured";
									else if($view=="new") $srt_By="New";
									else if($view=="best") $srt_By="Bestselling";
									else if($view=="popular") $srt_By="Popular";
									else $srt_By="All"; 
									?>
									<a data-toggle="dropdown" href="<? echo $siteurl; ?>/product-list"><span class="change-text"><? echo $srt_By; ?></span><i class="fa fa-caret-square-o-down"></i></a>
									<ul class="dropdown-menu category-change">
										<li><a href="<? echo $siteurl; ?>/product-list">All</a></li>
										<li><a href="<? echo $siteurl; ?>/product-list/featured">Featured</a></li>
										<li><a href="<? echo $siteurl; ?>/product-list/new">Newest</a></li>
										<li><a href="<? echo $siteurl; ?>/product-list/popular">Popular</a></li>
										<li><a href="<? echo $siteurl; ?>/product-list/best">Bestselling</a></li>
									</ul>
								</div>													
								</div>							
							</div><!-- featured-top -->	
							
							<?
							$prod_Lst=$db->get_all_asso($que . $limit);
							if(empty($prod_Lst)) {
								echo "<hr><center><h3>No records found..!!</h3></center><hr>";
							}
						foreach($prod_Lst as $prd){
							// check is the user is existe in db start
							$isThereC = $db->singlerec("select count(*) from company where user_id = '".$prd['userid']."'");
							$isThereR = $db->singlerec("select count(*) from register where id = '".$prd['userid']."'");
							if((int)$isThereC[0]===0  || (int)$isThereR[0]===0){continue;}	
							//end
								
							$prc=explode('/', $prd['prod_minprice']);
							$price=$prc[0]; 
							
							$ccode = $db->singlerec("select currencycode from currency_code where id ='".$prd['prod_currency_loc']."' LIMIT 1");
							$price=$prd['prod_minprice'];
							if($price)
								$price=$price.' '.$ccode[0];
							else
								$price="&nbsp;";
							
							$exp_dt=date("d/m/Y", strtotime($prd['prod_expdate']));
							$post_dt=date("d M Y", strtotime($prd['prod_crtdate']));
							$bcap=explode('/', $prd['max_supply_quantity']);
							$b_cap=$bcap[0];
							if($b_cap=="") $b_cap="None Specified";
							$fcat=$db->singlerec("select category_name from category where id='".$prd['prod_category']."'");
							$cat=ucwords($fcat['category_name']);
							$pname=ucwords($prd['prod_name']);
                                                        $unit_price=ucwords($prd['unit_price']);
							if(41<(strlen($pname)))
								$pname=substr($pname,0,42)."...";
							
							$encid=$com_obj->encid($prd['id']);
							$perma=strtolower(str_replace(" ", "-", $prd['prod_name']));
							
							$mem_pack = $db->singlerec("select mem_pack from register where id='".$prd['userid']."'");
							$mem_pack_name = $db->singlerec("select name from membership where id = '".$mem_pack[0]."'");
							
							$country = $db->singlerec("select country from register where id = '".$prd['userid']."'");
							$prod_no=$prd['prod_no'];
							?>
							<!-- ad-item -->
							<div class="ad-item row">
								<!-- item-image -->
                                                                <div class="item-image-box col-sm-4" >
									<div class="item-image">
										<a target="_blank" href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perma; ?>"><img src="<? echo $siteurl; ?>/uploads/product/1000x600/<? echo $prd['photo1']; ?>" alt="<? echo $pname;//$name; ?>" class="img-responsive"></a>
										<?
										if($prd['featured']==1) echo '<span class="featured-ad">Featured</span>';
										if($prd['prod_status']==0) echo '<a href="javascript:;" class="verified" data-toggle="tooltip" data-placement="left" data-original-title="Verified"><i class="fa fa-check-square-o"></i></a>';
										?>
									</div><!-- item-image -->
								</div>
								
								<!-- rending-text -->
								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info ad-info-new">
										
										<h4 class="item-title"><a target="_blank" href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perma; ?>"><? echo $pname; ?></a></h4>
<!--										<div class="item-cat font-new">
										   <span class="font-new">Price : &nbsp;<? echo $prd['prod_minprice']; ?></span>
										</div>-->
                                                                                <div class="item-cat font-new">
										   <span class="font-new">UnitPrice : &nbsp;<? echo $unit_price ?></span>
										</div>
                                                                               
                                                                                
                                                                                
<!--                                                                                <div class="item-cat">
                                                                                    
											<span><a href="javascript:;"><? echo $prod_no; ?></a></span>
										</div>-->

										<div class="item-cat">
											<span><a href="javascript:;"><? echo $cat; ?></a></span>
										</div>
										<div class="item-cat">
										  <span class="font-new">Valid Until : &nbsp;<? echo $exp_dt; ?></span>
										</div>
										<div class="item-cat font-new">
										   <span class="font-new">Buying capacity : &nbsp;<? echo $b_cap; ?></span>
										</div>
										
										
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta1">
										<div class="meta-content1">
											<span class="dated">Posted <? echo $post_dt; ?></span>&nbsp;&nbsp;&nbsp;
											
											
											<span style="background-color:#dadada; padding:4px;     border-radius: 4px;" class="tag hidden  ml20">
          
										   <input type="checkbox">
										   ( Select )
										</span>
											
							<a href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $prd['permalink']; ?>" class='btn view-more-btn-3' style="color:white;margin:0px;">Read more</a>
										</div>										
										<!-- item-info-right -->
										<div class="user-option pull-right">
											
											<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?echo ucwords($mem_pack_name[0]);?>">
												<img src="<?echo $siteurl;?>/assets/images/<?echo $com_obj->setBadge($mem_pack[0]);?>" width="20" >
											</a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?echo ucwords($country[0]);?>"><i class="fa fa-map-marker"></i> </a>											
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->
					<?  } ?>	
					
					
						<div class="row">
							<div class="col-md-12 ">
								<? $db->insertrec(getPagingQuery1($que, $rowsPerPage, "")); ?>
								<nav class="pagination-wrapper">
								   <? echo $pagingLink = getPagingLink1($que,$rowsPerPage,"",$db); ?>
								</nav>
							</div>
						</div>
							<!-- ad-section -->		
								<?include "include/listBanner_bottom.php"; ?>
							<!-- ad-section -->
							
							<!-- ad-item -->
							
							<!-- pagination  
							<div class="text-center">
								<ul class="pagination ">
									<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
									<li  class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">...</a></li>
									<li><a href="#">10</a></li>
									<li><a href="#">20</a></li>
									<li><a href="#">30</a></li>
									<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>			
								</ul>
							</div><!-- pagination  -->					
						</div>
					</div><!-- recommended-ads -->
					
					
					
					       <!--section---------START-------LEFT_SIDEBAR---COL_MD_3--->
	        <div class="col-md-3 col-sm-3"> 
        
        <!-- B2b-v400-1 --> 
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9052681341488812" data-ad-slot="3317376538" data-ad-format="auto"></ins> <br>
        <!-- Sidebar Start -->
        
        <div class="block block-stats">
          <div class="list-group">
		  <?
		  $prodcount=$db->get_all_asso("SELECT count(*) as total from product where prod_status='1'");
		  
		  $slingledscount = $db->singlerec("select count(*) as total  from selling_leads where active_status='1'");
		  
		  $byngledscount = $db->singlerec("select count(*) as total  from buying_leads where active_status='1'");

		  $cmpnycount = $db->singlerec("select count(*) as total  from company where active_status='1'");

		  ?> 
            <h5 class="list-group-item active">Trading Statistics</h5>
            <a href="<?echo $siteurl;?>/product-list" class="list-group-item"><i class="fa fa-leaf"></i> Products <span class="pull-right"><span class="label label-primary"><? echo $prodcount[0]['total']; ?></span></span></a>
			
			<a href="<?echo $siteurl;?>/selling-leads-list" class="list-group-item"><i class="fa fa-bullhorn"></i> Selling Leads <span class="label label-success pull-right"><? echo $slingledscount['total']?></span></a> 
			
			<a href="<?echo $siteurl;?>/buying-leads-list" class="list-group-item"><i class="fa fa-shopping-cart"></i> Buying Leads <span class="label label-warning pull-right"><? echo $byngledscount['total']; ?></span></a>  
			
			<a href="<?echo $siteurl;?>/company-list" class="list-group-item"><i class="fa fa-briefcase"></i> Companies <span class="label label-danger pull-right"><? echo $cmpnycount['total']; ?></span></a> 
			</div> 
        </div> 
        
        <div class="block block-story success_pad">
		<div class="panel panel-default">
		  <div class="panel-heading">
          <h3><i class="fa fa-comments"></i> Success Story</h3>
		  </div>
          <div id="cbp-qtrotator" class="cbp-qtrotator">
             <div class="cbp-qtcontent cbp-qtcurrent" style="transition: opacity 700ms ease;">
			
			<?$trades = $db->get_all_asso("select * from success_stories where status='1' order by rand() LIMIT 3");
		     foreach($trades as $trade)
			 {
				
			 			?>

              <div class="desc"><h5><a href="success-stories.php" title=""><?echo ucfirst(substr($trade['story_title'],0,50));?></a></h5>
			  
			  <span><a href="success-stories.php" title=""><?echo ucfirst(substr($trade['story_name'],0,50));?></a></span>
			  </div>
            
              <div class="media">
                              <div class="media-body">
                  
                  
                   </div>
              </div>
			 <?php } ?>
            </div>
            <hr>
            <span class="cbp-qtprogress" style="transition: width 9000ms linear; width: 100%;"></span></div>
        </div>
		</div>
		
        <div class="block block-supplier">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Premium Suppliers Profile</h4>
            </div>
            <div class="panel-body pr_wrap">
              <ul class="prenium_wrapper">			  
			  <?
			  $premsupliar = $db->get_all_asso("SELECT a.id,a.user_id,a.name,a.country,a.type,a.business_type,a.website,a.company_intro,a.create_date,a.logo FROM company AS a, register AS b WHERE a.user_id = b.id AND b.mem_pack='2' AND a.active_status='1' ORDER BY id DESC LIMIT 4");
              foreach($premsupliar as $presuppliar)
			  {
				  ?>
				    <li>
					  <div class="top_sec">
						<div class="supply_img_sec"><a href="#"><img src="<? echo $siteurl; ?>/uploads/company/logo/<?echo $presuppliar['logo'];?>"/></a></div>
						<div class="supply_title_sec"><? echo $presuppliar['name']; ?></div>
					  </div>
					  <div class="descrop_sec">
					  
						<p><?
						if($presuppliar['company_intro']=='')
						{
							
						}else{
 						  echo substr( $presuppliar['company_intro'],0,170).'...'; 
						}
						?>
						</p>
					  </div>
                    </li> 
			 <?
			  }
			  ?>
              </ul>
              <br>
              <div class="text-center cta_view"> <a href="<?echo $siteurl;?>/sellers" class="btn btn-global">View All..</a> </div>
            </div>
          </div>
        </div>
       <div class="block block-news">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3><i class="fa fa-globe"></i> Latest News</h3>
            </div>
            <div class="panel-body">			
              <figure>
			  <?include "include/latestnews.php";?>

			 </figure>
              <div class="text-center"> <a href="<?echo $siteurl;?>/news-list" class="btn btn-global">More News <i class="fa fa-arrow-right"></i></a> </div>
            </div>
          </div>
        </div>

<!-- <div class="block block-story success_pad">
		<div class="panel panel-default">
                    <div style="color:white;" class="panel-heading">
                      <h3><i style="color:white;" class="fa fa-comments"></i> News</h3>
		  </div>
          <div id="cbp-qtrotator" class="cbp-qtrotator">
            <div class="cbp-qtcontent cbp-qtcurrent" style="transition: opacity 700ms ease;">
			
			<?$trades = $db->get_all_asso("select * from news LIMIT 2");
                       // var_dump($trades);
                       // die();
                       
		     foreach($trades as $trade)
			 {
                         $userdetail=$db->get_all_asso("select * from register where id=".$trade['user_id']);
                          
				
			 			?>

                                                <div class="desc"><h5><a href="news-details.php" title=""><?echo ucfirst(substr($trade['page_name'],0,50));?></a></h5>
                                                                       
                
                 
                 
                  <span><a href="news-details.php" title=""><?echo ucfirst(substr($trade['description'],0,50));?></a></span>
                         <div><h5>Date:<?php echo $trade['crcdt'];?></h5></div>
                        
			  </div>
            
             
			 <?php } ?>
                                                
			

			
                 <div class="text-center"> <a href="<?echo $siteurl;?>/news-list" class="btn btn-global">More News <i class="fa fa-arrow-right"></i></a> </div>
            </div>
            <hr>
            <span class="cbp-qtprogress" style="transition: width 9000ms linear; width: 100%;"></span></div>
        </div>
		</div>-->
        
        <!-- Sidebar End --> 
        
      </div>

					<div class="col-md-2 hidden-xs hidden-sm">
					
					<?/* include "include/leftPortrait1.php" */?><br>
					<?/* include "include/leftPortrait2.php" */?>
					
						<div class="advertisement text-center">
							<a href="#"><img src="<? echo $siteurl; ?>/images/ad-lg.png" alt="" ></a>
						</div>
						<div class="advertisement text-center mt15">
							<a href="#"><img src="<? echo $siteurl; ?>/images/adlg-2.png" alt="" ></a>
						</div>
					</div>
				</div>	
			</div>
			<!-- include/buissList.php -->
      </div>
    </div>	
	<?
	}
?>

<? include "footer.php"; ?>


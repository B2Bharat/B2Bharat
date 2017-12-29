<?
$tpTitle = 'Selling-leads-list | B2Bharat.com ,selling Offers In B2B , Sell Leads , Customers Offers, Product To Sell, List of Selling Leads';
$pgDesc = 'B2Bharat Provide best selling lead to thier Clients, Selling List in B2Bharat,B2B Portal For Selling and buying leads.';
$pgKeywords = 'Industrial Selling Leads, Exporter and Importers Sale Offers, Online Selling Leads, B2B Lead for Customers, B2B Business Leads, Sell Offers, Online Leads, Business Trade Offers, Business opportunities in B2Bharat';

include "header.php";
include "include/searchDiv.php";
$db_name="selling_leads";
include "selling_filt.php";

$sloff = isset($sloff)?$com_obj->decid(addslashes($sloff)):'';
if($sloff!=''){
	$que="select a.id,a.offer_name,a.photo1,a.base_price,a.currency,a.keyword1,a.keyword2,a.keyword3,a.keyword4,a.brief_description,a.delivery_time,a.valid_until,a.post_date,b.name,c.category_name,d.country,d.email,d.fname,d.mem_pack,a.pay_method,a.min_order_quantity from selling_leads as a inner join company as b on a.user_id=b.user_id left join category as c on a.cat_id=c.id inner join register as d on a.user_id=d.id where a.active_status='1' and a.user_id='$sloff'";
	//$que = "select * from selling_leads where user_id='$sloff'";
	$userid=$sloff;
}
include "pagination.php";
$rowsPerPage=$Prod_RecPerPage;
$limit=limitation($Prod_RecPerPage);

?>
<style>
	.recommended-ads .change-text+i {    color: #9FA4A4;}
      .slider input {    display: inline-block;    margin-bottom: 15px;}
	  .ad-info .item-price {
    margin-top: 0;
    margin-bottom: 5px;
    font-size: 16px;
    font-weight: 500;
    }
</style>
    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container">
	  <?if($sloff!=''){?>
	  <?include "include/company_tap.php";?>
	  <?}?>
	     <div class="category-info">
				<div class="section trending-ads cars-ads">
				<div class="section-title">
					<h4>List of Selling Leads</h4>
					
					<button class="btn view-more-btn-2-2 ml20 pull-right" data-toggle="modal" data-target="#send-multiple-inquiry" onclick="bulk_enqs();"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Multiple Enquiries </button>
					
					<a class="btn btn view-more-btn-2-1 collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					<i class="fa fa-search" aria-hidden="true"></i>Search Now</a>
					<div class="collapse" id="collapseExample" aria-expanded="false" style="height: 0px;">
								<?if($sloff==''){?><div class="well" style="background-color: #f1f1f1 !important">
										<div class="row">
											<form action="" method="post">
											  <div class="form-group col-md-4">
												<label for="exampleInputEmail1">Name of Product</label>
												<input type="text" class="form-control" name="of_name" placeholder="Product Name" value="<? echo @$of_name; ?>">
											  </div>
											  
											  <div class="form-group col-md-4">
												<label for="exampleInputEmail1">Refine by Member Names</label>
												<input type="text" class="form-control" name="mem_name" value="<? echo @$mem_name; ?>">
											  </div>
											  
											  <div class="form-group col-md-4">
												<label for="exampleInputEmail1">Refine by Keywords</label>
												<input type="text" class="form-control" name="keyword" value="<? echo @$keyword; ?>">
											  </div>
											  
											  <div class="form-group col-md-4">
												<label for="exampleInputEmail1">Refine by Description</label>
												<input type="text" class="form-control" name="desc" value="<? echo @$desc; ?>">
											  </div>
											  
											  <div class="form-group col-md-4">
												<label for="exampleInputEmail1">Hidden or Lives listings</label>
												<select class="form-control" name="hid_live">
												   <option value="">Any</option>
												   <option value="1">Lives listings Only</option>
												   <option value="0">Hidden listings Only</option>
												</select>
											  </div>
											  
											  <div class="form-group col-md-4">
												<label for="exampleInputEmail1">Refine By Category</label>
												<select class="form-control" name="categ">
												   <option value="">Any</option>
													<?
													$categ = isset($categ)?$categ:'';
													echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0' and dis_status='1'",$categ);
													?>
												</select>
											  </div>
											  
											  
											  <div class="form-group col-md-4">
												<label for="exampleInputEmail1">Refine By Country</label>
												<select class="form-control" name="country">
												   <option value="">Any</option>
													<?
													$country = isset($country)?$country:'';
													echo $drop->get_dropdown($db,"select nicename,nicename from countries order by id",$country);
													?>
												</select>
											  </div>
											  
											  <div class="form-group col-md-4">
												<label class="col-md-12 row" for="exampleInputEmail1">Price</label>
												<div class="col-md-6 row">
												<select class="form-control" name="prc_val">
												   <option value="equal">Equal</option>
												   <option value="max">Maximum</option>
												   <option value="min">Minimum</option>									   
												</select>
												</div>
												<div class="col-md-7">
												  <input type="text" class="form-control" name="prc_amt" value="<? echo @$prc_amt; ?>" onkeydown="return (event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">
												</div>
											  </div>
											  <div class="col-md-12 text-center">
											      <button type="submit" class="btn view-more-btn-3" name="SL_Filt">&nbsp; Filter</a>
											  </div>
											</form>
										</div>
									  </div>
									  <?}?>
									</div>
								</div>
				<?
				$SL_Lst=$db->get_all_asso($que . $limit);
				if(empty($SL_Lst)) {
					echo "<hr><center><h4>No records found..!!</h4></center><hr>";
				}
				else {
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
				
				$des=substr($SL['brief_description'],0,30);
				$durat=$SL['delivery_time'];
				$payt = substr($SL['pay_method'],0,11).'..';
				$key=$SL['keyword1'].','.$SL['keyword2'].','.$SL['keyword1'].','.$SL['keyword3'].','.$SL['keyword4'];
				$mem_pack_name = $db->singlerec("select name from membership where id = '".$SL['mem_pack']."'");
				/*$pay_m=explode(',', $SL['pay_method']);
				$payt="";
				foreach ($pay_m as $key=>$pay){
				$payt1=$db->singlerec("select name from payment_methods where id='".$pay."'");
				$payt.=$payt1[0];
				}*/
				?>
				<div class="ad-item row ad-item-selling-list">
					<div class="item-image-box col-sm-12 col-md-5">
						<div class="item-image">
							<a href="<?echo $siteurl;?>/selling-leads-detail/<?echo strtolower(str_replace(' ','-',$SL['offer_name']));?>/<?echo $com_obj->encid($SL['id']);?>"><img src="<?echo $logourl;?>" alt="Image" class="img-responsive"></a>
							<? if($SL['active_status']=='0') { ?>
							<a href="javascript:;" class="verified" data-toggle="tooltip" data-placement="left" title="" data-original-title="Verified">Verified<!--<i class="fa fa-check-square-o"></i>--></a>
							<? } ?>
						</div><!-- item-image -->
						<div class="ad-info">							
							<h4 class="item-title"><a href="<?echo $siteurl;?>/selling-leads-detail/<?echo strtolower(str_replace(' ','-',$SL['offer_name']));?>/<?echo $com_obj->encid($SL['id']);?>"><? echo ucwords($SL['offer_name']); ?></a></h4>
							<h3 class="item-price">Price : <? echo $price; ?></h3>	
							<p><b>Description :</b> <? echo $des.' ...'; ?></p>
						</div>						
					</div>	
					<div class="cars-ads-box col-sm-12 col-md-7">
						<div class="car-info">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i>Valid Until : <? echo date("d-m-Y", strtotime($SL['valid_until'])); ?></li>
								<li><i class="fa fa-clock-o" aria-hidden="true"></i>Duration of Delivery : <? echo isset($durat[0])?"$durat[0]":''; ?></li>
								<li><i class="fa fa-shopping-cart" aria-hidden="true"></i>Minimum Order Quantity : <? echo $SL['min_order_quantity']; ?> </li>
								<li><i class="fa fa-credit-card" aria-hidden="true"></i>Payment Type : <? echo $payt; ?></li>
							</ul>
						</div>
						<div class="car-info">
							<ul>
								<li><i class="fa fa-list-alt" aria-hidden="true"></i>Category : Computer Accessories </li>
								<li><i class="fa fa-bitbucket" aria-hidden="true"></i>Company Overview : None</li>
								<li><i class="fa fa-database" aria-hidden="true"></i>Operating Since: 2001</li>
								<!--<li><i class="fa fa-key" aria-hidden="true"></i>Keywords: <? echo $key; ?> </li>-->
							</ul>
						</div>
						
						<div class="ad-meta ad-meta-selling-list">
							<div class="meta-content">
								 <span class="dated"><a href="#">Posted On: <?echo date("d-M-y",strtotime($SL['post_date']));?></a></span> 
                                                                 <a href="<?echo $siteurl;?>/selling-leads-detail/<?echo strtolower(str_replace(' ','-',$SL['offer_name']));?>/<?echo $com_obj->encid($SL['id']);?>" class="btn view-more-btn-2-1 ml20">More Details </a>
								
		<?php 
		$country=$db->singlerec("select nicename,nicename from countries order by id");
		?>								
		<span class="tag  ml20">
          <input type="checkbox" name="send_enqs[]" value="<?echo $SL['email'];?>">
        </span>
								
						<button onclick="setToemail('<?echo $country[1];?>','<?echo ucfirst($country[1]);?>');" class="btn view-more-btn-2-1 ml20" data-toggle="modal" data-target="#send-an-inquiry"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send An Enquiry </button>
								
								<!--<a href="#" class="btn view-more-btn-2-2 ml20"><i class="fa fa-user" aria-hidden="true"></i>  Contact Seller </a>-->
								<!-- <a href="#" class="tag pdl20"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 0</a>
								<a href="#" class="tag pdl20"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 0</a> -->
								
							</div>									
							<!-- item-info-right -->
							<div class="user-option pull-right">
							    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?echo ucwords($mem_pack_name[0]);?>">
								  <img src="<?echo $siteurl;?>/assets/images/<?echo $com_obj->setBadge($SL['mem_pack']);?>" width="20" >
								  </a>
								
								
								<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?echo $country[0];?>"><i class="fa fa-map-marker"></i> </a>
								
								
									
							</div><!-- item-info-right -->
						</div><!-- ad-meta -->																		
					</div>			
				</div><!-- ad-item -->
				<? } } ?>
				
			</div>
				
			<div class="row">
				<div class="col-md-12 ">
					<? $db->insertrec(getPagingQuery1($que, $rowsPerPage, "")); ?>
					<nav class="pagination-wrapper">
					   <? echo $pagingLink = getPagingLink1($que,$rowsPerPage,"",$db); ?>
					</nav>
				</div>
			</div>
				
		<!-- include/buissList.php -->		
				
		</div>
      </div>
    </div>
<? include "footer.php"; ?>
    <?
$tpTitle = 'Buying-leads-list | B2Bharat.com ,seller Buying Offers , Buy Leads , Buying Offers, Product To Sell, List Customers Buy Leads.';
$pgDesc = 'Sellers List in B2Bharat , List Of traders for Industrial Items,B2B Industrial Wholesaler, Indian Manufacturers List.';
$pgKeywords = 'Industrial Trade Leads, Exporter and Importers Trade Leads, Fabrication Lead, Paint Buy Lead,B2B Business Leads, Buy Offers, Online Business Leads, Business Trade Offers, Business opportunities in B2Bharat';

include "header.php";
include "include/searchDiv.php";
include "buying_filt.php";

$bloff = isset($bloff)?$com_obj->decid(addslashes($bloff)):'';
if($bloff!=''){
	$que="select a.id,a.offer_name,a.photo1,a.price,a.currency,a.keyword1,a.keyword2,a.keyword3,a.keyword4,a.det_desc,a.delivery_time,a.valid_until,a.maxbuy_capacity,a.exquantity,a.contact_desc,a.post_date,b.name,c.category_name,d.country,d.email,d.fname,d.mem_pack from buying_leads as a inner join company as b on a.user_id=b.user_id inner join category as c on a.cat_id=c.id inner join register as d on a.user_id=d.id where a.active_status='1' and a.user_id";
	//$que = "select * from buying_leads where user_id='$bloff'";
	$userid=$bloff;
}


include "pagination.php";
$rowsPerPage=$Prod_RecPerPage;
$limit=limitation($Prod_RecPerPage);

?>z


   <div class="modal fade bs-example-modal-sm" id="send-an-inquiry-buyer" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header model-head">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title text-center" id="mySmallModalLabel">Send An Inquiry</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control form-height" id="exampleInputEmail1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" class="form-control form-height" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Subject</label>
                    <input type="text" class="form-control form-height" id="exampleInputPassword1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Message</label>
                    <textarea class="form-control"></textarea>
                  </div>
                  <div class="form-group text-center">
                    <a href="#" class="btn view-more-btn-3-1"> <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Send Enquiry</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container">
	  
	  <?if($bloff!=''){?>
	  <?include "include/company_tap.php";?>
	  <?}?>
	  
	     <div class="category-info">	
				<div class="section trending-ads cars-ads">
				
				
				
				
				
				<div class="section-title">
					<h4>List of Buying Leads</h4>
					
					<button class="btn view-more-btn-2-2 ml20 pull-right" data-toggle="modal" data-target="#send-multiple-inquiry" onclick="bulk_enqs();"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Multiple Enquiries </button>
					
					
					<a class="btn btn view-more-btn-2-1 collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					<i class="fa fa-search" aria-hidden="true"></i> Search Now</a>
					<div class="collapse" id="collapseExample" aria-expanded="false" style="height: 0px;">
									  <?if($bloff==''){?><div class="well" style="background-color: #f1f1f1 !important">
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
													echo $drop->get_dropdown($db,"select id,nicename from countries order by id",$country);
													?>
												</select>
											  </div>
											  
											  <div class="form-group col-md-4">
												<label class="col-md-12 row" for="exampleInputEmail1">Price</label>
												<div class="col-md-6 row">
												<select class="form-control" name="prc_val">
												   <option value="equal" <? if(isset($prc_val)=="equal") echo "selected"; ?>>Equal</option>
												   <option value="max" <? if(isset($prc_val)=="max") echo "selected"; ?>>Maximum</option>
												   <option value="min" <? if(isset($prc_val)=="min") echo "selected"; ?>>Minimum</option>									   
												</select>
												</div>
												<div class="col-md-7">
												  <input type="text" class="form-control" name="prc_amt" value="<? echo @$prc_amt; ?>" onkeydown="return (event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46))">
												</div>
											  </div>
											  
											  <div class="col-md-12 text-center">
											      <button type="submit" class="btn view-more-btn-3" name="BL_Filt">&nbsp; Filter</a>
											  </div>
											 
											</form>
										</div>
									  </div><?}?>
									</div>
				</div>
				<?
				$BL_all = $db->get_all_asso($que . $limit);
				if(!empty($BL_all)){
				foreach($BL_all as $BL){
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
			
				<div class="ad-item row ">
					<div class="item-image-box  col-sm-12 col-md-5">
						<div class="item-image">
							<a target="_blank" href="<? echo $siteurl; ?>/buying-leads-detail/<? echo $perm; ?>/<? echo $com_obj->encid($BL['id']); ?>"><img src="<?echo $logourl;?>" alt="Image" class="img-responsive"></a>
							<!--<span class="featured-ad">Featured</span>-->
							
							<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="" data-original-title="Verified">Verified<!--<i class="fa fa-check-square-o"></i>--></a>
							
							
							
						</div><!-- item-image -->
						<div class="ad-info">
							<!-- <div class="item-cat">
								<span><a href="#">Hyundai</a></span>
							</div> -->								
							<h4 class="item-title"><a target="blank" href="<? echo $siteurl; ?>/buying-leads-detail/<? echo $perm; ?>/<? echo $com_obj->encid($BL['id']); ?>"><?echo ($BL['offer_name']>15)?ucfirst(substr($BL['offer_name'],0,16).'...'):$BL['offer_name'];?></a></h4>
							<?if($price){?>
							<h3 class="item-price"> Rs :<?echo $price . $ccode[0];?></h3>	
							<?}?>
							<p><b>Description:</b> <?echo substr($BL['det_desc'],0,50).'...';?></p>
						</div>						
					</div>	
					<div class="cars-ads-box col-sm-12 col-md-7">
						<div class="car-info">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i>Offer Valid Until: <?echo date('d-m-Y',strtotime($BL['valid_until']));?></li>
								<li><i class="fa fa-clock-o" aria-hidden="true"></i>Delivery Lead Time: <?echo $BL['delivery_time'];?></li>
								<li><i class="fa fa-shopping-cart" aria-hidden="true"></i>Buying capacity: <?echo ($BL['maxbuy_capacity']>24)?substr($BL['maxbuy_capacity'],0,25).' ...':$BL['maxbuy_capacity'];?> </li>
								<li><i class="fa fa-bars" aria-hidden="true"></i>Expected Quantity: <?echo ($BL['exquantity']>24)?substr($BL['exquantity'],0,25).' ...':$BL['exquantity'];?></li>
							</ul>
						</div>
						<div class="car-info">
							<ul>
								<li><i class="fa fa-list-alt" aria-hidden="true"></i>Category : <? echo ucwords($cat); ?> </li>
								<li><i class="fa fa-bitbucket" aria-hidden="true"></i>Company Overview : <?echo substr($BL['contact_desc'],0,100);?></li>
								<li><i class="fa fa-database" aria-hidden="true"></i>Country: <?echo $country_name[0];?></li>
								<!--<li><i class="fa fa-key" aria-hidden="true"></i>Keywords: <?echo $BL['keyword1'].','.$BL['keyword2'].','.$BL['keyword3'].'...';?></li>-->
							</ul>
						</div>
						
						<div class="ad-meta">
							<div class="meta-content">
							  
								<span class="dated"><a href="#">Posted On: <?echo date("d-M-y",strtotime($BL['post_date']));?></a></span>
								<a target="_blank" href="<? echo $siteurl; ?>/buying-leads-detail/<? echo $perm; ?>/<? echo $com_obj->encid($BL['id']); ?>" class="btn view-more-btn-2-1 ml20">More Details </a>
								
								
								<span  class="tag text-center  ml20">
								   <input type="checkbox" name="send_enqs[]" value="<?echo $BL['email'];?>">
								</span>
								
								<?php 
								$country=$db->singlerec("select nicename,nicename from countries order by id");
								?>	
								
							<button onclick="setToemail('<?echo $BL['email'];?>', '<?echo ucfirst($BL['fname']);?>');" class="btn view-more-btn-2-2 ml20" data-toggle="modal" data-target="#send-an-inquiry" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                Send Enquiry</button>
								
								<!-- <a href="#" class="tag pdl20"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 0</a>
								<a href="#" class="tag pdl20"><i class="fa fa-thumbs-down" aria-hidden="true"></i> 0</a> -->
							</div>									
							<!-- item-info-right -->
							<div class="user-option pull-right">
							    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?echo ucwords($mem_pack_name[0]);?>">
								  <img src="<?echo $siteurl;?>/assets/images/<?echo $com_obj->setBadge($BL['mem_pack']);?>" width="20" >
								  </a>
								<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?echo $country_name[0];?>"><i class="fa fa-map-marker"></i> </a>
							</div><!-- item-info-right -->
						</div><!-- ad-meta -->																		
					</div>			
				</div><!-- ad-item -->
			
			<?}}else{?>	
			<center>
			<hr/>
			<h2> No records are found..!!! </h2>
			<hr/>	
			</center>
			<?}?>
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
<? include "footer.php";?>
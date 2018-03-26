<?
$tpTitle = 'Company-list Of Manufacturer, buyers and suppliers in B2Bharat.com';
$pgDesc = 'B2B directory for Indian buyers, sellers, suppliers and Wholesaler.';
$pgKeywords = 'B2Bharat, Paints, Food Machinery, Automobile and parts, Chemicals and Solvents, Construction plant and machinery, Electrical and Electronics, Furniture, Health and Medical, Industrial Fabrication, Jewelery and Gems Stone, Machine Tools and Hardware, Manufacturing Plant and Machinery, Metals, Mineral and Energy, Packaging Goods and Machinery, Paper, Rubber and Plastic, Safety product, Security and Protection Equipment, Services, Sports, Toys and Fitness Equipment, B2Bharat online portal';

include "header.php";
include "include/searchDiv.php";
include "pagination.php";
$rowsPerPage=$Prod_RecPerPage;
$limit=limitation($Prod_RecPerPage);

$sql="select a.id,a.user_id,a.name,a.country,a.type,a.business_type,a.website,a.phone,a.company_intro,a.create_date,a.logo from company as a, register as b where a.user_id = b.id AND b.mem_pack!='1' AND a.active_status='1' order by id desc";
$COM_info = $db->get_all_asso($sql . $limit);
?>
<div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container">
        <div class="category-info">
          <div class="row">
            <!-- accordion-->
            <!-- recommended-ads -->
            <div class="col-sm-12 col-md-9">

                <div class="well side">

                    <div class="section recommended-ads cuttextclass">
                      <!-- featured-top -->
                      <div class="featured-top">
					  <button class="btn view-more-btn-2-2 ml20 pull-right" data-toggle="modal" data-target="#send-multiple-inquiry" onclick="bulk_enqs();"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Multiple Enquiries </button>
					    <h4>List of Companies</h4>
                      </div>
					  
					  
					  <?foreach($COM_info as $cinfo){
						
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
						<div class="ad-item ad-item-2 row">
							<div class="item-info col-sm-12">
							  <div class="item-image-box col-xs-2">
								<div class="brdr-2">
                                         							  <?php if($cinfo['website']!='') { ?>                           
								  <a target="_blank"  href="<?php $link = $cinfo['website'];$link = (0 === strpos($link, 'http')) ? $link : 'http://' . $link; echo $link;?>"><img src="<?echo $logourl;?>" alt="Image" target="_blank" class="img-responsive"></a>
																	  <?php } else{  ?>
<a target="_blank"  href="<?echo $siteurl;?>/company-detail/<?echo strtolower(str_replace(' ','-',$cinfo['name']));?>/<?echo $com_obj->encid($cinfo['id']);?>"><img src="<?echo $logourl;?>" alt="Image" class="img-responsive"></a>
										
																	  <?php  } ?>
																	  
								</div>
							  </div>
							  <div class="ad-info ad-info-new-2">
							  <?php if($cinfo['website']!='') { ?>
								<a target="_blank" href="<?php $link = $cinfo['website'];$link = (0 === strpos($link, 'http')) ? $link : 'http://' . $link; echo $link;?>"><h3 class="item-price"><?echo ucfirst($cinfo['name']);?></h3></a>
							  <?php  }else{  ?>
							  <a target="_blank" href="<?echo $siteurl;?>/company-detail/<?echo strtolower(str_replace(' ','-',$cinfo['name']));?>/<?echo $com_obj->encid($cinfo['id']);?>"><h3 class="item-price"><?echo ucfirst($cinfo['name']);?></h3></a>
							  <?php }
							if($cinfo['website']<>'')
							 {?>
							
							<!-- <a href="<?php $link = $cinfo['website'];$link = (0 === strpos($link, 'http')) ? $link : 'http://' . $link; echo $link;?>" target="_blank"> <?echo $cinfo['website'];?></a><br />-->
							 <?PHP } ?>
								<div class="item-cat-2">
								  <span class="font-new">Business Type : <a href="#"> &nbsp;  <?echo $biz_type;?></a></span>
								</div>
                                                                
							 
							 
							
								<p class="mt15" align="justify"><?echo (strlen($cinfo['company_intro'])>499)?substr($cinfo['company_intro'],0,250).'...':ucfirst($cinfo['company_intro']);?></p>
							  </div>
							  <div class="ad-meta">
								<div class="meta-content">
<!--								  <a href="#" class="btn view-more-btn-2-1" data-toggle="modal" data-target="#contact-now" ><i class="fa fa-phone" aria-hidden="true"></i> Contact Now </a>-->
				 <?if($cinfo['phone']){?><span class="btn btn-red show-number">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <span class="hide-text"> Contact Details</span> 
                                <span class="hide-number"style="color:black;"><? echo $cinfo['phone']; ?></span>
                            </span>
                            <?}?>
								  <span class="tag  ml20">          
								   <input type="checkbox" name="send_enqs[]" value="<?echo $cemail[0];?>">
								</span>
								  <button onclick="setToemail('<?echo $cemail[0];?>','<?echo ucfirst($cemail[1]);?>');" class="btn view-more-btn-2-2 ml20" data-toggle="modal" data-target="#send-an-inquiry"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>   Send An Enquiry </button>
								</div>
								<div class="user-option pull-right">
								  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?echo ucwords($mem_pack_name[0]);?>">
								  <img src="<?echo $siteurl;?>/assets/images/<?echo $com_obj->setBadge($mem_pack[0]);?>" width="20" >
								  </a>
								  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?echo $country[0];?>"><i class="fa fa-map-marker"></i> </a>
								</div>
							  </div>
							</div>
						</div>
					  <?}?> 
					  
					  
					  
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
                      </div>
                      <!-- pagination  -->	
					  
					  
                      <!-- ad-section -->						
                      <?include "include/listBanner_bottom.php"; ?>
                      <!-- ad-section -->
                      <!-- ad-item -->
                      				
                    </div>

					<div class="row">
						<div class="col-md-12 ">
							<? $db->insertrec(getPagingQuery1($sql, $rowsPerPage, "")); ?>
							<nav class="pagination-wrapper">
							   <? echo $pagingLink = getPagingLink1($sql,$rowsPerPage,"",$db); ?>
							</nav>
						</div>
					</div>
                  
                </div>
            </div>
            <!-- recommended-ads -->
			<div class="col-sm-3">
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
			
			<?$trades = $db->get_all_asso("select * from success_stories where status='1' order by rand() LIMIT 2");
		     foreach($trades as $trade)
			 {
				 $userdetail=$db->get_all_asso("select * from register where id=".$trade['user_id']);
			 			?>

              <div class="desc"><h5><a href="success-stories.php" title=""><?echo ucfirst(substr($trade['story_title'],0,50));?></a></h5>
			 
                  <div>  <h5>Name:<? echo $userdetail[0]['fname']." ".$userdetail[0]['lname'];?></h5></div>
			  <span><a href="success-stories.php" title=""><?echo ucfirst(substr($trade['story_name'],0,50));?></a></span>
                           <div><h5>Date:<?php echo $trade['crcdt'];?></h5></div>
			  </div>
            
              <div class="media">
                              <div class="media-body">
                  
                  
                   </div>
              </div>
			 <? } ?>
                  <div class="text-center cta_view"> <a href="<?echo $siteurl;?>/success-stories" class="btn btn-global">View All</a> </div>
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
        
        <!-- Sidebar End --> 
             <?/* include "include/leftBanner_slide1.php"; */?>
			 <?/* include "include/leftBanner_slide2.php"; */?>
			 <?/* include "include/leftBanner_slide3.php"; */?>
			 <?/* include "include/leftBanner_slide4.php"; */?>
			 </div>
          </div>
        </div>
        
		<!-- include/buissList -->
		
      </div>
    </div>
    
	<style>
	.glyphicon {
      margin-right: 10px;
      }
      .section {
      background-color: #fff;
      border-radius: 4px;
      padding: 15px 25px;
      margin-bottom: 0px;
      }
      .adpost-details .agreement label {
      line-height: 28px;
      padding-top: 6px;
      color: #494949;
      margin-bottom: 0px; 
      }
    </style>
	
	<?include "footer.php";?>
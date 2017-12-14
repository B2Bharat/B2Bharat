<?
$tpTitle = 'B2Bharat.com - Online B2B Market Place, Indian Exporters, Manufacturers, Suppliers Business Directory.';
$pgDesc = 'B2Bharat.com - Online B2B Market Place, Indian Exporters, Manufacturers, Suppliers Business Directory.';
$pgKeywords = 'B2Bharat.com - Online B2B Market Place, Indian Exporters, Manufacturers, Suppliers Business Directory.';
include "header.php"; 
$getnewprod=$db->get_all_asso("SELECT `id`,`category_name`,`parent_id` FROM category WHERE parent_id=0  AND category_name !='' group by category_name  ORDER BY category_name ASC LIMIT 12");
?>
 <style>
 .view-more-cats{
 text-align:left;
 }
 </style>
<div class="container-fluid">
  <div class="container">
  <div class="row">
  <div class="col-md-3">
  <div id="jsmenuwrap"> 
			<div class="allcate">All Categories</div>
               <div class="dcjq-vertical-mega-menu">
                  <ul id="mega-1" class="menu">
				  
                   
					 
					 <?php foreach($getnewprod as $tesrt)
					 {
						 
						 $getnewprod_sub=$db->get_all_asso("select `id`,`category_name`,`parent_id` from category where parent_id=".$tesrt['id']." AND category_name !='' ORDER BY category_name ASC LIMIT 6");
						 $encid=$com_obj->encid($tesrt['id']);
						 $perma=strtolower(str_replace(" ", "-",  $tesrt['category_name']));
						?>
					 <li id="menu-item-1">
                       <a href="<?echo $siteurl;?>/classifieds-categories-list/<?echo str_replace(' ','-',strtolower($tesrt['category_name']));?>"><i class="fa fa-hand-o-right "></i> <?php echo $tesrt['category_name'];?>
					   <?php if(!empty($getnewprod_sub))
						{
							echo '<i class="fa fa-angle-double-right "></i>';
						}
						else
						{
						}?>
					   </a>
						
						
						<?php if(!empty($getnewprod_sub))
						{?>
                        <ul>
						<?php foreach($getnewprod_sub as $hyut)
						 {
							 
							  $getnewprod_sub_sub=$db->get_all_asso("select `id`,`cat_name` from sub_category where sub_cat_id=".$hyut['id']." AND cat_name !='' ORDER BY cat_name ASC LIMIT 6");
							 ?>
                           <li id="menu-item-4">
                              <a href="<?echo $siteurl;?>/classifieds-categories-list/<?echo str_replace(' ','-',strtolower($hyut['category_name']));?>"><?php echo $hyut['category_name'];?></a>
                              <ul>
							  <?php foreach($getnewprod_sub_sub as $subsub)
							{?>
                                 <li id="menu-item-19">
                                 	<a href="<?echo $siteurl;?>/classifieds-categories-list/<?echo str_replace(' ','-',strtolower($subsub['cat_name']));?>"><?php echo $subsub['cat_name'];?></a>
                                 </li>  
							<?php }?>
							<li id="menu-item-view">
							<?php echo "<a class='view-more-cats' href='$siteurl/category-details/$encid/$perma' class='btn btn-global'>View More</a>";?>
							</li>  
                              </ul>
                           </li>
                           
						   	 <?php }?>
                        </ul>
						<?php }?>
                     </li>
					 
					 
					 <?php }?>
					 
                     
                     <li>
                        <a href="<?echo $siteurl;?>/classifieds">View All Categories </a>
                     </li>
                  </ul>
               </div>
            </div>
  
  
  
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
        <div class="block block-news news_wraper">
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
		
		<?php 
		$datatrade = $db->get_all_asso("select trade_shows.*,company.name as cname,company.street as cstreet,company.city as ccity,company.country as ccode from trade_shows,company where trade_shows.user_id = company.user_id AND trade_shows.status='1' order by crcdt DESC LIMIT 3")
		
		?>
          <div class="block block-news news_wraper">
          <div class="panel panel-default">
            <div class="panel-heading">
New Trade Shows</div>

						  <ul class="trade-show-list">

						  <?foreach($datatrade as $tr){?>

							<li><a href="<?echo $siteurl;?>/trade-show-detail/<?echo strtolower(str_replace(" ","-",$tr['show_name']));?>/<?echo $com_obj->encid($tr['id']);?>"><i class="fa fa-tag" aria-hidden="true"></i><?echo ucfirst($tr['show_name']);?></a></li>

						  <?}?>	

						  </ul>

						  

                        </div>

						</div>
        <!-- Sidebar End --> 
  
  </div>
  
  
  
  <div class="col-md-9">
  <div class="banner_outer">
		  <?$banners=$db->get_all_asso("select title,content,image from banner where active_status='1' order by id desc");?>
		  
		    <ul class="bxslider">
			  <?foreach($banners as $k=>$b){if($k===0){$ch='active';}else{$ch="";}?>  
				<li>
				  <img src="<?echo $siteurl;?>/uploads/banner/<?echo $b['image']?>" >
				  <?php if((!empty($b['title'])) ||(!empty($b['title'])) ){?>
				  <div class="banner_sec_wrap">
					<h1><?echo $b['title']?> <br>
                  <?echo $b['content']?> </h1>
                </div>
				  <?php }?>
				</li>
			  <?}?>
			 
			</ul>
			
			
			
			
			
			
		  </div>
		  
		  
		  <?
				$getnewprod=$db->get_all_asso("select a.id,a.prod_no,a.userid,a.prod_name,a.prod_category,a.photo1,a.prod_minprice,a.prod_crtdate,a.featured from product as a,company as b where a.userid = b.user_id AND a.photo1!='' AND a.photo1!='noimage.jpg' AND a.photo1!='noimage.png' and prod_status='1' AND a.featured='1' order by id desc LIMIT 8");
				
		   ?>
		  <div class="featured_sec pad">
		  <div class="featured_title_sec">
            <h2>Featured Products</h2>
          </div>
                      <div class="featured_slider_sec"  >
            <ul class="featured_slider1" >
			
			<?
				foreach($getnewprod  as $newprod){
					$cat = $db->singlerec("select category_name from category where id='".$newprod['prod_category']."'");
					$encid=$com_obj->encid($newprod['id']);
					$perm=strtolower(str_replace(" ", "-", $newprod['prod_name']));
					$prod_no=$newprod['prod_no'];
			?>
			
              <li >
                <div class="cl_sec">
                  <h3 class="item-title"><a target="_blank" href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perm; ?>"><?echo (strlen($newprod['prod_name'])>14)?substr(ucwords($newprod['prod_name']),0,30).'...':ucwords($newprod['prod_name']);?></a></h3>
				  
                  <a target="_blank" href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perm; ?>"><img src="<? echo $siteurl; ?>/uploads/product/1000x600/<?echo $newprod['photo1'];?>" alt="" class="img-respocive"></a>
		</div>
              </li>
			<?
			 }
            ?> 
            </ul>
          </div>
          </div>
		  
		  <? 
		       $getcatg=$db->get_all_asso("select category_name,id,cat_img from category where parent_id='0' order by id asc LIMIT 8");
							
		  ?>
		  <div class="featured_sec">
          <div class="featured_title_sec">
            <h2>Latest Category</h2>
          </div>
          <div class="featured_slider_sec">
            <ul class="featured_slider2">
			<?
			  foreach($getcatg as $catrec){
			?>
			<li>
                <div class="cl_sec">
                  <h4 style="color:#0642ca;"><?echo ucwords(substr($catrec['category_name'],0,30));?></h4>
                  <a target="_blank" href="<?echo $siteurl;?>/classifieds-categories-list/<?echo str_replace(' ','-',strtolower($catrec['category_name']));?>">
				  <img src="<? echo $siteurl; ?>/admin/uploads/category/<?echo $catrec['cat_img'];?>" alt="images">
				  </a>
				  </div>
              </li>
            <?							  
			  }
			?>
            </ul>
          </div>
        </div>
		 <div class="featured_sec">
          <div class="featured_title_sec">
            <h2>Wholesaler</h2>
          </div>
          <div class="featured_slider_sec">
            <ul class="featured_slider3">
              <?
			  
					$getnewprod1=	$db->get_all_asso("select a.id,a.prod_no,l.website,a.userid,a.prod_name,a.photo1,a.prod_minprice,a.prod_crtdate,b.category_name from product as a left join category as b on a.prod_category=b.id left join register as l on a.userid=l.id  where a.photo1 !='noimage.jpg' and a.photo1 !='' and prod_status='1' order by a.viewcount desc limit 0,8");
					
					
			  
				foreach($getnewprod1  as $newprod){
				
					$cat = $db->singlerec("select category_name from category where id='".$newprod['prod_category']."'");
					$encid=$com_obj->encid($newprod['id']);
					$perm=strtolower(str_replace(" ", "-", $newprod['prod_name']));
					$prod_no=$newprod['prod_no'];
					$website1=$newprod['website'];
					$url = parse_url($website1);
					if($url['scheme'] == 'http' || $url['scheme'] == 'https')
					{
						$website=$website1;
					}
					else
					{
						$website='http://'.$website1;
					}
			?>
			
              <li>
                <div class="cl_sec">
                  <h4 class="item-title">
				  <?php if(!empty($website1))
				  {?>
			  <a href="<? echo $website; ?>" target="_blank"><?echo (strlen($newprod['prod_name'])>14)?substr(ucwords($newprod['prod_name']),0,15).'...':ucwords($newprod['prod_name']);?></a>
				<?php  }
				  else
				  {?>
				  <a href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perm; ?>">
				  	<?php echo (strlen($newprod['prod_name'])>14)?substr(ucwords($newprod['prod_name']),0,15).'...':ucwords($newprod['prod_name']);?>
				  	</a>
				 <?php } ?>
				  
				  
				  
				  </h4>
				  
                  <a target="_blank" href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perm; ?>"><img src="<? echo $siteurl; ?>/uploads/product/1000x600/<?echo $newprod['photo1'];?>" alt="" class="img-respocive"></a>
				</div>
              </li>
			<?
			 }
            ?>
            </ul>
          </div>
        </div>  
		  
		  
		  
		  
  </div>
  </div>
  
  

  </div>
</div>

<!--section---------CLOSE-------LEFT_SIDEBAR---COL_MD_3---> 
<!--section---------START-------MAP_SECTION------> 
<!--section---------CLOSE-------MAP_SECTION------>
<div class="container-fluid selling_lead">
  <div class="container">
    <div class="row">
      <div class="tabbing_sec_wrapper">
        <div class="br_sec"> 
          <!-- Nav tabs -->
          <div id="tabs-container">
    <ul class="tabs-menu">
        <li class="active">
		<a href="#tab-1" data-toggle="tab" aria-controls="tab-1" role="tab" title="" aria-expanded="true" data-original-title="Latest Selling leads">Latest Selling leads</a>
		</li>
        <li><a href="#tab-2" data-toggle="tab" aria-controls="tab-2" role="tab" title="" aria-expanded="false" data-original-title="Latest Buying leads">Latest Buying leads</a></li>
    </ul>
    <div class="tab-content well">
        <div id="tab-1" class="tab-pane active">
		
		<?
		$selling = $db->get_all_asso("select a.id,a.offer_name,a.photo1,a.base_price,a.currency,a.keyword1,a.keyword2,a.keyword3,a.keyword4,a.brief_description,a.delivery_time,a.valid_until,a.post_date,b.name,c.category_name,d.country,d.email,d.fname,d.mem_pack,a.pay_method,a.min_order_quantity from selling_leads as a inner join company as b on a.user_id=b.user_id left join category as c on a.cat_id=c.id inner join register as d on a.user_id=d.id where a.active_status='1' LIMIT 8"); 

		?>
           <ul class="tab_le_sec">
		   <?
		   foreach($selling as $sellingprod)
		   {
			   /* echo '<pre>';
			   print_r($sellingprod);
			   echo '</pre>'; */
			   
			   ?>
					<li>
                      <div class="cl_sec">
                       <a target="_blank" href="<?echo $siteurl;?>/selling-leads-detail/<?echo strtolower(str_replace(' ','-',$sellingprod['offer_name']));?>/<?echo $com_obj->encid($sellingprod['id']);?>">
                        <h4><? echo substr($sellingprod['offer_name'],0,20).'...'; ?></h4>
                        </a>
                         <a target="_blank" href="<?echo $siteurl;?>/selling-leads-detail/<?echo strtolower(str_replace(' ','-',$sellingprod['offer_name']));?>/<?echo $com_obj->encid($sellingprod['id']);?>">
						 <img src="<?echo $siteurl;?>/uploads/SL_images/banner1/<?echo $sellingprod['photo1'];?>"/></a>
                        <p class="des_sec"><? echo substr($sellingprod['brief_description'],0,50); ?></p>
                        <div class="rating_sec"><img src="images/rating.jpg"/></div>
                        <a target="_blank" href="<?echo $siteurl;?>/selling-leads-detail/<?echo strtolower(str_replace(' ','-',$sellingprod['offer_name']));?>/<?echo $com_obj->encid($sellingprod['id']);?>">ZAR <? echo $sellingprod['base_price']; ?></a></div>
                    </li>
                <?
				 }
		        ?>
                  </ul>
        </div>
        <div id="tab-2" class="tab-pane">
		
		<?
		$buying=$db->get_all_asso("select a.id,a.offer_name,a.photo1,a.price,a.currency,a.keyword1,a.keyword2,a.keyword3,a.keyword4,a.det_desc,a.delivery_time,a.valid_until,a.maxbuy_capacity,a.exquantity,a.contact_desc,a.post_date,b.name,c.category_name,d.country,d.email,d.fname,d.mem_pack from buying_leads as a inner join company as b on a.user_id=b.user_id inner join category as c on a.cat_id=c.id inner join register as d on a.user_id=d.id where a.active_status='1' LIMIT 8"); 
		
		
		?>
           <ul class="tab_le_sec">
		   <?
		   foreach($buying as $buyinglead)
		   {
			   /* echo '<pre>';
			   print_r($buyinglead);
			   echo '</pre>'; */
			   $perm=str_replace(" ", "-", $buyinglead['offer_name']);
			   $perm=strtolower($perm);
		?>
		            <li>
                      <div class="cl_sec">
                        <a target="_blank" href="<? echo $siteurl; ?>/buying-leads-detail/<? echo $perm; ?>/<? echo $com_obj->encid($buyinglead['id']); ?>">
                        <h4><? echo substr($buyinglead['offer_name'],0,20).'...'; ?></h4>
                        </a>
                         <a target="_blank" href="<? echo $siteurl; ?>/buying-leads-detail/<? echo $perm; ?>/<? echo $com_obj->encid($buyinglead['id']); ?>"><img src="<?echo $siteurl;?>/uploads/BL_images/banner1/<?echo $buyinglead['photo1'];?>"/></a>
                        <p class="des_sec"><? echo substr($buyinglead['det_desc'],0,50); ?></p>
                        <div class="rating_sec"><img src="images/rating.jpg"/></div>
                        <a target="_blank" href="<? echo $siteurl; ?>/buying-leads-detail/<? echo $perm; ?>/<? echo $com_obj->encid($buyinglead['id']); ?>">ZAR <? echo $buyinglead['base_price']; ?></a></div>
                    </li>
		<?
		   }
		   ?>
           
                </ul>
        
        </div>
        <div id="tab-3" class="tab-pane">
           <ul class="tab_le_sec">
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                </ul>
        </div>
        <div id="tab-4" class="tab-pane">
           <ul class="tab_le_sec">
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                </ul>
            </div>
              <div id="tab-5" class="tab-pane">
           <ul class="tab_le_sec">
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                  <li>
                    <div class="cl_sec">
                      <h4>Plain BOPP Tapes</h4>
                      <img src="images/one.jpg"/>
                      <p class="des_sec">Our facility is equipped with upgraded range of machines and tools, required for successful execution</p>
                      <div class="rating_sec"><img src="images/rating.jpg"/></div>
                      <a href="#">ZAR 2000</a></div>
                  </li>
                </ul>
            </div>
            </div></div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--section---------CLOSE-------MAP_SECTION------>
<!--section---------Satrt-------GLOBAL_SECTION------>
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="our_global_sec">
	    <h2><? echo $lang_our_partners; ?></h2>
	     <div class="global_img_sec">
         
		<?
			$logos = $db->get_all("select * from company where active_status='1' limit 8");
			
		for($i=0;$i<count($logos);$i++)
			{
				$logo= $logos[$i]['logo'];
										
				if(file_exists("uploads/company/logo/$logo")){
						$logourl =  "$siteurl/uploads/company/logo/$logo";	
				}else{
					    $logourl =  "$siteurl/uploads/company/logo/noimage.jpg";	
					 }
		?>
          <div class="col-md-3 col-sm-6 col-xs-12">
		  <div class="thums_wrpper">
		  <?php 
		  $logos[$i]['website'] = empty(parse_url($logos[$i]['website'])['scheme']) ? 'http://' . ltrim($logos[$i]['website'], '/') : $logos[$i]['website'];
		  ?>
		 <a href="<?php echo $logos[$i]['website'];?>" target="_blank"><img src="<?echo $logourl;?>" alt="" class="img-respocive" width="160" ></a></div></div>
		  <?
			}
		  ?>
        </div>

		</div>

      </div>
    </div>
  </div>
</div>
<!--section---------CLOSE-------GLOBAL_SECTION------> 
<!--section---------START-------HOT__PRODUCT-------->

<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="featured_sec pad_hpt_product">
        <div class="featured_title_sec">
          <h2>Latest Hot Products</h2>
        </div>
		<div class="featured_slider_sec">
          <ul class="hot_slider">
		<?
			$count = 1;
			$getnewprod=$db->get_all_asso("select a.id,a.prod_no,a.prod_briefdes,a.userid,a.prod_name,a.photo1,a.prod_minprice,a.prod_crtdate,b.category_name from product as a left join category as b on a.prod_category=b.id  where a.photo1 !='noimage.jpg' and a.photo1 !='' and prod_status='1' order by a.viewcount desc limit 0,8");
			foreach($getnewprod as $newprod) {
				$company = $db->singlerec("select count(*) from company where user_id='".$newprod['userid']."'");
				if((int)$company[0]===0) continue;			
					$encid=$com_obj->encid($newprod['id']);
					$perm=strtolower(str_replace(" ", "-", $newprod['prod_name']));

				$prod_no=$newprod['prod_no'];
		?>

		  
            <li>
              <div class="cl_sec">
              <a target="_blank" href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perm; ?>">
                <h4><?echo (strlen($newprod['prod_name'])>14)?substr(ucwords($newprod['prod_name']),0,15):ucwords($newprod['prod_name']);?></h4>
				</a>
                <a target="_blank" href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perm; ?>"><img src="<? echo $siteurl; ?>/uploads/product/1000x600/<?echo $newprod['photo1'];?>" alt="" class="img-respocive"></a>
				
                <p class="des_sec"><? echo $newprod['prod_name']; ?></p>
				
                <div class="rating_sec"><img src="images/rating.jpg"/></div>
				<?if($newprod['prod_minprice']){?>
					<a href="<? echo $siteurl; ?>/product-detail/<? echo $encid; ?>/<? echo $perm; ?>"><?echo $newprod['prod_minprice'].$PS_Crncy;?></a>
				<?}else{echo "<a href='#'>&nbsp;</a>";}?>
				</div>
            </li>
			<?
			}
			?>

          </ul>
        </div>
      </div> 
    </div>
  </div>
</div>
<!--section---------CLOSE-------HOT__PRODUCT-------->

<?
include "footer.php";

if(isset($_REQUEST['rdone'])) {
	echo "<script>swal('Great!', 'You`re successfully registered into the site. Please check your email and OTP sent to your mobile  to verify your account!', 'success','<a>links</a> '  );</script>";
	


?>
<script>

	setTimeout(function(){ $('#verify-otp-form').modal('show');  }, 3000);
	
	
	</script>
<?	
}
?>
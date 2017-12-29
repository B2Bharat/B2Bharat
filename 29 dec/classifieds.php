<?
$tpTitle = 'Business directory, B2Bharat.com business directory, India Largest Online b2b directory';
$pgDesc = 'B2Bharat.com is India largest online classified,directory for Machine Tools and Hardware,Food and Machinery,Industrial fabrication,Manufacturing Plant and Machinery';
$pgKeywords = 'Agricultural directories, Food Machinery directory, Apparel and Garments directory, Arts and Handicrafts directories, Automobile and parts directories, Ayurved Product directory, Books and Stationery directory, Office Supplies directory, Chemicals and Solvents b2b online busines directory, Construction plant and machinery b2b online busines directory, Electricales and Electronics b2b online busines directory, Furniture b2b online busines directory, Health and Medical classifieds, Industrial Fabrication classifieds, Jewellery and Gems Stone classifieds, Machine Tools and Hardware classifieds, Manufacturing Plant and Machinery classifieds, Metals, Mineral and Energy classifieds, Packaging Goods and Machinery classifieds, Paper Products yellow page,Rubber and Plastic yellow page, Safety product yellow page, Security and Protection Equipment yellow page, Services yellow page, Sports yellow page, Toys and Fitness yellow page, Equipment yellow page, Textile and Furnishing yellow page';

include "header.php";
include "include/searchDiv.php";
$srch = isset($srch)?$srch:'';
$filter="";
if($srch){ $filter .="where category_title like '%$srch%'"; }
$BL_all = $db->get_all_asso("select * from buying_leads $filter order by id DESC LIMIT 20");
$GetRecordimg=$db->singlerec("select * from manage_ad where id='1'");
$home_left = $GetRecordimg['home_left'];
$home_bottom1 = $GetRecordimg['home_bottom1'];
$home_bottom2 = $GetRecordimg['home_bottom2'];

include "pagination.php";
$rowsPerPage=$Prod_RecPerPage;
$limit=limitation($Prod_RecPerPage);
 ?>
      <!-- services-ad -->  
      <section id="services-ad" class="clearfix home-three" style="padding:0;">
         <div class="container-fulid  full-with">
            <section id="browse-categories">
               <div  class=" container">
                  <!-- class="container" -->
                  <div class="section featureds" >
                     <div class="col-sm-9" style="border:1px solid#e3e3e3;">
                        <div class="row">
                           <!-- featured-top -->
                           <div class="col-sm-12">
                              <div class="featured-top text-center">
                                 <h4>ALL CATEGORIES</h4>
                              </div>
                           </div>
                           <!-- featured-top -->
                        </div>
                        <div class="section services" style="padding: 1px 25px; margin-bottom: 0;">
							<? $sql="select category_name,id,cat_img from category where parent_id='0' and dis_status='1' order by id desc";
							$getcatg=$db->get_all_asso($sql . $limit);
							foreach($getcatg as $catgrec){
								/* if($catgrec['cat_img']=='noimage.jpg' || $catgrec['cat_img']=='noimage.png' || $catgrec['cat_img']=='')continue; */
								
								$mid=$catgrec['id'];
								$catnam=$catgrec['category_name'];
								
								$encid=$com_obj->encid($catgrec['id']);
								$perma=strtolower(str_replace(" ", "-",  $catgrec['category_name']));
								$subcatg=$db->get_all_asso("select id,category_name from category where parent_id='$mid' order by category_name asc LIMIT 5");
								$mctot=count($subcatg);
								$maincat=strtolower(str_replace(' ','-',$catnam));
							?>
							<div class="col-sm-4 col-xs-6 new catttr ">
							<a class="" href="<?echo $siteurl."/category-details/$encid/$perma"?>"><h5>
							<?  $imgpath= "admin/uploads/category/$catgrec[cat_img]";
							    if(file_exists($imgpath)){
								    if($catgrec['cat_img']!="") {echo "<img src='$imgpath' class='mr10 zm-in' >";}
									else {echo "<img src='admin/uploads/category/noimage.jpg' class='mr10 zm-in' >";}
								}else{
									echo "<img src='admin/uploads/category/noimage.jpg' class='mr10 zm-in' >";
								}
								
							?>
							</h5>
							<p><strong><?php echo ucwords($catnam);?></strong></p>
							</a>
							<?if($mctot !=0){
								$Disp="<ul class='cat-list'>";
								foreach($subcatg as $sbcat){
									$sbcatnam = $sbcat['category_name'];
									
									
									
									$sbcatnam1=strtolower(str_replace(' ','-',$sbcat['category_name']));
									$sbcatname=ucwords($sbcatnam);
									$sburl = $siteurl."/classifieds-categories-list/$maincat/$sbcatnam1";
									$Disp .=" <li><i class='fa fa-angle-right'></i> <a href='$sburl'>$sbcatname</a></li>";
								}
								if(!empty($subcatg))
								{
									
									echo $Disp .="<li class='viewmore'><a href='$siteurl/category-details/$encid/$perma' class='btn btn-global'>View More</a></li></ul>";
								 }
								else
								{
									echo $Disp .="</ul>";
								}
							}
							?>
							</div>
						 <? }?>
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
                     <div class="col-md-3 padd-r0" style="padding-left: 15px; padding-right:0;}">
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
		

		<div class="block block-story success_pad">
		<div class="panel panel-default">
		  <div class="panel-heading">
          <h3><i class="fa fa-comments"></i> Success Story</h3>
		  </div>
          <div id="cbp-qtrotator" class="cbp-qtrotator">
            <div class="cbp-qtcontent cbp-qtcurrent" style="transition: opacity 700ms ease;">
			
			<?$trades = $db->get_all_asso("select * from success_stories where status='1' order by rand() LIMIT 1");
		     foreach($trades as $trade)
			 {
				
			 }

			?>

              <div class="desc"><a href="success-stories.php"><?echo substr($trade['story_details'],0,150);?></a></div>
              <br>
              <div class="media">
                <div class="media-left">
        				<a href="#" ><img width="100" height="100" src="<?echo $siteurl;?>/uploads/success/<?echo $trade['story_photo'];?>" alt="Icon"></a> 
				</div>
                <div class="media-body">
                  <h5><a href="success-stories.php" title=""><?echo ucfirst(substr($trade['story_name'],0,15));?></a></h5>
                  
                  <img src="images/flag.png" border="0">[United Kingdom] </div>
              </div>
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
                        <!--div class="col-sm-12" style="border:1px solid#e3e3e3; margin-bottom: 0;">
                           <div class="section quick-rules" style=" padding:10px 5px; margin-bottom: 10px;" >
                            <?/* include "include/latestnews.php"; */?>
                           </div>
							<?/* include "include/homeinner.php"; */?>
                        </div-->
                     </div>
                  </div>
				  
				  
			<!-- include/buissList.php -->
				  
               </div>
            </section>
         </div>
         <!-- featureds -->
         
         
         
      </section>
      <!-- services-ad -->
      <!-- download -->
	  <?php /*?>
      <section id="download" class="clearfix parallax-section">
         <div class="container">
            <div class="row">
               <!-- <div class="col-sm-12 text-center">
                  <h2>Download on App Store</h2>
                  </div> -->
            </div>
            <!-- row -->
            <!-- row -->
            <div class="col-sm-6">
                  <div class="col-sm-12 text-center" style="border:1px solid#e3e3e3; margin-top:10px;">
                     <div class="recommended-cta" style="padding:20px 0px 0px 0px; background: transparent;">
                        <h4 style="color:#FFF; font-size:20px; font-weight:bold;">Success stories</h4>
						<div id="carousel-example-2" class="carousel slide" data-ride="carousel">
							
							<?$trades = $db->get_all_asso("select * from success_stories where status='1' LIMIT 5");?>
						
						   <!-- Indicators -->
						   <ol class="carousel-indicators">
						   <?foreach($trades as $key=>$trade){
								if($key===0){$ac='active';}else{$ac='';}?>
							  <li data-target="#carousel-example-2" data-slide-to="<?echo $key;?>" class="<?echo $ac;?>"></li>
						   <?}?>  
						   </ol>
						   <!-- Wrapper for slides -->
						   <div class="carousel-inner" role="listbox">
						   
							<?foreach($trades as $key=>$trade){
								if($key===0){$ac='active';}else{$ac='';}?>
							 <div class="item <?echo $ac;?>">
								 <div class="cta" style="padding:0; background: transparent;" >
									
									<div class="col-xs-12 text-left">
									    <div class="col-xs-3">
										   <a href="#"><img width="200" height="200" src="<?echo $siteurl;?>/uploads/success/<?echo $trade['story_photo'];?>" alt="Icon" class="img-responsive"> </a>
										</div>
										<div class="col-xs-9 ">
										    <p><a style="color:#FFF;     text-decoration: underline; font-size:14px; font-weight:600;"><?echo ucfirst(substr($trade['story_name'],0,15));?></a></p>
											<p style="color:#FFF; font-size:14px; font-weight:600; ">Date of post :   <?echo date("d-m-Y",strtotime($trade['crcdt']));?></p>
											
										    <p style="color:#fff; padding-top:5px; min-height:3em;"><?echo substr($trade['story_details'],0,75);?>
											<a style="color:#fff;" href="#">More Details...</a></p>
									
										</div>
										
									</div>
								 </div>
							  </div>
							<?}?>
						   </div>
						</div>
                     </div>
                     <!-- cta -->
                  </div>
               </div>
			   
			   
			   
			   <div class="col-sm-6">
                  <div class="col-sm-12 text-center" style="border:1px solid#e3e3e3; margin-top:10px;">
                     <div class="recommended-cta" style="padding:20px 0px 0px 0px; background: transparent;">
                        <h4 style="color:#FFF; font-size:20px; font-weight:bold;">TradeShow</h4>
						<div id="carousel-example-1" class="carousel slide" data-ride="carousel">
							
							<?$trades = $db->get_all_asso("select * from trade_shows where status='1' LIMIT 5;");?>
						
						   <!-- Indicators -->
						   <ol class="carousel-indicators">
						   <?foreach($trades as $key=>$trade){
								if($key===0){$ac='active';}else{$ac='';}?>
							  <li data-target="#carousel-example-1" data-slide-to="<?echo $key;?>" class="<?echo $ac;?>"></li>
						   <?}?>  
						   </ol>
						   <!-- Wrapper for slides -->
						   <div class="carousel-inner" role="listbox">
						   
							<?foreach($trades as $key=>$trade){
								if($key===0){$ac='active';}else{$ac='';}?>
							 <div class="item <?echo $ac;?>">
								 <div class="cta" style="padding:0; background: transparent;" >
									
									<div class="col-xs-12 text-left">
									    <div class="col-xs-3">
										   <a href="<?echo $siteurl;?>/trade-show-detail/<?echo strtolower(str_replace(" ","-",$trade['show_name']));?>/<?echo $com_obj->encid($trade['id']);?>"><img width="200" height="200" src="<?echo $siteurl;?>/uploads/trade_show/<?echo $trade['photos'];?>" alt="Icon" class="img-responsive">
										   </a>
										</div>
										<div class="col-xs-9 ">
										    <p><a href="<?echo $siteurl;?>/trade-show-detail/<?echo strtolower(str_replace(" ","-",$trade['show_name']));?>/<?echo $com_obj->encid($trade['id']);?>" style="color:#FFF;     text-decoration: underline; font-size:14px; font-weight:600;"><?echo ucfirst(substr($trade['show_name'],0,15));?></a></p>
											<p style="color:#FFF; font-size:14px; font-weight:600; ">Date of Start :   <?echo date("d-m-Y",strtotime($trade['crcdt']));?></p>
											
											<p style="color:#fff; padding-top:15px; height:3em;"><?echo substr($trade['short_summary'],0,75);?><a style="color:#fff;" href="<?echo $siteurl;?>/trade-show-detail/<?echo strtolower(str_replace(" ","-",$trade['show_name']));?>/<?echo $com_obj->encid($trade['id']);?>">More Details...</a></p>
										</div>
										
									</div>
								 </div>
							  </div>
							<?}?>
						   </div>
						</div>
                     </div>
                     <!-- cta -->
                  </div>
               </div>
              <!-- download-app -->
               <!-- 
               <div class="col-sm-4">
			    <? $Getbottom1=$db->Extract_Single("select cat_img from manage_ad where ad_location='HomeBottom1'"); ?>
                  <div class="col-sm-12 text-center" style=" margin-top:10px;">
                     <img src="<? echo $siteurl; ?>/uploads/images/banner/<? echo $Getbottom1;?>">
                  </div>
               </div>
               <!-- download-app -->
               <!-- 
               <div class="col-sm-4 text-center">
                  <div class="col-sm-12">
				  <? $Getbottom2=$db->Extract_Single("select cat_img from manage_ad where ad_location='HomeBottom2'"); ?>
                     <img src="<? echo $siteurl; ?>/uploads/images/banner/<? echo $Getbottom2;?>">
                  </div>
               </div>
               <!-- download-app -->
            </div>
            <!-- row -->
         </div>
         <!-- contaioner -->
      </section><?php */?>
      <!-- download -->
	  
<?include "footer.php";?>
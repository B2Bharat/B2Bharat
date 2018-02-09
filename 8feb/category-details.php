<?
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
$rprid = isset($arid)?$com_obj->decid(addslashes($arid)):'';
$sql="select category_name,id,cat_img,	description from category where parent_id='0' and id=$rprid order by id desc";
$getcatg=$db->get_all_asso($sql . $limit);

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
                              
                           </div>
                           <!-- featured-top -->
                        </div>
                        <div class="section services categorydetail" style="padding: 1px 25px; margin-bottom: 0;">
							<? 
							foreach($getcatg as $catgrec){
								/* if($catgrec['cat_img']=='noimage.jpg' || $catgrec['cat_img']=='noimage.png' || $catgrec['cat_img']=='')continue; */
								$mid=$catgrec['id'];
								$catnam=$catgrec['category_name'];
                                                                $desc=$catgrec['description'];
								$subcatg=$db->get_all_asso("select id,category_name,description from category where parent_id='$mid' order by category_name asc ");
								$mctot=count($subcatg);
								$maincat=strtolower(str_replace(' ','-',$catnam));
							?>
							<div class="col-sm-4 col-xs-6 new catttr ">
							<a class="" href="<?echo $siteurl."/classifieds-categories-list/$maincat"?>">
                                                           <h5>
                                                            <?  $imgpath= "admin/uploads/category/$catgrec[cat_img]";
							    if(file_exists($imgpath)){
								    if($catgrec['cat_img']!="") {echo "<img src='/$imgpath' class='' >";}
									else {echo "<img src='/admin/uploads/category/noimage.jpg' class='mr10 zm-in' >";}
								}else{
									echo "<img src='/admin/uploads/category/noimage.jpg' class='mr10 zm-in' >";
								}
								
							?>
							</h5>
							<h4><p><?php echo ucwords($catnam);
							
							$_SESSION['selected_category']=ucwords($catnam);
							?></p></h4>
                                                           
                                                         
							</a>
                                                              
                                                           
                                                            
                                                            
                                                             <?php echo ucwords($desc)?><br/>
							<?if($mctot !=0){
								$Disp="<ul class='cat-list'>";
                                                                
                                                                
								foreach($subcatg as $sbcat){
									$sbcatnam = $sbcat['category_name'];
                                                                        
									$sbcatnam1=strtolower(str_replace(' ','-',$sbcat['category_name']));
									$sbcatname=ucwords($sbcatnam);
									$sburl = $siteurl."/classifieds-categories-list/$maincat/$sbcatnam1";
									$Disp .=" <li><i class='fa fa-angle-right'></i> <a href='$sburl'><b>$sbcatname</b></a>";
									$dd=$sbcat['id'];
									$maincat_oi=strtolower(str_replace(' ','-',$sbcatnam));
                                                                        
								
									//echo "select cat_name from sub_category where sub_cat_id='$dd' order by cat_name asc limit 10";¯
								$subcatg_main=$db->get_all_asso("select cat_name from sub_category where sub_cat_id='$dd' order by cat_name asc limit 10");
								$mctot_main=count($subcatg_main);
								
								if(!empty($mctot_main))
								{
                                                           
								$Disp .="<ul class='cat-list'>";
                                                             
								foreach($subcatg_main as $mctot_oi){								
									$sbcatnam_oi = $mctot_oi['cat_name'];
									$sbcatnam1_oi=strtolower(str_replace(' ','-',$mctot_oi['cat_name']));
									$sbcatname_oi=ucwords($sbcatnam_oi);
									$sburl_oi = $siteurl."/classifieds-categories-list/$maincat/$sbcatnam1_oi";
									$Disp .=" <li><i class='fa fa-angle-right'></i> <a href='$sburl_oi'>$sbcatname_oi</a></li>";
                                                                    
                                                                                 
									
								}
                                                                         
                                                                    $Disp .="<ul ><li class='dropdown' class='viewmore'><a  href='$siteurl/allcategories/$dd/$maincat_oi' class='btn btn-global'>View More1</a></li></ul>";
                                                                  
									 $Disp .="</ul>";
								}
									
								}
								
									echo $Disp .="</li></ul>";
                                                                     
								
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
		

<!--		<div class="block block-story success_pad">
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
        </div>-->

  <div class="block block-story success_pad">
		<div class="panel panel-default">
                    <div style="color:white;" class="panel-heading">
                      <h3><i style="color:white;" class="fa fa-comments"></i> Success Story</h3>
		  </div>
          <div id="cbp-qtrotator" class="cbp-qtrotator">
            <div class="cbp-qtcontent cbp-qtcurrent" style="transition: opacity 700ms ease;">
			
			<?$trades = $db->get_all_asso("select * from success_stories where status='1' order by rand() LIMIT 2");
		     foreach($trades as $trade)
			 {
                          $userdetail=$db->get_all_asso("select * from register where id=".$trade['user_id']);
				
			 			?>

              <div class="desc"><h5><a href="success-stories.php" title=""><?echo ucfirst(substr($trade['story_title'],0,50));?></a></h5>
                                                                       
<!--                  <h5> User Id: <?php echo $trade['user_id'];?></h5>-->
                  <div>   <h5>Name:<? echo $userdetail[0]['fname']." ".$userdetail[0]['lname'];?></h5></div>
                 
			  <span><a href="success-stories.php" title=""><?echo ucfirst(substr($trade['story_name'],0,50));?></a></span>
                         <div><h5>Date:<?php echo $trade['crcdt'];?></h5></div>
                        
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
      
	  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    });
});
</script>
</head>
<body>

<!--<p>If you click on the "Hide" button, I will disappear.</p>-->

<!--<button id="hide">Hide</button>
<button id="show">Show</button>-->

</body>
</html>

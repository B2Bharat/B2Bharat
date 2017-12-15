<? include "header.php"; 
$GetRecordimg=$db->singlerec("select * from manage_ad where id='1'");
$cat_img = $GetRecordimg['cat_img'];
$home_left = $GetRecordimg['home_left'];
$home_bottom1 = $GetRecordimg['home_bottom1'];
$home_bottom2 = $GetRecordimg['home_bottom2'];
 ?>

  <!-- services-ad -->
      <section id="services-ad" class="clearfix home-three" style="padding:0;">
         <!-- view-ad -->
         <div class="car-slider">
            <div class="home-banner banner">
               <div class="container-fulid" style="background-color: rgba(37, 34, 34, 0.8);">
                  <div class="container">
                     <div class="car-info car-info-box col-xs-9">
                        <h1 style="margin: 0px 0 0;">Lenovo</h1>
                        <h2>Mate Black <span>Price: $25,000</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                     </div>
                     <div class=" col-xs-3 text-center pdt-30">
                        <img src="<? echo $siteurl; ?>/assets/images/laptop-banner.png" alt="Image" class="img-responsive">
                     </div>
                  </div>
                  <!-- container -->
               </div>
            </div>
            <!-- home banner -->	
            <div class="home-banner banner slide-1">
               <div class="container-fulid" style="background-color: rgba(37, 34, 34, 0.8);">
                  <div class="container">
                     <div class="car-info car-info-box col-sm-9">
                        <h1 style="margin: 0px 0 0;">Lenovo</h1>
                        <h2>Mate Black <span>Price: $25,000</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                     </div>
                     <div class=" col-sm-3 text-center pdt-30">
                        <img src="<? echo $siteurl;?>/assets/images/laptop-banner.png" alt="Image" class="img-responsive">
                     </div>
                  </div>
                  <!-- container -->
               </div>
            </div>
            <!-- home banner -->	
            <div class="home-banner banner slide-2">
               <div class="container-fulid" style="background-color: rgba(37, 34, 34, 0.8);">
                  <div class="container">
                     <div class="car-info car-info-box col-sm-9">
                        <h1 style="margin: 0px 0 0;">Lenovo</h1>
                        <h2>Mate Black <span>Price: $25,000</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                     </div>
                     <div class=" col-sm-3 text-center pdt-30">
                        <img src="<? echo $siteurl; ?>/assets/images/laptop-banner.png" alt="Image" class="img-responsive">
                     </div>
                  </div>
                  <!-- container -->
               </div>
            </div>
            <!-- home banner -->	
         </div>
         <!-- home slider -->
         <!-- view-ad -->
         <div class="container">
            <div class="row">
               <!-- banner -->
               <div class="col-sm-12">
                  <div class="banner">
                     <!-- banner-form -->
                     <div class="banner-form banner-form-full">
                        <form action="#">
                           <!-- category-change -->
                           <div class="dropdown category-dropdown">
                              <a data-toggle="dropdown" href="#"><span class="change-text">Select Category</span> <i class="fa fa-angle-down"></i></a>
                              <ul class="dropdown-menu category-change">
                                 <li><a href="#">Fashion & Beauty</a></li>
                                 <li><a href="#">Cars & Vehicles</a></li>
                                 <li><a href="#">Electronics & Gedgets</a></li>
                                 <li><a href="#">Real Estate</a></li>
                                 <li><a href="#">Sports & Games</a></li>
                              </ul>
                           </div>
                           <!-- category-change -->
                           <!-- language-dropdown -->
                           <div class="dropdown category-dropdown language-dropdown ">
                              <a data-toggle="dropdown" href="#"><span class="change-text">Select City</span> <i class="fa fa-angle-down"></i></a>
                              <ul class="dropdown-menu  language-change">
                                 <li><a href="#">United Kingdom</a></li>
                                 <li><a href="#">United States</a></li>
                                 <li><a href="#">China</a></li>
                                 <li><a href="#">Russia</a></li>
                              </ul>
                           </div>
                           <!-- language-dropdown -->
                           <input type="text" class="form-control" placeholder="Type Your key word">
                           <button type="submit" class="form-control" value="Search">Search</button>
                        </form>
                     </div>
                     <!-- banner-form -->	
                  </div>
               </div>
               <!-- banner -->
            </div>
            <!-- row -->	
            <!-- featureds -->
         </div>
         <div class="container-fulid box-bg">
            <div class="container">
               <div class="col-sm-4 text-center">
                  <a class="smoothScroll" href="#trending">
                     <div class="box-img"><img src="<? echo $siteurl; ?>/assets/images/icon-1.png"></div>
                     <p class="reqir-text">Trending</p>
                  </a>
               </div>
               <div class="col-sm-4 text-center">
                  <a class="smoothScroll" href="#browse-categories">
                     <div class="box-img"><img src="<? echo $siteurl; ?>/assets/images/icon-2.png"></div>
                     <p class="reqir-text">Browse Categories</p>
                  </a>
               </div>
               <div class="col-sm-4 text-center">
                  <a class="smoothScroll" href="#suppliers">
                     <div class="box-img"><img src="<? echo $siteurl; ?>/assets/images/icon-3.png"></div>
                     <p class="reqir-text">Suppliers</p>
                  </a>
               </div>
            </div>
         </div>
         <div class="container-fulid full-with">
            <div class=" ">
               <!-- container -->
               <div class="section featureds" style="margin-bottom: 0; padding-bottom: 0;">
                  <div class="row">
                     <!-- featured-top -->
                     <div class="col-sm-12">
                        <div class="featured-top">
                           <h4>LATEST PRODUCTS</h4>
                        </div>
                     </div>
                     <!-- featured-top -->
                  </div>
                  <div class="">
                     <!-- row -->
                     <div class="col-md-9">
                        <div class="row">
                           <div class="well" style="padding-bottom:0;">
								<div id="myCarousel-2" class="carousel slide">
                                 <!-- <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol> -->
                                 <!-- Carousel items -->
                                 <div class="carousel-inner">
								 <?
								  $getnewprod=$db->get_all_asso("select a.prod_name,a.photo1,a.prod_minprice,a.prod_crtdate,b.category_name from product as a left join category as b on a.prod_category=b.id  where a.photo1 !='noimage.jpg' and a.photo1 !='' limit 0,8");
								 ?>
                                    <div class="item active">
                                       <div class="row-fluid">
										<? foreach($getnewprod as $newprod){?> 
										<div class="col-sm-6 col-md-3 col-lg-3">
                                             <div class="featured">
                                                <div class="featured-image">
                                                   <a href="product-details.html"><img src="<? echo $siteurl; ?>/uploads/product/1000x600/<?echo $newprod['photo1'];?>" alt="" class="img-respocive"></a>
                                                </div>
                                                <div class="ad-info">
                                                   <h3 class="item-price"><?echo $PS_Crncy.$newprod['prod_minprice'];?></h3>
                                                   <h4 class="item-title"><a href="#"><?echo ucwords($newprod['prod_name']);?></a></h4>
                                                   <div class="item-cat">
                                                      <span><a href="#"><?echo ucwords($newprod['category_name']);?></a></span> 
                                                      <button type="submit" class="btn btn-primary btn-view-details">
                                                      <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                                      </button>
                                                   </div>
                                                </div>
                                                <div class="ad-meta">
                                                   <div class="meta-content">
                                                      <span class="dated"><a href="#"><?echo date("d M Y",strtotime($newprod['prod_crtdate']));?></a></span>
                                                   </div>
                                                   <div class="user-option pull-right">
                                                      <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                                      <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                                   </div>
                                                </div>
                                             </div>
										</div>
									 <? }?>	
                                       </div>
                                    </div>
                                    <!--/item-->
                                 </div>
                                 <!--/carousel-inner-->
                                 <!--<a class="left carousel-control" href="#myCarousel-2" data-slide="prev">‹</a>
                                 <a class="right carousel-control" href="#myCarousel-2" data-slide="next">›</a>-->
								</div>
                              <!--/myCarousel-->
                           </div>
                           <!--/well-->   
                        </div>
                        <div class="row">
                           <div class="well" style="padding-bottom:0;">
                              <div class="row">
                                 <!-- featured-top -->
                                 <div class="col-sm-12">
                                    <div class="featured-top">
                                       <h4>POPULAR PRODUCTS</h4>
                                    </div>
                                 </div>
                                 <!-- featured-top -->
                              </div>
                              <div id="myCarousel-3" class="carousel slide">
                                 <!-- <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol> -->
                                 <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="item active">
										<div class="row-fluid">
                                          <? $getnewprod=$db->get_all_asso("select a.prod_name,a.photo1,a.prod_minprice,a.prod_crtdate,b.category_name from product as a left join category as b on a.prod_category=b.id  where a.photo1 !='noimage.jpg' and a.photo1 !='' order by a.viewcount desc limit 0,4");
										foreach($getnewprod as $newprod){
										?>
											<div class="col-sm-6 col-md-3 col-lg-3">
                                             <div class="featured">
                                                <div class="featured-image">
                                                   <a href="product-details.html"><img src="<? echo $siteurl; ?>/uploads/product/1000x600/<?echo $newprod['photo1'];?>" alt="" class="img-respocive"></a>
                                                </div>
                                                <div class="ad-info">
                                                   <h3 class="item-price"><?echo $PS_Crncy.$newprod['prod_minprice'];?></h3>
                                                   <h4 class="item-title"><a href="#"><?echo ucwords($newprod['prod_name']);?></a></h4>
                                                   <div class="item-cat">
                                                      <span><a href="#"><?echo ucwords($newprod['category_name']);?></a></span> 
                                                      <button type="submit" class="btn btn-primary btn-view-details">
                                                      <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                                      </button>
                                                   </div>
                                                </div>
                                                <div class="ad-meta">
                                                   <div class="meta-content">
                                                      <span class="dated"><a href="#"><?echo date("d M Y",strtotime($newprod['prod_crtdate']));?></a></span>
                                                   </div>
                                                   <div class="user-option pull-right">
                                                      <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                                      <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                                   </div>
                                                </div>
                                             </div>
											</div>
									 <? } ?>	
										</div>
                                       <!--/row-fluid-->
                                    </div>
                                    <!--/item-->
                                </div>
                                 <!--/carousel-inner-->
                                 <a class="left carousel-control" href="#myCarousel-3" data-slide="prev">‹</a>
                                 <a class="right carousel-control" href="#myCarousel-3" data-slide="next">›</a>
                              </div>
                              <!--/myCarousel-->
                           </div>
                           <!--/well-->   
                        </div>
                        <section id="trending" style="padding:0px 0px;">
                           <div class="row well" style="padding-bottom:0;">
                              <div class="col-md-4">
                                 <div class="">
                                    <a href="#"><img src="<? echo $siteurl; ?>/assets/images/ad-2.png" class="img-responsive"></a>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="" >
                                    <p class="text-center" style="color:#141313; font-size:20px;">Selling Leads</p>
                                    <div id="seller-leads" class="carousel slide">
                                       <!-- <ol class="carousel-indicators">
                                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                          <li data-target="#myCarousel" data-slide-to="1"></li>
                                          <li data-target="#myCarousel" data-slide-to="2"></li>
                                          </ol> -->
                                       <!-- Carousel items -->
                                       <div class="carousel-inner">
                                          <div class="item active">
                                             <div class="row-fluid">
                                                <!-- featured -->
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                   <!-- featured -->
                                                   <div class="featured">
                                                      <div class="featured-image">
                                                         <a href="product-details.html"><img src="<? echo $siteurl; ?>/assets/images/flag-1.jpg" alt="" class="img-respocive"></a>
                                                      </div>
                                                      <!-- ad-info -->
                                                      <div class="ad-info">
                                                         <h4 class="item-title"><a style="font-size:14px;" href="#">Product Name Here</a></h4>
                                                         <div class="item-cat">
                                                            <span><a href="#" style="font-size:12px;">Electronics & Gedgets</a></span>
                                                         </div>
                                                      </div>
                                                      <div class="text-center">
                                                         <a href="#" class="btn view-more-btn-2"> <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Send Enquiry</a>
                                                      </div>
                                                      <!-- ad-info -->
                                                      <!-- ad-meta -->
                                                      <div class="ad-meta">
                                                         <div class="meta-content">
                                                            <span class="dated"><a style="font-size:12px;" href="#">Posted On 29 Sep 2016 </a></span>
                                                         </div>
                                                         <!-- item-info-right -->                                                
                                                      </div>
                                                      <!-- ad-meta -->
                                                   </div>
                                                   <!-- featured -->
                                                </div>
                                                <!-- featured -->
                                             </div>
                                             <!--/row-fluid-->
                                          </div>
                                          <!--/item-->
                                          <div class="item">
                                             <div class="row-fluid">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                   <!-- featured -->
                                                   <div class="featured">
                                                      <div class="featured-image">
                                                         <a href="product-details.html"><img src="<? echo $siteurl; ?>/assets/images/flag-2.jpg" alt="" class="img-respocive"></a>
                                                         <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                                      </div>
                                                      <!-- ad-info -->
                                                      <div class="ad-info">
                                                         <h4 class="item-title"><a style="font-size:14px;" href="#">Product Name Here</a></h4>
                                                         <div class="item-cat">
                                                            <span><a style="font-size:12px;" href="#">Electronics & Gedgets</a></span>
                                                         </div>
                                                      </div>
                                                      <div class="text-center">
                                                         <a href="#" class="btn view-more-btn-2"> <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Send Enquiry</a>
                                                      </div>
                                                      <!-- ad-info -->
                                                      <!-- ad-meta -->
                                                      <div class="ad-meta">
                                                         <div class="meta-content">
                                                            <span class="dated"><a style="font-size:12px;" href="#">Posted On 29 Sep 2016 </a></span>
                                                         </div>
                                                         <!-- item-info-right -->                                                
                                                      </div>
                                                      <!-- ad-meta -->
                                                   </div>
                                                   <!-- featured -->
                                                </div>
                                                <!-- featured -->
                                             </div>
                                             <!--/row-fluid-->
                                          </div>
                                          <!--/item-->
                                       </div>
                                       <!--/carousel-inner-->
                                       <a class="left carousel-control" href="#seller-leads" data-slide="prev">‹</a>
                                       <a class="right carousel-control" href="#seller-leads" data-slide="next">›</a> 
                                    </div>
                                    <!--/myCarousel-->
                                 </div>
                                 <!--/well--> 
                              </div>
                              <div class="col-md-4">
                                 <div class="">
                                    <p class="text-center" style="color:#141313; font-size:20px;">Buying Leads</p>
                                    <div id="buying-leads" class="carousel slide">
                                       <!-- <ol class="carousel-indicators">
                                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                          <li data-target="#myCarousel" data-slide-to="1"></li>
                                          <li data-target="#myCarousel" data-slide-to="2"></li>
                                          </ol> -->
                                       <!-- Carousel items -->
                                       <div class="carousel-inner">
                                          <div class="item active">
                                             <div class="row-fluid">
                                                <!-- featured -->
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                   <!-- featured -->
                                                   <div class="featured">
                                                      <div class="featured-image">
                                                         <a href="product-details.html"><img src="<? echo $siteurl; ?>/assets/images/flag-4.jpg" alt="" class="img-respocive"></a>
                                                      </div>
                                                      <!-- ad-info -->
                                                      <div class="ad-info">
                                                         <h4 class="item-title"><a style="font-size:14px;" href="#">Product Name Here</a></h4>
                                                         <div class="item-cat">
                                                            <span><a style="font-size:12px;" href="#">Electronics & Gedgets</a></span>
                                                         </div>
                                                      </div>
                                                      <div class="text-center">
                                                         <a href="#" class="btn view-more-btn-2"> <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Send Enquiry</a>
                                                      </div>
                                                      <!-- ad-info -->
                                                      <!-- ad-meta -->
                                                      <div class="ad-meta">
                                                         <div class="meta-content">
                                                            <span class="dated"><a style="font-size:12px;" href="#">Posted On 29 Sep 2016 </a></span>
                                                         </div>
                                                         <!-- item-info-right -->                                                
                                                      </div>
                                                      <!-- ad-meta -->
                                                   </div>
                                                   <!-- featured -->
                                                </div>
                                                <!-- featured -->
                                             </div>
                                             <!--/row-fluid-->
                                          </div>
                                          <!--/item-->
                                          <div class="item">
                                             <div class="row-fluid">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                   <!-- featured -->
                                                   <div class="featured">
                                                      <div class="featured-image">
                                                         <a href="product-details.html"><img src="<? echo $siteurl; ?>/assets/images/flag-3.jpg" alt="" class="img-respocive"></a>
                                                         <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                                      </div>
                                                      <!-- ad-info -->
                                                      <div class="ad-info">
                                                         <h4 class="item-title"><a style="font-size:14px;" href="#">Product Name Here</a></h4>
                                                         <div class="item-cat">
                                                            <span><a href="#" style="font-size:12px;">Electronics & Gedgets</a></span>
                                                         </div>
                                                      </div>
                                                      <div class="text-center">
                                                         <a href="#" class="btn view-more-btn-2"> <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Send Enquiry</a>
                                                      </div>
                                                      <!-- ad-info -->
                                                      <!-- ad-meta -->
                                                      <div class="ad-meta">
                                                         <div class="meta-content">
                                                            <span class="dated"><a style="font-size:12px;" href="#">Posted On 29 Sep 2016 </a></span>
                                                         </div>
                                                         <!-- item-info-right -->                                                
                                                      </div>
                                                      <!-- ad-meta -->
                                                   </div>
                                                   <!-- featured -->
                                                </div>
                                                <!-- featured -->
                                             </div>
                                             <!--/row-fluid-->
                                          </div>
                                          <!--/item-->
                                       </div>
                                       <!--/carousel-inner-->
                                       <a class="left carousel-control" href="#buying-leads" data-slide="prev">‹</a>
                                       <a class="right carousel-control" href="#buying-leads" data-slide="next">›</a> 
                                    </div>
                                    <!--/myCarousel-->
                                 </div>
                                 <!--/well--> 
                              </div>
                           </div>
                        </section>
                     </div>
                     <div class="col-md-3 padd-r0">
                        <div class="well">
                           <div class="col=md-12">  <a href="#"><img src="<? echo $siteurl; ?>/assets/images/ad-1.png" class="img-responsive"></a></div>
                           <!-- </div>
                              <div class="well"> -->
                           <div class="col=md-12 pdt19">  <a href="#"><img src="<? echo $siteurl; ?>/assets/images/ad-4.png" class="img-responsive"></a></div>
                        </div>
                        <div class="well">
                           <div class="col=md-12">  <a href="#"><img src="<? echo $siteurl; ?>/uploads/images/homeleft/<? echo $home_left;?>" class="img-responsive"></a></div>
                        </div>
                     </div>
                     <div class="col-sm-3 text-center padd-r0">
                        <div class="well hidden">
                           <p class="text-center" style="color:#141313; font-size:20px;">Testimonials</p>
                           <div class="cta" style="padding:0;">
                              <!-- single-cta -->						
                              <div class="single-cta" style="padding:10px; background-color:#f5f5f5;">
                                 <!-- cta-icon -->
                                 <div class="cta-icon icon-secure">
                                    <img src="images/testi-1.jpg" alt="Icon" class="img-responsive img-circle">
                                 </div>
                                 <!-- cta-icon -->
                                 <p>Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, .... </p>
                              </div>
                              <!-- single-cta -->
                              <!-- single-cta -->
                              <div class="single-cta" style="padding:10px;;">
                                 <!-- cta-icon -->
                                 <div class="cta-icon icon-support">
                                    <img src="images/testi-2.jpg" alt="Icon" class="img-responsive img-circle">
                                 </div>
                                 <!-- cta-icon -->
                                 <p>Donec sodales sagittis magna. Sed consequat,...</p>
                              </div>
                              <!-- single-cta -->
                              <button type="submit" class="btn btn-primary btn-view-details">View All</button>
                           </div>
                        </div>
						<!--Hidden-->
						<div class="well">
						     
							<div class="embed-responsive embed-responsive-16by9">
							<iframe controls class="embed-responsive-item" src="http://techslides.com/demos/sample-videos/small.webm" allowfullscreen=""></iframe> </div>
							
							<div class="embed-responsive embed-responsive-16by9" style="margin-top:43px;">
							<iframe controls class="embed-responsive-item" src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" allowfullscreen=""></iframe> </div>
						</div>
						
						
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- featureds -->
         <!-- featureds -->
         <div class="container-fulid  full-with">
            <section id="browse-categories">
               <div  class=" ">
                  <!-- class="container" -->
                  <div class="section featureds" >
                     <div class="col-sm-9" style="border:1px solid#e3e3e3;">
                        <div class="row">
                           <!-- featured-top -->
                           <div class="col-sm-12">
                              <div class="featured-top text-center">
                                 <h4>BROWSE PRODUCT CATEGORIES</h4>
                              </div>
                           </div>
                           <!-- featured-top -->
                        </div>
                        <div class="section services" style="padding: 1px 25px; margin-bottom: 0;">
                          <?$getcatg=$db->get_all_asso("select category_name,id,cat_img from category where parent_id='0'");
							foreach($getcatg as $catrec){
						  ?>
                           <div class="single-service">
                              <a href="#">
                                 <div class="services-icon"><img src="<? echo $siteurl; ?>/admin/uploads/category/<?echo $catrec['cat_img'];?>" alt="images"></div>
                                 <h5><?echo ucwords($catrec['category_name']);?></h5>
                              </a>
                           </div>
						 <? }?> 
                           <div class="col-md-12 text-center">
                              <a href="<? echo $siteurl; ?>/classifieds-categories-list.php" class="btn view-more-btn">More Categories</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 padd-r0" style="padding-left: 15px; padding-right:0;}">
                        <div class="col-sm-12" style="border:1px solid#e3e3e3; margin-bottom: 0;">
                           <div class="section quick-rules" style=" padding:10px 5px; margin-bottom: 10px;" >
                              <h4 class="text-center" style="color:#141313; font-size:20px;">LAST NEWS</h4>
                              <ul>
                                 <li>Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</li>
                                 <li>Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</li>
                                 <li>Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-sm-12" style="border:1px solid#e3e3e3; padding:19px; margin-top:12px; margin-bottom:0;">
                           <img src="<? echo $siteurl; ?>/assets/images/ad-3.png" class="img-responsive" >
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
         <!-- featureds -->
         <div class="col-md-12 text-center" style="padding-bottom:20px;">
            <a href="#"><img src="<? echo $siteurl; ?>/uploads/images/banner/<? echo $cat_img;?>" alt="Image" ></a>
         </div>
         <div class="container-fulid full-with">
            <div class="container">
               <section id="suppliers">
                  <div class="container-fulid full-with">
                     <div class="col-md-12">
                        <div class="well" style="padding-bottom:0;">
                           <p class="text-center" style="color:#141313; font-size:20px;">Our Parteners</p>
                           <div id="partners" class="carousel slide">
                              <!-- <ol class="carousel-indicators">
                                 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                 <li data-target="#myCarousel" data-slide-to="1"></li>
                                 <li data-target="#myCarousel" data-slide-to="2"></li>
                                 </ol> -->
                              <!-- Carousel items -->
                              <div class="carousel-inner">
                                 <div class="item active">
                                    <div class="row-fluid">
                                       <!-- featured -->
									   <?php
									$logos = $db->get_all("select * from company where active_status='1' limit 6");
									
									for($i=0;$i<count($logos);$i++)
									{
										$logo= $logos[$i]['logo'];
										?>
                                       <div class="col-sm-6 col-xs-6 col-md-2 col-lg-2">
                                          <!-- featured -->
                                          <div class="featured">
                                             <div class="featured-image partner-img-brdr">
                                                <a href="product-details.html"><img src="<? echo $siteurl; ?>/uploads/company/logo/<? echo $logo;?>"  alt="" class="img-respocive"></a>
                                             </div>
                                          </div>
                                          <!-- featured -->
                                       </div>
									   <?php  } ?>
                                       <!-- featured -->
                                       
                                       <!-- featured -->
                                      
                                       <!-- featured -->
                                       
                                       <!-- featured -->
                                       
                                       <!-- featured -->
                                       
                                       <!-- featured -->
                                    </div>
                                    <!--/row-fluid-->
                                 </div>
                                 <!--/item-->
                                 <div class="item">
                                    <div class="row-fluid">
                                       <!-- featured -->
									   <?php
									$logos = $db->get_all("select * from company where active_status='1' limit 6");
									
									for($i=0;$i<count($logos);$i++)
									{
										$logo= $logos[$i]['logo'];
										?>
                                       <div class="col-sm-6 col-xs-6 col-md-2 col-lg-2">
                                          <!-- featured -->
                                          <div class="featured">
                                             <div class="featured-image partner-img-brdr">
                                                <a href="product-details.html"><img src="<? echo $siteurl; ?>/uploads/company/logo/<? echo $logo;?>"  alt="" class="img-respocive"></a>
                                             </div>
                                          </div>
                                          <!-- featured -->
                                       </div>
									   <?php  } ?>
                                       <!-- featured -->
                                       
                                       <!-- featured -->
                                      
                                       <!-- featured -->
                                       
                                       <!-- featured -->
                                       
                                       <!-- featured -->
                                    
                                       <!-- featured -->
                                    </div>
                                    <!--/row-fluid-->
                                 </div>
                                 <!--/item-->
                              </div>
                              <!--/carousel-inner-->
                              <a style="margin-top:17px;" class="left carousel-control" href="#partners" data-slide="prev">‹</a>
                              <a style="margin-top:17px;" class="right carousel-control" href="#partners" data-slide="next">›</a> 
                           </div>
                           <!--/myCarousel-->
                        </div>
                        <!--/well--> 
                     </div>
                  </div>
               </section>
            </div>
         </div>
         <div class="container-fulid full-with-2">
            <div class=" ">
               <!-- container -->
               <div class="cta text-center">
                  <div class="row">
                     <!-- single-cta -->
                     <div class="col-sm-4">
                        <div class="single-cta">
                           <!-- cta-icon -->
                           <div class="cta-icon icon-secure">
                              <img src="<? echo $siteurl; ?>/assets/images/icon/13.png" alt="Icon" class="img-responsive">
                           </div>
                           <!-- cta-icon -->
                           <h4>Secure Trading</h4>
                           <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie</p>
                        </div>
                     </div>
                     <!-- single-cta -->
                     <!-- single-cta -->
                     <div class="col-sm-4">
                        <div class="single-cta">
                           <!-- cta-icon -->
                           <div class="cta-icon icon-support">
                              <img src="<? echo $siteurl; ?>/assets/images/icon/14.png" alt="Icon" class="img-responsive">
                           </div>
                           <!-- cta-icon -->
                           <h4>24/7 Support</h4>
                           <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit</p>
                        </div>
                     </div>
                     <!-- single-cta -->
                     <!-- single-cta -->
                     <div class="col-sm-4">
                        <div class="single-cta">
                           <!-- cta-icon -->
                           <div class="cta-icon icon-trading">
                              <img src="<? echo $siteurl; ?>/assets/images/icon/15.png" alt="Icon" class="img-responsive">
                           </div>
                           <!-- cta-icon -->
                           <h4>Easy Trading</h4>
                           <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
                        </div>
                     </div>
                     <!-- single-cta -->
                  </div>
                  <!-- row -->			
               </div>
               <!-- cta -->			
            </div>
         </div>
         <!-- container -->
      </section>
      <!-- services-ad -->
      <!-- download -->
      <section id="download" class="clearfix parallax-section">
         <div class="container">
            <div class="row">
               <!-- <div class="col-sm-12 text-center">
                  <h2>Download on App Store</h2>
                  </div> -->
            </div>
            <!-- row -->
            <!-- row -->
            <div class="row">
               <!-- download-app -->
               <div class="col-sm-4">
                  <div class="col-sm-12 text-center" style="border:1px solid#e3e3e3; margin-top:10px;">
                     <div class="recommended-cta" style="padding:20px 0px 0px 0px; background: transparent;">
                        <h4 style="color:#FFF; font-size:20px; font-weight:bold;">SUCCESS STORY</h4>
                        <div class="cta" style="padding:0; background: transparent;" >
                           <div class="single-cta" style="padding:10px; 5px; background-color:transparent;">
                              <div class="cta-icon icon-secure">
                                 <img src="<? echo $siteurl; ?>/assets/images/testi-1.jpg" alt="Icon" class="img-responsive img-circle">
                              </div>
                              <p style="color:#FFF;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                           </div>
                        </div>
                     </div>
                     <!-- cta -->
                  </div>
               </div>
              <!-- download-app -->
               <!-- download-app -->
               <div class="col-sm-4">
                  <div class="col-sm-12 text-center" style=" margin-top:10px;">
                     <img src="<? echo $siteurl; ?>/uploads/images/bottom1/<? echo $home_bottom1;?>">
                  </div>
               </div>
               <!-- download-app -->
               <!-- download-app -->
               <div class="col-sm-4 text-center">
                  <div class="col-sm-12">
                     <img src="<? echo $siteurl; ?>/uploads/images/bottom2/<? echo $home_bottom2;?>">
                  </div>
               </div>
               <!-- download-app -->
            </div>
            <!-- row -->
         </div>
         <!-- contaioner -->
      </section>
      <!-- download -->
	 
<?
include "footer.php";

if(isset($_REQUEST['rdone'])) {
	echo "<script>swal('Great!', 'You`re successfully registered into the site. Please check your mail to verify your account!', 'success');</script>";
}
?>



<?

include "header.php";
if($prid=="") {
	echo "<script>window.history.back();</script>";	
    exit;
}
$rprid = isset($prid)?$com_obj->decid(addslashes($prid)):'';

$Prd_Det=$db->singlerec("select product.*,company.*,register.* from product,company,register where product.userid=company.user_id and product.userid=register.id and product.id='$rprid'");
if($Prd_Det['id']=="") {
	echo "<script>window.history.back();</script>";	
    exit;
}
if($Prd_Det['mem_pack']=="0") $mem="Free Member";
else if($Prd_Det['mem_pack']=="1") $mem="Silver Member";
else if($Prd_Det['mem_pack']=="2") $mem="Gold Member";
else if($Prd_Det['mem_pack']=="3") $mem="Diamond Member";
else if($Prd_Det['mem_pack']=="4") $mem="Platinum Member";
$imem=explode(" ", $mem); $imem=strtolower($imem[0]); $imem="$imem.png";
$cat=$db->singlerec("select category_name from category where id='".$Prd_Det['prod_category']."'");
$count=$db->singlerec("select count(*) from product where userid='".$Prd_Det['user_id']."'");
$userid=$Prd_Det['user_id'];


$vcount=$db->singlerec("select count(id) from votes where product_id='$rprid' AND type='1' AND action = 'vote'");
$uvcount=$db->singlerec("select count(id) from votes where product_id='$rprid' AND type='1' AND action = 'unvote'");
?>
<style>


@media (max-width: 900px ){
.carousel-inner-1 > .item.active, .carousel-inner > .item.next.left, .carousel-inner > .item.prev.right
{ width:100%; min-height:400px !important; max-height:400px !important;}

.carousel-inner-1 > .item{width:100%; min-height:400px !important; max-height:400px !important; }

}


@media (max-width: 750px ){
.carousel-inner-1 > .item.active, .carousel-inner > .item.next.left, .carousel-inner > .item.prev.right
{ width:100%; min-height:220px !important; max-height:220px !important;}

.carousel-inner-1 > .item{width:100%; min-height:220px !important; max-height:220px !important; }

}


@media (max-width: 340px ){
.carousel-inner-1 > .item.active, .carousel-inner > .item.next.left, .carousel-inner > .item.prev.right
{ width:100%; min-height:130px !important; max-height:130px !important;}

.carousel-inner-1 > .item{width:100%; min-height:130px !important; max-height:130px !important; }

}


.carousel-inner-1>.item.active, .carousel-inner>.item.next.left, .carousel-inner-1>.item.prev.right
{ width:100%; min-height:400px; max-height:400px;}
.carousel-inner-1>.item{width:100%; min-height:400px; max-height:400px; }
</style>

<section id="main" class="clearfix details-page">
    <div class="container">
		 
		 <div class="breadcrumb-section">
               <!-- breadcrumb -->
               <ol class="breadcrumb">
                  <li><a href="<? echo $siteurl; ?>">Home</a></li>
                  <li><a href="javascript:;"><? echo $cat[0]; ?></a></li>
                  <li><? echo $Prd_Det['prod_name']; ?></li>
               </ol>
               <!-- breadcrumb -->						
               <h2 class="title"><? echo $Prd_Det['prod_name']; ?></h2>
            </div>
            
             <div class="section banner">
          <!-- banner-form -->
          <div class="banner-form banner-form-full">
            <form action="<? echo $siteurl; ?>/product-list" method="post">
              <!-- category-change -->
			  <select class="dropdown form-control category-dropdown input-lg" name="MS_Categ">
					<option value="">Select Category</option>
					<?
					$categ = isset($categ)?$categ:'';
					echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0' and dis_status='1'",$categ);
					?>
			  </select>
			  
			  <select class="dropdown form-control category-dropdown input-lg" name="MS_Country">
					<option value="">Select Country</option>
					<?
					$MS_Country = isset($MS_Country)?$MS_Country:'';
					echo $drop->get_dropdown($db,"select nicename,nicename from countries order by id",$MS_Country);
					?>
			  </select>
			  
              <!-- language-dropdown -->
              <input type="text" class="form-control" name="MS_Key" placeholder="Enter Product Name, Keyword Etc.." value="<? echo @$MS_Key ?>">
              <button type="submit" class="form-control" name="Main_Srch" value="Search">Search</button>
            </form>
          </div>
          <!-- banner-form -->
        </div>
			
			<?include "include/company_tap.php";?>
			
            <!-- banner -->
            <div class="section slider">
               <div class="row">
			   
			   <?$p1 = $Prd_Det['photo1'];
				  $pbaseurl = "$siteurl/uploads/product/1000x600";
				  $p1url = "$pbaseurl/$p1";
				  if(strpos($Prd_Det['photo2'],',')===false){
				  $p2url = !empty($Prd_Det['photo2'])?"$pbaseurl/".$Prd_Det['photo2']:$p1url;
				  $p3url = !empty($Prd_Det['photo3'])?"$pbaseurl/".$Prd_Det['photo3']:$p1url;
				  $p4url = !empty($Prd_Det['photo4'])?"$pbaseurl/".$Prd_Det['photo4']:$p1url;
				  $p5url = !empty($Prd_Det['photo5'])?"$pbaseurl/".$Prd_Det['photo5']:$p1url;
				  }else{
					$images = explode(',',$Prd_Det['photo2']);
					$p2url = isset($images[0])?"$pbaseurl/".$images[0]:$p1url;  
					$p3url = isset($images[1])?"$pbaseurl/".$images[1]:$p1url;
					$p4url = isset($images[2])?"$pbaseurl/".$images[2]:$p1url;
					$p5url = isset($images[3])?"$pbaseurl/".$images[3]:$p1url;
				  }
					//if (!file_exists($p2url)){$p2url = !empty($Prd_Det['photo2'])?"$pbaseurl/".$Prd_Det['photo2']:$p1url;}
				  ?>
			   			   												
			   
                  <!-- carousel -->
                  <div class="col-md-7">
                     <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
						<ol class="carousel-indicators">
						
						
						<?PHP
						 $p1imgs=explode('uploads',$p1url);
						 $filepaths1=getcwd().'/uploads'.$p1imgs[1];
						if(file_exists($filepaths1))
						{
							?>
                           <li data-target="#product-carousel" data-slide-to="0" class="active">
                              <img src="<?echo $p1url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						   <?PHP
						    }
							?>
							
						<?PHP
						 $p2imgs=explode('uploads',$p2url);
						 $filepaths2=getcwd().'/uploads'.$p2imgs[1];
						if(file_exists($filepaths2))
						{
							?>
                           <li data-target="#product-carousel" data-slide-to="1">
                              <img src="<?echo $p2url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						 <?PHP
						    }
							?>

						<?PHP
						$p3imgs=explode('uploads',$p3url);
						$filepaths3=getcwd().'/uploads'.$p3imgs[1];
						if(file_exists($filepaths3))
						{
							?>
						
                           <li data-target="#product-carousel" data-slide-to="2">
                              <img src="<?echo $p3url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						 <?PHP
						    }
							?>		

						
						<?PHP
						
						//echo $p4url;
						
						$p4imgs=explode('uploads',$p4url);
						 $filepaths4=getcwd().'/uploads'.$p4imgs[1];
						if(file_exists($filepaths4))
						{
							?>
						
						    <li data-target="#product-carousel" data-slide-to="3">
                              <img src="<?echo $p4url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						 <?PHP
						    }
							?>	  
						

						<?PHP
						$p5imgs=explode('uploads',$p5url);
						$filepaths5=getcwd().'/uploads'.$p5imgs[1];
						if(file_exists($filepaths5))
						{
							?>

						    <li data-target="#product-carousel" data-slide-to="4">
                              <img src="<?echo $p5url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						<?PHP
						    }
							?>   
						   
						   
						   
						   
                        </ol>
                       
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner carousel-inner-1" role="listbox">
                           <!-- item -->
                           <div class="item active">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p1url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
                           <!-- item -->
                           <!-- item -->
                           <div class="item">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p2url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
                           <!-- item -->
                           <!-- item -->
                           <div class="item">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p3url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
                           <!-- item -->
                           <!-- item -->
                           <div class="item">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p4url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
                           <!-- item -->
                           <!-- item -->
                           <div class="item">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p5url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
                           <!-- item -->
                        </div>
                        <!-- carousel-inner -->
                        <!-- Controls -->
                        <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                        </a>
                        <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                        </a><!-- Controls -->
                     </div>
                  </div>
                  <!-- Controls -->	
                  <!-- slider-text -->
                  <div class="col-md-5">
                     <div class="slider-text">
					 <?
					 $ccode = $db->singlerec("select currencycode from currency_code where id ='".$Prd_Det['prod_currency_loc']."' LIMIT 1");
					 $price = $Prd_Det['prod_minprice'];
					 if($price !=0)
						 $price=$price.' '.$ccode[0];
					 else
						 $price="";
					 ?>
					 
                        <h2><?echo $price;?></h2>
                        <h3 class="title"><? echo ucwords($Prd_Det['prod_name']); ?></h3>
						<span><? if($Prd_Det['prod_no']){echo $Prd_Det['prod_no']."<br/>";} ?></span>
                        <span class="icon"><i class="fa fa-clock-o"></i><? echo date("d M Y", strtotime($Prd_Det['prod_expdate'])); ?></span>&nbsp;
                        <span class="icon"><i class="fa fa-map-marker"></i><? echo $Prd_Det['city']; ?></span>&nbsp;
						<?
						if($Prd_Det['name']=="") $bs="Buyer";
						else $bs="Seller";
						?>
                        <span class="icon label label-success" style="color:#FFF;"><i class="fa fa-user" aria-hidden="true"></i><? echo isset($bs)?$bs:'';; ?></span>
                        <!-- short-info -->
                        <div class="short-info">
                           <h4>Contact Info</h4>
						   <div class="respocive-table">
						       <table class="" style="width:100%;">
							        <tbody>
									    <tr>
										    <td><strong>Category</strong></td>
											<td><strong>:</strong></td>
											<td><? echo ucwords($cat[0]); ?></td>
										</tr>
										<tr>
										    <td><strong>Buying Offer ID</strong></td>
											<td><strong>:</strong></td>
											<td><? echo $prid; ?></td>
										</tr>
										
										<tr>
										    <td><strong>Valid Until </strong></td>
											<td><strong>:</strong></td>
											<td><? echo date("d/m/Y", strtotime($Prd_Det['prod_expdate'])); ?></td>
										</tr>
										<tr>
										    <td><strong>Minimum Order Quantity</strong></td>
											<td><strong>:</strong></td>
											<td><? echo $Prd_Det['prod_minquantity']; ?></td>
										</tr>
										
										<tr>
										    <td><strong>Language</strong></td>
											<td><strong>:</strong></td>
											<td><? if($Prd_Det['language']!="") echo ucwords($Prd_Det['language']); else echo "None Specified"; ?></td>
                                                                                         
										</tr>
										
										<tr>
										    <td><strong>User Name</strong></td>
											<td><strong>:</strong></td>
											<td><? if($Prd_Det['name']!="") echo ucwords($Prd_Det['name']); else echo "None Specified"; ?></td>
										</tr>
										
										<tr>
										    <td><strong>Type Of User</strong></td>
											<td><strong>:</strong></td>
											<td><? echo isset($bs)?$bs:''; ?></td>
										</tr>
										
									</tbody>
							   </table>
						   </div>
                        </div>
                        <!-- short-info -->
                        <!-- contact-with -->
                        <div class="contact-with">
                           <h4>Contact with </h4>
                           <?if($Prd_Det['phone']){?><span class="btn btn-red show-number">
                           <i class="fa fa-comment-o" aria-hidden="true"></i>
                           <span class="hide-text"> Contact Details</span> 
                           <span class="hide-number"><? echo $Prd_Det['phone']; ?></span>
                           </span>
						   <?}?>
                           <button onclick="setToemail('<?echo $Prd_Det['email'];?>','<?echo ucfirst($Prd_Det['fname']);?>');" class="btn" data-toggle="modal" data-target="#send-an-inquiry" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                           Send Enquiry</button>
                        </div>
                        <!-- contact-with -->
                        <!-- social-links -->
                        <div class="social-links">
                           <h4>Share this ad</h4>
							<? $prodnam=$Prd_Det['prod_name'];
							  $shareurl="$siteurl/product-detail/$prid/$prodnam";
							  echo $com_obj->sociallink($shareurl);
							?>
                        </div>
                        <!-- social-links -->						
                     </div>
                  </div>
                  <!-- slider-text -->				
               </div>
            </div>
            <!-- slider -->
            <div class="description-info">
               <div class="row">
                  <!-- description -->
                  <div class="col-md-8">
                     <div class="description">
                        <h4>Description</h4>
                        <p align="justify"><? echo $Prd_Det['prod_briefdes']; ?></p>
						<p align="justify"><? echo $Prd_Det['prod_detaildes']; ?></p>
                     </div>
                  </div>
                  <!-- description -->
                  <!-- description-short-info -->
                  <div class="col-md-4">
                     <div class="short-info">
                          <ul>
						     <!--<li><i class="fa fa-envelope-o" aria-hidden="true"></i> example@domain.com</li>-->							 <?PHP 							 if($Prd_Det['website']<>'NULL'){
								 
								 $url = parse_url($Prd_Det['website']);
                                                                 //var_dump($url);die();
                                                                 if(isset($url['scheme'])){
                                                                    if($url['scheme'] == 'http' || $url['scheme'] == 'https')
                                                                    {
                                                                            $website=$Prd_Det['website'];
                                                                    }
                                                                    else
                                                                    {
                                                                            $website='http://'.$Prd_Det['website'];
                                                                    }
                                                                 }else{
                                                                     $website='http://'.$Prd_Det['website'];
                                                                 }
								
								 
								 
								 ?>							 
							 <li><a href="<?echo $website;?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i><?echo $Prd_Det['website'];?></a></li>							 <?PHP } ?>							 
							 <li><i class="fa fa-map-marker" aria-hidden="true"></i> <? echo ucwords($Prd_Det['city']); ?></li>
						  </ul>
                          <div class="embed-responsive embed-responsive-16by9">
						  <?
						  $uSC = $db->singlerec("select city from register where id='".$Prd_Det['userid']."'");
						  $city = $uSC['city'];
						  ?>
						  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDHSvxBGz4cFL989BTKSJrgDe0iTQ7wNww&q=<?echo !empty($Prd_Det['place_of_origin'])?$Prd_Det['place_of_origin']:$city;?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						  
						</div>
                     </div>
                  </div>
               </div>
               <!-- row -->
            </div>
            <!-- description-info -->	
            <div class="col-md-12">
               <div class="row">
                  <div class="well" style="padding-bottom:0;">
                     <div class="adpost-details">

					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">More Details</a></li>
						<li role="presentation"><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">More Photos </a></li>
						<li role="presentation"><a href="#tc" aria-controls="tc" role="tab" data-toggle="tab">Terms And Conditions</a></li>
						<li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
						<li role="presentation"><a href="#related-product" aria-controls="related-product" role="tab" data-toggle="tab">Related Products</a></li>
						<!--<li role="presentation"><a href="#brochures" aria-controls="brochures" role="tab" data-toggle="tab">Brochures</a></li>-->
						<li role="presentation"><a href="#others" aria-controls="others" role="tab" data-toggle="tab">Others</a></li>
						<!--<li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>-->
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content well">
						<div role="tabpanel" class="tab-pane active" id="details">
						<div class="row" style="padding:19px;	">
						  <h4>More Details</h4>
						  
						     <p align="justify"><? echo $Prd_Det['prod_detaildes']; ?></p>
							 
							 <div class="col-sm-6">
						     <div class="responsive-table">
							      <table class="table-striped table" style="width:100%; border:1px solid#dadada;">
								     <tbody >
									     <tr>
										    <td style="width:45%">Price</td>
											<td style="width:10%; text-align:center;">:</td>
											<td style="width:45%"> <? if($Prd_Det['price_negotiable']=="yes") echo "Negotiable"; else echo "Not Negotiable"; ?></td>
										 </tr>
										 <tr>
										    <td style="width:45%;">Shipping Terms</td>
											<td style="width:10%; text-align:center;">:</td>
											<td style="width:15%;"><? echo $Prd_Det['shipping_terms']; ?></td>
										 </tr>
										  <tr>
										    <td style="width:45%;">Type or Status</td>
											<td style="width:10%; text-align:center;">:</td>
											<td style="width:45%;"><? echo $Prd_Det['type_or_status']; ?></td>
										 </tr>
									 </tbody>
								  </table>
							 </div>
							 </div>
							 </div>
						</div>
						<div role="tabpanel" class="tab-pane" id="photos">
						  <h4>More Photos</h4>
						  <div class="row">
						    <div class="col-sm-3">
							    <img src="<?echo $p1url;?>" alt="" class="img-respocive zm-in">
							</div>
							
							<div class="col-sm-3">
							    <img src="<?echo $p2url;?>" alt="" class="img-respocive zm-in">
							</div>
							
							<div class="col-sm-3">
							    <img src="<?echo $p3url;?>" alt="" class="img-respocive zm-in">
							</div>
							
							<div class="col-sm-3">
							    <img src="<?echo $p4url;?>" alt="" class="img-respocive zm-in">
							</div>
						</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="tc">
						  <h4>Terms And Conditions</h4>
						   <p><? echo $Prd_Det['terms_and_policy']; ?></p>
						</div>
						<div role="tabpanel" class="tab-pane" id="video">
						  <h4>Video<h4>
						  <div class="row">
						   <div class="col-sm-6">
						   <iframe width="560" height="315" src="<? echo $Prd_Det['video_embed_code']; ?>" frameborder="0" allowfullscreen></iframe>
						      <!--<video controls> 
							  <source src=http://techslides.com/demos/sample-videos/small.webm type=video/webm> 
							  <source src=http://techslides.com/demos/sample-videos/small.ogv type=video/ogg> 
							  <source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4>
							  <source src=http://techslides.com/demos/sample-videos/small.3gp type=video/3gp>
							</video>-->
						   </div>
						  </div>
						</div>
						<div role="tabpanel" class="tab-pane" id="related-product">
						  <h4>Related Products</h4>
						   <div class="row">
						    <?
							$Rl=$db->get_all_asso("select * from product where prod_category='".$Prd_Det['prod_category']."' and id!='$rprid' limit 4");
							if(empty($Rl)) {
								echo "<hr><center><h4>No records found..!!</h4></center><hr>";
							}
							else {
							foreach($Rl as $r) {
							$rcat=$db->singlerec("select category_name from category where id='".$r['prod_category']."'");
							$prod_name=$r['prod_name'];
							$rpnamlen=strlen($prod_name);
							if(13<$rpnamlen){$prod_name=substr($prod_name,0,14)."...";}
							
							$ccode = $db->singlerec("select currencycode from currency_code where id ='".$r['prod_currency_loc']."' LIMIT 1");
						$price=$r['prod_minprice'];
						if($price)
							$price=$price.' '.$ccode[0];
							?>
						        <!-- featured -->
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="<? echo $siteurl; ?>/product-detail/<? echo $com_obj->encid($r['id']); ?>/<? echo $r['permalink']; ?>"><img style="height:120px; width:100%;" src="<? echo $siteurl; ?>/uploads/product/1000x600/<? echo $r['photo1']; ?>" alt="" class="img-respocive"></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price"><? echo $price; ?></h3>
                                          <h4 class="item-title" style="margin-bottom:-12px;"><a href="#"><? echo ucwords($prod_name); ?></a></h4>
                                          <div class="item-cat">
                                             <span><? echo ucwords($rcat[0]); ?></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><? echo date("d M Y", strtotime($r['prod_expdate'])); ?> </span>
                                          </div>
                                          <!-- item-info-right -->
                                          <div class="user-option pull-right">
                                             <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                             <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                          </div>
                                          <!-- item-info-right -->
                                       </div>
                                       <!-- ad-meta -->
                                    </div>
                                    <!-- featured -->
                                 </div>
                                 <!-- featured -->
								 <? } } ?>
								 
						   </div>
						</div>  
						<div role="tabpanel" class="tab-pane" id="brochures">
						  <h4>Brochures</h4>
						  <div class="row">
						    <? if($Prd_Det['brochure']!="" && $Prd_Det['brochure']!="noimage.jpg") { ?>
						    <div class="col-sm-3">
							    <img src="<? echo $siteurl; ?>/uploads/product/Brochures/<? echo $Prd_Det['brochure']; ?>" alt="<? echo $Prd_Det['prod_name']; ?>" class="img-respocive zm-in">
							</div>
						    <? } ?>
						  </div>
						 </div>
						 
						 <div role="tabpanel" class="tab-pane" id="others">
						  <h4>Others</h4>
						 </div>
						<!--<div role="tabpanel" class="tab-pane" id="reviews">
						  <h4>Reviews</h4>
						  <div class="row pd20">
						      <div class="col-md-12 brdr mt20">
							      <div class="col-xs-1">
								      <img src="<? echo $siteurl; ?>/images/testi-1.jpg" class="img-responsive">
								  </div>
								  <div class="col-xs-11">
								      <h5>EPSON-EH-TW9200</h5>
									  <p class="yellow">
               							  <i class="fa fa-star" aria-hidden="true"></i>
										  <i class="fa fa-star" aria-hidden="true"></i>
										  <i class="fa fa-star-half" aria-hidden="true"></i>
										  <i class="fa fa-star-o" aria-hidden="true"></i>
										  <i class="fa fa-star-o" aria-hidden="true"></i>
									  </p>
									  <p><strong>Review Title</strong></p>
									  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
								  </div>
							  </div>
							  
							  
							  <div class="col-md-12 brdr mt20">
							      <div class="col-xs-1">
								      <img src="<? echo $siteurl; ?>/images/testi-2.jpg" class="img-responsive">
								  </div>
								  <div class="col-xs-11">
								      <h5>EPSON-EH-TW9200</h5>
									  <p class="yellow">
               							  <i class="fa fa-star" aria-hidden="true"></i>
										  <i class="fa fa-star" aria-hidden="true"></i>
										  <i class="fa fa-star-half" aria-hidden="true"></i>
										  <i class="fa fa-star-o" aria-hidden="true"></i>
										  <i class="fa fa-star-o" aria-hidden="true"></i>
									  </p>
									  <p><strong>Review Title</strong></p>
									  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
								  </div>
							  </div>
							  
							  <div class="col-md-12 brdr mt20">
							      <div class="col-xs-1">
								      <img src="<? echo $siteurl; ?>/images/testi-3.jpg" class="img-responsive">
								  </div>
								  <div class="col-xs-11">
								      <h5>EPSON-EH-TW9200</h5>
									  <p class="yellow">
               							  <i class="fa fa-star" aria-hidden="true"></i>
										  <i class="fa fa-star" aria-hidden="true"></i>
										  <i class="fa fa-star-half" aria-hidden="true"></i>
										  <i class="fa fa-star-o" aria-hidden="true"></i>
										  <i class="fa fa-star-o" aria-hidden="true"></i>
									  </p>
									  <p><strong>Review Title</strong></p>
									  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
								  </div>
							  </div>
						  </div>
						</div>-->
					  </div>

					</div>
					  <!--<div class="well">
					     <button class="btn view-more-btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						  Write Review
						</button>
						<?if(isset($_SESSION['user']) || !empty($_SESSION['user'])){?>
						<span onclick="vote('vote','<?echo $rprid;?>',1);" class="tag pdl20" style="cursor:pointer;"><i class="fa fa-2x green-icon fa-thumbs-up" aria-hidden="true"></i> <b id="vote"><?echo $vcount[0];?></b></span>
						<span onclick="vote('unvote','<?echo $rprid;?>',1);" class="tag pdl20" style="cursor:pointer;"><i class="fa fa-2x red-icon fa-thumbs-down" aria-hidden="true"></i> <b id="unvote"><?echo $uvcount[0];?></b></span>
						<?}else{?>
						
						<label class="ml25">Kindy <a href="<?echo $siteurl;?>/login" style="color:#d61c23;">login</a> to vote/unvote for this product. </label>
						<?}?>
						<div class="collapse row" id="collapseExample">
						  <div class="well col-sm-8">
							 <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Review Rate<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                          </div>
						  
						   <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Name<span class="required">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="text" placeholder="">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Email<span class="required">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="text" placeholder="">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Title<span class="required">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="text" placeholder="">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Comment<span class="required">*</span></label>
                            <div class="col-sm-9">
                              <textarea class="form-control" rows="3"></textarea>
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Enter The Code<span class="required">*</span></label>
                            <div class="col-sm-9">
							   <img src="<? echo $siteurl; ?>/images/code.png" class="img-responsive">
                              <input type="text" class="form-control" id="text" placeholder="">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title text-center">
                            <button class="btn view-more-btn" type="button"> Write Review</button>
                          </div>

						  </div>
						</div>
					  </div>
                  </div>-->
                  <!--/well-->   
               </div>
            </div>
            <div class="col-md-9 row">
               <div class="row">
                  <div class="well" style="padding-bottom:0;">
                     <div class="row">
                        <!-- featured-top -->
                        <div class="col-sm-12">
                           <div class="featured-top">
                              <h4>Popular Product</h4>
                           </div>
                        </div>
                        <!-- featured-top -->
                     </div>
                     <div id="myCarousel-4" class="carousel slide">
                        <div class="carousel-inner">
								<?
								$count = 1;
								$pop=$db->get_all_asso("select * from product where id!='$rprid' order by viewcount desc limit 8");
								foreach($pop as $pp) {
								$pNam=$pp['prod_name'];
								$pnamlen=strlen($pNam);
								if(10<$pnamlen){$pNam=substr($pNam,0,10)."...";}
								if($count==1) $active="active";
								else $active="";
								if ($count%4 == 1) {  
									echo "<div class='item ".$active."'>";
									echo "<div class='row-fluid'>";
								}
								
								$ccode = $db->singlerec("select currencycode from currency_code where id ='".$pp['prod_currency_loc']."' LIMIT 1");
								$price=$pp['prod_minprice'].' '.$ccode[0];
								
								?>
                                 <!-- featured -->
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="<? echo $siteurl; ?>/product-detail/<? echo $com_obj->encid("$pp[id]"); ?>/<? echo $pp['permalink']; ?>"><img style="height:120px; width:100%;" src="<? echo $siteurl; ?>/uploads/product/1000x600/<? echo $pp['photo1']; ?>" alt="" class="img-respocive"></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price"><? echo $price; ?></h3>
                                          <h4 class="item-title"><a href="<? echo $siteurl; ?>/product-detail/<? echo $com_obj->encid("$pp[id]"); ?>/<? echo $pp['permalink']; ?>"><? echo ucwords($pNam); ?></a></h4>
                                          <div class="item-cat">
                                             <span>Electronics &amp; Gedgets</span> 
                                             <a href="<? echo $siteurl; ?>/product-detail/<? echo $com_obj->encid("$pp[id]"); ?>/<? echo $pp['permalink']; ?>" type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Show details
                                             </a>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><? echo date("d M Y", strtotime($pp['prod_crtdate'])); ?></span>
                                          </div>
                                          <!-- item-info-right -->
                                          <div class="user-option pull-right">
                                             <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                             <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                          </div>
                                          <!-- item-info-right -->
                                       </div>
                                       <!-- ad-meta -->
                                    </div>
                                    <!-- featured -->
                                 </div>
                                 <!-- featured -->
								<?                      
								if ($count%4 == 0) echo '</div></div>';
								$count++;
								}
								if ($count%4 != 1) echo '</div></div>';
								?> 
							</div>	
                        <!--/carousel-inner-->
                        <a class="left carousel-control" href="#myCarousel-4" data-slide="prev">‹</a>
                        <a class="right carousel-control" href="#myCarousel-4" data-slide="next">›</a>
                     </div>
                     <!--/myCarousel-->
                  </div>
                  <!--/well-->   
               </div>
            </div>
            <div class="col-md-3 ml20 col-sm-6" style="padding-right:0">
               <?include "include/leftBanner_slide1.php";?>
			</div>
            
         </div>
         <!-- container -->
      </section>
      <!-- main -->
      <!-- download -->
      <section id="something-sell" class="clearfix parallax-section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 text-center">
                  <h2 class="title">Do you have something-sell?</h2>
                  <h4>Post your ad for free on YourDomain.com</h4>
				  <?if(empty($_SESSION['user'])){
					  echo "<a href='$siteurl/login?acn=logneed' class='btn btn-primary'>$lang_ads</a>";
					}else{
					  echo "<a href='$siteurl/add-product' class='btn btn-primary'>$lang_ads</a>";
					}
				  ?>
               </div>
            </div>
            <!-- row -->
         </div>
         <!-- contaioner -->
      </section>
      <!-- download -->	
      <style>
         .new-header-top{background: rgba(66, 64, 64, 0.67) !important;}
         a.new-nav-link{color:#FFF !important; font-size:12px !important; padding:5px 12px !important;}
         .nav-tabs>li {
         float: left;
         margin-bottom: -1px;
         background-color: #e3e3e3;
         }
         .green-icon{ color:#00a651;}
		 
		 .nav-tabs>li{    background-color: #774040 !important;}
	 .nav-tabs>li>a{ color:#FFF; font-weight:600;}
      </style>
	  
	
<? include "footer.php"; ?>
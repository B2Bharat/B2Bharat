<?
include "header.php";
include "include/useronly.php";
if($blid=="") {
	echo "<script>window.history.back();</script>";	
    exit;
}
$prid=$blid;
$blid = isset($blid)?$com_obj->decid(addslashes($blid)):'';
$BL_Det=$db->singlerec("select buying_leads.*,company.type,company.*,register.* from buying_leads,company,register where buying_leads.user_id=company.user_id AND buying_leads.user_id=register.id AND buying_leads.id = '$blid'");
if($BL_Det['id']=="") {
	echo "<script>window.history.back();</script>";	
    exit;
}
if($BL_Det['mem_pack']=="0") $mem="Free Member";
else if($BL_Det['mem_pack']=="1") $mem="Silver Member";
else if($BL_Det['mem_pack']=="2") $mem="Gold Member";
else if($BL_Det['mem_pack']=="3") $mem="Diamond Member";
else if($BL_Det['mem_pack']=="4") $mem="Platinum Member";
$imem=explode(" ", $mem); $imem=strtolower($imem[0]); $imem="$imem.png";
$cat=$db->singlerec("select category_name from category where id='".$BL_Det['cat_id']."'");
$count=$db->singlerec("select count(*) from product where userid='".$BL_Det['user_id']."'");

$userid=$BL_Det['user_id'];

$vcount=$db->singlerec("select count(id) from votes where product_id='$blid' AND type='2' AND action = 'vote'");
$uvcount=$db->singlerec("select count(id) from votes where product_id='$blid' AND type='2' AND action = 'unvote'");
?>
<style>


@media (max-width: 900px ){
.carousel-inner > .item.active, .carousel-inner > .item.next.left, .carousel-inner > .item.prev.right
{ width:100%; min-height:400px !important; max-height:400px !important;}

.carousel-inner > .item{width:100%; min-height:400px !important; max-height:400px !important; }

}


@media (max-width: 750px ){
.carousel-inner > .item.active, .carousel-inner > .item.next.left, .carousel-inner > .item.prev.right
{ width:100%; min-height:220px !important; max-height:220px !important;}

.carousel-inner > .item{width:100%; min-height:220px !important; max-height:220px !important; }

}


@media (max-width: 340px ){
.carousel-inner > .item.active, .carousel-inner > .item.next.left, .carousel-inner > .item.prev.right
{ width:100%; min-height:130px !important; max-height:130px !important;}

.carousel-inner > .item{width:100%; min-height:130px !important; max-height:130px !important; }

}


.carousel-inner>.item.active, .carousel-inner>.item.next.left, .carousel-inner>.item.prev.right
{ width:100%; min-height:400px; max-height:400px;}
.carousel-inner>.item{width:100%; min-height:400px; max-height:400px; }
</style>
<section id="main" class="clearfix details-page">
    <div class="container">
		 
		 <div class="breadcrumb-section">
               <!-- breadcrumb -->
               <ol class="breadcrumb">
                  <li><a href="<? echo $siteurl; ?>">Home</a></li>
                  <li><a href="javascript:;"><? echo $cat[0]; ?></a></li>
                  <li><? echo $BL_Det['offer_name']; ?></li>
               </ol>
               <!-- breadcrumb -->						
               <h2 class="title"><? echo $BL_Det['offer_name']; ?></h2>
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
					$MS_Country = isset($MS_Country)?$MS_Country:'101';
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
                  <!-- carousel -->
				  
				  <?$p1 = $BL_Det['photo1'];
				  $pbaseurl = "$siteurl/uploads/BL_images";
				  $p1url = "$pbaseurl/banner1/$p1";
				  if(strpos($BL_Det['photo2'],',')===false){
				  $p2url = !empty($BL_Det['photo2'])?"$pbaseurl/banner2/".$BL_Det['photo2']:$p1url;
				  $p3url = !empty($BL_Det['photo3'])?"$pbaseurl/banner3/".$BL_Det['photo3']:$p1url;
				  $p4url = !empty($BL_Det['photo4'])?"$pbaseurl/banner4/".$BL_Det['photo4']:$p1url;
				  $p5url = !empty($BL_Det['photo5'])?"$pbaseurl/banner5/".$BL_Det['photo5']:$p1url;
				  }else{
					$images = explode(',',$BL_Det['photo2']);
					$p2url = isset($images[0])?"$pbaseurl/banner1/".$images[0]:$p1url;  
					$p3url = isset($images[1])?"$pbaseurl/banner1/".$images[1]:$p1url;
					$p4url = isset($images[2])?"$pbaseurl/banner1/".$images[2]:$p1url;
					$p5url = isset($images[3])?"$pbaseurl/banner1/".$images[3]:$p1url;
				  }
				  
				  if (!file_exists($p2url)){$p2url = !empty($BL_Det['photo2'])?"$pbaseurl/banner1/".$BL_Det['photo2']:$p1url;}
				  
				  ?>
				  
				  
                  <div class="col-md-7">
                     <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
						 <? $p1imgs=explode('uploads',$p1url);
						 $filepaths1=getcwd().'/uploads'.$p1imgs[1];
						if(file_exists($filepaths1))
						{?>
                           <li data-target="#product-carousel" data-slide-to="0" class="active">
                              <img src="<?echo $p1url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						   	<? }?>
							
						<? $p2imgs=explode('uploads',$p2url);
						 $filepaths2=getcwd().'/uploads'.$p2imgs[1];
						if(file_exists($filepaths2))
						{?>
                           <li data-target="#product-carousel" data-slide-to="1">
                              <img src="<?echo $p2url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						 <? }?>
						 
						 	<? $p3imgs=explode('uploads',$p3url);
						 $filepaths3=getcwd().'/uploads'.$p3imgs[1];
						if(file_exists($filepaths3))
						{?>
                           <li data-target="#product-carousel" data-slide-to="2">
                              <img src="<?echo $p3url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						   
						  <? }?> 
						   
						<? $p4imgs=explode('uploads',$p4url);
						 $filepaths4=getcwd().'/uploads'.$p4imgs[1];
						if(file_exists($filepaths4))
						{?>   
						   
						   
                           <li data-target="#product-carousel" data-slide-to="3">
                              <img src="<?echo $p4url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						   <? }?>
						   
						 <? $p5imgs=explode('uploads',$p5url);
						 $filepaths5=getcwd().'/uploads'.$p5imgs[1];
						if(file_exists($filepaths5))
						{?>  
						   
						   
                           <li data-target="#product-carousel" data-slide-to="4">
                              <img src="<?echo $p5url;?>" alt="Carousel Thumb" class="img-responsive">
                           </li>
						   <? }?>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                           <!-- item -->
						<? $p1imgs=explode('uploads',$p1url);
						 $filepaths1=getcwd().'/uploads'.$p1imgs[1];
						if(file_exists($filepaths1))
						{?>   
						   
                           <div class="item active">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p1url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
						 <? }?>
                           <!-- item -->
                           <!-- item -->
						  <? $p2imgs=explode('uploads',$p2url);
						 $filepaths2=getcwd().'/uploads'.$p2imgs[1];
						if(file_exists($filepaths2))
						{?>
                           <div class="item">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p2url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
						 <? }?>
                           <!-- item -->
                           <!-- item -->
						   <? $p3imgs=explode('uploads',$p3url);
						 $filepaths3=getcwd().'/uploads'.$p3imgs[1];
						if(file_exists($filepaths3))
						{?>
                           <div class="item">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p3url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
						   <? }?>
                           <!-- item -->
                           <!-- item -->
						<? $p4imgs=explode('uploads',$p4url);
						 $filepaths4=getcwd().'/uploads'.$p4imgs[1];
						if(file_exists($filepaths4))
						{?>
                           <div class="item">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p4url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
						   <? }?>
                           <!-- item -->
                           <!-- item -->
						   <? $p5imgs=explode('uploads',$p5url);
						 $filepaths5=getcwd().'/uploads'.$p5imgs[1];
						if(file_exists($filepaths5))
						{?>
                           <div class="item">
                              <div class="carousel-image">
                                 <!-- image-wrapper -->
                                 <img src="<?echo $p5url;?>" alt="Featured Image" class="img-responsive">
                              </div>
                           </div>
						   <? }?>
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
                        <h3 class="title"><? echo ucwords($BL_Det['offer_name']); ?></h3>
						<h2>Expected Price: <? echo $PS_Crncy . $BL_Det['price']; ?></h2>
                        <span class="icon"><i class="fa fa-clock-o"></i><? echo date("d M Y", strtotime($BL_Det['valid_until'])); ?></span>
                        <? $city=$db->singlerec("select city_name from city where city_auto_id='$BL_Det[city]'"); ?>
                        <span class="icon"><i class="fa fa-map-marker"></i><? echo $city['city_name'];?></span>&nbsp;
						<?
						if($BL_Det['name']=="") $bs="Buyer";
						else $bs="Seller";
						?>
                        <span class="icon label label-success" style="color:#FFF;"><i class="fa fa-user" aria-hidden="true"></i><? echo isset($bs)?$bs:''; ?></span>
                        <!-- short-info -->
                        <div class="short-info">
                           <h4>Contact Details</h4>
						   <div class="respocive-table">
						       <table class="" style="width:100%;">
							        <tbody>
									    <tr>
										    <td><strong>Category</strong></td>
											<td><strong>:</strong></td>
											<td><? echo ucwords($cat[0]); ?></td>
										</tr>
										<tr>
										    <td><strong>Language</strong></td>
											<td><strong>:</strong></td>
											<td><? if($BL_Det['language']!="") echo ucwords($BL_Det['language']); else echo "None Specified"; ?></td>
										</tr>
										<tr>
										    <td><strong>Company Name</strong></td>
											<td><strong>:</strong></td>
											<td><? if($BL_Det['name']!="") echo ucwords($BL_Det['name']); else echo "None Specified"; ?></td>
										</tr>
										
										<tr>
										    <td><strong>Type Of User</strong></td>
											<td><strong>:</strong></td>
											<td><? echo isset($bs)?$bs:''; ?></td>
										</tr>
										<tr>
										    <td><strong>Buying Capacity</strong></td>
											<td><strong>:</strong></td>
											<td><? echo $BL_Det['maxbuy_capacity']; ?></td>
										</tr>
										<tr>
										    <td><strong>Buying Offer ID</strong></td>
											<td><strong>:</strong></td>
											<td><? echo $com_obj->encid($BL_Det['id']); ?></td>
										</tr>
										<tr>
										    <td><strong>Valid Until </strong></td>
											<td><strong>:</strong></td>
											<td><? echo date("d/m/Y", strtotime($BL_Det['valid_until'])); ?></td>
										</tr>
										<tr>
										    <td><strong>Expected Quantity</strong></td>
											<td><strong>:</strong></td>
											<td><? echo $BL_Det['exquantity']; ?></td>
										</tr>
										
										
										
									</tbody>
							   </table>
						   </div>
                        </div>
                        <!-- short-info -->
                        <!-- contact-with -->
                        <div class="contact-with">
                           <h4>Contact with </h4>
						   <?if($BL_Det['phone']){?>
                           <span class="btn btn-red show-number">
                           <i class="fa fa-comment-o" aria-hidden="true"></i>
                           <span class="hide-text"> Contact Details</span> 
                           <span class="hide-number"><? echo $BL_Det['phone']; ?></span>
                           </span>
						   <?}?>
                           <button onclick="setToemail('<?echo $BL_Det['email'];?>','<?echo ucfirst($BL_Det['fname']);?>');" class="btn" data-toggle="modal" data-target="#send-an-inquiry" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                           Send Enquiry</button>
                        </div>
                        <!-- contact-with -->
                        <!-- social-links -->
                        <div class="social-links">
                           <h4>Share this ad</h4>
                           <? $prodnam=$BL_Det['offer_name'];
							  $shareurl="$siteurl/buying-leads-detail/$prid/$prodnam";
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
                        <p><? echo $BL_Det['det_desc']; ?></p>
                     </div>
                  </div>
                  <!-- description -->
                  <!-- description-short-info -->
                  <div class="col-md-4">
                     <div class="short-info">
                          <ul>
						     <!--<li><i class="fa fa-envelope-o" aria-hidden="true"></i> example@domain.com</li>-->
							<?PHP 	if($BL_Det['website']<>'NULL') {?><li><a href="<?echo $BL_Det['website'];?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> <? echo $BL_Det['website']; ?></a></li>							 <?PHP } ?>
						
                                                       <li><i class="fa fa-map-marker" aria-hidden="true"></i> <? echo $city['city_name']; ?></li>
						  </ul>
                          <div class="embed-responsive embed-responsive-16by9">
						  <?
						 // $uSC = $db->singlerec("select city from register where id='".$BL_Det['user_id']."'");
						 // $city = $uSC['city'];
						  ?>
<!--						  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDHSvxBGz4cFL989BTKSJrgDe0iTQ7wNww&q=<?echo $city;?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
						   <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDHSvxBGz4cFL989BTKSJrgDe0iTQ7wNww&q=<? echo $city['city_name'];?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
						<li role="presentation"><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">More Photos <span class="badge">04</span> </a></li>
						<!--<li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>-->
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content well">
						<div role="tabpanel" class="tab-pane active" id="details">
						  <h4>More Details</h4>
						  
						     <p><? echo $BL_Det['det_desc']; ?></p>
						     <div class="responsive-table">
							      <table class="table-striped table" style="width:100%; border:1px solid#dadada;">
								     <tbody >
									     <tr>
										    <td>Price</td>
											<td>Negotiable</td>
										 </tr>
										 <tr>
										    <td>Shipping Terms</td>
											<td><? echo strtoupper($BL_Det['ship_terms']); ?></td>
										 </tr>
										  <tr>
										    <td>Type or Status</td>
											<td><? echo $BL_Det['businesstype']; ?></td>
										 </tr>
										 <tr>
										    <td>Subscribed Package</td>
											<td><? echo $mem; ?></td>
										 </tr>
										 
									 </tbody>
								  </table>
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
						<span onclick="vote('vote','<?echo $blid;?>',2);" class="tag pdl20" style="cursor:pointer;"><i class="fa fa-2x green-icon fa-thumbs-up" aria-hidden="true"></i> <b id="vote"><?echo $vcount[0];?></b></span>
						<span onclick="vote('unvote','<?echo $blid;?>',2);" class="tag pdl20" style="cursor:pointer;"><i class="fa fa-2x red-icon fa-thumbs-down" aria-hidden="true"></i> <b id="unvote"><?echo $uvcount[0];?></b></span>
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
					  </div>-->
                  </div>
                  <!--/well-->   
               </div>
            </div>
            <div class="col-md-9 hidden">
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
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="product-details.html"><img src="<? echo $siteurl; ?>/images/product-11.jpg" alt="" class="img-respocive"></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price">$800.00</h3>
                                          <h4 class="item-title"><a href="#">Product Name Here</a></h4>
                                          <div class="item-cat">
                                             <span><a href="#">Electronics &amp; Gedgets</a></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><a href="#">7 Jan 2016 </a></span>
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
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="product-details.html"><img src="<? echo $siteurl; ?>/images/product-10.jpg" alt="" class="img-respocive"></a>
                                          <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"><i class="fa fa-check-square-o"></i></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price">$800.00</h3>
                                          <h4 class="item-title"><a href="#">Product Name Here</a></h4>
                                          <div class="item-cat">
                                             <span><a href="#">Electronics &amp; Gedgets</a></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><a href="#">7 Jan 2016 </a></span>
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
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="product-details.html"><img src="<? echo $siteurl; ?>/images/product-9.jpg" alt="" class="img-respocive"></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price">$800.00</h3>
                                          <h4 class="item-title"><a href="#">Product Name Here</a></h4>
                                          <div class="item-cat">
                                             <span><a href="#">Electronics &amp; Gedgets</a></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><a href="#">7 Jan 2016</a></span>
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
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="product-details.html"><img src="<? echo $siteurl; ?>/images/product-8.jpg" alt="" class="img-respocive"></a>
                                          <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"><i class="fa fa-check-square-o"></i></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price">$800.00</h3>
                                          <h4 class="item-title"><a href="#">Product Name Here</a></h4>
                                          <div class="item-cat">
                                             <span><a href="#">Electronics &amp; Gedgets</a></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><a href="#">7 Jan 2016 </a></span>
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
                              </div>
                              <!--/row-fluid-->
                           </div>
                           <!--/item-->
                           <div class="item">
                              <div class="row-fluid">
                                 <!-- featured -->
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="product-details.html"><img src="<? echo $siteurl; ?>/images/product-7.jpg" alt="" class="img-respocive"></a>
                                          <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"><i class="fa fa-check-square-o"></i></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price">$800.00</h3>
                                          <h4 class="item-title"><a href="#">Product Name Here</a></h4>
                                          <div class="item-cat">
                                             <span><a href="#">Electronics &amp; Gedgets</a></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><a href="#">7 Jan 2016 </a></span>
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
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="product-details.html"><img src="<? echo $siteurl; ?>/images/product-6.jpg" alt="" class="img-respocive"></a>
                                          <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"><i class="fa fa-check-square-o"></i></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price">$800.00</h3>
                                          <h4 class="item-title"><a href="#">Product Name Here</a></h4>
                                          <div class="item-cat">
                                             <span><a href="#">Electronics &amp; Gedgets</a></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><a href="#">7 Jan 2016  </a></span>
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
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="product-details.html"><img src="<? echo $siteurl; ?>/images/product-10.jpg" alt="" class="img-respocive"></a>
                                          <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"><i class="fa fa-check-square-o"></i></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price">$800.00</h3>
                                          <h4 class="item-title"><a href="#">Product Name Here</a></h4>
                                          <div class="item-cat">
                                             <span><a href="#">Electronics &amp; Gedgets</a></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><a href="#">7 Jan 2016 </a></span>
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
                                 <div class="col-sm-6 col-md-3 col-lg-3">
                                    <!-- featured -->
                                    <div class="featured">
                                       <div class="featured-image">
                                          <a href="product-details.html"><img src="<? echo $siteurl; ?>/images/product-11.jpg" alt="" class="img-respocive"></a>
                                          <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"><i class="fa fa-check-square-o"></i></a>
                                       </div>
                                       <!-- ad-info -->
                                       <div class="ad-info">
                                          <h3 class="item-price">$800.00</h3>
                                          <h4 class="item-title"><a href="#">Product Name Here</a></h4>
                                          <div class="item-cat">
                                             <span><a href="#">Electronics &amp; Gedgets</a></span> 
                                             <button type="submit" class="btn btn-primary btn-view-details">
                                             <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Enquiry
                                             </button>
                                          </div>
                                       </div>
                                       <!-- ad-info -->
                                       <!-- ad-meta -->
                                       <div class="ad-meta">
                                          <div class="meta-content">
                                             <span class="dated"><a href="#">7 Jan 2016  </a></span>
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
                              </div>
                              <!--/row-fluid-->
                           </div>
                           <!--/item-->
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
            <!-- <div class="col-md-3 padd-r0" style="padding-right:0;">
               <div class="well">
                  <div class="col=md-12">  <a href="#"><img src="<? echo $siteurl; ?>/images/inner-ad-1.png" class="img-responsive"></a></div>
               </div>
            </div> -->
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
	
	  
<? include "footer.php"; ?>
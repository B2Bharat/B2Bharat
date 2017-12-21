<?include "header.php";
$cid = isset($cid)?$com_obj->decid(addslashes($cid)):'';
$key=$db->singlerec("select * from company where id='$cid'");
?>
<meta name="keyword" content="<? echo $key['close_keyword'];?>">
<?
if($cid==''){
echo "<script>window.history.back();</script>";		
exit;
}
$cinfo = $db->singlerec("select company.*,register.lname,register.fname,register.img,register.country as ucon,register.email from company,register where company.user_id = register.id AND company.id = '$cid'");
if(empty($cinfo)){
echo "<script>window.history.back();</script>";		
exit;
}
$cat_name = $db->singlerec("select category_name from category where id='".$cinfo['category']."'");
$userid = $cinfo['user_id'];
$currency = $db->get_all_asso("select currencycode from currency_code where id IN(".$cinfo['ap_currency'].")");
//print_r($currency);

$cc='';
foreach($currency as $curr)
{
	$cc[]=$curr['currencycode'];
}


$curren=implode(',',$cc);

include "include/hideCompany.php";
?>
      <section id="main" class="clearfix details-page">
         <div class="container">
		 <div class="breadcrumb-section">
               <!-- breadcrumb -->
               <ol class="breadcrumb">
                  <li><a href="index.html">Home</a></li>                  
                  <li>Company Profile</li>
               </ol>
               <!-- breadcrumb -->						
               <h2 class="title">Company Profile</h2>
            </div>
            
            <div class="section banner">
               <!-- banner-form -->
               <div class="banner-form banner-form-full">
                  <?include "include/searchDivcompany.php";?>
               </div>
               <!-- banner-form -->
            </div>
			
			<?include "include/company_tap.php";?>
			
			
            <!-- banner -->
            <div class="section slider" style="padding: 24px 30px 15px;">
               <div class="row">

                  <div class="col-md-8">
                     <div class="slider-text">
                        
                        <h3 class="title"><?echo strtoupper($cinfo['name']);?></h3>
                        <!-- <p><span>Buying Offer ID :<a href="#" class="time"> ABC123</a></span>
						   <span>Valid Until : <a href="#">01/01/2017</a></span>                           
                        </p> 
						<p><span>Minimum Order Quantity :<a href="#" class="time"> 10</a></span></p>  -->
                        <span class="icon"><i class="fa fa-clock-o"></i><a href="#"><?echo date ('d-M-Y',strtotime($cinfo['create_date']));?></a></span>
                        <span class="icon"><i class="fa fa-map-marker"></i><a href="#"><?echo ucfirst($cinfo['city']);?></a></span>
                        <span class="icon label label-success" style="color:#FFF;"><i class="fa fa-user" aria-hidden="true"></i><?echo ucfirst($cinfo['type']);?> </span>
                        <!-- short-info -->
                        <div class="short-info">
                           <h4>Company Details</h4>
						   <div class="respocive-table">
						       <table class="table tbl-brder table-striped"  style="width:100%;">
							        <tbody>
									    <tr>
										    <td><strong>Company Name</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['store_name'];?></td>
										</tr>
										<tr>
										    <td ><strong>Main Products</strong></td>
											<td><strong>:</strong></td>
											<td class="mainproduct"><?echo $cinfo['main_product1'].', '.$cinfo['main_product2'];?></td>
										</tr>
										
										<tr>
										    <td><strong> Company Category  </strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cat_name[0];?></td>
										</tr>
										<tr>
										    <td><strong>Contact Person</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['fname'].' '.$cinfo['lname'];?></td>
										</tr>
										
										<tr>
										    <td><strong>Accepted Currencies</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $curren;?></td>
										</tr>
										
										<tr>
										    <td><strong>GST No.</strong></td>
											<td><strong>:</strong></td>
											<td>No</td>
										</tr>
										
										<!--<tr>
										    <td><strong>Method of Payment</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['ap_currency'];?></td>
										</tr>-->
										
										<tr>
										    <td><strong>Office Size</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['office_size'];?></td>
										</tr>
										
										<tr>
										    <td><strong>Year of Establishment</strong></td>
											<td><strong>:</strong></td>
											<td><?echo date('Y',strtotime($cinfo['start_date']));?></td>
										</tr>
										
										<tr>
										    <td><strong>Language & Communication</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['language'];
                                                                              ?></td>
                                                                                         
										</tr>
										
									</tbody>
							   </table>
						   </div>
                          
                        </div>
                        <!-- short-info -->
                        <!-- contact-with -->
                        <!-- <div class="contact-with">
                           <h4>Contact with </h4>
                           <span class="btn btn-red show-number">
                           <i class="fa fa-comment-o" aria-hidden="true"></i>
                           <span class="hide-text"> Contact Details</span> 
                           <span class="hide-number">+97 987 654 3210</span>
                           </span>
                           <a href="#" class="btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                           Send Enquiry</a>
                        </div> -->
                        <!-- contact-with -->
                        <!-- social-links -->
                        
                        <!-- social-links -->						
                     </div>
                  </div>
				  
				  
				  <div class="col-md-4">
				     <div class="short-info text-center">
					    <h4 class="text-center">Contact Person</h4>
						<?if(file_exists("$siteurl/uploads/user_images/".$cinfo['img'])){?>
							<img src="<?echo $siteurl;?>/uploads/user_images/<?echo $cinfo['img'];?>" class="tbl-brder" width="150" height="150" >
						<?}else{?>
						<img src="<?echo $siteurl;?>/uploads/user_images/noimage.jpg" class="tbl-brder" width="150" height="150" >
						<?}?>
						<div class="well mt10">
						    <table class="table tbl-brder table-striped"  style="width:100%;">
							        <tbody>
									    <tr>
										    <td><strong>Name</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['fname'].' '.$cinfo['lname'];?></td>
										</tr>
										
										<tr>
										    <td><strong>User Type</strong></td>
											<td><strong>:</strong></td>
											<td><?echo ucfirst($cinfo['type']);?></td>
										</tr>
										
										<tr>
										    <td><strong>Country</strong></td>
											<td><strong>:</strong></td>
											<td><?echo ucfirst($com_obj->getCountry($cinfo['ucon']));?></td>
										</tr>
										
										<tr>
										    <td><strong> Company Address</strong></td>
											<td><strong>:</strong></td>
											<td><?echo ucwords($cinfo['street']).' , '.ucwords($cinfo['city']).' , '.$cinfo['zip_code'];?></td>
										</tr>
									</tbody>
							</table>
						</div>
						
					
						
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
                         <h4 style="border:solid 1px;">Description</h4>
                        <?echo $cinfo['company_intro'];?>
                     </div>
                  </div>
                  <!-- description -->
                  <!-- description-short-info -->
                  <div class="col-md-4">
                     <div class="short-info">
                          <ul>
						     
							<?php 
							if($cinfo['email']<>'')
							 {?> 
							 <li><i class="fa fa-envelope-o" title ="company email" aria-hidden="true"></i><a href="mailto:<?echo $cinfo['email'];?>"> <?echo $cinfo['email'];?></a></li>
							
<?PHP } ?>
							
							<?php 
							if($cinfo['website']<>'')
							 {?>
							 <li><i class="fa fa-globe" aria-hidden="true"></i>
							 <a href="<?php $link = $cinfo['website'];$link = (0 === strpos($link, 'http')) ? $link : 'http://' . $link; echo $link;?>" target="_blank"> <?echo $cinfo['website'];?></a></li>
							 <?PHP } ?>
							 
							 
							 <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?echo ucfirst($com_obj->getCountry($cinfo['ucon']));?>
						  </ul>
                          <div class="embed-responsive embed-responsive-16by9">
						  
						  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDHSvxBGz4cFL989BTKSJrgDe0iTQ7wNww&q=<?echo $cinfo['city'];?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						  
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
                                          <ul class="nav nav-tabs"  role="tablist"  >
                                              <li role="presentation" class="active" ><a href="#tc" aria-controls="tc" role="tab" data-toggle="tab"><i  class="fa fa-gavel"></i> &nbsp; Company Policies</a></li>
						<li role="presentation" ><a href="#details" aria-controls="details" role="tab" data-toggle="tab"><i  class="fa fa-camera"></i> &nbsp; Image Gallery</a></li>
						<li role="presentation"><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab"> <i class="fa fa-certificate"></i> &nbsp; Certification Achieved </a></li>
						
						
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content well">
					  
					  <div role="tabpanel" class="tab-pane active" id="tc">
						
						<div class=" col-md-12 well">
                                                    <div class="santosh" >
                                                        <h4>Terms And Conditions</h4>
						        <p><?echo $cinfo['terms_con'];?></p>
                                                      </div>
                                                        
						    <div class="santosh" >
                                                        <h4>Our Policies</h4>
                                                        <p><?echo $cinfo['company_policy'];?></p>
                                                    </div>
                                                    
                                                      <div class="santosh" > 
                                                            <h4> Payment Terms & Method</h4>
                                                            <p><?echo $cinfo['payment_terms'];?></p>
                                                      </div>
                                                    
                                                       <div class="santosh" > 
                                                            <h4> Quality Control Policy</h4>
                                                           <p><?echo $cinfo['qc_policy'];?></p>
                                                       </div>
						   </div>
						   
						</div>
					  
					  
						<div role="tabpanel" class="tab-pane" id="details">
						  <h4>Image Gallery</h4>
						  <div class="row">
						    <div class="col-sm-3">
							    <img src="<?echo $siteurl;?>/uploads/company/logo/<?echo $cinfo['logo'];?>" alt="" class="img-respocive zm-in">
							</div>
							
							
						</div>
						     
						</div>
						<div role="tabpanel" class="tab-pane" id="photos">
						  <h4>Certification Achieved</h4>
						  <div class="row">
						  <div class="col-md-6">
						    <table class="table table-striped tbl-brder">
							   <tbody>
							      <tr> 
								     <td><b>
									 <?php $COM_certificates = explode(',',$cinfo['certification']);
											$COM_certificates = array_unique($COM_certificates);
										$ccert='';	
									foreach($PS_certificate as $key2=>$certi){

								if($key2>0){

								  if(in_array($key2,$COM_certificates))

									  $ccert[]= $certi;

								  else

									  $ccert[]="";
									}}
									?>
									 
									 <?php echo implode(",",array_filter($ccert));?></b></td>
									 <!--<td><input type="checkbox" checked></td>-->
								  </tr>
								  <!--<tr> 
								     <td><b>QS-9000</b></td>
									 <td><input type="checkbox"></td>
								  </tr>
								  <tr> 
								     <td><b>ISO 14001:2004</b></td>
									 <td><input type="checkbox" checked></td>
								  </tr>
								  <tr> 
								     <td><b>ISO/TS 16949</b></td>
									 <td><input type="checkbox"></td>
								  </tr>
								  <tr> 
								     <td><b>SA8000</b></td>
									 <td><input type="checkbox"></td>
								  </tr>
								  <tr> 
								     <td><b>ISO 17799</b></td>
									 <td><input type="checkbox" checked></td>
								  </tr>
								  <tr> 
								     <td><b>OHSAS 18001</b></td>
									 <td><input type="checkbox" checked></td>
								  </tr>
								  <tr> 
								     <td><b>TL 9000</b></td>
									 <td><input type="checkbox"></td>
								  </tr>
								  <tr> 
								     <td><b>CMM</b></td>
									 <td><input type="checkbox"></td>
								  </tr>
								  <tr> 
								     <td><b>IEEE</b></td>
									 <td><input type="checkbox" checked></td>
								  </tr>
								  <tr> 
								     <td><b>ANSI</b></td>
									 <td><input type="checkbox" checked></td>
								  </tr>
								  <tr> 
								     <td><b>Others</b></td>
									 <td><input type="checkbox"></td>
								  </tr>-->
							   </tbody>
							</table>
						</div>
						</div>
						
						</div>
						
						
						
						 
						
					  </div>
					  

					</div>
					
					
                  </div>
                  <!--/well-->   
				  
				  
               </div>
			   
            </div>
            
			<!-- include/buissList.php -->
			
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
                  <a href="ad-post.html" class="btn btn-primary">Post Your Ad</a>
               </div>
            </div>
            <!-- row -->
         </div>
         <!-- contaioner -->
      </section>
      <!-- download -->	
	  <style>
	 .nav-tabs>li{    background-color: #774040 !important;}
	 .nav-tabs>li>a{ color:#FFF; font-weight:100;}
	</style>
<?include "footer.php";?>      
<?include "header.php";
$cid = isset($cid)?$com_obj->decid(addslashes($cid)):'';
if($cid==''){
echo "<script>window.history.back();</script>";		
exit;
}
$cinfo = $db->singlerec("select company.*,register.lname,register.fname,register.img,register.country as ucon,register.email,register.state as ustate,register.address as uaddress,register.zip_code as uzip from company,register where company.user_id = register.id AND company.id = '$cid'");
if(empty($cinfo)){
echo "<script>window.history.back();</script>";		
exit;
}
$cat_name = $db->singlerec("select category_name from category where id='".$cinfo['category']."'");
$userid = $cinfo['user_id'];
$currency = $db->get_all_asso("select currencycode from currency_code where id IN(".$cinfo['ap_currency'].")");

$ln=$db->get_all_asso("select name from language where id IN(".$cinfo['language'].")");
//print_r($ln);
//print_r($currency);
$lg='';
foreach ($ln as $l)
{
    $lg[] =$l['name'];
}
$cc='';
foreach($currency as $curr)
{
	$cc[]=$curr['currencycode'];
}


$curren=implode(',',$cc);
$lan =implode(',',$lg);
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
            <div class="col-md-12">
              <div class="slider-text">
                <h3 class="title"><?echo strtoupper($cinfo['name']);?></h3>
                <!-- <p><span>Buying Offer ID :<a href="#" class="time"> ABC123</a></span>
                  <span>Valid Until : <a href="#">01/01/2017</a></span>                           
                                 </p> 
                  <p><span>Minimum Order Quantity :<a href="#" class="time"> 10</a></span></p>  -->
                <span class="icon"><i class="fa fa-clock-o"></i><a href="#"><?echo date ('d-M-Y',strtotime($cinfo['create_date']));?> </a></span>
                <span class="icon"><i class="fa fa-map-marker"></i><a href="#"><?echo ucfirst($cinfo['city']);?></a></span>
                <span class="icon label label-success" style="color:#FFF;"><i class="fa fa-user" aria-hidden="true"></i><?echo ucfirst($cinfo['type']);?> </span>
                <!-- short-info -->
                <div class="short-info">
				<div class="row">
                  <div class="col-md-8">
				  
				    <div class=" form-group model-name">
					    <h3>Company Contact Details</h3>
					</div>
					
					<div class=" form-group model-name">
					    <label class="col-sm-4">Company Name: </label>
						<label class="col-sm-8"><?echo ucfirst($cinfo['name']);?></label>
					</div>
					
					<div class=" form-group model-name">
					<?php if($cinfo['phone']!="" && $cinfo['phone']!="0"){ ?>
					    <label class="col-sm-4">Contact Number: </label>
						<label class="col-sm-8"><?echo $cinfo['phone'];?></label>
						<?php } ?>
					</div>
					
					<div class=" form-group model-name">
					    <label class="col-sm-4">Country : </label>
						<label class="col-sm-8"><?$country = $db->singlerec("select nicename from countries where id='".$cinfo['country']."'");
						echo ucfirst($country[0]);
						?></label>
					</div>
					
					<div class=" form-group model-name">
					    <label class="col-sm-4">Address : </label>
						<label class="col-sm-8"><?echo ucwords($cinfo['street']);?></label>
					</div>
					
					<div class=" form-group model-name">
					    <label class="col-sm-4">Postal Code : </label>
						<label class="col-sm-8"><?echo $cinfo['uzip'];?></label>
					</div>
                  </div>
				  
				  
				  <div class="col-md-4">
				  
				    <div class=" form-group model-name">
					    <h3>Contact Person Details</h3>
					</div>
					
					<div class=" form-group model-name">
					    <label class="col-sm-4">Contact Person: </label>
                                            <label class="col-sm-8"><?echo ucfirst($cinfo['fname']).' '.ucfirst($cinfo['lname']);?> <br /><br /></label>
					</div>
					
					<div class="form-group model-name">
					    <label class="col-sm-4">Country : </label>
						<label class="col-sm-8"><?echo ucfirst($com_obj->getCountry($cinfo['ucon']));?></label>
                                        </div>
					
					
					<div class=" form-group model-name">
					    <label class="col-sm-4">Address : </label>
						<label class="col-sm-8"><?echo ucwords($cinfo['uaddress']);?></label>
					</div>
					
					<div class=" form-group model-name">
					    <label class="col-sm-4">Postal Code : </label>
						<label class="col-sm-8"><?echo $cinfo['uzip'];?></label>
					</div>

                  </div>
				  
                  
                  <div class="row tablerew">
                    <div class="respocive-table">
                      
					  <div class="col-md-8 ">
					  
					  <h4>Company Details</h4>
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
											<td class="mainproduct"><? $text=$cinfo['main_product1'].', '.$cinfo['main_product2'];
                                                                                            $newtext = wordwrap($text, 60, "<br />\n");
                                                                                            echo $newtext;?></td>
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
										    <td><strong>No.Of Employees </strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['emp_count'];?></td>
										</tr>
										
										
<!--                          <tr>
                            <td><strong>Accept Escrow Service</strong></td>
                            <td><strong>:</strong></td>
                            <td>No</td>
                          </tr>-->
                          <!--<tr>
                            <td><strong>Method of Payment</strong></td>
                            <td><strong>:</strong></td>
                            <td>Cash</td>
                          </tr>-->
                         <tr>
										    <td><strong>Accepted Currencies</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $curren;?></td>
										</tr>
                          <tr>
										    <td><strong>GST No.</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['gst_no'];?></td>
										</tr>
                        <tr>
										    <td><strong>Average Lead Time.</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['avg_lead_time'];?></td>
										</tr>
                                                                                <tr>
										    <td><strong>Office Size</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $cinfo['office_size'];?></td>
										</tr>
                                                                                <tr>
										    <td><strong>Year of Registration</strong></td>
											<td><strong>:</strong></td>
											<td><?echo date('Y-d-m',strtotime($cinfo['start_date']));?></td>
										</tr>
										
										<tr>
										    <td><strong>Language & Communication</strong></td>
											<td><strong>:</strong></td>
											<td><?echo $lan;?>
                                                                             </td>
                                                                                         
										</tr>
                        </tbody>
                      </table>
					  </div>
					  <div class="col-md-4">
					    <h4> Social Links</h4>
					     <ul class="soc-list">
						    <li>
							   <a href="<? if(empty($cinfo['facebook'])) {echo $cinfo['facebook'];} else {echo "javascript:;";} ?>" target="_blank">
							      <i class="fa facebook fa-facebook-square" aria-hidden="true"></i><h4>Facebook</h4>
							   </a>
							</li>
							
							<li>
							   <a href="<? if(empty($cinfo['twitter'])) {echo $cinfo['twitter'];} else {echo "javascript:;";} ?>" target="_blank">
							      <i class="fa twitter fa-twitter-square" aria-hidden="true"></i><h4>Twitter</h4>
							   </a>
							</li>
							
							<li>
							   <a href="<? if(empty($cinfo['gplus'])) {echo $cinfo['gplus'];} else {echo "javascript:;";} ?>" target="_blank">
							      <i class="fa gplus fa-google-plus-square" aria-hidden="true"></i><h4>Googleplus</h4>
							   </a>
							</li>
							
							<li>
							   <a href="<? if(empty($cinfo['flickr'])) {echo $cinfo['flickr'];} else {echo "javascript:;";} ?>" target="_blank">
							      <i class="fa flickr fa-flickr" aria-hidden="true"></i>
								  <h4>Flickr</h4>
							   </a>
							</li>
							
							<li>
							   <a href="<? if(empty($cinfo['youtube'])) {echo $cinfo['youtube'];} else {echo "javascript:;";} ?>" target="_blank">
							      <i class="fa youtube fa-youtube-play" aria-hidden="true"></i><h4>Youtube</h4>
							   </a>
							</li>
						 </ul>
					  </div>
                    </div>
                  </div>
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
            <!-- <div class="col-md-3">
              <div class="short-info text-center">
                <h4 class="text-center">Contact Person</h4>
                <img src="images/profile-3.png" class="img-circle tbl-brder" width="150" >
                <div class="well mt10">
                  <table class="table tbl-brder table-striped"  style="width:100%;">
                    <tbody>
                      <tr>
                        <td><strong>Name</strong></td>
                        <td><strong>:</strong></td>
                        <td>Person Name Here</td>
                      </tr>
                      <tr>
                        <td><strong>User Type</strong></td>
                        <td><strong>:</strong></td>
                        <td>Seller</td>
                      </tr>
                      <tr>
                        <td><strong>Country</strong></td>
                        <td><strong>:</strong></td>
                        <td>Muscat , Oman</td>
                      </tr>
                      <tr>
                        <td><strong> Company Address</strong></td>
                        <td><strong>:</strong></td>
                        <td>Ghala Industrial Area </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> -->
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
                <p align="justify"><?echo $cinfo['company_intro'];?></p>
              </div>
            </div>
            <!-- description -->
            <!-- description-short-info -->
            <div class="col-md-4">
              <div class="short-info">
                <ul>								<?PHP									if($cinfo['email']<>'')							 {?> 
                  <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?echo $cinfo['email'];?>"> <?echo $cinfo['email'];?></a></li>							 <?PHP } ?>							 							 <?php 							if($cinfo['website']<>'')							 {?>
                  <li><i class="fa fa-globe" aria-hidden="true"></i><a href="<?echo $cinfo['website'];?>" target="_blank"> <?echo $cinfo['website'];?></a></li> <?PHP } ?>  <?PHP if($cinfo['ucon']<>'')							 {?>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?echo ucfirst($com_obj->getCountry($cinfo['ucon']));?></li> <?PHP } ?>
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
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#pt" aria-controls="pt" role="tab" data-toggle="tab"><i class="fa fa-check-square"></i> &nbsp; Statutory Profile</a></li>
				  <li role="presentation"><a href="#tm" aria-controls="tm" role="tab" data-toggle="tab"><i class="fa fa-check-square"></i> &nbsp; Trade Details</a></li>
				  <li role="presentation" ><a href="#tc" aria-controls="tc" role="tab" data-toggle="tab"><i class="fa fa-gavel"></i> &nbsp;Production Details</a></li>
                  <li role="presentation" ><a href="#details" aria-controls="details" role="tab" data-toggle="tab"><i class="fa fa-camera"></i> &nbsp; Image Gallery</a></li>
                  <li role="presentation"><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab"> <i class="fa fa-certificate"></i> &nbsp; Certification Achieved </a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content well">
				  <div role="tabpanel" class="tab-pane active" id="pt">
				    <div class="row">
					<div class="col-md-8">
					   <table class="table tbl-brder table-striped" >
                        <tbody>
                          <tr>
                            <td><strong>Web Site</strong></td>
                            <td><strong>:</strong></td>
                            <td><a href="<?echo $cinfo['website'];?>" target="_blank"><?echo $cinfo['website'];?></a></td>
                          </tr>
                           <tr>
                            <td><strong>GST. No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['gst_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>PAN No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['pan_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>REG. No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['reg_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>REG.AUTHENTICATION</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['reg_auth'];?></td>
                          </tr>
                           <tr>
                            <td><strong>CIN No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['cin_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>TAN No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['tan_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>PAN No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['pan_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>SERVICE TAX NO.</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['service_tax_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>EXCISE REGISTER No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['excise_reg_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>VAT No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['vat_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>DGFT NO</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['dgft_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>CST No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['cst_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>SSI/MSME No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['ssimsme_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>EPF No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['epf_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>ESI No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['esi_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>SCT No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['sct_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>DNB No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['dnb_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>RBI No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['rbi_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>FSSAI-LISCENCE No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['fssai_liscene_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>NSIC No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['nsic_no'];?></td>
                          </tr>
                           <tr>
                            <td><strong>SST No</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['sst_no'];?></td>
                          </tr>
                          
<!--                          <tr>
                            <td><strong>Office Size</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['office_size'];?></td>
                          </tr>
                          <tr>
                            <td><strong>Year Established </strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo date('Y',strtotime($cinfo['start_date']));?></td>
                          </tr>
                          <tr>
                            <td><strong>Total No. Employees</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['emp_count'];?></td>
                          </tr>
                          
                          -->
                        </tbody>
                      </table>
					  </div>
					</div>
				  </div>
				  
				  <div role="tabpanel" class="tab-pane" id="tm">
				  
				    <div class="row">
					<div class="col-md-8">
					   <table class="table tbl-brder table-striped" >
                        <tbody>
                          <tr>
                            <td><strong>Main Clients</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['main_clients'];?></td>
                          </tr>
                           <tr>
                            <td><strong>Main Products3</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['main_product3'];?> </td>
                          </tr>
			 <tr>
                            <td><strong>Main Products4</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['main_product4'];?> </td>
                          </tr>
                          <tr>
                            <td><strong>Accepted Delievery Terms</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['ad_terms'];?> </td>
                          </tr>
                           <tr>
                            <td><strong>Packaging Details</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['other_product'];?> </td>
                          </tr>
                           <tr>
                            <td><strong>Average Lead Time</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['avg_lead_time'];?></td>
                          </tr>
                           <tr>
                            <td><strong>Compliance</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['qc_policy'];?></td>
                          </tr>
                           <tr>
                            <td><strong>Product Sample facility</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['acpt_order'];?></td>
                          </tr>
                           <tr>
                            <td><strong>Product Tours facility</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['trade_show'];?></td>
                          </tr>
<!--                          <tr>
                            <td><strong>Year of Registration</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo date('Y-d-m',strtotime($cinfo['registration_date']));?></td>
                          </tr>-->
<!--                          <tr>
                            -->
<!--                          <tr>
                            <td><strong>Main Products1</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['main_product1'];?> </td>
                          </tr>
						  <tr>
                            <td><strong>Main Products2</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['main_product2'];?> </td>
                          </tr>-->
			
<!--                          <tr>
                            <td><strong>Production Capacity</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['production_capacity'];?></td>
                          </tr>
						  <tr>
                            <td><strong>Factory Location</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['factory_location'];?></td>
                          </tr>
						  <tr>
                            <td><strong>Factory Size</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['factory_size'];?></td>
                          </tr>-->
			
						  
                          
                        </tbody>
                      </table>
					  </div>
					</div>
				  
                                      <div class="row">
					<div class="col-md-6">
                                            <label class="col-sm-8"><h4>Export Details</h4></label>
					   <table class="table tbl-brder table-striped" >
                                               <tbody>
                                                   <tr>
                                                        <td><strong>Export Year</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><?echo $cinfo['start_date'];?></td>
                                                      </tr>
                                                      <tr>
                                                        <td><strong>Export Percentage</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><?echo $cinfo['ex_percentage'];?></td>
                                                      </tr>
                                                    <tr>
                                                        <td><strong>Main Export Market</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><?echo $cinfo['export_markets'];?></td>
                                                      </tr>
                                                    <tr>
                                                        <td><strong>Nearest port</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><?echo $cinfo['nearest_port'];?></td>
                                                      </tr>
                                                      
                                                    
                                                   
                                                   
                                                   
                                                   
                                               </tbody>
                                                  </table>
					  </div>
					</div>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
				  </div>
				   
                  <div role="tabpanel" class="tab-pane" id="tc">
                    <div class="">
                      <div class=" col-md-12 well">
<!--                        <h4>Terms And Conditions</h4>
						   <p><?echo $cinfo['terms_con'];?></p>
						   
						   <h4>Our Policies</h4>
						   <p><?echo $cinfo['company_policy'];?></p>
						   
						   <h4> Payment Terms & Method</h4>
						   <p><?echo $cinfo['payment_terms'];?></p>
						   
						    <h4> Quality Control Policy</h4>
						   <p><?echo $cinfo['qc_policy'];?></p>-->
                                 
                                        <h4>Production Details</h4>  
                                         <div class="row">
					<div class="col-md-8">
					   <table class="table tbl-brder table-striped" >
                        <tbody>
                            <tr>
                             <td><strong>Factory Address</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['factory_location'];?></td>
                          </tr>
                            <tr>
                            <td><strong>Factory Size</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['factory_size'];?></td>
                          </tr>
                           <tr>
                            <td><strong>Production Capacity</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['production_capacity'];?></td>
                          </tr>
                          <tr>
                            <td><strong>Annual Revenue</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['ann_revenue'];?></td>
                          </tr>
                          <td><strong>Major Product(Buying) you  </strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['major_product_buy'];?></td>
                          </tr>
                            <tr>
                            <td><strong>Major Product(selling) you  </strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['major_product_sell'];?></td>
                          </tr>
                        
<!--                          <tr>
                            <td><strong>Year of Registration</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo date('Y-d-m',strtotime($cinfo['registration_date']));?></td>
                          </tr>-->
<!--                          <tr>
                            <td><strong>Major Product(Buying) you  </strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['major_product_buy'];?></td>
                          </tr>
                            <tr>
                            <td><strong>Major Product(selling) you  </strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['major_product_sell'];?></td>
                          </tr>-->
<!--                          <tr>
                            <td><strong>Main Products1</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['main_product1'];?> </td>
                          </tr>
						  <tr>
                            <td><strong>Main Products2</strong></td>
                            <td><strong>:</strong></td>
                            <td><?echo $cinfo['main_product2'];?> </td>
                          </tr>-->
			
<!--                         
						 
                           
						-->
			
						  
                          
                        </tbody>
                      </table>
					  </div>
					</div>
                                        


                      </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="details">
                    <h4>Image Gallery</h4>
                    <div class="row">
                      <div class="col-sm-3">
                       <img src="<?echo $siteurl;?>/uploads/company/logo/<?echo $cinfo['logo'];?>" alt="" class="img-respocive zm-in">
                      </div>
                        <div class="col-sm-3">
							    <img src="<?echo $siteurl;?>/uploads/company/avatar/<?echo $cinfo['avatar'];?>" alt="" class="img-respocive zm-in">
							</div>
                                                      <div class="col-sm-3">
							    <img src="<?echo $siteurl;?>/uploads/company/banner/<?echo $cinfo['banner'];?>" alt="" class="img-respocive zm-in">
							</div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="photos">
                    <h4>Certification Achieved</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <table class="table table-striped tbl-brder">
                          <tbody>
<!--							<tr> 
								<td><b><?echo strtoupper($cinfo['certification']);?></b></td>
									 <td><input type="checkbox" checked></td>
							</tr>-->
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
                              <td><b>HACCP</b></td>
                              <td><input type="checkbox" checked></td>
                            </tr>
                            <tr>
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
       
	   <!-- include/buissList -->
	   
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
	<style>
	 .nav-tabs>li{    background-color: #774040 !important;}
	 .nav-tabs>li>a{ color:#FFF; font-weight:600;}
	</style>
<?include "footer.php";?>  
    
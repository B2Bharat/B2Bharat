<?
include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
$uinfo = $db->singlerec("select * from register where id='$user_id'");
$mid = isset($mid)?$mid:'';
$eid = $com_obj->decid($mid);
$readupd=$db->insertrec("update enquiries set read_status='yes' where id='$eid'");
$enquiries = $db->singlerec("select * from enquiries where id='$eid'"); 
$email=$enquiries['email'];
$userin=$db->singlerec("select * from register where email='$email'");
$com=$db->singlerec("select * from company where user_id='$userin[id]'");
?>
    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container continr-bg">
       <?php include "include/profile-left.php";?> 
        <div class="col-sm-9 col-md-9">
          <div class="mail-box well ">
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3 style="color:white;">Mail Details</h3>
                          <form action="#" class="pull-right position">
                              <div class="input-append">
                              </div>
                          </form>
                      </div>
                      <div class="inbox-body">
					  <? if($userin!=""){
						  ?>
						  <div class="col-md-6 ">
						<div class="well">
						    <ul class="mali-detail-list">
							   <li>Name of Sender : <? echo $userin['fname']."".$userin['lname']; ?></li>
							   <!--<li>Phone : <? echo $userin['mobile']; ?></li>-->
							   <li>Mobile : <? echo $userin['mobile']; ?></li>
							   <li>Answers expected in response : 
<? echo $enquiries['msg']; ?></li>
                               <li>Country : <? $country = $db->singlerec("select * from countries where id='$userin[country]'"); echo $country['nicename']; ?></li>
							</ul>
							</div>
						</div>
						<div class="col-md-6">
						<div class="well">
						    <ul class="mali-detail-list">
							   <li>Address : <? echo $userin['address']."<br>".$userin['address2']; ?></li>
							   <li>City : <? $city = $db->singlerec("select * from city where city_auto_id='$userin[city]'"); echo $city['city_name']; ?></li>
							   <li>Post Code : <? echo $userin['zip_code']; ?></li>
							   <!--<li>Posted on : Oct 4, 2016 at 5:48:56 AM</li>-->
							  
							</ul>
							</div>
						</div>
						  <?
					  }else{
						  ?>
						   <div class="col-md-12 ">
						<div class="well">
						    <ul class="mali-detail-list">
                                                        <li><strong>Name of Sender </strong>: <? echo ucwords($enquiries['name']); ?></li>
                                                           <li><strong>Address</strong> : <? echo ucwords($enquiries['enq_address']); ?></li>
                                                           <li><strong>City of Sender</strong> : <? echo ucwords($enquiries['enq_city']); ?></li>
<!--							    <li>Answers expected in response : 
                                                 <? echo $enquiries['msg']; ?></li>-->
							</ul>
							</div>
						</div>
						  <?
					  }
					  ?>
					    
						
						<? if($com!=""){
							?>
							<div class="col-md-12">
							<div class="well">
								<ul class="mali-detail-list">
								   <li>Name of Company : <? echo $com['store_name']; ?></li>
								   <li>Profile of Sender : <? echo $com['street'].",".$com['city']; ?> </li>
								   <li>Website : <? echo $com['website']; ?></li>
                                                                   
								</ul>
								</div>
							</div>
							<?
						}
						?>
<!--						<div class="col-md-12">
						<div class="well">
						    <ul class="mali-detail-list">
                                                          <h3> Enquiry Details</h3>
							   <li style="font-weight: bold;">Subject : <? echo $enquiries['sub']; ?></li>
                                                           
                                                         
                                                            <li style="font-weight: bold;">Product Name:-<? echo ucwords($enquiries['enq_prod_name']); ?></li>
							   <li style="font-weight: bold;" >Inquiry Details:-<? echo $enquiries['msg']; ?></li>
							  
                                                           <li style="font-weight: bold;">Estimated Quantity With Unit:-<? echo $enquiries['enq_quantity']." ".$enquiries['enq_unit_type']; ?></li>
                                                               
                                                             <li>Unit:-<? echo $enquiries['enq_unit_type']; ?></li>
                                                             <li style="font-weight: bold;">Approximate Order Value In INR:-<? echo $enquiries['order_value']; ?> INR</li>
                                                             <li>Approximate Order Value In INR:-<? echo $enquiries['currency_value']; ?></li>
                                                             <li style="font-weight: bold;">Preferred Supplier Location:-<? echo ucwords($enquiries['enq_supplier_location']); ?></li>
                                                                <li style="font-weight: bold;">Requirement Urgency:-<? echo ucwords($enquiries['enq_Requirement_urgency']); ?></li>
                                                                 <li style="font-weight: bold;">Requirement Frequency:-<? echo ucwords($enquiries['enq_Requirement_frequency']); ?></li>
                                                                  <li style="font-weight: bold;">Purchase of Requirement:-<? echo ucwords($enquiries['enq_Requirement_purchase']); ?></li>
                                                             
							</ul>
							</div>
						</div>-->
                                                
                                                
                                  <div class="col-md-12">
						<div class="well">
                                        <label class="col-sm-8"><h4>Enquiry Details</h4></label>
                                        <table class="table tbl-brder table-striped" >
                                            <tbody>
                                                <tr>
                                                    <td><strong>Subject</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td> <? echo $enquiries['sub']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Product Name</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td ><? echo ucwords($enquiries['enq_prod_name']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Inquiry Details</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><? echo $enquiries['msg']; ?></td>
                                                           
                                                </tr>
                                                
                                               
                                                <tr>
                                                    <td><strong>Estimated Quantity With Unit</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><? echo $enquiries['enq_quantity']." ".$enquiries['enq_unit_type']; ?></td>
                                                </tr>

                                                   <tr>
                                                    <td><strong>Approximate Order Value In INR:</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><? echo $enquiries['order_value']." ".strtoupper($enquiries['currency_value']); ?>/-</td>
                                                           
                                                </tr>
                                                <tr>
                                                    <td><strong>Preferred Supplier Location</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><? echo ucwords($enquiries['enq_supplier_location']); ?></td>
                                                           
                                                </tr>
                                                <tr>
                                                    <td><strong>Requirement Urgency:</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><? echo ucwords($enquiries['enq_Requirement_urgency']); ?></td>
                                                           
                                                </tr>
                                                  <tr>
                                                    <td><strong>Requirement Frequency:</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><? echo ucwords($enquiries['enq_Requirement_frequency']); ?></td>
                                                           
                                                </tr>
                                                  <tr>
                                                    <td><strong>Purchase of Requirement</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><? echo ucwords($enquiries['enq_Requirement_purchase']); ?></td>
                                                           
                                                </tr>




                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
						  <div class="col-md-12 text-center  ">
						  <a href="<?echo $siteurl;?>/email-compose/<?echo $mid;?>/replay" class="btn view-more-btn-3-1" ><i class="fa fa-envelope-o" aria-hidden="true"></i> Reply </a>
							  <a href="<?echo $siteurl;?>/email-inbox/<?echo $mid;?>/inbox" class="btn view-more-btn-3-1"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
							 <div class="mt10"></div>
						  </div>
                      </div>
                  </aside>
              </div>
        
      </div>
	  <!-- include/buissList.php -->
      <!-- container -->
    </div>
<?php include "footer.php"; ?>   
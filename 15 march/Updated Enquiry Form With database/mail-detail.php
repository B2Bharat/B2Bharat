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
                          <h3>Mail Details</h3>
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
						   <div class="col-md-6 ">
						<div class="well">
						    <ul class="mali-detail-list">
							   <li>Name of Sender : <? echo $enquiries['name']; ?></li>
							    <li>Answers expected in response : 
                                                 <? echo $enquiries['msg']; ?></li>
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
						<div class="col-md-12">
						<div class="well">
						    <ul class="mali-detail-list">
							   <li style="font-weight: bold;">Subject : <? echo $enquiries['sub']; ?></li>
                                                           
                                                           <h3> Enquiry Details</h3>
							   <li >Inquiry Details:-<? echo $enquiries['msg']; ?></li>
							  
                                                           <li style="font-weight: bold;">Estimated Quantity With Unit:-<? echo $enquiries['enq_quantity']." ".$enquiries['enq_unit_type']; ?></li>
                                                               
                                                             <!--<li>Unit:-<? echo $enquiries['enq_unit_type']; ?></li>-->
                                                             <li style="font-weight: bold;">Approximate Order Value In INR:-<? echo $enquiries['order_value']; ?> INR</li>
<!--                                                             <li>Approximate Order Value In INR:-<? echo $enquiries['currency_value']; ?></li>-->
                                                             <li style="font-weight: bold;">Preferred Supplier Location:-<? echo ucwords($enquiries['enq_supplier_location']); ?></li>
                                                                <li style="font-weight: bold;">Requirement Urgency:-<? echo ucwords($enquiries['enq_Requirement_urgency']); ?></li>
                                                                 <li style="font-weight: bold;">Requirement Frequency:-<? echo ucwords($enquiries['enq_Requirement_frequency']); ?></li>
                                                                  <li style="font-weight: bold;">Purchase of Requirement:-<? echo ucwords($enquiries['enq_Requirement_purchase']); ?></li>
                                                             
							</ul>
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
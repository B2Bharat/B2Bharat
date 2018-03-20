<!--section---------START-------FEEDBACK---SECTION-------->
<div class="container-fluid feedback_bg">
    <div class="container">
        <div class="row">
            <ul>
                <li><a class="sr_sec" href="<?echo $siteurl;?>/success-stories">Success Stories</a></li>
               <!-- <li><a class="fbw_sec"href="<?echo $siteurl;?>/sellers-sell">Free Business Website</a></li>-->
                <li><a class="mhy_sec"href="<?echo $siteurl;?>/complaint_form">May I Help You</a></li>
                <li><a class="syf_sec" href="<?echo $siteurl;?>/feedback_form">Send Your Feedback</a></li>
            </ul>
        </div>
    </div>
</div>

<!--section---------CLOSE-------FEEDBACK---SECTION------->

<!--section---------START-------FOOTER-------->
<footer>
    <div class="top fot_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="clearfix"></div>
                    <div class="block block-subscribe"> <img src="images/tradealert.png"/><br>
                        <div id="actionMessage_newsletter"></div>
                        <div class="form-group">Type your name and email address to get weekly updates on your favorite products and stores.</div>
                        <div class="newsletter_sec">
                            <div class="span12">
                                <div class="thumbnail center well well-small text-center">
                                    <form action="" method="post">
                                        <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                                            <input type="text" id="" name="subs_name" placeholder="enter name" required>
                                        </div>
                                        <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                                            <input type="email" id="" name="subs_email" placeholder="your@Email.com" required>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn btn-large btn-primary" name="subs_news">Subscribe Now!</button>

                                    </form>
                                    <?
                                    if(isset($subs_news)){
                                    $subs_email = isset($subs_email)?$db->escapstr($subs_email):'';
                                    $subs_name = isset($subs_name)?$db->escapstr($subs_name):'';
                                    $subs_date = time();
                                    $db->insertrec("insert into subscribers (name,email,date,status) values ('$subs_name','$subs_email','$subs_date','1')");
                                    echo "<script>swal('Success!','Newsletter subscribed successfully!','success')</script>";
                                    }
                                    if(isset($unsubs_news)){
                                    if($unsubs_news=='true'){
                                    $subs_email = isset($subs_email)?$db->escapstr($subs_email):'';
                                    $subs_email = base64_decode($subs_email);
                                    $subs_date = time();
                                    $db->insertrec("update subscribers set status='0' where email='$subs_email'");
                                    echo "<script>swal('Success!','Newsletter unsubscribed successfully!','success')</script>";
                                    }	
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                        <div id="newsletter_loader_process" style="display:none;"><i class="fa fa-circle-o-notch fa-spin"></i></div>
                    </div>
                </div>
                <div class="col-md-9 footer_right">
                    <div class="row">
                        <div class="col-md-4">

                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/index">Home</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/about-us">About Us</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/selling-leads-list">Selling Leads</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/buying-leads-list">Buying Leads</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/product-list">All Products</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/company-list">Companies</a></li>
                            </ul>
                        </div> 
                        <div class="col-md-4">

                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/classifieds">Classifieds</a></li>
                                <!--<li><i class="fa fa-angle-right"></i> <a href="#">Biz Directory</a></li>-->
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/sellers">Suppliers</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/buyers">Buyers</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/trade-show-list">Trade Shows</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/success-stories">Success Stories</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/articles">Blog</a></li>
                            </ul> 
                        </div>
                        <div class="col-md-4">

                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/profile">My Account</a></li>
                                <!--<li><i class="fa fa-angle-right"></i> <a href="#">Merchant account</a></li>-->
                                <!--<li><i class="fa fa-angle-right"></i> <a href="#">Buyers &amp; Sellers Guide</a></li>-->
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/privacy-policy">Privacy Statement</a></li>
                                <!--<li><i class="fa fa-angle-right"></i> <a href="#">FAQ</a></li>-->
                                <li><i class="fa fa-angle-right"></i> <a href="<?echo $siteurl;?>/sitemap">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mid_back_col">
                        <div class="col-md-12 col-sm-12 col-xs-12 footer_sec"> <span class="bold">All Categories:</span> 
                            <a href="javascript:void(0)" onclick="cats('a');"> A</a>
                            | <a href="javascript:void(0)" onclick="cats('b');"> B</a>
                            | <a href="javascript:void(0)" onclick="cats('c');"> C</a>
                            |<a href="javascript:void(0)" onclick="cats('d');"> D</a>
                            |<a href="javascript:void(0)" onclick="cats('e');"> E</a>
                            |<a href="javascript:void(0)" onclick="cats('f');"> F</a>
                            |<a href="javascript:void(0)" onclick="cats('g');"> G</a>
                            | <a href="javascript:void(0)" onclick="cats('h');"> H</a>
                            |<a href="javascript:void(0)" onclick="cats('i');"> I</a>
                            |<a href="javascript:void(0)" onclick="cats('j');"> J</a>
                            |<a href="javascript:void(0)" onclick="cats('k');"> K</a>
                            |<a href="javascript:void(0)" onclick="cats('l');"> L</a>
                            |<a href="javascript:void(0)" onclick="cats('m');"> M</a>
                            |<a href="javascript:void(0)" onclick="cats('n');"> N</a>
                            |<a href="javascript:void(0)" onclick="cats('o');"> O</a>
                            |<a href="javascript:void(0)" onclick="cats('p');"> P</a>
                            |<a href="javascript:void(0)" onclick="cats('q');"> Q</a>
                            |<a href="javascript:void(0)" onclick="cats('r');"> R</a>
                            |<a href="javascript:void(0)" onclick="cats('s');"> S</a> 
                            |<a href="javascript:void(0)" onclick="cats('t');"> T</a>
                            |<a href="javascript:void(0)" onclick="cats('u');"> U</a>
                            |<a href="javascript:void(0)" onclick="cats('v');"> V</a>
                            |<a href="javascript:void(0)" onclick="cats('w');"> W</a>
                            |<a href="javascript:void(0)" onclick="cats('x');"> X</a>
                            |<a href="javascript:void(0)" onclick="cats('y');"> Y</a>
                            |<a href= "javascript:void(0)" onclick="cats('z');"> Z</a>
                        </div> 

                        <div class="footer_sec" id="catsdata">


                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <? 
                    $Furls=$db->singlerec("select fburl,twurl,gplusurl,linkedinurl from general_setting where id='1'");
                    ?>

                    <div class="social"> Always stay connected with us..<br>
                        <br>
                        <a href="<?echo $Furls[0];?>" target="_blank" class="facebook" title="Facebook"><span><i class="fa fa-facebook"></i></span></a> 
                        <a href="<?echo $Furls[1];?>" target="_blank" class="twitter" title="Twitter"><span><i class="fa fa-twitter"></i></span></a>
                        <a href="<?echo $Furls[2];?>" target="_blank" class="googleplus" title="Google Plus"><span><i class="fa fa-google-plus"></i></span></a>
                        <a href="https://www.youtube.com" target="_blank" class="youtube" title="You Tube"><span><i class="fa fa-youtube"></i></span></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>




<!--modal send enquiry-->
<div class="modal fade bs-example-modal-sm" id="send-an-inquiry" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header model-head">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 style="color:white;" class="modal-title text-center" id="mySmallModalLabel">Send Enquiry</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" id="single-eq" action="send-enquiry.php">
                            <div class="form-group">
                                <label for="exampleInputname">Name <span class="required">*</span></label>
                                <input type="text" class="form-control form-height" placeholder="Enter your Name" id="exampleInputname" name="enq_name1" required>
                                <input type="hidden" name="enq_name2"   id="enq_name2" value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address <span class="required">*</span></label>
                                <input type="email" class="form-control form-height" placeholder="Enter your mail address" id="exampleInputEmail1" name="enq_email" required>
                                <input type="hidden" name="enq_to" id="enq_to" value="">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputPassword1">Address <span class="required">*</span></label>
                                <input type="text" placeholder="Enter Your Address" class="form-control form-height" id="exampleInputPassword1" name="enq_address"   pattern="[0-9]{10}"  required>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputPassword1">City<span class="required">*</span></label>
                                <input type="text" placeholder="Enter Your city" class="form-control form-height" id="exampleInputPassword1" name="enq_city"  maxlength="10"  pattern="[0-9]{10}"  required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone Number <span class="required">*</span></label>
                                <input type="text" placeholder="Enter Your Phone Number" class="form-control form-height" id="exampleInputPassword1" name="enq_phone"  maxlength="10"  pattern="[0-9]{10}"  required>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputsub">Subject <span class="required">*</span></label>
                                <input type="text" placeholder="Enter Your Subject"class="form-control form-height" id="exampleInputsub" name="enq_subject" required>
                            </div>
                            
                             <div class="form-group">
                                <label for="exampleInputsub">Product Name <span class="required">*</span></label>
                                <input type="text" placeholder="Enter Your Product Name"class="form-control form-height" id="exampleInputsub" name="enq_prod_name" required>
                            </div>
                            
                            
                              <div class="row form-group">
                                <label class="col-sm-3 label-title">Estimated Quantity <span class="required">*</span></label>
                                <div class="col-sm-9 row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input maxlength="8"    type="text" pattern="^[1-9][0-9]{0,7}" class="form-control form-height" name="enq_quantity" id="exampleInputsub" placeholder=""  onkeydown="return (event.ctrlKey || event.altKey || (47 < event.keyCode && event.keyCode < 58 && event.shiftKey == false) || (95 < event.keyCode && event.keyCode < 106) || (event.keyCode == 8) || (event.keyCode == 9) || (event.keyCode > 34 && event.keyCode < 40) || (event.keyCode == 46))" >
<!--                                             <input type="hidden" name="enq_quantity2"  id="enq_quantity2" value="">-->
                                            </div>
                                        </div> <!-- /.form-group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <select  class="form-control form-height" name="enq_unit_type">
                                            <option value="">Select Unit</option>
                                            <?
                                            $enq_unit_type = isset($enq_unit_type)?$enq_unit_type:'';
                                            echo $drop->get_dropdown($db, "select units_name,units_name from prod_units where status='0'", $enq_unit_type);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="row form-group">
                                <label class="col-sm-3 label-title">Approximate Order Value <span class="required">*</span></label>
                                <div class="col-sm-9 row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input maxlength="8"  type="text" pattern="^[1-9][0-9]{0,7}" class="form-control form-height" name="order_value" id="exampleInputsub" placeholder=""  onkeydown="return (event.ctrlKey || event.altKey || (47 < event.keyCode && event.keyCode < 58 && event.shiftKey == false) || (95 < event.keyCode && event.keyCode < 106) || (event.keyCode == 8) || (event.keyCode == 9) || (event.keyCode > 34 && event.keyCode < 40) || (event.keyCode == 46))" >
<!--                                             <input type="hidden" name="enq_quantity2"  id="enq_quantity2" value="">-->
                                            </div>
                                        </div> <!-- /.form-group -->
                                    </div>
                                    <div class="col-sm-6">
                                         <label class="col-sm-6" >Select Currency<span class="required">*</span></label>
                                      <?
							  foreach($currency_value as $St) {
							    $Stl=strtolower($St);
								echo "<input type='radio' name='currency_value' value='$Stl' id='$Stl'> <label style='padding-right:3px;' for='$Stl'>$St</label>";
							  }
							  ?>
                                         
                                                   
                                                  

                                                          
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                             <div class="row form-group">
                            <label class="col-sm-3" > Preferred Supplier Location<span class="required">*</span></label>
                            <div class="col-sm-9 user-type location">
							  <?
							  foreach($enq_supplier_location as $St) {
							    $Stl=strtolower($St);
								echo "<input type='radio' name='enq_supplier_location' value='$Stl' id='$Stl'> <label style='padding-right:10px;' for='$Stl'>$St</label>";
							  }
							  ?>
                            </div>
                          </div>
                            
                            
                            <div class="row form-group">
                            <label class="col-sm-3" > Requirement Urgency<span class="required">*</span></label>
                            <div class="col-sm-9 user-type location">
							  <?
							  foreach($enq_Requirement_urgency as $St) {
							    $Stl=strtolower($St);
								echo "<input type='radio' name='enq_Requirement_urgency' value='$Stl' id='$Stl'> <label style='padding-right:10px;' for='$Stl'>$St</label>";
                                                                
							  }
							  ?>
                            </div>
                          </div>
                            
                            
                             <div class="row form-group">
                            <label class="col-sm-3" > Requirement Frequency  <span class="required">*</span></label>
                            <div class="col-sm-9 user-type location">
							  <?
							  foreach($enq_Requirement_frequency as $St) {
							    $Stl=strtolower($St);
								echo "<input type='radio' name='enq_Requirement_frequency' value='$Stl' id='$Stl'><label style='padding-right:10px;'for='$Stl'>$St</label>";
                                                                
							  }
							  ?>
                            </div>
                          </div>
                            
                            <div class="row form-group">
                            <label class="col-sm-3" >Purchase of Requirement  <span class="required">*</span></label>
                            <div class="col-sm-9 user-type location">
							  <?
							  foreach($enq_Requirement_purchase as $St) {
							    $Stl=strtolower($St);
								echo "<input type='radio' name='enq_Requirement_purchase' value='$Stl' id='$Stl'> <label style='padding-right:10px;' for='$Stl'>$St</label>";
                                                                
							  }
							  ?>
                            </div>
                          </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Message <span class="required">*</span></label>
                                <textarea placeholder="Describe your Requirement In details" class="form-control" name="enq_msg" required></textarea>
                            </div>
                            <div class="form-group">
                                <img src="<? echo $_SESSION['captcha']['image_src']; ?>" alt="captcha">
                            </div>             
                            <div class="form-group">
                                <input type="hidden" name="cptn" value="<? echo $_SESSION['captcha']['code']; ?>">
                                <input type="text" name="cpt" class="form-control" id="inputEmail3"  placeholder="Enter The Captcha Code" required>
                            </div>

                            <div class="form-group text-center">
                                <input type="hidden" value="<? echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" name="url"> 
                                <button type="submit" class="btn view-more-btn-3-1" name="enq_submit" onclick="eqsing()"> <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Send Enquiry</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-------------- otp form---------->

<div class="modal fade bs-example-modal-sm" id="verify-otp-form" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header model-head">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title text-center" id="mySmallModalLabel">Verify OTP</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="otpcheck.php" id="otpcheck">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Enter OTP</label>
                                <input type="text" class="form-control form-height" id="fgt" name="otp" required>

                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn view-more-btn-3-1" name="otpu"> <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Verify </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bs-example-modal-sm" id="send-multiple-inquiry" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header model-head">
                <button   class="btn btn-danger" style="color:white; float:right;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 style="color:white;" class="modal-title text-center" id="mySmallModalLabel">Send Multiple Enquiries</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="send-enquiry.php" id="enq-for">
                            <div class="form-group disabled">
                                <div class="ml5" for="exampleInputEmail1" id="multiple_enqs"> </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputname"></label>
                                <input type="text" placeholder="Name" class="form-control form-height" id="exampleInputname" name="enq_name1" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <input type="email"  placeholder="Email address"class="form-control form-height" id="exampleInputEmail1" name="enq_email" required>
                                <input type="hidden" name="enqs_email" id="enqs_emails" value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"></label>
                                <input type="text" placeholder="Phone Number" class="form-control form-height" id="exampleInputPassword1" name="enq_phone" maxlength="10"  pattern="[0-9]{10}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputsub"></label>
                                <input type="text" placeholder="Subject" class="form-control form-height" id="exampleInputsub" name="enq_subject" required>
                            </div>



                          
                            <div class="form-group">
                                <label for="exampleInputPassword1"></label>
                                <textarea class="form-control" name="enq_msg" placeholder="Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <img src="<? echo $_SESSION['captcha']['image_src']; ?>" alt="captcha">
                            </div>             
                            <div class="form-group">
                                <input type="hidden" name="cptn" value="<? echo $_SESSION['captcha']['code']; ?>">
                                <input type="text" name="cpt" class="form-control" id="inputEmail3"  placeholder="Enter The Captcha Code" required>
                            </div>

                            <div class="form-group text-center">
                                <input type="hidden" value="<? echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" name="url">
                                <button type="submit" class="btn view-more-btn-3-1" name="enqs_submit" onclick="sendenquiry()"> <i class="fa fa-paper-plane" aria-hidden="true" ></i> &nbsp; Send Enquiry</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal send enquiry end -->





<!--section---------close--------------->
<div class="bottom_footer">
    <div id="footerMenu"> <a href="<?echo $siteurl;?>">Home</a> | <a href="<?echo $siteurl;?>/about-us">About Us</a> | <a href="<?echo $siteurl;?>/trade-show-list">Trade Shows</a> | <a href="<?echo $siteurl;?>/terms-and-condition">Terms And Condition</a> | <a href="<?echo $siteurl;?>/privacy-policy">Privacy Policy</a> | <a href="<?echo $siteurl;?>/contact-us">Contact Us</a> </div>
    <div class="copyright"><a href="#">Copyright 2015-2017 B2B. All rights reserved.</a></div>
</div>
<!--section---------START----lEFT---SIDEBAR-------->

<div class="left_sidebar">
    <a class="green" href="<?echo $siteurl;?>/sellers-sell">Free b2b Wtebsite</a> 
    <a class="blue" href="<?echo $siteurl;?>/send_requierment">Send Your Buy Requirement</a> </div>
<div class="right_sidebar">
    <a class="mag" href="<?echo $siteurl;?>/complaint_form">May I Help you</a>
    <a class="orange" href="<?echo $siteurl;?>/feedback_form">Send Your Feedback</a> </div>

<!-- Nav tabs -->


<!-- Tab panes -->

<!--section---------close--------lEFT---SIDEBA-------> 

<script src="<? echo $siteurl; ?>/assets/javascript/jquery.min.js"></script> 

<script src="<? echo $siteurl; ?>/assets/javascript/bootstrap.js"></script>

<script src="<? echo $siteurl; ?>/assets/js/sweetalert.min.js"></script>
<!--	<script src="<? echo $siteurl; ?>/assets/js/jquery-ui.min.js"></script> -->

<script src="<? echo $siteurl; ?>/assets/js/custom2.js"></script>


<script src="<? echo $siteurl; ?>/assets/javascript/jquery.bxslider.js"></script>


<script src="<? echo $siteurl; ?>/assets/js/modernizr.min.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/validate.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/val_rule.js"></script>

<script src="https://maps.google.com/maps/api/js?sensor=true"></script>

<script src="<? echo $siteurl; ?>/assets/js/goMap.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/map.js"></script>

<script src="<? echo $siteurl; ?>/assets/js/gmaps.min.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/owl.carousel.min.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/smoothscroll.min.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/scrollup.min.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/price-range.js"></script>  
<script src="<? echo $siteurl; ?>/assets/js/jquery.countdown.js"></script>  
<script src="<? echo $siteurl; ?>/assets/js/custom.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/switcher.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/validate.api.js"></script>
<script src="<? echo $siteurl; ?>/assets/js/tab_validate.js"></script>


<script type="text/javascript">$(document).ready(function () {
                                        $(".allcateg").click(function () {
                                            $(".innercat").toggle();

                                        });
                                        $('.a').on('click', function (e) {
                                            e.preventDefault();

                                            var target = ".container-fluid.banner_sec";
                                            var $target = $(target);
                                            console.log($target);
                                            $('html, body').stop().animate({
                                                'scrollTop': $target.offset().top - 0
                                            }, 800, 'swing', function () {
                                                // window.location.hash = target;
                                            });
                                        });
                                    });
</script> 

<script type="text/javascript">$(document).ready(function () {
        $('.b').on('click', function (e) {

            e.preventDefault();

            var target = ".container-fluid.depend_sec";
            var $target = $(target);
            console.log($target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 0
            }, 800, 'swing', function () {
                // window.location.hash = target;
            });
        });
    });
</script> 
<script type="text/javascript">$(document).ready(function () {
        $('.c').on('click', function (e) {
            e.preventDefault();

            var target = ".container-fluid.sell_bb";
            var $target = $(target);
            console.log($target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 0
            }, 800, 'swing', function () {
                // window.location.hash = target;
            });
        });
    });
</script> 
<script type="text/javascript">$(document).ready(function () {
        $('.d').on('click', function (e) {
            e.preventDefault();

            var target = ".container-fluid.serv_sec";
            var $target = $(target);
            console.log($target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 0
            }, 800, 'swing', function () {
                // window.location.hash = target;
            });
        });
    });
</script> 







<script type="text/javascript">
    $(document).ready(function () {


        $.validator.addMethod("phoneno", function (phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length >= 9 &&
                    phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
        }, "<br />Please specify a valid phone number");

        $.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters allowed");

        $.validator.addMethod("customemail",
                function (value, element) {
                    return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
                },
                "Please enter a valid email address."
                );

        $.validator.addMethod("mynumber", function (value, element) {
            return this.optional(element) || /^(\d+|\d+,\d{1,2})$/.test(value);
        }, "Please specify the correct number format");




    });





    $(document).ready(function () {

        $('#email,#pass,#cpass').bind('input', function () {

            $(this).val(function (_, v) {
                return v.replace(/\s+/g, '');
            });
        });
    });


    $(document).ready(function () {
        $("#otpcheck").validate({
            rules: {
                otp: {
                    required: true,
                    digits: true
                }
            }
        });
        var text_max = 400;
        $('#textarea_feedback').html(text_max + ' characters remaining');

        $('#message').keyup(function () {
            var text_length = $('#message').val().length;
            var text_remaining = text_max - text_length;

            $('#textarea_feedback').html(text_remaining + ' characters remaining');
        });
    });
</script>	   
<script type="text/javascript">
    function sendenquiry()
    {

        $("#enq-for").validate({
            rules:
                    {
                        "enq_phone":
                                {
                                    required: true,
                                    phoneno: true
                                },

                        "enq_name1":
                                {
                                    required: true,
                                    lettersonly: true
                                },

                        "enq_email":
                                {
                                    required: true,
                                    customemail: true
                                },

                        "enq_subject":
                                {
                                    required: true,
                                    lettersonly: true,
                                    maxlength: 30
                                }



                    }
        });
    }



    function eqsing()
    {

        $("#single-eq").validate({
            rules:
                    {
                        "enq_phone":
                                {
                                    required: true,
                                    phoneno: true
                                },

                        "enq_name1":
                                {
                                    required: true,
                                    lettersonly: true
                                },

                        "enq_email":
                                {
                                    required: true,
                                    customemail: true
                                },

                        "enq_subject":
                                {
                                    required: true,
                                    lettersonly: true,
                                    maxlength: 30
                                }



                    }
        });
    }
</script>   
<script>
    $(document).ready(function () {
        var nmelke = 'a';
        $.ajax({
            type: "POST",
            url: "<?echo $siteurl;?>/category.php",
            data: {'nmelke': nmelke},

            success: function (data) {
                $("#catsdata").html(data);

            }
        });




    });

    function notsubmit()
    {

        $("#feed-form").validate({
            rules:
                    {
                        "phone":
                                {
                                    required: true,
                                    phoneno: true
                                },

                        "name":
                                {
                                    required: true,
                                    lettersonly: true
                                },

                        "email":
                                {
                                    required: true,
                                    customemail: true
                                },

                        "Company name":
                                {
                                    required: true,
                                    lettersonly: true
                                },

                        "Country":
                                {
                                    required: true,
                                    lettersonly: true
                                },

                        "City":
                                {
                                    required: true,
                                    lettersonly: true
                                }



                    },

            submitHandler: function (form) {

                var message = $("textarea#message").val();
                var name = $("input#name").val();
                var email = $("input#email").val();
                var phone = $("input#phone").val();
                var Company_name = $("input#Company_name").val();
                var Country = $("#Country").val();
                var City = $("input#City").val();
                var dataString = 'message=' + message + '&name=' + name + '&email=' + email + '&Company_name=' + Company_name + '&Country=' + Country + '&City=' + City + '&phone=' + phone;

                if ((name == '') || (email == '') || (phone == '' && isInteger(phone)) || (Company_name == '') || (Country == '') || (City == ''))
                {
                    return false;
                } else
                {
                    $.ajax({
                        type: "POST",
                        url: "contactusmail.php",
                        data: dataString,
                        success: function (data) {

                            window.location = "<? echo $siteurl; ?>/thanks.php";
                        }
                    });
                    return false;
                }

            }



        });



    }


    function complaint()
    {

        $("#complaint-form").validate({
            rules:
                    {
                        "phone":
                                {
                                    required: true,
                                    phoneno: true
                                },

                        "name":
                                {
                                    required: true,
                                    lettersonly: true
                                },
                        "email":
                                {
                                    required: true,
                                    customemail: true
                                },

                        "Company name":
                                {
                                    required: true,
                                    lettersonly: true
                                },

                        "Country":
                                {
                                    required: true,
                                    lettersonly: true
                                },

                        "City":
                                {
                                    required: true,
                                    lettersonly: true
                                }


                    },
            submitHandler: function (form) {

                var message = jQuery("textarea#message").val();
                var name = jQuery("input#name").val();
                var email = jQuery("input#email").val();
                var phone = jQuery("input#phone").val();
                var Company_name = jQuery("input#Company_name").val();
                var Country = jQuery("#Country").val();
                var City = jQuery("input#City").val();
                var dataString = 'message=' + message + '&name=' + name + '&email=' + email + '&Company_name=' + Company_name + '&Country=' + Country + '&City=' + City + '&phone=' + phone;
                if ((name == '') || (email == '') || (phone = '') || (Company_name == '') || (Country == '') || (City == ''))
                {
                    return false;
                } else
                {
                    $.ajax({
                        type: "POST",
                        url: "compliaintmail.php",
                        data: dataString,
                        success: function (data) {
                            window.location = "<? echo $siteurl; ?>/thanks.php";
                        }
                    });
                    return false;
                }


            }



        });















    }

    function sellerSell()
    {
        var name = jQuery("input#name").val();
        var email = jQuery("input#email").val();
        var phone = jQuery("input#phone").val();
        var Company_name = jQuery("input#Company_name").val();
        var Country = jQuery("#Country").val();
        var dataString = 'name=' + name + '&email=' + email + '&Company_name=' + Company_name + '&Country=' + Country + '&phone=' + phone;

        if ((name == '') || (email == '') || (phone = '') || (Company_name == '') || (Country == ''))
        {
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "sellersmail.php",
                data: dataString,
                success: function (data) {
                    window.location = "<? echo $siteurl; ?>/thanks.php";
                }
            });
            return false;
        }
    }


    $(function () {
        $("#tabs").tabs();
    });
</script>




<script>



    $("#btn-reg").click(function () {
        var Err = 0;


        if (isEmpty($("#pack").val())) {
            $("#pack").focus();
            swal('Required!', 'Select membership pack!', 'error');
            Err++;
        } else if (isEmpty($("#fname").val())) {
            $("#fname").focus();
            swal('Required!', 'first name missing', 'error');
            Err++;
        } else if (isEmpty($("#lname").val())) {
            $("#lname").focus();
            swal('Required!', 'last name missing', 'error');
            Err++;
        } else if (isEmpty($("#inputEmail3").val())) {
            $("#inputEmail3").focus();
            swal('Required!', 'company name missing ', 'error');
            Err++;
        } else if (isEmpty($("#usertype").val())) {
            $("#usertype").focus();
            swal('Required!', 'user type missing', 'error');
            Err++;
        }
        if (Err === 0) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
    });

    $("#btn-reg1").click(function () {
        var Err = 0;
        var pswd = $("#pass").val();

        if (!isEmail($("#email").val()))
        {
            $("#email").focus();
            swal('Required!', 'invalid email! email should be like example@xyz.com!', 'error');
            Err++;
        } else if (isEmpty($("#pass").val()))
        {
            $("#pass").focus();
            swal('Required!', 'password missing', 'error');
            Err++;
        } else if (!pswd.match(/[A-z]/))
        {
            $("#pass").focus();
            swal('Required!', 'Password should contain atleast one letter, one capital, one number and minimum of eight characters in length', 'error');
            Err++;
        } else if (!pswd.match(/[A-Z]/))
        {
            $("#pass").focus();
            swal('Required!', 'Password should contain atleast one letter, one capital, one number and minimum of eight characters in length', 'error');
            Err++;
        } else if (!$("#pass").val().match(/\d/))
        {
            $("#pass").focus();
            swal('Required!', 'Password should contain atleast one letter, one capital, one number and minimum of eight characters in length', 'error');
            Err++;
        } else if (($("#pass").val().length < 8))
        {
            $("#pass").focus();
            swal('Too short!', 'password should be at least 8 Letters!', 'error');
            Err++;
        } else if (isEmpty($("#cpass").val())) {
            $("#cpass").focus();
            swal('Required!', 're-enter password missing', 'error');
            Err++;
        } else if ($("#pass").val() != $("#cpass").val()) {
            $("#cpass").focus();
            swal('Required!', 're-enter password missmatch', 'error');
            Err++;
        } else if ($("#pass").val() != $("#cpass").val()) {
            $("#cpass").focus();
            swal('Required!', 're-enter password missmatch', 'error');
            Err++;
        }


        if (Err === 0) {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
    });


    $("#btn-reg2").click(function () {
        var Err = 0;
        var mob = $("#mobile").val();
        var cmob = $(".cnumber").val();
        var postal = $("#postal").val();
        if (isEmpty($("#mobile").val())) {
            $("#mobile").focus();
            swal('Required!', 'mobile number missing!', 'error');
            Err++;
        } else if (mob.length > 10 || mob.length < 9) {
            $("#mobile").focus();
            swal('Required!', 'mobile should be 9 or 10 digits !', 'error');
            Err++;
        } else if (isEmpty($("#countryCodedial").val())) {
            $("#countryCodedial").focus();
            swal('Required!', 'please select countrycod !', 'error');
            Err++;
        } else if (isEmpty($(".cnumber").val())) {
            $(".cnumber").focus();
            swal('Required!', 'company number is missing!', 'error');
            Err++;
        } else if (cmob.length > 10 || cmob.length < 9) {
            $(".cnumber").focus();
            swal('Required!', 'company number should be 9 or 10 digits !', 'error');
            Err++;
        } else if (isEmpty($("#addr").val())) {
            $("#addr").focus();
            swal('Required!', 'Address missing!', 'error');
            Err++;
        } else if (isEmpty($("#postal").val())) {
            $("#postal").focus();
            swal('Required!', 'postal code missing!', 'error');
            Err++;
        } else if (postal.length > 9 || postal.length < 3) {
            $("#postal").focus();
            swal('Required!', 'postal code should be greater than 2 and less than 9!', 'error');
            Err++;
        } else if (isEmpty($("#country").val())) {
            $("#country").focus();
            swal('Required!', 'select country!', 'error');
            Err++;
        } else if (isEmpty($("#country").val())) {
            $("#country").focus();
            swal('Required!', 'select country!', 'error');
            Err++;
        } else if (isEmpty($("#state").val())) {
            $("#state").focus();
            swal('Required!', 'state is missing!', 'error');
            Err++;
        } else if (isEmpty($("#city").val())) {
            $("#city").focus();
            swal('Required!', 'city is missing!', 'error');
            Err++;
        }


        if (Err === 0) {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
    });

    function btn_reg3() {
        var Err = 0;

        var webs = $(".websitecom").val();
        var urlregex = new RegExp(
                "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");



        if (webs != '' && !urlregex.test(webs)) {
            $(".websitecom").focus();
            swal('Required!', 'website is invalid!', 'error');
            Err++;
        } else if (isEmpty($("#cpt").val())) {
            $("#cpt").focus();
            swal('Required!', 'Enter captcha!', 'error');
            Err++;
        }
        if (Err === 0) {
            return true;
        } else {
            return false;
        }
    }

    function isUrlValid(userInput) {
        var regexQuery = "^(https?://)?(www\\.)?([-a-z0-9]{1,63}\\.)*?[a-z0-9][-a-z0-9]{0,61}[a-z0-9]\\.[a-z]{2,6}(/[-\\w@\\+\\.~#\\?&/=%]*)?$";
        var url = new RegExp(regexQuery, "i");
        if (url.test(userInput)) {
            return true;
        }

        return false;
    }


    function validateURL(textval) {
        var urlregex = new RegExp(
                "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
        return urlregex.test(textval);
    }


</script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-73239902-1', 'auto');
    ga('send', 'pageview');
</script>

<script>
    $(function () {
        $('.smoothScroll').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1500);
                    return false;
                }
            }
        });
    });


    function cats(nmelke)
    {

        $.ajax({
            type: "POST",
            url: "<?echo $siteurl;?>/category.php",
            data: {'nmelke': nmelke},

            success: function (data) {
                $("#catsdata").html(data);

            }
        });
    }
    function vote(action, pid, type) {
        $.ajax({
            dataType: "json",
            type: "POST",
            url: "<?echo $siteurl;?>/votes.php",
            data: {'pid': pid, 'type': type, 'action': action},
            success: function (data) {

                if (data.result1 != "" && data.result2 != "")
                {
                    if (action == 'vote') {
                        $("#vote").text(data.result1);
                        $("#unvote").text(data.result2);
                    } else if (action == 'unvote') {
                        $("#vote").text(data.result1);
                        $("#unvote").text(data.result2);
                    }

                } else {
                    alert(data.result);
                }

                /*if(data.result == "inserted"){
                 //$("#like").html("<i id='like-icon' class='fa fa-heart'></i> UNLIKE");		
                 alert("inserted");
                 }else if(data.result == "deleted"){
                 alert("deleted");	
                 //$("#like").html("<i id='like-icon' class='fa fa-heart-o'></i> LIKE IT");	
                 }*/
            }
        });
    }
</script>


<script>
    $(document).ready(function () {
        // $("#tabs-container .tabs-menu a").click(function(event) {
        // event.preventDefault();
        // $(this).parent().addClass("current");
        // $(this).parent().siblings().removeClass("current");
        // var tab = $(this).attr("href");
        // $(".tab-content").not(tab).css("display", "none");
        // $(tab).fadeIn();
        // });
    });

    $('.bxslider').bxSlider({

        captions: true,
        infiniteLoop: true,
        auto: true

    });

    $('.featured_slider1').bxSlider({
        minSlides: 1,
        maxSlides: 3,
        adaptiveHeight: true,
        startSlide: 0,
        slideWidth: 280,
        slideMargin: 10
    });

    $('.featured_slider2').bxSlider({
        minSlides: 1,
        maxSlides: 3,
        slideWidth: 280,
        slideMargin: 10
    });

    $('.featured_slider3').bxSlider({
        minSlides: 1,
        maxSlides: 3,
        slideWidth: 280,
        slideMargin: 10
    });




// $('.featured_slider2').bxSlider({
    // minSlides: 1,
    // maxSlides: 4,
    // slideWidth: 280,
    // slideMargin: 10
// });


    $('.hot_slider').bxSlider({
        minSlides: 1,
        maxSlides: 4,
        slideWidth: 280,
        slideMargin: 10
    });
    $('.prenium_wrapper').bxSlider({
        minSlides: 1,
        maxSlides: 1,
        slideWidth: 280,
        slideMargin: 10
    });
</script> 
<script>
    $(document).ready(function () {

        //responsive menu toggle
        $("#menutoggle").click(function () {
            $('.xs-menu').toggleClass('displaynone');

        });
        //add active class on menu
        $('ul li').click(function (e) {
            e.preventDefault();
            $('li').removeClass('active');
            $(this).addClass('active');
        });
        //drop down menu	
        $(".drop-down").hover(function () {
            $('.mega-menu').addClass('display-on');
        });
        $(".drop-down").mouseleave(function () {
            $('.mega-menu').removeClass('display-on');
        });


        $('#fname').bind('input', function () {
            $(this).val(function (_, v) {
                return v.replace(/\s+/g, '');
            });
        });
    });



</script>

<script>
    $(document).ready(function () {
        //responsive menu toggle
        $("#menutoggle").click(function () {
            $('.xs-menu').toggleClass('displaynone');

        });
        //add active class on menu
        $('ul li').click(function (e) {
            e.preventDefault();
            $('li').removeClass('active');
            $(this).addClass('active');
        });
        //drop down menu	
        $(".drop-down").hover(function () {
            $('.mega-menu').addClass('display-on');
        });
        $(".drop-down").mouseleave(function () {
            $('.mega-menu').removeClass('display-on');
        });

    });


</script>








<script>
    function bulk_enqs() {
        var checked = "";
        $("input[name='send_enqs[]']:checked").each(function () {
            checked += $(this).val() + ' ';
        });
        $("#multiple_enqs").text(checked);
        $("#enqs_emails").val(checked);

    }
</script>


<?
if(isset($enq_submit)){

$cpt = isset($cpt)?$cpt:'';
$cptn = isset($cptn)?$cptn:'';

if($cpt!=$cptn){
echo "<script>swal('Incorrect captcha!','incorrect captcha code before submit!','error');</script>";	
}else{
$efrom = $db->singlerec("select admin_email from general_setting where id='1'");
$enq_from = $efrom[0];
$enq_to = isset($enq_email)?$db->escapstr($enq_to):'';
$username1 = isset($enq_name1)?$db->escapstr($enq_name1):'';
$username2 = isset($enq_name2)?$db->escapstr($enq_name2):'';

$enqs_email = isset($enq_email)?$db->escapstr($enq_email):'';
$enq_phone = isset($enq_phone)?$db->escapstr($enq_phone):'';
$enq_subject = isset($enq_subject)?$db->escapstr($enq_subject):'';

$enq_quantity = isset($enq_quantity)?$db->escapstr($enq_quantity):'';
$enq_unit_type = isset($enq_unit_type)?$db->escapstr($enq_unit_type):'';
$order_value = isset($order_value)?$db->escapstr($order_value):'';
$currency_value = isset($currency_value)?$db->escapstr($currency_value):'';
$enq_supplier_location= isset($enq_supplier_location)?$db->escapstr($enq_supplier_location):'';
$enq_Requirement_urgency = isset($enq_Requirement_urgency)?$db->escapstr($enq_Requirement_urgency):'';
$enq_Requirement_frequency = isset($enq_Requirement_frequency)?$db->escapstr($enq_Requirement_frequency):'';
$enq_Requirement_purchase = isset($enq_Requirement_purchase)?$db->escapstr($enq_Requirement_purchase):'';


$enq_msg = isset($enq_msg)?$db->escapstr($enq_msg):'';

$set  = "to_mail = '$enq_to'";
$set .= ",from_mail = '$enq_from'";
$set .= ",name = '$username1'";
$set .= ",email = '$enq_email'";
$set .= ",sub = '$enq_subject'";
$set .= ",phone = '$enq_phone'";

$set .= ",enq_quantity = '$enq_quantity'";
$set .= ",enq_unit_type = '$enq_unit_type'";
$set .= ",order_value = '$order_value'";
$set .= ",currency_value = '$currency_value'";
$set .= ",enq_supplier_location = '$enq_supplier_location'";
$set .= ",enq_Requirement_urgency = '$enq_Requirement_urgency'";
$set .= ",enq_Requirement_frequency = '$enq_Requirement_frequency'";
$set .= ",enq_Requirement_purchase = '$enq_Requirement_purchase'";



$set .= ",ipaddress = '$ipaddress'";
$dt = date('Y-m-d h:i:s');
$set .= ",send_date = '$dt'";
$db->insertrec("insert into enquiries set $set");

$enq_from_encode = base64_encode($enq_email);
$enq_email_encode = base64_encode($enq_to);		
$unurl1 = "$siteurl/index.php?unsubs_news=true&subs_email=$enq_from_encode";
$unurl2 = "$siteurl/index.php?unsubs_news=true&subs_email=$enq_email_encode";

$enq_msg_user = "<div style='background:#f5f5f5; padding: 2% 0 0; margin:0 auto'><table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'><tbody><tr><td valign='top' style='padding-left:0px'></td></tr><tr><td><table width='600' style='background:#fff;border:1px solid #e2e2e2'><tbody><tr><td><table style='width:100%'><tbody><tr><td valign='top' style='padding:2px 6px;border:0'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'><tbody><tr><td valign='top' style='padding:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' src='$siteurl/assets/images/$sitelogo' alt='' style='display:block' class='CToWUd'></a></td><td align='right' valign='top' style='padding:0;padding:12px 10px 5px 5px'><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0;font:bold 11px arial'>Toll Free</td><td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>$_tel</td></tr></tbody></table><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td align='right' valign='top' style='padding:3px 0;font:bold 11px arial;color:#999;line-height:17px'>International Helpline<span style='font:normal 11px arial'>$_mob</span></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td valign='top' style='padding:0px;border:0px'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'><tbody><tr></tr></tbody></table></td></tr></tbody></table></td></tr><tr></tr><tr><td valign='top' style='padding:0 6px 0;border:0'><table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'><tbody><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial;color:#141313'>Dear $username1,</span><span style='display:block;padding:15px 0 15px 0;color:#999;font:bold 12px arial'>Your enquiry has been submited successfully!</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Thank you! For selecting our service.. We are happy to work with you! </span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Any Query Call Us : +91 987 654 3210</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Mail Us : Support@smartb2b.com</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td></tr></tbody></table></td></tr><tr><td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000'>Warm Regards,<br><span style='color:#D61C23'><b>Team $sitename</b></span></td></tr></tbody><tbody><tr><td><table><tbody><tr><td style='border-top:1px solid #ccc;border-bottom:0;border-right:0;border-left:none'></td></tr><tr><td valign='top' style='padding:10px 0 3px;border:0'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'><tbody><tr><td valign='top' style='padding-left:0px;padding-bottom:13px'><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td valign='top' style='padding-left:0px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:10px'><img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'></td><td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000;font:bold 16px arial;line-height:20px'>CALL<br><span style='font:bold 12px arial;color:#d61c23;line-height:20px'>$_tel</span><br></td></tr></tbody></table></td><td valign='middle' style='padding-left:20px'><img border='0' width='1' height='60' alt='' style='display:block'></td><td valign='middle' style='vertical-align:middle;padding-left:0px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:20px'><a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'><img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'></a></td><td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>EMAIL<br><a href='mailto:info@smartb2b.com' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank'>info@smartb2b.com</a></td></tr></tbody></table></td><td valign='middle' style='vertical-align:middle;padding-left:15px'><img border='0' width='1' height='60' alt='' style='display:block'></td><td valign='top' style='padding-left:15px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'></a></td><td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>Website<br><span style='color:#006fb4;text-decoration:none;font:normal 12px arial'><a href='#' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'>www.smartb2b.com</a></span></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style='width:100%'><table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%' bgcolor='#ffffff'><tbody><tr style='width:20%'><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:0;text-decoration:none;border:0;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px' class='CToWUd'></a></td></tr></tbody></table></td></tr><tr><td style='border-top:1px dashed #ccc;border-bottom:0;border-right:0;border-left:none'></td></tr><tr><td valign='top' style='padding:0 6px 1px;border:0'></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table><tbody><tr><td><table width='600'><tbody><tr><td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='$unurl1' target='_blank'>Unsubscribe</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><div class='yj6qo'></div><div class='adL'></div></div>";
$enq_msg_company = "<div style='background:#f5f5f5;padding: 2% 0 0; margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' style='background:#ffffff;border:1px solid #e2e2e2'> <tbody> <tr> <td> <table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='$siteurl/assets/images/$sitelogo' alt='' style='display:block' class='CToWUd'> </a> </td> <td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0px;font:bold 11px arial'> Toll Free </td> <td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'> $_tel </td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0px;font:bold 11px arial;color:#999;line-height:17px'> International Helpline <span style='font:normal 11px arial'> $_mob </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> </tr> <tr> <td valign='top' style='padding:0px 6px 0px;border:0px'> <table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'> <tbody> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial; color:#141313;'>Dear $username2,</span><span style='display:block;padding:15px 0px 15px 0px;color:#999;font:bold 12px arial;'>You got a Enquiry !</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'><table cellpadding='8'><tr><td> <b>From</b> </td><td> :</td><td> $enq_email </td></tr><tr><td> <b>Phone</b> </td><td> :</td><td>$enq_phone </td></tr><tr><td> <b>Subject</b> </td><td> :</td><td>$enq_subject </td></tr><tr><td> <b>Messqge</b> </td><td> :</td><td>$enq_msg </td></tr></table></span><br/></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'>Any Query Call Us : +91 987 654 3210</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'>Mail Us : Support@smartb2b.com</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>Warm Regards,<br> <span style='color:#D61C23'><b>Team $sitename</b></span> </td> </tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> <td style='border-top:1px solid #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> <tr> <td valign='top' style='padding:10px 0px 3px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:10px'> <img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'> </td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px'> CALL <br> <span style='font:bold 12px arial;color:#D61C23;line-height:20px'> $_tel </span> <br> </td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'> <a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'> <img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> EMAIL <br> <a href='mailto:info@smartb2b.com' style='color:#D61C23;font:bold 12px arial;text-decoration:none;' target='_blank'> info@smartb2b.com </a> </td> </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='#' style='color:#D61C23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> www.smartb2b.com </a> </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%;' bgcolor='#ffffff'> <tbody> <tr style='width:20%;'> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:none;text-decoration:none;border:none; width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> <tr> <td valign='top' style='padding:0px 6px 1px;border:0px'> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'> Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='$unurl2' target='_blank'>Unsubscribe</a> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>";
$com_obj->email($enq_from,$enq_email,"Successfully submited!",$enq_msg_user);
$com_obj->email($enq_from,$enq_to,"User enquiry submission from B2B",$enq_msg_company);
echo "<script>swal('Sent successfully!', 'your enquiry has been submited successfully!','success');</script>";
}
}


if(isset($enqs_submit)){

$cpt = isset($cpt)?$cpt:'';
$cptn = isset($cptn)?$cptn:'';

if($cpt!=$cptn){
echo "<script>swal('Incorrect captcha!','incorrect captcha code before submit!','error');</script>";	
}else{
$efrom = $db->singlerec("select admin_email from general_setting where id='1'");
$enq_from = $efrom[0];
$username1 = isset($enq_name1)?$db->escapstr($enq_name1):'';
$username2 ="partner";
$enq_email = isset($enq_email)?$db->escapstr($enq_email):'';
$enqs_email = isset($enqs_email)?$db->escapstr($enqs_email):'';
$to_emails = explode(" ",$enqs_email);

$enq_phone = isset($enq_phone)?$db->escapstr($enq_phone):'';
$enq_subject = isset($enq_subject)?$db->escapstr($enq_subject):'';
$enq_msg = isset($enq_msg)?$db->escapstr($enq_msg):'';
/*$set  = "to_mail = '$enqs_email'";
$set .= ",from_mail = '$enq_from'";
$set .= ",name = '$username1'";
$set .= ",email = '$enq_email'";
$set .= ",sub = '$enq_subject'";
$set .= ",phone = '$enq_phone'";
$set .= ",msg = '$enq_msg'";
echo $set .= ",ipaddress = '$ipaddress'";
$dt = date('Y-m-d h:i:s');
$set .= ",send_date = '$dt'";
$db->insertrec("insert into enquiries set $set");

$enq_from_encode = base64_encode($enq_email);
$enq_email_encode = base64_encode($enq_to);		
$unurl1 = "$siteurl/index.php?unsubs_news=true&subs_email=$enq_from_encode";
$unurl2 = "$siteurl/index.php?unsubs_news=true&subs_email=$enq_email_encode";
*/
$enq_msg_user = "<div style='background:#f5f5f5; padding: 2% 0 0; margin:0 auto'><table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'><tbody><tr><td valign='top' style='padding-left:0px'></td></tr><tr><td><table width='600' style='background:#fff;border:1px solid #e2e2e2'><tbody><tr><td><table style='width:100%'><tbody><tr><td valign='top' style='padding:2px 6px;border:0'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'><tbody><tr><td valign='top' style='padding:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' src='$siteurl/images/logo.png' alt='' style='display:block' class='CToWUd'></a></td><td align='right' valign='top' style='padding:0;padding:12px 10px 5px 5px'><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0;font:bold 11px arial'>Toll Free</td><td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'>$_tel</td></tr></tbody></table><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td align='right' valign='top' style='padding:3px 0;font:bold 11px arial;color:#999;line-height:17px'>International Helpline<span style='font:normal 11px arial'>$_mob</span></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td valign='top' style='padding:0px;border:0px'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'><tbody><tr></tr></tbody></table></td></tr></tbody></table></td></tr><tr></tr><tr><td valign='top' style='padding:0 6px 0;border:0'><table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'><tbody><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial;color:#141313'>Dear $username1,</span><span style='display:block;padding:15px 0 15px 0;color:#999;font:bold 12px arial'>Your enquiry has been submited successfully!</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Thank you! For selecting our service.. We are happy to work with you! </span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Any Query Call Us : +91 987 654 3210</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial;color:#999'>Mail Us : Support@smartb2b.com</span></td></tr><tr><td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td></tr></tbody></table></td></tr><tr><td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000'>Warm Regards,<br><span style='color:#D61C23'><b>Team $sitename</b></span></td></tr></tbody><tbody><tr><td><table><tbody><tr><td style='border-top:1px solid #ccc;border-bottom:0;border-right:0;border-left:none'></td></tr><tr><td valign='top' style='padding:10px 0 3px;border:0'><table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'><tbody><tr><td valign='top' style='padding-left:0px;padding-bottom:13px'><table cellspacing='0' cellpadding='0' border='0'><tbody><tr><td valign='top' style='padding-left:0px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:10px'><img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'></td><td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000;font:bold 16px arial;line-height:20px'>CALL<br><span style='font:bold 12px arial;color:#d61c23;line-height:20px'>$_tel</span><br></td></tr></tbody></table></td><td valign='middle' style='padding-left:20px'><img border='0' width='1' height='60' alt='' style='display:block'></td><td valign='middle' style='vertical-align:middle;padding-left:0px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:20px'><a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'><img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'></a></td><td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>EMAIL<br><a href='mailto:$siteemail' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank'>$siteemail</a></td></tr></tbody></table></td><td valign='middle' style='vertical-align:middle;padding-left:15px'><img border='0' width='1' height='60' alt='' style='display:block'></td><td valign='top' style='padding-left:15px'><table cellspacing='0' cellpadding='0' border='0' height='75'><tbody><tr><td valign='middle' style='vertical-align:middle;padding-left:0px'><a href='#' target='_blank' data-saferedirecturl='#'><img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'></a></td><td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000;line-height:23px'>Website<br><span style='color:#006fb4;text-decoration:none;font:normal 12px arial'><a href='#' style='color:#d61c23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'>$sitename</a></span></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style='width:100%'><table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%' bgcolor='#ffffff'><tbody><tr style='width:20%'><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:0;text-decoration:none;border:0;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px' class='CToWUd'></a></td><td valign='top' width='20px' style='#'><a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px' class='CToWUd'></a></td></tr></tbody></table></td></tr><tr><td style='border-top:1px dashed #ccc;border-bottom:0;border-right:0;border-left:none'></td></tr><tr><td valign='top' style='padding:0 6px 1px;border:0'></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table><tbody><tr><td><table width='600'><tbody><tr><td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='$unurl1' target='_blank'>Unsubscribe</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><div class='yj6qo'></div><div class='adL'></div></div>";
$enq_msg_company = "<div style='background:#f5f5f5;padding: 2% 0 0; margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> <tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' style='background:#ffffff;border:1px solid #e2e2e2'> <tbody> <tr> <td> <table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='$siteurl/images/logo.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='middle' style='vertical-align:middle;color:#999;padding-left:0px;font:bold 11px arial'> Toll Free </td> <td align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#999;line-height:20px'> $_tel </td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0px;font:bold 11px arial;color:#999;line-height:17px'> International Helpline <span style='font:normal 11px arial'> $_mob </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#999' width='100%' height='1'> <tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> </tr> <tr> <td valign='top' style='padding:0px 6px 0px;border:0px'> <table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'> <tbody> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 16px arial; color:#141313;'>Dear $username2,</span><span style='display:block;padding:15px 0px 15px 0px;color:#999;font:bold 12px arial;'>You got a Enquiry !</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'><table cellpadding='8'><tr><td> <b>From</b> </td><td> :</td><td> $enq_email </td></tr><tr><td> <b>Phone</b> </td><td> :</td><td>$enq_phone </td></tr><tr><td> <b>Subject</b> </td><td> :</td><td>$enq_subject </td></tr><tr><td> <b>Messqge</b> </td><td> :</td><td>$enq_msg </td></tr></table></span><br/></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'>Any Query Call Us : +91 987 654 3210</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 12px arial;padding:15px 0 0 15px;color:#1d1d1d'><span style='font:bold 12px arial; color:#999;'>Mail Us : Support@smartb2b.com</span></td> </tr> <tr> <td valign='top' style='line-height:18px;font:normal 13px arial;padding:15px;color:#1d1d1d'> </td> </tr> </tbody> </table> </td> </tr> <tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>Warm Regards,<br> <span style='color:#D61C23'><b>Team $sitename</b></span> </td> </tr> </tbody> <tbody> <tr> <td> <table> <tbody> <tr> <td style='border-top:1px solid #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> <tr> <td valign='top' style='padding:10px 0px 3px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> <tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:10px'> <img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'> </td> <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px'> CALL <br> <span style='font:bold 12px arial;color:#D61C23;line-height:20px'> 1111 2222 3333 </span> <br> </td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'> <a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'> <img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> EMAIL <br> <a href='mailto:$siteemail' style='color:#D61C23;font:bold 12px arial;text-decoration:none;' target='_blank'> $siteemail </a> </td> </tr> </tbody> </table> </td> <td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='top' style='padding-left:15px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'> </a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='#' style='color:#D61C23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> $sitename </a> </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> <table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%;' bgcolor='#ffffff'> <tbody> <tr style='width:20%;'> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:none;text-decoration:none;border:none; width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='#' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> <tr> <td valign='top' style='padding:0px 6px 1px;border:0px'> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'> Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='$unurl2' target='_blank'>Unsubscribe</a> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>";
foreach($to_emails as $to){
$com_obj->email($enq_from,$to,"User enquiry submission from B2B",$enq_msg_company);
}
$com_obj->email($enq_from,$enq_email,"multiple enquires sent successfully!",$enq_msg_user);
echo "<script>swal('Sent successfully!', 'your enquiry has been submitted successfully!','success');</script>";
}
}
?>

</body>
</html>
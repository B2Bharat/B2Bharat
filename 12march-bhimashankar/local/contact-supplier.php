
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
             
<div class="container-fluid contact_wrapper" >
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

        <h3>Contact Us</h3>
            

            <form id="contact-supplier" class="contact-form" style="background-color:#abc2ca; " name="contact-supplier" method="post" action="<?echo $siteurl;?>/send-enquiry.php">
                 <div class="section slider" style="padding: 24px 10px 5px;background-color: #abc2ca;">

           
<!--<div class="container-fluid" style="background-color:#abc2ca; ">-->
<!--            <div class="well" >-->
              
                    <div class="col-sm-3 col-md-6">


                        <div class=" form-group model-name">
                            <h6>Company Contact Details</h6>
                        </div>

                        <div class=" form-group model-name">
                            <label class="col-sm-4">Company Name: </label>
                            <label class="col-sm-8"><?echo ucfirst($cinfo['name']);?></label>
                        </div>
                            <div class=" form-group model-name">
                                <label class="col-sm-4">Contact Person: </label>
                                <label class="col-sm-8"><?echo ucfirst($cinfo['fname']).' '.ucfirst($cinfo['lname']);?> <br /><br /></label>
                            </div>
                        <div class=" form-group model-name">
                            <?php if ($cinfo['phone'] != "" && $cinfo['phone'] != "0") { ?>
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
  
                       
  
                       

<!--                            <div class=" form-group model-name">
                                <h6>Contact Person Details</h6>
                            </div>-->

<!--                            <div class=" form-group model-name">
                                <label class="col-sm-4">Contact Person: </label>
                                <label class="col-sm-8"><?echo ucfirst($cinfo['fname']).' '.ucfirst($cinfo['lname']);?> <br /><br /></label>
                            </div>-->

<!--                            <div class="form-group model-name">
                                <label class="col-sm-4">Country : </label>
                                <label class="col-sm-8"><?echo ucfirst($com_obj->getCountry($cinfo['ucon']));?></label>
                            </div>-->


<!--                            <div class=" form-group model-name">
                                <label class="col-sm-4">Address : </label>
                                <label class="col-sm-8"><?echo ucwords($cinfo['uaddress']);?></label>
                            </div>-->

<!--                            <div class=" form-group model-name">
                                <label class="col-sm-4">Postal Code : </label>
                                <label class="col-sm-8"><?echo $cinfo['uzip'];?></label>
                            </div>-->

                       


                    </div>
<div class="row">
        <div class="col-md-4">              
 <img src="<?echo $siteurl;?>/uploads/user_images/<?echo $cinfo['img'];?>" alt="" class="tbl-brder" width="150" height="150">
   <label class="col-sm-8"><?echo ucfirst($cinfo['fname']).' '.ucfirst($cinfo['lname']);?> <br /><br /></label>
                    
                        </div>
    
</div>

              

            </div>
<!--    </div>-->
                 
                <div class="ht_section_contact">
                   <form method="POST" id="single-eq" action="send-enquiry.php">
				  <div class="form-group">
                    <label for="exampleInputname">Name <span class="required">*</span></label>
                    <input type="text" class="form-control form-height" id="exampleInputname" name="enq_name1" required>
					<input type="hidden" name="enq_name2" id="enq_name2" value="">
					<input type="hidden" name="enq_to" value="">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Email address <span class="required">*</span></label>
                    <input type="email" class="form-control form-height" id="exampleInputEmail1" name="enq_email" required>
					<input type="hidden" name="enq_to" id="enq_to" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number <span class="required">*</span></label>
                    <input type="text" class="form-control form-height" id="exampleInputPassword1" name="enq_phone"  maxlength="10"  pattern="[0-9]{10}"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputsub">Subject <span class="required">*</span></label>
                    <input type="text" class="form-control form-height" id="exampleInputsub" name="enq_subject" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Message <span class="required">*</span></label>
                    <textarea class="form-control" name="enq_msg" required></textarea>
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


<!--<?$admin_info = $db->singlerec("select mobile,telephone,fax,address,city,email_id,country from admin where id='1'");?>		
<?$country = $db->singlerec("select nicename,phonecode from countries where id='".$admin_info['country']."'");?>
<?$Furls=$db->singlerec("select fburl,twurl,gplusurl,linkedinurl,admin_email from general_setting where id='1'");?>						
<div class="container-fluid contact_icon_wrapper">
    <div class="container">
        <div class="row">
            <ul>
                <li> 
                    <div class="icon_sec_con"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="title_cont_icon"><h2>Location</h2><p> <?echo ucwords($admin_info['address']);?>, <?echo ucfirst($admin_info['city']);?>, <?echo ucfirst($country['nicename']);?></p></div>	   
                </li>
                <li>
                    <div class="icon_sec_con"><i class="fa fa-fax" aria-hidden="true"></i></div>
                    <div class="title_cont_icon"><h2>Fax</h2><p>  <?echo ucwords($admin_info['fax']);?>
                        </p></div>
                </li>
                <li>
                    <div class="icon_sec_con"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="title_cont_icon"><h2>Phone</h2><p><?echo $admin_info['telephone'];?></p></div>

                </li>
                <li>
                    <div class="icon_sec_con"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="title_cont_icon"><h2>Email</h2><p><?echo $admin_info['email_id'];?></p></div>

                </li>

            </ul>
        </div>
    </div>
</div>-->
         </div>
 </section>

<?include "footer.php";?>  
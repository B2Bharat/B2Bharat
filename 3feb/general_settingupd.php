<? include "header.php"; 
$upd = isset($upd)?$upd:'';
$Message = isSet($Message) ? $Message : '' ;
$website_name=isSet($website_title)?$website_name:'';
$website_title=isSet($website_title)?$website_title:'';
$website_url=isSet($website_url)?$website_url:'';
$default_country=isSet($default_country)?$default_country:'101';
$default_currency=isSet($default_currency)?$default_currency:'10';
$seo=isSet($seo)?$seo:'';
$maintenance=isSet($maintenance)?$maintenance:'';
$message=isSet($message)?$message:'';
$account_owner=isSet($account_owner)?$account_owner:'';
$billing=isSet($billing)?$billing:'';
$shopping=isSet($shopping)?$shopping:'';
$pay_person=isSet($pay_person)?$pay_person:'';
$logo_invoice=isSet($logo_invoice)?$logo_invoice:'';
$logo_invoice=isSet($logo_invoice)?$logo_invoice:'';
$paytotext=isSet($paytotext)?$paytotext:'';
$keywords=isSet($keywords)?$keywords:'';
$description=isSet($description)?$description:'';
$paytotext=isSet($paytotext)?$paytotext:'';
$img=isSet($img)?$img:'';
$admin_headerlogo=isSet($admin_headerlogo)?$admin_headerlogo:'';
$admin_dashlogo=isSet($admin_dashlogo)?$admin_dashlogo:'';
$frontend_favicon=isSet($frontend_favicon)?$frontend_favicon:'';
$admin_favicon=isSet($admin_favicon)?$admin_favicon:'';
	
$GetRecord = $db->singlerec("select * from general_setting where id='1'");
@extract($GetRecord);
$website_title = stripslashes($website_title);
$website_name = stripslashes($website_name);
$website_url = stripslashes($website_url);
$admin_email = stripslashes($admin_email);
$home_block1 = stripslashes($home_block1);
$home_block1title = stripslashes($home_block1title);
$home_block2 = stripslashes($home_block2);
$home_block2title = stripslashes($home_block2title);
$home_block3 = stripslashes($home_block3);
$home_block3title = stripslashes($home_block3title);
$default_country = stripslashes($default_country);
$default_currency = stripslashes($default_currency);
$seo = stripslashes($seo);
$maintenance = stripslashes($maintenance);
$message = stripslashes($message);
$account_owner = stripslashes($account_owner);
$billing = stripslashes($billing);
$shopping = stripslashes($shopping);
$pay_person = stripslashes($pay_person);
$logo_invoice = stripslashes($logo_invoice);
$paytotext = stripslashes($paytotext);
$keywords = stripslashes($keywords);
$description = stripslashes($description);
$img = stripslashes($img);
$admin_headerlogo = stripslashes($admin_headerlogo);
$admin_dashlogo = stripslashes($admin_dashlogo);
$frontend_favicon = stripslashes($frontend_favicon);
$admin_favicon = stripslashes($admin_favicon);

?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>General Setting </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> General Setting </li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">General Setting  <?echo $Message;?></h3>
                         </div>
                         <div class="panel-body">
                         <!-- START Form Wizard -->
						 <form  class="form-horizontal form-bordered form-wizard" action="generalsetting_update.php" id="wizard-validate" method="post" enctype="multipart/form-data">
                         
                            <!-- Wizard Container 1 -->
                                <div class="wizard-title"> Site Configuration </div>
                                    <div class="wizard-container">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Site Name <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="website_name" id="website_name" value="<? echo $website_name; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
										<input type="hidden" name="genupdate" value="genupdate">
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Site Title<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="website_title" id="website_title" value="<? echo $website_title; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
							    </div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Site Url<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="website_url" id="website_url" value="<? echo $website_url; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Admin E-mail<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="email" name="admin_email" id="admin_email" value="<? echo $admin_email; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Home Block 1 title<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="home_block1title" id="home_block1title" value="<? echo $home_block1title; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Home Block 1 Content<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="home_block1" id="home_block1" value="<? echo $home_block1; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Home Block 2 title<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="home_block2title" id="home_block2title" value="<? echo $home_block2title; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Home Block 2 Content<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="home_block2" id="home_block2" value="<? echo $home_block2; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Home Block 3 title<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="home_block3title" id="home_block3title" value="<? echo $home_block3title; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Home Block 3 Content<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="home_block3" id="home_block3" value="<? echo $home_block3; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Default Country<font color="red">*</font></label>
									<div class="col-sm-3">
										<select class="form-control" name="default_country" data-parsley-group="order" data-parsley-required>
										<option value="">Select Country</option>
										<?echo $drop->get_dropdown($db,"SELECT id,nicename from countries",$default_country);?>
									    </select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Default Currency<font color="red">*</font></label>
									<div class="col-sm-3">
										<select name="default_currency" class="form-control" data-parsley-group="order" data-parsley-required>
										<option value="">Select</option>
										<?echo $drop->get_dropdown($db,"select id,currencycode from currency_code order by countryname asc",$default_currency);?>
										</select>
									</div>
								</div>	
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">SEO on/off</label>
									<div class="col-sm-3">
										<input type="radio" name="seo" value="on" <? if($seo=='on')echo "checked"; ?>>&nbsp;On
										<input type="radio" name="seo" value="off" <? if($seo=='off')echo "checked"; ?>>&nbsp;Off
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Maintenance Mode</label>
									<div class="col-sm-3">
										<input type="radio" name="maintenance" value="online"  <? if($maintenance=='online')echo "checked"; ?>>&nbsp;Online
										<input type="radio" name="maintenance" value="offline" <? if($maintenance=='offline')echo "checked"; ?>>&nbsp;Offline
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Message</label>
									<div class="col-sm-3">
										<textarea name="message" class="form-control"><? echo $message; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Select Your Account(Site Owner)<font color="red">*</font></label>
									<div class="col-sm-3">
										<select name="account_owner" id="account_owner" class="form-control" data-parsley-group="order" data-parsley-required>
										<option value="">Select</option>
										<option value="admin" <?if($account_owner=="admin")echo "selected"; ?>>Admin</option>
										<?echo $drop->get_dropdown($db,"select id,fname from register where active_status='1' order by id asc",$account_owner);?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Billing & Payment Module</label>
									<div class="col-sm-3">
										<input type="radio" name="billing" value="enable" <? if($billing=='enable')echo "checked"; ?>>&nbsp;Enabled
										<input type="radio" name="billing" value="offline" <? if($billing=='offline')echo "checked"; ?>>&nbsp;Enabled
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Shopping Cart OFF/ON</label>
									<div class="col-sm-3">
										<input type="radio" name="shopping" value="allowed" <? if($shopping=='allowed')echo "checked"; ?>>&nbsp;Allowed
										<input type="radio" name="shopping" value="disallowed" <? if($shopping=='disallowed')echo "checked"; ?>>&nbsp;Disallowed
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Method of Payment Flow</label>
									<div class="col-sm-6">
										<input type="radio" name="pay_person" value="admin" <? if($pay_person=='admin')echo "checked"; ?>>&nbsp;All payment goes to Admin only.<br>
										<input type="radio" name="pay_person" value="owner" <? if($pay_person=='owner')echo "checked"; ?>>&nbsp;Payment goes to respective list owner (Members).
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">URL of logo printed on invoice</label>
									<div class="col-sm-3">
										<input type="text" name="logo_invoice" value="<? echo $logo_invoice; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Pay To Text</label>
									<div class="col-sm-3">
										<textarea type="text" name="paytotext" class="form-control"><? echo $paytotext; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Keywords</label>
									<div class="col-sm-3">
										<input type="text" name="keywords" id="keywords" value="<? echo $keywords; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Description</label>
									<div class="col-sm-3">
										<textarea type="text" name="description" class="form-control"><? echo $description; ?></textarea>
									</div>
								</div>
							</div>
							<div class="wizard-title"> Header & Footer </div>
                              <div class="wizard-container">
								  <div class="form-group">
                                    <div class="row">
									 <div class="col-md-6">
									  <label>Frontend Header Logo:<font color="red">*</font> </label>
									    <div class="upload-section">
										<label class="upload-image" for="upload-image-one" style="width:40%">
										<input type="file" id="upload-image-one" name="img" accept="image/*" onchange="img_validate('upload-image-one',156,79,156,79,'img_div');" <?if($img==""){?>data-parsley-group="information" data-parsley-required <? } ?>/>
										</label>								
										</div>
                                     </div>
									<img src="<?php echo $siteurl;?>/assets/images/<?echo $img;?>" id="img_div" width="100" height="80" <?if($img==''){?>style='display:none;'<?}?>>
									 </div>
                                  </div>
								  <div class="form-group">
                                    <div class="row">
									 <div class="col-md-6">
									  <label>Admin Header logo:<font color="red">*</font> </label>
									    <div class="upload-section">
										<label class="upload-image" for="upload-image-two" style="width:40%">
										<input type="file" id="upload-image-two" name="admin_headerlogo" accept="image/*" onchange="img_validate('upload-image-two',156,79,156,79,'img_div2');" <?if($admin_headerlogo==""){?>data-parsley-group="information" data-parsley-required <? } ?>/>
										</label>								
										</div>
                                     </div>
									<img src="<?php echo $siteurl;?>/assets/images/<?echo $admin_headerlogo;?>" id="img_div2" width="100" height="80" <?if($admin_headerlogo==''){?>style='display:none;'<?}?>>
									 </div>
                                  </div>
								  <div class="form-group">
                                    <div class="row">
									 <div class="col-md-6">
									  <label>Admin Dashboard Logo:<font color="red">*</font> </label>
									    <div class="upload-section">
										<label class="upload-image" for="upload-image-three" style="width:40%">
										<input type="file" id="upload-image-three" name="admin_dashlogo" accept="image/*" onchange="img_validate('upload-image-three',156,79,156,79,'img_div3');" <?if($admin_dashlogo==""){?>data-parsley-group="information" data-parsley-required <? } ?>/>
										</label>								
										</div>
                                     </div>
									<img src="<?php echo $siteurl;?>/assets/images/<?echo $admin_dashlogo;?>" id="img_div3" width="100" height="80" <?if($admin_dashlogo==''){?>style='display:none;'<?}?>>
									 </div>
                                  </div>
								  <div class="form-group">
                                    <div class="row">
									 <div class="col-md-6">
									  <label>Frontend Favicon:<font color="red">*</font> </label>
									    <div class="upload-section">
										<label class="upload-image" for="upload-image-four" style="width:40%">
										<input type="file" id="upload-image-four" name="frontend_favicon" accept="image/*" onchange="img_validate('upload-image-four',16,16,1,1,'img_div4');" <?if($frontend_favicon==""){?>data-parsley-group="information" data-parsley-required <? } ?>/>
										</label>								
										</div>
                                     </div>
									<img src="<?php echo $siteurl;?>/assets/images/<?echo $frontend_favicon;?>" id="img_div4" width="100" height="80" <?if($frontend_favicon==''){?>style='display:none;'<?}?>>
									 </div>
                                  </div>
								  <div class="form-group">
                                    <div class="row">
									 <div class="col-md-6">
									  <label>Admin Favicon:<font color="red">*</font> </label>
									    <div class="upload-section">
										<label class="upload-image" for="upload-image-five" style="width:40%">
										<input type="file" id="upload-image-five" name="admin_favicon" accept="image/*" onchange="img_validate('upload-image-five',16,16,1,1,'img_div5');" <?if($admin_favicon==""){?>data-parsley-group="information" data-parsley-required <? } ?>/>
										</label>								
										</div>
                                     </div>
									<img src="<?php echo $siteurl;?>/assets/images/<?echo $admin_favicon;?>" id="img_div5" width="100" height="80" <?if($admin_favicon==''){?>style='display:none;'<?}?>>
									 </div>
                                  </div>
							</div>       
                                            <!--/ Wizard Container 3 -->
                                          </form>
                                        <!--/ END Form Wizard -->
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
		<!--===================================================-->
		<!--End page content-->
	</div>
	<!--===================================================-->
	<!--END CONTENT CONTAINER-->
	<? include "leftmenu.php"; ?>
</div>
<? include "footer.php"; ?>
<script src="js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
		<!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/wizard.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="js/demo/jasmine.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/form-wizard.js"></script>
<script>
function categ(val){
	//alert(val);
	 $.ajax({url: "cat_ajax.php?val="+val, success: function(result){
        $("#cat1").html(result);
    }});
}
</script>	
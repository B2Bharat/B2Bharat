<?php 

include "header.php"; 
$upd = isset($upd)?$upd:'';
$id = isset($id)?$id:'';
$first_name=isSet($title)?$first_name:'';
$title=isSet($title)?$title:'';
$last_name=isSet($last_name)?$last_name:'';
$company_name=isSet($company_name)?$company_name:'';
$country=isSet($country)?$country:'';
$state=isSet($state)?$state:'';
$city=isSet($city)?$city:'';
$postal_code=isSet($postal_code)?$postal_code:'';
$address=isSet($address)?$address:'';
$mobile_no=isSet($mobile_no)?$mobile_no:'';
$telephone=isSet($telephone)?$telephone:'';
$fax=isSet($fax)?$fax:'';
$website=isSet($website)?$website:'';
$role_id=isSet($role_id)?$role_id:'';
$email_id=isSet($email_id)?$email_id:'';

$GetRecord = $db->singlerec("select * from admin");
@extract($GetRecord);
$title = stripslashes($title);
$first_name = stripslashes($name);
$last_name = stripslashes($last_name);
$company_name = stripslashes($company);
$country_id = stripslashes($country);
$state = stripslashes($state);
$city = stripslashes($city);
$postal_code = stripslashes($postal_code);
$address = stripslashes($address);
$mobile_no = stripslashes($mobile);
$telephone = stripslashes($telephone);
$fax = stripslashes($fax);
$website = stripslashes($website);
$role_id = stripslashes($user_type);
$email_id = stripslashes($email_id);


$rolee = "<option value=''>- - Select- -</option>";
$DropDownQry = "select * from user_role where status='0'";
$rolee .= $drop->get_dropdown($db,$DropDownQry,$role_id);

$countryy = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,nicename from countries";
$countryy .= $drop->get_dropdown($db,$DropDownQry,$country_id);

?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<?php include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>My Profile </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> My Profile</li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <a class="btn btn-info" href="welcome.php">Back</a>
                        <div class="panel-heading">
                            <h3 class="panel-title">My Profile</h3>
                         </div>
                         <div class="panel-body">
                         <!-- START Form Wizard -->
						 <form  class="form-horizontal form-bordered form-wizard" action="myprofile_upd.php" id="wizard-validate" method="post" enctype="multipart/form-data">
                         
                            <!-- Wizard Container 1 -->
                                <div class="wizard-title"> General Configuration </div>
                                    <div class="wizard-container">
								<div class="form-group">
								<div class="form-group"><strong>Member Information</strong></div>
									<label class="col-sm-2 control-label">Title<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="title" id="title" value="<?php echo $title; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
							    </div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">First Name <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="first_name" id="first_name"  value="<?php echo $first_name; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
										</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Last Name<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Company Name<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="company_name" id="company_name" value="<?php echo $company_name; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
<div class="form-group">
							<strong>Login Information</strong></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Address (As Username)<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="email" name="email_id" id="email_id" value="<?php echo $email_id; ?>" class="form-control" data-parsley-group="order" data-parsley-required>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">User Group<font color="red">*</font></label>
									<div class="col-sm-3">
										<select name="role_id" id="role_id" class="form-control"     value="<?php echo $role_id; ?>" data-parsley-group="order" data-parsley-required ><?php echo $rolee; ?></select>
										</div>
								</div>
								</div>
							<div class="wizard-title"> Contact Information </div>
                              <div class="wizard-container">
							
								<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-3">
										<textarea name="address" class="form-control" data-parsley-group="information" data-parsley-required><?php echo $address; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Mobile No</label>
									<div class="col-sm-3">
										<input type="text" name="mobile_no" id="mobile_no" value="<?php echo $mobile_no;?>" data-parsley-type= "integer" pattern="[0-9]{10}" data-parsley-error message="enter 10 digit mobile number" data-parsley-group="information" data-parsley-required>
										</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Postal Code</label>
									<div class="col-sm-3">
										<input type="tel" name="postal_code" id="postal_code" pattern="[0-9]{4,6}" value="<?php echo $postal_code;?>" data-parsley-group="information" data-parsley-required>
										</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Country</label>
									<div class="col-sm-3">
										<select name="country_id" id="country_id"  value="<?php echo $country_id;?>" data-parsley-group="information" data-parsley-required><?php echo $countryy;?></select>
										</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">State</label>
									<div class="col-sm-3">
										<input type="text" name="state" id="state" value="<?php echo $state;?>" data-parsley-group="information" data-parsley-required>
										</div>
										</div>
										<div class="form-group">
									<label class="col-sm-2 control-label">City</label>
									<div class="col-sm-3">
										<input type="text" name="city" id="city" data-parsley-type="alphanum" value="<?php echo $city;?>" data-parsley-group="information" data-parsley-required>
										</div>
										</div>
										<div class="form-group">
									<label class="col-sm-2 control-label">Telephone</label>
									<div class="col-sm-3">
										<input type="text" name="telephone" id="telephone" pattern="[0-9]{10}" data-parsley-error message="enter 10 digit mobile number" value="<?php echo $telephone;?>" data-parsley-group="information" data-parsley-required>
										</div>
								</div>
						<div class="form-group">
									<label class="col-sm-2 control-label">Fax</label>
									<div class="col-sm-3">
										<input type="tel" name="fax" id="fax" pattern="[0-9]{10}" value="<?php echo $fax;?>" data-parsley-group="information" data-parsley-required>
										</div>
								</div>
						<div class="form-group">
									<label class="col-sm-2 control-label">Website</label>
									<div class="col-sm-3">
										<input type="url" name="website" id="website" value="<?php echo $website;?>" data-parsley-group="information" data-parsley-required>
										</div>
										<input type="hidden" name="myprofilesub" id="myprofilesub" value="myprofilesub">
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
	<?php include "leftmenu.php"; ?>
</div>
<?php include "footer.php"; ?>
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
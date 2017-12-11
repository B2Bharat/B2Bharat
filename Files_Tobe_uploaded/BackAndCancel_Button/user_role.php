<? include "header.php"; 

$submit = isset($submit) ? $submit : '' ;
$upd = isset($upd) ? $upd:'';
$id = isSet($id) ? $id : '' ;
$act  = isSet($act) ? $act : '' ;
$page  = isSet($page) ? $page : '' ;
$Message  = isSet($Message) ? $Message : '' ;
$role=isSet($role) ? $role : '' ;
$mem_pack=isSet($mem_pack) ? $mem_pack : '' ;
$title=isSet($title) ? $title : '' ;
$fname=isSet($fname) ? $fname : '' ;
$lname=isSet($lname) ? $lname : '' ;
$company_name=isSet($company_name) ? $company_name : '' ;
$email=isSet($email) ? $email : '' ;
$password=isSet($password) ? $password : '' ;
$decript_password=isSet($decript_password) ? $decript_password : '' ;
$address=isSet($address) ? $address : '' ;
$mobile=isSet($mobile) ? $mobile : '' ;
$zip_code=isSet($zip_code) ? $zip_code : '' ;
$country=isSet($country) ? $country : '' ;
$state=isSet($state) ? $state : '' ;
$city=isSet($city) ? $city : '' ;
$company_number=isSet($company_number) ? $company_number : '' ;
$fax=isSet($fax) ? $fax : '' ;
$website=isSet($website) ? $website : '' ;
$img=isSet($img) ? $img : '' ;
$user_role=isSet($user_role) ? $user_role : '' ;

if($upd == 1){
	$hidimg = "style='display:none;'";
	$TextChange = "Add";
}
else if($upd == 2){
	$hidimg = "";
	$TextChange = "Edit";
}
		
$GetRecord = $db->singlerec("select * from register where id='$id'");
@extract($GetRecord);
$role=stripslashes($user_role);
$mem_pack=stripslashes($mem_pack);
$title=stripslashes($title);
$fname=stripslashes($fname);
$lname=stripslashes($lname);
$company_name=stripslashes($company_name);
$email=stripslashes($email);
$password=stripslashes($password);
$decript_password=stripslashes($decript_password);
$address=stripslashes($address);
$mobile=stripslashes($mobile);
$zip_code=stripslashes($zip_code);
$country=stripslashes($country);
$state=stripslashes($state);
$city=stripslashes($city);
$company_number=stripslashes($company_number);
$fax=stripslashes($fax);
$website=stripslashes($website);
$img=stripslashes($img);

$user_role = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,role from user_role where status='0' order by id";
$user_role .= $drop->get_dropdown($db,$DropDownQry,$role);

$member = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,name,max_no_products from membership where active_status='1' order by id";
$member .= $drop->get_2_dropdown($db,$DropDownQry,$mem_pack);


if($act == "ps")
	$Message = "<b><font color='red'>atleast 4 minimum character need!!!...</font></b>";
if($act=="exit_nam")
	$Message="<b><font color='red'>Username already exits.</font><b>";
if($act=="exit_email")
	$Message="<b><font color='red'>Email-ID already exits.</font><b>";







$countryo = $db->get_all_asso("select * from country");
?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>User Management</h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> User Management</li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <a class= "btn btn-info" onclick="history.go(-1);">Back </a>
                        <div class="panel-heading">
                            
                         </div>
						 
                         <div class="panel-body">
                         <!-- START Form Wizard -->
                            <form class="form-horizontal form-bordered form-wizard" action="profile_submit.php" id="wizard-validate" method="post" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>"> 
							<input type="hidden" name="upd" value="<?echo $upd;?>">						
							<input type="hidden" name="urole" value="<?echo $role;?>">
                            <!-- Wizard Container 1 -->
                                <!--<div class="wizard-title"> User Role </div>
                                    <div class="wizard-container">
                                        <div class="form-group">
												<div class="col-md-12">
												<h5 class="semibold text-primary">
                                                <i class="fa fa-sign-in"></i> User Role
                                                </h5>
                                                        <p class="text-muted"> Select user role </p>
                                                    </div>
                                                </div>
												
										<div id="registrationForm">
                                            <div class="form-group pad-ver-5">
											<div class="col-md-3">
                                            <div class="row">
                                                <div class="radio">
                                                   <ul style="list-style-type:none" >
													<li >
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

													 <?php 
													 $query="select * from user_role where status='0'";
													 echo $GetSiteAbt1 = $com_obj->drop_down($db,$query,$role,"role"); 
													?></li>
													</ul>
                                                </div>
                                            </div>
											</div>
                                         </div> 
                                        </div>										 
											
                                            </div>-->
                                            <!--/ Wizard Container 1 -->
                                            <!-- Wizard Container 2 -->
                                            <div class="wizard-title"> Detailed Information </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-user"></i> Detailed Information
                                                        </h5>
                                                        <p class="text-muted">  </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Membership Package: <span class="text-danger">*</span> </label>
															<select name="mem_pack" id="mem_pack" class="form-control" data-parsley-group="order" data-parsley-required value="<? echo $mem_pack; ?>"><? echo $member;?></select>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                       <div class="col-md-3">
                                                            <label>Title: </label>
															<input type="text" name="title" id="title" class="form-control" value="<? echo $title; ?>" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>First Name: <span class="text-danger">*</span></label>
                                                            <input type="text" name="fname" id="fname" class="form-control"data-parsley-group="order" data-parsley-required value="<? echo $fname; ?>" />
                                                        </div>
														<div class="col-md-3">
                                                            <label>Last Name: <span class="text-danger">*</span></label>
                                                            <input type="text" name="lname" id="lname" class="form-control"data-parsley-group="order" data-parsley-required value="<? echo $lname; ?>" />
                                                        </div>
														<div class="col-md-3">
                                                            <label>Company Name</label>
                                                            <input type="text" name="company_name" id="company_name" class="form-control" value="<? echo $company_name; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
										<div class="form-group">                                            
                                            <div class="row">
                                                <div class="col-md-3">
                                                            <label>Email Id (As Username): <span class="text-danger">*</span></label>
                                                            <input type="email" name="email" id="email" class="form-control"data-parsley-group="order" data-parsley-required value="<? echo $email; ?>" />
                                                        </div>
														<div class="col-md-3">
                                                            <label>Password: </label>
                                 
								  
								 
								  
								  	<input name="password" id="password" type="password" class="form-control" data-parsley-minlength="8"  data-parsley-required-message="Please enter your password." data-parsley-group="order" data-parsley-pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*" data-parsley-pattern-message="Password should contain atleast one letter, one capital, one number and minimum of eight characters in length."  />
								 
								 
                                                        </div>
														<div class="col-md-3">
                                                            <label>Confirm Password: </label>
                                                            <input type="password" name="decript_password" id="decript_password" class="form-control" data-parsley-equalto="#password" data-parsley-group="order"  />
                                                        </div>
														<!--<div class="col-md-3">
                                                            <label>User Group: <span class="text-danger">*</span></label>
                                                            <select name="user_group" id="user_group" class="form-control"data-parsley-group="information" data-parsley-required value="<? echo $role; ?>"><? echo $user_role;?></select>
                                                        </div>-->
                                            </div>
                                         </div>
                                                <div class="form-group">
                                                    <div class="row">
														<div class="col-md-3">
                                                            <label>Address: <span class="text-danger">*</span></label>
                                                            <textarea name="address" id="address" class="form-control"  data-parsley-group="order" data-parsley-required><? echo $address; ?></textarea>
                                                        </div>
                                                       <div class="col-md-3">
													   <label>Country code</label>
													   <?php if(strlen($mobile)==12 || strlen($mobile)==11)
													   {
														   $countrycode=substr($mobile, 0, 2);
														   $mobile=substr($mobile, 2); 
													   }
													  // print_r($countryo);
													   ?>
													   
		 <select name="mobileone" id="countryCodedial" class="form-control"><option data-countrycode="" value="">--Select Country Code--</option>
	   <?php foreach ($countryo as $countr)
	   {?>
		<option data-countrycode="<?php echo $countr['iso'];?>"
<?php if($countrycode==$countr['phonecode']){ echo"selected=selected";}?>
		value="<?php echo $countr['phonecode'];?>"><?php echo $countr['nicename'];?> (+<?php echo $countr['phonecode'];?>)</option>
	   <?php }?>
</select></div>     <div class="col-md-3">
                                                            <label>Mobile:</label>
															
                                                            <input type="text" name="mobile" id="mobile" class="form-control" data-parsley-type= "number" data-parsley-length="[9, 10]" data-parsley-group="order"  value="<? echo $mobile; ?>"/>
                                                        </div>
														 <div class="col-md-3">
                                                            <label>Postal Code: <span class="text-danger">*</span></label>
                                                            <input type="text" name="zip_code" id="zip_code" class="form-control" data-parsley-type= "number" data-parsley-length="[4,6]" data-parsley-group="order" data-parsley-required value="<? echo $zip_code; ?>" />
                                                        </div>
													     <div class="col-md-3">
                                                            <label>Country: <span class="text-danger">*</span></label>
															<select class="form-control" name="country" id="country" Onchange="return get_state(this.value);" data-parsley-group="order" data-parsley-required>
						<option value="">select</option>
						<?=$drop->get_dropdown($db,"SELECT id,nicename from countries",$country);?>
                     </select>
                                                            <!--<input type="text" name="country" id="country" class="form-control"data-parsley-group="information" data-parsley-required value="<? echo $country; ?>" />-->
                                                        </div>
														 <div class="col-md-3">
                                                            <label>State: <span class="text-danger">*</span></label>
															<div  id="state1">
															<select class="form-control" name="state" id="state" Onchange="return get_city(this.value);" data-parsley-group="order" data-parsley-required>
						<option value="">select</option>
						<?=$drop->get_dropdown($db,"SELECT state_id,state_name from states",$state);?>
                     </select>
					 </div>
                                                            <!--<input type="text" name="state" id="state" class="form-control"data-parsley-group="information" data-parsley-required value="<? echo $state; ?>" />-->
                                                        </div>
														 <div class="col-md-3">
                                                            <label>City: <span class="text-danger">*</span></label>
															<div id="city1">
															<select class="form-control" name="city" id="city" data-parsley-group="order" data-parsley-required>
						<option value="">select</option>
						<?=$drop->get_dropdown($db,"SELECT city_auto_id,city_name from city",$city);?>
                     </select>
					 </div>
                                                            <!--<input type="text" name="city" id="city" class="form-control"data-parsley-group="information" data-parsley-required value="<? echo $city; ?>"/>-->
                                                        </div>
														 <div class="col-md-3">
                                                            <label>Telephone:</label>
                                                            <input type="text" name="company_number" id="company_number"  class="form-control" data-parsley-type= "number" data-parsley-group="order" value="<? echo $company_number; ?>"/>
                                                        </div>
														 <div class="col-md-3">
                                                            <label>Fax:</label>
                                                            <input type="text" name="fax" id="fax" class="form-control" data-parsley-type= "number" data-parsley-length="[9,10]" data-parsley-group="order" value="<? echo $fax; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														<div class="col-md-3">
                                                            <label>Website</label>
                                                            <input type="text" name="website" id="website" class="form-control" value="<? echo $website; ?>"/>
															<input type="hidden" id="profilesub" name="profilesub" value="profilesub">
                                                        </div>
														
                                                    </div>
                                                </div>
												
                                            </div>
                                            <!--/ Wizard Container 2 -->
                                            <!-- Wizard Container 3 -->
                                            <div class="wizard-title"> Photos </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-book"></i> User Photos
                                                        </h5>
                                                        <p class="text-muted"> Add User Photos </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Choose photo: </label>
							  <div class="upload-section">
                                <label class="upload-image" for="upload-image-one" style="width:40%">
									<input type="file" id="upload-image-one" name="img" accept="image/*" onchange="img_validate('upload-image-one',300,300,1,1,'img_div')"/>
                                </label>										
                              </div>
							    <img src="../uploads/user_images/<?echo $img;?>" id="img_div" width="100" height="80" <?if($img==''){?>style='display:none;'<?}?>>
                                                        </div>
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
<script>
function get_state(val){
	//alert(val);
	 $.ajax({url: "state_ajax.php?val="+val, success: function(result){
        $("#state1").html(result);
    }});
}
function get_city(val){
	//alert(val);
	 $.ajax({url: "city_ajax.php?val="+val, success: function(result){
        $("#city1").html(result);
    }});
}
</script>
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
	
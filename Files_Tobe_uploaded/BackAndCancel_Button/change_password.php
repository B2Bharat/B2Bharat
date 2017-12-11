<? include "header.php";
$upd = isset($upd)?$upd:'';
if($submit) {
		$crcdt = date("Y-m-d H:i:s");
		$new_password = trim(addslashes($new_password));
		$confirm_password = trim(addslashes($confirm_password));
				$password=md5($new_password);
				$set  = "password = '$password'";
 				$set  .= ",chngdt = '$crcdt'";
				$set  .= ",ref_password = '$new_password'";
				$db->insertrec("update admin set $set where id='1'");
				$upd=2;

	if($upd==2)
	{
	echo 
				"<script>
              window.alert('password changed successfully');
              top.location='myprofile.php?upd=2';
              </script>";
				exit;
	}
	}
	?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>Change Password </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Change Password </li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->

	<div id="page-content">
            <div class="row">
                <div class="col-md-12">
                    
                    <section class="panel pass_wrp">
                   
                        <div class="panel-heading">
                            <h3 class="panel-title">Change Password</h3>
                         </div>
                         <div class="panel-body">
                         <!-- START Form Wizard -->
						 <form  class="form-horizontal form-bordered form-wizard" action="" id="wizard-validate" method="post" enctype="multipart/form-data" data-parsley-validate>
                         
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="page_name">Old Password <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="old_password" id="old_password" value="" class="form-control" OnBlur="return chekDbPass();" data-parsley-required>
										<div id="DbPassError"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="new_password">New Password <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="password" name="new_password" id="new_password" value="" class="form-control"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"data-parsley-error-message="Choose a password with minimum one UpperCase, LowerCase and Number & length must be between 8 to 25." 
										data-parsley-minlength="8"
										data-parsley-maxlength="25"
										data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="confirm_password">Confirm New Password <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="password" name="confirm_password" id="confirm_password" value=""  class="form-control"  
										data-parsley-equalto="#new_password" data-parsley-error-message="Password doesn't match."
										data-parsley-required>
									</div>
								</div>

						 <div class="row">
							<div class="panel-footer text-left">
								<div class="row"><div class="col-md-4  text-right">
                                                                        <a class="btn btn-info" href="welcome.php">Cancel</a>
                                                                        <input class="btn btn-info" type="submit" name="submit" value="Submit" Onsubmit="return chekDbPass();"></div></div>
							</div>
		                    </div>
							     
                                            <!--/ Wizard Container 3 -->
                                          </form>
                                        <!--/ END Form Wizard -->
                                    
                                </section>
                            </div>
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
       <script src="plugins/parsley/parsley.min.js"></script>
        <!--Javascript parsely plugin-->

       <script src="plugins/customjs.js"></script>
        <!--Javascript Myjs-->
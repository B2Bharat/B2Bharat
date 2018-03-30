<?
include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
$uinfo = $db->singlerec("select a.*,b.nicename from register as a inner join countries as b on a.country=b.id where a.id='$user_id'");
$acn = isset($acn)?$acn:'';
?>

      <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
         <div class="container">
           <?php include "include/profile-left.php";?> 
            <div class="col-sm-9 col-md-9">
               <div class="well">
				<center><h4 style='color:limegreen'><?if($acn=='supd'){?> Successfully updated..!!!<?}?></h4></center>
                  <h3>My Account</h3><br>
                  <form class="form-horizontal">
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["fname"];?></p>
                          <!--  <input type="test" class="form-control" id="inputEmail3" placeholder="Cinderella"> -->
                        </div>
                     </div>
					 <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["lname"];?></p>
                          <!--  <input type="test" class="form-control" id="inputEmail3" placeholder="Cinderella"> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["email"];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="example@domainname.com"> -->
                        </div>
                     </div>
					 <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Profile ID</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["id"];?></p>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Mobile Number</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["mobile"];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="+96 9876 543 210"> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["company_number"];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="+96 3210 6544 647"> -->
                        </div>
                     </div>
                     <!-- <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Fax</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["fax"];?></p>
                           <input type="text" class="form-control" id="inputPassword3" placeholder="987654 3210"> 
                        </div>
                     </div>-->
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Company Name</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["company_name"];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="Smart B2B "> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["address"];?></p>
                           <!-- <textarea class="form-control" rows="3">Boor No:12B West Street</textarea> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Website</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["website"];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="http://www.example.com"> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-10">
						<?php $city=$db->singlerec("select city_name from city where city_auto_id='$uinfo[city]'"); ?>
						   <p class="profile-details"><?php echo $city['city_name'];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="Sitka"> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
						<?php $state=$db->singlerec("select state_name from states where state_id='$uinfo[state]'"); ?>
						    <p class="profile-details"><?php echo $state["state_name"];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="Alaska "> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["nicename"];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="United States"> -->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Zip Code</label>
                        <div class="col-sm-10">
						   <p class="profile-details"><?php echo $uinfo["zip_code"];?></p>
                           <!-- <input type="text" class="form-control" id="inputPassword3" placeholder="99835"> -->
                        </div>
                     </div>
                     <!-- 					  <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                        	<label>
                        	  <input type="checkbox"> Remember me
                        	</label>
                          </div>
                        </div>
                         </div> -->
                     <div class="form-group">
                        <div class=" col-sm-12">
                           <a href="<?php echo $siteurl;?>/edit-profile" class="btn btn view-more-btn-3"><span class="glyphicon glyphicon-edit"></span>  Edit My Profile</a>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
			 
			 <!-- include/buissList.php -->
			 
         </div>
         <!-- container -->
      </div>
	 
<?php include "footer.php"; ?>
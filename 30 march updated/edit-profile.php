<?php 

include "header.php";

include "include/searchDiv.php";

include "include/useronly.php";

$uinfo = $db->singlerec("select * from register where id='$user_id'");

?>

<style>

.error {

	color: #d61c23;

	float: left;

}

</style>

<div class="container-fulid pdt25" style="background-color:#f5f5f5;">

	<div class="container">

	<?php include "include/profile-left.php";?>		

		<div class="col-sm-9 col-md-9">

            <div class="well">

                <h3>Edit Profile Information</h3><br/>

                <form class="form-horizontal" method="post" action="edit-profile" onsubmit="return validate();">

					  <div class="form-group">

						<label for="fname" class="col-sm-3 control-label">First Name <span class="required">*</span></label>

						<div class="col-sm-9">

						  <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $uinfo["fname"];?>"><div id="fnameError" class="editprofileerror"></div>

						</div>

					  </div>

					  <div class="form-group">

						<label for="lname" class="col-sm-3 control-label">Last Name <span class="required">*</span></label>

						<div class="col-sm-9">

						  <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $uinfo["lname"];?>"><div id="lnameError" class="editprofileerror"></div>

						</div>

					  </div>

					  <!-- this will  be remove while living the file -->

					  <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">Email <span class="required">*</span></label>

						<div class="col-sm-9">

						  <input type="email" name="mail" class="form-control" id="inputPassword3" value="<?php echo $uinfo["email"];?>" disabled>

						</div>

					  </div>

					  

					  <div class="form-group">

						<label for="mobile" class="col-sm-3 control-label">Mobile Number <span class="required">*</span></label>

						<div class="col-sm-9">

						  <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $uinfo["mobile"];?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )"><div id="mobileError" class="editprofileerror"></div>

						</div>

					  </div>

					  <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">Telephone number</label>

						<div class="col-sm-9">

						  <input type="text" name="tel" class="form-control" id="inputPassword3" value="<?php echo $uinfo["company_number"];?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">

						</div>

					  </div>

					   <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">Fax</label>

						<div class="col-sm-9">

						  <input type="text" name="fax" class="form-control" id="inputPassword3" value="<?php echo $uinfo["fax"];?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">

						</div>

					  </div>

					  <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">Company Name</label>

						<div class="col-sm-9">

						  <input type="text" name="cname" class="form-control" id="inputPassword3" value="<?php echo $uinfo["company_name"];?>">

						</div>

					  </div>

					  <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">Address <span class="required">*</span></label>

						<div class="col-sm-9">

						  <textarea class="form-control" rows="3" name="addr" id="addr"><?php echo $uinfo["address"];?></textarea><div id="addrError" class="editprofileerror"></div>

						</div>

					  </div>

					  <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">Website</label>

						<div class="col-sm-9">

						  <input type="text" name="site" class="form-control" id="inputPassword3" value="<?php echo $uinfo["website"];?>">

						</div>

					  </div>

					  <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">Country <span class="required">*</span></label>

						<div class="col-sm-9">

							<select class="form-control" name="country" id="country" Onchange="return get_state(this.value);">

								<option value="">select</option>

								<?

								echo $drop->get_dropdown($db,"SELECT id,nicename from countries",$uinfo["country"]);

								?>

							</select>

							<div id="countryError"></div>

						</div>

					  </div>					 

					  <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">State <span class="required">*</span></label>

						<div class="col-sm-9" id="state1">

						  <select class="form-control" name="state" id="state"  Onchange="return get_city(this.value);">

								<option value="">select</option>

								<?
echo $uinfo["state"];
								echo $drop->get_dropdown($db,"SELECT state_id,state_name from states",$uinfo["state"]);

								?>

							</select>

							<div id="stateError" class="editprofileerror"></div>

						</div>

					  </div>

					   <div class="form-group">

						<label for="inputPassword3" class="col-sm-3 control-label">City <span class="required">*</span></label>

						<div class="col-sm-9" id="city1">

						  <select class="form-control" name="city" id="city">

								<option value="">select</option>

								<?

								echo $drop->get_dropdown($db,"SELECT city_auto_id,city_name from city",$uinfo["city"]);

								?>

							</select>

							<div id="cityError" class="editprofileerror"></div>

						</div>

					  </div>
					  
					  
					  <div class="form-group">

						<label for="area" class="col-sm-3 control-label">Area <span class="required">*</span></label>

						<div class="col-sm-9">

						  <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $uinfo["area"];?>"><div id="areaError" class="editprofileerror"></div>

						</div>

					  </div>

					  <div class="form-group">

						<label for="postal" class="col-sm-3 control-label">Zip Code <span class="required">*</span></label>

						<div class="col-sm-9">

						  <input type="text" name="postal" class="form-control" id="postal" value="<?php echo $uinfo["zip_code"];?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">

						  <div id="zipError" class="editprofileerror"></div>

						</div>

					  </div>

					<!-- <div class="form-group">

						<div class="col-sm-offset-2 col-sm-10">

						  <div class="checkbox">

							<label>

							  <input type="checkbox"> Remember me

							</label>

						  </div>

						</div>

					  </div> -->

					  <div class="form-group">

						<div class="col-sm-offset-3 col-sm-10">

						  <button type="submit" name="_up" class="btn btn view-more-btn-3" ><span class="glyphicon glyphicon-floppy-disk"></span>  Save My Profile</button>

						</div>

					  </div>

					</form>

            </div>

        </div>

				

			<!-- include/buissList.php -->

			

		</div><!-- container -->

		</div>

<script>

function get_state(val){

	//alert(val);
document.getElementById('cityError').innerHTML='';
	 $.ajax({url: "state_ajax.php?val="+val, success: function(result){

        $("#state1").html(result);

    }});

}

function get_city(val){

	
document.getElementById('stateError').innerHTML='';
	 $.ajax({url: "city_ajax.php?val="+val, success: function(result){

        $("#city1").html(result);

    }});

}

</script>

<script>
 $('#fname').on('input',function(e){
     document.getElementById('fnameError').innerHTML='';
    });
	 $('#lname').on('input',function(e){
     document.getElementById('lnameError').innerHTML='';
    });
 $('#mobile').on('input',function(e){
     document.getElementById('mobileError').innerHTML='';
    });

 $('#addr').on('input',function(e){
     document.getElementById('addrError').innerHTML='';
    });
	
 $('#country').on('change',function(e){
     document.getElementById('countryError').innerHTML='';
    });
	 $('#state').on('change',function(e){
     document.getElementById('stateError').innerHTML='';
    });
	 $('#city').on('change',function(e){
     document.getElementById('cityError').innerHTML='';
    });
	 $('#postal').on('input',function(e){
     document.getElementById('zipError').innerHTML='';
    });
	
	
	
	
function errort()
{
 document.getElementById('cityError').innerHTML='';
}

	
	

function validate(){

	var fname=document.getElementById('fname').value;

	if(fname==""){

	document.getElementById('fnameError').innerHTML="Enter the first name";

	document.getElementById('fname').focus();

	return false;

	}

	var lname=document.getElementById('lname').value;

	if(lname==""){

	document.getElementById('lnameError').innerHTML="Enter the last name";

	document.getElementById('lname').focus();

	return false;

	}
		var area=document.getElementById('area').value;

	if(area==""){

	document.getElementById('lnameError').innerHTML="Enter the area name";

	document.getElementById('area').focus();

	return false;

	}

	var mobile=document.getElementById('mobile').value;

	if(mobile==""){

	document.getElementById('mobileError').innerHTML="Enter the mobile number";

	document.getElementById('mobile').focus();

	return false;

	}

	var addr=document.getElementById('addr').value;

	if(addr==""){

	document.getElementById('addrError').innerHTML="Enter your address";

	document.getElementById('addr').focus();

	return false;

	}

	var country=document.getElementById('country').value;

	if(country==""){

	document.getElementById('countryError').innerHTML="Select the country name";

	document.getElementById('country').focus();

	return false;

	}

	var state=document.getElementById('state').value;

	if(state==""){

	document.getElementById('stateError').innerHTML="Select the state name";

	document.getElementById('state').focus();

	return false;

	}

	var city=document.getElementById('city').value;

	if(city==""){

	document.getElementById('cityError').innerHTML="Select the cite name";

	document.getElementById('city').focus();

	return false;

	}

	var postal=document.getElementById('postal').value;

	if(postal==""){

	document.getElementById('zipError').innerHTML="Enter the zip code";

	document.getElementById('postal').focus();

	return false;

	}

}

</script>
<style>
.editprofileerror{color:red;}
</style>
	

<?php include "footer.php"; ?>

<?php include "update-profile.php"; ?>
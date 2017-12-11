<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Trade Show </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Trade Show </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$user_id = isSet($user_id) ? $user_id : '' ;
$show_name = isSet($show_name) ? $show_name : '' ;
$brief_title = isSet($brief_title) ? $brief_title : '' ;
$permalink = isSet($permalink) ? $permalink : '' ;
$event_starts = isSet($event_starts) ? $event_starts : '' ;
$event_ends = isSet($event_ends) ? $event_ends : '' ;
$event_start_time = isSet($event_start_time) ? $event_start_time : '' ;
$street = isSet($street) ? $street : '' ;
$state = isSet($state) ? $state : '' ;
$city = isSet($city) ? $city : '' ;
$postal_code = isSet($postal_code) ? $postal_code : '' ;
$country = isSet($country) ? $country : '101' ;
$organized_by = isSet($organized_by) ? $organized_by : '' ;
$url_logo = isSet($url_logo) ? $url_logo : '' ;
$phone = isSet($phone) ? $phone : '' ;
$fax = isSet($fax) ? $fax : '' ;
$website = isSet($website) ? $website : '' ;
$brief_address = isSet($brief_address) ? $brief_address : '' ;
$venue = isSet($venue) ? $venue : '' ;
$num_exibitors = isSet($num_exibitors) ? $num_exibitors : '' ;
$num_attendees = isSet($num_attendees) ? $num_attendees : '' ;
$exhibition_floor = isSet($exhibition_floor) ? $exhibition_floor : '' ;
$total_size = isSet($total_size) ? $total_size : '' ;
$industry_focus = isSet($industry_focus) ? $industry_focus : '' ;
$product_focus = isSet($product_focus) ? $product_focus : '' ;
$theme_of_show = isSet($theme_of_show) ? $theme_of_show : '' ;
$url_advertisement = isSet($url_advertisement) ? $url_advertisement : '' ;
$short_summary = isSet($short_summary) ? $short_summary : '' ;
$general_information = isSet($general_information) ? $general_information : '' ;
$brief_inform_atten = isSet($brief_inform_atten) ? $brief_inform_atten : '' ;
$brief_inform_exhibit = isSet($brief_inform_exhibit) ? $brief_inform_exhibit : '' ;
$crcdt = isSet($crcdt) ? $crcdt : '' ;
$status = isSet($status) ? $status : '' ;
$img = isSet($img) ? $img : '' ;
$ImgExt = isSet($ImgExt) ? $ImgExt : '' ;
$photos = isSet($photos) ? $photos : '' ;

if($submit) {
$crcdt = time();
$user_id = $user_id;
$show_name = trim(addslashes($show_name));
$brief_title = trim(addslashes($brief_title));
$permalink = trim(addslashes($permalink));
$event_starts = trim(addslashes($event_starts));
$event_ends = trim(addslashes($event_ends));
$event_start_time = trim(addslashes($event_start_time));
$street = trim(addslashes($street));
$state = trim(addslashes($state));
$city = trim(addslashes($city));
$postal_code = trim(addslashes($postal_code));
$country = trim(addslashes($country));
$organized_by = trim(addslashes($organized_by));
$url_logo = trim(addslashes($url_logo));
$phone = trim(addslashes($phone));
$fax = trim(addslashes($fax));
$website = trim(addslashes($website));
$brief_address = trim(addslashes($brief_address));
$venue = trim(addslashes($venue));
$num_exibitors = trim(addslashes($num_exibitors));
$num_attendees = trim(addslashes($num_attendees));
$exhibition_floor = trim(addslashes($exhibition_floor));
$total_size = trim(addslashes($total_size));
$industry_focus = trim(addslashes($industry_focus));
$product_focus = trim(addslashes($product_focus));
$theme_of_show = trim(addslashes($theme_of_show));
$url_advertisement = trim(addslashes($url_advertisement));
$short_summary = trim(addslashes($short_summary));
$general_information = trim(addslashes($general_information));
$brief_inform_atten = trim(addslashes($brief_inform_atten));
$brief_inform_exhibit = trim(addslashes($brief_inform_exhibit)); 
$permalink = trim(addslashes($permalink));
$status = trim(addslashes($status));
	
		$checkStatus = $db->check1column("trade_shows","show_name",$show_name);
		if($upd == 2)
			$checkStatus = 0;
		
		if($checkStatus == 0){
			$set  = "user_id = '$user_id'";
			$set  .= ",show_name = '$show_name'";
			$set  .= ",brief_title = '$brief_title'";
			$set  .= ",permalink = '$permalink'";
			$set  .= ",event_starts = '$event_starts'";
			$set  .= ",event_ends = '$event_ends'";
			$set  .= ",event_start_time = '$event_start_time'";
			$set  .= ",street = '$street'";
			$set  .= ",state = '$state'";
			$set  .= ",city = '$city'";
			$set  .= ",postal_code = '$postal_code'";
			$set  .= ",country = '$country'";
			$set  .= ",organized_by = '$organized_by'";
			//$set  .= ",url_logo = '$url_logo'";
			$set  .= ",phone = '$phone'";
			$set  .= ",fax = '$fax'";
			$set  .= ",website = '$website'";
			$set  .= ",brief_address = '$brief_address'";
			$set  .= ",venue = '$venue'";
			$set  .= ",num_exibitors = '$num_exibitors'";
			$set  .= ",num_attendees = '$num_attendees'";
			$set  .= ",exhibition_floor = '$exhibition_floor'";
			$set  .= ",total_size = '$total_size'";
			$set  .= ",industry_focus = '$industry_focus'";
			$set  .= ",product_focus = '$product_focus'";
			$set  .= ",theme_of_show = '$theme_of_show'";
			$set  .= ",url_advertisement = '$url_advertisement'";
			$set  .= ",short_summary = '$short_summary'";
			$set  .= ",general_information = '$general_information'";
			$set  .= ",brief_inform_atten = '$brief_inform_atten'";
			$set  .= ",brief_inform_exhibit = '$brief_inform_exhibit'";
			$set  .= ",status = '$status'";
			$acn="";
			if($upd == 1){
				//$acn = "new";
			}else if($upd == 2){
				//$acn = "update";
			}
			
	if($_FILES['url_logo']['tmp_name']!=""){
		$NgImg='01'.$user_id.uniqid();
		$isUploaded = $com_obj->upload_image('url_logo',$NgImg,200,200,1,1,"../uploads/trade_show/logo",$acn);
		if($isUploaded){
			$NgImg=$com_obj->img_Name;  
			$set.=",url_logo='$NgImg'";
		}else{
			echo "<br/><center style='color:red;'>".$com_obj->img_Err."</center>"; 
			echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
			exit;
		}
	}
	if($_FILES['photos']['tmp_name']!=""){
	$NgImg='02'.$user_id.uniqid();
	$isUploaded = $com_obj->upload_image('photos',$NgImg,1000,600,5,3,"../uploads/trade_show/",$acn);
	if($isUploaded){
		$NgImg=$com_obj->img_Name;
		$set.=",photos='$NgImg'";
	}
	}
			if($upd == 1){
				$set  .= ",crcdt = '$crcdt'";   
				$idvalue = $db->insertid("insert into trade_shows set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update trade_shows set $set where id='$idvalue'");
				$act = "upd";
			}
			@header("location:tradeshow.php?page=$pg&act=$act");
			echo "<script>window.location='tradeshow.php?page=$pg&act=$act';</script>";
			exit;
		}	
		 else {
			 $id = $idvalue;
			$Message = "<font color='red'>$show_name Already Exit's</font>";
		}
}
if($upd == 1){
	$TextChange = "Add";
}
else if($upd == 2){
	$TextChange = "Edit";
}
	
$GetRecord = $db->singlerec("select * from trade_shows where id='$id'");
@extract($GetRecord);
$user_id = $user_id;
$show_name = stripslashes($show_name);
$brief_title = stripslashes($brief_title);
$permalink = stripslashes($permalink);
$event_starts = stripslashes($event_starts);
$event_ends = stripslashes($event_ends);
$event_start_time = stripslashes($event_start_time);
$street = stripslashes($street);
$state = stripslashes($state);
$city = stripslashes($city);
$postal_code = stripslashes($postal_code);
$country = stripslashes($country);
$organized_by = stripslashes($organized_by);
$url_logo = stripslashes($url_logo);
$phone = stripslashes($phone);
$fax = stripslashes($fax);
$website = stripslashes($website);
$brief_address = stripslashes($brief_address);
$venue = stripslashes($venue);
$num_exibitors = stripslashes($num_exibitors);
$num_attendees = stripslashes($num_attendees);
$exhibition_floor = stripslashes($exhibition_floor);
$total_size = stripslashes($total_size);
$industry_focus = stripslashes($industry_focus);
$product_focus = stripslashes($product_focus);
$theme_of_show = stripslashes($theme_of_show);
$url_advertisement = stripslashes($url_advertisement);
$short_summary = stripslashes($short_summary);
$general_information = stripslashes($general_information);
$brief_inform_atten = stripslashes($brief_inform_atten);
$brief_inform_exhibit = stripslashes($brief_inform_exhibit); 
$permalink = stripslashes($permalink);
$photos = stripslashes($photos);


 /*$perm=$siteurl;
 $perm.="/";
 $perm.={{show_name}};*/

$user_name = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,CONCAT(fname,' ',lname) from register where active_status='1'";
$user_name .= $drop->get_dropdown($db,$DropDownQry,$user_id);
	
?>
		<!--Page content-->
		<!--===================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
                                            <a class= "btn btn-info" onclick="history.go(-1);">Back </a>
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Trade Show</h3>
						</div>
						<div ng-app="myApp" ng-controller="myCtrl">
						<form name="myForm" class="form-horizontal" method="post" id="wizard-validate" action="" enctype="multipart/form-data" onsubmit="return testvalid();">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">									
									<tr>
										<td>Name of the Show <font color="red">*</font></td>
										<td><input type="text" name="show_name" id="show_name" onchange="testvalid(this.value,'idmn')" ng-model="show_name" class="form-control idmn" required>
										</td>
									</tr>
									<tr>
										<td>Permalink <font color="red">*</font></td>
										<td><input type="text" name="permalink" id="permalink" value="<?echo $siteurl;?>/{{show_name}}" readonly class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Brief Title <font color="red">*</font></td>
										<td><input type="text" name="brief_title" id="brief_title" value="<? echo $brief_title; ?>" class="form-control idmn1" onchange="testvalid(this.value,'idmn1')" required>
										</td>
									</tr>
									<tr>
										<td>Select An User <font color="red">*</font></td>
										<td><select class="form-control" name="user_id" id="user_id" required value="<? echo $user_id;?>"><?php echo $user_name; ?></select>
										</td>
									</tr>
									<tr>
										<td>Event Starts On <font color="red">*</font></td>
										<td><input type="text" name="event_starts" id="event_starts" value="<? echo $event_starts; ?>" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Event Ends On <font color="red">*</font></td>
										<td><input type="text" name="event_ends" id="event_ends" value="<? echo $event_ends; ?>" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Event Start at </td>
										<td><input type="time" name="event_start_time" id="event_start_time" value="<? echo $event_start_time; ?>" class="form-control" >
										</td>
									</tr>
									<tr>
										<td>Street <font color="red">*</font></td>
										<td><input type="text" name="street" id="street" value="<? echo $street; ?>" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>State/Country </td>
										<td><input type="text" onchange="testvalid(this.value,'idmn2')" name="state" id="state" value="<? echo $state; ?>" class="form-control idmn2">
										</td>
									</tr>
									<tr>
										<td>City <font color="red">*</font></td>
										<td><input type="text" onchange="testvalid(this.value,'idmn3')" name="city" id="city" value="<? echo $city; ?>" class="form-control idmn3" required>
										</td>
									</tr>
									<tr>
										<td>Postal Code <font color="red">*</font></td>
										<td><input type="number" data-parsley-type="integer" data-parsley-group="order"
										data-parsley-maxlength="4"
										data-parsley-error-message="enter 4 digit postal code"
										name="postal_code" id="postal_code" data-fv-stringlength-message="Enter digits between 4 and 6" maxlength="6" minlength="4" min="0" value="<? echo $postal_code; ?>" class="form-control idpostl" onchange="postvalid(this.value,'idpostl')" required>
										</td>
									</tr>
									<tr>
										<td>Country <font color="red">*</font></td>
										<td> 
										<select class="form-control" name="country">
										<option value="">Select Country</option>
										<?echo $drop->get_dropdown($db,"SELECT id,nicename from countries",$country);?>
										</select>
										</td>
									</tr>
									<tr>
										<td>Organized By <font color="red">*</font></td>
										<td><input type="text" name="organized_by" id="organized_by" value="<? echo $organized_by; ?>" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>URL of Logo/Image </td>
										<td> 
										<div class="upload-section">
										<label class="upload-image" for="upload-image-one">
										<input type="file" id="upload-image-one" name="url_logo" accept="image/*" onchange="img_validate('upload-image-one',200,200,1,1,'img_div1')">
										</label>								
									    </div>
									<img src="../uploads/trade_show/logo/<?echo $url_logo;?>" id="img_div1" width="100" height="80" <?if($url_logo==''){?>style='display:none;'<?}?>>
										</td>
									</tr>
									<tr>
										<td>Phone Number <font color="red">*</font></td>
										<td><input type="text" name="phone" id="phone" min="0" minlength="9" maxlength="10" value="<? echo $phone	; ?>" class="form-control phonecheck" onchange="validatePhone(this.value,'phonecheck')" required>
										</td>
									</tr>
									<tr>
										<td>Fax Number <font color="red">*</font></td>
										<td><input type="text" data-parsley-type="integer"
										data-parsley-error-message="enter valid fax number"
										name="fax" onchange="validateFax(this.value,'faxcheck')" id="fax" value="<? echo $fax; ?>" min="0" minlength="9" maxlength="10" class="form-control faxcheck" required>
										</td>
									</tr>
									<tr>
										<td>Website URL </td>
										<td><input type="url" name="website" id="website" value="<? echo $website; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Brief Address <font color="red">*</font></td>
										<td><textarea name="brief_address" id="brief_address" class="form-control" required><? echo $brief_address; ?></textarea>
										</td>
									</tr>
									<tr>
										<td>Venue <font color="red">*</font></td>
										<td><input type="text" name="venue" id="venue" value="<? echo $venue; ?>" onchange="validatevenu(this.value,'venuclear')" class="form-control venuclear" required>
										</td>
									</tr>
									<tr>
										<td>Photos of Show </td>
										<td>
										<div class="upload-section">
										<label class="upload-image" for="upload-image-two">
										<input type="file" id="upload-image-two" name="photos" accept="image/*" onchange="img_validate('upload-image-two',1000,600,5,3,'img_div2')">
										</label>								
										</div>
									    <img src="../uploads/trade_show/<?echo $photos;?>" id="img_div2" width="100" height="80" <?if($photos==''){?>style='display:none;'<?}?>>
									</tr>
									<tr>
										<td>No. of Exhibitors </td>
										<td><input type="text" name="num_exibitors" id="num_exibitors" value="<? echo $num_exibitors; ?>" class="form-control numcheckgh" onchange="numcheck(this.value,'numcheckgh')">
										</td>
									</tr>
									<tr>
										<td>No. of attendees </td>
										<td><input type="text" name="num_attendees" id="num_attendees" value="<? echo $num_attendees; ?>" class="form-control numcheckgh1" onchange="numcheck(this.value,'numcheckgh1')">
										</td>
									</tr>
									<tr>
										<td>Exhibition Floor(in sqm) <font color="red">*</font></td>
										<td><input type="text" name="exhibition_floor" id="exhibition_floor" value="<? echo $exhibition_floor; ?>" class="form-control numcheckgh2" onchange="numcheck(this.value,'numcheckgh2')" required>
										</td>
									</tr>
									<tr>
										<td>Total Size(in sqm) <font color="red">*</font></td>
										<td><input type="text" name="total_size" id="total_size" value="<? echo $total_size; ?>" class="form-control numcheckgh3" onchange="numcheck(this.value,'numcheckgh3')" required>
										</td>
									</tr>
									<tr>
										<td>Industry Focus <font color="red">*</font></td>
										<td><input type="text" name="industry_focus" id="industry_focus" value="<? echo $industry_focus; ?>" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Product and Services Focus <font color="red">*</font></td>
										<td><input type="text" name="industry_focus" id="industry_focus" value="<? echo $industry_focus; ?>" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Theme of the Show <font color="red">*</font></td>
										<td><input type="text" name="theme_of_show" id="theme_of_show" value="<? echo $theme_of_show; ?>" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>URL of Show advertisement page </td>
										<td><input type="text" name="url_advertisement" id="url_advertisement" value="<? echo $url_advertisement; ?>" class="form-control urlcheckmk" onchange="urlcheck(this.value,'urlcheckmk')">
										</td>
									</tr>
									<tr>
										<td>Short Summary of this show </td>
										<td><input type="text" name="short_summary" id="short_summary" value="<? echo $short_summary; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>General Information <font color="red">*</font></td>
										<td><textarea name="general_information" id="general_information" class="form-control" required><? echo $general_information; ?></textarea>
										</td>
									</tr>
									<tr>
										<td>Brief information of attendees </td>
										<td><textarea name="brief_inform_atten" id="brief_inform_atten" class="form-control" ><? echo $brief_inform_atten; ?></textarea>
										</td>
									</tr>
									<tr>
										<td>Brief information of exhibitor </td>
										<td><textarea name="brief_inform_exhibit" id="brief_inform_exhibit" class="form-control"><? echo $brief_inform_exhibit; ?></textarea>
										</td>
									</tr>
									<tr>
										<td>Publish this Show </td>
										<td><input type="radio" name="status" value="1" <?if($status==1)echo "checked"; ?>>Yes &nbsp;
										<input type="radio" name="status" value="0" <?if($status==0)echo "checked"; ?>>No
										</td>
									</tr>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="tradeshow.php">Cancel</a>
							</div>
						</form>
						</div>
						<!--===================================================-->
						<!--End Horizontal Form-->
					</div>
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

<script>
$(document).on("focusout","#phone",function(){
   if($(this).val() < 0){
            $(this).val('');
        }
});


$(document).on("focusout","#fax",function(){
   if($(this).val() < 0){
            $(this).val('');
        }
});

$(document).on("focusout","#num_exibitors",function(){
   if($(this).val() < 0){
            $(this).val('');
        }
});

$(document).on("focusout","#num_attendees",function(){
   if($(this).val() < 0){
            $(this).val('');
        }
});

$(document).on("focusout","#exhibition_floor",function(){
   if($(this).val() < 0){
            $(this).val('');
        }
});

$(document).on("focusout","#total_size",function(){
   if($(this).val() < 0){
            $(this).val('');
        }
});



</script>



<script>
	
var app = angular.module('myApp', []);
  
app.controller('myCtrl', function($scope, $http) {
$scope.show_name="<?echo $show_name;?>";
});

</script>
<link rel="stylesheet" href="css/datepicker.min.css" />
<link rel="stylesheet" href="css/datepicker3.min.css" />

<script src="js/bootstrap-datepicker.min.js"></script>
<script>
		
$("#event_starts").datepicker({
  format: 'mm/dd/yyyy',
  startDate: new Date(),
  autoclose: true,
}).on('changeDate', function (selected) {
    var startDate = new Date(selected.date.valueOf());
    $('#event_ends').datepicker('setStartDate', startDate);
}).on('clearDate', function (selected) {
    $('#event_ends').datepicker('setStartDate', null);
});

$("#event_ends").datepicker({
   format: 'mm/dd/yyyy',
   startDate: new Date(),
   autoclose: true,
}).on('changeDate', function (selected) {
   var endDate = new Date(selected.date.valueOf());
   $('#event_starts').datepicker('setEndDate', endDate);
}).on('clearDate', function (selected) {
   $('#event_starts').datepicker('setEndDate', null);
});		




function testvalid(dfs,jjkj)
{
	var regex = /^[a-zA-Z\s]+$/;
        var str = dfs;
        if (regex.test(str)) {
            return true;
        }
        else
        {
       
        alert('Please enter alphabets only');
		
		$("."+jjkj).val('');
        return false;
        }
}

function validatePhone(txtPhone,gtry) {
    var a = txtPhone;
	//alert(a.length);
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
	 var regex = /^[0-9]*(?:\.\d{1,2})?$/;    // allow only numbers [0-9] 
  if( !regex.test(a) ) {
       alert('Phone number should be number');
		$("."+gtry).val('');
		return false;
  }
  
	else if((a.length<9))
	{
		alert('Phone number should be 9 or 10 digit');
		$("."+gtry).val('');
		return false;
	}
	else if((a.length>10))
	{
		alert('Phone number should be 9 or 10 digit');
		$("."+gtry).val('');
		return false;
	}
    else {
		
        return true;
    }
}

function validateFax(txtPhone,gtry)
{
	var a = txtPhone;
	var regex = /^[0-9]*(?:\.\d{1,2})?$/;    // allow only numbers [0-9] 
  if( !regex.test(a) ) {
       alert('Fax should be number');
		$("."+gtry).val('');
		return false;
  }
  else
  {
	  return true;
  }
}

function postvalid(gg,jk)
{
	if(gg.length>6 || gg.length<4)
	{
		alert("Enter digits between 4 and 6");
		$("."+jk).val('');
		return false;
	}
	else
	{
		return true;
	}
}

function validatevenu(textvanue,classd)
{
	var a = textvanue;
	if((a.length>20))
	{
		alert('Venue should be 20 number of characters');
		$("."+classd).val('');
		return false;
	}
	else
	{
		return true;
	}
}


function numcheck(dd,kk)
{
	var regs=/^[0-9]{1,10}$/;
	if(!regs.test(dd))
	{
		alert('Please Enter digits');
		$("."+kk).val('');
		return false;
	}
	else
	{
		return true;
	}
}


function urlcheck(ff,ll)
{
	 var urlregex = new RegExp(
        "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
	if(!urlregex.test(ff))
	{
		alert('Url invalide');
		$("."+ll).val('');
		return false;
	}
	else
	{
		return true;
	}
}



</script>

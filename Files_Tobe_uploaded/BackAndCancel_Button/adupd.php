<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i> Manage Advertisement </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Manage Advertisement </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$category_id = isSet($category_id) ? $category_id : '' ;
$ad_name = isSet($ad_name) ? $ad_name : '' ;
$cat_img = isSet($cat_img) ? $cat_img : '' ;
$home_left = isSet($home_left) ? $home_left : '' ;
$home_bottom1 = isSet($home_bottom1) ? $home_bottom1 : '' ;
$home_bottom2 = isSet($home_bottom2) ? $home_bottom2 : '' ;
$ad_title = isSet($ad_title) ? $ad_title : '' ;
$ad_description = isSet($ad_description) ? $ad_description : '' ;
$meta_title = isSet($meta_title) ? $meta_title : '' ;
$keyword = isSet($keyword) ? $keyword : '' ;
$meta_description = isSet($meta_description) ? $meta_description : '' ;
$crcdt = isSet($crcdt) ? $crcdt : '' ;
$ad_location = isSet($ad_location) ? $ad_location : '' ;
$dis_status = isSet($dis_status) ? $dis_status : '' ;
$thumb_url = isSet($thumb_url) ? $thumb_url : '' ;

if($submit) {
    $crcdt = time();   
	$ad_name = trim(addslashes($ad_name));
	$group = trim(addslashes($group));
	$ad_name = trim(addslashes($ad_name));
	$cat_img = trim(addslashes($cat_img));
	$ad_location = trim(addslashes($ad_location));
	$ad_title = trim(addslashes($ad_title));
	$ad_description = trim(addslashes($ad_description));
	$meta_title = trim(addslashes($meta_title));
	$keyword = trim(addslashes($keyword));
	$meta_description = trim(addslashes($meta_description));
	$dis_status = trim(addslashes($dis_status));
	$thumb_url= trim(addslashes($thumb_url));
	
		$checkStatus = $db->check1column("manage_ad","ad_location",$ad_location);
		
		if($upd == 2)
			$checkStatus = 0;
	
		if($checkStatus == 0){
		
			$set   = "ad_name = '$ad_name'";
			$set  .= ",category_id = '$group'";
			$set  .= ",ad_title = '$ad_title'";	
			$set  .= ",ad_description = '$ad_description'";
			$set  .= ",meta_title = '$meta_title'";	
			$set  .= ",keyword = '$keyword'";
			$set  .= ",ad_location = '$ad_location'";
			$set  .= ",meta_description = '$meta_description'";
			$set  .= ",crcdt = NOW()"; 			
			$set  .= ",dis_status = '$dis_status'";
			$set  .= ",thumb_url = '$thumb_url'";
			
		$imgg=$_FILES['cat_img']['tmp_name'];
		if($imgg!=""){
			$NgImg='ad_image_'.date('Y-m-d-H-i-s').'_'.uniqid();
			if($ad_location=="Home")
			$isUploaded = $com_obj->upload_image('cat_img',$NgImg,720,90,8,1,"../uploads/images/banner/",'new');
			
			if($ad_location=="HomeLeft" || $ad_location=="HomeLeft2" || $ad_location=="HomeLeft3" || $ad_location=="HomeLeft4" || $ad_location=="HomeLeft5" || $ad_location=="HomeLeft6" || $ad_location=="HomeLeft7" || $ad_location=="HomeLeft8" || $ad_location=="HomeLeft9" || $ad_location=="HomeLeft10" || $ad_location=="HomeLeft11" || $ad_location=="HomeLeft12" || $ad_location=="HomeLeft13" || $ad_location=="HomeLeft14" || $ad_location=="HomeLeft15" || $ad_location=="HomeLeft16")
			$isUploaded = $com_obj->upload_image('cat_img',$NgImg,300,360,5,6,"../uploads/images/banner/",'new');
			if($ad_location=="portrait1" || $ad_location=="portrait2")
			$isUploaded = $com_obj->upload_image('cat_img',$NgImg,100,400,1,4,"../uploads/images/banner/",'new');
			if($ad_location=="HomeBottom1")
			$isUploaded = $com_obj->upload_image('cat_img',$NgImg,250,250,1,1,"../uploads/images/banner/",'new');
			if($ad_location=="HomeBottom2")
			$isUploaded = $com_obj->upload_image('cat_img',$NgImg,317,250,317,250,"../uploads/images/banner/",'new');
			if($ad_location=="HomeBottom2")
			$isUploaded = $com_obj->upload_image('cat_img',$NgImg,317,250,317,250,"../uploads/images/banner/",'new');
			if($ad_location=="ListBottom")
			$isUploaded = $com_obj->upload_image('cat_img',$NgImg,720,90,8,1,"../uploads/images/banner/",'new');
			if($isUploaded){
			$NgImg = $com_obj->img_Name;	
			$set.=",cat_img='$NgImg'";
		}else{
			echo $com_obj->img_Err; exit;	
		}
		}
		    if($upd == 1){
				$idvalue = $db->insertid("insert into manage_ad set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update manage_ad set $set where id='$id'");
				$act = "upd";
			}
			
			echo "<script>location.href='advertisement.php?page=$pg&act=$act';</script>";
			@header("location:advertisement.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			$id = $idvalue;
			$Message = "<font color='red'> Already Exist</font>";
		}
	} 
if($upd == 1){
	$hidimg = "style='display:none;'";
	$TextChange = "Add";
}
	
else if($upd == 2){
	$hidimg = "";
	$TextChange = "Edit";
}
	
$GetRecord = $db->singlerec("select * from manage_ad where id='$id'");
@extract($GetRecord);
$$ad_name = stripslashes($ad_name);
$category_id = stripslashes($category_id);
$cat_img = stripslashes($cat_img);
$ad_location = stripslashes($ad_location);
$ad_title= stripslashes($ad_title);
$ad_description = stripslashes($ad_description);
$meta_title = stripslashes($meta_title);
$keyword = stripslashes($keyword);
$meta_description = stripslashes($meta_description);

$dis_status = stripslashes($dis_status);
$thumb_url = stripslashes($thumb_url);  

$category = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,category_name from allcategory where type='ads' and active_status='1'";
$category .= $drop->get_dropdown($db,$DropDownQry,$category_id);
$membershipp = "<option value=''>- - Select- -</option>";
$DropDownQry1 = "select * from membership where active_status='1'";
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Advertisement<span><? echo $Message;?><span></h3>
						</div>
						<form class="form-horizontal form-bordered form-wizard" id="wizard-validate" method="post" action="" enctype="multipart/form-data" data-parsley-validate>
							<input type="hidden" name="idvalue" value="<?echo $c_id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Select Category <font color="red">*</font></label>
									<div class="col-sm-3">
										<select name="group" id="group" class="form-control" data-parsley-group="information" 
										data-parsley-required value="<? echo $category_id; ?>"><? echo $category;?></select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Language</label>
									<div class="col-sm-3">
										<select class="form-control" name="city" id="uloc">
								<option value="">Select language</option>
								<option value="Tamil">Tamil</option>
								<option value="English">English</option>
								<option value="Hindi">Hindi</option>
								<option value="Malayalam">Malayalam</option>
							</select><!-- select -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Name of Advertisement <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="ad_name" id="ad_name" value="<? echo $ad_name; ?>" class="form-control" data-parsley-pattern="^[a-zA-Z0-9 ]+$" 
										data-parsley-maxrange="25"
										data-parsley-group="information" data-parsley-required>
									</div>
								</div>
								
							<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Advertise Title <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="ad_title" id="ad_title" value="<? echo $ad_title; ?>"  class="form-control" 
										data-parsley-maxrange="40"
										data-parsley-group="information" data-parsley-required>
										</div>
								</div>
							
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Advertise Description <font color="red">*</font></label>
									<div class="col-sm-3">
										<textarea name="ad_description" id="description"    class="form-control"data-parsley-group="information" data-parsley-maxrange="2000" data-parsley-required><? echo $ad_description; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Meta Title <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="meta_title" id="category" value="<? echo $meta_title; ?>" class="form-control" data-parsley-group="information" 
										data-parsley-maxrange="40"
										data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Keyword <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="keyword" id="category" value="<? echo $keyword; ?>" class="form-control" 
										data-parsley-maxrange="25"
										data-parsley-group="information" data-parsley-required>
									</div>
								</div>
									<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Meta Description <font color="red">*</font></label>
									<div class="col-sm-3">
										<textarea name="meta_description" id="description"   class="form-control" 
										data-parsley-maxrange="2000"
										data-parsley-group="information" data-parsley-required><? echo $meta_description; ?></textarea>
									</div>
									</div>
									<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Advertisement Location <font color="red">*</font></label>
									<div class="col-sm-3">
									<?$bannerArr = array("Home"=>"Home (720x90)",
													 "HomeLeft"=>"HomeRight Slide 1-1 (300x360)",
													 "HomeLeft2"=>"HomeRight Slide 1-2 (300x360)",
													 "HomeLeft3"=>"HomeRight Slide 1-3 (300x360)",
													 "HomeLeft4"=>"HomeRight Slide 1-4 (300x360)",
													 "HomeLeft5"=>"HomeRight Slide 2-1 (300x360)",
													 "HomeLeft6"=>"HomeRight Slide 2-2 (300x360)",
													 "HomeLeft7"=>"HomeRight Slide 2-3 (300x360)",
													 "HomeLeft8"=>"HomeRight Slide 2-4 (300x360)",
													 "HomeLeft9"=>"HomeRight Slide 3-1 (300x360)",
													 "HomeLeft10"=>"HomeRight Slide 3-2 (300x360)",
													 "HomeLeft11"=>"HomeRight Slide 3-3 (300x360)",
													 "HomeLeft12"=>"HomeRight Slide 3-4 (300x360)",
													 "HomeLeft13"=>"HomeRight Slide 4-1 (300x360)",
													 "HomeLeft14"=>"HomeRight Slide 4-2 (300x360)",
													 "HomeLeft15"=>"HomeRight Slide 4-3 (300x360)",
													 "HomeLeft16"=>"HomeRight Slide $-4 (300x360)",
													 "HomeBottom1"=>"HomeBottom1",
													 "HomeBottom2"=>"HomeBottom2",
													 "ListBottom"=>"ListBottom (720x90)",
													 "portrait1"=>"Portrait1 (100x400)",
													 "portrait2"=>"Portrait2 (100x400)",
													 );?>
									
									<select class="form-control" name="ad_location" id="ad_location" onchange="myFunc(this.value)" data-parsley-required>
										<option value="">Select Ad location</option>
										<?foreach($bannerArr as $key=>$bAr){
											if($key == $ad_location){$ch = "selected";}else{$ch='';}
										?>
										<option value="<?echo $key;?>" <?echo $ch;?>><?echo $bAr;?></option>
										<?}?>
									</select><!-- select -->
									</div>
								</div>
								

								
								<div class="form-group">
								<label class="col-sm-2 control-label" for="demo-hor-inputemail">Advertisement Image</label>
													<div class="col-sm-3">
													   <div class="upload-section" id="upload-section">
														
													  </div>
													</div>
													
													
														<img src="../uploads/images/banner/<?echo $cat_img;?>" id="img_div" width="100" height="80" <?if($cat_img==''){?>style='display:none;'<?}?>>
														</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Thumbnail URL <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="url" name="thumb_url" id="thumb_url" value="<? echo $thumb_url;?>" class="form-control" data-parsley-group="information" data-parsley-type="url" data-parsley-required>
									</div>
								</div> 														
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Active Status</label>
									<div class="col-sm-3">
										<input type="radio" name="dis_status" id="dis_statusy"data-parsley-group="information" value="1" <? if($dis_status=='1')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="dis_status" id="dis_statusn"data-parsley-group="information"  value="0" <? if($dis_status=='0')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
							</div>
							<div class="panel-footer text-left">
								<div class="row"><div class="col-md-4  text-right">
                                                                        <a class="btn btn-info" href="advertisement.php">Back</a>
                                                                        <input class="btn btn-info" type="submit" name="submit" value="Submit"></div></div>
							</div>
						</form>
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
 <script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
<script>
function myFunc(val){
if(val=="Home")
$("#upload-section").html('<input type=file id=upload-image-one name=cat_img accept=image/* onchange=img_validate("upload-image-one",720,90,8,1)>');
if(val=="HomeLeft" || val=="HomeLeft2" || val=="HomeLeft3" || val=="HomeLeft4" || val=="HomeLeft5" || val=="HomeLeft6" || val=="HomeLeft7" || val=="HomeLeft8" || val=="HomeLeft9" || val=="HomeLeft10" || val=="HomeLeft11" || val=="HomeLeft12" || val=="HomeLeft13" || val=="HomeLeft14" || val=="HomeLeft15" || val=="HomeLeft16")
$("#upload-section").html('<input type=file id=upload-image-one name=cat_img accept=image/* onchange=img_validate("upload-image-one",300,360,5,6)>');
if(val=="HomeBottom1")
$("#upload-section").html('<input type=file id=upload-image-one name=cat_img accept=image/* onchange=img_validate("upload-image-one",250,250,1,1)>');
if(val=="HomeBottom2")
$("#upload-section").html('<input type=file id=upload-image-one name=cat_img accept=image/* onchange=img_validate("upload-image-one",317,250,317,250)>');
if(val=="ListBottom")
$("#upload-section").html('<input type=file id=upload-image-one name=cat_img accept=image/* onchange=img_validate("upload-image-one",720,90,8,1)>');
if(val=="portrait1" || val=="portrait2")
$("#upload-section").html('<input type=file id=upload-image-one name=cat_img accept=image/* onchange=img_validate("upload-image-one",100,400,1,4)>');
}

<?if($upd == 2){?>
myFunc($("#ad_location").val());
<?}?>
</script>
		
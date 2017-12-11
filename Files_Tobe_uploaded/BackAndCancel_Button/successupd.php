<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Success Story </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Success Story </li>
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
$story_name = isSet($story_name) ? $story_name : '' ;
$story_title = isSet($story_title) ? $story_title : '' ;
//$permalink = isSet($permalink) ? $permalink : '' ;
$story_details = isSet($story_details) ? $story_details : '' ;
$crcdt = isSet($crcdt) ? $crcdt : '' ;
$status = isSet($status) ? $status : '' ;
$img = isSet($img) ? $img : '' ;
$ImgExt = isSet($ImgExt) ? $ImgExt : '' ;
$DisplayDeleteImgLink = isSet($DisplayDeleteImgLink) ? $DisplayDeleteImgLink : '' ;
$story_photo = isSet($story_photo) ? $story_photo : '' ;

if($act ==  "del" && $nimg != "") {
    $RemoveImage = "../uploads/success/$nimg";
    @unlink($RemoveImage);
    $db->insertrec("update success_stories set story_photo='noimage.jpg' where id='$id'");
	echo "<script>location.href='successupd.php?upd=2&msg=nimgscs&id=$id';</script>";
    header("Location:successupd.php?upd=2&msg=nimgscs&id=$id") ;
    exit ;
}

if($submit) {
    $crcdt = date("Y-m-d");
	$user_id = $user_id;
	$story_name = trim(addslashes($story_name));
	$story_title = trim(addslashes($story_title));
	//$permalink = trim(addslashes($permalink));
	$story_details = trim(addslashes($story_details));
	$imgg=$_FILES['story_photo']['tmp_name'];
		$checkStatus = $db->check1column("success_stories","story_name",$story_name);
		if($upd == 2)
			$checkStatus = 0;

		if($checkStatus == 0){
			$set  = "user_id = '$user_id'";
			$set  .= ",story_name = '$story_name'";
			$set  .= ",story_title = '$story_title'";
			//$set  .= ",permalink = '$permalink'";
			$set  .= ",story_details = '$story_details'";
			
			 if($imgg!=""){
			   $NgImg=$user_id.uniqid();
				 $isUploaded = $com_obj->upload_image('story_photo',$NgImg,300,300,1,1,"../uploads/success/",'');
			  if($isUploaded){
			   $NgImg = $com_obj->img_Name; 
			   $set.=",story_photo='$NgImg'";
			  }else{
			   echo $com_obj->img_Err; exit; 
			  }
			  }
  
			if($upd == 1){
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",status = '1'";
				$idvalue = $db->insertid("insert into success_stories set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update success_stories set $set where id='$idvalue'");
				$act = "upd";
			}
			
			echo "<script>location.href='success_story.php?page=$pg&act=$act';</script>";
			@header("location:success_story.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			 $id = $idvalue;
			$Message = "<font color='red'>$story_name Already Exist's</font>";
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
	
$GetRecord = $db->singlerec("select * from success_stories where id='$id'");
@extract($GetRecord);
$user_id = $user_id;
$story_name = stripslashes($story_name);
$story_title = stripslashes($story_title);
//$permalink = stripslashes($permalink);
$story_details = stripslashes($story_details);
$story_photo = stripslashes($story_photo);
$user_name = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,CONCAT(fname,' ',lname) from register where active_status='1'";
$user_name .= $drop->get_dropdown($db,$DropDownQry,$user_id);
//code for images 
if(@$image == "noimage.jpg") {
        $ShowOldImg = "";
   $DisplayDeleteImgLink = '';
    }
else if(@$image != "") {
        $ShowOldImg = "";
   $DisplayDeleteImgLink = '<a href="successupd.php?upd=2&act=del&nimg='.$image.'&id='.$id.'">Delete</a>';
    }
	
?>

		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Success Story</h3>
						</div>
						
						<form class="form-horizontal form-bordered form-wizard" id="wizard-validate" method="post" method="post" action="" enctype="multipart/form-data" data-parsley-validate>
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Select a Name <font color="red">*</font></td>
										<td><select class="form-control" name="user_id" id="user_id"  value="<? echo $user_id;?>" data-parsley-required><?php echo $user_name; ?></select>
										</td>
									</tr>
									<tr>
										<td>Name of Story <font color="red">*</font></td>
										<td><input type="text" name="story_name" id="story_name" value="<? echo $story_name; ?>" class="form-control" data-parsley-required>
										</td>
									</tr>
									<!--<tr>
										<td>Permalink <font color="red">*</font></td>
										<td><input type="url" name="permalink" id="permalink" value="<? echo $permalink; ?>" class="form-control" 
										data-parsley-required>
										</td>
									</tr>-->
									<tr>
										<td>Title of the Story <font color="red">*</font></td>
										<td><input type="text" name="story_title" id="story_title" value="<? echo $story_title; ?>" class="form-control" 
										data-parsley-required>
										</td>
									</tr>
									<tr>
										<td>Story Details <font color="red">*</font></td>
										<td><textarea name="story_details" id="story_details" class="form-control" 										data-parsley-required><? echo $story_details; ?></textarea>
										</td>
									</tr>
									<tr>
										<td>Your Photo</td>
										<td>
										 <div class="upload-section">
											<label class="upload-image" for="upload-image-one" style="width:40%">
											<input type="file" id="upload-image-one" name="story_photo" accept="image/*" onchange="img_validate('upload-image-one',300,300,1,1,'img_div')"/>
											</label>
										 </div>
										<img src="../uploads/success/<?echo $story_photo;?>" id="img_div" width="100" height="80" <?if($story_photo==''){?>style='display:none;'<?}?>></td>
									</tr>
								</table>
							</div>
                                                           
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right">
                                                                      <a class="btn btn-info" href="success_story.php">cancel</a>
                                                                      <input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								
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
		
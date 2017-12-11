
<? include "header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>News </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> News </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$Message = isSet($Message) ? $Message : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$category_name = isSet($category_name) ? $category_name : '' ;
$category_title= isset($category_title)?$category_title:'';
$img= isset($img)?$img:'';
$content = isSet($content) ? $content : '' ;
$meta_title= isset($meta_title)?$meta_title:'';
$meta_keywords= isset($meta_keywords)?$meta_keywords:'';
$meta_description= isset($meta_description)?$meta_description:'';
$active_status = isSet($active_status) ? $active_status : '' ;
$TextChange = isSet($TextChange) ? $TextChange : '' ;
$type = isSet($type) ? $type : '' ;
$group_id = isSet($group_id) ? $group_id : '' ;

if($submit) {
    $crcdt = date("Y-m-d H:i:s");
	$category_name = trim(addslashes($category_name));
	$category_title = trim(addslashes($category_title));
	$group_id = trim(addslashes($group_id));
	$img = trim(addslashes($img));
	$content = trim(addslashes($content));
	$meta_title = trim(addslashes($meta_title));
	$meta_keywords = trim(addslashes($meta_keywords));
	$meta_description = trim(addslashes($meta_description));
	$active_status = trim(addslashes($active_status));

		$checkStatus = $db->check2column("allcategory","category_name",$category_name,"type","news");
		
		if($upd == 2)
			$checkStatus = 0;
	
		if($checkStatus == 0){
			$set  = "category_name = '$category_name'";
			$set  .= ",category_title = '$category_title'";
			$set  .= ",group_id = '$group_id'";
			$set  .= ",content = '$content'";
			$set  .= ",meta_title = '$meta_title'";	
			$set  .= ",meta_keywords   = '$meta_keywords'";	
			$set  .= ",meta_description = '$meta_description'";
			$set  .= ",active_status = '$active_status'";
			$set  .= ",type = 'news'";
			$imgg=$_FILES['image']['tmp_name'];
			  if($imgg!=""){
			   $NgImg='image_'.date('Y-m-d-H-i-s').'_'.uniqid();
			   $isUploaded = $com_obj->upload_image('image',$NgImg,354,195,118,65,"../uploads/categoryimages/news/",'new');
			  if($isUploaded){
			   $NgImg = $com_obj->img_Name; 
			   $set.=",img='$NgImg'";
			  }else{
			   echo $com_obj->img_Err; exit; 
			  }
			  }			
			if($upd == 1){
			$idvalue = $db->insertid("insert into allcategory set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update allcategory set $set where id='$id'");
				$act = "upd";
			}
			echo "<script>location.href='manage_newscategory.php?page=$pg&act=$act';</script>";
			header("location:manage_newscategory.php?page=$pg&act=$act");
			exit;
		}	
		else{
			$id = $idvalue;
			$Message=$category_name;
			$Message  .= "<font color='red'>Already Exist</font>";
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
	
$GetRecord = $db->singlerec("select * from allcategory where id='$id'");
@extract($GetRecord);

	$category_name = stripslashes($category_name);
	$category_title = stripslashes($category_title);
	$type = stripslashes($type);
	$group_id = stripslashes($group_id);
	$img = stripslashes($img);
	$content = stripslashes($content);
	$meta_title = stripslashes($meta_title);
	$meta_keywords = stripslashes($meta_keywords);
	$meta_description = stripslashes($meta_description);
	$active_status = stripslashes($active_status);
	
$groupp = "<option value=''>- - Select- -</option>";
$DropDownQry1 = "select * from allgroups where type='news' and status='1'";
$groupp .= $drop->get_dropdown($db,$DropDownQry1,$group_id);
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
                                             <a class= "btn btn-info" onclick="history.go(-1);">Back </a>
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> News Category</h3>
						</div>
						<form class="form-horizontal form-bordered form-wizard" id="wizard-validate" method="post" method="post" action="" enctype="multipart/form-data" data-parsley-validate>
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />
							<div class="panel-body">

								<div class="form-group">
									<strong>General Information</strong> <span><?echo $Message;?></span>
								</div>

									<div class="form-group">
									<label class="col-sm-2 control-label" for="category_name">Category Name <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="category_name" id="category_name" value="<? echo $category_name; ?>" class="form-control" data-parsley-maxlength="200"
										data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="category">Group Name<font color="red">*</font></label>
									<div class="col-sm-3">
										<select name="group_id" id="group_id" class="form-control"     value="<? echo $group_id; ?>" title="select group" data-parsley-required><? echo $groupp; ?></select>
									</div>
								</div>
								

									<div class="form-group">
									<label class="col-sm-2 control-label" for="category_title">Category Title<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="category_title" id="category_title" value="<? echo $category_title; ?>" class="form-control" data-parsley-maxlength="200"
										data-parsley-required >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="hidimg">
									Category Image</label>
									<div class="col-sm-3">
									<div class="upload-section">
									<label class="upload-image" for="upload-image-three" style="width:40%">
									<input type="file" name="image" id="image" accept="image/*" onchange="img_validate('image',354,195,118,65)">
									</label>
									</div>
									
									<img src="../uploads/categoryimages/news/<? echo $img; ?>" id="img_div" width="100" height="80" <?if($img==''){?>style='display:none;'<?}?>>
									</div>
										<input type="hidden" name="hidimg" id="hidimg" value="<? echo $img; ?>">
									</div>
								
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="content">Description<font color="red">*</font></label>
									<div class="col-sm-3">
										<textarea name="content" id="content" class="form-control"data-parsley-words="[10,1500]"
										data-parsley-required ><? echo $content; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<strong>Meta Information</strong>
								</div>


								<div class="form-group">
									<label class="col-sm-2 control-label" for="meta_title">Meta Title <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="meta_title" id="meta_title" value="<? echo $meta_title; ?>" class="form-control" 
										data-parsley-maxlength="200"
										data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="meta_keywords">Meta Keywords <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="meta_keywords" id="meta_keywords" value="<? echo $meta_keywords; ?>" class="form-control" 
										data-parsley-maxlength="200"
										data-parsley-required >
									</div>
								</div>


								<div class="form-group">
									<label class="col-sm-2 control-label" for="meta_description">Meta Description</label>
									<div class="col-sm-3">
										<textarea name="meta_description" id="meta_description" class="form-control"        ><? echo $meta_description; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="active_status">Display Status<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="radio" name="active_status" id="active_status"data-parsley-group="information"     value="1" <? if($active_status=='1')echo "checked"; ?> data-parsley-required>&nbsp;YES
										<input type="radio" name="active_status" id="active_status"data-parsley-group="information"     value="0" <? if($active_status=='0')echo "checked"; ?> data-parsley-required>&nbsp;NO
									</div>
								</div>
		
							<div class="panel-footer text-left">
								<div class="row"><div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div></div>
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
		
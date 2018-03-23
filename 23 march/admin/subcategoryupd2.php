<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Second Level Sub Category </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active">Second Level Sub Category </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$Message = isSet($Message) ? $Message : '' ;
$cat_name = isSet($cat_name) ? $cat_name : '' ;
$cat_img = isSet($cat_img) ? $cat_img : '' ;
$cat=isSet($cat)?$cat:'';
if($submit){
    $crcdt = time();
	$cat_name = trim(addslashes($cat_name));
	$cat_img = trim(addslashes($_FILES['tmp_name']['cat_img']));
		$checkStatus = $db->check2column("sub_category","cat_name",$cat_name,"sub_cat_id",$midval);
		
		if($upd == 2)
			$checkStatus = 0;

		if($checkStatus == 0){
			$set ="cat_name='$cat_name'";
			$set .=",sub_cat_id='$midval'";
			$set .=",cat_id='$cat'";
			$imgg=$_FILES['cat_img']['tmp_name'];
		  if($imgg!=""){
		   $NgImg='image_'.date('Y-m-d-H-i-s').'_'.uniqid();
		   $isUploaded = $com_obj->upload_image('cat_img',$NgImg,120,120,118,65,"uploads/category/",'new');
		  if($isUploaded){
		   $NgImg = $com_obj->img_Name; 
		   $set.=",cat_img='$NgImg'";
		  }else{
		   echo $com_obj->img_Err; exit; 
		  }
		  }	
			if($upd == 1){
				$set .=",active_status='1'";
				$db->insertrec("insert into sub_category set $set");
				$act="add";
			}
			else if($upd == 2){
				if(empty($idvalue))
				{
					$idvalue=$id;
				}
				$db->insertrec("update sub_category set $set where id='$idvalue'");
				$act="upd";
			}
			echo "<script>window.location='subcategory2.php?act=$act&mid=$midval'</script>";
			@header("location:subcategory2.php?act=$act&mid=$midval");
			exit;
		}	
		 else {
			$id = $idvalue;
			$mid = $midval;
			$Message = "<font color='red'>$cat_name Already Exit's</font>";
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

$GetRecord = $db->singlerec("select * from sub_category where id='$id'");
@extract($GetRecord);
$cat_name = stripslashes($cat_name);
$cat_img = stripslashes($cat_img);
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Sub Category</h3>
						</div>
						<form class="form-horizontal" method="post" action="subcategoryupd2.php" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="midval" value="<?echo $mid;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Name <font color="red">*</font></td>
										<td><input type="text" name="cat_name" id="cat_name" value="<? echo $cat_name; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Category Image <font color="red">*</font></td>
										<td><span <? echo $hidimg; ?>><img src="uploads/category/<? echo $cat_img; ?>" width="120px" height="120px"> <br></span>
										<input type="file" name="cat_img">
										<input type="hidden" name="hidimg" id="hidimg" value="<? echo $cat_img; ?>"></td>
									</tr>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="subcategory2.php?mid=<?echo $mid;?>">Cancel</a>
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
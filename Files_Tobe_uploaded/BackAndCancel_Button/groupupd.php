<? include "header.php"; 

$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$groupname = isSet($groupname) ? $groupname : '' ;
$entryby = isSet($entryby) ? $entryby : '' ;
$meta_title = isSet($meta_title) ? $meta_title : '' ;
$meta_keywords = isSet($meta_keywords) ? $meta_keywords : '' ;
$meta_description = isSet($meta_description) ? $meta_description : '' ;
if($submit){
		$crcdt = time();
		$checkStatus = $db->check1column("grouplist","groupname",$groupname);
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			$set  = "groupname = '$groupname'";
			$set  .= ",entryby = '$entryby'";
			$set  .= ",meta_title = '$meta_title'";
			$set  .= ",meta_keywords = '$meta_keywords'";
			$set  .= ",meta_description = '$meta_description'";
			if($upd == 1){				   
				$set  .= ",status = '1'";
				$db->insertrec("insert into grouplist set $set");
				$act = "add";
			}
			else if($upd == 2){				    
				//$set  .= ",userchng = '$usrcre_name'";
				$db->insertrec("update grouplist set $set where id='$id'");
				$act = "upd";
			}
			echo "<script>location.href='group.php?page=$pg&act=$act';</script>";
			header("location:group.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			$Message = "<font color='#000'>$groupname Already Exit's</font>";
		}
	}
if($upd == 1){
	$TextChange = "Add";
}
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from grouplist where id='$id'");
@extract($GetRecord);
$groupname = stripslashes($groupname);
$entryby = stripslashes($entryby);
?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Add Group </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Add Group </li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Group</h3>
						</div>
						<form class="form-horizontal" method="post" action="" >
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Group Name<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="groupname" value="<?echo $groupname;?>" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Entry By<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="entryby" value="<?echo $entryby;?>" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Meta Title<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="meta_title" value="<?echo $meta_title;?>" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Meta Keywords<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="meta_keywords" value="<?echo $meta_keywords;?>" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Meta Description<font color="red">*</font></label>
									<div class="col-sm-3">
										<textarea name="meta_description" id="description"   class="form-control"  class="form-control" required><?echo $meta_description;?></textarea>
									</div>
								</div>
								
							</div>
							<div class="panel-footer text-left">
								<div class="row"><div class="col-md-4  text-right">
                                                                          <a class="btn btn-info" href="group.php">Cancel</a></div>
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
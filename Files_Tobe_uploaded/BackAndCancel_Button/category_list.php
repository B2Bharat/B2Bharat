<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-users"></i> Category </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Category </li>
                            </ol>
                        </div>
                    </div>
<?
$dis_status = isSet($dis_status) ? $dis_status : '' ;
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$Message = isSet($Message) ? $Message : '' ;
$records = $GT_RecPerPage;

if($act == "del") {
	if($profile1 !="noimage.jpg"){
		$RemoveImage = "$siteurl/admin/uploads/category/$cat_img";
		@unlink($RemoveImage);
	}
    $db->insertrec("delete from category where id='$id'");
	echo "<script>location.href='category_list.php?act=del1'</script>";
    @header("location:category_list.php?act=del1");
    exit ;
}

if($dis_status == "1") {
    $db->insertrec("update category set dis_status='0' where id='$id'");
	$dis_status="";
	echo "<script>location.href='category_list.php?act=sts'</script>";
    @header("location:category_list.php?act=sts");
    exit ;
}
else if($dis_status == "0") {
    $db->insertrec("update category set dis_status='1' where id='$id'");
	$dis_status="";
	echo "<script>location.href='category_list.php?act=sts'</script>";
    @header("location:category_list.php?act=sts");
    exit ;
}
$GetRecord=$db->get_all("select * from category where parent_id='0' order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i=0;$i<count($GetRecord);$i++) {
	$slno = $i + 1;
    $idvalue = $GetRecord[$i]['id'];
	$category_name = $GetRecord[$i]['category_name'];
	$category_name = "<a href='subcategory.php?mid=$idvalue'>$GT_RightSign $category_name</a>";
	$group_id =$GetRecord[$i]['group_id'];
	$cat_img =$GetRecord[$i]['cat_img'];	
	$dis_status =$GetRecord[$i]['dis_status'];
	$category_url =$GetRecord[$i]['category_url'];
	$slno = $i + 1 ;
	$namg=$db->Extract_Single("select groupname from grouplist where id='$group_id' and status='0'");
	
    if($dis_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($dis_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Deactive";
		$status_active = "Active";
	}
	$EditLink = "<a href='categoryupd.php?upd=2&id=$idvalue' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
    $disp .="<tr><td width='5%'>$slno</td>
	            <td  align='left' width='10%'>$namg</td>
				<td  align='left' width='10%'><img src='$siteurl/admin/uploads/category/$cat_img' width='60'></td>
				<td  align='left' width='10%'>$category_name</td>
				<!--<td  align='left' width='10%'>$category_url</td>-->
				<td width='20%'>
				<div class='btn-group btn-group-xs'>				
					<a href='category_list.php?id=$idvalue&dis_status=$dis_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='category_list.php?id=$idvalue&act=del' onclick='return confirmmain()' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>
				</div>
				</td>
			</tr>";
}
if($act == "del1")
    $Message = "<font color='green'><b>Deleted Successfully</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Updated Successfully</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Added Successfully</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Status Changed Successfully</b></font>" ;
?>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                                <a class="btn btn-info" href="welcome.php">Back</a>
                            <div class="panel-heading"
                             
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
							<div class="col-sm-12 text-right"><a class="btn btn-info" href="categoryupd.php?upd=1">Add New</a></div>
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sr. No.</th>
											<th>Group</th>
											<th>Thumbnail</th>
											<th>Category Name</th>
											<!--<th>Seo url</th>-->
											<th class='cntrhid'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp; ?></tbody>
                                </table>
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
<?include "footer.php"; ?>
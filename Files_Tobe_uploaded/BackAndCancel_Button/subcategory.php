<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? //include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Sub Category </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Sub Category </li>
                            </ol>
                        </div>
                    </div>
<?
$act=isSet($act)?$act:''; 
$id=isSet($id)?$id:'';
$mid=isSet($mid)?$mid:'';
$status=isSet($status)?$status:'';
$Message=isSet($Message)?$Message:'';

if($act=="del1"){
    $db->insertrec("delete from category where id='$id'");
	echo "<script>location.href='subcategory.php?act=del1&mid=$mid';</script>";
    @header("location:subcategory.php?act=del1&mid=$mid");
    exit ;
}
if($status=="1"){
    $db->insertrec("update category set dis_status='0' where id='$id'");
	echo "<script>location.href='subcategory.php?act=sts&mid=$mid';</script>";
    @header("location:subcategory.php?act=sts&mid=$mid");
    exit ;
}
else if($status=="0"){
    $db->insertrec("update category set dis_status='1' where id='$id'");
	echo "<script>location.href='subcategory.php?act=sts&mid=$mid';</script>";
    @header("location:subcategory.php?act=sts&mid=$mid");
    exit ;
}
$GetRecord=$db->get_all("select * from category where parent_id='$mid' order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i=0; $i<count($GetRecord); $i++) {
	$idvalue = $GetRecord[$i]['id'] ;
	$name=$GetRecord[$i]['category_name'];
	$dis_status = $GetRecord[$i]['dis_status'] ;
	$cat_img =$GetRecord[$i]['cat_img'];
	$slno = $i + 1 ;
	//$name="<a href='childcategory.php?mid=$mid&sid=$idvalue'>$GT_RightSign $name</a>";
	if($dis_status=='0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($dis_status=='1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
	}
	$EditLink = "<a href='subcategoryupd.php?upd=2&id=$idvalue&mid=$mid' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left' width='10%'><img src='$siteurl/admin/uploads/category/$cat_img' width='60'></td>
				<td  align='left'><a href='subcategory2.php?mid=$idvalue&cat=$mid'>$GT_RightSign $name</a></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					<a href='subcategory.php?id=$idvalue&mid=$mid&status=$dis_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='subcategory.php?id=$idvalue&mid=$mid&act=del1' onclick='return confirmmain()' class='btn btn-default' title='Delete'>$GT_Delete</a>
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
                            <div class="panel-heading">
                                  <a class= "btn btn-info" onclick="history.go(-1);">Back </a>
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
								<div class="col-sm-12 text-right">
								<a class="btn btn-info" href="category_list.php">Back</a>
								<a class="btn btn-info" href="subcategoryupd.php?upd=1&mid=<?echo $mid?>">Add New</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
											<th>Thumbnail</th>
											<th>Name</th>
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
<? include "footer.php"; ?>

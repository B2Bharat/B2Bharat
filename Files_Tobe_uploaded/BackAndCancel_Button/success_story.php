<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Success Story </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Success Story </li>
                            </ol>
                        </div>
                    </div>
<?
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;

if($act == "del1") {
    $db->insertrec("delete from success_stories where id='$id'");
	echo "<script>location.href='success_story.php';</script>";
    @header("location:success_story.php");
    exit ;
}
if($status == "1") {
    $db->insertrec("update success_stories set status='0' where id='$id'");
	echo "<script>location.href='success_story.php?act=sts';</script>";
    @header("location:success_story.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update success_stories set status='1' where id='$id'");
	echo "<script>location.href='success_story.php?act=sts';</script>";
    @header("location:success_story.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from success_stories order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'] ;
	$user_id=$GetRecord[$i]['user_id'];
	$story_photo=$GetRecord[$i]['story_photo'];
	$story_name=$GetRecord[$i]['story_name'];
	$status = $GetRecord[$i]['status'];
	$story_title = $GetRecord[$i]['story_title'];
	$crcdt = $GetRecord[$i]['crcdt'];
	//$crcdt=date("d M Y", $crcdt);
	$GetRecordView=$db->singlerec("select fname,lname from register where id='$user_id'"); 
	$slno = $i + 1 ;
	
	if($status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";
		}	
    else if($status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
		$EditLink = "<a href='successupd.php?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$GetRecordView[0] $GetRecordView[1]</td>
				<td  align='left'><img src='../uploads/success/$story_photo' width=60 alt='*'/></td>
				<td  align='left'>$story_title</td>
				<td  align='left'>$story_name</td>
				<td  align='left'>$crcdt</td>
				<td  align='left'><a href='success_story.php?id=$idvalue&status=$status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					
					$EditLink
					<a href='success_story.php?id=$idvalue&act=del1' onclick='return confirmmain()' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>
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
                            <div class="panel-heading">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="successupd.php?upd=1">Add New</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th></th>
											<th>Name</th>
											<th>Thumbnail</th>
											<th>Story Title</th>
											<th>Story Name</th>
											<th>Added On</th>
											<th>Publish</th>
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

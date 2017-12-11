<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Trade Show </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Trade Show </li>
                            </ol>
                        </div>
                    </div>
<?
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$publish = isSet($publish) ? $publish : '' ;
$Message = isSet($Message) ? $Message : '' ;

if($act == "del1") {
    $db->insertrec("delete from trade_shows where id='$id'");
	echo "<script>location.href='tradeshow.php'</script>";
    @header("location:tradeshow.php");
    exit ;
}
if($status == "1") {
    $db->insertrec("update trade_shows set status='0' where id='$id'");
	echo "<script>location.href='tradeshow.php?act=sts'</script>";
    @header("location:tradeshow.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update trade_shows set status='1' where id='$id'");
	echo "<script>location.href='tradeshow.php?act=sts'</script>";
    @header("location:tradeshow.php?act=sts");
    exit ;
}
if($publish == "yes") {
    $db->insertrec("update trade_shows set publish='no' where id='$id'");
	echo "<script>location.href='tradeshow.php?act=sts'</script>";
    @header("location:tradeshow.php?act=sts");
    exit ;
}if($publish == "no") {
    $db->insertrec("update trade_shows set publish='yes' where id='$id'");
	echo "<script>location.href='tradeshow.php?act=sts'</script>";
    @header("location:tradeshow.php?act=sts");
    exit ;
}
$GetRecord=$db->get_all("select * from trade_shows order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'] ;
	$user_id=$GetRecord[$i]['user_id'];
	$photos=$GetRecord[$i]['photos'];
	$show_name=substr($GetRecord[$i]['show_name'],0,50);
	$status = $GetRecord[$i]['status'];
	$publish = $GetRecord[$i]['publish'];
	$venue = substr($GetRecord[$i]['venue'],0,20);
	$crcdt = $GetRecord[$i]['crcdt'];
	$crcdt=date("d M Y", strtotime($crcdt));
	$GetRecordView=$db->singlerec("select fname,lname from register where id='$user_id'"); 
	$slno = $i + 1 ;
	
	if($publish == 'yes'){
        $DisplayStatus1 = $GT_InActive;
		$Title1 = "publish";
		$status_active1 = "UnPublish";
		}	
    else if($publish == 'no'){
        $DisplayStatus1 = $GT_Active;
		$Title1 = "UnPublish";
		$status_active1 = "publish";
	}
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
		$EditLink = "<a href='tradeshowupd.php?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$GetRecordView[0] $GetRecordView[1]</td>
				<td  align='left'><img src='../uploads/trade_show/$photos' width=60 alt='*'/></td>
				<td  align='left'>$show_name</td>
				<td  align='left'>$venue</td>
				<td  align='left'>$crcdt</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					<a href='tradeshow.php?id=$idvalue&status=$status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>				
					$EditLink
					<a href='tradeshow.php?id=$idvalue&act=del1' onclick='return confirmmain()' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>
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
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="tradeshowupd.php?upd=1">Add New</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sr. No.</th>
											<th>Name</th>
											<th>Thumbnail</th>
											<th>Title of Show</th>
											<th>Venue</th>
											<th>Added On</th>
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
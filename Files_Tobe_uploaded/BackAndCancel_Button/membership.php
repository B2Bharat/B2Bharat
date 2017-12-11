<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Membership </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Membership </li>
                            </ol>
                        </div>
                    </div>
<?
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$action = isSet($action) ? $action : '' ;
$Message = isSet($Message) ? $Message : '' ;

if($act == "del") {
    $db->insertrec("delete from membership where id='$id'");
	echo "<script>location.href='membership.php?act=del1'</script>";
    @header("location:membership.php?act=del1");
    exit ;
}
if($status == "1") {
    $db->insertrec("update membership set active_status='0' where id='$id'");
	echo "<script>location.href='membership.php?act=sts'</script>";
    @header("location:membership.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update membership set active_status='1' where id='$id'");
	echo "<script>location.href='membership.php?act=sts'</script>";
    @header("location:membership.php?act=sts");
    exit ;
}

if($action == "1") {
   // $db->insertrec("update membership set action='0' where id='$id'");
    $db->insertrec("update membership set active_status='0' where id='$id'");
	echo "<script>location.href='membership.php?act=sts'</script>";
    @header("location:membership.php?act=sts");
    exit ;
}
else if($action == "0") {
    // $db->insertrec("update membership set action='1' where id='$id'");
    $db->insertrec("update membership set active_status='1' where id='$id'");
	echo "<script>location.href='membership.php?act=sts'</script>";
    @header("location:membership.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from membership order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	@extract($GetRecord[$i]);
	$idvalue = $GetRecord[$i]['id'] ;
	$name=$GetRecord[$i]['name'];
	$group_id=$GetRecord[$i]['group_id'];
	$max_no_products=$GetRecord[$i]['max_no_products'];
	$max_no_buying=$GetRecord[$i]['max_no_buying'];
	$max_no_selling=$GetRecord[$i]['max_no_selling'];
	$logo_package=$GetRecord[$i]['logo_package'];
	$base_price_afdis=$GetRecord[$i]['base_price_afdis'];
	$package_renewal=$GetRecord[$i]['package_renewal'];
//	$action=$GetRecord[$i]['action'];
	$active_status=$GetRecord[$i]['active_status'];
	$action=$active_status;

	$slno = $i + 1 ;
	if($active_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
	}
	if($active_status == '0'){
        $DisplayStatus1 = $GT_InActive;
		$Title1 = "Active";
		$status_active1 = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus1 = $GT_Active;
		$Title1 = "Deactive";
		$status_active1 = "Active";
	}
	
	$EditLink = "<a href='membershipupd.php?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
  
						$filepaths3=dirname(getcwd())."/uploads/membership/".$logo_package;
						
						if(file_exists($filepaths3))
						{
							$yeslogo="<img src='../uploads/membership/$logo_package' width='60'>";
						    }
							 else
							 {
							$yeslogo="";		
							 }  
									

  $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$name</td>
				<td  align='left' width='10%'>$yeslogo</td>
				<td  align='left'>$max_no_products</td>
				<td  align='left'>$max_no_selling</td>
				<td  align='left'>$max_no_buying</td>
				<td  align='left'>$base_price_afdis</td>
				<td  align='left'>$package_renewal (days)</td>
				<td  align='left'><a href='membership.php?id=$idvalue&action=$action' title='$Title1' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus1</a></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
<!--					<a href='membership.php?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>-->
					$EditLink
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
                                <a class="btn btn-info" href="welcome.php">Back</a>
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="membershipupd.php?upd=1">Add New</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sr. No.</th>
											<th>Package Name</th>
											<th>Logo</th>
											<th>Product</th>
											<th>Selling</th>
											<th>Buying</th>
											<th>Cost Price</th>
											<th>Validity</th>
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

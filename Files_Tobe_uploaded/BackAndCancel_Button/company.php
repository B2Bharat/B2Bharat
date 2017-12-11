<? include "header.php"; ?>

            <!--===================================================-->

            <!--END NAVBAR-->

            <div class="boxed">

                <!--CONTENT CONTAINER-->

                <!--===================================================-->

                <div id="content-container">

                    <? include "header_nav.php"; ?>

                    <div class="pageheader">

                        <h3><i class="fa fa-home"></i> Company List </h3>

                        <div class="breadcrumb-wrapper">

                            <span class="label">You are here:</span>

                            <ol class="breadcrumb">

                                <li> <a href="welcome.php"> Home </a> </li>

                                <li class="active">Company List </li>

                            </ol>

                        </div>

                    </div>

<?

$act = isSet($act) ? $act : '' ; 

$id = isSet($id) ? $id : '' ;

$upd = isSet($upd) ? $upd : '' ;

$active_status = isSet($active_status) ? $active_status : '' ;

$Message = isSet($Message) ? $Message : '' ;



if($act == "del") {

    $db->insertrec("delete from company where id='$id'");

	echo "<script>location.href='company.php?act=del1'</script>";

    @header("location:company.php?act=del1");

    exit ;

}

if($active_status == "1") {

    $db->insertrec("update company set active_status='0' where id='$id'");

	echo "<script>location.href='company.php?act=sts'</script>";

    @header("location:company.php?act=sts");

    exit ;

}

else if($active_status == "0") {

    $db->insertrec("update company set active_status='1' where id='$id'");

	echo "<script>location.href='company.php?act=sts'</script>";

    @header("location:company.php?act=sts");

    exit ;

}



$GetRecord=$db->get_all("select * from company order by id desc");

if(count($GetRecord)==0)

    $Message="No Record found";

$disp = "";

for($i = 0 ; $i < count($GetRecord) ; $i++) {

	$idvalue = $GetRecord[$i]['id'] ;

	$user_id=$GetRecord[$i]['user_id'];

	$legal_owner_name=$GetRecord[$i]['legal_owner_name'];

	$company_name =$GetRecord[$i]['name'];

	$active_status = $GetRecord[$i]['active_status'];

	$country = $GetRecord[$i]['country'];

	$type = $GetRecord[$i]['type']; 

	if($type=="both"){

		$type="Buyer&Seller";

	}

	$create_date = $GetRecord[$i]['create_date'];

	//$crcdt=date("d M Y", $crcdt);

	$GetRecordUser=$db->singlerec("select mem_pack from register where id='$user_id'");

	@extract($GetRecordUser);	

	$GetRecordView=$db->singlerec("select nicename from countries where id='$country'");

	@extract($GetRecordView);

	$GetRecordmem=$db->singlerec("select name from membership where id='$GetRecordUser[0]'");

	@extract($GetRecordmem);

	$slno = $i + 1 ;

	

	if($active_status == '0'){

        $DisplayStatus = $GT_InActive;

		$Title = "Active";

		$status_active = "Deactive";

		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";

		}	

    else if($active_status == '1'){

        $DisplayStatus = $GT_Active;

		$Title = "Deactive";

		$status_active = "Active";

		$EditLink = "<a href='companyupd.php?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";

	}

    $disp .="<tr>

				<td>$slno</td>

				<td  align='left'>$legal_owner_name</td>

				<td  align='left'>$company_name</td>

				<td  align='left'>$GetRecordView[0]</td>

				<td  align='left'>$GetRecordmem[0]</td>

				<td  align='left'>$type</td>

				<td  align='left'>$create_date</td>

				<td width='20%'>

				<div class='btn-group btn-group-xs'>

					<a href='company.php?id=$idvalue&active_status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>

					$EditLink

					<a href='company.php?id=$idvalue&act=del' onclick='return confirmmain()' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>

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

								<div class="col-sm-12 text-right"><a class="btn btn-info" href="companyupd.php?upd=1">Add New</a></div>

							    <table id="demo-dt-basic" class="table table-striped table-bordered">

                                    <thead>

                                        <tr>

											<th>Sr. No.</th>

											<th>Client Name</th>

											<th>Name of Company</th>

											<th>Origin</th>

											<th>Subscribed Package</th>

											<th>Business type</th>

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


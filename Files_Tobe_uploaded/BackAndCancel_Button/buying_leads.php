<? include "header.php"; ?>

            <!--===================================================-->

            <!--END NAVBAR-->

            <div class="boxed">

                <!--CONTENT CONTAINER-->

                <!--===================================================-->

                <div id="content-container">

                    <? include "header_nav.php"; ?>

                    <div class="pageheader">

                        <h3><i class="fa fa-users"></i> Buying Leads </h3>

                        <div class="breadcrumb-wrapper">

                            <span class="label">You are here:</span>

                            <ol class="breadcrumb">

                                <li> <a href="welcome.php"> Home </a> </li>

                                <li class="active">Buying Leads </li>

                            </ol>

                        </div>

                    </div>

<?

$status = isSet($status) ? $status : '' ;

$id = isSet($id) ? $id : '' ;

$act = isSet($act) ? $act : '' ;

$Message = isSet($Message) ? $Message : '' ;

$records = $GT_RecPerPage;



if($act == "del") {

	if($profile1 !="noimage.jpg"){

		$RemoveImage = "../images/profile1/$img";

		@unlink($RemoveImage);

	}

    $db->insertrec("delete from buying_leads where id='$id'");

	echo "<script>location.href='buying_leads.php?act=del1'</script>";

    @header("location:buying_leads.php?act=del1");

    exit ;

}



if($status == "1") {

    $db->insertrec("update buying_leads set  active_status='0' where id='$id'");

	echo "<script>location.href='buying_leads.php?act=sts'</script>";

    @header("location:buying_leads.php?act=sts");

    exit ;

}

else if($status == "0") {

    $db->insertrec("update buying_leads set active_status='1' where id='$id'");

	echo "<script>location.href='buying_leads.php?act=sts'</script>";

    @header("location:buying_leads.php?act=sts");

    exit ;

}

$GetRecord=$db->get_all("select * from buying_leads order by id desc");

if(count($GetRecord)==0)

    $Message="No Record found";

$disp = "";

for($i = 0 ; $i < count($GetRecord) ; $i++) {

   @extract($GetRecord[$i]);   

	$slno = $i + 1 ;

    $idvalue = $GetRecord[$i]['id'];

	$user_id = $GetRecord[$i]['user_id'];

	$offer_name=$GetRecord[$i]['offer_name'];

	$cat_id=$GetRecord[$i]['cat_id'];		

	$currency=$GetRecord[$i]['currency'];		

	$post_date=$GetRecord[$i]['post_date'];

	$active_status=$GetRecord[$i]['active_status'];

	$price=$GetRecord[$i]['price'];

	$photo1=$GetRecord[$i]['photo1'];

	//$price=$com_obj->get_price($price1);

	$des_quan_type=$GetRecord[$i]['price_unit'];

	$slno = $i + 1 ;

	$categoryname=$db->Extract_Single("select category_name from category where parent_id='0' and id='$cat_id'");

	//$GetImage=$db->get_all("select * from prod_images order by id desc limit 1");

	//@extract($GetImage);

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

		$EditLink = "<a href='buyingleadsupd.php?upd=2&id=$idvalue' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";

	}

    $disp .="<tr><td width='5%'>$slno</td>

				<td  align='left'  width='10%'><img src='../uploads/BL_images/banner1/$photo1'      width='60'></td>

				<td  align='left'  width='20%'>$offer_name</td>

				<td  align='left'  width='10%'>$price</td>

				<td  align='left'  width='10%'>$des_quan_type</td>

				<td width='20%'>

				<div class='btn-group btn-group-xs'>

					<a href='buying_leads.php?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>

					$EditLink

					<a href='buying_leads.php?id=$idvalue&act=del' onclick='return confirmmain()' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>

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

							<div class="col-sm-12 text-right"><a class="btn btn-info" href="buyingleadsupd.php?upd=1">Add New</a></div>

                                <table id="demo-dt-basic" class="table table-striped table-bordered">

                                    <thead>

                                        <tr>

											<th>Sr. No.</th>

											<th>Image</th>

											<th>Buying Leads Name</th>

											<th>Price</th>

											<th>Per Unit</th>

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
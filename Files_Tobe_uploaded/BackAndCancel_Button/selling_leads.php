<? include "header.php"; ?>

            <!--===================================================-->

            <!--END NAVBAR-->

            <div class="boxed">

                <!--CONTENT CONTAINER-->

                <!--===================================================-->

                <div id="content-container">

                    <? include "header_nav.php"; ?>

                    <div class="pageheader">

                        <h3><i class="fa fa-users"></i> Selling Leads </h3>

                        <div class="breadcrumb-wrapper">

                            <span class="label">You are here:</span>

                            <ol class="breadcrumb">

                                <li> <a href="welcome.php"> Home </a> </li>

                                <li class="active">Selling Leads </li>

                            </ol>

                        </div>

                    </div>

<?

$status = isSet($status) ? $status : '' ;

$id = isSet($id) ? $id : '' ;

//$act = isSet($act) ? $act : '' ;

//$action = isSet($action) ? $action : '' ;

$Message = isSet($Message) ? $Message : '' ;

$records = $GT_RecPerPage;





if(isset($id) && isset($act)){

	if($act=='publish'){

	$db->insertrec("update selling_leads set action='1' where id = '$id'");	

	}else if($act=='draft'){

	$db->insertrec("update selling_leads set action='0' where id = '$id'");	

	}else if($act=='del'){

	$imgd=$db->singlerec("select * from selling_leads where id = '$id'");	

	@extract($imgd);

		if($photo1 !="noimage.jpg"){

		$RemoveImage = "../uploads/SL_images/banner1/$photo1";

		@unlink($RemoveImage);

		}

		if($photo2 !="noimage.jpg"){

		$RemoveImage = "../uploads/SL_images/banner2/$photo2";

		@unlink($RemoveImage);

		}

		if($photo3 !="noimage.jpg"){

		$RemoveImage = "../uploads/SL_images/banner3/$photo3";

		@unlink($RemoveImage);

		}

		if($photo4 !="noimage.jpg"){

		$RemoveImage = "../uploads/SL_images/banner4/$photo4";

		@unlink($RemoveImage);

		}

		if($photo5 !="noimage.jpg"){

		$RemoveImage = "../uploads/SL_images/banner5/$photo5";

		@unlink($RemoveImage);

		}

	$db->insertrec("delete from selling_leads where id = '$id'");

    echo "<script>window.location='selling_leads.php?act=del1'</script>";

    @header("location:selling_leads.php?act=del1");	

	exit ;

	}

echo "<script>location.href='$siteurl/admin/selling_leads.php?succ';</script>";	

header("location:$siteurl/admin/selling_leads.php?succ");

}



if($status == "1") {

    $db->insertrec("update selling_leads set  active_status='0' where id='$id'");

	echo "<script>location.href='selling_leads.php?act=sts'</script>";

    @header("location:selling_leads.php?act=sts");

    exit ;

}

else if($status == "0") {

    $db->insertrec("update selling_leads set active_status='1' where id='$id'");

	echo "<script>location.href='selling_leads.php?act=sts'</script>";

    @header("location:selling_leads.php?act=sts");

    exit ;

}



$GetRecord=$db->get_all("select * from selling_leads order by id desc");

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

	$act=$GetRecord[$i]['action'];

	$base_price=$GetRecord[$i]['base_price'];

	$photo1=$GetRecord[$i]['photo1'];

	//$base_price=$com_obj->get_price($base_price1);

	$base_quan_type=$GetRecord[$i]['price_unit'];

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

		$EditLink = "<a href='sellingleadsupd.php?upd=2&id=$idvalue' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";

	}

	 if($act == '0'){

        $DisplayStatus1 = $GT_InActive;

		$Title1 = "Publish";

		$status_publish = "publish";

		$link = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";

	}	

    else if($act == '1'){

        $DisplayStatus1 = $GT_Active;

		$Title1 = "Draft";

		$status_publish = "draft";

		$link = "";

	}

    $disp .="<tr><td width='5%'>$slno</td>

				<td  align='left'  width='10%'><img src='../uploads/SL_images/banner1/$photo1' width='60'></td>

				<td  align='left'  width='20%'>$offer_name</td>

				<td  align='left'  width='10%'>$base_price</td>

				<td  align='left'  width='10%'>$base_quan_type</td>

				<td width='20%'>

				<div class='btn-group btn-group-xs'>

					<a href='selling_leads.php?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>

					$EditLink

					<a href='selling_leads.php?id=$idvalue&act=del' onclick='return confirmmain()' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>

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

							<div class="col-sm-12 text-right"><a class="btn btn-info" href="sellingleadsupd.php?upd=1">Add New</a></div>

                                <table id="demo-dt-basic" class="table table-striped table-bordered">

                                    <thead>

                                        <tr>

											<th>Sr. No.</th>

											<th>Image</th>

											<th>Selling Leads Name</th>

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
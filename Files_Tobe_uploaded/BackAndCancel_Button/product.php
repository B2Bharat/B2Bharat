<? include "header.php"; ?>

            <!--===================================================-->

            <!--END NAVBAR-->

            <div class="boxed">

                <!--CONTENT CONTAINER-->

                <!--===================================================-->

                <div id="content-container">

                    <? include "header_nav.php"; ?>

                    <div class="pageheader">

                        <h3><i class="fa fa-users"></i> Product </h3>

                        <div class="breadcrumb-wrapper">

                            <span class="label">You are here:</span>

                            <ol class="breadcrumb">

                                <li> <a href="welcome.php"> Home </a> </li>

                                <li class="active">Product </li>

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

    $db->insertrec("delete from product where id='$id'");

	echo "<script>location.href='product.php?act=del1'</script>";

    @header("location:product.php?act=del1");

    exit ;

}



if($status == "1") {

    $db->insertrec("update product set prod_status='0' where id='$id'");

	echo "<script>location.href='product.php?act=sts'</script>";

    @header("location:product.php?act=sts");

    exit ;

}

else if($status == "0") {

    $db->insertrec("update product set prod_status='1' where id='$id'");

	echo "<script>location.href='product.php?act=sts'</script>";

    @header("location:product.php?act=sts");

    exit ;

}

$GetRecord=$db->get_all("select * from product order by id desc");

if(count($GetRecord)==0)

    $Message="No Record found";

$disp = "";

for($i = 0 ; $i < count($GetRecord) ; $i++) {

   @extract($GetRecord[$i]);   

	$slno = $i + 1 ;

    $idvalue = $GetRecord[$i]['id'];

	$reg_id = $GetRecord[$i]['userid'];

	$prod_name=$GetRecord[$i]['prod_name'];

	$prod_category=$GetRecord[$i]['prod_category'];		

	$prod_currency_loc=$GetRecord[$i]['prod_currency_loc'];		

	$prod_crtdate=$GetRecord[$i]['prod_crtdate'];

	$prod_status=$GetRecord[$i]['prod_status'];

	$unit_price=$GetRecord[$i]['unit_price'];

	//$unit_price=$com_obj->get_price($unit_price1);

	$unit_quan_type=$GetRecord[$i]['unit_price_unit'];

	//$unit_quan_type=$com_obj->get_per($unit_price1);

	$photo1=$GetRecord[$i]['photo1'];

	$slno = $i + 1 ;

	$categoryname=$db->Extract_Single("select category_name from category where id='$prod_category'");

	//$GetImage=$db->get_all("select * from prod_images order by id desc limit 1");

	//@extract($GetImage);

    if($prod_status == '0'){

        $DisplayStatus = $GT_InActive;

		$Title = "Active";

		$status_active = "Deactive";

		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";

	}	

    else if($prod_status == '1'){

        $DisplayStatus = $GT_Active;

		$Title = "Deactive";

		$status_active = "Active";

		$EditLink = "<a href='productupd.php?upd=2&id=$idvalue' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";

	}

$filesspath=dirname(getcwd())."/uploads/product/1000x600/".$photo1;

if(file_exists($filesspath))
										{
										
										$imgsrrcc="<img src='../uploads/product/1000x600/$photo1' width='60'>";
												
										
										}
										 else
										 {
												
											$imgsrrcc='';
												
										
										 }
										   


   $disp .="<tr><td width='5%'>$slno</td>

				<td  align='left'  width='10%'>$imgsrrcc</td>

				<td  align='left' width='10%'>$categoryname</td>

				<td  align='left'  width='10%'>$prod_name</td>

				<td  align='left'  width='10%'>$unit_price</td>

				<td  align='left'  width='10%'>$unit_quan_type</td>

				<td width='20%'>

				<div class='btn-group btn-group-xs'>

					<a href='product.php?id=$idvalue&status=$prod_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>

					$EditLink

					<a href='product.php?id=$idvalue&act=del' class='btn btn-default' onclick='return confirmmain()' title='Delete' data-toggle='tooltip'>$GT_Delete</a>

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

							<div class="col-sm-12 text-right"><a class="btn btn-info" href="productupd.php?upd=1">Add New</a></div>

                                <table id="demo-dt-basic" class="table table-striped table-bordered">

                                    <thead>

                                        <tr>

											<th>Sr. No.</th>

											<th>Image</th>

											<th>Category</th>

											<th>Product Name</th>

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
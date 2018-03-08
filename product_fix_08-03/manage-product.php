<?

include "header.php";

include "include/searchDiv.php";

include "include/useronly.php";

$uinfo = $db->singlerec("select * from register where id='$user_id'");

$acn = isset($acn)?$acn:'';

if(isset($prid) && isset($acn)) {

	$prid=trim(addslashes($prid));

	$org_prid=$com_obj->decid($prid);

	if($acn=='delete') {

		@$db->singlerec("delete from product where id='$org_prid' and userid='$user_id' limit 1");

	}

	else {

		if($acn=='publish') $st="publish='1'";

		else if($acn=='unpublish') $st="publish='0'";

		else if($acn=='feature') $st="featured='1'";

		else if($acn=='unfeature') $st="featured='0'";

		@$db->singlerec("update product set $st where id='$org_prid'  and userid='$user_id'");

	}

	echo "<script>location.href='$siteurl/manage-product'</script>";

	header("Location: $siteurl/manage-product"); exit;

}



include "pagination.php";

$rowsPerPage=$Prod_RecPerPage;

$limit=limitation($Prod_RecPerPage);

?>

			

			<div class="container-fulid pdt25" style="background-color:#f5f5f5;">

			<div class="container continr-bg">

			<? include "include/profile-left.php"; ?>

        

		<div class="col-sm-9 col-md-9">

		<div class="adpost-details">

            <div class="well">

                <h3>Manage Product</h3>

                <div id="adpost-details">

				<div class="row">	

					

					<div class="col-md-12">



							<fieldset>

								<div class="">

								

									<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">

									 <i class="fa fa-search" aria-hidden="true"></i> Search Now

									</a>

									<div class="collapse" id="collapseExample">

									  <div class="well">

										<div class="row">

										   <form>

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Name of Product</label>

												<input type="text" class="form-control" id="" placeholder="Type Product Name">

											  </div>

											  

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Refine by Member Names</label>

												<input type="text" class="form-control" id="" placeholder="">

											  </div>

											  

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Refine by Keywords</label>

												<input type="text" class="form-control" id="" placeholder="">

											  </div>

											  

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Refine by Description</label>

												<input type="text" class="form-control" id="" placeholder="">

											  </div>

											  

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Refine by Listings Status</label>

												<select class="form-control">

												   <option>Select Status</option>

												   <option>Active Only</option>

												   <option>InActive Only</option>

												   <option>Both</option>

												</select>

											  </div>

											  

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Hidden or Lives listings</label>

												<select class="form-control">

												   <option>Select Status</option>

												   <option>Lives listings Only</option>

												   <option>Hidden listings Only</option>

												   <option>Both</option>

												</select>

											  </div>

											  

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Featured and Unfeatured</label>

												<select class="form-control">

												   <option>Select Status</option>

												   <option>Featured listings Only</option>

												   <option>Unfeatured listings Only</option>

												   <option>Both</option>

												</select>

											  </div>

											  

											  <div class="form-group col-md-4">

												<label class="col-md-12 row" for="exampleInputEmail1">Price</label>

												<div class="col-md-6 row">

												<select class="form-control">

												   <option>Equal</option>

												   <option>Maximum</option>

												   <option>Minimum</option>												   

												</select>

												</div>

												<div class="col-md-6">

												  <input type="text" class="form-control" id="" placeholder="">

												</div>

											  </div>

											  

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Select Category</label>

												<select class="form-control">

												   <option>Select Category</option>

												   <option>Electrical</option>

												   <option>Fashion</option>

												   <option>Sports</option>

												</select>

											  </div>

											  

											  

											  <div class="form-group col-md-4">

												<label for="exampleInputEmail1">Refine by Country</label>

												<select class="form-control">

												   <option>Select Country</option>

												   <option>India</option>

												   <option>China</option>

												   <option>Canada</option>

												</select>

											  </div>

											  

											  <div class="col-md-12 text-center">

											      <a href="#" class="btn view-more-btn-3">  &nbsp; Search Now</a>

											  </div>

											 

											  

											</form>

										</div>

									  </div>

									</div>



									

									

									<div class="mail-box">

                  

                  <aside class="lg-side">

                     

					 <div class="col-md-12 text-right">

					    <a href="<? echo $siteurl; ?>/add-product" class="btn btn-blue"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Add New</a>

						<button class="btn btn-green" id="m_publish" onclick="M_Proc('publish');"><i class="fa fa-check" aria-hidden="true"></i>  Publish </button>

						<button class="btn btn-yellow" id="m_unpublish" onclick="M_Proc('unpublish');"><i class="fa fa-times" aria-hidden="true"></i>  Un-Publish </button>

						<button class="btn btn-red" id="m_delete" onclick="M_Proc('delete');"><i class="fa fa-trash-o" aria-hidden="true"></i>  Delete </button>

					 </div>

					 

                      <div class="inbox-body">

                        

						 

						 

                          <table class="table table-inbox table-striped table-hover">

                            <tbody>

                              <tr class=" text-center">

                                  <td class="inbox-small-cells">

                                      <input type="checkbox" class="mail-checkbox allcheck">

                                  </td>

                                  <!--<td class="inbox-small-cells">ID</td>-->

								  <td class="inbox-small-cells">Image</td>  

								  <td class="inbox-small-cells">Group name</td>                                 

                                  <td class="view-message ">product Name</td>

								  <td class="inbox-small-cells">Category</td>

<!--                                                   <td class="view-message  inbox-small-cells">Max Price</td>-->

								  <td class="inbox-small-cells">Unit Price</td>

								  <td class="inbox-small-cells">Order</td>

								  <td class="inbox-small-cells">Publish</td>

								  <td class="inbox-small-cells">Action</td>

                              </tr>

							  

							  <?

							  $sql="select * from product where userid='$user_id'";

							  $prod=$db->get_all($sql . $limit);

							  if(!empty($prod)) {

								  foreach($prod as $pr) {

								    $enc=$com_obj->encid($pr['id']);

									$dec=$com_obj->decid($enc);

							  ?>

							  <tr class=" text-center">

                                  <td class="inbox-small-cells">

                                      <input type="checkbox" name="m_proc[]" value="<? echo $enc; ?>" class="mail-checkbox">

                                  </td>

                                  <!--<td class="inbox-small-cells"><? echo $enc; ?></td>-->

								  <td class="inbox-small-cells"><img src="<?echo $siteurl;?>/uploads/product/1000x600/<? echo $pr['photo1']; ?>" width="50" class="img-responsive"></td>

                                  <td class="view-message "><? echo $pr['prod_group_name']; ?></td>

                                  <td class="view-message "><? echo $pr['prod_name']; ?></td>
                                   

								  <?php $pro_cat=$db->singlerec("select * from category where id='$pr[prod_category]'"); ?>

								  <td class="inbox-small-cells"><? echo ucwords($pro_cat['category_name']); ?></td>

<!--                                                                <td class="view-message  inbox-small-cells">$<? echo $pr['prod_maxprice']; ?></td>-->

								  <td class="inbox-small-cells"><? echo $pr['unit_price']; ?></td>

								  <td class="inbox-small-cells"><? echo $pr['max_supply_quantity']; ?></td>

								  <td class="inbox-small-cells" style="padding-top:5px !important;">

								    <div class="btn-group">

										 <a data-toggle="dropdown" href="#" class="btn mini blue">

											 <i class="fa <? if($pr['publish']=='1') { ?>manage-publish fa-check <? } else { ?>manage-pending  fa-exclamation-circle<? } ?>" aria-hidden="true"></i>

										 </a>

										 <ul class="dropdown-menu">

											 <li><a href="<? echo $siteurl; ?>/manage-product/<? echo $enc; ?>/publish"><i class="fa manage-publish fa-check" aria-hidden="true"></i> Publish</a></li>

											 <li><a href="<? echo $siteurl; ?>/manage-product/<? echo $enc; ?>/unpublish"><i class="fa manage-pending  fa-exclamation-circle" aria-hidden="true"></i> Un-Publish</a></li>

										 </ul>

									 </div>

							      </td>

								  <td class="inbox-small-cells" style="padding-top:5px !important;">

								    <div class="btn-group">

										 <a data-toggle="dropdown" href="#" class="btn mini blue">

											 Action

											 <i class="fa fa-angle-down "></i>

										 </a>

										 <ul class="dropdown-menu">

											 <li><a href="<? echo $siteurl; ?>/edit-product/<? echo $enc; ?>/<? echo $pr['permalink']; ?>"><i class="fa green fa-pencil"></i> Edit </a></li>

											 <li><a href="<? echo $siteurl; ?>/manage-product/<? echo $enc; ?>/delete"><i class="fa red fa-trash-o"></i> Delete</a></li>

											 <!--<li class="divider"></li>

											 <?

											 if($pr['featured']=='1') {

												echo "<li><a href='$siteurl/manage-product/$enc/unfeature'><i style='color:orange' class='fa fa-star' aria-hidden='true'></i> Click To Un-feature</a></li>";

											 } else {

												echo "<li><a href='$siteurl/manage-product/$enc/feature'><i class='fa fa-star' aria-hidden='true'></i> Click To feature</a></li>";

											 }

											 ?>-->

										 </ul>

									 </div>

							 </td>

                              </tr>

							  <?

							  } echo "</tbody></table>";

							  } else {

							  ?>

							   

                          </tbody>

                          </table>

						  <hr><center><h3>No records found!</h3></center><hr>

						  <? } ?>

						 <!--pagenagition start-->     

						<div class="row">

							<div class="col-md-12 ">

								<? $db->insertrec(getPagingQuery1($sql, $rowsPerPage, "")); ?>

								<nav class="pagination-wrapper">

								   <? echo $pagingLink = getPagingLink1($sql,$rowsPerPage,"",$db); ?>

								</nav>

							</div>

						</div>

						<!--pagenagition end-->     

                      </div>

                  </aside>

              </div>

									

									

								</div><!-- section -->

								

								

							</fieldset>

					</div>

					



				</div>

				<!--<div class="row">

					<div class="col-sm-12 text-center">

						<div class="ad-section">

							<a href="#"><img src="images/ad-729x90.jpg" alt="Image" class="img-responsive"></a>

						</div>

					</div>

				</div>-->

			</div>

            </div>

			</div>

        </div>



				

			<!-- include/buissList.php -->

			

		</div><!-- container -->

		</div>



<?

include "footer.php";

if(isset($_REQUEST['add_prd'])) {

	echo "<script>swal('Great!', 'Your product has been successfully added!', 'success');</script>";

}

?>

<script>
	$('.allcheck').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    }
	else
	{
		$(':checkbox').each(function() {
            this.checked = false;                        
        });
	}
});
function M_Proc(action){

	

	var checked = "";

	$("input[name='m_proc[]']:checked").each(function (){checked += $(this).val()+',';});

	$.ajax({

		type:"POST",

		url:"<? echo $siteurl; ?>/Prod_MProc.php",

		dataType:'json',

		data:{"acn":action,"datas":checked},

		success:function(data){

			

			if(data.result=='ok'){

				window.location.href = "<? echo $siteurl; ?>/manage-product";

			}

		}

	});

}

</script>
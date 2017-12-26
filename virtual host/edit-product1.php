<?php 

include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
$uinfo = $db->singlerec("select * from register where id='$user_id'");
 $prid = isset($prid)?$prid:'';
$dec=$com_obj->decid($prid);
$prod=$db->singlerec("select * from product where id='$dec'");
echo "select * from product where id='$dec'";
print_r($prod);
if($prod['prod_name']=="") {
	echo "<script>location.href='$siteurl/manage-product';</script>";
	header("Location: $siteurl/manage-product"); exit;
}
if(!isset($cat))
{
$cat = $prod['prod_category'];
}
if(!isset($cat))
{
	$cat = $prod['prod_category'];
}
if(!isset($sub_cat))
{
	$sub_cat = $prod['prod_subcategory'];
}
if(!isset($sub_cat2))
{
	$sub_cat2= $prod['subcategory2'];
}
if(!isset($prc_unit)){
	$prc_unit = $prod['unit_price_unit'];
}
if(!isset($size_tp)){
	$size_tp= $prod['prod_size_unit'];
}
if(!isset($ord_qunit))
{
	$ord_qunit= $prod['prod_quantitytype'];
}
if(!isset($max_unit))
{
	$max_unit= $prod['max_sup_unit'];
}

//echo '<pre>';print_R($prod);exit;
?>
<style>
.error {
	color: #d61c23;
	float: left;
}
</style>
<div class="container-fulid pdt25" style="background-color:#f5f5f5;">
	<div class="container continr-bg">
	<?php include "include/profile-left.php"; ?>
		<div class="col-sm-9 col-md-9">
		<div class="adpost-details">
            <div class="well">
                <h3>Edit Product</h3>
                <div id="adpost-details">
				<div class="row">	
					
					<div class="col-md-12">
						<form action="<? echo $siteurl; ?>/edit-product/<? echo $prid; ?>/<? echo $prod['permalink']; ?>" method="post" enctype="multipart/form-data">
							<fieldset>
								<div class="section postdetails">
									<h4> <span class="pull-right">* Mandatory Fields</span></h4>
									
									<h4>General Information</h4>
									<div class="row form-group add-title">
										<label class="col-sm-3 label-title">Product Title<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="prod_name" id="text" value="<? echo $prod['prod_name']; ?>" required>
										</div>
									</div>
									
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Select a Category <span class="required">*</span></label>
										<div class="col-sm-9">
											<select class="form-control" name="cat" id="maincat" onchange="setSubcat(this.value);">
											    <?
												$cat=isset($cat)?$cat:'';
												echo $drop->get_dropdown($db, "select id,category_name from category where parent_id='0' and dis_status='1'", $cat);
												?>
											</select>
										</div>
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Select Sub-category <span class="required">*</span></label>
										<div class="col-sm-9">
											<select class="form-control" name="sub_cat" id="subcat" onchange="setSubcat2(this.value);">
											    <?
												$sub_cat=isset($sub_cat)?$sub_cat:'';
												echo $drop->get_dropdown($db, "select id,category_name from category where parent_id='".$cat."' and dis_status='1'", $sub_cat);
												?>
											</select>
										</div>
									</div>
									<?php /*===Code by ABhishek kandari===Start*/ ?>
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Second Level Sub Category :</label>
										<div class="col-sm-9">
											<select class="form-control" name="subcategory2" id="subcategory2">
											<?
												$sub_cat2=isset($sub_cat2)?$sub_cat2:'';
												echo $drop->get_dropdown($db, "select id,cat_name from sub_category where sub_cat_id='".$sub_cat."' and active_status='1'",$sub_cat2);
												?>
											</select>
										</div>
									</div>
									<?php /*===Code by ABhishek kandari===End*/ ?>
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Keywords<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="keyword" id="model" value="<? echo "$prod[keyword1]|$prod[keyword2]|$prod[keyword3]|$prod[keyword4]"; ?>" required>	
										</div>
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Brief Description</label>
										<div class="col-sm-9">
											<textarea class="form-control" name="b_des" id="textarea" rows="3"><? echo $prod['prod_briefdes']; ?></textarea>	
										</div>
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Detailed Description<span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea class="form-control" name="d_des" id="textarea" rows="3" required><? echo $prod['prod_detaildes']; ?></textarea>	
										</div>
									</div>
									
									
									<h4>Order & Payment</h4>
									
									<div class="row form-group select-price">
										<label class="col-sm-3 label-title">Unit Price<span class="required">*</span></label>
										<div class="col-sm-4">
											<select class="form-control" name="prc_unit" required>
											    <?
												$prc_unit=isset($prc_unit)?$prc_unit:'';
												echo $drop->get_dropdown($db, "select units_name,units_name from prod_units where status='0'", $prc_unit);
												?>
											</select>
										</div>
										<div class="col-sm-5">
											<? $u_price=explode('/',$prod['unit_price']); ?>
											<input type="text" class="form-control" name="prc_val" id="model" value="<? echo $u_price[0]; ?>">	
										</div>
									</div>
									
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Max Price<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="max_price" id="model" value="<? echo $prod['prod_maxprice']; ?>" required>	
										</div>
									</div>
									
									<!--<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Minimum Bidding Price<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="min_price" id="model" value="<? echo $prod['prod_minprice']; ?>" required>	
										</div>
									</div>-->
									
									<div class="row form-group">
										<label class="col-sm-3">Is price negotiable? <span class="required">*</span></label>
										<div class="col-sm-9 user-type">
											  <?
											  foreach($PS_Negot as $St) {
												$Stl=strtolower($St);
												if($prod['price_negotiable']==$Stl) $ch="checked"; else $ch="";
												echo "<input type='radio' name='nego' value='$Stl' id='$Stl' $ch> <label for='$Stl'>$St</label>";
											  }
											  ?>	
										</div>
									</div>
									
									
									<div class="row form-group additional">
										<label class="col-sm-3 label-title">Type or Status</label>
										<div class="col-sm-9">
											<div class="checkbox1">
												  <?php 
												  $data_stat=explode(",",$prod['type_or_status']);
												  foreach($PS_Type as $k=>$st) {?>
													<div class='col-md-4'><label for='<?php echo $st;?>'  >
														<input type='checkbox' name='prod_st[]' value='<?php echo $st;?>' <?php if(in_array($st,$data_stat)){ echo "checked=checked";}?> id='<?php echo $st;?>'> <?php echo $st;?></label></div>
														<?php 
												  }
												  ?>
											</div>
										</div>
									</div>
									
									<h4>Payment & Billing</h4>
									
									<div class="row form-group select-price">
										<label class="col-sm-3 label-title">Size</label>
										<div class="col-sm-4">
											<select class="form-control" name="size_tp">
											    <?
												$size_tp=isset($size_tp)?$size_tp:'';
												echo $drop->get_dropdown($db, "select units_name,units_name from prod_units where status='0'", $size_tp);
												?>
											</select>
										</div>
										<div class="col-sm-5">
											<? $p_size=explode('/',$prod['prod_size']); ?>
											<input type="text" class="form-control" name="size_val" id="model" value="<? echo $p_size[0]; ?>">	
										</div>
									</div>
									
									
									<div class="row form-group additional">
										<label class="col-sm-3 label-title">Payment Type</label>
										<div class="col-sm-9">
											<div class="checkbox1">
												<?php 
												$data_stat_py=explode(",",$prod['payment_type']);
												$pay=$db->get_all_asso("select * from payment_methods where active_status='1'");
												foreach($pay as $p) {
													echo '<div class="col-md-4">
															<label for="'.$p['name'].'">';?>
										<input type="checkbox" name="pay_method[]" <?php if(in_array($p['name'],$data_stat_py)){ echo "checked=checked";}?> value="<?php echo $p['name'];?>" id="<?php echo $p['name'];?>"><?php echo $p['name'];?><?php
															echo '</label></div>';
												}
												?>
											</div>
										</div>
									</div>
									
									
									<div class="row form-group select-price">
										<label class="col-sm-3 label-title">Minimum Order Quantity</label>
										<div class="col-sm-9 row">
											<div class="col-xs-6">
											<select class="form-control" name="ord_qunit">
												 <?
												 $ord_qunit = isset($ord_qunit)?$ord_qunit:'';
												 echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$ord_qunit);
												 ?>
											</select>
										</div>
										
										<div class="col-xs-6">
											<? $m_quan=explode('/', $prod['prod_minquantity']); ?>
											<input type="text" class="form-control" name="ord_quan" id="model" value="<? echo $m_quan[0]; ?>">	
										</div>
										</div>
										
										
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Time to Expire</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="exp_date" id="model" value="<? echo $prod['prod_expdate']; ?>" >	
										</div>
									</div>
									
									
									<h4>Pictorial Illustration</h4>
									
										<div class="row form-group add-image">
											<label class="col-sm-3 label-title">Upload Photos<span class="required">*</span></label>
											<div class="col-sm-9">
											  <div class="upload-section">
												<div class="row">
													<label class="upload-image" for="upload-image-one">
													<input type="file" id="upload-image-one" name="photo1" accept="image/*" onchange="img_validate('upload-image-one',1000,600,5,3,'img_div');" > 
													<div class="row"><img src="<?echo $siteurl;?>/uploads/product/1000x600/<?echo @$prod['photo1'];?>" id="img_div"/></div>
													</label>
												</div><br/>
												
												<div class="row">
													<label class="upload-image" for="upload-image-two">
													<input type="file" id="upload-image-two" name="photo2" accept="image/*" onchange="img_validate('upload-image-two',1000,600,5,3,'img_div2' );" >
													<div class="row"><img src="<?echo $siteurl;?>/uploads/product/1000x600/<?echo @$prod['photo2'];?>" id="img_div2"/></div>
													</label>
												</div><br/>
												<div class="row">	
													<label class="upload-image" for="upload-image-three">
													<input type="file" id="upload-image-three" name="photo3" accept="image/*" onchange="img_validate('upload-image-three',1000,600,5,3,'img_div3');">
													<div class="row"><img src="<?echo $siteurl;?>/uploads/product/1000x600/<?echo @$prod['photo3'];?>" id="img_div3"></img></div>								
													</label>
												</div><br/>	
												<div class="row">
													<label class="upload-image" for="upload-image-four">
													<div class="row"><img src="<?echo $siteurl;?>/uploads/product/1000x600/<?echo @$prod['photo4'];?>" id="img_div4"></img></div>
													<input type="file" id="upload-image-four" name="photo4" accept="image/*" onchange="img_validate('upload-image-four',1000,600,5,3,'img_div4');" >
													</label>
												</div><br/>	
											  </div>
											</div>
										</div>
									
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Product Video</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="vdeo" id="model" value="<? echo $prod['video_embed_code']; ?>">video format should be(https://www.youtube.com/embed/M6hliHgG1AI)
										</div>
									</div>
									
									
									<!--<div class="row form-group add-image">
										<label class="col-sm-3 label-title">Product Brochures</label>
										<div class="col-sm-9">
											<div class="upload-section">
												<label class="upload-image" for="upload-image-one">
													<input type="file" id="upload-image-one">
												</label>										
											</div>	
										</div>
									</div>-->
									
									<!--<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Other related items</label>
										<div class="col-sm-9">
											<textarea class="form-control" name="related" id="textarea" rows="5"><? echo $prod['other_relateditems']; ?></textarea>	
										</div>
									</div>-->
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Colour</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="color" id="model" Value="<? echo $prod['color']; ?>">	
										</div>
									</div>
									
									<h4>Shiping Details</h4>
									<div class="row form-group select-price">
										<label class="col-sm-3 label-title">Maximum Supply Capacity</label>
										<div class="col-sm-9 row" >
										<div class="col-sm-4">
											<select class="form-control" name="max_unit">
												 <?
												 $max_unit = isset($max_unit)?$max_unit:'';
												 echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$max_unit);
												 ?>
											</select>
										</div>
										<div class="col-sm-4">
											<? $max_q=explode('/', $prod['max_supply_quantity']); ?>
											<input type="text" class="form-control" name="max_val" id="model" value="<? echo $max_q[0]; ?>">	
										</div>
										</div>
									</div>
									
									
									<div class="row form-group additional">
										<label class="col-sm-3 label-title">Shipping Terms <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="checkbox">
												<input type="text" class="form-control" name="sh_terms" value="<?echo $prod['shipping_terms']; ?>" required>
											</div>
										</div>
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Packaging Details<span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea class="form-control" name="p_det" id="textarea" rows="3" required><? echo $prod['packaging_details']; ?></textarea>	
										</div>
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Shipment</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="shipment" id="model" value="<? echo $prod['shipment']; ?>">
										</div>
									</div>
									
									<h4>More Details</h4>
									
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Contract Period </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="c_period" id="model" value="<? echo $prod['contract_period']; ?>">	
										</div>
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Terms and policy </label>
										<div class="col-sm-9">
											<textarea class="form-control" name="terms" id="textarea" rows="3"><? echo $prod['terms_and_policy']; ?></textarea>
										</div>
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Warranty Period</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="w_period" id="model" value="<? echo $prod['warranty_period']; ?>">
										</div>
									</div>
									
									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Garrantee Period </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="g_period" id="model" value="<? echo $prod['garranty_period']; ?>">	
										</div>
									</div>
									
								</div><!-- section -->
								
								
								<div class="section">
									<center><button type="submit" name="ed_Prod" class="btn btn-primary">Save</button></center>
								</div><!-- section -->
								
							</fieldset>
						</form><!-- form -->	
					</div>
					

				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="ad-section">
							<a href="#"><img src="<?echo $siteurl;?>/images/ad-729x90.jpg" alt="Image" class="img-responsive"></a>
						</div>
					</div>
				</div><!-- row -->
			</div>
            </div>
			</div>
        </div>

				
			<!-- include/buissList.php -->
			
		</div><!-- container -->
		</div>
		<?php /* === Code by Abhishek kandari=== start*/?>
<script>
function setSubcat(mid){
	//alert(mid);
$.ajax({
type:"POST",
url:'<?php echo $siteurl?>/field_ajax.php',
data:{'val':mid},
success:function(data){
//$("#subcatdiv").css('display','block');
$("#subcat").html(data);
}  
});
}
function setSubcat2(val){
	//alert(val);
	 $.ajax({url: "<?php echo $siteurl?>/subcat_ajax.php?val="+val, success: function(result){
        $("#subcategory2").html(result);
    }});
}
</script>
<?php /* === Code by Abhishek kandari=== End*/?>
<?php 
include "footer.php";
if(isset($ed_Prod)) {
	
	$prod_name=trim(addslashes($prod_name));
	$permalink=str_replace(" ", "-", $prod_name);
	$permalink=strtolower($permalink);
	$cat=addslashes($cat);
	$sub_cat=addslashes($sub_cat);
	/* === Code by Abhishek kandari=== Start*/
	$sub_cat2 = addslashes($_POST['subcategory2']);
	/* === Code by Abhishek kandari=== End*/
	$keyword=trim(addslashes($keyword));
	$key=explode("|", $keyword);
	$key1=$key[0]; $key2=$key[1];
	$key3=$key[2]; $key4=$key[3];
	$b_des=trim(addslashes($b_des));
	$d_des=trim(addslashes($d_des));
	$prc_val=trim(addslashes($prc_val));
	$prc_unit = trim(addslashes($prc_unit));
	$unit_price=$prc_val.'/'.$prc_unit;
	$max_price=trim(addslashes($_POST['max_price']));
	$min_price=trim(addslashes($min_price));
	$nego=addslashes($nego);
	$prod_st=@join(",",$prod_st);
	$size_tp=addslashes($size_tp);
	$size_val=trim(addslashes($size_val));
	$prod_size=$size_val.'/'.$size_tp;
	$pay_type=@join(",",$_POST['pay_method']);
	$ord_qunit=addslashes($ord_qunit);
	$ord_quan=trim(addslashes($ord_quan));
	$min_quan=$ord_quan.'/'.$ord_qunit;
	$exp_date=trim(addslashes($exp_date));
	$vdeo=trim(addslashes($vdeo));
	$related=trim(addslashes($related));
	$color=trim(addslashes($color));
	$max_unit=addslashes($max_unit);
	$max_quan=trim(addslashes($max_val));
	$sh_terms=trim(addslashes($sh_terms));
	$p_det=trim(addslashes($p_det));
	$shipment=trim(addslashes($shipment));
	$c_period=trim(addslashes($c_period));
	$terms=trim(addslashes($terms));
	$w_period=trim(addslashes($w_period));
	$g_period=trim(addslashes($g_period));
		
	if($prod_name!="") {
		$set="permalink='$permalink'";
		$set.=",prod_name='$prod_name'";
		$set.=",prod_category='$cat'";
		$set.=",prod_subcategory='$sub_cat'";
		$set.=",subcategory2='$sub_cat2'";
		$set.=",keyword1='$key1'";
		$set.=",keyword2='$key2'";
		$set.=",keyword3='$key3'";
		$set.=",keyword4='$key4'";
		$set.=",prod_briefdes='$b_des'";
		$set.=",prod_detaildes='$d_des'";
		$set.=",unit_price='".$prc_val."'";
		$set.=",unit_price_unit='".$prc_unit."'";
		$set.=",prod_maxprice='$max_price'";
		$set.=",prod_minprice='$min_price'";
		$set.=",price_negotiable='$nego'";
		$set.=",type_or_status='$prod_st'";
		$set.=",prod_size='$size_val'";
		$set.=",prod_size_unit='".$size_tp."'";
		$set.=",payment_type='$pay_type'";
		$set.=",prod_minquantity='$ord_quan'";
		$set.=",prod_quantitytype='$ord_qunit'";
		
		$set.=",prod_expdate='$exp_date'";
		$set.=",video_embed_code='$vdeo'";
		$set.=",other_relateditems='$related'";
		$set.=",color='$color'";
		$set.=",max_supply_quantity='$max_quan'";
		$set.=",max_sup_unit='$max_unit'";
		$set.=",shipping_terms='$sh_terms'";
		$set.=",packaging_details='$p_det'";
		$set.=",shipment='$shipment'";
		$set.=",contract_period='$c_period'";
		$set.=",terms_and_policy='$terms'";
		$set.=",warranty_period='$w_period'";
		$set.=",garranty_period='$g_period'";
		
		$BrImg = $prod['photo1'];
		$BrImg = substr($BrImg,0,strpos($BrImg,'.'));
		
		if($_FILES['photo1']['tmp_name']!=''){
			$isUpd = $com_obj->upload_image("photo1",$BrImg,1000,600,5,3,"uploads/product/1000x600/","update");
			if($isUpd){
				$NgImg=$com_obj->img_Name;
				$set.=",photo1='$NgImg'";
			}
		}
		
		$BrImg = $prod['photo2'];
		$BrImg = substr($BrImg,0,strpos($BrImg,'.'));
		if($_FILES['photo2']['tmp_name']!=''){
			$isUpd = $com_obj->upload_image("photo2",$BrImg,1000,600,5,3,"uploads/product/1000x600/","update");
			if($isUpd){
				$NgImg=$com_obj->img_Name;
				$set.=",photo2='$NgImg'";
			}
		}
		$BrImg = $prod['photo3'];
		$BrImg = substr($BrImg,0,strpos($BrImg,'.'));
		if($_FILES['photo3']['tmp_name']!=''){
			$isUpd = $com_obj->upload_image("photo3",$BrImg,1000,600,5,3,"uploads/product/1000x600/","update");
			if($isUpd){
				$NgImg=$com_obj->img_Name;
				$set.=",photo3='$NgImg'";
			}
		}
		$BrImg = $prod['photo4'];
		$BrImg = substr($BrImg,0,strpos($BrImg,'.'));
		if($_FILES['photo4']['tmp_name']!=''){
			$isUpd = $com_obj->upload_image("photo4",$BrImg,1000,600,5,3,"uploads/product/1000x600/","update");
			if($isUpd){
				$NgImg=$com_obj->img_Name;
				$set.=",photo4='$NgImg'";
			}
		}
		

		
		$db->insertrec("update product set $set where id='$dec'");
		echo "<script>location.href='$siteurl/manage-product';</script>";
		header("Location: $siteurl/manage-product"); exit;
	}
	else {
		echo "<script>swal('Oops..', 'Fill all the required fields!', 'error');</script>";
	}
}
?>
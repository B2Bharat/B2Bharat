<? include "header.php"; 
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act  = isSet($act) ? $act : '' ;
$Message  = isSet($Message) ? $Message : '' ;
$group_id=isSet($group_id) ? $group_id : '' ;
$cat_id=isSet($cat_id) ? $cat_id : '' ;
$sub_cat_id=isSet($sub_cat_id) ? $sub_cat_id : '' ;
$subcategory2=isSet($subcategory2) ? $subcategory2 : '' ;
$user_id=isSet($user_id) ? $user_id : '' ;
$offer_name=isSet($offer_name) ? $offer_name : '' ;
$subject=isSet($subject) ? $subject : '' ;
$keyword1=isSet($keyword1) ? $keyword1 : '' ;
$keyword2=isSet($keyword2) ? $keyword2 : '' ;
$keyword3=isSet($keyword3) ? $keyword3 : '' ;
$keyword4=isSet($keyword4) ? $keyword4 : '' ;
$brief_description=isSet($brief_description) ? $brief_description : '' ;
$det_description=isSet($det_description) ? $det_description : '' ;
$valid_until=isSet($valid_until) ? $valid_until : '' ;
$currency=isSet($currency) ? $currency : '10' ;
$base_price=isSet($base_price) ? $base_price : '' ;
$max_price=isSet($max_price) ? $max_price : '' ;
$min_order_quantity=isSet($min_order_quantity) ? $min_order_quantity : '' ;
$size=isSet($size) ? $size : '' ;
$specification=isSet($specification) ? $specification : '' ;
$package=isSet($package) ? $package : '' ;
$delivery_time=isSet($delivery_time) ? $delivery_time : '' ;
$shipping=isSet($shipping) ? $shipping : '' ;
$ship_terms=isSet($ship_terms) ? $ship_terms : '' ;
$pay_method=isSet($pay_method) ? $pay_method : '' ;
$brand_name=isSet($brand_name) ? $brand_name : '' ;
$model_num=isSet($model_num) ? $model_num : '' ;
$manufacturers=isSet($manufacturers) ? $manufacturers : '' ;
$place_of_origin=isSet($place_of_origin) ? $place_of_origin : '' ;
$materials=isSet($materials) ? $materials : '' ;
$colors=isSet($colors) ? $colors : '' ;
$min_bid_price=isSet($min_bid_price) ? $min_bid_price : '' ;
$price_negotiable=isSet($price_negotiable) ? $price_negotiable : '' ;
$other_related=isSet($other_related) ? $other_related : '' ;
$action=isSet($action) ? $action : '' ;
$business_group=isSet($business_group) ? $business_group : '' ;
$photo1=isSet($photo1) ? $photo1 : '' ;
$photo2=isSet($photo2) ? $photo2 : '' ;
$photo3=isSet($photo3) ? $photo3 : '' ;
$photo4=isSet($photo4) ? $photo4 : '' ;
$photo5=isSet($photo5) ? $photo5 : '' ;
$quan_unit=isSet($quan_unit) ? $quan_unit : '' ;
$size_unit=isSet($size_unit) ? $size_unit : '' ;
$deliver_duration_unit=isSet($deliver_duration_unit) ? $deliver_duration_unit : '' ;
$price_unit=isSet($price_unit) ? $price_unit : '' ;
		
$GetRecord = $db->singlerec("select * from selling_leads where id='$id'");
@extract($GetRecord);

$group_id=stripslashes($group_id);
$cat_id=stripslashes($cat_id);
$sub_cat_id=stripslashes($sub_cat_id);
$subcategory2=stripslashes($subcategory2);
$user_id=stripslashes($user_id);
$offer_name=stripslashes($offer_name);
$subject=stripslashes($subject);
$keyword1=stripslashes($keyword1);
$keyword2=stripslashes($keyword2);
$keyword3=stripslashes($keyword3);
$keyword4=stripslashes($keyword4);
$brief_description=stripslashes($brief_description);
$det_description=stripslashes($det_description);
$valid_until=stripslashes($valid_until);
$currency=stripslashes($currency);
$base_price=stripslashes($base_price);
$base_quan_type=stripslashes($price_unit);
$max_price=stripslashes($max_price);													
$min_order_quantity=stripslashes($min_order_quantity);
//$min_order_quantity=$com_obj->get_price($min_order_quantity1);
$morder_quan_type=stripslashes($quan_unit);
$size=stripslashes($size);
//$size=$com_obj->get_price($size1);
$size_quan_type=stripslashes($size_unit);
$specification=stripslashes($specification);
$package=stripslashes($package); 
$delivery_time=stripslashes($delivery_time);
//$delivery_time=$com_obj->get_price($delivery_time1);
$time=stripslashes($deliver_duration_unit);
$shipping=stripslashes($shipping);
$ship_terms=stripslashes($ship_terms);
$pay_method=stripslashes($pay_method); 	
$brand_name=stripslashes($brand_name);
$model_num=stripslashes($model_num);
$manufacturers=stripslashes($manufacturers);
$place_of_origin=stripslashes($place_of_origin);
$materials=stripslashes($materials);
$colors=stripslashes($colors); 	
$min_bid_price=stripslashes($min_bid_price);
$price_negotiable=stripslashes($price_negotiable);
$other_related=stripslashes($other_related);
$action=stripslashes($action);	 
$business_group=stripslashes($business_group);
$photo1=stripslashes($photo1);
$photo2=stripslashes($photo2);
$photo3=stripslashes($photo3);
$photo4=stripslashes($photo4);
$photo5=stripslashes($photo5);

$productgroup = "<option value=''>- - Select- -</option>";
$DropDownQry = "select * from grouplist where status='0' order by groupname asc";
$productgroup .= $drop->get_dropdown($db,$DropDownQry,$group_id);

$productcategory = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,category_name from category where dis_status='1' order by category_name asc";
$productcategory .= $drop->get_dropdown($db,$DropDownQry,$cat_id);

$subcategory = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,category_name from category where dis_status='1' group by category_name asc";
$subcategory .= $drop->get_dropdown($db,$DropDownQry,$sub_cat_id);

$pro_subcategory2 = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,cat_name from sub_category where active_status='1' group by cat_name asc";
$pro_subcategory2 .= $drop->get_dropdown($db,$DropDownQry,$subcategory2);

$user_list = "<option value=''>- - Select- -</option>";
//$DropDownQry = "select id,fname from register where active_status='1' order by id asc";
$DropDownQry = "select a.id,a.fname,b.name from register as a inner join company as b on a.id=b.user_id where a.active_status='1' order by a.id asc";
$user_list .= $drop->get_dropdown($db,$DropDownQry,$user_id);

$currency_code = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,currencycode from currency_code order by countryname asc";
$currency_code .= $drop->get_dropdown($db,$DropDownQry,$currency);

if($act == "ps")
	$Message = "<b><font color='red'>atleast 4 minimum character need!!!...</font></b>";

?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>Selling Leads </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Selling Leads </li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                         <a class= "btn btn-info" onclick="history.go(-1);">Back </a>
  
                        <div class="panel-heading">
                            <h3 class="panel-title">Selling Leads <?echo $Message;?></h3>
                         </div>
                         <div class="panel-body">
                         <!-- START Form Wizard -->
                            <form class="form-horizontal form-bordered form-wizard" action="sellingupdate.php" id="wizard-validate" method="post" enctype="multipart/form-data">
                            <!-- Wizard Container 1 -->
                                <div class="wizard-title"> Categories </div>
                                    <div class="wizard-container">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                             <h5 class="semibold text-primary">
                                                <i class="fa fa-sign-in"></i> Categories
                                                </h5>
                                                        <p class="text-muted"> Choose the Categories </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Select A Group :<span class="text-danger">*</span> </label>
                                                    <div class="col-sm-6">
													<select name="group_id" id="group_id" class="form-control" value="<? echo $group_id; ?>" Onchange="return categ(this.value);" data-parsley-group="order" data-parsley-required>
													<? echo $productgroup;?>
													</select>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-2 control-label">  Category : <span class="text-danger">*</span></label>
                                                    <div class="col-sm-6" id="cat1">
													
                                                        <select name="prod_category" id="cat_id" class="form-control" value="<? echo $cat_id; ?>" data-parsley-group="order" data-parsley-required Onchange="setSubcat(this.value);"><? echo $productcategory;?>
													    </select>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Sub Category : <span class="text-danger">*</span></label>
                                                    <div class="col-sm-6" id="cat2">
                                                        <select name="sub_cat_id" id="sub_cat_id" class="form-control" value="<? echo $sub_cat_id; ?>" data-parsley-group="order" data-parsley-required onchange="setSubcat2(this.value);">
													    <? echo $subcategory;?>
													    </select>
                                                    </div>
                                                </div>
												
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Second Level Sub Category : <span class="text-danger">*</span></label>
                                                    <div class="col-sm-6" id="cat3">
                                                        <select name="subcategory2" id="subcategory2" class="form-control" value="<? echo $subcategory2; ?>" >
													    <? echo $pro_subcategory2;?>
													    </select>
                                                    </div>
                                                </div>
												
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Select A User :<span class="text-danger">*</span> </label>
                                                    <div class="col-sm-6" id="cat">
                                                        <select name="user_id" id="user_id" class="form-control" value="<? echo $user_id; ?>" data-parsley-group="order" data-parsley-required>
													    <? echo $user_list;?>
													    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Wizard Container 1 -->
                                            <!-- Wizard Container 2 -->
											 <div class="wizard-title"> Offer Details </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Offer Details
                                                        </h5>
                                                        <p class="text-muted"> Offer Details</p>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														<div class="col-md-6">
														    <label> Name of selling leads :<span class="text-danger">*</span></label>
                                                            <input type="text" name="offer_name" id="offer_name" value="<? echo $offer_name; ?>" class="form-control" data-parsley-group="information" data-parsley-required/>
                                                        </div>
														<div class="col-md-6">
														    <label> Title/Subject :<span class="text-danger">*</span></label>
                                                            <input type="text" name="subject" id="subject" value="<? echo $subject; ?>" class="form-control" data-parsley-group="information" data-parsley-required/>
                                                        </div>
                                                    </div>
                                                </div>
												
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Keywords:<span class="text-danger">*</span></label>
                                                            <input type="input" name="keyword1" class="form-control" value="<? echo $keyword1; ?>" data-parsley-group="information" data-parsley-required/>
															
                                                        </div>
														<div class="col-md-3">
                                                            <label>&nbsp;</label>
                                                            <input type="input" name="keyword2" class="form-control" value="<? echo $keyword2; ?>" 
															data-parsley-group="information" data-parsley-required/>
															
                                                        </div>
														<div class="col-md-3">
                                                            <label>&nbsp;</label>
                                                            <input type="input" name="keyword3" class="form-control" value="<? echo $keyword3; ?>" data-parsley-group="information" data-parsley-required/>
															
                                                        </div>
														<div class="col-md-3">
                                                            <label>&nbsp;</label>
                                                            <input type="input" name="keyword4" class="form-control" value="<? echo $keyword4; ?>" data-parsley-group="information" data-parsley-required/>
															
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
												        <div class="col-md-6">
														 <label>Upload Thumbnail picture1:<font color="red">*</font></label>
														<div class="upload-section">
														<label class="upload-image" for="upload-image-one" style="width:40%">
															<input type="file" id="upload-image-one" name="photo1" accept="image/*" onchange="img_validate('upload-image-one',1000,600,5,3,'img_div');" <?if(($photo1==""&&$upd==2)||($upd==1)){?>data-parsley-group="information" data-parsley-required <? } ?>/>
														</label>								
														</div>
                                                        </div>
														<img src="../uploads/SL_images/banner1/<?echo $photo1;?>" id="img_div" width="100" height="80" <?if($photo1==''){?>style='display:none;'<?}?>>
													 </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
												        <div class="col-md-6">
														 <label>Upload Thumbnail picture2: <font color="red">*</font></label>
														<div class="upload-section">
														<label class="upload-image" for="upload-image-two" style="width:40%">
															<input type="file" id="upload-image-two" name="photo2" accept="image/*" onchange="img_validate('upload-image-two',1000,600,5,3,'img_div2');" <?if(($photo2==""&&$upd==2)||($upd==1)){?>data-parsley-group="information" data-parsley-required <? } ?>/>
														</label>								
														</div>
                                                        </div>
														<img src="../uploads/SL_images/banner2/<?echo $photo2;?>" id="img_div2" width="100" height="80" <?if($photo2==''){?>style='display:none;'<?}?>>
													 </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
												        <div class="col-md-6">
														 <label>Upload Thumbnail picture3: <font color="red">*</font></label>
														<div class="upload-section">
														<label class="upload-image" for="upload-image-three" style="width:40%">
															<input type="file" id="upload-image-three" name="photo3" accept="image/*" onchange="img_validate('upload-image-three',1000,600,5,3,'img_div3');" <?if(($photo3==""&&$upd==2)||($upd==1)){?>data-parsley-group="information" data-parsley-required <? } ?>/>
														</label>								
														</div>
                                                        </div>
														<img src="../uploads/SL_images/banner3/<?echo $photo3;?>" id="img_div3" width="100" height="80" <?if($photo3==''){?>style='display:none;'<?}?>>
													 </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
												        <div class="col-md-6">
														 <label>Upload Thumbnail picture4: <font color="red">*</font></label>
														<div class="upload-section">
														<label class="upload-image" for="upload-image-four" style="width:40%">
															<input type="file" id="upload-image-four" name="photo4" accept="image/*" onchange="img_validate('upload-image-four',1000,600,5,3,'img_div4');" <?if(($photo4==""&&$upd==2)||($upd==1)){?>data-parsley-group="information" data-parsley-required <? } ?>/>
														</label>								
														</div>
                                                        </div>
														<img src="../uploads/SL_images/banner4/<?echo $photo4;?>" id="img_div4" width="100" height="80" <?if($photo4==''){?>style='display:none;'<?}?>>
													 </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
												        <div class="col-md-6">
														 <label>Upload Thumbnail picture5: <font color="red">*</font></label>
														<div class="upload-section">
														<label class="upload-image" for="upload-image-five" style="width:40%">
															<input type="file" id="upload-image-five" name="photo5" accept="image/*" onchange="img_validate('upload-image-five',1000,600,5,3,'img_div5');" <?if(($photo5==""&&$upd==2)||($upd==1)){?>data-parsley-group="information" data-parsley-required <? } ?>/>
														</label>								
														</div>
                                                        </div>
														<img src="../uploads/SL_images/banner5/<?echo $photo5;?>" id="img_div5" width="100" height="80" <?if($photo5==''){?>style='display:none;'<?}?>>
													 </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-12">
                                                            <label>Brief Description: <span class="text-danger">*</span> </label>
                                                            <textarea name="brief_description" id="brief_description" class="form-control"
															data-parsley-maxrange="1500"
															data-parsley-group="information" data-parsley-required><? echo $brief_description; ?></textarea>
                                                        </div>
													</div>
                                                </div>
												
												<div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Detailed Description: <span class="text-danger">*</span> </label>
                                                            <textarea name="det_description" id="det_description" class="form-control"
															data-parsley-maxrange="2000"
															data-parsley-group="information" data-parsley-required><? echo $det_description; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-title"> Request For Proposal </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-user"></i>  Request For Proposal
                                                        </h5>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                       <!--<div class="col-md-2">
                                                            <label>Currency Locale: <span class="text-danger">*</span> </label>
															<select name="currency" id="currency" class="form-control" value="<? echo $currency; ?>"data-parsley-group="payment" data-parsley-required><? echo $currency_code;?></select>
                                                        </div>-->
														<div class="col-md-3">
                                                            <label>Base Price (After Discount):<span class="text-danger">*</span></label>
                                                            <input type="number" name="base_price" id="base_price" class="form-control" value="<? echo $base_price; ?>" data-parsley-group="payment" data-parsley-required/>
                                                        </div>
                                                       <div class="col-md-2">
                                                            <label>&nbsp;</label>
															<select name="base_quan_type" class="form-control" data-parsley-group="payment" data-parsley-required>
															<?echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$base_quan_type);?> </select>
                                                       </div>
													    <div class="col-md-4">
                                                            <label>Maximum Price (Strikethrough):<span class="text-danger">*</span></label>
                                                            <input type="number" name="max_price" id="max_price" placeholder="Maximum Price" class="form-control" value="<? echo $max_price; ?>" data-parsley-group="payment" data-parsley-required/>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
											<div class="form-group">
                                               <div class="row">
												        <div class="col-md-3">
                                                            <label>Minimum Order Quantity:<span class="text-danger">*</span></label>
                                                            <input type="number" name="min_order_quantity" class="form-control" value="<? echo $min_order_quantity; ?>" data-parsley-group="payment" data-parsley-required/>
                                                        </div>
														<div class="col-md-2">
                                                            <label>&nbsp;</label>
															<select name="morder_quan_type" class="form-control" data-parsley-group="payment" data-parsley-required>
															<?echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$morder_quan_type);?> 
															</select>
                                                        </div>
														<div class="col-md-3">
                                                            <label>Size:<span class="text-danger">*</span></label>
                                                            <input type="number" name="size" class="form-control" value="<? echo $size; ?>" data-parsley-group="payment" data-parsley-required/>
                                                        </div>
														<div class="col-md-2">
                                                            <label>&nbsp;</label>
															<select name="size_quan_type" class="form-control" data-parsley-group="payment" data-parsley-required>
															<?echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$size_quan_type);?> 
															</select>
                                                        </div>
												</div>
											</div>
											<div class="form-group">
                                               <div class="row">		
														<div class="col-md-3">
                                                            <label>Duration of Delivery:<span class="text-danger">*</span></label>
                                                            <input type="text" name="delivery_time" id="delivery_time" class="form-control" value="<? echo $delivery_time ; ?>" data-parsley-group="payment" data-parsley-required/>
                                                        </div>
														 <div class="col-md-2">
                                                            <label>&nbsp;</label>
															<select name="time" id="time" class="form-control" data-parsley-group="payment" data-parsley-required>
															<option value="">Select</option>
															<?echo $drop->get_dropdown($db,"select time,time from units where time!='' AND time is NOT NULL",$time);?> 
															</select>
                                                        </div>
														<div class="col-md-5">
                                                            <label>Shipping Terms:</label>
                                                            <div class="radio">
															<?  $ch="";
																foreach($SH_Terms as $SH_Term){
																if($ship_terms==strtolower($SH_Term))
																	$ch="checked";	
																else	
																	$ch="";?>
																<label class="form-icon">
																<input type="radio" name="ship_terms" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?>> <?echo strtoupper($SH_Term);?> </label>
																<? } ?>
															</div>
														</div>
													</div>
                                                </div>
												
												<div class="form-group">
                                                    <div class="row">
													    <div class="col-md-6">
                                                            <label>Packaging Details:</label>
                                                            <textarea type="text" name="package" id="package" class="form-control" rows="1"><? echo $package ; ?></textarea>
                                                        </div>
													    <div class="col-md-6">
                                                            <label>Shipment:</label>
                                                            <input type="text" name="shipping" id="shipping" class="form-control" value="<? echo $shipping ; ?>"/>
                                                        </div>
													 </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
                                                        
												<div class="col-md-12">
												 <label>Payment Method:</label>
												 <div class="radio">
												  <?$pmethods = $db->get_all_asso("select id,name from payment_methods where active_status='1'");
												  $pays=explode(',',$pay_method);
												  foreach($pmethods as $key=>$pay_method){
												  if(in_array($pay_method['id'],$pays))
													$ch='checked';
												  else
													$ch='';  
												  ?>
												   <label class="form-icon"><input type="checkbox" name="pay_method[]" value='<?echo $pay_method['id'];?>' id="pay_method<?echo $key;?>" <? echo $ch; ?>> <?echo $pay_method['name'];?> </label>
												  <? } ?>
												   </div>
                                                </div>
                                                    </div>
                                                </div>
										<div class="form-group">
										   <div class="row">
                                                
												</div>
											</div>
                                            </div>
                                            <!--/ Wizard Container 2 -->
                                            <!-- Wizard Container 3 -->
                                            <div class="wizard-title">Company Details and Preferences</div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-book"></i> Company Details
                                                        </h5>
                                                        <p class="text-muted"> Company Details </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Brand Name:</label>
                                                            <input type="text" name="brand_name" id="brand_name" class="form-control" value="<? echo $brand_name ; ?>"/>
                                                        </div>
														<div class="col-md-4">
                                                            <label>Specifications:</label>
                                                            <input type="text" name="specification" id="specification" class="form-control" value="<? echo $specification; ?>">
                                                        </div> 
														<div class="col-md-4">
                                                            <label>Model/Article Number:</label>
                                                            <input type="text" name="model_num" id="model_num" class="form-control" value="<? echo $model_num; ?>">
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
													    <div class="col-md-4">
                                                            <label>Manufacturers:</label>
                                                            <input type="text" name="manufacturers" id="manufacturers" class="form-control" value="<? echo $manufacturers; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Place of Origin:</label>
                                                            <input type="text" name="place_of_origin" id="place_of_origin" class="form-control" value="<? echo $place_of_origin; ?>">
                                                        </div>
														<div class="col-md-4">
                                                            <label>Materials / Ingredients:</label>
                                                            <input type="text" name="materials" id="materials" class="form-control" value="<? echo $materials; ?>">
                                                        </div>
													 </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														<div class="col-md-4">
                                                            <label>Colors:</label>
                                                            <input type="text" name="colors" id="colors" class="form-control" value="<? echo $colors; ?>">
                                                        </div>
                                                    </div>
                                                </div>
												 <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-book"></i> Preferences
                                                        </h5>
                                                        <p class="text-muted"> Preferences </p>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Minimum Bidding Price: <span class="text-danger">*</span> </label>
                                                            <input type="text" name="min_bid_price" id="min_bid_price" class="form-control" value="<? echo $min_bid_price; ?>" data-parsley-group="other" data-parsley-required>
                                                        </div>
                                                    </div>
													<div class="col-md-6">
													   <div class="radio">
                                                           <label> Ready to Publish : <span class="text-danger">*</span> </label><br>&nbsp;&nbsp;&nbsp;&nbsp;
														   <label class="form-icon active">
                                                           <input type="radio" name="action" value="1" <? if($action=="1") echo "checked"; ?>/ data-parsley-group="other" data-parsley-required>Yes
														   &nbsp;&nbsp;</label>
														   <label class="form-icon">
														   <input type="radio" name="action"value="0" <? if($action=="0") echo "checked"; ?>/>No&nbsp;&nbsp;</label>
														</div>
                                                      </div>
													  <div class="col-md-6">
													   <div class="radio">
                                                           <label> Is price negotiable : <span class="text-danger">*</span> </label><br>&nbsp;&nbsp;&nbsp;&nbsp;
														   <label class="form-icon active">
                                                           <input type="radio" name="price_negotiable" value="1" <? if($price_negotiable=="1") echo "checked"; ?> data-parsley-group="other" data-parsley-required/>Yes
														   &nbsp;&nbsp;</label>
														   <label class="form-icon">
														   <input type="radio" name="price_negotiable"value="0" <? if($price_negotiable=="0") echo "checked"; ?>/>No&nbsp;&nbsp;</label>
														   
														</div>
                                                      </div>
                                                </div>
												
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-6">
                                                            <label>Other Related Items:</label>
															 <select class="form-control" name="other_related[]" multiple >
															   <?  foreach ($Related_items as $key=>$rel){
															  if(in_array($key,array($other_related)))
																  $ch="selected";
															  else
																  $ch="";?>
															<option value="<?echo $key;?>" <?echo $ch;?>> <?echo $rel;?></option>
															  
															  <?}?>
															  </select>
                                                        </div>
														<div class="col-md-4">
                                                            <label>Offer remain valid until: <span class="text-danger">*</span> </label>
                                                            <input type="date" name="valid_until" id="valid_until" class="form-control" value="<? echo $valid_until; ?>" data-parsley-group="other" data-parsley-required>
														   <input type="hidden" name="upd" id="upd" value="<?php echo $upd; ?>">
														   <input type="hidden" name="sellupdate" id="sellupdate" value="sellupdate">
														   <input type="hidden" name="id" id="id" value="<? echo $id; ?>">
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Wizard Container 3 -->
                                          </form>
                                        <!--/ END Form Wizard -->
                                    </div>
                                </section>
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
<script src="js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
		<!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/wizard.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="js/demo/jasmine.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/form-wizard.js"></script>
<script>
function categ(val){
	//alert(val);
	 $.ajax({url: "cat_ajax.php?val="+val, success: function(result){
        $("#cat1").html(result);
    }});
}
function setSubcat(val){
	//alert(val);
	 $.ajax({url: "field_ajax.php?val="+val, success: function(result){
        $("#cat2").html(result);
    }});
}
function setSubcat2(val){
	//alert(val);
	 $.ajax({url: "subcat_ajax.php?val="+val, success: function(result){
        $("#cat3").html(result);
    }});
}
</script>	
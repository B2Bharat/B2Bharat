<? include "header.php"; 



$upd = isset($upd)?$upd:'';

$id = isSet($id) ? $id : '' ;

$act  = isSet($act) ? $act : '' ;

$page  = isSet($page) ? $page : '' ;

$Message  = isSet($Message) ? $Message : '' ;

$prod_group=isSet($prod_group) ? $prod_group : '' ;

$prod_category=isSet($prod_category) ? $prod_category : '' ;

$prod_subcategory=isSet($prod_subcategory) ? $prod_subcategory : '' ;

$subcategory2=isSet($subcategory2) ? $subcategory2 : '' ;

$userid=isSet($userid) ? $userid : '' ;

$prod_currency_loc=isSet($prod_currency_loc) ? $prod_currency_loc : '10' ;

$unit_price=isSet($unit_price) ? $unit_price : '' ;

$unitp_quan_type=isSet($unitp_quan_type) ? $unitp_quan_type : '' ;

$prod_maxprice=isSet($prod_maxprice) ? $prod_maxprice : '' ;

$prod_minprice=isSet($prod_minprice) ? $prod_minprice : '' ;

$price_negotiable=isSet($price_negotiable) ? $price_negotiable : '' ;

$type_or_status=isSet($type_or_status) ? $type_or_status : '' ;

$payment_type=isSet($payment_type) ? $payment_type : '' ;

$prod_size=isSet($prod_size) ? $prod_size : '' ;

$prod_minquantity=isSet($prod_minquantity) ? $prod_minquantity : '' ;

$prod_expdate=isSet($prod_expdate) ? $prod_expdate : '' ;

$video_embed_code=isSet($video_embed_code) ? $video_embed_code : '' ;

$other_relateditems=isSet($other_relateditems) ? $other_relateditems : '' ;

$color=isSet($color) ? $color : '' ;
$prod_group_name=isSet($prod_group_name) ? $prod_group_name : '' ;

$prod_name=isSet($prod_name) ? $prod_name : '' ;

$prod_status=isSet($prod_status) ? $prod_status : '' ;

$prod_briefdes=isSet($prod_briefdes) ? $prod_briefdes : '' ;

$prod_gdes=isSet($prod_gdes) ? $prod_gdes : '' ;

$prod_detaildes=isSet($prod_detaildes) ? $prod_detaildes : '' ;

$place_of_origin=isSet($place_of_origin) ? $place_of_origin : '' ;

$specifications=isSet($specifications) ? $specifications : '' ;

$certificates=isSet($certificates) ? $certificates : '' ;

$brand_name=isSet($brand_name) ? $brand_name : '' ;

$materials=isSet($materials) ? $materials : '' ;

$hs_code=isSet($hs_code) ? $hs_code : '' ;

$mode_article_num=isSet($mode_article_num) ? $mode_article_num : '' ;

$manufacturers=isSet($manufacturers) ? $manufacturers : '' ;

$shipping_terms=isSet($shipping_terms) ? $shipping_terms : '' ;

$packaging_details=isSet($packaging_details) ? $packaging_details : '' ;

$shipment=isSet($shipment) ? $shipment : '' ;

$contract_period=isSet($contract_period) ? $contract_period : '' ;

$terms_and_policy=isSet($terms_and_policy) ? $terms_and_policy : '' ;

$warranty_period=isSet($warranty_period) ? $warranty_period : '' ;

$garranty_period=isSet($garranty_period) ? $garranty_period : '' ;

$keyword1=isSet($keyword1) ? $keyword1 : '' ;

$keyword2=isSet($keyword2) ? $keyword2 : '' ;

$keyword3=isSet($keyword3) ? $keyword3 : '' ;

$keyword4=isSet($keyword4) ? $keyword4 : '' ;

$max_supply_quantity=isSet($max_supply_quantity) ? $max_supply_quantity : '' ;

$supply_duration=isSet($supply_duration) ? $supply_duration : '' ;

$photo1=isSet($photo1) ? $photo1 : '' ;

$photo2=isSet($photo2) ? $photo2 : '' ;

$photo3=isSet($photo3) ? $photo3 : '' ;

$photo4=isSet($photo4) ? $photo4 : '' ;

$photo5=isSet($photo5) ? $photo5 : '' ;

$brochure=isSet($brochure) ? $brochure : '' ;

$unit_price_unit=isSet($unit_price_unit) ? $unit_price_unit : '' ;

$prod_size_unit=isSet($prod_size_unit) ? $prod_size_unit : '' ;

$prod_quantitytype=isSet($prod_quantitytype) ? $prod_quantitytype : '' ;

$max_sup_unit=isSet($max_sup_unit) ? $max_sup_unit : '' ;

$prod_no=isSet($prod_no) ? $prod_no : '' ;

$featured=isSet($featured) ? $featured : '' ; 

$GetRecord = $db->singlerec("select * from product where id='$id'");

@extract($GetRecord);

$prod_group=stripslashes($prod_group);

$prod_category=stripslashes($prod_category);

$prod_subcategory=stripslashes($prod_subcategory);

$subcategory2=stripslashes($subcategory2);

$userid=stripslashes($userid );

$prod_currency_loc=stripslashes($prod_currency_loc);

$unit_price=stripslashes($unit_price);

//$unit_price=$com_obj->get_price($unit_price1);

$unitp_quan_type=stripslashes($unit_price_unit);

$prod_maxprice=stripslashes($prod_maxprice);

$prod_minprice=stripslashes($prod_minprice);

$price_negotiable=stripslashes($price_negotiable); 

$type_or_status=stripslashes($type_or_status);

$payment_type=stripslashes($payment_type);

$prod_size=stripslashes($prod_size);

//$prod_size=$com_obj->get_price($prod_size1);

$size_quan_type=stripslashes($prod_size_unit);

$prod_minquantity=stripslashes($prod_minquantity);

//$prod_minquantity=$com_obj->get_price($prod_minquantity1);

$min_quan_type=stripslashes($prod_quantitytype);

$prod_expdate=stripslashes($prod_expdate);

$video_embed_code=stripslashes($video_embed_code);

$other_relateditems=stripslashes($other_relateditems);

$color=stripslashes($color);

$prod_group_name=stripslashes($prod_group_name);

$prod_name=stripslashes($prod_name);

$featured=stripslashes($featured);

$prod_status=stripslashes($prod_status);

$prod_briefdes=stripslashes($prod_briefdes);

$prod_gdes=stripslashes($prod_gdes);

$prod_detaildes=stripslashes($prod_detaildes);

$place_of_origin=stripslashes($place_of_origin);	 

$specifications=stripslashes($specifications);

$certificates=stripslashes($certificates);	

$brand_name=stripslashes($brand_name);

$materials=stripslashes($materials);

$hs_code=stripslashes($hs_code);

$mode_article_num=stripslashes($mode_article_num);

$manufacturers=stripslashes($manufacturers);

$shipping_terms=stripslashes($shipping_terms);

$packaging_details=stripslashes($packaging_details);

$shipment=stripslashes($shipment);

$contract_period=stripslashes($contract_period);

$terms_and_policy=stripslashes($terms_and_policy);

$warranty_period=stripslashes($warranty_period);

$garranty_period=stripslashes($garranty_period);

$prod_no=stripslashes($prod_no);



$keyword1=stripslashes($keyword1);

$keyword2=stripslashes($keyword2);

$keyword3=stripslashes($keyword3);

$keyword4=stripslashes($keyword4);

$max_supply_quantity=stripslashes($max_supply_quantity);

//$max_supply_quantity=$com_obj->get_price($max_supply_quantity1);

$max_quan_type=stripslashes($max_sup_unit);

$supply_duration=stripslashes($supply_duration);

$photo1=stripslashes($photo1);

$photo2=stripslashes($photo2);

$photo3=stripslashes($photo3);

$photo4=stripslashes($photo4);

$photo5=stripslashes($photo5);

$brochure=stripslashes($brochure);



$productgroup = "<option value=''>- - Select- -</option>";

$DropDownQry = "select * from grouplist where status='0' order by groupname asc";

$productgroup .= $drop->get_dropdown($db,$DropDownQry,$prod_group);



$productcategory = "<option value=''>- - Select- -</option>";

$DropDownQry = "select id,category_name from category where parent_id='0' and dis_status='1' order by category_name asc";

$productcategory .= $drop->get_dropdown($db,$DropDownQry,$prod_category);



$subcategory = "<option value=''>- - Select- -</option>";

$DropDownQry = "select id,category_name from category where parent_id='".$prod_category."' and dis_status='1' group by category_name asc";

$subcategory .= $drop->get_dropdown($db,$DropDownQry,$prod_subcategory);



$pro_subcategory2 = "<option value=''>- - Select- -</option>";

$DropDownQry = "select id,cat_name from sub_category where sub_cat_id='".$prod_subcategory."' and active_status='1' group by cat_name asc";

$pro_subcategory2 .= $drop->get_dropdown($db,$DropDownQry,$subcategory2);



$user_list = "<option value=''>- - Select- -</option>";

$DropDownQry = "select id,CONCAT(fname,' ',lname) from register where active_status='1' order by id asc";

$user_list .= $drop->get_dropdown($db,$DropDownQry,$userid);



$currency_code = "<option value=''>- - Select- -</option>";

$DropDownQry = "select id,currencycode from currency_code order by countryname asc";

$currency_code .= $drop->get_dropdown($db,$DropDownQry,$prod_currency_loc);



if($act == "ps")

$Message = "<b><font color='red'>adfd</font></b>";

?>

<div class="boxed">

    <!--CONTENT CONTAINER-->

    <!--===================================================-->

    <div id="content-container">

        <? include "header_nav.php"; ?>

        <div class="pageheader">

            <h3><i class="fa fa-users"></i>Product </h3>

            <div class="breadcrumb-wrapper">

                <span class="label">You are here:</span>

                <ol class="breadcrumb">

                    <li> <a href="welcome.php"> Home </a> </li>

                    <li class="active"> Product </li>

                </ol>

            </div>

        </div>

        <!--Page content-->

        <!--===================================================-->

        <div id="page-content">

            <div class="row">

                <div class="col-md-12">

                    <section class="panel">

                        <div class="panel-heading">
                            <a class= "btn btn-info" onclick="history.go(-1);">Back </a>

                            <h3 class="panel-title">Product <?echo $Message;?></h3>


                        </div>

                        <div class="panel-body">

                            <!-- START Form Wizard -->

                            <form class="form-horizontal form-bordered form-wizard" action="proupdate.php" id="wizard-validate" method="post" enctype="multipart/form-data">

                                <!-- Wizard Container 1 -->

                                <div class="wizard-title"> Choose Category </div>

                                <div class="wizard-container">

                                    <div class="form-group">

                                        <div class="col-md-12">

                                            <h5 class="semibold text-primary">

                                                <i class="fa fa-sign-in"></i> Category

                                            </h5>

                                            <p class="text-muted"> Select Category</p>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label"> Select a Group" </label>

                                        <div class="col-sm-6">

                                            <select name="prod_group" id="prod_group" class="form-control" value="<? echo $product_group; ?>" Onchange="return categ(this.value);" >

                                                <? echo $productgroup;?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label"> Select Category : <span class="text-danger">*</span></label>

                                        <div class="col-sm-6" id="cat1">



                                            <select name="prod_category" id="prod_category" class="form-control" value="<? echo $prod_category; ?>" Onchange="return setSubcat(this.value);"data-parsley-group="order" data-parsley-required>

                                                <? echo $productcategory;?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label"> Select Sub Category : <span class="text-danger">*</span></label>

                                        <div class="col-sm-6" id="cat2">

                                            <select name="prod_subcategory" id="prod_subcategory" class="form-control" value="<? echo $prod_subcategory; ?>" data-parsley-group="order" data-parsley-required onchange="setSubcat2(this.value);">

                                                <? echo $subcategory;?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label"> Select Second Level Sub Category : <span class="text-danger">*</span></label>

                                        <div class="col-sm-6" id="cat3">

                                            <select name="subcategory2" id="subcategory2" class="form-control" value="<? echo $subcategory2; ?>" data-parsley-group="order" data-parsley-required>

                                                <? echo $pro_subcategory2;?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-2 control-label"> Select a User :<span class="text-danger">*</span> </label>

                                        <div class="col-sm-6" id="cat">

                                            <select name="userid" id="userid" class="form-control" value="<? echo $userid; ?>" data-parsley-group="order" data-parsley-required>

                                                <? echo $user_list;?>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <!--/ Wizard Container 1 -->

                                <!-- Wizard Container 2 -->

                                <div class="wizard-title"> Order Details </div>

                                <div class="wizard-container">

                                    <div class="form-group">

                                        <div class="col-md-12">

                                            <h5 class="semibold text-primary">

                                                <i class="fa fa-user"></i> Order And Payment

                                            </h5>

                                            <p class="text-muted"> Price and Order Details </p>

                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="row">

                                            <!--<div class="col-md-3">

                                                 <label>Currency Locale: <span class="text-danger">*</span> </label>

                                                                                                             <select name="prod_currency_loc" id="prod_currency_loc" class="form-control" value="<? echo $prod_currency_loc; ?>" data-parsley-group="information" data-parsley-required><? echo $currency_code;?></select>

                                             </div>-->

                                            <div class="col-md-3">

                                                <label>Unit Price:<span class="text-danger">*</span></label>


                                                <input type="text" pattern="^[1-9][0-9]{0,7}" name="unit_price" id="unit_price" class="form-control" value="<? echo $unit_price; ?>" data-parsley-type="number" data-parsley-group="information" data-parsley-required/>

                                            </div>

                                            <div class="col-md-3">

                                                <label>Unit:<span class="text-danger">*</span></label>

                                                <select name="unitp_quan_type" class="form-control" data-parsley-group="information" data-parsley-required>

                                                    <option value="">Select Unit</option>

                                                    <?echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$unitp_quan_type);?> </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-3">

                                                <label>Maximum Price:<span class="text-danger">*</span></label>

                                                <input type="text" pattern="^[1-9][0-9]{0,7}" name="prod_maxprice" id="prod_maxprice" class="form-control" value="<? echo $prod_maxprice ; ?>"  data-parsley-type="number"data-parsley-group="information" data-parsley-required/>

                                            </div>

                                            <!--<div class="col-md-3">

<label>Minimum Bidding Price:<span class="text-danger">*</span></label>

<input type="text" name="prod_minprice" id="prod_minprice" class="form-control" value="<? echo $prod_minprice; ?>"  data-parsley-type="number"data-parsley-group="information" data-parsley-required/>

</div>-->

                                            <div class="col-md-2">

                                                <label>Is Price Negotiable?:<span class="text-danger">*</span></label>

                                                <div class="radio">

                                                    <label class="form-icon active">

                                                        <input name="price_negotiable" type="radio" value="yes" <? if($price_negotiable=="yes") echo "checked";?> data-parsley-group="information" data-parsley-required>Yes &nbsp;&nbsp;</label>

                                                    <label class="form-icon">

                                                        <input name="price_negotiable" type="radio" value="no" <? if($price_negotiable=="no") echo "checked";?>>No &nbsp;&nbsp;</label>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <label>Type or Status:<span class="text-danger">*</span></label>

                                                <div class="radio">

                                                    <?$type_or_stat = $db->get_all_asso("select id,name from payment_methods where active_status='1'");

                                                    $pays=explode(',',$type_or_status);

                                                    foreach($PS_Type as $key=>$type_or_st){

                                                    if(in_array($type_or_st,$pays))

                                                    $ch='checked';

                                                    else

                                                    $ch='';  

                                                    ?>

                                                    <label class="form-icon"><input  data-parsley-group="information" data-parsley-required="" type="checkbox" name="type_or_status[]" value='<?echo $type_or_st;?>' <? echo $ch; ?>> <?echo $type_or_st;?> </label>

                                                    <? } ?>

                                                </div>

                                                <!--<div class="radio">

                                                            <?  foreach ($type_or_stat as $key=>$type){

                                                     if(in_array($payment_type['id'],$pays))

                                                                                    $ch="selected";

                                                            else

                                                            $ch="";?>

                                                  <label class="form-icon">

                                       <input name="type_or_status" type="checkbox" value="<? echo $key; ?>" <?echo $ch;?>><? echo $type; ?> &nbsp;&nbsp;</label>

                                            <? } ?>

                                                  </div>-->
                                            </div>

                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-8">

                                                <label>Payment Type:<span class="text-danger">*</span></label>

                                                <div class="radio">

                                                    <? $pmethods = $db->get_all_asso("select id,name from payment_methods where active_status='1'");

                                                    $pays=explode(',',$payment_type);

                                                    foreach($pmethods as $key=>$payment_type){

                                                    if(in_array($payment_type['name'],$pays))

                                                    $ch='checked';

                                                    else

                                                    $ch='';  

                                                    ?>

                                                    <label class="form-icon"><input data-parsley-group="information" data-parsley-required="" type="checkbox" name="payment_type[]" value='<?echo $payment_type['id'];?>' id="payment_type"<?echo $key;?>" <? echo $ch; ?>> <?echo $payment_type['name'];?> </label>

                                                    <? } ?>

                                                </div>

                                            </div>

                                            <div class="col-md-2">

                                                <label>Current Unit:</label>

                                                <input type="text"  pattern="^[1-9][0-9]{0,7}" name="prod_size" id="prod_size" class="form-control" data-parsley-type="number" data-parsley-group="information" value="<? echo $prod_size; ?>"/>

                                            </div>

                                            <div class="col-md-2">

                                                <label>&nbsp;</label>
                                                <label>Unit:</label>
                                                <select name="size_quan_type" class="form-control">

                                                    <option value="">Select Unit</option>

                                                    <?echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$size_quan_type);?> </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-3">

                                                <label>Minimum Order Quantity:<span class="text-danger">*</span></label>

                                                <input type="text" pattern="^[1-9][0-9]{0,7}" name="prod_minquantity" id="prod_minquantity" class="form-control" value="<? echo $prod_minquantity; ?>"  data-parsley-type="number"data-parsley-group="information" data-parsley-required/>

                                            </div>

                                            <div class="col-md-3">

                                                <label>Units: <span class="text-danger">*</span> </label>

                                                <select name="min_quan_type" class="form-control" data-parsley-group="information" data-parsley-required>

                                                    <option value="">Select Unit</option>

                                                    <?echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$min_quan_type);?> </select>

                                            </div>

                                            <div class="col-md-6">

                                                <label>Time to Expire:</label>

                                                <input name="prod_expdate"  type="date" class="form-control" value="<? echo $prod_expdate; ?>" data-parsley-group="information" data-parsley-required/>

                                            </div>

                                        </div>

                                    </div>





                                </div>

                                <!--/ Wizard Container 2 -->

                                <!-- Wizard Container 3 -->

                                <div class="wizard-title"> Product Images </div>

                                <div class="wizard-container">

                                    <div class="form-group">

                                        <div class="col-md-12">

                                            <h5 class="semibold text-primary">

                                                <i class="fa fa-book"></i> Product Images

                                            </h5>

                                            <p class="text-muted"> Add Product Image and Brochure </p>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <label>Upload product Image:<span class="text-danger">*</span></label>

                                                <div class="upload-section">

                                                    <label class="upload-image" for="upload-image-one" style="width:40%">

                                                        <input type="file" id="upload-image-one" name="photo1" accept="image/*" multiple onchange="img_validate('upload-image-one', 1000, 600, 5, 3, 'img_div');" <? if(($photo1=="" && $upd==2)||($upd==1)){?>data-parsley-group="payment" data-parsley-required="" <? }elseif(($photo1=="" && $upd=="")){?>data-parsley-group="payment" data-parsley-required=""<? }

                                                               ?>/>

                                                    </label>								

                                                </div>

                                                <img src="../uploads/product/1000x600/<?echo $photo1;?>" id="img_div" width="100" height="80" <?if($photo1==''){?>style='display:none;'<?}?>>



                                            </div>

                                            <div class="col-md-6">

                                                <label>&nbsp;</label>

                                                <div class="upload-section">

                                                    <label class="upload-image" for="upload-image-two" style="width:40%">

                                                        <input type="file" id="upload-image-two" name="photo2" accept="image/*" multiple onchange="img_validate('upload-image-two', 1000, 600, 5, 3, 'img_div2');" <? if(($photo2=="" && $upd==2)||($upd==1)){?>data-parsley-group="payment" data-parsley-required="" <? }elseif(($photo2=="" && $upd=="")){?>data-parsley-group="payment" data-parsley-required=""<? }

                                                               ?>/>


                                                    </label>										

                                                </div>

                                                <img src="../uploads/product/1000x600/<?echo $photo2;?>" id="img_div2" width="100" height="80" <?if($photo2==''){?>style='display:none;'<?}?>>



                                            </div>

                                            <div class="col-md-6">

                                                <label>&nbsp;</label>

                                                <div class="upload-section">

                                                    <label class="upload-image" for="upload-image-three" style="width:40%">

                                                        <input type="file" id="upload-image-three" name="photo3" accept="image/*" multiple onchange="img_validate('upload-image-three', 1000, 600, 5, 3, 'img_div3');" <? if(($photo3=="" && $upd==2)||($upd==1)){?>data-parsley-group="payment" data-parsley-required="" <? }elseif(($photo3=="" && $upd=="")){?>data-parsley-group="payment" data-parsley-required=""<? }

                                                               ?>/>


                                                    </label>		 								

                                                </div>

                                                <img src="../uploads/product/1000x600/<?echo $photo3;?>" id="img_div3" width="100" height="80" <?if($photo3==''){?>style='display:none;'<?}?>>



                                            </div>

                                            <div class="col-md-6">

                                                <label>&nbsp;</label>

                                                <div class="upload-section">

                                                    <label class="upload-image" for="upload-image-four" style="width:40%">

                                                        <input type="file" id="upload-image-four" name="photo4" accept="image/*" multiple onchange="img_validate('upload-image-four', 1000, 600, 5, 3, 'img_div4');" <? if(($photo4=="" && $upd==2)||($upd==1)){?>data-parsley-group="payment" data-parsley-required="" <? }elseif(($photo4=="" && $upd=="")){?>data-parsley-group="payment" data-parsley-required=""<? }

                                                               ?>/>


                                                    </label>										

                                                </div>

                                                <img src="../uploads/product/1000x600/<?echo $photo4;?>" id="img_div4" width="100" height="80" <?if($photo4==''){?>style='display:none;'<?}?>>



                                            </div>



                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <label>&nbsp;</label>

                                                <div class="upload-section">
                                                     <label>Upload product Group Image:<span class="text-danger">*</span></label>

                                                    <label class="upload-image" for="upload-image-five" style="width:40%">

                                                        <input type="file" id="upload-image-five" name="photo5" accept="image/*" multiple onchange="img_validate('upload-image-five', 1000, 600, 5, 3, 'img_div5');"/>

                                                    </label>										

                                                </div>

                                                <img src="../uploads/product/1000x600/<?echo $photo5;?>" id="img_div5" width="100" height="80" <?if($photo5==''){?>style='display:none;'<?}?>>



                                            </div>

                                            <div class="col-md-9">

                                                <label>Video Embed Code:</label>

                                                <textarea name="video_embed_code" id="video_embed_code" class="form-control" class="form-control"><? echo $video_embed_code; ?></textarea>

                                                <input type="hidden" name="upd" id="upd" value="<?php echo $upd; ?>">

                                                <input type="hidden" name="upd" id="upd" value="<?php echo $upd; ?>">

                                            </div>

                                        </div>

                                    </div>

<!--                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <label>Product Brochure:<span class="text-danger">*</span></label>

                                                <input type="file" name="brochure" <? if(($brochure=="" && $upd==2)||($upd==1)){?>data-parsley-group="payment" data-parsley-required="" <? }elseif(($brochure=="" && $upd=="")){?>data-parsley-group="payment" data-parsley-required=""<? }

                                                       ?>/>


                                            </div>

                                        </div>

                                    </div>-->
                                    
                                    
                                    <!--<div class="row">

                                            <div class="col-md-12">

                                                <label>Product Group Description: <span class="text-danger">*</span> </label>

                                                <textarea minlength="50" maxlength="900" name="prod_gdes"  id="prod_gdes" class="form-control" ><? echo $prod_gdes; ?></textarea>

                                            </div>

                                        </div>-->
                                    
                                    

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <label>Other Related Items: </label>

                                                <textarea name="other_relateditems" id="other_relateditems" class="form-control" ><? echo $other_relateditems; ?></textarea>

                                                   

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <label>Color:</label>

                                                <input maxlength="30" type="text" name="color" id="color" class="form-control" value="<? echo $color; ?>">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!--/ Wizard Container 3 -->

                                <!-- Wizard Container 4 -->

                                <div class="wizard-title"> Product Info </div>

                                <div class="wizard-container">

                                    <div class="form-group">

                                        <div class="col-md-12">

                                            <h5 class="semibold text-primary">

                                                <i class="fa fa-cog"></i> Product Information

                                            </h5>

                                            <p class="text-muted"> Add Product Information</p>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">


                                            <div class="col-md-6">

                                                <label> Product Group Name :<span class="text-danger">*</span></label>

                                                <input type="text" pattern="[a-z|A-z|0-9|\s]{1,40}" name="prod_group_name" id="prod_group_name" value="<? echo $prod_group_name; ?>" class="form-control" data-parsley-group="experience" data-parsley-required/>

                                            </div>




                                            <div class="col-md-6">

                                                <label> Product Name :<span class="text-danger">*</span></label>
                                                <input type="text" pattern="[a-z|A-z|0-9|\s]{1,40}" name="prod_name" id="prod_name" value="<? echo $prod_name; ?>" class="form-control" data-parsley-group="experience" data-parsley-required/>
                                            </div>
                                            <div class="col-md-6">
                                                <label> Product No :<span class="text-danger">*</span></label>

                                                <input type="text" pattern="^(0?[1-9]|[1-9][0-9])$" name="prod_no" id="prod_no" value="<? echo $prod_no; ?>" class="form-control" data-parsley-type="number" data-parsley-group="experience" data-parsley-required/>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="radio">



                                                    <label class="form-icon active radio-inline">Ready to publish</label><br>

                                                    <input type="radio" name="prod_status" value="1" <? if($prod_status=="1") echo "checked"; ?>/>Yes

                                                           </label>

                                                    <label class="form-icon">

                                                        <input type="radio" name="prod_status" value="0" checked/>No&nbsp;&nbsp;</label>

                                                </div>




                                                <div class="radio"> 



                                                    <label class="form-icon active radio-inline">Save as featured</label><br>

                                                    <input type="radio" name="featured" value="1" <? if($featured=="1") echo "checked"; ?>/>Yes

                                                           </label>

                                                    <label class="form-icon">

                                                        <input type="radio" name="featured" value="0" checked/>No&nbsp;&nbsp;</label>

                                                </div>


                                            </div>



                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <label>Keywords:<span class="text-danger">*</span></label>

                                                <input type="input" name="keyword1" class="form-control" value="<? echo $keyword1; ?>"data-parsley-group="experience" data-parsley-required/>



                                            </div>

                                           <!-- <div class="col-md-3">

                                                <label>&nbsp;</label>

                                                <input type="input" pattern="[a-z|A-z|0-9|\s]{1,40}" name="keyword2" class="form-control" value="<? echo $keyword2; ?>"data-parsley-group="experience" data-parsley-required/>



                                            </div>

                                            <div class="col-md-3">

                                                <label>&nbsp;</label>

                                                <input type="input" pattern="[a-z|A-z|0-9|\s]{1,40}" name="keyword3" class="form-control" value="<? echo $keyword3; ?>"data-parsley-group="experience" data-parsley-required/>



                                            </div>

                                            <div class="col-md-3">

                                                <label>&nbsp;</label>

                                                <input type="input" pattern="[a-z|A-z|0-9|\s]{1,40}" name="keyword4" class="form-control" value="<? echo $keyword4; ?>"data-parsley-group="experience" data-parsley-required/>



                                            </div>-->



                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-12">

                                                <label>Product Group Description: </label>

                                                <textarea minlength="50" maxlength="900" name="prod_gdes"  id="prod_gdes" class="form-control" ><? echo $prod_gdes; ?></textarea>

                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-sm-12">

                                                <label> Product Brief Description :<span class="text-danger">*</span> </label>

                                                <textarea  minlength="50"  maxlength="900"  name="prod_briefdes" id="prod_briefdes" class="form-control" data-parsley-group="experience" data-parsley-required/><? echo $prod_briefdes; ?></textarea> 

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">



                                        <div class="row">

                                            <div class="col-md-12">

                                                <label>Product Detailed Description: <span class="text-danger">*</span> </label>

                                                <textarea minlength="50" maxlength="6000"   name="prod_detaildes" id="prod_detaildes" class="form-control" data-parsley-group="experience" data-parsley-required><? echo $prod_detaildes; ?></textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-3">

                                                <label>Place of Origin: </label>

                                                <input maxlength="30" name="place_of_origin" id="place_of_origin" class="form-control" value="<? echo $place_of_origin; ?>">

                                            </div>

                                            <div class="col-md-3">

                                                <label>Specifications: </label>

                                                <input   name="specifications" pattern="[a-z|A-z|0-9|\s]{1,30}" id="specifications" class="form-control" value="<? echo $specifications; ?>">

                                            </div>

                                            <div class="col-md-3">

                                                <label>Certificates: </label>

                                                <input maxlength="30" name="certificates" id="certificates" class="form-control" value="<? echo $certificates; ?>">

                                            </div>

                                            <div class="col-md-3">

                                                <label>Brand Name: </label>

                                                <input maxlength="30"   name="brand_name" id="brand_name" class="form-control" value="<? echo $brand_name; ?>">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-3">

                                                <label>Materials / Ingredients: </label>

                                                <input maxlength="30"  name="materials" id="materials" class="form-control" value="<? echo $materials; ?>">

                                            </div>

                                            <div class="col-md-3">

                                                <label>HS CODE: </label>

                                                <input  name="hs_code"    pattern="^[1-9][0-9]{0,9}" id="hs_code" class="form-control" value="<? echo $hs_code; ?>" >

                                            </div>

                                            <div class="col-md-3">

                                                <label>Model/Article Number: </label>

                                                <input name="mode_article_num"  maxlength="30" pattern="[a-z|A-z|0-9|\s]{1,30}" title="invalid" id="mode_article_num" class="form-control" value="<? echo $mode_article_num; ?>">

                                            </div>

                                            <div class="col-md-3">

                                                <label>Business Type: </label>

                                                <input name="manufacturers" maxlength="30" id="manufacturers" class="form-control" value="<? echo $manufacturers; ?>">

                                            </div>

                                        </div>

                                    </div>



                                </div>

                                <div class="wizard-title"> Packaging Details </div>

                                <div class="wizard-container">

                                    <div class="form-group">

                                        <div class="col-md-12">

                                            <h5 class="semibold text-primary">

                                                <i class="fa fa-cog"></i> Packaging and Shipping

                                            </h5>

                                            <p class="text-muted"> Packaging and Shipping Details</p>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">


                                            <div class="col-md-3">
                                                <label>Production Capacity:<span class="text-danger">*</span></label>

                                                <input type="text"   pattern="^[1-9][0-9]{0,9}"name="max_supply_quantity" id="max_supply_quantity" class="form-control" value="<? echo $max_supply_quantity; ?>"data-parsley-type="number" data-parsley-group="other" data-parsley-required/>

                                            </div>



                                            <div class="col-md-3">

                                                <label>&nbsp;</label>
                                                <label>Unit:<span class="text-danger">*</span></label>
                                                <select name="max_quan_type" class="form-control" data-parsley-group="other" data-parsley-required>

                                                    <option value="">Select Unit</option>

                                                    <?echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$max_quan_type);?> </select>

                                            </div>

                                            <div class="col-md-3">

                                                <label>&nbsp;</label>
                                                <label>Expected Delievery:<span class="text-danger">*</span></label>

                                                <select name="supply_duration" id="supply_duration" class="form-control" data-parsley-group="other" data-parsley-required>

                                                    <option value="">Select</option>

                                                    <?echo $drop->get_dropdown($db,"select time,time from units where time is NOT NULL",$supply_duration);?> 

                                                </select>

                                            </div>



                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <label>Shipping Terms:</label>

                                                <div class="radio">

                                                    <?  $ch="";

                                                    foreach($PSH_Terms as $SH_Term){

                                                    if($shipping_terms==strtolower($SH_Term))

                                                    $ch="checked";	

                                                    else	

                                                    $ch="";?>

                                                    <label class="form-icon">

                                                        <input type="radio"  name="shipping_terms" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?>> <?echo strtoupper($SH_Term);?> </label>

                                                    <? } ?>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <label>Packaging Details: </label>


                                                <textarea maxlength="30" name="packaging_details" id="packaging_details" class="form-control" /><? echo $packaging_details; ?></textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <label>Shipment: </label>

                                                <input name="shipment" maxlength="30" id="shipment" class="form-control" value="<? echo $shipment; ?>"/>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-12">

                                            <h5 class="semibold text-primary">

                                                <i class="fa fa-cog"></i> More Details

                                            </h5>

                                            <p class="text-muted"> More Details</p>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <label>Contract Period: </label>

                                                <input maxlength="30" name="contract_period" id="contract_period" class="form-control" value="<? echo $contract_period; ?>"/>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <label>Terms and Policy: </label>

                                                <textarea maxlength="5000" name="terms_and_policy" id="terms_and_policy" class="form-control" /><? echo $terms_and_policy; ?></textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <label>Warranty Period: </label>

                                                <input  name="warranty_period" maxlength="30" id="warranty_period" class="form-control" value="<? echo $warranty_period; ?>"/>

                                            </div>

                                            <div class="col-md-6">

                                                <label>Guarantee Period: </label>

                                                <input name="garranty_period" maxlength="30" id="garranty_period" class="form-control" value="<? echo $garranty_period; ?>"/>

                                            </div>

                                            <div>



                                                <input type="hidden" name="prosubmit" id="prosubmit" value="prosubmit"/>

                                                <input type="hidden" name="id" value="<? echo $id; ?>"/>

                                            </div>

                                        </div>

                                    </div>



                                </div>

                                <!-- Wizard Container 4 -->

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

<script src="plugins/parsley/parsley.min.js"></script>

<!--Jquery Steps [ OPTIONAL ]-->



<script>

                                                                                                                            function categ(val) {

                                                                                                                                //alert(val);

                                                                                                                                $.ajax({url: "cat_ajax.php?val=" + val, success: function (result) {

                                                                                                                                        $("#cat1").html(result);

                                                                                                                                    }});

                                                                                                                            }

                                                                                                                            function setSubcat(val1) {

                                                                                                                                //alert(val1);

                                                                                                                                $.ajax({url: "field_ajax.php?val=" + val1, success: function (result) {

                                                                                                                                        $("#cat2").html(result);

                                                                                                                                    }});

                                                                                                                            }

                                                                                                                            function setSubcat2(val) {

                                                                                                                                //alert(val);

                                                                                                                                $.ajax({url: "subcat_ajax.php?val=" + val, success: function (result) {

                                                                                                                                        $("#cat3").html(result);

                                                                                                                                    }});

                                                                                                                            }

</script>	
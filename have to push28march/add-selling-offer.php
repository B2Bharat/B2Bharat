<?php
include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
include "include/selleronly.php";
include "include/checkCompany.php";

$uinfo = $db->singlerec("select * from register where id='$user_id'");
$acn = isset($acn) ? $acn : '';
$msg = "";
if ($acn == 'addsuc') {
    $msg = "<h4 style='color:limegreen'>Successfully Added..!!!</h4>";
} else if ($acn == 'upd') {
    $slid = isset($slid) ? $com_obj->decid(addslashes($slid)) : '0';
    $_SESSION['SL_id'] = $slid;
    $sl_info = $db->singlerec("select * from selling_leads where id ='$slid'");
} else {
    $_SESSION['SL_id'] = '';
    $userid = $user_id;
    include "include/checkPlanstatus.php";   //check plan status

    if ($sBal < 1 && $sBal != 'unlimited') {
        echo "<script>swal('Limit reached!','As per your membership plan, your Add-selling leads limit as been reached, Kindly upgrade your plan!','warning');</script>";
        echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";
        include "footer.php";
        exit;
    }
    if ((int) $transSts === 0) {
        echo "<script>swal('Membership expired!','Kindly upgrade your membership plan!','warning');</script>";
        echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";
        include "footer.php";
        exit;
    }
    if ($balancedays_con < 0) {
        echo "<script>swal('Membership expired!','Kindly upgrade your membership plan!','warning');</script>";
        echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";
        include "footer.php";
        exit;
    }
}
include "add_SL.php";
?>
<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
<style>
    .fa{     font-size: 1.5em;}
    .wizard .nav-tabs > li {    width: 32.9%;}
    .slider input {    display: inline-block;    margin-bottom: 15px;}
    .new-header-top{background: rgba(66, 64, 64, 0.67) !important;}
    a.new-nav-link{color:#FFF !important; font-size:12px !important; padding:5px 12px !important;}
    .nav-tabs>li {
        float: left;
        margin-bottom: -1px;
        background-color: #e3e3e3;
    }
    .green-icon{ color:#00a651;}
    .glyphicon {
        margin-right: 10px;
    }
    .section {
        background-color: #fff;
        border-radius: 4px;
        padding: 15px 25px;
        margin-bottom: 0px;
    }
    .adpost-details .agreement label {
        line-height: 28px;
        padding-top: 6px;
        color: #494949;
        margin-bottom: 0px; 
    }
</style>


<div class="container-fulid pdt25" style="background-color:#f5f5f5;">
    <div class="container continr-bg">
<?php include "include/profile-left.php"; ?> 
        <div class="col-sm-9 col-md-9">
            <div class="adpost-details">
                <div class="well">
                    <center><?echo $msg;?></center>
                    <div class="section slider">
                        <div class="row" style="    margin-top: -50px;">
                            <div class="wizard">
                                <div class="wizard-inner">
                                    <!-- <div class="connecting-line"></div> -->
                                    <ul class="nav nav-tabs" role="tablist">

                                        <li role="presentation" class="text-center  active" id="ch1">
                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1" aria-expanded="false">
                                                <span class="round-tab">
                                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                            <p class="register-info">Requirement Details</p>
                                        </li>

                                        <li role="presentation" class="disabled text-center" id="ch2">
                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" aria-expanded="false">
                                                <span class="round-tab">
                                                    <i class="fa fa-magic" aria-hidden="true"></i>
                                                </span>							
                                            </a>
                                            <p class="register-info">Order  Details</p>
                                        </li>


                                        <li role="presentation" class="disabled text-center" id="ch3">
                                            <a href="#step3" data-toggle="tab" aria-controls="Complete" role="tab" title="Complete" aria-expanded="true">
                                                <span class="round-tab">
                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                            <p class="register-info">Additional Details </p>
                                        </li>



                                    </ul>
                                </div>

                                <form role="form" action="#" method="POST" enctype="multipart/form-data">
                                    <div class="tab-content well">
                                        <div class="tab-pane active" role="tabpanel" id="step1">
                                            <div class="row pd15">
                                                <h4>Fill Your Requirement</h4>


                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Enter Product Or Service(selling) Name<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_off_name" class="form-control" id="SL_off_name" placeholder=""  value="<?echo isset($sl_info['offer_name'])?$sl_info['offer_name']:'';?>" >
                                                    </div>
                                                </div>

                                                <div class="row form-group model-name">
                                                    <label class="col-sm-3 label-title">Select A Category<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="SL_cat" id="maincat" onchange="setSubcat(this.value);" >
                                                            <option value="">select</option>
                                                            <?php
                                                            $SL_cat = isset($sl_info['cat_id']) ? $sl_info['cat_id'] : '0';
                                                            echo $drop->get_dropdown($db, "select id,category_name from category where dis_status='1' AND parent_id='0' group by category_name", $SL_cat);
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php
                                                //$SL_cat_sub = isset($sl_info['sub_cat_id'])?$sl_info['sub_cat_id']:'';
                                                //if($SL_cat_sub!=''){$dstl='block';}else{$dstl='none';}
                                                ?>
                                                <!--						  <div class="row form-group model-name" id="subcatdiv">
                                                                            <label class="col-sm-3 label-title">Select Subcategory<span class="required">*</span></label>
                                                                            <div class="col-sm-9">
                                                                              <select class="form-control" name="SL_cat_sub" id="subcat" onchange="setSubcat2(this.value);">
<?php //echo $drop->get_dropdown($db,"select id,category_name from category where dis_status='1' AND parent_id='$SL_cat'",$SL_cat_sub); ?>
                                                                              </select>
                                                                            </div>
                                                                          </div>-->
<?php //$subcategory2 = isset($subcategory2)?$subcategory2:''; ?>
                                                <!--						   <div class="row form-group model-name">
                                                                            <label class="col-sm-3 label-title">Second Level Sub Category<span class="required">*</span></label>
                                                                            <div class="col-sm-9">
                                                                              <select class="form-control" name="subcategory2" id="subcategory2" >
<?php //echo $drop->get_dropdown($db,"select id,cat_name from sub_category where active_status='1' group by cat_name asc",$subcategory2); ?>
                                                                              </select>
                                                                            </div>
                                                                          </div>-->


                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Order Expiry Date<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group input-group-sm">
                                                            <input type="text" id="SL_ex_date" name="SL_ex_date" class="form-control" value="<?echo isset($sl_info['valid_until'])?$sl_info['valid_until']:'';?>" style="font-size: 14px;height: 40px;"/>
                                                            <span class="input-group-addon">
                                                                <i class="ace-icon fa fa-calendar"></i>
                                                            </span>
                                                        </div>							
                      <!--<input type="date" name="SL_ex_date" class="form-control" id="SL_ex_date" placeholder="" value="<?echo isset($sl_info['valid_until'])?$sl_info['valid_until']:'';?>" >-->
                                                    </div>
                                                </div>

                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Keywords<span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-md-6">
                                                            <input type="text" name="SL_key1" class="form-control" id="SL_key1" placeholder="" value="<?echo isset($sl_info['keyword1'])?$sl_info['keyword1']:'';?>" >
                                                            <input type="text" name="SL_key2" class="form-control" id="SL_key2" placeholder="" value="<?echo isset($sl_info['keyword2'])?$sl_info['keyword2']:'';?>" >
                                                        </div>

                                                        <div class="col-md-6">
                                                            <input type="text" name="SL_key3" class="form-control" id="SL_key3" placeholder="" value="<?echo isset($sl_info['keyword3'])?$sl_info['keyword3']:'';?>" >
                                                            <input type="text" name="SL_key4" class="form-control" id="SL_key4" placeholder="" value="<?echo isset($sl_info['keyword4'])?$sl_info['keyword4']:'';?>" >
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="row form-group add-image">
                                                    <label class="col-sm-3 label-title">Upload Product image(1) <small style="color:red"> (image should be 1000x600)</small></label>
                                                    <div class="col-sm-9">
                                                        <div class="col-xs-6">
                                                            <div class="upload-section">
                                                                <label class="upload-image" for="upload-image-one" style="width:40%">
                                                                    <input type="file" id="upload-image-one" name="SL_product_img" accept="image/*" onchange="img_validate('upload-image-one', 1000, 600, 5, 3, 'img_div');"/>
                                                                </label>										
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 row">
                                                            <?$SL_img = isset($sl_info['photo1'])?$sl_info['photo1']:'';?>
                                                            <img src="uploads/SL_images/banner1/<?echo $SL_img;?>" id="img_div" width="100" height="80" <?if($SL_img==''){?>style='display:none;'<?}?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--                                                <div class="row form-group add-image">
                                                    <label class="col-sm-3 label-title">Upload Product image(2) <small style="color:red"> (image should be 1000x600)</small></label>
                                                    <div class="col-sm-9">
                                                        <div class="col-xs-6">
                                                            <div class="upload-section">
                                                                <label class="upload-image" for="upload-image-one2" style="width:40%">
                                                                    <input type="file" id="upload-image-one2" name="SL_product_img2" accept="image/*" onchange="img_validate('upload-image-one2', 1000, 600, 5, 3, 'img_div2');"/>
                                                                </label>										
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 row">
                                                            <?$SL_img = isset($sl_info['photo2'])?$sl_info['photo2']:'';?>
                                                            <img src="uploads/SL_images/banner2/<?echo $SL_img;?>" id="img_div2" width="100" height="80" <?if($SL_img==''){?>style='display:none;'<?}?>>
                                                        </div>
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-image">
                                                    <label class="col-sm-3 label-title">Upload Product image(3) <small style="color:red"> (image should be 1000x600)</small></label>
                                                    <div class="col-sm-9">
                                                        <div class="col-xs-6">
                                                            <div class="upload-section">
                                                                <label class="upload-image" for="upload-image-one3" style="width:40%">
                                                                    <input type="file" id="upload-image-one3" name="SL_product_img3" accept="image/*" onchange="img_validate('upload-image-one3', 1000, 600, 5, 3, 'img_div3');"/>
                                                                </label>										
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 row">
                                                            <?$SL_img = isset($sl_info['photo3'])?$sl_info['photo3']:'';?>
                                                            <img src="uploads/SL_images/banner3/<?echo $SL_img;?>" id="img_div3" width="100" height="80" <?if($SL_img==''){?>style='display:none;'<?}?>>
                                                        </div>
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-image">
                                                    <label class="col-sm-3 label-title">Upload Product image(4) <small style="color:red"> (image should be 1000x600)</small></label>
                                                    <div class="col-sm-9">
                                                        <div class="col-xs-6">
                                                            <div class="upload-section">
                                                                <label class="upload-image" for="upload-image-one4" style="width:40%">
                                                                    <input type="file" id="upload-image-one4" name="SL_product_img4" accept="image/*" onchange="img_validate('upload-image-one4', 1000, 600, 5, 3, 'img_div4');"/>
                                                                </label>										
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 row">
                                                            <?$SL_img = isset($sl_info['photo4'])?$sl_info['photo4']:'';?>
                                                            <img src="uploads/SL_images/banner4/<?echo $SL_img;?>" id="img_div4" width="100" height="80" <?if($SL_img==''){?>style='display:none;'<?}?>>
                                                        </div>
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-image">
                                                    <label class="col-sm-3 label-title">Upload Product image(5) <small style="color:red"> (image should be 1000x600)</small></label>
                                                    <div class="col-sm-9">
                                                        <div class="col-xs-6">
                                                            <div class="upload-section">
                                                                <label class="upload-image" for="upload-image-one5" style="width:40%">
                                                                    <input type="file" id="upload-image-one5" name="SL_product_img5" accept="image/*" onchange="img_validate('upload-image-one5', 1000, 600, 5, 3, 'img_div5');"/>
                                                                </label>										
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 row">
                                                            <?$SL_img = isset($sl_info['photo5'])?$sl_info['photo5']:'';?>
                                                            <img src="uploads/SL_images/banner5/<?echo $SL_img;?>" id="img_div5" width="100" height="80" <?if($SL_img==''){?>style='display:none;'<?}?>>
                                                        </div>
                                                    </div>
                                                </div>-->



                                                <ul class="list-inline pull-right pdt20">
                                                    <li><button type="button" class="btn view-more-btn-3" id="btn-sl1">Save and continue</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step2">
                                            <div class="row pd15">
                                              <h4>Order Details</h4>
                                              
                                              <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Base Price<span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <?
                                                                    $SL_d = isset($sl_info['base_price'])?$sl_info['base_price']:'';
                                                                    /*if(!empty($SL_d)){
                                                                    $sls = strpos($SL_d,'/');
                                                                    $SL_d_price	= substr($SL_d,0,$sls);
                                                                    $SL_d_per = strtolower(substr($SL_d,$sls+1,strlen($SL_d))); 
                                                                    }else{
                                                                    $SL_d_price='';	
                                                                    $SL_d_per='';
                                                                    }*/
                                                                    ?>
                                                                    <input type="text" name="SL_base_price" class="form-control" id="SL_base_price"  placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?echo isset($SL_d)?$SL_d:'';?>" >
                                                                    <label class="input-group-addon"> Per</label>
                                                                </div>
                                                            </div> <!-- /.form-group -->
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="SL_d_price_unit" id="SL_d_price_unit">
                                                                        <!--<?$SL_d_per = isset($sl_info['SL_d_price_unit'])?$sl_info['SL_d_price_unit']:'';?>-->
                                                                        <!--<?echo $drop->get_dropdown($db,"select quantity,quantity from units where quantity!='' AND quantity is NOT NULL",$SL_d_per);?> -->

                                                                <option value="">Select Unit</option>
                                                                <?$SL_d_per = isset($bl_info['SL_d_price_unit'])?$bl_info['SL_d_price_unit']:'';
                                                                echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$SL_d_per);
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Max Price<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_max_price" class="form-control" id="SL_max_price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?echo isset($sl_info['max_price'])?$sl_info['max_price']:'';?>" placeholder="" >
                                                    </div>
                                                </div>

                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Min orders Quantity<span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <?
                                                                    $SL_e = isset($sl_info['min_order_quantity'])?$sl_info['min_order_quantity']:'';
                                                                    /*if(!empty($SL_e)){
                                                                    $sls = strpos($SL_e,'/');
                                                                    $SL_e_price	= substr($SL_e,0,$sls);
                                                                    $SL_e_per = strtolower(substr($SL_e,$sls+1,strlen($SL_e))); 
                                                                    }else{
                                                                    $SL_e_price='';	
                                                                    $SL_e_per='';
                                                                    }*/
                                                                    ?>
                                                                    <input type="text" name="SL_quantity" id="SL_quantity" class="form-control" value="<?echo $SL_e;?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" >
                                                                </div>
                                                            </div> <!-- /.form-group -->
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="SL_quantity_unit" id="SL_quantity_unit">
                                                                       <!--<?$SL_e_per = isset($sl_info['SL_quantity_unit'])?$sl_info['SL_quantity_unit']:'';?>-->
                                                                       <!--<?echo $drop->get_dropdown($db,"select quantity,quantity from units where quantity!='' AND quantity is NOT NULL",$SL_e);?> -->

                                                                <option value="">Select Unit</option>
                                                                <?$SL_e_per = isset($bl_info['SL_quantity_unit'])?$bl_info['SL_quantity_unit']:'';
                                                                echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$SL_e_per);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Size<span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <?
                                                                    $SL_e = isset($sl_info['size'])?$sl_info['size']:'';
                                                                    /*if(!empty($SL_e)){
                                                                    $sls = strpos($SL_e,'/');
                                                                    $SL_e_price	= substr($SL_e,0,$sls);
                                                                    $SL_e_per = strtolower(substr($SL_e,$sls+1,strlen($SL_e))); 
                                                                    }else{
                                                                    $SL_e_price='';	
                                                                    $SL_e_per='';
                                                                    }*/
                                                                    ?>
                                                                    <input type="text" name="SL_size" id="SL_size" class="form-control" value="<?echo $SL_e;?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" >
                                                                </div>
                                                            </div> <!-- /.form-group -->
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="SL_size_unit" id="SL_size_unit">
                                                                       <!--<?$SL_e_per = isset($sl_info['SL_size_unit'])?$sl_info['SL_size_unit']:'';?>-->
                                                                       <!--<?echo $drop->get_dropdown($db,"select quantity,quantity from units where quantity!='' AND quantity is NOT NULL",$SL_e);?> -->

                                                                <option value="">Select Unit</option>
                                                                <?$SL_e_per = isset($bl_info['SL_size_unit'])?$bl_info['SL_size_unit']:'';
                                                                echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$SL_e_per);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Specifications</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_specs" class="form-control" id="text" value="<?echo isset($sl_info['specification'])?$sl_info['specification']:'';?>" placeholder="">
                                                    </div>
                                                </div>
                                              <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Packaging</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_pack" class="form-control" id="text" value="<?echo isset($sl_info['package'])?$sl_info['package']:'';?>" placeholder="">
                                                    </div>
                                                </div>
                                               <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Duration of Delivery <span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <?$SL_t = isset($sl_info['delivery_time'])?$sl_info['delivery_time']:'';
                                                                    /*if(!empty($SL_t)){
                                                                    $sls = strpos($SL_t,'/');
                                                                    $SL_t_price	= substr($SL_t,0,$sls);
                                                                    $SL_t_per = strtolower(substr($SL_t,$sls+1,strlen($SL_t))); 
                                                                    }else{
                                                                    $SL_t_price='';	
                                                                    $SL_t_per='';
                                                                    }*/
                                                                    ?>
                                                                    <input type="text" name="SL_deli_duration" id="SL_deli_duration" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?echo $SL_t;?>" placeholder="" >
                                                                </div>
                                                            </div> <!-- /.form-group -->
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="SL_deli_duration_unit">
                                                                <?$SL_t_per = isset($sl_info['SL_deli_duration_unit'])?$sl_info['SL_deli_duration_unit']:'';?>
                                                                <?echo $drop->get_dropdown($db,"select time,time from units where time!='' AND time is NOT NULL",$SL_t_per);?> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Shipping Details (Ports, container etc)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_ship_details" class="form-control" id="SL_ship_details" value="<?echo isset($sl_info['shipping'])?$sl_info['shipping']:'';?>" placeholder="">
                                                    </div>
                                                </div>
                                               <div class="row form-group">
                                                    <label class="col-sm-3">Accepted Delivery Terms<span class="required">*</span></label>
                                                    <div class="col-sm-9 user-type">
                                                        <?
                                                        $ch="";
                                                        $SL_sts=isset($sl_info['ship_terms'])?$sl_info['ship_terms']:'';	
                                                        foreach($PSH_Terms as $SH_Term){
                                                        if($SL_sts==strtolower($SH_Term))
                                                        $ch="checked";	
                                                        else	
                                                        $ch="";
                                                        ?>
                                                        <div class="col-sm-4">
                                                            <input type="radio" name="SL_shipping_terms" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?> > <label for="<?echo $SH_Term;?>"> <?echo strtoupper($SH_Term);?> </label>
                                                        </div>

                                                        <?}?>  
                                                    </div>
                                                </div>


                                                <div class="row form-group additional">
                                                    <label class="col-sm-3 label-title">Payment Method <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="checkbox">
                                                            <?$pmethods = $db->get_all_asso("select id,name from payment_methods where active_status='1'");
                                                            $pm=isset($sl_info['pay_method'])?($sl_info['pay_method']):'';
                                                            $pays=explode(',',$pm);
                                                            foreach($pmethods as $key=>$pm){
                                                            if(in_array($pm['id'],$pays))
                                                            $ch='checked';
                                                            else
                                                            $ch='';  
                                                            ?>
                                                            <div class="col-md-4">
                                                                <label for="pm<?echo $key;?>" class="<?echo $ch;?>"><input type="checkbox" name="SL_pmethod[]" value='<?echo $pm['id'];?>' id="pm<?echo $key;?>" <?echo $ch;?>> <?echo $pm['name'];?> </label>
                                                            </div>
                                                            <?}?>   


                                                        </div>
                                                    </div>
                                                </div>
                                              
                                              
                                                <!--                          <div class="row form-group add-title">
                                                                            <label class="col-sm-3 label-title">Name of Selling Offer<span class="required">*</span></label>
                                                                            <div class="col-sm-9">
                                                                              <input type="text" name="SL_off_name" class="form-control" id="SL_off_name" placeholder=""  value="<?echo isset($sl_info['offer_name'])?$sl_info['offer_name']:'';?>" >
                                                                            </div>
                                                                          </div>-->
                                                <!--                          <div class="row form-group add-title">
                                                                            <label class="col-sm-3 label-title">Offer remain valid until<span class="required">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                                        <div class="input-group input-group-sm">
                                                                                                                        <input type="text" id="SL_ex_date" name="SL_ex_date" class="form-control" value="<?echo isset($sl_info['valid_until'])?$sl_info['valid_until']:'';?>" style="font-size: 14px;height: 40px;"/>
                                                                                                                        <span class="input-group-addon">
                                                                                                                                <i class="ace-icon fa fa-calendar"></i>
                                                                                                                        </span>
                                                                                                                </div>							
                                                                              <input type="date" name="SL_ex_date" class="form-control" id="SL_ex_date" placeholder="" value="<?echo isset($sl_info['valid_until'])?$sl_info['valid_until']:'';?>" >
                                                                            </div>
                                                                          </div>
                                                                                                  
                                                                                                  <div class="row form-group add-title">
                                                                            <label class="col-sm-3 label-title">Keywords<span class="required">*</span></label>
                                                                            <div class="col-sm-9 row">
                                                                                                          <div class="col-md-6">
                                                                                                           <input type="text" name="SL_key1" class="form-control" id="SL_key1" placeholder="" value="<?echo isset($sl_info['keyword1'])?$sl_info['keyword1']:'';?>" >
                                                                                                           <input type="text" name="SL_key2" class="form-control" id="SL_key2" placeholder="" value="<?echo isset($sl_info['keyword2'])?$sl_info['keyword2']:'';?>" >
                                                                                                           </div>
                                                                                                           
                                                                                                           <div class="col-md-6">
                                                                                                           <input type="text" name="SL_key3" class="form-control" id="SL_key3" placeholder="" value="<?echo isset($sl_info['keyword3'])?$sl_info['keyword3']:'';?>" >
                                                                                                           <input type="text" name="SL_key4" class="form-control" id="SL_key4" placeholder="" value="<?echo isset($sl_info['keyword4'])?$sl_info['keyword4']:'';?>" >
                                                                                                           </div>
                                                                                                           
                                                                            </div>
                                                                          </div>
                                                                                                  
                                                                                                  
                                                                                                  <div class="row form-group add-image">
                                                                            <label class="col-sm-3 label-title">Upload Product image(1) <small style="color:red"> (image should be 1000x600)</small></label>
                                                                            <div class="col-sm-9">
                                                                                                                <div class="col-xs-6">
                                                                                                                        <div class="upload-section">
                                                                                                                                <label class="upload-image" for="upload-image-one" style="width:40%">
                                                                                                                                        <input type="file" id="upload-image-one" name="SL_product_img" accept="image/*" onchange="img_validate('upload-image-one',1000,600,5,3,'img_div');"/>
                                                                                                                                </label>										
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="col-xs-6 row">
                                                                                                                        <?$SL_img = isset($sl_info['photo1'])?$sl_info['photo1']:'';?>
                                                                                                                          <img src="uploads/SL_images/banner1/<?echo $SL_img;?>" id="img_div" width="100" height="80" <?if($SL_img==''){?>style='display:none;'<?}?>>
                                                                                                                </div>
                                                                            </div>
                                                                          </div>-->




                                                <!--<div class="row form-group add-title"> 
                                                        <label class="col-sm-3 label-title">Select Image <span class="required">*</span></label>
                                                        <div class="col-sm-9">
                                                                <input type="file" name="profile-image" accept="image/*" onchange="img_validate('SL_product_img',300,300);"/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <div class="col-md-12">
                                                                        <img src="" id="img_div" width="100" height="100" style='display:none;'>
                                                                </div>
                                                        </div>
                                                </div>-->


<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Brief Description<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" rows="5" name="SL_bf_desc" id="SL_bf_desc"><?echo isset($sl_info['brief_description'])?$sl_info['brief_description']:'';?></textarea>
                                                    </div>
                                                </div>-->

                                             

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Title / Subject<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_subject" class="form-control" id="SL_subject" value="<?echo isset($sl_info['subject'])?$sl_info['subject']:'';?>" placeholder="" >
                                                    </div>
                                                </div>-->


                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
                                                    <li><button type="button" class="btn view-more-btn-3" id="btn-sl2">Save and continue</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step3">
                                            <div class="row pd15">
                                              <h4>Additional Details</h4>
                                                   <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Detailed Description<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" rows="5" name="SL_det_desc" id="SL_det_desc"><?echo isset($sl_info['det_description'])?$sl_info['det_description']:'';?></textarea>
                                                    </div>
                                                </div>
                                              
                                              
                                              <div class="row form-group">
                                                <label class="col-sm-3">Preferred Supplier Location<span class="required">*</span></label>
                                                <div class="col-sm-9 row user-type">
                                                    <?
                                                    $ch="";
                                                    $sup_location=isset($sl_info['pref_supplier_location'])?$sl_info['pref_supplier_location']:'';	
                                                    foreach($pref_supplier_location as $SH_Term){
                                                    if($sup_location==strtolower($SH_Term))
                                                    $ch="checked";	
                                                    else	
                                                    $ch="";
                                                    ?>
                                                    <div class="col-sm-4">
                                                        <input type="radio" name="pref_supplier_location" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?> > <label for="<?echo $SH_Term;?>"> <?echo strtoupper($SH_Term);?> </label>
                                                    </div>

                                                    <?}?>  
                                                </div>
                                            </div>
                                              
                                               <div class="row form-group">
                                                <label class="col-sm-3">Requirement Frequency<span class="required">*</span></label>
                                                <div class="col-sm-9 row user-type">
                                                    <?
                                                    $ch="";
                                                    $Req_frequency=isset($sl_info['Requirement_frequency'])?$sl_info['Requirement_frequency']:'';	
                                                    foreach($Requirement_frequency as $SH_Term){
                                                    if($Req_frequency==strtolower($SH_Term))
                                                    $ch="checked";	
                                                    else	
                                                    $ch="";
                                                    ?>
                                                    <div class="col-sm-4">
                                                        <input type="radio" name="Requirement_frequency" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?> > <label for="<?echo $SH_Term;?>"> <?echo strtoupper($SH_Term);?> </label>
                                                    </div>

                                                    <?}?>  
                                                </div>
                                            </div>
                                              
                                              
                                                <div class="row form-group">
                                                <label class="col-sm-3">Requirement Urgency<span class="required">*</span></label>
                                                <div class="col-sm-9 row user-type">
                                                    <?
                                                    $ch="";
                                                    $Req_urgency=isset($sl_info['Requirement_urgency'])?$sl_info['Requirement_urgency']:'';	
                                                    foreach($Requirement_urgency as $SH_Term){
                                                    if($Req_urgency==strtolower($SH_Term))
                                                    $ch="checked";	
                                                    else	
                                                    $ch="";
                                                    ?>
                                                    <div class="col-sm-4">
                                                        <input type="radio" name="Requirement_urgency" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?> > <label for="<?echo $SH_Term;?>"> <?echo strtoupper($SH_Term);?> </label>
                                                    </div>

                                                    <?}?>  
                                                </div>
                                            </div>
                                               <div class="row form-group">
                                                <label class="col-sm-3">Purpose of Requirement<span class="required">*</span></label>
                                                <div class="col-sm-9 row user-type">
                                                    <?
                                                    $ch="";
                                                    $Req_purpose=isset($sl_info['Requirement_purpose'])?$sl_info['Requirement_purpose']:'';	
                                                    foreach($Requirement_purpose as $SH_Term){
                                                    if($Req_purpose==strtolower($SH_Term))
                                                    $ch="checked";	
                                                    else	
                                                    $ch="";
                                                    ?>
                                                    <div class="col-sm-4">
                                                        <input type="radio" name="Requirement_purpose" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?> > <label for="<?echo $SH_Term;?>"> <?echo strtoupper($SH_Term);?> </label>
                                                    </div>

                                                    <?}?>  
                                                </div>
                                            </div>
<!--                                       <div class="row form-group model-name">
                                                  <label class="col-sm-3 label-title">Select a business group<span class="required">*</span></label>
                                                  <div class="col-sm-9">
                                                    <select class="form-control" name="SL_other" id="SL_other">
                                                                                <option value="">select</option>
                                                                                <?$bs = isset($sl_info['other_related'])?$sl_info['other_related']:'';
                                                                                foreach ($Related_items as $key=>$items){
                                                                                        if($bs==$key)
                                                                                                $ch="selected";
                                                                                        else
                                                                                                $ch="";?>
                                                                                                                                                        
                                                                                      <option value="<?echo $key;?>" <?echo $ch;?>> <?echo $items;?></option>
                                                                                <?}?>
                                                    </select>
                                                  </div>
                                                </div>-->
                                              
                                              <div class="row form-group">
                                                    <label class="col-sm-3">Ready to Publish<span class="required">*</span></label>
                                                    <div class="col-sm-9 user-type">
                                                        <?$action = isset($sl_info['action'])?$sl_info['action']:'';?>
                                                        <div class="col-md-3">
                                                            <input type="radio" name="ready_to_publish" value="0" id="darft" <?echo ((int)$action===0)?"checked":'';?>> <label for="darft">Draft</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="radio" name="ready_to_publish" value="1" id="publish" <?echo ((int)$action===1)?"checked":'';?>> <label for="publish">Publish</label>
                                                        </div>							  
                                                    </div>
                                                </div>
                                                <!--<div class="row form-group add-title">
                                                  <label class="col-sm-3 label-title">Currency Locale<span class="required">*</span></label>
                                                  <div class="col-sm-9 row">
                                                    <div class="col-sm-6">
                                                                                   <select class="form-control" name="SL_C_code" id="SL_C_code">
                                                                                          <option value="">Select</option>
                                                <?php
                                                //$SL_C_code = isset($sl_info['currency']) ? $sl_info['currency'] : '10';
                                              //  echo $drop->get_dropdown($db, "SELECT id,currencycode from currency_code where active_status='1'", $SL_C_code);
                                                ?> 
                                                                                       </select>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                      <?$SL_c_desc = isset($sl_info['currency_desc'])?($sl_info['currency_desc']):''; ?>
                                                                                   <input type="text" name="SL_C_desc" class="form-control" value="<?echo $SL_c_desc;?>" id="text" placeholder="">
                                                                                </div>
                                                  </div>
                                                </div>-->


<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Base Price<span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <?
                                                                    $SL_d = isset($sl_info['base_price'])?$sl_info['base_price']:'';
                                                                    /*if(!empty($SL_d)){
                                                                    $sls = strpos($SL_d,'/');
                                                                    $SL_d_price	= substr($SL_d,0,$sls);
                                                                    $SL_d_per = strtolower(substr($SL_d,$sls+1,strlen($SL_d))); 
                                                                    }else{
                                                                    $SL_d_price='';	
                                                                    $SL_d_per='';
                                                                    }*/
                                                                    ?>
                                                                    <input type="text" name="SL_base_price" class="form-control" id="SL_base_price"  placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?echo isset($SL_d)?$SL_d:'';?>" >
                                                                    <label class="input-group-addon"> Per</label>
                                                                </div>
                                                            </div>  /.form-group 
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="SL_d_price_unit">
                                                                        <?$SL_d_per = isset($sl_info['SL_d_price_unit'])?$sl_info['SL_d_price_unit']:'';?>
                                                                        <?echo $drop->get_dropdown($db,"select quantity,quantity from units where quantity!='' AND quantity is NOT NULL",$SL_d_per);?> 

                                                                <option value="">Select Unit</option>
                                                                <?$SL_d_per = isset($bl_info['SL_d_price_unit'])?$bl_info['SL_d_price_unit']:'';
                                                                echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$SL_d_per);
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Max Price<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_max_price" class="form-control" id="SL_max_price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?echo isset($sl_info['max_price'])?$sl_info['max_price']:'';?>" placeholder="" >
                                                    </div>
                                                </div>

                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Min orders Quantity<span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <?
                                                                    $SL_e = isset($sl_info['min_order_quantity'])?$sl_info['min_order_quantity']:'';
                                                                    /*if(!empty($SL_e)){
                                                                    $sls = strpos($SL_e,'/');
                                                                    $SL_e_price	= substr($SL_e,0,$sls);
                                                                    $SL_e_per = strtolower(substr($SL_e,$sls+1,strlen($SL_e))); 
                                                                    }else{
                                                                    $SL_e_price='';	
                                                                    $SL_e_per='';
                                                                    }*/
                                                                    ?>
                                                                    <input type="text" name="SL_quantity" id="SL_quantity" class="form-control" value="<?echo $SL_e;?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" >
                                                                </div>
                                                            </div>  /.form-group 
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="SL_quantity_unit">
                                                                       <?$SL_e_per = isset($sl_info['SL_quantity_unit'])?$sl_info['SL_quantity_unit']:'';?>
                                                                       <?echo $drop->get_dropdown($db,"select quantity,quantity from units where quantity!='' AND quantity is NOT NULL",$SL_e);?> 

                                                                <option value="">Select Unit</option>
                                                                <?$SL_e_per = isset($bl_info['SL_quantity_unit'])?$bl_info['SL_quantity_unit']:'';
                                                                echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$SL_e_per);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Size<span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <?
                                                                    $SL_e = isset($sl_info['size'])?$sl_info['size']:'';
                                                                    /*if(!empty($SL_e)){
                                                                    $sls = strpos($SL_e,'/');
                                                                    $SL_e_price	= substr($SL_e,0,$sls);
                                                                    $SL_e_per = strtolower(substr($SL_e,$sls+1,strlen($SL_e))); 
                                                                    }else{
                                                                    $SL_e_price='';	
                                                                    $SL_e_per='';
                                                                    }*/
                                                                    ?>
                                                                    <input type="text" name="SL_size" id="SL_size" class="form-control" value="<?echo $SL_e;?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" >
                                                                </div>
                                                            </div>  /.form-group 
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="SL_size_unit">
                                                                       <?$SL_e_per = isset($sl_info['SL_size_unit'])?$sl_info['SL_size_unit']:'';?>
                                                                       <?echo $drop->get_dropdown($db,"select quantity,quantity from units where quantity!='' AND quantity is NOT NULL",$SL_e);?> 

                                                                <option value="">Select Unit</option>
                                                                <?$SL_e_per = isset($bl_info['SL_size_unit'])?$bl_info['SL_size_unit']:'';
                                                                echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$SL_e_per);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Packaging</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_pack" class="form-control" id="text" value="<?echo isset($sl_info['package'])?$sl_info['package']:'';?>" placeholder="">
                                                    </div>
                                                </div>-->


<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Duration of Delivery <span class="required">*</span></label>
                                                    <div class="col-sm-9 row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <?$SL_t = isset($sl_info['delivery_time'])?$sl_info['delivery_time']:'';
                                                                    /*if(!empty($SL_t)){
                                                                    $sls = strpos($SL_t,'/');
                                                                    $SL_t_price	= substr($SL_t,0,$sls);
                                                                    $SL_t_per = strtolower(substr($SL_t,$sls+1,strlen($SL_t))); 
                                                                    }else{
                                                                    $SL_t_price='';	
                                                                    $SL_t_per='';
                                                                    }*/
                                                                    ?>
                                                                    <input type="text" name="SL_deli_duration" id="SL_deli_duration" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?echo $SL_t;?>" placeholder="" >
                                                                </div>
                                                            </div>  /.form-group 
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="SL_deli_duration_unit">
                                                                <?$SL_t_per = isset($sl_info['SL_deli_duration_unit'])?$sl_info['SL_deli_duration_unit']:'';?>
                                                                <?echo $drop->get_dropdown($db,"select time,time from units where time!='' AND time is NOT NULL",$SL_t_per);?> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Shipping Details (Ports, container etc)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_ship_details" class="form-control" id="text" value="<?echo isset($sl_info['shipping'])?$sl_info['shipping']:'';?>" placeholder="">
                                                    </div>
                                                </div>
                                                 need to convert dynamic 
                                                <div class="row form-group">
                                                    <label class="col-sm-3">Accepted Delivery Terms<span class="required">*</span></label>
                                                    <div class="col-sm-9 user-type">
                                                        <?
                                                        $ch="";
                                                        $SL_sts=isset($sl_info['ship_terms'])?$sl_info['ship_terms']:'';	
                                                        foreach($PSH_Terms as $SH_Term){
                                                        if($SL_sts==strtolower($SH_Term))
                                                        $ch="checked";	
                                                        else	
                                                        $ch="";
                                                        ?>
                                                        <div class="col-sm-4">
                                                            <input type="radio" name="SL_shipping_terms" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?> > <label for="<?echo $SH_Term;?>"> <?echo strtoupper($SH_Term);?> </label>
                                                        </div>

                                                        <?}?>  
                                                    </div>
                                                </div>


                                                <div class="row form-group additional">
                                                    <label class="col-sm-3 label-title">Payment Method <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="checkbox">
                                                            <?$pmethods = $db->get_all_asso("select id,name from payment_methods where active_status='1'");
                                                            $pm=isset($sl_info['pay_method'])?($sl_info['pay_method']):'';
                                                            $pays=explode(',',$pm);
                                                            foreach($pmethods as $key=>$pm){
                                                            if(in_array($pm['id'],$pays))
                                                            $ch='checked';
                                                            else
                                                            $ch='';  
                                                            ?>
                                                            <div class="col-md-4">
                                                                <label for="pm<?echo $key;?>" class="<?echo $ch;?>"><input type="checkbox" name="SL_pmethod[]" value='<?echo $pm['id'];?>' id="pm<?echo $key;?>" <?echo $ch;?>> <?echo $pm['name'];?> </label>
                                                            </div>
                                                            <?}?>   


                                                        </div>
                                                    </div>
                                                </div>-->
                                                 <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
                                                    <li><button type="submit" name="SL_submit" class="btn view-more-btn-3 btn-info-full next-step" id="btn-sl3" onclick="return btn_sl3();">Complete</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="complete">
                                            <div class="row pd15">
                                                <h4>Shipping Details</h4>

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Brand Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_brand_name" class="form-control" id="text" value="<?echo isset($sl_info['brand_name'])?$sl_info['brand_name']:'';?>" placeholder="">
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_specs" class="form-control" id="text" value="<?echo isset($sl_info['specification'])?$sl_info['specification']:'';?>" placeholder="">
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Model/Article Number:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_model_num" class="form-control" id="text" value="<?echo isset($sl_info['model_num'])?$sl_info['model_num']:'';?>" placeholder="">
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Manufacturers</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_manfuc" class="form-control" id="text" value="<?echo isset($sl_info['manufacturers'])?$sl_info['manufacturers']:'';?>" placeholder="">
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Place of Origin</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_origin" class="form-control" id="text" value="<?echo isset($sl_info['place_of_origin'])?$sl_info['place_of_origin']:'';?>" placeholder="">
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Materials / Ingredients:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_material" class="form-control" id="text" value="<?echo isset($sl_info['materials'])?$sl_info['materials']:'';?>" placeholder="">
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group add-title">
                                                    <label class="col-sm-3 label-title">Colors:</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="SL_colors" class="form-control" id="text" value="<?echo isset($sl_info['colors'])?$sl_info['colors']:'';?>" placeholder="">
                                                    </div>
                                                </div>-->


                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
                                                    <li><button type="button" class="btn view-more-btn-3 btn-info-full next-step">Save and continue</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step5">
                                            <div class="row pd15">
                                                <h4>Custom Field(s) with more info</h4>

                                                <!--<div class="row form-group add-title">
                          <label class="col-sm-3 label-title">Minimum Bidding Price</label>
                          <div class="col-sm-9">
                            <input type="text" name="SL_mb_price" class="form-control" id="text" value="<?echo isset($sl_info['min_bid_price'])?$sl_info['min_bid_price']:'';?>" placeholder="">
                          </div>
                        </div>-->

                                                <!--<div class="row form-group model-name">
                                                  <label class="col-sm-3 label-title">Select a business group<span class="required">*</span></label>
                                                  <div class="col-sm-9">
                                                    <select class="form-control" name="SL_other" id="SL_other">
                                                                                <option value="">select</option>
                                                                                <?$bs = isset($sl_info['other_related'])?$sl_info['other_related']:'';
                                                                                foreach ($Related_items as $key=>$items){
                                                                                        if($bs==$key)
                                                                                                $ch="selected";
                                                                                        else
                                                                                                $ch="";?>
                                                                                                                                                        
                                                                                      <option value="<?echo $key;?>" <?echo $ch;?>> <?echo $items;?></option>
                                                                                <?}?>
                                                    </select>
                                                  </div>
                                                </div>-->


<!--                                                <div class="row form-group">
                                                    <label class="col-sm-3">Ready to Publish<span class="required">*</span></label>
                                                    <div class="col-sm-9 user-type">
                                                        <?$action = isset($sl_info['action'])?$sl_info['action']:'';?>
                                                        <div class="col-md-3">
                                                            <input type="radio" name="ready_to_publish" value="0" id="darft" <?echo ((int)$action===0)?"checked":'';?>> <label for="darft">Draft</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="radio" name="ready_to_publish" value="1" id="publish" <?echo ((int)$action===1)?"checked":'';?>> <label for="publish">Publish</label>
                                                        </div>							  
                                                    </div>
                                                </div>-->

<!--                                                <div class="row form-group">
                                                    <label class="col-sm-3">Is price negotiable <span class="required">*</span></label>
                                                    <div class="col-sm-9 user-type">
                                                        <?$pneg = isset($sl_info['price_negotiable'])?$sl_info['price_negotiable']:'';?>
                                                        <?$com_obj->get_radio($PS_Negot,$pneg,'SL_negotiable');?>
                                                    </div>							  
                                                </div>-->

<!--                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
                                                    <li><button type="submit" name="SL_submit" class="btn view-more-btn-3 btn-info-full next-step" onclick="return btn_sl5();">Complete</button></li>
                                                </ul>-->
                                            </div>
                                        </div>


                                    </div>
                                    <div class="clearfix"></div>
                            </div>
                            </form>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- include/buissList -->

</div>
<!-- container -->
</div>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript">
                                                        jQuery(function ($) {

                                                            $("#SL_ex_date").datepicker({
                                                                showOtherMonths: true,
                                                                selectOtherMonths: false,
                                                                //isRTL:true,


                                                                /*
                                                                 changeMonth: true,
                                                                 changeYear: true,
                                                                 
                                                                 showButtonPanel: true,
                                                                 beforeShow: function() {
                                                                 //change button colors
                                                                 var datepicker = $(this).datepicker( "widget" );
                                                                 setTimeout(function(){
                                                                 var buttons = datepicker.find('.ui-datepicker-buttonpane')
                                                                 .find('button');
                                                                 buttons.eq(0).addClass('btn btn-xs');
                                                                 buttons.eq(1).addClass('btn btn-xs btn-success');
                                                                 buttons.wrapInner('<span class="bigger-110" />');
                                                                 }, 0);
                                                                 }
                                                                 */
                                                            });


                                                            //override dialog's title function to allow for HTML titles
                                                            $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
                                                                _title: function (title) {
                                                                    var $title = this.options.title || '&nbsp;'
                                                                    if (("title_html" in this.options) && this.options.title_html == true)
                                                                        title.html($title);
                                                                    else
                                                                        title.text($title);
                                                                }
                                                            }));

                                                            $("#id-btn-dialog1").on('click', function (e) {
                                                                e.preventDefault();

                                                                var dialog = $("#dialog-message").removeClass('hide').dialog({
                                                                    modal: true,
                                                                    title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> jQuery UI Dialog</h4></div>",
                                                                    title_html: true,
                                                                    buttons: [
                                                                        {
                                                                            text: "Cancel",
                                                                            "class": "btn btn-minier",
                                                                            click: function () {
                                                                                $(this).dialog("close");
                                                                            }
                                                                        },
                                                                        {
                                                                            text: "OK",
                                                                            "class": "btn btn-primary btn-minier",
                                                                            click: function () {
                                                                                $(this).dialog("close");
                                                                            }
                                                                        }
                                                                    ]
                                                                });

                                                                /**
                                                                 dialog.data( "uiDialog" )._title = function(title) {
                                                                 title.html( this.options.title );
                                                                 };
                                                                 **/
                                                            });


                                                            $("#id-btn-dialog2").on('click', function (e) {
                                                                e.preventDefault();

                                                                $("#dialog-confirm").removeClass('hide').dialog({
                                                                    resizable: false,
                                                                    width: '320',
                                                                    modal: true,
                                                                    title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty the recycle bin?</h4></div>",
                                                                    title_html: true,
                                                                    buttons: [
                                                                        {
                                                                            html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all items",
                                                                            "class": "btn btn-danger btn-minier",
                                                                            click: function () {
                                                                                $(this).dialog("close");
                                                                            }
                                                                        }
                                                                        ,
                                                                        {
                                                                            html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                                                                            "class": "btn btn-minier",
                                                                            click: function () {
                                                                                $(this).dialog("close");
                                                                            }
                                                                        }
                                                                    ]
                                                                });
                                                            });



                                                            //autocomplete
                                                            var availableTags = [
                                                                "ActionScript",
                                                                "AppleScript",
                                                                "Asp",
                                                                "BASIC",
                                                                "C",
                                                                "C++",
                                                                "Clojure",
                                                                "COBOL",
                                                                "ColdFusion",
                                                                "Erlang",
                                                                "Fortran",
                                                                "Groovy",
                                                                "Haskell",
                                                                "Java",
                                                                "JavaScript",
                                                                "Lisp",
                                                                "Perl",
                                                                "PHP",
                                                                "Python",
                                                                "Ruby",
                                                                "Scala",
                                                                "Scheme"
                                                            ];
                                                            $("#tags").autocomplete({
                                                                source: availableTags
                                                            });

                                                            //custom autocomplete (category selection)
                                                            $.widget("custom.catcomplete", $.ui.autocomplete, {
                                                                _create: function () {
                                                                    this._super();
                                                                    this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
                                                                },
                                                                _renderMenu: function (ul, items) {
                                                                    var that = this,
                                                                            currentCategory = "";
                                                                    $.each(items, function (index, item) {
                                                                        var li;
                                                                        if (item.category != currentCategory) {
                                                                            ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                                                                            currentCategory = item.category;
                                                                        }
                                                                        li = that._renderItemData(ul, item);
                                                                        if (item.category) {
                                                                            li.attr("aria-label", item.category + " : " + item.label);
                                                                        }
                                                                    });
                                                                }
                                                            });

                                                            var data = [
                                                                {label: "anders", category: ""},
                                                                {label: "andreas", category: ""},
                                                                {label: "antal", category: ""},
                                                                {label: "annhhx10", category: "Products"},
                                                                {label: "annk K12", category: "Products"},
                                                                {label: "annttop C13", category: "Products"},
                                                                {label: "anders andersson", category: "People"},
                                                                {label: "andreas andersson", category: "People"},
                                                                {label: "andreas johnson", category: "People"}
                                                            ];
                                                            $("#search").catcomplete({
                                                                delay: 0,
                                                                source: data
                                                            });


                                                            //tooltips
                                                            $("#show-option").tooltip({
                                                                show: {
                                                                    effect: "slideDown",
                                                                    delay: 250
                                                                }
                                                            });

                                                            $("#hide-option").tooltip({
                                                                hide: {
                                                                    effect: "explode",
                                                                    delay: 250
                                                                }
                                                            });

                                                            $("#open-event").tooltip({
                                                                show: null,
                                                                position: {
                                                                    my: "left top",
                                                                    at: "left bottom"
                                                                },
                                                                open: function (event, ui) {
                                                                    ui.tooltip.animate({top: ui.tooltip.position().top + 10}, "fast");
                                                                }
                                                            });


                                                            //Menu
                                                            $("#menu").menu();


                                                            //spinner
                                                            var spinner = $("#spinner").spinner({
                                                                create: function (event, ui) {
                                                                    //add custom classes and icons
                                                                    $(this)
                                                                            .next().addClass('btn btn-success').html('<i class="ace-icon fa fa-plus"></i>')
                                                                            .next().addClass('btn btn-danger').html('<i class="ace-icon fa fa-minus"></i>')

                                                                    //larger buttons on touch devices
                                                                    if ('touchstart' in document.documentElement)
                                                                        $(this).closest('.ui-spinner').addClass('ui-spinner-touch');
                                                                }
                                                            });

                                                            //slider example
                                                            $("#slider").slider({
                                                                range: true,
                                                                min: 0,
                                                                max: 500,
                                                                values: [75, 300]
                                                            });



                                                            //jquery accordion
                                                            $("#accordion").accordion({
                                                                collapsible: true,
                                                                heightStyle: "content",
                                                                animate: 250,
                                                                header: ".accordion-header"
                                                            }).sortable({
                                                                axis: "y",
                                                                handle: ".accordion-header",
                                                                stop: function (event, ui) {
                                                                    // IE doesn't register the blur when sorting
                                                                    // so trigger focusout handlers to remove .ui-state-focus
                                                                    ui.item.children(".accordion-header").triggerHandler("focusout");
                                                                }
                                                            });
                                                            //jquery tabs
                                                            $("#tabs").tabs();


                                                            //progressbar
                                                            $("#progressbar").progressbar({
                                                                value: 37,
                                                                create: function (event, ui) {
                                                                    $(this).addClass('progress progress-striped active')
                                                                            .children(0).addClass('progress-bar progress-bar-success');
                                                                }
                                                            });


                                                            //selectmenu
                                                            $("#number").css('width', '200px')
                                                                    .selectmenu({position: {my: "left bottom", at: "left top"}})

                                                        });
</script>
<script>
    function setSubcat(mid) {
        $.ajax({
            type: "POST",
            url: 'setsubcat.php',
            data: {'mid': mid},
            success: function (data) {
                $("#subcatdiv").css('display', 'block');
                $("#subcat").html(data);
            }
        });
    }
    function setSubcat2(val) {
//alert(val);
        $.ajax({url: "subcat_ajax.php?val=" + val, success: function (result) {
                $("#subcategory2").html(result);
            }});
    }
</script>
<script>
    function setSubcat(mid) {
        $.ajax({
            type: "POST",
            url: 'setsubcat.php',
            data: {'mid': mid},
            success: function (data) {
                $("#subcatdiv").css('display', 'block');
                $("#subcat").html(data);
            }
        });
    }
</script>	

<?php include "footer.php"; ?>

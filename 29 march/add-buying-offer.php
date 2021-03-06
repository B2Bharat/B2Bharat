<?php
include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
include "include/buyeronly.php";
include "include/checkCompany.php";

$uinfo = $db->singlerec("select * from register where id='$user_id'");
$acn = isset($acn) ? $acn : '';
$msg = "";
if ($acn == 'addsuc') {
    $msg = "<h4 style='color:limegreen'>Successfully Added..!!!</h4>";
} else if ($acn == 'upd') {
    $blid = isset($blid) ? $com_obj->decid($blid) : '0';
    $_SESSION['BL_id'] = $blid;
    $bl_info = $db->singlerec("select * from buying_leads where id ='$blid'");
} else {
    $_SESSION['BL_id'] = '';
    $userid = $user_id;
    include "include/checkPlanstatus.php";

    if ($bBal < 1 && $bBal != 'unlimited') {
        echo "<script>swal('Limit reached!','As per your membership plan, your Add-buying leads limit as been reached, Kindly upgrade your plan!','warning');</script>";
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
include "add_BL.php";
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
                                            <h4>Fill Your Requirement</h4>
                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Enter Product Or Service Name<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="BL_off_name" class="form-control" id="BL_off_name" placeholder="" data-attr="BL_off_name" required value="<?echo isset($bl_info['offer_name'])?$bl_info['offer_name']:'';?>" >
                                                </div>
                                            </div>

                                            <div class="row form-group model-name">
                                                <label class="col-sm-3 label-title">Select a Category<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="BL_cat" id="maincat" onchange="setSubcat(this.value);" >
                                                        <option value="">Select</option>
                                                        <?php
                                                        $BL_cat = isset($bl_info['cat_id']) ? $bl_info['cat_id'] : '0';
                                                        echo $drop->get_dropdown($db, "select id,category_name from category where dis_status='1' AND parent_id='0' group by category_name", $BL_cat);
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Order Expiry Date<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" id="BL_ex_date" name="BL_ex_date" class="form-control" value="<?echo isset($bl_info['valid_until'])?$bl_info['valid_until']:'';?>" style="font-size: 14px;height: 40px;"/>
                                                        <span class="input-group-addon">
                                                            <i class="ace-icon fa fa-calendar"></i>
                                                        </span>
                                                    </div>

                                                    <div class="row form-group add-title">
                                                        <label style="margin-left: -168px;" class="col-sm-3 label-title">Keywords<span class="required">*</span></label>
                                                        <div style="margin-top: 10px;" class="col-sm-9 row" >
                                                            <div class="col-md-6">
                                                                <input type="text" name="BL_key1" class="form-control" id="BL_key1" placeholder="" value="<?echo isset($bl_info['keyword1'])?$bl_info['keyword1']:'';?>" >
                                                                <input type="text" name="BL_key2" class="form-control" id="BL_key2" placeholder="" value="<?echo isset($bl_info['keyword2'])?$bl_info['keyword2']:'';?>" >
                                                            </div>

                                                            <div class="col-md-6">
                                                                <input type="text" name="BL_key3" class="form-control" id="BL_key3" placeholder="" value="<?echo isset($bl_info['keyword3'])?$bl_info['keyword3']:'';?>" >
                                                                <input type="text" name="BL_key4" class="form-control" id="BL_key4" placeholder="" value="<?echo isset($bl_info['keyword4'])?$bl_info['keyword4']:'';?>" >
                                                            </div>

                                                        </div>
                                                    </div>
                          <!--<input type="date" name="BL_ex_date" class="form-control" id="BL_ex_date" placeholder="" value="<?echo isset($bl_info['valid_until'])?$bl_info['valid_until']:'';?>" >-->
                                                </div>
                                            </div>
                                            <div class="row form-group add-image">
                                                <label class="col-sm-3 label-title">Upload Product image(1) <small style="color:red;"> (Image size should be 1000x600)</small></label>
                                                <div class="col-sm-9">
                                                    <div class="col-xs-6">
                                                        <div class="upload-section">
                                                            <label class="upload-image" for="upload-image-one" style="width:40%">
                                                                <input type="file" id="upload-image-one" name="BL_product_img" accept="image/*" onchange="img_validate('upload-image-one', 1000, 600, 5, 3, 'img_div');"/>
                                                            </label>										
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6 row">
                                                        <?$BL_img = isset($bl_info['photo1'])?$bl_info['photo1']:'';?>
                                                        <img src="uploads/BL_images/banner1/<?echo $BL_img;?>" id="img_div" width="100" height="80" <?if($BL_img==''){?>style='display:none;'<?}?>>
                                                    </div>

                                                </div>
                                            </div>



                                         


<!--                                            						  <div class="row form-group add-image">
                                                                                              <label class="col-sm-3 label-title">Upload Product image(3) <small style="color:red;"> (Image size should be 1000x600)</small></label>
                                                                        <div class="col-sm-9">
                                                                                                            <div class="col-xs-6">
                                                                                                              <div class="upload-section">
                                                                                                                    <label class="upload-image" for="upload-image-one3" style="width:40%">
                                                                                                                            <input type="file" id="upload-image-one3" name="BL_product_img3" accept="image/*" onchange="img_validate('upload-image-one3',1000,600,5,3,'img_div3')"/>
                                                                                                                    </label>										
                                                                                                              </div>
                                                                                                            </div>
                                                                                                            <div class="col-xs-6 row">
                                                                                                                    <?$BL_img3 = isset($bl_info['photo3'])?$bl_info['photo3']:'';?>
                                                                                                                      <img src="uploads/BL_images/banner3/<?echo $BL_img3;?>" id="img_div3" width="100" height="80" <?if($BL_img3==''){?>style='display:none;'<?}?>>
                                                                                                            </div>
                                                                        </div>
                                                                      </div>-->


<!--                                            <						  <div class="row form-group add-image">
                                                                                              <label class="col-sm-3 label-title">Upload Product image(4) <small style="color:red;"> (Image size should be 1000x600)</small></label>
                                                                                              
                                                                        <div class="col-sm-9">
                                                                                                            <div class="col-xs-6">
                                                                                                              <div class="upload-section">
                                                                                                                    <label class="upload-image" for="upload-image-one4" style="width:40%">
                                                                                                                            <input type="file" id="upload-image-one4" name="BL_product_img4" accept="image/*" onchange="img_validate('upload-image-one4',1000,600,5,3,'img_div4')"/>
                                                                                                                    </label>										
                                                                                                              </div>
                                                                                                            </div>
                                                                                                            <div class="col-xs-6 row">
                                                                                                                    <?$BL_img4 = isset($bl_info['photo4'])?$bl_info['photo4']:'';?>
                                                                                                                      <img src="uploads/BL_images/banner4/<?echo $BL_img4;?>" id="img_div4" width="100" height="80" <?if($BL_img4==''){?>style='display:none;'<?}?>>
                                                                                                            </div>
                                                                        </div>
                                                                      </div>-->

                                            						  
<!--                                                                                              <div class="row form-group add-image">
                                                                                              <label class="col-sm-3 label-title">Upload Product image(5) <small style="color:red;"> (Image size should be 1000x600)</small></label>
                                                                        <div class="col-sm-9">
                                                                                                            <div class="col-xs-6">
                                                                                                              <div class="upload-section">
                                                                                                                    <label class="upload-image" for="upload-image-one5" style="width:40%">
                                                                                                                            <input type="file" id="upload-image-one5" name="BL_product_img5" accept="image/*" onchange="img_validate('upload-image-one5',1000,600,5,3,'img_div5')"/>
                                                                                                                    </label>										
                                                                                                              </div>
                                                                                                            </div>
                                                                                                            <div class="col-xs-6 row">
                                                                                                                    <?$BL_img5 = isset($bl_info['photo5'])?$bl_info['photo5']:'';?>
                                                                                                                      <img src="uploads/BL_images/banner5/<?echo $BL_img5;?>" id="img_div5" width="100" height="80" <?if($BL_img5==''){?>style='display:none;'<?}?>>
                                                                                                            </div>
                                                                        </div>
                                                                      </div>-->




                                            <!--<div class="row form-group add-title"> 
                                                    <label class="col-sm-3 label-title">Select Image <span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                            <input type="file" name="profile-image" accept="image/*" onchange="img_validate('BL_product_img',300,300);"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                            <div class="col-md-12">
                                                                    <img src="" id="img_div" width="100" height="100" style='display:none;'>
                                                            </div>
                                                    </div>
                                            </div>-->


                                            <!--                         <div class="row form-group model-name">
                                                                        <label class="col-sm-3 label-title">Select a Category<span class="required">*</span></label>
                                                                        <div class="col-sm-9">
                                                                          <select class="form-control" name="BL_cat" id="maincat" onchange="setSubcat(this.value);" >
                                                                                                      <option value="">Select</option>
                                                                                                            //<?php
                                            //$BL_cat = isset($bl_info['cat_id'])?$bl_info['cat_id']:'0';
                                            //echo $drop->get_dropdown($db,"select id,category_name from category where dis_status='1' AND parent_id='0' group by category_name",$BL_cat);
                                            //?>
                                                                          </select>
                                                                        </div>
                                                                      </div>-->
                                            <?php
                                            //$BL_cat_sub = isset($bl_info['sub_cat_id'])?$bl_info['sub_cat_id']:'';
                                            //if($BL_cat_sub!=''){$dstl='block';}else{$dstl='none';}
                                            ?>
                                            <!--						  <div class="row form-group model-name" id="subcatdiv">
                                                                        <label class="col-sm-3 label-title">Select Subcategory<span class="required">*</span></label>
                                                                        <div class="col-sm-9">
                                                                          <select class="form-control" name="BL_cat_sub" id="subcat" onchange="setSubcat2(this.value);">
                                                                                                      <option value="">Select</option>
                                            <?php //echo $drop->get_dropdown($db,"select id,category_name from category where dis_status='1' AND parent_id='$BL_cat'",$BL_cat_sub);?>
                                                                          </select>
                                                                        </div>
                                                                      </div>-->
                                            <?php //$subcategory2 = isset($bl_info['subcategory2'])?$bl_info['subcategory2']:'';?> 
                                            <!--						   <div class="row form-group model-name">
                                                                        <label class="col-sm-3 label-title">Second Level Sub Category<span class="required">*</span></label>
                                                                        <div class="col-sm-9">
                                                                          <select class="form-control" name="subcategory2" id="subcategory2" ><option value="">Select</option>
                                            <?php //echo $drop->get_dropdown($db,"select id,cat_name from sub_category where active_status='1' group by cat_name asc",$subcategory2);?>
                                                                          </select>
                                                                        </div>
                                                                      </div>-->
                                            <ul class="list-inline pull-right pdt20">
                                                <li><button type="button" class="btn view-more-btn-3" id="btn-bl1">Save and continue</button></li>
                                            </ul>
                                        </div>

                                        <!--                         order Details-->
                                        <div class="tab-pane" role="tabpanel" id="step2">
                                            <h4>Order Details</h4>

                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Desired Price<span class="required">*</span></label>
                                                <div class="col-sm-9 row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <?
                                                                $BL_d = isset($bl_info['price'])?$bl_info['price']:'';
                                                                /*if(!empty($BL_d)){
                                                                $sls = strpos($BL_d,'/');
                                                                $BL_d_price	= substr($BL_d,0,$sls);
                                                                $BL_d_per = strtolower(substr($BL_d,$sls+1,strlen($BL_d))); 
                                                                }else{
                                                                $BL_d_price='';	
                                                                $BL_d_per='';
                                                                }*/
                                                                ?>
                                                                <input type="text" name="BL_d_price" class="form-control" id="BL_d_price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="" value="<?echo isset($BL_d)?$BL_d:'';?>">
                                                                <label class="input-group-addon"> Per</label>
                                                            </div>
                                                        </div> <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="BL_d_price_unit" id="BL_d_price_unit">
                                                                   <!--<?$BL_d_per = isset($bl_info['price_unit'])?$bl_info['price_unit']:'';?>
                                                                   <?echo $drop->get_dropdown($db,"select quantity,quantity from units where quantity!='' AND quantity is NOT NULL",$BL_d_per);?> -->

                                                            <option value="">Select Unit</option>

                                                            <?$BL_d_per = isset($bl_info['price_unit'])?$bl_info['price_unit']:'';
                                                            echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$BL_d_per);
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Expected Quantity<span class="required">*</span></label>
                                                <div class="col-sm-9 row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <?
                                                                $BL_e = isset($bl_info['exquantity'])?$bl_info['exquantity']:'';
                                                                /*if(!empty($BL_e)){
                                                                $sls = strpos($BL_e,'/');
                                                                $BL_e_price	= substr($BL_e,0,$sls);
                                                                $BL_e_per = strtolower(substr($BL_e,$sls+1,strlen($BL_e))); 
                                                                }else{
                                                                $BL_e_price='';	
                                                                $BL_e_per='';
                                                                }*/
                                                                ?>
                                                                <input type="text" name="BL_quantity" id="BL_quantity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?echo $BL_e;?>" placeholder="">
                                                            </div>
                                                        </div> <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="BL_quantity_unit" id="BL_quantity_unit">
                                                                   <!--<?$BL_e_per = isset($bl_info['quan_unit'])?$bl_info['quan_unit']:'';?>-->
                                                                   <!--<?echo $drop->get_dropdown($db,"select quantity,quantity from units where quantity!='' AND quantity is NOT NULL",$BL_e_per);?> -->

                                                            <option value="">Select Unit</option>

                                                            <?$BL_e_per = isset($bl_info['quan_unit'])?$bl_info['quan_unit']:'';
                                                            echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$BL_e_per);
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Approximate Order Value <span class="required">*</span></label>
                                                <div class="col-sm-9 row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <?
                                                                $BL_m = isset($bl_info['maxbuy_capacity'])?$bl_info['maxbuy_capacity']:'';
                                                                /*if(!empty($BL_m)){
                                                                $sls = strpos($BL_m,'/');
                                                                $BL_m_price	= substr($BL_m,0,$sls);
                                                                $BL_m_per = strtolower(substr($BL_m,$sls+1,strlen($BL_m))); 
                                                                }else{
                                                                $BL_m_price='';	
                                                                $BL_m_per='';
                                                                }*/
                                                                ?>

                                                                <input type="text" name="BL_buy_capacity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="BL_buy_capacity" class="form-control" value="<?echo $BL_m;?>" placeholder="">
                                                                <label class="input-group-addon">INR</label>
                                                            </div>
                                                        </div> <!-- /.form-group -->
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Specifications</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="BL_specs" class="form-control" id="text" value="<?echo isset($bl_info['specification'])?$bl_info['specification']:'';?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Packaging/Size</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="BL_pack" class="form-control" id="text" value="<?echo isset($bl_info['package'])?$bl_info['package']:'';?>" placeholder="">
                                                </div>
                                            </div>


                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Expected Duration of Delivery <span class="required">*</span></label>
                                                <div class="col-sm-9 row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <?$BL_t = isset($bl_info['delivery_time'])?$bl_info['delivery_time']:'';
                                                                /*if(!empty($BL_t)){
                                                                $sls = strpos($BL_t,'/');
                                                                $BL_t_price	= substr($BL_t,0,$sls);
                                                                $BL_t_per = strtolower(substr($BL_t,$sls+1,strlen($BL_t))); 
                                                                }else{
                                                                $BL_t_price='';	
                                                                $BL_t_per='';
                                                                }*/
                                                                ?>
                                                                <input type="text" name="BL_deli_duration" id="BL_deli_duration" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?echo $BL_t;?>" placeholder="">
                                                            </div>
                                                        </div> <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="BL_deli_duration_unit">
                                                            <?$BL_t_per = isset($bl_info['deliver_duration_unit'])?$bl_info['deliver_duration_unit']:'';?>
                                                            <?echo $drop->get_dropdown($db,"select time,time from units where time!='' AND time is NOT NULL",$BL_t_per);?> 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Shipping Details (Ports, container etc)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="BL_ship_details" class="form-control" id="text" value="<?echo isset($bl_info['shipping'])?$bl_info['shipping']:'';?>" placeholder="">
                                                </div>
                                            </div>
                                            <!-- need to convert dynamic -->
                                            <div class="row form-group">
                                                <label class="col-sm-3">Accepted Delivery Terms<span class="required">*</span></label>
                                                <div class="col-sm-9 row user-type">
                                                    <?
                                                    $ch="";
                                                    $BL_sts=isset($bl_info['ship_terms'])?$bl_info['ship_terms']:'';	
                                                    foreach($PSH_Terms as $SH_Term){
                                                    if($BL_sts==strtolower($SH_Term))
                                                    $ch="checked";	
                                                    else	
                                                    $ch="";
                                                    ?>
                                                    <div class="col-sm-4">
                                                        <input type="radio" name="BL_shipping_terms" value="<?echo strtolower($SH_Term);?>" id="<?echo $SH_Term;?>" <?echo $ch;?> > <label for="<?echo $SH_Term;?>"> <?echo strtoupper($SH_Term);?> </label>
                                                    </div>

                                                    <?}?>  
                                                </div>
                                            </div>


                                            <div class="row form-group additional">
                                                <label class="col-sm-3 label-title">Payment Method <span class="required">*</span></label>
                                                <div class="col-sm-9 row">
                                                    <div class="checkbox">
                                                        <?$pmethods = $db->get_all_asso("select id,name from payment_methods where active_status='1'");
                                                        $pm=isset($bl_info['pay_method'])?($bl_info['pay_method']):'';
                                                        $pays=explode(',',$pm);
                                                        foreach($pmethods as $key=>$pm){
                                                        if(in_array($pm['id'],$pays))
                                                        $ch='checked';
                                                        else
                                                        $ch='';  
                                                        ?>
                                                        <div class="col-md-4">
                                                            <label for="pm<?echo $key;?>" class="<?echo $ch;?>"><input type="checkbox" name="BL_pmethod[]" value='<?echo $pm['id'];?>' id="pm<?echo $key;?>" <?echo $ch;?>> <?echo $pm['name'];?> </label>
                                                        </div>
                                                        <?}?>   
                                                    </div>
                                                </div>
                                            </div>





                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
                                                <li><button type="button" class="btn view-more-btn-3" id="btn-bl2">Save and continue</button></li>
                                            </ul>

                                        </div>                                      


                                        <div class="tab-pane" role="tabpanel" id="step3">
                                            <h4>Additional Details</h4>
                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Detailed Description<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="5" name="BL_desc" id="BL_desc" ><?echo isset($bl_info['det_desc'])?$bl_info['det_desc']:'';?></textarea>
                                                </div>
                                            </div>



                                            <!--                                             <div class="row form-group">
                                                                        <label class="col-sm-3">Preferred Supplier Location <span class="required">*</span></label>
                                                                        <div class="col-sm-9 user-type">
                                                                                                      <?
                                                                                                      $ch="";
                                                                                                      $BL_sts=isset($bl_info['pref_supplier_location'])?$bl_info['pref_supplier_location']:'';
                                                                                                      foreach($pref_supplier_location as $location) {
                                                                                                         if($BL_sts==strtolower($location))
                                                                                                $ch="checked";	
                                                                                                else	
                                                                                                $ch="";
                                                                                                ?>
                                                                                                     <div class="col-sm-4">
                                                                                                    <input type="radio" name="pref_supplier_location" value="<?echo strtolower($location);?>" id="<?echo $location;?>" <?echo $ch;?> > <label for="<?echo $location;?>"> <?echo strtoupper($location);?> </label>
                                                                                                </div>
                                            
                                                                                                <?}?>  
                                                                        </div>
                                                                      </div>-->
                                            <div class="row form-group">
                                                <label class="col-sm-3">Preferred Supplier Location<span class="required">*</span></label>
                                                <div class="col-sm-9 row user-type">
                                                    <?
                                                    $ch="";
                                                    $sup_location=isset($bl_info['pref_supplier_location'])?$bl_info['pref_supplier_location']:'';	
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
                                                    $Req_frequency=isset($bl_info['Requirement_frequency'])?$bl_info['Requirement_frequency']:'';	
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
                                                    $Req_urgency=isset($bl_info['Requirement_urgency'])?$bl_info['Requirement_urgency']:'';	
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
                                                    $Req_purpose=isset($bl_info['Requirement_purpose'])?$bl_info['Requirement_purpose']:'';	
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


                                            <div class="row form-group add-title">
                                                <label class="col-sm-3 label-title">Website</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="BL_website" id="text" value="<?echo isset($bl_info['contact_desc'])?$bl_info['contact_desc']:'';?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row form-group model-name">
                                                <label class="col-sm-3 label-title">Select a business group<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="BL_buss_group" id="BL_buss_group">
                                                        <option value="">select</option>
                                                        <?$bs_old = isset($bl_info['business_group'])?(int)$bl_info['business_group']:'';
                                                        foreach ($buss_group as $key=>$bs){
                                                        if($bs_old === (int)$key){
                                                        $ch="selected";
                                                        }
                                                        else
                                                        $ch="";?>
                                                        <option value="<?echo $key;?>" <?echo $ch;?>> <?echo $bs;?></option>
                                                        <?}?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3">Ready to Publish<span class="required">*</span></label>
                                                <div class="col-sm-9 user-type">
                                                    <?$action = isset($bl_info['action'])?$bl_info['action']:'';?>
                                                    <div class="col-md-3">
                                                        <input type="radio" name="ready_to_publish" value="0" id="darft" <?echo ((int)$action===0)?"checked":'';?>> <label for="darft">Draft</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="radio" name="ready_to_publish" value="1" id="publish" <?echo ((int)$action===1)?"checked":'';?>> <label for="publish">Publish</label>
                                                    </div>							  
                                                </div>
                                            </div>
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
                                                <li><button type="submit" name="BL_submit" class="btn view-more-btn-3 btn-info-full next-step" id="btn-bl3" onclick=" return btn_bl3();">Complete</button></li>
                                            </ul>
                                            <!--                                            <ul class="list-inline pull-right">
                                                                                            <li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
                                                                                            <li><button type="button" class="btn view-more-btn-3 btn-info-full next-step">Save and continue</button></li>
                                                                                        </ul>-->
                                        </div>

                                        <!--                                        <div class="tab-pane" role="tabpanel" id="step5">
                                                                                    <h4>Shipping Details</h4>
                                        
                                        
                                        
                                                                                    
                                                                                    <div class="row form-group">
                                                               
                                                                                </div>-->
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- container -->
</div>


<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript">
                                                    jQuery(function ($) {

                                                        $("#BL_ex_date").datepicker({
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
<?php include "footer.php"; ?>

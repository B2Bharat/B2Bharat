<?
include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
//include "include/checkCompany.php";
$uinfo = $db->singlerec("select * from register where id='$user_id'");
$acn = isset($acn)?$acn:'';
$userid=$uinfo['id'];
include "include/checkPlanstatus.php";


if((int)$transSts===0){
	echo "<script>swal('Membership expired!','Kindly upgrade your membership plan!','warning');</script>";	
	echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";
	include "footer.php";
	exit;
}

if($balancedays_con < 0){
	echo "<script>swal('Membership expired!','Kindly upgrade your membership plan!','warning');</script>";	
	echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";
	include "footer.php";
	exit;
}

if($pBal < 1 && $pBal != 'unlimited'){
	echo "<script>swal('Limit reached!','As per your membership plan, your Add-product limit as been reached, Kindly upgrade your plan!','warning');</script>";	
	echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";
	include "footer.php";
	exit;
}

?>
<!-----datepicker------------>
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
<!-----datepicker------------>

<style>
  .fa{font-size: 1.5em;}
  .wizard .nav-tabs > li {width: 16.66%;}
  .slider input {    display: inline-block;    margin-bottom: 15px;}
</style>

    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container continr-bg">
        <? include "include/profile-left.php"; ?>
        <div class="col-sm-9 col-md-9">
          <div class="adpost-details">
            <div class="well">
              <div class="section slider">
                <div class="row" style="margin-top: -50px;">
                  <div class="wizard">
                    <div class="wizard-inner">
                      <!-- <div class="connecting-line"></div> -->
                      <ul class="nav nav-tabs" role="tablist">
                           <li role="presentation" class="disabled text-center">
                          <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="step 4" aria-expanded="true">
                          <span class="round-tab">
                             <i class="fa fa-info" aria-hidden="true"></i>
                          </span>
                          </a>
                          <p class="register-info">Product <br> Info </p>
                        </li>
                        <li role="presentation" class="text-center  active">
                          <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1" aria-expanded="false">
                          <span class="round-tab">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                          </span>
                          </a>
                          <p class="register-info">Category Information</p>
                        </li>
                        <li role="presentation" class="disabled text-center">
                          <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" aria-expanded="false">
                          <span class="round-tab">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          </span>							
                          </a>
                          <p class="register-info">Order and Payment </p>
                        </li>
                        <li role="presentation" class="disabled text-center">
                          <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" aria-expanded="false">
                          <span class="round-tab">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                          </span>
                          </a>
                          <p class="register-info">Photos and Brochure </p>
                        </li>
                       
                        <li role="presentation" class="disabled text-center">
                          <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab" title="step5" aria-expanded="true">
                          <span class="round-tab">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                          </span>
                          </a>
                          <p class="register-info">Packaging & Shipment </p>
                        </li>
						
						<li role="presentation" class="disabled text-center">
                          <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab" title="step6" aria-expanded="true">
                          <span class="round-tab">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                          </span>
                          </a>
                          <p class="register-info">More <br> &nbsp;</p>
                        </li>
                      </ul>
                    </div>
                    <form action="add-product" id="addproct" method="post" role="form" enctype="multipart/form-data">
                      <div class="tab-content well" >
                        <div class="tab-pane active" role="tabpanel" id="step1">
                          <h4>Category Management</h4>
                         
                          
                          <div class="row form-group model-name">
                            <label class="col-sm-3 label-title">Select a Category<span class="required">*</span></label>
                            <div class="col-sm-9">
                              <select class="form-control" name="cat" id="maincat" onchange="setSubcat(this.value);">
							  <option value="">select</option>
								 <?
								 $cat = isset($cat)?$cat:'';
								 echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0' and dis_status='1' group by category_name",$cat);
								 ?>
                              </select>
                            </div>
                          </div>
						  <?php $sub_cat = isset($sub_cat)?$sub_cat:'';?>
						  <div class="row form-group model-name">
                            <label class="col-sm-3 label-title">Select Sub-category<span class="required">*</span></label>
                            <div class="col-sm-9">
                              <select class="form-control" name="sub_cat" id="subcat" onchange="setSubcat2(this.value);">
							  <option value="">--select--</option>
                                 <?
								 
								 echo $drop->get_dropdown($db,"select id,category_name from category where parent_id!='0' and dis_status='1'",$sub_cat);
								 ?>
                              </select>
                            </div>
                          </div>
						   <?php $subcategory2 = isset($subcategory2)?$subcategory2:'';?>
						  <div class="row form-group model-name">
                            <label class="col-sm-3 label-title"> Second Level Sub Category : </label>
                            <div class="col-sm-9" id="cat1">
                              <select name="subcategory2" id="subcategory2" class="form-control">
							  <?php $pro_subcategory2 = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,cat_name from sub_category where active_status='1' group by cat_name asc";
$pro_subcategory2 .= $drop->get_dropdown($db,$DropDownQry,$subcategory2); ?>
													    <? echo $pro_subcategory2;?>
							  </select>
                            </div>
                          </div>

<ul class="list-inline pull-right pdt20">
<li><button type="button" class="btn view-more-btn-3" id="btn-p1">Next</button></li>
</ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                          <h4>Cost or Price</h4>
                        
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Unit Price <span class="required">*</span></label>
                            <div class="col-sm-9 row">
                              <div class="col-sm-6">
							     <div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" name="unit_price" id="unit_price" placeholder="" value="<? echo @$unit_price; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )" >
									</div>
								</div> <!-- /.form-group -->
							  </div>
							  <div class="col-sm-6">
							     <select class="form-control" name="unit_type">
								 <option value="">Select Unit</option>
									 <?
									 $utype = isset($utype)?$utype:'';
									 echo $drop->get_dropdown($db, "select units_name,units_name from prod_units where status='0'", $utype);
									 ?>
								 </select>
							  </div>
                            </div>
                          </div>
						  
						  
                          <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Max Price (Strikethrough) <span class="required">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="max_price" id="max_price" placeholder="" required 
							  value="<? /* echo @$max_price; */ ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">
                            </div>
                          </div>

                         
						  
					
						  
						  
						  
						  
						  <div class="row form-group additional">
                            <label class="col-sm-3 label-title">Type or Status </label>
                            <div class="col-sm-9 row">
                              <div class="checkbox">
								  <?
								  foreach($PS_Type as $k=>$st) {
									echo "<div class='col-md-4'><label for='$st'><input type='checkbox' name='prod_st[]' value='$st' id='$st'> $st</label></div>";
								  }
								  ?>
                              </div>
                            </div>
                          </div>
						  
						  
                          <h4>Payment and Billing</h4>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title"> Current Unit </label>
                            <div class="col-sm-9 row">
                              <div class="col-sm-6">
							     <div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" name="size_val" id="size_val" placeholder="" value="<? echo @$size_val; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">
									</div>
								</div> <!-- /.form-group -->
							  </div>
							  <div class="col-sm-6">
							     <select class="form-control" name="size_unit">
									 <?
									 $size_unit = isset($size_unit)?$size_unit:'';
									 echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$size_unit);
									 ?>
								 </select>
							  </div>
                            </div>
                          </div>
						  
						  <div class="row form-group additional">
                            <label class="col-sm-3 label-title">Payment Method </label>
                            <div class="col-sm-9 row">
                              <div class="checkbox">
							    <?
								$pay=$db->get_all_asso("select * from payment_methods where active_status='1'");
								foreach($pay as $p) {
								    if(isset($pay_method)==$p['id']) $ch="checked";
									$ch=isset($ch)?$ch:'';
									echo '<div class="col-md-4"><label for="'.$p['name'].'" class="'.$ch.'"><input type="checkbox" name="pay_method" value="'.$p['id'].'" id="'.$p['name'].'">'.$p['name'].'</label></div>';
								}
                                ?>
                              </div>
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Minimum Order Quantity </label>
                            <div class="col-sm-9 row">
                              <div class="col-sm-6">
							     <div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" name="ord_quan" placeholder="" value="<? echo @$ord_quan; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">
									</div>
								</div> <!-- /.form-group -->
							  </div>
							  <div class="col-sm-6">
							     <select class="form-control" name="ord_qunit">
									 <?
									 $ord_qunit = isset($ord_qunit)?$ord_qunit:'';
									 echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$ord_qunit);
									 ?>
								 </select>
							  </div>
                            </div>
                          </div>
						  
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Time to Expire </label>
                            <div class="col-sm-9">
                              <div class="input-group input-group-sm">
									<input type="text" id="datepicker" class="form-control"  name="exp_time"  style="font-size: 14px;height: 40px;"/>
									<span class="input-group-addon">
										<i class="ace-icon fa fa-calendar"></i>
									</span>
								</div>
							  
							  <!--<input type="date" class="form-control" name="exp_time" id="text" value="<? echo @$exp_time; ?>">-->
                            </div>
                          </div>
						  
						  
						  <div class="row form-group">
                            <label class="col-sm-3">Is price negotiable? <span class="required">*</span></label>
                            <div class="col-sm-9 user-type">
							  <?
							  foreach($PS_Negot as $St) {
							    $Stl=strtolower($St);
								echo "<input type='radio' name='nego' value='$Stl' id='$Stl'> <label for='$Stl'>$St</label>";
							  }
							  ?>
                            </div>
                          </div>


<ul class="list-inline pull-right">
	<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
	<li><button type="button" class="btn view-more-btn-3" id="btn-p2">Next</button></li>
</ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                          <h4>Pictorial Illustration</h4>
                          
						  <div class="row form-group add-image">
                            <label class="col-sm-3 label-title">Upload Photos <small style="color:red;">(image size should be 1000x600)</small><span class="required">*</span></label>
                            <div class="col-sm-9">
                              <div class="upload-section">
                                <label class="upload-image" for="upload-image-one">
                                <input type="file" id="upload-image-one" name="photo1" accept="image/*" onchange="img_validate('upload-image-one',1000,600,5,3,'img_div');" > 
								<div class=""><img src="" id="img_div"/></div>
                                </label>
								<label class="upload-image" for="upload-image-two">
                                <input type="file" id="upload-image-two" name="photo2" accept="image/*" onchange="img_validate('upload-image-two',1000,600,5,3,'img_div2' );" >
								<div class=" dfgdg"><img src="" id="img_div2"/></div>
                                </label>	
								<label class="upload-image" for="upload-image-three">
                                <input type="file" id="upload-image-three" name="photo3" accept="image/*" onchange="img_validate('upload-image-three',1000,600,5,3,'img_div3');">
								<div class=""><img src="" id="img_div3"></img></div>								
                                </label>
								<label class="upload-image" for="upload-image-four">
								<div class=""><img src="" id="img_div4"></img></div>
                                <input type="file" id="upload-image-four" name="photo4" accept="image/*" onchange="img_validate('upload-image-four',1000,600,5,3,'img_div4');" >
                                </label>
                              </div>
                            </div>
                          </div>
						  
                          <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Video Embed Code</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="vdeo" id="text" value="<? echo @$vdeo; ?>">
							  video format should be(https://www.youtube.com/embed/M6hliHgG1AI)
                            </div>
                          </div>
						  
						   <div class="row form-group add-image">
                            <label class="col-sm-3 label-title">Product Brochures <small style="color:red;">(image size should be 1000x600)</small></label>
                            <div class="col-sm-9">
                              <div class="upload-section">
                                <label class="upload-image" for="upload-image-six">
								<div class=""><img src="" id="img_div5"></img></div>
									<input type="file" name="brch" id="upload-image-six" accept="image/*" onchange="img_validate('upload-image-six',1000,600,5,3,'img_div5');">
                                </label>										
                              </div>
                            </div>
                          </div>
						  
						  
                          <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Other Related Items</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="related" rows="3"><? echo @$related; ?></textarea>
                            </div>
                          </div>
						  
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Colour</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="color" id="text" value="<? echo @$color; ?>">
                            </div>
                          </div>

						  
<ul class="list-inline pull-right">
	<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
	<li><button type="button" class="btn view-more-btn-3 btn-info-full" id="btn-p3">Next</button></li>
</ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                          <h4>Product Information</h4>
                          
                          
                                 
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Product Group Name <span class="required">*</span></label>
                                              <div class="col-sm-9">
                              <input type="text" class="form-control" name="prod_group_name" id="prod_group_name" placeholder="" value="<? echo @$prod_group_name; ?>" >
                              
                                               </div>
                                                 </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Product Name <span class="required">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="prod_name" id="prod_name" placeholder="" value="<? echo @$prod_name; ?>" >
                            </div>
                          </div>
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Product No <span class="required">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="prod_no" id="prod_no" placeholder="" value="<? echo @$prod_no; ?>" >
                            </div>
                          </div>
						  
						  <div class="row form-group">
								<label class="col-sm-3">Ready to Publish <span class="required">*</span></label>
								<div class="col-sm-9 user-type">
									  <?
									  $i=0;
									  foreach($PS_Negot as $Neg) {
										echo "<input type='radio' name='publish' value='$i' id='$Neg'> <label for='$Neg'>$Neg</label>";
										$i++;
									  }
									  ?>
								</div>
						  </div>
						  
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Keywords<span class="required">*</span></label>
                            <div class="col-sm-9 row">
							  <div class="col-md-6">
							   <input required type="text" class="form-control" name="key1" id="key1" value="<? echo @$key1; ?>">
							   <input required type="text" class="form-control" name="key2" id="key2" value="<? echo @$key2; ?>">
							   </div>
							   <div class="col-md-6">
							   <input required type="text" class="form-control" name="key3" id="key3" value="<? echo @$key3; ?>">
							   <input required type="text" class="form-control" name="key4" id="key4" value="<? echo @$key4; ?>">
							   </div>
							   
                            </div>
                          </div>
                          
                                          
						                             <div class="row form-group add-title">
                                                        <label class="col-sm-3 label-title"> Product Group Description</label>
                                                        <div class="col-sm-9">
                                                          <textarea class="form-control" name="prod_gdes" rows="5"><? echo @$prod_gdes; ?></textarea>
                                                        </div>
                                                   </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Brief Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="b_des" rows="5"><? echo @$b_des; ?></textarea>
                            </div>
                          </div>
						  
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Detailed Description<span class="required">*</span></label>
                            <div class="col-sm-9">
                              <textarea required class="form-control" name="d_des" id="d_des" rows="5"><? echo @$d_des; ?></textarea>
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Place of Origin</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="origin" id="text" placeholder="" value="<? echo @$origin; ?>">
                            </div>
                          </div>
						  
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Specifications</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="specif" id="text" placeholder="" value="<? echo @$specif; ?>">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Certificates</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="certif" id="text" placeholder="" value="<? echo @$certif; ?>">
                            </div>
                          </div>
						  
						   <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Brand Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="bname" id="text" placeholder="" value="<? echo @$bname; ?>">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Materials / Ingredients</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="material" id="text" placeholder="" value="<? echo @$material; ?>">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">HS Code</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="hscode" id="text" placeholder="" value="<? echo @$hscode; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Model/Articles Number</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="model" id="text" placeholder="" value="<? echo @$model; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Manufacturers</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="manufac" id="text" placeholder="" value="<? echo @$manufac; ?>">
                            </div>
                          </div>
						  
						  
<ul class="list-inline pull-right">
<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
<li><button type="button" class="btn view-more-btn-3 btn-info-full" id="btn-p4">Next</button></li>
</ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step5">
                          <h4>Shipping Details</h4>
                          
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Maximum Supply Capacity<span class="required">*</span></label>
                            <div class="col-sm-9 row">
                              <div class="col-sm-6">
							     <div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" name="max_capacity" id="max_capacity" placeholder="" value="<? echo @$max_capacity; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )" >
										
									</div>
								</div> <!-- /.form-group -->
							  </div>
							  <div class="col-sm-6">
							     <select class="form-control" name="max_unit">
									 <?
									 $max_unit=isset($maxunit)?$max_unit:'';
									 echo $drop->get_dropdown($db,"select units_name,units_name from prod_units where status='0'",$max_unit);
									 ?>
								 </select>
							  </div>
							  
                            </div>
                          </div>
						  
						  <div class="row form-group">
                            <label class="col-sm-3">Shipping Terms<span class="required">*</span></label>
                            <div class="col-sm-9 user-type">
								<input type="text" class="form-control" name="sh_terms" id="sh_terms" value="<? echo @$sh_terms; ?>" >
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Packaging Details</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="pack_det" rows="5"><? echo @$pack_det; ?></textarea>
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Shipment</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="shipment" id="text" placeholder="" value="<? echo @$shipment; ?>">
                            </div>
                          </div>
						  
<ul class="list-inline pull-right">
	<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
	<li><button type="button" class="btn view-more-btn-3 btn-info-full" id="btn-p5">Next</button></li>
</ul>
                        </div>
						
						<div class="tab-pane" role="tabpanel" id="step6">
                          <h4>Custom Field(s) With More Info</h4>
                          
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Custom Fields Name-Value</label>
                            <div class="col-sm-9 row">
							  <div class="col-md-6">
							   <input type="text" class="form-control" name="cfn1" id="text" value="<? echo @$cfn1; ?>">
							  </div>
							  <div class="col-md-6">
							   <input type="text" class="form-control" name="cfn2" id="text" value="<? echo @$cfn2; ?>">
							  </div>
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Contract Period</label>
                            <div class="col-sm-9 row">
							   <input type="text" class="form-control" name="c_period" id="text" placeholder="" value="<? echo @$c_period; ?>">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Terms and Policy</label>
                            <div class="col-sm-9 row">
							   <textarea class="form-control" name="terms" rows="5"><? echo @$terms; ?></textarea>
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Warranty Period</label>
                            <div class="col-sm-9 row">
							   <input type="text" class="form-control" name="w_period" id="text" placeholder="" value="<? echo @$w_period; ?>">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Guarantee Period</label>
                            <div class="col-sm-9 row">
							   <input type="text" class="form-control" name="g_period" id="text" placeholder="" value="<? echo @$g_period; ?>">
                            </div>
                          </div>
						  
<ul class="list-inline pull-right">
	<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>
	<li><button type="submit" name="add_Prod" class="btn view-more-btn-3 btn-info-full next-step">Complete</button></li>
</ul>
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
        
		<!-- include/buissList.php -->
		
      </div>
      <!-- container -->
    </div>
	
<style>
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
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript">
			jQuery(function($) {
			
				$( "#datepicker" ).datepicker({
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
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));
			
				$( "#id-btn-dialog1" ).on('click', function(e) {
					e.preventDefault();
			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						modal: true,
						title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> jQuery UI Dialog</h4></div>",
						title_html: true,
						buttons: [ 
							{
								text: "Cancel",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							},
							{
								text: "OK",
								"class" : "btn btn-primary btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
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
			
			
				$( "#id-btn-dialog2" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#dialog-confirm" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty the recycle bin?</h4></div>",
						title_html: true,
						buttons: [
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all items",
								"class" : "btn btn-danger btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
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
				$( "#tags" ).autocomplete({
					source: availableTags
				});
			
				//custom autocomplete (category selection)
				$.widget( "custom.catcomplete", $.ui.autocomplete, {
					_create: function() {
						this._super();
						this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
					},
					_renderMenu: function( ul, items ) {
						var that = this,
						currentCategory = "";
						$.each( items, function( index, item ) {
							var li;
							if ( item.category != currentCategory ) {
								ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
								currentCategory = item.category;
							}
							li = that._renderItemData( ul, item );
								if ( item.category ) {
								li.attr( "aria-label", item.category + " : " + item.label );
							}
						});
					}
				});
				
				 var data = [
					{ label: "anders", category: "" },
					{ label: "andreas", category: "" },
					{ label: "antal", category: "" },
					{ label: "annhhx10", category: "Products" },
					{ label: "annk K12", category: "Products" },
					{ label: "annttop C13", category: "Products" },
					{ label: "anders andersson", category: "People" },
					{ label: "andreas andersson", category: "People" },
					{ label: "andreas johnson", category: "People" }
				];
				$( "#search" ).catcomplete({
					delay: 0,
					source: data
				});
				
				
				//tooltips
				$( "#show-option" ).tooltip({
					show: {
						effect: "slideDown",
						delay: 250
					}
				});
			
				$( "#hide-option" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});
			
				$( "#open-event" ).tooltip({
					show: null,
					position: {
						my: "left top",
						at: "left bottom"
					},
					open: function( event, ui ) {
						ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast" );
					}
				});
			
			
				//Menu
				$( "#menu" ).menu();
			
			
				//spinner
				var spinner = $( "#spinner" ).spinner({
					create: function( event, ui ) {
						//add custom classes and icons
						$(this)
						.next().addClass('btn btn-success').html('<i class="ace-icon fa fa-plus"></i>')
						.next().addClass('btn btn-danger').html('<i class="ace-icon fa fa-minus"></i>')
						
						//larger buttons on touch devices
						if('touchstart' in document.documentElement) 
							$(this).closest('.ui-spinner').addClass('ui-spinner-touch');
					}
				});
			
				//slider example
				$( "#slider" ).slider({
					range: true,
					min: 0,
					max: 500,
					values: [ 75, 300 ]
				});
			
			
			
				//jquery accordion
				$( "#accordion" ).accordion({
					collapsible: true ,
					heightStyle: "content",
					animate: 250,
					header: ".accordion-header"
				}).sortable({
					axis: "y",
					handle: ".accordion-header",
					stop: function( event, ui ) {
						// IE doesn't register the blur when sorting
						// so trigger focusout handlers to remove .ui-state-focus
						ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
					}
				});
				//jquery tabs
				$( "#tabs" ).tabs();
				
				
				//progressbar
				$( "#progressbar" ).progressbar({
					value: 37,
					create: function( event, ui ) {
						$(this).addClass('progress progress-striped active')
							   .children(0).addClass('progress-bar progress-bar-success');
					}
				});
			
				
				//selectmenu
				 $( "#number" ).css('width', '200px')
				.selectmenu({ position: { my : "left bottom", at: "left top" } })
					
			});
		</script>
<script>
function setSubcat(mid){
	//alert(mid);
$.ajax({
type:"POST",
url:'field_ajax.php',
data:{'val':mid},
success:function(data){
//$("#subcatdiv").css('display','block');
$("#subcat").html(data);
}  
});
}
function setSubcat2(val){
	//alert(val);
	 $.ajax({url: "subcat_ajax.php?val="+val, success: function(result){
        $("#cat1").html(result);
    }});
}
</script>
<?
include "footer.php";
include "add_Prod.php";
?>

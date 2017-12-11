<? include "header.php"; 
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act  = isSet($act) ? $act : '' ;
$page  = isSet($page) ? $page : '' ;
$COM_buss_group  = isSet($COM_buss_group) ? $COM_buss_group : '' ;
//$prod_category  = isSet($prod_category) ? $prod_category : '' ;
//$uinfo = $db->singlerec("select * from register where id='$user_id'");
//include "company_update.php";

$COM = $db->singlerec("select * from company where id ='$id'");		
@extract($COM);
//$userid=stripslashes($user_id);
//$COM_buss_group=stripslashes($buss_group);
//$prod_category=stripslashes($prod_category);
$COM_buss_group=$COM['buss_group'];
$productgroup = "<option value=''>- - Select- -</option>";
$DropDownQry = "select * from grouplist where status='0' order by groupname asc";
$productgroup .= $drop->get_dropdown($db,$DropDownQry,$COM_buss_group);

/*$productcategory = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id,category_name from category where dis_status='1' order by category_name asc";
$productcategory .= $drop->get_dropdown($db,$DropDownQry,$prod_category); */

?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>Company </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Company </li>
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
                            <h3 class="panel-title">Company</h3>
                         </div>
                         <div class="panel-body">
                         <!-- START Form Wizard -->
                            <form class="form-horizontal form-bordered form-wizard" action="company_update.php" id="wizard-validate" method="post" enctype="multipart/form-data">
                            <!-- Wizard Container 1 -->
                                <div class="wizard-title"> Category </div>
                                    <div class="wizard-container">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                             <h5 class="semibold text-primary">
                                                <i class="fa fa-sign-in"></i> Category and Images
                                                </h5>
                                                        <p class="text-muted"> Choose the Categories </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Select Your Group :<span class="text-danger">*</span> </label>
                                                    <div class="col-sm-6">
													<?$COM_buss_group = isset($COM['buss_group'])?$COM['buss_group']:'';
													
													?>	
													<select class="form-control" name="COM_buss_group" data-parsley-group="order" data-parsley-required>
													<?php echo $productgroup;?>
													<?//$com_obj->get_drop($PS_buylead_category,$COM_buss_group,'');?>
													</select>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Choose a Category to appear your listing :</label>
                                                    <div class="col-sm-6" id="cat1">
                                                        <?$COM_cat = isset($COM['category'])?$COM['category']:'';?>
														  <select class="form-control" name="COM_cat" data-parsley-group="order" data-parsley-required>
														  <option value=''>- - Select Category - -</option>
														   <?echo $drop->get_dropdown($db,"select id,category_name from category where dis_status='1' AND parent_id='0'",$COM_cat);?>
														  </select>
                                                    </div>
                                                </div>
												<!--<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Category Title : <span class="text-danger">*</span></label>
                                                    <div class="col-sm-6" id="cat1">
                                                        <?$COM_cat_title = isset($COM['category_title'])?$COM['category_title']:'';?>
														<input type="text" class="form-control" id="text" name="COM_cat_title" value="<?echo $COM_cat_title;?>" data-parsley-group="order" data-parsley-required>
                                                    </div>
                                                </div>-->
												<div class="form-group">
												 
														<label class="col-sm-2 control-label"> Logo and Certificate Images (Select Logo only):</label>
													<div class="col-sm-6">
													   <div class="upload-section">
														<label class="upload-image" for="upload-image-one">
														<input type="file" id="upload-image-one" name="COM_logo" accept="image/*" onchange="img_validate('upload-image-one',200,200,1,1,'img_div')">
														</label>					
													  </div>
													</div>
													
														<?$COM_logo = isset($COM['logo'])?$COM['logo']:'';?>
														<img src="<?echo $siteurl;?>/uploads/company/logo/<?echo $COM_logo;?>" id="img_div" width="100" height="80" <?if($COM_logo==''){?>style='display:none;'<?}?>>
													
                                                </div>
												<div class="form-group">
														<label class="col-sm-2 control-label"> Avatar pictures:</label>
													<div class="col-sm-6">
													   <div class="upload-section">
														<label class="upload-image" for="upload-image-two">
														<input type="file" id="upload-image-two" name="COM_avatar" accept="image/*" onchange="img_validate('upload-image-two',300,300,1,1,'img_div2')">
														</label>
													  </div>
													</div>
														<?$COM_avatar = isset($COM['avatar'])?$COM['avatar']:'';?>
														<img src="<?echo $siteurl;?>/uploads/company/avatar/<?echo $COM_avatar;?>" id="img_div2" width="100" height="80" <?if($COM_avatar==''){?>style='display:none;'<?}?>>
													
                                                </div>
												<div class="form-group">
														<label class="col-sm-2 control-label"> Top Banner Image:</label>
													<div class="col-sm-6">
													    <div class="upload-section">
														<label class="upload-image" for="upload-image-three">
														<input type="file" id="upload-image-three" name="COM_banner" accept="image/*" onchange="img_validate('upload-image-three',1000,600,5,3,'img_div3')">
														</label>
													  </div>
													</div>
														<?$COM_banner = isset($COM['banner'])?$COM['banner']:'';?>
														<img src="<?echo $siteurl;?>/uploads/company/banner/<?echo $COM_banner;?>" id="img_div3" width="100" height="80" <?if($COM_banner==''){?>style='display:none;'<?}?>>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Select User :<span class="text-danger">*</span> </label>
                                                    <div class="col-sm-6" id="cat1">
													<?$COM_user_id = isset($COM['user_id'])?$COM['user_id']:'';?>
                                                        <select name="user_id" onchange="findcomp(this.value)" id="user_id" class="form-control" data-parsley-group="order" data-parsley-required>
														<?echo $drop->get_dropdown($db,"select id,fname,lname from register where active_status='1'",$COM_user_id);?>
													    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Wizard Container 1 -->
                                            <!-- Wizard Container 2 -->
                                            <div class="wizard-title"> Company  </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Introduction of Company 
                                                        </h5>
                                                        <p class="text-muted">  </p>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														<div class="col-md-6">
														    <label> Company Name :<span class="text-danger">*</span></label>
                                                            <input type="text" name="COM_name" class="form-control comname" id="text" onblur="return perma(this.value)" value="<?echo isset($COM['name'])?$COM['name']:'';?>" data-parsley-group="information" data-parsley-required>
                                                        </div>
														<div class="col-md-6" id="perma">
														    <label> Permalink:<span class="text-danger">*</span></label>
                                                            <input type="text" name="permalink" id="permalink" value="<?echo isset($COM['permalink'])?$COM['permalink']:'';?>" class="form-control" readonly />
                                                        </div>
                                                    </div>
                                                </div>
												
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
														    <label> Name of Your Stores:</label>
                                                            <input type="text" name="COM_store_name" class="form-control" id="text" placeholder="" value="<?echo isset($COM['store_name'])?$COM['store_name']:'';?>">
                                                        </div>
													  <div class="col-md-6">
														<label> I am a:<span class="text-danger">*</span></label>
													   <div class="radio">
													    <? $COM_type=isset($COM['type'])?ucfirst($COM['type']):'';?>
													    <div class="col-sm-9 user-type">
														  <?foreach($PS_Im as $im){
															  if($im==$COM_type)
																  $ch="checked";
															  else
																  $ch="";
														  ?>
														  <label class="form-icon active">
														  <input type="radio" name="COM_type" value="<?echo strtolower($im);?>" <?echo $ch;?> data-parsley-group="information" data-parsley-required><?echo $im;?>
														  </label>
														  <?}?>
                                                           
														</div>
                                                       </div>
														
                                                    </div>
                                                </div>
											</div>
												<div class="form-group">
												<div class="row">
                                                    <div class="col-sm-6">
													 <label> Country:<span class="text-danger">*</span> </label>
                                                        <?$COM_country=isset($COM['country'])?$COM['country']:'101';?>
														  <select class="form-control" name="COM_country" data-parsley-group="information" data-parsley-required>
															<option value="">Select Country</option>
															<?echo $drop->get_dropdown($db,"SELECT id,nicename from countries",$COM_country);?>
														  </select>
                                                    </div>
													 <div class="col-md-6">
                                                            <label>Name of Legal Owner:</label>
                                                            <?$COM_lowner=isset($COM['legal_owner_name'])?$COM['legal_owner_name']:'';?>	
															<input type="text" name="COM_lowner" class="form-control" id="text" placeholder="" value="<?echo $COM_lowner;?>">
                                                        </div>
												</div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Business Type:<span class="text-danger">*</span></label>
                                                            <?$COM_btype=isset($COM['business_type'])?$COM['business_type']:'';?>
															  <select name="COM_btype[]" multiple class="form-control" data-parsley-group="information" data-parsley-required>
																<option value="">Select Business Type</option>
																<?echo $drop->get_dropdown_multiple($db,"SELECT id,business_name from business_type",$COM_btype);?>
															  </select>
                                                        </div>
														 <div class="col-md-4">
                                                            <label>Phone Number: </label>
															 <?$COM_phone=isset($COM['phone'])?$COM['phone']:'';?>
                                                            <input type="number" value="<? echo $COM_phone; ?>" name="COM_phone" id="COM_phone" class="form-control" data-parsley-type="number" data-parsley-length="[9,10]" data-parsley-group="information">
                                                        </div>
														 <div class="col-md-4">
                                                            <label>Fax Number: </label>
                                                            <?$COM_fax=isset($COM['fax'])?$COM['fax']:'';?>
                                                            <input type="number" value="<? echo $COM_fax; ?>" name="COM_fax" id="COM_fax" class="form-control" data-parsley-type="number" data-parsley-length="[9,10]" data-parsley-group="information">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<!--/ Wizard Container 4 -->
											<!-- Wizard Container 5 -->
											<div class="wizard-title"> Operational Address </div>
                                            <div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Operational Address
                                                        </h5>
                                                        <p class="text-muted"> </p>
                                                    </div>
                                                </div>
												 <div class="form-group">
                                                    <div class="row">
												        <div class="col-md-4">
                                                            <label>Street:<span class="text-danger">*</span></label>
                                                            <?$COM_street = isset($COM['street'])?$COM['street']:'';?>
															<input type="text" name="COM_street" class="form-control" id="text" value="<?echo $COM_street;?>" data-parsley-group="payment" data-parsley-required>
                                                        </div>
													
                                                       <div class="col-md-4">
                                                            <label>City:<span class="text-danger">*</span></label>
                                                           <?$COM_city = isset($COM['city'])?$COM['city']:'';?>
															<input type="text" name="COM_city" class="form-control" id="text" placeholder="" value="<?echo $COM_city;?>" data-parsley-group="payment" data-parsley-required>
                                                        </div>
														<div class="col-md-4">
                                                            <label>Post Code:</label>
                                                            <?$COM_zip = isset($COM['zip_code'])?$COM['zip_code']:'';?>
															<input type="text" name="COM_zip" class="form-control"data-parsley-type="number"
															data-parsley-group="information" id="text" placeholder="" value="<?echo $COM_zip;?>">
                                                        </div>
													</div>
												</div>
												
                                                <div class="form-group">
                                                    <div class="row">
														<div class="col-md-4">
                                                            <label>Web Site:</label>
                                                            <?$COM_site = isset($COM['website'])?$COM['website']:'';?>
															<input type="text" name="COM_site" class="form-control" id="text" placeholder="" value="<?echo $COM_site;?>">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <label>Five top countries you export(Comma separated value):</label>
                                                            <?$COM_ex_contries = isset($COM['export_countries'])?$COM['export_countries']:'';?>
															<input type="text" class="form-control" id="text" placeholder="" name="COM_ex_contries" value="<?echo $COM_ex_contries;?>">
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-12">
                                                            <label>Packaging Details: </label>
                                                           <?$COM_package = isset($COM['package_det'])?$COM['package_det']:'';?>
															<textarea name="COM_package" class="form-control" rows="3"><?echo $COM_package;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ Wizard Container 5 -->
											<!-- Wizard Container 6 -->
											<div class="wizard-title"> Production Capacity & Scope </div>
											<div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Production Capacity & Scope
                                                        </h5>
                                                        <p class="text-muted"> </p>
                                                    </div>
                                                </div>
												 <div class="form-group">
                                                    <div class="row">
												        <div class="col-md-4">
                                                            <label>Office Size:</label>
                                                            <?$COM_off_size=isset($COM['office_size'])?ucfirst($COM['office_size']):'';?>
															 <select class="form-control" name='COM_off_size'>
															 <option value="">Select a size</option> 
																<?foreach($PS_office as $key=>$ofs){
																  if($ofs==$COM_off_size)
																	  $ch="checked";
																  else
																	  $ch="";?>
																<option value="<?echo $key;?>" <?echo $ch;?>><?echo $ofs;?></option>
																<?}?>
															  </select>
                                                        </div>
													
                                                       <div class="col-md-4">
                                                            <label>Year Established:<span class="text-danger">*</span></label>
															<?$COM_start_yr = isset($COM['start_date'])?$COM['start_date']:'';?>
															<input type="date" name="COM_start_yr" class="form-control"id="text" placeholder="" value="<?echo $COM_start_yr;?>" data-parsley-group="experience" data-parsley-required>
                                                        </div>
														 <div class="col-md-4">
                                                            <label>Total No. Employees</label>
															<?$COM_emps = isset($COM['emp_count'])?$COM['emp_count']:'';?>
														  <select class="form-control" name='COM_emps'>
														   <option value="">Select</option> 
															<?foreach($PS_totemp as $emp){
															  if(strtolower($emp)==$COM_emps)
																  $ch="checked";
															  else
																  $ch="";?>
															<option value="<?echo strtolower($emp);?>" <?echo $ch;?>><?echo $emp;?></option>
															<?}?>
														  </select>
                                                        </div>
														
													</div>
												</div>
												
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Annual Revenue:</label>
															<?$COM_annrev = isset($COM['ann_revenue'])?$COM['ann_revenue']:'';?>
														  <select class="form-control" name='COM_annrev'>
															<option value=''>Select Annual Revenue</option>
															<?$com_obj->get_drop($PS_annrevenue,"Below US$ 1 Million","");?>
															
														  </select>
															</div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-12">
                                                            <label>Main Export Markets:<span class="text-danger">*</span></label>
                                                           <?$COM_exmarket = isset($COM['export_markets'])?$COM['export_markets']:'';
															$COM_exmarkets=explode(',',$COM_exmarket);
															$COM_exmarkets =@array_unique($COM_exmarkets);


															?>
															
															<div class="checkbox">
																
																<?foreach($PS_exportmarket as $key=>$exmarket){
																	if($key>0){
																  if(in_array($key,$COM_exmarkets))
																	  $ch="checked";
																  else
																	  $ch="";?>
																<div class="col-md-4">
																  <label for="<?echo $exmarket?>"><input type="checkbox" name="COM_exmarket[]" id="<?echo $exmarket;?>" value="<?echo $key;?>" <?echo $ch;?> data-parsley-group="experience" data-parsley-required><?echo $exmarket;?></label>
																</div>
																
																<?}}?>
															  </div>
                                                        </div>
                                                    </div>
                                                </div>
												 <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Detailed Company Introduction
                                                        </h5>
                                                        <p class="text-muted"> </p>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														<div class="col-md-6">
                                                           <label>Detailed Company Introduction: </label>
                                                           <?$COM_intro = isset($COM['company_intro'])?$COM['company_intro']:'';?>
															<textarea class="form-control" rows="3" name="COM_intro"><?echo $COM_intro;?></textarea>
                                                        </div>
														<div class="col-md-6">
                                                           <label>Company Policy: </label>
                                                           <?$COM_policy = isset($COM['company_policy'])?$COM['company_policy']:'';?>
															<textarea class="form-control" rows="3" name="COM_policy"><?echo $COM_policy;?></textarea>
                                                        </div>
														<div class="col-md-6">
                                                           <label>Payment Terms & Method: </label>
                                                           <?$COM_pterms = isset($COM['payment_terms'])?$COM['payment_terms']:'';?>
															<textarea class="form-control" rows="3" name="COM_pterms"><?echo $COM_pterms;?></textarea>
                                                        </div>
														<div class="col-md-6">
                                                           <label>Quality Control Policy: </label>
                                                           <?$COM_qcountrol = isset($COM['qc_policy'])?$COM['qc_policy']:'';?>
															<textarea class="form-control" rows="3" name="COM_qcountrol"><?echo $COM_qcountrol;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-6">
                                                            <label>Terms and condition: </label>
															<?$COM_terms = isset($COM['terms_con'])?$COM['terms_con']:'';?>
                                                           <textarea class="form-control" rows="3" name="COM_terms"><?echo $COM_terms;?></textarea>
                                                        </div>
														<div class="col-md-6">
                                                           <label>Closest Keywords to get found: </label>
                                                           <?$COM_keyword = isset($COM['close_keyword'])?$COM['close_keyword']:'';?>
															<textarea class="form-control" rows="3" name="COM_keyword"><?echo $COM_keyword;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-6">
                                                           <label>Meta Description: </label>
                                                            <?$COM_mdesc = isset($COM['meta_desc'])?$COM['meta_desc']:'';?>
															<textarea class="form-control" rows="3" name="COM_mdesc"><?echo $COM_mdesc;?></textarea>
                                                        </div>
														 <div>
                                                        </div>
                                                    </div>
                                                </div>
												
                                            </div>
											<!--/ Wizard Container 6-->
											<!-- Wizard Container 7 -->
											<div class="wizard-title"> Trade & Production Information </div>
											<div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Trade & Production Information
                                                        </h5>
                                                        <p class="text-muted"> </p>
                                                    </div>
                                                </div>
												 <div class="form-group">
                                                    <div class="row">
												        <div class="col-md-6">
                                                           <label>Main Clients: </label>
                                                            <?$COM_mclients = isset($COM['main_clients'])?$COM['main_clients']:'';?>
															<textarea class="form-control" rows="3" name="COM_mclients"><?echo $COM_mclients;?></textarea>
                                                        </div>
													
                                                       <div class="col-md-6">
                                                           <label>Year of Registration:<span class="text-danger">*</span></label>
                                                           <?$COM_rdate = isset($COM['registration_date'])?$COM['registration_date']:'';?>
															<input type="date" class="form-control" id="text" name="COM_rdate" placeholder="" value="<?echo $COM_rdate;?>" data-parsley-group="other" data-parsley-required>
                                                        </div>
													</div>
												</div>
												
                                                <div class="form-group">
                                                    <div class="row">
														<div class="col-md-6">
                                                           <label>Major Product(s) you sell (For Sellers):</label>
                                                           <?$COM_mproduct = isset($COM['major_product_sell'])?$COM['major_product_sell']:'';?>
															<input type="text" class="form-control" id="text" name="COM_mproduct" placeholder="" value="<?echo $COM_mproduct;?>">
                                                          </div>
                                                        <div class="col-md-6">
                                                           <label>Major Product(s) you buy (For Buyers):</label>
                                                           <?$COM_bproduct = isset($COM['major_product_buy'])?$COM['major_product_buy']:'';?>
															<input type="text" class="form-control" id="text" name="COM_bproduct" placeholder="" value="<?echo $COM_bproduct;?>">
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														<div class="col-md-3">
                                                           <label>Main Products:<span class="text-danger">*</span></label>
                                                           <?$COM_mproduct1 = isset($COM['main_product1'])?$COM['main_product1']:'';?>
															<input type="text" class="form-control" id="text" name="COM_mproduct1" value="<?echo $COM_mproduct1;?>" data-parsley-group="other" data-parsley-required>
                                                        </div>
														<div class="col-md-3">
                                                           <label>Main Products 1:<span class="text-danger">*</span></label>
                                                           <?$COM_mproduct2 = isset($COM['main_product2'])?$COM['main_product2']:'';?>
															<input type="text" class="form-control" id="text" name="COM_mproduct2" value="<?echo $COM_mproduct2;?>" data-parsley-group="other" data-parsley-required>
                                                        </div>
														<div class="col-md-3">
                                                           <label>Main Products 2:<span class="text-danger">*</span></label>
                                                            <?$COM_mproduct3 = isset($COM['main_product3'])?$COM['main_product3']:'';?>
															<input type="text" class="form-control" id="text" name="COM_mproduct3" value="<?echo $COM_mproduct3;?>" data-parsley-group="other" data-parsley-required>
                                                        </div>
														<div class="col-md-3">
                                                           <label>Main Products 3:<span class="text-danger">*</span></label>
                                                           <?$COM_mproduct4 = isset($COM['main_product4'])?$COM['main_product4']:'';?>
															<input type="text" class="form-control" id="text" name="COM_mproduct4" value="<?echo $COM_mproduct4;?>" data-parsley-group="other" data-parsley-required>
                                                        </div>
														
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
														 <div class="col-md-6">
                                                           <label>Other Products You Sell: </label>
                                                            <?$COM_oproducts = isset($COM['other_product'])?$COM['other_product']:'';?>
															<textarea class="form-control" rows="3" name="COM_oproducts"><?echo $COM_oproducts;?></textarea>
                                                        </div>
														<div class="col-md-6">
                                                           <label>Production Capacity:</label>
                                                           <?$COM_production_limit = isset($COM['production_capacity'])?$COM['production_capacity']:'';?>
															<input type="text" class="form-control" id="text" name="COM_production_limit" value="<?echo $COM_production_limit;?>">
                                                        </div>
                                                    </div>
                                                </div>
												 
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-3">
                                                           <label>Factory Location:</label>
                                                           <?$COM_factory_loc = isset($COM['factory_location'])?$COM['factory_location']:'';?>
															<input type="text" class="form-control" id="text" name="COM_factory_loc" placeholder="" value="<?echo $COM_factory_loc;?>">
                                                        </div>
														<div class="col-md-3">
                                                           <label>Factory Size:</label>
                                                           <?$COM_factory_size = isset($COM['factory_size'])?$COM['factory_size']:'';?>
															<input type="text" class="form-control" id="text" name="COM_factory_size" placeholder="" value="<?echo $COM_factory_size;?>">
                                                        </div>
														<div class="col-md-3">
                                                           <label>Average Lead Time:</label>
                                                           <?$COM_lead_time = isset($COM['avg_lead_time'])?$COM['avg_lead_time']:'';?>
															<input type="text" class="form-control" id="text" name="COM_lead_time" placeholder="" value="<?echo $COM_lead_time;?>">
                                                        </div>
														<div class="col-md-3">
                                                           <label>Nearest Port:</label>
                                                           <?$COM_near_port = isset($COM['nearest_port'])?$COM['nearest_port']:'';?>
															<input type="text" class="form-control" id="text" name="COM_near_port" placeholder="" value="<?echo $COM_near_port; ?>">
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-12">
                                                            <label>Compliance(s) you are maintaining:<span class="text-danger">*</span> </label>
                                                           <?
															$COM_compliance = isset($COM['compliance'])?$COM['compliance']:'';
															$COM_compliances = explode(',',$COM_compliance);
															?>
															  <select class="form-control" name='COM_compliance[]' multiple data-parsley-group="other" data-parsley-required>
																<?foreach($PS_compliance as $compliance){
																  if(in_array(strtolower($compliance),$COM_compliances))
																	  $ch="selected";
																  else
																	  $ch="";?>
																<option value="<?echo strtolower($compliance);?>" <?echo $ch;?>><?echo $compliance;?></option>
																<?}?>
															  </select>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														 <div class="col-md-6">
                                                           <label>Export Percentage: </label>
                                                           <?$COM_percentage = isset($COM['ex_percentage'])?$COM['ex_percentage']:'';?>
														  <select class="form-control" name='COM_percentage'>
															<?$com_obj->get_drop($PS_percentage,'2','%');?>
														  </select>
                                                        </div>
														 <div class="col-md-6">
                                                           <label>Do you accept order through our service?<span class="text-danger">*</span></label>
                                                          <?$COM_acpt_order = isset($COM['acpt_order'])?$COM['acpt_order']:'';?>
															<?$com_obj->get_radio($PS_Negot,$COM_acpt_order,'COM_acpt_order');?>
                                                        </div>
														 <div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
													 <div class="col-md-6">
                                                           <label>Have you attended or planned to attend any trade shows?:<span class="text-danger">*</span> </label>
                                                           <?$COM_trade_show = isset($COM['trade_show'])?$COM['trade_show']:'';?>
															<?$com_obj->get_radio($PS_Negot,$COM_trade_show,'COM_trade_show');?>
                                                        </div>
												    </div>
                                                </div>
                                            </div>
											<!--/ Wizard Container 7 -->
											<!-- Wizard Container 8 -->
											<div class="wizard-title"> Terms and Policies </div>
											<div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Terms and Policies
                                                        </h5>
                                                        <p class="text-muted"> </p>
                                                    </div>
                                                </div>
												 <div class="form-group">
                                                    <div class="row">
												        <div class="col-md-6">
                                                           <label>Annual Sales Volume: </label>
                                                            <?$COM_an_sales = isset($COM['annual_sales'])?$COM['annual_sales']:'';?>
														  <select class="form-control" name="COM_an_sales">
															<option>Select Annual Sales Volume</option>
															<?$com_obj->get_drop($PS_annrevenue,$COM_an_sales,'');?>
														  </select>
                                                        </div>
													
                                                       <div class="col-md-6">
                                                           <label>Accepted Payment Currency:<span class="text-danger">*</span></label>
                                                           <?$COM_ap_currency = isset($COM['ap_currency'])?$COM['ap_currency']:'';
															$COM_ap_currencys = explode(',',$COM_ap_currency);
															$COM_ap_currencys = array_unique($COM_ap_currencys);
		   
														   
														   ?>
														<div class="col-sm-9 user-type">
															<?//$com_obj->get_radio($PS_paycurrency,$COM_ap_currency,'COM_ap_currency');?>
															
														 <?foreach($PS_paycurrency as $key2=>$currency)
														 {
															if($key2>0)
															{
																if(in_array($key2,$COM_ap_currencys))
																	$ch="checked";
																else
																$ch="";
															?>
															<div class="col-md-3">
															<label for="<?echo $currency?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_ap_currency[]" id="<?echo $currency;?>" value="<?echo $key2;?>" <?echo $ch;?> data-parsley-group="terms" data-parsley-required><?echo $currency;?></label>
															</div>
														<?}}?>	
															
															
															
															
															
															
															
															
															
														</div>
                                                       </div>
													</div>
												</div>
												 <div class="form-group">
                                                    <div class="row">
													 <label>Accepted Delivery Terms:<span class="text-danger">*</span></label>
														<div class="col-md-12">
                                                          
                                                            <?$COM_ad_terms = isset($COM['ad_terms'])?$COM['ad_terms']:'';
																$COM_ad_term = explode(',',$COM_ad_terms);
																$COM_ad_term = array_unique($COM_ad_term);
															
															
															?>
															<?//$com_obj->get_radio($PS_delivery,$COM_ad_terms,'COM_ad_terms');?>
															
															 <?foreach($PS_delivery as $key1=>$delivery){

								if($key1>0){

								  if(in_array($key1,$COM_ad_term))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-4">

                                  <label for="<?echo $delivery?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_ad_terms[]" id="<?echo $delivery;?>" value="<?echo $key1;?>" <?echo $ch;?> data-parsley-group="terms" data-parsley-required><?echo $delivery;?></label>

                                </div>

								

								<?}}?>
										
                                                        </div>
													</div>
												</div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
														 <label>Payment Method:</label>
													<?
													$COM_pay_method = isset($COM['payment_mths'])?$COM['payment_mths']:'';
													$COM_pay_methods=explode(',',$COM_pay_method); ?>
													<div class="checkbox">
													<?foreach($PS_paymentmethod as $key=>$paymethod){
														if($key>0)
														{
														  if(in_array($key,$COM_pay_methods))
															  $ch="checked";
														  else
															  $ch="";
														  
														} ?>
														<div class="col-md-4">
														  <label for="<?echo $paymethod?>"><input type="checkbox" name="COM_pay_method[]" id="<?echo $paymethod;?>" value="<?echo $key;?>" <?echo $ch;?> ><?echo $paymethod;?></label>
														</div>
														
														<?}?>
													</div>
													   
													</div>
                                                   </div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
													 <label>Spoken Language:<span class="text-danger">*</span></label>
														<div class="col-md-12">
														   <div class="col-sm-9 user-type">
                                                           <?$COM_language = isset($COM['language'])?$COM['language']:'';
														   $COM_languages=explode(',',$COM_language);
														   $COM_languages = array_unique($COM_languages);
														   
														   
														   ?>
														   <?//$com_obj->get_radio($PS_spoken,$COM_language,'COM_language');?>
														   
														   
                            <?foreach($PS_spoken as $key3=>$language){

								if($key3>0){

								  if(in_array($key3,$COM_languages))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-3">

                                  <label for="<?echo $language?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_language[]" id="<?echo $language;?>" value="<?echo $key3;?>" <?echo $ch;?> data-parsley-group="terms" data-parsley-required><?echo $language;?></label>

                                </div>

								

								<?}}?>

														   
														   
														   
														   
														   </div>
                                                        </div>
													 </div>
                                                </div>
														
												<div class="form-group">
                                                    <div class="row">
													<label>Company Certification:<span class="text-danger">*</span></label>
														<div class="col-md-12">
														   <div class="col-sm-9 user-type">
                                                           <?$COM_certificate = isset($COM['certification'])?$COM['certification']:'';
														     $COM_certificates=explode(',',$COM_certificate);
															 $COM_certificates = array_unique($COM_certificates);
														   
														   
														   
														   ?>
														   <?//$com_obj->get_radio($PS_certificate,$COM_certificate,'COM_certificate');?> 
														   <?foreach($PS_certificate as $key4=>$certificate){

								if($key4>0){

								  if(in_array($key4,$COM_certificates))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-3">

                                  <label for="<?echo $certificate?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_certificate[]" id="<?echo $certificate;?>" value="<?echo $key4;?>" <?echo $ch;?> data-parsley-group="terms" data-parsley-required><?echo $certificate;?></label>

                                </div><?}}?>
														   </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										<!--/ Wizard Container 8 -->
										<!-- Wizard Container 9 -->										
										<div class="wizard-title"> Social Media </div>
											<div class="wizard-container">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h5 class="semibold text-primary">
                                                            <i class="fa fa-cog"></i> Social Media
                                                        </h5>
                                                        <p class="text-muted">  </p>
                                                    </div>
                                                </div>
												 <div class="form-group">
                                                    <div class="row">
												        <div class="col-md-6">
                                                           <label>Facebook Id:</label>
                                                           <?$COM_fb = isset($COM['facebook'])?$COM['facebook']:'';?>
															<input type="text" name="COM_fb" class="form-control" id="text" placeholder="" value="<?echo $COM_fb;?>">
                                                        </div>
													
                                                       <div class="col-md-6">
                                                           <label>Twitter Id:</label>
                                                           <?$COM_tw = isset($COM['twitter'])?$COM['twitter']:'';?>
															<input type="text" name="COM_tw" class="form-control" id="text" value="<?echo $COM_tw;?>" placeholder="">
                                                       </div>
													</div>
												</div>
												
                                                <div class="form-group">
                                                    <div class="row">
														<div class="col-md-6">
                                                           <label>Googleplus Id:</label>
                                                           <?$COM_gp = isset($COM['gplus'])?$COM['gplus']:'';?>
															<input type="text" name="COM_gp" class="form-control" id="text" placeholder="" value="<?echo $COM_gp;?>">
                                                        </div>
                                                        <div class="col-md-6">
														 <label>Flickr Id:</label>
														<?$COM_fk = isset($COM['flickr'])?$COM['flickr']:'';?>
														<input type="text" name="COM_fk" class="form-control" value="<?echo $COM_fk;?>">
														   
														</div>
                                                    </div>
                                                </div>
												 <div class="form-group">
                                                    <div class="row">
														<div class="col-md-6">
                                                           <label>Youtube Id:</label>
                                                           <?$COM_yt = isset($COM['youtube'])?$COM['youtube']:'';?>
															<input type="text" name="COM_yt" class="form-control" id="text" placeholder="" value="<?echo $COM_yt;?>">
                                                        </div>
													</div>
                                                </div>
												<div class="form-group">
                                                    <div class="row">
														<div class="col-md-6">
                                                         <input type="hidden" name="COM_submit" value="COM_submit">
														 <input type="hidden" name="upd" value="<? echo $upd; ?>">
														 <input type="hidden" name="id" value="<? echo $id; ?>">
                                                        </div>
													</div>
                                                </div>
												
														
                                            </div>
										<!--/ Wizard Container 9 -->	
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

function findcomp(gg)
{
	
	$.ajax({url: "findcom_ajax.php?val="+gg, success: function(result){
        $(".comname").val(result);
		$(".comname").attr('readonly', true);
		$.ajax({url: "perma_ajax.php?val="+result, success: function(result1){
        $("#perma").html(result1);
		}});
		
	}});
	
	
}

function categ(val){
	//alert(val);
	 $.ajax({url: "cat_ajax.php?val="+val, success: function(result){
        $("#cat1").html(result);
    }});
}
</script>	
<script>
function perma(val){
	//alert(val);
	 $.ajax({url: "perma_ajax.php?val="+val, success: function(result){
        $("#perma").html(result);
    }});
}
</script>
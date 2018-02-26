
<?

include "header.php";

include "include/searchDiv.php";

include "include/useronly.php";

$uinfo = $db->singlerec("select * from register where id='$user_id'");

$COM = $db->singlerec("select * from company where user_id ='$user_id'");

//

if(!empty($COM)){

	$_SESSION['COM_id'] = $COM['id'];

}else{

	$_SESSION['COM_id'] = '';	

}

include "add_COM.php";
$COM_buss_group=$COM['buss_group'];
$productgroup = "<option value=''>- - Select- -</option>";
$DropDownQry = "select * from grouplist where status='0' order by groupname asc";
$productgroup .= $drop->get_dropdown($db,$DropDownQry,$COM_buss_group);

?>

<!-----datepicker------------>

		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />

<!-----datepicker------------>

<style>

.fa{     font-size: 1.5em;}

      .wizard .nav-tabs > li {    width: 19.9%;}

      .slider input {    display: inline-block;    margin-bottom: 15px;}

.error {

	color: #d61c23;

	float: left;

}

</style>



    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">

      <div class="container continr-bg">

       <?include "include/profile-left.php";?>

        <div class="col-sm-9 col-md-9">

          <div class="adpost-details">

            <div class="well">

              <div class="section slider">

                <div class="row" style="    margin-top: -50px;">

                  <div class="wizard">

                    <div class="wizard-inner">

                      <!-- <div class="connecting-line"></div> -->

                      <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="text-center  active">

                          <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1" aria-expanded="false">

                          <span class="round-tab">

                          <i class="fa fa-building-o" aria-hidden="true"></i>

                          </span>

                          </a>

                          <p class="register-info">Company Details</p>

                        </li>

                        <li role="presentation" class="disabled text-center">

                          <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" aria-expanded="false">

                          <span class="round-tab">

                          <i class="fa fa-globe" aria-hidden="true"></i>

                          </span>							

                          </a>

                          <!--<p class="register-info">Company <br> Details</p>-->

						  <p class="register-info">Business <br> Details</p>

                        </li>

                        <li role="presentation" class="disabled text-center">

                          <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" aria-expanded="false">

                          <span class="round-tab">

                          <i class="fa fa-industry" aria-hidden="true"></i>

                          </span>

                          </a>

                          <p class="register-info">Trade Details</p>

                        </li>

                        <li role="presentation" class="disabled text-center">

                          <a href="#complete" data-toggle="tab" aria-controls="step4" role="tab" title="step4" aria-expanded="true">

                          <span class="round-tab">

                          <i class="fa fa-info-circle" aria-hidden="true"></i>

                          </span>

                          </a>

                          <p class="register-info">Trade Policies </p>

                        </li>

                        <li role="presentation" class="disabled text-center">

                          <a href="#step5" data-toggle="tab" aria-controls="complete" role="tab" title="complete" aria-expanded="true">

                          <span class="round-tab">

                          <i class="fa fa-list-alt" aria-hidden="true"></i>

                          </span>

                          </a>

                          <p class="register-info">Category & Images </p>

                        </li>

                      </ul>

                    </div>

                    <form role="form" action="#" method="POST" enctype="multipart/form-data" nonvalidate>

                      <div class="tab-content well" >

                        <div class="tab-pane active" role="tabpanel" id="step1">

                          <h4>Basic Information</h4>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Company Name<span class="required">*</span></label>

                            <div class="col-sm-9">

                              <input type="text" name="COM_name" class="form-control" id="com_name" placeholder="" value="<?echo isset($COM['name'])?$COM['name']: $uinfo['company_name'];?>" <?php if($uinfo['company_name']!=""){ echo "readonly";} ?>>

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Store Name<span class="required">*</span></label>

                            <div class="col-sm-9">

                                <input type="text" name="COM_store_name" maxlength="60" class="form-control" id="store_name" placeholder="" value="<?echo isset($COM['store_name'])?$COM['store_name']:'';?>">

                            </div>

                          </div>

                          <div class="row form-group">

                            <label class="col-sm-3">I am a<span class="required">*</span></label>

							<?$COM_type=isset($COM['type'])?ucfirst($COM['type']):'';?>

                            <div class="col-sm-9 user-type">

                              <?foreach($PS_Im as $im){

								  if($im==$COM_type)

									  $ch="checked";

								  else

									  $ch="";

							  ?>

							  <input type="radio" name="COM_type" value="<?echo strtolower($im);?>" id="<?echo $im;?>" <?echo $ch;?>> <label for="<?echo $im;?>"><?echo $im;?></label>

                              <?}?>

                            </div>

                          </div>
                          
                          
                           <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Office Size<span class="required">*</span></label>

                            <div class="col-sm-9">

<!--							 <?$COM_off_size=isset($COM['office_size'])?$COM['office_size']:'';?>

							 <select class="form-control" name='COM_off_size' id="off_size">
                                                                
                                                             

								<?foreach($PS_office as $key0=>$ofs){

								  if(strtolower($ofs)==strtolower($COM_off_size))

									  $ch="checked";

								  else

									  $ch="";?>
                                
                                <option value="<?echo $ofs;?>" <?echo $ch;?>><?echo $ofs;?></option>

								<?}?>

                              </select>-->
                                
                                <?$COM_off_size=isset($COM['office_size'])?ucfirst($COM['office_size']):'';?>
                                              
                                                <select class="form-control" name='COM_off_size' id='COM_off_size'>
                                                    
                                                    <option value=''>Select Office size</option>
                                                    <?$com_obj->get_drop($Comp_offc_Size,$COM_off_size,'');?>
                                                </select>

                            </div>

                          </div>
                          
                           <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Year of Registration<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_rdate = isset($COM['registration_date'])?$COM['registration_date']:'';?>

                              <input type="date" class="form-control" id="text" name="COM_rdate" placeholder="" value="<?echo $COM_rdate;?>">

                            </div>

                          </div>

                          

                          <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Total No. of Employees<span class="required">*</span></label>

                            <div class="col-sm-9">

<!--							<?$COM_emps = isset($COM['emp_count'])?$COM['emp_count']:'';?>

                              <select class="form-control" name='COM_emps'>
                                     

								<?foreach($PS_totemp as $emp){

								  if(strtolower($emp)==$COM_emps)

									  $ch="checked";

								  else

									  $ch="";?>

                                <option value="<?echo strtolower($emp);?>" <?echo $ch;?>><?echo $emp;?></option>

								<?}?>

                              </select>-->
                                <?$COM_emps = isset($COM['emp_count'])?$COM['emp_count']:'';?>
                                                <select class="form-control" name='COM_emps' id='COM_emps'>
                                                    
                                                    <option value=''>Select Employee Range</option>
                                                    <?$com_obj->get_drop($PS_totemp,$COM_emps,'');?>
                                                </select>

                            </div>

                          </div>

                          <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Total Annual Revenue<span class="required">*</span></label>

                            <div class="col-sm-9">

							

<!--							<?$COM_annrev = isset($COM['ann_revenue'])?$COM['ann_revenue']:'';?>

                              <select class="form-control" name='COM_annrev'>

								<option value=''>Select Annual Revenue</option>



								<?$com_obj->get_drop($PS_annrevenue,"Below US$ 1 Million","");?>

								

                              </select>-->
                                <?$COM_annrev = isset($COM['ann_revenue'])?$COM['ann_revenue']:'';?>
                                                <select class="form-control" name='COM_annrev' id='COM_annrev' >
                                                    <option value=''>Select Annual Revenue</option>
                                                    <?$com_obj->get_drop($PS_annrevenue,$COM_annrev,"");?>

                                                </select>

                            </div>

                          </div>
                          
                          
                           <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Add Contact Person<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_lowner=isset($COM['legal_owner_name'])?$COM['legal_owner_name']:'';?>	

                                                        <input type="text"  maxlength="60"  name="COM_lowner" class="form-control" id="COM_lowner" placeholder="" value="<?echo $COM_lowner;?>">

                            </div>

                          </div>

                          <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Business Type<span class="required">*</span></span></label>

                            <div class="col-sm-9">

							<?$COM_btype=isset($COM['business_type'])?$COM['business_type']:'';?>

                              <select class="form-control" name="COM_btype[]" multiple id="buss_type">

                                <option value="" disabled>Select Business Type</option>

                                <?echo $drop->get_dropdown_multiple($db,"SELECT id,business_name from business_type",$COM_btype);?>

                              </select>

                            </div>

                          </div>

                          
                          
                          
                          
                          
                          
                          

                          <div>
                           <h4>Address</h4>
                           <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Address<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_street = isset($COM['street'])?$COM['street']:'';?>

                                                        <input type="text" maxlength="110" name="COM_street" class="form-control" id="street" placeholder="" value="<?echo $COM_street;?>">

                            </div>

                          </div>
                           <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Country <span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_country=isset($COM['country'])?$COM['country']:'154';?>

                              <select class="form-control" name="COM_country" id="country" Onchange="return get_state(this.value);">

								<option value="">Select Country</option>

                                <?echo $drop->get_dropdown($db,"SELECT id,nicename from countries",$COM_country);?>

                              </select>

                            </div>

                          </div>

						  <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">State <span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_state=isset($COM['state'])?$COM['state']:'';?>

                              <select class="form-control" name="COM_state" id="state" Onchange="return get_city(this.value);">

								<option value="">Select State</option>

                                <?echo $drop->get_dropdown($db,"SELECT state_id,state_name from states",$COM_state);?>

                              </select>

                            </div>

                          </div>

						  <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">City<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_city = isset($COM['city'])?$COM['city']:'';?>

							 <select class="form-control" name="COM_city" id="city">

								<option value="">Select City</option>

                                <?echo $drop->get_dropdown($db,"SELECT city_auto_id,city_name from city",$COM_city);?>

                              </select>

                            </div>

                          </div>
                          

                          

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Post Code<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_zip = isset($COM['zip_code'])?$COM['zip_code']:'';?>

                                                        <input type="text" name="COM_zip" class="form-control" maxlength="12" id="zip_code" placeholder="" value="<?echo $COM_zip;?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46) )">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Website</label>

                            <div class="col-sm-9">

							<?$COM_site = isset($COM['website'])?$COM['website']:'';?>

                              <input type="text"   pattern="^(https?://)?([a-zA-Z0-9]([a-zA-ZäöüÄÖÜ0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$"  name="COM_site" class="form-control" placeholder="url format (www.domainname.com)" title="url format :(www.domainname.com)" id="text"  value="<?echo $COM_site;?>">
                           

                            </div>

                          </div>

						  

						  

						  

                          <!--<div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Five top countries you export</label>

                            <div class="col-sm-9">

							<?$COM_ex_contries = isset($COM['export_countries'])?$COM['export_countries']:'';?>

                              <input type="text" class="form-control" id="text" placeholder="" name="COM_ex_contries" value="<?echo $COM_ex_contries;?>">

                            </div>

                          </div>-->

						  

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Operational Address</label>

                            <div class="col-sm-9">

							<?$COM_package = isset($COM['package_det'])?$COM['package_det']:'';?>

                                                        <textarea maxlength="110" name="COM_package" class="form-control" rows="3"><?echo $COM_package;?></textarea>

                            </div>

                          </div>

                          </div>
                         
                          <h4>Social Media</h4>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Facebook Id</label>

                            <div class="col-sm-9">

								<?$COM_fb = isset($COM['facebook'])?$COM['facebook']:'';?>

                              <input type="text" name="COM_fb" class="form-control" id="text" placeholder="" value="<?echo $COM_fb;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Twitter Id</label>

                            <div class="col-sm-9">

							<?$COM_tw = isset($COM['twitter'])?$COM['twitter']:'';?>

                              <input type="text" name="COM_tw" class="form-control" id="text" value="<?echo $COM_tw;?>" placeholder="">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Googleplus Id</label>

                            <div class="col-sm-9">

							<?$COM_gp = isset($COM['gplus'])?$COM['gplus']:'';?>

                              <input type="text" name="COM_gp" class="form-control" id="text" placeholder="" value="<?echo $COM_gp;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Flickr Id</label>

                            <div class="col-sm-9">

							<?$COM_fk = isset($COM['flickr'])?$COM['flickr']:'';?>

                              <input type="text" name="COM_fk" class="form-control" id="text" placeholder="" value="<?echo $COM_fk;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Youtube Id</label>

                            <div class="col-sm-9">

							<?$COM_yt = isset($COM['youtube'])?$COM['youtube']:'';?>

                              <input type="text" name="COM_yt" class="form-control" id="text" placeholder="" value="<?echo $COM_yt;?>">

                            </div>

                          </div>

<ul class="list-inline pull-right pdt20">

	<li><button type="button" class="btn view-more-btn-3" id="btn-mc1">Save and continue</button></li>

</ul>

                        </div>

                        <div class="tab-pane" role="tabpanel" id="step2">

                            <h4> Statutory Details</h4>

                         <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">GST No.<span class="required">*</span></label>

                            <div class="col-sm-9">

                              <input type="text" name="gst_no" class="form-control" id="gst_no" placeholder="Enter Gst No" value="<?echo isset($COM['gst_no'])?$COM['gst_no']:'';?>">

                            </div>

                          </div>
                             <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">PAN No.<span class="required">*</span></label>

                            <div class="col-sm-9">

                                <input type="text" maxlength="60" name="pan_no" class="form-control" id="pan_no" placeholder="Enter PAN No" value="<?echo isset($COM['pan_no'])?$COM['pan_no']:'';?>">

                            </div>

                          </div>
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Registration No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="reg_no" maxlength="60" class="form-control" id="reg_no" placeholder="Enter Registration No" value="<?echo isset($COM['reg_no'])?$COM['reg_no']:'';?>">

                            </div>

                          </div>
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Registration Auhority.</label>

                            <div class="col-sm-9">

                              <input type="text" name="reg_auth" maxlength="60" class="form-control" id="reg_auth" placeholder="Enter Registration Authority" value="<?echo isset($COM['reg_auth'])?$COM['reg_auth']:'';?>">

                            </div>

                          </div>
                             
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">CIN No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="cin_no"  maxlength="60"class="form-control" id="cin_no" placeholder="Enter CIN No" value="<?echo isset($COM['cin_no'])?$COM['cin_no']:'';?>">

                            </div>

                          </div>
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">TAN No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="tan_no" maxlength="60" class="form-control" id="tan_no" placeholder="Enter TAN No" value="<?echo isset($COM['tan_no'])?$COM['tan_no']:'';?>">

                            </div>

                          </div>
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Service Tax No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="service_tax_no"  maxlength="60" class="form-control" id="service_tax_no" placeholder="Enter Service Tax No" value="<?echo isset($COM['service_tax_no'])?$COM['service_tax_no']:'';?>">

                            </div>

                          </div>
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Excise Reg.No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="excise_reg_no" maxlength="60" class="form-control" id="excise_reg_no" placeholder="Enter Excise Reg. No" value="<?echo isset($COM['excise_reg_no'])?$COM['excise_reg_no']:'';?>">

                            </div>

                          </div>
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">TIN/VAT No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="vat_no"  maxlength="60" class="form-control" id="vat_no" placeholder="Enter TIN/VAT No" value="<?echo isset($COM['vat_no'])?$COM['vat_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">DGFT/E No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="dgft_no" maxlength="60" class="form-control" id="dgft_no" placeholder="Enter DGFT/E No" value="<?echo isset($COM['dgft_no'])?$COM['dgft_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">CST No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="cst_no" maxlength="60" class="form-control" id="cst_no" placeholder="Enter CST No" value="<?echo isset($COM['cst_no'])?$COM['cst_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">SSI/MSME No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="ssimsme_no" maxlength="60" class="form-control" id="ssimsme_no" placeholder="Enter SSI/MSME No" value="<?echo isset($COM['ssimsme_no'])?$COM['ssimsme_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">EPF No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="epf_no" maxlength="60" class="form-control" id="epf_no" placeholder="Enter EPF No" value="<?echo isset($COM['epf_no'])?$COM['epf_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">ESI No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="esi_no" maxlength="60" class="form-control" id="esi_no" placeholder="Enter ESI No" value="<?echo isset($COM['esi_no'])?$COM['esi_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">SCT No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="sct_no" maxlength="60" class="form-control" id="sct_no" placeholder="Enter SCT No" value="<?echo isset($COM['sct_no'])?$COM['sct_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">DNB No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="dnb_no"  maxlength="60" class="form-control" id="dnb_no" placeholder="Enter DNB No" value="<?echo isset($COM['dnb_no'])?$COM['dnb_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">RBI No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="rbi_no" maxlength="60" class="form-control" id="rbi_no" placeholder="Enter RBI No" value="<?echo isset($COM['rbi_no'])?$COM['rbi_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">FSSAI-LISCENE No.</span></label>

                            <div class="col-sm-9">

                              <input type="text" name="fssai_liscene_no" maxlength="60" class="form-control" id="fssai_liscene_no" placeholder="Enter FSSAI-LISCENE No." value="<?echo isset($COM['fssai_liscene_no'])?$COM['fssai_liscene_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">NSIC No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="nsic_no" maxlength="60" class="form-control" id="nsic_no" placeholder="Enter NSIC No" value="<?echo isset($COM['nsic_no'])?$COM['nsic_no']:'';?>">

                            </div>

                          </div>
                            
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">SST No.</label>

                            <div class="col-sm-9">

                              <input type="text" name="sst_no" maxlength="60" class="form-control" id="store_name" placeholder="Enter SST No" value="<?echo isset($COM['sst_no'])?$COM['sst_no']:'';?>">

                            </div>

                          </div>
                            
                           
                            
                            
                          

                         

                         
                          <h4>Company Profile</h4>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Company Brief Description<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_intro = isset($COM['company_intro'])?$COM['company_intro']:'';?>

                                                        <textarea class="form-control" maxlength="1000" id="COM_intro" placeholder="Enter Company Brief Description !!Character maxlength should up to 1000" required title="Character maxlength should up to 1000" rows="3" name="COM_intro"><?echo $COM_intro;?></textarea>

                            </div>
                            

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Company Detail Description <span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_policy = isset($COM['company_policy'])?$COM['company_policy']:'';?>

                                                        <textarea class="form-control" id="company_policy" maxlength="9000" placeholder="Enter Company detailed Description !!Character maxlength should up to 9000" rows="3" name="COM_policy" id="policy"><?echo $COM_policy;?></textarea>

                            </div>

                          </div>
                          
                           <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Product Portfolio<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$prod_portfolio = isset($COM['prod_portfolio'])?$COM['prod_portfolio']:'';?>

                                                        <textarea maxlength="2000" id="prod_portfolio" required title="Enter Product Portfolio!!Character maxlength should up to 2000" placeholder="Enter Product Portfolio upto 6000 chatacters"class="form-control" rows="3" name="prod_portfolio"><?echo $prod_portfolio;?></textarea>

                            </div>
                            

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Awards & Testimonials</label>

                            <div class="col-sm-9">

							<?$COM_pterms = isset($COM['payment_terms'])?$COM['payment_terms']:'';?>

                                                        <textarea maxlength="6000"  title="Enter Awards and Testimonials!!Character maxlength should up to 6000" placeholder="Enter Awards & Testimonials upto 6000 chatacters"class="form-control" rows="3" name="COM_pterms"><?echo $COM_pterms;?></textarea>

                            </div>
                            

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Quality & Compliance</label>

                            <div class="col-sm-9">

                              <?$COM_qcountrol = isset($COM['qc_policy'])?$COM['qc_policy']:'';?>

                              <textarea   title="Enter Quality & Compliance upto 6000 chatacters"  placeholder="Enter Quality & Compliance upto 6000 chatacters" maxlength="6000" minlength="1"  class="form-control" rows="3" name="COM_qcountrol"><?echo $COM_qcountrol;?></textarea>

                            </div>

                          </div>
                          

                          <div class="row form-group add-title">

						  <?$COM_terms = isset($COM['terms_con'])?$COM['terms_con']:'';?>

                            <label class="col-sm-3 label-title">Infrastructure & Facilities </label>

                            <div class="col-sm-9">

                                <textarea class="form-control" maxlength="6000"  title="Enter Infrastructure & Facilities upto 6000 chatacters" placeholder="Enter Infrastructure & Facilities upto 6000 chatacters" rows="3" name="COM_terms" id="terms"><?echo $COM_terms;?></textarea>

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Keywords</label>

                            <div class="col-sm-9">

							<?$COM_keyword = isset($COM['close_keyword'])?$COM['close_keyword']:'';?>

                                                        <textarea class="form-control"  maxlength="600"   placeholder="Enter Keywords" title="Enter kewords upto 600 character" rows="3" name="COM_keyword"><?echo $COM_keyword;?></textarea>

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Meta Description</label>

                            <div class="col-sm-9">

							<?$COM_mdesc = isset($COM['meta_desc'])?$COM['meta_desc']:'';?>

                                                        <textarea maxlength="600" placeholder="Enter meta description"  title="Enter meta description upto 600 characters" class="form-control" rows="3" name="COM_mdesc"><?echo $COM_mdesc;?></textarea>

                            </div>

                          </div>

<ul class="list-inline pull-right">

	<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>

	<li><button type="button" class="btn view-more-btn-3" id="btn-mc2">Save and continue</button></li>

</ul>

                        </div>

                        <div class="tab-pane" role="tabpanel" id="step3">

                          <h4>Trade Information</h4>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Main Clients</label>

                            <div class="col-sm-9">

							<?$COM_mclients = isset($COM['main_clients'])?$COM['main_clients']:'';?>

                                                        <textarea class="form-control" placeholder="enter upto 1000 charactrers" maxlength="1000" rows="3" name="COM_mclients"><?echo $COM_mclients;?></textarea>

                            </div>

                          </div>

                         

                          

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Main Product 1<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_mproduct1 = isset($COM['main_product1'])?$COM['main_product1']:'';?>

                                                        <input type="text" class="form-control" maxlength="60" id="main_product" name="COM_mproduct1" placeholder="" value="<?echo $COM_mproduct1;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Main Product 2<span class="required">*</span></label>

                            <div class="col-sm-9">

                              <?$COM_mproduct2 = isset($COM['main_product2'])?$COM['main_product2']:'';?>

                              <input type="text" class="form-control" maxlength="60" placeholder="Enter main product2" required title="Characters should upto 60"  id="main_product2" name="COM_mproduct2"  value="<?echo $COM_mproduct2;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Main Product 3<span class="required">*</span></label>

                            <div class="col-sm-9">

                              <?$COM_mproduct3 = isset($COM['main_product3'])?$COM['main_product3']:'';?>

                              <input type="text"  maxlength="60" placeholder="Enter main product2" required title="Characters should upto 60" class="form-control" id="main_product3" name="COM_mproduct3" placeholder="" value="<?echo $COM_mproduct3;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Main Product 4<span class="required">*</span></label>

                            <div class="col-sm-9">

                              <?$COM_mproduct4 = isset($COM['main_product4'])?$COM['main_product4']:'';?>

                              <input type="text"  maxlength="60" placeholder="Enter main product2" required title="Characters should upto 60" class="form-control" id="main_product4" name="COM_mproduct4" placeholder="" value="<?echo $COM_mproduct4;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Packaging Details</label>

                            <div class="col-sm-9">

							<?$COM_oproducts = isset($COM['other_product'])?$COM['other_product']:'';?>

                              <textarea class="form-control" maxlength="110" placeholder="Enter Packaging details"  title="Characters should upto 110" rows="3" name="COM_oproducts"><?echo $COM_oproducts;?></textarea>

                            </div>

                          </div>
                            <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Average Lead Time<span class="required">*</span></label>							

                            <div class="col-sm-9">

							<?$COM_lead_time = isset($COM['avg_lead_time'])?$COM['avg_lead_time']:'';?>

                                                        <input type="text" maxlength="60"class="form-control" id="avg_lead_time" name="COM_lead_time" placeholder="" value="<?echo $COM_lead_time;?>">

                            </div>

                          </div>

                        

                          <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Compliance(s) you are maintaining<span class="required">*</label>

                            <div class="col-sm-9">

							<?

							$COM_compliance = isset($COM['compliance'])?$COM['compliance']:'';

							$COM_compliances = explode(',',$COM_compliance);

							?>

                              <select class="form-control" id="compliance" name='COM_compliance[]'  multiple>
                                  <option value="" disabled>select complianes</option>

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
                           <div class="row form-group">

                            <label class="col-sm-3">Do you provide product samples ?</label>

                            <div class="col-sm-9 user-type">

							<?$COM_acpt_order = isset($COM['acpt_order'])?$COM['acpt_order']:'';?>

							<?$com_obj->get_radio($PS_Negot,$COM_acpt_order,'COM_acpt_order');?>

                            </div>

                          </div>

                          <div class="row form-group">

                            <label class="col-sm-3">Do you provide factory tours?</label>

                            <div class="col-sm-9 user-type">

                            <?$COM_trade_show = isset($COM['trade_show'])?$COM['trade_show']:'';?>

							<?$com_obj->get_radio($PS_Negot,$COM_trade_show,'COM_trade_show');?>

                            </div>

                          </div>
                          <h4>Production Capacity</h4>
                         

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Factory Address</label>

                            <div class="col-sm-9">

							 <?$COM_factory_loc = isset($COM['factory_location'])?$COM['factory_location']:'';?>

                                                         <input type="text"  maxlength="60"class="form-control" id="flocation" name="COM_factory_loc" placeholder="" value="<?echo $COM_factory_loc;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Factory Size</label>

                            <div class="col-sm-9">

							 <?$COM_factory_size = isset($COM['factory_size'])?$COM['factory_size']:'';?>

                                                         <input type="text" class="form-control" maxlength="60" id="text" name="COM_factory_size" placeholder="" value="<?echo $COM_factory_size;?>">

                            </div>

                          </div>
                          
                           <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Production Capacity </span></label>

                            <div class="col-sm-9">

							 <?$COM_production_limit = isset($COM['production_capacity'])?$COM['production_capacity']:'';?>

                                                         <input type="text" class="form-control" maxlength="60" id="plimit" name="COM_production_limit" placeholder="" value="<?echo $COM_production_limit;?>">

                            </div>

                          </div>
                          
                         <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Annual Output Value</label>

                            <div class="col-sm-9">

                              <?$COM_an_sales = isset($COM['annual_sales'])?$COM['annual_sales']:'';?>

							  <select class="form-control" name="COM_an_sales" id="an_sales">

                                <option value="">Select Annual Sales Volume</option>

                                <?$com_obj->get_drop($PS_annrevenue,$COM_an_sales,'');?>

                              </select>

							  

                            </div>

                          </div>
                          
                         
                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Most Selling Product</label>

                            <div class="col-sm-9">

							<?$COM_mproduct = isset($COM['major_product_sell'])?$COM['major_product_sell']:'';?>

                                                        <input type="text" maxlength="110" class="form-control" id="text" name="COM_mproduct" placeholder="" value="<?echo $COM_mproduct;?>">

                            </div>

                          </div>

                          <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Most Buying Product</label>

                            <div class="col-sm-9">

							<?$COM_bproduct = isset($COM['major_product_buy'])?$COM['major_product_buy']:'';?>

                              <input type="text"  maxlength="110"  class="form-control" id="text" name="COM_bproduct" placeholder="" value="<?echo $COM_bproduct;?>">

                            </div>

                          </div>

                          <h4>Export Informaition</h4>
                         <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Export Year</label>

                            <div class="col-sm-9">							    

							  <?$COM_start_yr = isset($COM['start_date'])?$COM['start_date']:'';?>

								<div class="input-group input-group-sm">

									<input type="text" name="COM_start_yr" id="start_yr" class="form-control" value="<?echo $COM_start_yr;?>"  style="font-size: 14px;height: 40px;"/>

									<span class="input-group-addon">

										<i class="ace-icon fa fa-calendar"></i>

									</span>

								</div>				

													

                              <!--<input type="date" name="COM_start_yr" class="form-control" id="start_yr" placeholder="" value="<?echo $COM_start_yr;?>">-->

                            </div>

                          </div>
                          <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Export Percentage</label>

                            <div class="col-sm-9">

                            <?$COM_percentage = isset($COM['ex_percentage'])?$COM['ex_percentage']:'';?>

							  <select class="form-control" name='COM_percentage' id="percentage">

								<option value="">Select</option>  

								<?$com_obj->get_drop($PS_percentage,$COM_percentage,'%');?>

                              </select>

                            </div>

                          </div>

                           <div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Nearest Port</label>

                            <div class="col-sm-9">

							<?$COM_near_port = isset($COM['nearest_port'])?$COM['nearest_port']:'';?>

                                                        <input type="text" maxlength="60" class="form-control" id="text" name="COM_near_port" placeholder="" value="<?echo $COM_near_port; ?>">

                            </div>

                          </div>
                           <div class="row form-group additional">

                            <label class="col-sm-3 label-title">Main Export Markets</label>

                            <div class="col-sm-9">

							<?$COM_exmarket = isset($COM['export_markets'])?$COM['export_markets']:'';

							$COM_exmarkets=@explode(',',$COM_exmarket); 

							$COM_exmarkets =@array_unique($COM_exmarkets);

							?>

							

							<div class="checkbox">

                                

								<?foreach($PS_exportmarket as $key =>$exmarket){

									if($key>0){

								  if(in_array($key,$COM_exmarkets))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-4">

                                  <label for="<?echo $exmarket?>" class="<?echo $ch;?>" ><input type="checkbox" name="COM_exmarket[]" id="<?echo $exmarket;?>" value="<? echo $key;?>" <?echo $ch;?>><?echo $exmarket;?></label>

                                </div>

								

									<?}}?>

                              </div>

                            </div>

                          </div>


<ul class="list-inline pull-right">

	<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>

	<li><button type="button" class="btn view-more-btn-3 btn-info-full" id="btn-mc3">Save and continue</button></li>

</ul>

                        </div>

                        <div class="tab-pane" role="tabpanel" id="complete">

                          <h4>Terms and Policies</h4>

<!--                           <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Annual Output Value<span class="required">*</span></label>

                            <div class="col-sm-9">

                              <?$COM_an_sales = isset($COM['annual_sales'])?$COM['annual_sales']:'';?>

							  <select class="form-control" name="COM_an_sales" id="an_sales">

                                <option value="">Select Annual Sales Volume</option>

                                <?$com_obj->get_drop($PS_annrevenue,$COM_an_sales,'');?>

                              </select>

							  

                            </div>

                          </div>-->
                         

                          <div class="row form-group">

                            <label class="col-sm-3">Accepted Payment Currency<span class="required">*</span></label>

                            <?$COM_ap_currency = isset($COM['ap_currency'])?$COM['ap_currency']:'';

							$COM_ap_currencys = explode(',',$COM_ap_currency);

							$COM_ap_currencys = array_unique($COM_ap_currencys);

							?>

							<div class="col-sm-9 user-type">

								<?//$com_obj->get_radio($PS_paycurrency,$COM_ap_currency,'COM_ap_currency');?>

								<div class="checkbox">

                            <?foreach($PS_paycurrency as $key2=>$currency){

								if($key2>0){

								  if(in_array($key2,$COM_ap_currencys))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-4">

                                  <label for="<?echo $currency?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_ap_currency[]"  id="<?echo $currency;?>" value="<?echo $key2;?>" <?echo $ch;?>><?echo $currency;?></label>

                                </div>

								

								<?}}?>

                            </div>

                            </div>

                          </div>

                          <div class="row form-group">

                            <label class="col-sm-3">Accepted Delivery Terms</label>

                            <div class="col-sm-9 user-type">

                            <?

							$COM_ad_terms = isset($COM['ad_terms'])?$COM['ad_terms']:'';

							$COM_ad_term = explode(',',$COM_ad_terms);

							$COM_ad_term = array_unique($COM_ad_term);

							?>

							<?//$com_obj->get_radio($PS_delivery,$COM_ad_terms,'COM_ad_terms');?>

                            <div class="checkbox">

                            <?foreach($PS_delivery as $key1=>$delivery){

								if($key1>0){

								  if(in_array($key1,$COM_ad_term))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-4">

                                  <label for="<?echo $delivery?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_ad_terms[]" id="<?echo $delivery;?>" value="<?echo $key1;?>" <?echo $ch;?>><?echo $delivery;?></label>

                                </div>

								

								<?}}?>

                            </div>

                            </div>

                          </div>

                          <div class="row form-group additional">

                            <label class="col-sm-3 label-title">Payment Method </label>

                            <div class="col-sm-9">

							<?

							$COM_pay_method = isset($COM['payment_mths'])?$COM['payment_mths']:'';

							$COM_pay_methods=explode(',',$COM_pay_method);

							$COM_pay_methods = array_unique($COM_pay_methods);

							?>

							<div class="checkbox">

                            <?foreach($PS_paymentmethod as $key=>$paymethod){

								if($key>0){

								  if(in_array($key,$COM_pay_methods))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-4">

                                  <label for="<?echo $paymethod?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_pay_method[]" id="<?echo $paymethod;?>" value="<?echo $key;?>" <?echo $ch;?>><?echo $paymethod;?></label>

                                </div>

								

								<?}}?>

                            </div>

							   

                            </div>

                         </div>

                         

                          <div class="row form-group">

                            <label class="col-sm-3">Spoken Language<span class="required">*</span></label>

                            <div class="col-sm-9 user-type">

							<?$COM_language = isset($COM['language'])?$COM['language']:'';

							$COM_languages=explode(',',$COM_language);

							$COM_languages = array_unique($COM_languages);

							?>

                            <?//$com_obj->get_radio($PS_spoken,$COM_language,'COM_language');?>

							<div class="checkbox">

                            <?foreach($PS_spoken as $key3=>$language){

								if($key3>0){

								  if(in_array($key3,$COM_languages))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-4">

                                  <label for="<?echo $language?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_language[]" id="<?echo $language;?>" value="<?echo $key3;?>" <?echo $ch;?>><?echo $language;?></label>

                                </div>

								

								<?}}?>

                            </div>

                            </div>

                          </div>

                          <div class="row form-group">

                            <label class="col-sm-3">Company Certification</label>

                            <div class="col-sm-9 user-type">

                            <?$COM_certificate = isset($COM['certification'])?$COM['certification']:'';

							$COM_certificates=explode(',',$COM_certificate);

							$COM_certificates = array_unique($COM_certificates);

							?>

                            <?//$com_obj->get_radio($PS_certificate,$COM_certificate,'COM_certificate');?> 

							<div class="checkbox">

                            <?foreach($PS_certificate as $key4=>$certificate){

								if($key4>0){

								  if(in_array($key4,$COM_certificates))

									  $ch="checked";

								  else

									  $ch="";?>

								<div class="col-md-4">

                                  <label for="<?echo $certificate?>" class="<?echo $ch;?>"><input type="checkbox" name="COM_certificate[]" id="<?echo $certificate;?>" value="<?echo $key4;?>" <?echo $ch;?>><?echo $certificate;?></label>

                                </div>

								

								<?}}?>

                            </div>

                            </div>

                          </div>

<ul class="list-inline pull-right">

	<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>

	<li><button type="button" class="btn view-more-btn-3 btn-info-full" id="btn-mc4">Save and continue</button></li>

</ul>

                        </div>

                        <div class="tab-pane" role="tabpanel" id="step5">

                          <h4>Category and Images</h4>

                          <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Select Your Group<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_buss_group = isset($COM['buss_group'])?$COM['buss_group']:'';?>	

							  <select class="form-control" name="COM_buss_group" id="buss_group">

                                <?
								echo $productgroup;
								//$com_obj->get_drop($PS_buylead_category,$COM_buss_group,'');?>

                              </select>

                            </div>

                          </div>

                          <div class="row form-group model-name">

                            <label class="col-sm-3 label-title">Select Category<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_cat = isset($COM['category'])?$COM['category']:'';?>

                              <select class="form-control" name="COM_cat[]" multiple id="com_cat1" style="height: 200px;">

<!--								<option value="">select</option>-->

							   <?echo $drop->get_dropdown_multiple($db,"select id,category_name from category where dis_status='1' AND parent_id='0' group by category_name",$COM_cat);?>

                              </select>

                            </div>

                          </div>

                          <!--<div class="row form-group add-title">

                            <label class="col-sm-3 label-title">Category Title<span class="required">*</span></label>

                            <div class="col-sm-9">

							<?$COM_cat_title = isset($COM['category_title'])?$COM['category_title']:'';?>

                              <input type="text" class="form-control" id="cat_title" name="COM_cat_title" placeholder="" value="<?echo $COM_cat_title;?>">

                            </div>

                          </div>-->

                          <div class="row form-group add-image">

                            <label class="col-sm-3 label-title">Company Logo <small style="color:red">(200x200)</small> </label>

                            <div class="col-sm-9">

                              <div class="upload-section">

                                <label class="upload-image" for="upload-image-one">

                                <input type="file" id="upload-image-one" name="COM_logo" accept="image/*" onchange="img_validate('upload-image-one',200,200,1,1,'img_div1')">

                                </label>										

                              </div>

							<div class="col-xs-6 row">

								<?$COM_logo = isset($COM['logo'])?$COM['logo']:'';?>

								<img src="<?php if(!empty($COM_logo)){?><?echo $siteurl;?>/uploads/company/logo/<?echo $COM_logo;?><?php }?>" id="img_div1" width="100" height="80" <?if($COM_logo==''){?>style='display:none;'<?}?>>

							</div>

                            </div>

                          </div>

                          <div class="row form-group add-image">

                            <label class="col-sm-3 label-title">Avatar pictures <small style="color:red">(300x300)</small></label>

                            <div class="col-sm-9">

                              <div class="upload-section">

                                <label class="upload-image" for="upload-image-two">

                                <input type="file" id="upload-image-two" name="COM_avatar" accept="image/*" onchange="img_validate('upload-image-two',300,300,1,1,'img_div2')">

                                </label>										

                              </div>

							<div class="col-xs-6 row">

								<?$COM_avatar = isset($COM['avatar'])?$COM['avatar']:'';?>
									
								<img src="<?php if(!empty($COM_avatar)){?><?echo $siteurl;?>/uploads/company/avatar/<?echo $COM_avatar;?><?php }?>" id="img_div2" width="100" height="80" <?if($COM_avatar==''){?>style='display:none;'<?}?>>

							</div>

                            </div>

                          </div>

                          <div class="row form-group add-image">

                            <label class="col-sm-3 label-title">Top Banner Image <small style="color:red">(1000x600)</small></label>

                            <div class="col-sm-9">

                              <div class="upload-section">

                                <label class="upload-image" for="upload-image-three">

                                <input type="file" id="upload-image-three" name="COM_banner" accept="image/*" onchange="img_validate('upload-image-three',1000,600,5,3,'img_div3')">

                                </label>										

                              </div>

							<div class="col-xs-6 row">

								<?$COM_banner = isset($COM['banner'])?$COM['banner']:'';?>

								<img src="<?php if(!empty($COM_banner)){?><?echo $siteurl;?>/uploads/company/banner/<?echo $COM_banner;?><?php }?>" id="img_div3" width="100" height="80" <?if($COM_banner==''){?>style='display:none;'<?}?>>

							</div>

                            </div>

                          </div>

<ul class="list-inline pull-right">

	<li><button type="button" class="btn view-more-btn-3 prev-step">Previous</button></li>

	<li><button type="submit" class="btn view-more-btn-3 btn-info-full next-step" name="COM_submit" onclick="return btn_mc5();">Complete</button></li>

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

			

				$( "#start_yr" ).datepicker({

					showOtherMonths: true,

					selectOtherMonths: false,

					//isRTL:true,

			

					

					

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

			

					

					dialog.data( "uiDialog" )._title = function(title) {

						title.html( this.options.title );

					};

					

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

function get_state(val){

	//alert(val);

	 $.ajax({url: "state_ajax.php?val="+val, success: function(result){

        $("#state").html(result);

    }});

}

function get_city(val){

	//alert(val);

	 $.ajax({url: "city_ajax.php?val="+val, success: function(result){

        $("#city").html(result);

    }});

}

</script>		

<?include "footer.php";?>

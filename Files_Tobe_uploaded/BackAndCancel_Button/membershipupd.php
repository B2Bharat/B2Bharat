<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Membership </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Membership </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$Message = isSet($Message) ? $Message : '' ;
$name = isSet($name) ? $name : '' ;
$group_id = isSet($group_id) ? $group_id : '' ;
$description = isSet($description) ? $description : '' ;
$max_no_products = isSet($max_no_products) ? $max_no_products : '' ;
$max_no_buying = isSet($max_no_buying) ? $max_no_buying : '' ;
$max_no_selling = isSet($max_no_selling) ? $max_no_selling : '' ;
$logo_package = isSet($logo_package) ? $logo_package : '' ;
$base_price_afdis = isSet($base_price_afdis) ? $base_price_afdis : '' ;
$max_price = isSet($max_price) ? $max_price : '' ;
$package_renewal = isSet($package_renewal) ? $package_renewal : '' ;
$status_text = isSet($status_text) ? $status_text : '' ;
$moderation_policy = isSet($moderation_policy) ? $moderation_policy : '' ;
$dis_profile = isSet($dis_profile) ? $dis_profile : '' ;
$priority_listing = isSet($priority_listing) ? $priority_listing : '' ;
$invite_feedback = isSet($invite_feedback) ? $invite_feedback : '' ;
$home_spotlight = isSet($home_spotlight) ? $home_spotlight : '' ;
$invite_vote = isSet($invite_vote) ? $invite_vote : '' ;
$pub_tradeshow = isSet($pub_tradeshow) ? $pub_tradeshow : '' ;
$send_receive = isSet($send_receive) ? $send_receive : '' ;
$social_net_link = isSet($social_net_link) ? $social_net_link : '' ;
$business_directory = isSet($business_directory) ? $business_directory : '' ;
$product_show_gallery = isSet($product_show_gallery) ? $product_show_gallery : '' ;
$dis_tele_mobile = isSet($dis_tele_mobile) ? $dis_tele_mobile : '' ;
$web_url = isSet($web_url) ? $web_url : '' ;
$direct_payment = isSet($direct_payment) ? $direct_payment : '' ;
$is_certified = isSet($is_certified) ? $is_certified : '' ;
$buyers_profile = isSet($buyers_profile) ? $buyers_profile : '' ;

if($submit) {
    $crcdt = time();
	$name = trim(addslashes($name));
	$group_id = trim(addslashes($group_id));
	$description = trim(addslashes($description));
	$max_no_products = trim(addslashes($max_no_products));
	$max_no_buying = trim(addslashes($max_no_buying));
	$max_no_selling = trim(addslashes($max_no_selling));
	$logo_package = trim(addslashes($logo_package));
	$base_price_afdis = trim(addslashes($base_price_afdis));
	$max_price = trim(addslashes($max_price));
	$package_renewal = trim(addslashes($package_renewal));
	$status_text = trim(addslashes($status_text));
	$moderation_policy = trim(addslashes($moderation_policy));
	$dis_profile = trim(addslashes($dis_profile));
	$priority_listing = trim(addslashes($priority_listing));
	$invite_feedback = trim(addslashes($invite_feedback));
	$home_spotlight = trim(addslashes($home_spotlight));
	$invite_vote = trim(addslashes($invite_vote));
	$pub_tradeshow = trim(addslashes($pub_tradeshow));
	$send_receive = trim(addslashes($send_receive));
	$social_net_link = trim(addslashes($social_net_link));
	$business_directory = trim(addslashes($business_directory));
	$product_show_gallery = trim(addslashes($product_show_gallery));
	$dis_tele_mobile = trim(addslashes($dis_tele_mobile));
	$web_url = trim(addslashes($web_url));
	$direct_payment = trim(addslashes($direct_payment));
	$is_certified = trim(addslashes($is_certified));
	$buyers_profile = trim(addslashes($buyers_profile));
			$checkStatus = $db->check1column("membership","name",$name);
		if($upd == 2)
			$checkStatus = 0;

		if($checkStatus == 0){
			$set  = "name = '$name'";
			$set  .= ",group_id = '$group_id'";
			$set  .= ",description = '$description'";
			$set  .= ",max_no_products = '$max_no_products'";
			$set  .= ",max_no_buying = '$max_no_buying'";
			$set  .= ",max_no_selling = '$max_no_selling'";
			$set  .= ",base_price_afdis = '$base_price_afdis'";
			$set  .= ",max_price = '$max_price'";
			$set  .= ",package_renewal = '$package_renewal'";
			$set  .= ",status_text = '$status_text'";
			$set  .= ",moderation_policy = '$moderation_policy'";
			$set  .= ",dis_profile = '$dis_profile'";
			$set  .= ",priority_listing = '$priority_listing'";
			$set  .= ",invite_feedback = '$invite_feedback'";
			$set  .= ",home_spotlight = '$home_spotlight'";
			$set  .= ",invite_vote = '$invite_vote'";
			$set  .= ",pub_tradeshow = '$pub_tradeshow'";
			$set  .= ",send_receive = '$send_receive'";
			$set  .= ",social_net_link = '$social_net_link'";
			$set  .= ",business_directory = '$business_directory'";
			$set  .= ",product_show_gallery = '$product_show_gallery'";
			$set  .= ",dis_tele_mobile = '$dis_tele_mobile'";
			$set  .= ",web_url = '$web_url'";
			$set  .= ",direct_payment = '$direct_payment'";
			$set  .= ",is_certified = '$is_certified'";
			$set  .= ",buyers_profile = '$buyers_profile'";
			$imgg=$_FILES['logo_package']['tmp_name'];
  if($imgg!=""){
   $NgImg='image_'.date('Y-m-d-H-i-s').'_'.uniqid();
   $isUploaded = $com_obj->upload_image('logo_package',$NgImg,42,42,1,1,"../uploads/membership/",'');
  if($isUploaded){
   $NgImg = $com_obj->img_Name; 
   $set.=",logo_package='$NgImg'";
  }else{
   echo $com_obj->img_Err; exit; 
  }
  }			
			if($upd == 1){
				$set  .= ",active_status = '1'";
				$set  .= ",action = '0'";
				$db->insertrec("insert into membership set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update membership set $set where id='$idvalue'");
				$act = "upd";
			}
			echo "<script>location.href='membership.php?act=$act';</script>";
			@header("location:membership.php?act=$act");
			exit;
		}	
		 else {
			 $id = $idvalue;
			$Message=$name;
			$Message  .= "<font color='red'>Already Exist</font>";
		
			 }
	}
if($upd == 1)
	$TextChange = "Add";
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from membership where id='$id'");
@extract($GetRecord);
$name = stripslashes($name);
$group_id = stripslashes($group_id);
$description = stripslashes($description);
$max_no_products = stripslashes($max_no_products);
$max_no_buying = stripslashes($max_no_buying);
$max_no_selling = stripslashes($max_no_selling);
$base_price_afdis = stripslashes($base_price_afdis);
$max_price = stripslashes($max_price);
$logo_package = stripslashes($logo_package);
$package_renewal = stripslashes($package_renewal);
$status_text = stripslashes($status_text);
$moderation_policy = stripslashes($moderation_policy);
$dis_profile = stripslashes($dis_profile);
$priority_listing = stripslashes($priority_listing);
$invite_feedback = stripslashes($invite_feedback);
$home_spotlight = stripslashes($home_spotlight);
$invite_vote = stripslashes($invite_vote);
$pub_tradeshow = stripslashes($pub_tradeshow);
$send_receive = stripslashes($send_receive);
$social_net_link = stripslashes($social_net_link);
$business_directory = stripslashes($business_directory);
$product_show_gallery = stripslashes($product_show_gallery);
$dis_tele_mobile = stripslashes($dis_tele_mobile);
$web_url = stripslashes($web_url);
$direct_payment = stripslashes($direct_payment);
$is_certified = stripslashes($is_certified);
$buyers_profile = stripslashes($buyers_profile);
$groupp = "<option value=''>- - Select- -</option>";
$DropDownQry = "select * from grouplist where status='0'";
$groupp .= $drop->get_dropdown($db,$DropDownQry,$group_id);

?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
                                                    <a class= "btn btn-info" onclick="history.go(-1);">Back </a>
							<h3 class="panel-title"><? echo $TextChange;?> Membership Package</h3>
						</div>
						<form class="form-horizontal form-bordered form-wizard" id="wizard-validate" method="post" action="membershipupd.php" enctype="multipart/form-data" data-parsley-validate>
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />		
<div class="panel-body">							
								<div class="form-group">
									<label class="col-sm-2 control-label" for="name">Name of Package <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="name" id="name" value="<? echo $name; ?>" class="form-control" 
										data-parsley-maxrange="20"
										data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="group_id">Select a Group<font color="red">*</font></label>
									<div class="col-sm-3">
										<select name="group_id" id="group_id" class="form-control"  value="<? echo $group_id; ?>" title="select group" required><? echo $groupp; ?></select>
									</div>
								</div>
																
								<div class="form-group">
									<label class="col-sm-2 control-label" for="description">Description</label>
									<div class="col-sm-3">
										<textarea name="description" id="description" class="form-control"   data-parsley-maxrange="2000" ><? echo $description; ?></textarea>
									</div>
								</div>
								
									<div class="form-group">
									<label class="col-sm-2 control-label" for="max_no_products">Maximum Number of Products (0 denotes unlimited) <font color="red">*</font></label>
									<div class="col-sm-3">
										<input data-parsley-type="integer" name="max_no_products" id="max_no_products" data-parsley-maxlength="9" value="<? echo $max_no_products; ?>" class="form-control"   data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="max_no_buying">Maximum Number of Buying Leads (0 denotes unlimited) <font color="red">*</font></label>
									<div class="col-sm-3">
										<input data-parsley-type="integer" name="max_no_buying" id="max_no_buying" data-parsley-maxlength="9" value="<? echo $max_no_buying; ?>" class="form-control"   data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="max_no_selling">Maximum Number of Selling Leads (0 denotes unlimited)* <font color="red">*</font></label>
									<div class="col-sm-3">
										<input data-parsley-type="integer" name="max_no_selling" id="max_no_selling" data-parsley-maxlength="9" value="<? echo $max_no_selling; ?>" class="form-control"   data-parsley-required>
									</div>
								</div>
								

								<div class="form-group">
									<label class="col-sm-2 control-label" for="hidimg">
									Upload Logo</label>
									<div class="col-sm-3">
									<div class="upload-section">
									<label class="upload-logo_package" for="upload-logo_package-three" style="width:40%">
									<input type="file" name="logo_package" id="logo_package" accept="image/*" onchange="img_validate('logo_package',42,42,1,1)">
									</label>
									</div>
									
									<img src="../uploads/membership/<? echo $logo_package; ?>" id="img_div" width="100" height="80" <?if($logo_package==''){?>style='display:none;'<?}?>>
									</div>
										<input type="hidden" name="hidimg" id="hidimg" value="<? echo $logo_package; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="base_price_afdis">Base Price After Discount. (0 denotes free) <font color="red">*</font></label>
									<div class="col-sm-3">
										<input data-parsley-type="integer" name="base_price_afdis" id="base_price_afdis" data-parsley-maxlength="9" value="<? echo $base_price_afdis; ?>" class="form-control"   data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="max_price">Max Price (Strikethrough) <font color="red">*</font></label>
									<div class="col-sm-3">
										<input data-parsley-type="integer" name="max_price" id="max_price" data-parsley-maxlength="9" value="<? echo $max_price; ?>" class="form-control"   data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="package_renewal">Package renewal for [in days]<br>(0 denotes forever or never expire)* <font color="red">*</font></label>
									<div class="col-sm-3">
										<input data-parsley-type="integer" name="package_renewal" id="package_renewal" data-parsley-maxlength="9" value="<? echo $package_renewal; ?>" class="form-control"   data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="status_text">Type A Status Text (e.g TrustPass, Crown, Certified by etc) <font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="text" name="status_text" id="status_text" value="<? echo $status_text; ?>" class="form-control"   
										data-parsley-range="[1,20]"
										data-parsley-required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="moderation_policy">Select Moderation policy of Listing<font color="red">*</font></label>
									<div class="col-sm-3">
										<input type="radio" name="moderation_policy" id="moderation_policy"  data-parsley-required   value="yes" <? if($moderation_policy=='yes')echo "checked"; ?>>&nbsp;Publish automatically after registration<br>
										<input type="radio" name="moderation_policy" id="moderation_policy" data-parsley-required value="no" <? if($moderation_policy=='no')echo "checked"; ?>>&nbsp;Set pending for manual review
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="dis_profile">Display Profile Publicly</label>
									<div class="col-sm-3">
										<input type="radio" name="dis_profile" id="dis_profile"     value="yes" <? if($dis_profile=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="dis_profile" id="dis_profile"     value="no" <? if($dis_profile=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="priority_listing">Display as Priority Listing</label>
									<div class="col-sm-3">
										<input type="radio" name="priority_listing" id="priority_listing"     value="yes" <? if($priority_listing=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="priority_listing" id="priority_listing"     value="no" <? if($priority_listing=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="invite_feedback">Allow to invite Feedback</label>
									<div class="col-sm-3">
										<input type="radio" name="invite_feedback" id="invite_feedback"     value="yes" <? if($invite_feedback=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="invite_feedback" id="invite_feedback"     value="no" <? if($invite_feedback=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="home_spotlight">Display on homepage as spotlight</label>
									<div class="col-sm-3">
										<input type="radio" name="home_spotlight" id="home_spotlight"     value="yes" <? if($home_spotlight=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="home_spotlight" id="home_spotlight"     value="no" <? if($home_spotlight=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="invite_vote">Allow to invite Vote</label>
									<div class="col-sm-3">
										<input type="radio" name="invite_vote" id="invite_vote"     value="yes" <? if($invite_vote=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="invite_vote" id="invite_vote"     value="no" <? if($invite_vote=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="pub_tradeshow">Allow to publish trade show</label>
									<div class="col-sm-3">
										<input type="radio" name="pub_tradeshow" id="pub_tradeshow"     value="yes" <? if($pub_tradeshow=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="pub_tradeshow" id="pub_tradeshow"     value="no" <? if($pub_tradeshow=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="send_receive">Allow to Send / Receive massage</label>
									<div class="col-sm-3">
										<input type="radio" name="send_receive" id="send_receive"     value="yes" <? if($send_receive=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="send_receive" id="send_receive"     value="no" <? if($send_receive=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="social_net_link">Allow to publish Social network link</label>
									<div class="col-sm-3">
										<input type="radio" name="social_net_link" id="social_net_link"     value="yes" <? if($social_net_link=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="social_net_link" id="social_net_link"     value="no" <? if($social_net_link=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="business_directory">Appear at Business Directory</label>
									<div class="col-sm-3">
										<input type="radio" name="business_directory" id="business_directory"     value="yes" <? if($business_directory=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="business_directory" id="business_directory"     value="no" <? if($business_directory=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="product_show_gallery">Access to product showcasing and gallery</label>
									<div class="col-sm-3">
										<input type="radio" name="product_show_gallery" id="product_show_gallery"     value="yes" <? if($product_show_gallery=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="product_show_gallery" id="product_show_gallery"     value="no" <? if($product_show_gallery=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="dis_tele_mobile">Display Telephone & Mobile</label>
									<div class="col-sm-3">
										<input type="radio" name="dis_tele_mobile" id="dis_tele_mobile"     value="yes" <? if($dis_tele_mobile=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="dis_tele_mobile" id="dis_tele_mobile"     value="no" <? if($dis_tele_mobile=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="web_url">Display Web URL</label>
									<div class="col-sm-3">
										<input type="radio" name="web_url" id="web_url"     value="yes" <? if($web_url=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="web_url" id="web_url"     value="no" <? if($web_url=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="direct_payment">Ability to accept direct payment to merchant account</label>
									<div class="col-sm-3">
										<input type="radio" name="direct_payment" id="direct_payment"     value="yes" <? if($direct_payment=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="direct_payment" id="direct_payment"     value="no" <? if($direct_payment=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="is_certified">Is Certified</label>
									<div class="col-sm-3">
										<input type="radio" name="is_certified" id="is_certified"     value="yes" <? if($is_certified=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="is_certified" id="is_certified"     value="no" <? if($is_certified=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									<label class="col-sm-2 control-label" for="buyers_profile">Buyers Profile</label>
									<div class="col-sm-3">
										<input type="radio" name="buyers_profile" id="buyers_profile"     value="yes" <? if($buyers_profile=='yes')echo "checked"; ?>>&nbsp;YES
										<input type="radio" name="buyers_profile" id="buyers_profile"     value="no" <? if($buyers_profile=='no')echo "checked"; ?>>&nbsp;NO
									</div>
								</div>
		<div class="form-group">
									
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="membership.php">Cancel</a>
							</div>
						</form>
						<!--===================================================-->
						<!--End Horizontal Form-->
					</div>
				</div>
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
<script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
		
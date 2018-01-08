<?php include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
$uinfo = $db->singlerec("select * from register where id='$user_id'");
$acn = isset($acn)?$acn:'';
$msg="";
if($acn=='addsuc'){
$msg="<h4 style='color:limegreen'>Successfully Added..!!!</h4>";
}else if($acn=='upd'){
$sid = isset($sid)?$com_obj->decid(addslashes($sid)):'0';
$_SESSION['s_id'] = $sid;
$success_info = $db->singlerec("select * from success_stories where id ='$sid'");
}else{
$_SESSION['s_id'] = '';	
}
include "story-update.php";
?>
			
			
			
			<div class="container-fulid pdt25" style="background-color:#f5f5f5;">
			<div class="container continr-bg">
			<?php include "include/profile-left.php";?>
		<div class="col-sm-9 col-md-9">
		<div class="adpost-details">
            <div class="well">
			<center><?echo $msg;?></center>
                <h3>Add Success Story</h3>
                <div id="adpost-details">
				<div class="row">	
					
					<div class="col-md-12">
						 <form role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return addsuccess_valid();">
							<fieldset>
								<div class="section postdetails">
									<div class="row form-group add-title">
										<label class="col-sm-3 label-title">Name of Story<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="story_name" id="story_name" value="<?echo isset($success_info['story_name'])?$success_info['story_name']:'';?>"placeholder="">
										</div>
									</div>
									
									<div class="row form-group add-title">
										<label class="col-sm-3 label-title">Title of the story<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" name="story_title" id="story_title" class="form-control" placeholder="" value="<?echo isset($success_info['story_title'])?$success_info['story_title']:'';?>">
										</div>
									</div>
									
									<div class="row form-group add-title">
										<label class="col-sm-3 label-title">Story Details<span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea name="story_details" id="story_details" class="form-control" rows="5"><?echo isset($success_info['story_details'])?$success_info['story_details']:'';?></textarea>
										</div>
									</div>
									<div class="row form-group add-image">
										<label class="col-sm-3 label-title">Your Photo<span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="col-xs-6">
											   <div class="upload-section">
												<label class="upload-image" for="upload-image-one" style="width:40%">
													<input type="file" id="upload-image-one" name="story_photo" accept="image/*" onchange="img_validate('upload-image-one',300,300,1,1,'img_div')"/>
												</label>
											  </div>
											  </div>
											<div class="col-xs-6 row">
											  <?$story_photo = isset($success_info['story_photo'])?$success_info['story_photo']:'';?>
												  <img src="uploads/success/<?echo $story_photo;?>" id="img_div" width="100" height="80" <?if($story_photo==''){?>style='display:none;'<?}?>>
											</div>	
										</div>
									</div>
								
									

									
								</div><!-- section -->
								
								
								<div class="col-md-12 text-center">
									<input type="hidden" name="sucsubmit" value="sucsubmit">
									<input type="submit" name="submit" class="btn btn-primary" value="Post Your Story">
								</div><!-- section -->
								
							</fieldset>
						</form><!-- form -->	
					</div>
					

				</div>
				
			</div>
            </div>
			</div>
			<div class="row">
					<div class="col-sm-12 text-center">
						<div class="ad-section">
							<a href="#"><img src="images/ad-729x90.jpg" alt="Image" class="img-responsive"></a>
						</div>
					</div>
				</div><!-- row -->
			</div>
			
			<!-- include/buissList.php -->
		
		</div><!-- container -->
		</div>
<?php include "footer.php";?>
<script>
function addsuccess_valid(){
	var Err=0;	
	if(!checkLength( $("#story_name").val(),50) ){$("#story_name").focus(); swal('Required!','Story Name should be within 1 to 50 letters!','error'); Err++;}
	else if(!checkLength( $("#story_title").val(),100) ){$("#story_title").focus(); swal('Required!','Story Title should be within 1 to 100 letters!','error'); Err++;}
	else if(!checkLength( $("#story_details").val(),200) ){$("#story_details").focus(); swal('Required!','Story Details should be with in 1 to 200 letters!','error'); Err++;}
	else if(!checkLength( $("#upload-image-one").val(),200) ){$("#upload-image-one").focus(); swal('Required!','Story Image is required!','error'); Err++;}	
	if(Err===0){return true;}else{return false;} 
	
}
</script>
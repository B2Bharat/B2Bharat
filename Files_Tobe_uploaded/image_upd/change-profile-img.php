<?php 
include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
$uinfo = $db->singlerec("select * from register where id='$user_id'");

if(isset($_imgupd)){
	
	if($_FILES['profile_pic']['tmp_name'] != "" || $_FILES['profile_pic']['tmp_name'] != null)
	{
		$fpath = $_FILES['profile_pic']['tmp_name'];
		$fname = $_FILES['profile_pic']['name'];
		$image_info = getimagesize($_FILES["profile_pic"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		
		$size=filesize($_FILES['profile_pic']['tmp_name']);
		$getext = substr(strrchr($fname, '.'), 1);
		$ext = strtolower($getext);

		if($size>2097152) { //1048576 Bytes =  MB
			echo "<br/><center style='color:red;'>Too big! image size should be lesser then 2 MB</center>"; 
			echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
			exit;
		}
		if($image_width<300 || $image_height<300) { 
			echo "<br/><center style='color:red;'>Too small! You are upload ($image_width x $image_height) image. it must be (300 x 300) or grater..</center>"; 
			echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
			exit;
		}
//		if($image_width!=$image_height) { 
//			echo "<br/><center style='color:red;'>Invalid aspect ratio! Product image aspect ratio must be 1:1.<br/> Image must be (300 x 300) or grater.. </center>"; 
//			echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
//			exit;
//		}
		
		//$set .= "product_img = '$NgImg',";
		if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'bmp')
		{
			$NgImg= "user-".$user_id.".".$ext;
			$img_org = "uploads/$NgImg";
			$img_size = "uploads/user_images/$NgImg";
			move_uploaded_file($fpath,$img_org);
			$resizeObj = new resize($img_org);
			$resizeObj -> resizeImage(300, 300, 'exact');
			$resizeObj -> saveImage($img_size, 72);
			@unlink($img_org);
			$idvalue = $db->insertid("update register set img = '$NgImg' where id='$user_id';");
			
			echo "<script>location.href='$siteurl/change-profile-img?acn=supd';</script>";
			header("Location: $siteurl/change-profile-img?acn=supd"); exit;
		}
		else{
		echo "<center style='color:red;'>jpg or png file will only accepted..</center>";
		echo "<script>var goback = setTimeout(function(){window.history.back();},5000);</script>";	
		}
	}
}
$msg = "";
$acn = isset($acn)?$acn:'';
if($acn=='supd'){
$msg = "<h4 style='color:limegreen'>profile image updated successfully!</h4>";	
}


?>
			
			
<div class="container-fulid pdt25" style="background-color:#f5f5f5;">
	<div class="container">
	<?php include "include/profile-left.php";?>		
		<div class="col-sm-9 col-md-9">
            <div class="well">
			<h3>Change Profile image</h3><br/>
			<center><?php echo $msg;?></center>
			<div class="row" style="padding:10px;">
                <form action="change-profile-img" method="POST" enctype="multipart/form-data">
					<div class="col-md-4">
					<label>Selected image</label>
					<img src="<?php echo $siteurl."/uploads/user_images/".$uinfo['img'];?>" id="img_div" width="auto" height="auto" style="<?if($uinfo['img']==''){?>display:none;<?}?>border-radius:10px 10px; border:1px solid #ccc;">
					</div>
					<div class="col-md-6">
						<label>Change profile</label>
						<div class="space red row ">
						
						<span class="btn fileinput-button " style="font-size:18px; font-weight:600;">
                            <i class="fa fa-picture-o fa fa-white"></i>
                            <span>Select Image</span>
                            <input type="file" name="profile_pic" id="profile_pic" accept="image/*" onchange="img_validate('profile_pic',300,300,1,1,'img_div')">
                        </span>
						
						
						<!--<input type="file" name="profile_pic"  id="profile_pic" accept="image/*" onchange="img_validate('profile_pic',300,300);">	-->
						</div>
						<br/>
						<div class="space row">
						<input type="submit" value="Update" name="_imgupd" class="btn btn-primary" onclick="img_validate('profile_pic',300,300,1,1,'img_div');"/>
						</div>
					</div>
				</form>
			</div>
            </div>
        </div>
			
			<!-- include/buissList.php -->
			
		</div><!-- container -->
		</div>

<script src="assets/js/custom2.js"></script>	
<?php include "footer.php"; ?>
<?
if(isset($_up)) {
	$fname=trim(addslashes($fname));
	$lname=trim(addslashes($lname));
	$cname=trim(addslashes($cname));
	//$mail=trim(addslashes($mail));
	$mobile=trim(addslashes($mobile));
	$tel=trim(addslashes($tel));
	$fax=trim(addslashes($fax));
	$addr=trim(addslashes($addr));
	$postal=trim(addslashes($postal));
	$country=trim(addslashes($country));
	$state=trim(addslashes($state));
	$city=trim(addslashes($city));
	$area=trim(addslashes($area));
	$site=trim(addslashes($site));
	$dt=date("Y-m-d H:i:s");
	
	$set="fname='$fname'";
	$set.=",lname='$lname'";
	$set.=",company_name='$cname'";
	//$set.=",email='$mail'";
	$set.=",mobile='$mobile'";
	$set.=",company_number='$tel'";
	$set.=",fax='$fax'";
	$set.=",address='$addr'";
	$set.=",zip_code='$postal'";
	$set.=",country='$country'";
	$set.=",state='$state'";
	$set.=",city='$city'";
	$set.=",area='$area'";
	$set.=",website='$site'";
	$set.=",chngdt='$dt'";
	//echo $set; exit;
	echo "update register set $set where id='$user_id'";
	$id=$db->insertid("update register set $set where id='$user_id'");
		/*if(isset($_FILES['image']['tmp_name'])) {
			$fpath = $_FILES['img']['tmp_name'] ;
			$iname = $_FILES['img']['name'] ;
			$getext = substr(strrchr($iname, '.'), 1);
			$ext = strtolower($getext);
			if($ext=="jpg" || $ext=="gif" || $ext=="png" || $ext=="jpeg") {
				$nm="user".$id;
				$nimg=$nm.".".$ext;
				$dest="uploads/user_images/$nimg";
				$iset="img='$nimg'";
				move_uploaded_file($fpath,$dest) ;
				chmod($des,0777);
				$db->insertrec("update register set $iset where id='$id'");
			}
			else {
				echo "<script>swal('Oops..', 'Invalid image type!', 'error');</script>";
			}
		}*/
	echo "<script>location.href='$siteurl/profile?acn=supd';</script>";
	header("Location: $siteurl/profile?acn=supd"); exit;
	}

?>
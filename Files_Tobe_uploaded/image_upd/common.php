<?php
require 'PHPMailerAutoload.php';

class common extends database {
	
	public $img_Err;
	public $img_Name;
	
	function drop_down($db,$query,$getval,$getname){
		$list = "";
		$rs=$db->get_all("$query");
		//print_r($rs); exit;
		for($astrn=0; $astrn<count($rs); $astrn++){
			$dropval=$rs[$astrn][0];
            $dropcont =$rs[$astrn][1];
			if($dropval == $getval)
				$list .= " <label><input type='radio' id='$getname' name='$getname' value='$dropval' data-parsley-group='order' data-parsley-required checked>$dropcont</label><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			else	
				$list .= " <label><input type='radio' id='$getname' name='$getname' value='$dropval' data-parsley-group='order' data-parsley-required>$dropcont</label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		return $list;
	}
	//========================================================================	
	function dropdown($array,$getval,$getname){
		$list = "<option value='0'>--select--</option>";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<option value='$astrn' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astrn'>$array[$astrn]</option>";
		}
		return $list;
	}
	//========================================================================	
	function dropdown_support($array,$getval){
		$list = "<option value='0'>--select--</option>";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn==1){$astr=1;}else if($astrn==2){$astr=7;}else if($astrn==3){$astr=10;}
			if($astr == $getval)
				$list .= "<option value='$astr' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astr'>$array[$astrn]</option>";
		}
		return $list;
	}
	function dropdown_array_view($array,$getval){
		$ret = $array[$getval];
		return $ret;
	}
	//========================================================================	
	function drop_down_view($array,$getval){
		$list = "";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= $array[$astrn];
		}
		return $list;
	}
	function counting_days(){
		$start = '2015-01-01';
		$end = date("Y/m/d");
		$diff = (strtotime($end)- strtotime($start))/24/3600; 
		
		return $diff;
	}
	//========================================================================	
	function drop_down_mail($array,$getval){
		$list = $array[$getval];
		return $list;
	}
	//========================================================================	
	function first_letter($string){
		$expr = '/(?<=\s|^)[a-z]/i';
		preg_match_all($expr, $string, $matches);
		$result = implode('', $matches[0]);
		$result = strtoupper($result);
		return $result;
	}
	//========================================================================	
	function int_val($string){
		$ret = preg_replace("/[^0-9]/","",$string);
		return $ret;
	}
	//=======================================================================
	function character($string){
		$ret = preg_replace('/[^A-Za-z]/', '', $string);
		return $ret;
	}
	//=======================================================================
	function user_profile_id($getid){
		$array = array("","00000","0000","000","00","0");
		$charval = preg_replace('/[^A-Za-z]/', '', $getid);
		$getrec = database::singlerec("select user_profileid from register where user_profileid like '%$charval%' order by user_profileid desc");
		$userprofileid = $getrec['user_profileid'];
		if($userprofileid=="")
			$userprofileid=$getid;

		$intval = preg_replace("/[^0-9]/","",$userprofileid);
		$incval = bcadd($intval,1,0);
		$stlen = strlen($incval);
		$zero = $array[$stlen];
		$ret = $charval.$zero.$incval;
		return $ret;
	}
	//========================================================================	
	function hidecontrols($string){
		if($string == "Admin")
			$ret = "";
		else
			$ret = "<style>.btn-default{display:none;} .cntrhid{display:none;}</style>";
		
		return $ret;
	}
	function datetimestamp($getdate){
		$DateArr = @split("/",$getdate);
		@list($bkDate,$bkMonth,$bkYear) = $DateArr;
		$ret = @mktime(0,0,0,$bkMonth,$bkDate,$bkYear);
		return $ret;
	}
	function expired_dt($call_dt,$tot_month){
		if($call_dt !=""){
			$DateArr = @split("/",$call_dt);
			@list($bkDate,$bkMonth,$bkYear) = $DateArr;
			$ret = @mktime(0,0,0,$bkMonth+$tot_month,$bkDate,$bkYear);
			$ret = date("d/m/Y",$ret);
		}
		else{
			$ret = "";
		}
		return $ret;
	}
	function opt_num(){
		$ret = mt_rand(100000, 999999);
		return $ret;
	}
	function email_old($from,$to,$subject,$message){
		
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <'.$from.'>' . "\r\n";
		@mail($to, $subject, $message, $headers);
	}
	
	function email($from,$to,$subject,$msg){
		$from = "support@oldindiancoins.in";
		$mail = new PHPMailer;	
		$mail->IsSMTP();                           
		$mail->SMTPDebug = false;
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'koei.websitewelcome.com';  
		$mail->Port = 465;  
		$mail->IsHTML(true);     
		$mail->Username = 'support@oldindiancoins.in';         
		$mail->Password = 'support@321';                         
		$mail->setFrom($from, 'OldIndiaCoins');      
		$mail->Subject = $subject;
		$mail->Body    = $msg;
		$mail->addAddress($to, 'Members');   
		
		if(!$mail->send()) {
			$ret = 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$ret = "scs ".$mail->send();
		}
		return $ret;
	}
	
	function singup_mail($from,$to,$url){
		$subject = "Confirm your account for Exclusivescript";
		$message ="<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'><center style='background-color:#f1f1f1;'> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' style='color:#FFFFFF; background:#1976D2;'> <tr > <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px;'> Support Email: support@exclusivescript.com </td> </tr> </table><table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'> <tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'> <!-- // CONTENT TABLE --> <table border='0' cellpadding='15' cellspacing='0' width='100%'><tr><td align='center' valign='top' class='textContent'> <a href='http://www.exclusivescript.com/' target='_blank'> <img src='http://www.exclusivescript.com/admin/uploads/general_setting/logo.png' class='img-responsive'></a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 40px; background:#D3E6F9;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'><tr><td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; font-weight: 600;'>To activate, click below link. If you believe this is an error, ignore this message and we'll never bother you again.</td></tr> <tr><td align='center' valign='top' class='textContent' style='padding-top: 30px;' ><a style='color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%; padding: 10px 20px; background: #F79118; border-radius: 30px;' href='$url' target='_blank'>Click here</a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><!-- // CENTERING TABLE --> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 10px; background:#1976D2;'> <tr> <td></td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding:26px; background:#d8dde4;'> <tr> <td align='center' style='color:#999;'> <table width='200' border='0' cellspacing='2' cellpadding='0'> <tr> <td><a href='www.facebook.com' target='_blank'><img src='http://www.exclusivescript.com/images/social/facebook.png' width='32'></a></td> <td><a href='https://twitter.com' target='_blank'><img src='http://www.exclusivescript.com/images/social/twitter.png' width='32'></a></td> <td><a href='https://plus.google.com/' target='_blank'><img src='http://www.exclusivescript.com/images/social/google-plus.png' width='32'></a></td> <td><a href='https://www.linkedin.com/' target='_blank'><img src='http://www.exclusivescript.com/images/social/linkedin.png' width='32'></a></td> </tr> </table> </td> </tr> <tr> <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'> Copyright &copy; 2016 www.exclusivescript.com. All rights reserved. If you do not want to recieve emails from us, you can <a href='#'>unsubscribe</a>. </td> </tr> </table> </td></tr><!-- // MODULE ROW --> </table> </center> </body>";
		
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <'.$from.'>' . "\r\n";
		
		@mail($to, $subject, $message, $headers);
	}
	function month_days($fromdate){
		/* $DateArr = @explode("-",$fromdate);
		list($dtYear,$dtMonth,$dtDay) = $DateArr;
		$frmdate = $dtYear."-".$dtMonth."-".$dtDay; */
		$todate = date("Y-m-d");
		
		$date1 = strtotime($fromdate);
		$date2 = strtotime($todate);
		$months = 0;
		while (strtotime('+1 MONTH', $date1) < $date2) {
			$months++;
			$date1 = strtotime('+1 MONTH', $date1);
		}
		$ret = $months.' month,'. ($date2 - $date1) / (60*60*24) .' days'; 
		return $ret;
	}
	function timeconvert($from_time,$to_time){
	   $hours=intval($DepartureTime / 3600);
	   $mins=intval($DepartureTime / 60) % 60;
	   $secs=$DepartureTime % 60;
	   $trvaltime=sprintf("%d:%02d:%02d",$hours, $mins, $secs);
	}
	function calc_wallet($userid){
		$getwallet = database::singlerec("select amount as amt from wallet where user_id='$userid'");
		$ret=$getwallet['amt'];
		$ret=number_format((float)$ret,2, '.', '');
		return $ret;
	}
	function rating($product_id){
		$ret="";
		$rate_all=database::singlerec("SELECT sum(rating),count(rating) as rsum from rating where product_id='$product_id'");
		if($rate_all[1]!=0){
			$rate_avg = number_format((float)((int)$rate_all[0]/(int)$rate_all[1]),1, '.', '');	
			for($i=0;$i<5;$i++){
				if($i<(int)$rate_avg)
					$ret .="<i class='fa fa-star'></i>";
				else
					$ret .="<i class='fa fa-star-o'></i>";	
			}
			$ret .="&nbsp;(".$rate_avg.")";
		}
		else{
			$ret .="No reviews";	
		}
	return $ret;
	}
	function randuniq($id){
		$str='';
		$str.=substr(str_shuffle("01234123456789123489abcdeefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
		$str.=$id;
		$str.=substr(rand(0,time()),-4);
		return $str;
	}
	
	function encid($id){
		$id = $id*17;
		$pf = rand(111,999); 
		$sf = rand(11,99);
		$enid = $pf.$id.$sf;
		return $enid;
	}
	function decid($enid){
		$enid = database::escapstr($enid);
		$id1 = substr($enid,3,strlen($enid));
		$id2 = substr($id1,0,-2);
		$id2 = $id2/17;
		return $id2;
	}
	function get_price($psls)
	{
	$sls = strpos($psls,'/');
	return $BL_d_price	= substr($psls,0,$sls);
	}
	function get_per($psls){
	$sls = strpos($psls,'/');
	return $BL_d_per = substr($psls,$sls+1,strlen($psls)); 		
	}
	
	
	
	function randuniq_temp($id){
		$str='';
		$str.=substr(str_shuffle("01234123456789123489abcdeefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
		$str.=$id;
		$str.=substr(uniqid(),-4);
		return $str;
	}
	function notify_count(){
		$userlog=@($_SESSION['vyuserlog']?$_SESSION['vyuserlog']:'');
		
		$sql="select count(*) from notification where vendor_id='$userlog' and status='0'";
		
		$ntstv=database::singlerec("select notify_settings from store where own_by='$userlog'");
		$ntsarray=explode(',',$ntstv[0]);
		if(!empty($ntsarray)){
			$sql.="and (";	
			foreach($ntsarray as $index=>$sid){
				if(($index+1) < count($ntsarray))	
					$sql.=" notify_type = '$sid' or";
				else
					$sql.=" notify_type = '$sid'";	
			}
			$sql.=")";
		}else{
		$sql.=" and notify_type = '0'";	
		}
		
		$ntcount=database::singlerec($sql);
		$ret=$ntcount[0];
		return $ret;
	}
	function notification($date){
		$ret=date('h:i:s a',strtotime($date));
		return $ret;
	}
	
	function dtdiff($d1){
		$d1 = strtotime($d1);
		$d2 = time();
		$mindiff = round(($d2-$d1)/60);
		$hourdiff = round(($d2-$d1)/(60*60));
		$daydiff = round(($d2-$d1)/(60*60*24));
		
		//singular
		 if($mindiff==1){
			return 	'1 minute ago';
		}else if($hourdiff==1){
			return 	'1 hour ago';
		}else if($daydiff==1){
			return 	'1 day ago';	
		}else if(round($daydiff/7)==1){
			return 	'1 week ago';	
		}else if(round($daydiff/30)==1){
			return 	'1 month ago';	
		}else if(round($daydiff/365)==1){
			return 	'1 year ago';	
		}
		//flural
		if($mindiff == 0){
			return 	'just now';	
		}else if($mindiff<60){
			return 	$mindiff.' minutes ago';
		}else if($hourdiff<24){
			return 	$hourdiff.' hours ago';	
		}else if($daydiff<7){
			return 	$daydiff.' days ago';	
		}else if($daydiff<31){
			return 	round($daydiff/7).' weeks ago';	
		}else if($daydiff<365){
			return 	round($daydiff/30).' months ago';	
		}else if($daydiff>365){
			return 	round($daydiff/365).' years ago';	
		}
	}
	
	function get_drop($array,$check,$apnd){
		foreach($array as $val){
		$vals = strtolower($val);
		$valc = ucwords($val);
		  if($vals==strtolower($check))
			  $ch="selected";
		  else
			  $ch="";
		echo "<option value='$vals' $ch>$valc$apnd</option>";
		}
	}
	
	function get_radio($array,$check,$name){
		foreach($array as $val){
		$vals = strtolower($val);
		$valc = ucwords($val);
		  if($vals==strtolower($check))
			  $ch="checked";
		  else
			  $ch="";
		
		if($name=='COM_acpt_order' || $name=='COM_trade_show')
		{
			$valid='data-parsley-group="other" data-parsley-required';
		}
		else
		{
			$valid='';
		}
		
		
		echo "<div class='col-md-3'><input type='radio' name='$name' $valid value='$vals' id='$name$vals' $ch> <label for='$name$vals'>$valc</label></div>";
		
		}
	}
	
	
	function get_drop_multiple($array,$check,$apnd){
		
		$check = array_map('strtolower', $check);
		foreach($array as $val){
			$vals = strtolower($val);
			$valc = ucwords($val);

			if(in_array($check,$vals))
			   $ch="selected";
			else
			   $ch="";
			echo "<option value='$vals' $ch>$valc$apnd</option>";
		}
	}
	
	function upload_image($name1,$name2,$width,$height,$r1,$r2,$path,$acn){
				
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($size>2097152) { //1048576 Bytes =  MB
				$this->img_Err="File size exceeded";
				return false;
			}
			/*if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Too small";
				return true;
			}
			if(($image_width*$r2)!=($image_height*$r1)){ 
				$this->img_Err="Miss match aspect ratio";
				return true;
			}*/
			
			if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'bmp' || $ext == 'ico')
			{
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				
				move_uploaded_file($fpath,$img_size);
								
				/*if (preg_match('/jpg|jpeg/i',$ext))
				$imageTmp=imagecreatefromjpeg($img_size);
				else if (preg_match('/png/i',$ext))
					$imageTmp=imagecreatefrompng($img_size);
				else if (preg_match('/gif/i',$ext))
					$imageTmp=imagecreatefromgif($img_size);
				else if (preg_match('/bmp/i',$ext))
					$imageTmp=imagecreatefrombmp($img_size);
				
				imagejpeg($imageTmp,$img_size,72);
				imagedestroy($imageTmp);*/
				
				if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    }
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
			else{
				$this->img_Err="Missmatch file format";
				return false;
			}
		}else{
				$this->img_Err="Image missing";
				return false;
		}
	}
	
	function setBadge($mem_id){
		$mem_id = (int)$mem_id;
		$badge = "";
		if((int)$mem_id===1){
			$badge = "free.png";
		}else if((int)$mem_id===2){
			$badge = "silver.png";
		}else if((int)$mem_id===3){
			$badge = "gold.png";
		}else if((int)$mem_id===4){
			$badge = "diamond.png";
		}else if((int)$mem_id===5){
			$badge = "platinum.png";
		}else{
			$badge = "free.png";
		}
		return $badge;
	}
	function sociallink($shareurl){
		$ret="<ul class='list-inline'>
			  <li><a href='http://www.facebook.com/sharer.php?u=$shareurl' target='_blank'><i class='fa fa-facebook-square'></i></a></li>
			  <li><a href='https://twitter.com/share?url=$shareurl' target='_blank'><i class='fa fa-twitter-square'></i></a></li>
			  <li><a href='https://plus.google.com/share?url=$shareurl' target='_blank'><i class='fa fa-google-plus-square'></i></a></li>
			  <li><a href='http://www.linkedin.com/shareArticle?mini=true&amp;url=$shareurl' target='_blank'><i class='fa fa-linkedin-square'></i></a></li>						  
			</ul>";
		return $ret;
	}
	/*function getExplode($string,$filed,$table){
		$bizz_types = explode(',',$string);
		$bizzs = array();
		foreach($bizz_types as $bz){
			//$biz = $db->singlerec("select ".$filed." from ".$table." where id = '$bz'");
		   array_push($bizzs,ucfirst($biz[0]));	
		}
		$biz_type = implode(' , ',$bizzs);
	}*/
	
	function checkDdate($date){
		$cdate = date('d-m-Y',strtotime($date));
		if($cdate=='01-01-1970'){
			return false;
		}else{
			return true;
		}
	}
	
	function getCountry($id){
		$country = database::singlerec("select nicename from countries where id='$id'");
		return $country[0];
	}
	
	function Getcode() {
		if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) 
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) 
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		else $ip=$_SERVER['REMOTE_ADDR'];
		//$ip="14.102.47.106";
		$Url=base64_decode("aHR0cDovL2ZyZWVnZW9pcC5uZXQvanNvbi8=");
		$user=json_decode(file_get_contents($Url.$ip));
		if($user->country_code=="") $code="IN";
		else {
			if($user->country_code=="IN")
				$code=$user->region_code;
			else $code=$user->country_code;
		}
		return $code;	
	}
	
	function GetProfileid($statearr, $usertype) {
		$Y=date("y");
		$code=$this->Getcode();
		$profileid=database::singlerec("select id from register order by id desc limit 1");
		$profileid=$profileid['id']+1;
		$sno=sprintf("%05d", $profileid);
		$usertype=database::singlerec("select name from membership where id='$usertype'");
		$usertype=substr($usertype['name'],0,1);
		$stateno=$statearr[$code];
		if($stateno=="") $stateno="00";
		return $Y.$code.$sno.$stateno.$usertype;
	}
		
}
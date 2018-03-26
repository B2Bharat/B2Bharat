<?include "header.php";

if(isset($fpassword)){
  $email = isset($femail)?$db->escapstr($femail):"";	
  $checkCount = $db->singlerec("select count(*) from register where email = '$email'");
  if((int)$checkCount[0]===1){
	$new_pass = $com_obj->randuniq(rand(0,99));  
	$md5_new_pass = md5($new_pass);
	$db->insertrec("update register set password = '$md5_new_pass',decript_password = '$new_pass' where email='$email'");
	
	$from = $db->singlerec("select admin_email from general_setting where id='1'");
	
	$msg="<div style='background:#f5f5f5;margin:0 auto'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto'> 
	<tbody> <tr> <td valign='top' style='padding-left:0px'></td> </tr> <tr> <td> <table width='600' style='background:#ffffff;border:1px solid #e2e2e2'> 
	<tbody> <tr> <td> <table style='width:100%'> <tbody> <tr> <td valign='top' style='padding:2px 6px;border:0px'> <table cellspacing='0' cellpadding='0' border='0'
	bgcolor='#ffffff' width='100%'> 
	<tbody> <tr> <td valign='top' style='padding:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='$siteurl/assets/images/$sitelogo'
	alt='' style='display:block' class='CToWUd'> </a> </td>
	<td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td align='right' 
	valign='middle' style='vertical-align:middle;padding-left:0px;font:bold 11px arial; color:#a2a2a2;'> Toll Free </td> <td align='right' valign='middle'
	style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#a2a2a2;line-height:20px'> $_tel </td> </tr> </tbody> </table> <table cellspacing='0' 
	cellpadding='0' border='0'> <tbody> <tr> <td align='right' valign='top' style='padding:3px 0px;font:bold 11px arial;color:#a2a2a2;line-height:17px'> 
	International Helpline <span style='font:normal 11px arial'> $_mob </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> 
	<tr> <td valign='top' style='padding:0px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#a2a2a2' width='100%' height='1'> 
	<tbody> <tr></tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> </tr> <tr style=''> <td align='center'>
	<div style='font:bold 20px arial;padding:10px 5px 15px;color:#a2a2a2; '> Welcome to&nbsp; B2bharat.com  <br/> 
	<h4>Your new password is <span color='red'>$new_pass</span>.</h4> <!-- <span style='color:#D61C23'>B</span>
	<span style='color:#4E68A1;'>2</span><span style='color:#D61C23'>B</span> --></div> </td> </tr> <tr> <td align='center'> 
	<table> <tbody> <tr> <td align='center' bgcolor='#1A54BA' style='background:#DC2828; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; 
	border-radius: 4px;'> <div class='contentEditableContainer contentTextEditable'> <div class='contentEditable' align='center'><a href='$siteurl/login' 
	style='color:#ffffff;font:bold 12px arial;text-decoration:none;'>Login</a></div></div> </td> </tr> </tbody> </table> </td> </tr>
	<tr> <td valign='top' style='padding:15px 1px 15px 18px;font:bold 12px arial;color:#000;'>Warm Regards, <br>
	<span style='color:#D61C23'><b>Team $sitetitle</b></span> </td> </tr> </tbody> <tbody> <tr> <td> 
	<table> <tbody> <tr> <td style='border-top:1px solid #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr> 
	<tr> <td valign='top' style='padding:10px 0px 3px;border:0px'> <table cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' width='100%'> 
	<tbody> <tr> <td valign='top' style='padding-left:0px;padding-bottom:13px'> <table cellspacing='0' cellpadding='0' border='0'> 
	<tbody> <tr> <td valign='top' style='padding-left:0px'> <table cellspacing='0' cellpadding='0' border='0' height='75'> 
	<tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:10px'> 
	<img border='0' width='49' height='49' src='$siteurl/images/phone.png' alt='' style='display:block' class='CToWUd'> </td> 
	<td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px'> CALL <br> 
	<span style='font:bold 12px arial;color:#D61C23;line-height:20px'> $_tel </span> <br> </td> </tr> </tbody> </table> </td> <td valign='middle' style='padding-left:20px'>
	<img border='0' width='1' height='60' alt='' style='display:block'> </td> <td valign='middle' style='vertical-align:middle;padding-left:0px'> 
	<table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:20px'> 
	<a style='color:#006fb4;text-decoration:none' href='mailto:info@indiaproperty.com' target='_blank'> 
	<img border='0' width='49' height='49' src='$siteurl/images/mail.png' alt='' style='display:block' class='CToWUd'> </a> </td>
	<td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> EMAIL <br>
	<a href='mailto:$siteemail' style='color:#D61C23;font:bold 12px arial;text-decoration:none;' target='_blank'> $siteemail </a> </td> </tr> </tbody> </table> </td>
	<td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td>
	<td valign='top' style='padding-left:15px'> 
	<table cellspacing='0' cellpadding='0' border='0' height='75'> <tbody> <tr> <td valign='middle' style='vertical-align:middle;padding-left:0px'> 
	<a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' width='49' height='49' src='$siteurl/images/world.png' alt='' style='display:block' class='CToWUd'>
	</a> </td> <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px'> Website <br>
	<span style='color:#006fb4;text-decoration:none;font:normal 12px arial'>
	<a href='#' style='color:#D61C23;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> $siteurl </a> </span> </td> </tr> </tbody> </table>
	</td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='width:100%'> 
	<table cellspacing='0' cellpadding='0' style='width:24%;border-collapse:collapse;margin-left:40%;' bgcolor='#ffffff'> <tbody> <tr style='width:20%;'> 
	<td valign='top' width='20px' style='#'> <a href='$_fb' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/fb.png' style='outline:none;text-decoration:none;border:none; width:25px;' class='CToWUd'></a>
	<!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> 
	<a href='$_gp' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/gp.png' style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> 
	<!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> <td valign='top' width='20px' style='#'> <a href='$_ln' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/linkedin.png'
	style='outline:none;text-decoration:none;border:none;width:25px;' class='CToWUd'></a> <!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> 
	</td> <td valign='top' width='20px' style='#'> <a href='$_tw' style='color:#6d96c4;text-decoration:none' target='_blank' data-saferedirecturl='#'><img src='$siteurl/images/twt.png' style='outline:none;text-decoration:none;border:none;max-width:600px;width:25px;' class='CToWUd'></a>
	<!-- <p style='font-size:12px;margin:1em 0;line-height:1.5em'> Facebook </p> --> </td> </tr> </tbody> </table> </td> </tr> <tr> <td style='border-top:1px dashed #cccccc;border-bottom:none;border-right:none;border-left:none'> </td> </tr>
	<tr> <td valign='top' style='padding:0px 6px 1px;border:0px'> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr>
	<tr> <td> <table> <tbody> <tr> <td> <table width='600'> <tbody> <tr> <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'>
	Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='#' target='_blank'>Unsubscribe</a> </td> </tr> </tbody>
	</table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <div class='yj6qo'></div> <div class='adL'></div></div>";	
	
	$sub="New password request $sitetitle";
//	$com_obj->email($from[0],$email,$sub,$msg);
	
//require_once('phpmailer/PHPMailerAutoload.php');
// $mail = new PHPMailer(); // create a new object
// $mail->IsSMTP(); // enable SMTP
// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
// $mail->SMTPAuth = true; // authentication enabled
// $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 587; // or 587
// $mail->IsHTML(true);
// $mail->Username = "inqury@b2bharat.com";
// $mail->Password = "vin@1985";
// $mail->SetFrom($from[0]);
// $mail->Subject = $sub;
// $mail->Body = $msg;
// $mail->AddAddress($email);

 $header = "From:admin@b2bharat.com \r\n";
         $header .= "Cc:admin@b2bharat.com \r\n";
 $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
 $retval = mail ($email,$sub,$msg,$header);
         
 if( $retval == true ) {
   echo "<script>swal('Success!','check your mail for the new password','success');</script>";	
         }else {
            echo "<script>swal('fail!','mail not exist','fail');</script>";
         }

//  if(!$mail->Send()) {
//   echo "Mailer Error: " . $mail->ErrorInfo;
//  } else {
//   echo "<script>swal('Success!','check your mail for the new password','success');</script>";	
   
//  }
	
	
	
	
//   }else{
// 	echo "<script>swal('Sorry!','cannot find the deatils about you in our records!','error');</script>";	  
//   }

      
  }}
?>

<style>
.slider input {
    display: inline-block;
    margin-bottom: 15px;
}
</style>
<?include "include/searchDiv.php";?>
 			
<div class="container-fulid pdt25 pdb25" style="background-color:#f5f5f5;">
<div class="container">
<div class="col-md-12">	
<div class="col-md-8">
</div>
<div class="col-md-4">		
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
   <a href="login" style="color:#FFF;">Click To Login</a>
  </div>
  <div class="form" style="display: block;">
    <h2>Forgot Your Password ?</h2>
    <form method="POST" action="#">
      <input type="email" name="femail" placeholder="Enter Email-id" required>
      <button type="submit" name="fpassword">Get Password</button>
    </form>
  </div>

  <div class="cta"><a href="register">Don't Have Register Now</a></div>
</div>
</div>
</div>
			<div class="row text-center hidden">
				<!-- user-login -->			
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>User Login</h2>
						<!-- form -->
						<form action="#">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password">
							</div>
							<button type="submit" href="#" class="btn">Login</button>
						</form><!-- form -->
					
						<!-- forgot-password -->
						<div class="user-option">
							<div class="checkbox pull-left">
								<label for="logged"><input type="checkbox" name="logged" id="logged"> Keep me logged in </label>
							</div>
							<div class="pull-right forgot-password">
								<a href="#">Forgot password</a>
							</div>
							<div class=" col-md-12 text-center forgot-password">
								<a href="#">Register Now</a>
							</div>
						</div><!-- forgot-password -->
					</div>

				</div><!-- user-login -->			
			</div>

				
			
			
		</div><!-- container -->
		</div>

<?include "footer.php";?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>   
<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;">Scroll to top</a></body>

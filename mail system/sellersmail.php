<?php

include "admin/AMframe/config.php";
$admin_info = $db->singlerec("select * from admin where id='1'");

$to=$admin_info['email_id'];

 $name=$_POST['name'];

 $email=$_POST['email'];

 $Company_name=$_POST['Company_name'];

 $Country=	$_POST['Country'];

 $phone=$_POST['phone'];
 
 
 $recipients = $to;
 $subject="Sellers feedback";
 
 $message="Hi Admin,<br/><br/>Someone contacted you on cfeedback <br/><br/> Details are as below:<br/><br/>";

	 

 $message.="Name :  ".$name."<br/> Company :  ".$Company_name."<br/> Country. :  ".$Country."<br/> Email :  ".$email."<br/> Mobile : ".$phone;

 $message.=	"<br/><br/>Thanks."	;
 /*====Code by Abhishek kandari - Start===*/
 
 $mail = new PHPMailer(); // create a new object
 $mail->IsSMTP(); // enable SMTP
 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "smtp.gmail.com";
 $mail->Port = 587; // or 587
 $mail->IsHTML(true);
 $mail->Username = "inqury@b2bharat.com";
 $mail->Password = "vin@1985";
 $mail->SetFrom("inqury@b2bharat.com");
 $mail->Subject = "Feedback";
 $mail->Body = $message;
 $mail->AddAddress($recipients);
 
 if(!$mail->Send()) {
 	echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
 	echo "Message has been sent";
 }
 /*====Code by Abhishek kandari - End ===*/
 
 /* $headers= 'MIME-Version: 1.0' . "\n";

 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

 $headers .= 'From:'.$email."\n";

 $headers .=  'Reply-To:'.$email."\n";

 $headers .= 'Return-Path:'.$email."\n"; 

 $headers .= "X-Mailer: PHP mail() Function\n";
 
 $send_contact=mail($recipients,$subject,$message,$headers);

 echo $send_contact ? "Mail sent" : "Mail failed";
 */
?>
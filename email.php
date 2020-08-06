<?php 

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true); 

try { 
	$mail->SMTPDebug = 2;									 
	$mail->isSMTP();											 
	$mail->Host	 = 'smtp.gmail.com;';					 
	$mail->SMTPAuth = true;							 
	$mail->Username = 'alankarshelar89@gmail.com';
	//$mail->Password = '************';
	
	$mail->SMTPSecure = 'tls';							 
	$mail->Port	 = 587; 

	//$mail->setFrom('asshelar@dktes.com', 'Alankar Shelar');		 
	//$mail->addAddress('alankarshelar5620@gmail.com'); 
	//$mail->addAddress('alankarshelar89@gmail.com', 'AS'); 
	
			//From email address and name
		$mail->From = "alankarshelar@gmail.com";
		$mail->FromName = "Hackers from dark web";

		//To address and name
		$mail->addAddress("lotakec@gmail.com", "Chaitanya");
		//$mail->addAddress("alankarshelar89@gmail.com"); //Recipient name is optional

		//Address to which recipient will reply
		$mail->addReplyTo("asshelar@yourdomain.com", "Reply");

		//CC and BCC
		//$mail->addCC("cc@example.com");
		//$mail->addBCC("bcc@example.com");
	
	   $mail->addAttachment("img1.jpg","file.txt");
	
	$mail->isHTML(true);								 
	$mail->Subject = 'Account is Hacked.........'; 
	$mail->Body = 'Your account is hacked contact me immediately... '; 
	$mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
	$mail->send(); 
	echo "Mail has been sent successfully!"; 

} 
catch (Exception $e) 
{ 
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
} 

?> 

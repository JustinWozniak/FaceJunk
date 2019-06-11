<?php
//-------------------THE FOLLOWING IS EMAIL SENT WHEN YOU SIGN UP
include("includes/form_handlers/register_handler.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\composer\vendor\autoload.php';

	$mail = new PHPMailer(TRUE);
	
	try {
	
		$mail->setFrom('rockabillyriot@hotmail.com', 'Justin Wozniak');
		$mail->addAddress($emailAddressUsedToSendTo, 'Emperor');
		$mail->Subject = 'FaceJunk all over the place!~';
	
		$mail->isHTML(TRUE);
		$mail->Body = '<html>Welcome to <strong>FaceJunk!!</strong>. Get ready! Its gunna get messy!<br>
		I started this thing in June 2019 and its been growing ever since!!!!!<br>
		Anything goes so watch out!<br>
		Apon sign in you will be given a random picture for your profile pic, and if your bored with the background, just hit refresh...<br>
		Theres 40 random ones that will be shown.</html>';
		$mail->AltBody = 'There is a great disturbance in the Force.';
		$mail->addAttachment('C:\xampp\htdocs\tests\facejunk\assets\images\logos\facejunk logo.jpg', 'Your a mess...');
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls';
		$mail->Username = 'thedrunkfox69@gmail.com';
		$mail->Password = 'thecomet';
		$mail->Port = 587;
	
		/* Enable SMTP debug output. */
		$mail->SMTPDebug = 0;
	
        $mail->send();
        // header($_SERVER['PHP_SELF']);
	} catch (Exception $e) {
		// echo $e->errorMessage();
	} catch (\Exception $e) {
		// echo $e->getMessage();
	}
	
	?>
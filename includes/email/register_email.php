<?php
//-------------------THE FOLLOWING IS EMAIL SENT WHEN YOU SIGN UP
// require 'register_handler.php';

ob_start(); //Turns on output buffering 
session_start();

$timezone = date_default_timezone_set("America/Toronto");

$con = mysqli_connect("localhost", "root", "", "social"); //Connection variable

if (mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}




$email = mysqli_query($con, "SELECT email from users ORDER by id DESC LIMIT 1");
$emailAddress = mysqli_fetch_array($email);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\composer\vendor\autoload.php';

$mail = new PHPMailer(TRUE);

try {

	$mail->setFrom('rockabillyriot@hotmail.com', 'Justin Wozniak');
	$mail->addAddress($emailAddress['email'], 'Emperor');
	$mail->Subject = 'Starfukkers!~';

	$mail->isHTML(TRUE);
	$mail->Body = '<html>Welcome to StarfüKkers!!!!!!.<br>
	FUCKING RIGHT!<br>
	Congratulations on the invite, and Welcome to StarfüKkers!!!!<br>
	An adult Social Network!<br>
	Please make your way to ----------------- and sign in with the password your given.<br>
	When you first land, make your way over to the Rules/Updates page to get the lowdown on everything!';
	$mail->AltBody = 'You better take care of me Lord, if you dont youre gonna have me on your hands.';
	$mail->addAttachment('C:\xampp\htdocs\tests\Gonzo\assets\images\s\starfuckkers.jpg', 'We cant stop here....');
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


<html>

<head>
	<title>Starfukkers!!!!~</title>
	<link rel="stylesheet" type="text/css" href="./success_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body class='mainview'>
	<div class="thisClass">
		Signup successful!<br>
		PLEASE go check your email for rules and disclaimer before signing in!!!!<br>
		<hr>
		“Sleep late, have fun, get wild, drink whiskey, and drive fast on empty streets with nothing in mind but falling in love and not getting arrested."
		<hr>
		<a href="javascript:history.back()">Go Back</a>
	</div>
</body>

</html>


</div>
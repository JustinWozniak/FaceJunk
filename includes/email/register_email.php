<?php
//-------------------THE FOLLOWING IS EMAIL SENT WHEN YOU SIGN UP
// require 'register_handler.php';

ob_start(); //Turns on output buffering 
session_start();

$timezone = date_default_timezone_set("America/Toronto");

$con = mysqli_connect("localhost", "root", "", "social"); //Connection variable

if(mysqli_connect_errno()) 
{
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
		$mail->Subject = 'Gonzo---A Social Network For All Us Freaks!~';
	
		$mail->isHTML(TRUE);
		$mail->Body = '<html>Welcome to the <strong>Gonzo!!</strong> social network!!!.<br>
		I started this project in June 2019 and its been growing ever since!!!!!<br>
		Anything goes so watch out!<br>
		Freddom of speech is pushed hard here, but harrassment will not be tolerated....
		All comments on posts are anonomous, so be aware....
		Apon sign in you will be given a random picture for your profile pic, but feel free to change it....and if your bored with the background, just hit refresh...<br>
		Theres 40 random ones that will be shown.</html><br>
		This site HAS NOT been optimized so, it may be best to stick to using it over wi-fi for the start.
		ALSO....I DO NOT HAVE ACCESS TO YOUR PASSWORDS!!!!!!!! And havent implimented a forgotten password page yet.<br>
		If you forget your password you will need to have your account deleted if you want to make a new account with the same e-mail.<br><BR>
		With all that being said, Im open to any ideas anybody has on making this experience better...I am new to 
		all this programming, but as i continue to grow, I hope Gonzo does as well.<br>
		Thanks for signing up, ENJOY!!!!<br>
		----------Justin Wozniak......President, Owner, Stoner, Beer Drinker, FUCKIN ROCKSTAR FROM ANOTHER GALAXY, Guitar bender, HUNTER S.THOMPSON FANATIC, rambler on of words ;)<br><br>
		Crazy is a term of art; Insane is a term of law. Remember that, and you will save yourself a lot of trouble. Hunter S. Thompson';
		$mail->AltBody = 'You better take care of me Lord, if you dont youre gonna have me on your hands.';
		$mail->addAttachment('C:\xampp\htdocs\tests\Gonzo\assets\images\logos\Gonzo logo.jpg', 'We cant stop here....');
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
	<title>Gonzo---A Social Network For All Us Freaks!~</title>
	<link rel="stylesheet" type="text/css" href="./success_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<body class='mainview'>
	<div class="thisClass">
	Signup successful!<br>
	PLEASE go check your email for rules and disclaimer before signing in!!!!<br><hr>
	“Sleep late, have fun, get wild, drink whiskey, and drive fast on empty streets with nothing in mind but falling in love and not getting arrested."<hr>
	<a href="javascript:history.back()">Go Back</a>
	</div>
  </body>
</html>


</div>
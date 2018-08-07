
<?php

session_start();
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['Email'])){

	$mail = new PHPMailer\PHPMailer\PHPMailer();

	$em = strtolower($_POST['Email']);
	if(isset($msg)) unset($msg);
	if(isset($error)) unset($error);
	if(isset($errormsg)) unset($errormsg);

	   
	if(!$mail->validateAddress($em)){
		$errormsg = 'Your Invalid Email Address was Invalid';
		$error = 1;
		
	}
	else{
		$to = "sdlab8008@gmail.com";
		$name = $_POST["name"];
		$mess = $_POST["mess"];
		$subject = "Message from ".$name." concerning http://127.0.0.1/sdlab/";
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "sdlab8008@gmail.com";
		$mail->Password = "admin000000";
		$mail->setFrom($em, $name);
		$mail->addAddress($to, 'Administrator'); 
		$mail->Subject = $subject;        
		$mail->Body = $mess;

		if(!$mail->send()) {
			$errormsg = "Could not reach the given address";
			$error = 1;
		}
		else{
			$msg = "Your message has been sent.";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="css/bootstrap.css" />
 <link rel="stylesheet" href="css/fontawesome.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/contact.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <title>Contact Page</title>
</head>
<body>
	<div class="nav" id="mnav">
		<a href="index.php" id="home">MobileShopBD</a>
	
	</div>
    <div class="signup-form">
    
	<h1>Contact Us</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<p>
            <div class="ficon">
			<span class="glyphicon glyphicon-user"></span>
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
			</p>
			<p>
			<div class="eicon">
			<span class="glyphicon glyphicon-envelope"></span>
            <input id="email" name="Email" type="email" placeholder="Your E-Mail" required>
			</div>
			<p>
            <div class="ficon">
			
            <input type="text" id="mess" name="mess" placeholder="Your Message" required>
            </div>
			</p>
			<?php
				if(isset($errormsg) && isset($error))
				{
					echo "<span style='color:#960c00;'><strong>*".$errormsg."*</strong></span>";
				}
				else if(isset($msg)){
					echo "<span style='color:#0c9600;'><strong>*".$msg."*</strong></span>";
				}
			?>	
			
			<p>
			<input type="submit" class="btn" name="submit" value="Send Message">
            </p>
		</form>
    </div>
</body>
</html>
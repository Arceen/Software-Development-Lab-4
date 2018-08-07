
<?php

session_start();
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();
$host = "localhost";
$user = "root";
$password = "";
$db = "sdlab4";
$link = mysqli_connect($host, $user, $password, $db);
if(isset($msg)) unset($msg);
if(isset($error)) unset($error);
if(isset($errormsg)) unset($errormsg);
if ($link->connect_error) {
	$errormsg = "Could not connect to server. Try again later";
	$error = 1;
}

else if (isset($_POST['Email']) ){
    $em = strtolower($_POST['Email']);
    $q = "SELECT * FROM users WHERE Email = '$em'";
    $result = $link->query($q);
    if($result->num_rows <= 0)
    {
        $errormsg = 'Email is not in use';
		$error = 1;
    }
	else if(!$mail->validateAddress($em)){
		$errormsg = 'Invalid Email Address';
		$error = 1;
		
	}
	else{
		
		$t = $result->fetch_assoc();
		$to = $em;
		$subject = "Password Reminder";
		$txt = "Your Password for http://127.0.0.1/sdlab/ is <strong>".$t["Password"]." .Ignore this if you remember it.";
		$headers = "From: no-reply@localserver.com";
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "sdlab8008@gmail.com";
		$mail->Password = "admin000000";
		$mail->setFrom('sdlab8008@gmail.com', 'Administrator');
		$mail->addAddress($to, $t["FirstName"]);     // Add a recipient
		$mail->Subject = 'Password Reminder';                                 // Set email format to HTML
		$mail->Body = $txt;

		if(!$mail->send()) {
		$errormsg = "Could not reach the given address";
		$error = 1;
		}
		else{
		$msg = "Check your Email for the password.";
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
 <link rel="stylesheet" href="css/forgot.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <title>Password Recovery</title>
</head>
<body>
	<div class="nav" id="mnav">
		<a href="index.php" id="home">MobileShopBD</a>
	
	</div>
    <div class="signup-form">
    
	<h1>Password Recovery</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<p>
			<div class="eicon">
			<span class="glyphicon glyphicon-envelope"></span>
            <input id="email" name="Email" type="email" placeholder="E-Mail" required>
			</div>
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
			<input type="submit" class="btn" name="submit" value="Send Password">
            </p>
		</form>
    </div>
</body>
</html>

<?php

session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "sdlab4";
$link = mysqli_connect($host, $user, $password, $db);
if(isset($error)) unset($error);
if(isset($emailerror)) unset($emailerror);
if ($link->connect_error) {
	$errormes = "Could not connect to server. Try again later";
}

else if (isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['FirstName'])&& isset($_POST['LastName']) && isset($_POST['CFPassword'])&&($_POST['CFPassword'] == $_POST['Password'] ) ){
    $fname = $_POST['FirstName'];
	$lname = $_POST['LastName'];
    $em = strtolower($_POST['Email']);
    $pass = $_POST['Password'];
    $cfpass = $_POST['CFPassword'];
    $q = "SELECT * FROM users WHERE Email = '$em'";
    $result = $link->query($q);
    $q1 = "SELECT * FROM Bannedlist WHERE Email = '$em'";
    $result1 = $link->query($q1);
    
	if($result->num_rows > 0)
    {
        $error = 'Email is already in use';
		$emailerror = 1;
    }
	else if($result1->num_rows>0){
		$error = 'This User Has been banned from site';
		$emailerror = 1;
	}
	else{
		
		$tq = "INSERT INTO users (Email, Password, FirstName, LastName) VALUES ('$em', '$pass', '$fname', '$lname')";
		$tresult = $link->query($tq);
		header("Location: login.php");
	}
}
else if(isset($_POST['Password']) && isset($_POST['CFPassword']) && $_POST['Password']!= $_POST['CFPassword']){
	$error = "Passwords do not match";
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
 <link rel="stylesheet" href="css/signup.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <title>Sign Up</title>
</head>
<body>
	<div class="nav" id="mnav">
		<a href="index.php" id="home">MobileShopBD</a>
	</div>
    <div class="signup-form">
    <?php
        if(isset($msg) & !empty($msg)){
        echo $msg;
    }
    ?>
    
        <h1 class="head">Create Your Account</h1>
        <form action="" method="POST">
		
            <p>
            <div class="ficon">
			<span class="glyphicon glyphicon-user"></span>
            <input type="text" id="FirstName" name="FirstName" placeholder="FirstName" required>
            </div>
			</p>
            <p>
            <div class="licon">
			<span class="glyphicon glyphicon-user"></span>
            <input type="text" id="LastName" name="LastName" placeholder="LastName" required>
            </div>
			</p>
            
			<p>
			<div class="eicon">
			<span class="glyphicon glyphicon-envelope"></span>
            <input id="email" name="Email" type="email" placeholder="E-Mail" required>
			</div>
			
			</p>
            <p>
			<div class="picon">
			<span class="glyphicon glyphicon-lock"></span>
            <input id="password" name="Password" type="password" placeholder="Enter Password" required>
            </div>
			</p>
            <p>
			<div class="cfpicon">
			<span class="glyphicon glyphicon-lock"></span>
            <input id="confirmpassword" name="CFPassword" type="password" placeholder="Confirm Password" required>
            </div>
			</p>
            <p>
			<?php
				if(isset($error))
				{
					echo "<span style='color:#960c00;'><strong>*".$error."*</strong></span>";
				}
				if(isset($emailerror)){
					echo '<p><a href="Forgot.php" style="color: Green;text-decoration:none;">Forgot Password?</a></p>';
				}
			?>		
			</p>
			<p>
			<input type="submit" class="btn" name="submit" value="Create">
            </p>
			<p class="Login">
			Already have an account? Try <a href="login.php"><strong>Loggin In</strong></a>
			</p>
			
        </form>
    </div>
</body>
</html>
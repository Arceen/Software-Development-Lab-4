<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "sdlab4";

if(isset($_POST["Email"]) && isset($_POST["Password"])){

$em = strtolower($_POST["Email"]);
$pass = $_POST["Password"];
$link = mysqli_connect($host, $user, $password, $db);
if(isset($msg)){ unset($msg);}

if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "Sorry for the error. Try again later";
}
else{
	$q = "SELECT * from admins where Email = '$em' AND Password = '$pass'";
			
	$result = $link -> query($q);
	
	if($result->num_rows > 0){
		$t = $result->fetch_assoc();
		$_SESSION["Admin"] = $t["UserName"];
		header("Location: adminpanel.php");
		$link->close();
		
	}
	else{
		$msg = 'Incorrect Username or Password';
	}
	
	
}

}
?> 

<html lang="en">
<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="css/bootstrap.css" />
 <link rel="stylesheet" href="css/fontawesome.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/adminlogin.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <title>Login</title>
</head>
<body>
	<div class="nav" id="mnav">
		<a href="index.php" id="home">MobileShopBD</a>
	</div>
    <div class="signup-form">
    
	<h1 class="head">Administrator Credentials</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<p>
			<div class="eicon">
			<span class="glyphicon glyphicon-envelope"></span>
            <input id="Email" name="Email" type="email" placeholder="E-Mail" required>
			</div>
			</p>
			<p>
			<div class="picon">
			<span class="glyphicon glyphicon-lock"></span>
            <input id="Password" name="Password" type="password" placeholder="Enter Password" required>
            </div>
			</p>
			
			<?php
				if(isset($msg))
				{
					echo "<span style='color:#960c00;'><strong>*".$msg."*</strong></span>";
				}
			?>	
			
			<p>
			<input type="submit" class="btn" name="submit" value="Login">
            </p>
		</form>
    </div>
</body>
</html>


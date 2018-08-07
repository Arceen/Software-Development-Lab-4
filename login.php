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
if(isset($error)){ unset($error);}
if(isset($emailerror)){ unset($emailerror);}


if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "Sorry for the error. Try again later";
}
else{
	$q = "SELECT * from users where Email = '$em' AND Password = '$pass'";
			
	$result = $link -> query($q);
	$q1 = "SELECT * FROM Bannedlist WHERE Email = '$em'";
    $result1 = $link->query($q1);
	
	if($result1->num_rows > 0){
		$error = 'This user has been banned';
		$emailerror = 1;
		$link->close();
	}
	else if($result->num_rows > 0){
		$t = $result->fetch_assoc();
		$_SESSION["UserName"] = $t["FirstName"]." ".$t["LastName"];
		$_SESSION["FirstName"] = $t["FirstName"];
		$_SESSION["LastName"] = $t["LastName"];
		
		echo "Welcome ". $t["FirstName"];
		$cookieset = false;
		$cookie = "";
		while(!$cookieset){
			$s = "";
			for($i = 1; $i<12; $i++){
				$s .= chr(mt_rand(10, 100));
			}
			$cookie = md5($s);
			$tq = "SELECT * from users where Cookie = '$cookie'
			";
			$tr = $link -> query($tq);
			if($tr->num_rows == 0){
				$tq = "Update users
				set Cookie = '$cookie'
				where Email = '$em'
			";
				$tr2 = $link -> query($tq);
				$cookieset = true;
			}
		}
		
		$link->close();
		setcookie("MobileShopBD", $cookie, time()+ (30*86400), '/');
		header("Location: index.php");
	}
	else{
		$error = 'Incorrect E-Mail or Password';
		$emailerror = 1;
	}
	
	
}
if(isset($_SESSION["tries"]) && $_SESSION["tries"] >=5) header("Location: index.php");
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
 <link rel="stylesheet" href="css/login.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <title>Login</title>
</head>
<body>
	<div class="nav" id="mnav">
	<a href="index.php" id="home">MobileShopBD</a>
	</div>
    <div class="signup-form">
    
	<h1 class="head">Login Credentials</h1>
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
				if(isset($error) && isset($emailerror)){
					
				 echo "<span style='color:#960c00;'><strong>*".$error."*</strong></span>";
				}
				if(isset($emailerror)){
					echo '<p><a href="Forgot.php" style="color: #0A9922;text-decoration:none;">Forgot Password?</a></p>';
				}
			?>	
			
			<p>
			<input type="submit" class="btn" name="submit" value="Login">
            </p>
			<p class="Login">
			Don't have an account? Try <a href="signup.php"><strong>Creating an account</strong></a>
			</p>
		</form>
    </div>
</body>
</html>


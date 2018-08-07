<?php
session_start();
if(isset($_COOKIE["MobileShopBD"])) {
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "sdlab4";
	$cookie = $_COOKIE["MobileShopBD"];
	$link = mysqli_connect($host, $user, $password, $db);

	if ($link->connect_error) {
		header("Location: logout.php");
	}
	
	else{
		$q = "SELECT * from users where Cookie = '$cookie'";
				
		$result = $link -> query($q);
		
		if($result->num_rows > 0){
			$t = $result->fetch_assoc();
			$_SESSION["UserName"] = $t["FirstName"]." ".$t["LastName"];
			$_SESSION["FirstName"] = $t["FirstName"];
			$_SESSION["LastName"] = $t["LastName"];
			$_SESSION["Email"] = $t["Email"];
		}
		else{
			header("Location: logout.php");
		}
		
	}
}
header("Location: home1.php");
?>


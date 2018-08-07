<?php
session_start();
if(isset($_COOKIE["MobileShopBD"])){
	header("Location: index.php");
}


?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/home2.css" />

    <title>Hello 
	<?php
		echo $_SESSION["FirstName"];
	?>
	</title>
</head>
<body>

	<div class="nav" id="mnav">
		<a href="index.php" id="home">MobileShopBD</a>
		<div class="user" id="us">
		<a href="contact.php">Contact</a>
		<a href="about.php">About</a>
		<a href="privatepage.php">
		<?php
			echo $_SESSION["UserName"];
		?>
		</a>
		<a id="last" href="logout.php">
		Log Out
		</a>
		</div>
	</div>

<div class="footer">
<a href="adminlogin.php">Administrator Panel</a>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
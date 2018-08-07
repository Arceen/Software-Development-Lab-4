<?php
session_start();

if(!isset($_GET['var1']) && !isset($_GET['var2'])){
	header("Location: index.php");
}
$var1 = $_GET['var1'];
$var2 = $_GET['var2'];
$host = "localhost";
$user = "root";
$password = "";
$db = "sdlab4";
$link = mysqli_connect($host, $user, $password, $db);
$q = "SELECT * FROM phonelist WHERE Brand = '$var1' AND Model = '$var2'";
$result = $link -> query($q);

$t = $result->fetch_assoc();
$link->close();
$j=0;
$price = "";
$temp = (string)$t['Price'];
for($i = strlen($temp)-1; $i>=0; $i--){
	if($j == 3) {
		$price .= ',';
		$j = 0;
	}
	$price .= $temp[$i];
	$j++;
}
$price = strrev($price);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/datapage.css" />
	
    <title>
	<?php
		echo $var1." ".$var2;
	?>
	</title>
</head>
<body>

<div class="nav" id="mnav">
	<a href="index.php" id="home">MobileShopBD</a>
	<div class="user" id="us">
	<a href="contact.php">Contact</a>
	<a href="about.php">About</a>
	<?php
	if(isset($_SESSION["UserName"])){
		echo "<a href='privatepage.php'>".$_SESSION['UserName']."</a>";
		echo "<a id='last' href='logout.php'>Log Out</a>";
	}
	else{
		echo "<a id='slast' href='login.php'>Login</a>";
		echo "<a id='last' href='signup.php'>Sign Up</a>";
		
	}
	?>
	</div>
</div>
<div class = "phone">
<div class = "imgdiv">
<img src = "<?php echo $t['ImageLocation'] ?>" alt="Phone" width='192' height='192'/>	
</div>
<div class = "infodiv">
<h2>Price: <span id="s1"><?php echo $price; ?> Tk.</span></h2>
<h2>Stock: <span id="s2"><?php echo $t["Stock"]; ?></span></h2>

</div>
<div class="container">
            
  <table class="table table-striped">
	<thead>
    <tr>
      <th class="row-1 row-fet"></th>
      <th class="row-2 row-ava"></th>
    </tr>
  </thead>
	<tbody>
      <tr>
        <td class="lab">Brand</td>
        <td><?php echo $t["Brand"] ?></td>
      </tr>
      <tr>
        <td class="lab">Model</td>
        <td><?php echo $t["Model"] ?></td>
      </tr>
      <tr>
        <td class="lab">Network</td>
        <td><?php echo $t["Network"] ?></td>
      </tr>
	  <tr>
        <td class="lab">Battery</td>
        <td><?php echo $t["Battery"] ?></td>
      </tr>
      <tr>
        <td class="lab">Memory</td>
        <td><?php echo $t["Memory"] ?></td>
      </tr>
      <tr>
        <td class="lab">OS</td>
        <td><?php echo $t["OS"] ?></td>
      </tr>
	  <tr>
        <td class="lab">RAM</td>
        <td><?php echo $t["RAM"] ?></td>
      </tr>
      <tr>
        <td class="lab">ROM</td>
        <td><?php echo $t["ROM"] ?></td>
      </tr>
      <tr>
        <td class="lab">Sensors</td>
        <td><?php echo $t["Sensors"] ?></td>
      </tr>
	  <tr>
        <td class="lab">Sim</td>
        <td><?php echo $t["SimSlots"] ?></td>
      </tr>
      <tr>
        <td class="lab">Display</td>
        <td><?php echo $t["Display"] ?></td>
      </tr>
      <tr>
        <td class="lab">Front Camera</td>
        <td><?php echo $t["FrontCamera"] ?></td>
      </tr>
	  <tr>
        <td class="lab">Back Camera</td>
        <td><?php echo $t["BackCamera"] ?></td>
      </tr>
      <tr>
        <td class="lab">Colors</td>
        <td><?php echo $t["Colors"] ?></td>
      </tr>
      <tr>
        <td class="lab">Release Date</td>
        <td><?php echo $t["ReleaseDate"] ?></td>
      </tr>
	  <tr>
        <td class="lab">Price</td>
        <td><?php echo $t["Price"] ?></td>
      </tr>
      <tr>
        <td class="lab">Stock</td>
        <td><?php echo $t["Stock"] ?></td>
      </tr>
      <tr>
      <td class="lab">Other Features</td>
      <td><?php echo $t["OtherFeatures"] ?></td>
      </tr>
	  <tr>
        <td class="lab">Description</td>
        <td><?php echo $t["Description"] ?></td>
      </tr>
	  
	</tbody>
  </table>
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
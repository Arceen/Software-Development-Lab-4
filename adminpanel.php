<?php 
session_start();
$curr = '';
$usval = 'Find Stock';
$cngstk = '';
if(isset($errormsg)) unset($errormsg);
if(isset($error)) unset($error);
if(isset($msg)){ unset($msg);};
if(isset($errormsg1)) unset($errormsg1);
if(isset($error1)) unset($error1);
if(isset($msg1)) unset($msg1);
if(!isset($_SESSION["Admin"])) header("Location: index.php");
else if(!empty($_POST["Ban"])){
	$curr = 'BU';
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "sdlab4";
	$link = mysqli_connect($host, $user, $password, $db);
	
	if ($link->connect_error) {
		$errormsg = "Could not connect to server. Try again later";
		$error = 1;
	}

	else if (isset($_POST['Email'])){
		$em = strtolower($_POST['Email']);
		$q = "SELECT * FROM users WHERE Email = '$em'";
		$result = $link->query($q);
		if($result->num_rows <= 0)
		{
			$errormsg = 'Email is not in use';
			$error = 1;
		}
		else if(!$mail->validateAddress($em)){
			$errormsg = 'Email Address does not belong to a registered user.';
			$error = 1;
			
		}
		else{
		
		  $t = $result->fetch_assoc();
		  $to = $em;
		  $subject = "Banned";
		  $txt = "You have been banned from http://127.0.0.1/sdlab/ ";
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
		  $mail->addAddress($to, $t["FirstName"]);
		  $mail->Subject = $subject;
		  $mail->Body = $txt;

		  if(!$mail->send()) {
			$errormsg = "Could not reach the given address";
			$error = 1;
		  }
		  else{
			$msg = "The user has recieved ban Email.";
		  }
		  $q = "DELETE FROM users WHERE Email = '$em'";
		  $result = $link->query($q);
		  $q1 = "INSERT INTO BannedList(Email) VALUES('$em')";
		  $result = $link->query($q1);
		  
		}
	}
	$link->close();
}
else if(!empty($_POST["Aadmin"])){
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "sdlab4";

	if(isset($_POST["Email"]) && isset($_POST["Password"])){
		$name = $_POST["Username"];
		$em = strtolower($_POST["Email"]);
		$pass = $_POST["Password"];
		$link = mysqli_connect($host, $user, $password, $db);
			
		

		if ($link->connect_error) {
			$error1 = 1;
			$errormsg1 = "Database Connection Error";
		}
		else{
			$q = "SELECT * from admins where Email = '$em'";
					
			$result = $link -> query($q);
			
			if($result->num_rows > 0){
				$error1 = 1;
				$errormsg1 = "Admin with that Email already exists";
			}
			else{
				$q1 = "INSERT into admins(UserName, Email, Password) VALUES('$name', '$name', '$pass')";
				$result = $link -> query($q1);
				$msg1 = 'Admin Created';
			}
			
			
		}

	}
	$link->close();
	$curr = 'AA';
}
else if(!empty($_POST["Aitems"])){
	$curr = 'AI';
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "sdlab4";
	$link = mysqli_connect($host, $user, $password, $db);
	if(isset($error3)) unset($error3);
	if(isset($errormsg3)) unset($errormsg3);
	if(isset($msg3)) unset($msg3);
	
	if ($link->connect_error) {
		$error3 = 1;
		$errormsg3 = "Could not connect to server. Try again later";
	}

	else{
		$brand = ($_POST['brand'] == ''? NULL : $_POST['brand']);
		$model = ($_POST['model'] == ''? NULL : $_POST['model']);
 		$fc = ($_POST['fc'] == ''? NULL : $_POST['fc']);
		$bc = ($_POST['bc'] == ''? NULL : $_POST['bc']);
		$net = ($_POST['net'] == ''? NULL : $_POST['net']);
 		$btr = ($_POST['btr'] == ''? NULL : $_POST['btr']);
		$mem = ($_POST['mem'] == ''? NULL : $_POST['mem']);
		$clr = ($_POST['clr'] == ''? NULL : $_POST['clr']);
 		$os = ($_POST['os'] == ''? NULL : $_POST['os']);
		$ram = ($_POST['ram'] == ''? NULL : $_POST['ram']);
		$rom = ($_POST['rom'] == ''? NULL : $_POST['rom']);
 		$psr = ($_POST['psr'] == ''? NULL : $_POST['psr']);
		$snr = ($_POST['snr'] == ''? NULL : $_POST['snr']);
		$sim = ($_POST['sim'] == ''? NULL : $_POST['sim']);
 		$dsl = ($_POST['dsl'] == ''? NULL : $_POST['dsl']);
		$of = ($_POST['of'] == ''? NULL : $_POST['of']);
		$rtg = (int)($_POST['rtg'] == ''? NULL : $_POST['rtg']);
 		$prc = (int)($_POST['prc'] == ''? NULL : $_POST['prc']);
		$rd = ($_POST['rd'] == ''? NULL : $_POST['rd']);
		$des = ($_POST['des'] == ''? NULL : $_POST['des']);
		$stk = (int)($_POST['stk'] == ''? NULL : $_POST['stk']);
 		$date = date('Y-m-d', strtotime($_POST['rd']));
		$imgdir = NULL;
		if(!empty($_FILES) && file_exists($_FILES['img']['tmp_name']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
			$tdir = "images/Phones/".$brand."_".$model;
			$imgextension = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));
			$tdir = $tdir.".".$imgextension;
			if(exif_imagetype($_FILES["img"]["tmp_name"]) === false){ 
				$errormsg3 = "The Uploaded Image was not valid but data has been Uploaded.";
				$error3 = 1;
			}
			else if(move_uploaded_file($_FILES["img"]["tmp_name"], $tdir)){
				$imgdir = $tdir;
				$msg3 = "Image and Data Uploaded Succesfully";
			}
			else{
				$errormsg3 = "Could not move the Uploaded Image but data has been Uploaded.";
				$error3 = 1;
			}
		}
		$q = "SELECT * FROM mobilelist WHERE Brand = '$brand' AND Model = '$model'";
		$result = $link->query($q);
		
		if($result->num_rows > 0)
		{
			$errormsg3 = 'This device already exists';
			$error3 = 1;
		}
		
		else{
			
			$tq = "INSERT INTO mobilelist(Brand, Model, FrontCamera, BackCamera, Network, Battery, Memory, Colors, OS, RAM, ROM, Processors, Sensors, SimSlots, Display, OtherFeatures, ReleaseDate, Description, Rating, Price, Stock, ImageLocation) 
			VALUES('$brand', '$model', '$fc', '$bc', '$net', '$btr', '$mem', '$clr', '$os', '$ram', '$rom', '$psr', '$snr', '$sim', '$dsl', '$of', '$date', '$des', '$rtg', '$prc', '$stk', '$imgdir')";
			$tresult = $link->query($tq);
			if (!$tresult) {
				$errormsg3 = "Query was invalid: " . $link->error;
				$error3 = 1;
			}
		}
	}
	$link->close();
}
else if(!empty($_POST["Supdate"])){
	$curr = 'SU';
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "sdlab4";
	$link = mysqli_connect($host, $user, $password, $db);
	if(isset($error4)) unset($error4);
	if(isset($errormsg4)) unset($errormsg4);
	if(isset($msg4)) unset($msg4);
	$brand1 = $_POST["Brand1"];
	$model1 = $_POST["Model1"];
	if ($link->connect_error) {
		$error4 = 1;
		$errormsg4 = "Could not connect to server. Try again later";
	}

	else{
		if(!isset($_POST['Stock1'])){
		$sc = "checking";	
		$usval = 'Update Stock';
		$q = "SELECT * FROM mobilelist WHERE Brand = '$brand1' AND Model = '$model1'";
		$result = $link->query($q);
		
			if($result->num_rows == 0)
			{
				$errormsg4 = 'This device does not exist';
				$error4 = 1;
			}
			
			else{
				
				$t = $result->fetch_assoc();
				$cngstock = ($t['Stock'] == NULL ? 0 : $t['Stock']);
				
			}
		}
		else{
			$Stock1 = (string)$_POST["Stock1"];
			$q = "UPDATE mobilelist SET Stock = '$Stock1' WHERE Brand = '$brand1' AND Model = '$model1'";
			$result = $link->query($q);
			$q = "SELECT * FROM mobilelist WHERE Brand = '$brand1' AND Model = '$model1'";
			$result = $link->query($q);
			$t = $result->fetch_assoc();
			$cngstock = ($t['Stock'] == NULL ? 0 : $t['Stock']);
		}
	}
	$link->close();
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
    <link rel="stylesheet" href="css/adminpanel.css" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/fontawesome.css" />
    <title>Admininstrator Page</title>
</head>
<body>

<div id="header">
	<a href="index.php" id="home">MobileShopBD</a>
</div>
<div class="tabclass">
	<div class="btns" >
	<button class="changetabs" id="bu" onclick="tabswitch('BanUser')">Ban User</button>
	<button class="changetabs" id="aa" onclick="tabswitch('AddAdmin')">Add Admins</button>
	<button class="changetabs" id="ai" onclick="tabswitch('AddItems')">Add Items</button>
	<button class="changetabs" id="su" onclick="tabswitch('StockUpdate')">Update Stock</button>
	
	</div>
	<div class = "tabwindow">
		<div id="BanUser" class="tab">
		
			<div class="signup-form" id="one">
			
				<h1 class="head2">Enter Email to Ban</h1>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
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
					<input type="submit" class="submit" name="Ban" value="Ban User">
					</p>
				</form>
			</div>
		
		
		</div>
		
		<div id="AddAdmin" class="tab">
		
			<div class="signup-form">
    
				<h1 class="head">Administrator Credentials</h1>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
					<p>
					<div class="ficon">
					<span class="glyphicon glyphicon-user"></span>
					<input type="text" id="Username1" name="Username" placeholder="User Name" required>
					</div>
					</p>
					<p>
					<div class="eicon">
					<span class="glyphicon glyphicon-envelope"></span>
					<input id="email1" name="Email" type="email" placeholder="E-Mail" required>
					</div>
					</p>
					<p>
					<div class="picon">
					<span class="glyphicon glyphicon-lock"></span>
					<input id="password1" name="Password" type="password" placeholder="Enter Password" required>
					</div>
					</p>
					
					<?php
						if(isset($error1) && isset($errormsg1))
						{
							echo "<span style='color:#960c00;'><strong>*".$errormsg1."*</strong></span>";
						}
						else if(isset($msg1)){
							echo "<span style='color:#0c9600;'><strong>*".$msg1."*</strong></span>";
						}
					?>	
			
					<p>
					<input type="submit" class="submit" name="Aadmin" value="Create Admin">
					</p>
				</form>
			</div>
		
		</div>
		
		<div id="AddItems" class="tab">
			
			<div class="signup-form1">
    
				<h1 class="head2">Phone Specifications</h3>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
					<p class="rows">
						<input type="text" class="phn" id="brand" name="brand" placeholder="Brand Name" required>
						<input type="text" class="phn" id="model" name="model" placeholder="Model Name" required>
						<input type="text" class="phn" id="fc" name="fc" placeholder="Front Camera">
						<input type="text" class="phn" id="bc" name="bc" placeholder="Back Camera">
					</p>
					<p class="rows">
						<input type="text" class="phn" id="net" name="net" placeholder="Network">
						<input type="text" class="phn" id="btr" name="btr" placeholder="Battery">
						<input type="text" class="phn" id="mem" name="mem" placeholder="Memory">
						<input type="text" class="phn" id="clr" name="clr" placeholder="Colors">
					</p>
					<p class="rows">
						<input type="text" class="phn" id="os" name="os" placeholder="OS">
						<input type="text" class="phn" id="ram" name="ram" placeholder="RAM">
						<input type="text" class="phn" id="rom" name="rom" placeholder="ROM">
						<input type="text" class="phn" id="psr" name="psr" placeholder="Processor">
					</p>
					<p class="rows">
						<input type="text" class="phn" id="snr" name="snr" placeholder="Sensors">
						<input type="text" class="phn" id="sim" name="sim" placeholder="Sim Slots">
						<input type="text" class="phn" id="dsl" name="dsl" placeholder="Display">
						<input type="text" class="phn" id="of" name="of" placeholder="Other Features">
					</p>
					<p class="rows">
						<input type="text" class="phn" id="rtg" name="rtg" placeholder="Rating">
						<input type="text" class="phn" id="stk" name="stk" placeholder="Stock" required>
						<input type="text" class="phn" id="prc" name="prc" placeholder="Price" required>
						<input type="date" class="phn" id="rd" name="rd" value="<?php echo date('Y-m-d'); ?>">
					</p>
					<p class="rows" id="lastrow">
					<input type="text" class="phn" id="des" name="des" placeholder="Description">
					<input type="file" class="phn" name="img" id="img" placeholder="Upload A File">
					</p>
					
					<p>
					<input type="submit" id="lastsub" class="submit" name="Aitems" value="Add Phone">
					</p>
					<p>
					<?php
						if(isset($error3) && isset($errormsg3))
						{
							echo "<span style='color:#960c00;'><strong>*".$errormsg3."*</strong></span>";
						}
						else if(isset($msg3)){
							echo "<span style='color:#0c9600;'><strong>*".$msg3."*</strong></span>";
						}
					?>
					</p>					
				</form>
			</div>
		</div>
		
		
		<div id="StockUpdate" class="tab">
		
			<div class="signup-form1">
				<h1 class="head">Update Stock</h1>
					
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
					<div id="usmid">
					<p>
					<input type="text" class="phn"  name="Brand1" placeholder="Brand Name" value="<?php if(isset($_POST['Brand1'])) echo $_POST['Brand1']; else echo ' ';?>" required>
					</p>
					<p>
					<input type="text" class="phn"  name="Model1" placeholder="Model Name" value="<?php if(isset($_POST['Model1'])) echo $_POST['Model1']; else echo ' ';?>"required>
					</p>
					
					
					
					
					<?php
					if(isset($_POST['Supdate'])){	
						echo '<p>
						<input type="text" class="phn" name="Stock1" value="'. $cngstock.'">
						</p>';
					}
					?>
					
					</div>
					
					<?php
						if(isset($error4) && isset($errormsg4))
						{
							echo "<span style='color:#960c00;'><strong>*".$errormsg4."*</strong></span>";
						}
						else if(isset($msg1)){
							echo "<span style='color:#0c9600;'><strong>*".$msg4."*</strong></span>";
						}
					?>	
					
					<p id="lastsubmit">
					<input type="submit" class="submit" name="Supdate" value="<?= $usval ?>">
					</p>
				</form>
			</div>
		
		</div>
		
		
		
	</div>
</div>

<script>
var win = <?php echo json_encode($curr) ?>;
if(win == '' || win == 'BU'){
	window.onload = document.getElementById('bu').focus();
	tabswitch('BanUser');
}
else if(win == 'AA'){
	window.onload = document.getElementById('aa').focus();
	tabswitch('AddAdmin');
	
}
else if(win == 'AI'){
	window.onload = document.getElementById('ai').focus();
	tabswitch('AddItems');
}
else{
	window.onload = document.getElementById('su').focus();
	tabswitch('StockUpdate');
}
function tabswitch(stab){
var x = document.getElementsByClassName("tab");
for(var i = 0; i<x.length; i++){
	x[i].style.display = "none";
}

document.getElementById(stab).style.display = "block";

clearallinputfields();

}

function clearallinputfields(){
	document.getElementById('email').value = '';
}

</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
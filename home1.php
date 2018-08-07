<?php 
session_start();
if(isset($_COOKIE["MobileShopBD"]) && !isset($_SESSION["UserName"])){
	header("Location: index.php");
}
$host = "localhost";
$user = "root";
$password = "";
$db = "sdlab4";
$link = mysqli_connect($host, $user, $password, $db);

if(!isset($_GET['Brand'])){
	echo '<style type="text/css">#scene2{display:none;}</style>';
	
	$q1 = "SELECT * FROM mobilelist order by ReleaseDate desc limit 3;";
	$result1 = $link->query($q1);
	for($i = 0; $i<3; $i++){
		$timage[$i] = $result1->fetch_assoc();
	}

	$q2 = "SELECT * FROM mobilelist order by Rating desc limit 3;";
	$result2 = $link->query($q2);
	for($i = 0; $i<3; $i++){
		$rimage[$i] = $result2->fetch_assoc();
	}

	$q3 = "SELECT * FROM mobilelist order by Price asc limit 3;";
	$result3 = $link->query($q3);
	for($i = 0; $i<3; $i++){
		$cimage[$i] = $result3->fetch_assoc();
	}

}
else{
	$brand = $_GET['Brand'];
	
	echo '<style type="text/css">#scene1{display:none;}</style>';
	
	
	$q = "SELECT * FROM mobilelist WHERE Brand = '$brand';";
	$result = $link->query($q);
	$phones = 0;
	while($bimage[$phones] = $result->fetch_assoc()){
		$phones++;
	}
}
$link->close();
?>
<!doctype html>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/home1.css" />

    <title>Home</title>
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


<div id="scene1" class='imgarea'>
	<div class="container-fluid">
		<div class ="row">
			
			<div class="LD">
				<a href = "datapage.php?var1=<?php echo $timage[0]['Brand']?>&var2=<?php echo urlencode($timage[0]['Model'])?>">
					
					<div class = "col-md-4">
						<h3><?php echo $timage[0]['Brand']." ".$timage[0]['Model'] ?></h3>
						<p><?php echo "BDT. ".$timage[0]['Price'] ?></p>
						<img class="io" src = "<?php echo $timage[0]['ImageLocation'] ?>" alt="Phone" width='192' height='192'/>
						
						<?php echo "<p style='overflow:auto; text-align:left;'>".$timage[0]['Description']."</p>" ?>
						
					</div>
				</a>
				<a href = "datapage.php?var1=<?php echo $timage[1]['Brand']?>&var2=<?php echo urlencode($timage[1]['Model'])?>">
				
				<div class = "col-md-4">
					<h3><?php echo $timage[1]['Brand']." ".$timage[1]['Model'] ?></h3>
					<p><?php echo "BDT. ".$timage[1]['Price'] ?></p>
					<img src = "<?php echo $timage[1]['ImageLocation'] ?>" alt="Phone" width='180' height='192'/>
					<?php echo "<p style='overflow:auto; text-align:left;'>".$timage[1]['Description']."</p>" ?>
					
				</div>
				</a>
				<a href = "datapage.php?var1=<?php echo $timage[2]['Brand']?>&var2=<?php echo urlencode($timage[2]['Model'])?>">
				
				<div class = "col-md-4">
					<h3><?php echo $timage[2]['Brand']." ".$timage[2]['Model'] ?></h3>
					<p><?php echo "BDT. ".$timage[1]['Price'] ?></p>
					<img src = "<?php echo $timage[2]['ImageLocation'] ?>" alt="Phone" width='180' height='192'/>
					<?php echo "<p style='overflow:auto; text-align:left;'>".$timage[2]['Description']."</p>" ?>
					
				</div>
				</a>
			</div>
		</div>
		
		<div class ="row">
			<div class = "HR">
				<a href = "datapage.php?var1=<?php echo $rimage[0]['Brand']?>&var2=<?php echo urlencode($rimage[0]['Model'])?>">
				
				<div class = "col-md-4">
					<h3><?php echo $rimage[0]['Brand']." ".$rimage[0]['Model'] ?></h3>
					<p><?php echo "BDT. ".$rimage[0]['Price'] ?></p>
					<img src = "<?php echo $rimage[0]['ImageLocation'] ?>" alt="Phone" width='180' height='192'/>
					<?php echo "<p style='overflow:auto; text-align:left;'>".$rimage[0]['Description']."</p>" ?>
					
				</div>
				</a>
				<a href = "datapage.php?var1=<?php echo $rimage[1]['Brand']?>&var2=<?php echo urlencode($rimage[1]['Model'])?>">
				
				<div class = "col-md-4">
					<h3><?php echo $rimage[1]['Brand']." ".$rimage[1]['Model'] ?></h3>
					<p><?php echo "BDT. ".$rimage[1]['Price'] ?></p>
					
					<img src = "<?php echo $rimage[1]['ImageLocation'] ?>" alt="Phone" width='180' height='192'/>
					<?php echo "<p style='overflow:auto; text-align:left;'>".$rimage[1]['Description']."</p>" ?>
					
				</div>
				</a>
				<a href = "datapage.php?var1=<?php echo $rimage[2]['Brand']?>&var2=<?php echo urlencode($rimage[2]['Model'])?>">
				
				<div class = "col-md-4">
					<h3><?php echo $rimage[2]['Brand']." ".$rimage[2]['Model'] ?></h3>
					<p><?php echo "BDT. ".$rimage[2]['Price'] ?></p>
					
					<img src = "<?php echo $rimage[2]['ImageLocation'] ?>" alt="Phone" width='180' height='192'/>
					<?php echo "<p style='overflow:auto; text-align:left;'>".$rimage[2]['Description']."</p>" ?>
					
				</div>
				</a>
			</div>
		</div>
		
		<div class ="row">
			<div class = "CE">
			<h2>Budget Phones</h2>
				<a href = "datapage.php?var1=<?php echo $cimage[0]['Brand']?>&var2=<?php echo urlencode($cimage[0]['Model'])?>">
				
				<div class = "col-md-4">
					<h3><?php echo $cimage[0]['Brand']." ".$cimage[0]['Model'] ?></h3>
					<p><?php echo "BDT. ".$cimage[0]['Price'] ?></p>
					
					<img src = "<?php echo $cimage[0]['ImageLocation'] ?>" alt="Phone" width='180' height='192'/>
					<?php echo "<p style='overflow:auto; text-align:left;'>".$cimage[0]['Description']."</p>" ?>
					
				</div>
				</a>
				<a href = "datapage.php?var1=<?php echo $cimage[1]['Brand']?>&var2=<?php echo urlencode($cimage[1]['Model'])?>">
				
					<div class = "col-md-4">
						<h3><?php echo $cimage[1]['Brand']." ".$cimage[1]['Model'] ?></h3>
						<p><?php echo "BDT. ".$cimage[1]['Price'] ?></p>
						<img src = "<?php echo $cimage[1]['ImageLocation'] ?>" alt="Phone" width='180' height='192'/>
						<?php echo "<p style='overflow:auto; text-align:left;'>".$cimage[1]['Description']."</p>" ?>
						
					</div>
				</a>
				<a href = "datapage.php?var1=<?php echo $cimage[2]['Brand']?>&var2=<?php echo urlencode($cimage[2]['Model'])?>">
					
					<div class = "col-md-4">
						<h3><?php echo $cimage[2]['Brand']." ".$cimage[2]['Model'] ?></h3>
						<p><?php echo "BDT. ".$cimage[2]['Price'] ?></p>
						<img src = "<?php echo $cimage[2]['ImageLocation'] ?>" alt="Phone" width='180' height='192'/>
						<?php echo "<p style='overflow:auto; text-align:left;'>".$cimage[2]['Description']."</p>" ?>
						
					</div>
				</a>
			</div>
		</div>
	</div>
</div>



<div id="scene2" class='imgarea'>
	<h2>Brand: <?= $brand?></h2>
	
	<div class="container-fluid">
		
		<div class ="row">
			<?php
				for($i=0; $i<$phones; $i++){
					echo '<a href = "datapage.php?var1='.$bimage[$i]["Brand"].'&var2='.urlencode($bimage[$i]["Model"]).'">
						
						<div class = "col-md-4">
							<h3>'.$bimage[$i]["Brand"].' '.$bimage[$i]["Model"].'</h3>
							<p>BDT '. $bimage[$i]["Price"].'</p>
							<img class="io" src = "'.$bimage[$i]["ImageLocation"].'" alt="Phone" width=\'180\' height=\'192\'>
							
							<p style="overflow:auto; text-align:left;">'.$bimage[$i]["Description"].'</p>
							
						</div>
					</a>';
				}
			?>
		</div>
	</div>
</div>




<div class="sidebar">
	<h3 id="lasttime">Choose by Brands</h3>
	<div class="brandlinks">
		<a href = "home1.php?Brand=<?php echo 'Samsung';?>">Samsung</a>
		<a href = "home1.php?Brand=<?php echo 'Symphony';?>">Symphony</a>
		<a href = "home1.php?Brand=<?php echo 'Walton';?>">Walton</a>
		<a href = "home1.php?Brand=<?php echo 'Apple';?>">Apple</a>
		<a href = "home1.php?Brand=<?php echo 'Huawei';?>">Huawei</a>
		<a href = "home1.php?Brand=<?php echo 'Xiaomi';?>">Xiaomi</a>
		<a href = "home1.php?Brand=<?php echo 'Huawei';?>">Oppo</a>
		
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
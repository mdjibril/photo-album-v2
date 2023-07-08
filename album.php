<?php
// Start the session
session_start();
require 'connection.php';
// Check if the user is logged in
if (!isset($_SESSION["email"])) {
	header("Location: ../index.php");
	exit();
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "album";

$conn = mysqli_connect($servername, $username, $password_db, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get the user's record from the database
// $email = $_SESSION["email"];
$i = 0;
$sql = "SELECT * FROM `user` WHERE `image` IS NOT NULL AND `is_active` = 1";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ALBUM PAGE</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		header {
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
			height: 50px;
			margin-bottom: 10px;
			color: #f9f9f9;
			background-color: #4caf50;
			text-align: center;
		}
	</style>
</head>
<body>
	<header>
		<h1>CLASS OF 2015</h1>
	</header>
	<main class="flexray">
	<?php while ($row = mysqli_fetch_array($result)){ 
		$i++;
		$fullname = $row["fullname"];
		$age = $row["date_of_birth"];
		$image = $row["image"];
		$regno = $row["regno"];
		$phone = $row["phone"];
		$email = $row["email"];
		$nickname = $row["nickname"];
		$department = $row["department"];
		$address = $row["address"];
		$status = $row["status"];

		$timestamp = strtotime($age);

		$month = date("F", $timestamp); // Extracts the month as a two-digit number (01-12)
		$day = date("d", $timestamp);   // Extracts the day as a two-digit number (01-31)

		?>
		<div class="card">
		  <div class="card-side front">
		    <!-- <div>Front Side</div> -->
		    <img src="uploads/<?php echo $image; ?>" >
		  </div>
		  <div class="card-side back">
		    <p>Name: <?php echo $fullname ?></p>
			<br>
		    <div>DOB: <?php echo $day."/".$month ?></div>
			<br>
		    <div>Regno: <?php echo $regno ?></div>
			<br>
		    <div>Phone: <?php echo $phone ?></div>
			<br>
			<div>Email: <?php echo $email ?></div>
			<br>
		    <div>Nick: <?php echo $nickname ?></div>
			<br>
		    <div>Dept. : <?php echo $department ?></div>
		  </div>
		</div>
	<?php } ?>
	</main>
</body>
</html>
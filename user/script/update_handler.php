<?php
// Start the session
session_start();
require '../../connection.php';

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
	header("Location: login.php");
	exit();
}

// Get the form input
$email = $_POST["email"];
$fullname = $_POST["fullname"];
$age = $_POST["age"];
$image = $_FILES["image"]["name"];
$regno = $_POST["regno"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];
$nickname = $_POST["nickname"];
$department = $_POST["department"];
$address = $_POST["address"];
$status = $_POST["status"];

// Check if an image was uploaded
if ($image != "") {
	
	// Upload the image to the server
	$target_dir = "../../uploads/";
	$filename = explode(".", $_FILES["image"]["name"]);
	$newname = $email.'.'.end($filename);
	$target_file = $target_dir . $newname;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$uploadOk = 1;

	// Check if the image file is an actual image or fake image
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check === false) {
	    $_SESSION['message1'] = 'File is not an image.';
	    $uploadOk = 0;
	}

	// Check file size
	if ($_FILES["image"]["size"] > 1000000) {
	    $_SESSION['message3'] = 'Sorry, your file is too large.';
	    $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    $_SESSION['message4'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
	    $uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	    // Delete the existing file
	    unlink($target_file);
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    $_SESSION['message5'] = 'Sorry, your file was not uploaded.';
	} else {
	    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
	        $_SESSION['message6'] = "Your file has been uploaded.";
	    } else {
	        $_SESSION['message7'] = 'Sorry, there was an error uploading your file.';
	    }
	}

	// Update the user's record in the database
	$sql = "UPDATE user SET fullname='$fullname', date_of_birth='$age', image='$newname', regno='$regno',phone='$phone',gender='$gender', nickname='$nickname', department='$department', address='$address', status='$status' WHERE email='$email'";

	if (mysqli_query($conn, $sql)) {
		// Record updated successfully, redirect to dashboard
		$_SESSION['message8'] = 'Record updated successfully';
		header("Location: ../dashboard.php");
		exit();
	} else {
		// Error updating record, show error message
		$_SESSION['message9'] = "Error: " . mysqli_error($conn);
	}

} else {
	// Update the user's record in the database without changing the image
	$sql = "UPDATE user SET fullname='$fullname', date_of_birth='$age', regno='$regno',phone='$phone',gender='$gender', nickname='$nickname', department='$department', address='$address', status='$status' WHERE email='$email'";

	if (mysqli_query($conn, $sql)) {
		// Record updated successfully, redirect to dashboard
		$_SESSION['message10'] = 'Record updated successfully';
		header("Location: ../dashboard.php");
		exit();
	} else {
		// Error updating record, show error message
		$_SESSION['message11'] = "Error: " . mysqli_error($conn);
	}
}



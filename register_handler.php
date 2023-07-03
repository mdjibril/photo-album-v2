<?php

session_start();
require 'connection.php';
// Check if the user has submitted the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the user input
	$email = $_POST["email"];
	$regno = $_POST["regno"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	// Validate the user input (you should add more validation checks here)
	if (!empty($email) && !empty($regno) && !empty($password) && ($password == $confirm_password)) {
		
		// Prepare the SQL statement and execute it
		$sql = "INSERT INTO user (email, regno, password) VALUES ('$email', '$regno', '$password')";
		if (mysqli_query($conn, $sql)) {
			// echo "<p>Registration successful.</p>";
			$_SESSION['success'] = 'Registeration Successfull, please login below';
			header('location: index.php');
		} else {
			// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			$_SESSION['error'] = 'Error Registering: '.$sql;
			header('location: register.php');
		}

		mysqli_close($conn);
	} else {
		// User input is not valid, show error message
		// echo "<p>There was an error with your registration. Please check your input and try again.</p>";
		$_SESSION['error'] = 'There was an error with your registration. Please check your input and try again';
		header('location: register.php');
	}
}

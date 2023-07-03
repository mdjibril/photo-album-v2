<?php
// Start the session
session_start();

require 'connection.php';
// Check if the user has submitted the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the user input
	$email = $_POST["email"];
	$password = $_POST["password"];

	// Validate the user input (you should add more validation checks here)
	if (!empty($email) && !empty($password)) {
	
		// Prepare the SQL statement and execute it
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);

		// Check if the query returned any rows
		if (mysqli_num_rows($result) > 0) {
			// User has been authenticated, redirect to dashboard page
			$_SESSION['email'] = $email;
			header("Location: user/dashboard.php");
			// echo "<p>Welcome.</p>";
			exit();
		} else {
			// User authentication failed, show error message
			// echo "<p>Invalid email or password.</p>";
			$_SESSION['error'] = 'Invalid email or password.';
			header("Location: index.php");
		}

		mysqli_close($conn);
	} else {
		// User input is not valid, show error message
		echo "<p>Email and password are required.</p>";
	}
}
?>

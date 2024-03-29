<?php
// Start the session
session_start();
require '../connection.php';

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
	header("Location: ../index.php");
	exit();
}

// Get the user's record from the database
$email = $_SESSION["email"];
$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);

$announce_sql = "SELECT * FROM `message` WHERE `msg_status`='1'";
$msg_status = mysqli_query($conn, $announce_sql);

if (mysqli_num_rows($result) > 0) {
	// User record found, display the dashboard
	$row = mysqli_fetch_assoc($result);
	$fullname = $row["fullname"];
	$age = $row["date_of_birth"];
	$image = $row["image"];
	$regno = $row["regno"];
	$phone = $row["phone"];
	$nickname = $row["nickname"];
	$department = $row["department"];
	$address = $row["address"];
	$status = $row["status"];
} else {
	// User record not found, show error message
	echo "<p>There was an error retrieving your record. Please update your record.</p>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>USER PROFILE</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>

<body>
	<section style="margin-top: 5px;">
		<div class="container">
			<?php if (mysqli_num_rows($result) > 0) : ?>
				<div class="bg-white shadow rounded-lg d-block d-sm-flex">
					<div class="profile-tab-nav border-right">
						<div class="p-4">
							<div class="img-circle text-center mb-3">
								<img src="../uploads/<?php echo $image; ?>" alt="Image" class="shadow">
							</div>
							<h4 class="text-center"><?php echo $fullname; ?></h4>
							<p class="text-center"><?php echo $email; ?></hp>
						</div>
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link" id="account-tab" href="dashboard.php">
								<i class="fa fa-home text-center mr-1"></i>
								Account
							</a>
							<a class="nav-link" id="password-tab" href="update.php">
								<i class="fa fa-key text-center mr-1"></i>
								Update Info
							</a>
							<a class="nav-link" id="password-tab" href="../album.php">
								<i class="fa fa-image text-center mr-1"></i>
								Album
							</a>
							<a class="nav-link active" id="password-tab" href="announcement.php">
								<i class="fa fa-info text-center mr-1"></i>
								Announcement
							</a>
							<a class="nav-link" id="password-tab" href="script/logout.php">
								<i class="fa fa-sign-out text-center mr-1"></i>
								Logout
							</a>

						</div>
					</div>
					<div class="tab-content p-4" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
							<h3 class="mb-4">ANNOUNCEMENT</h3>

							<div class="row">
								<?php
								while ($row = mysqli_fetch_array($msg_status)) :
									$message = $row["message"];
								?>
									<div class="col-md-12">
										<div class="form-group">
											<label>Message</label>
											<textarea class="form-control" rows="4" disabled><?php echo $message; ?></textarea>
										</div>
									</div>
								<?php
								endwhile;
								?>
							</div>
						</div>

					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
<?php
unset($_SESSION['message1']);
unset($_SESSION['message2']);
unset($_SESSION['message3']);
unset($_SESSION['message4']);
unset($_SESSION['message5']);
unset($_SESSION['message6']);
unset($_SESSION['message7']);
unset($_SESSION['message8']);
unset($_SESSION['message9']);
unset($_SESSION['message10']);
unset($_SESSION['message11']);
?>
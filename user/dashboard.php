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
							<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
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
							<a class="nav-link" id="password-tab" href="announcement.php">
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
							<h3 class="mb-4">USER INFO</h3>
							<?php
							if (isset($_SESSION['message1'])) {
								echo "<h6 style='text-align: center;color:#f44336'>" . $_SESSION['message1'] . "</h6><br>";
							}
							if (isset($_SESSION['message2'])) {
								echo "<h6 style='text-align: center;color:#f44336'>" . $_SESSION['message2'] . "</h6><br>";
							}
							if (isset($_SESSION['message3'])) {
								echo "<h6 style='text-align: center;color:#f44336'>" . $_SESSION['message3'] . "</h6><br>";
							}
							if (isset($_SESSION['message4'])) {
								echo "<h6 style='text-align: center;color:#f44336'>" . $_SESSION['message4'] . "</h6><br>";
							}
							if (isset($_SESSION['message5'])) {
								echo "<h6 style='text-align: center;color:#f44336'>" . $_SESSION['message5'] . "</h6><br>";
							}
							if (isset($_SESSION['message6'])) {
								echo "<h6 style='text-align: center;color:#4CAF50'>" . $_SESSION['message6'] . "</h6><br>";
							}
							if (isset($_SESSION['message7'])) {
								echo "<h6 style='text-align: center;color:#f44336'>" . $_SESSION['message7'] . "</h6><br>";
							}
							if (isset($_SESSION['message8'])) {
								echo "<h6 style='text-align: center;color:#4CAF50'>" . $_SESSION['message8'] . "</h6><br>";
							}
							if (isset($_SESSION['message9'])) {
								echo "<h6 style='text-align: center;color:#f44336'>" . $_SESSION['message9'] . "</h6><br>";
							}
							if (isset($_SESSION['message10'])) {
								echo "<h6 style='text-align: center;color:#4CAF50'>" . $_SESSION['message10'] . "</h6><br>";
							}
							if (isset($_SESSION['message11'])) {
								echo "<h6 style='text-align: center;color:#f44336'>" . $_SESSION['message11'] . "</h6><br>";
							}
							?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" value="Phone: <?php echo $phone; ?>" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" value="Reg No: <?php echo $regno; ?>" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" value="Date of birth: <?php echo $age; ?>" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" value="Nickname: <?php echo $nickname; ?>" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" value="Department: <?php echo $department; ?>" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" value="Status: <?php echo $status; ?>" disabled>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" rows="4" disabled><?php echo $address; ?></textarea>
									</div>
								</div>
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
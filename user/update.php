<?php
// Start the session
session_start();
require '../connection.php';

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
	header("Location: login.php");
	exit();
}


// Get the user's record from the database
$email = $_SESSION["email"];
$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// User record found, display the update form
	$row = mysqli_fetch_assoc($result);
	$fullname = $row["fullname"];
	$age = $row["date_of_birth"];
	$image = $row["image"];
	$regno = $row["regno"];
	$phone = $row["phone"];
	$gender = $row["gender"];
	$nickname = $row["nickname"];
	$department = $row["department"];
	$address = $row["address"];
	$status = $row["status"];
} else {
	// User record not found, show error message
	echo "<p>There was an error retrieving your record. Please try again later.</p>";
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
							<a class="nav-link active" id="password-tab" href="update.php">
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
							<form class="row" action="script/update_handler.php" method="post" enctype="multipart/form-data">
								<input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>">
								<div class="col-md-6">
									<div class="form-group">
										<label>Full Name:</label>
										<input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Date Of Birth</label>
										<input type="date" class="form-control" name="age" value="<?php echo $age; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Image</label>
										<input type="file" name="image" class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Reg No.</label>
										<input type="text" class="form-control" name="regno" value="<?php echo $regno; ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Gender</label>
										<select id="gender" name="gender" class="form-control">
											<option value="Male" <?php if ($gender == "Male") echo "selected"; ?>>Male</option>
											<option value="Female" <?php if ($gender == "Female") echo "selected"; ?>>Female</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Nickname</label>
										<input type="text" class="form-control" name="nickname" value="<?php echo $nickname; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Department</label>
										<input type="text" class="form-control" name="department" value="<?php echo $department; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Status</label>
										<select id="status" name="status" class="form-control">
											<option value="Single" <?php if ($status == "Single") echo "selected"; ?>>Single</option>
											<option value="Married" <?php if ($status == "Married") echo "selected"; ?>>Married</option>
											<option value="Divorce" <?php if ($status == "Divorce") echo "selected"; ?>>Divorce</option>
											<option value="Prefer not to say" <?php if ($status == "Prefer not to say") echo "selected"; ?>>Prefer not to say</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" rows="3" name="address"><?php echo $address; ?></textarea>
									</div>
								</div>
								<input class="btn btn-primary" type="submit" name="submit" value="Update Record">
							</form>
							<div>
								<!-- <button type="submit" class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button> -->
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
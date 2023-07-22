<?php

session_start();
require '../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input
    $message = $_POST["message"];
    $date = $_POST["date"];
    $status = $_POST["status"];

    $sql = "INSERT INTO `message` (message, date_announce, msg_status) VALUES ('$message', '$date', '$status')";
    if (mysqli_query($conn, $sql)) {
        // echo "<p>New message posted successful.</p>";
        $_SESSION['success'] = 'Message announce successfully,';
        header('location: ../announcement.php');
    } else {
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        $_SESSION['error'] = 'Error announcing message';
        header('location: ../announcement.php');

    }

    mysqli_close($conn);
}

<?php
    session_start();    
    require '../../connection.php';

    $id = $_POST["id"];
    $message = $_POST["message"];
    $date = $_POST["date"];
    $status = $_POST["status"];

    // echo $id, $message, $date, $status
    $sql = "UPDATE `message` SET `message`='$message', `date_announce`='$date', `msg_status`='$status' WHERE `id`='$id'";

    $updateMessage = mysqli_query($conn, $sql);

    if ( mysqli_query($conn, $sql)) {
        // echo 'e choke';
        $_SESSION['success'] = "Message Updated successfully scroll to see";
        header('location: ../announcement.php');
    }else {
        // 'bad ';
        $_SESSION['error'] = "Error updating message";
        header('location: ../announcement.php');
    }
?>
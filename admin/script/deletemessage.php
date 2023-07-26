<?php
    require '../../connection.php';

    if (isset($_GET['ids'])) {
        $msgId = $_GET['ids'];

        $sql = "DELETE FROM `message` WHERE `id` = $msgId";

        $delete = mysqli_query($conn, $sql);

        if ($delete) {
            $_SESSION['success'] = "Message deleted";
            header('location: ../announcement.php');
        }else{
            // echo 'Error Deleting User';
            $_SESSION['error'] = "Error Deleting message";
            header('location: ../announcement.php');
        }
    }
?>
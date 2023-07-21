<?php
    require '../../connection.php';

    if (isset($_GET['ids'])) {
        $msgId = $_GET['ids'];

        $sql = "DELETE FROM `message` WHERE `id` = $msgId";

        $delete = mysqli_query($conn, $sql);

        if ($delete) {
            $_SESSION['message'] = "Message deleted";
            header('location: ../announcement.php');
        }else{
            echo 'Error Deleting User';
        }
    }
?>
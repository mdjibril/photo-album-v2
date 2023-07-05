<?php
    require '../../connection.php';

    if (isset($_GET['ids'])) {
        $userId = $_GET['ids'];

        $sql = "DELETE FROM `user` WHERE `id` = $userId";

        $delete = mysqli_query($conn, $sql);

        if ($delete) {
            header('location: ../allstudent.php');
        }else{
            echo 'Error Deleting User';
        }
    }
?>
<?php
    require '../../connection.php';

    if (isset($_GET['ids'])) {
        $userId = $_GET['ids'];

        $sql = "DELETE FROM `user` WHERE `id` = $userId";

        $delete = mysqli_query($conn, $sql);

        if ($delete) {
            $_SESSION['success'] = 'Student deleted successfully';
            header('location: ../allstudent.php');
        }else{
            $_SESSION['error'] = 'Error deleting student';
        }
    }
?>
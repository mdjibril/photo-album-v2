<?php
    require '../../connection.php';

    if (isset($_GET['ids'])) {
        $userId = $_GET['ids'];
        $is_active = $_GET['isactive'];

        if ($is_active == '0') {
            $sql = "UPDATE `user` SET `is_active` = '1' WHERE `id` = $userId"; 
            $activate = mysqli_query($conn, $sql);
            if ($activate) {
                header('location: ../allstudent.php');
                // echo 'Success active';
            }else{
                echo 'Error Activating user';
            }
        }else{
            $sql = "UPDATE `user` SET `is_active` = '0' WHERE `id` = $userId"; 
            $deactivate = mysqli_query($conn, $sql);

            if ($deactivate) {
                header('location: ../allstudent.php');
                // echo 'Success deactive';
            }else{
                echo 'Error Deactivating user';
            }
        }
    }
?>
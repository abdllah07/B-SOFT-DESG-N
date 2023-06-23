<?php

include "log_in_check.php";

$user_no = $_SESSION['user_no'];

if(isset($_POST['old-password']) && isset($_POST['new-password']) && isset($_POST['newagain-password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $oldPassword = validate($_POST['old-password']);
    $newPassword = validate($_POST['new-password']);
    $newPasswordAgaing = validate($_POST['newagain-password']);

    $sql = "SELECT * from users where user_no = $user_no";
    $sql_run = mysqli_query($connection, $sql);
    if(mysqli_num_rows($sql_run) === 1) {
        $row = mysqli_fetch_assoc($sql_run);
        
        $oldPassword = md5($oldPassword);
            if($row['pass'] === $oldPassword) {
                if($newPassword == $newPasswordAgaing) {
                    $newPassword = md5($newPassword);
                    $update = "UPDATE users SET pass = '$newPassword' where user_no = $user_no";
                    $update_run = mysqli_query($connection, $update);
                    if($update_run) {
                        header("Location: indexProfile.php?notif= Password has been changed");
                        exit();
                    }
                    else{
                        header("Location: indexProfile.php?error= There is unknown problem");
                        exit();
                    }
                }
                else {
                    header("Location: indexProfile.php?error= The confirmation password does not match");
                    exit();
                }
            }else {
                header("Location: indexProfile.php?error= Old password is wrong");
                exit();
            }
        

        
    }
}




?>
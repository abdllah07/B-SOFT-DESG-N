<?php
    include "vt_con.php";

    $code = $_GET['code'];
    $email = $_GET['email'];
    $sql = "SELECT * from users where email = '$email' and check_code = '$code'";
    $sql_run = mysqli_query($connection, $sql);

    if(mysqli_num_rows($sql_run) === 1) {

        header("Location: changePasswordPage.php?email=$email");
        exit();
    }
    else{
        // header("Location: forgetPassword.php?error=There is no user like this");
        // exit();
        echo $email;
        echo $code;
    }


?>
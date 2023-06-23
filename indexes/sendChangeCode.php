<?php
    include "vt_con.php";

    if(isset($_POST['user-name']) && isset($_POST['email'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $user_name = validate($_POST['user-name']);
        $email = validate($_POST['email']);
        $code = md5(uniqid(true));
        if(empty($user_name)) {
            header("Location: forgetPassword.php?error=User name is required");
            exit();
        }
        else if(empty($email)){
            header("Location: forgetPassword.php?error=Email is required");
            exit();
        }
        else {
            $sql = "SELECT user_name,email from users where user_name = '$user_name' and email = '$email'";
            $sql_run = mysqli_query($connection, $sql);
            if(mysqli_num_rows($sql_run) === 1) {
                $row = mysqli_fetch_assoc($sql_run);
                $user_email = $row['email'];
                $update = "UPDATE users SET check_code = '$code' where user_name = '$user_name'";

                $to = $user_email;
                $subject = "Reset Password";
                $header = "By Code";
                $body = "You must visit the link below to reset your password\n
                Link:\n
                http://localhost/BSOFT/indexes/codeCheck.php?code=$code";
                mail($to, $subject, $body, $header);
                if(mysqli_query($connection, $update)) {
                    header("Location: codeCheck.php?code=$code&email=$user_email");
                    exit();
                }else {
                    header("Location: forgetPassword.php?error=There is uknown problem");
                    exit();
                }
            } else {
                header("Location: forgetPassword.php?error=There is no user like this");
                exit();
            }
        }
    }




?>
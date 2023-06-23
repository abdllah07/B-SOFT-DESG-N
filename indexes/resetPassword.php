<?php
    include "vt_con.php";
    $email = $_GET['email'];
    if(isset($_POST['pass']) && isset($_POST['passA'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $pass = validate($_POST['pass']);
        $passA = validate($_POST['passA']);
        

        if(empty($pass)) {
            header("Location: changePasswordPage.php?error=Password is required&email=$email");
            exit();
        }

        else if(empty($passA)) {
            header("Location: changePasswordPage.php?error=Password again is required&email=$email");
            exit();
        }
        else {
            if($pass === $passA){
                $pass = md5($pass);
                $passA = md5($passA);
        
                $update = "UPDATE users set pass = '$pass' where email = '$email'";
                if(mysqli_query($connection, $update)) {
                    $delete = "UPDATE users set check_code = NULL where email = '$email'";
                    if(mysqli_query($connection, $delete)){
                    header("Location: indexSignUp.php?success=Password is changed, You can log in now");
                    exit();
                    }else {
                        header("Location: changePasswordPage.php?error=There is known problem&email=$email");
                        exit();
                    }
                }
                else {
                    header("Location: changePasswordPage.php?error=There is known problem&email=$email");
                    exit();
                }
            }else {
                header("Location: changePasswordPage.php?error=The confirmation password does not match&email=$email");
                exit();
            }
        }

        

        
    }
?>
<?php  
    include "vt_con.php";
    if(isset($_POST['user-name']) && isset($_POST['password'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $user_name = validate($_POST['user-name']);
        $password  = validate($_POST['password']);

        if(empty($user_name)){
            header("Location: indexSignUp.php?error-log=User name is required");
            exit();
        }
        else if (empty($password)){
            header("Location: indexSignUp.php?error-log=Password is required");
            exit();
        }
        else {
            $password = md5($password);

            $sql = "SELECT * from users where user_name='$user_name' and pass = '$password'";

            $result = mysqli_query($connection, $sql);

            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if($row['user_name'] === $user_name && $row['pass'] === $password) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['user_no'] = $row['user_no'];
                    $_SESSION['birthday'] = $row['birthday'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['mobile_no'] = $row['mobile_no'];
                    $_SESSION['is_programmer'] = $row['is_programmer'];
                    $user_no = $_SESSION['user_no'];
                    $is_programmer = $_SESSION['is_programmer'];
                    $bank_information = "SELECT * from bank_account_information where user_no= $user_no";
                    $bank_information_run = mysqli_query($connection, $bank_information);
                    if(mysqli_num_rows($bank_information_run) === 1) {
                        $row = mysqli_fetch_assoc($bank_information_run);
                        if($row["user_no"] === $user_no) {
                            $_SESSION['bank_name'] = $row['bank_name'];
                            $_SESSION['iban'] = $row['iban'];
                            $_SESSION['account_name'] = $row['account_name'];
                        }
                    }
                    else {
                            $_SESSION['bank_name'] = "";
                            $_SESSION['iban'] = "";
                            $_SESSION['account_name'] = "";
                    }

                    if($is_programmer == 1){
                        header("Location: indexAfterLoginClient.php");
                        exit();
                    }
                    else {
                        header("Location: indexAfterLogin.php");
                        exit();
                    }
                }
                else {
                    header("Location: indexSignUp.php?error-log=Incorrect user name or password");
                    exit();
                }
            }
            else {
                header("Location: indexSignUp.php?error-log=Incorrect user name or password");
                exit();
            }
        }
    }
?>
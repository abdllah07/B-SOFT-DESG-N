    <!-- php code  -->
    <?php
    include "vt_con.php";

    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $userName = $_POST["user-name"];
    $birthday = $_POST["birthday"];
    $photo = $_POST["photo"];
    $email = $_POST["email"];
    $mobileNo = $_POST['mobile-no'];
    $password = $_POST["password"];
    $pAgain = $_POST["Pagain"];
    $accountType = $_POST["accountType"];
    if($accountType == "Programmer"){
        $isProgrammer = 1;
    }
    else {
        $isProgrammer = 0;
    }

    if(isset($firstName) && isset($lastName) && isset($userName) &&
        isset($email) && isset($password) && isset($pAgain) && isset($birthday) && isset($photo)) {
            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $firstName = validate($firstName);
            $lastName = validate($lastName);
            $userName = validate($userName);
            $birthday = validate($birthday);
            $photo = validate($photo);
            $email = validate($email);
            $mobileNo = validate($mobileNo);
            $password = validate($password);
            $pAgain = validate($pAgain);

            $user_data = 'firstName='.$firstName.'&lastName='.$lastName.'&userName='.$userName.'&email='.$email."&mobileNo=".$mobileNo;

            if(empty($firstName)) {
                header("Location: indexSignUp.php?error=First name is required&$user_data");
                exit();
            }

            else if(empty($lastName)) {
                header("Location: indexSignUp.php?error=Last name is required&$user_data");
                exit();
            }

            else if(empty($userName)) {
                header("Location: indexSignUp.php?error=User name is required&$user_data");
                exit();
            }

            else if(empty($birthday)) {
                header("Location: indexSignUp.php?error=Birth day is required&$user_data");
                exit();
            }

            else if(empty($email)) {
                header("Location: indexSignUp.php?error=Email is required&$user_data");
                exit();
            }

            else if(empty($mobileNo)){
                header("Location: indexSignUp.php?error=Mobile no is required&$user_data");
                exit();
            }

            else if(empty($password)) {
                header("Location: indexSignUp.php?error=Password is required&$user_data");
                exit();
            }

            else if(empty($pAgain)) {
                header("Location: indexSignUp.php?error=Password again is required&$user_data");
                exit();
            }

            else if($password !== $pAgain ) {
                header("Location: indexSignUp.php?error=The confirmation password does not match&$user_data");
                exit();
            }

            else {
                $password = md5($password);

                $sql = "SELECT * FROM users WHERE user_name = '$userName'";

                $result = mysqli_query($connection, $sql);

                if(mysqli_num_rows($result) > 0) {
                    header("Location: indexSignUp.php?error=The user name is taken, try again");
                    exit();
                }

                $sql2 = "SELECT * from users where email = '$email'";
                $sql2_run = mysqli_query($connection, $sql2);

                if(mysqli_num_rows($sql2_run) > 0){
                    header("Location: indexSignUp.php?error=Email is taken, try again");
                    exit();
                }

                else {
                    $sql2 = $connection -> prepare("INSERT INTO users (first_name, last_name, email, pass, mobile_no, birthday, photo, is_programmer, user_name)
                    values (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    $sql2 -> bind_param("sssssssis",$firstName, $lastName, $email, $password, $mobileNo, $birthday, $photo, $isProgrammer,  $userName);

                    $result2 = $sql2 -> execute();

                    if($result2) {
                        $users = "SELECT * from users where user_name= '$userName'";
                        $users_run = mysqli_query($connection, $users);
                        if(mysqli_num_rows($users_run) === 1) {
                            $row = mysqli_fetch_assoc($users_run);
                            $_SESSION['user_no'] = $row['user_no'];
                            $user_no = $_SESSION['user_no'];

                        }


                        if($isProgrammer == 0) {
                            $query = "INSERT INTO programmer (user_no)
                            values ($user_no)";
                            $query_run = mysqli_query($connection, $query);
                            if($query_run){
                                $bank = "INSERT INTO bank_account_information (user_no) values
                                ($user_no)";
                                $bank_run = mysqli_query($connection, $bank);
                                if($bank_run){
                                header("Location: indexSignUp.php?success=You account has been created successfully, You can log in now");
                                exit();
                                }
                                else {
                                    header("Location: indexSignUp.php?error=There is unknown problem");
                                    exit();
                                }
                            }
                            else {
                                header("Location: indexSignUp.php?error=There is unknown problem");
                                exit();
                            }
                        }else {
                            $query = "INSERT INTO client (user_no)
                            values ($user_no)";
                            $query_run = mysqli_query($connection, $query);
                            if($query_run){
                                $bank = "INSERT INTO bank_account_information (user_no) values
                                ($user_no)";
                                $bank_run = mysqli_query($connection, $bank);
                                if($bank_run){
                                header("Location: indexSignUp.php?success=You account has been created successfully, You can log in now");
                                exit();
                                }
                                else {
                                    header("Location: indexSignUp.php?error=There is unknown problem");
                                    exit();
                                }
                            }
                            else {
                                header("Location: indexSignUp.php?error=There is unknown problem");
                                exit();
                            }
                        }

                    }
                    else {
                        header("Location: indexSignUp.php?error=There is unknown problem");
                        exit();
                    }

                }


            }
        }





    // if($connection -> query($sql) === TRUE){
    //     echo "new account created succssefuly";
    // }
    // else {
    //     echo "error".$sql."<br>".$connection -> error;
    // }

    // $connection -> close();

    ?>


    <!-- php code end  -->
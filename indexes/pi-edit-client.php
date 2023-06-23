<?php
    include "log_in_check.php";
    
    if( isset($_POST['user-name']) && isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['birth-day']) 
        && isset($_POST['email']) && isset($_POST['mobile-no'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $firstName = validate($_POST['first-name']);
        $lastName = validate($_POST['last-name']);
        $userName = validate($_POST['user-name']);
        $birthday = validate($_POST['birth-day']);
        $email = validate($_POST['email']);
        $mobileNo = validate($_POST['mobile-no']);
        $bankName = validate($_POST['bank-name']);
        $iban = validate($_POST['iban']);
        $accountName = validate($_POST['account-name']);
        $user_no = $_SESSION['user_no'];

        $query = "UPDATE users SET first_name = '$firstName',
        last_name = '$lastName', user_name = '$userName', email = '$email',
        mobile_no = '$mobileNo', birthday = '$birthday' WHERE user_no = $user_no";

        $query_run = mysqli_query($connection, $query);




        if($query_run) {

            $check = "SELECT * FROM bank_account_information WHERE user_no = $user_no";


            $check_run = mysqli_query($connection, $check);
            

            if(mysqli_num_rows($check_run) > 0) {
                    $query3 = "UPDATE bank_account_information SET bank_name = '$bankName', iban = '$iban', account_name = '$accountName' WHERE user_no = $user_no";
                    $query3_run = mysqli_query($connection, $query3);
                    if($query3_run){
                        header("Location: indexProfileClient.php?notif= information updated, you should log in again");
                        exit();
                    }else {
                        header("Location: indexProfileClient.php?notif= information updated, you should log in again");
                        exit();
                    }
            }else {
                    $query2 = "INSERT INTO bank_account_information (bank_name, iban, account_name, user_no) values('$bankName', '$iban', '$accountName', $user_no)";
                    $query2_run = mysqli_query($connection, $query2);
        
                    if($query2_run){
                        header("Location: indexProfileClient.php?notif= information updated, you should log in again");
                        exit();
                    }else {
                        header("Location: indexProfileClient.php?notif= information updated, you should log in again");
                        exit();
                    }
            }
        //     else {
        //         $query4 = "INSERT INTO programmer (section, all_certificates, year_of_experience, languages, programming_languages) 
        //         values('$section', '$all_certificates', '$year_of_experience', '$languages', '$programming_languages')";
        //         $query4_run = mysqli_query($connection, $query2);
    
        //         if($query2_run){
        //             header("Location: indexProfile.php?notif= information updated, you should log in again");
        //             exit();
        //         }else {
        //             header("Location: indexProfile.php?notif= information updated, you should log in again");
        //             exit();
        //         }
        // }
        }   
        
        else {
            header("Location: indexProfileClient.php?error= information did not updated");
            exit();
            }





    }

?>
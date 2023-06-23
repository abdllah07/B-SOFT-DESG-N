<?php
    include "log_in_check.php";

    if(isset($_POST['to']) && isset($_POST['title']) && isset($_POST['message-containt'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $date = date("y-m-d");
        $to = validate($_POST['to']);
        $title = validate($_POST['title']);
        $message_containt = validate($_POST['message-containt']);
        $is_fav = 0;

        $user_no = $_SESSION['user_no'];

        $sql = "SELECT * FROM users where user_name = '$to'";
        $sql_run = mysqli_query($connection, $sql);

        if(mysqli_num_rows($sql_run) > 0){
            $row = mysqli_fetch_assoc($sql_run);
            $recipient = $row['user_no'];
            $query = $connection -> prepare("INSERT INTO mailing (sender_no, recipient_no, is_fav, sending_date,
            title, containt) values (?, ?, ?, ?, ?, ?)");
            $query -> bind_param("iiisss", $user_no, $recipient, $is_fav, $date, $title, $message_containt);
            
            
            $query_run = $query -> execute();

            if($query_run){
                header("Location: indexProfile.php?notif= Message sent successfully");
                exit();
            }else {
                header("Location: indexProfile.php?error= Message was not sent");
                exit();
            }

        }
        else {
            header("Location: indexProfile.php?error= There is not user name like this");
            exit();
        }
    }



?>
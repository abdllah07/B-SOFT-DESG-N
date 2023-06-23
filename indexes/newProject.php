<?php
    include "log_in_check.php";

    if(isset($_POST['send'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $advertisement_id = validate($_POST['advertisement-id']);
        $programmer_name = validate($_POST['programmer-name']);
        $new_cost = validate($_POST['new-cost']);
        $expiry_date = validate($_POST['expiry-date']);
        $changes = validate($_POST['changes']);
        $user_no = $_SESSION['user_no'];
        $date = date("y-m-d");

        

        $query = "SELECT * from advertisement as a, client as c, users as u where
        a.client_no = c.client_no and
        c.user_no = u.user_no and
        u.user_no = $user_no and
        advertisement_no = $advertisement_id";
        $query_run = mysqli_query($connection, $query);

        if(mysqli_num_rows($query_run) === 1) {
            $row = mysqli_fetch_assoc($query_run);
            $project_name = $row['project_name'];
            $a_section = $row['a_section'];
            if(empty($new_cost)){
                $new_cost = $row['price'];
            }
            if(empty($expiry_date)){
                $expiry_date = $row['period_of_project'];
            }
            if(empty($changes)) {
                $changes = $row['explaination'];
            }

            $programmer = "SELECT * from users, programmer where 
            users.user_no = programmer.user_no and
            user_name = '$programmer_name'";
            $programmer_run = mysqli_query($connection, $programmer);

            if(mysqli_num_rows($programmer_run) === 1){
                $row2 = mysqli_fetch_assoc($programmer_run);
                $programmer_no = $row2['user_no'];
                $dateAdd = date("y-m-d", strtotime($date. " + ".$expiry_date." weeks"));

                $add = "INSERT INTO project (programmer_no, client_no, project_name,
                price, starting_date, finishing_date, p_section, description)
                VALUES ($programmer_no, $user_no, '$project_name', '$new_cost', '$date', '$dateAdd', '$a_section','$changes')";
                $add_run = mysqli_query($connection, $add);

                if($add_run){
                    $del = "DELETE FROM advertisement where advertisement_no = $advertisement_id";
                    $del_run = mysqli_query($connection, $del);
                    if($del_run){
                        header("Location: indexProfileClient.php?notif= New Project created successfully.");
                        exit();
                    }
                    else{
                        header("Location: indexProfileClient.php?error= There is a problem.");
                        exit();
                    }
                }
                else {
                    header("Location: indexProfileClient.php?error= There is a problem.");
                    exit();
                }
            }else {
                header("Location: indexProfileClient.php?error= There is no programmer like this");
                exit();
            }
        }else {
            header("Location: indexProfileClient.php?error= There is no advertisement like this or it is not for you");
            exit();
            }
        }



?>
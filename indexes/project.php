<?php
    include 'newProject.php';

    $user_no = $_SESSION['user_no'];
    $adv_no = $_GET['advertisement_no'];
    $message_no = $_GET['message_no'];

    $sql = "SELECT * from users as u, client as c, advertisement as a where
    u.user_no = c.user_no and
    c.client_no = a.client_no and
    a.advertisement_no = $adv_no";
    $sql_run = mysqli_query($connection, $sql);

    if(mysqli_num_rows($sql_run) === 1){
        $row = mysqli_fetch_assoc($sql_run);
        $sql2 = "SELECT * from users where user_no = $user_no";
        $sql2_run = mysqli_query($connection, $sql2);
        if(mysqli_num_rows($sql_run) === 1){
            $row2 = mysqli_fetch_assoc($sql2_run);
            $is_programmer = $row2['is_programmer'];
            if($is_programmer == 0) {
                header("Location: indexProfile.php?notif=You can not accept this.");
                exit();
            }
            else {
                $sql3 = "SELECT * from users as u, programmer as p, mailing as m where
                u.user_no = p.user_no and
                p.user_no = m.sender_no and
                m.message_no = $message_no";
                $sql3_run = mysqli_query($connection, $sql3);
                if(mysqli_num_rows($sql3_run) === 1) {
                    header("Location: indexProfileClient.php?notif=You can accept this $message_no");
                    exit();
                }
                else {
                    header("Location: indexProfileClient.php?notif=Ther is no result.");
                    exit();
                }
            }
        }
    }

    // $sql2 = "INSERT INTO project (programmer_no, client_no, project_name
    // , price,starting_date, finishing_date, p_section, is_finished)
    // values()";

?>
<?php 
    include "log_in_check.php";

    $adv_no = $_GET['adv_no'];

    $sql = "DELETE FROM advertisement where advertisement_no = $adv_no";
    if(mysqli_query($connection, $sql)) {
        header("Location: indexProfileClient.php?notif= Advertisement deleted successfully");
        exit();
    }else {
        header("Location: indexProfileClient.php?error= Advertisement did not deleted");
        exit();
    }

?>

<?php
include "vt_con.php";
$message_no = $_GET['message_no'];

$message = "DELETE FROM mailing where message_no = $message_no";
$message_run = mysqli_query($connection, $message);
if($message_run){
    header("Location: indexProfileClient.php?notif= Message deleted successfully");
    exit();
}
else{
    header("Location: indexProfileClient.php?error= Message did not delete");
    exit();
}
?>
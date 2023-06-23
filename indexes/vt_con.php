<?php
    session_start();
    $serverName = "localhost";
    $compName = "root";
    $serverPassword = "";
    $va = "BSOFT";
    
    $connection = mysqli_connect($serverName, $compName, $serverPassword, $va);

    if(!$connection) {
        die ("There is a proplem in connecting: ".mysqli_connect_error());
    }

?>
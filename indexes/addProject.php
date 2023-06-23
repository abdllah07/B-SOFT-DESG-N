<?php
    include "log_in_check.php";

    if(isset($_POST["add"])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $projectName = validate($_POST['project-name']);
        $projectType = validate($_POST['project-type']);
        if($projectType == "nothing") {
            header("Location: indexAfterLoginClient.php?error=You must select the type of project");
            exit();
        }
        $price = validate($_POST['price']);
        $projectPeriod = validate($_POST['project-period']);
        $explaination = validate($_POST['explaination']);
        $date = date("y-m-d");
        $user_no = $_SESSION['user_no'];
        $client = "SELECT * from client where user_no= $user_no";
        $client_run = mysqli_query($connection, $client);
        if(mysqli_num_rows($client_run) === 1) {
            $row = mysqli_fetch_assoc($client_run);
            $_SESSION['client_no'] = $row['client_no'];
            $client_no = $_SESSION['client_no'];
        }
        else {
            echo "client no problem";
        }

        $query = "INSERT INTO 
        advertisement (project_name, a_section,
        date_of_publication, period_of_project,
        price, explaination, client_no)
        values ('$projectName', '$projectType', '$date', $projectPeriod, '$price', '$explaination', $client_no)";
        $query_run = mysqli_query($connection, $query);

        if($query_run) {
            header("Location: indexAfterLoginClient.php");
            exit();
        }
        else {
            header("Location: indexAfterLoginClient.php?error= There is a problem");
            exit();
        }
    }



?>
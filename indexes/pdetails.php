<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BSOFT</title>
        <!-- normalize css  -->
        <link rel="stylesheet" href="normalize.css">
        <!-- fontawesom  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
            rel="stylesheet"
        />
        <!-- sayfa style  -->
        <link rel="stylesheet" href="../styles/pdetails.css">
    </head>
    <body>

        <?php
            include "vt_con.php";
        ?>

        <!-- start header  -->
        <header>
            <div class="container">
                <div class="logo" id="to-main">
                    <img src="LogoMakr-8NoX9G.png" alt="">
                </div>
                <div class="select">
                    <a href="indexAfterLoginClient.php"><i class="fa-solid fa-house-chimney" title="home"></i></a>
                    <a href="indexProfileClient.php"><i class="fa-solid fa-arrow-left" title="Back"></i></a>
                </div>
            </div>
        </header>
        <!-- end header  -->

        <!-- start details  -->
        <?php 
            $message_no = $_GET['message_no'];

            $sql = "SELECT sender_no from mailing where message_no = $message_no";
            $sql_run = mysqli_query($connection, $sql);
            if(mysqli_num_rows($sql_run) === 1){
                $row = mysqli_fetch_assoc($sql_run);
                $user_no = $row['sender_no'];
            }
            else {
                echo "ilk";
            }

            $user = "SELECT * from users as u, bank_account_information as b, programmer as p where
            u.user_no = b.user_no and
            u.user_no = p.user_no and
            u.user_no = $user_no";
            $user_run = mysqli_query($connection, $user);

            if(mysqli_num_rows($user_run) === 1) {
                $r = mysqli_fetch_assoc($user_run);
            }
            else {
                echo "second";
            }
        ?>
        <div class="details container">
            <div class="gi">
                <div class="photo">
                    <img src="user.jpg" alt="">
                </div>
                <div class="name">
                    <h3>Full Name</h3>
                    <p><?php echo $r['first_name']." ".$r['last_name']; ?></p>
                </div>
                <div class="user-name">
                    <h3>User Name</h3>
                    <p><?php echo $r['user_name'] ?></p>
                </div>
                <div class="email">
                    <h3>Email</h3>
                    <p><?php echo $r['email'] ?></p>
                </div>
                <div class="birthday">
                    <h3>Birthday</h3>
                    <p><?php echo $r['birthday'] ?></p>
                </div>
            </div>
            <div class="section2">
                <div class="menu">
                    <ul>
                        <li class="educationl">Education</li>
                        <li class="project">Projects</li>
                        <li class="bankl">Bank Account</li>
                    </ul>
                </div>
                <div class="containt">
                    <div class="education">
                        <div class="section">
                            <h3>The Section</h3>
                            <p><?php echo $r['section'] ?></p>
                        </div>
                        <div class="cer">
                            <h3>Certificates</h3>
                            <p><?php echo $r['all_certificates'] ?></p>
                        </div>
                        <div class="experience">
                            <h3>Year Of Experience</h3>
                            <p><?php echo $r['year_of_experience'] ?></p>
                        </div>
                        <div class="pl">
                            <h3>Programming Languages</h3>
                            <p><?php echo $r['programming_languages'] ?></p>
                        </div>
                        <div class="languages">
                            <h3>Languages</h3>
                            <p><?php echo $r['languages'] ?></p>
                        </div>
                    </div>
                    <div class="bank">
                        <div class="bank-name">
                            <h3>Bank Name</h3>
                            <p><?php echo $r['bank_name'] ?></p>
                        </div>
                        <div class="iban">
                            <h3>IBAN</h3>
                            <p><?php echo $r['iban'] ?></p>
                        </div>
                        <div class="account-name">
                            <h3>Account Name</h3>
                            <p><?php echo $r['account_name'] ?></p>
                        </div>
                    </div>
                    <div class="projects">
                    <?php
                        $project = "SELECT * from users as u, project as p where
                        u.user_no = p.programmer_no and
                        user_no = $user_no";
                        $project_run = mysqli_query($connection, $project);
                        $date = date("y-m-d");

                        if(mysqli_num_rows($project_run) > 0) {
                            while($rowp = mysqli_fetch_assoc($project_run)){
                                if(strtotime($date) > strtotime($rowp['finishing_date'])){
                    ?>
                        <div class="name">
                            <h3>Project Name</h3>
                            <p><?php echo $rowp['project_name'] ?></p>
                        </div>
                        <div class="des">
                            <h3>Details</h3>
                            <p>
                                <?php 
                                    echo $rowp['description'];
                                ?>
                            </p>
                        </div>
                    <?php 
                                }
                            } 
                        } 
                    ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- end details  -->


            <!-- Jquery cdn  -->
        <script 
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer"
        >
        </script>
        <!-- login script  -->
        <script src="../JS/pdetails.js"></script>
    </body>
</html>
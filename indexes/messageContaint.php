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
        <link rel="stylesheet" href="../styles/profile.css">
        <style>
            .notif {
                position: fixed;
                font-size: 14px;
                bottom: 20px;
                left: 20px;
                background-color: #ccc;
                padding: 10px 5px;
                border-radius: 5px;
                transition: .1s 2s;
                cursor: pointer;
            }

            @media (max-width: 1200px){
                .message-section {
                    width: fit-content;
                }
            }
        </style>
    </head>
    <body>
        <?php
            include "log_in_check.php";
        ?>
        <?php if(isset($_GET['notif'])) { ?>
            
            <label for="a" class="notif">
                <i class="fa-solid fa-check" style="color: green;"></i>
                <?php echo $_GET['notif']; ?>
            </label>
        <?php } ?>
        <!-- start header  -->
        <header>
            <div class="container">
                <div class="logo" id="to-main">
                    <img src="LogoMakr-8NoX9G.png" alt="">
                </div>
                <div class="select">
                    <a href="indexAfterLogin.php"><i class="fa-solid fa-house-chimney" title="home"></i></a>
                    <a href="indexProfile"><i class="fa-solid fa-arrow-left" title="Back"></i></a>
                </div>
            </div>
        </header>
        <!-- end header  -->

        <!-- start new box  -->
        <?php 
            $user_no = $_SESSION['user_no'];
            $message_no = $_GET['message_no'];

            $query = "SELECT * from mailing as m,users as u where
            u.user_no = m.sender_no and message_no = $message_no";
            $query_run = mysqli_query($connection, $query);
            if(mysqli_num_rows($query_run) > 0){
                $row = mysqli_fetch_assoc($query_run);
        ?>

        <div class="container message-containt" style="display: flex; margin: 25px auto">
            <div class="title">
                <h2><?php echo $row['title']; ?></h2>
            </div>
            <div class="gonderen">
                <div class="sender">
                    <p>Sender:</p>
                    <h3><?php echo $row['user_name']; ?></h3>
                </div>
                <div class="icons">
                    <i class="fa-solid fa-reply new" title="Reply"></i>
                </div>
            </div>
            <div class="full-message">
                <p>
                    <?php echo $row['containt']; ?>
                </p>
            </div>
        </div>
        <?php } ?>

        <!-- end containt  -->

        <!-- start new box  -->

                <div class="new-box">
            <div class="box-header">
                <div class="new-message">
                    <h3>New Message</h3>
                </div>
                <div class="close">
                    <div class="spans">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="containt">
                <form action="message.php" method="post">
                    <input type="text" name="to" id="to" placeholder="To" required>
                    <hr>
                    <input type="text" name="title" id="title" placeholder="Title" required>
                    <hr>
                    <textarea name="message-containt" id="message-containt" required></textarea>
                    <input type="submit" name="submit" id="submit" value="Send" name="send">
                </form>
            </div>
        </div>

        <!-- end new box  -->

            <!-- Jquery cdn  -->
    <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer"
    >
    </script>
    <!-- login script  -->
    <script src="../JS/profile.js"></script>

    <script>
                $(document).ready(function(){
                    $("#edit").click(function(){
                        $(".personal-information").css("transform","rotateY(0deg)");
                        $(".pi-edit").css("display","flex");
                        $(".pi-edit").delay(500).css("margin-top","20px");
                        $(".personal-information").hide();
                    })
                    $("#back-button").click(function(){
                        $(".personal-information").css("transform","rotateY(0deg)");
                        $(".pi-edit").slideUp();
                        $(".personal-information").show();
                    })
                })
                
                $(document).ready(function(){
                    $(".notif").click(function(){
                        $(this).hide();
                    })
                })
        </script>
    </body>
</html>
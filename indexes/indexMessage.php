<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://kit.fontawesome.com/1d754c5837.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&family=Work+Sans:ital,wght@0,200;0,300;0,500;0,700;1,200;1,300;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="..//styles/afterlogin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <style>
            .box {
                margin: 20px auto;
            }

            .box form {
                display: flex;
                flex-direction: column;
                width: 100%;

            }

            .box form input,.box form textarea {
                border: none;
                outline: none;
                border-bottom: 1px solid;
                padding: 10px;
                transition: 0.3s;
                border-radius: 5px;
                font-size: 18px;
            }

            .box form input:focus,.box form textarea:focus {
                background-color: rgb(244, 244, 244);
            }

            .box form textarea {
                height: 500px;
                border: none;
            }

            .box form input:last-child {
                border: none;
                width: fit-content;
                padding: 5px 10px;
                background-color: #19283f;
                color: #fff;
                border-radius: 5px;
                align-self: flex-end;
                margin: 10px 0;
                font-size: 20px;
            }

            .box form input:last-child:hover {
                background-color: black;
            }
        </style>
    </head>
    <body>
        <?php
        include "log_in_check.php";
        ?>
        <!-- Start nav  -->
        <nav>
            <div class="navbar">
                <div class="logo">
                    <img src="images/LogoMakr-8NoX9G.png" alt="" srcset="">
                </div>
                <div class="lists" >
                        <ul>
                        <li><a href="#contact">Contact</a></li>
                        <input type="text" placeholder="search here">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <a href="index.php">
                            <i class="fas fa-sign-in"></i>
                        </a>
                        <a href="indexProfile.php">
                            <button class="user-name"><?php echo $_SESSION['user_name']; ?></button>
                        </a>
                    
                    </ul>
                </div>
                <div class="nav-icon">
                    <a href="#">
                        <i class="fa fa-bars" aria-hidden="true" id="nav-icon"></i>
                    </a>
                </div>
            </div>
        </nav>

        <!-- end nav  -->

        <!-- start message box  -->
        <?php
            $advertisement_no = $_GET['advertisement_no'];
            $query="SELECT * from users as u,client as c, advertisement as a where
            u.user_no = c.user_no and c.client_no = a.client_no and advertisement_no = $advertisement_no";
            
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0){
                $row = mysqli_fetch_assoc($query_run);
            

        ?>
        <div class="box container">
            <form action="messageRequest.php" method="post">
                <input type="text" name="to" id="to" value="<?php echo $row['user_name'];  ?>">
                <input type="text" name="title" id="title" value="<?php echo $row['project_name']; ?>">
                <textarea name="containt" id="containt" placeholder="Message"></textarea>
                <input type="submit" value="Send" name="send">
            </form>
        </div>
        <?php } ?>
        <!-- end message box  -->
    </body>

</html>
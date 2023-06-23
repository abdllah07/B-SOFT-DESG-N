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
        <link rel="stylesheet" href="../styles/signup.css">
        <style>
            ::-webkit-scrollbar {
                width: 10px;
            }

            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.25);
            }

            ::-webkit-scrollbar-thumb {
                background-color: #ccc;
            }

            .parent .log-in-containt,
        .parent .sign-up-containt,
        .parent .change-password {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            font-size: 25px;
            font-weight: 800;
            margin: 10px 0 20px 0;
        }

        .parent .sign-up-containt {
            display: none;
        }

        @media (max-width: 768px) {
            .parent .log-in-containt form,
            .parent .sign-up-containt form,
            .parent .change-password form{
                font-size: 18px;
            }
        }

        .parent #log:checked + .sign-up-containt ,
        .parent #sign:checked + .log-in-containt {
            display: none;
        }

        .parent .log-in-containt form,
        .parent .sign-up-containt form,
        .parent .change-password form {
            width: 80%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .parent .log-in-containt h2,
        .parent .sign-up-containt h2,
        .parent .change-password h2 {
            font-size: 40px;
            text-transform: capitalize;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .parent .log-in-containt form h2,
            .parent .sign-up-containt form h2,
            .parent .change-password form h2 {
                font-size: 30px;
                padding: 10px;
            }
        }

        .parent .log-in-containt form .with-log,
        .parent .sign-up-containt form .with-sign {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 80%;
            padding: 20px;
            cursor: pointer;
            font-size: 15px;
            margin-bottom: 20px;
            border-radius: 20px;
            transition: 0.3s;
            margin-top: 10px;
            border: 2px solid black;

        }

        @media (max-width: 768px) {
            .parent .log-in-containt form .with-log,
            .parent .sign-up-containt form .with-sign {
                padding: 15px;
                font-size: 12px;
        }
        }



        .parent .log-in-containt .with-log:hover,
        .parent .sign-up-containt .with-sign:hover {
            background-color: #eee;
        }

        .parent .log-in-containt .with-log:active,
        .parent .sign-up-containt .with-sign:active {
            background-color: #ccc;
        }


        .parent .log-in-containt .with-log h3,
        .parent .sign-up-containt .with-sign h3 {
            word-spacing: -7.5px;
        }

        .parent .log-in-containt .with-log i,
        .parent .sign-up-containt .with-sign i {
            color: #DB4437;
        }

        .parent .log-in-containt input,
        .parent .sign-up-containt input,
        .parent .sign-up-containt select,
        .parent .change-password input {
            display: block;
            width: 80%;
            padding: 20px 15px;
            border-radius: 10px;
            margin: var(--mainMargin) 0;
            border-width: 0.5px;
            transition: 0.3s;
        }

        @media (max-width: 768px) {
            .parent .log-in-containt input,
            .parent .sign-up-containt input,
            .parent .change-password input {
                padding: 10px;
            }
        }

        .parent .log-in-containt input:hover,
        .parent .sign-up-containt input:hover,
        .parent .change-password input:hover {
            background-color: #eee;
        }

        .parent .log-in-containt input:focus,
        .parent .sign-up-containt input:focus,
        .parent .change-password input:focus {
            background-color: #ddd;
            border-width: 1px;
        }

        .parent .log-in-containt .log-in,
        .parent .sign-up-containt .sign-up,
        .parent .change-password .change {
            width: fit-content;
            padding: 15px;
            border-radius: 10px;
            margin: var(--mainMargin) 0;
            border: none;
            background-color: var(--mainColor);
            color: #fff;
            transition: 0.3s;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .parent .log-in-containt .log-in,
            .parent .sign-up-containt .sign-up,
            .parent .change-password .change {
                width: 30%;
            }
        }

        .parent .log-in-containt .log-in:hover,
        .parent .sign-up-containt .sign-up:hover,
        .parent .change-password .change:hover {
            background-color: #006a87;
        }

        .parent .log-in-containt .log-in:active,
        .parent .sign-up-containt .sign-up:active,
        .parent .change-password .change:active {
            background-color: #005b74;
        }

        .parent .log-in-containt a {
            font-size: 16px;
            color: var(--mainColor);
            margin: 20px 0;
            text-decoration: none;
        }

        .parent .log-in-containt a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .parent .log-in-containt a {
                font-size: 12px;
                word-spacing: -4px;
            }
        }
        </style>
    </head>
    <body>

        <!-- nav -->
        <nav>
            <div class="logo">
                <a href="index.php"><img src="images/LogoMakr-8NoX9G.png" alt=""></a>
            </div>
        </nav>
        <!-- nav -->

        <section class="parent container">
            <div class="buttons">
                <label for="change" id="change-password" style="width:100%; border-right: none; ">Change Passwrod</label>
                
            </div>
            <div class="change-password">
                <?php
                    $email = $_GET['email'];
                ?>
                <form action="resetPassword.php?email=<?php echo $email;?>" method="post">
                    <?php if(isset($_GET['error'])) { ?>
                        <p class="error" style="color: red; font-size: 18px; margin:15px 0"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    
                    <?php if(isset($_GET['success'])) { ?>
                        <p class="success" style="color: green; font-size: 18px; margin:15px 0"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <h2>You can change your password now</h2>
                    <input type="password" name="pass" placeholder="New Password">
                    <input type="password" name="passA" placeholder="New Password Again">
                    <input type="submit" name="submit" value="Change" class="change">
                </form>
            </div>
    </section>

    </body>
</html>
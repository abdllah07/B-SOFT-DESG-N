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
                <label for="sign" id="sign-up">Sign Up</label>
                <label for="log" id="log-in">Log In</label>
                
            </div>
            <div class="log-in-containt" style="display: none;">
                <form action="log_in_check.php" method="post">
                    <h2>Log in</h2>
                    <?php if(isset($_GET['error-log'])) { ?>
                        <p class="error-log" style="color: red; font-size: 18px; margin:15px 0"><?php echo $_GET['error-log']; ?></p>
                    <?php } ?>
                    <div class="with-log">
                        <h3>Log In By</h3>
                        <i class="fa-brands fa-google fa-2x"></i>
                    </div>
                    <h2>Or</h2>
                    <input type="text" name="user-name" id="user-name" placeholder="User Name">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <a href="forgetPassword.php">Did You forget the password</a>
                    <input type="submit" name="submit" id="submit" value="Log In" class="log-in">
                </form>
            </div>

            <div class="sign-up-containt" style="display: flex;">
                <form action="sign-up-chek.php" method="post">
                <h2>Sign Up</h2>

                <?php if(isset($_GET['error'])) { ?>
                    <p class="error" style="color: red; font-size: 18px; margin:15px 0"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                
                <?php if(isset($_GET['success'])) { ?>
                    <p class="success" style="color: green; font-size: 18px; margin:15px 0"><?php echo $_GET['success']; ?></p>
                <?php } ?>

                <div class="with-sign">
                    <h3>Sign Up By</h3>
                    <i class="fa-brands fa-google fa-2x"></i>
                </div>
                <h2>Or</h2>
                <?php if(isset($_GET['firstName'])){ ?>
                <input 
                    type="text" 
                    name="first-name" 
                    id="first-name" 
                    placeholder="First Name"
                    value="<?php echo $_GET['firstName'] ?>">
                <?php } else { ?>
                <input 
                    type="text" 
                    name="first-name" 
                    id="first-name" 
                    placeholder="First Name">
                    <?php }?>
                    <?php if(isset($_GET['lastName'])){?>
                <input 
                    type="text" 
                    name="last-name" 
                    id="last-name" 
                    placeholder="Last Name"
                    value="<?php echo $_GET['lastName']; ?>">
                    <?php }else{ ?>
                    <input 
                    type="text" 
                    name="last-name" 
                    id="last-name" 
                    placeholder="Last Name">
                    <?php }?>
                    <?php if(isset($_GET['userName'])){ ?>
                    <input 
                    type="text" 
                    name="user-name" 
                    id="user-name" 
                    placeholder="User Name"
                    value="<?php echo $_GET['userName']; ?>">
                    <?php }else{ ?>
                    <input 
                    type="text" 
                    name="user-name" 
                    id="user-name" 
                    placeholder="User Name">
                    <?php }?>
                <label for="birthday">Date Of Born</label>
                <input type="date" name="birthday" id="birthday">
                <label for="photo">Personal Photoghraph</label>
                <input type="file" id="photo" name="photo">
                <?php if(isset($_GET['email'])){ ?>
                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $_GET['email'] ?>">
                <?php }else{ ?>
                <input type="email" name="email" id="email" placeholder="Email">
                <?php  } if(isset($_GET['mobileNo'])){ ?>
                <input type="tel" name="mobile-no" id="mobile-no" maxlength="11" placeholder="Mobile NO" value= "<?php echo $_GET['mobileNo'];  ?>">
                <?php }else{ ?>
                <input type="tel" name="mobile-no" id="mobile-no" maxlength="11" placeholder="Mobile NO">
                <?php }?>
                <input type="password" name="password" id="passWord" placeholder="Password">
                <input type="password" name="Pagain" id="Pagain" placeholder="Password Again">
                <label for="accontType">Select What You Want To Be</label>
                <select name="accountType" id="accontType" required>
                    <option id="fchoise" value="Programmer" name="client">Client</option>
                    <option id="schoise" value="Client" name="programmer">Programmer</option>
                </select>
                <input type="submit" name="submit" id="submit" value="Sign Up" class="sign-up">
                </form>
            </div>

    </section>



    <!-- Jquery cdn  -->
    <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer"
    >
    </script>
    <!-- login script  -->
    <script src="../JS/signup.js"></script>
</body>
</html>
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
                bottom: 40px;
                left: 20px;
                background-color: #eee;
                color: green;
                border-bottom: 1px solid green;
                padding: 10px 5px;
                border-radius: 5px;
                transition: .1s 2s;
                cursor: pointer;
                z-index: 500;
            }

            .error {
                position: fixed;
                font-size: 14px;
                bottom: 40px;
                left: 20px;
                background-color: #eee;
                color: #B30404;
                border: 1px solid #B30404;
                padding: 10px 5px;
                border-radius: 5px;
                transition: .1s 2s;
                cursor: pointer;
                z-index: 500;
            }

            @media (max-width: 1200px){
                .message-section {
                    margin: 80px auto;
                }
            }

            .messages a {
                color: black;
                text-decoration: none;
            }
            
            .messages a .text h5 {
                align-self: flex-start;
                margin: 5px;
            }

            ::-webkit-scrollbar {
                width: 10px;
            }

            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.25);
            }

            ::-webkit-scrollbar-thumb {
                background-color: rgb(34 34 45 / 95%);
            }

            .gelen .date {
                transform: translateX(30px);
                transition: 0.5s;
            }

            .gelen .message:hover .date {
                transform: translateX(0px);
            }

            .gelen .trash,.gelen .who {
                opacity: 0;
                transition: 0.3s;
                margin: 0 5px;
            }

            .gelen .trash a:hover,
            .gelen .who a:hover {
                color: rgb(0, 0, 0, 0.75);
            }

            .gelen .message:hover .trash,
            .gelen .message:hover .who{
                opacity: 1;
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

        <?php if(isset($_GET['error'])) { ?>
            
            <label for="a" class="error">
            <i class="fa-solid fa-xmark" style="color: #B30404;"></i>
                <?php echo $_GET['error']; ?>
            </label>
        <?php } ?>

        <!-- start header  -->
        <header>
            <div class="container">
                <div class="logo" id="to-main">
                    <img src="LogoMakr-8NoX9G.png" alt="">
                </div>
                <div class="select">
                    <a href="indexAfterLogin.php"><i class="fa-solid fa-house-chimney"></i></a>
                    <i class="fa-solid fa-bars" id="menu"></i>
                </div>
            </div>
        </header>
        <!-- end header  -->

        <!-- start hidden nav  -->
        <nav class="hidden">
            <ul>
                <li id="personal-information"><a href="#">Personal Information</a></li>
                <li id="clients"><a href="#">Clients</a></li>
                <li id="change"><a href="#">Change The Password</a></li>
                <li id="sign-out"><a href="index.html">Sign Out</a></li>
            </ul>
        </nav>
        <!-- end hidden nav  -->

        <!-- start main  -->
        <!-- <div class="container">
            <div class="main">
                <div class="requests">
                    <h1>Requests</h1>
                    <p>You dont have any new requests</p>
                </div>
                <div class="messages">
                    <h1>Messages</h1>
                    <p>You dont have any new messages</p>
                </div>
            </div>
            <div class="projelerim">
                
            </div>
        </div> -->

        <div class="message-section container" id="message-section">
            <div class="tools">
                <div class="small-menu">
                    <i class="fa-solid fa-ellipsis-vertical fa-2x">
                        <!-- <div class="list">
                            <ul>
                                <li id="incoming">Incoming mail</li>
                                <li id="sent">Sent mail</li>
                            </ul>
                        </div> -->
                    </i>
                    <i class="fa-solid fa-arrow-rotate-right fa-2x" title="Relode"></i>
                    
                </div>
                <div class="new">
                    <label for="new">New</label>
                </div>
            </div>

            <div class="messages-header">
                <ul>
                    <li id="gelen">
                        <i class="fa-solid fa-envelope"></i>
                        Incoming Messages
                    </li>
                    <li id="giden">
                        <i class="fa-solid fa-paper-plane"></i>
                        Sent Messages
                    </li>
                    <li id="private">
                        <i class="fa-solid fa-code-pull-request"></i>
                        Sent Requests
                    </li>
                </ul>
            </div>

            <div class="messages gelen">
                <?php
                    $user_no = $_SESSION['user_no'];
                    $gelen = "SELECT * FROM mailing as m,users as u where
                    m.sender_no = u.user_no and m.recipient_no = $user_no and m.is_fav = 0 order by m.sending_date desc";
                    $gelen_run = mysqli_query($connection, $gelen);
                    if(mysqli_num_rows($gelen_run) > 0){
                        while($row = mysqli_fetch_assoc($gelen_run)){
                            $message_no = $row['message_no'];
                ?>
                
                <div class="message">
                    <div class="title">
                        <div class="in">
                            <input type="checkbox" title="Select">
                        </div>
                        <i class="fa-solid fa-star" title="Add To Favorite" id="star"></i>
                        <h3><?php echo $row['user_name'];  ?></h3>
                    </div>
                    <div class="text">
                        <a href="messageContaint.php?message_no=<?php echo $message_no ?>" class="bold">
                            <h5><?php echo $row['title']; ?></h5>
                            <p>
                                <?php echo $row['containt']; ?>
                            </p>
                        </a>
                    </div>
                    <div class="date" style="width: 100px">
                        <p><?php echo $row['sending_date'] ?></p>
                    </div>
                    <div class="trash">
                        <a href="messageDeleteProgrammer.php?message_no=<?php echo $row['message_no']; ?>"><i class="fa-solid fa-trash" style="font-size: 25px;"></i></a>
                    </div>
                </div>
                
                <?php 
                        }
                    }
                ?>
            </div>
            <div class="messages giden">
            <?php
                    $user_no = $_SESSION['user_no'];
                    $gelen = "SELECT * FROM mailing as m,users as u where
                    m.recipient_no = u.user_no and m.sender_no = $user_no and m.is_fav = 0 order by m.sending_date desc";
                    $gelen_run = mysqli_query($connection, $gelen);
                    if(mysqli_num_rows($gelen_run) > 0){
                        while($row = mysqli_fetch_assoc($gelen_run)){
                            $message_no = $row['message_no'];
                ?>
                
                <div class="message">
                    <div class="title">
                        <div class="in">
                            <input type="checkbox" title="Select">
                        </div>
                        <i class="fa-solid fa-star" title="Add To Favorite" id="star"></i>
                        <h3><?php echo "To: ".$row['user_name'];  ?></h3>
                    </div>
                    <div class="text">
                        <a href="messageContaint.php?message_no=<?php echo $message_no ?>">
                            <h5><?php echo $row['title']; ?></h5>
                            <p>
                                <?php echo $row['containt']; ?>
                            </p>
                        </a>
                    </div>
                    <div class="date" style="width: 100px">
                        <p><?php echo $row['sending_date'] ?></p>
                    </div>
                </div>
                
                <?php 
                        }
                    }
                ?>
            </div>
            <div class="messages private" style="display: none;">
                <?php
                    $user_no = $_SESSION['user_no'];
                    $gelen = "SELECT * FROM mailing as m,users as u where
                    m.recipient_no = u.user_no and m.sender_no = $user_no and m.is_fav = 1 order by m.sending_date desc";
                    $gelen_run = mysqli_query($connection, $gelen);
                    if(mysqli_num_rows($gelen_run) > 0){
                        while($row = mysqli_fetch_assoc($gelen_run)){
                            $message_no = $row['message_no'];
                ?>
                
                <div class="message">
                    <div class="title">
                        <div class="in">
                            <input type="checkbox" title="Select">
                        </div>
                        <i class="fa-solid fa-star" title="Add To Favorite" id="star"></i>
                        <h3><?php echo "To: ".$row['user_name'];  ?></h3>
                    </div>
                    <div class="text">
                        <a href="messageContaint.php?message_no=<?php echo $message_no ?>">
                            <h5 style="align-self: flex-start; margin: 5px;"><?php echo $row['title']; ?></h5>
                            <p>
                                <?php echo $row['containt']; ?>
                            </p>
                        </a>
                    </div>
                    <div class="date" style="width: 100px">
                        <p><?php echo $row['sending_date'] ?></p>
                    </div>
                </div>
                
                <?php 
                        }
                    }
                ?>

            </div>
        </div>

        <!-- start message containt -->

        <div class="container message-containt">
            <div class="title">
                <h2>Lorem Ipsum</h2>
            </div>
            <div class="gonderen">
                <div class="sender">
                    <p>Sender:</p>
                    <h3>Kais@gmail.com</h3>
                </div>
                <div class="icons">
                    <i class="fa-solid fa-reply new" title="Reply"></i>
                    <i class="fa-solid fa-arrow-left" title="Back"></i>
                </div>
            </div>
            <div class="full-message">
                <p>
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                    Lorem ipsum dolor sit amet, 
                    consectetur adipisicing elit. 
                    Maiores earum porro quo veniam dolores 
                    ipsum illo cum provident ab sit natus nam, 
                    corporis eligendi reiciendis assumenda delectus 
                    quasi! Laudantium, totam!
                </p>
            </div>
        </div>

        <!-- end message containt -->
        <!-- end main  -->

        <!-- start personal information  -->

        <div class="container pis" id="pis">
            <div class="personal-information">
                <h1>Personal Informatin</h1>
                <?php
                        $user_no = $_SESSION['user_no'];
                        $pis = "SELECT user_name, first_name, last_name, birthday, email,mobile_no
                        from users where user_no = $user_no";
                        $pis_run = mysqli_query($connection, $pis);

                        if(mysqli_num_rows($pis_run) === 1) {
                            $row = mysqli_fetch_assoc($pis_run);

                    ?>
                <table class="personal-table">
                    <tr>
                        <th>User Name</th>
                        <td><?php echo $row['user_name']; ?></td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td><?php echo $row['first_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo $row['last_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Date of birth</th>
                        <td><?php echo $row['birthday']; ?></td>
                    </tr>
                </table>
                
                <table class="contact-table">
                    <h2>contact informations</h2>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Mobile number</th>
                        <td><?php echo $row['mobile_no']; ?></td>
                    </tr>
                </table>
                <?php 
                        } 
                    ?>

                <table class="personal-table">
                    <h2>Education</h2>
                    <?php
                        $edu = "SELECT section, all_certificates, year_of_experience, languages, programming_languages
                        from programmer where user_no = $user_no";
                        $edu_run = mysqli_query($connection, $edu);

                        if(mysqli_num_rows($edu_run) === 1) {
                            $row = mysqli_fetch_assoc($edu_run);

                    ?>
                    <tr>
                        <th>Section</th>
                        <td><?php echo $row['section']; ?></td>
                    </tr>
                    <tr>
                        <th>Certificates</th>
                        <td><?php echo $row['all_certificates']; ?></td>
                    </tr>
                    <tr>
                        <th>Experience</th>
                        <td><?php echo $row['year_of_experience']; ?></td>
                    </tr>
                    <tr>
                        <th>Languages</th>
                        <td><?php echo $row['languages']; ?></td>
                    </tr>
                    <tr>
                        <th>Programmin languages</th>
                        <td><?php echo $row['programming_languages']; ?></td>
                    </tr>
                </table>
                <?php 
                        } 
                    ?>
                    
                <table class="bank-table">
                    <h2>Bank accont informations</h2>
                    <?php 
                        $bank = "SELECT * from users as u, bank_account_information as b where
                        u.user_no = b.user_no and
                        u.user_no = $user_no";
                        $bank_run = mysqli_query($connection, $bank);
                        if(mysqli_num_rows($bank_run) === 1) {
                            $bank_row = mysqli_fetch_assoc($bank_run);
                        
                    ?>
                    <tr>
                        <th>Bank name</th>
                        <td>
                            <?php
                                    echo $bank_row['bank_name'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>IBAN No</th>
                        <td>
                            <?php
                                        echo $bank_row['iban'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Bank accont name</th>
                        <td>
                            <?php
                                        echo $bank_row['account_name'];
                                ?>
                        </td>
                    </tr>
                
                </table>
                <?php
                }
                ?>
                <button style="margin-bottom: 50px;" id="edit">Edit</button>
            </div>


            <div class="pi-edit" style="margin-top: -950px; ">
                <form action="pi-edit.php" method="post">
                    <h2>Personal Informatin</h2>
                    <?php 
                        $pis = "SELECT user_name, first_name, last_name, birthday, email,mobile_no
                        from users where user_no = $user_no";
                        $pis_run = mysqli_query($connection, $pis);

                        if(mysqli_num_rows($pis_run) === 1) {
                            $row = mysqli_fetch_assoc($pis_run);

                    ?>
                    <div class="user-name">
                        <label for="user-name">User Name</label>
                        <input type="text" id="user-name" name="user-name" value="<?php echo $row['user_name']; ?>" required>
                    </div>
                    <div class="first-name">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first-name" value="<?php echo $row['first_name']; ?>" required>
                    </div>
                    <div class="last-name">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last-name" value="<?php echo $row['last_name']; ?>" required>
                    </div>
                    <div class="birth-day">
                        <label for="birth-day">Date Of Born</label>
                        <input type="date" id="birth-day" name="birth-day" value="<?php echo $row['birthday']; ?>" required>
                    </div>
                    <h2>contact informations</h2>
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="mobile-no">
                        <label for="mobile-no">Mobile Number</label>
                        <input type="tel" name="mobile-no" id="mobile-no" maxlength="11" value="<?php echo $row['mobile_no']; ?>" required>
                    </div>
                    <?php 
                        } 
                    ?>
                    <?php
                        $edu = "SELECT section, all_certificates, year_of_experience, languages, programming_languages
                        from programmer where user_no = $user_no";
                        $edu_run = mysqli_query($connection, $edu);

                        if(mysqli_num_rows($edu_run) === 1) {
                            $row = mysqli_fetch_assoc($edu_run);

                    ?>
                    <h2>Education</h2>
                    <div class="section">
                        <label for="mobile-no">Section</label>
                        <input type="tel" name="section" id="section" value="<?php echo $row['section']; ?>">
                    </div>
                    <div class="certificates">
                        <label for="certificates">Certificates</label>
                        <input type="tel" name="certificates" id="certificates" 
                        value=
                        "<?php
                                echo $row['all_certificates'];
                            ?>
                        ">
                    </div>
                    <div class="experience">
                        <label for="experience">Experience</label>
                        <input type="tel" name="experience" id="experience" value="<?php echo $row['year_of_experience']; ?>">
                    </div>
                    <div class="languages">
                        <label for="languages">Languages</label>
                        <input type="tel" name="languages" id="languages" value="<?php echo $row['languages']; ?>">
                    </div>
                    <div class="programming_l">
                        <label for="programming_l">Programmin languages</label>
                        <input type="tel" name="programming_l" id="programming_l" value="<?php echo $row['programming_languages']; ?>">
                    </div>
                    <?php 
                        } 
                    ?>
                    <?php 
                        $bank = "SELECT * from users as u, bank_account_information as b where
                        u.user_no = b.user_no and
                        u.user_no = $user_no";
                        $bank_run = mysqli_query($connection, $bank);
                        if(mysqli_num_rows($bank_run) === 1) {
                            $bank_row = mysqli_fetch_assoc($bank_run);
                        
                    ?>
                    <h2>Bank accont informations</h2>
                    <div class="bank-name">
                        <label for="bank-name">Bank Name</label>
                        <input type="text" name="bank-name" id="bank-name" 
                        value="
                        <?php
                                        echo $bank_row['bank_name'];
                                ?>
                        ">
                    </div>
                    <div class="iban">
                        <label for="iban">IBAN(max 32)</label>
                        <input type="text" name="iban" id="iban"
                        value="
                        <?php
                                        echo $bank_row['iban'];
                                ?>
                        ">
                    </div>
                    <div class="account-name">
                        <label for="account-name">Account Name</label>
                        <input type="text" name="account-name" id="account-name"
                        value="
                        <?php
                                        echo $bank_row['account_name'];
                                ?>
                        ">
                    </div>
                    <div class="pi-submit">
                        <input type="submit" value="Save" name="save">
                        <input type="button" value="Back" id="back-button">
                    </div>
                    <?php
                        }
                        ?>
                </form>
            </div>
        </div>



        <!-- end personal information  -->
        
        <!-- start clients  -->
        <div class="container clients-section" style="margin-top: 25px;">

            <div class="clients">
            <?php 
                $date = date("y-m-d");
                $cdate = strtotime($date);
                $client1 = "SELECT * from users as u, project as p where
                u.user_no = p.client_no and
                programmer_no = $user_no order by finishing_date desc";
                $client1_run = mysqli_query($connection, $client1);
                if(mysqli_num_rows($client1_run) > 0){
                    while($rowC = mysqli_fetch_assoc($client1_run)){
                        
            ?>  
                <div class="client">
                    <i class="fa-solid fa-user"></i>
                    <table>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $rowC['user_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Project Type</th>
                            <td><?php echo $rowC['p_section']; ?></td>
                        </tr>
                        <tr>
                            <th>Project name</th>
                            <td><?php echo $rowC['project_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><?php echo $rowC['price']; ?></td>
                        </tr>
                        <tr>
                            <th>Starting Date</th>
                            <td><?php echo $rowC['starting_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Expiry Date</th>
                            <td><?php echo $rowC['finishing_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <?php
                                if(strtotime($rowC['finishing_date']) > $cdate){
                                    echo "Unfinished";
                                }
                                else{
                                    echo "<p style='color: red;'>Finished</p>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $rowC['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Social media</th>
                            <td>
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-facebook"></i>
                            </td>
                        </tr>
                    </table>
                    <div class="details" style="flex-direction: column; min-height: 50px; max-height: 150px; overflow-y: auto;">
                        <h5>Details</h5>
                        <p style="margin-top: 20px"><?php echo $rowC['description'];  ?></p>
                    </div>
                </div>
                <?php       
                                        }
                                    }else{
                                        echo "<p> There is not any client</p>"; 
                                    }
            ?>
            </div>
            

        </div>


        <!-- end clients  -->

        <!-- start footer  -->

        <!-- <footer>
            <div class="container">
                <i class="fa-solid fa-copyright"></i> Created By BSOFT TEAM 2022
            </div>
        </footer> -->

        <!-- end footer  -->

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

        <!-- start change password section  -->
        
        <div class="container change-password">
            <h3>Change Password</h3>
            <form action="changePassword.php" method="post">
                <input type="password" name="old-password" placeholder="Old Password" required>
                <input type="password" name="new-password" placeholder="New Password" required>
                <input type="password" name="newagain-password" placeholder="New Password Again" required>
                <input type="submit" name="space" value="Change">
            </form>
        </div>


        <!-- end change password section  -->






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
                    $(".error").click(function(){
                        $(this).hide();
                    })
                })

                $(document).ready(function(){
                    $(".message").click(function(){
                        $(".message-containt").hide();
                        $(".message-section").show();
                    });
                })

                // $(document).ready(function(){
                //     $(".bold").focus(function(){
                //         $(this).css("font-weight","normal");
                //     });
                // })
        </script>
    </body>
</html>
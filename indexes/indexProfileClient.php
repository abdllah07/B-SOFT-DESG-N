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
                    <a href="indexAfterLoginClient.php"><i class="fa-solid fa-house-chimney"></i></a>
                    <i class="fa-solid fa-bars" id="menu"></i>
                </div>
            </div>
        </header>
        <!-- end header  -->

        <!-- start hidden nav  -->
        <nav class="hidden">
            <ul>
                <li id="personal-information"><a href="#">Personal Information</a></li>
                <li id="my-projects"><a href="#">My Projects</a></li>
                <li id="my-Advertisement"><a href="#">My Advertisement</a></li>
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
                        Requests
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
                        <a href="messageContaintClient.php?message_no=<?php echo $row['message_no']; ?>">
                            <h5><?php echo $row['title']; ?></h5>
                            <p>
                                <?php echo $row['containt']; ?>
                            </p>
                        </a> 
                        </div>
                        <div class="date" style="width: 100px">
                            <p><?php echo $row['sending_date'] ?></p>
                        </div>      
                        <div class="trash" style="margin-left: 10px;">
                            <a href="messageDelete.php?message_no=<?php echo $row['message_no']; ?>"><i class="fa-solid fa-trash" style="font-size: 25px;"></i></a>
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
                        <a href="messageContaintClient.php?message_no=<?php echo $row['message_no']; ?>">
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
            <div class="messages private gprivete" style="display: none;">
                <?php
                    $user_no = $_SESSION['user_no'];
                    $gelen = "SELECT * FROM mailing as m,users as u where
                    m.sender_no = u.user_no and m.recipient_no = $user_no and m.is_fav = 1 order by m.sending_date desc";
                    $gelen_run = mysqli_query($connection, $gelen);
                    if(mysqli_num_rows($gelen_run) > 0){
                        while($row = mysqli_fetch_assoc($gelen_run)){
                            $_SESSION['message_no'] = $row['message_no'];
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
                        <a href="messageContaintClient.php?message_no=<?php echo $row['message_no']; ?>">
                            <h5><?php echo $row['title']; ?></h5>
                            <p>
                                <?php echo $row['containt']; ?>
                            </p>
                        </a>
                    </div>
                    <div class="date" style="width: 100px">
                        <p><?php echo $row['sending_date'] ?></p>
                    </div>
                    <div class="trash" style="margin-left: 10px;">
                        <a href="messageDelete.php?message_no=<?php echo $row['message_no']; ?>"><i class="fa-solid fa-trash" style="font-size: 25px;"></i></a>
                    </div>
                    <div class="who" style="margin-left: 10px;">
                        <a href="pdetails.php?message_no=<?php echo $row['message_no']; ?>" title="Sender Profile"><i class="fa-solid fa-user" style="font-size: 25px;"></i></a>
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
                <form action="pi-edit-client.php" method="post">
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
                    <h2>Bank accont informations</h2>
                    <?php 
                        $bank = "SELECT * from users as u, bank_account_information as b where
                        u.user_no = b.user_no and
                        u.user_no = $user_no";
                        $bank_run = mysqli_query($connection, $bank);
                        if(mysqli_num_rows($bank_run) === 1) {
                            $bank_row = mysqli_fetch_assoc($bank_run);
                        
                    ?>
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
                    <?php
                        }
                        ?>
                    <div class="pi-submit">
                        <input type="submit" value="Save" name="save">
                        <input type="button" value="Back" id="back-button">
                    </div>
                </form>
            </div>
        </div>



        <!-- end personal information  -->

        <!-- start my projects  -->

        <div class="container my-projects-section" id="project-table">
            <h1>My Projects</h1>

            <div class="containt" >
                <table >
                    <tr>
                        <th>NO</th>
                        <th>Name of Project</th>
                        <th>Programmer</th>
                        <th>Expiry Date</th>
                        <th>Suggested cost</th>
                        <th>Project Status</th>
                    </tr>
                    <?php
                        $user_no = $_SESSION['user_no'];
                        $date = date("y-m-d");
                        $cdate = strtotime($date);
                        
                        
                        $project = "SELECT * from users as u, project as p where
                        u.user_no = p.client_no and
                        u.user_no = $user_no";
                        $project_run = mysqli_query($connection, $project);

                        if(mysqli_num_rows($project_run) > 0){
                            while($row = mysqli_fetch_assoc($project_run)){
                                $p_no = $row['project_no'];
                                    $programmer = "SELECT * from users as u, project as p where 
                                    u.user_no = p.programmer_no and
                                    p.client_no = $user_no and
                                    project_no = $p_no";
                                    $programmer_run = mysqli_query($connection, $programmer);
                                    if(mysqli_num_rows($programmer_run) > 0){
                                        while($rowP = mysqli_fetch_assoc($programmer_run)){
                                            $programmer_name = $rowP['user_name'];
                                        }      
                                    }
                                $f = $row['finishing_date'];
                                $fdate = strtotime($f);

                    ?>
                    <tr>
                        <td><?php echo $row['project_no']; ?></td>
                        <td><?php echo $row['project_name']; ?></td>
                        <td><?php echo $programmer_name; ?></td>
                        <td><?php echo $f; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php
                            if(($fdate) < ($cdate)){
                                echo "finished";
                            }else{
                                echo "unfinished";
                            }
                        ?></td>
                    </tr>
                    <?php
                    }
                }
                ?>
                </table>
                
                <div class="buttons">
                    <button class="add-button">Add A Project</button>
                </div>
            </div>
        </div>

        <!-- end my project  -->

        <!-- start my projects  -->

        <div class="container my-advertisement-section" id="project-table">
            <h1>My Advertisement</h1>
            <div class="containt" >
                <table >
                    <tr>
                        <th>NO</th>
                        <th>Name of Project</th>
                        <th>Section</th>
                        <th>Date of publication</th>
                        <th>Period of project</th>
                        <th>Suggested cost</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $user_no = $_SESSION['user_no'];
                        $adv = "SELECT * from advertisement as a, client as c, users as u where
                        a.client_no = c.client_no and
                        c.user_no = u.user_no and
                        u.user_no = $user_no order by date_of_publication desc";
                        $adv_run = mysqli_query($connection, $adv);
                        if(mysqli_num_rows($adv_run) > 0){
                            while($rowA = mysqli_fetch_assoc($adv_run)){
                                $adv_no = $rowA['advertisement_no'];
                    ?>
                    <tr>
                        <td><?php echo $rowA['advertisement_no']; ?></td>
                        <td><?php echo $rowA['project_name']; ?></td>
                        <td><?php echo $rowA['a_section']; ?></td>
                        <td><?php echo $rowA['date_of_publication']; ?></td>
                        <td><?php echo $rowA['period_of_project']." weeks"; ?></td>
                        <td><?php echo $rowA['price']; ?></td>
                        <td><a href="adv_delete.php?adv_no=<?php echo $adv_no;?>" id="trash"><i class="fa-solid fa-trash" style="font-size: 25px;"></i></a></td>
                    </tr>
                    <?php
                    }
                }
                ?>
                </table>
            </div>
        </div>

        <!-- end my advertisement  -->

        <!-- start Add Project -->
        <div class="container add-project">
            <form action="newProject.php" method="post">
                <div class="advertisement-id">
                    <label for="advertisement-id">Advertisement Id</label>
                    <input type="text" name="advertisement-id" id="advertisement-id" required>
                </div>
                <div class="programmer-name">
                    <label for="programmer-name">Programmer user name</label>
                    <input type="text" name="programmer-name" id="programmer-name" required>
                </div>
                <div class="new-cost">
                    <label for="new-cost">new cost</label>
                    <input type="text" name="new-cost" id="new-cost" placeholder="$">
                </div>
                <div class="expiry-date">
                    <label for="expiry-date">New Period (weeks)</label>
                    <input type="number" name="expiry-date" id="expiry-date">     
                </div>
                <div class="changes">
                    <label for="changes">last upadets</label>
                    <textarea name="changes" id="changes" cols="40" rows="5"></textarea>
                </div>
                <div class="button">
                    <input type="button" name="hide" id="hide" value="Hide">
                    <input type="submit" value="Send" name="send">
                </div>
            </form>
        </div>


        <!-- end Add Project -->

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
                <form action="message-client.php" method="post">
                    <input type="text" name="to" id="to" placeholder="To">
                    <hr>
                    <input type="text" name="title" id="title" placeholder="Title">
                    <hr>
                    <textarea name="message-containt" id="message-containt" ></textarea>
                    <input type="submit" name="submit" id="submit" value="Send">
                </form>
            </div>
        </div>

        <!-- end new box  -->


        <!-- start change password section  -->
        
        <div class="container change-password">
            <h3>Change Password</h3>
            <form action="changePasswordClient.php" method="post">
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

                
        </script>
    </body>
</html>
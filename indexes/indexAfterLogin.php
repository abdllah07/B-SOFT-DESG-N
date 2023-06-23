<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSOFT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/1d754c5837.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&family=Work+Sans:ital,wght@0,200;0,300;0,500;0,700;1,200;1,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/afterlogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .notif {
            position: fixed;
            font-size: 14px;
            bottom: 40px;
            right: 20px;
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
                right: 20px;
                background-color: #eee;
                color: #B30404;
                border: 1px solid #B30404;
                padding: 10px 5px;
                border-radius: 5px;
                transition: .1s 2s;
                cursor: pointer;
                z-index: 500;
            }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.25);
        }

        ::-webkit-scrollbar-thumb {
            background-color: #19283f;
        }

        .right-side form .chexk {
            display: flex;
            width: 380px;
            padding: 10px 5px;
            justify-content: space-evenly;
        }

        .right-side form .chexk label {
            width: 100%;
        }
        .check-box {
            padding: 0 15px;
        }
    
        #filter {
            color: black;
            background-color: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
            width: 150px;
            border: 1px solid #ccc;
            border-radius: 10px;
            transition: 0.1s;
        }

        #filter:hover {
            background-color: #ddd;
        }

        #filter:focus {
            border-color: black;
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

    <!-- Start nav  -->
    <nav>
        <div class="navbar">
            <div class="logo">
                <img src="images/LogoMakr-8NoX9G.png" alt="" srcset="">
            </div>
            <div class="lists" >
                    <ul>
                    <li><a href="mailto: kah.imbkt@gmail.com">Contact</a></li>
                    <input type="text" placeholder="search here">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <a href="index.html">
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


    <!-- start section 1  -->
    <section class="projes">
        <div class="right-side">

            <form action="#" method="post">
                <div class="chexk">
                <label for="web">Web Programming</label>
                <div class="check-box">
                    <input type="checkbox" name="section[]" id="web" value="Web Programming">
                </div>
                </div>
                <div class="chexk">
                <label for="android">Android App</label>
                <div class="check-box">
                    <input type="checkbox" name="section[]" id="android" value="Android App">
                </div>
                </div>
                <div class="chexk">
                <label for="ios">IOS Applications</label>
                <div class="check-box">
                    <input type="checkbox" name="section[]" id="ios" value="IOS Applications">
                </div>
                </div>
                <div class="chexk">
                <label for="java">Java</label>
                <div class="check-box">
                    <input type="checkbox" name="section[]" id="java" value="Java">
                </div>
                </div>
                <div class="chexk">
                <label for="c">C / c++ / c#</label>
                <div class="check-box">
                    <input type="checkbox" name="section[]" id="c" value="C / c++ / c#">
                </div>
                </div>
                <div class="chexk">
                <label for="game">Game</label>
                <div class="check-box">
                    <input type="checkbox" name="section[]" id="game" value="Game">
                </div>
                </div>
                <div class="chexk">
                <label for="computer-application">Computer Applications</label>
                <div class="check-box">
                    <input type="checkbox" name="section[]" id="computer-application" value="Computer Applications">
                </div>
                </div>
                <div class="chexk">
                    <input type="submit" name="submit" value="Filtre" id="filter">
                    <form action="indexAfterLogin.php">
                        <input type="submit" name="all" value="All Projects" id="filter">
                    </form>
                </div>
            </form>
        </div>

        <!-- <div class="add">
            <a data-bs-toggle="modal" href="#proje" role="button">
            <h1>Add your project</h1>
            <i class="fas fa-plus"></i>
            </a>
        </div> -->

        <!-- start add alter -->
        <div class="modal fade" id="proje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="addProject.php" method="post">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name of project :</label>
                        <input type="text" class="form-control" id="recipient-name" name="project-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Proje tybe :</label>
                        <input type="text" class="form-control" id="recipient-name" name="project-type" required>
                    </div>
                    <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Price:</label>
                    <input type="text" class="form-control" id="recipient-name" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Project Period(weeks) :</label>
                        <input type="number" class="form-control" id="recipient-name" name="project-period" required>
                    </div>
                    <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Explaination:</label>
                            <textarea class = "form-control" rows = "3" name="explaination"></textarea>
                    </div>
                </div>
                <div class="modal-footer" method="post">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        <!-- end add alter -->

        <?php
        if(isset($_POST['section'])){
            $section = $_POST['section'];
            foreach($section as $key => $value) {
                $adv = "SELECT user_name, advertisement_no, project_name,
                a_section, date_of_publication, price, period_of_project,explaination
                from users as u, client as c, advertisement as a where
                u.user_no = c.user_no and c.client_no = a.client_no and 
                a_section = '$value' order by date_of_publication desc";
                $adv_run = mysqli_query($connection, $adv);

                if(mysqli_num_rows($adv_run) > 0){
                    while($row = mysqli_fetch_assoc($adv_run)) {
                        
    ?>
    <div class="left-side">
        <div class="box">
            <div class="header">
                <i class="fas fa-user"></i>
                <h2><?php echo $row['user_name']; ?></h2>
            </div>
            <div class="header">
                <i class="fa-solid fa-bars-progress"></i>
                <h4><?php echo $row['project_name'];  ?></h4>
            </div>
            <div class="header">
                <i class="fa-solid fa-id-card"></i>
                <h6>ID:  <?php  echo $row['advertisement_no'];  ?></h6>
            </div>
            <div class="header">
                <i class="fa-solid fa-section"></i>
                <h6><?php  echo $row['a_section'];  ?></h6>
            </div>

            <div class="date">
                <i class="fas fa-calendar"></i>
                <span> <?php  echo $row['date_of_publication'];?> </span>
            </div>
            <div class="date">
                <i class="fa-solid fa-clock"></i>
                <span> <?php echo $row['period_of_project']; ?> Weeks</span>
            </div>
            <div class="price">
                <i class="fas fa-money-check-alt"></i>
                <h6><?php echo $row['price'];  ?></h6>
            </div>
            
            <p> <?php echo $row['explaination'];  ?></p>
            
            <button>
                <a href="indexMessage.php?advertisement_no=<?php echo $row['advertisement_no']; ?>">
                    <i class="far fa-comment-alt"> Send Message</i>
                </a>
            </button>
    </div>
            
        
        
        
    
    

    <?php
            }
        }
    }
}

            else{
            $adv = "SELECT user_name, advertisement_no, project_name,
            a_section, date_of_publication, price, period_of_project,explaination
            from users as u, client as c, advertisement as a where
            u.user_no = c.user_no and c.client_no = a.client_no order by date_of_publication desc";
            
            $adv_run = mysqli_query($connection, $adv);

            if(mysqli_num_rows($adv_run) > 0){
                while($row = mysqli_fetch_assoc($adv_run)) {
        ?>
        <div class="left-side">
            <div class="box">
                <div class="header">
                    <i class="fas fa-user"></i>
                    <h2><?php echo $row['user_name']; ?></h2>
                </div>
                <div class="header">
                    <i class="fa-solid fa-bars-progress"></i>
                    <h4><?php echo $row['project_name'];  ?></h4>
                </div>
                <div class="header">
                    <i class="fa-solid fa-id-card"></i>
                    <h6>ID:  <?php  echo $row['advertisement_no'];  ?></h6>
                </div>
                <div class="header">
                    <i class="fa-solid fa-section"></i>
                    <h6><?php  echo $row['a_section'];  ?></h6>
                </div>

                <div class="date">
                    <i class="fas fa-calendar"></i>
                    <span> <?php  echo $row['date_of_publication'];?> </span>
                </div>
                <div class="date">
                    <i class="fa-solid fa-clock"></i>
                    <span> <?php echo $row['period_of_project']; ?> Weeks</span>
                </div>
                <div class="price">
                    <i class="fas fa-money-check-alt"></i>
                    <h6><?php echo $row['price'];  ?></h6>
                </div>
                
                <p> <?php echo $row['explaination'];  ?></p>
                
                <button>
                    <a href="indexMessage.php?advertisement_no=<?php echo $row['advertisement_no']; ?>">
                        <i class="far fa-comment-alt"> Send Message</i>
                    </a>
                </button>
        </div>

        <?php
                }
            }
        }
        ?>

    </section>

    <!-- end section 1  -->

    <!-- start next -->
    <section class="next">
    <a href="">1</a>
    <a href="">2</a>
    <a href="">3</a>
    <a href="">4</a>
    <a href="">5</a>
    </section>

    <!-- end next -->

    <!--start  modal  -->
    <?php
            $adv = "SELECT user_name, advertisement_no, project_name,
            a_section, date_of_publication, price, period_of_project,explaination
            from users as u, client as c, advertisement as a where
            u.user_no = c.user_no and c.client_no = a.client_no order by date_of_publication desc";
            
            $adv_run = mysqli_query($connection, $adv);

            if(mysqli_num_rows($adv_run) > 0){
            $row = mysqli_fetch_assoc($adv_run)
        
        ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">To</label>
                    <input type="text" class="form-control" id="recipient-name" value="<?php echo $row['user_name'];  ?>">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Message</label>
                        <textarea class = "form-control" rows = "3"></textarea>
                </div>
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <?php
            }
        ?>
    <!-- end modal -->

    <!-- Jquery cdn  -->
    <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer"
    >
    </script>

    <script>
        $(document).ready(function(){
            $(".notif").click(function(){
                $(this).hide();
            })
            $(".error").click(function(){
                $(this).hide();
            })
        })

    </script>

</body>
</html>
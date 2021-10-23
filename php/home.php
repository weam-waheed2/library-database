<!-- contact form -->
<?php

session_start();




if (isset($_POST["send"])) {

    // connection
    $connection = mysqli_connect('localhost', 'root', '', 'bookweb1');

    // data from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $statement = "INSERT INTO `emails`(`name` , `email` , `message`) VALUES('$name','$email','$message')";

    // execute
    mysqli_query($connection, $statement);

    // // result
    $error = mysqli_error($connection);
    if ($error) {
        header("location: home.php");
    } else {
        header("location: mailsent.php");
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>egy book</title>


    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/first.js"></script>


    <!-- font eng -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>




    <!-- navbar -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <div class="bg">
        <div class="rgba pb-5">
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-5 py-2">
                <a class="navbar-brand" href="#"> <span class="nav-text">egy</span> book</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="books.php">books</a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="search.php">search</a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link">
                                <i class="fas fa-user"></i> <?php echo $_SESSION["username"] ?? null ?>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="register.php"><i class="fas fa-user-alt mx-2"></i>register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signinAll.php"><i class="fas fa-sign-in-alt mx-2"></i>sign in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signout.php"><i class="fas fa-sign-out-alt mx-2"></i>sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- header -->
            <!-- /////////////////////////////////////////////////////////////////////// -->
            <div class="col-lg-12 text-center header py-5">
                <h4 class="pt-5 pb-3">welcome to</h4>
                <h1 class="text-header">egy book</h1>
                <h4 class="py-3">Endless resources and unlimited access free for all Egyptians</h4>
            </div>
        </div>
    </div>
    <!-- end header -->
    <!-- /////////////////////////////////////////////////////////////////////// -->





    <!-- sec1 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center py-3">
                <h2>about</h2>
                <hr style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0), #005a8f, rgba(0, 0, 0, 0));border: 0;height: 3px;width: 10rem">
            </div>

            <div class="col-lg-6 col-md-12 pt-5">
                <h3>about the egy books</h3>
                <p class="pb-4" style="color: gray;">The Egypt books is the world's largest digital library granting unlimited resources exclusively for Egyptians</p>

                <h5>SAGE Business Cases database</h5>
                <p class="pb-2" style="color: gray;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium commodi nam autem fuga debitis dolorum.</p>

                <h5>Library Reopens</h5>
                <p class="pb-2" style="color: gray;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium commodi nam autem fuga debitis dolorum.</p>

            </div>

            <div class="col-lg-6 col-md-12 text-center">
                <img src="../img/Bookshop-bro.png" width="80%">
            </div>

        </div>
    </div>
    <!-- end sec1 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->





    <!-- sec2 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>How Does It Work ?</h2>
                <hr style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0), #005a8f, rgba(0, 0, 0, 0));border: 0;height: 3px;width: 10rem">
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="text-center py-5">
                    <div class="icon pt-3">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h4 class="text-work1 pt-3">Collections</h4>
                    <p class="text-work2" style="color: gray;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat maxime
                        aspernatur cumque .</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="text-center py-5">
                    <div class="icon pt-3">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <h4 class="text-work1 pt-3">For University</h4>
                    <p class="text-work2" style="color: gray;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat maxime
                        aspernatur cumque .</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="text-center py-5">
                    <div class="icon pt-3">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4 class="text-work1 pt-3">For Students</h4>
                    <p class="text-work2" style="color: gray;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat maxime
                        aspernatur cumque .</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="text-center py-5">
                    <div class="icon pt-3">
                        <i class="fas fa-child"></i>
                    </div>
                    <h4 class="text-work1 pt-3">For children</h4>
                    <p class="text-work2" style="color: gray;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat maxime
                        aspernatur cumque .</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end sec2 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->








    <!-- sec3 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <div class="bg1">
        <div class="rgba1">
            <div class="container py-5 text-center">
                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <img src="../img/Bookshop-pana.png" width="60%">
                    </div>

                    <div class="col-lg-6 col-md-12 pt-5">
                        <h2 class="pt-4">A Platform For Innovation</h2>
                        <hr class="mb-5" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0), #006dac, rgba(0, 0, 0, 0));border: 0;height: 3px;width: 10rem">
                        <h5>Endless resources and unlimited access free for all Egyptians</h5>
                        <a href="register.php"><button class="btn btn-primary my-2">join now</button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end sec3 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->








    <!-- sec4 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 col-md-12 pt-4">
                <!-- <h2 class="pt-4 text-center justify-content-center">contact us</h2>
                <hr style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0), #005a8f, rgba(0, 0, 0, 0));border: 0;height: 3px;width: 10rem"> -->
                <form class="pt-2" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input id="name" required name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" required name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">your message</label>
                        <textarea class="form-control" name="message" required id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary my-5">Send Message</button>
                </form>
            </div>

            <div class="col-lg-6 col-md-12 text-center justify-content-center">
                <img src="../img/Contact us-amico.png" width="80%">
            </div>
        </div>
    </div>
    <!-- end sec4 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->








    <!-- footer -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <?php
    include("includes/templates/footer.php");

    ?>
    <!-- end footer -->
    <!-- /////////////////////////////////////////////////////////////////////// -->







</body>

</html>
<?php

session_start();

include("includes/templates/nav.php");



if (isset($_POST["btn-save"])) {

    // connection
    $connection = mysqli_connect('localhost', 'root', '', 'bookweb1');

    // data from form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gander = $_POST['gander'];


    $statement = "INSERT INTO `users`(`username` , `email` , `pass` , `phone` , `address` ,`gander`) VALUES('$username','$email','$pass','$phone','$address','$gander')";

    // execute
    mysqli_query($connection, $statement);

    // // result
    $error = mysqli_error($connection);
    if ($error) {
        echo "Not registered , try again";
    } else {
        header("location: signinAll.php");
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
    <link rel="stylesheet" href="../css/register.css">

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




    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6">


                <div class="row">
                    <div class="col text-center title py-5">
                        <h2>Register with egy book now</h2>
                    </div>
                </div>


                <form method="POST">
                    <div class="row align-items-center">
                        <div class="col mt-4 d-flex">
                            <label for="exampleInputEmail1" class="icon mx-3"><i class="fas fa-user py-2"></i></label>
                            <input name="username" required type="text" class="form-control" placeholder="UserName">
                        </div>
                    </div>


                    <div class="row align-items-center mt-4">
                        <div class="col d-flex">
                            <label for="exampleInputEmail1" class="icon mx-3"><i class="fas fa-envelope py-2"></i></label>
                            <input name="email" required type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>


                    <div class="row align-items-center mt-4">
                        <div class="col d-flex">
                            <label for="exampleInputEmail1" class="icon mx-3"><i class="fas fa-phone py-2"></i></label>
                            <input name="phone" type="text" class="form-control" placeholder="Contact number">
                        </div>
                    </div>


                    <div class="row align-items-center mt-4">
                        <div class="col d-flex">
                            <label for="exampleInputEmail1" class="icon mx-3"><i class="fas fa-house-user py-2"></i></label>
                            <input name="address" type="text" class="form-control" placeholder="Address">
                        </div>
                    </div>

                    <div class="form-check form-check-inline mt-4">
                        <input class="form-check-input" type="radio" name="gander" id="inlineRadio1" value="male">
                        <label class="form-check-label" for="inlineRadio1">male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gander" id="inlineRadio2" value="female">
                        <label class="form-check-label" for="inlineRadio2">female</label>
                    </div>


                    <div class="row align-items-center mt-4">
                        <div class="col d-flex">
                            <label for="exampleInputEmail1" class="icon mx-3"><i class="fas fa-unlock-alt py-2"></i></label>
                            <input name="pass" required type="password" class="form-control" placeholder="Password">
                        </div>
                    </div>


                    <div class="row justify-content-start mt-4">
                        <div class="col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" required>
                                    I have agree and read the <a target="_blank" href="condition.php">Terms and Conditions.</a>
                                </label>
                            </div>

                            <button name="btn-save" type="submit" class="btn btn-primary my-5 mt-4">Register</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
    </div>
    </section>




    <!-- footer -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <?php
    include("includes/templates/footer.php");
    ?>
    <!-- end footer -->
    <!-- /////////////////////////////////////////////////////////////////////// -->




</body>

</html>
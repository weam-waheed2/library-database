<?php

session_start();


if (isset($_SESSION['admin'])) {
    header("location:dashboard.php");
}


include("includes/templates/nav.php");

include("includes/db/db.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["btn-save"])) {
        

        // 1 data from form
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $hashedPass = sha1($pass);


        // 2 check if there is user has data like that
        $check = $connection->prepare(query: 'SELECT*FROM users WHERE username=? and pass=?');
        $check->execute(array($username, $pass));
        $chechRow = $check->rowCount();


        // check if is role is admin or not
        if ($chechRow > 0) {

            $fetchData = $check->fetch();
            if ($fetchData['role' == 'admin']) {
                $_SESSION['admin'] = $fetchData['username'];
                header('refresh:2;url=dashboard.php');
            }
        }

    }
    
}


?>








<!-- html code sign in -->
<!-- /////////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>egy book</title>


    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="css/signin.css">

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
        <div class="row justify-content-center text-center py-5">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6">


                <div class="row">
                    <div class="col text-center title">
                        <h2>sign in again to enter dashboard</h2>
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
                            <label for="exampleInputEmail1" class="icon mx-3"><i class="fas fa-unlock-alt py-2"></i></label>
                            <input name="pass" required type="password" class="form-control" placeholder="Password">
                        </div>
                    </div>


                    <div class="row justify-content-start mt-4 my-5">
                        <div class="col">
                            <button name="btn-save" type="submit" class="btn btn-primary mt-4">Sign in</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
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
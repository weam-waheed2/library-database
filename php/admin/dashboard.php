<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/first.js"></script>
</head>

<body>
</body>

</html>


<?php


session_start();

include("includes/db/db.php");


if (isset($_SESSION['admin'])) {

    include("includes/templates/nav.php");


    $q1=$connection->prepare('SELECT*FROM users');
    $q1->execute();
    $users=$q1->rowCount();

    $q2=$connection->prepare('SELECT*FROM books');
    $q2->execute();
    $books=$q2->rowCount();

    $q3=$connection->prepare('SELECT*FROM emails');
    $q3->execute();
    $emails=$q3->rowCount();


?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
    </head>

    <body>



        <div class="container py-5">
            <div class="row">

                <div class="col-lg-4 col-md-12 text-center justify-content-between py-3">
                    <div class="py-5 bg-dash">
                        <i class="fas fa-users pt-3"></i>
                        <h5 class="pt-3"><?php echo $users?> users</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 text-center justify-content-center py-3">
                    <div class="py-5 bg-dash">
                        <i class="fas fa-book-open pt-3"></i>
                        <h5 class="pt-3"><?php echo $books?> books</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 text-center justify-content-center py-3">
                    <div class="py-5 bg-dash">
                        <i class="fas fa-comments pt-3"></i>
                        <h5 class="pt-3"><?php echo $emails?> comments</h5>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

            </div>

        </div>
    </body>

    </html>



<?php

    include("includes/templates/footer.php");
} else {
    echo '
    <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-5">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> You Are Not Authenticated !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
    </div>
    ';

    header("refresh:3;url=signin.php");
}



?>
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

// db
include("includes/db/db.php");

if (isset($_SESSION['admin'])) {

    // navbar
    include("includes/templates/nav.php");

    // show all users in data 
    $stmt = $connection->prepare("SELECT*FROM books");
    $stmt->execute();
    $allBooks = $stmt->fetchAll();
    $countBook = $stmt->rowCount();


?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>


        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-12 text-center py-5">
                    <h3>books management <span class="badge bg-secondary" style="color: white;"> <?php echo $countBook ?></span></h3>
                </div>



                <!-- add book -->
                <div class="col-lg-12 text-center pb-5">
                    <a href="addbook.php" class="btn btn-primary">add new book</a>
                </div>




                <!-- show books -->
                <?php
                if ($countBook > 0) {
                    foreach ($allBooks as $book) {
                ?>
                        <div class="col-lg-3 py-3">
                            <div class="card">
                                <img src="../../img/books/—Pngtree—book cover template vector realistic_5205411.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title"><?php echo $book['booktitle'] ?> ( <?php echo $book['id'] ?> ) </h6>
                                    <p class="card-text"><?php echo $book['author'] ?></p>
                                    <p class="card-text" style="color: gray;"><?php echo $book['edition'] ?></p>
                                    <a href="editbook.php?id=<?= $book['id'] ?>" class="btn btn-primary">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a title="delete" class="btn btn-danger" href="addbook.php?id=<?= $book['id'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>


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

    header("refresh:3;url=../signin.php");
}

?>
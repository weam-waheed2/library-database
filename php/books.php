<?php

session_start();

include("includes/templates/nav.php");


// PDO db connection
$dsn = 'mysql:host=localhost;dbname=bookweb1';
$user = 'root';
$password = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);


try {
    $connection = new PDO($dsn, $user, $password, $option);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'failed to connect' . $e->getMessage();
}




// show all books in data 
$stmt = $connection->prepare("SELECT*FROM books");
$stmt->execute();
$allBooks = $stmt->fetchAll();
$countBook = $stmt->rowCount();





?>


<!DOCTYPE html>
<html lang="en">

<head>

<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/nav.css">

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/first.js"></script>
</head>

<body>













    <!-- sec1 -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <div class="container py-5">
        <div class="row">

            <?php
            if ($countBook > 0) {
                foreach ($allBooks as $book) {
            ?>
                    <div class="col-lg-3 py-3">
                        <div class="card">
                            <img src="includes/img/—Pngtree—book cover template vector realistic_5205411.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $book['booktitle'] ?> ( <?php echo $book['id'] ?> ) </h6>
                                <p class="card-text"><?php echo $book['author'] ?></p>
                                <p class="card-text" style="color: gray;"><?php echo $book['edition'] ?></p>
                                <a href="#" class="btn btn-primary">read</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- end sec1 -->
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
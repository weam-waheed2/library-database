<?php

session_start();

include("includes/templates/nav.php");

?>

<html>

<head>

</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center py-5">
                <form name="frmSearch" method="POST" class="d-flex">
                    <input name="var1" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary mx-2" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>




    <?php
    $nameofdb = 'bookweb1';
    $dbusername = 'root';
    $dbpassword = '';



    // Connect to MySQL via PDO
    $dbh = new PDO("mysql:dbname=$nameofdb;host=localhost", $dbusername, $dbpassword);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $var1 = $_POST["var1"]?? null;

    $query = "SELECT * FROM books WHERE booktitle LIKE :search OR author LIKE :search OR edition LIKE :search";
    $stmt = $dbh->prepare($query);
    $stmt->bindValue(':search', '%' . $var1 . '%',);
    $stmt->execute();


    $result = $stmt->fetchAll();


    ?>


    <div class="container">
        <div class="row">


            <?php
            if ($result) {
                foreach ($result as $book) {
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

    <!-- footer -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <?php
    include("includes/templates/footer.php");
    ?>
    <!-- end footer -->
    <!-- /////////////////////////////////////////////////////////////////////// -->





</body>

</html>
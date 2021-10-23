<?php
session_start();

// include('includes/db/db.php');
include("includes/templates/nav.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookweb1";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username,
        $password);
// set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// prepare sql and bind parameters
    $stmt = $connection->prepare("INSERT INTO books (booktitle, author, 
edition) 
VALUES (:booktitle, :author, :edition)");
    $stmt->bindParam(':booktitle', $booktitle);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':edition', $edition);

// insert a row
    $booktitle = $_POST["booktitle"] ?? null ;
    $author = $_POST["author"] ?? null;
    $edition = $_POST["edition"] ?? null;
    $stmt->execute();


    echo "New book created successfully";
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$connection = null;
?>







<!-- add -->
<!-- ///////////////////////////////////////////////////////////////////// -->
<div class="container pb-5">
    <div class="row">

        <div class="col-lg-12 text-center py-5">
            <h2>add book</h2>
        </div>
        <div class="col-lg-3 text-center py-5">
            <div class="card">
                <img src="../../img/books/—Pngtree—book cover template vector realistic_5205411.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <form method="post">

                        <label for="exampleInputEmail1" class="icon mx-3 pt-3">booktitle</label>
                        <input class="form-control" type="text" name="booktitle" placeholder="booktitle" value="booktitle">

                        <label for="exampleInputEmail1" class="icon mx-3 pt-3">author</label>
                        <input class="form-control" type="text" name="author" placeholder="author" value="author">

                        <label for="exampleInputEmail1" class="icon mx-3 pt-3">edition</label>
                        <input class="form-control" type="text" name="edition" placeholder="edition" value="edition">

                        <input class="btn btn-primary my-3" type="submit" value="Add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end add -->
<!-- ///////////////////////////////////////////////////////////////////// -->








<!-- footer -->
<!-- ///////////////////////////////////////////////////////////////////// -->
<?php include('includes/templates/footer.php'); ?>
<!-- end footer -->
<!-- ///////////////////////////////////////////////////////////////////// -->
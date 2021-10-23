<?php 
session_start();

  include('includes/db/db.php');
  include("includes/templates/nav.php");
?>


<?php

$msg = '';
// Check if the books id exists, for example update.php?id=1 will get the books with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $booktitle = isset($_POST['booktitle']) ? $_POST['booktitle'] : '';
        $author = isset($_POST['author']) ? $_POST['author'] : '';
        $edition = isset($_POST['edition']) ? $_POST['edition'] : '';
        
        // Update the record
        $stmt = $connection->prepare('UPDATE books SET id = ?, booktitle = ?, author = ?, edition = ? WHERE id = ?');
        $stmt->execute([$id, $booktitle, $author, $edition ,$_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the books from the books table
    $stmt = $connection->prepare('SELECT * FROM books WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$book) {
        exit('books doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}

?>


<div class="container pb-5">
    <div class="row">

    <div class="col-lg-12 text-center py-5">
    <h2>Update book #<?=$book['id']?></h2>
    </div>
        <div class="col-lg-3 text-center py-5">
            <div class="card">
                <img src="../../img/books/—Pngtree—book cover template vector realistic_5205411.png" class="card-img-top" alt="...">
                    <div class="card-body">
                    <form action="editbook.php?id=<?=$book['id']?>" method="post">
                    
                    <label for="exampleInputEmail1" class="icon mx-3">id</label>
                    <input class="form-control" type="text" name="id" placeholder="id" value="<?=$book['id']?>" id="id"> 
                    
                    <label for="exampleInputEmail1" class="icon mx-3 pt-3">booktitle</label>
                        <input class="form-control" type="text" name="booktitle" placeholder="booktitle" value="<?=$book['booktitle']?>" id="id"> 

                    <label for="exampleInputEmail1" class="icon mx-3 pt-3">author</label>
                        <input class="form-control" type="text" name="author" placeholder="author" value="<?=$book['author']?>" id="id"> 
                        
                    <label for="exampleInputEmail1" class="icon mx-3 pt-3">edition</label>
                        <input class="form-control" type="text" name="edition" placeholder="edition" value="<?=$book['edition']?>" id="id"> 
                    
                        <input class="btn btn-primary my-3" type="submit" value="Edit">
                    </form>
<?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
                    </div>
             </div>
        </div>
    </div>
</div>






<?php include('includes/templates/footer.php'); ?>
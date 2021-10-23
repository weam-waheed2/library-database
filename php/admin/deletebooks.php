<?php
session_start();

include('includes/db/db.php');
include("includes/templates/nav.php");
?>

<?php

$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $connection->prepare('SELECT * FROM books WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$book) {
        exit('book doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $connection->prepare('DELETE FROM book WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the book!';
            header('location:dashboard.php');
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: books.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}


?>







<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="content delete text-center py-5" style="background-color: ghostwhite;border-radius: 5px;">
                <h2>Delete book #<?= $book['id'] ?></h2>
                <?php if ($msg) : ?>
                    <p><?= $msg ?></p>
                <?php else : ?>
                    <p>Are you sure you want to delete contact #<?= $book['id'] ?>?</p>
                    <div class="yesno">
                        <a class="btn btn-primary" href="deletebooks.php?id=<?= $book['id'] ?>&confirm=yes">Yes</a>
                        <a class="btn btn-danger" href="deletebooks.php?id=<?= $book['id'] ?>&confirm=no">No</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>




<?php include('includes/templates/footer.php'); ?>
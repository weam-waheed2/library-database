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
    $stmt = $connection->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit('Contact doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $connection->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the contact!';
            header('location:dashboard.php');
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: users.php');
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
                <h2>Delete Contact #<?= $user['id'] ?></h2>
                <?php if ($msg) : ?>
                    <p><?= $msg ?></p>
                <?php else : ?>
                    <p>Are you sure you want to delete contact #<?= $user['id'] ?>?</p>
                    <div class="yesno">
                        <a class="btn btn-primary" href="delete.php?id=<?= $user['id'] ?>&confirm=yes">Yes</a>
                        <a class="btn btn-danger" href="delete.php?id=<?= $user['id'] ?>&confirm=no">No</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>




<?php include('includes/templates/footer.php'); ?>
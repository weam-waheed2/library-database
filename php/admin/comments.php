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

    $stmt = $connection->prepare("SELECT*FROM emails");
    $stmt->execute();
    $allMsg = $stmt->fetchAll();
    $countMsg = $stmt->rowCount();

?>






    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>


        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center py-5">
                    <h3>users management <span class="badge bg-secondary" style="color: white;"><?php echo $countMsg ?></span></h3>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <table class="table table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th class="px-5" scope="col">id</th>
                                    <th class="px-5" scope="col">name</th>
                                    <th class="px-5" scope="col">email</th>
                                    <th class="px-5" scope="col">message</th>
                                    <th class="px-5" scope="col"></th>
                                    <th class="px-5" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if ($countMsg > 0) {
                                    foreach ($allMsg as $email) {
                                ?>

                                        <tr>
                                            <th class="px-5" scope="row"><?php echo $email['id'] ?></th>
                                            <td class="px-5"><?php echo $email['name'] ?></td>
                                            <td class="px-5"><?php echo $email['email'] ?></td>
                                            <td class="px-5"><?php echo $email['message'] ?></td>

                                            <td class="px-2">
                                                <a title="delete" class="btn btn-danger" href="deletemail.php?id=<?= $email['id'] ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
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

    header("refresh:3;url=../signin.php");
}

?>
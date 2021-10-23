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


    // change pages dinamic
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'All';
    }




    // show all users in data 
    $stmt = $connection->prepare("SELECT*FROM users");
    $stmt->execute();
    $allUsers = $stmt->fetchAll();
    $countUsers = $stmt->rowCount();



?>





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="../../css/register.css">

    </head>

    <body>


        <div class="container pb-5">
            <div class="row">

                <?php if ($page == 'All') { ?>

                    <div class="col-lg-12 text-center py-5">
                        <h3>users management <span class="badge bg-secondary" style="color: white;"><?php echo $countUsers ?></span></h3>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th class="px-5" scope="col">id</th>
                                        <th class="px-5" scope="col">username</th>
                                        <th scope="col">email</th>
                                        <th class="px-5" scope="col">phone number</th>
                                        <th scope="col">address</th>
                                        <th scope="col">role</th>
                                        <th scope="col">gender</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    if ($countUsers > 0) {
                                        foreach ($allUsers as $user) {
                                    ?>

                                            <tr>
                                                <th class="px-5" scope="row"><?php echo $user['id'] ?></th>
                                                <td class="px-5"><?php echo $user['username'] ?></td>
                                                <td><?php echo $user['email'] ?></td>
                                                <td class="px-5"><?php echo $user['phone'] ?></td>
                                                <td><?php echo $user['address'] ?></td>
                                                <td><?php echo $user['role'] ?></td>
                                                <td><?php echo $user['gander'] ?></td>

                                                <td class="px-2">
                                                    <a title="delete" class="btn btn-danger" href="delete.php?id=<?= $user['id'] ?>">
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
                }
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
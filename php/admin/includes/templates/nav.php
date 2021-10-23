<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>egy book</title>


    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/nav.css">

    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/first.js"></script>


    <!-- font eng -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&display=swap" rel="stylesheet">


    <style>
        .navbar-nav .dropdown-menu a {
            color: black !important;
        }

        .navbar-nav .dropdown-menu a:hover {
            color: white !important;
        }
    </style>

</head>

<body>




    <!-- navbar -->
    <!-- /////////////////////////////////////////////////////////////////////// -->
    <div class="bg">
        <div class="rgba">
            <nav class="navbar navbar-expand-lg navbar-dark px-5 py-2 mx-5">
                <a class="navbar-brand" href="dashboard.php"> dashboard </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="users.php">users <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="books.php">books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="comments.php">comments</a>
                        </li>

                        <li class="nav-item dropdown mr-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> <?php echo $_SESSION["username"] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item drop-a" href="signout.php">log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- end navbar -->
    <!-- /////////////////////////////////////////////////////////////////////// -->




</body>

</html>
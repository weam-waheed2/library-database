<?php


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
?>


























// ////////////////////////////////////////////////////////////mysqli db connection

// if (isset($_POST["admin-login"])) {

//     // connection
//     $connection = mysqli_connect('localhost', 'root', '', 'bookweb1');

//     // data from form
//     $username = $_POST['username'];
//     $pass = $_POST['pass'];


//     $statement = "INSERT INTO `users`(`username` , `pass`) VALUES('$username','$pass')";

//     // execute
//     mysqli_query($connection, $statement);

//     // // result
//     $error = mysqli_error($connection);
//     if ($error) {
//         echo "Not registered , try again";
//     } else {
//         header("location: home.php");
//     }
// }

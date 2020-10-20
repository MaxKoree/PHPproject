<?php
// initialize the session
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
}
?>

<html>
    <head>
        <title>Welcome htmlentities(<?php $_SESSION['username'] ?>)!</title>
    </head>
    <body>
        test
    </body>
</html>
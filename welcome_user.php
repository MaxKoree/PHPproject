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
        <title>Welcome!</title>
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="welcome_user.php">Home</a>
            <a href="new_user.php">Add user</a>
            <a href="edit_delete.php">Edit and/or Delete users</a>
            <a href="logout.php">Logout</a>
        </div>
        <?php echo "Welcome " . htmlentities( $_SESSION['username']) ."!" ?>
        
    </body>
</html>
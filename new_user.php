<?php
// initialize the session
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
}



//https://www.allphptricks.com/insert-view-edit-and-delete-record-from-database-using-php-and-mysqli/



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
        <form action="new_user.php" method="POST">
            <input type="text" name="fname" placeholder="Voornaam" value="<?php echo isset($_POST["fname"]) ? htmlentities($_POST["fname"]) : ''; ?>" required /><br>
            <input type="text" name="mname" placeholder="Tussenvoegsel" value="<?php echo isset($_POST["mname"]) ? htmlentities($_POST["mname"]) : ''; ?>"/><br>
            <input type="text" name="lname" placeholder="Achternaam" value="<?php echo isset($_POST["lname"]) ? htmlentities($_POST["lname"]) : ''; ?>" required /><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST["email"]) ? htmlentities($_POST["email"]) : ''; ?>" required /><br>
            <input type="text" name="uname" placeholder="Gebruikersnaam" value="<?php echo isset($_POST["uname"]) ? htmlentities($_POST["uname"]) : ''; ?>" required /><br>
            <input type="password" name="pwd" placeholder="Wachtwoord" required /><br>
            <input type="password" name="cpwd" placeholder="Herhaal wachtwoord" required /><br>
            <span><?php echo ((isset($pwdError) && $pwdError != '') ? htmlentities($pwdError) ." <br>" : '')?></span>
            <input type="submit" name="submit" value="Sign up!"/>
        </form>
        
    </body>
</html>
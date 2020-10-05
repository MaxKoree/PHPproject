<?php

include "Database.php";

$db = new Database("localhost", "root", "", "project1", "utf8");


//$voornaam = $_POST['voornaam'];
//$tussenvoegsel = $_POST['achternaam'];
//$email = $_POST['email'];
//$username = $_POST['username'];

$id = null;

if (isset($_POST["password"]) && isset($_POST["repeatPassword"]))
{

    $password = $_POST['password'];
    $email = $_POST['repeatPassword'];
    $db->insertAccount($email, $password);
    echo $password;
    echo $email;
}
else
{
    $user = null;
}



?>



<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="post" action="signup.php" name="signup-form">
    <div class="form-element">
        <label>Voornaam (verplicht)</label>
        <input type="text" name="voornaam" pattern="[a-zA-Z0-9]+" required/>
    </div>
    <div class="form-element">
        <label>Tussenvoegsel (optioneel)</label>
        <input type="text" name="tussenvoegsel"/>
    </div>
    <div class="form-element">
        <label>Achternaam (verplicht)</label>
        <input type="text" name="achternaam" required/>
    </div>
    <div class="form-element">
        <label>E-mail (verplicht)</label>
        <input type="email" name="email" required/>
    </div>
    <div class="form-element">
        <label>gebruikersnaam(verplicht)</label>
        <input type="text" name="username" required/>
    </div>
    <div class="form-element">
        <label>wachtwoord (verplicht)</label>
        <input type="password" name="password" required/>
    </div>
    <div class="form-element">
        <label>Herhaal wachtwoord (verplicht)</label>
        <input type="repeat password" name="repeatPassword" required/>
    </div>
    <button type="submit" name="register" value="register">Aanmelden</button>
</form>
</body>
</html>

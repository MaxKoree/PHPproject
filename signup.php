<?php

include "Database.php";


$id = null;

$fieldNames = array("voornaam", "achternaam", "email","username","password");

$error = false;

foreach ($fieldNames as $fieldName) {
    if(!isset($_POST["$fieldName"]) || empty($_POST["$fieldName"])) {
        $error = true;
    }
}

if (!$error) {
    $db = new Database("localhost", "root", "", "project1", "utf8");

    $password = $_POST['password'];
    $achternaam = $_POST['achternaam'];
    $voornaam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['achternaam'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $db->insertAccount($voornaam, $tussenvoegsel, $achternaam, $email, $username, $password);
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

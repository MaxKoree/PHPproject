<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="post" action="" name="signup-form">
    <div class="form-element">
        <label>Gebruikersnaam</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Wachtwoord</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="register" value="register">login</button>
    <a href="./signup.php">Account aanmaken</a>
    <a href="./lostpsw.php">Wachtwoord vergeten</a>
</form>
</body>
</html>
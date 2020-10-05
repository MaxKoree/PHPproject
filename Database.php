<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $charset;
    private $db;

    public function __construct($host, $username, $password, $database, $charset)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;

        try {
            $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
            $this->db = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            exit("an error occurred");
        }
    }

    public function insertAccount($voornaam, $tussenvoegsel, $achternaam, $email, $username, $password)
    {
        try {
            $this->db->beginTransaction();

            $pdo1 = "INSERT INTO account AND persoon (voornaam, tussenvoegsel, achternaam, email, username, password) 
                VALUES ('$voornaam', '$tussenvoegsel', '$achternaam', '$email', '$username', '$password')";
            $stmt = $this->db->prepare($pdo1);
            print_r($pdo1);
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt->execute(['voornaam' => $voornaam, 'tussenvoegsel' => $tussenvoegsel, 'achternaam' => $achternaam,
                'email' => $email, 'username' => $username, 'password' => $hashPassword]);

            $this->db->commit();

        } catch (Exception $a) {
            $this->db->rollBack();
            throw $a;
        }
    }
}
?>

}


<?php
class database
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
            // DSN connection method
            /*
            - mysql driver
            - host(loclhost/127.0.0.1)
            - database (schema) name
            - charset
            */
            $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
            $this->db = new PDO($dsn, $this->username, $this->password);
            echo "Database connection successfully established";


            //$this->connect = new PDO(mysql:host=this->host;dbname=..",this->username,..")
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit("an error occurred");
        }


    }


    public function insertAccount($voornaam, $tussenvoegsel, $achternaam, $email, $username, $password)
    {
        // prepared statements =
        // only proper way to run a query when a variable is used.
        // use a placeholder when using variables. two functions needed:
        /*
        prepare() -> returns PDOStatement object without data being attached to it.
        execute() -> will be able to get resulting data of statement (if applicable)
        */

        try {
            $this->db->beginTransaction();
            echo "1. transacion begon";

            $pdo1 = "INSERT INTO account AND persoon (voornaam, tussenvoegsel, achternaam, email, username, password) 
                VALUES ('$voornaam', '$tussenvoegsel', '$achternaam', '$email', '$username', '$password')";
            $stmt = $this->db->prepare($pdo1);
            print_r($pdo1);

            $stmtExecute = $stmt->execute(['voornaam'=>$voornaam, 'tussenvoegsel'=>$tussenvoegsel, 'achternaam'=>$achternaam,
                'email'=>$email, 'username'=>$username, 'password'=>$password]);

            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute(['email'=>$email, 'password'=>$hashPassword]);

            $lastId = $this->db->lastInsertId();
            $this->db->commit();

        } catch (Exception $a) {
            $this->db->rollBack();
            throw $a;
        }

//
//        $sql = 'SELECT * FROM account WHERE email=$email AND statement =$statement ';
//        $statement = $this->db->prepare($sql);
//        $statement->execute([$email, $statement]);
//        $statement->fetch();
//
//
//        $sql = 'SELECT * FROM account WHERE email=:email AND status=:status';
//        $statement = $this->db->prepare($sql);
//        $statement->execute(['email' => $email, 'status' => $statement]);
//        $statement->fetch();
    }
}
?>

}
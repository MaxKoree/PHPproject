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


    public function executeQueryExample()
    {
        // prepared statements =
        // only proper way to run a query when a variable is used.
        // use a placeholder when using variables. two functions needed:
        /*
        prepare() -> returns PDOStatement object without data being attached to it.
        execute() -> will be able to get resulting data of statement (if applicable)



        */
        //prepared statements are usefull agianst sql injections.
        $sql = "select * FROM account WHERE email=$email AND status=$status";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $statement->fetch();


        $sql = 'SELECT * FROM account WHERE email=? AND status=?';
        $statement = $this->db->prepare($query);
        $statement->execute([$email, $status]);
        $statement->fetch();


        $sql = 'SELECT * FROM account WHERE email=:email AND status=:status';
        $statement = $this->db->prepare($query);
        $statement->execute(['email' => $email, 'status' => $status]);
        $statement->fetch();
    }
}
?>
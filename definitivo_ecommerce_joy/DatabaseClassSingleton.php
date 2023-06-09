<?php

function writeLog($msg)
{
    $file = fopen("log.txt", "a");
    fwrite($file, $msg . "\n");
    fclose($file);
}



class DatabaseClassSingleton
{
    //https://gist.github.com/jonashansen229/4534794
    //https://devjunky.com/Creating-a-MySqli-Database-Class-in-PHP/

    private $_connection;
    private static $_instance; //The single instance
    private $dbhost = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "e-commercegb";


    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Constructor
    private function __construct()
    {
        try {
            $this->_connection = new mysqli($this->dbhost, $this->username, $this->password, $this->dbname);
            echo "<b>Connection created!</br></b>";
            writeLog("Connection created");
            // Error handling
            if (mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            if (mysqli_connect_error()) {
                echo "Failed to conencto to MySQL: " . mysqli_connect_error() . E_USER_ERROR;
            }
        }
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone()
    {
    }

    // Get mysqli connection
    public function getConnection()
    {
        return $this->_connection;
    }


    // Insert a row/s in a Database Table
    public function Insert($query = "", $params = [])
    {
        try {

            $stmt = $this->executeStatement($query, $params);
            $stmt->close();

            return $this->_connection->insert_id;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    // Select a row/s in a Database Table
    public function Select($query = "", $params = [])
    {
        try {

            $stmt = $this->executeStatement($query, $params);

            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); //restituisce array
            $stmt->close();

            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    // Update a row/s in a Database Table
    public function Update($query = "", $params = [])
    {
        try {

            $this->executeStatement($query, $params)->close();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    // Remove a row/s in a Database Table
    public function Remove($query = "", $params = [])
    {
        try {

            $this->executeStatement($query, $params)->close();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    // execute statement
    private function executeStatement($query = "", $params = [])
    {

        try {

            $stmt = $this->_connection->prepare($query);

            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            if ($params) {
                call_user_func_array(array($stmt, 'bind_param'), $params);
            }

            $stmt->execute();

            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function VerificaConn()
    {
        // Verifica la connessione
        if (!$this->_connection) {
            die("Connessione al database fallita: " . mysqli_connect_error());
        }

        // Inizializza la variabile $stmt
        $stmt = mysqli_prepare($this->_connection, "SELECT * FROM my_table WHERE id = ?");

        // Verifica se la preparazione della query è andata a buon fine
        if (!$stmt) {
            die("Errore nella preparazione della query: " . mysqli_error($this->_connection));
        }
        else return $stmt;
    }
}

//$db = new DatabaseClassSingleton("5a_ecommerce","5a_ecommerce", "root","");
//$result = DatabaseClassSingleton::getInstance()->Select("Select * from prodotti");
//$result = DatabaseClassSingleton::getInstance()->Select("Select * from prodotti");
//$result = DatabaseClassSingleton::getInstance()->Select("Select * from prodotti");


//$result = $db->Select("Select * from TableName where id = ?",["i",$x]);

//foreach ($result as $row) {
  //  echo $row["id"] . $row["nome"] . $row["prezzo"] . "</br>";
//}
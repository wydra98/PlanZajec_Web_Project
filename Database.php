<?php


class Database {
    private $host;
    private $dbname;
    private $username;
    private $password;
    
    public function __construct(){
        $this->host = "localhost";
        $this->dbname="timetable";
        $this->username ="root";
        $this->password = "";
    }

    public function connect(){
        try {
            $conn = new PDO(
            "mysql:host=$this->host;dbname=$this->dbname", $this->username,$this->password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>
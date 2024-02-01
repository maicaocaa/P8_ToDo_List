<?php

namespace Database; 

class DatabaseConnection{
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;

    public function __construct($server, $database, $username, $password)
    {
        $this -> server = $server;
        $this -> username = $username;
        $this -> password = $password;
        $this -> database = $database;
    }

    public function connect(){
        try{
            $this->connection = new \PDO("mysql:host=$this->server;dbname=$this->database",
                                        $this->username,$this->password);
            $setNames = $this->connection -> prepare("SET NAMES 'utf8'");
            $setNames -> execute();
        }catch(\PDOException $e){
            echo "falló la conexión a la base de datos: ".$e->getMessage();
        }
    }

    public function get_connection(){
        return $this-> connection;
    }
}


?>
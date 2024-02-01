<?php

namespace Database; //apellidos de la clase

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


//Cheking

// $server = "localhost";
// $database = "todo_list_db";
// $username = "root";
// $password = "";

// // instanciar el objeto de la conexion
// $databaseConnection = new DatabaseConnection($server,$database, $username, $password);
// //conectar a la base de datos
// $databaseConnection ->connect();
// // ejecutar una consulta
// $query= "SELECT title FROM tasks";

// // como le paso la query a la conexion, pues llamando al opbjeto metodo get_connection que nos devuelve la conexion
// // y luego le añadimos un prepare y la query. Despues de preparar se hace un exec
// $results = $databaseConnection->get_connection()->query($query);
// var_dump($results);

// // $results->execute();
// foreach($results as $row){
//     echo $row ['title'];
// }

// $result = $results->fetchAll(\PDO::FETCH_ASSOC);
// var_dump($result);



?>
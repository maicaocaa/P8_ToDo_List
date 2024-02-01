<?php
namespace App\Controllers;
use Database\DatabaseConnection;
use Exception;
require "vendor/autoload.php";

class ToDoController {
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;

    public function  __construct() {
        $this -> server= "localhost";
        $this -> database = "todo_list_db";
        $this -> username = "root";
        $this -> password = "";

        $this -> connection = new DatabaseConnection($this ->server, $this -> database ,
                                                    $this -> username, $this -> password);
        $this -> connection -> connect ();

    }

    public function index(){
        //INDEX: muestra/selecciona lista/colección/indice 
         //de todos los elementos de una entidad dada
      $query = "SELECT * FROM tasks";
      try{
        $statement = $this -> connection ->get_connection()->query($query);
        //$results = $statement->execute();
        if (!empty($statement)){
            $response = "Estas son todas las tareas pendiente y completas";
            foreach($statement as $row){
                echo " {$row ['title']}     ";
                echo " {$row ['description']}     ";
                echo " {$row ['date_expir']} ";
                echo "\n";
            }
           // var_dump($results);
           // var_dump($response);
            return [$statement, $response];
        } 
      }
      catch(Exception $e){
        echo "Ocurrio un error en el registro, vuelve a intentarlo";
    }
     }


    public function create($data){

   }

    public function store($data){
        $query = "INSERT INTO tasks (title, description, date_expir) VALUES (?, ?, ?)";
        try{
            $statement = $this->connection->get_connection()->prepare($query);
            $results = $statement->execute([$data['title'], $data['description'],
                                          $data['date_expir']
                                        ]);
            if(!empty($results)){
                $response = "Se ha registrado con la tarea {$data['title']} en la base de datos";
                var_dump($response);
                return [$results, $response];
            }
        }catch(Exception $e){
            echo "Ocurrio un error en el registro, vuelve a intentarlo";
        }
    }

    

    // public function show($data){
    //     //SHOW: muestra/selecciona un elemento dado

    // }

    // public function edit($data){

    // }

    // public function update($data){

    // }

    // public function delete($data){

    // }


}





?>
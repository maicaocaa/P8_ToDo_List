<?php

use App\Controllers\ToDoController;
require "vendor/autoload.php";

$tasks =new ToDoController;

$tasks -> store ([
    "title" =>"tarea añadida",
    "description" =>"una descripcion de la tarea de prueba",
    "date_expir" =>'2024-02-02'
]);


  
<?php
$host="localhost";
$dbname="test";
$username="root";
$password="";
//Funcion que genera conexion con la bdd.
$mysqli= new mysqli(hostname:$host,
                    username:$username,
                    password:$password,
                    database:$dbname);
//0 o 1 si hay error en la conexion
if($mysqli->connect_errno){
    die("Error de conexión: ".$mysqli->connect_error);
}

return $mysqli;





?>
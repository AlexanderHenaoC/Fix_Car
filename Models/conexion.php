<?php

$db = 'Fix Car';
$user = 'root';
$pass = '';
$host = 'localhost';

$conection = mysqli_connect($host,$user,$pass,$db);

if(!$conection){
    echo 'Error en la conexión';
}

?>
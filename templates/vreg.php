<?php
 
include '../Models/conexion.php';

$query = mysqli_query($conection, "SELECT * FROM usuario WHERE correo = '$correo' OR telefono = '$telefono'");
$result = mysqli_fetch_array($query);

?> 
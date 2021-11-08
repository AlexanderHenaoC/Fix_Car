<?php
 
include '../Models/conexion.php';
$contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT, ['cost' => 11]);
$rol = 2;

$query = mysqli_query($conection, "SELECT correo FROM usuario WHERE correo = '$correo' OR telefono = '$telefono'");
$result = mysqli_fetch_array($query);

?>
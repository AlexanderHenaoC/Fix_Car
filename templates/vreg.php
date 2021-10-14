<?php

include '../Models/conexion.php';
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT, ['cost' => 11]);
$rol = 2;

$query = mysqli_query($conection, "SELECT correo FROM usuario WHERE correo = '$correo' OR telefono = '$telefono'");
$result = mysqli_fetch_array($query);

?>
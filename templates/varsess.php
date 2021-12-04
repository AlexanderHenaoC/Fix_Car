<?php

$query = mysqli_query($conection, "SELECT id_usuario, nombre, apellidos, correo, telefono, direccion, id_rol FROM usuario WHERE correo = '$user'");
$data = mysqli_fetch_array($query);
print_r($data);
session_start();
$_SESSION['active'] = true;
$_SESSION['id_usuario'] = $data['id_usuario'];
$_SESSION['nombre'] = $data['nombre'];
$_SESSION['apellidos'] = $data['apellidos'];
$_SESSION['correo'] = $data['correo'];
$_SESSION['telefono'] = $data['telefono'];
$_SESSION['direccion'] = $data['direccion'];
$_SESSION['id_rol'] = $data['id_rol'];

include 'valses.php';
?>
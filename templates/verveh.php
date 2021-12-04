<?php
require "../Models/conexion.php";
session_start();
$id_usuario = $_SESSION['id_usuario'];
$query_ver_veh = mysqli_query($conection, "SELECT * FROM vehiculo WHERE id_usuario = '$id_usuario'");

?> 
<?php

require_once "../Models/conexion.php";
$user = mysqli_real_escape_string($conection, $_POST['correo']);
$passu = mysqli_real_escape_string($conection, $_POST['contraseña']);
$queryh = mysqli_query($conection, "SELECT id_rol, contraseña FROM usuario WHERE correo = '$user'");
$rows = mysqli_num_rows($queryh);

?>
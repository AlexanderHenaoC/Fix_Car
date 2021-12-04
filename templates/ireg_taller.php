<?php

include '../Models/conexion.php';
$contraseña = mysqli_real_escape_string($conection, password_hash($_POST['contraseña'], PASSWORD_BCRYPT, ['cost' => 11]));
$query_insert = mysqli_query(
        $conection, 
        "INSERT INTO usuario(nombre, fotografia_usuario, tipo_imagen, descripcion, correo, contraseña, telefono, 
                                                                                    direccion, id_rol) 
                            VALUES ('$nombre_taller', '$binarios_imagen', '$tipo_archivo', '$descripcion_taller', '$correo', '$contraseña', '$telefono', '$direccion', '$rol')");

?>
<?php

include '../Models/conexion.php';
$contraseña = mysqli_real_escape_string($conection, password_hash($_POST['contraseña'], PASSWORD_BCRYPT, ['cost' => 11]));
$query_insert = mysqli_query(
        $conection,
        "INSERT INTO usuario(nombre, apellidos, correo, contraseña, telefono, 
                                                direccion, id_rol) 
                            VALUES ('$nombre', '$apellidos', '$correo', '$contraseña', '$telefono', 
                                    '$direccion', '$rol')"
);
?> 
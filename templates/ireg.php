<?php

include '../Models/conexion.php';
$query_insert = mysqli_query(
        $conection,
        "INSERT INTO usuario(nombre, apellidos, correo, contraseña, telefono, 
                                                direccion, id_rol) 
                            VALUES ('$nombre', '$apellidos', '$correo', '$contraseña', '$telefono', 
                                    '$direccion', '$rol')"
);
?>
<?php

include '../Models/conexion.php';
$id_vehiculo = $row['id_vehiculo'];
$veh_elm = mysqli_query($conection, 'DELETE FROM vehiculo WHERE id_vehiculo = "$id_vehiculo"');
header('location: vehiculos.php')

?>
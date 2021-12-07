<?php
include "../Models/conexion.php";
session_start();
$id_usuario = $_SESSION['id_usuario'];
$query_ver_cit = mysqli_query($conection, "SELECT v.placa, v.fotografia, v.tipo_imagen, 
(v.id_usuario) as id_usuario_veh, t.id_cita, t.fecha_cita, t.hora_cita (x.nombre_tipo_cita) as nm_tp_ct 
FROM vehiculo v 
INNER JOIN cita t on v.id_vehiculo = t.id_vehiculo 
INNER JOIN tipo_cita x on x.id_tipo_cita = t.id_tipo_cita 
WHERE id_usuario = $id_usuario");

?> 
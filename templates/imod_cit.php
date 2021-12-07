<?php

include '../Models/conexion.php';
session_start();
$usuario = $_SESSION['id_usuario'];

$tip_cita = $_POST['tip_cita'];
$descripcion = $_POST['descripcion'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$id_vehiculo = $_POST['id_vehiculo'];
$taller = $_POST['taller'];

if (empty($tip_cita)) {
        array_push($alert, '<p>Seleccione un tipo de cita.</p>');
}
if (empty($descripcion)) {
        array_push($alert, '<p>La descripción no puede estar vacia.</p>');
}
if (empty($fecha_cita)) {
        array_push($alert, '<p>Seleccione un fecha.</p>');
}
if (empty($hora_cita)) {
        array_push($alert, '<p>Seleccione un hora.</p>');
}
if (empty($id_tipo_vehiculo)) {
        array_push($alert, '<p>Seleccione el tipo de cita.</p>');
}

$cal_ex = mysqli_query($conection, "SELECT * FROM cita WHERE (hora_cita = '$hora_cita' AND id_usuario = '$taller')" );
$result_ex = mysqli_fetch_array($vel_ex);

?>
<?php
require "../Models/conexion.php";

$tipo_archivo = $_FILES['fotografia_vehiculo']['type'];
$nombre_archivo = $_FILES['fotografia_vehiculo']['name'];
$tamaño_archivo = $_FILES['fotografia_vehiculo']['size'];
$imagen_subida = fopen($_FILES['fotografia_vehiculo']['tmp_name'], 'r');
$binarios_imagen = fread($imagen_subida, $tamaño_archivo);
$binarios_imagen = mysqli_real_escape_string($conection, $binarios_imagen);

$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$id_tipo_vehiculo = $_POST['tipo_vehiculo'];
$usuario = $_SESSION['id_usuario'];

if (empty($placa) || !preg_match("/[a-zA-Z]{3}[ -]*([0-9]{2}[a-zA-Z]{1}){0,1}([\d]{3}){0,1}/", $placa)) {
        array_push($alert, '<p>La Placa debe ser valida y no puede estar vacia.</p>');
}
if (empty($marca) || !preg_match("/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/", $marca)) {
        array_push($alert, '<p>EScriba la marca de su vehículo, no puede estar vacia.</p>');
}
if (empty($modelo) || !preg_match("/^[0-9]{1}[ -]*([0-9]{3}){1}/", $modelo)) {
        array_push($alert, '<p>Escriba el modelo del vehículo, no puede estar vacio.</p>');
}
if (empty($color) || !preg_match("/^[a-zA-ZÀ-ÿ\u00f1\u00d1]{1,}/", $color)) {
        array_push($alert, '<p>Escriba el color de su vehículo.</p>');
}
if (empty($_FILES['fotografia_vehiculo']['name'])) {
        array_push($alert, '<p>Seleccione una foto de su vehículo.</p>');
}
if (empty($id_tipo_vehiculo)) {
        array_push($alert, '<p>Seleccione el tipo de vehículo.</p>');
}









// $query_insert_veh = mysqli_query(
        //     $conection,
        //     "INSERT INTO vehiculo(placa, marca, modelo, color, 
        //                                 fotografia, tipo_imagen, id_usuario, id_tipo_vehiculo) 
        //                         VALUES ('$placa', '$marca', '$modelo', '$color',
        //                                 '$binarios_imagen', '$tipo_archivo', '$id_usuario', '$id_tipo_vehiculo')"
        // );
        
?>
<?php

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

if (empty($_POST['nombre']) || !(preg_match("/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/", $nombre))) {
    array_push($alert, '<p>El campo nombre no puede tener números ni caracteres especiales y no puede estar vacio</p>');
} 
if (empty($_POST['apellidos']) || !((preg_match("/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/", $apellidos)))) {
    array_push($alert, '<p>El campo apellidos no puede tener números ni caracteres especiales y no puede estar vacio</p>');
}
if (empty($_POST['telefono']) || !(preg_match("/(3)([0-9]{2}){1}[ -]*([0-9]{3}){1}[ -]*([0-9]{4}){1}/", $telefono))) {
    array_push($alert, '<p>El campo teléfono debe contener solo números y no puede estar vacio.</p>');
}
if (empty($_POST['direccion'])) {
    array_push($alert, '<p>El campo dirección no puede estar vacio</p>');
}
if (empty($_POST['correo']) || !(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $correo))) {
    array_push($alert, '<p>Ingrese un correo electronico valido</p>');
}
if (empty($_POST['contraseña']) || !(preg_match("/^.*(?=.{6,})(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$/", $contraseña))) {
    array_push($alert, '<p>La contraseña debe incluir mayúsculas, minúsculas, números, signos y seis o más caracteres</p>');
}

?>
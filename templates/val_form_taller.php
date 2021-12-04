<?php

    $tipo_archivo = $_FILES['fotografia_taller']['type'];
    $nombre_archivo = $_FILES['fotografia_taller']['name'];
    $tamaño_archivo = $_FILES['fotografia_taller']['size'];
    $imagen_subida = fopen($_FILES['fotografia_taller']['tmp_name'], 'r');
    $binarios_imagen = fread($imagen_subida, $tamaño_archivo);
    $binarios_imagen = mysqli_real_escape_string($conection, $binarios_imagen);

    $nombre_taller = $_POST['nombre_taller'];
    $descripcion_taller = $_POST['descripcion_taller'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = 1;

    if (empty($nombre_taller) || !(preg_match("/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/", $nombre_taller))) {
        array_push($alert, '<p>El campo nombre no puede tener números ni caracteres especiales y no puede estar vacio</p>');
    }
    if (empty($descripcion_taller) || !(preg_match("/^[\w .,!?()]+$/", $descripcion_taller))) {
        array_push($alert, '<p>La descripción no puede tener números ni caracteres especiales y no puede estar vacio</p>');
    }
    if (empty($nombre_archivo)) {
        array_push($alert, '<p>El campo fotografia no puede estar vacio</p>');
    }
    if (empty($telefono) || !(preg_match("/(3)([0-9]{2}){1}[ -]*([0-9]{3}){1}[ -]*([0-9]{4}){1}/", $telefono))) {
        array_push($alert, '<p>El campo teléfono debe contener solo números y no puede estar vacio.</p>');
    }
    if (empty($direccion)) {
        array_push($alert, '<p>El campo dirección no puede estar vacio</p>');
    }
    if (empty($correo) || !(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $correo))) {
        array_push($alert, '<p>Ingrese un correo electronico valido</p>');
    }
    if (empty($contraseña) || !(preg_match("/^.*(?=.{6,})(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$/", $contraseña))) {
        array_push($alert, '<p>La contraseña debe incluir mayúsculas, minúsculas, números, signos y seis o más caracteres</p>');
    }

?>
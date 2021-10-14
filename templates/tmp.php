<?php
$alert = "";
session_start();
if (!empty($_SESSION['active'])) {
    if ($_SESSION['id_rol'] != 1) {
        if ($_SESSION['id_rol'] == 2) {
            header('location: ../../Views/cliente/cliente.php');
        } else {
            header('location: ../../Views/vendedor/vendedor.php');
        }
    } else {
        header('location: ../../Views/admin/admin.php');
    }
} else {
    if (!empty($_POST)) {
        if (empty($_POST['correo']) || empty($_POST['contraseña'])) {
            $alert = 'Ingrese su correo y su contraseña';
        } else {
            require_once "log/vuser.php";
            if ($rows == 1) {
                $passh = mysqli_fetch_assoc($queryh);
                if (password_verify($passu, $passh['contraseña'])) {
                    require "log/varsess.php";
                } else {
                    $alert = 'EL correo o la contraseña son incorrectos';
                    session_destroy();
                }
            }
        }
    }
} 
?>
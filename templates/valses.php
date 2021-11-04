<?php

if ($_SESSION['id_rol'] != 1) {
    if ($_SESSION['id_rol'] == 2) {
        header('location: cliente.php');
    } else {
        if ($_SESSION['id_rol'] == 3) {
            header('location: vendedor.php');
        } else {
            header('location: login.php');
        }
    }
} else {
        header('location: admin.php');
}
?>
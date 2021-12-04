<?php

if (!empty($_SESSION['active'])) {
    if ($_SESSION['id_rol'] == 1) {
        header('location: admin.php');
    } elseif ($_SESSION['id_rol'] == 2) {
        header('location: cliente.php');
    } elseif ($_SESSION['id_rol'] == 3) {
        header('location: vendedor.php');
    } elseif ($_SESSION['id_rol'] == 4) {
    }
} else {
    header('location: login.php');
}
?>
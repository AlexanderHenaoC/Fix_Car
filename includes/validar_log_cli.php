<?php

session_start();
if (empty($_SESSION['active'])) {
    session_destroy();
    header('location: login.php');
} else {
    if (!empty($_SESSION['active'])) {
        if ($_SESSION['id_rol'] == 1) {
            header('location: admin.php');
        } elseif ($_SESSION['id_rol'] == 2) {
        } elseif ($_SESSION['id_rol'] == 3) {
            header('location: vendedor.php');
        } elseif ($_SESSION['id_rol'] == 4) {
        }
    } else {
        header('location: login.php');
    }
}
include 'functions.php';

?>
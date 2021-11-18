<?php

session_start();
if (empty($_SESSION['active'])) {
    header('location: login.php');
    session_destroy();
} else {
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
    }
}
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/proceso.css">
    <link rel="stylesheet" href="../styles/intfz-users.css">
    <link rel="shortcut icon" href="../images/logo_small_icon_only-removebg-preview.png" type="image/png">
    <title>Administrador</title>
</head>

<body>
    <header>
        <?php
        include '../includes/header-cli.php';
        ?>

        <div class="cont-main-cli">
            <div class="mn-cli-lf">
                <img src="../images/en_proceso.jpg" alt="">
                <p>En proceso de producción</p>
            </div>
            <div class="mn-cli-rt">
                <img src="../images/en_proceso.jpg" alt="">
                <p>En proceso de producción</p>
            </div>
        </div>
    </header>
</body>

</html>
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
    <title>Administrador</title>
</head>

<body>
    <header>
        <h4>Soy un header</h4>
        <p>Colombia, <?php echo fecha(); ?></p>
        <a href="admin.php">Inicio</a><br>
        <a href="salir.php">Salir</a>
        <h1>Soy un admin</h1><br>
        <span><?php echo $_SESSION['nombre']; ?></span><br>

    </header>
    <div class="img-proceso">
        <img src="../images/en_proceso.jpg" alt="">
        <p>En proceso de producción</p>
    </div>
</body>

</html>
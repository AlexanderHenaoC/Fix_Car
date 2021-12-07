<?php

require '../Models/conexion.php';
include '../includes/validar_log_cli.php';

if (empty($_GET['id'])) {
    header('location: vehiculos.php');
}

$id_vehiculo = $_REQUEST['id'];

$sql = mysqli_query($conection, "SELECT * FROM vehiculo WHERE id_vehiculo = $id_vehiculo");
$result_mod_veh = mysqli_num_rows($sql);

if ($result_mod_veh == 0) {
    header('location: vehiculos.php');
} else {
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/proceso.css">
    <link rel="stylesheet" href="../styles/intfz-users.css">
    <link rel="shortcut icon" href="../images/logo_small_icon_only-removebg-preview.png" type="image/png">
    <title>Eliminar vehículo</title>
</head>

<body>
    <?php
    include '../includes/header-cli.php';
    ?>
    <div class="cont-main-cli">
        <div class="mn-cli-lf">
            <img src="../images/en_proceso.jpg" alt="">
            <p>En proceso de producción</p>
        </div>
        <div class="mn-cli-rt">
            <div class="cont-form-regv">
                <form method="POST">
                    <h3>¿Está seguro que desea eliminar este vehículo?</h3>
                    <input name="no" class="btn btn-cfcl" type="submit" value="No">
                    <input name="si" class="btn btn-cncl" type="submit" value="Sí">
                    <?php
                    if (!empty($_POST['si'])) {
                        $sql_update = mysqli_query(
                            $conection,
                            "UPDATE vehiculo
                                SET  id_estado_veh = '2' 
                                WHERE id_vehiculo = '$id_vehiculo'"
                        );
                        if ($sql_update) {
                            header('location: vehiculos.php');
                        } else {
                            echo 'Primero debe cancelar las citas del vehículo';
                        }
                    } elseif (!empty($_POST['no'])) {
                        header('location: vehiculos.php');
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<?php

require '../Models/conexion.php';
include '../includes/validar_log_cli.php';

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
    <title>Mis vehículos</title>
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
            <div class="ver-veh">
                <h4>Mis vehículos</h4>
                <?php
                include "verveh.php";
                while ($row = mysqli_fetch_assoc($query_ver_veh)) {
                ?> 
                    <div class="vehs">
                        <div class="vehs-in">
                            <p><?php echo $row['placa']; ?></p>
                            <p class="img-vehs">
                                <img width="100px" src="data:<?php echo $row['tipo_imagen']; ?>;base64,<?php echo base64_encode($row['fotografia']); ?>">
                            </p>
                        </div>
                        <div class="vehs-fn">
                            <p>Marca:
                            </p>
                            <p><?php echo $row['marca']; ?></p>
                            <p>Modelo:
                            </p>
                            <p><?php echo $row['modelo']; ?></p>
                        </div>
                        <div class="vehs-lnk">
                            <a href="mod-vehs.php?id=<?php echo $row['id_vehiculo'];?>" class="btn-cfcl">Modificar</a><a href="#" class="btn-cncl">Eliminar</a>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="vehs vehs-agr">
                    <a href="reg-vehs.php"><img src="../images/agregar.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
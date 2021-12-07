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
    <title>Citas</title>
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
                <h4>Citas pendientes</h4>
                <?php
                $id_usuario = $_SESSION['id_usuario'];
                // Aquí tengo el id de los vehiculos
                $query_ids_veh = mysqli_query($conection, "SELECT id_vehiculo FROM vehiculo WHERE id_usuario = '$id_usuario'");
                while ($ids_veh_cit = mysqli_fetch_assoc($query_ids_veh)) {

                    // Aquí tengo los datos de los vehiculos
                    $query_cit_veh = mysqli_query($conection, "SELECT placa, fotografia, tipo_imagen FROM vehiculo WHERE id_vehiculo = '$ids_veh_cit'");
                    $row_cit_veh = mysqli_fetch_assoc($query_cit_veh);

                    // Aquí tengo los datos de las citas
                    $query_cit = mysqli_query($conection, "SELECT id_cita, fecha_cita, hora_cita, id_tipo_cita FROM cita WHERE id_vehiculo = '$ids_veh_cit'");
                    $row_cit = mysqli_fetch_assoc($query_cit);

                    // Aquí tengo los datos del tipo de cita
                    $query_tip_cit = mysqli_query($conection, "SELECT id_tipo_cita FROM cita WHERE id_vehiculo = '$ids_veh_cit'");
                    while ($row_cit_tips = mysqli_fetch_assoc($query_tip_cit)) {

                        $query_nom_tip_cit = mysqli_query($conection, "SELECT nombre_tipo_cita FROM tipo_cita WHERE id_tipo_cita = $row_cit_tips");
                        $row_nom_tip_cit = mysqli_fetch_assoc($query_nom_tip_cit);
                    }
                ?>
                    <div class="vehs cits">
                        <div class="vehs-in">
                            <p class="img-vehs">
                                <img width="100px" src="data:<?php echo $row_cit_veh['tipo_imagen']; ?>;base64,<?php echo base64_encode($row_cit_veh['fotografia']); ?>">
                            </p>
                            <p class="plc_cts"><?php echo $row_cit_veh['placa']; ?></p>
                        </div>
                        <div class="vehs-fn">
                            <p>Tipo:
                            </p>
                            <p><?php echo $row_nom_tip_cit['nombre_tipo_cita']; ?></p>
                            <p>Fecha:
                            </p>
                            <p><?php echo $row_cit['fecha_cita']; ?></p>
                            <p>Hora:
                            </p>
                            <p><?php echo $row_cit['hora_cita']; ?></p>
                        </div>
                        <div class="vehs-lnk">
                            <a href="mod-cits.php?id=<?php echo $row_cit['id_cita']; ?>" class="btn-cfcl">Modificar</a><a href="#" class="btn-cncl">Eliminar</a>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="vehs vehs-agr cits">
                    <a href="reg_cit_cli.php"><img src="../images/agregar.png" alt=""></a>
                </div>
            </div>
            <div class="ver-veh cts_trm">
                <h4>Citas terminadas</h4>
                <?php
                include "vercit.php";
                while ($row = mysqli_fetch_assoc($query_cit)) {
                ?>
                    <div class="vehs cits">
                        <div class="vehs-in">
                            <p class="img-vehs">
                                <img width="100px" src="data:<?php echo $row_cit['tipo_imagen']; ?>;base64,<?php echo base64_encode($row_cit['fotografia']); ?>">
                            </p>
                            <p class="plc_cts"><?php echo $row_cit['placa']; ?></p>
                        </div>
                        <div class="vehs-fn">
                            <?php
                            $tip_cit = $row['id_tipo_cita'];
                            $query_tip_cit = mysqli_query($conection, "SELECT nombre_tipo_cita FROM tipo_cita WHERE id_tipo_cita = '$tip_cit'");
                            $row_tip_cit = mysqli_fetch_assoc($query_tip_cit);
                            ?>
                            <p>Tipo:
                            </p>
                            <p><?php echo $row_tip_cit['nombre_tipo_cita']; ?></p>
                            <p>Fecha:
                            </p>
                            <p><?php echo $row['fecha_cita']; ?></p>
                            <p>Hora:
                            </p>
                            <p><?php echo $row['hora_cita']; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="vehs vehs-agr cits">
                    <a href="reg_cit_cli.php"><img src="../images/agregar.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<div class="ver-veh cts_trm">
                <h4>Citas terminadas</h4>
                <?php
                include "vercit.php";
                while ($row = mysqli_fetch_assoc($query_cit)) {
                ?>
                    <div class="vehs cits">
                        <div class="vehs-in">
                            <p class="img-vehs">
                                <img width="100px" src="data:<?php echo $row_cit['tipo_imagen']; ?>;base64,<?php echo base64_encode($row_cit['fotografia']); ?>">
                            </p>
                            <p class="plc_cts"><?php echo $row_cit['placa']; ?></p>
                        </div>
                        <div class="vehs-fn">
                            <?php
                            $tip_cit = $row['id_tipo_cita'];
                            $query_tip_cit = mysqli_query($conection, "SELECT nombre_tipo_cita FROM tipo_cita WHERE id_tipo_cita = '$tip_cit'");
                            $row_tip_cit = mysqli_fetch_assoc($query_tip_cit);
                            ?>
                            <p>Tipo:
                            </p>
                            <p><?php echo $row_tip_cit['nombre_tipo_cita']; ?></p>
                            <p>Fecha:
                            </p>
                            <p><?php echo $row['fecha_cita']; ?></p>
                            <p>Hora:
                            </p>
                            <p><?php echo $row['hora_cita']; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="vehs vehs-agr cits">
                    <a href="reg_cit_cli.php"><img src="../images/agregar.png" alt=""></a>
                </div>
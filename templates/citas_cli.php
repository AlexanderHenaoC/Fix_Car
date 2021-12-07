<?php

require '../Models/conexion.php';
include '../includes/validar_log_cli.php';
session_start();

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
                // include "vercit.php";
                $id_usuario = $_SESSION['id_usuario'];
                $query = mysqli_query(
                    $conection,
                    "SELECT id_vehiculo, placa, fotografia, tipo_imagen, (id_usuario) as id_usuario_veh
                    FROM vehiculo 
                    WHERE id_usuario = '$id_usuario'"
                );
                while ($row = mysqli_fetch_assoc($query)) {
                    $id_veh = $row['id_vehiculo'];
                    $query_ct = mysqli_query($conection, "SELECT * FROM cita Where id_vehiculo = '$id_veh'");
                    while ($row_d = mysqli_fetch_assoc($query_ct)) {
                        if ($row_d['id_estado'] != 1) {
                        } else {
                            $id_tipo = $row_d['id_tipo_cita'];
                            $query_tc = mysqli_query($conection, "SELECT * FROM tipo_cita Where id_tipo_cita = '$id_tipo'");
                            while ($row_t = mysqli_fetch_assoc($query_tc)) {
                ?>
                                <div class="vehs cits">
                                    <div class="vehs-in">
                                        <p class="img-vehs">
                                            <img width="100px" src="data:<?php echo $row['tipo_imagen']; ?>;base64,<?php echo base64_encode($row['fotografia']); ?>">
                                        </p>
                                        <p class="plc_cts"><?php echo $row['placa']; ?></p>
                                    </div>
                                    <div class="vehs-fn">
                                        <p>Tipo:
                                        </p>
                                        <p><?php echo $row_t['nombre_tipo_cita']; ?></p>
                                        <p>Fecha:
                                        </p>
                                        <p><?php echo $row_d['fecha_cita']; ?></p>
                                        <p>Hora:
                                        </p>
                                        <p><?php echo $row_d['hora_cita']; ?></p>
                                    </div>
                                    <div class="vehs-lnk">
                                        <a href="mod-cits.php?id=<?php echo $row_d['id_cita']; ?>" class="btn-cfcl">Modificar</a><a href="del-cits.php?id=<?php echo $row_d['id_cita']; ?>" class="btn-cncl">Cancelar</a>
                                    </div>
                                </div>

                <?php
                            }
                        }
                    }
                }
                ?>
                <div class="vehs vehs-agr cits">
                    <a href="reg_cit_cli.php"><img src="../images/agregar.png" alt=""></a>
                </div>
            </div>
            <div class="ver-veh">
                <h4>Citas en proceso</h4>
                <?php
                // include "vercit.php";
                $id_usuario = $_SESSION['id_usuario'];
                $query = mysqli_query(
                    $conection,
                    "SELECT id_vehiculo, placa, fotografia, tipo_imagen, (id_usuario) as id_usuario_veh
                    FROM vehiculo 
                    WHERE id_usuario = '$id_usuario'"
                );
                while ($row = mysqli_fetch_assoc($query)) {
                    $id_veh = $row['id_vehiculo'];
                    $query_ct = mysqli_query($conection, "SELECT * FROM cita Where id_vehiculo = '$id_veh'");
                    while ($row_d = mysqli_fetch_assoc($query_ct)) {
                        if ($row_d['id_estado'] != 2) {
                        } else {
                            $id_tipo = $row_d['id_tipo_cita'];
                            $query_tc = mysqli_query($conection, "SELECT * FROM tipo_cita Where id_tipo_cita = '$id_tipo'");
                            while ($row_t = mysqli_fetch_assoc($query_tc)) {
                ?>
                                <div class="vehs cits">
                                    <div class="vehs-in">
                                        <p class="img-vehs">
                                            <img width="100px" src="data:<?php echo $row['tipo_imagen']; ?>;base64,<?php echo base64_encode($row['fotografia']); ?>">
                                        </p>
                                        <p class="plc_cts"><?php echo $row['placa']; ?></p>
                                    </div>
                                    <div class="vehs-fn">
                                        <p>Tipo:
                                        </p>
                                        <p><?php echo $row_t['nombre_tipo_cita']; ?></p>
                                        <p>Fecha:
                                        </p>
                                        <p><?php echo $row_d['fecha_cita']; ?></p>
                                        <p>Hora:
                                        </p>
                                        <p><?php echo $row_d['hora_cita']; ?></p>
                                    </div>

                                </div>

                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
            <div class="ver-veh">
                <h4>Citas Completadas</h4>
                <?php
                // include "vercit.php";
                $id_usuario = $_SESSION['id_usuario'];
                $query = mysqli_query(
                    $conection,
                    "SELECT id_vehiculo, placa, fotografia, tipo_imagen, (id_usuario) as id_usuario_veh
                    FROM vehiculo 
                    WHERE id_usuario = '$id_usuario'"
                );
                while ($row = mysqli_fetch_assoc($query)) {
                    $id_veh = $row['id_vehiculo'];
                    $query_ct = mysqli_query($conection, "SELECT * FROM cita Where id_vehiculo = '$id_veh'");
                    while ($row_d = mysqli_fetch_assoc($query_ct)) {
                        if ($row_d['id_estado'] != 3) {
                        } else {
                            $id_tipo = $row_d['id_tipo_cita'];
                            $query_tc = mysqli_query($conection, "SELECT * FROM tipo_cita Where id_tipo_cita = '$id_tipo'");
                            while ($row_t = mysqli_fetch_assoc($query_tc)) {
                ?>
                                <div class="vehs cits">
                                    <div class="vehs-in">
                                        <p class="img-vehs">
                                            <img width="100px" src="data:<?php echo $row['tipo_imagen']; ?>;base64,<?php echo base64_encode($row['fotografia']); ?>">
                                        </p>
                                        <p class="plc_cts"><?php echo $row['placa']; ?></p>
                                    </div>
                                    <div class="vehs-fn">
                                        <p>Tipo:
                                        </p>
                                        <p><?php echo $row_t['nombre_tipo_cita']; ?></p>
                                        <p>Fecha:
                                        </p>
                                        <p><?php echo $row_d['fecha_cita']; ?></p>
                                        <p>Hora:
                                        </p>
                                        <p><?php echo $row_d['hora_cita']; ?></p>
                                    </div>

                                </div>

                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
            <div class="ver-veh">
                <h4>Citas canceladas</h4>
                <?php
                // include "vercit.php";
                $id_usuario = $_SESSION['id_usuario'];
                $query = mysqli_query(
                    $conection,
                    "SELECT id_vehiculo, placa, fotografia, tipo_imagen, (id_usuario) as id_usuario_veh
                    FROM vehiculo 
                    WHERE id_usuario = '$id_usuario'"
                );
                while ($row = mysqli_fetch_assoc($query)) {
                    $id_veh = $row['id_vehiculo'];
                    $query_ct = mysqli_query($conection, "SELECT * FROM cita Where id_vehiculo = '$id_veh'");
                    while ($row_d = mysqli_fetch_assoc($query_ct)) {
                        if ($row_d['id_estado'] != 4) {
                        } else {
                            $id_tipo = $row_d['id_tipo_cita'];
                            $query_tc = mysqli_query($conection, "SELECT * FROM tipo_cita Where id_tipo_cita = '$id_tipo'");
                            while ($row_t = mysqli_fetch_assoc($query_tc)) {
                ?>
                                <div class="vehs cits">
                                    <div class="vehs-in">
                                        <p class="img-vehs">
                                            <img width="100px" src="data:<?php echo $row['tipo_imagen']; ?>;base64,<?php echo base64_encode($row['fotografia']); ?>">
                                        </p>
                                        <p class="plc_cts"><?php echo $row['placa']; ?></p>
                                    </div>
                                    <div class="vehs-fn">
                                        <p>Tipo:
                                        </p>
                                        <p><?php echo $row_t['nombre_tipo_cita']; ?></p>
                                        <p>Fecha:
                                        </p>
                                        <p><?php echo $row_d['fecha_cita']; ?></p>
                                        <p>Hora:
                                        </p>
                                        <p><?php echo $row_d['hora_cita']; ?></p>
                                    </div>

                                </div>

                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
            <div class="ver-veh">
                <h4>Citas perdidas</h4>
                <?php
                // include "vercit.php";
                $id_usuario = $_SESSION['id_usuario'];
                $query = mysqli_query(
                    $conection,
                    "SELECT id_vehiculo, placa, fotografia, tipo_imagen, (id_usuario) as id_usuario_veh
                    FROM vehiculo 
                    WHERE id_usuario = '$id_usuario'"
                );
                while ($row = mysqli_fetch_assoc($query)) {
                    $id_veh = $row['id_vehiculo'];
                    $query_ct = mysqli_query($conection, "SELECT * FROM cita Where id_vehiculo = '$id_veh'");
                    while ($row_d = mysqli_fetch_assoc($query_ct)) {
                        if ($row_d['id_estado'] != 5) {
                        } else {
                            $id_tipo = $row_d['id_tipo_cita'];
                            $query_tc = mysqli_query($conection, "SELECT * FROM tipo_cita Where id_tipo_cita = '$id_tipo'");
                            while ($row_t = mysqli_fetch_assoc($query_tc)) {
                ?>
                                <div class="vehs cits">
                                    <div class="vehs-in">
                                        <p class="img-vehs">
                                            <img width="100px" src="data:<?php echo $row['tipo_imagen']; ?>;base64,<?php echo base64_encode($row['fotografia']); ?>">
                                        </p>
                                        <p class="plc_cts"><?php echo $row['placa']; ?></p>
                                    </div>
                                    <div class="vehs-fn">
                                        <p>Tipo:
                                        </p>
                                        <p><?php echo $row_t['nombre_tipo_cita']; ?></p>
                                        <p>Fecha:
                                        </p>
                                        <p><?php echo $row_d['fecha_cita']; ?></p>
                                        <p>Hora:
                                        </p>
                                        <p><?php echo $row_d['hora_cita']; ?></p>
                                    </div>

                                </div>

                <?php
                            }
                        }
                    }
                }
                ?>
            </div>

        </div>
    </div>
    </div>

</body>

</html>
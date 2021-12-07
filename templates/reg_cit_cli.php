<?php

require '../Models/conexion.php';
include '../includes/validar_log_cli.php';

if (!empty($_POST)) {
    $alert = array();
    $alert_ex = "";
    $alert_save = "";
    if (
        empty($_POST['tip_cita']) || empty($_POST['descripcion']) || empty($_POST['fecha_cita']) ||
        empty($_POST['hora_cita']) || empty($_POST['id_vehiculo']) || empty($_POST['taller'])
    ) {
        array_push($alert, '<p>Todos los campos son obligatorios</p>');
    } else {
        $cita = $_POST['tip_cita'];
        $descripcion = $_POST['descripcion'];
        $taller_in = $_POST['taller'];
        $fecha_cita = $_POST['fecha_cita'];
        $hora_cita = $_POST['hora_cita'];
        $id_vehiculo = $_POST['id_vehiculo'];
        $id_estado = $_POST['id_estado'];

        $query_insert_cita = mysqli_query(
            $conection,
            "INSERT INTO cita(descripcion, fecha_cita, hora_cita, id_estado, id_tipo_cita, id_vehiculo, id_usuario) 
                        VALUES ('$descripcion', '$fecha_cita', '$hora_cita', '$id_estado', '$cita',  '$id_vehiculo', '$taller_in')"
        );
        if ($query_insert_cita) {
            $alert_save = "<p>Cita registrada exitosamente</p>";
        } else {
            $alert_ex = "<p>Fallo al registrar cita</p>";
        }
    }
}

$time = time();
$fecha_actual = date("Y-m-d", $time);
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
    <title>Agendar citas</title>
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
                    <h3>Agendar cita</h3>
                    <div class="alert">
                        <?php

                        if (!empty($alert_save)) {
                            echo '<div class="alert-save">' . $alert_save . '</div>';
                        } elseif (count($alert) > 0) {
                            echo '<div class="alert-error">';
                            for ($i = 0; $i < count($alert); $i++) {
                                echo '<li>' . $alert[$i] . '</li>';
                            }
                            echo '</div>';
                        } elseif (!empty($alert_ex)) {
                            echo '<div class="alert-error"><li>' . $alert_ex . '</li></div>';
                        }
                        ?>
                    </div>
                    <input name="id_estado" type="hidden" value="1">
                    <label for="tip_cita">Tipo de cita</label><br>
                    <?php
                    $query_tipo_cit = mysqli_query($conection, "SELECT * FROM tipo_cita");
                    $result_tipo_cit = mysqli_num_rows($query_tipo_cit);
                    ?>
                    <select name="tip_cita" id="tip_cita">
                        <?php
                        if ($result_tipo_cit > 0) {
                            while ($tipo_cita = mysqli_fetch_array($query_tipo_cit)) {
                        ?>
                                <option value="<?php echo $tipo_cita['id_tipo_cita']; ?>"><?php echo $tipo_cita['nombre_tipo_cita']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" placeholder="Describa la razón de la cita"></textarea>
                    <label for="fecha_cita">Fecha</label>
                    <input type="date" name="fecha_cita" id="fecha_cita" min="<?php echo $fecha_actual; ?>" max="<?php echo date("Y-m-d", strtotime($fecha_actual . "+ 1 month")); ?>">
                    <label for="hora_cita">Hora</label><br>
                    <?php
                    $hora_cita = ['8:00:00', '9:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', 'f'];
                    ?>
                    <select name="hora_cita" id="hora_cita">
                        <?php
                        for ($i = 0; $hora_cita[$i] != 'f'; $i++) {
                        ?>
                            <option value="<?php echo $hora_cita[$i] ?>"><?php echo $hora_cita[$i] ?></option>
                        <?php
                        } ?>
                    </select>
                    <label for="id_vehiculo">Vehículo</label><br>

                    <?php
                    $id_usuario = $_SESSION['id_usuario'];
                    $query_veh = mysqli_query($conection, "SELECT * FROM vehiculo WHERE id_usuario = $id_usuario");
                    $result_veh = mysqli_num_rows($query_veh);
                    ?>
                    <select name="id_vehiculo" id="id_vehiculo">
                        <?php
                        if ($result_veh > 0) {
                            while ($vehiculo = mysqli_fetch_array($query_veh)) {
                        ?>
                                <option value="<?php echo $vehiculo['id_vehiculo']; ?>"><?php echo $vehiculo['placa']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="taller">Taller</label>
                    <?php
                    $query_taller = mysqli_query($conection, "SELECT * FROM usuario WHERE id_rol = '1'");
                    $result_taller = mysqli_num_rows($query_taller);
                    ?>
                    <select name="taller" id="taller">
                        <?php
                        if ($result_taller > 0) {
                            while ($taller = mysqli_fetch_array($query_taller)) {
                        ?>
                                <option value="<?php echo $taller['id_usuario']; ?>"><?php echo $taller['nombre']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input class="btn btn-cfcl" type="submit" value="Agendar">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
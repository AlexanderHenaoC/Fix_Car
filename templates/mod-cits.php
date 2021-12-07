<?php

require '../Models/conexion.php';
include '../includes/validar_log_cli.php';

if (empty($_GET['id'])) {
    header('location: citas_cli.php');
}

$id_cita = $_GET['id'];

$sql = mysqli_query(
    $conection,
    "SELECT v.descripcion, v.fecha_cita, v.hora_cita, (v.id_tipo_cita) as id_tip_cit, v.id_vehiculo, 
                    (t.nombre_tipo_cita) as nom_tip_cit 
                    FROM cita v 
                    INNER JOIN tipo_cita t 
                    on v.id_tipo_cita = t.id_tipo_cita 
                    WHERE id_cita = $id_cita"
);
$result_mod_cit = mysqli_num_rows($sql);

if ($result_mod_cit == 0) {
    header('location: citas_cli.php');
} else {
    $option = '';
    while ($data_mod_cit = mysqli_fetch_array($sql)) {
        $id_tip_cit = $data_mod_cit['id_tip_cit'];
        $descripcion = $data_mod_cit['descripcion'];
        $fecha_cita = $data_mod_cit['fecha_cita'];
        $id_vehiculo = $data_mod_cit['id_vehiculo'];
        $nom_tip_cit = $data_mod_cit['nom_tip_cit'];

        if ($id_tip_cit == 1) {
            $option = '<option value="' . $id_tip_cit . '" select>' . $nom_tip_cit . '</option>';
        } elseif ($id_tip_cit == 2) {
            $option = '<option value="' . $id_tip_cit . '" select>' . $nom_tip_cit . '</option>';
        } elseif ($id_tip_cit == 3) {
            $option = '<option value="' . $id_tip_cit . '" select>' . $nom_tip_cit . '</option>';
        } elseif ($id_tip_cit == 4) {
            $option = '<option value="' . $id_tip_cit . '" select>' . $nom_tip_cit . '</option>';
        } elseif ($id_tip_cit == 5) {
            $option = '<option value="' . $id_tip_cit . '" select>' . $nom_tip_cit . '</option>';
        } else {
            $option = '<option value="' . $id_tip_cit . '" select>Error</option>';
        }
    }
}

if (!empty($_POST)) {
    $alert = array();
    $alert_ex = "";
    $alert_save = "";

    // include "imod_cit.php";

    $usuario = $_SESSION['id_usuario'];

    $tip_cita = $_POST['tip_cita'];
    $descripcion_c = $_POST['descripcion'];
    $fecha_cita_c = $_POST['fecha_cita'];
    $hora_cita_c = $_POST['hora_cita'];
    $id_vehiculo_c = $_POST['id_vehiculo'];
    $taller = $_POST['taller'];

    if (empty($tip_cita)) {
        array_push($alert, '<p>Seleccione un tipo de cita.</p>');
    }
    if (empty($descripcion_c)) {
        array_push($alert, '<p>La descripción no puede estar vacia.</p>');
    }
    if (empty($fecha_cita_c)) {
        array_push($alert, '<p>Seleccione un fecha.</p>');
    }
    if (empty($hora_cita_c)) {
        array_push($alert, '<p>Seleccione un hora.</p>');
    }
    if (empty($id_vehiculo_c)) {
        array_push($alert, '<p>Seleccione el vehículo.</p>');
    }

    $cal_ex = mysqli_query($conection, "SELECT * FROM cita WHERE (hora_cita = '$hora_cita_c' AND id_usuario = '$taller')");
    $result_ex = mysqli_fetch_array($vel_ex);

    if (count($alert) == 0) {
        if (count($result_ex) > 0) {
            $alert_ex = '<p>La hora de la cita ya se encuentra asignada.</p>';
        } else {
            $id_taller = $result_ex['id_usuario'];
            $sql_update = mysqli_query(
                $conection,
                "UPDATE cita
                    SET descripcion = '$descripcion_c', fecha_Cita = '$fecha_cita_c', hora_cita = '$hora_cita_c', id_tipo_cita = '$tip_cita', 
                    id_vehiculo = '$id_vehiculo_c', id_usuario = '$taller' 
                    WHERE id_cita = '$id_cita'"
            );
            if ($sql_update) {
                $alert_save = '<div class="alert-save"><p>Datos actualizados exitosamente</p></div>';
            } else {
                array_push($alert, '<p>Error al actualizar los datos</p>');
            }
        }
    }
} else {
    array_push($alert, '<p>Todos los datos son obligatorios</p>');
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
    <title>Modificar cita</title>
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
                    <h3>Modificar cita</h3>
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
                    <input type="hidden" name="id_cita" value="<?php echo $id_cita ?>">
                    <label for="tip_cita">Tipo de cita</label><br>
                    <?php
                    $query_tipo_cit = mysqli_query($conection, "SELECT * FROM tipo_cita");
                    $result_tipo_cit = mysqli_num_rows($query_tipo_cit);
                    ?>
                    <select name="tip_cita" id="tip_cita">
                        <?php
                        echo $option;
                        if ($result_tipo_cit > 0) {
                            while ($tipo_cita = mysqli_fetch_array($query_tipo_cit)) {
                                if ($nom_tip_cit == $tipo_cita['nombre_tipo_cita']) {
                                } else {
                        ?>
                                    <option value="<?php echo $tipo_cita['id_tipo_cita']; ?>"><?php echo $tipo_cita['nombre_tipo_cita']; ?></option>
                        <?php
                                }
                            }
                        }
                        ?>
                    </select>
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" placeholder="<?php echo $descripcion; ?>"></textarea>
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
                    $query_veh = mysqli_query($conection, "SELECT * FROM vehiculo WHERE id_usuario = '$id_usuario'");
                    $result_veh = mysqli_num_rows($query_veh);
                    $query_veh_cit = mysqli_query($conection, "SELECT * FROM vehiculo WHERE id_vehiculo = '$id_vehiculo'");
                    $placa_veh_cit = mysqli_fetch_array($query_veh_cit);
                    ?>
                    <select name="id_vehiculo" id="id_vehiculo">
                        <?php
                        $option = '<option value="' . $id_tip_cit . '" select>' . $nom_tip_cit . '</option>';
                        echo '<option select value="' . $placa_veh_cit['id_vehiculo'] . '">' . $placa_veh_cit['placa'] . '';
                        if ($result_veh > 0) {
                            while ($vehiculo = mysqli_fetch_array($query_veh)) {
                                if ($placa_veh_cit['id_vehiculo'] == $vehiculo['id_vehiculo']) {
                                } else {
                        ?>
                                    <option value="<?php echo $vehiculo['id_vehiculo']; ?>"><?php echo $vehiculo['placa']; ?></option>
                        <?php
                                }
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
                    <input class="btn btn-cfcl" type="submit" value="Modificar">
                </form>
            </div>
        </div>
    </div>

</body>

</html>
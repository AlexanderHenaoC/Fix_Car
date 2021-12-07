<?php

require '../Models/conexion.php';
include '../includes/validar_log_cli.php';
if (!empty($_POST)) {
    $alert = array();
    $alert_ex = "";
    $alert_save = "";

    include "ireg_veh.php";
    if (count($alert) == 0) {
        if (count($result_ex) > 0) {
            $alert_ex = '<p>El vehículo ya se encuentra registrado, si desea modificarlo de click <a href="mod-vehs.php">aquí</a>.</p>';
        } else {
            $query_insert = mysqli_query(
                $conection,
                "INSERT INTO vehiculo(placa, marca, modelo, color, fotografia, tipo_imagen, descripcion, 
                                                                        id_usuario, id_tipo_vehiculo, id_estado_veh) 
                                        VALUES ('$placa', '$marca', '$modelo', '$color', '$binarios_imagen', '$tipo_archivo', '$descripcion',
                                                                        '$usuario', '$id_tipo_vehiculo', '1')"
            );
            if ($query_insert) {
                $alert_save = '<div class="alert-save"><p>Vehículo registrado exitosamente</p></div>';
            } else {
                array_push($alert, '<p>Error al registrar el vehículo</p>');
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
    <title>Registrar vehículo</title>
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

                <form method="POST" enctype="multipart/form-data">
                    <h3>Registrar vehículo</h3>
                    <div class="alert">
                        <?php

                        if (!empty($alert_save)) {
                            echo '<div>' . $alert_save . '</div>';
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
                    <label for="placa">Ingrese la placa de su vehículo</label>
                    <input type="text" name="placa" id="placa" placeholder="Placa">
                    <label for="marca">Ingresa la marca de tu vehículo</label>
                    <input type="text" name="marca" id="marca" placeholder="Marca">
                    <label for="modelo">Escribe el modelo de tu vehículo</label>
                    <input type="text" name="modelo" id="modelo" placeholder="Modelo">
                    <label for="color">Ingresa el color de tu vehículo</label>
                    <input type="text" name="color" id="color" placeholder="Color">
                    <label for="fotografia_vehiculo">Suba uba fotografia de su vehículo</label>
                    <input class="ty-fl" type="file" name="fotografia_vehiculo" id="fotografia_vehiculo">
                    <label for="tipo_vehiculo">Elija el tipo de vehiculo</label>
                    <?php
                    $query_tipo_veh = mysqli_query($conection, "SELECT * FROM tipo_vehiculo");
                    $result_tipo_veh = mysqli_num_rows($query_tipo_veh);
                    ?>
                    <select name="tipo_vehiculo" id="tipo_vehiculo">
                        <?php
                        if ($result_tipo_veh > 0) {
                            while ($tipo_veh = mysqli_fetch_array($query_tipo_veh)) {
                        ?>
                                <option value="<?php echo $tipo_veh['id_tipo_vehiculo']; ?>"><?php echo $tipo_veh['nombre_tipo_veh']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input class="btn" type="submit" value="Registrar">
                </form>
            </div>
        </div>
    </div>




</body>

</html>
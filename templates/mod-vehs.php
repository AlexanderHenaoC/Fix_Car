<?php

require '../Models/conexion.php';
include '../includes/validar_log_cli.php';

if (empty($_GET['id'])) {
    header('location: vehiculos.php');
}

$id_veh = $_GET['id'];

$sql = mysqli_query(
    $conection,
    "SELECT v.placa, v.marca, v.modelo, v.color, v.fotografia, 
                            (v.id_tipo_vehiculo) as id_tipo_veh, (t.nombre_tipo_veh) as nom_tipo_veh 
                    FROM vehiculo v 
                    INNER JOIN tipo_vehiculo t 
                    on v.id_tipo_vehiculo = t.id_tipo_vehiculo 
                    WHERE id_vehiculo = $id_veh"
);
$result_mod_veh = mysqli_num_rows($sql);

if ($result_mod_veh == 0) {
    header('location: vehiculos.php');
} else {
    $option = '';
    while ($data_mod_veh = mysqli_fetch_array($sql)) {
        $placa = $data_mod_veh['placa'];
        $marca = $data_mod_veh['marca'];
        $modelo = $data_mod_veh['modelo'];
        $color = $data_mod_veh['color'];
        $id_tipo_vehiculo = $data_mod_veh['id_tipo_veh'];
        $tipo_veh_t = $data_mod_veh['nom_tipo_veh'];

        if ($id_tipo_vehiculo == 1) {
            $option = '<option value="' . $id_tipo_vehiculo . '" select>' . $tipo_veh_t . '</option>';
        } elseif ($id_tipo_vehiculo == 2) {
            $option = '<option value="' . $id_tipo_vehiculo . '" select>' . $tipo_veh_t . '</option>';
        } elseif ($id_tipo_vehiculo == 3) {
            $option = '<option value="' . $id_tipo_vehiculo . '" select>' . $tipo_veh_t . '</option>';
        } elseif ($id_tipo_vehiculo == 4) {
            $option = '<option value="' . $id_tipo_vehiculo . '" select>' . $tipo_veh_t . '</option>';
        } else {
            $option = '<option value="' . $id_tipo_vehiculo . '" select>Error</option>';
        }
    }
}

if (!empty($_POST)) {
    $alert = array();
    $alert_ex = "";
    $alert_save = "";

    include "imod_veh.php";
    if (count($alert) == 0) {
        if (count($result_ex) > 0) {
            $alert_ex = '<p>El vehículo ya se encuentra registrado por otro usuario.</p>';
        } else {
            if (empty($_FILES['fotografia_vehiculo']['name'])) {
                $sql_update = mysqli_query(
                    $conection,
                    "UPDATE vehiculo
                    SET placa = '$placa', marca = '$marca', modelo = '$modelo', color = '$color', id_usuario = '$usuario', 
                    id_tipo_vehiculo = '$id_tipo_vehiculo' 
                    WHERE id_vehiculo = '$id_veh'"
                );
            } else {
                $sql_update = mysqli_query(
                    $conection,
                    "UPDATE vehiculo
                    SET placa = '$placa', marca = '$marca', modelo = '$modelo', color = '$color', fotografia = '$binarios_imagen',
                    tipo_imagen = '$tipo_archivo', descripcion = '$descripcion', id_usuario = '$usuario', id_tipo_vehiculo = '$id_tipo_vehiculo' 
                    WHERE id_vehiculo = '$id_veh'"
                );
            }
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
    <title>Modificar vehículo</title>
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
                <div class="most-veh"></div>
                <form method="POST" enctype="multipart/form-data">
                    <h3>Modificar vehículo</h3>
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
                    <input type="hidden" name="id_veh" value="<?php echo $id_veh ?>">
                    <label for="placa">Ingrese la placa de su vehículo</label>
                    <input type="text" name="placa" id="placa" placeholder="Placa" value="<?php echo $placa; ?>">
                    <label for="marca">Ingresa la marca de tu vehículo</label>
                    <input type="text" name="marca" id="marca" placeholder="Marca" value="<?php echo $marca; ?>">
                    <label for="modelo">Escribe el modelo de tu vehículo</label>
                    <input type="text" name="modelo" id="modelo" placeholder="Modelo" value="<?php echo $modelo; ?>">
                    <label for="color">Ingresa el color de tu vehículo</label>
                    <input type="text" name="color" id="color" placeholder="Color" value="<?php echo $color; ?>">
                    <label for="fotografia_vehiculo">Suba uba fotografia de su vehículo</label>
                    <input class="ty-fl" type="file" name="fotografia_vehiculo" id="fotografia_vehiculo">
                    <label for="tipo_vehiculo">Elija el tipo de vehiculo</label>
                    <?php
                    $query_tipo_veh = mysqli_query($conection, "SELECT * FROM tipo_vehiculo");
                    $result_tipo_veh = mysqli_num_rows($query_tipo_veh);
                    ?>
                    <select name="tipo_vehiculo" id="tipo_vehiculo">
                        <?php
                        echo $option;
                        if ($result_tipo_veh > 0) {
                            while ($tipo_veh = mysqli_fetch_array($query_tipo_veh)) {
                                if ($tipo_veh_t == $tipo_veh['nombre_tipo_veh']) {
                                } else {
                        ?>
                                    <option value="<?php echo $tipo_veh['id_tipo_vehiculo']; ?>"><?php echo $tipo_veh['nombre_tipo_veh']; ?></option>
                        <?php
                                }
                            }
                        }
                        ?>
                    </select>
                    <div class="btn-mod-veh">
                        <input class="btn btn-cfcl" type="submit" value="Confirmar">
                        <a href="vehiculos.php" class="btn btn-cncl">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
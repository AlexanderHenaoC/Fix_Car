<?php
 
if (!empty($_POST)) {
    $alert = array();
    $alert_ex = "";
    $alert_save = "";
    include "val_form_taller.php";
}
if (count($alert) == 0) {
    include "vreg_taller.php";

    if (count($result) > 0) {
        $alert_ex = 'El usuario ya existe';
    } else {
        include "ireg_taller.php";
        if ($query_insert) {
            $alert_save = '<div class="alert-save"><p>Usuario creado exitosamente</p></div>';
        } else {
            array_push($alert, '<p>Error al crear el usuario</p>');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylely.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="shortcut icon" href="../images/logo_small_icon_only-removebg-preview.png" type="image/png">
    <title>Registro Taller</title>
</head>

<body>

    <?php
    include "../includes/header.php";
    ?>
    <div class="cont-main">
        <main>

            <div>
                <div class="cont-reg">
                    <div class="cont-log-img">
                        <img class="i-lg iu" src="../images/su.jpg" alt="">
                        <img class="i-lg id" src="../images/sd.jpg" alt="">
                        <img class="i-lg it" src="../images/s3.jpg" alt="">
                        <img class="i-lg ic" src="../images/sc.jpg" alt="">
                        <img class="i-lg ici" src="../images/s5.jpg" alt="">
                    </div>
                    <div class="frm-log-reg">
                        <form method="POST" enctype="multipart/form-data">
                            <h4 class="reg-tlt">Registre su taller</h4>
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
                            <input class="input input-uno" type="text" name="nombre_taller" id="nombre" placeholder="Ingrese el nombre del taller"><br>
                            <input type="file" id="fotografia_taller" name="fotografia_taller">
                            <input type="text" name="descripcion_taller" placeholder="Breve descripci??n del taller" id="descripcion_taller">
                            <input class="input" type="text" name="telefono" id="telefono" placeholder="Ingrese su tel??fono"><br>
                            <input class="input" type="text" name="direccion" id="direccion" placeholder="Ingrese su direcci??n"><br>
                            <input class="input" type="email" name="correo" id="correo" placeholder="Ingrese correo aqu??"><br>
                            <input class="input" type="password" name="contrase??a" id="contrase??a" placeholder="Ingrese su contrase??a aqu??"><br>
                            <input type="submit" name="" id="" value="Registrarme" class="btn-reg">
                            <p class="ntuc ntuc-reg">
                                <a href="login.php">Iniciar sesi??n</a><br><br>
                            </p>
                            <p class="ntuc ntuc-reg">
                                Registrate como cliente<a href="registro.php"> aqu??</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php
    include "../includes/footer.php";
    ?>
</body>

</html>
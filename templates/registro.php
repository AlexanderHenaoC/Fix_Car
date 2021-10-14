<?php

if (!empty($_POST)) {
    $alert = '';
    if (
        empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['telefono']) || empty($_POST['direccion']) ||
        empty($_POST['correo']) || empty($_POST['contraseña'])
    ) {
        $alert = '<div class="alert-error"><p>Todos los campos son obligatorios</p></div>';
    } else {
        require "vreg.php";

        if ($result > 0) {
            $alert = '<div class="alert-error"><p>El usuario ya existe</p></div>';
        } else {
            include "ireg.php";
            if ($query_insert) {
                $alert = '<div class="alert-save"><p>Usuario creado exitosamente</p></div>';
            } else {
                $alert = '<div class="alert-error"><p>Error al crear el usuario</p></div>';
            }
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
    <link rel="shortcut icon" href="../images/logo_small_icon_only.png" type="image/png">
    <title>Registro</title>
</head>

<body>
    <?php
    include "../includes/header.php"
    ?>
    <div class="main">
        <div class="cont-main">
            <div>
                <div class="cont-log-img">
                    <img class="i-lg it" src="../images/s3.jpg" alt="">
                    <img class="i-lg ic" src="../images/sc.jpg" alt="">
                    <img class="i-lg ici" src="../images/s5.jpg" alt="">
                    <img class="i-lg iu" src="../images/su.jpg" alt="">
                    <img class="i-lg id" src="../images/sd.jpg" alt="">
                </div>
                <div class="frm-log frm-log-reg">
                    <form action="" method="POST">
                        <h4>Registrese</h4>
                        <div class="alert">
                            <?php echo isset($alert) ? $alert : ''; ?>
                        </div>
                        <input class="input input-uno" type="text" name="nombre" id="nombre" placeholder="Ingrese sus nombres"><br>
                        <input class="input" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos"><br>
                        <input class="input" type="text" name="telefono" id="telefono" placeholder="Ingrese su teléfono"><br>
                        <input class="input" type="text" name="direccion" id="direccion" placeholder="Ingrese su dirección"><br>
                        <input class="input" type="email" name="correo" id="correo" placeholder="Ingrese correo aquí"><br>
                        <input class="input" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña aquí"><br>
                        <input type="submit" name="" id="" value="Registrarme" class="btn-reg">
                        <!-- <button class="btn" type="submit"><a href="#">Registrarme</a></button> -->
                        <p class="ntuc ntuc-reg">
                            <a href="login.php">Iniciar sesión</a><br><br>
                        </p>
                        <p class="ntuc ntuc-reg">
                            Tiene un taller?<a href="#"> registrelo aquí</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "../includes/footer.php"
    ?>
</body>

</html>
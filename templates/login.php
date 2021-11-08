fgf<?php
    $alert = "";
    session_start();
    if (!empty($_SESSION['active'])) {
        if ($_SESSION['id_rol'] != 1) {
            if ($_SESSION['id_rol'] == 2) {
                header('location: cliente.php');
            } else {
                header('location: vendedor.php');
            }
        } else {
            header('location: admin.php');
        }
    } else {
        if (!empty($_POST)) {
            if (empty($_POST['correo']) || empty($_POST['contraseña'])) {
                $alert = '<div class="alert-error alert-error-l">Ingrese su correo y su contraseña </div>';
            } else {
                require_once "vuser.php";
                if ($rows == 1) {
                    $passh = mysqli_fetch_assoc($queryh);
                    if (password_verify($passu, $passh['contraseña'])) {
                        require "varsess.php";
                    } else {
                        $alert = '<div class="alert-error alert-error-l">Los datos ingresados son incorrectos</div>';
                        session_destroy();
                    }
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
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/stylely.css">
    <link rel="shortcut icon" href="../images/logo_small_icon_only.png" type="image/png">
    <title>Ingreso</title>
</head>

<body>
    <?php
    include "../includes/header.php"
    ?>
    <div class="cont-main">
        <main>
            <div>
                <div class = "cont-reg">
                    <div class="cont-log-img">
                        <img class="i-lg iu" src="../images/su.jpg" alt="">
                        <img class="i-lg id" src="../images/sd.jpg" alt="">
                        <img class="i-lg it" src="../images/s3.jpg" alt="">
                        <img class="i-lg ic" src="../images/sc.jpg" alt="">
                        <img class="i-lg ici" src="../images/s5.jpg" alt="">
                    </div>
                    <div class="frm-log">
                        <h4 class = "reg-tlt">Ingresar</h4>
                        <form action="" method="POST">
                            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                            <input class="input" type="text" name="correo" id="correo" placeholder="Ingrese su correo"><br>
                            <input class="input" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña"><br>
                            <input class="btn" type="submit" value="ingresar"><br>
                            <p class="ntuc">No tienes una cuenta?<br>
                                Registrate <a href="registro.php">aquí</a></p>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </main>
    <?php
    include "../includes/footer.php"
    ?>
</body>

</html>
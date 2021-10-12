<?php
include "../includes/header.php"
?>
<link rel="stylesheet" href="../styles/login.css">
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
            <div class="frm-log">
                <h4>Ingrese aquí</h4>
                <input type="text" name="usuario" placeholder="Ingrese correo aquí">
                <input type="password" name="contraseña" placeholder="Ingrese su contraseña aquí">
                <button class="btn"><a href="#">Ingresar</a></button>
                <p class="ntuc">No tienes una cuenta?<br><br>
                    Registrate <a href="#">aquí</a></p>
            </div>
        </div>
    </div>
</div>
<?php
include "../includes/footer.php"
?>
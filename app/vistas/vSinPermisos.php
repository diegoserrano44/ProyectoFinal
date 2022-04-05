<?php 
ob_start();
?>

<div class="p-5 mb-4 rounded-3 d-flex justify-content-center text-black">
<h3>Parece ser que no tienes permisos para acceder al recurso <br> o tu inicio de sesión ha expirado. </h3>
</div>
<div class="d-flex justify-content-center">
    <div class="p-2">
    <a class="btn btn-danger" href="index.php?ctl=inicio">Volver a Inicio</a>
    <a class="btn botonAzul" name="inicio" href="index.php?ctl=entrarUsuario">Iniciar Sesión</a>
</div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
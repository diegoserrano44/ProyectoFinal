<?php 
ob_start();
?>

<div class="p-5 mb-4 rounded-3 d-flex justify-content-center text-black">
<h3>No tienes permisos para acceder a este recurso, create una cuenta <br> o si ya la tienes tu inicio de sesión habrá expirado.</h3>
</div>
<div class="d-flex justify-content-center">
    <div class="p-2">
    <a class="btn btn-danger" href="index.php?ctl=inicio">Volver al Inicio</a>
    <a class="btn botonAzul" name="inicio" href="index.php?ctl=entrarUsuario">Iniciar Sesión</a>
</div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
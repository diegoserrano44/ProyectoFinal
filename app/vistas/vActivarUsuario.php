<?php 
ob_start();
?>

<div class="p-5 mb-4 bg-dark rounded-3 text-white d-flex justify-content-center">
<h3>El usuario ha sido activado, ya puedes <a href="index.php?ctl=entrarUsuario">Iniciar Sesión</a</h3>
</div>
<div class="d-flex justify-content-center">
    <a class="btn boton" href="index.php?ctl=entrarUsuario">Iniciar Sesión</a>
</div>

<?php 

$contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
<?php 
ob_start();
?>

<div class="p-5 mb-4 bg-dark rounded-3 text-white d-flex justify-content-center">
<h3>The user has been activated, you can log in now</h3>
</div>
<div class="d-flex justify-content-center">
    <a class="btn botonAzul" href="index.php?ctl=entrarUsuario">Go to login</a>
</div>

<?php 

$contenido = ob_get_clean() ?>

<?php include __DIR__ . './vistas/layout.php' ?>
<?php 
ob_start();
?>

<div class="p-5 mb-4 rounded-3 d-flex justify-content-center text-white">
<h3>It appears that you do not have permissions to access <br> this resource or your login has expired. </h3>
</div>
<div class="d-flex justify-content-center">
    <div class="p-2">
    <a class="btn btn-danger" href="index.php?ctl=inicio">Go back to homepage</a>
    <a class="btn botonAzul" name="inicio" href="index.php?ctl=entrarUsuario">Login</a>
</div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
<?php 
ob_start();
?>
<div class="p-5 mb-4 bg-dark rounded-3 d-flex justify-content-center text-white">
<h3>Se ha eliminado el tema</h3>
</div>
<div class="d-flex justify-content-center">
    <a class="btn btn-danger" href="index.php?ctl=verPerfil&id=76">Volver atrás</a>
</div>
</div>
<?php 
$contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
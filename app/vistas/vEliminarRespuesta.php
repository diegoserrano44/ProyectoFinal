<?php 
ob_start();
?>
<div class="p-5 mb-4 bg-dark rounded-3 d-flex justify-content-center text-white">
<h3>Se ha eliminado la respuesta</h3>
</div>
<div class="d-flex justify-content-center">
    <?php  header('Location:' . getenv('HTTP_REFERER')); ?>
</div>
</div>
<?php 
$contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
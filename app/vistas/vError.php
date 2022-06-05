<?php 
ob_start();
?>
<div class="p-5 mb-4 bg-dark rounded-3 d-flex justify-content-center text-white">
<h3>Ha habido un error. Intentalo de nuevo o contacta con el administrador del sitio para saber más.</h3>
<?php        
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol']==1) {
                echo "<button type=\"button\" class=\"btn secundarioDark m-3\" data-bs-toggle=\"modal\" data-bs-target=\"#contactAdmin\">Enviar mensaje al Administrador</button>";
            };
        }?>
</div>
<div class="d-flex justify-content-center">
    <a class="btn btn-danger" href="index.php?ctl=inicio">Volver al Inicio</a>
</div>
</div>
<?php 
$contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
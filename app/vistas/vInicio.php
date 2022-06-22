<?php ob_start();
if (isset($_SESSION['mensaje'])) {
    echo "<h2 class='display-6'>" . $_SESSION['mensaje'] . "</h2>";
}
if (isset($params['mensaje'])) {
    echo "<h2 class='display-6'>" . $params['mensaje'] . "</h2>";
}
if (! empty($errores)) {
    foreach ($errores as $key=>$contenido){
        echo "<p>".$contenido."</p>";
    }

}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="./../app/ajax/tinyinicio.js"></script>

<div class="jumbotrons jumbotron p-5 text-black" style="width:100%;background-color:#e3f1d0;">
         <div class="container-fluid py-5">
            <div class="container">
               <h1 class="display-5 fw-bold text-center">Bienvenido a Una Nueva Vida</h1>
               <p class="col-md-12 fs-5 text-center">Que sigas haciendo todo aquello que te gusta es nuestra misión</p>
               
            </div>
         </div>
      </div>

<?php $contenido = ob_get_clean() ?>
<?php include __DIR__ . '/layout.php' ?>
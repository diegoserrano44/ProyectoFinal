<?php ob_start() ?>

      <div class="card m-3">
	      <div class="card-header fw-light">
	      </div>
	      <div class="card-body">
	          <h5 class="card-title fs-5"><?php echo $tema['asunto_tema'];?></h5>
		      <p class="card-text text-muted fs-6">Categoría: <?php echo $respuesta['contenido_respuesta'];?></p>
	      </div>
      </div>



<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
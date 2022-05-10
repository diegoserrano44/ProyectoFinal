<?php ob_start(); ?>

<?php foreach ($respuestas as $respuesta) { ?>
      <div class="card m-3">
	      <div class="card-header fw-light">
		  	<?php echo $tema['by_tema']." - ".$tema['fecha_tema']; ?>
	      </div>
	      <div class="card-body">
	          <h5 class="card-title fs-5"><?php echo $tema['asunto_tema'];?></h5>
		      <p class="card-text text-muted fs-6">Categoría: <?php echo $respuesta['contenido_respuesta'];?></p>
	      </div>
      </div>
<?php } ?>

<div class="col-md-8 justify-content-center">
	<form action="index.php?ctl=enviarRespuesta" method="POST">
		<textarea name="respuesta" rows="6" cols="50"></textarea>
		<input type="submit" value="Publicar tu respuesta" name="enviarRespuesta">
	</form>
</div>



<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
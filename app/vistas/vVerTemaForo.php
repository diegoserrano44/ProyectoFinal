<?php ob_start(); ?>

<?php foreach ($respuestas as $respuesta) { ?>
      <div class="card m-3">
	      <div class="card-header fw-light">
		  	<?php echo $respuesta['usuario']." - ".$tema['fecha_tema']; ?>
	      </div>
	      <div class="card-body">
	          <h5 class="card-title fs-5"><?php echo $tema['asunto_tema'];?></h5>
		      <p class="card-text text-muted fs-6"><?php echo $respuesta['contenido_respuesta'];?></p>
	      </div>
      </div>
<?php } ?>

<div class="col-md-8 justify-content-center">
	<form action="index.php?ctl=enviarRespuesta" method="POST">
	<textarea name="respuesta" rows="6" cols="50" id="publicarRespuesta"></textarea>
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
		<input type="submit" value="Publicar tu respuesta" name="enviarRespuesta">
	</form>
</div>


<script src="./../web/js/textoenriquecido.js"></script>
<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
<?php ob_start(); ?>

<?php foreach ($respuestas as $respuesta) { ?>
	<?php 
	$fechaOriginal = $respuesta['fecha_respuesta'];
	$newDate = date("d/m/Y H:i", strtotime($fechaOriginal));
	?>
      <div class="card m-3">
	      <div class="card-header fw-light">
		  	<?php echo $respuesta['usuario']." - ".$newDate?> <br><?php echo $tema['asunto_tema'];?><br>
	      </div>
	      <div class="card-body">
	          <h5 class="card-title fs-5"></h5>
		      <p class=""><?php echo $respuesta['contenido_respuesta'];?></p>
	      </div>
      </div>
<?php } ?>

<div class="col-md-12 justify-content-center mb-4">
	<div class="container">
	<form action="index.php?ctl=enviarRespuesta" method="POST">
	<textarea name="respuesta" rows="6" cols="50" id="publicarRespuesta"></textarea>
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
		<input type="submit" value="Publicar tu respuesta" name="enviarRespuesta">
	</form>
</div>
</div>

<div class="d-flex justify-content-center">
    <div class="p-2">
    <a class="btn btn-danger" href="index.php?ctl=listarForo">Volver atrás</a>
    <a class="btn botonAzul" name="inicio" href="index.php?ctl=entrarUsuario">Iniciar Sesión</a>
</div>
</div>


<script src="./../web/js/textoenriquecido.js"></script>
<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
<?php ob_start(); ?>

<?php foreach ($respuestas as $respuesta) { ?>
	<?php 
	$fechaOriginal = $respuesta['fecha_respuesta'];
	$newDate = date("d/m/Y H:i", strtotime($fechaOriginal));
	?>
      <div class="card m-3">
	      <div class="card-header" style="background: #dcffab;">

			<?php  
				if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] == $respuesta['id_usuario']) {
			?>
		  	<a href="index.php?ctl=eliminarRespuesta&id=<?php echo $respuesta['id_respuesta']; ?>"><i class="fa fa-x" style="color: black;
    font-size: 20px; position: absolute; top: 5px; right: 5px;"></i></a>
			<?php } ?>

		  	<img class="rounded-circle p-2 imgForo" src="<?php echo $respuesta['foto_perfil'] ?>" title="<?php echo $respuesta['usuario'] ?>'s profile pic" alt="Picture">
		  	<b><?php echo $respuesta['usuario']; ?></b><?php echo " - ".$newDate ?>
	      </div>
	      <div class="card-body">
	          <h5 class="card-title fs-5"></h5>
		      <?php echo $respuesta['contenido_respuesta'];?>
	      </div>
      </div>
<?php } ?>

<div class="col-md-12 justify-content-center mb-4">
	<div class="container">
	<form action="index.php?ctl=enviarRespuesta" method="POST">
	<textarea name="respuesta" rows="6" cols="50" id="publicarRespuesta"></textarea>
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
		<input class="botonRespuesta" type="submit" value="Publicar tu respuesta" name="enviarRespuesta">
	</form>
</div>
</div>


<script src="../web/js/textoenriquecido.js"></script>
<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
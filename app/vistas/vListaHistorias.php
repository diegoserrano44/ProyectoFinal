<?php ob_start() ?>
<div class="jumbotrons jumbotron p-5 text-black" style="width:100%; background-color:#c9e265;">
         <div class="container-fluid py-5">
            <div class="container">
               <h1 class="display-5 fw-bold text-center">Bienvenido a Una Nueva Vida</h1>
               <p class="col-md-12 fs-5 text-center">Que sigas haciendo todo aquello que te gusta es nuestra misión</p>
			   <div class="d-flex justify-content-center">
			   <a href="index.php?ctl=crearHistoria" class="botonPublicar">Publica tu historia</a>
			   </div>
               <form method="POST" action="index.php?ctl=buscar" class="form-buscador d-flex justify-content-center p-4">
                    <label for="buscador"></label>
                    <input type="text" id="buscador" name="buscador" placeholder="Busca una historia" required>
                    <button type="submit" class="boton-buscador" name="buscar" value="Search"><i class="fa fa-search"></i></button>
               </form>
            </div>
         </div>
      </div>

<div class="row" style="--bs-gutter-x: 0; margin:5px;">
<?php foreach ($historias as $historia) :?>
<div class="accordion" id="accordionExample" style="padding: 15px;">
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $historia['id_historia'];?>">
      <button class="accordion-button historias" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $historia['id_historia'];?>" aria-expanded="true" aria-controls="collapse<?php echo $historia['id_historia'];?>">
        <?php echo $historia['titulo']; ?>
      </button>
    </h2>
    <div id="collapse<?php echo $historia['id_historia'];?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $historia['id_historia'];?>" data-bs-parent="#accordionExample">
      <div class="accordion-body">
	  <?php echo $historia['descripcion'];?>
      </div>
      
      <?php
        if (isset($_SESSION['rol'])) {
          if ($_SESSION['rol']>0) {
      ?>
      <div class="d-flex">
      <button type="button" class="btn colorSecundario" data-bs-toggle="modal" data-bs-target="#contactModal">Enviar mensaje privado</button>
      </div>
      <?php
      }
    }
    ?>
    </div>
  </div>
</div>
		<?php endforeach; ?>
</div>

<!-- Contact Modal -->
<div class="modal fade bd-dark" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel">Enviar mensaje</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="" action="index.php?ctl=mandarMensaje&id=<?php echo $historia['id_historia']?>" method="POST">
        <input class="asuntoMensaje" type="text" name="asunto" value="" placeholder="Asunto"><br><br>
        <textarea class="contenidoMensaje" rows="6" placeholder="Mensaje" name="mensaje"></textarea>
      </div>
      <div class="modal-footer">
        <input type="submit" name="enviaContacto" value="Enviar mensaje" class="btn colorSecundario">
        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</a>
      </form>
      </div>
    </div>
  </div>
</div>



<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
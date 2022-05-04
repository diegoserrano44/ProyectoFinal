<?php ob_start() ?>
<div class="jumbotrons jumbotron p-5 text-black" style="width:100%; background-color:#dcffab;">
         <div class="container-fluid py-5">
            <div class="container">
               <h1 class="display-5 fw-bold text-center">Bienvenido a Una Nueva Vida</h1>
               <p class="col-md-12 fs-5 text-center">Que sigas haciendo todo aquello que te gusta es nuestra misión</p>
			   <div class="d-flex justify-content-center">
			   <a href="index.php?ctl=crearHistoria" id="historia">Publica tu historia</a>
			   </div>
               <!-- <form method="POST" action="index.php?ctl=buscar" class="form-buscador d-flex justify-content-center p-2">
                    <label for="buscador"></label>
                    <input type="text" id="buscador" name="buscador" placeholder="Search your class" required>
                    <button type="submit" class="boton-buscador" name="buscar" value="Search"><i class="fa fa-search"></i></button>
               </form> -->
            </div>
         </div>
      </div>

<div class="row" style="--bs-gutter-x: 0; margin:5px;">
<?php foreach ($historias as $historia) :?>
<div class="accordion" id="accordionExample" style="padding: 15px;">
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $historia['id_anuncio'];?>">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $historia['id_anuncio'];?>" aria-expanded="true" aria-controls="collapse<?php echo $historia['id_anuncio'];?>">
        <?php echo $historia['titulo']; ?>
      </button>
    </h2>
    <div id="collapse<?php echo $historia['id_anuncio'];?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $historia['id_anuncio'];?>" data-bs-parent="#accordionExample">
      <div class="accordion-body">
	  <?php echo $historia['descripcion'];?>
      </div>
    </div>
  </div>
</div>
		<?php endforeach; ?>
	</div>



<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
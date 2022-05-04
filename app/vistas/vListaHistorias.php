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

<div class="container">
<div class="row" style="--bs-gutter-x: 0;">
<?php foreach ($historias as $historia) :?>
		<div class="col-12">
			<div class="card-group">
				<div class="card m-3 p-3 mb-5 rounded sombra">
					<!-- <img class="card-img-top" src="" alt="Card image cap" width="auto" height=""> -->
					<div class="card-body">
						<h5 class="card-title text-dark text-truncate"> <?php echo $historia['titulo'] ?></h5>
						<p class="card-text text-dark" style=""> <?php echo $historia['descripcion'] ?></p>
						<div class="d-flex justify-content-between align-items-center bSee">
							<b><p class="card-text text-dark text-truncate"> <?php echo $historia['nombre']?></p></b>			
							<a href="index.php?ctl=verAnuncio&id=<?php echo $historia['id_anuncio']?>" ><i class="fa-solid fa-arrow-right-long"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
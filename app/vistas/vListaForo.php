<?php ob_start() ?>
<div class="jumbotrons jumbotron p-5 bg-light text-black" style="width:100%;">
         <div class="container-fluid py-5">
            <div class="container">
               <h1 class="display-5 fw-bold text-center">Bienvenido al Foro de UNV</h1>
               <p class="col-md-12 fs-5 text-center">Por que todos tenemos que tener oportunidades y consejos dentro de nuestra comunidad</p>
               <!-- <form method="POST" action="index.php?ctl=buscar" class="form-buscador d-flex justify-content-center p-2">
                    <label for="buscador"></label>
                    <input type="text" id="buscador" name="buscador" placeholder="Search your class" required>
                    <button type="submit" class="boton-buscador" name="buscar" value="Search"><i class="fa fa-search"></i></button>
               </form> -->
            </div>
         </div>
      </div>
	  
	  
<div class="row justify-content-center" style="--bs-gutter-x:0;">
		<div class="col-12 col-md-12 bg-light border-2 border-dark rounded-3 shadow pt-3 pb-4 px-4 extraContainer">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="pills-general-tab"
						data-bs-toggle="pill" data-bs-target="#pills-general" type="button"
						role="tab" aria-controls="pills-general" aria-selected="true">General</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-deportes-tab"
						data-bs-toggle="pill" data-bs-target="#pills-deportes"
						type="button" role="tab" aria-controls="pills-deportes"
						aria-selected="false">Deportes</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-libre-tab"
						data-bs-toggle="pill" data-bs-target="#pills-libre"
						type="button" role="tab" aria-controls="pills-libre"
						aria-selected="false">Tiempo Libre</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-casa-tab"
						data-bs-toggle="pill" data-bs-target="#pills-casa"
						type="button" role="tab" aria-controls="pills-casa"
						aria-selected="false">En Casa</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-movilidad-tab"
						data-bs-toggle="pill" data-bs-target="#pills-movilidad"
						type="button" role="tab" aria-controls="pills-movilidad"
						aria-selected="false">Movilidad</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-adaptaciones-tab"
						data-bs-toggle="pill" data-bs-target="#pills-adaptaciones"
						type="button" role="tab" aria-controls="pills-adaptaciones"
						aria-selected="false">Adaptaciones</button>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active text-justify" id="pills-general"
					role="tabpanel" aria-labelledby="pills-general-tab"><?php echo $historia;?>
				</div>
				<div class="tab-pane fade text-justify " id="pills-deportes"
					role="tabpanel" aria-labelledby="pills-deportes-tab"><?php /*echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" */ ?>
				</div>
				<div class="tab-pane fade show active text-justify" id="pills-libre"
					role="tabpanel" aria-labelledby="pills-libre-tab"><?php /*echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" */ ?>
				</div>
				<div class="tab-pane fade show active text-justify" id="pills-casa"
					role="tabpanel" aria-labelledby="pills-casa-tab"><?php /*echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" */ ?>
				</div>
				<div class="tab-pane fade show active text-justify" id="pills-movilidad"
					role="tabpanel" aria-labelledby="pills-movilidad-tab"><?php /*echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" */?>
				</div>
				<div class="tab-pane fade show active text-justify" id="pills-adaptaciones"
					role="tabpanel" aria-labelledby="pills-adaptaciones-tab"><?php /*echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" */ ?>
				</div>

				<div class="tab-pane fade text-justify " id="pills-adsUser"
					role="tabpanel" aria-labelledby="pills-adsUser-tab"><?php
    if (count($historias) > 0) {
        echo "<div class=\"row\">";
        ?>
       <?php foreach ($historias as $historia) :?>
		<div class="col-12">
			<div class="card-group">
				<div class="card m-3 p-3 mb-5 rounded sombra">
					<img class="card-img-top" src="../app/categorias_img/<?php echo $historia['categoria_img']?>.png" alt="Card image cap" width="auto" height="">
					<div class="card-body">
						<h5 class="card-title text-dark text-truncate"> <?php echo $historia['titulo'] ?></h5>
						<p class="card-text text-dark text-truncate"> <?php echo $historia['descripcion'] ?></p>
						<div class="d-flex justify-content-between align-items-center bSee">
							<b><p class="card-text text-dark text-truncate"> <?php echo $historia['precio']." €/h"?></p></b>			
							<a href="index.php?ctl=verAnuncio&id=<?php echo $historia['id_anuncio']?>" ><i class="fa-solid fa-arrow-right-long"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
                            
                            <?php
        echo "</div>";
    } else {
        echo "Aún no has escrito ni publicado ninguna historia, anímate y que todos conozcan tu historia";
    }

    ?>
                </div>
			</div>
		</div>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
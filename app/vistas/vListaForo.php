<?php ob_start()
?>

<div class="jumbotrons jumbotron p-5 text-black" style="width:100%; background-color:#dcffab;">
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
			<ul class="nav nav-pills m-3" id="pills-tab" role="tablist">
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
				<div class="tab-pane fade show active text-justify" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
					<?php foreach ($params as $a) {
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { ?>
						<div class="card m-3">
							<div class="card-header fw-light">
								<?php echo $a['by_tema']." - ".$a['fecha_tema']; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6">Categoría: <?php echo $a['categoria_tema']; ?></p>
							</div>
						</div>
					<?php }
						else { 
							echo "Todavía no has escrito una descripción sobre ti";
						}
					}
					?>
				</div>
				<div class="tab-pane fade text-justify " id="pills-deportes"
					role="tabpanel" aria-labelledby="pills-deportes-tab"><?php echo (isset($params['usuario'])&&!empty($params['usuario']))?$params['usuario']:"Todavía no se ha publicado ningun tema en la categoría Deportes" ?>
				</div>
				<div class="tab-pane fade show text-justify" id="pills-libre"
					role="tabpanel" aria-labelledby="pills-libre-tab"><?php echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" ?>
				</div>
				<div class="tab-pane fade show text-justify" id="pills-casa"
					role="tabpanel" aria-labelledby="pills-casa-tab"><?php echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" ?>
				</div>
				<div class="tab-pane fade show text-justify" id="pills-movilidad"
					role="tabpanel" aria-labelledby="pills-movilidad-tab"><?php echo (isset($params['vr_apps'])&&!empty($params['vr_apps']))?$params['vr_apps']:"Todavía no se ha publicado ningun tema en la categoría Movilidad"?>
				</div>
				<div class="tab-pane fade show text-justify" id="pills-adaptaciones"
					role="tabpanel" aria-labelledby="pills-adaptaciones-tab"><?php echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" ?>
				</div>

				<div class="tab-pane fade text-justify " id="pills-adsUser"
					role="tabpanel" aria-labelledby="pills-adsUser-tab">
                </div>
			</div>
		</div>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
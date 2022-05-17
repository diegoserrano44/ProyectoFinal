<?php ob_start()
?>

<div class="jumbotrons jumbotron p-5 text-black" style="width:100%; background-color:#c9e265;">
         <div class="container-fluid py-5">
            <div class="container">
               <h1 class="display-5 fw-bold text-center">Bienvenido al Foro de UNV</h1>
               <p class="col-md-12 fs-5 text-center">Por que todos tenemos que tener oportunidades y consejos dentro de nuestra comunidad</p>
			   <div class="d-flex justify-content-center">
			   		<a href="index.php?ctl=crearTemaForo" id="">Publica un tema</a>
			   </div>
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
				<?php foreach ($categorias as $a) { ?>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-<?php echo $a['nombre_categoria'];?>-tab"
						data-bs-toggle="pill" data-bs-target="#pills-<?php echo $a['nombre_categoria'];?>"
						type="button" role="tab" aria-controls="pills-<?php echo $a['nombre_categoria'];?>"
						aria-selected="false"><?php echo $a['nombre_categoria'];?>
					</button>
				</li>
				<?php }?>
			</ul>



			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active text-justify" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
					<?php foreach ($temas as $a) {
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='4') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
								<?php echo $a['usuario']." - ".$a['fecha_tema']; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todavía no has escrito una descripción sobre ti";
						}
					}
					?>
				</div>

				<div class="tab-pane fade text-justify " id="pills-Deportes" role="tabpanel" aria-labelledby="pills-Deportes-tab">
					<?php foreach ($temas as $a) {
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='2') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
								<?php echo $a['by_tema']." - ".$a['fecha_tema']; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todavía no has escrito una descripción sobre ti";
						}
					}
					?>
				</div>

				<div class="tab-pane fade show text-justify" id="pills-libre" role="tabpanel" aria-labelledby="pills-libre-tab">
				<?php foreach ($temas as $a) {
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='5') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
								<?php echo $a['by_tema']." - ".$a['fecha_tema']; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todavía no has escrito una descripción sobre ti";
						}
					}
					?>
				</div>


				<div class="tab-pane fade show text-justify" id="pills-casa"
					role="tabpanel" aria-labelledby="pills-casa-tab"><?php echo (isset($params['movilidad'])&&!empty($params['movilidad']))?$params['movilidad']:"Todavía no se ha publicado ningun tema en la categoría Movilidad" ?>
				</div>
				<div class="tab-pane fade show text-justify" id="pills-Movilidad"
					role="tabpanel" aria-labelledby="pills-Movilidad-tab"><?php echo (isset($params['vr_apps'])&&!empty($params['vr_apps']))?$params['vr_apps']:"Todavía no se ha publicado ningun tema en la categoría Movilidad"?>
				</div>
				<div class="tab-pane fade show text-justify" id="pills-Adaptaciones" role="tabpanel" aria-labelledby="pills-Adaptaciones-tab">
				<?php foreach ($temas as $a) {
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='3') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
								<?php echo $a['usuario']." - ".$a['fecha_tema']; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todavía no has escrito una descripción sobre ti";
						}
					}
					?>
				</div>

				<div class="tab-pane fade text-justify " id="pills-adsUser"
					role="tabpanel" aria-labelledby="pills-adsUser-tab">
                </div>
			</div>
		</div>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
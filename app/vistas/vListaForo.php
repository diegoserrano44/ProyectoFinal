<?php ob_start()
?>

<div class="jumbotrons jumbotron p-5 text-black" style="width:100%; background-color:#c9e265;">
         <div class="container-fluid py-5">
            <div class="container">
               <h1 class="display-5 fw-bold text-center">Bienvenido al Foro de UNV</h1>
               <p class="col-md-12 fs-5 text-center">Por que todos tenemos que tener oportunidades y consejos dentro de nuestra comunidad</p>
			   <div class="d-flex justify-content-center">
			   		<a href="index.php?ctl=crearTema" class="botonPublicar">Publica un tema</a>
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
			
			<script>
				window.onload = function PonColor() {
					document.getElementById('pills-General-tab').click();
				}
			</script>



			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active text-justify" id="pills-General" role="tabpanel" aria-labelledby="pills-general-tab">
					<?php foreach ($temas as $a) {
						$fechaOriginal = $a['fecha_tema'];
						$newDate = date("d/m/Y H:i", strtotime($fechaOriginal));
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='1') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
							Tema publicado por <b><?php echo $a['usuario'];?></b><?php echo " - ".$newDate; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todav??a no hay nada publicado en la categor??a General";
						}
					}
					?>
				</div>

				<div class="tab-pane fade text-justify " id="pills-Deportes" role="tabpanel" aria-labelledby="pills-Deportes-tab">
					<?php foreach ($temas as $a) {
						$fechaOriginal = $a['fecha_tema'];
						$newDate = date("d/m/Y H:i", strtotime($fechaOriginal));
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='2') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
								Tema publicado por <b><?php echo $a['usuario'];?></b><?php echo " - ".$newDate; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todav??a no hay nada publicado en la categor??a Deportes";
						}
					}
					?>
				</div>

				<div class="tab-pane fade text-justify " id="pills-Libre" role="tabpanel" aria-labelledby="pills-Libre-tab">
					<?php foreach ($temas as $a) {
						$fechaOriginal = $a['fecha_tema'];
						$newDate = date("d/m/Y H:i", strtotime($fechaOriginal));
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='5') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
								Tema publicado por <b><?php echo $a['usuario'];?></b><?php echo " - ".$newDate; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todav??a no hay nada publicado en la categor??a Libre";
						}
					}
					?>
				</div>


				<div class="tab-pane fade text-justify " id="pills-Casa" role="tabpanel" aria-labelledby="pills-Casa-tab">
					<?php foreach ($temas as $a) {
						$fechaOriginal = $a['fecha_tema'];
						$newDate = date("d/m/Y H:i", strtotime($fechaOriginal));
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='6') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
								Tema publicado por <b><?php echo $a['usuario'];?></b><?php echo " - ".$newDate; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todav??a no hay nada publicado en la categor??a Casa";
						}
					}
					?>
				</div>

				<div class="tab-pane fade text-justify " id="pills-Movilidad" role="tabpanel" aria-labelledby="pills-Movilidad-tab">
					<?php foreach ($temas as $a) {
						$fechaOriginal = $a['fecha_tema'];
						$newDate = date("d/m/Y H:i", strtotime($fechaOriginal));
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='4') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
								Tema publicado por <b><?php echo $a['usuario'];?></b><?php echo " - ".$newDate; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todav??a no hay nada publicado en la categor??a Movilidad";
						}
					}
					?>
				</div>

				<div class="tab-pane fade show text-justify" id="pills-Adaptaciones" role="tabpanel" aria-labelledby="pills-Adaptaciones-tab">
				<?php foreach ($temas as $a) {
					$fechaOriginal = $a['fecha_tema'];
					$newDate = date("d/m/Y H:i", strtotime($fechaOriginal));
						if (isset($a['asunto_tema'])&&!empty($a['asunto_tema'])) { 
							if ($a['categoria_tema']=='3') {	
						?>
						<div class="card m-3">
							<div class="card-header fw-light">
							Tema publicado por <b><?php echo $a['usuario'];?></b><?php echo " - ".$newDate; ?>
							</div>
							<div class="card-body">
								<a href="index.php?ctl=verTemaForo&id=<?php echo $a['id_tema']?>"><h5 class="card-title fs-5"><?php echo $a['asunto_tema']; ?></h5></a>
								<p class="card-text text-muted fs-6"></p>
							</div>
						</div>
					<?php } }
						else { 
							echo "Todav??a no hay nada publicado en la categor??a Adaptaciones";
						}
					}
					?>
				</div>

			</div>
		</div>
	</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
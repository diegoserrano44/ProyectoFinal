<?php ob_start()?>
<?php
$A = substr($params['fecha_nac'], 0, 4);
$Mes = substr($params['fecha_nac'], 5, 2);
$Dia = substr($params['fecha_nac'], 8, 2);
$fecha = $Dia . "-" . $Mes . "-" . $A;

$historias=$params['anuncios']; 
?>

<style>
</style>
<main class="container-fluid perfilContainer">
	<div class="row">
		<div class="col-2 col-md-2 border-2 border-dark rounded-3 pt-2 pb-3 px-4 mb-3">
		<img class="rounded-circle text-center mt-4 mx-auto imgPfp"
				src="<?php echo $params['foto_perfil'] ?>"
				title="<?php echo $params['usuario'] ?>'s profile pic" alt="Picture">
		</div>
		<div class="col-md-10">
			<p><span class="d-inline-block fw-bold me-4 align-middle">Nombre</span> <?php echo (isset($params['apellidos']))? $params['nombre'] . " " . $params['apellidos']: $params['nombre'] ?></p>
			<hr>
			<?php
			if ($_SESSION['id_usuario'] == $params['id_usuario']) {
				?>
			<p><span class="d-inline-block fw-bold me-4 align-middle">Email</span> <?php echo $params['email'] ?></p>
			<hr>
		<?php
	}
	?>
			<p><span class="d-inline-block fw-bold me-4 align-middle">Teléfono</span> <?php echo (isset($params['telefono']) && !empty($params['telefono']))? $params['telefono']:"-" ?></p>
			<hr>
			<p><span class="d-inline-block fw-bold me-4 align-middle">Fecha de Nacimiento</span> <?php echo $fecha ?></p>
		</div>
	</div>

	<div class="row justify-content-center">
		<div
			class="col-12 col-md-12 bg-light border-2 border-dark rounded-3 shadow pt-3 pb-4 px-4 extraContainer">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="pills-desc-tab"
						data-bs-toggle="pill" data-bs-target="#pills-desc" type="button"
						role="tab" aria-controls="pills-desc" aria-selected="true">Descripcion</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-portfolio-tab"
						data-bs-toggle="pill" data-bs-target="#pills-portfolio"
						type="button" role="tab" aria-controls="pills-portfolio"
						aria-selected="false">Mis VR apps</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-adsUser-tab"
						data-bs-toggle="pill" data-bs-target="#pills-adsUser"
						type="button" role="tab" aria-controls="pills-adsUser"
						aria-selected="false">Mis historias</button>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active text-justify" id="pills-desc"
					role="tabpanel" aria-labelledby="pills-desc-tab"><?php echo (isset($params['descripcion'])&&!empty($params['descripcion']))?$params['descripcion']:"Todavía no has escrito una descripción sobre ti" ?></div>
				<div class="tab-pane fade text-justify " id="pills-portfolio"
					role="tabpanel" aria-labelledby="pills-portfolio-tab"><?php echo (isset($params['vr_apps'])&&!empty($params['vr_apps']))?$params['vr_apps']:"Todavía no te has descargado ninguna app de VR, si tienes unas gafas oculus quest Anímate!!" ?></div>
				<div class="tab-pane fade text-justify " id="pills-adsUser"
					role="tabpanel" aria-labelledby="pills-adsUser-tab"><?php
    if (count($historias) > 0) {
        echo "<div class=\"row\">";
        ?>
       <?php foreach ($historias as $historia) :?>
						<div class="col-md-6">
						<div class="card-group">
							<div class="card m-3 p-3 mb-5 rounded sombra">
								<div class="card-body">
									<h5 class="card-title text-dark text-truncate"> <?php echo $historia['titulo'] ?></h5>
									<p class="card-text text-dark text-truncate"> <?php echo $historia['descripcion'] ?></p>
									<div class="d-flex justify-content-between align-items-center bSee">										
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

</main>
<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
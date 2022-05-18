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
	<div class="row align-items-center">
		<div class="col-md-2 border-2 border-dark rounded-3 pt-2 pb-3 px-4 mb-3">
			<img class="rounded-circle text-center mt-4 mx-auto imgPfp" src="<?php echo $params['foto_perfil'] ?>" title="<?php echo $params['usuario'] ?>'s profile pic" alt="Picture">
			<?php
			if ($_SESSION['id_usuario'] == $params['id_usuario']) {
						?>    
                <a class="text-center mb-3" href=<?php echo "index.php?ctl=modificarPerfil&id=" . $params['id_usuario'] ?>>
				<button class="col-md-9 col-xs-12 btn colorSecundario">Modify profile</button></a>
					<?php } ?>
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
    if (count($historias) > 0 && isset($_SESSION['usuario'])) {
        echo "<div class=\"row\">";
        ?>
       <?php foreach ($historias as $historia) :?>
			<div class="accordion" id="accordionExample" style="padding: 15px;">
				<div class="accordion-item">
					<div class="p-2">
						<a href="index.php?ctl=modificarHistoria">Editar Historia</a><br>
						<a href="index.php?ctl=eliminarHistoria">Eliminar Historia</a>
	   				</div>
					<h2 class="accordion-header" id="heading<?php echo $historia['id_historia'];?>">
					<button class="accordion-button historias" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $historia['id_historia'];?>" aria-expanded="true" aria-controls="collapse<?php echo $historia['id_historia'];?>">
						<?php echo $historia['titulo']; ?>
					</button>
					</h2>
				<div id="collapse<?php echo $historia['id_historia'];?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $historia['id_historia'];?>" data-bs-parent="#accordionExample">
					<div class="accordion-body">
					<?php echo $historia['descripcion'];?>
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
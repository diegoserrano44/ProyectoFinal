<?php

ob_start();?>

<main class="container-fluid perfilContainer" id="perfilContainer">
<?php
if (! empty($_SESSION['mensaje'])) {
    echo "<h4 class='errorMsg'>" . $_SESSION['mensaje'] . "</h4>";
}
if (! empty($params['mensaje'])) {
    echo "<h4 class='errorMsg'>" . $params['mensaje'] . "</h4>";
}
if (! empty($errores)) {
    foreach ($errores as $key => $contenido) {
        echo "<p>" . $contenido . "</p>";
    }
}
?>
	<form
		action="<?php echo "index.php?ctl=modificarPerfil&id=" . $_SESSION['id_usuario']?>" method="POST" id="form1" enctype="multipart/form-data">
		<div class="row justify-content-center">
			<div
				class="d-grid mb-3 col-12 col-md-3 bg-light border-2 border-dark rounded-3 shadow imgContainerP">
				<input type="file" id="foto_perfil" name="foto_perfil"> <a
					href="javascript:document.getElementById('foto_perfil').click();"
					class="rounded-circle text-center mx-auto"> <img
					class="rounded-circle mt-4 imgPfpH"
					src="<?php echo $params['foto_perfil'] ?>"
					title="Click to change profile pic" alt="Picture"></a>
				<h2 class="fw-bold text-center"><?php echo $params['usuario'] ?></h2>
				<a class="text-center mb-3"><button type="submit" form="form1"
						class="btn colorSecundario w-75 text-center mb-3" name="saveChanges">Guardar
						cambios</button></a>
			</div>
			<div
				class="col-12 col-md-8 bg-light border-2 border-dark rounded-3 shadow pt-2 pb-3 px-4 mb-3 infoContainer">
				<h1 class="fw-bold text-center mb-3">Perfil de <?php echo $params['usuario'] ?></h1>
				<p>
					<span class="d-inline-block fw-bold me-4 align-middle">Nombre</span>
					<input type="text" id="nombre" name="nombre"
						value="<?php echo $params['nombre'] ?>" placeholder="First name"
						required></input> <input type="text" id="apellidos" name="apellidos"
						value="<?php echo (isset($params['apellidos']))?$params['apellidos']:"" ?>"
						placeholder="Last name"></input>
				</p>
				<hr>
				<p>
					<span class="d-inline-block fw-bold me-4 align-middle">Email</span>
					<input type="email" id="email" name="email"
						value="<?php echo $params['email'] ?>" placeholder="Email"
						required></input>
				</p>
				<hr>
				<p>
					<span class="d-inline-block fw-bold me-4 align-middle">Teléfono</span>
					<input type="tel" id="tel" name="tel"
						value="<?php echo (isset($params['telefono']) && !empty($params['telefono']))? $params['telefono']:"" ?>"></input>
				</p>
				<hr>
				<p>
					<span class="d-inline-block fw-bold me-4 align-middle">Fecha de nacimiento</span>
					<input type="date" id="fNacimiento" name="fNacimiento"
						value="<?php echo $params['fecha_nac'] ?>"></input>
				</p>
			</div>

		</div>
		<div class="row justify-content-center">
			<div
				class="col-12 col-md-12 bg-light border-2 border-dark rounded-3 shadow pt-3 pb-4 px-4 extraContainer">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="pills-desc-tab"
							data-bs-toggle="pill" data-bs-target="#pills-desc" type="button"
							role="tab" aria-controls="pills-desc" aria-selected="true">Descripción</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="pills-vr_apps-tab"
							data-bs-toggle="pill" data-bs-target="#pills-vr_apps"
							type="button" role="tab" aria-controls="pills-vr_apps"
							aria-selected="false">Mis VR apps</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="pills-historias-tab"
							data-bs-toggle="pill" data-bs-target="#pills-historias"
							type="button" role="tab" aria-controls="pills-historias"
							aria-selected="false">Mis historias</button>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active text-justify" id="pills-desc"
						role="tabpanel" aria-labelledby="pills-desc-tab">
						<textarea id="descripcion" name="descripcion" onkeyup="textAreaAdjust(this)"><?php echo (isset($params['descripcion']))?$params['descripcion']:"" ?></textarea>
					</div>
					<div class="tab-pane fade text-justify" id="pills-vr_apps"
						role="tabpanel" aria-labelledby="pills-vr_apps-tab">
						<textarea id="vr_apps" name="vr_apps" onkeyup="textAreaAdjust(this)"><?php echo (isset($params['vr_apps']))?$params['vr_apps']:"" ?></textarea>
					</div>
					<div class="tab-pane fade text-justify" id="pills-historias"
						role="tabpanel" aria-labelledby="pills-historias-tab">
						<textarea id="historias" name="historias" onkeyup="textAreaAdjust(this)"><?php echo (isset($params['portfolio']))?$params['portfolio']:"" ?></textarea>
					</div>
				</div>
			</div>
		</div>
	</form>
</main>

<script>

window.onload = document.getElementById('foto_perfil').addEventListener("change", function(event) {
	var main_body=document.getElementById('perfilContainer');
	if (document.getElementById('infoMsg')==null) {
		var infoMsg=document.createElement('h4');
		infoMsg.setAttribute("class", "infoMsg");
		infoMsg.setAttribute("id", "infoMsg");
		infoMsg.style.marginBottom = "20px"; 
		infoMsg.innerHTML="<b>Notice:</b> Your profile picture will be updated once you save your changes. You may have to refresh the page for the image to appear.";
		main_body.insertBefore(infoMsg, main_body.firstChild);
	}
});
</script>
<script src="./../web/js/textoenriquecido.js"></script>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
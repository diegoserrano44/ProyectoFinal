<?php 
ob_start();
unset($_SESSION['id_usuario']);
?>
<style>
	* {
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
		margin: 0;
		padding: 0;
	}

	.container {
		position: relative;
		margin-top: 20px;
	}

	.salirContainer {
		width: 40%;
		max-width: 550px;
	}

	@media (min-width : 768px) and (max-width: 991px) {
		.salirContainer {
			width: 50%;
		}
	}

	@media (min-width : 0px) and (max-width: 767px) {
		.salirContainer {
			width: 80%;
			min-width: 290px;
		}
	}
</style>
<main class="container-fluid mainContainer">
	<div class="container bg-light border-2 border-dark rounded-3 pt-4 pb-5 px-5 mb-4 shadow salirContainer">
		<h2 class="text-center fw-bold mt-3 mb-4 text-dark">Has cerrado sesión</h2>
		<a href="index.php?inicio"><button class="btn btn-danger w-100 mx-auto">Volver al Inicio</button></a>
	</div>
</main>
<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>

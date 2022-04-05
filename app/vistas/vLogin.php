<?php ob_start() ?>

<main class="container-fluid">
	<div class="container bg-light border-2 border-dark rounded-3 pt-4 pb-4 px-5 shadow loginContainer">
		<h1 class="text-center fw-bold mb-4">Bienvenido a UNV</h1>
		<?php
		if (!empty($_SESSION['mensaje'])) {
			echo "<h4 class='errorMsg'>" . $_SESSION['mensaje'] . "</h4>";
		}
		if (!empty($params['mensaje'])) {
			echo "<h4 class='errorMsg'>" . $params['mensaje'] . "</h4>";
		}
		if (!empty($errores)) {
			foreach ($errores as $key => $contenido) {
				echo "<p>" . $contenido . "</p>";
			}
		}
		?>
		<form class="needs-validation" method="POST" action="index.php?ctl=entrarUsuario" novalidate>
			<div class="has-validation mt-3 mb-4">
				<label for="Luser" class="form-label fw-bold mb-3 text-dark">Usuario</label>
				<input type="text" class="form-control" name="Luser" id="Luser" <?php echo (isset($params['usuario'])) ? "value='" . $params['usuario'] . "'" : "" ?> required>
				<div class="invalid-feedback">
					Porfavor introduce un nombre de usuario válido.
				</div>
			</div>
			<div class="has-validation mt-3 mb-4">
				<label for="Lpass" class="form-label fw-bold mb-3 text-dark">Contraseña</label>
				<input type="password" class="form-control" name="Lpass" id="Lpass" required>
				<div class="invalid-feedback">
					Porfavor introduce una contraseña válida.
				</div>
			</div>
			<button class="btn my-3 w-100 py-2 fw-bold botonAzul" type="submit" name="login">Iniciar Sesión</button>		
			<?php if($login_button != ""){echo $login_button; }?>	
		</form>
			<a href="index.php?ctl=enviarPass" >He olvidado mi contraseña</a>
	</div>
</main>


<?php $contenido = ob_get_clean() ?>
<?php include __DIR__ . './layout.php' ?>


<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function(form) {
				form.addEventListener('submit', function(event) {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
	})()
</script>
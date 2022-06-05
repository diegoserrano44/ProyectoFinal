<?php 
ob_start();
?>

<main class="container-fluid mainContainer">
	<div class="container bg-light border-2 border-dark rounded-3 pt-4 pb-5 px-5 shadow loginContainer">
		<div class="okMsj"><?php if(isset($params['info'])){
			echo $params['info'];
		}?></div>
		<form class="needs-validation" method="POST" action="index.php?ctl=enviarPass" novalidate>
			<div class="has-validation mt-3 mb-4">
				<label for="email" class="form-label fw-bold mb-3">Email</label>
				<input type="email" class="form-control" name="email" id="email" required>  
				<div class="invalid-feedback">
					Please provide an email.
				</div>
			</div>
			<button class="btn my-3 w-100 py-2 fw-bold botonAzul" type="submit" name="manda">Send</button>
		</form>
	</div>
</main>

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

<?php 


$contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
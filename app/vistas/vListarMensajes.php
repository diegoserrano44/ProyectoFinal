<?php
ob_start();

if(isset($_POST['msj'])){
    echo $_POST['msj'];
}
?>

<h1 class="text-white">My Messages</h1>

<div class="text-white">
<div class="container-fluid ancho accordion" id="mainMessages"></div>
<div class="modal fade" id="replyModal" tabindex="-1"
	aria-labelledby="replyModalLabel" aria-hidden="true">
	<div class="modal-dialog text-dark">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="replyModalLabel">Reply</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"
					aria-label="Close"></button>
			</div>
			<div class="modal-body delModal">
				<div class="form-floating">
					<textarea class="form-control" placeholder=""
						id="replymessage" style="height: 100px"></textarea>
					<label for="replymessage">Message</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn colorSecundario reply">Reply</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1"
	aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog text-dark">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteModalLabel">Delete conversation</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"
					aria-label="Close"></button>
			</div>
			<div class="modal-body delModal">
				<p>Are you sure?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary"
					data-bs-dismiss="modal">No</button>
				<button type="button" class="btn colorSecundario delete">Delete</button>
			</div>
		</div>
	</div>
</div>
</div>
<script>
let user= '<?php echo $_SESSION['id_usuario'];?>';
let nuser= '<?php echo $_SESSION['nombre'];?>';
let container = document.getElementById('mainMessages');
let hilos;

<?php
if (isset($params['hilos'])) {
    ?>hilos= <?php

echo $params['hilos'];
}

?>;

</script>
<script src="./../app/ajax/listarmensajes.js">
</script>
<?php
$contenido = ob_get_clean();

include __DIR__ . '/layout.php'?>
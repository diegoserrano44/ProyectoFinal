<?php ob_start() ?>
<div class="container">
<div class="row">
<?php foreach ($historias as $historia) :?>
		<div class="col-12">
			<div class="card-group">
				<div class="card m-3 p-3 mb-5 rounded sombra">
					<img class="card-img-top" src="../app/categorias_img/<?php echo $historia['categoria_img']?>.png" alt="Card image cap" width="auto" height="">
					<div class="card-body">
						<h5 class="card-title text-dark text-truncate"> <?php echo $historia['titulo'] ?></h5>
						<p class="card-text text-dark text-truncate"> <?php echo $historia['descripcion'] ?></p>
						<div class="d-flex justify-content-between align-items-center bSee">
							<b><p class="card-text text-dark text-truncate"> <?php echo $historia['precio']." €/h"?></p></b>			
							<a href="index.php?ctl=verAnuncio&id=<?php echo $historia['id_anuncio']?>" ><i class="fa-solid fa-arrow-right-long"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
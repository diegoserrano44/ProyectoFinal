<?php ob_start() ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../web/img/slider.jpg" class="d-block w-100" alt="..." height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Iniciate a las experiencias en Realidad Virtual</h5>
        <p>Disfruta de las muchas experiencias en realidad virtual y experimenta nuevas sensaciones.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="../web/img/slider.jpg" class="d-block w-100" alt="..." height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Adquiere unas gafas de realidad virtual</h5>
        <p>Accede a cualquier pagina oficial de cascos de realidad virtual para comprar el tuyo.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="../web/img/slider.jpg" class="d-block w-100" alt="..." height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Algunos cascos de realidad virtual</h5>
        <p>Algunos de los cascos VR que recomendamos para la mejor experiencia son HTC VIVE y OCULUS QUEST 2.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container">
<div class="row p-3">

<div class="card col-md-3" style="border:none; padding:10px;">
  <img src="../web/img/basketball.jpg" class="card-img-top" alt="..." width="" height="">
  <div class="card-body">
    <h5 class="card-title">Basquet VR</h5>
    <p class="card-text">Juego de basquet para marcar la pelota dentro de la canasta, anímate a jugar y divertirte un rato</p>
    <a href="https://ada.is/basketball-demo/" target="_blank" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card col-md-3" style="border:none; padding:10px;">
  <img src="../web/img/basketball.jpg" class="card-img-top" alt="..." width="" height="">
  <div class="card-body">
    <h5 class="card-title">Basquet VR</h5>
    <p class="card-text">Juego de basquet para marcar la pelota dentro de la canasta, anímate a jugar y divertirte un rato</p>
    <a href="https://ada.is/basketball-demo/" target="_blank" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card col-md-3" style="border:none; padding:10px;">
  <img src="../web/img/basketball.jpg" class="card-img-top" alt="..." width="" height="">
  <div class="card-body">
    <h5 class="card-title">Basquet VR</h5>
    <p class="card-text">Juego de basquet para marcar la pelota dentro de la canasta, anímate a jugar y divertirte un rato</p>
    <a href="https://ada.is/basketball-demo/" target="_blank" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card col-md-3" style="border:none; padding:10px;">
  <img src="../web/img/basketball.jpg" class="card-img-top" alt="..." width="" height="">
  <div class="card-body">
    <h5 class="card-title">Basquet VR</h5>
    <p class="card-text">Juego de basquet para marcar la pelota dentro de la canasta, anímate a jugar y divertirte un rato</p>
    <a href="https://ada.is/basketball-demo/" target="_blank" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card col-md-3" style="border:none; padding:10px;">
  <img src="../web/img/basketball.jpg" class="card-img-top" alt="..." width="" height="">
  <div class="card-body">
    <h5 class="card-title">Basquet VR</h5>
    <p class="card-text">Juego de basquet para marcar la pelota dentro de la canasta, anímate a jugar y divertirte un rato</p>
    <a href="https://ada.is/basketball-demo/" target="_blank" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

</div>
</div>



</div>




<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/layout.php' ?>
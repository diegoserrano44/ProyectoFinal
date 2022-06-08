<?php ob_start() ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../web/img/green.jpg" class="d-block w-100" alt="..." height="300px">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="../web/img/green.jpg" class="d-block w-100" alt="..." height="300px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="../web/img/green.jpg" class="d-block w-100" alt="..." height="300px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
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
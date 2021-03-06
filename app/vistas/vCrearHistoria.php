<?php 
ob_start(); 
?>
<body style="background:#c9e265">
<div class="container text-black">
<h1 class="m-5 text-center">UNV HISTORIAS</h1>
<h2>Publica tu historia y transmite a los demás!</h2><br>
<?php 
if(isset($params['mensaje'])){ 
  echo "<div>".$params['mensaje']." <br> </div>";
}

?>
<form class="row g-3 needs-validation" method="POST" action="index.php?ctl=crearHistoria" enctype="multipart/form-data" novalidate>
  <div class="col-md-4">
    <label for="titulo" class="form-label">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="cTituloAnuncio" max=100 required>
    <div class="valid-feedback">
      Genial!
    </div>
    <div class="invalid-feedback">
    Please select the language in which the class will be held
    </div>
  </div>
  <div class="col-md-4">
    <label for="idioma" class="form-label">Idioma</label>
    <input type="text" class="form-control" id="idioma" name="idioma" required>
    <div class="valid-feedback">
    Genial!
    </div>
    <div class="invalid-feedback">
    Please select the language in which the class will be held
    </div>
  </div>
  
  <div class="col-md-12">
    <label for="contenidoHistoria" class="form-label">Contenido de la historia</label>
    <textarea class="form-control text-black parrafo" name="contenidoHistoria" id="contenidoCrearHistoria" rows="6"></textarea>
    <div class="valid-feedback">
    Genial!
    </div>
    <div class="invalid-feedback">
      Explain in detail what you are going to offer.
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Aceptar términos y condiciones
      </label>
      <div class="valid-feedback">
      Genial!
    </div>
      <div class="invalid-feedback">
        Debes aceptar los términos y condiciones
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <div class="p-2">
    <a class="btn btn-danger" href="index.php?ctl=inicio">Volver a Inicio</a></button>
    <button class="btn boton" type="submit" name="crearHistoria">Publicar la historia</button>
  </div>
  </div>
</form>
</div>
 <?php $contenido = ob_get_clean() ?>
 <?php include __DIR__ . '/layout.php' ?>

 <script>
   // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
 </script>
 </body>
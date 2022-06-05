<?php 
ob_start(); 
?>
<body style="background:#c9e265">
<div class="container text-black">
<h1 class="m-5 text-center">UNV FORO</h1>
<h2>Crea un tema de debate en una de las categorías y empezar a hablar!</h2><br>
<?php 
if(isset($params['mensaje'])){ 
  echo "<div>".$params['mensaje']." <br> </div>";
}

?>
<form class="row g-3 needs-validation" method="POST" action="index.php?ctl=crearTema" enctype="multipart/form-data" novalidate>
  <div class="col-md-6">
    <label for="cTituloAnuncio" class="form-label">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="cTituloAnuncio" max=100 required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
    Please select the language in which the class will be held
    </div>
  </div>
  <div class="col-md-6">
  <div class="container">
  <ul class="ks-cboxtags">
 <?php 
   $num=1;
  foreach (Config::$listCategories as $categoria) {
    if ($categoria != "") {
      echo "<li><input type=\"radio\" name=\"form-select[]\" id=\"checkbox$num\" value=\"$num\"><label for=\"checkbox$num\">$categoria</label></li>";     
      $num++;
    }
  }
  ?>
  </ul>
  </div>
  </div>
  
  <div class="col-md-12">
    <label for="cContenidoAnuncio" class="form-label">Contenido del tema</label>
    <textarea id="crearTema" name="contenidoTema" rows="6" cols="50"></textarea>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Explain in detail what you are going to offer.
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Accept terms and conditions
      </label>
      <div class="valid-feedback">
      Looks good!
    </div>
      <div class="invalid-feedback">
        You must agree to the terms before proceeding
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    <div class="p-2">
    <a class="btn btn-danger" href="index.php?ctl=inicio">Volver a Inicio</a></button>
    <button class="btn colorSecundario" type="submit" name="crearTema">Publicar el tema en el foro</button>
  </div>
  </div>
</form>
</div>
<!-- <script src="./../web/js/textoenriquecido.js"></script> -->

 <?php $contenido = ob_get_clean() ?>
 <?php include __DIR__ . '/layout.php' ?>

 <script src="./../web/js/textoenriquecido.js"></script>
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
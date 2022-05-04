<?php ob_start() ?>

<div class="row" style="--bs-gutter-x: 0;">
<div class="d-flex justify-content-center">
      <button type="button" class="btn colorSecundario" data-bs-toggle="modal" data-bs-target="#contactModal">Contact</button>
      </div>
</div>



<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './layout.php' ?>
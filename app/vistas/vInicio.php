<?php ob_start();
if (isset($_SESSION['mensaje'])) {
    echo "<h2 class='display-6'>" . $_SESSION['mensaje'] . "</h2>";
}
if (isset($params['mensaje'])) {
    echo "<h2 class='display-6'>" . $params['mensaje'] . "</h2>";
}
if (! empty($errores)) {
    foreach ($errores as $key=>$contenido){
        echo "<p>".$contenido."</p>";
    }

}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="./../app/ajax/tinyinicio.js"></script>

<div class="jumbotrons jumbotron p-5 bg-dark text-white" style="width:100%;">
         <div class="container-fluid py-5">
            <div class="container">
               <h1 class="display-5 fw-bold text-center">Welcome to Happy Ever Learning Programming</h1>
               <p class="col-md-12 fs-5 text-center">Search your announcement or place yours</p>
               <form method="POST" action="index.php?ctl=buscar" class="form-buscador d-flex justify-content-center p-2">
                    <label for="buscador"></label>
                    <input type="text" id="buscador" name="buscador" placeholder="Search your class" required>
                    <button type="submit" class="boton-buscador" name="buscar" value="Search"><i class="fa fa-search"></i></button>
               </form>
            </div>
         </div>
      </div>

<section style="background-color: #2b2d30;">
<div class="col-12 text-center p-4 text-white">
    <h2>Why learning a programming language?</h2>
</div>

<div class="container mb-4 mt-4 text-white">
  <div class="row d-flex">
    <div class="col-md-4 col-sm-12 col-xs-12">
      <img class="gifindex" src="../app/index.gif" width="100%" height="100%">
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12 d-flex align-items-center">
        <p>Why learn just one programming language when there are so many available to you? Be ambitious and sign
        up for classes in all the languages you want to learn, with the best teachers and online assistance from
        Happy Ever Learning Programming.
        Why learn just one programming language when there are so many available to you? Be ambitious and sign
        up for classes in all the languages you want to learn, with the best teachers and online assistance from
        Happy Ever Learning Programming.
        </p>
    </div>
  </div>
</div>

<div class="col-md-12 p-4 text-white">
<h2 class="text-center">Most popular languages</h2>
<div class="d-flex justify-content-center">
    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
</div>
</div>
</section>

<div class="jumbotron p-5 bg-dark text-white">
        <div class="container-fluid py-5">
            <div class="row d-flex align-items-center">
              <div class="col-md-6 col-xs-12">
               <h2 class="display-5 fw-bold">Sign Up<br> and Start <br>your classes now!</h2><br>
               <a type="button" href="index.php?ctl=registrarUsuario" class="btn btn-light">Sign Up</a>
              </div>
              <!-- <div class="col-md-6 col-xs-12 pt-4">
               <textarea id="inicio">
                 <h2>START OFFERING YOUR PRIVATE LESSONS</h2>
                 <p>Sign up and share your skills with others in need.</p>
                 <p>You can create an ad about your skills and share it with others, or if you want to search for private lessons, you can do it! Use the search bar to do so!</p>
                 <p>Create your profile and start <b>right now!</b></p>
               </textarea>
              </div> -->
            </div>
      </div>
</div>

<section class="text-white p-4 colorSecundario">
  <div class="row col-md-12 col-sm-12 p-4">
    <div class="row col-md-6 col-sm-12 col-xs-12">
        <h3 class="d-flex justify-content-center">What we have to offer?</h3>
        <p class="text-center">Our platform is suitable for any user<br>
        Take part in private lessons with the best teachers<br>
        Programming teachers in the area<br><br>We value our customers, that's why we want to guarantee the best service.<br>
        +++
        </p><br><br><br>
    </div>

<div class="col-md-6 col-sm-12 col-xs-12">
<ul class="list-group list-group bg-dark">
  <li class="list-group-item list-group-item-dark"><i class="bi bi-star-fill"></i> Private Teachers</li>
  <li class="list-group-item list-group-item-dark"><i class="bi bi-star-fill"></i> Online Lessons</li>
  <li class="list-group-item list-group-item-dark"><i class="bi bi-star-fill"></i> Qualified professionals</li>
  <li class="list-group-item list-group-item-dark"><i class="bi bi-star-fill"></i> Teacher-student contact</li>
  <li class="list-group-item list-group-item-dark"><i class="bi bi-star-fill"></i> Best Ratings</li>
</ul>
</div>
</div>
</section>

<script src="../app/ajax/grafico.js"></script>
<?php $contenido = ob_get_clean() ?>
<?php include __DIR__ . './layout.php' ?>
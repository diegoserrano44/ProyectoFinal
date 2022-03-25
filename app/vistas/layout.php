<!DOCTYPE html>
<html>
<head>
<title>Una-Nueva-Vida</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">       
<!-- <script src="https://cdn.tiny.cloud/1/vocxbael83ynt7vuj9xksifglo6tuwy1ik1zunrl6hsflrg0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Press+Start+2P&display=swap" rel="stylesheet"> -->

<link href="../web/css/style.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand navTitle" href="index.php">Una Nueva Vida</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_GET['ctl'])) {
                    if((($_GET['ctl'] != 'inicio') || ($_GET['ctl'] == ""))){?>
                <!-- <form class="d-flex" method="POST" action="index.php?ctl=buscar">
                <input class="navSearch form-control me-2 rounded-pill bg-dark border text-light border-secondary "  name="buscador" type="search" placeholder="Search ..." aria-label="Search">
                <button class="btn btn-outline-success rounded-circle" type="submit" name="buscar" value="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form> -->
                <?php }};?>
                </div>
                <div class="d-lg-flex align-items-center">
                <?php 
                if (isset($_SESSION['id_usuario'])) {
                    echo "<a class=\"nav-link nav-item text-white\" href=\"index.php?ctl=listarAnuncios\">Historias</a>";
                    echo "<a class=\"nav-link nav-item text-white\" href=\"index.php?ctl=crearAnuncio\">Foro</a>";
                    echo "<a class=\"nav-link nav-item text-white\" href=\"index.php?ctl=listarMensaje\">Mensajes</a>";
                    echo "<a class=\"nav-link nav-item text-white\" href=\"index.php?ctl=verPerfil&id=" . $_SESSION['id_usuario'] . "\">Perfil</a>";
                    echo "<a class=\"nav-link nav-item text-white\" href=\"index.php?ctl=salirUsuario\"><i class=\"fas fa-sign-out-alt\"></i></a>";
                }else{
                    echo "<a class=\"nav-link nav-item text-white\" href=\"index.php?ctl=listarAnuncios\">Historias</a>";
                    echo "<a class=\"nav-link nav-item text-white\" href=\"index.php?ctl=crearAnuncio\">Foro</a>";
                    echo "<a class=\"nav-link nav-item bg-light textSecundario rounded-pill\" href=\"index.php?ctl=entrarUsuario\"><i class=\"fas fa-user-circle\"></i> Login</a>";
                    echo "<a class=\"nav-link nav-item text-white\" href=\"index.php?ctl=registrarUsuario\">Sign up</a>";
                }
                ?>
                </div>
            </div>
        </div>
    </nav>
<div class="text-black" id="contenido">

<?php echo $contenido ?>

</div>
<footer class="bg-dark text-white d-flex flex-column-reverse flex-md-row p-4 w-100 align-items-center justify-content-between">
            <div>
                <ul class="list-group list-group-flush">
                    <h3>UNV Developer</h3>
                    <li class="list-group-item listaFooter">Diego Serrano</li>
                </ul>
            </div>
            <div class="p-4">
                <a class="text-white m-3 text-decoration-none" href="">2022 - unanuevavida.com</a>
            </div>
            <div class="d-flex flex-column justify-content-center">
            <div>
                <a href="#"><i class="fa-3x fa-brands fa-instagram m-3 textSecundario"></i></a>
                <a href="#"><i class="fa-3x fa-brands fa-linkedin m-3 textSecundario"></i></a>
                <a href="#"><i class="fa-3x fa-brands fa-youtube m-3 textSecundario"></i></a>
            </div>

        <?php        
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol']==1) {
                echo "<button type=\"button\" class=\"btn secundarioDark m-3\" data-bs-toggle=\"modal\" data-bs-target=\"#contactAdmin\">Message to admin</button>";
            };
        }?>
               
            </div>
        </div>
</footer>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


<div class="modal fade" id="contactAdmin" tabindex="-1" aria-labelledby="contactAdminLabel" aria-hidden="true">
  <div class="modal-dialog" width="fit-content">
    <div class="modal-content text-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="contactAdminLabel">Send message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class=" " action="index.php?ctl=mandarMensaje&id=1" method="POST">
        <input class="asuntoMensaje" type="text" name="asunto" placeholder="Subject"><br><br>
        <textarea class="contenidoMensaje" rows="6" placeholder="Message" name="mensaje"></textarea>
      </div>
      <div class="modal-footer">
        <input type="submit" name="enviaContacto" value="Send message" class="btn colorSecundario">
        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</a>
      </form>
      </div>
    </div>
  </div>
</div>
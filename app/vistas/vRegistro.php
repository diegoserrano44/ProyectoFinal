<?php ob_start() ?>

<main class="container-fluid">
    <div class="container bg-light border-2 border-dark rounded-3 pt-4 pb-5 px-5 shadow registroContainer">
        <h1 class="text-center fw-bold mt-3 mb-4">Registro</h1>
        <?php
        if (!empty($params['mensaje'])) {
            echo "<h4 class='errorMsg'>" . $params['mensaje'] . "</h4>";
            if (!empty($params['errores'])) {
                echo "<ul>";
                foreach ($errores as $key => $contenido) {
                    echo "<li>" . $contenido . "</li>";
                }
                echo "</ul>";
            }
        }
        ?>
        <form class="needs-validation" method="POST" action="index.php?ctl=registrarUsuario" novalidate>
            <div class="container-fluid">
                <div class="row row-cols-lg-3 has-validation mt-3 mb-4 justify-content-center">
                    <div class="col-lg-2">
                        <span class="d-inline-block fw-bold mb-3">Nombre</span>
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="First name" required>
                        <div class="invalid-feedback">
                            Please provide a name.
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Last name">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="row row-cols-lg-3 has-validation mt-3 mb-4 justify-content-center">
                    <div class="col-lg-2">
                        <span class="d-inline-block form-label fw-bold mb-3">Fecha de Nacimiento</span>
                    </div>
                    <div class="col-lg-9">
                        <input type="date" class="form-control" name="fnacimiento" id="fnacimiento" required>
                        <div class="invalid-feedback">
                            Please provide your date of birth.
                        </div>
                    </div>
                </div>
                <div class="row row-cols-lg-3 has-validation mt-3 mb-4 justify-content-center">
                    <div class="col-lg-2">
                        <span class="d-inline-block form-label fw-bold mb-3">Información de Contacto</span>
                    </div>
                    <div class="col-lg-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email.
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <input type="tel" class="form-control" name="tel" id="tel" placeholder="Phone number">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="row row-cols-lg-3 has-validation mt-3 mb-1 justify-content-center">
                    <div class="col-lg-2">
                        <span class="d-inline-block form-label fw-bold mb-3">Usuario</span>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="usuario" id="usuario" required  onkeyup="filtra(this.value)">
                        <div class="invalid-feedback">
                            Please provide a username.
                        </div>
                        
                    </div>
                </div>
                <div class="mt-1" id="resultado"></div>
                <div class="row row-cols-lg-3 has-validation mt-3 mb-4 justify-content-center">
                    <div class="col-lg-2">
                        <span class="d-inline-block form-label fw-bold mb-3">Contraseña</span>
                    </div>
                    <div class="col-lg-4">
                        <input type="password" class="form-control" name="password" id="password" required>
                        <div class="invalid-feedback">
                            Please provide a password.
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" name="repite_password" id="repite_password" placeholder="Retype password" required>
                        <div class="invalid-feedback">
                            Please provide a password.
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn my-3 w-100 py-2 fw-bold botonAzul" type="submit" name="sign_up">Sign up</button>
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
    
            function filtra(str) {

            if (str.length == 0) {
                //document.getElementById("resultado").innerHTML = "bien";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    		ms= JSON.parse(this.responseText);
                        if(ms !== false){                        
                         	document.getElementById("resultado").innerHTML = "This user already exists.";
                            document.getElementById("resultado").style.color="red";
                            document.getElementById("usuario").style.backgroundColor="pink";

                        }else{
                            document.getElementById("resultado").innerHTML = "";
                            document.getElementById("usuario").style.backgroundColor="white";
                        }
                    }
                };
                xmlhttp.open("GET", "index.php?ctl=existeUsuario&id=" + str, true);
                xmlhttp.send();
            }
        }
        
        
</script>
<?php $contenido = ob_get_clean() ?>
<?php include __DIR__ . './layout.php' ?>
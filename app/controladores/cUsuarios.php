<?php
require_once './../vendor/autoload.php';

class cUsuarios
{

    public function entrarUsuario()
    {
        $params = array(
            'mensaje' => '',
            'usuario' => '',
            'password' => ''
        );


        $google_client = new Google_Client();
        $google_client->setClientId(Config::$clientID);
        $google_client->setClientSecret(Config::$clientSecret);
        $google_client->setRedirectUri(Config::$redirectUri);
        $google_client->addScope("email");
        $google_client->addScope("profile");

        if (isset($_GET["code"])) {

            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            if (!isset($token['error'])) {

                $google_client->setAccessToken($token['access_token']);

                $_SESSION['access_token'] = $token['access_token'];

                $google_service = new Google_Service_Oauth2($google_client);

                $data = $google_service->userinfo->get();

                if (!empty($data['given_name'])) {
                    $_SESSION['user_first_name'] = $data['given_name'];
                }

                if (!empty($data['family_name'])) {
                    $_SESSION['user_last_name'] = $data['family_name'];
                }

                if (!empty($data['email'])) {
                    $_SESSION['user_email_address'] = $data['email'];
                }


                if (!empty($data['picture'])) {
                    $_SESSION['user_image'] = $data['picture'];
                }

                $u = new Usuario();
                $resultado = $u->existeEmail($_SESSION['user_email_address']);

                if ($resultado != false) {
                    Sesion::loginSesion(settype($resultado['rol'], "integer"), $resultado);
                    header('location: index.php?ctl=inicio');
                } else {
                    header('location: index.php?ctl=registroGoogle');
                }
            }
        } else {

            $login_button = '<a class="btn my-3 w-100 py-2 btn-lg btn-google btn-block text-uppercase btn-outline-white" href="' . $google_client->createAuthUrl() . '"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Login using Google</a>';
        }
        // Una vez se mandan los datos se comienzan con las comprobaciones
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {
                $usuario = recoge('Luser');
                $password = recoge('Lpass');

                $validacion = new Validacion();
                $datos['usuario'] = $usuario;
                $datos['password'] = $password;

                $regla = array(
                    array(
                        'name' => 'usuario',
                        'regla' => 'noEmpty'
                    ),
                    array(
                        'name' => 'password',
                        'regla' => 'noEmpty'
                    )
                );

                if ($validacion->rules($regla, $datos) == true) {
                    $m = new Usuario();
                    $row = $m->login($usuario, $password);
                    if ($row != false) {
                        // Si el resultado es la fila de datos del usuario, se inicia sesión
                        if ($row['rol'] >= 1) {
                            Sesion::loginSesion(settype($row['rol'], "integer"), $row);
                            header('Location: index.php?ctl=inicio');
                        } else {
                            $params = array(
                                'mensaje' => 'The user ' . $usuario . ' can\'t access through here.',
                                'usuario' => $usuario,
                                'password' => ''
                            );
                            require __DIR__ . '/../vistas/vLogin.php';
                        }
                    } else { // Guarda los valores introducidos en el formulario para mostrarlos junto con el error
                        $params = array(
                            'mensaje' => 'The user ' . $usuario . ' doesn\'t exist or the password is incorrect.',
                            'usuario' => $usuario,
                            'password' => ''
                        );
                        require __DIR__ . '/../vistas/vLogin.php';
                    }
                } else {
                    $params = array(
                        'mensaje' => 'The data is incorrect, please check your fields.',
                        'usuario' => $usuario,
                        'password' => ''
                    );
                    require __DIR__ . '/../vistas/vLogin.php';
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
                header('Location: index.php?ctl=error');
            }
        } else {
            require __DIR__ . '/../vistas/vLogin.php';
        }
    }

    public function entrarAdmin()
    {
        $params = array(
            'mensaje' => '',
            'usuario' => '',
            'password' => ''
        );

        // Una vez se mandan los datos se comienzan con las comprobaciones
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $usuario = recoge('Luser');
                $password = recoge('Lpass');

                $validacion = new Validacion();
                $datos['usuario'] = $usuario;
                $datos['password'] = $password;

                $regla = array(
                    array(
                        'name' => 'usuario',
                        'regla' => 'noEmpty'
                    ),
                    array(
                        'name' => 'password',
                        'regla' => 'noEmpty'
                    )
                );

                if ($validacion->rules($regla, $datos) === true) {
                    $m = new Usuario();
                    $row = $m->login($usuario, $password);
                    if ($row != false) {
                        // Si el resultado es la fila de datos del usuario, se inicia sesión
                        if ($row['rol'] == 2) {
                            Sesion::loginSesion(settype($row['rol'], "integer"), $row);
                            header('Location: index.php?ctl=inicioAdmin');
                        } else {
                            $params = array(
                                'mensaje' => 'The user ' . $usuario . ' can\'t access through here.',
                                'usuario' => $usuario,
                                'password' => ''
                            );
                            require __DIR__ . '/../vistas/vLoginAdmin.php';
                        }
                    } else { // Guarda los valores introducidos en el formulario para mostrarlos junto con el error
                        $params = array(
                            'mensaje' => 'The user ' . $usuario . ' doesn\'t exist or the password is incorrect.',
                            'usuario' => $usuario,
                            'password' => ''
                        );
                        require __DIR__ . '/../vistas/vLoginAdmin.php';
                    }
                } else {
                    $params = array(
                        'mensaje' => 'The data is incorrect, please check your fields.',
                        'usuario' => $usuario,
                        'password' => ''
                    );
                    require __DIR__ . '/../vistas/vLoginAdmin.php';
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
                header('Location: index.php?ctl=error');
            }
        } else {
            require __DIR__ . '/../vistas/vLoginAdmin.php';
        }
    }

    public function registrarUsuario()
    {
        $params = array(
            'mensaje' => '',
            'usuario' => '',
            'password' => '',
            'nombre' => '',
            'apellidos' => '',
            'email' => '',
            'telefono' => '',
            'fecha_nac' => '',
            'foto_perfil' => '',
            'rol' => ''
        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $usuario = recoge('usuario');
                $password = recoge('password');
                $passwordR = recoge('repite_password');
                $nombre = recoge('nombre');
                $apellidos = recoge('apellidos');
                $email = recoge('email');
                $telefono = recoge('tel');
                $fecha_nac = recoge('fnacimiento');

                $validacion = new Validacion();
                $datos['usuario'] = $usuario;
                $datos['password'] = $password;
                $datos['nombre'] = $nombre;
                $datos['apellidos'] = $apellidos;
                $datos['email'] = $email;
                $datos['telefono'] = $telefono;
                $datos['fecha_nac'] = $fecha_nac;

                $regla = array(
                    array(
                        'name' => 'usuario',
                        'regla' => 'noEmpty'
                    ),
                    array(
                        'name' => 'password',
                        'regla' => 'noEmpty'
                    ),
                    array(
                        'name' => 'nombre',
                        'regla' => 'noEmpty'
                    ),
                    array(
                        'name' => 'email',
                        'regla' => 'noEmpty'
                    ),
                    array(
                        'name' => 'fecha_nac',
                        'regla' => 'noEmpty'
                    )
                );

                if (!empty($apellidos)) {
                    $regla[0] += array(
                        'name' => 'apellidos',
                        'regla' => 'noEmpty'
                    );
                }

                if (!empty($telefono)) {
                    $regla[0] += array(
                        'name' => 'telefono',
                        'regla' => 'noEmpty'
                    );
                }

                if ($validacion->rules($regla, $datos) === true && $password == $passwordR) {
                    $params = array(
                        'mensaje' => '',
                        'usuario' => $usuario,
                        'password' => crypt_password($password),
                        'nombre' => $nombre,
                        'apellidos' => $apellidos,
                        'email' => $email,
                        'telefono' => $telefono,
                        'fecha_nac' => $fecha_nac,
                        'foto_perfil' => Config::$ruta_imagenes . Config::$default_foto,
                        'rol' => 1
                    );
                    $m = new Usuario();
                    if ($m->existeUsuario($usuario) == false) {
                        $id_usuario = $m->insertUsuario($params);
                        if ($id_usuario != false) {
                            $token = $m->crearToken($id_usuario);
                            if ($token != false) {
                                $mensaje = emailToken($token);
                                enviarMail($email, 'User account activation', $mensaje);
                            }
                            header('Location: index.php?ctl=entrarUsuario');
                        } else {
                            $params = array(
                                'mensaje' => 'Something went wrong during the registration, please try again.',
                                'usuario' => $usuario,
                                'password' => '',
                                'nombre' => $nombre,
                                'apellidos' => $apellidos,
                                'email' => $email,
                                'telefono' => $telefono,
                                'fecha_nac' => $fecha_nac,
                                'foto_perfil' => '',
                                'rol' => ''
                            );
                            require __DIR__ . '/../vistas/vRegistro.php';
                        }
                    } else {
                        $params = array(
                            'mensaje' => 'The user ' . $usuario . ' already exists.',
                            'usuario' => $usuario,
                            'password' => '',
                            'nombre' => $nombre,
                            'apellidos' => $apellidos,
                            'email' => $email,
                            'telefono' => $telefono,
                            'fecha_nac' => $fecha_nac,
                            'foto_perfil' => '',
                            'rol' => ''
                        );
                        require __DIR__ . '/../vistas/vRegistro.php';
                    }
                } else {
                    $params = array(
                        'mensaje' => 'The data is incorrect, please check your fields.',
                        'usuario' => $usuario,
                        'password' => '',
                        'nombre' => $nombre,
                        'apellidos' => $apellidos,
                        'email' => $email,
                        'telefono' => $telefono,
                        'fecha_nac' => $fecha_nac,
                        'foto_perfil' => '',
                        'rol' => ''
                    );
                    require __DIR__ . '/../vistas/vRegistro.php';
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
                header('Location: index.php?ctl=error');
                var_dump($params);
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
                header('Location: index.php?ctl=error');
                var_dump($params);
            }
        } else {
            require __DIR__ . '/../vistas/vRegistro.php';
        }
    }

    public function registroGoogle()
    {
        $params['mensaje']= "";
        if (isset($_POST['bUsername'])) {
            $usuario = recoge('nameUser');
            $pass = crypt_password($_SESSION['user_email_address']);
            $datos = array('usuario' => $usuario, 'password' => $pass, 'nombre' => $_SESSION['user_first_name'], 'apellidos' => $_SESSION['user_last_name'], 'email' => $_SESSION['user_email_address'], 'foto_perfil' => $_SESSION['user_image'], 'rol' => 1);
            $u = new Usuario();
            $control=$u->existeUsuario($usuario);
            
            if ($control == false) {              
                $params['mensaje']= "entra";
                if ($resultado = $u->insertUsuario($datos, 1)) {
                    $rol = 1;
                    $datos['id_usuario'] = $resultado;
                    Sesion::loginSesion(settype($rol, "integer"), $datos);
                    header('location: index.php?ctl=inicio');
                }
            }else{
                $params['array']= $control;
                $params['mensaje']= "Elige otro nombre de usuario.";                
            }
        }
        require __DIR__ . '/../vistas/vNombreUsuario.php';
    }

    public function enviaActivacion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $email = recoge('email');
                $validacion = new Validacion();
                $datos['email'] = $email;
                $regla = array(
                    array(
                        'name' => 'email',
                        'regla' => 'noEmpty,email'
                    )
                );
                if (($validacion->rules($regla, $datos) === true)) {
                    $m = new Usuario();
                    $id_usuario = $m->existeEmail($email);
                    if ($id_usuario != false) {
                        $token = $m->crearToken($id_usuario);
                        if ($token != false) {
                            $mensaje = emailToken($token);
                            enviarMail($email, 'User account activation', $mensaje);
                        }
                        header('Location: index.php?ctl=entrarUsuario');
                    } else {
                        $params = array(
                            'mensaje' => 'Your email isn\'t registered on our database.'
                        );
                        require __DIR__ . '/../vistas/vLogin.php';
                    }
                } else {
                    $params = array(
                        'mensaje' => 'The data is incorrect.'
                    );
                    require __DIR__ . '/../vistas/vLogin.php';
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
                header('Location: index.php?ctl=error');
            }
        } else {
            require __DIR__ . '/../vistas/vEnviaActivacion.php';
        }
    }

    public function activarUsuario()
    {
        try {
            if (!isset($_GET['id'])) {

                throw new Exception('Page not found');
            }
            $token = recoge('id');
            $user = new Usuario();
            if (($datos = $user->devolverToken($token))) {
                $fecha_act = strtotime(date('Y-m-d'), time());
                if ($fecha_act < strtotime($datos['fecha'])) {
                    if ($user->activarUsuario($datos['id_user'])) {
                        $user->deleteToken($datos['id_user']);
                        $params['mensaje'] = "User activated";
                    }
                } else {
                    $params['mensaje'] = "The link has expired. Request a new one.";
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vActivarUsuario.php';
    }

    public function pidePassword()
    {
        require __DIR__ . '/../vistas/vEnviaActivacion.php';
    }

    public function enviarPass()
    {
        if (isset($_POST['manda'])) {
            $email = $_POST['email'];
            $u = new Usuario();
            $validacion = new Validacion();
            $datos['email'] = $email;
            $regla = array(
                    array(
                        'name' => 'email',
                        'regla' => 'noEmpty,email'
                    )
                );

               
            try {
                if(($validacion->rules($regla,$datos)) === true){

                if ($id = $u->existeEmail($email)) {
                    $token = $u->crearToken($id['id_usuario']);
                    if ($token != false) {
                        $mensaje = emailPassword($token);
                        enviarMail($email, 'Forgotten password', $mensaje);
                        $params['info'] = "Email sent";
                    }
                } else {
                    $params['mensaje'] = "Your email isn't registered in our database";
                }
                }else{
                    $params['mensaje']="Must be an email.";
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
                header('Location: index.php?ctl=error');
            }
        
        }

        require __DIR__ . '/../vistas/vEnviaActivacion.php';
    }

    public function recordarPassword()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Page not found');
            }
            $token = recoge('id');
            $user = new Usuario();
            if (($datos = $user->devolverToken($token))) {
                $fecha_act = strtotime(date('Y-m-d'), time());
                if ($fecha_act < strtotime($datos['fecha'])) {
                    $_SESSION['token'] = $datos['id_user'];
                }
            } else {
                $params['mensaje'] = "The link has expired. Request a new one.";
                // habría que mandarlo a una página de error
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vRecordarPassword.php';
    }

    public function cambiarPassword()
    {
        if (isset($_POST['rPass'])) {
            $datos = $_SESSION['token'];
            $pass1 = recoge('password');
            $pass2 = recoge('repeatPassword');
            if ($pass1 == $pass2) {
                $password = crypt_password($pass1);
                $cambia = array(
                    'id' => $datos,
                    'password' => $password
                );
                $user = new Usuario();
                if ($user->updateUsuario($cambia)) {
                    $user->deleteToken($datos);
                    $params['mensajeInfo'] = "Password changed";
                    header('location:index.php?ctl=entrarUsuario');
                }
            } else {
                $params['mensajeError'] = "Both passwords have to be the same.";
            }
        }

        require __DIR__ . './../vistas/vRecordarPassword.php';
    }

    public function listarUsuarios()
    {
        try {
            $usuario = new Usuario();
            $datos = $usuario->listarUsuarios();
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../vistas/vListarUsuarios.php';
    }

    public function salirUsuario()
    {
        try {
            Sesion::cerrarSesion();
        } catch (Exception $e) {
            // No hace nada con la excepción
        }
        require __DIR__ . '/../vistas/vSalirUsuario.php';
    }

    public function verPerfil()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Page not found');
            } else {
                $id = $_GET['id'];
                $usuario = new Usuario();
                $params = $usuario->getUsuario($id);
                if ($id!=$_SESSION['id_usuario']) {
                    $params['telefono']="*********";
                    $params['email']="*********";
                }
                $a = new Historia();
                $params['anuncios'] = $a->listarHistoriasUsuario($id);
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../vistas/vVerPerfil.php';
    }

    public function modificarPerfil()
    {
        try {
            $usuario = new Usuario();
            $params = $usuario->getUsuario($_SESSION['id_usuario']);

            $errores = [];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $params_aux = array(
                    'nombre' => recoge('nombre'),
                    'apellidos' => recoge('apellidos'),
                    'email' => recoge('email'),
                    'telefono' => recoge('tel'),
                    'fecha_nac' => recoge('fNacimiento'),
                    'foto_perfil' => $_FILES['foto_perfil'],
                    'descripcion' => recogeEnriquecido('descripcion'),
                    'portfolio' => recogeEnriquecido('portfolio')
                );

                $validacion = new Validacion();
                $datos['nombre'] = $params_aux['nombre'];
                $datos['apellidos'] = $params_aux['apellidos'];
                $datos['email'] = $params_aux['email'];
                $datos['telefono'] = $params_aux['telefono'];
                $datos['fecha_nac'] = $params_aux['fecha_nac'];
                $datos['foto_perfil'] = $params_aux['foto_perfil'];
                $datos['descripcion'] = $params_aux['descripcion'];
                $datos['portfolio'] = $params_aux['portfolio'];

                $regla = array(
                    array(
                        'name' => 'nombre',
                        'regla' => 'noEmpty,texto'
                    ),
                    array(
                        'name' => 'email',
                        'regla' => 'noEmpty,email'
                    ),
                    array(
                        'name' => 'fecha_nac',
                        'regla' => 'noEmpty,fecha'
                    )
                );

                if (!empty($params_aux['apellidos'])) {
                    $regla[0] += array(
                        'name' => 'apellidos',
                        'regla' => 'noEmpty,texto'
                    );
                }

                if (!empty($params_aux['telefono'])) {
                    $regla[0] += array(
                        'name' => 'telefono',
                        'regla' => 'noEmpty,telefono'
                    );
                }

                if (!empty($params_aux['foto_perfil'])) {
                    $regla[0] += array(
                        'name' => 'foto_perfil',
                        'regla' => 'noEmpty,imagen'
                    );
                }

                if (!empty($params_aux['descripcion'])) {
                    $regla[0] += array(
                        'name' => 'descripcion',
                        'regla' => 'noEmpty'
                    );
                }

                if (!empty($params_aux['portfolio'])) {
                    $regla[0] += array(
                        'name' => 'portfolio',
                        'regla' => 'noEmpty'
                    );
                }

                if ($validacion->rules($regla, $datos) == true) {
                    if (!empty($params_aux['foto_perfil'])) {
                        $foto_perfil = cFile('foto_perfil', 'foto_perfil', $errores, Config::$ruta_imagenes, Config::$extensionesValidas, Config::$size, $_SESSION['usuario'], true);
                        if ($foto_perfil) {
                            $params_aux['foto_perfil'] = $foto_perfil;
                        } else {
                            $params_aux['foto_perfil'] = $params['foto_perfil'];
                            $params['mensaje'] = "The profile picture couldn't be updated, please try again.";
                        }
                    }
                    if ($params_aux['foto_perfil']) {
                        if ($usuario->updateUsuario($params_aux)) {
                            header("location: index.php?ctl=verPerfil&id=" . $_SESSION['id_usuario']);
                        } else {
                            $params = array(
                                'mensaje' => 'Something went wrong.',
                                'nombre' => $params_aux['nombre'],
                                'apellidos' => $params_aux['apellidos'],
                                'email' => $params_aux['email'],
                                'telefono' => $params_aux['telefono'],
                                'fecha_nac' => $params_aux['fecha_nac'],
                                'descripcion' => $params_aux['descripcion'],
                                'portfolio' => $params_aux['portfolio'],
                                'usuario' => $params['usuario'],
                                'foto_perfil' => $params['foto_perfil']
                            );
                        }
                    } else {
                        $params = array(
                            'mensaje' => 'Something went wrong.',
                            'nombre' => $params_aux['nombre'],
                            'apellidos' => $params_aux['apellidos'],
                            'email' => $params_aux['email'],
                            'telefono' => $params_aux['telefono'],
                            'fecha_nac' => $params_aux['fecha_nac'],
                            'descripcion' => $params_aux['descripcion'],
                            'portfolio' => $params_aux['portfolio'],
                            'usuario' => $params['usuario'],
                            'foto_perfil' => $params['foto_perfil']
                        );
                    }
                } else {
                    $params = array(
                        'mensaje' => 'The data is incorrect, please check your fields.',
                        'nombre' => $params_aux['nombre'],
                        'apellidos' => $params_aux['apellidos'],
                        'email' => $params_aux['email'],
                        'telefono' => $params_aux['telefono'],
                        'fecha_nac' => $params_aux['fecha_nac'],
                        'descripcion' => $params_aux['descripcion'],
                        'portfolio' => $params_aux['portfolio'],
                        'usuario' => $params['usuario'],
                        'foto_perfil' => $params['foto_perfil']
                    );
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../vistas/vModificarPerfil.php';
    }

    public function eliminarPerfil()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Page not found');
            }
            $id = recoge('id');
            $usuario = new Usuario();
            $params = $usuario->getUsuario($id);

            if ($_SESSION['rol'] != 2) {
                header('Location: index.php?ctl=error');
            } else {
                $result = $usuario->deleteUsuario($id);
                if ($result) {
                    header("Location: index.php?ctl=listarUsuarios");
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        require __DIR__ . '/../vistas/vEliminarPerfil.php';
    }
}

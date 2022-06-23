<?php

class cForo {
    public function listarForo() {
        try {
            $foros = new Foro();
            $temas = $foros->listarTemas();
            $categorias = $foros->listarCategorias();
        // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vListaForo.php';
    }


    public function verTemaForo() {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Page not found');
            }
            $id_tema = recoge('id');
            $foro = new Foro();
            $tema = $foro->getTema($id_tema);
            $respuestas = $foro->getRespuesta($id_tema);
        // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vVerTemaForo.php';
    }



    public function crearTema() {
        $errores= array();
        $params= array(
            'mensaje'=>''           
    );

    if (isset($_POST['crearTema'])) {
            $asunto_tema = recoge('titulo');
            $fecha_tema = '';
            $categoria_tema = recogeCheckArray('form-select');
            $by_tema = $_SESSION['id_usuario'];
            $contenido_respuesta = recoge('contenidoTema');
            $id = recoge('id');
            //$tema_respuesta = getIdTema($by_tema);
            //$tema = $tema['id_tema'];        

            try {
                $a = new Foro();
                if ($a->crearTema($asunto_tema, $categoria_tema, $by_tema, $contenido_respuesta)) {
                   //$a->enviarRespuesta($contenido_respuesta, '79', $by_tema);
                    //header("Location: index.php?ctl=verTemaForo&id=$id");
                }
                else{
                    $params['mensaje']="Hubo un error al crear el tema. Vuelve a intentarlo";
                }
            }
          catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
    }

require __DIR__ . './../vistas/vCrearTema.php';
}


public function modificarTema() {
    $a = new Foro();
    $id = $_GET['id'];
    $temas = $a->getTema($id);

    if (isset($_POST['modificarTema'])) {
        $titulo = recoge('titulo');
        $descripcion = recoge('contenidoTema');
        $id_historia = recoge('id');
        $categoria = recogeCheck('form-select');

        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
        }

        $validacion = new Validacion();
        $datos['titulo'] = $titulo;
        $datos['contenidoTema'] = $descripcion;
        $datos['form-select'] = $categoria;

        

        $regla = array(
            array(
                'name' => 'titulo',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'contenidoTema',
                'regla' => 'noEmpty, texto'
            ),
            array(
                'name'=> 'form-select',
                'regla' => 'noEmpty'
            )
        );
        if ($validacion->rules($regla,$datos) === true){
            try {
                if ($a->modificarTema($id_usuario, $titulo, $descripcion, $categoria)) {
                    header('Location: index.php?ctl=listarHistorias');
                }
                else{
                    $params['mensaje']="Hubo un error al crear la historia. Vuelve a intentarlo";
                }
            }
          catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
    }
}
require __DIR__ . './../vistas/vModificarTema.php';
}



public function eliminarTema() {
    try {
        //print_r($_SESSION);
        if (! isset($_GET['id'])) {
            throw new Exception('Page not found');
        }
        $id_usuario = $_SESSION['id_usuario'];
        $id_tema = $_GET['id'];
        $m = new Foro();
        $tema = $m->getTemaEliminar($id_tema);
        $autor = $tema['by_tema'];
        
        //Si el usuario no es el autor no permite eliminar
        $tema = $m->eliminarTema($tema['id_tema'], $id_usuario, $tema['asunto_tema'], $tema['categoria_tema'], $tema['by_tema']);
        
    } catch (Exception $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
        header('Location: index.php?ctl=error');
    } catch (Error $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
        header('Location: index.php?ctl=error');
    }
    require __DIR__ . './../vistas/vEliminarTema.php';
    
}



public function eliminarRespuesta() {
    try {
        //print_r($_SESSION);
        if (! isset($_GET['id'])) {
            throw new Exception('Page not found');
        }
        $id_usuario = $_SESSION['id_usuario'];
        $id_respuesta = $_GET['id'];
        $m = new Foro();
        $respuesta = $m->getRespuestaUsuario($id_respuesta);
        $autor = $respuesta['by_respuesta'];
        
        //Si el usuario no es el autor no permite eliminar
        $respuesta = $m->eliminarRespuesta($respuesta['id_respuesta'], $id_usuario, $respuesta['contenido_respuesta'], $respuesta['tema_respuesta'], $respuesta['by_respuesta']);
        
    } catch (Exception $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
        header('Location: index.php?ctl=error');
    } catch (Error $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
        header('Location: index.php?ctl=error');
    }
    
    require __DIR__ . './../vistas/vEliminarRespuesta.php';
}



    public function enviarRespuesta() {
        $errores= array();
        $params= array(
            'mensaje'=>''           
    );

    if (isset($_POST['enviarRespuesta'])) {
            $contenido_respuesta = recogeEnriquecido('respuesta');
            $by_respuesta = $_SESSION['id_usuario'];
            $fecha_respuesta = '';
            $tema_respuesta = $_REQUEST['id'];
        }


            try {
                $a = new Foro();
                if ($a->enviarRespuesta($contenido_respuesta, $tema_respuesta, $by_respuesta)) {
                    //$_SESSION['mensaje']="El anuncio ha sido creado";
                    header('Location: index.php?ctl=verTemaForo&id='.$tema_respuesta);
                }
                else{
                    $params['mensaje']="Hubo un error al crear la historia. Vuelve a intentarlo";
                }
            }
          catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

require __DIR__ . './../vistas/vVerTemaForo.php';
}







}

?>
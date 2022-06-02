<?php

class cHistorias {
    public function listarHistorias() {    
        try {
            $ConjuntoHistorias = new Historia();
            $historias = $ConjuntoHistorias->listarHistorias();
        
        // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vListaHistorias.php';
    
    }

    public function listarHistoriasUsuario() {    
        try {
            //print_r($_SESSION);
            if (!isset($_GET['id'])) {
                throw new Exception('Page not found');
            }
            $id_usuario = recoge('id');
            $ConjuntoHistorias = new Historia();
            $historias = $ConjuntoHistorias->listarHistoriasUsuario($id_usuario);
        
        // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vListaHistorias.php';
    
    }

    public function listarTemasUsuario() {
        try {
            //print_r($_SESSION);
            if (!isset($_GET['id'])) {
                throw new Exception('Page not found');
            }
            $id_usuario = $_SESSION['id_usuario'];
            $Conjuntotemas = new Foro();
            $temas = $Conjuntotemas->listarTemasUsuario($id_usuario);
        
        // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vListaHistorias.php';
    
    }
    


    public function crearHistoria() {
        $errores= array();
        $params= array(
            'mensaje'=>''           
    );

    if (isset($_POST['crearHistoria'])) {
        $titulo = recoge('titulo');
        $idioma = recoge('idioma');
        $descripcion = recogeEnriquecido('contenidoHistoria');

        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
        }

        $validacion = new Validacion();
        $datos['titulo'] = $titulo;
        $datos['idioma'] = $idioma;
        $datos['contenidoHistoria'] = $descripcion;
        

        $regla = array(
            array(
                'name' => 'titulo',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'idioma',
                'regla' => 'noEmpty, texto'
            ),
            array(
                'name'=> 'contenidoHistoria',
                'regla' => 'noEmpty'
            )
        );
        if ($validacion->rules($regla,$datos) === true){
            try {
                $a = new Historia();
                if ($a->crearHistoria($id_usuario, $titulo, $descripcion, $idioma)) {
                    //$_SESSION['mensaje']="El anuncio ha sido creado";
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
require __DIR__ . './../vistas/vCrearHistoria.php';
}


public function modificarHistoria() {
    $errores= array();
        $params= array(
            'mensaje'=>''
    );

    if (isset($_POST['modificarHistoria'])) { 
        $id_historia = recoge('id');
        $titulo = recoge('titulo');
        $idioma = recoge('idioma');
        $descripcion = recoge('contenidoHistoria');

        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
        }

        $validacion = new Validacion();
        $datos['titulo'] = $titulo;
        $datos['idioma'] = $idioma;
        $datos['contenidoHistoria'] = $descripcion;
        

        $regla = array(
            array(
                'name' => 'titulo',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'idioma',
                'regla' => 'noEmpty, texto'
            ),
            array(
                'name'=> 'contenidoHistoria',
                'regla' => 'noEmpty'
            )
        );
        if ($validacion->rules($regla,$datos) === true){
            try {
                $a = new Historia();
                $id = $_GET['id'];
                $historia = $a->getHistoria($id);
                if ($a->modificarHistoria($id_usuario, $titulo, $descripcion, $idioma)) {
                    header('Location:index.php?ctl=listarHistorias');
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
require __DIR__ . './../vistas/vModificarHistoria.php';
}



public function eliminarHistoria() {
    try {
        //print_r($_SESSION);
        if (! isset($_GET['id'])) {
            throw new Exception('Page not found');
        }
        $id_usuario = $_SESSION['id_usuario'];
        $id_historia = recoge('id');
        $m = new Historia();
        $historia = $m->getHistoria($id_historia);
        $autor = $historia['id_usuario'];
        
        //Si el usuario no es el autor no permite eliminar
        if ($id_usuario != $autor) {
            header('Location: index.php?ctl=error');
        }
        else {
        $historia = $m->eliminarHistoria($historia['id_historia'], $id_usuario, $historia['titulo'], $historia['descripcion'], $historia['idioma']);
        }
    } catch (Exception $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
        header('Location: index.php?ctl=error');
    } catch (Error $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
        header('Location: index.php?ctl=error');
    }
    
    require __DIR__ . './../vistas/vEliminarHistoria.php';
}



public function cambiaImagen() {
    try {
        //print_r($_SESSION);
        
        if (!isset($_GET['id'])) {
            throw new Exception('Page not found');
        }
        $id_usuario = $_SESSION['id_usuario'];
        $id_historia = recoge('id');
        $m = new Historia();
        $historia = $m->getAnuncio($id_anuncio);
        $autor = $anuncio['id_usuario'];

        //Si el usuario no es el autor no permite editar
        if ($id_usuario != $autor) {                
            header('Location: index.php?ctl=error');
        }
        else {
        $id_anuncio = $anuncio['id_anuncio'];
        if (isset($_POST['guarda'])) {
            $errores = [];
            $categoria_img = recoge('imagenCategory');

            /*Hace un update en la base de datos de el título, la descripción, contenido y la categoria
            del anuncio*/
            if (empty($errores)) {
                $m->modificarImagen($id_anuncio, $categoria_img);
                    header('Location: index.php?ctl=verAnuncio&id='.$id_anuncio);
            }
                 }
        }
    } catch (Exception $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
        header('Location: index.php?ctl=error');
    } catch (Error $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
        header('Location: index.php?ctl=error');
    }
    
    require __DIR__ . './../vistas/vVerHistoria.php';
}


public function buscar() {    
        try {
            if (isset($_POST['buscar'])){
                $buscador=recoge('buscador');
                $ConjuntoHistorias = new Historia();
                $historias=$ConjuntoHistorias->listarhistoriasBuscar($buscador);
            } else{
                throw new Exception('An error has occurred while searching');
            }
        // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vListaHistorias.php';
    }


}
?>
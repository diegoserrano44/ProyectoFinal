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

    /*public function buscar() {    
        try {
            if (isset($_POST['buscar'])){
                $buscador=recoge('buscador');
                $ConjuntoAnuncios = new Historia();
                $anuncios=$ConjuntoAnuncios->listarAnunciosBuscar($buscador);
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
        require __DIR__ . './../vistas/vListaAnuncios.php';
    }*/

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

    public function verHistoria() {
        try{
            //print_r($_SESSION);
            if (!isset($_GET['id'])) {
                
                throw new Exception('Page not found');
            }
            $idhistoria = recoge('id');
            $a = new Historia();
            $historiaIndividual = $a->getAnuncio($idhistoria);
            $u = new Usuario();
            $profesor = $u->getUsuario($historiaIndividual['id_usuario']);
            $historia = array_merge($profesor, $historiaIndividual);
            // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . './../vistas/vVerHistoria.php';
    }

    public function crearHistoria() {
        $errores= array();
        $params= array(
            'mensaje'=>''           
    );

    if (isset($_POST['cAnuncio'])) {
        $titulo = recoge('cTituloAnuncio');
        $descripcion = recoge('cDescripcionAnuncio');
        $contenido = recoge('cContenidoAnuncio');
        $idioma = recoge('idioma');

        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
        }

        $validacion = new Validacion();
        $datos['cTituloAnuncio'] = $titulo;
        $datos['cDescripcionAnuncio'] = $descripcion;
        $datos['cContenidoAnuncio'] = $contenido;
        $datos['idioma'] = $idioma;
        

        $regla = array(
            array(
                'name' => 'cTituloAnuncio',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'cDescripcionAnuncio',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'cContenidoAnuncio',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'idioma',
                'regla' => 'noEmpty, texto'
            )
        );
        if ($validacion->rules($regla,$datos) === true){
            try {
                $a = new Historia();
                if ($a->crearHistoria($id_usuario, $titulo, $descripcion, $contenido, $idioma)) {
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
    }/*else{
        echo "no entra";
    }*/
}
require __DIR__ . './../vistas/vCrearHistoria.php';
}


public function modificarHistoria() {
    $errores= array();
        $params= array(
            'mensaje'=>''           
    );
        if (!isset($_GET['id'])) {
            throw new Exception('Page not found');
        }
        $id_usuario = $_SESSION['id_usuario'];
        $id_anuncio = recoge('id');
        $m = new Historia();
        $anuncio = $m->getAnuncio($id_anuncio);
        $autor = $anuncio['id_usuario'];

        //Si el usuario no es el autor no permite editar
        if ($id_usuario != $autor) {                
            header('Location: index.php?ctl=error');
        }
        else {
        $nomUsuario = $_SESSION['usuario'];
        $id_anuncio = $anuncio['id_anuncio'];
        if (isset($_POST['mAnuncio'])) {
            $titulo = recoge('cTituloAnuncio');
            $descripcion = recoge('cDescripcionAnuncio');
            $contenido = recogeEnriquecido('cContenidoAnuncio');
            $idioma = recoge('idioma');
            
            if (isset($_SESSION['id_usuario'])) {
                $id_usuario = $_SESSION['id_usuario'];
            }

        $validacion = new Validacion();
        $datos['cTituloAnuncio'] = $titulo;
        $datos['cDescripcionAnuncio'] = $descripcion;
        $datos['cContenidoAnuncio'] = $contenido;
        $datos['idioma'] = $idioma;

        $regla = array(
            array(
                'name' => 'cTituloAnuncio',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'cDescripcionAnuncio',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'cContenidoAnuncio',
                'regla' => 'noEmpty'
            ),
            array(
                'name'=> 'idioma',
                'regla' => 'noEmpty, texto'
            ),
            array(
                'name'=> 'categoria',
                'regla' => 'noEmpty'
            )
        );
        if ($validacion->rules($regla,$datos) === true){
            try {
            /*Hace un update en la base de datos de el título, la descripción, contenido y la categoria
            del anuncio*/
            if ($m->modificarHistoria($id_anuncio, $titulo, $descripcion, $contenido, $categoria, $idioma)) {
                    header('Location: index.php?ctl=verAnuncio&id='.$id_anuncio);
            }
            else {

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
else{
    echo "no entra";

}
}  
    require __DIR__ . './../vistas/vModificarAnuncio.php';
}
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



public function eliminarHistoria() {
    try {
        //print_r($_SESSION);
        if (! isset($_GET['id'])) {
            throw new Exception('Page not found');
        }
        $id_usuario = $_SESSION['id_usuario'];
        $id_anuncio = recoge('id');
        $m = new Historia();
        $anuncio = $m->getAnuncio($id_anuncio);
        $autor = $anuncio['id_usuario'];
        
        //Si el usuario no es el autor no permite eliminar
        if ($id_usuario != $autor) {
            header('Location: index.php?ctl=error');
        }
        else {
        $anuncio = $m->eliminarHistoria($anuncio['id_anuncio'], $id_usuario, $anuncio['titulo'], $anuncio['descripcion'], $anuncio['contenido'], $anuncio['categoria'], $anuncio['idioma'], $anuncio['precio'], $anuncio['categoria_img']);
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

}
?>
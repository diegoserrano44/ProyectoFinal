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



    public function enviarRespuesta() {
        $errores= array();
        $params= array(
            'mensaje'=>''           
    );

    if (isset($_POST['respuesta'])) {
        $contenido_respuesta = recoge('respuesta');
        //$fecha_respuesta = recoge('cDescripcionAnuncio');
        //$tema_respuesta = recoge('cContenidoAnuncio');
        //$by_respuesta = recoge('idioma');

        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
        }

        $validacion = new Validacion();
        $datos['respuesta'] = $contenido_respuesta;
        //$datos['cDescripcionAnuncio'] = $descripcion;
        //$datos['cContenidoAnuncio'] = $contenido;
        //$datos['idioma'] = $idioma;
        

        $regla = array(
            array(
                'name' => 'respuesta',
                'regla' => 'noEmpty'
            )
        );
        if ($validacion->rules($regla,$datos) === true){
            try {
                $a = new Foro();
                if ($a->enviarRespuesta($contenido_respuesta, $fecha_respuesta, $tema_respuesta, $by_respuesta)) {
                    //$_SESSION['mensaje']="El anuncio ha sido creado";
                    header('Location: index.php?ctl=vVerTemaForo');
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
require __DIR__ . './../vistas/vVerTemaForo.php';
}

}

?>
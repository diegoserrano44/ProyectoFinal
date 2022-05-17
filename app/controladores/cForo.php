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
            $asunto_tema = recoge('');
            $fecha_tema = '';
            $categoria_tema = '';
            $by_tema = $_SESSION['id_usuario'];
        }


            try {
                $a = new Foro();
                if ($a->crearTema($asunto_tema, $fecha_tema, $categoria_tema, $by_tema)) {
                    //$_SESSION['mensaje']="El anuncio ha sido creado";
                    header('Location: index.php?ctl=verTemaForo&id=');
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

require __DIR__ . './../vistas/vListaForo.php';
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
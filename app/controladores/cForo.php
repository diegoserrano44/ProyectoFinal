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
            $id_respuesta = recoge('id');
            $foro = new Foro();
            $tema = $foro->getTema($id_tema);
            $respuesta = $foro->getRespuesta($id_respuesta);
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

}

?>
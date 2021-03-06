<?php

class cMensajes {
    
    public function listarMensaje(){
        $errores= array();
        $params= array(
            'mensaje'=>''
        );
        
        
        try{
            
            $mensaje = new Mensaje();
            
            
            if($listado = $mensaje->listarHilos($_SESSION['id_usuario'])){
                $params['hilos']=json_encode($listado);
            }else{
                $params['mensajes']=array('asunto'=>'No tienes mensajes todavía.');
            }
            
        }catch (PDOException $e) {
            // En este caso guardamos los errores en un archivo de errores log
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
            // guardamos en ·errores el error que queremos mostrar a los usuarios
            header("location:index.php?ctl=error");
            
        } catch (Exception $e) {
            
            // En este caso guardamos los errores en un archivo de errores log
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
            // guardamos en ·errores el error que queremos mostrar a los usuarios
            header("location:index.php?ctl=error");
        }
        
        
        require __DIR__ . './../vistas/vListarMensajes.php';
        
    }

    public function mandarMensaje(){
        $errores= array();
        $params= array(
            'mensaje'=>''
        );
        
        if(isset($_POST['enviaContacto'])){
            $asunto= recoge('asunto');
            $id_historia= $_GET['id'];
            $contenido= recoge('mensaje');
        
            try{            
                $historia = new Historia();
                $id=$historia->devolverCreadorHistoria($id_historia);
                $mensaje = new Mensaje();       
                
                $datos= array($_SESSION['id_usuario'], $id['id_usuario'], $asunto, $contenido);

                if($_SESSION['id_usuario'] !== $id['id_usuario']){
              
               if($mensaje->crearMensaje($datos)){
                    $_SESSION['mensajes']='mensaje enviado';
                    header('location:index.php?ctl=listarMensaje');
                }else{
                    $params['mensajes']=array('asunto'=>'No tienes mensajes todavía.');
                }
            }else{
                $params['mensajes']=array('asunto'=>'No puedes enviarte mensajes a ti mismo');
            }
            
            }catch (PDOException $e) {
             // En este caso guardamos los errores en un archivo de errores log
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
                // guardamos en ·errores el error que queremos mostrar a los usuarios
                header("location:index.php?ctl=error");
            
            } catch (Exception $e) {
                
                // En este caso guardamos los errores en un archivo de errores log
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../log.txt");
                // guardamos en ·errores el error que queremos mostrar a los usuarios
                header("location:index.php?ctl=error");
            }
        
        }

            require __DIR__ . './../vistas/vListarMensajes.php';
    }      
        

}
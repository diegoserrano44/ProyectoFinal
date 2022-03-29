<?php 

class cAjax {


    public function dameMensajes (){
        $m= new Mensaje();
        
        $idhilo= $_POST['idhilo'];
        $id= $_SESSION['id_usuario'];
        
        $resultado = $m->listarMensajes($id,$idhilo);
        
        echo json_encode($resultado);      
       
        
    }
    
    public function eliminarHilo (){
        $m= new Mensaje();
        
        $idhilo= $_POST['idhilo'];
        $id= $_SESSION['id_usuario'];
        
        $resultado = $m->eliminarHilo($idhilo,$id);
        
        echo json_encode($resultado);
        
        
    }
    
    public function responderMensaje (){
        
            $mensaje = $_POST['msj'];
            $hilo = $_POST['idhilo'];
            
            $validacion = new Validacion();
            $datos['mensaje']=$mensaje;
            
            $regla = array(
                array(
                    'name'=> 'mensaje',
                    'regla' => 'noEmpty'
                )
            );
            
            if ($validacion->rules($regla,$datos) == 1){
                try{
                    $mensaje = new Mensaje();
                    
                    //recuperar asunto e ids del hilo
                    $dat= $mensaje->recuperarDatosHilo($hilo);
                    
                    $datos['asunto']= $dat['asunto'];
                    $datos['id_profesor']= $dat['id_profesor'];
                    $datos['id_alumno']=$dat['id_alumno'];
                    $datos['envia']=$_SESSION['id_usuario'];
                    $datos['id_hilo']=$hilo;
                    
                    if($mensaje->responderMensaje($datos)){
                        echo json_encode(array("Ok"));
                    }else{
                       echo json_encode(array("Cannot send"));
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
        
    }

    public function existeUsuario (){
        $u= new Usuario();

        $id= $_GET['id'];
        
        $resultado = $u->existeUsuario($id);
        
        echo json_encode($resultado);
        
        
    }




}
   
?>
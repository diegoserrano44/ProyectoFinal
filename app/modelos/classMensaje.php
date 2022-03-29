<?php


class Mensaje extends Model {
    
    
    /**
     * Función para crear mensajes. Pasa un array con la id del profesor y alumno, más el mensaje
     * Si no tiene id_hilo es que es un hilo nuevo por lo que recupera la id del último hilo y le suma uno.
     * @return true_false
     */
    function crearMensaje (&$datos){
        $id_usuario= $datos[0]; //lo necesitas para recuperar el último hilo del usuario
        $id_profesor = $datos[1];
        $id_alumno = $datos[0];
        $asunto = $datos[2];
        $mensaje = $datos[3];
        $envia= $datos[0];
        
        if($ultimoHilo = $this->recuperarUltimoHilo()){
            $id_hilo= $ultimoHilo['id_hilo'];
            $id_hilo++;            
        }else{
            $id_hilo=1;
        }        
        
         $stmt = $this->conexion->prepare("INSERT INTO mensajes (id_hilo, envia, id_profesor, id_alumno, asunto, mensaje, profesorV, alumnoV) values ( ?, ?, ?, ?, ?, ?, 1 ,1)");
        
        $stmt->bindParam(1, $id_hilo);
        $stmt->bindParam(2, $envia);
        $stmt->bindParam(3, $id_profesor);
        $stmt->bindParam(4, $id_alumno);
        $stmt->bindParam(5, $asunto);
        $stmt->bindParam(6, $mensaje);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Función para seleccionar todos los mensajes ordenados por hilos en descendente
     *@return array_mensajes_false
     */
    function listarMensajes($id, $idhilo){
        
        $consulta= "SELECT envia, id_mensaje, id_hilo, id_alumno, id_profesor, m.fecha_creacion, mensaje, usuario
            FROM mensajes m LEFT JOIN usuarios ON id_usuario = envia
            WHERE id_profesor=:id_prof AND id_hilo=:idh1
            UNION
            SELECT envia, id_mensaje, id_hilo, id_alumno, id_profesor, m.fecha_creacion, mensaje, usuario
            FROM mensajes m LEFT JOIN usuarios ON id_usuario = envia
            WHERE id_alumno=:id_alu AND id_hilo=:idh2
            ORDER BY fecha_creacion asc";
        
        $result= $this->conexion->prepare($consulta);
        $result->bindParam(':id_prof', $id);
        $result->bindParam(':idh1', $idhilo);
        $result->bindParam(':id_alu', $id);
        $result->bindParam(':idh2', $idhilo);
        $result->execute();
        
        if ($result ->execute()) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else
            return false;
            
            
    }
    
    /**
     *    Recuerperar el último hilo de usuario
     * @return array_id_hilo_false
     */
    function recuperarUltimoHilo(){
        
        $consulta = "SELECT id_hilo FROM mensajes ORDER BY id_hilo DESC LIMIT 1";
        $resultado = $this->conexion->prepare($consulta);

        if ($resultado ->execute()) {
            return $resultado->fetch(PDO::FETCH_ASSOC);
        } else
            return false;
            
            
    }
    
    
    /**
     * Responder a un mensaje
     * @return true_false
     */
    function responderMensaje(&$datosMensaje){
        
        $stmt = $this->conexion->prepare("INSERT INTO mensajes (id_hilo, envia, id_profesor, id_alumno, asunto, mensaje, profesorV, alumnoV) values ( ?, ?, ?, ?, ?, ?, 1,1)");
        
        $stmt->bindParam(1, $datosMensaje['id_hilo']);
        $stmt->bindParam(2, $datosMensaje['envia']);
        $stmt->bindParam(3, $datosMensaje['id_profesor']);
        $stmt->bindParam(4, $datosMensaje['id_alumno']);
        $stmt->bindParam(5, $datosMensaje['asunto']);
        $stmt->bindParam(6, $datosMensaje['mensaje']);
        
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Función para eliminar hilo
     * @return true_false
     */
    function eliminarHilo($id_hilo, $id_usuario){
        $columna="";
        $datos = $this->recuperarDatosHilo($id_hilo);
        if($datos['id_profesor'] == $id_usuario){
            $columna = "profesorV";
            $compara = "profesor";
        }else{
            $columna ="alumnoV";
            $compara = "alumno";
        }
        
        $consulta = "UPDATE mensajes SET ".$columna."=0 WHERE id_hilo=? AND id_".$compara."=?";
        $result= $this->conexion->prepare($consulta);
        $result->bindParam(1, $id_hilo);
        $result->bindParam(2, $id_usuario);
        
        if($result->execute()){
            return true;
            
        }else{
            
            return false;
        }
    }
    
    /**
     * Sí se usa
     *Recuerperar los datos básico de un hilo
     * @return
     */
    function recuperarDatosHilo($id_hilo){
        
        $consulta = "SELECT id_profesor, id_alumno, asunto FROM mensajes WHERE id_hilo= ? ";
        $resultado = $this->conexion->prepare($consulta);
        $resultado -> bindParam(1,$id_hilo);
        
        if ($resultado ->execute()) {
            return $resultado->fetch(PDO::FETCH_ASSOC);
        } else
            return false;
            
            
    }
    
    function listarHilos($id_usuario) {
        $consulta= "SELECT id_hilo, asunto, id_profesor, id_alumno, alumnoV, profesorV, usuario
                    FROM mensajes LEFT JOIN usuarios ON id_usuario = id_alumno
                    WHERE id_profesor=?
                    UNION
                    SELECT id_hilo, asunto, id_profesor, id_alumno, alumnoV, profesorV, usuario
                    FROM mensajes m LEFT JOIN usuarios ON id_usuario = id_profesor
                    WHERE id_alumno=? GROUP BY id_hilo";
        
        $result= $this->conexion->prepare($consulta);
        $result->bindParam(1, $id_usuario);
        $result->bindParam(2, $id_usuario);
        
        if($result->execute()){
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    
    
    
    
    
}


?>
<?php

class Foro extends Model {
    public function listarCategorias() {
        $consulta = "SELECT * FROM `categorias_foro`";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    public function listarTemas() {
        $consulta = "SELECT * FROM temas_foro, usuarios WHERE by_tema=id_usuario";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }


    /**
    *Función para seleccionar una historia a partir de la id
    */
    public function crearTema($asunto_tema, $categoria_tema, $by_tema) {
        $consulta = "INSERT INTO temas_foro (asunto_tema, fecha_tema, categoria_tema, by_tema) values (?, NOW(), ?, ?)";
        $consulta_ultimo = "SELECT id_tema FROM temas_foro ORDER BY id_tema DESC LIMIT 1";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $asunto_tema);
        $result->bindParam(2, $categoria_tema);
        $result->bindParam(3, $by_tema);
        if ($result->execute()) {
            $result2 = $this->conexion->prepare($consulta_ultimo);
            $result_final = $result2->fetch();
        }
        if ($result2->execute()) {
            $consulta3 = "INSERT INTO respuestas_foro (contenido_respuesta, fecha_respuesta, tema_respuesta, by_respuesta) values ('hola', NOW(), '$result_final, $by_tema)";
            return true;
        } else {
            return false;
        }
    }


    public function getTema($id_tema) {
        $consulta = "SELECT * FROM temas_foro WHERE id_tema=:id_tema";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_tema', $id_tema);
        if ($result->execute()) {
            $resultado = $result->fetch();
            return $resultado;
        } else {
            false;
        }
    }

    public function eliminarTema($id_tema, $id_usuario, $asunto_tema, $categoria_tema, $by_tema) {
            $consulta = "DELETE FROM temas_foro WHERE id_tema=:id_tema";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':id_tema', $id_tema);
            if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function eliminarRespuesta($id_respuesta, $contenido_respuesta, $tema_respuesta, $by_respuesta) {
        $consulta = "DELETE FROM respuestas_foro WHERE id_respuesta=:id_respuesta";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_respuesta', $id_respuesta);
        if ($result->execute()) {
        return true;
    } else {
        return false;
    }
}  

    public function getRespuesta($id_respuesta) {
        $consulta = "SELECT * FROM respuestas_foro, usuarios WHERE by_respuesta=id_usuario AND tema_respuesta=:tema_respuesta";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':tema_respuesta', $id_respuesta);
        if ($result->execute()) {
            $resultado = $result->fetchAll();
            return $resultado;
        } else {
            false;
        }
    }

    public function getRespuestaUsuario($id_respuesta) {
        $consulta = "SELECT * FROM respuestas_foro WHERE id_respuesta=:id_respuesta";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_respuesta', $id_respuesta);
        if ($result->execute()) {
            $resultado = $result->fetch();
            return $resultado;
        } else {
            false;
        }
    }

    public function enviarRespuesta($contenido_respuesta, $tema_respuesta, $by_respuesta) {
        $consulta = "INSERT INTO respuestas_foro (contenido_respuesta, fecha_respuesta, tema_respuesta, by_respuesta) values (?, NOW(), ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $contenido_respuesta);
        $result->bindParam(2, $tema_respuesta);
        $result->bindParam(3, $by_respuesta);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

}

?>
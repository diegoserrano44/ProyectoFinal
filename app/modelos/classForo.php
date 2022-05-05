<?php

class Foro extends Model {
    public function listarCategorias() {
        $consulta = "SELECT * FROM `categorias_foro`";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    public function listarTemas() {
        $consulta = "SELECT * FROM `temas_foro`";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    /**
    *Función para seleccionar una historia a partir de la id
    */
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

    public function getRespuesta($id_respuesta) {
        $consulta = "SELECT * FROM respuestas_foro WHERE tema_respuesta=:tema_respuesta";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':tema_respuesta', $id_respuesta);
        if ($result->execute()) {
            $resultado = $result->fetch();
            return $resultado;
        } else {
            false;
        }
    }

}

?>
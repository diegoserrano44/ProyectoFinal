<?php

class Foro extends Model {
    public function listarForo() {
        $consulta = "SELECT id_anuncio,titulo, a.descripcion,a.fecha_creacion,categoria_img,nombre,apellidos,idioma,precio FROM `historias` a
        LEFT JOIN usuarios u on u.id_usuario=a.id_usuario";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

}

?>
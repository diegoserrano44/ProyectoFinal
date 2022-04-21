<?php

class Foro extends Model {
    public function listarForo() {
        $consulta = "SELECT * FROM `temas_foro`";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

}

?>
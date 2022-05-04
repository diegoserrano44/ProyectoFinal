<?php

class App extends Model {
    /**
    *Función para crear historias. Pasa los valores a los campos de la tabla historias y hace la insercción devolviendo
    * como resultado true o false  
    */
    public function listarApps () {
        $consulta = "SELECT * FROM `historias`";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }
}

?>
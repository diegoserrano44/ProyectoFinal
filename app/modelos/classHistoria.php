<?php

class Historia extends Model {
    

    /**
    *Función para crear historias. Pasa los valores a los campos de la tabla historias y hace la insercción devolviendo
    * como resultado true o false  
    */
    public function crearHistoria ($id_usuario, $titulo, $descripcion, $idioma) {
        $consulta = "INSERT INTO historias (id_usuario, titulo, descripcion, idioma) values (?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $id_usuario);
        $result->bindParam(2, $titulo);
        $result->bindParam(3, $descripcion);
        $result->bindParam(4, $idioma);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
    *Función para seleccionar un anuncio a partir de la id del anuncio 
    */
    public function getHistoria($id_historia) {
        $consulta = "SELECT * FROM historias WHERE id_historia=:id_historia";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_historia', $id_historia);
        if ($result->execute()) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function getHistoriaEliminar($id_historia) {
        $consulta = "SELECT * FROM historias WHERE id_historia=:id_historia";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_historia', $id_historia);
        if ($result->execute()) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    /**
    * Función para listar todos los historias 
    */
    public function listarHistorias() {
        $consulta = "SELECT id_historia, titulo, a.descripcion, a.fecha_creacion, nombre, apellidos, idioma FROM `historias` a
        LEFT JOIN usuarios u on u.id_usuario=a.id_usuario";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    /**
    * Función para listar todos los historias de un usuario
    * @return historias_por_usuario
    */
    public function listarHistoriasUsuario($id_usuario) {
        $consulta = "SELECT id_historia, titulo, a.descripcion, a.fecha_creacion, nombre, apellidos, idioma FROM `historias` a
        LEFT JOIN usuarios u on u.id_usuario=a.id_usuario
        WHERE u.id_usuario = :usuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':usuario', $id_usuario);
        if ($result->execute()) {
            $resultado = $result->fetchAll();
            return $resultado;
        } else {
            false;
        }
    }

    public function listarTemasUsuario($id_usuario) {
        $consulta = "SELECT * FROM temas_foro, categorias_foro WHERE categoria_tema=id_categoria AND by_tema=:usuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':usuario', $id_usuario);
        if ($result->execute()) {
            $resultado = $result->fetchAll();
            return $resultado;
        } else {
            false;
        }
    }


    /**
    * Función para listar todos los historias que coincidan con el buscador
    * @param string buscador
    * @return historias_por_filtro_de_buscador
    */
    public function listarhistoriasBuscar($buscar) {
        $consulta = "SELECT * FROM `historias` WHERE concat(upper(titulo),', ',upper(idioma)) like upper(:buscar)";
        $result = $this->conexion->prepare($consulta);
        $buscar='%'.$buscar.'%';
        $result->bindParam(':buscar', $buscar);
        if ($result->execute()) {
            $resultado = $result->fetchAll();
            return $resultado;
        } else {
            false;
        }
    }

    /**
    *Función para modificar los historias a partir de el id de anuncio
    */
    public function modificarHistoria($id_historia, $id_usuario, $titulo, $descripcion, $idioma) {
        $consulta = "UPDATE historias SET id_usuario=:id_usuario, titulo=:titulo, descripcion=:descripcion, idioma=:idioma WHERE id_historia=:id_historia";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_historia', $id_historia);
        $result->bindParam(':id_usuario', $id_usuario);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':descripcion', $descripcion);
        $result->bindParam(':idioma', $idioma);
        $result->execute();
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
    * Función para eliminar historias a partir del id del anuncio, primero ejecutamos una consulta que inserte todos los campos 
    * del anuncio en una nueva tabla historiasEliminados y luego haga la consulta de eliminar de la tabla principal historias
    */
    public function eliminarHistoria($id_historia, $id_usuario, $titulo, $descripcion, $idioma) {
        $consulta = "INSERT INTO historias_deleted (id_usuario, titulo, descripcion, idioma ) values (?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $id_usuario);
        $result->bindParam(2, $titulo);
        $result->bindParam(3, $descripcion);
        $result->bindParam(4, $idioma);
        if ($result->execute()) {
            $consulta = "DELETE FROM historias WHERE id_historia=:id_historia";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':id_historia', $id_historia);
            $result->execute();
            return true;
        } else {
            return false;
        }   
    }

    public function devolverCreadorHistoria($id_historia) {
        $consulta = "SELECT id_usuario FROM historias WHERE id_historia =:id_historia";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_historia', $id_historia);

        if ($result->execute()) {            
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }   
    }



}

?>
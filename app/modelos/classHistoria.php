<?php

class Historia extends Model {
    

    /**
    *Función para crear anuncios. Pasa los valores a los campos de la tabla anuncios y hace la insercción devolviendo
    * como resultado true o false  
    */
    public function crearHistoria ($id_usuario, $titulo, $descripcion, $contenido, $categoria, $idioma, $precio, $categoria_img) {
        $consulta = "INSERT INTO anuncios (id_usuario, titulo, descripcion, contenido, categoria, idioma, precio, categoria_img) values (?, ?, ?, ?, ?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $id_usuario);
        $result->bindParam(2, $titulo);
        $result->bindParam(3, $descripcion);
        $result->bindParam(4, $contenido);
        $result->bindParam(5, $categoria);
        $result->bindParam(6, $idioma);
        $result->bindParam(7, $precio);
        $result->bindParam(8, $categoria_img);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
    *Función para seleccionar un anuncio a partir de la id del anuncio 
    */
    public function getHistoria($id_anuncio) {
        $consulta = "SELECT * FROM anuncios WHERE id_anuncio=:id_anuncio";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_anuncio', $id_anuncio);
        if ($result->execute()) {
            $resultado = $result->fetch();
            return $resultado;
        } else {
            false;
        }
    }

    /**
    * Función para listar todos los anuncios 
    */
    public function listarHistorias() {
        $consulta = "SELECT id_anuncio,titulo, a.descripcion,a.fecha_creacion,categoria_img,nombre,apellidos,idioma,precio FROM `anuncios` a
        LEFT JOIN usuarios u on u.id_usuario=a.id_usuario";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll();
    }

    /**
    * Función para listar todos los anuncios de un usuario
    * @return anuncios_por_usuario
    */
    public function listarHistoriasUsuario($id_usuario) {
        $consulta = "SELECT id_anuncio, titulo, a.descripcion,a.fecha_creacion,categoria_img,nombre,apellidos,idioma,precio FROM `anuncios` a
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

    /**
    * Función para listar todos los anuncios que coincidan con el buscador
    * @param string buscador
    * @return anuncios_por_filtro_de_buscador
    */
    public function listarAnunciosBuscar($buscar) {
        $consulta = "SELECT id_anuncio,titulo,a.descripcion,a.fecha_creacion,categoria_img,nombre,apellidos,idioma,precio FROM `anuncios` a
        LEFT JOIN usuarios u on u.id_usuario=a.id_usuario
        WHERE concat(upper(titulo),', ',upper(categoria)) like upper(:buscar)";
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
    *Función para modificar los anuncios a partir de el id de anuncio
    */
    public function modificarHistoria($id_anuncio, $titulo, $descripcion, $contenido, $categoria, $idioma, $precio) {
        $consulta = "UPDATE anuncios set titulo=:titulo, descripcion=:descripcion, contenido=:contenido, categoria=:categoria, idioma=:idioma, precio=:precio  WHERE id_anuncio=:id_anuncio";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_anuncio', $id_anuncio);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':descripcion', $descripcion);
        $result->bindParam(':contenido', $contenido);
        $result->bindParam(':categoria', $categoria);
        $result->bindParam(':idioma', $idioma);
        $result->bindParam(':precio', $precio);
        $result->execute();
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarImagen($id_anuncio, $categoria_img) {
        $consulta = "UPDATE anuncios set categoria_img=:categoria  WHERE id_anuncio=:id_anuncio";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_anuncio', $id_anuncio);
        $result->bindParam(':categoria', $categoria_img);
        $result->execute();
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
    * Función para eliminar anuncios a partir del id del anuncio, primero ejecutamos una consulta que inserte todos los campos 
    * del anuncio en una nueva tabla anunciosEliminados y luego haga la consulta de eliminar de la tabla principal anuncios
    */
    public function eliminarHistoria($id_anuncio, $id_usuario, $titulo, $descripcion, $contenido, $categoria, $idioma, $precio, $categoria_img) {
        $consulta = "INSERT INTO anuncios_deleted (id_usuario, titulo, descripcion, contenido, categoria, idioma, precio) values (?, ?, ?, ?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $id_usuario);
        $result->bindParam(2, $titulo);
        $result->bindParam(3, $descripcion);
        $result->bindParam(4, $contenido);
        $result->bindParam(5, $categoria);
        $result->bindParam(6, $idioma);
        $result->bindParam(7, $precio);
        if ($result->execute()) {
            $consulta = "DELETE FROM anuncios WHERE id_anuncio=:id_anuncio";
            $result = $this->conexion->prepare($consulta);
            $result->bindParam(':id_anuncio', $id_anuncio);
            $result->execute();
            return true;
        } else {
            return false;
        }   
    }

    public function devolverCreadorHistoria($id_anuncio) {
        $consulta = "SELECT id_usuario FROM anuncios WHERE id_anuncio =:id_anuncio";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_anuncio', $id_anuncio);

        if ($result->execute()) {            
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }   
    }



}

?>
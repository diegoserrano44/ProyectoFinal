<?php

class Usuario extends Model {

    /**
    * Se le pasa la id del usuario. Devuelve un único resultado
    * @return userdata_false
    */
    public function getUsuario($id) {
        
        $consulta = "SELECT * FROM usuarios WHERE id_usuario=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id', $id);
        if ($result->execute()) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
        
    }

    /**
    * Devuelve todos los usuarios en un array
    * @return usersdata_false
    */
    public function listarUsuarios() {
        $consulta = "SELECT * FROM usuarios";
        $result = $this->conexion->prepare($consulta);
        if ($result->execute()) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
        
    }

    /**
    * La id_usuario se asigna en la BBDD, de ahí a que se pase como NULL.
    * @return true_false
    */
    public function insertUsuario($array_usuario, $goo=0) {
        $act=0;
        if($goo === 1){
            $act = 1;
        }
        $consulta = "INSERT INTO usuarios (id_usuario, usuario, password, nombre, apellidos, email, telefono, fecha_nac, foto_perfil, rol, activo, google) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $id=null;
        $result->bindParam(1, $id);
        $result->bindParam(2, $array_usuario['usuario']);
        $result->bindParam(3, $array_usuario['password']);// Se debe pasar ya encriptada (crypt_password en app/libs/utils.php)
        $result->bindParam(4, $array_usuario['nombre']);
        $result->bindParam(5, $array_usuario['apellidos']);
        $result->bindParam(6, $array_usuario['email']);
        $result->bindParam(7, $array_usuario['telefono']);
        $result->bindParam(8, $array_usuario['fecha_nac']);
        $result->bindParam(9, $array_usuario['foto_perfil']);
        $result->bindParam(10, $array_usuario['rol']);
        $result->bindParam(11, $act);
        $result->bindParam(12, $goo);

        if ($result->execute()) {
            return $this->conexion->lastInsertId();
        } else {
            return false;
        }
    }

    /*
    * Genera la sentencia con los datos a actualizar y luego modifica los datos en la BBDD
    * @return true_false
    */
    public function updateUsuario(&$array_newData) {
        $consulta = "SELECT * FROM usuarios WHERE id_usuario=:id";

        if (isset($_SESSION['id_usuario'])) {
            $id = $_SESSION['id_usuario'];
        } else {
            $id = $array_newData['id'];
        }

        $s="";

        foreach ($array_newData as $key => $value) {
            if($key !== 'id'){
                $s .= $key . "= '" . $value . "',";}
        }
        $s=trim($s,",");
        $result=$this->conexion->prepare($consulta);
        if ($result->execute(array(":id" => $id))) {
            $stmt="UPDATE usuarios SET " . $s . " WHERE id_usuario='$id'";
        }
        if ($this->conexion->query($stmt)) {
            return true;
        } else {
            return false;
        }
    }

    /** 
    * Se llama delete pero en realidad no borra, deshabilita al usuario cambiando su valor en activo a 0
    * @return true_false
    */
    public function deleteUsuario($id) {
        $usuario=$this->getUsuario($id);
        if ($usuario['activo']>0) {
            $consulta="UPDATE usuarios SET activo=0 WHERE id_usuario='" . $id . "'";
            $result = $this->conexion->prepare($consulta);
            if ($result->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        } 
    }

    /**
    * Comprueba si $usuario está en la BBDD y en caso afirmativo encripta $password y la compara con la que tenga la BBDD
    * @return idUserANDusernameANDrol_false 
    */
    public function login($usuario, $password) {
        $consulta="SELECT usuario,password,activo FROM usuarios WHERE usuario=:usuario";
        $result = $this->conexion->prepare($consulta);
        if ($result->execute(array(
            ":usuario" => $usuario
        ))) {
            if ($result->rowCount() === 1) {
                $arrayResult=$result->fetch(PDO::FETCH_ASSOC);
                $aux=crypt_password($password);
                
                if ($arrayResult['password']==$aux ) {
                    if($arrayResult['activo']==1){
                        $consulta="SELECT * FROM usuarios WHERE usuario=:usuario";
                        $result = $this->conexion->prepare($consulta);
                        $result->execute(array(":usuario" => $usuario));
                        return $result->fetch(PDO::FETCH_ASSOC);
                    }else{
                        return "Usuario no activo";
                    }
                } else {
                    return "Contraseña incorrecta";
                }
            } else {
                return false;
            }        
        } else {
            return false;
        }
    }

    public function crearToken($id_usuario) {
        
        $token = bin2hex(openssl_random_pseudo_bytes(20));
        $fecha = date('Y-m-d');
        $fecha = date("Y-m-d",strtotime($fecha."+ 1 month"));        
        

        $consulta = "INSERT INTO usuario_tokens (id_user, token, fecha ) VALUES (?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        
        $result->bindParam(1, $id_usuario);
        $result->bindParam(2, $token);
        $result->bindParam(3, $fecha);

        if ($result->execute()) {
            return $token;
        } else {
            return false;
        }
    }

    public function devolverToken($token){
        $consulta = "SELECT id_user, fecha FROM usuario_tokens WHERE token = ? ";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $token);

        if($result->execute()) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function activarUsuario($id_usuario){
        $consulta = "UPDATE usuarios SET activo=1 WHERE id_usuario=?";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $id_usuario);

        if($result->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteToken($id_usuario){
        $consulta = "DELETE FROM usuario_tokens WHERE id_user=?";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $id_usuario);

        if($result->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function existeEmail($email){
        $consulta = "SELECT * FROM `usuarios` WHERE email=?";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $email);
        
        if($result->execute()) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function existeUsuario($user){
        $consulta= "SELECT usuario from usuarios where usuario=?";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $user);
        
        if($result->execute()) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
?>
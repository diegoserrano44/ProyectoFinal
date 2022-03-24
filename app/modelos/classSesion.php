<?php

class Sesion
{
    
    function __construct($tiempo=3600)
    {
        
        ini_set("session.cookie_lifetime",3600);
        ini_set("session.gc_maxlifetime",3600);
        
        session_start();
        if (is_null($this->rol))
            $this->rol = 0;
            
            if (($this->rol)!==0) {
                
                $this->inactividadSesion($tiempo);
                $this->ipSesion();
            }
    }
    
    static function loginSesion($rol, $datos)
    {
        $_SESSION['rol'] = $rol;
        foreach ($datos as $clave => $valor) {
            $_SESSION[$clave] = $valor;
        }
        $_SESSION['time'] = time();
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    }
    
    function __set($var, $valor)
    {
        $_SESSION[$var] = $valor;
    }
    
    function __get($var)
    {
        if (isset($_SESSION[$var])) {
            return $_SESSION[$var];
        } else {
            return null;
        }
    }
    
    public static function cerrarSesion()
    {
        session_destroy();
        if (ini_get("session.use_cookies")) {
            // Eliminamos también los rastros de sesion en el cliente
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"],
                $params["domain"], $params["secure"], $params["httponly"]);
        }
        
        throw new Exception("Se ha cerrado la sesión");
    }
    
    public function inactividadSesion($tiempo)
    {
        $tiempoTranscurrido = time() - $this->time;
        if ($tiempoTranscurrido < $tiempo) {
            $this->time = time();
        } else {
            $this->cerrarSesion();
        }
    }
    
    public function ipSesion()
    {
        if (($this->ip) !== ($_SERVER['REMOTE_ADDR'])) {
            $this->cerrarSesion();
        }
    }
}

?>
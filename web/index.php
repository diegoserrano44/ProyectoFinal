<?php

//Carga del modelo y los controladores
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/modelos/Model.php';
require_once __DIR__ . '/../app/modelos/classAnuncio.php';
require_once __DIR__ . '/../app/modelos/classMensaje.php';
require_once __DIR__ . '/../app/modelos/classUsuario.php';
require_once __DIR__ . '/../app/modelos/classSesion.php';
require_once __DIR__ . '/../app/modelos/classValidacion.php';
require_once __DIR__ . '/../app/libs/utils.php';
require_once __DIR__ . '/../app/controller/cController.php';
require_once __DIR__ . '/../app/controller/cAnuncios.php';
require_once __DIR__ . '/../app/controller/cMensajes.php';
require_once __DIR__ . '/../app/controller/cUsuarios.php';
require_once __DIR__ . '/../app/controller/cAjax.php';


/**
*Si tenemos que usar sesiones podemos poner aqui el inicio de sesión, de manera que si el usuario todavia no está logueado
*lo identificamos como visitante, por ejemplo de la siguiente manera: $_SESSION['nivel_usuario']=0
*/
$Sesion=new Sesion();

// enrutamiento
$map = array(
    /*
    En cada elemento podemos añadir una posición mas que se encargará de otorgar el nivel mínimo para ejecutar la acción
    Puede quedar de la siguiente manera
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio', 'nivel_usuario'=>0)
    */
    'inicio' => array('controller' =>'cController', 'action' =>'inicio', 'rol'=>0),    
    'buscar' => array('controller' =>'cAnuncios', 'action' =>'buscar', 'rol'=>0),
    'registrarUsuario' => array('controller' =>'cUsuarios', 'action' =>'registrarUsuario', 'rol'=>0),
    'registroGoogle' => array('controller' =>'cUsuarios', 'action' =>'registroGoogle', 'rol'=>0),
    'entrarUsuario' => array('controller' =>'cUsuarios', 'action' =>'entrarUsuario', 'rol'=>0),
    'loginGoogle' => array('controller' =>'cUsuarios', 'action' =>'loginGoogle', 'rol'=>0),
    'entrarAdmin' => array('controller' =>'cUsuarios', 'action' =>'entrarAdmin', 'rol'=>0),
    'inicioAdmin' => array('controller' =>'cController', 'action' =>'inicioAdmin', 'rol'=>2),
    'listarUsuarios' => array('controller' =>'cUsuarios', 'action' =>'listarUsuarios', 'rol'=>1),
    'listarAnuncios' => array('controller' =>'cAnuncios', 'action' =>'listarAnuncios', 'rol'=>0),
    'listarAnunciosUsuario' => array('controller' =>'cAnuncios', 'action' =>'listarAnunciosUsuario', 'rol'=>0),      
    'verAnuncio' => array('controller' =>'cAnuncios', 'action' =>'verAnuncio', 'rol'=>0),    
    'crearAnuncio' => array('controller' =>'cAnuncios', 'action' =>'crearAnuncio', 'rol'=>1),
    'modificarAnuncio' => array('controller' =>'cAnuncios', 'action' =>'modificarAnuncio', 'rol'=>1),
    'cambiaImagen' => array('controller' =>'cAnuncios', 'action' =>'cambiaImagen', 'rol'=>1),
    'eliminarAnuncio' => array('controller' =>'cAnuncios', 'action' =>'eliminarAnuncio', 'rol'=>1),
    'verPerfil' => array('controller' =>'cUsuarios', 'action' =>'verPerfil', 'rol'=>1),
    'modificarPerfil' => array('controller' =>'cUsuarios', 'action' =>'modificarPerfil', 'rol'=>1),
    'eliminarPerfil' => array('controller' =>'cUsuarios', 'action' =>'eliminarPerfil', 'rol'=>2),
    'sinpermisos' => array('controller' =>'cController', 'action' =>'sinpermisos', 'rol'=>0),
    'salirUsuario' => array('controller' =>'cUsuarios', 'action' =>'salirUsuario', 'rol'=>1),
    'listarMensaje' => array('controller' =>'cMensajes', 'action' =>'listarMensaje', 'rol'=>1),
    'mandarMensaje' => array('controller' =>'cMensajes', 'action' =>'mandarMensaje', 'rol'=>1),
    'error' => array('controller' =>'cController', 'action' =>'error', 'rol'=>0),
    'activarUsuario' => array('controller' =>'cUsuarios', 'action' =>'activarUsuario', 'rol'=>0),
    'recordarPassword'=> array('controller' =>'cUsuarios', 'action' =>'recordarPassword', 'rol'=>0),
    'pidePassword'=> array('controller' =>'cUsuarios', 'action' =>'pidePassword', 'rol'=>0),
    'cambiarPassword'=> array('controller' =>'cUsuarios', 'action' =>'cambiarPassword', 'rol'=>0),
    'enviarPass'=> array('controller' =>'cUsuarios', 'action' =>'enviarPass', 'rol'=>0),
    'responderMensaje' => array('controller' =>'cAjax', 'action' =>'responderMensaje', 'rol'=>1),
    'dameMensajes' => array('controller' =>'cAjax', 'action' =>'dameMensajes', 'rol'=>1),
    'eliminarHilo' => array('controller' =>'cAjax', 'action' =>'eliminarHilo', 'rol'=>1),
    'existeUsuario' => array('controller' =>'cAjax', 'action' =>'existeUsuario', 'rol'=>0),

);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        header('location: ../app/vistas/notFound.html');
        exit;
    }
} else {
    $ruta = 'inicio';
}
$controlador = $map[$ruta];

/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, si es así ejecutamos el método correspondiente.
En aso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariaos tambien si el usuario tiene permiso suficiente para ejecutar esa acción
*/
if ($controlador['rol']<=$_SESSION['rol']) {
    if (method_exists($controlador['controller'],$controlador['action'])) {
        
            call_user_func(array(new $controlador['controller'],
                $controlador['action']));;
      
    } else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: El controlador <i>' .
            $controlador['controller'] .
            '->' .
            $controlador['action'] .
            '</i> no existe</h1></body></html>';
        }    
    } else{
        $controlador = $map['sinpermisos'];
        call_user_func(array(new $controlador['controller'],
            $controlador['action']));;
        
    } 

?>
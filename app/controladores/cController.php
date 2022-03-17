<?php 

class cController{

    public function inicio()
    {

        require __DIR__ . '/../vistas/vInicio.php';
    }

    public function inicioAdmin()
    {
        
        require __DIR__ . '/../vistas/vInicioAdmin.php';
    }

    public function error()
    {

        require __DIR__ . '/../vistas/vError.php';
    }

    public function sinpermisos()
    {

        require __DIR__ . '/../vistas/vSinpermisos.php';
    }




}


?>
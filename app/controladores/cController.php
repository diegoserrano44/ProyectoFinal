<?php 

class cController{

    public function inicio()
    {

        header('location:http://localhost/ProyectoFinal/web/index.php?ctl=listarHistorias');
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

        require __DIR__ . '/../vistas/vSinPermisos.php';
    }




}


?>
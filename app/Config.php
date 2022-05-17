<?php

class Config {

static public $mvc_bd_hostname = "localhost";
static public $mvc_bd_nombre = "dbs5310872";
static public $mvc_bd_usuario = "root";
static public $mvc_bd_clave = "";

static public $mvc_vis_css = "styles.css";

static public $extensionesValidas = ["gif","jpg","png","JPG","PNG","jpeg","JPEG"];
static public $size = 3000000;
static public $errores = [];
static public $default_foto = "default_user.png";
static public $ruta_imagenes = "img/";
static public $listCategories = ["","java","javascript","php","jquery","python","angular"];

static public $controlEtiquetas = array('<h1>','<h2>','<h3>','<h4>','<h5>','<h6>','<p>','<pre>','<b>','<em>','<strong>','<span>','<ul>','<ol>','<li>');

static public $clientID = '871344324220-1srfarquv5kgh41fo4ufqud3i89e4eoj.apps.googleusercontent.com';
static public $clientSecret = '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';
static public $redirectUri = 'https://localhost/web/index.php?ctl=entrarUsuario';
}
?>
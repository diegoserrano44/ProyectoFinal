<?php

function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp = strip_tags(sinEspacios($_REQUEST[$var]));
    else
        $tmp = "";

    return $tmp;
}

function recogeEnriquecido($var)
{
    if (isset($_REQUEST[$var]))
        $tmp = strip_tags(sinEspacios($_REQUEST[$var]), Config::$controlEtiquetas);
    else
        $tmp = "";

    return $tmp;
}

function recogeCheck(array $text)
{
    if (isset($_REQUEST[$text]))
        return true;
    else
        return false;
}

function recogeCheckArray(string $text)
{
    if (isset($_REQUEST[$text])) {
        if (! empty($_REQUEST[$text])) {
            foreach ($_REQUEST[$text] as $key => $value) {
                return intval($value);
            }
        } else
            return false;
    } else
        return false;
}

/**
 * Subir validar archivo adjunto y moverlo a la carpeta
 */
function cFile(string $text, string $campo, array &$errores, string $ruta, array &$extensionesValidas, int $size, string $nombreFichero = NULL, bool $sobreescribe = false)
{
    if ($_FILES[$text]['error'] != 0) {
        $errores[$campo] = "Se ha producido un error.";
        return false;
    } else {
        $nombreArchivo = $_FILES[$text]['name'];
        $directorioTemp = $_FILES[$text]['tmp_name'];
        $arrayArchivo = pathinfo($nombreArchivo);
        $extension = $arrayArchivo['extension'];
        if (! in_array($extension, $extensionesValidas)) {
            $errores[$campo] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            return false;
        }
        if (filesize($directorioTemp) > $size) {
            $errores[$campo] = "La imagen debe de tener un tamaño inferior a $size kb";
            return false;
        }
        if (empty($errores)) {
            if (is_null($nombreFichero)) {
                $nombreArchivo = time() . $nombreArchivo;
            } else {
                if ($sobreescribe) {
                    $nombreArchivo = $nombreFichero . "." . $extension;
                } else {
                    $nombreArchivo = $nombreFichero . time() . "." . $extension;
                }
            }
            $nombreCompleto = $ruta . $nombreArchivo;
            if (move_uploaded_file($directorioTemp, $nombreCompleto)) {
                // echo "<br> El fichero \"$nombreCompleto\" ha sido guardado";
                return $nombreCompleto; // true;
            } else {
                $errores[$campo] = "El fichero no se ha podido guardar.";
                return false;
            }
        }
    }
}

/**
 * Eliminar espacios de un string
 */
function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

/**
 * Encriptar password
 */
function crypt_password($password)
{
    $salt = '$2a$07$usesomesillystringforsalt$';
    $pass = crypt($password, $salt);
    return $pass;
}

/**
 * Limpiar hora de una fecha con timestap
 * y ponerla en formato día-mes-año
 */
function formatearFecha($fecha)
{
    return date("d-m-Y", strtotime($fecha));
}

/**
 * Función para enviar emails
 */
function enviarMail($para, $asunto, $mensaje)
{
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: HELProgramming <diegoserrano1644@gmail.com>" . "\r\n";
    if (mail($para, $asunto, $mensaje, $headers)) {
        return true;
    } else {
        return false;
    }
}

function emailToken($token)
{
    $mensaje = "
        <html>
        <head>
        <title>Activación cuenta HELProgramming</title>
        </head>
        <body>
            <p>Debes activar tu cuenta para poder hacer login, sigue el siguiente enlace:</p>
            <a href='http://www.mariasantanaruiz.com/web/index.php?ctl=activarUsuario&id=" . $token . "' >Activa tu cuenta</a>
        </body>
        </html>
        ";
    return $mensaje;
}

function emailPassword($token)
{
    $mensaje = "
        <html>
        <head>
        <title>Establece una nueva password HELProgramming</title>
        </head>
        <body>
            <p>Pulsa en el siguiente enlace para establecer una contraseña nueva:</p>
            <a href='http://www.mariasantanaruiz.com/web/index.php?ctl=recordarPassword&id=" . $token . "' >Establece una contraseña nueva</a>
        </body>
        </html>
        ";
    return $mensaje;
}

function before ($clave, $inthat)
{
    return substr($inthat, 0, strpos($inthat, $clave));
};
?>
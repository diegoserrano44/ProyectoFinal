<?php

/**
 * Clase para realizar validaciones en el modelo
 * Es utilizada para realizar validaciones en el modelo de nuestras clases.
 *
 */
class Validacion
{

    protected $_atributos;

    protected $_error;

    public $mensaje;

    /**
     * Metodo para indicar la regla de validacion
     * El método retorna un valor verdadero si la validación es correcta, de lo contrario retorna el objeto
     * actual, permitiendo acceder al atributo Validacion::$mensaje ya que es publico
     */
    public function rules($rule = array(), $data)
    {
        
        if (! is_array($rule)) {
            $this->mensaje = "las reglas deben de estar en formato de arreglo";
            return $this;
        }
        foreach ($rule as $key => $rules) {
            $reglas = explode(',', $rules['regla']);
            /*echo "<pre>";
            var_dump($reglas);
            echo "</pre>";*/
            if (array_key_exists($rules['name'], $data)) {
                foreach ($data as $indice => $valor) {
                    if ($indice === $rules['name']) {
                        foreach ($reglas as $clave => $valores) {
                            $validator = $this->_getInflectedName($valores);
                            if (! is_callable(array(
                                $this,
                                $validator
                            ))) {
                                throw new BadMethodCallException("No se encontro el metodo $valores");
                            }
                                $respuesta = $this->$validator($rules['name'], $valor);
                        }
                        break;
                    }
                }
            } else {
                
                $this->mensaje[$rules['name']] = "el campo {$rules['name']} no esta dentro de la regla de validación o en el formulario";
            }
        }
        if (!empty($this->mensaje)) {
            return $this;
        } else {
            return true;
        }
    }

    /*
     * Metodo inflector de la clase
     * por medio de este metodo llamamos a las reglas de validacion que se generen
     */
    private function _getInflectedName($text)
    {
        $validator = "";
        $_validator = preg_replace('/[^A-Za-z0-9]+/', ' ', $text);
        $arrayValidator = explode(' ', $_validator);
        if (count($arrayValidator) > 1) {
            foreach ($arrayValidator as $key => $value) {
                if ($key == 0) {
                    $validator .= "_" . $value;
                } else {
                    $validator .= ucwords($value);
                }
            }
        } else {
            $validator = "_" . $_validator;
        }
        
        //var_dump($validator);
        return $validator;
    }

    /**
     * Metodo de verificacion de que el dato no este vacio o NULL
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _noEmpty($campo, $valor)
    {
        if (isset($valor) && ! empty($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe de estar lleno";
            return false;
        }
    }

    /**
     * Metodo de verificacion de tipo numerico
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _numeric($campo, $valor)
    {
        if (is_numeric($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe de ser numerico";
            return false;
        }
    }

    /**
     * Metodo de verificacion de tipo numerico
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _existeCategoria($campo, $valor)
    {
        if (in_array($valor, Config::$listCategories)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe tener al menos una categoria seleccionada";
            return false;
        }
    }

    /**
     * Metodo de verificacion de tipo email
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _email($campo, $valor)
    {
        if (filter_var($valor,FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe estar en el formato de email usuario@servidor.com";
            return false;
        }
    }
    
    /*Se ha implementado la password, falta hacer que el regexp sea pasado por una variable*/

    protected function _password($campo, $valor)
    {
        $res = array("options"=>array("regexp"=>"/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,12}$/"));
                
        if (filter_var($valor,FILTER_VALIDATE_REGEXP, $res)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe contener mayusculas minusculas al menos un número y un caracter especial";
            return false;
        }
    }
    protected function _fecha($campo, $valor, $format ='Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $valor);
        if($d && $d->format($format) == $valor){
            return true;
        }else{
            $this->mensaje[$campo][] = "el campo $campo no es correcta";
            return false;
        };
    }
    protected function _usuario($campo, $valor)
    {
        $regex = '/^[a-zA-Z][a-zA-z0-9\@\."]{5,12}$/';
        if (preg_match($regex,$valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo no debe tener caracteres especiales";
            return false;
        }
        
    }
    protected function _texto($campo, $valor){
        $regex = '/^[a-zA-Z]+$/';
        if (preg_match($regex,$valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo solo admite texto";
            return false;
        }
    }
    protected function _telefono($campo, $valor){
        $regex = '/^[6789]\d{8}$/';
        if (preg_match($regex,$valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo no es válido";
            return false;
        }
    }
    protected function _imagen($campo, $valor) {
        if (file_exists($valor['tmp_name'])) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo no es válido";
            return false;
        }
    }

}

/*
 * Ejemplo de uso de la clase, es muy sencillo.  
 */ 
/*
$datos['campo1'] = "33";
$datos['campo2'] = "usuario@gmail.com";
$datos['campo3'] = "Ho12345@";
$datos['campo4'] = "2022-03-12";

$validacion = new Validacion();
$regla = array(
    array(
        'name' => 'campo2',
        'regla' => 'no-empty,email'
    ),
    array(
        'name' => 'campo1',
        'regla' => 'no-empty,numeric'
    ),
    array(
        'name' => 'campo3',
        'regla' => 'no-empty,password'
    ),
    array(
        'name' => 'campo4',
        'regla' => 'no-empty,fecha'
    )
);
$validaciones = $validacion->rules($regla, $datos);
print_r($validaciones);
*/
?>
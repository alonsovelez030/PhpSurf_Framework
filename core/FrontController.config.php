<?php
/**
 * PhpSurf
 *
 * Esto es una aplicación Open Source
 *
 *
 * Copyright (c) 2017
 *
 * Framework de desarollo PhpSurf
 * Customizado y Testeado para la fabricación
 * De aplicaciones Web Completas.
 *
 *
 * @package  PhpSurf
 * @author   Alonso Velez Marulanda
 * @copyright    Copyright (c) 2017
 * @version  Version 1.0.0

 *
 * --------------------------------------------------------------------
 * PROCESAR CLASES Y METODOS
 * --------------------------------------------------------------------
 *
 * Este conjunto de funciones nos permite procesar las clases y las 
 * métodos que tengamos cargados, validará si existen o no los mismos
 * para ser cargados y renderizar sus respectivos templates o cargar 
 * datos.......
 * 
 * @author  Alonso Velez Marulanda <alonso_work@hotmail.com>
 * 
 *
 * @global BASE_DIR                 Variable que contiene el Path original
 *                                  del projecto
 * @global DEFAULT_CONTROLLER       Variable que contiene el controlador
 *                                  principal por defecto
 * @global DEFAULT_METHOD           Variable que contiene el metodo
 *                                  principal por defecto
 * @global PATH_CONTROLLER          Contiene el path original de los controladores
 *
 * @global PATH_MODEL               Contiene el path original de los modelos
 *
 * @global PATH_VIEW                Contiene el path original de las vistas
 *
 */

// --------------------------------------------------------------------

/** 
 *
 * Variable que trae desde la URL un parametro
 * para poder evaluar si es valido como controlador
 *
 * @param string $controller    
 *
 * @function loadController()    Función que se encarga de traer (en caso de que exista) el parametro via URI
 *
 **/
    function loadController($controller){

        /** 
         *
         * Validamos que si la variable viene con una barra invertida
         * en su contenido, para proceder a reemplazarla
         *
         **/
        if (preg_match("[/]", $controller)) {
            $ctrl = $controller."Controller";
            $controllFull = str_replace("/", "", $ctrl);
        }else{
            $controllFull = $controller."Controller";
        }

        $strFileController=PATH_CONTROLLER.$controllFull.'.php';

        /**
         * Si existe el archivo en la carpeta Controllers 
         *
         * @var string $strFileController 
         * @return Retorna la instancia del controlador
         * 
         */
        if(is_file($strFileController)){
            require_once $strFileController;
            $controllerObj=new $controllFull();
            return $controllerObj;
        }else{
            header("Location:".BASE_DIR."/Errors/error404");
        }
    }

// --------------------------------------------------------------------

/**
 *
 * @function loadDefaultController()
 *
 * Función que se ejecuta como alternativa
 * a que el usuario no ingrese vía URI
 * una variable que instancie un controlador
 * 
 **/   
    function loadDefaultController(){
        $controlador=ucwords(DEFAULT_CONTROLLER).'Controller';
        $loadFileController=PATH_CONTROLLER.$controlador.'.php';

        require_once $loadFileController;
        $controllerObj=new $controlador();
        return $controllerObj;
    }

// --------------------------------------------------------------------

/**
 *
 * Variable que trae el controlador instanciado
 *
 * @param string $controllerObj
 *
 * @function    callMethod()     Función que es llamada, trayendo el objeto o controlador instanciado
 *
 **/
    function callMethod($controllerObj){

        /**
         * 
         * Instancia el método en caso de existir vía URL
         * en un caso contrario simplemente carga el primer
         * método que exista en la objeto que se cargo 
         *
         * @var      $_GET["method"]     variable que se carga via URL
         * @param    $controllerObj      Objeto instanciado traido por la función  
         * 
         **/
        if (isset($_GET['method'])) {
            if (preg_match("[/]",$_GET["method"])){
                $method = str_replace("/","", $_GET["method"]);
            }else{
                $method = $_GET["method"];
            }
        }

        if(isset($_GET["method"]) && method_exists($controllerObj, $method)){
            instanceWork($controllerObj, $method);
        }else if(isset($_GET["method"]) && !method_exists($controllerObj, $method)){
            header("Location:".BASE_DIR."/Errors/error404");
        }else{
            //get all methods of class instance
            $methods_class = get_class_methods($controllerObj);
            instanceWork($controllerObj, $methods_class[1]);
        }
    }

// --------------------------------------------------------------------

/**
 * Llamada al controlador y método
 *
 * @param string $controllerObj  Trae la instancia del controlador
 * @param string $method         Trae el método
 *
 **/
    function instanceWork($controllerObj,$method){
        $controllerObj->$method();
    }
?>

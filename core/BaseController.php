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
 * CONTROLADOR BASE
 * --------------------------------------------------------------------
 *
 * Este controlador base nos carga las conexiones a la base de datos
 * las entidades base, para construir consultas, los helpers para controladores
 * instanciamos los modelos y cargamos las vistas
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
 *
 */

// --------------------------------------------------------------------
#averiguar sobre el Access-Control-Allow-Origin para permitir conexiones remotas a la API
header( 'X-Frame-Options: SAMEORIGIN' );
header( 'X-XSS-Protection: 1;mode=block' );
$sess_parameters = session_name();
if (session_start()) {
	setcookie($sess_parameters, session_id(), null, '/', null, null, true);
}

class BaseController{

	//Load Transversal Classes and Models
	public function __construct() {
		
		/**
		 *---------------------------------------------------------------
		 * CONEXIÓN A LA BASE DE DATOS
		 *---------------------------------------------------------------
		 * 
		 * Este archivo nos carga y retorna la conexión a la base de datos
		 *
		 */
		require_once 'Connect.php';
		
		/**
		 *---------------------------------------------------------------
		 * ENTIDAD BASE
		 *---------------------------------------------------------------
		 * 
		 * Esta clase nos permite acceder a consultas personalizadas
		 * que pueden ser utilizadas por cualquier controlador
		 *
		 */
		require_once 'EntityBase.php';

		/**
		 *---------------------------------------------------------------
		 * PHP MAILER, FOR SEND MAILS
		 *---------------------------------------------------------------
		 *
		 */
		require_once "library/phpmailer/class.phpmailer.php";

		/**
		 *---------------------------------------------------------------
		 * PHP FPDF
		 *---------------------------------------------------------------
		 *
		 */
		require_once "library/fpdf/fpdf.php";

		/**
		 *---------------------------------------------------------------
		 * PHP RESIZE
		 *---------------------------------------------------------------
		 *
		 */
		require_once "library/php-resize/lib/ImageResize.php";
		
		/**
		 *---------------------------------------------------------------
		 * MODELOS
		 *---------------------------------------------------------------
		 * 
		 * Carga (no instancia) de modelos existentes en la carpeta model 
		 * de nuestra app
		 *
		 */
		foreach(glob(PATH_MODEL."*.php") as $file){
			require_once $file;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * 
	 * @function render() 
	 * 
	 * Esta función nos carga todas las vistas que le pasemos
	 * por parametro.
	 *
	 * @class HelperViews
	 *
	 * Esta clase trae todas los helper disponibles para la vista
	 *
	 * @param string $folder  carpeta donde se encuentra la vista
	 * @param string $view    nombre del template
	 * @param string $data    data en forma de array o variable estandar
	 *
	 **/

	public function render($folder,$view,$data){
		//validamos que vengan datos en la variable para las vistas
		if (!empty($data)) {
			foreach ($data as $id_assoc => $value) {
				${$id_assoc}=$value; 
			}
		}
		if (file_exists(PATH_VIEW."base.php")) {
			require_once PATH_VIEW.'/base.php';
		}else{
			echo "ATENCIÓN!<BR> CREAR EL LAYOUT [base.php] EN LA RAIZ DEL FOLDER app/[views]";
			
		}
		//helper vistas
		require_once 'core/helpers/HelperViews.php';
		$helper=new HelperViews();
		//en la vista llamamos $helper->[NAME_METHOD]
		require_once PATH_VIEW.$folder.'/'.$view;
	}

	// --------------------------------------------------------------------

	/**  
	 *
	 * @param  string   $model      nombre del modelo a cargar
	 * @param string    $adapter    conexión a la base de datos
	 *
	 * @function model()   carga un modelo y su conexión
	 *
	 **/
	public function model($model,$adapter,$table){
		return new $model($adapter,$table);
	}

	// --------------------------------------------------------------------

	/**
	 *---------------------------------------------------------------
	 * HELPERS CONTROLADORES
	 *---------------------------------------------------------------
	 * 
	 * Conjunto de helpers o funciones precargadas
	 *
	 */
	public function helper($helper){
		$route = "helpers/".$helper."Helper.php";
		require_once $route;
	}
}
?>
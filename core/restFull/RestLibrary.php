 <?php 

 class Rest extends BaseController{
    
   public $tipo = "application/json";  
   public $datosPeticion = array();  
   private $_codEstado = 200;


   public function __construct() {
    parent::__construct();
   }  

   public function showAnswer($data, $estado) {  
     $this->_codEstado = ($estado) ? $estado : 200;//si no se envía $estado por defecto será 200  
     $this->setHeaders();  
     echo $data;  
     exit;  
   }  

   private function setHeaders() {  
     header("HTTP/1.1 " . $this->_codEstado . " " . $this->getCodState());  
     header("Content-Type:" . $this->tipo . ';charset=utf-8');  
   }  

   public function errorReturn($id) {  
     $errores = array(  
       array('estado' => "error", "msg" => "petición no encontrada"),  
       array('estado' => "error", "msg" => "petición no aceptada"),  
       array('estado' => "error", "msg" => "petición sin contenido"),  
       array('estado' => "error", "msg" => "email o password incorrectos"),  
       array('estado' => "error", "msg" => "error borrando usuario"),  
       array('estado' => "error", "msg" => "error actualizando nombre de usuario"),  
       array('estado' => "error", "msg" => "error buscando usuario por email"),  
       array('estado' => "error", "msg" => "error creando usuario"),  
       array('estado' => "error", "msg" => "usuario ya existe")  
     );  
     return $errores[$id];  
   }  

   public function Serialize($data) {  
     return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);  
   }

   public function cleanEntry($data) {  
     $entrada = array();
     $type = gettype($data);

     if ($type == "array" || $type == "object") {  
       foreach ($data as $key => $value) {  
         $entrada[$key] = $this->cleanEntry($value);  
       }  
     } else {  
       if (get_magic_quotes_gpc()) {
         $data = trim(stripslashes($data));  
       } 

       $data = strip_tags($data); 
       $data = htmlspecialchars($data);
       $data = addslashes($data);
       $entrada = trim($data);
     }  
     return $entrada;  
   }  
    
   public function HttpMethod(){
        header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');                
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
        case 'GET'://consulta
            return 'GET';
            break;     
        case 'POST'://inserta
            return 'POST';
            break;                
        case 'PUT'://actualiza
            return 'PUT';
            break;      
        case 'DELETE'://elimina
            return 'DELETE';
            break;
        default://metodo NO soportado
            return 'METODO NO SOPORTADO';
            break;
        }
    } 

   private function getCodState() {  
     $estado = array(  
       200 => 'OK',  
       201 => 'Created',  
       202 => 'Accepted',  
       204 => 'No Content',  
       301 => 'Moved Permanently',  
       302 => 'Found',  
       303 => 'See Other',  
       304 => 'Not Modified',  
       400 => 'Bad Request',  
       401 => 'Unauthorized',  
       403 => 'Forbidden',  
       404 => 'Not Found',  
       405 => 'Method Not Allowed',  
       500 => 'Internal Server Error');  
     $respuesta = ($estado[$this->_codEstado]) ? $estado[$this->_codEstado] : $estado[500];  
     return $respuesta;  
   }  
 }

?>  
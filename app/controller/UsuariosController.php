<?php
    class UsuariosController extends BaseController{
        private $conectar;
    	private $adapter;
        private $users;
        private $api_rest;
    	
        public function __construct() {
            parent::__construct();
            $this->conectar=new Connect();
            //conexion
            $this->adapter=$this->conectar->con();
            //load the model Usuario
            $this->users = $this->model("Usuario",$this->adapter);
            //load helper
            $this->helper("Uri");
            //load rest
            $this->api_rest = new Rest();

        }
        
        public function index(){
            $this->render("Usuarios","homeView.php",$data="");
        }

        public function users(){
            if (isset($_REQUEST['parametro'])) {
                $param = proccessParameter($_REQUEST['parametro']);
                $query = $this->users->getById($param);
                $view = "userView.php";
            }else{
                $query = $this->users->getAll();
                $view = "usersView.php";
            }
            
            $allUser = $query;
            $this->render("Usuarios",$view,array("users"=>$allUser));
        }

        public function secondview(){
            $this->render("Usuarios","seconView.php",$data="");
        }

        public function borrar(){
            echo $_REQUEST['parametro'];
        }

        public function rest(){
            if ($this->api_rest->API() == "GET") {
                $query = $this->users->getAll();
                response($query);
            }
        }
    }
?>

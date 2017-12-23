<?php
    class homeController extends Rest{
        private $conectar;
    	private $adapter;
    	

        public function __construct() {
            parent::__construct();
            $this->conectar=new Connect();
            //conexion
            $this->adapter=$this->conectar->con();
            //load the model search
            // $this->model(MODEL_FILE,ADAPTER,TABLE);
            $this->collection = $this->model("homeModel",$this->adapter,NULL);
        }

        public function index(){

            $msg = $this->collection->welcomeCollection();

            // $this->render(FOLDER,VIEW_FILE,DATA);
            $this->render("home","homeView.php",array("msg"=>$msg));

        }
    }
?>

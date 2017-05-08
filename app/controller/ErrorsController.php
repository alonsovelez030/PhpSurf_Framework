<?php
    class ErrorsController extends BaseController{

        public function __construct() {
            parent::__construct();
        }
        
        public function error404(){
            $this->render("Errors","404View.php",$data="");
        }
        public function error500(){
            $this->render("Errors","500View.php",$data="");
        }
        public function error403(){
            $this->render("Errors","403View.php",$data="");
        }
    }
?>

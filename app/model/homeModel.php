<?php
    class homeModel extends EntityBase{
        private $id;
        
        public function __construct($adapter,$table=NULL) {
            parent::__construct($table, $adapter);
        }


        public function welcomeCollection(){
            return array("msg"=>"BIENVENIDO A PHP SURF");
        }
    }
?>
<?php
class Usuario extends EntityBase{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    
    public function __construct($adapter) {
        $table="usuarios";
        parent::__construct($table, $adapter);
    }

    public function save(){
        $query="INSERT INTO usuarios (id,nombre,apellido,email,password)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->email."',
                       '".$this->password."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

}
?>
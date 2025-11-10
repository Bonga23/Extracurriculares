<?php
//conexion para registrarse a la base de datos 
class conexion{
    //variables
    //debemos tener una bd extracurriculares y una tabla llamada usuarios
    private $servidor="localhost";
    private $usuario="root";
    private $password="";
    private $db="extracurriculares";

    //variable de la conexion
    private $con;
    public function __construct(){
        $this->conectar();
    }
    private function conectar(){
        $this->con=new mysqli($this->servidor,$this->usuario,$this->password,$this->db);

        if ($this->con->connect_error) {
            die ("conexion fallida ".$this->con->connect_error);
        }else {
            echo("conexion exitosa");
        }
    }
    public function getCon(){
        return $this->con;
    }

    public function  cerrar(){
        $this->con->close();
    }
}



?>
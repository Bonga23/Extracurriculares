<?php
class conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "";
    private $db = "extracurriculares";
    private $con;

    public function __construct() {
        $this->conectar();
    }

    private function conectar() {
        $this->con = new mysqli($this->servidor, $this->usuario, $this->password, $this->db, 3306);
        if ($this->con->connect_error) {
            die("Error de conexión: " . $this->con->connect_error);
        }
    }

    public function getCon() {
        return $this->con;
    }

    public function cerrar() {
        $this->con->close();
    }
}
?>

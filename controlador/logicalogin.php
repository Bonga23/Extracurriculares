<?php
session_start();
require_once('../modelo/conexion.php');

class Login {
    private $conexion;

    public function __construct() {
        $db = new conexion();
        $this->conexion = $db->getCon();
    }

    public function verificarUsuario($usuario, $password) {

        // Detectar si el usuario ingresó correo o matrícula
        if (filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
            // Inicio por correo
            $sql = "SELECT * FROM usuarios WHERE correo = ? AND psw = ?";
        } else {
            // Inicio por matrícula
            $sql = "SELECT * FROM usuarios WHERE matricula = ? AND psw = ?";
        }

        $stmt = $this->conexion->prepare($sql);

        if (!$stmt) {
            die("Error en la preparación: " . $this->conexion->error);
        }

        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {

            $usuarioBD = $resultado->fetch_assoc();

            // Guardar datos en la sesión
            $_SESSION['Matricula'] = $usuarioBD['matricula'];
            $_SESSION['Nombre']    = $usuarioBD['nombre'];

            header("Location: ../vista/intro.php");
            exit();
        } else {
            echo "<script>
                alert('Usuario (correo/matrícula) o contraseña incorrectos');
                window.history.back();
            </script>";
        }

        $stmt->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];       // matrícula O correo
    $password = $_POST['password'];

    $login = new Login();
    $login->verificarUsuario($usuario, $password);
}
?>

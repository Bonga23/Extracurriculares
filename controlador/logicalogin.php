<?php
session_start();//iniciamos la sesion
require_once('../modelo/conexion.php');//direccion de la clase dnd esta las variables de bd

class Login {
    private $conexion;

    public function __construct() {
        // Crear una instancia de la clase conexión
        $db = new conexion();
        // Obtener la conexión activa
        $this->conexion = $db->getCon();
    }

    public function verificarUsuario($matricula, $password) {
        $sql = "SELECT * FROM usuarios WHERE matricula = ? AND psw = ?";
        $stmt = $this->conexion->prepare($sql);

        if (!$stmt) {
            die("Error en la preparación: " . $this->conexion->error);
        }

        // Enlazar parámetros
        $stmt->bind_param("ss", $matricula, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Obtener los datos del usuario
            $usuario = $resultado->fetch_assoc();

            // Guardar matrícula (y opcionalmente el nombre) en la sesión
            $_SESSION['Matricula'] = $usuario['matricula'];
            $_SESSION['Nombre'] = $usuario['nombre'];

            // Redirigir con PHP 
            header("Location: ../vista/extracurriculares.php");
            exit();
        } else {
            echo "<script>
                alert('Matrícula o contraseña incorrecta');
                window.history.back();
            </script>";
        }

        $stmt->close();
    }
}

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $password = $_POST['password'];

    $login = new Login();
    $login->verificarUsuario($matricula, $password);
}
?>

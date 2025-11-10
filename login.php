<?php
require_once("conexion.php");

class Login {
    private $conexion;

    public function __construct() {
        // Crear una instancia de la clase conexión
        $db = new conexion();
        // Obtener la conexión activa
        $this->conexion = $db->getCon();
    }

    public function verificarUsuario($matricula, $password) {
        // Preparar la consulta (usa el nombre correcto del campo "psw")
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
            // Si hay coincidencias
            echo "<script>
                alert('Inicio de sesión exitoso');
                window.location.href='extracurriculares.html';
            </script>";
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

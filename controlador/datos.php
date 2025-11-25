<?php

require_once('../modelo/conexion.php');

class datos {
    private $conexion;

    public function __construct() {
        // Crear instancia de la conexión
        $db = new conexion();
        $this->conexion = $db->getCon();
    }

    // Obtener datos del usuario y su actividad (si tiene)
    public function obtenerDatos($matricula) {

        // Consulta con JOIN para traer la actividad si existe
        $sql = "
            SELECT u.matricula, u.nombre, u.correo, a.nombreActividad AS actividad
            FROM usuarios u
            LEFT JOIN inscripciones i ON u.matricula = i.matricula
            LEFT JOIN actividades a ON i.idActividad = a.idActividad
            WHERE u.matricula = ?
        ";

        $stmt = $this->conexion->prepare($sql);

        if (!$stmt) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("s", $matricula);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>
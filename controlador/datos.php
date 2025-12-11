<?php
require_once('../modelo/conexion.php');

class datos {
    private $conexion;

    public function __construct() {
        // Crear instancia de la conexión
        $db = new conexion();
        $this->conexion = $db->getCon();

        if (!$this->conexion) {
            die("Error: no se pudo establecer la conexión a la base de datos.");
        }
    }

    // Obtener datos del usuario y la actividad ACTIVA (si tiene)
    public function obtenerDatos($matricula) {

        // Ajusta el nombre de columna de la actividad según tu tabla 'actividades'.
        // Aquí uso 'nombreActividad' como en tu función anterior. Cambia si tu columna se llama distinto.
        $sql = "
            SELECT u.matricula, u.nombre, u.correo, a.nombreActividad AS actividad
            FROM usuarios u
            LEFT JOIN inscripciones i ON u.matricula = i.matricula AND i.estado = 'activa'
            LEFT JOIN actividades a ON i.idActividad = a.idActividad
            WHERE u.matricula = ?
            LIMIT 1
        ";

        $stmt = $this->conexion->prepare($sql);
        if (!$stmt) {
            die("Error en prepare obtenerDatos: " . $this->conexion->error . " -- SQL: " . $sql);
        }

        $stmt->bind_param("s", $matricula);
        if (!$stmt->execute()) {
            die("Error en execute obtenerDatos: " . $stmt->error);
        }

        $resultado = $stmt->get_result();
        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            // devolver un array con al menos las llaves esperadas para evitar warnings en la vista
            return ['matricula' => $matricula, 'nombre' => '', 'correo' => '', 'actividad' => null];
        }
    }

    // Obtener historial de actividades
    public function obtenerHistorial($matricula) {
        $sql = "
            SELECT a.nombreActividad AS actividad, i.estado, i.fechaRegistro
            FROM inscripciones i
            LEFT JOIN actividades a ON a.idActividad = i.idActividad
            WHERE i.matricula = ?
            ORDER BY i.fechaRegistro DESC
        ";

        $stmt = $this->conexion->prepare($sql);
        if (!$stmt) {
            die("Error en prepare obtenerHistorial: " . $this->conexion->error . " -- SQL: " . $sql);
        }

        $stmt->bind_param("s", $matricula);
        if (!$stmt->execute()) {
            die("Error en execute obtenerHistorial: " . $stmt->error);
        }

        $result = $stmt->get_result();
        return $result; 
    }
}
?>

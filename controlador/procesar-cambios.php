<?php
require_once '../modelo/conexion.php';

// Crear objeto conexión
$clase = new conexion();
$conn = $clase->getCon();

// Recibir datos del formulario
$matricula = $_POST['matricula'];
$nuevaActividad = $_POST['actividad'];

/* ============================================================
   1. VERIFICAR SI EL ALUMNO YA ESTÁ INSCRITO EN ALGO
   ============================================================*/
$consulta = $conn->prepare("SELECT idInscripcion FROM inscripciones WHERE matricula = ?");
$consulta->bind_param("s", $matricula);
$consulta->execute();
$resultado = $consulta->get_result();

if ($resultado->num_rows > 0) {

    // Ya existe → actualizar actividad
    $row = $resultado->fetch_assoc();
    $idInscripcion = $row['idInscripcion'];

    $actualizar = $conn->prepare("
        UPDATE inscripciones 
        SET idActividad = ? 
        WHERE idInscripcion = ?
    ");
    $actualizar->bind_param("ii", $nuevaActividad, $idInscripcion);

    if ($actualizar->execute()) {
        echo ("<script>
            alert('Actividad cambiada exitosamente');
            window.location.href='../vista/extracurriculares.php';
        </script>");
    } else {
        echo ("<script>
            alert('Error al cambiar la actividad');
            window.history.back();
        </script>");
    }

} else {

    // No existe inscripción → crear una
    $insertar = $conn->prepare("
        INSERT INTO inscripciones (matricula, idActividad)
        VALUES (?, ?)
    ");
    $insertar->bind_param("si", $matricula, $nuevaActividad);

    if ($insertar->execute()) {
        echo ("<script>
            alert('Inscripción registrada correctamente');
            window.location.href='../vista/extracurriculares.php';
        </script>");
    } else {
        echo ("<script>
            alert('Error al registrar la inscripción');
            window.history.back();
        </script>");
    }
}

$clase->cerrar();
?>

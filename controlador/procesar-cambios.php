<?php
require_once '../modelo/conexion.php';

// Crear objeto conexión
$clase = new conexion();
$conn = $clase->getCon();

// Recibir datos del formulario
$matricula = $_POST['matricula'];
$nuevaActividad = $_POST['actividad'];

// TERMINAR INSCRIPCIONES ACTIVAS
$terminar = $conn->prepare("
    UPDATE inscripciones 
    SET estado = 'terminada'
    WHERE matricula = ? AND estado = 'activa'
");
$terminar->bind_param("s", $matricula);
$terminar->execute();

//CREAR NUEVA INSCRIPCIÓN COMO ACTIVA
$insertar = $conn->prepare("
    INSERT INTO inscripciones (matricula, idActividad, estado)
    VALUES (?, ?, 'activa')
");
$insertar->bind_param("si", $matricula, $nuevaActividad);

if ($insertar->execute()) {
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

$clase->cerrar();
?>

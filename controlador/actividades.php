<?php
require_once '../modelo/conexion.php';

// Objeto de conexión
$clase = new conexion();
$conn = $clase->getCon();

// Datos del formulario
$matricula = $_POST['matricula'];
$idActividad = $_POST['idActividad'];

// Validar que no esté inscrito ya en la misma actividad
$validarIns = $conn->prepare("SELECT * FROM inscripciones WHERE matricula = ? AND idActividad = ?");
$validarIns->bind_param("ii", $matricula, $idActividad);
$validarIns->execute();
$resIns = $validarIns->get_result();

if ($resIns->num_rows > 0) {
    echo ("<script>
        alert('Ya estás inscrito en esta actividad');
        window.history.back();
    </script>");
    exit;
}

// Insertar inscripción
$insert = $conn->prepare("INSERT INTO inscripciones (matricula, idActividad) VALUES (?, ?)");
$insert->bind_param("ii", $matricula, $idActividad);

if ($insert->execute()) {
    echo ("<script>
        alert('Inscripción realizada con éxito');
        window.location.href='../vista/extracurriculares.php';
    </script>");
} else {
    echo ("<script>
        alert('Error al inscribirse: " . $conn->error . "');
        window.history.back();
    </script>");
}

// Cerrar conexión
$clase->cerrar();
?>

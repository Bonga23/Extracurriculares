<?php
require_once '../modelo/conexion.php';

// Objeto de conexión
$clase = new conexion();
$conn = $clase->getCon();

// Datos del formulario
$matricula = $_POST['matricula'];
$idActividad = $_POST['idActividad'];

// VALIDAR SI YA ESTÁ INSCRITO A ESA ACTIVIDAD CON ESTADO ACTIVA
$validarIns = $conn->prepare("
    SELECT * FROM inscripciones 
    WHERE matricula = ? AND idActividad = ? AND estado = 'activa'
");
$validarIns->bind_param("ii", $matricula, $idActividad);
$validarIns->execute();
$resIns = $validarIns->get_result();

if ($resIns->num_rows > 0) {
    echo ("<script>
        alert('Ya estás inscrito actualmente en esta actividad.');
        window.history.back();
    </script>");
    exit;
}

// SI ESTÁ INSCRITO EN OTRA ACTIVIDAD ACTIVA ENTONCES MARCAMOS EL ESTADO COMO TERMINADA
$terminar = $conn->prepare("
    UPDATE inscripciones
    SET estado = 'terminada'
    WHERE matricula = ? AND estado = 'activa'
");
$terminar->bind_param("i", $matricula);
$terminar->execute();

// INSERTAR NUEVA INSCRIPCIÓN COMO ACTIVA
$insert = $conn->prepare("
    INSERT INTO inscripciones (matricula, idActividad, estado)
    VALUES (?, ?, 'activa')
");
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

$clase->cerrar();
?>

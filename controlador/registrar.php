<?php
require_once '../modelo/conexion.php';

//creamos el objeto de la clase
$clase = new conexion();
//conexion que tenemos en mysql 
$conn = $clase->getCon();

//recibir los datos del formulario --post
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$psw = $_POST['password'];
$confirmar = $_POST['confirmar'];

// Verificar si las contraseñas coinciden
if ($psw !== $confirmar) {
    echo ("<script>
        alert('Las contraseñas no coinciden');
        window.history.back();
    </script>");
    exit; 
}

/*VALIDACIÓN DE DATOS DUPLICADOS (OPCIÓN 1 — 2 CONSULTAS)*/

// 1. Verificar si la matrícula ya existe
$validarMat = $conn->prepare("SELECT matricula FROM usuarios WHERE matricula = ?");
$validarMat->bind_param("s", $matricula);
$validarMat->execute();
$resMat = $validarMat->get_result();

if ($resMat->num_rows > 0) {
    echo ("<script>
        alert('La matrícula ya está registrada');
        window.location.href='../vista/registro.php';
    </script>");
    exit;
}

// 2. Verificar si el correo ya existe
$validarCorreo = $conn->prepare("SELECT correo FROM usuarios WHERE correo = ?");
$validarCorreo->bind_param("s", $correo);
$validarCorreo->execute();
$resCorreo = $validarCorreo->get_result();

if ($resCorreo->num_rows > 0) {
    echo ("<script>
        alert('El correo ya está registrado');
        window.location.href='../vista/registro.php';
    </script>");
    exit;
}

/*INSERTAR USUARIO */

$consulta = $conn->prepare("INSERT INTO usuarios (matricula, nombre, correo, psw) 
                            VALUES (?, ?, ?, ?)");
$consulta->bind_param("ssss", $matricula, $nombre, $correo, $psw);

if ($consulta->execute()) {
    echo ("<script>
        alert('Registro exitoso');
        window.location.href='../vista/loginn.php';
    </script>");
} else {
    echo ("<script>
        alert('Error al registrar: " . $conn->error . "');
        window.history.back();
    </script>");
}

// Cerrar conexión
$clase->cerrar();
?>

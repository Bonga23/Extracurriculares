<?php
session_start();
include "../modelo/conexion.php";

$bd = new conexion();
$conn = $bd->getCon();

if (!isset($_SESSION['Matricula'])) {
    header("Location: ../vista/loginn.php");
    exit();
}

$matricula = $_SESSION['Matricula'];

$contrasena_actual = $_POST['contrasena_actual'];
$nueva_contrasena  = $_POST['nueva_contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];

if ($nueva_contrasena !== $confirmar_contrasena) {
    echo "<script>
        alert('La nueva contraseña y la confirmación no coinciden.');
        window.location.href='../vista/actualizar_contrasena.php';
    </script>";
    exit();
}

$sql = "SELECT psw FROM usuarios WHERE Matricula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matricula);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo "<script>
        alert('Usuario no encontrado.');
        window.location.href='../vista/actualizar_contrasena.php';
    </script>";
    exit();
}

$stmt->bind_result($pswBD);
$stmt->fetch();

if ($contrasena_actual !== $pswBD) {
    echo "<script>
        alert('La contraseña actual es incorrecta.');
        window.location.href='../vista/actualizar_contrasena.php';
    </script>";
    exit();
}

$update_sql = "UPDATE usuarios SET psw = ? WHERE Matricula = ?";
$update_stmt = $conn->prepare($update_sql);
$update_stmt->bind_param("ss", $nueva_contrasena, $matricula);

if ($update_stmt->execute()) {
    echo "<script>
        alert('Contraseña actualizada correctamente.');
        window.location.href='../vista/extracurriculares.php';
    </script>";
} else {
    echo "<script>
        alert('Error al actualizar la contraseña.');
        window.location.href='../vista/actualizar_contrasena.php';
    </script>";
}
?>

<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    header("Location: loginn.php");
    exit();
}

require_once('../controlador/datos.php'); // <-- IMPORTANTE

$matricula = $_SESSION['Matricula']; // <-- FALTABA

$info = new datos(); // <-- ahora sí encuentra la clase
$usuario = $info->obtenerDatos($matricula);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil | UTCJ</title>

    <link rel="stylesheet" href="../public/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="perfil-body">

<header class="navbar-utcj">
    <div class="logo">
        <img src="../public/img/logo_utcj.png" alt="Logo UTCJ" width="200">
    </div>

    <ul class="nav-links">
        <li><a href="https://www.utcj.edu.mx/">Inicio</a></li>
        <li><a href="../vista/extracurriculares.php">Extracurriculares</a></li>
        <li><a href="../vista/horarios.php">Horarios</a></li>
        <li><a href="../vista/cupos.php">Cupos</a></li>
        <li><a href="../vista/cambio-paraescolar.php">Cambios</a></li>

        <div class="user-menu">
            <p><?php echo $_SESSION['Matricula']; ?> <i class="fa-solid fa-user"></i></p>
            <ul class="dropdown">
                <li><a href="../controlador/cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </ul>
</header>

<main>

    <div class="card perfil-card">
        <h2><i class="fa-solid fa-id-card"></i> Información del Perfil</h2>

        <div class="info">

            <p><strong>Nombre:</strong> <?= $usuario['nombre'] ?></p>
            <p><strong>Correo:</strong> <?= $usuario['correo'] ?></p>

            <p><strong>Paraescolar inscrita:</strong> 
                <?= $usuario['actividad'] !== null ? $usuario['actividad'] : "Sin actividad" ?>
            </p>

            <hr>

            <p class="editable">
                <strong><a href="actualizar_contrasena.php">Cambiar contraseña</a></strong>
                <i class="fa-solid fa-pen-to-square edit-icon"></i>
            </p>

        </div>
    </div>

</main>

</body>
</html>

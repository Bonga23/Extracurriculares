<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    // Si no hay sesión activa, redirige al login
    header("Location: loginn.php");
    exit();


}

    $nombre = "Juan Pérez";
    $correo = "juan@example.com";
    $actividad = "Fútbol";
    $telefono = "Sin registrar";

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

            <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
            <p><strong>Correo:</strong> <?php echo $correo; ?></p>
            <p><strong>Paraescolar inscrita:</strong> <?php echo $actividad; ?></p>

            <hr>

            <!-- CONTRASEÑA EDITABLE -->
            <p class="editable" onclick="toggleEdit('password-edit')">
                <strong><a href="actualizar_contrasena.php">cambiar contraseña</a></strong>
                <i class="fa-solid fa-pen-to-square edit-icon"></i>
            </p>

            

        </div>
    </div>

</main>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    header("Location: loginn.php");
    exit();
}

require_once('../controlador/datos.php');
$matricula = $_SESSION['Matricula'];
$info = new datos();
$usuario = $info->obtenerDatos($matricula);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil | UTCJ</title>

    <link rel="stylesheet" href="../public/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="body">

<header class="encabezado">
  <nav class="navbar-utcj">

    <div class="logo">
      <img src="../public/img/logo_utcj.png" alt="Logo UTCJ">
    </div>

    <ul class="nav-links">
        <li><a href="https://www.utcj.edu.mx/">Inicio</a></li>
        <li><a href="../vista/extracurriculares.php">Extracurriculares</a></li>
        <li><a href="../vista/horarios.php">Horarios</a></li>
        <li><a href="../vista/cupos.php">Cupos</a></li>
        <li><a href="../vista/cambio-paraescolar.php">Cambios</a></li>

        <!-- EXACTAMENTE IGUAL QUE EN LAS OTRAS PÁGINAS -->
        <li class="user-menu">
            <p><?php echo $_SESSION['Matricula']; ?> ⮟</p>
            <ul class="dropdown">
                <li><a href="../vista/perfil.php">Configuración</a></li>
                <li><a href="../controlador/cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </li>
    </ul>

  </nav>
</header>

<main>

    <section class="card perfil-card">
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
    </section>

</main>

</body>
</html>

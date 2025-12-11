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
$historial = $info->obtenerHistorial($matricula);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil | UTCJ</title>

    <link rel="stylesheet" href="../public/css/ext.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="body">
<header class="encabezado">
  <nav class="navbar-utcj">

    <div class="logo">
      <img src="../public/img/logo_utcj.png" alt="Logo UTCJ">
    </div>

    <!-- BOTÓN HAMBURGUESA -->
    <div class="menu-toggle">
        <i class="fa-solid fa-bars"></i>
    </div>

    <!-- MENÚ LATERAL -->
    <ul class="nav-links">

        <!-- BOTÓN CERRAR -->
        <li class="close-btn">
            <i class="fa-solid fa-xmark"></i>
        </li>

        <!-- OPCIONES DEL MENÚ -->
        <li><a href="../vista/intro.php">Inicio</a></li>
        <li><a href="../vista/extracurriculares.php">Extracurriculares</a></li>
        <li><a href="../vista/horarios.php">Horarios</a></li>
        <li><a href="../vista/cupos.php">Cupos</a></li>
        <li><a href="../vista/cambio-paraescolar.php">Cambios</a></li>
        <li><a href="../vista/info.php">Más información</a></li>
        <li><a href="../vista/perfil.php">Mi cuenta</a></li>

        <li class="user-menu">
            <p><?php echo $_SESSION['Matricula']; ?> ⮟</p>
            <ul class="dropdown">
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
            <h2 >Historial de actividades <i class="fa-solid fa-clock-rotate-left"></i></h3>

            <?php if ($historial->num_rows > 0): ?>
        <div class="historial">
         <?php while ($row = $historial->fetch_assoc()): ?>
            <div class="historial-item">
                <p ><strong >Actividad:</strong> <?= $row['actividad'] ?></p>
                <p><strong>Estado:</strong> <?= $row['estado'] ?></p>
                <p><strong>Fecha:</strong> <?= $row['fechaRegistro'] ?></p>
                <hr>    
        </div>
        <?php endwhile; ?>
         </div>
        <?php else: ?>
      <p>No tiene historial registrado.</p>
        <?php endif; ?>

  

            <p class="editable">
                <strong><a href="actualizar_contrasena.php">Cambiar contraseña</a></strong>
                <i class="fa-solid fa-pen-to-square edit-icon"></i>
            </p>
        </div>
    </section>



</main>
<script src="../public/js/menu.js"></script>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    header("Location: loginn.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actualizar contraseña</title>
    <link rel="stylesheet" href="../public/css/actualizar_contrasena.css">
</head>
<body>
    
<header class="encabezado">
  <nav class="navbar-utcj">
<div class="logo">
  <img src="../public/img/logo_utcj.png" alt="Logo UTCJ">
</div>

<ul class="nav-links" id="navLinks">
  <li class="close-item">
    <button class="close-btn" id="closeBtn" aria-label="Cerrar menú" type="button">✕</button>
  </li>

  <li><a href="../vista/intro.php">Inicio</a></li>
  <li><a href="../vista/extracurriculares.php">Extracurriculares</a></li>
  <li><a href="../vista/horarios.php">Horarios</a></li>
  <li><a href="../vista/cupos.php">Cupos</a></li>
  <li><a href="../vista/cambio-paraescolar.php">Cambios</a></li>
  <li><a href="../vista/info.php">Más información</a></li>
  <li><a href="../vista/perfil.php">MI cuenta</a></li>

  <li class="user-menu">
    <p><?php echo $_SESSION['Matricula']; ?> ⮟</p>
    <ul class="dropdown">
      <li><a href="../controlador/cerrarsesion.php">Cerrar sesión</a></li>
    </ul>
  </li>
</ul>

<button class="menu-toggle" id="menuToggle" aria-label="Abrir menú" type="button"></button>
  </nav>
</header>

<div class="contenedor">

    <h2>Actualizar contraseña</h2>

    <form action="../controlador/procesar_actualizacion.php" method="POST" class="formulario">

        <div class="grupo">
            <label>Contraseña actual</label>
            <input type="password" name="contrasena_actual" required>
        </div>

        <div class="grupo">
            <label>Nueva contraseña</label>
            <input type="password" name="nueva_contrasena" required>
        </div>

        <div class="grupo">
            <label>Confirmar nueva contraseña</label>
            <input type="password" name="confirmar_contrasena" required>
        </div>

        <button type="submit" class="btn">Actualizar</button>

        <a href="extracurriculares.php" class="volver">⮜ Regresar</a>
    </form>
</div>
  <script src="../public/js/menu.js"></script>
</body>
</html>

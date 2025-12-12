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
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../public/css/intro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

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



<section class="intro-container">
    <div class="intro-box">
        <h1>Actividades Extracurriculares UTCJ</h1>
        <p>
        Esta página está diseñada como una propuesta de rediseño para el apartado de actividades extracurriculares de la UTCJ. 
        Nuestro objetivo es facilitar que nuestros compañeros universitarios conozcan las actividades disponibles y puedan inscribirse de manera sencilla y rápida.
        </p>
        <p>Recuerda que solo puedes estar inscrito en una actividad a la vez</p>

        <div class="features">
            <div class="feature">
                <i class="fa-solid fa-clock"></i>
                <p>Conoce los <a href="../vista/horarios.php">horarios</a></p>
            </div>
            <div class="feature">
                <i class="fas fa-dumbbell"></i>
                <p>Conoce las <a href="../vista/extracurriculares.php">actividades</a></p>
            </div>
            <div class="feature">
                <i class="fas fa-graduation-cap"></i>
                <p><a href="../vista/inscripcion.php">Inscríbete</a></p>
            </div>
        </div>

        <a href="extracurriculares.php" class="btn-ingresar">Continuar</a>
    </div>
</section>

  <footer class="footer">
    <div class="info-footer">
      <div>
        <h3>Contacto:</h3>
        <p>prensa@utcj.edu.mx  | (656) 649-0600</p>
      </div>
      <div>
        <h3>Mapa del sitio:</h3>
        <a href="https://search.brave.com/search?q=mapa+utcj&summary=1&conversation=b84cb2d6a290a4480c1c31&view=full&map_src=i&loc_id=loc4BFDG6AQ5TE7UBMRUJNOQ3GS2YBGHIQZHAAAAAAA%3D&bbox=-106.876%2C31.398%2C-105.938%2C31.798" 
   target="_blank" 
   rel="noopener noreferrer">
    <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" alt="Mapa" style="width:60px; cursor:pointer;">
</a>

      </div>
    </div>
    <hr>
    <p>© Universidad Tecnológica de Ciudad Juárez</p>
  </footer>
</footer>

<script src="../public/js/menu.js"></script>

</body>
</html>

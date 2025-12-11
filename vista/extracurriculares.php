<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    // Si no hay sesión activa, redirige al login
    header("Location: loginn.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act. Extracurriculares</title>
    <link rel="stylesheet" href="../public/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="page">
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
        <!-- Básquetbol -->
        <section class="card">
            <h2><i class="fas fa-basketball-ball"></i> Básquetbol</h2>
            <div class="img-container">
                <img src="../public/img/basquetbol.jpeg" alt="Jugadores de basquetbol">
            </div>
            <div class="info">
                <p>Participa en el equipo de básquetbol y mejora tu coordinación, precisión y trabajo en equipo. Esta actividad 
                    fomenta la disciplina, la rapidez y el espíritu deportivo.</p>
                <p class="nota"><i class="fas fa-clock"></i> Para más información, ver <a href="../vista/horarios.php">horarios</a>.</p>
            </div>
        </section>

        <!-- Fútbol Femenil -->
        <section class="card">
            <h2><i class="fas fa-futbol"></i> Fútbol Femenil</h2>
            <div class="img-container">
                <img src="../public/img/futbol_femenil.jpg" alt="Jugadoras de fútbol femenil">
            </div>
            <div class="info">
                <p>Únete al equipo femenil de fútbol y fortalece tu liderazgo, cooperación y habilidades tácticas. Ideal 
                    para quienes buscan desarrollar su potencial deportivo.</p>
              <p class="nota"><i class="fas fa-clock"></i> Para más información, ver <a href="../vista/horarios.php">horarios</a>.</p>
            </div>
        </section>

        <!-- Atletismo -->
        <section class="card">
            <h2><i class="fas fa-running"></i> Atletismo</h2>
            <div class="img-container">
                <img src="../public/img/atletismo.jpg" alt="Atletas corriendo">
            </div>
            <div class="info">
                <p>Practica velocidad, resistencia y técnica con nuestro grupo de atletismo. Ideal para mejorar tu 
                    condición física y superar tus propios límites.</p>
                <p class="nota"><i class="fas fa-clock"></i> Para más información, ver <a href="../vista/horarios.php">horarios</a>.</p>
            </div>
        </section>

        <!-- Fútbol Soccer Varonil -->
        <section class="card">
            <h2><i class="fas fa-futbol"></i> Fútbol Soccer Varonil</h2>
            <div class="img-container">
                <img src="../public/img/futbol_varonil.jpeg" alt="Jugadores de fútbol varonil">
            </div>
            <div class="info">
                <p>Forma parte del equipo varonil y vive la pasión del fútbol. Desarrolla técnica, estrategia y trabajo 
                    en equipo en un ambiente competitivo y amistoso.</p>
             <p class="nota"><i class="fas fa-clock"></i> Para más información, ver <a href="../vista/horarios.php">horarios</a>.</p>
            </div>
        </section>

        <!-- Taekwondo -->
        <section class="card">
            <h2><i class="fas fa-hand-fist"></i></i> Taekwondo</h2>
            <div class="img-container">
                <img src="../public/img/taekwondo.jpg" alt="Jugadores de fútbol americano">
            </div>
            <div class="info">
                <p>El equipo de taekwondo enseña disciplina, respeto y autocontrol. </p>
                <p class="nota"><i class="fas fa-clock"></i> Para más información, ver <a href="../vista/horarios.php">horarios</a>.</p>
            </div>
        </section>
    </main>

    <!-- Footer -->
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
  <script src="../public/js/menu.js"></script>
</body>
</html>

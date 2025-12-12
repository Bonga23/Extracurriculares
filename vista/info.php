<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    // Si no hay sesión activa, redirige al login
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

  <!-- BOTÓN HAMBURGUESA (con id para el script existente) -->
  <div class="menu-toggle" id="menuToggle" aria-label="Abrir menú" role="button" tabindex="0">
      <i class="fa-solid fa-bars" aria-hidden="true"></i>
  </div>

  <!-- MENÚ LATERAL (con id para el script existente) -->
  <ul class="nav-links" id="navLinks">

      <!-- BOTÓN CERRAR (dentro del panel; se muestra solo en móvil vía CSS) -->
      <li class="close-btn" id="closeBtn" role="button" aria-label="Cerrar menú">
          <i class="fa-solid fa-xmark" aria-hidden="true"></i>
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
          <p><?php echo htmlspecialchars($_SESSION['Matricula'], ENT_QUOTES, 'UTF-8'); ?> ⮟</p>
          <ul class="dropdown">
              <li><a href="../controlador/cerrarsesion.php">Cerrar sesión</a></li>
          </ul>
      </li>

  </ul>

</nav>
</header>

<!-- preguntas -->
<section class="intro-container">
    <div class="intro-box">
        <h1>¿Qué son las actividades extracurriculares?</h1>
        <p>
        Las actividades extracurriculares son programas deportivos, culturales o formativos que la universidad ofrece 
        fuera del horario académico regular. Su objetivo es complementar la formación integral del estudiante, 
        promoviendo habilidades físicas, sociales, artísticas y de trabajo en equipo.
        </p>      
    </div>
</section>

<section class="intro-container">
    <div class="intro-box">
        <h1>¿Qué beneficios tienen?</h1>
        <p>Participar en actividades extracurriculares brinda diversos beneficios. 
            Mejora la salud física al aumentar la condición y resistencia, y también favorece la salud mental al disminuir el 
            estrés y mejorar el estado de ánimo. Además, fomenta la disciplina, la responsabilidad y la buena organización del tiempo. 
            Estos espacios fortalecen las habilidades sociales, permiten conocer nuevas personas y trabajar en equipo. Finalmente, 
            contribuyen al crecimiento personal, ayudan a descubrir talentos y, en algunas instituciones, pueden otorgar puntos, 
            horas o cumplir requisitos académicos.</p>  
         
    </div>
</section>

<section class="intro-container">
    <div class="intro-box">
        <h1>¿Quiénes pueden inscribirse?</h1>
        <p>Todos los estudiantes activos de la universidad pueden participar en una actividad extracurricular, 
            sin importar su carrera, turno o cuatrimestre.Solo se permite estar inscrito en una actividad a 
            la vez para asegurar un mejor desempeño, aunque el alumno puede cambiarla durante los periodos establecidos 
            por la institución.</p>  
         
    </div>
</section>

<section class="intro-container">
    <div class="intro-box">
        <h1>¿Quiénes pueden inscribirse?</h1>
        <p>Para garantizar una experiencia adecuada, existen reglas generales que todos los participantes deben cumplir. 
            Entre ellas se encuentran asistir puntualmente, mantener una conducta respetuosa, utilizar el equipo adecuado, 
            avisar en caso de no poder asistir y cuidar las instalaciones. Además, los estudiantes deben permanecer inscritos
             en una sola actividad a la vez. 
            El incumplimiento de estas normas puede ocasionar sanciones o la pérdida del derecho a participar.</p>  
         
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


<script src="../public/js/menu.js"></script>

</body>
</html>

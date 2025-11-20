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
  <title>Cupos - Actividades Extracurriculares</title>
  <link rel="stylesheet" href="../public/css/cupos.css">
</head>
<body>

  <!-- Encabezado -->
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
    <li class="user-menu">
    <p><?php echo $_SESSION['Matricula']; ?> ⮟</p>
    <ul class="dropdown">
    <li><a href="../controlador/cerrarsesion.php">Cerrar sesión</a></li>
     </ul>
    </li>



    </ul>
  </nav>
</header>

  <!-- Contenedor general -->
  <section class="contenedor-cupos">

    <!-- BASQUETBOL -->
    <div class="tarjeta">
      <input type="checkbox" id="toggle-basquet" class="toggle-info">

      <div class="vista-normal">
        <img src="../public/img/basquetbol.jpeg" alt="Basquetbol UTCJ">
        <h2>Basquetbol</h2>
        <p><strong>Cupos totales:</strong> 100</p>
        <p><strong>Cupos ocupados:</strong> 0</p>
        <p><strong>Cupos disponibles:</strong> 100</p>
        <div class="botones">
          <a href="inscripcion.php" class="btn-inscribirse">Inscribirse aquí</a>
          <label for="toggle-basquet" class="btn-vermas">Ver más</label>
        </div>
      </div>

      <div class="info-extra">
        <h3>Información sobre Basquetbol 🏀</h3>
        <p>El equipo de basquetbol de la UTCJ promueve el trabajo en equipo, la agilidad y la disciplina. Ideal para quienes disfrutan de los deportes de precisión y velocidad.</p>
        <p><strong>Lugar:</strong> Gimnasio UTCJ</p>
        <label for="toggle-basquet" class="btn-vermenos">Regresar</label>
      </div>
    </div>

    <!-- FUTBOL FEMENIL -->
    <div class="tarjeta">
      <input type="checkbox" id="toggle-femenil" class="toggle-info">

      <div class="vista-normal">
        <img src="../public/img/futbol_femenil.jpg" alt="Fútbol Femenil UTCJ">
        <h2>Fútbol Femenil</h2>
        <p><strong>Cupos totales:</strong> 200</p>
        <p><strong>Cupos ocupados:</strong> 0</p>
        <p><strong>Cupos disponibles:</strong> 200</p>
        <div class="botones">
          <a href="inscripcion.php" class="btn-inscribirse">Inscribirse aquí</a>
          <label for="toggle-femenil" class="btn-vermas">Ver más</label>
        </div>
      </div>

      <div class="info-extra">
        <h3>Información sobre Fútbol Femenil ⚽</h3>
        <p>El equipo femenil representa a la UTCJ en competencias locales y nacionales. Desarrolla disciplina, coordinación y trabajo en grupo.</p>
        <p><strong>Lugar:</strong> Campo principal UTCJ</p>
        <label for="toggle-femenil" class="btn-vermenos">Regresar</label>
      </div>
    </div>

    <!-- ATLETISMO -->
    <div class="tarjeta">
      <input type="checkbox" id="toggle-atletismo" class="toggle-info">

      <div class="vista-normal">
        <img src="../public/img/atletismo.jpg" alt="Atletismo UTCJ">
        <h2>Atletismo</h2>
        <p><strong>Cupos totales:</strong> 200</p>
        <p><strong>Cupos ocupados:</strong> 0</p>
        <p><strong>Cupos disponibles:</strong> 200</p>
        <div class="botones">
          <a href="inscripcion.php" class="btn-inscribirse">Inscribirse aquí</a>
          <label for="toggle-atletismo" class="btn-vermas">Ver más</label>
        </div>
      </div>

      <div class="info-extra">
        <h3>Información sobre Atletismo 🏃‍♂️</h3>
        <p>Ideal para quienes disfrutan de la velocidad y la resistencia. Fomenta la constancia, disciplina y superación personal.</p>
        <p><strong>Lugar:</strong> Pista de atletismo UTCJ</p>
        <label for="toggle-atletismo" class="btn-vermenos">Regresar</label>
      </div>
    </div>

    <!-- FUTBOL VARONIL -->
    <div class="tarjeta">
      <input type="checkbox" id="toggle-varonil" class="toggle-info">

      <div class="vista-normal">
        <img src="../public/img/futbol_varonil.jpeg" alt="Fútbol Soccer Varonil UTCJ">
        <h2>Fútbol Soccer Varonil</h2>
        <p><strong>Cupos totales:</strong> 200</p>
        <p><strong>Cupos ocupados:</strong> 0</p>
        <p><strong>Cupos disponibles:</strong> 200</p>
        <div class="botones">
          <a href="inscripcion.php" class="btn-inscribirse">Inscribirse aquí</a>
          <label for="toggle-varonil" class="btn-vermas">Ver más</label>
        </div>
      </div>

      <div class="info-extra">
        <h3>Información sobre Fútbol Soccer Varonil ⚽</h3>
        <p>El equipo varonil fomenta la competitividad, la estrategia y el espíritu deportivo representando con orgullo a la UTCJ.</p>
        <p><strong>Lugar:</strong> Campo deportivo UTCJ</p>
        <label for="toggle-varonil" class="btn-vermenos">Regresar</label>
      </div>
    </div>

    <!-- TAEKWONDO -->
    <div class="tarjeta">
      <input type="checkbox" id="toggle-taekwondo" class="toggle-info">

      <div class="vista-normal">
        <img src="../public/img/taekwondo.jpg" alt="Taekwondo UTCJ">
        <h2>Taekwondo</h2>
        <p><strong>Cupos totales:</strong> 150</p>
        <p><strong>Cupos ocupados:</strong> 0</p>
        <p><strong>Cupos disponibles:</strong> 150</p>
        <div class="botones">
          <a href="inscripcion.php" class="btn-inscribirse">Inscribirse aquí</a>
          <label for="toggle-taekwondo" class="btn-vermas">Ver más</label>
        </div>
      </div>

      <div class="info-extra">
        <h3>Información sobre Taekwondo 🥋</h3>
        <p>El equipo de taekwondo de la UTCJ promueve la disciplina, el respeto y la autodefensa. Ideal para quienes buscan un entrenamiento integral.</p>
        <p><strong>Lugar:</strong> Gimnasio UTCJ</p>
        <label for="toggle-taekwondo" class="btn-vermenos">Regresar</label>
      </div>
    </div>
  </section>

   <!-- Footer -->
  <footer class="footer">
    <div class="info-footer">
      <div>
        <h3>Contacto:</h3>
        <p>Contáctanos para obtener más información...</p>
      </div>
      <div>
        <h3>Mapa del sitio:</h3>
        <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" alt="Mapa">
      </div>
    </div>
    <hr>
    <p>© Universidad Tecnológica de Ciudad Juárez</p>
  </footer>

</body>
</html>


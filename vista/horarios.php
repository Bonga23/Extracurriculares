<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    header("Location: loginn.php");
    exit();
}

require_once "../modelo/conexion.php";
$clase = new conexion();
$conn = $clase->getCon();

$matricula = $_SESSION['Matricula'];

// Verificar si ya está inscrito
$consulta = $conn->prepare("SELECT idInscripcion FROM inscripciones WHERE matricula = ?");
$consulta->bind_param("s", $matricula);
$consulta->execute();
$inscrito = $consulta->get_result()->num_rows > 0;

// Si ya está inscrito → mandar a cambio con aviso
// Si NO → mandar a inscripcion
if ($inscrito) {
    $irA = "cambio-paraescolar.php?aviso=1";
} else {
    $irA = "inscripcion.php";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horarios - Actividades Extracurriculares</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/horarios.css">
</head>

<body>
<header class="encabezado">
  <nav class="navbar-utcj">
    <div class="logo">
      <img src="../public/img/logo_utcj.png" alt="Logo UTCJ">
    </div>
    <ul class="nav-links">
    <li><a href="../vista/intro.php">Inicio</a></li>
    <li><a href="../vista/extracurriculares.php">Extracurriculares</a></li>
    <li><a href="../vista/horarios.php">Horarios</a></li>
    <li><a href="../vista/cupos.php">Cupos</a></li>
    <li><a href="../vista/cambio-paraescolar.php">Cambios</a></li>
     <li><a href="../vista/perfil.php">MI cuenta</a></li>
    <li class="user-menu">
    <p><?php echo $_SESSION['Matricula']; ?> ⮟</p>
    <ul class="dropdown">
                <li><a href="../controlador/cerrarsesion.php">Cerrar sesión</a></li>
     </ul>
    </li>



    </ul>
  </nav>
</header> 

<section class="contenedor-actividades">

  <!-- BASQUETBOL -->
  <div class="actividad">
    <div class="header-actividad">
      <h2>Basquetbol</h2>
      <button class="btn-ver"><a href="<?php echo $irA; ?>">Inscribirse</a></button>
    </div>
    <div class="contenido-actividad">
      <div class="imagen">
        <img src="../public/img/basquetbol.jpeg" alt="Basquetbol UTCJ">
      </div>
      <div class="info">
        <h3>Horarios e información:</h3>
        <p><strong>Lugar:</strong> Gimnasio UTCJ</p>
        <p><strong>Días:</strong> Sábados</p>
        <p><strong>Horario:</strong> 8:00 AM – 10:00 AM</p>
        <p>El equipo de basquetbol promueve el trabajo en equipo y la disciplina.</p>
      </div>
    </div>
  </div>

  <!-- FÚTBOL FEMENIL -->
  <div class="actividad">
    <div class="header-actividad">
      <h2>Fútbol Femenil</h2>
      <button class="btn-ver"><a href="<?php echo $irA; ?>">Inscribirse</a></button>
    </div>
    <div class="contenido-actividad">
      <div class="imagen">
        <img src="../public/img/futbol_femenil.jpg" alt="Fútbol Femenil UTCJ">
      </div>
      <div class="info">
        <h3>Horarios e información:</h3>
        <p><strong>Lugar:</strong> Campo principal UTCJ</p>
        <p><strong>Días:</strong> Viernes</p>
        <p><strong>Horario:</strong> 2:00 PM – 5:00 PM</p>
        <p>El equipo femenil desarrolla disciplina y trabajo en grupo.</p>
      </div>
    </div>
  </div>

  <!-- ATLETISMO -->
  <div class="actividad">
    <div class="header-actividad">
      <h2>Atletismo</h2>
      <button class="btn-ver"><a href="<?php echo $irA; ?>">Inscribirse</a></button>
    </div>
    <div class="contenido-actividad">
      <div class="imagen">
        <img src="../public/img/atletismo.jpg" alt="Atletismo UTCJ">
      </div>
      <div class="info">
        <h3>Horarios e información:</h3>
        <p><strong>Lugar:</strong> Pista atletismo UTCJ</p>
        <p><strong>Días:</strong> Lunes a miércoles</p>
        <p><strong>Horario:</strong> 2:30 PM – 5:00 PM</p>
        <p>El club de atletismo promueve disciplina y resistencia.</p>
      </div>
    </div>
  </div>

  <!-- FUTBOL VARONIL -->
  <div class="actividad">
    <div class="header-actividad">
      <h2>Fútbol Soccer Masculino</h2>
      <button class="btn-ver"><a href="<?php echo $irA; ?>">Inscribirse</a></button>
    </div>
    <div class="contenido-actividad">
      <div class="imagen">
        <img src="../public/img/futbol_varonil.jpeg" alt="Futbol Varonil UTCJ">
      </div>
      <div class="info">
        <h3>Horarios e información:</h3>
        <p><strong>Lugar:</strong> Campo deportivo UTCJ</p>
        <p><strong>Días:</strong> Viernes</p>
        <p><strong>Horario:</strong> 2:00 PM – 5:00 PM</p>
        <p>El equipo varonil fomenta estrategia y cooperación.</p>
      </div>
    </div>
  </div>

  <!-- TAEKWONDO -->
  <div class="actividad">
    <div class="header-actividad">
      <h2>Taekwondo</h2>
      <button class="btn-ver"><a href="<?php echo $irA; ?>">Inscribirse</a></button>
    </div>
    <div class="contenido-actividad">
      <div class="imagen">
        <img src="../public/img/taekwondo.jpg" alt="Taekwondo UTCJ">
      </div>
      <div class="info">
        <h3>Horarios e información:</h3>
        <p><strong>Lugar:</strong> Gimnasio UTCJ</p>
        <p><strong>Días:</strong> Martes y Jueves</p>
        <p><strong>Horario:</strong> 3:00 PM – 5:00 PM</p>
        <p>Enseña disciplina, respeto y autocontrol.</p>
      </div>
    </div>
  </div>

</section>

<footer class="footer">
  <div class="info-footer">
    <div>
      <h3>Contacto:</h3>
      <p>Contáctanos para obtener más información...</p>
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

</body>
</html>

<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    // Si no hay sesión activa, redirige al login
    header("Location: loginn.php");
    exit();
}
//   Conexión BD
require_once "../modelo/conexion.php";
$db = new conexion();
$con = $db->getcon();

//   Cupos por actividad
$actividades = [
    1 => 'basquetbol',
    2 => 'futbol femenil',
    3 => 'atletismo',
    4 => 'futbol masculino',
    5 => 'taekwondo'
];

$cupos = [];
foreach ($actividades as $id => $nombre) {
    $cuposTotales = 50;

    $sql = $con->prepare("SELECT COUNT(*) AS total FROM inscripciones WHERE idActividad = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $result = $sql->get_result()->fetch_assoc();
    $ocupados = $result['total'];
    $disponibles = $cuposTotales - $ocupados;

    $cupos[$id] = [
        "totales" => $cuposTotales,
        "ocupados" => $ocupados,
        "disponibles" => $disponibles
    ];
}

$matricula = $_SESSION['Matricula'];
//   Verificar si YA está inscrito
$consulta = $con->prepare("SELECT idInscripcion FROM inscripciones WHERE matricula = ?");
$consulta->bind_param("s", $matricula);
$consulta->execute();
$inscrito = $consulta->get_result()->num_rows > 0;


//agregamos paginas para mandar dependiendo de si esta inscrito en algo o no
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
  <title>Cupos - Actividades Extracurriculares</title>
  <link rel="stylesheet" href="../public/css/cupos.css">
</head>
<body>

<header class="encabezado">
  <nav class="navbar-utcj">

    <!-- Botón menú hamburguesa (solo móvil) -->
    <div class="menu-toggle">
      &#9776;
    </div>

    <!-- Logo -->
    <div class="logo">
      <img src="../public/img/logo_utcj.png" alt="Logo UTCJ">
    </div>

    <!-- Menú -->
    <ul class="nav-links">

      <!-- Botón cerrar (solo móvil) -->
      <span class="close-btn">&times;</span>

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


<section class="contenedor-cupos">

  <!-- BASQUETBOL -->
  <div class="tarjeta">
    <input type="checkbox" id="toggle-basquet" class="toggle-info">

    <div class="vista-normal">
      <img src="../public/img/basquetbol.jpeg" alt="Basquetbol UTCJ">
      <h2>Basquetbol</h2>
      <p><strong>Cupos totales:</strong> <?=$cupos[1]['totales']?></p>
      <p><strong>Cupos ocupados:</strong> <?=$cupos[1]['ocupados']?></p>
      <p><strong>Cupos disponibles:</strong> <?=$cupos[1]['disponibles']?></p>
      <div class="botones">
        <label for="toggle-basquet" class="btn-vermas"><a href="#" class="inscribir-btn" data-ir="<?php echo $irA; ?>">Inscribirse</a></label>
        <label for="toggle-basquet" class="btn-vermas">Ver más</label>
      </div>
    </div>

    <div class="info-extra">
      <h3>Información sobre Basquetbol 🏀</h3>
      <p>El equipo promueve trabajo en equipo, agilidad y disciplina.</p>
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
      <p><strong>Cupos totales:</strong> <?=$cupos[2]['totales']?></p>
      <p><strong>Cupos ocupados:</strong> <?=$cupos[2]['ocupados']?></p>
      <p><strong>Cupos disponibles:</strong> <?=$cupos[2]['disponibles']?></p>
      <div class="botones">
        <label for="toggle-basquet" class="btn-vermas"><a href="#" class="inscribir-btn" data-ir="<?php echo $irA; ?>">Inscribirse</a></label>
        <label for="toggle-femenil" class="btn-vermas">Ver más</label>
      </div>
    </div>

    <div class="info-extra">
      <h3>Información sobre Fútbol Femenil ⚽</h3>
      <p>Equipo competitivo que fomenta disciplina y trabajo en grupo.</p>
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
      <p><strong>Cupos totales:</strong> <?=$cupos[3]['totales']?></p>
      <p><strong>Cupos ocupados:</strong> <?=$cupos[3]['ocupados']?></p>
      <p><strong>Cupos disponibles:</strong> <?=$cupos[3]['disponibles']?></p>
      <div class="botones">
        <label for="toggle-basquet" class="btn-vermas"><a href="#" class="inscribir-btn" data-ir="<?php echo $irA; ?>">Inscribirse</a></label>
        <label for="toggle-atletismo" class="btn-vermas">Ver más</label>
      </div>
    </div>

    <div class="info-extra">
      <h3>Información sobre Atletismo 🏃‍♂️</h3>
      <p>Ideal para velocidad, resistencia y disciplina.</p>
      <p><strong>Lugar:</strong> Pista de atletismo UTCJ</p>
      <label for="toggle-atletismo" class="btn-vermenos">Regresar</label>
    </div>
  </div>

  <!-- FUTBOL VARONIL -->
  <div class="tarjeta">
    <input type="checkbox" id="toggle-varonil" class="toggle-info">

    <div class="vista-normal">
      <img src="../public/img/futbol_varonil.jpeg" alt="Fútbol Varonil UTCJ">
      <h2>Fútbol Varonil</h2>
      <p><strong>Cupos totales:</strong> <?=$cupos[4]['totales']?></p>
      <p><strong>Cupos ocupados:</strong> <?=$cupos[4]['ocupados']?></p>
      <p><strong>Cupos disponibles:</strong> <?=$cupos[4]['disponibles']?></p>
      <div class="botones">
        <label for="toggle-basquet" class="btn-vermas"><a href="#" class="inscribir-btn" data-ir="<?php echo $irA; ?>">Inscribirse</a></label>
        <label for="toggle-varonil" class="btn-vermas">Ver más</label>
      </div>
    </div>

    <div class="info-extra">
      <h3>Información sobre Fútbol Varonil ⚽</h3>
      <p>El equipo fomenta estrategia, trabajo en equipo y competitividad.</p>
      <p><strong>Lugar:</strong> Campo UTCJ</p>
      <label for="toggle-varonil" class="btn-vermenos">Regresar</label>
    </div>
  </div>

  <!-- TAEKWONDO -->
  <div class="tarjeta">
    <input type="checkbox" id="toggle-taekwondo" class="toggle-info">

    <div class="vista-normal">
      <img src="../public/img/taekwondo.jpg" alt="Taekwondo UTCJ">
      <h2>Taekwondo</h2>
      <p><strong>Cupos totales:</strong> <?=$cupos[5]['totales']?></p>
      <p><strong>Cupos ocupados:</strong> <?=$cupos[5]['ocupados']?></p>
      <p><strong>Cupos disponibles:</strong> <?=$cupos[5]['disponibles']?></p>
      <div class="botones">
        <label for="toggle-basquet" class="btn-vermas"><a href="#" class="inscribir-btn" data-ir="<?php echo $irA; ?>">Inscribirse</a></label>
        <label for="toggle-taekwondo" class="btn-vermas">Ver más</label>
      </div>
    </div>

    <div class="info-extra">
      <h3>Información sobre Taekwondo 🥋</h3>
      <p>Promueve disciplina, respeto y autocontrol.</p>
      <p><strong>Lugar:</strong> Gimnasio UTCJ</p>
      <label for="toggle-taekwondo" class="btn-vermenos">Regresar</label>
    </div>
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
<!--este script sirve para manmdar una alerta si ya esta inscrito antes de redirijir a la pagina que corresponeda-->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const inscrito = <?php echo $inscrito ? 'true' : 'false'; ?>;

    document.querySelectorAll(".inscribir-btn").forEach(btn => {
        btn.addEventListener("click", function() {

            const destino = this.dataset.ir;

            if (inscrito) {
                alert("Ya tienes una actividad inscrita. Serás dirigido al apartado de cambios.");
            }

            window.location.href = destino;
        });
    });
});
</script>


<script src="../public/js/menu.js"></script>


</body>
</html>

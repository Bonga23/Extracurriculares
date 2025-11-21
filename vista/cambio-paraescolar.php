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

/* OBTENER LA ACTIVIDAD ACTUAL DEL ALUMNO */
$consultaAct = $conn->prepare("
    SELECT a.idActividad, a.nombreActividad, a.horario 
    FROM inscripciones i
    INNER JOIN actividades a ON i.idActividad = a.idActividad
    WHERE i.matricula = ?
");
$consultaAct->bind_param("s", $matricula);
$consultaAct->execute();
$actividadActual = $consultaAct->get_result()->fetch_assoc();

/* OBTENER TODAS LAS ACTIVIDADES DISPONIBLES*/
$listaAct = $conn->prepare("SELECT idActividad, nombreActividad, horario FROM actividades");
$listaAct->execute();
$actividades = $listaAct->get_result();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de actividad - UTCJ</title>
    <link rel="stylesheet" href="../public/css/inscripcion.css">
</head>
<body>

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

<main class="contenedor-formulario">

    <h2>Cambiar actividad extracurricular</h2>

    <!-- MOSTRAR ACTIVIDAD ACTUAL -->
    <?php if ($actividadActual): ?>
        <div class="actividad-actual">
            <h3>Actividad actual:</h3>
            <p><strong><?php echo $actividadActual['nombreActividad']; ?></strong></p>
            <p>Horario: <?php echo $actividadActual['horario']; ?></p>
        </div>
    <?php else: ?>
        <div class="actividad-actual">
            <h3>No estás inscrito a ninguna actividad actualmente.</h3>
        </div>
    <?php endif; ?>


    <!-- FORMULARIO DE CAMBIO -->
    <form action="../controlador/procesar-cambios.php" method="post">

        <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">

        <label for="actividad">Selecciona la nueva actividad:</label>
        <select id="actividad" name="actividad" required>
            <option value="" disabled selected>Elige una actividad</option>

            <?php while ($act = $actividades->fetch_assoc()): ?>
                <option value="<?php echo $act['idActividad']; ?>">
                    <?php echo $act['nombreActividad'] . " — " . $act['horario']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <button type="submit" class="btn-enviar">Confirmar cambio</button>
    </form>

</main>

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

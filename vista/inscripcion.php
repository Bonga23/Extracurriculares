<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    header("Location: loginn.php");
    exit();
}

require_once "../modelo/conexion.php";

// Crear conexión
$clase = new conexion();
$conn = $clase->getCon();

// Obtener actividades con sus horarios
$consultaAct = $conn->prepare("SELECT idActividad, nombreActividad, horario FROM actividades");
$consultaAct->execute();
$actividades = $consultaAct->get_result();

// Si el usuario selecciona una actividad, mostramos su horario sin JS
$horarioSeleccionado = "";

if (isset($_GET['actividad'])) {
    $id = intval($_GET['actividad']);

    $consultaHor = $conn->prepare("SELECT horario FROM actividades WHERE idActividad = ?");
    $consultaHor->bind_param("i", $id);
    $consultaHor->execute();
    $resultadoHor = $consultaHor->get_result();

    if ($fila = $resultadoHor->fetch_assoc()) {
        $horarioSeleccionado = $fila['horario'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de inscripción - UTCJ</title>
    <link rel="stylesheet" href="../public/css/inscripcion.css">
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

<main class="contenedor-formulario">

    <!-- FORMULARIO -->
    <form action="../controlador/actividades.php" method="post">

        <!-- Matrícula automática -->
        <input type="hidden" name="matricula" value="<?php echo $_SESSION['Matricula']; ?>">

        <!-- Selección de actividad -->
        <label for="actividad">Selecciona una actividad:</label>
        <select id="actividad" name="idActividad" required onchange="location.href='inscripcion.php?actividad='+this.value">
            <option value="" disabled selected>Elige una actividad</option>

            <?php while ($act = $actividades->fetch_assoc()) : ?>
                <option value="<?php echo $act['idActividad']; ?>"
                    <?php if (isset($_GET['actividad']) && $_GET['actividad'] == $act['idActividad']) echo "selected"; ?>>
                    <?php echo $act['nombreActividad']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <!-- Horario automático -->
        <label for="horario">Horario:</label>
        <input type="text" id="horario" name="horario" readonly
               value="<?php echo $horarioSeleccionado ?: 'Selecciona una actividad'; ?>">

        <button type="submit" class="btn-enviar">Enviar inscripción</button>

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

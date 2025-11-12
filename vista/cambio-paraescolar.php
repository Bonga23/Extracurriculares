<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambio de Paraescolar</title>
  <link rel="stylesheet" href="../public/css/paraescolarestcss.css">
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
    </ul>
  </nav>
</header>

  <main>
    <section class="form-container">
      <h2>Solicitud de Cambio</h2>
      <form class="formulario">
        <label for="actual">Paraescolar actual</label>
        <select id="actual" required>
          <option value="">Selecciona tu paraescolar actual</option>
          <option>Basquetbol</option>
          <option>Fútbol Femenil</option>
          <option>Fútbol Soccer Varonil</option>
          <option>Atletismo</option>
          <option>Taekwondo</option>
        </select>

        <label for="nuevo">Paraescolar al que deseas cambiar</label>
        <select id="nuevo" required>
          <option value="">Selecciona la nueva paraescolar</option>
          <option>Basquetbol</option>
          <option>Fútbol Femenil</option>
          <option>Fútbol Soccer Varonil</option>
          <option>Atletismo</option>
          <option>Taekwondo</option>
        </select>

        <label for="horario">Horario deseado</label>
        <select id="horario" required>
          <option value="">Selecciona un horario</option>
          <option>Lunes y Miércoles - 4:00 PM</option>
          <option>Martes y Jueves - 5:00 PM</option>
          <option>Viernes - 3:00 PM</option>
        </select>

        <label for="razon">Razón del cambio</label>
        <textarea id="razon" placeholder="Explica brevemente el motivo de tu cambio" required></textarea>

        <!-- Checkbox oculto para mostrar el mensaje -->
        <input type="checkbox" id="confirmacion" class="toggle-mensaje">

        <div class="botones">
          <label for="confirmacion" class="btn-enviar">Enviar Solicitud</label>
          <a href="#" class="btn-regresar">Cancelar</a>
        </div>

        <!-- Mensaje visual -->
        <div class="mensaje-exito">
           Tu solicitud ha sido enviada. Espera la aprobación del administrador de paraescolares.
        </div>
      </form>
    </section>
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

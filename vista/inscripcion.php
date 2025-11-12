<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de inscripcion - UTCJ</title>
    <link rel="stylesheet" href="../public/cupos.css">
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

  <main class="contenedor-formulario">
    <form class="formulario">
      <label for="matricula">Matrícula:</label>
      <input type="text" id="matricula" placeholder="Ejemplo: 2300456" required>

      <label for="nombre">Nombre completo:</label>
      <input type="text" id="nombre" placeholder="Tu nombre completo" required>

      <label for="grupo">Grupo:</label>
      <input type="text" id="grupo" placeholder="Ejemplo: DSM42" required>

      <label for="descripcion">Descripción:</label>
      <textarea id="descripcion" rows="4" placeholder="Escribe por qué deseas unirte a esta actividad..." required></textarea>

      <!-- Checkbox oculto para el mensaje -->
      <input type="checkbox" id="enviado" class="toggle-mensaje">

      <div class="botones">
        <label for="enviado" class="btn-enviar">Enviar inscripción</label>
        <a href="cupos.html" class="btn-regresar">Regresar a Cupos</a>
      </div>

      <!-- Mensaje visual -->
      <div class="mensaje-exito">
        ✅ Inscripción enviada correctamente
      </div>
    </form>
  </main>

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
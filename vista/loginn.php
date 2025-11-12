<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión - UTCJ</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/login.css">
</head>
<body>
  <header class="encabezado">
    <nav class="navbar-utcj">
      <div class="logo-login">
        <img src="../public/img/logo_utcj.png" alt="Logo UTCJ" width="120" height="50">
      </div>
    </nav>
  </header>

  <main class="login-section">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
      <div class="login-card shadow-lg p-4 rounded">
        <h2 class="text-center mb-4">Iniciar sesión</h2>

        <!-- Formulario -->
        <form action="../controlador/logicalogin.php" method="POST">
          <div class="mb-3">
            <label for="matricula" class="form-label fw-semibold">Matrícula</label>
            <input type="number" class="form-control" id="matricula" name="matricula" placeholder="Ejemplo: 2300456" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
          </div>

          <button type="submit" class="btn btn-login w-100 mt-3">Ingresar</button>

          <div class="extra-links text-center mt-3">
            <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
            <p><a href="#">¿Olvidaste tu contraseña?</a></p>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

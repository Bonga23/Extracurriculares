<?php
session_start();

if (!isset($_SESSION['Matricula'])) {
    header("Location: loginn.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar contraseña</title>
    <link rel="stylesheet" href="../public/css/actualizar_contrasena.css">
</head>
<body>
    
<header>
        <img src="../public/img/logo_utcj.png" alt="Logo UTCJ">
</header>

<div class="contenedor">
    <h2>Actualizar contraseña</h2>
    <form action="../controlador/procesar_actualizacion.php" method="POST" class="formulario">
        <div class="grupo">
            <label>Contraseña actual</label>
            <input type="password" name="contrasena_actual" required>
        </div>
        <div class="grupo">
            <label>Nueva contraseña</label>
            <input type="password" name="nueva_contrasena" required>
        </div>
        <div class="grupo">
            <label>Confirmar nueva contraseña</label>
            <input type="password" name="confirmar_contrasena" required>
        </div>
        <button type="submit" class="btn">Actualizar</button>
        <a href="extracurriculares.php" class="volver">⮜ Regresar</a>
    </form>
</div>

</body>
</html>

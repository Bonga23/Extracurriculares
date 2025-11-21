<?php
session_start();
if (!isset($_SESSION['matricula'])) {
    header("Location: ../index.php");
    exit();
}

$nombre = "Juan Pérez";
$correo = "juan@example.com";
$actividad = "Fútbol";
$telefono = "Sin registrar";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil | UTCJ</title>

    <link rel="stylesheet" href="../public/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="perfil-body">

<header class="navbar-utcj">
    <div class="logo">
        <img src="../public/img/logo_utcj.png" alt="Logo UTCJ" width="200">
    </div>

    <ul class="nav-links">
        <li><a href="https://www.utcj.edu.mx/">Inicio</a></li>
        <li><a href="../vista/extracurriculares.php">Extracurriculares</a></li>
        <li><a href="../vista/horarios.php">Horarios</a></li>
        <li><a href="../vista/cupos.php">Cupos</a></li>
        <li><a href="../vista/cambio-paraescolar.php">Cambios</a></li>

        <div class="user-menu">
            <p><?php echo $_SESSION['matricula']; ?> <i class="fa-solid fa-user"></i></p>
            <ul class="dropdown">
                <li><a href="../cerrarSesion.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a></li>
            </ul>
        </div>
    </ul>
</header>

<main>

    <div class="card perfil-card">
        <h2><i class="fa-solid fa-id-card"></i> Información del Perfil</h2>

        <div class="info">

            <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
            <p><strong>Correo:</strong> <?php echo $correo; ?></p>
            <p><strong>Paraescolar inscrita:</strong> <?php echo $actividad; ?></p>

            <!-- TELÉFONO EDITABLE -->
            <p class="editable" onclick="toggleEdit('telefono-edit')">
                <strong>Teléfono:</strong> <?php echo $telefono; ?>
                <i class="fa-solid fa-pen-to-square edit-icon"></i>
            </p>

            <div id="telefono-edit" class="edit-box">
                <form action="../controlador/actualizarDatos.php" method="POST">
                    <input type="text" name="telefono" class="input-utcj" placeholder="Nuevo teléfono" required>
                    <button type="submit" class="btn-utcj-azul">Guardar</button>
                </form>
            </div>

            <hr>

            <!-- CONTRASEÑA EDITABLE -->
            <p class="editable" onclick="toggleEdit('password-edit')">
                <strong>Cambiar contraseña</strong>
                <i class="fa-solid fa-pen-to-square edit-icon"></i>
            </p>

            <div id="password-edit" class="edit-box">
                <form action="../controlador/cambiarPassword.php" method="POST">
                    <input type="password" name="actual" class="input-utcj" placeholder="Contraseña actual" required>
                    <input type="password" name="nueva" class="input-utcj" placeholder="Nueva contraseña" required>
                    <button type="submit" class="btn-utcj-naranja">Cambiar</button>
                </form>
            </div>

        </div>
    </div>

</main>

<script>
function toggleEdit(id) {
    const section = document.getElementById(id);
    section.classList.toggle('show-edit');
}
</script>

</body>
</html>

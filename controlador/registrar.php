<?php
require_once '../modelo/conexion.php';
//creamos el objeto de la clase
$clase=new conexion();

//obtenemos la conexion activa
$conn=$clase->getCon();

//recibir los datos del formulario --post
$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$psw=$_POST['password'];
$confirmar = $_POST['confirmar'];

// Verificar si las contraseñas coinciden
if ($psw !== $confirmar) {
    echo ("<script>
        alert('Las contraseñas no coinciden');
        window.history.back();
    </script>");
    exit; // Detener ejecución
}
//consulta de sql
$consulta="INSERT INTO usuarios(matricula,nombre,correo,psw)
values ('$matricula','$nombre','$correo','$psw')";
//ejecutar y verificar la consulta
if ($conn->query($consulta) === TRUE) {
    echo ("<script>
        alert('Registrado correctamente');
        window.location.href='../vista/loginn.php';
    </script>");
} else {
    echo ("Error al registrar: " . $conn->error);
}


//cerrar la conexion
$clase->cerrar();
?>
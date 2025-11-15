<?php
require_once '../modelo/conexion.php';

//creamos el objeto de la clase
$clase=new conexion();
//conexion que tenemos en mysql 
$conn = $clase->getCon();

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

// Validación de datos duplicados en la base de datos

$validar = $conn->prepare("SELECT * FROM usuarios WHERE matricula = ? OR correo = ?"); //<- aqui es donde va la consulta en la bd
$validar->bind_param("ss", $matricula, $correo); // vinculamos los 2 parametros (matricula y correo)
$validar->execute(); // ejecutamos la consulta
$resultado = $validar->get_result();

//Si coincide, hay duplicados
if ($resultado->num_rows > 0) {

    $fila = $resultado->fetch_assoc(); // verificamos la fila encontrada (datos repetidos)

    //verificamos si matricula existe
    if ($fila['matricula'] === $matricula) {
        echo ("<script>
            alert('La matrícula ya está registrada');
            window.history.back();
        </script>");
        exit;   

    //verificamos si el correo tambien existe 
    } elseif ($fila['correo'] === $correo) {
        echo ("<script>
            alert('El correo ya está registrado');
            window.history.back();
        </script>");
        exit;   
    }

}

//Si no hay datos duplicados, procedemos a insertar
$consulta = $conn->prepare("INSERT INTO usuarios(matricula, nombre, correo, psw) VALUES (?, ?, ?, ?)"); // Preparamos el INSERT 
$consulta->bind_param("ssss", $matricula, $nombre, $correo, $psw); // Asignamos los valores dde la bd

//ejecutamos 
if ($consulta->execute()) {

    // indicamos que se registro bien
    echo ("<script>
        alert('Registro exitoso');
        window.location.href='../vista/loginn.php';
    </script>");
} else {
    echo ("<script>
        alert('Error al registrar: " . $conn->error . "');
        window.history.back();
    </script>");
}

// Cerrar conexión
$clase->cerrar();
?>



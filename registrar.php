<?php
require_once 'Conexion.php';
//creamos el objeto de la clase
$clase=new conexion();

//obtenemos la conexion activa
$conn=$clase->getCon();

//recibir los datos del formulario --post
$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$psw=$_POST['password'];
//consulta de sql
$consulta="INSERT INTO usuarios(matricula,nombre,correo,psw)
values ('$matricula','$nombre','$correo','$psw')";
//ejecutar y verificar la consulta
if (!$conn->query($consulta)===TRUE) {
    echo ("wawawa ".$consulta . "<br>" .$conn->error );
}else {
    echo ("<script>
    alert('registrado correctamente');
    window.location.href='loginn.html'
    </script>");
}

//cerrar la conexion
$clase->cerrar();
?>
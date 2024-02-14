<?php
$conexion = mysqli_connect('localhost','root',''. 'usuarios') or die(mysql_error($mysqli));

diferencia($conexion);

function diferencia($conexion){
    if(isset($_POST ['enviar'])){
        insertar($conexion);
    }
    if(isset($_POST ['eliminar'])){
        insertar($conexion);
    }
}

insertar($conexion);

function insertar ($conexion){
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $consulta = "INSERT INTO persona(cedula, nombre, apellido) VALUES ('$cedula', '$nombre', '$apellido')";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    header("location: index.php");
}

function eliminar ($conexion){
    $cedula = $_POST['cedula'];

    $consulta = "DELETE FROM persona WHERE cedula='$cedula'";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
}

function cargarTabla($conexion){
    $consulta = "SELECT * FROM persona";
    $resultado = mysqli_query($conexion, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
        echo "<tr">;
        echo "<td">.$fila['cedula'];
        echo "<td">.fila['nombre'];;
        echo "<td">fila['apellido'];;
        echo "<tr">;
    }
    mysqli_close($conexion);

}

?>
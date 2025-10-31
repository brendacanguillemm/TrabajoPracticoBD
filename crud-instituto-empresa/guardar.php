<?php

include("conexion.php");

include("includes/header.php");

if(isset($_POST ['guardar-empleado'])){
    
    if(!empty($_POST['dni'])) {

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $departamento = $_POST['departamento'];
        $direccion = $_POST['direccion'];
        $localidad = $_POST['localidad'];
        
        $consulta = "INSERT INTO empleados (dni, nombre, apellido, telefono, departamento, direccion, localidad)
        VALUES ('$dni', '$nombre', '$apellido', '$telefono', '$departamento', '$direccion', '$localidad')";
    
        $resultado = mysqli_query($conn, $query);
    
        if (!$resultado){
            die("Conexión fallida");
        }
    
        $_SESSION['message'] = 'Registro guardado con éxito';
    
        header ("Location: index.php");
    } else {
        $_SESSION['message'] = 'Completar todos los datos';
    
        header ("Location: index.php");
    }
}
?>



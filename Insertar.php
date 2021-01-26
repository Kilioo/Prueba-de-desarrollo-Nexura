<?php

session_start();

$nombre = $_POST['nombre'];
$email = $_POST['correo'];
$sexo = $_POST['sexo'];
$area_id = $_POST['area'];
$boletin = $_POST['boletin'];
$descripcion = $_POST['descripcion'];

$rol = $_POST['rol'];

$mysqli = new mysqli( 'localhost', 'root', '', 'prueba-nexura' );

if($nombre==''){
$_SESSION['validar']=1;
header( 'location:RegistroEmpleado.php' );
}else if($email==''){
    $_SESSION['validar']=1;
header( 'location:RegistroEmpleado.php' );
}else if($sexo==''){
    $_SESSION['validar']=1;
header( 'location:RegistroEmpleado.php' );
}else if($area_id==''){
    $_SESSION['validar']=1;
header( 'location:RegistroEmpleado.php' );
}else if($boletin==''){
    $_SESSION['validar']=1;
header( 'location:RegistroEmpleado.php' );
}else if($descripcion==''){
    $_SESSION['validar']=1;
header( 'location:RegistroEmpleado.php' );
}else{

    if ( $mysqli->connect_errno ) {
        echo 'Falló la conexión con MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
    }
    
    $mysqli->query( "INSERT INTO `empleado` (`nombre`,`email`,`sexo`,`area_id`,`boletin`,`descripcion`) VALUES ('$nombre','$email','$sexo', '$area_id', '$boletin', '$descripcion');" );
    
    $resultado1 = $mysqli->query( "SELECT id FROM `empleado` where nombre='$nombre' and email='$email'" );
    while ($itemTemp = $resultado1->fetch_assoc()) {
    $empleado_id=$itemTemp['id'];
    }
    
    $mysqli->query( "INSERT INTO `empleado_rol` (`empleado_id`,`rol_id`) VALUES ('$empleado_id','$rol');" );
    
    
    $resultado = $mysqli->query( "SELECT * FROM `empleado` where nombre='$nombre' and email='$email'" );
    
    if ( !$resultado ) {
        echo 'Falló error: (' . $mysqli->errno . ') ' . $mysqli->error;
    } else {
        if ( $resultado->num_rows == 0 ) {
            echo 'No se pudo registrar';
        }
    }
}


?>

<html>

<head>
<link href="css.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);

    .div_contenedor{
        height: 100vh;
    }
    .div_centrado{
        width:1000px;
        height:300px;
        position: absolute;
        top:15%;
        left:25%;
        margin-top: -100px;
        margin-left: -100px;
    }

    .window-notice {
    background: rgba(33, 41, 52, .85);
    left: 0;
    bottom: 0;
    right: 0;
    top: 0;
    display: flex;
    position: fixed;
    z-index: 999;
}
.window-notice .content {
    background: #fff;
    border-radius: 2px;
    box-shadow: 0 1px 3px rgba(33, 41, 52, .75);
    box-sizing: content-box;
    display: flex;
    flex-direction: column;
    margin: auto;
    max-width: 600px;
    min-width: 320px !important;
    overflow: hidden;
    position: relative;
    width: 100%;
    padding: 2rem;
    font-size: 1.3rem;
}
    </style>
</head>

<body>
<div class="window-notice" id="window-notice">
    <div class="content">
        <div class="content-text">Empleado creado exitosamente 
        <a href="#"></a></div>
        <div class="content-buttons"><a href="Empleado.php" id="close-button">Aceptar</a></div>
    </div>
</div>
</body>

</html>
<html>

<head>
<link href="css.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
    </style>
</head>

<body>
<?php
                echo "
                <p align='right'>
                <table width='40%' border='0'>
                <tr>
                <td>
                <form action='Empleado.php' method='POST'>
                    <p align='right'>
                    <button type='submit' class='btn btn-danger' value='Regresar (←)'>
                    <span class='glyphicon glyphicon-arrow-left'></span> Regresar
                    </button>
                    </p>
                </form>
                </td>
                </tr>
                </table>
                </p>
              ";
                    ?>
        <div class="div_contenedor">
            <div class="div_centrado">
                <div class="col-md-11 col-sm-12">
                    <center>

                                <h1>
                                    <strong>
                                        Consulta de Empleados
                                    </strong>
                                </h1>
                                <hr style="border-color:black;">
                         
                    </center>
                    <table border="0" width="50%" class="table">
                        <tr>
                            <center>
                                    <div>
                                        <h2>
                                            <strong>
                                            <div>
                                                                            <?php
                                                $mysqli = new mysqli("localhost", "root", "", "prueba-nexura");
                                                if ($mysqli->connect_errno) {
                                                    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                                                }
                                                $resultado = $mysqli->query("SELECT id, nombre, email, (CASE WHEN sexo = 'M' THEN 'Masculino' ELSE 'Femenino' END) AS sexo, (CASE WHEN area_id = '1' THEN 'Administracion' WHEN area_id = '2' THEN 'Ventas' WHEN area_id = '3' THEN 'Desarrollo' WHEN area_id = '4' THEN 'Produccion' END) as area_id, (CASE WHEN boletin = '1' THEN 'Si' ELSE 'No' END) as boletin, descripcion, empleado_rol.rol_id FROM `empleado`, `empleado_rol` Where empleado_rol.empleado_id=empleado.id");

                                                if (!$resultado) {
                                                echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
                                                }else{
                                                    echo "<table style='width:100%' border='0'class='table table-striped'>";
                                                echo "
                                                        <tr>
                                                        <td><strong><center>Nombre</center></strong></td>
                                                        <td><strong><center>Email</center></strong></td>
                                                        <td><strong><center>Sexo</center></strong></td>
                                                        <td><strong><center>Area</center></strong></td>
                                                        <td><strong><center>Boletin</center></strong></td>
                                                        <td><strong><center>Modificar</center></strong></td>
                                                        <td><strong><center>Eliminar</center></strong></td>
                                                        </tr>
                                                ";
                                                while ($itemTemp = $resultado->fetch_assoc()) {
                                                    
                                                    

                                                    echo "
                                                        <tr>
                                                            <td><center>".$itemTemp['nombre']."</center></td>
                                                            <td><center>".$itemTemp['email']."</center></td>
                                                            <td><center>".$itemTemp['sexo']."</center></td>
                                                            <td><center>".$itemTemp['area_id']."</center></td>
                                                            <td><center>".$itemTemp['boletin']."</center></td>
                                                            <td>
                                                            <form method='POST' action='ModificarEmpleado.php'>
                                                            <input type='hidden' name='id' value='".$itemTemp['id']."'>
                                                            <input type='hidden' name='nombre' value='".$itemTemp['nombre']."'>
                                                            <input type='hidden' name='email' value='".$itemTemp['email']."'>
                                                            <input type='hidden' name='sexo' value='".$itemTemp['sexo']."'>
                                                            <input type='hidden' name='area_id' value='".$itemTemp['area_id']."'>
                                                            <input type='hidden' name='boletin' value='".$itemTemp['boletin']."'>
                                                            <input type='hidden' name='descripcion' value='".$itemTemp['descripcion']."'>
                                                            <input type='hidden' name='rol_id' value='".$itemTemp['rol_id']."'>
                                                            <p align='center'>
                                                            <button type='submit' class='btn btn-primary' data-toggle='tooltip' title='Modificar' value='Actualizar'>
                                                            <span class='glyphicon glyphicon-edit'></span>
                                                            </button>
                                                            </p>
                                                            </form>
                                                            </td>
                                                            <td>
                                                            <form method='POST' action='EliminarEmpleado.php'>
                                                            <input type='hidden' name='id' value='".$itemTemp['id']."'>
                                                            <input type='hidden' name='rol_id' value='".$itemTemp['rol_id']."'>
                                                            <p align='center'>
                                                            <button type='submit' class='btn btn-warning' data-toggle='tooltip' title='Eliminar' value='Eliminar'> 
                                                            <span class='glyphicon glyphicon-trash'></span>
                                                            </button>
                                                            </p>
                                                            </form>
                                                            </td>
                                                        </tr>
                                                    ";
                                                }
                                                echo "</table>";
                                                }
                                                ?>
                                                                    
                                                </div>
                                            </strong>
                                        </h2>
                                    </div>
                                </div>
                            </center>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>
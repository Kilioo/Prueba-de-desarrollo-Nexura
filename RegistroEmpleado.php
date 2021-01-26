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
                                Crear empleado
                            </strong>
                        </h1>
                        <hr style="border-color:black;">
                    </center>
                        <?php
                        session_start();
                        $validar=0;
                        if(isset($_SESSION["validar"])){
                        $validar=$_SESSION["validar"];
                        }
                            if ( $validar==1 ) {
                                echo ""."<div class='alert alert-warning' role='alert'>
                                <p>
                                Los campos con (*) son obligatorios
                                </p>
                                </div>
                                ";
                            }else{
                                    echo "";
                                }
                        ?>
                        
                    <form action="Insertar.php" method="POST">
                        <table border="0" width="100%" class="table">
                            <tr>
                                <td>
                                    <label>
                                        Nombre completo * 
                                    </label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input value="<?php
                                            $nombre="";
                                                if(isset($_POST["nombre"])){
                                                    $nombre=$_POST["nombre"];
                                                }
                                        ?>" type="text" class="form-control" placeholder="Nombre completo del empleado" name="nombre"
                                                                autocomplete="off">
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        Correo electronico * 
                                    </label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input value="<?php
                                            $correo="";
                                                if(isset($_POST["correo"])){
                                                    $correo=$_POST["correo"];
                                                }
                                        ?>" type="text" class="form-control" placeholder="Correo electronico" name="correo"
                                                                autocomplete="off">
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        Sexo * 
                                    </label>
                                </td>
                                <td>
                                    <div class="form-check">
                                                    <fieldset>
                        <label>
                            <input class="form-check-input" type="radio" name="sexo" value="M"> Masculino
                        </label>
                        </br>
                        <label>
                            <input class="form-check-input" type="radio" name="sexo" value="F"> Femenino
                        </label>
                    </fieldset>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        Area * 
                                    </label>
                                    </td>
                                    <td>
                                    <div class="form-group">
                                                <?php
                                                $mysqli = new mysqli("localhost", "root", "", "prueba-nexura");
                                                if ($mysqli->connect_errno) {
                                                    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                                                }
                                                
                                                $resultado = $mysqli->query("SELECT id FROM `areas`");
                                                
                                                if (!$resultado) {
                                                echo "Falló error: (" . $mysqli->errno . ") " . $mysqli->error;
                                                }else{
                                                echo "
                                                <select class='form-control' name='area'>
                                                ";
                                                while ($itemTemp = $resultado->fetch_assoc()) {
                                                    $area=$itemTemp['id'];
                                                    echo "<option value='".$area."'>".$itemTemp['id']."</option>";
                                                }
                                                echo "</select>";
                                            }
                                                ?>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        Descripción * 
                                    </label>
                                    </td>
                                    <td>
                                    <div class="form-group">
                                        <textarea class="form-control rounded-0" name="descripcion" id="descripcion" rows="3" placeholder="Descripción de la experiencia del empleado"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        
                                    </label>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <label>
                                            <input class="form-check-input" type="radio" name="boletin" value="1"> Deseo recibir boletin informativo
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        Roles * 
                                    </label>
                                </td>
                                <td>
                                    <div class="form-check">
                                                        <fieldset>
                                            <label>
                                                <input class="form-check-input" type="radio" name="rol" value="1"> Profesional de proyectos - Desarrollador
                                            </label>
                                            </br>
                                            <label>
                                                <input class="form-check-input" type="radio" name="rol" value="2"> Gerente estratégico
                                            </label>
                                            </br>
                                            <label>
                                                <input class="form-check-input" type="radio" name="rol" value="3"> Auxiliar administrativo
                                            </label>
                                        </fieldset>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php
                        $validar=0;
                        if(isset($_SESSION["validar"])){
                        $validar=$_SESSION["validar"];
                        }
                            if ( $validar==1 ) {
                                echo ""."<div class='alert alert-warning' role='alert'>
                                <p>
                                Formulario incompleto
                                </p>
                                </div>
                                ";
                            }else{
                                    echo "";
                                }
                        ?> 
                        <input type="submit" class="btn btn-primary" value="Guardar"> 
                    </form>
                    
                </div>
            </div>
        </div>
</body>

</html>
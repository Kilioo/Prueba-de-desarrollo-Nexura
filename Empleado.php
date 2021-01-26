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
        <div class="div_contenedor">
            <div class="div_centrado">
                <div class="col-md-11 col-sm-12">
                    <center>

                                <h1>
                                    <strong>
                                        Panel de control
                                    </strong>
                                </h1>
                                <hr style="border-color:black;">
                         
                    </center>
                    <table border="0" width="50%" class="table">
                        <tr>
                            <center>
                                    <div class="alert alert-secundary" role="alert">
                                        <h2>
                                            <strong>
                                                Seleccione una opción:
                                            </strong>
                                        </h2>
                                    </div>
                                </div>
                            </center>
                            <td>
                                <form action="ConsultaEmpleados.php" method="POST">
                                    <center>
                                        <input type="submit" class="btn btn-primary" value="Consultar Empleado">
                                    </center>
                                </form>
                            </td>
                            <td>
                                <form action="RegistroEmpleado.php" method="POST">
                                    <center>
                                        <input type="submit" class="btn btn-primary" value="Ingresar Empleado">
                                    </center>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>
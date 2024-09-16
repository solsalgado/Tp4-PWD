<?php
include_once '../configuracion.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Nuevo auto
        </title>

        <style>
            .full-height {
            height: 100vh;
            }
        </style>

        <link rel="stylesheet" href="../vista/estructura/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    </head>
    <body class="bg-secondary">

        <div class="d-flex justify-content-center align-items-center full-height ">
            <div class="card col-3  align-items-center" style="max-height: 600px; overflow-y: auto;">
                <div class="card-body text-center " >
                    <form method="get" action="../vista/action/accionNuevoAuto.php" id="formAuto">
                    <div>
                        <h3 class="mt-1">Ingresar auto<i class="bi bi-database-fill-add"></i></h3>
                    </div>
                    

                        <div class="row mb-3 text-center ">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese la patente: </p>
                            </div>
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-car-front"></i></span>
                                    <input type="text" name="patente" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
                                </div>
                                <div id="error-patente" class="text-danger "></div>
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese la marca: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-car-front"></i></span>
                                    <input type="text" name="marca" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
                                </div>
                                <div id="error-marca" class="text-danger"></div>
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el modelo: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                    <input type="text" name="Modelo" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
                                </div>
                                <div id="error-modelo" class="text-danger"></div>
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el DNI del dueño: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                    <input type="text" name="DniDuenio" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required style="width: 51%;">
                                </div>
                                <div id="error-dni" class="text-danger"></div>
                            
                        </div>
                        
                        <div class="row align-items-center">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Enviar <i class="bi bi-send"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>

            <!-- Bootstrap JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

            <script type="text/javascript" src="../vista/estructura/js/jsEj7.js"></script>
</html>


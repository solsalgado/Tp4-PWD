<?php
include_once '../configuracion.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Cambio Duenio
        </title>

        <style>
            .full-height {
            height: 100vh;
            }
        </style>

    <link rel="stylesheet" href="../Vista/estructura/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    </head>
    <body class="bg-secondary">
    <?php include_once "estructura/header-footer/Header.php"?>
        <div class="d-flex justify-content-center align-items-center full-height ">
            <div class="card col-3  align-items-center" style="max-height: 600px; overflow-y: auto;">
                <div class="card-body text-center " >
                    <form method="get" action="../vista/action/accionCambioDuenio.php" id="formDuenio">
                    <div>
                        <h3 class="mt-1">Modificar persona<i class="bi bi-person-fill-gear"></i></h3>
                    </div>
                    

                        <div class="row mb-3 text-center ">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese la patente: </p>
                            </div>
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-car-front"></i></span>
                                    <input type="text" name="patente" class="form-control-sm m-0" placeholder="Ejemplo: ABC 123" required>
                                </div>
                                <div id="error-patente" class="text-danger "></div> 
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el DNI del dueño: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                    <input type="text" name="DniDuenio" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
                                </div>
                                <div id="error-dni" class="text-danger"></div>
                            
                        </div>

                        <h5>Ingrese los nuevos datos</h5>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el apellido: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="Apellido" class="form-control-sm m-0" placeholder="Ejemplo: Lopez" required>
                                </div>
                                <div id="error-apellido" class="text-danger"></div> 
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el nombre: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="Nombre" class="form-control-sm m-0" placeholder="Ejemplo: Martín" required>
                                </div>
                                <div id="error-nombre" class="text-danger"></div> 
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese la fecha de nacimiento: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                    <input type="date" name="fechaNac" class="form-control-sm m-0" placeholder="Ejemplo: 20-12-1990" required  style="width: 51%;">
                                </div>
                                <div id="error-fecha" class="text-danger"></div> <!-- Contenedor para el mensaje de error -->
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el telefono: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    <input type="text" name="Telefono" class="form-control-sm m-0" placeholder="Ejemplo: 2994444444" required>
                                </div>
                                <div id="error-telefono" class="text-danger"></div>
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el domicilio: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                                    <input type="text" name="Domicilio" class="form-control-sm m-0" placeholder="Ejemplo: Avenida Siempre Viva" required>
                                </div>
                                <div id="error-domicilio" class="text-danger"></div> 
                            
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
    <?php include_once "estructura/header-footer/Footer.php"?>
    </body>

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

        <script type="text/javascript" src="../vista/estructura/js/jsEj8.js"></script>

</html>


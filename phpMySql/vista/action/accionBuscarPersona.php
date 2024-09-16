<?php
include_once '../../configuracion.php';
include_once '../../control/abmPersona.php';

$datos = data_submitted();
function buscarPersonaPorDni($datos) {
    $objAbmPersona = new AbmPersona();

    $existe = false;

    if (isset($datos['NroDni']) && !empty($datos['NroDni'])) {
        $resultadoBusqueda = $objAbmPersona->buscar(['NroDni' => $datos['NroDni']]);
        
        if (is_array($resultadoBusqueda) && count($resultadoBusqueda) == 1) {
            $existe = true;
        }
    } 
    return $existe;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Buscar persona
        </title>

        <style>  
        .full-height {
        height: 100vh; 
        }
    </style>

    <link rel="stylesheet" href="../estructura/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    </head>
    <body class="bg-secondary">

        <p><?php if(buscarPersonaPorDni($datos)){;?></p>

        <div class="d-flex justify-content-center align-items-center full-height ">
            <div class="card col-3  align-items-center" style="max-height: 600px; overflow-y: auto;">
                <div class="card-body text-center " >
                    <form method="get" action="../Action/accionActualizarDatosPersona.php" id="formNuevosDatos">
                    <div>
                        <h3 class="mt-1">Ingrese los nuevos: <i class="bi bi-person-add mt-4"></i></h3>
                        <input type="hidden" name="NroDni" value="<?php echo htmlspecialchars($datos['NroDni']); ?>">
                    </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el apellido: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="Apellido" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
                                </div>
                                <div id="error-apellido" class="text-danger"></div>
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el nombre: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="Nombre" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
                                </div>
                                <div id="error-nombre" class="text-danger"></div>
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese la fecha de Nacimiento: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                    <input type="date" name="fechaNac" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required style="width: 51%;">
                                </div>
                                <div id="error-fecha" class="text-danger"></div>
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el teléfono: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    <input type="text" name="Telefono" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
                                </div>
                                <div id="error-telefono" class="text-danger"></div>
                            
                        </div>

                        <div class="row mb-3 text-center">
                            <div class="col-md-12">
                                <p class="mb-0">Ingrese el domicilio: </p>
                            </div>
                            
                                <div class="input-group justify-content-center">
                                    <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                                    <input type="text" name="Domicilio" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
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

    <p><?php } else{?>

        <div class="d-flex justify-content-center align-items-center full-height">
                <div class="card">
                    <div class="card-body text-center" >
                        <h3>No se encontro una persona con ese número de DNI."</h3>
                        <div class="input-group">
                            <a href="../buscarPersona.php" class="btn btn-primary">
                                <i class="bi bi-arrow-return-left me-2"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                <?php  } ?></p>

    </body>

            <!-- Bootstrap JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

            <script type="text/javascript" src="../estructura/js/jsEj9NuevosDatos.js"></script>
</html>


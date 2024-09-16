<?php
include_once '../../configuracion.php';
include_once '../../control/abmPersona.php';
include_once '../../control/abmAuto.php';

$objAbmAuto = new AbmAuto();
$objAbmPersona = new AbmPersona();

$datos = data_submitted();

$texto = "";
if (isset($datos['patente']) && !empty($datos['patente'])) {
    $patenteAuto = $objAbmAuto->buscar(['Patente' => $datos['patente']]);

    if (is_array($patenteAuto) && count($patenteAuto) == 1) {

        $texto .= "El número de patente ya está cargado.";
    } else {

        $persona = $objAbmPersona->buscar(['NroDni' => $datos['DniDuenio']]);

        if (is_array($persona) && count($persona) == 1) {
            
            if (isset($datos['marca'], $datos['Modelo'], $datos['DniDuenio']) && 
                !empty($datos['marca']) && !empty($datos['Modelo']) && !empty($datos['DniDuenio'])) {

                $resultado = $objAbmAuto->inserta([
                    'Patente' => $datos['patente'],
                    'Marca' => $datos['marca'],
                    'Modelo' => $datos['Modelo'],
                    'DniDuenio' => $datos['DniDuenio'],
                ]);

                if ($resultado) {
                    $texto .= "Los datos se cargaron correctamente.";
                } else {
                    $texto .= "Ocurrió un error al cargar los datos.";
                }
            }
        } else {
            
            $texto .= "El dueño con DNI " . $datos['DniDuenio'] . " no está registrado en el sistema. ";
            $texto .= '<br><a href="../nuevaPersona.php">Registrar persona</a>';
            
        }
    }
} else {
    $texto .= "No se pudieron cargar los datos, por favor intente nuevamente.";
}



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
        
        <link rel="stylesheet" href="../estructura/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </head>
    <body class="bg-success">

        <div class="d-flex justify-content-center align-items-center full-height">
                <div class="card">
                    <div class="card-body text-center" >
                        <h3>Cargar datos</h3>
                        <p><?php echo $texto;?></p>
                        <div class="input-group">
                            <a href="../nuevoAuto.php" class="btn btn-primary">
                                <i class="bi bi-arrow-return-left me-2"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>


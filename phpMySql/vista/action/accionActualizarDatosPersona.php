<?php
include_once '../../configuracion.php';
include_once '../../control/abmPersona.php';

$objAbmPersona = new AbmPersona();

$datos = data_submitted();

$texto = "";
if (isset($datos['NroDni']) && !empty($datos['NroDni'])) {

    $dniPersona = $objAbmPersona->buscar(['NroDni' => $datos['NroDni']]);

    if (is_array($dniPersona) && count($dniPersona) == 1) {
        
        $resultado = $objAbmPersona->modifica([
            'NroDni' => $datos['NroDni'],
            'Apellido' => $datos['Apellido'],
            'Nombre' => $datos['Nombre'],
            'FechaNac' => $datos['fechaNac'],
            'Telefono' => $datos['Telefono'],
            'Domicilio' => $datos['Domicilio']
        ]);

        if ($resultado) {

            $texto .= "Los datos del dueño fueron actualizados correctamente.";
        } else {
            $texto .= "Ocurrió un error al intentar actualizar los datos.";
        }
    } 
} else {
    $texto .= "No se pudieron modificar los datos, por favor intente nuevamente.";
}


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Modificar datos persona
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
                        <h3>Modificar datos</h3>
                        <p><?php echo $texto;?></p>
                        <div class="input-group">
                            <a href="../buscarPersona.php" class="btn btn-primary">
                                <i class="bi bi-arrow-return-left me-2"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        
        </body>
</html>


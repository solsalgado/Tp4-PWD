<?php
include_once '../configuracion.php';
include_once '../control/abmAuto.php';
include_once '../modelo/auto.php';
include_once '../control/abmPersona.php';

$objAbmAuto = new AbmAuto();
$objAbmPersona = new AbmPersona();
$objAuto = new Auto();

$verAutos = $objAuto->listar("");


function mostrarDatos($verAutos, $objAbmPersona) {
    if (empty($verAutos)) {
        return "No hay autos cargados.";
    } else {
        $texto = "";
        foreach ($verAutos as $auto) {
            
            $dniDuenio = $auto->getDniDuenio();

            $param = ['NroDni' => $dniDuenio];
            $duenios = $objAbmPersona->buscar($param);

            if (!empty($duenios) && count($duenios) == 1) {
                $duenio = $duenios[0]; 

                $texto .= "Patente: " . $auto->getPatente() . ", Marca: " . $auto->getMarca() . ", Modelo: " . $auto->getModelo() . "<br>";
                $texto .= "Dueño: " . $duenio->getNombre() . " " . $duenio->getApellido() . "<br><br>";
            } else {
                $texto .= "Patente: " . $auto->getPatente() . ", Marca: " . $auto->getMarca() . ", Modelo: " . $auto->getModelo() . "<br>";
                $texto .= "Dueño: Información del dueño no disponible.<br><br>";
            }
        }
        return $texto;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Ver autos
        </title>

        <style>
    
            .full-height {
            height: 100vh; 
            }
        </style>

        <link rel="stylesheet" href="/vista/estructura/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </head>
    <body class="bg-success">

        <div class="d-flex justify-content-center align-items-center full-height">
            <div class="card container-md justify-content-center align-items-center col-4">
                <div class="card-body text-center " >
                    <h3>Autos <i class="bi bi-car-front-fill"></i></h3>
                    <p><?php echo mostrarDatos($verAutos, $objAbmPersona); ?></p>
                </div>
            </div>
        </div>

    </body>
</html>

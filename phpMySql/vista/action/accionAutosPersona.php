<?php
include_once '../../configuracion.php';
include_once '../../control/abmPersona.php';
include_once '../../control/abmAuto.php';


$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();

$datos = data_submitted();
$obj = null;
$texto = "";

if (isset($datos['dni'])){

    $paramPersona = ['NroDni' => $datos['dni']];
    $dniPersona = $objAbmPersona->buscar($paramPersona);

    if (count($dniPersona) == 1) {
        $obj = $dniPersona[0];

        $texto .= "Persona encontrada: <br>";
        $texto .= "Nombre: " . $obj->getNombre() . " " . $obj->getApellido() . "<br>";
        $texto .= "DNI: " . $obj->getNroDni() . "<br><br>";

       $autosTodos = $objAbmAuto->buscar([]); // Asumiendo que un array vacio devuelve todos los autos
        
       $texto .= "Autos asociados a la persona:<br>";
       $autosEncontrados = false;
       
       foreach ($autosTodos as $auto) {
           if ($auto->getDniDuenio() == $obj->getNroDni()) {
               $texto .= "Patente: " . $auto->getPatente() . ", Marca: " . $auto->getMarca() . ", Modelo: " . $auto->getModelo() . "<br>";
               $autosEncontrados = true;
           }
       }
       
       if (!$autosEncontrados) {
           $texto .= "No se encontraron autos asociados a esta persona.<br>";
       }
       
   } else {
       $texto .= "No se encontró una persona con el DNI proporcionado.<br>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Lista de personas
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
                        <h3>Personas.</h3>
                        <p><?php echo $texto;?></p>
                        <div class="input-group">
                            <a href="../autosPersona.php" class="btn btn-primary">
                                <i class="bi bi-arrow-return-left me-2"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    
    </body>

</html>


<?php
include_once '../configuracion.php';
include_once '../modelo/persona.php';


function mostrarDatosPersona(){
    $objPersona = new Persona();
    $listaDePersonas = $objPersona->listar("");
    if (empty($listaDePersonas)) {
        return "No hay personas cargadas.";
    } else {
        $texto = "";
        foreach ($listaDePersonas as $persona) {
            $texto .= "<ul>"."Número de DNI: " . $persona->getNroDni() . " - Apellido: " . $persona->getApellido() . 
                      " - Nombre: " . $persona->getNombre() . " - Fecha de nacimiento: " . $persona->getFechaNac() .
                      " - Teléfono: " . $persona->getTelefono() . " - Domicilio: " . $persona->getDomicilio() . "<br> </ul>";
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
            Lista de personas
        </title>

        <style>
   
            .full-height {
            height: 100vh; 
            }
        </style>

        <link rel="stylesheet" href="./estructura/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </head>

    
    <body class="bg-secondary">

        <div class="d-flex justify-content-center align-items-center full-height">
            <div class="card container-md justify-content-center align-items-center col-8">
                <div class="card-body text-center " >
                    <h3>Personas</h3>
                    <?php echo mostrarDatosPersona(); ?>

                    <div class="input-group justify-content-center my-3 ">
                        <a href="autosPersona.php" class="btn btn-primary">
                        Buscar datos por DNI<i class="bi bi-person-vcard-fill px-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

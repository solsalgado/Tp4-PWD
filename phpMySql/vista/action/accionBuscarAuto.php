<?php
include_once '../../configuracion.php';
include_once '../../control/abmAuto.php';


$objAbmAuto = new AbmAuto();

$datos = data_submitted();

$obj = null;
if (isset($datos['Patente'])){
    echo "ENTRE";
    $listaAuto = $objAbmAuto->buscar($datos);
    $count = count($listaAuto);
    echo "<br>"; 
    echo "<br>"; 
    var_dump($count);
    echo "<br>"; 
    echo "<br>"; 
    if (count($listaAuto)==1){
        echo "ACA ENTREEEEEEEEEEEEEE"; //ACA NO ENTRAAAAA
        $obj = $listaAuto[0];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Datos del vehiculo
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
    <?php if ($obj != null){?>
        <div class="d-flex justify-content-center align-items-center full-height">
            <div class="card container-md">
                <div class="card-body text-center" >
                    <h3>Datos del vehiculo</h3>
                    <table class="table table-bordered table-striped table-sm">
                        <tr>
                            <th>Patente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Dni del dueño</th>
                        </tr>
                        <tr class="table-info">
                            <td><?php echo $obj->getPatente()?></td>
                            <td><?php echo $obj->getMarca()?></td>
                            <td><?php echo $obj->getModelo()?></td>
                            <td><?php echo $obj->getDniDuenio()?></td>
                        </tr>
                    </table>
                    <div class="input-group">
                        <a href="../buscarAuto.php" class="btn btn-primary">
                            <i class="bi bi-arrow-return-left me-2"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>

        <div class="d-flex justify-content-center align-items-center full-height">
            <div class="card">
                <div class="card-body text-center" >
                    <h3>No hay un auto registrado con esa patente.</h3>
                    <div class="input-group">
                        <a href="../buscarAuto.php" class="btn btn-primary">
                            <i class="bi bi-arrow-return-left me-2"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
       
    <?php } ?>



    </body>
</html>


<?php
include_once '../configuracion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .full-height {
        height: 100vh; 
        }
    </style>

    <link rel="stylesheet" href="estructura/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>



<body class="bg-secondary">
    <div class="d-flex justify-content-center align-items-center full-height">
        <div class="card col-3 ">
            <div class="card-body text-center" >
                <form action="../vista/action/accionBuscarAuto.php" method="get" id="formPatente">
                    <p>Ingrese una patente:</p>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-car-front"></i></span>
                        <input type="text" name="Patente" class="form-control-sm m-0" placeholder="Ejemplo: ABC 123" required>
                        <button type="submit" class="btn btn-primary m-0">Enviar <i class="bi bi-send"></i></button>
                        <div id="mensaje-error" class="text-danger"></div>
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

        <script type="text/javascript" src="../vista/estructura/js/jsEj4.js"></script>
</html>

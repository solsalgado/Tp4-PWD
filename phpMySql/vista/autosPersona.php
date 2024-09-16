<?php
include_once '../configuracion.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Buscar por DNI
        </title>

        <style>
    /* Aseguramos que el contenedor ocupe toda la altura de la pantalla */
    .full-height {
      height: 100vh; /* 100% de la altura de la ventana del navegador */
    }
  </style>

    <link rel="stylesheet" href="../Vista/estructura/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        
    </head>

    
    <body class="bg-secondary">



    <div class="d-flex justify-content-center align-items-center full-height ">
        <div class="card col-3">
            <div class="card-body text-center " >
                <form method="get" action="../vista/action/accionAutosPersona.php" id="formDni">
                    <p>Ingrese el nÃºmero de DNI: </p>
                    <div class="input-group justify-content-center">
                        <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                        <input type="text" name="dni" class="form-control-sm m-0" placeholder="Ejemplo: 44444444" required>
                        <button type="submit" class="btn btn-primary m-0">Enviar <i class="bi bi-send"></i></button>
                        <div id="mensaje-error" class="text-danger"></div>
                        
                    </div>
                    <div class="input-group mt-3">
                        <a href="./listaPersonas.php" class="btn btn-primary">
                        <i class="bi bi-person-circle"></i> Ver lista de personas
                        </a>
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

    <script type="text/javascript" src="../vista/estructura/js/jsEj5.js"></script>

</html>
<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Buscar por DNI
        </title>
    </head>
    <body>
        <form method="get" action="../vista/action/accionAutosPersona.php">
            <p>Ingrese el número de DNI: </p>
            <input name="dni" type="text">
            <input type="submit">
        </form>

    </body>
</html>-->
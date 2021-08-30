<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header("Location:login.html");
    exit(0);
  }
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendario de Eventos</title>

  <link href="bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="datatables/datatables.min.css" rel="stylesheet">
  <link href="clockpicker/bootstrap-clockpicker.css" rel="stylesheet">
  <link rel="stylesheet" href="eventospredefinidos.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montez&display=swap" rel="stylesheet">

  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
  <script src="datatables/datatables.min.js"></script>
  <script src="clockpicker/bootstrap-clockpicker.js"></script>
  <script src='js/moment-with-locales.js'></script>
  <script src="eventospredefinidos.js"></script>
</head>

<body>
  <header>
  <h1 id="titulo">Calendario</h1>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 style="text-align:center; color: white; margin-left: 75px">Administración de eventos predefinidos</h2>
        <table class="table table-striped table-bordered table-hover tabla" id="tabla1">
          <thead>
            <tr>
              <td>Evento</td>
              <td>Titulo</td>
              <td>Color de texto</td>
              <td>Color de<br> fondo</td>
              <td>Hora de<br>inicio</td>
              <td>Hora de<br>fin</td>
              <td>Borrar</td>
            </tr>
          </thead>
        </table>

        <!-- FormularioEventosPredefinidos -->
        <div class="modal fade" id="FormularioEventosPredefinidos" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Evento predefinido:</label>
                    <input type="text" id="Titulo" name="Titulo" class="form-control" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label>Color de fondo:</label>
                  <input type="color" value="#3788D8" id="ColorFondo" class="form-control" style="height:36px;">
                </div>
                <div class="form-group">
                  <label>Color de texto:</label>
                  <input type="color" value="#ffffff" id="ColorTexto" class="form-control" style="height:36px;">
                </div>

                <div class="form-group">
                  <label style="text-align: center">Hora de inicio:

                  <div class="input-group clockpicker" data-autoclose="true" data-placement="right">
                    <input type="text" id="HoraInicio" value="" class="form-control" autocomplete="off" />
                  </div>
                </label>

                <label style="margin-left: 55px; text-align: center">Hora de fin:
                  <div class="input-group clockpicker" data-autoclose="true" data-placement="left">
                    <input type="text" id="HoraFin" value="" class="form-control" autocomplete="off" />
                  </div>
                  </label>
                </div>
                <div class="form-group">
                  
                </div>
              </div>
              <div class="modal-footer">

                <button type="submit" id="BotonConfirmarAgregar" class="btn btn-primary">Confirmar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

              </div>
            </div>
          </div>
        </div>

        <div><button type="button" id="BotonAgregar" class="btn btn-primary">Agregar evento predefinido</button></div>
        <hr>
        <div style="text-align:center"><button type="button" id="BotonSalir" class="btn btn-info">Retornar al
            calendario</button>
        </div>

      </div>
    </div>
  </div>
</body>

</html>
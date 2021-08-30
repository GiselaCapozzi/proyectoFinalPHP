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
  <link href="fullcalendar-4.3.1/packages/core/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/daygrid/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/timegrid/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/list/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/bootstrap/main.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montez&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="panel.css">

  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="bootstrap-4.3.1/js/bootstrap.min.js"></script>
  <script src="datatables/datatables.min.js"></script>
  <script src="clockpicker/bootstrap-clockpicker.js"></script>
  <script src='js/moment-with-locales.js'></script>
  <script src='fullcalendar-4.3.1/packages/core/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/daygrid/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/timegrid/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/interaction/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/list/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/core/locales/es.js'></script>
  <script src='fullcalendar-4.3.1/packages/bootstrap/main.js'></script>
  <script src="panel.js"></script>
</head>

<body>
<header>
    <h1 id="titulo">Calendario</h1>    
  </header>
  <div class="container-fluid">
    <section class="content-header">
      <h1>
        <small id="small">Bienvenido <strong><?php echo $_SESSION['usuario'];?></strong></small>
        <small class="cerrarSesion" style="float:right"><a href="logout.php">Cerrar sesión</a></small>
      </h1>

    </section>

    <div class="row">

      <div class="col-lg-6">
        <div id="Calendario1" style="border: 3px solid white;padding:2px; color:#ff6400"></div>
      </div>

      <div class="col-lg-6">
        <div id='external-events' style="margin-bottom:1em; height: 350px; border: 1px solid #000; overflow: auto;padding:1em;background: #ffc66c">
          <h4 class="text-center">Eventos predefinidos</h4>
          <div id='listaeventospredefinidos'>

 <?php
            require("conexion.php");
            $conexion = retornarConexion();
            $datos = mysqli_query($conexion, "SELECT codigo,titulo,horainicio,horafin,colortexto,colorfondo FROM eventospredefinidosusuarios where usuario='$_SESSION[usuario]'");
            $ep = mysqli_fetch_all($datos, MYSQLI_ASSOC);
            foreach ($ep as $fila)
              echo "<div class='fc-event' data-titulo='$fila[titulo]' data-horafin='$fila[horafin]' data-horainicio='$fila[horainicio]' 
                    data-colorfondo='$fila[colorfondo]' data-colortexto='$fila[colortexto]' data-codigo='$fila[codigo]'
                    style='border-color:$fila[colorfondo];color:$fila[colortexto];background-color:$fila[colorfondo];margin:10px; font-weight: 700; text-align: center'>
                    $fila[titulo]  [" . substr($fila['horainicio'], 0, 5) . " a " . substr($fila['horafin'], 0, 5) . "]</div>";

            ?>
          </div>
        </div>
        <hr>
        <div style="text-align:center"><button type="button" id="BotonEventosPredefinidos" class="btn btn-info">Administrar eventos predefinidos</button>
        </div>
      </div>

    </div>
  </div>


  <!-- FormularioEventos -->
  <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="Codigo">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Título del evento:</label>
              <input type="text" id="Titulo" class="form-control" placeholder="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Fecha de inicio:</label>

              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaInicio" value="" class="form-control" />
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraInicio">
              <label>Hora de inicio:</label>

              <div class="input-group clockpicker" data-autoclose="true" >
                <input type="text" id="HoraInicio" value="" class="form-control" autocomplete="off" />
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Fecha de fin:</label>

              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaFin" value="" class="form-control" />
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraFin">
              <label>Hora de fin:</label>

              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="HoraFin" value="" class="form-control" autocomplete="off" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Descripción:</label>
            <textarea id="Descripcion" rows="3" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Color de fondo:</label>
            <input type="color" value="#3788D8" id="ColorFondo" class="form-control" style="height:36px;">
          </div>
          <div class="form-group">
            <label>Color de texto:</label>
            <input type="color" value="#ffffff" id="ColorTexto" class="form-control" style="height:36px;">
          </div>

        </div>
        <div class="modal-footer">

          <button type="button" id="BotonAgregar" class="btn btn-primary">Agregar</button>
          <button type="button" id="BotonModificar" class="btn btn-success">Modificar</button>
          <button type="button" id="BotonBorrar" class="btn btn-success">Borrar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

        </div>
      </div>
    </div>
  </div>

</body>

</html>
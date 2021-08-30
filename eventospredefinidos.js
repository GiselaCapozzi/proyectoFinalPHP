document.addEventListener('DOMContentLoaded', function () {

  $('.clockpicker').clockpicker();
        
  let tabla1 = $('#tabla1').DataTable({
    "ajax": {
      url: 'datoseventospredefinidos.php?accion=listar',
      dataSrc: ""
    },
    "columns": [{
      "data": "codigo"
    },
    {
      "data": "titulo"
    },
    {
      "data": "colortexto"
    },
    {
      "data": "colorfondo"
    },
    {
      "data": "horainicio"
    },
    {
      "data": "horafin"
    },
    {
      "data": null,
      "orderable": false
    }
    ],
    columnDefs: [{
      targets: -1,
      className: 'dt-body-center',
      "defaultContent": "<button class='btn btn-sm btn-danger botonborrar'>Borrar</button>",
      data: null
    }, {
      targets: 1,
      className: 'dt-body-center'
    },
    {
      targets: 2,
      className: 'dt-body-center'
    }
    ],
    'rowCallback': function (row, data, index) {
      $(row).find('td:eq(1)').css('color', data.colortexto);
      $(row).find('td:eq(1)').css('background-color', data.colorfondo);
      $(row).find('td:eq(1)').css('font-weight', 700);
    },
    "language": {
      "url": "datatables/spanish.json",
    },
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "Todos"]
    ],
  });


  $('#tabla1 tbody').on('click', 'button.botonborrar', function () {
    if (confirm("Realmente quiere borrar el evento predefinido?")) {
      let registro = tabla1.row($(this).parents('tr')).data();
      borrarRegistro(registro);
    }
  });


  //Eventos de botones de la aplicación
  $('#BotonAgregar').click(function () {
    limpiarFormulario();
    $("#FormularioEventosPredefinidos").modal();
  });

  $('#BotonConfirmarAgregar').click(function () {
    let registro = recuperarDatosFormulario();
    agregarRegistro(registro);
    $("#FormularioEventosPredefinidos").modal('hide');
  });

  $('#BotonSalir').click(function () {
    window.location = "index.php";
  });

  // funciones para comunicarse con el servidor via ajax
  function agregarRegistro(registro) {
    $.ajax({
      type: 'POST',
      url: 'datoseventospredefinidos.php?accion=agregar',
      data: registro,
      success: function (msg) {
        tabla1.ajax.reload();
      },
      error: function (error) {
        alert("Hay un problema:" + error);
      }
    });
  }

  function borrarRegistro(registro) {
    $.ajax({
      type: 'POST',
      url: 'datoseventospredefinidos.php?accion=borrar',
      data: registro,
      success: function (msg) {
        tabla1.ajax.reload();
      },
      error: function (error) {
        alert("Hay un problema:" + error);
      }
    });
  }


  // funciones que interactuan con el formulario de entrada de datos
  function limpiarFormulario() {
    $('#Titulo').val('');
    $('#HoraInicio').val('');
    $('#HoraFin').val('');
    $('#ColorFondo').val('#3788D8');
    $('#ColorTexto').val('#ffffff');

  }

  function recuperarDatosFormulario() {
    let registro = {
      titulo: $('#Titulo').val(),
      horainicio: $('#HoraInicio').val(),
      horafin: $('#HoraFin').val(),
      colorfondo: $('#ColorFondo').val(),
      colortexto: $('#ColorTexto').val()
    };
    return registro;
  }


});
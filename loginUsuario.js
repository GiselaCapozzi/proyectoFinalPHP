document.addEventListener("DOMContentLoaded", function () {
  $('#NuevoUsuario').click(function () {
    borrarFormulario();
    $("#FormularioNuevoUsuario").modal();
  });

  $('#BotonAgregarUsuario').click(function () {
    let nuevousuario = retornarNuevoUsuario();
    if(validarEntradaDatos(nuevousuario))
    agregarNuevoUsuario(nuevousuario);
  });

  $('#BotonLogin').click(function () {
    let usuario = retornarUsuario();
    loginUsuario(usuario);
  });

  function borrarFormulario() {
    $('#NombreNuevo').val("");
    $('#Clave1').val("");
    $('#Clave2').val("");
  }

   function retornarNuevoUsuario() {
     let nuevousuario = {
       nombrenuevo: $('#NombreNuevo').val(),
       clave1: $('#Clave1').val(),
       clave2: $('#Clave2').val()
     };
     return nuevousuario;
   }

   function retornarUsuario() {
     let usuario = {
       usuario: $('#Usuario').val(),
       clave: $('Clave').val()
     };
     return usuario;
   }

    function validarEntradaDatos(nuevousuario) {
      if(nuevousuario.nombrenuevo == '') {
        alert ('No puede ingresar un usuario vacio');
        return false;
      }
      if(nuevousuario.clave == '') {
        alert('No puede ingresar una clave vacia');
        return false;
      }
      if(nuevousuario.clave1 != nuevousuario.clave2) {
        alert('Las claves ingresadas son distintas');
        return false;
      }
      return true;
    } 
    
    function agregarNuevoUsuario(nuevousuario) {
      $.ajax({
        type: 'POST',
        url: 'datosusuarios.php?accion=existe',
        data: nuevousuario,
        success: function(info) {
          if(info.resultado == 'norepetido') {
            $.ajax({
              type: 'POST',
              url: 'datosusuarios.php?accion=agregar',
              data: nuevousuario,
              success: function() {
                alert ('Se agrego el usuario');
                $('#FormularioNuevoUsuario').modal('hide');
              },
              error: function() {
                alert('Error');
              }
            });
          } else
            alert('Nombre de usuario existente.');
        },
        error: function() {
          alert('Error');
        }
      });
    }

    function loginUsuario(usuario) {
      $.ajax({
        type: 'POST',
        url: 'login.php',
        data: usuario,
        success: function(respuesta) {
          if (respuesta == 'correcta') {
            window.location = 'index.php';
          } else
            alert('Nombre de usuario o clave incorrecta');
        },
        error: function() {
          alert('Error');
        }
      });
    }
});
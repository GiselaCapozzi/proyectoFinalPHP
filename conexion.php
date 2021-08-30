<?php
  function retornarConexion() {
    $server = "localhost";
    $usuario = "root";
    $clave = "";
    $libreria = "libreria";
    $con = mysqli_connect($server, $usuario, $clave, $libreria) or die("Problemas en la conexión");
    mysqli_set_charset($con, "utf8");
    return $con;
  }
?>
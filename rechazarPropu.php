<?php

include("connection.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);

$codigo=$_GET['id'];

$aux = "SELECT estado FROM proyectos WHERE cod_proye = '$codigo'";
$consulta = pg_query($aux);
$consulta = pg_fetch_result($consulta, 0, 0);

if($consulta == "Rechazada"){
    include_once  "propuestas.php";
    echo '<script> Swal.fire({
        icon: "error",
        title: "Error!",
        text: "La propuesta ya ha sido rechazada como proyecto",
    });</script>';

}else{
  $sql = "SELECT estado FROM proyectos WHERE cod_proye = '$codigo'";
  $query = pg_query($sql);
  $consulta = pg_fetch_result($query, 0, 0);
  
  if($consulta == 'Proyecto'){
    include_once  "propuestas.php";
    echo '<script> Swal.fire({
      icon: "error",
       title: "Error",
       text: "No se puede rechazar una propuesta que ya ha sido aprobada como proyecto ",
     });</script>';
  }else{
  

      $sql = "UPDATE proyectos SET cod_dir = NULL WHERE cod_proye='$codigo'";
      $query = pg_query($sql);
  
      $sql = "UPDATE estudiantes SET cod_proye=NULL WHERE cod_proye='$codigo'";
      $query = pg_query($sql);
    
      $sql = "UPDATE proyectos SET estado = 'Rechazada' WHERE cod_proye = '$codigo'";
      $query = pg_query($sql);
  
      include_once  "propuestas.php";
      echo '<script> Swal.fire({
          icon: "success",
          title: "Buen trabajo!",
          text: "La propuesta ha sido rechazada",
      });</script>';
    }
  


}





?>
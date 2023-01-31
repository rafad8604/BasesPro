<?php

include("connection.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);

$codigo=$_GET['id'];

$sql = "SELECT estado FROM proyectos WHERE cod_proye = '$codigo'";
$query = pg_query($sql);
$query = pg_fetch_result($query, 0, 0);

if($query == 'Proyecto'){
  include_once  "propuestas.php";
  echo '<script> Swal.fire({
    icon: "error",
     title: "Error",
     text: "No se puede borrar una propuesta que ya ha sido aceptada como proyecto",
   });</script>';
}else{

  $sql = "SELECT count(*) FROM estudiantes WHERE cod_proye = '$codigo'";
  $query = pg_query($sql);
  $query = pg_fetch_result($query, 0, 0);
  
  
  if($query>=1){
    include_once  "propuestas.php";
          
    echo '<script> Swal.fire({
     icon: "error",
      title: "Error",
      text: "No se puede borrar una propuesta que tenga asignado algun estudiante",
    });</script>';
  }else{

  $sql = "SELECT count(cod_dir) FROM proyectos WHERE cod_proye = '$codigo'";
  $query = pg_query($sql);
  $query = pg_fetch_result($query, 0, 0);

    if($query >= 1){
      include_once  "propuestas.php";
          
      echo '<script> Swal.fire({
       icon: "error",
        title: "Error",
        text: "No se puede borrar una propuesta que tenga asignado algun director",
      });</script>';
    }else{
      $querydos = "DELETE FROM proyectos WHERE cod_proye = '$codigo'";
      $result = pg_query($querydos);
    
      
      include_once  "propuestas.php";
  
      echo '<script> Swal.fire({
        icon: "success",
      title: "Buen trabajo!",
         text: "Se elimino manera correcta la propuesta",
      });</script>';
    }
    }
  
   

}


?>
<?php
include("connection.php");
session_start();

$cod_est = $_POST['agregarEst'];
$cod_propu = $_POST['cod_propu'];


$sql = "SELECT estado FROM proyectos WHERE cod_proye='$cod_propu'";
$query = pg_query($sql);  
$query = pg_fetch_result($query, 0, 0);

if($query == "Proyecto" || $query == "Rechazada"){
  include_once  "propuestas.php";
  echo '<script> Swal.fire({
    icon: "error",
    title: "Error!",
    text: "La propuesta ya no admite estudiantes",
  });</script>';

}else{

  $sql = "UPDATE estudiantes SET cod_proye='$cod_propu' WHERE cod_est = '$cod_est'";
  $query = pg_query($sql);  

  if($query){

    include_once  "propuestas.php";
    echo '<script> Swal.fire({
      icon: "success",
      title: "Buen trabajo!",
      text: "Se asigno  el estudiante de manera correcta a la propuesta",
    });</script>';
    
          
       
      echo " )}});</script>";

        }else{
          include_once  "propuestas.php";
          echo '<script> Swal.fire({
              icon: "error",
              title: "Hubo un error al asignar el estudiante a la propuesta",
            });</script>';
        }


}




?>

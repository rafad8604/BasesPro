<?php
include("connection.php");
session_start();

$cod_est = $_POST['quitarEst'];
$cod_propuesta = $_POST['cod_propu'];

$sql = "SELECT estado FROM proyectos WHERE cod_proye = '$cod_propuesta'";
$query = pg_query($sql); 
$query = pg_fetch_result($query, 0, 0);

if($query == "Proyecto"){
  include_once  "propuestas.php";
          echo '<script> Swal.fire({
              icon: "error",
              title: "Error!",
              text: "No se puede designar al estudiante porque la propuesta ya fue aprobada",
            });</script>';
}else{
  $sql = "UPDATE estudiantes SET cod_proye=NULL WHERE cod_est = '$cod_est'";
  $query = pg_query($sql);  

  include_once  "propuestas.php";
  echo '<script> Swal.fire({
    icon: "success",
    title: "Buen trabajo!",
    text: "Se designo de manera correcta el estudiante de la propuesta",
  });</script>';
}

?>
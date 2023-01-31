<?php

include("connection.php");
session_start();

$cod_director=$_GET['id'];

$sql = "SELECT COUNT(*) FROM proyectos WHERE cod_dir='$cod_director'";
$query = pg_query($sql);
$query = pg_fetch_result($query, 0, 0);


if($query >= 1){

  
  include_once  "directivos.php";
  echo '<script> Swal.fire({
      icon: "error",
      title: "Error!",
      text: "El directivo esta asignado a una propuesta o proyecto",
    });</script>';

   
}else{

  $deleteDir = "DELETE FROM directores WHERE cod_dir='$cod_director'";
  $deleteDir = pg_query($deleteDir);  

  if($deleteDir){
    include_once  "directivos.php";
    echo '<script> Swal.fire({
      icon: "success",
      title: "Buen trabajo!",
      text: "Se borro manera correcta el directivo",
    });</script>';
  }else{
    include_once  "directivos.php";
    echo '<script> Swal.fire({
        icon: "error",
        title: "Error!",
        text: "Hubo un error al borrar al directivo",
      });</script>';
  }

        



}

?>
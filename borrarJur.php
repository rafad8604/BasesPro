<?php

include("connection.php");
session_start();

$cod_jurado=$_GET['id'];



$sql = "SELECT veredicto FROM sustentaciones WHERE cod_jur='$cod_jurado'";
$query = pg_query($sql);
$consulta = pg_fetch_result($query, 0, 0);

if($consulta != 'NO' || $consulta != 'SI'){

  include_once  "jurados.php";
    echo '<script> Swal.fire({
      icon: "error",
      title: "Error!",
      text: "Este jurado no puede ser eliminado hasta dar un veredicto",
    });</script>';

}else{

  $deleteJur = "DELETE FROM jurados WHERE cod_jur='$cod_jurado'";
  $deleteJur = pg_query($deleteJur);  
   
  if($deleteJur){
  
    include_once  "jurados.php";
    echo '<script> Swal.fire({
    icon: "success",
    title: "Buen trabajo!",
    text: "Se borro manera correcta el jurado",
    });</script>';
      
    }else{

      include_once  "jurados.php";
      echo '<script> Swal.fire({
      icon: "error",
      title: "Error al borrar al jurado",
      });</script>';
    }
}




?>
<?php
include("connection.php");
session_start();

$cod_proye = $_GET['id'];

$sql = "SELECT estado FROM proyectos WHERE cod_proye='$cod_proye'";
$query = pg_query($sql);  
$query = pg_fetch_result($query, 0, 0);

if($query == "Proyecto"){

  include_once  "propuestas.php";
  echo '<script> Swal.fire({
    icon: "error",
    title: "Error!",
    text: "Este director no puede ser designado porque la propuesta fue aprobada",
  });</script>';

}else{

  $sql = "UPDATE proyectos SET cod_dir = null WHERE cod_proye = '$cod_proye'";
  $query = pg_query($sql);  
  
  if($query){
    include_once  "propuestas.php";
    echo '<script> Swal.fire({
      icon: "success",
      title: "Buen trabajo!",
      text: "Se designo de manera correcta el director",
    });</script>';
  }else{

    include_once  "propuestas.php";
    echo '<script> Swal.fire({
        icon: "error",
        title: "Error",
        text: "Error al designar el director",
      });</script>';

  }
    
}





  




   
    
          
       
     

?>

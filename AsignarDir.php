<?php
include("connection.php");
session_start();

$cod_dir = $_POST['agregarDir'];
$cod_proye = $_POST['cod_proye'];

$sql = "SELECT estado FROM proyectos WHERE cod_proye='$cod_proye'";
$query = pg_query($sql);  
$query = pg_fetch_result($query, 0, 0);

if($query == "Proyecto" || $query == "Rechazada" ){
  include_once  "propuestas.php";
  echo '<script> Swal.fire({
    icon: "error",
    title: "Error!",
    text: "La propuesta ya no se le pueden asignar directores",
  });</script>';

}else{

  $sql = "UPDATE proyectos SET cod_dir='$cod_dir' WHERE cod_proye = '$cod_proye'";
  $query = pg_query($sql);  


  if($query){

      include_once  "propuestas.php";
      echo '<script> Swal.fire({
        icon: "success",
        title: "Buen trabajo!",
        text: "Se asigno de manera correcta el director",
      });</script>';
      
            
        
        echo " )}});</script>";

          }else{
            include_once  "propuestas.php";
            echo '<script> Swal.fire({
                icon: "error",
                title: "Hubo un error al asignar el director",
              });</script>';
          }


  }

?>


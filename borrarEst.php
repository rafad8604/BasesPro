<?php

include("connection.php");
session_start();


$cod_estudiante=$_GET['id'];

$sql = "SELECT count(cod_proye) FROM estudiantes where cod_est='$cod_estudiante'";
$query = pg_query($sql);
$consulta = pg_fetch_result($query, 0, 0);

if($consulta >= 1){
  include_once  "../views/estudiantes.php";
          echo '<script> Swal.fire({
              icon: "error",
              title: "Error",
              text: "El estudiante se encuentra en un proyecto, no puede ser eliminado",
            });</script>';
}else{
  $sql = "DELETE FROM estudiantes WHERE cod_est='$cod_estudiante'";
  $query = pg_query($sql);  
   
  if($query){
  
      include_once  "../views/estudiantes.php";
      echo '<script> Swal.fire({
        icon: "success",
        title: "Buen trabajo!",
        text: "Se borro manera correcta el estudiante",
      });</script>';
      
            
         
        echo " )}});</script>";
  
          }else{
            include_once  "../views/estudiantes.php";
            echo '<script> Swal.fire({
                icon: "error",
                title: "Error al borrar al estudiante",
              });</script>';
          }
  
}

?>
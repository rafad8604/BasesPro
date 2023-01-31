<?php

include("connection.php");
session_start();

$cod_proyecto=$_GET['id'];
$sql = "SELECT count(*) FROM sustentaciones WHERE cod_proye = '$cod_proyecto'";
$query = pg_query($sql);  
$query = pg_fetch_result($query, 0, 0);

if($query >= 1){
    include_once  "proyectos.php";
    echo '<script> Swal.fire({
      icon: "error",
      title: "Error!",
      text: "El proyecto no puede ser eliminado porque posee una sustentación pendiente",
    });</script>';
}else{
    $sqldos = "DELETE FROM proyectos WHERE cod_proye='$cod_proyecto'";
    $querydos = pg_query($sqldos);  
 

    include_once  "proyectos.php";
    echo '<script> Swal.fire({
      icon: "success",
      title: "Buen trabajo!",
      text: "Se borro manera correcta el proyecto",
    });</script>';
    echo " )}});</script>";
}





   
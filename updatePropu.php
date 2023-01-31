<?php
include("connection.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);


$codigo_propuesta=$_POST['codigo'];
$nombre = $_POST['nomb_proye'];
$descripcion=$_POST['descripcion'];
$fecha=$_POST['fecha'];



$sql = "SELECT estado FROM proyectos WHERE cod_proye='$codigo_propuesta'";
$query = pg_query($sql);
$query = pg_fetch_result($query, 0, 0);

if($query == "Rechazada"){
  include_once  "propuestas.php";
  echo '<script> Swal.fire({
    icon: "error",
     title: "Error",
     text: "No se puede actualizar un propuesta rechazada",
   });</script>';
}else{
  if($query == 'Proyecto'){

    include_once  "propuestas.php";
    echo '<script> Swal.fire({
      icon: "error",
       title: "Error",
       text: "No se puede actualizar un proyecto",
     });</script>';
  
  }else{
  
    $sql="UPDATE proyectos SET nomb_proye='$nombre', descripcion='$descripcion', fecha_pro='$fecha' WHERE cod_proye='$codigo_propuesta'";
  $query = pg_query($sql);  
  
  if($query){
     
      include_once  "propuestas.php";
      echo '<script> Swal.fire({
          icon: "success",
          title: "Buen trabajo!",
          text: "Se actualizo de manera correcta la propuesta",
        });</script>';
  }
  
  }
  
}



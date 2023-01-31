<?php
include("connection.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);


$codigo=$_POST['codigo'];
$veredicto=$_POST['veredicto'];
$razon = $_POST['razon'];

$sql = "SELECT veredicto FROM sustentaciones WHERE cod_proye='$codigo'";
$query = pg_query($sql);
$query = pg_fetch_result($query, 0, 0);


if(empty($query)){

   $sql="UPDATE sustentaciones SET veredicto='$veredicto', razon='$razon'WHERE cod_proye='$codigo'";
   $query = pg_query($sql);  
   
   if($query){
      
       include_once  "proyectos.php";
       echo '<script> Swal.fire({
           icon: "success",
           title: "Buen trabajo!",
           text: "Se establecio el veredicto para este proyecto",
         });</script>';

}else{

    include_once  "proyectos.php";
    echo '<script> Swal.fire({
      icon: "error",
       title: "Error",
       text: "Error al establecer el veredicto",
     });</script>';
 
}

}else{
    include_once  "proyectos.php";
    echo '<script> Swal.fire({
      icon: "error",
       title: "Error",
       text: "Error este proyecto ya le fue dado un veredicto",
     });</script>'; 
}


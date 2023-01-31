<?php
include("connection.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);


$codigo =$_POST['codigo'];
$fecha =$_POST['fecha'];

$sql = "SELECT veredicto FROM sustentaciones WHERE cod_proye='$codigo'";
$query = pg_query($sql);
$query = pg_fetch_result($query, 0, 0);

if(empty($query)){

    $sql="UPDATE sustentaciones SET fecha_pre='$fecha' WHERE cod_proye='$codigo'";
    $query = pg_query($sql);  
    
    if($query){
       
        include_once  "proyectos.php";
        echo '<script> Swal.fire({
            icon: "success",
            title: "Buen trabajo!",
            text: "Se actualizo de manera correcta la fecha del proyecto",
          });</script>';
    }
    

}else{

include_once  "proyectos.php";
echo '<script> Swal.fire({
  icon: "error",
   title: "Error",
   text: "No se puede actualizar un proyecto que ya le fue dado un veredicto",
 });</script>';

}


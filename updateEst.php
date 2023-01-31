<?php
include("connection.php");
session_start();

$codigo_estudiante=$_POST['codigo'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$dni = $_POST['dni'];

$sql = "WITH all_dnis AS (
  SELECT dni FROM estudiantes
  UNION 
  SELECT dni FROM jurados
  UNION 
  SELECT dni FROM directores
)
SELECT 1 FROM all_dnis
WHERE dni = '$dni' LIMIT 1;";

$query = pg_query($sql);
$cantidad = pg_num_rows($query);
$sqldos = "SELECT dni FROM estudiantes WHERE cod_est='$codigo_estudiante'";
$verificar = pg_query($sqldos);
$verificarsql= pg_fetch_result($verificar, 0, 0);

if($verificarsql == $dni){


  $sql="UPDATE estudiantes SET dni='$dni', nomb_est='$nombres', ape_est='$apellidos' WHERE cod_est='$codigo_estudiante'";
  $query = pg_query($sql);   

include_once  "estudiantes.php";
echo '<script> Swal.fire({
  icon: "success",
  title: "Buen trabajo!",
  text: "Se actualizo de manera correcta el jurado",
});</script>';

}else if($cantidad >= 1){
  include_once  "estudiantes.php";
  echo '<script> Swal.fire({
      icon: "error",
      title: "Error",
      text: "Ya existe un usuario registrado con ese dni",
    });</script>';

}else{

$sql="UPDATE estudiantes SET dni='$dni', nomb_est='$nombres', ape_est='$apellidos' WHERE cod_est='$codigo_estudiante'";
$query = pg_query($sql);  



if($query){
   
    include_once  "../views/estudiantes.php";
    echo '<script> Swal.fire({
        icon: "success",
        title: "Buen trabajo!",
        text: "Se actualizo de manera correcta el estudiante",
      });</script>';
}

}


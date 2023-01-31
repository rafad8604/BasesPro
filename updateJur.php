<?php
include("connection.php");
session_start();

$codigo=$_POST['codigo'];
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
$sqldos = "SELECT dni FROM jurados WHERE cod_jur='$codigo'";
$verificar = pg_query($sqldos);
$verificarsql= pg_fetch_result($verificar, 0, 0);

if($verificarsql == $dni){

  $sql="UPDATE jurados SET dni='$dni', nomb_jur='$nombres', ape_jur='$apellidos' WHERE cod_jur='$codigo'";
$query = pg_query($sql);  

include_once  "jurados.php";
echo '<script> Swal.fire({
  icon: "success",
  title: "Buen trabajo!",
  text: "Se actualizo de manera correcta el juradp",
});</script>';

}else if($cantidad >= 1){

include_once  "jurados.php";
echo '<script> Swal.fire({
    icon: "error",
    title: "Error",
    text: "Ya existe un usuario registrado con ese dni",
  });</script>';

}else{

$sql="UPDATE jurados SET dni='$dni', nomb_jur='$nombres', ape_jur='$apellidos' WHERE cod_jur='$codigo'";
$query = pg_query($sql); 

  if($query){
   
    include_once  "jurados.php";
    echo '<script> Swal.fire({
        icon: "success",
        title: "Buen trabajo!",
        text: "Se actualizo de manera correcta el jurado",
      });</script>';
}


}





<?php
include("connection.php");
session_start();

$codigo_director=$_POST['codigo'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];

$sql="UPDATE directores SET nomb_dir='$nombres', ape_dir='$apellidos' WHERE cod_dir='$codigo_director'";
$actDir = pg_query($sql);  

if($actDir){
   
    include_once  "directivos.php";
    echo '<script> Swal.fire({
        icon: "success",
        title: "Buen trabajo!",
        text: "Se actualizo de manera correcta el director",
      });</script>';
}
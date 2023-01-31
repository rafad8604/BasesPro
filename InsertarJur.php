<?php

include("connection.php");

session_start();
$dni=$_POST['dni'];
$nombre=$_POST['nomb_jur'];
$apellido=$_POST['ape_jur'];

// error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);

//COMPROBAR SI EL DNI ESTA REPETIDO EN LAS TABLAS ESTUDIANTES, JURADOS O DIRECTIVOS

$sql = "WITH all_dnis AS (
  SELECT dni FROM estudiantes
  UNION 
  SELECT dni FROM jurados
  UNION 
  SELECT dni FROM directores
)
SELECT 1 FROM all_dnis
WHERE dni = '$dni' LIMIT 1;";

$query = pg_query($conect, $sql);
$cantidad = pg_num_rows($query);

if($cantidad >= 1){
  include_once  "jurados.php";
  echo '<script> Swal.fire({
      icon: "error",
      title: "Error",
      text: "Ya existe un usuario registrado con ese dni",
    });</script>';

}else{

  //INGRESAR EL ESTUDIANTE
  //GENERA UN CODIGO AUTOMATICO
  //EL RESTRO DE DATOS LOS TRAE DEL FORM

  $sql="INSERT INTO jurados(cod_jur, dni, nomb_jur, ape_jur) values ('jur' || nextval('jurados_codigo_seq') ,'$dni','$nombre','$apellido')";
  $query = pg_query($sql);
  
  
  if($query){
      
    include_once  "jurados.php";
      echo '<script> Swal.fire({
          icon: "success",
          title: "Buen trabajo!",
          text: "Se ingreso de manera correcta el jurado",
        });</script>';
     
  
  }else{
      
    include_once  "jurados.php";
      echo '<script> Swal.fire({
          icon: "error",
          title: "Error al ingresar al jurado",
        });</script>';
  }
  
}


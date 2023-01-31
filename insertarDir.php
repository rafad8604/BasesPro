<?php

include("connection.php");

session_start();
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];

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

$query = pg_query($sql);
$cantidad = pg_num_rows($query);

if($cantidad >= 1){
  include_once  "directivos.php";
  echo '<script> Swal.fire({
      icon: "error",
      title: "Error",
      text: "Ya existe un usuario registrado con ese dni",
    });</script>';

}else{

  //INGRESAR EL ESTUDIANTE
  //GENERA UN CODIGO AUTOMATICO
  //EL RESTRO DE DATOS LOS TRAE DEL FORM

  $sql="INSERT INTO directores(cod_dir, dni, nomb_dir, ape_dir) values ('dir'||nextval('directores_codigo_seq'),'$dni','$nombre','$apellido')";
  $query = pg_query($sql);
  
  
  if($query){
      
    include_once  "directivos.php";
      echo '<script> Swal.fire({
          icon: "success",
          title: "Buen trabajo!",
          text: "Se ingreso de manera correcta el directivo",
        });</script>';
     
  
  }else{
      
    include_once  "directivos.php";
      echo '<script> Swal.fire({
          icon: "error",
          title: "Error!",
          text: "error al ingresar el directivo",
        });</script>';
  }

}





?>
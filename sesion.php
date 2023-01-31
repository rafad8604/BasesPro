<?php


require "connection.php";
session_start();
$usuario=$_POST['user'];
$clave=$_POST['pass'];

$query = "SELECT * FROM jurados WHERE nomb_jur='$usuario' AND cod_jur='$clave'";

$consulta=pg_query($conect, $query);
$cantidad=pg_num_rows($consulta);



if($cantidad>0){
    $_SESSION['nombre_usuario']=$usuario;
    header("location: inicio.php");
}else{

    include_once  "index.php";
    echo '<script> Swal.fire({
        icon: "error",
        title: "Contraseña Incorrecta",
      });</script>';
   
}
?>
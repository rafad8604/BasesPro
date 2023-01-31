<?php



include("connection.php");

session_start();
$nombre_proyecto=$_POST['nomb_proye'];
$date=$_POST['fecha_pro'];
$descripcion=$_POST['descripcion'];

$fecha_procesada = date('Y-m-d', strtotime($date));

// error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);

$sql="INSERT INTO proyectos(cod_proye, nomb_proye, descripcion, fecha_pro) values ('proye' || nextval('proyectos_codigo_seq'), '$nombre_proyecto','$descripcion','$fecha_procesada')";
$query = pg_query($sql);

if($query){
    
  include_once  "propuestas.php";
    echo '<script> Swal.fire({
        icon: "success",
        title: "Buen trabajo!",
        text: "Se registro de manera correcta la propuesta",
      });</script>';
   

}else{
    
  include_once  "propuestas.php";
    echo '<script> Swal.fire({
        icon: "error",
        title: "Error al ingresar la propuesta",
      });</script>';
}



?>
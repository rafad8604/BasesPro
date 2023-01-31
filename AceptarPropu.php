<?php

include("connection.php");
session_start();

$cod_propuesta=$_GET['id'];

  
$aux = "SELECT estado FROM proyectos WHERE cod_proye = '$cod_propuesta'";
$consulta = pg_query($aux);
$consulta = pg_fetch_result($consulta, 0, 0);

if($consulta == "Rechazada"){
    include_once  "propuestas.php";
    echo '<script> Swal.fire({
        icon: "error",
        title: "Error!",
        text: "La propuesta ya ha sido rechazada como proyecto",
    });</script>';
}else{
    $aux = "SELECT estado FROM proyectos WHERE cod_proye = '$cod_propuesta'";
$consulta = pg_query($aux);
$consulta = pg_fetch_result($consulta, 0, 0);

if($consulta == 'Proyecto'){
    include_once  "propuestas.php";
    echo '<script> Swal.fire({
        icon: "error",
        title: "Error!",
        text: "La propuesta ya ha sido aceptada como proyecto",
    });</script>';
}else{
  
    $sql = "SELECT count(cod_dir) FROM proyectos WHERE cod_proye = '$cod_propuesta'";
    $query = pg_query($sql);
    $query = pg_fetch_result($query, 0, 0);

    if($query >= 1){
        
        $sql = "SELECT count(cod_est) FROM estudiantes WHERE cod_proye = '$cod_propuesta'";
        $query = pg_query($sql);
        $query = pg_fetch_result($query, 0, 0);
        
        if($query >= 1){

        $sql = "UPDATE proyectos SET estado = 'Proyecto' WHERE cod_proye = '$cod_propuesta'";
        $query = pg_query($sql);

        $sql = "SELECT cod_jur FROM jurados ORDER BY random() LIMIT 1;";
        $jurado = pg_query($sql);
        $jurado = pg_fetch_result($jurado, 0, 0);

        $sql = "INSERT INTO sustentaciones(cod_proye, cod_jur) VALUES ('$cod_propuesta', '$jurado')";
        $query = pg_query($sql);
        

        include_once  "propuestas.php";
        echo '<script> Swal.fire({
            icon: "success",
            title: "Buen trabajo!",
            text: "La propuesta ha sido aceptada como proyecto",
        });</script>';
            }else{
                include_once  "propuestas.php";
                echo '<script> Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Por favor asigne un estudiante a la propuesta antes de aceptarla como proyecto",
                });</script>';

            }
    }else{
        include_once  "propuestas.php";
        echo '<script> Swal.fire({
            icon: "error",
            title: "Error!",
            text: "Por favor asigne un director a la propuesta antes de aceptarla como proyecto",
        });</script>';

    }
    
}

}
  




?>
<?php

include("connection.php");
session_start();

$codigo=$_GET['id'];

$sql = "SELECT  cod_proye, fecha_pre FROM sustentaciones WHERE cod_proye='$codigo'";
$query = pg_query($sql);
$row = pg_fetch_object($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Conexion con la base de datos -->

    <?php
    require_once "connection.php";
    ?>

    <!-- Conexion con la hoja de estilos -->

    <link rel="stylesheet" href="../../public/css/inicio.css">

    <!-- Conexion con Sweet Alert -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Conexion con icons Awesome Fonts -->

    <script src="https://kit.fontawesome.com/ccd4ed56f8.js" crossorigin="anonymous"></script>

    <script src="../../main.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unillanos - DashBoard</title>
</head>
<body>

    <form action="updateFechaProye.php" method="POST">

    <input type="hidden" name="codigo" value="<?php echo $row->cod_proye ?>">
   
    <input type="date" name="fecha" value="<?php echo $row->fecha_pre ?>">
   
    <input type="submit" value="Actualizar">
    </form>
    
    
 
</body>
</html>
    

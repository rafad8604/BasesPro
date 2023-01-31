<?php

include("connection.php");
session_start();

$cod_proye=$_GET['id'];

$sql = "SELECT nomb_proye, fecha_pro, descripcion FROM proyectos WHERE cod_proye='$cod_proye'";
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

    <form action="updatePropu.php" method="POST">

    <input type="hidden" name="codigo" value="<?php echo $cod_proye ?>">
    <input type="text" name="nomb_proye" value="<?php echo $row->nomb_proye ?>">
    <input type="date" name="fecha" value="<?php echo $row->fecha_pro ?>">
    <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $row->descripcion ?>">
    
    <input type="submit" value="Actualizar">
    </form>
    
    
 
</body>
</html>
    

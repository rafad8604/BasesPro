<?php

include("connection.php");
session_start();

$codigo = $_GET['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../../public/css/inicio.css">
        <script src="prueba.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>

<dialog open id="modal-editar" class="modal-estilo"> 

<div class="contenedor-modal-editar">

<form action="updateVeredicto.php" method="POST">

    <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
   
    <input type="radio" name="veredicto" required value="SI" checked>SI<br>
    <input type="radio" name="veredicto" required value="NO" checked>NO
    <input type="text" required name="razon">

    <input type="submit" value="Actualizar">
    </form>

<a href="proyectos.php">CERRAR</a>


</div>

</dialog>


</body>
</html>

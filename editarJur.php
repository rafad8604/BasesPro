<?php

include("connection.php");
session_start();

$codigo = $_GET['id'];
$sql="SELECT dni, nomb_jur, ape_jur FROM jurados WHERE cod_jur='$codigo'";
$query = pg_query($sql);
$rowd = pg_fetch_object($query);



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

<form action="updateJur.php" method="POST">

<input value="<?php echo $codigo ?>" type="hidden" name="codigo">

<input type="text" name="dni" placeholder="Dni" value="<?php echo $rowd->dni ?>">
<input type="text" name="nombres" placeholder="Nombres" value="<?php echo $rowd->nomb_jur ?>">
<input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $rowd->ape_jur ?>">

<input type="submit" value="Actualizar">
<a href="jurados.php">CERRAR</a>

</form>

</div>

</dialog>


</body>
</html>


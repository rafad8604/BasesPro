<?php

include("connection.php");
session_start();

$codigo = $_GET['id'];
$sql="SELECT cod_proye, nomb_proye, fecha_pro, descripcion FROM proyectos  WHERE cod_proye='$codigo'";
$query = pg_query($sql);

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

<?php   if(pg_num_rows($query)>0){
        while($row=pg_fetch_object($query)){   ?>
<table>
    <thead>
        <tr><?php echo $row->cod_proye ?></tr>   
    </thead>
    <tbody>
        <tr><?php echo $row->nomb_proye ?></tr>
        <tr><?php echo $row->fecha_pro ?></tr>
        <tr><?php echo $row->descripcion ?></tr>
    </tbody>
    
        <?php }} ?>
</table>
<a href="propuestas.php">CERRAR</a>

</form>

</div>

</dialog>


</body>
</html>


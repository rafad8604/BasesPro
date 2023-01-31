<?php

include("connection.php");
session_start();

$codigo = $_GET['id'];
$sql="SELECT cod_jur, dni, nomb_jur, ape_jur FROM jurados  WHERE cod_jur='$codigo'";
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



<?php   if(pg_num_rows($query)>0){
        while($row=pg_fetch_object($query)){   ?>
<table>
    <thead>
        <tr><?php echo $row->cod_jur ?></tr>   
    </thead>
    <tbody>
        <tr><?php echo $row->dni ?></tr>
        <tr><?php echo $row->nomb_jur ?></tr>
        <tr><?php echo $row->ape_jur ?></tr>
    </tbody>
    
        <?php }} ?>
</table>
<a href="proyectos.php">CERRAR</a>


</div>

</dialog>


</body>
</html>

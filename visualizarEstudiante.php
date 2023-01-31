<?php

include("connection.php");
session_start();

$codigo = $_GET['id'];
$sql="SELECT cod_est, dni, nomb_est, ape_est FROM estudiantes WHERE cod_proye='$codigo'";
$query = pg_query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../../public/css/inicio.css">
      
        
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
        <tr><?php echo $row->cod_est ?></tr>   
    </thead>
    <tbody>
        <tr><?php echo $row->dni ?></tr>
        <tr><?php echo $row->nomb_est ?></tr>
        <tr><?php echo $row->ape_est ?></tr>
    </tbody>
    
        <?php }} ?>
</table>
<a href="propuestas.php">CERRAR</a>



</div>

</dialog>


</body>
</html>


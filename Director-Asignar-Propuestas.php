<?php

include("connection.php");
session_start();

$cod_proye=$_GET['id'];

        
   
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
    
    <form action="asignarDir.php" method="POST">

        <select name="agregarDir" id="form-propuestas">
            <option>---------Selecione un director----------</option> 
            <?php
                                            $sql="SELECT cod_dir, nomb_dir, ape_dir FROM directores";
                                            $query=pg_query($sql);
                                            $query=pg_query($sql);
                                            while($row = pg_fetch_array($query)){
                                               echo '<option value="'.$row['cod_dir'].'">'.$row['cod_dir'].'   '.$row['nomb_dir'].'  '.$row['ape_dir'].' '.'</option>';
                                                
                                          }
                                        ?>
         </select>  
         <input type="hidden" name="cod_proye" value="<?php echo $cod_proye=$_GET['id'];?>">
          <input type="submit" value="submit">                                  
    </form>
    
    
 
</body>
</html>
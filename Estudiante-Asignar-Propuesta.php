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
    
    <form action="asignarEst.php" method="POST">

    <select name="agregarEst" id="form-propuestas">
        <option>---------Selecione un estudiante----------</option> 
        <?php
                                        $sql="SELECT cod_est, nomb_est, ape_est FROM estudiantes WHERE cod_proye is null";
                                        $query=pg_query($sql);
                                        while($row = pg_fetch_array($query)){
                                        echo '<option value="'.$row['cod_est'].'">'.$row['cod_est'].'   '.$row['nomb_est'].'  '.$row['ape_est'].' '.'</option>';
                                            
                                    }
                                    ?>
    </select>  
    <input type="hidden" name="cod_propu" value="<?php echo $cod_propu=$_GET['id'];?>">
    <input type="submit" value="submit">                                  
    </form>
    
    
 
</body>
</html>
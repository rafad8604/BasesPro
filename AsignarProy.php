<?php

include("connection.php");
session_start();

$cod_proye=$_GET['id'];
$sql = "SELECT count(*) FROM proyectos WHERE cod_proye = '$cod_proye' AND cod_dir is not null";
$query = pg_query($sql);  
$query = pg_fetch_result($query, 0, 0);

if($query >= 1){

    include_once  "proyectos.php";
    echo '<script> Swal.fire({
      icon: "error",
      title: "Error!",
      text: "El proyecto ya tiene asignado un director",
    });</script>';
    }
        
   
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
    
<div class="contenedor">

    <aside>

        <div class="aside-logo">
                <img src="../../public/images/logounillanos.png" alt="">
        </div>

        <div class="line"></div>

        <div class="dashboard">

            <a href="#">
            <i class="fa-solid fa-house"></i>
            Dashboard
            </a>

        </div>
        
        <div class="line"></div>

        <div class="aside-interface">Interface</div>

        <div class="aside-componentes">
            
            <ul>
                <li>
                    <a href="estudiantes.php">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Estudiantes
                    </a> 
                </li>
                
                <br>

                <li>
                    <a href="jurados.php">
                    <i class="fa-solid fa-puzzle-piece"></i>
                    Jurados
                    </a> 
                </li>

                <br>

                <li>
                    <a href="directivos.php">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    Directivos
                    </a> 
                </li>

            </ul>

        </div>

        <div class="line-two"></div>

        <div class="aside-interface">Proyectos de grado</div>

        <div class="aside-componentes">
            
            <ul>
                <li>
                    <a href="propuestas.php">
                    <i class="fa-solid fa-file-pen"></i>
                    Propuestas de grado
                    </a> 
                </li>
                
                <br>

                <li>
                    <a href="proyectos.php">
                    <i class="fa-solid fa-feather"></i>
                    Proyectos
                    </a> 
                </li>

                <br>

                <li>
                    <a href="sustentaciones.php">
                    <i class="fa-regular fa-comments"></i>
                    Sustentaciones 
                    </a> 
                </li>

            </ul>

        </div>


        
    </aside>

    <header>
        <div class="header-login">
            <img src="../../public/images/user-sebas.webp" alt="" srcset="">
        </div>
        <div class="header-title">Admin</div>
        <div class="header-line"></div>
    </header>
    <main>

    <form action="asignarDir.php" method="POST">

        <select name="agregarDir" id="form-propuestas">
            <option>---------Selecione un director----------</option> 
            <?php
                                            $sql="SELECT cod_dir, nomb_dir, ape_dir FROM directores";
                                            $query=pg_query($sql);
                                            while($row = pg_fetch_array($query)){
                                               echo '<option value="'.$row['cod_dir'].'">'.$row['cod_dir'].'   '.$row['nomb_dir'].'  '.$row['ape_dir'].' '.'</option>';
                                                
                                          }
                                        ?>
         </select>  
         <input type="hidden" name="cod_proye" value="<?php echo $cod_proye=$_GET['id'];?>">
          <input type="submit" value="submit">                                  
    </form>
    
    </main>

</div> 
  
   
 
</body>
</html>
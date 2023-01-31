<?php

include("connection.php");
session_start();

$cod_propu=$_GET['id'];
$sql = "SELECT * FROM propuestas WHERE cod_propu='$cod_propu'";
$consulta = pg_query($conect, $sql);  

$row = pg_fetch_object($consulta);
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

            <a href="inicio.php">
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
        
      <form action="updatePropu.php" method="POST">

        <input type="hidden" name="codigo" value="<?php echo $row->cod_propu ?>">

          <input type="date" name="fecha" value="<?php echo $row->fecha_pro ?>">
          <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $row->descripcion ?>">
          
        <input type="submit" value="Actualizar">
      </form>

    </main>

</div> 
  
   
 
</body>
</html>
<?php
 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);


?><!DOCTYPE html>
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
    <b>DASHBOARD</b>
    </a>

</div>

<div class="line"></div>

<div class="aside-interface"><b>INTERFACE</b></div>

<div class="aside-componentes">
    
    <ul>
        <li>
            <a href="estudiantes.php">
            <i class="fa-solid fa-graduation-cap"></i>
            ESTUDIANTES
            </a> 
        </li>
        
        <br>

        <li>
            <a href="jurados.php">
            <i class="fa-solid fa-puzzle-piece"></i>
            JURADOS
            </a> 
        </li>

        <br>

        <li>
            <a href="directivos.php">
            <i class="fa-solid fa-chalkboard-user"></i>
            DIRECTORES
            </a> 
        </li>

    </ul>

</div>

<div class="line-two"></div>

<div class="aside-interface"><b>PROYECTOS DE GRADO</b></div>

<div class="aside-componentes">

<ul>
<li>
    <a href="propuestas.php">
    <i class="fa-solid fa-file-pen"></i>
    PROPUESTAS
    </a> 
</li>

<br>

<li>
    <a href="proyectos.php">
    <i class="fa-solid fa-feather"></i>
    PROYECTOS
    </a> 
</li>

<br>

<li>
    <a href="sustentaciones.php">
    <i class="fa-regular fa-comments"></i>
    SUSTENTACIONES 
    </a> 
</li>

</ul>

</div>


        
    </aside>

    <header>
    <div class="header-title">

<div class="botondd">

    <div class="split-button">

    <button></button>

    <button onclick="toggleDropdown()">

        <span id="chevron">
        <img style="opacity:0.5" src="../../public/images/profile.png" alt="" srcset="">
        </span>

    </button>

    <div id="menudd" class="menudd">

        <!-- <button onclick="handleMenuButtonClicked()">
        <span class="material-symbols-outlined"> build </span>
        Tools
        </button> -->
        
    <button onclick="handleMenuButtonClicked()">
    
        <span class="material-symbols-outlined"> lock </span>
        Cerrar Sesión
        </button>

    </div>

</div>

</div>


</div>

    </header>
    <main>
        
    <div class="table-contenido">

    
        <table class="table-template-sustentaciones">
            <thead>
                <tr class="header-table">
                    <th colspan="5">SIN NOMBRE  </th>
                </tr>
                <tr class="header-table-row">
                    <th>Estudiantes</th>
                    <th>Nombre Proyecto</th>
                    <th>Nombre Jurado</th>
                    <th>Nombre Director</th> 
                    <th>Veredicto</th>
                </tr>
            </thead>
            <tbody>
            <?php

        $sql = "SELECT cod_proye, fecha_pre, recinto, cod_jur, veredicto FROM sustentaciones WHERE veredicto is not NULL";
        $query = pg_query($sql);


        if(pg_num_rows($query)>0){
        while($row=pg_fetch_object($query)){  ?>

    <tr>
        <!-- NOMBRE DE LOS ESTUDIANTES -->
        <th>
            <?php 
            $sql = "SELECT nomb_est, ape_est FROM estudiantes WHERE cod_proye='$row->cod_proye'";
            $queryx = pg_query($sql);
            if(pg_num_rows($queryx)>0){
                while($rowd=pg_fetch_object($queryx)){ ?>

           
                <?php echo $rowd->nomb_est; ?><br>
            

             <?php   }}  ?>
             </th>

        <!-- NOMBRE PROYECTO -->

        <?php $sql = "SELECT nomb_proye FROM proyectos WHERE cod_proye ='$row->cod_proye'";
        $queryt = pg_query($sql);
        $rowt=pg_fetch_object($queryt)
        ?>

             <th><?php echo $rowt->nomb_proye?></th>

        <!-- NOMBRE JURADO -->

        <?php $sql = "SELECT nomb_jur FROM jurados WHERE cod_jur='$row->cod_jur'";
        $queryp = pg_query($sql);
        $rowp=pg_fetch_object($queryp)
        ?>
        
        <th><?php echo $rowp->nomb_jur?></th>
        
        <!-- NOMBRE DIRECTOR -->
        
        <?php 
        $sql = "SELECT nomb_dir FROM directores WHERE cod_dir in(SELECT cod_dir FROM proyectos WHERE cod_proye='$row->cod_proye')";
        $queryxy = pg_query($sql);
        $rowxy=pg_fetch_object($queryxy);
        ?>

        <th><?php echo $rowxy->nomb_dir?></th>
      
        <!-- VEREDCITO -->

        <th><?php echo $row->veredicto ?></th>

      
        
    </tr>

<?php }} ?>
            </tbody>
        </table>

    </div>

    </main>

</div> 
  
   
 <script src="dropdown.js"></script>
</body>
</html>
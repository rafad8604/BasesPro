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

    <!-- Conexion con los scripts -->
    
    <script src="modal-proyectos.js"></script>
 
 

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0"
    /> 
    
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

    <!-- MODAL FECHA PRESENTACION -->

    <dialog id="modal-ver-fecha_pre" class="modal-estilo">

    </dialog>

     <!-- MODAL RECINTO -->

     <dialog id="modal-ver-recinto" class="modal-estilo">

    </dialog>

    <!-- MODAL JURADO -->

    <dialog id="modal-ver-jurado" class="modal-estilo">

    </dialog>

     <!-- MODAL VEREDICTO -->

    <dialog id="modal-ver-veredicto" class="modal-estilo">

    </dialog>

    <div class="table-contenido">
        <table class="table-template-sustentaciones">
            <thead>
                <tr class="header-table">
                    <th colspan="9">PROYECTOS</th>
                </tr>
                <tr class="header-table-row">
                    <th>Estudiantes</th>
                    <th>Codigo Proyecto</th>
                    <th colspan="2">Fecha Presentacion</th>
                    <th colspan="2">Recinto</th>
                    
                    <th>Jurados</th>
                    
                    <th>Veredicto</th>
                </tr>
            </thead>
            <tbody>
            <?php

        $sql = "SELECT cod_proye, fecha_pre, recinto, cod_jur, veredicto FROM sustentaciones";
        $query = pg_query($sql);


        if(pg_num_rows($query)>0){
        while($row=pg_fetch_object($query)){  ?>

    <tr>
        <!-- CODIGO DE LOS ESTUDIANTES -->
        <th>
         <?php 
            $sql = "SELECT nomb_est, ape_est FROM estudiantes WHERE cod_proye='$row->cod_proye'";
            $queryx = pg_query($sql);
            if(pg_num_rows($queryx)>0){
               while($rowd=pg_fetch_object($queryx)){ ?>

           
                <?php echo $rowd->nomb_est; ?><br>
            

             <?php   }} ?>
             </th>

        <!-- CODIGO PROYECTO -->

        <th> <?php echo $row->cod_proye?> </th>

        <!-- FECHA PRESENTACION -->
        
        <th><?php echo $row->fecha_pre?></th>

        <th><a class="ver-fecha_pre" value="<?php echo $row->cod_proye?>"><i class="fa-solid fa-pen"></i></a></th>

        <!-- RECINTO -->

        <th><?php echo $row->recinto ?></th>

        <th><a class="ver-recinto" value="<?php echo $row->cod_proye ?>"><i class="fa-solid fa-pen"></i></a></th>

        <!-- JURADOS -->

        <?php 
        $sql = "SELECT nomb_jur FROM jurados WHERE cod_jur='$row->cod_jur'";
        $queryj=pg_query($sql);
        $rowj=pg_fetch_object($queryj);
        ?>

        <th><a class="ver-jurado" value="<?php echo $row->cod_jur?>"><?php echo $rowj->nomb_jur ?></a></th>

        <!-- VEREDICTO -->
                
        <th><a class="ver-veredicto" value="<?php echo $row->cod_proye ?>"><i class="fa-solid fa-gavel"></i> </a></th> 
        
    </tr>

<?php }} ?>
            </tbody>
        </table>

    </div>
   
    
    </main>


</div> 
  
<script src="modal-proyectos.js"></script>
<script src="dropdown.js"></script>
</body>
</html>
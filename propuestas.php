
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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />

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

    <div class="boton-crear-alumno">
        <button id="btn-abrir-modal" class="btn-create-alumno">Crear Propuesta</button>
    </div>

      <!-- AGREGAR PROPUESTA -->

      <dialog class="container-form sign-in" id="modal" class="modal">
    
        
    <h2 class="form-title">REGISTRO DE PROPUESTAS</h2>
    <div id="btn-cerrar-modal" class="btn-cerrar-modal"></div>
  
    <form action="insertarPropu.php" method="post">
        <input type="text" required name="nomb_proye" placeholder="Nombre Proyecto">
        <input type="date" required name="fecha_pro" placeholder="Fecha">
        <input type="text" required name="descripcion" placeholder="Descripcion">
        <input class="sign-in-btn" type="submit" value="Registrar">
        </form>

    </dialog>

     <!-- VER PROPUESTA -->

    <dialog id="modal-ver-propuesta" class="modal-estilo"> 

    </dialog>

     <!-- VER DIRECTOR -->

    <dialog id="modal-ver-director" class="modal-estilo"> 

    </dialog>

    <!-- ASIGNAR DIRECTOR -->

    <dialog id="modal-asignar-director" class="modal-estilo"> 

    </dialog>

     <!-- VER MODAL - ESTUDIANTE -->

     <dialog id="modal-estudiante" class="modal-estilo"> 

    </dialog>

    <!-- VER ESTUDIANTES -->

    <dialog id="modal-ver-estudiante" class="modal-estilo"> 

    </dialog>

    <!-- ASIGNAR ESTUDIANTES -->

    <dialog id="modal-asignar-estudiante" class="modal-estilo"> 

    </dialog>
    
     <!-- DESIGNAR ESTUDIANTES -->

     <dialog id="modal-designar-estudiante" class="modal-estilo"> 

    </dialog>

    <!-- EDITAR PROPUESTA -->

    <dialog id="modal-editar-propuesta" class="modal-estilo"> 

    </dialog>

    <div class="table-contenido">
        <table class="table-template">
            <thead>
                <tr class="header-table">
                    <th colspan="8">PROPUESTAS / PROYECTOS</th>
                </tr>
                <tr class="header-table-row">
                    <th>Codigo Proyecto</th>
                    <th>Nombre Proyecto</th>
                    <th>Estado</th>
                    <th colspan="2">Director</th>
                    
                    <th colspan="2">Estudiantes</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php

        $sql = "SELECT cod_proye, nomb_proye, descripcion, fecha_pro, cod_dir, estado, cod_est FROM proyectos";
        $query = pg_query($conect, $sql);

        if(pg_num_rows($query)>0){
        while($row=pg_fetch_object($query)){  ?>

    <tr>
        
        <th><?php echo $row->cod_proye?></th>
        <th> <a class="ver-propuesta" value="<?php echo $row->cod_proye?>"><?php echo $row->nomb_proye?></a></th>
        <th><?php echo $row->estado?></th>

        <!-- DIRECTORES -->

        <th><a class="ver-director" value="<?php echo $row->cod_dir?>"><i class="fa-solid fa-chalkboard-user"></i></a></th>

        <th>
            <a class="Asignar-director" value="<?php echo $row->cod_proye?>"><i class="fa-solid fa-user-plus"></i></a>
            <a href="DesignarProy.php?id=<?php echo $row->cod_proye ?>" class="form-boton-delete"><i class="fa-solid fa-user-xmark"></i></a>
        </th>

        <!-- ESTUDIANTES -->

        <th><a class="ver-estudiante" value="<?php echo $row->cod_proye?>"><i class="fa-solid fa-graduation-cap"></i></a></th>

        <th>
            <a class="Asignar-estudiante" value="<?php echo $row->cod_proye ?>"><i class="fa-solid fa-user-plus"></i></a>
            <a class="Designar-estudiante"  value="<?php echo $row->cod_proye ?>"><i class="fa-solid fa-user-xmark"></i></a>
        </th>

        <!-- ACCIONES -->

        <th>
        
            <!-- ACEPTAR -->
            <a href="AceptarPropu.php?id=<?php echo $row->cod_proye ?>" class="form-boton-up"><i class="fa-solid fa-thumbs-up"></i></a>
            <!-- RECHAZAR -->
            <a href="rechazarPropu.php?id=<?php echo $row->cod_proye ?>" class="form-boton-delete"><i class="fa-solid fa-thumbs-down"></i></a>
            <!-- EDITAR -->
            <a value="<?php echo $row->cod_proye ?>" class="form-boton-delete-act"><i class="fa-solid fa-pen"></i></a>
            <!-- ELIMINAR -->
            <a href="borrarPropu.php?id=<?php echo $row->cod_proye ?>" class="form-boton-delete-ac">   <i class="fa-solid fa-trash"></i></a> 
           
          
        </th> 
        
    </tr>

<?php }} ?>
            </tbody>
        </table>

    </div>

        
    </main>

</div> 
  
                    <script src="dropdown.js"></script>
                    <script src="main.js"></script>
</body>
</html>
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

    <script src="main.js"></script>

     <!-- Estilos externos -->

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
        <button id="btn-abrir-modal" class="btn-create-alumno">Crear Director</button>
    </div>

    <dialog class="container-form sign-in" id="modal">
    
        <div id="btn-cerrar-modal"></div>
        <h2 class="form-title">REGISTRO DE DIRECTORES</h2>
        <form class="formulario" action="insertarDir.php" method="post">
        <input type="text" pattern="[0-9]+" required name="dni" placeholder="Dni">
        <input type="text" pattern="[a-zA-Z ]+" required name="nombre" placeholder="Nombre">
        <input type="text" pattern="[a-zA-Z ]+" required name="apellido" placeholder="Apellido">
        <input class="sign-in-btn" type="submit" value="Registrar">
        </form>

    </dialog>

    <dialog id="modal-editar-Dir" class="modal-estilo"> 

    </dialog>

    <div class="table-contenido">
        <table class="table-template">
            <thead>
                <tr class="header-table">
                    <th colspan="6">DIRECTORES</th>
                </tr>
                <tr class="header-table-row">
                    <th>Codigo</th>
                    <th>Dni</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th style="width:10%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT cod_dir, dni, nomb_dir, ape_dir FROM directores";
                $consulta = pg_query($conect, $query);

                if(pg_num_rows($consulta)>0){
                while($row=pg_fetch_object($consulta)){
                ?>
                <tr>
                    <td><?php echo $row->cod_dir?></td>
                    <td><?php echo $row->dni?></td>
                    <td><?php echo $row->nomb_dir?></td>
                    <td><?php echo $row->ape_dir?></td>
                    <td class="table-icons-enlace">
                        <a class="btn-abrir-modal-editar-Dir" value="<?php echo $row->cod_dir ?>">
                            <i  value="<?php echo $row->cod_dir ?>" class="fa-solid fa-pen"></i>
                        </a>
                        <a class="btn-abrir-modal-delete" href="borrarDir.php?id=<?php echo $row->cod_dir ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                }}
                ?>
            </tbody>
        </table>
    </div>


    </main>

</div> 
  
   
<script src="main.js"></script>
<script src="dropdown.js"></script>
</body>
</html>
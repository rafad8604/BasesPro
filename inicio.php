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


   
    
    </main>

    <script>

const menud = document.getElementById("menudd"),
chevron = document.getElementById("chevron");

const toggleDropdown = () => {
  menud.classList.toggle("open");
};

const handleMenuButtonClicked = () => {
   toggleDropdown();
   window.location.href = "salir.php";
};



    </script>
</div> 
  
   

</body>
</html>
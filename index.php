<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Conexion con la base de datos -->

    <?php
    require_once "connection.php";
    ?>

    <!-- Conexion con la hoja de estilos -->

    <link rel="stylesheet" href="../../public/css/estilos.css">

     <!-- Conexion con Sweet Alert -->

     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <!-- Conexion con icons Awesome Fonts -->

    <script src="https://kit.fontawesome.com/ccd4ed56f8.js" crossorigin="anonymous"></script>


    <script src="../../main.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bases de datos</title>
</head>
<body>



    <div class="login-card">
            <h2>Login</h2>
            <h3>Ingresa tus datos</h3>
            <form id="mi-formulario" action="sesion.php" class="login-form" method="POST">
                <input required type="text" name="user" placeholder="Username" id="userd" spellcheck="false">
                <span class="icon">
                <i class="fa-regular fa-circle-user"></i>
                </span>
            
                <input required type="password" name="pass" placeholder="Contraseña"  id="pass" spellcheck="false">
                <span class="asterix">
                <i class="fa-solid fa-fingerprint"></i>
                </span>
                <button type="submit">LOGIN</button>
            </form>
    </div>

     <!-- Scripts -->

     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
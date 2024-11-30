<?php
session_start();
            if (isset($_SESSION['user'])) {
                
            } else {
                header("Location: ../index.php");
                exit();
            }
            ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Inicio|PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
                <li><a href="../index.php" >Inicio</a></li>
                <li><a href="mision.php">Mision</a></li>
                <li><a href="vision.php">Vision</a></li>
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="registrar_articulo.php">Registrar articulos</a></li>
                <li><a href="mostrar_articulos.php">Articulos</a></li>
                <li><a href="mostrar_categorias.php">Categorias</a></li>
                <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Misión</h1>
            <hr>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing, elit potenti quam mattis dis euismod egestas, a rhoncus etiam ridiculus luctus. Elementum platea a at lobortis porta neque mi, consequat quisque cum nisl sem nullam lectus eleifend, eget ac cras curabitur dui ut. Pulvinar lobortis nascetur placerat neque nostra integer odio lacus, vehicula tincidunt dictum sociosqu aptent tristique primis dui quis, sagittis conubia sapien vel natoque etiam elementum.</p>
       </div>
    </section>
    <footer>
    <p>Curso de PHP con Mich | &copy; 2024  </p>
    </footer>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Artículos | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="acercade.php">Acerca de</a></li>
            <li><a href="registrar_articulo.php">Registrar artículos</a></li>
            <li><a href="mostrar_articulos.php">Artículos</a></li>
            <li><a href="mostrar_categorias.php">Categorías</a></li>
            <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Mostrar Artículos</h1>
            <?php
            include_once('conexion.php');

            // Consulta SQL para incluir el campo "nombre"
            $sql = "SELECT 
                        articulos.id, 
                        articulos.nombre, 
                        articulos.descripcion AS articulo, 
                        categorias.descripcion AS categoria, 
                        articulos.imagen 
                    FROM articulos 
                    INNER JOIN categorias 
                    ON articulos.id_categoria = categorias.id";

            $ejecucion_sql = $conexion->query($sql);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                echo '<table>';
                echo '<tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Imagen</th>
                    </tr>';
                
                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<tr>
                            <td>' . htmlspecialchars($fila['id']) . '</td>
                            <td>' . htmlspecialchars($fila['nombre']) . '</td>
                            <td>' . htmlspecialchars($fila['articulo']) . '</td>
                            <td>' . htmlspecialchars($fila['categoria']) . '</td>
                            <td>';
                    if (!empty($fila['imagen'])) {
                        echo '<img src="../' . htmlspecialchars($fila['imagen']) . '" alt="Imagen del artículo">';
                    } else {
                        echo 'Sin imagen';
                    }
                    echo '</td>
                        </tr>';
                }
                
                echo '</table>';
            } else {
                echo '<p>No hay artículos disponibles en este momento.</p>';
            }
            ?>
       </div>
    </section>
    <footer>
    <p>Curso de PHP con Mich | &copy; 2024  </p>
    </footer>
</body>
</html>

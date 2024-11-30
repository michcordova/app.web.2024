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
    <title>
        Categorías | PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"], input[type="submit"] {
            padding: 8px;
            margin: 5px;
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
            <h1>Gestión de Categorías</h1>

            <!-- Formulario para agregar categoría -->
            <form action="mostrar_categorias.php" method="post">
                <label for="nueva_categoria">Nueva Categoría:</label>
                <input type="text" name="nueva_categoria" id="nueva_categoria" placeholder="Nombre de la categoría" required>
                <input type="submit" name="agregar_categoria" value="Agregar">
            </form>

            <?php
            include_once('conexion.php');

            // Agregar categoría
            if (isset($_POST['agregar_categoria'])) {
                $nueva_categoria = $conexion->real_escape_string($_POST['nueva_categoria']);
                $sql_agregar = "INSERT INTO categorias (descripcion) VALUES ('$nueva_categoria')";
                if ($conexion->query($sql_agregar)) {
                    echo "<p>Categoría agregada correctamente.</p>";
                } else {
                    echo "<p>Error al agregar la categoría: " . $conexion->error . "</p>";
                }
            }

            // Eliminar categoría
            if (isset($_POST['eliminar_categoria'])) {
                $id_categoria = intval($_POST['id_categoria']);
                $sql_eliminar = "DELETE FROM categorias WHERE id = $id_categoria";
                if ($conexion->query($sql_eliminar)) {
                    echo "<p>Categoría eliminada correctamente.</p>";
                } else {
                    echo "<p>Error al eliminar la categoría: " . $conexion->error . "</p>";
                }
            }

            // Consulta SQL para mostrar categorías
            $sql = "SELECT id, descripcion FROM categorias";
            $ejecucion_sql = $conexion->query($sql);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                echo '<table>';
                echo '<tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>';
                
                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<tr>
                            <td>' . htmlspecialchars($fila['id']) . '</td>
                            <td>' . htmlspecialchars($fila['descripcion']) . '</td>
                            <td>
                                <form action="mostrar_categorias.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_categoria" value="' . htmlspecialchars($fila['id']) . '">
                                    <input type="submit" name="eliminar_categoria" value="Eliminar" onclick="return confirm(\'¿Estás seguro de eliminar esta categoría?\')">
                                </form>
                            </td>
                        </tr>';
                }
                
                echo '</table>';
            } else {
                echo '<p>No hay categorías disponibles.</p>';
            }
            ?>
            <hr>
       </div>
    </section>
    <footer>
        <p>Curso de PHP con Mich | &copy; 2024  </p>
    </footer>
</body>
</html>

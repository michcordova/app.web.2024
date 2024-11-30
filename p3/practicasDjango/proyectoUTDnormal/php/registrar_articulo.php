<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL ^ E_NOTICE);

    // Conexión a la base de datos
    include_once("conexion.php");

    // Datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];

    // Subida de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorio = "../img/uploads/";
        $nombreImagen = basename($_FILES['imagen']['name']);
        $rutaImagen = $directorio . $nombreImagen;

        // Validar que el archivo sea una imagen
        $tipoArchivo = mime_content_type($_FILES['imagen']['tmp_name']);
        if (strpos($tipoArchivo, "image/") !== 0) {
            echo "<script>alert('El archivo subido no es una imagen válida.');</script>";
            exit();
        }

        // Mover la imagen a la carpeta destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
            // Inserción en la base de datos con la ruta de la imagen
            $sql = "INSERT INTO `articulos` (`nombre`, `descripcion`, `id_categoria`, `imagen`) 
                    VALUES ('$nombre', '$descripcion', '$categoria', 'img/uploads/$nombreImagen')";

            $ejecutar_sql = $conexion->query($sql);

            if ($ejecutar_sql) {
                echo "<script>alert('Artículo agregado correctamente con imagen.');</script>";
            } else {
                echo "<script>alert('Error al registrar el artículo.');</script>";
            }
        } else {
            echo "<script>alert('Error al subir la imagen.');</script>";
        }
    } else {
        echo "<script>alert('Debe seleccionar una imagen válida.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Artículo | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Logotipo PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="acercade.php">Acerca de</a></li>
            <li><a href="registrar_articulo.php">Registrar Artículos</a></li>
            <li><a href="mostrar_articulos.php">Artículos</a></li>
            <li><a href="mostrar_categorias.php">Categorías</a></li>
            <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Registrar artículo</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <table align="center">
                    <tr>
                        <td><label for="nombre">Nombre:</label></td>
                        <td><input type="text" placeholder="Nombre del artículo" name="nombre" required></td>
                    </tr>
                    <tr>
                        <td><label for="descripcion">Descripción:</label></td>
                        <td><input type="text" placeholder="Descripción" name="descripcion" required></td>
                    </tr>
                    <tr>
                        <td><label for="categoria">Categoría:</label></td>
                        <td>
                            <select name="categoria" id="categoria">
                                <?php
                                include_once('conexion.php');
                                $sql = "SELECT * FROM categorias";
                                $ejecucion_sql = $conexion->query($sql);
                                
                                while ($fila = $ejecucion_sql->fetch_assoc()) {
                                    echo '<option value="' . $fila['id'] . '">' . $fila['descripcion'] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="imagen">Seleccionar imagen:</label></td>
                        <td><input type="file" name="imagen" accept="image/*" required></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="enviar" value="Registrar">
                        </td>
                        <td>
                            <input type="reset" name="limpiar" value="Limpiar">
                        </td>
                    </tr>
                </table>
            </form>
            <hr>
       </div>
    </section>
    <footer>
    <p>Curso de PHP con Mich | &copy; 2024  </p>
    </footer>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once("conexion.php");

    // Datos del formulario
    $descripcion = $_POST['descripcion'];

    // Validar y manejar el archivo
    $imagen = $_FILES['imagen'];
    $nombreImagen = $imagen['name'];
    $tipoImagen = $imagen['type'];
    $tamanoImagen = $imagen['size'];
    $rutaTemporal = $imagen['tmp_name'];

    // Verificar que sea una imagen
    $extensionesPermitidas = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($tipoImagen, $extensionesPermitidas) && $tamanoImagen <= 5 * 1024 * 1024) {
        // Mover la imagen a la carpeta del servidor
        $carpetaDestino = "../img/uploads/";
        if (!file_exists($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }
        
        $rutaFinal = $carpetaDestino . basename($nombreImagen);

        if (move_uploaded_file($rutaTemporal, $rutaFinal)) {
            // Guardar la información en la base de datos
            $sql = "INSERT INTO articulos (descripcion, imagen) VALUES ('$descripcion', '$rutaFinal')";
            if ($conexion->query($sql) === TRUE) {
                echo "Imagen subida y datos guardados correctamente.";
            } else {
                echo "Error al guardar en la base de datos: " . $conexion->error;
            }
        } else {
            echo "Error al mover la imagen.";
        }
    } else {
        echo "Archivo no permitido o demasiado grande.";
    }
} else {
    echo "No se recibieron datos.";
}
?>

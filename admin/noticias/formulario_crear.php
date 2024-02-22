<?php
require "../../includes/app.php";
estaAutenticado();


use App\Noticia;
use Intervention\Image\ImageManagerStatic as Image;



$db = conectarDB();

// Mensajes de errores
$errores = Noticia::getErrores();

$error = "";
$titulo = "";
$intro = "";
$texto = "";
$fecha = "";
$fecha_creacion = date("Y-m-d");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $noticia = new Noticia($_POST);

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES["imagen"]["tmp_name"]) {
        $imagen = Image::make($_FILES["imagen"]["tmp_name"])->fit(600, 600);
        $noticia->setImagen($nombreImagen);
    }

    $errores = $noticia->validar();

    if (empty($errores)) {

        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }
        $imagen->save(CARPETA_IMAGENES . $nombreImagen);
        
        try {
            $resultado = $noticia->guardar();

            if ($resultado) {
                header("Location: listado_noticias.php?exito=true&accion=crear");
            }
        } catch (Exception $e) {
            $errores[] =  "Error al insertar registro: " . ($e->getCode() === 1062) ? "Esa noticia ya existe" : "Ha ocurrido un error";
        }


    }
}
incluirTemplate("sidebar_menu");

?>
<main class="app-content contenedor seccion formulario-admin">
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>
    <div class="app-title">
        <div>
            <h1><i class="bi bi-ui-checks"></i>Nueva Noticia</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
            <li class="breadcrumb-item"><a href="listado_noticias.php">Noticias</a></li>
            <li class="breadcrumb-item"><a href="formulario_crear.php">Nueva Noticia</a></li>
        </ul>
    </div>

    <div class="tile seccion">
        <div class="tile-body">
            <form action="" class="formulario" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Título de la noticia" value="<?php echo $titulo; ?>">
                </div>
                <div class="mb-3">
                    <label for="intro" class="form-label">Introducción</label>
                    <input type="text" id="intro" name="intro" placeholder="Intro de la noticia" value="<?php echo $intro; ?>">
                </div>


                <div class="mb-3">
                    <label class="form-label" for="texto">Texto</label>
                    <textarea id="texto" name="texto"><?php echo $texto; ?>
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
                </div>
                <div class="mb-3">
                    <label for="fecha">Fecha</label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
                </div>
                <input type="submit" class="boton-fireBrick" value="Crear">
            </form>
        </div>
    </div>
</main>



<?php
mysqli_close($db);
incluirTemplate("sidebar_footer");

<?php 
namespace Controllers;
use MVC\Router;
use Model\Producto;
use Model\Categoria;
use Intervention\Image\ImageManagerStatic as Image;

class ProductoController {
    public static function listado(Router $router) {
        $productos = Producto::findProductosAndCategorias();
        $router->render("layoutAdmin", "productos/listado", [
            "productos" => $productos
        ]);
    }

    public static function crear(Router $router) {

        $producto = new Producto();
        $errores = Producto::getErrores();
        $formatos = $producto->getFormatos();
        $categorias = Categoria::findAll();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $producto = new Producto($_POST["producto"]);
            $producto->formato = $_POST["formato"];

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES["producto"]["tmp_name"]["imagen"]) {
                $imagen = Image::make($_FILES["producto"]["tmp_name"]["imagen"])->fit(600, 600);
                $producto->setImagen($nombreImagen);
            }
            $errores = $producto->validar();

            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);

                $producto->guardar();
            }
        }

        $router->render("layoutAdmin", "productos/crear", [
            "producto" => $producto,
            "formatos" => $formatos,
            "errores" => $errores,
            "categorias" => $categorias
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar("/admin");

        $errores = Producto::getErrores();
        $producto = Producto::findById($id);
        $formatos = $producto->getFormatos();
        $categorias = Categoria::findAll();


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $args = $_POST["producto"];
            $args["formato"] = $_POST["formato"];
            $producto->sincronizar($args);
            $errores = $producto->validar();

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES["producto"]["tmp_name"]["imagen"]) {
                $imagen = Image::make($_FILES["producto"]["tmp_name"]["imagen"])->fit(600, 600);
                $producto->setImagen($nombreImagen);
            }


            if (empty($errores)) {
                if ($_FILES["producto"]["tmp_name"]["imagen"]) {
                    $imagen->save(CARPETA_IMAGENES . '/' . $nombreImagen);
                }
                $producto->guardar();
            }
        }

        $router->render("layoutAdmin", "productos/actualizar", [
            "producto" => $producto,
            "errores" => $errores,
            "formatos" => $formatos,
            "categorias" => $categorias
        ]);
    }

    public static function eliminar() {
        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $producto = Producto::findById($id);
            $producto->eliminar();
        }
    }
}
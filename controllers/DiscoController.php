<?php

namespace Controllers;

use MVC\Router;
use Model\Disco;
use Model\Categoria;
use Intervention\Image\ImageManagerStatic as Image;

class DiscoController{
    public static function listado(Router $router) {
        $discos = Disco::findAll("anio_edicion DESC");

        $router->render("layoutAdmin", "discos/listado", [
            "discos" => $discos
        ]);
    }

    public static function crear(Router $router) {
        
        $disco = new Disco();

     
        $errores = Disco::getErrores();
        $formatos = $disco->getFormatos();
        $categorias = Categoria::findAll();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
          
            $disco = new Disco($_POST["disco"]);
            $disco->formato = $_POST["formato"];

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES["disco"]["tmp_name"]["imagen"]) {
                $imagen = Image::make($_FILES["disco"]["tmp_name"]["imagen"])->fit(600, 600);
                $disco->setImagen($nombreImagen);
                
            }
            $errores = $disco->validar();

            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);
      

                $disco->guardar();
            }
        }

        $router->render("layoutAdmin", "discos/crear", [
            "disco" => $disco,
            "formatos" => $formatos,
            "errores" => $errores,
            "categorias" => $categorias
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar("/admin");

        $errores = Disco::getErrores();

       
        $disco = Disco::findById($id);
        $formatos = $disco->getFormatos();
      

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $args = $_POST["disco"];
            $args["formato"] = $_POST["formato"];
            $disco->sincronizar($args);
            $errores = $disco->validar();

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES["disco"]["tmp_name"]["imagen"]) {
                $imagen = Image::make($_FILES["disco"]["tmp_name"]["imagen"])->fit(600, 600);
                $disco->setImagen($nombreImagen);
            }


            if (empty($errores)) {
                if ($_FILES["disco"]["tmp_name"]["imagen"]) {
                    $imagen->save(CARPETA_IMAGENES . '/' . $nombreImagen);
                }
                $disco->guardar();
            }
        }

        $router->render("layoutAdmin", "discos/actualizar", [
            "disco" => $disco,
            "errores" => $errores,
            "formatos" => $formatos
        ]);
    }

    public static function eliminar() {
        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $disco = Disco::findById($id);
            $disco->eliminar();
        }
    }
}
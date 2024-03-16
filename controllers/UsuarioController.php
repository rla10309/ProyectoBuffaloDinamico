<?php
namespace Controllers;
use Model\Usuario;
use Model\Rol;
use MVC\Router;

class UsuarioController{

    public static function listado(Router $router){
        $usuarios = Usuario::findAll();

        $router->render("layoutAdmin", "usuarios/listado", [
            "usuarios" => $usuarios
        ]);
    }

    public static function crear(Router $router) {
        protegeRuta();
        $usuario = new Usuario();
        $roles = Rol::findAll();
        $alertas = Usuario::getAlertas();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //debuguear($_POST);

            $usuario = new Usuario($_POST["usuario"]);

            //debuguear($usuario);
            $alertas = $usuario->validar();

            if (empty($alertas)) {
                $usuario->guardar();
            }
        }
    
        $router->render("layoutAdmin", "usuarios/crear", [
            "usuario" => $usuario,
            "alertas" => $alertas,
            "roles" => $roles
           
        ]);
    }
    public static function actualizar(Router $router) {
        protegeRuta();
        
        $id = validarORedireccionar("/admin");
        $usuario = Usuario::findById($id);
        $roles = Rol::findAll();
        $alertas = Usuario::getAlertas();
     
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            debuguear($_POST);
          

            $args = $_POST["usuario"];
            $usuario->sincronizar($args);
            $alertas = $usuario->validar();

            if (empty($alertas)) {
                $usuario->guardar();
            }
        }

        $router->render("layoutAdmin", "usuarios/actualizar", [
            "usuario" => $usuario,
            "alertas" => $alertas,
            "roles" => $roles

        ]);
    }

    public static function eliminar() {
        protegeRuta();
        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario = Usuario::findById($id);
            $usuario->eliminar();
        }
    }


}
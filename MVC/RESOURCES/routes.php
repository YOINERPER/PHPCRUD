
<?php

class ruta {
    public static function cargarContenido($controlador, $accion){

        if(file_exists("CONTROLLER/$controlador"."_controller.php")){ // si el controlador existe se importa

            require_once "CONTROLLER/$controlador"."_controller.php";
            $cnt = $controlador."_controlador";
            $obj = new $cnt();
            if(method_exists($obj, $accion)){
                $obj -> $accion();
            }else{
                echo "el metodo no existe";
            }
        }else{

            echo "error 404";
        }
    }
}
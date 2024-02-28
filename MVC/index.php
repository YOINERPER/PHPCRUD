<?php
session_start();
require_once("./RESOURCES/routes.php");
require_once("./RESOURCES/plantilla.php");
require_once("./RESOURCES/connection.php");

if(isset($_GET['controlador']) && isset($_GET['accion'])){
    $controlador = $_GET['controlador'];
    $accion = $_GET['accion'];
}else{

    // si la ruta no especifica un controlador y una accion:
    $controlador = 'inicio';
    $accion = 'principal';
}

$objConeccion = new connection();
$objConeccion->getConnection();

// carga el contenido segun el controlador y la accion
ruta::cargarContenido($controlador,$accion);
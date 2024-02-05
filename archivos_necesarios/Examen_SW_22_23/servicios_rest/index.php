<?php
define("__DIR__", "http://localhost/Proyectos/archivos_necesarios/Examen_SW_22_23/servicios_rest");
require "src/funciones_servicios.php";
require __DIR__ . '/Slim/autoload.php';

$app = new \Slim\App;



$app->get('/conexion_PDO', function ($request) {

    echo json_encode(conexion_pdo());
});
/*
$app->get('/conexion_MYSQLI',function($request){
    
    echo json_encode(conexion_mysqli());
});*/
$app->post('/login', function ($request) {
    $datos["usuario"] = $request->getParam("usuario");
    $datos["clave"] = $request->getParam("clave");
    echo json_encode(login($datos));

});
/*$app->get('/logueado',function($request){
    echo json_encode(logueado());
});
$app->post('/salir',function($request){
    echo json_encode(salir());
});
$app->get('/obtenerLibros',function($request){
    echo json_encode(obtenerLibros());
});
$app->post('/crearLibro',function($request){
    echo json_encode(crearLibro());
});
$app->put('/actualizarPortada/{referencia}',function($request){
    echo json_encode(actualizarPortada());
});
$app->get('/repetido/{tabla}/{columna}/{valor}',function($request){
    echo json_encode(repetido());
});
*/
// Una vez creado servicios los pongo a disposición
$app->run();

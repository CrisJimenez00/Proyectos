<?php

require __DIR__ . '/Slim/autoload.php';

$app = new \Slim\App;
require "src/funciones_ctes.php";
$app->get('/productos', function () {

    echo json_encode(obtener_productos());
});
$app->get('/productos/{cod}', function ($request) {

    echo json_encode(obtener_producto($request->getAttribute("cod")));
});
$app->post('/producto/insertar', function ($request) {
    $datos[]=$request->getParam("cod");
    $datos[]=$request->getParam("nombre");
    $datos[]=$request->getParam("nombre_corto");
    $datos[]=$request->getParam("descripcion");
    $datos[]=$request->getParam("PVP");
    $datos[]=$request->getParam("familia");
    
    echo json_encode(insertar_producto($datos));
});


$app->run();

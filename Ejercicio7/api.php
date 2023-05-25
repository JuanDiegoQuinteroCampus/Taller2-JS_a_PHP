<?php
/* 7. Programa que pida el ingreso del nombre y precio de un artículo y la
cantidad que lleva el cliente. Mostrar lo que debe pagar el comprador
en su factura. */


header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function validacion($nombre)
{
    return $nombre; 
}
//ejemplo de validacion por si lo llego a necesitar
/* function validacion($nombre)
{
    if (strlen($nombre) < 3) {
        throw new Exception("El nombre del artículo debe tener al menos 3 caracteres.");
    }

    return $nombre;
} */

function info($nombre, float $precio, float $cantidad)
{
    $pago = ($precio * $cantidad);
    $res = validacion($nombre);
    return [$pago, $res];
}

try {
    if ($METHOD === "POST") {
        [$pago, $res] = info($_DATA['nombre'], $_DATA['precio'], $_DATA['cantidad']);
    } else {
        throw new Exception("Método no válido");
    }
} catch (\Throwable $th) {
    $pago = "Error";
    $res = "Error";
}

$mensaje = [
    "mensaje" => $res,
    "A pagar" => $pago
];

echo json_encode($mensaje, JSON_PRETTY_PRINT);
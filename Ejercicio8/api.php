<?php
/* 8. Programa que Ingrese por teclado:
a. el valor del lado de un cuadrado para mostrar por pantalla el
perímetro del mismo
b. la base y la altura de un rectángulo para mostrar el área del
mismo */

header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function validacion($arg)
{
    return ($arg <= 3.9) ? "Estudie" : "becado";
}

function algoritmo(float $perimetro, float $base, float $altura)
{
    $per = ($perimetro*4);
    $area = ($base*$altura);
    $res = validacion($per);
    return [$per, $res, $area];
}

try {
    [$per, $res, $area] = match ($METHOD) {
        "POST" => algoritmo(...$_DATA)
    };
} catch (\Throwable $th) {
    $promedio = "Error";
    $res = "Error";
    $area = "Error";
}

$mensaje = [
    "notas" => $_DATA,
    "Perimetro cuadrado" => $per,
    "Area Rectangulo" => $area,
];

echo json_encode($mensaje, JSON_PRETTY_PRINT);



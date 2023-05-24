<?php
// 3. Construir el algoritmo para determinar el voltaje de un
//circuito a partir de la resistencia y la intensidad de corriente.

header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function voltaje(float $resistencia, float $intensidad)
{
    $producto = $resistencia * $intensidad;
    return $producto;
}
try {
    $producto = match ($METHOD) {
        "POST" => voltaje(...$_DATA)
    };
} catch (\Throwable $th) {
    $producto = "Error";
}

$mensaje2 = [
    "Voltaje" => $producto,
];

echo json_encode($mensaje2, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

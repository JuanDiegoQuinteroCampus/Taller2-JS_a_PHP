<?php
// 2. Dado un número indicar si es par o impar y si es mayor de 10.

header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function mayor($may)
{
    $comparacion = ($may >= 10) ? "El numero ingresado es mayor a 10" : "El numero ingresado es menor a 10";
    return $comparacion;
}
function num(float $num1)
{
    $paridad = ($num1 % 2 == 0) ? "El número es par" : "El número es impar";
    $rta = mayor($num1);
    return [$paridad, $rta];
}

try {
    [$paridad, $rta] = match ($METHOD) {
        "POST" => num(...$_DATA)
    };
} catch (\Throwable $th) {
    $paridad = "Error";
    $rta = "Error";
}

$mensaje2 = [
    "mensaje" => $rta,
    "Paridad" => $paridad
];

echo json_encode($mensaje2, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

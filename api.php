<?php
// Construir el algoritmo para un programa que ingrese tres
// notas de un alumno, si el promedio es menor o igual a 3.9
// mostrar un mensaje "Estudie“, de lo contrario un mensaje que
// diga "becado"
header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function validacion($arg)
{
    return ($arg <= 3.9) ? "Estudie" : "becado";
}

function algoritmo(float $nota, float $nota2, float $nota3)
{
    $promedio = ($nota + $nota2 + $nota3) / 3;
    $res = validacion($promedio);
    return [$promedio, $res];
}

try {
    [$promedio, $res] = match ($METHOD) {
        "POST" => algoritmo(...$_DATA)
    };
} catch (\Throwable $th) {
    $promedio = "Error";
    $res = "Error";
}

$mensaje = [
    "mensaje" => $res,
    "notas" => $_DATA,
    "promedio" => $promedio
];

echo json_encode($mensaje, JSON_PRETTY_PRINT);


// 2. Dado un número indicar si es par o impar y si es mayor de 10.

function mayor($may)
{
    return($may >= 10) ? "El numero ingresado es mayor a 10" : "El numero ingresado es menor a 10";
    
}
function num(float $num1)
{
    $paridad = ($num1 / 2 == 0) ? "El número es par" : "El número es impar";
    $rta =mayor($paridad);
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
    "mensaje" => $res,
    "notas" => $_DATA,
    "promedio" => $promedio
];

echo json_encode($mensaje2, JSON_PRETTY_PRINT);

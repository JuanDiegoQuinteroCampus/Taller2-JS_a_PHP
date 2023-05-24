<?php
/* 4. Construir el algoritmo que solicite el nombre y edad de 3
personas y determine el nombre de la persona con mayor edad. */

header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

$nombre1 = $_DATA["nombre1"];
$edad1 = $_DATA["edad1"];
$nombre2 = $_DATA["nombre2"];
$edad2 = $_DATA["edad2"];
$nombre3 = $_DATA["nombre3"];
$edad3 = $_DATA["edad3"];

$personas = array(
    $nombre1 => $edad1,
    $nombre2 => $edad2,
    $nombre3 => $edad3
);

$nombreMayorEdad = "";
$mayorEdad = 0;

function proceso($personas, &$mayorEdad, &$nombreMayorEdad)
{
    foreach ($personas as $nombre => $edad) {
        if ($edad > $mayorEdad) {
            $mayorEdad = $edad;
            $nombreMayorEdad = $nombre;
        }
    }
}

try {
    proceso($personas, $mayorEdad, $nombreMayorEdad);
} catch (\Throwable $th) {
    $nombreMayorEdad = "Error";
}

$mensaje2 = [
    "NombreMayorEdad" => $nombreMayorEdad
];

echo json_encode($mensaje2, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>

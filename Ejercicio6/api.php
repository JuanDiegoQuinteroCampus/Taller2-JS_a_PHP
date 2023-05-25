<?php

header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombres = $_POST["nombre"];
    $sexos = $_POST["sexo"];
    $notas = $_POST["nota"];

    $estudiantes = [];

    for ($i = 0; $i < count($nombres); $i++) {
        $nombre = $nombres[$i];
        $sexo = $sexos[$i];
        $nota = $notas[$i];

        $estudiante = [
            "nombre" => $nombre,
            "sexo" => $sexo === "M" ? "masculino" : "femenino",
            "notaDef" => floatval($nota)
        ];

        $estudiantes[] = $estudiante;
    }

    $res = algoritmo($estudiantes);
} else {
    $res = "Método no permitido";
}

function algoritmo($estudiantes)
{
    $nombres = array_column($estudiantes, "nombre");
    $notas = array_column($estudiantes, "notaDef");

    $contadorMasculino = 0;
    $contadorFemenino = 0;

    foreach ($estudiantes as $estudiante) {
        $sexo = $estudiante["sexo"];
        if ($sexo === "masculino") {
            $contadorMasculino++;
        } elseif ($sexo === "femenino") {
            $contadorFemenino++;
        }
    }

  
}

echo json_encode($res, JSON_PRETTY_PRINT);

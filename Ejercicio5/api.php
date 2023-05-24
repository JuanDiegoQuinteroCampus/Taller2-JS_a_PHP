<?php
    /* 5. Construir el algoritmo que lea por teclado dos números,
    si el primero es mayor al segundo informar su suma y
    diferencia, en caso contrario, informar el producto y la
    división del primero respecto al segundo. */
    header("Content-Type: application/json; charset:UTF-8");
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];
        function validar($arg){
            return ($arg);
        }
       function algoritmo(float $num1, float $num2){
        $resultado = [];

        return ($num1 > $num2) ? [$resultado["suma"]= "suma: ".$num1+$num2 , $resultado["resta"]= "resta: ".$num1-$num2] : 
        [$resultado['multiplicacion'] = "multiplicacion: ".$num1 * $num2 ,$resultado['division'] = "division: ".$num1 / $num2];
       }
       try {
        $res = match($METHOD){
            "POST" => algoritmo(...$_DATA)
        };
       }catch (\Throwable $th) {
        $res = "ERROR";
       };
       $mensaje = (array) [ 
        "Datos" => $_DATA,
        "Resultado" => validar($res),
        
       ];
    echo json_encode($mensaje, JSON_PRETTY_PRINT);
?>
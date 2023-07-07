
<?php

header('Content-Type: application/json; charset=utf-8');

// Generar un número aleatorio basado en la fecha y hora actual
$timestamp = time();
$paymentCode = rand($timestamp, $timestamp + 10000); // Rango de 10000 segundos

// Crear el array asociativo con los datos
$response = array(
    "messageError" => "Se registró el interes de afiliacion para el Plan base, puede realizar el pago con el codigo $paymentCode",
    "code" => 200,
    "data" => array(
        "paymentCode" => $paymentCode
    )
);



    // Imprimir el arreglo en formato JSON
    echo json_encode($response);






?>


<?php


    header('Content-Type: application/json; charset=utf-8');
    
    $response = [];

        $response = array(
            "messageError" => "",
            "code" => 200,
            "data" => array(
                "detail" => array(
                    " - Yape al número 987654321",
					" - Plin al número 987654321",
					" - Pagoefectivo",
					" - Transferencias bancarias a los números "
                )
            )
        );

    
  

    // Imprimir el arreglo en formato JSON
    echo json_encode($response);






?>


<?php


    header('Content-Type: application/json; charset=utf-8');
    
    $response = [];

        $response = array(
            "messageError" => "",
            "code" => 200,
            "data" => array(
                "detail" => array(
                    " - Plan Luren base",
					" - Plan Luren familiar",
					" - Plan Luren Premium",
                )
            )
        );

    
  

    // Imprimir el arreglo en formato JSON
    echo json_encode($response);






?>
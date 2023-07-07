

<?php


    header('Content-Type: application/json; charset=utf-8');
    
    $response = [];

    if (isset($_GET['dni'])) {
        $response = array(
            "messageError" => "",
            "code" => 200,
            "data" => array(
                "detail" => array(
                    "Reumatitis aguda",
                ),
                "date" => "25-05-2023"
            )
        );
    } else {
        $response = array(
            "messageError" => "No contamos una receta generada.",
            "code" => 404,
            "data" => null
        );
    }

    
  

    // Imprimir el arreglo en formato JSON
    echo json_encode($response);






?>
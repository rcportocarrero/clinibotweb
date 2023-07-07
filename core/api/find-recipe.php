

<?php


    header('Content-Type: application/json; charset=utf-8');
    
    $response = [];

    if (isset($_GET['dni'])) {
        $response = array(
            "messageError" => "",
            "code" => 200,
            "data" => array(
                "detail" => array(
                    "Paracetamol, cada 12horas por 3 días",
                    "Kitadol, cada 8 horas por 5 días",
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


<?php


    header('Content-Type: application/json; charset=utf-8');
    
    
    if (isset($_GET['name']) && isset($_GET['date']) ) {
        $response = array(
            "messageError" => "",
            "code" => 200,
            "data" => array(
                "specialists" => array(
                    "Pedro Rivas",
                    "Juan Valdez",
                    "Luis Ángeles"
                )
            )
        );
    } else {
        $response = array(
            "messageError" => "No contamos con especialistas para esta fecha.",
            "code" => 404,
            "data" => null
        );
    }

    
  

    // Imprimir el arreglo en formato JSON
    echo json_encode($response);






?>
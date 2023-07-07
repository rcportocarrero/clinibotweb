

<?php


    header('Content-Type: application/json; charset=utf-8');
    
    
    if (isset($_GET['name'])) {
        $response = array(
            "messageError" => "",
            "code" => 200,
            "data" => array(
                "hoursAvailable" => array(
                    "09:00",
                    "10:00",
                    "11:00",
                    "14:00",
                    "15:00",
                )
            )
        );
    } else {
        $response = array(
            "messageError" => "No contamos con informacion para este especialista.",
            "code" => 404,
            "data" => null
        );
    }

    
  

    // Imprimir el arreglo en formato JSON
    echo json_encode($response);






?>
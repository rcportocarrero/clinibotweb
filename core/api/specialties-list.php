

<?php


    header('Content-Type: application/json; charset=utf-8');
    
    

    $response = array(
        "messageError" => "",
        "code" => 200,
        "data" => array(
            "specialtieslist" => array(
                "Cardiologia",
                "Pediatria",
                "Otorrino"
            )
        )
    );

    
  

    // Imprimir el arreglo en formato JSON
    echo json_encode($response);






?>
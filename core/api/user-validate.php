

<?php


    header('Content-Type: application/json; charset=utf-8');
    
    

    $data = [];
    $response = [];

    if (isset($_GET['dni'])) {
        $dni = $_GET['dni'];
        $data["dni"] = $dni;
        $data["fullName"] = "Roy Cespedes Portocarrero";

        $response["code"] = 200;
        $response["messageError"] = "";
        $response["data"] = $data;
    } else {
        $data["dni"] = null;
        $data["fullName"] = "";

        $response["code"] = 404;
        $response["messageError"] = "En estos momentos no podemos validar tus datos con Reniec.";
        $response["data"] = $data;
    }

    
  

    // Imprimir el arreglo en formato JSON
    echo json_encode($response);






?>
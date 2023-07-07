
<?php

header('Content-Type: application/json; charset=utf-8');
    
    

$data = [];
$response = [];

if (isset($_GET['name'])) {
    $dni = $_GET['name'];
    $data["fullName"] = $dni;
    $data["state"] = "El paciente aún se encuentra en observación.";

    $response["code"] = 200;
    $response["messageError"] = "";
    $response["data"] = $data;
} else {
    $data["name"] = null;
    $data["state"] = "";

    $response["code"] = 404;
    $response["messageError"] = "En estos momentos no podemos validar tus datos.";
    $response["data"] = $data;
}




// Imprimir el arreglo en formato JSON
echo json_encode($response);





?>
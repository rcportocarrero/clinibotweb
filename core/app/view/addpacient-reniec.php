<?php

// URL del servicio REST
$url = "https://api.apis.net.pe/v1/dni?numero=07338715";

// Token de autorización
$token = "apis-token-3151.lJgplUYkXIzkpOnu-guu8TllYv1Ucamc";

// Configuración de la solicitud CURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $token"
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud CURL
$response = curl_exec($ch);

// Verificar si ocurrió algún error
if(curl_errno($ch)) {
    $error = curl_error($ch);
    echo "Error al realizar la solicitud: $error";
} else {
    // Procesar la respuesta
    $responseData = json_decode($response, true);
    
    // Mostrar la respuesta
    print_r($responseData);

    if($responseData["nombre"]){
        
    }

}

// Cerrar la solicitud CURL
curl_close($ch);

?>

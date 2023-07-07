

<?php


class PacientData {
    private $dni;
    private $name;
    private $lastname;

    public function __construct($dni, $name, $lastname) {
        $this->dni = $dni;
        $this->name = $name;
        $this->lastname = $lastname;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastname() {
        return $this->lastname;
    }
}


// Desactivar los warnings
error_reporting(E_ERROR | E_PARSE);

// Deshabilitar la visualización de los errores en el navegador
ini_set('display_errors', '0');

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

    $response = [];
    $response["code"] = 500;
    $response["message"] = "Ocurrió un error al realizar la consulta en Reniec";
    $response["data"] = null;

} else {

    $response = [];
    $response["code"] = 500;
    $response["message"] = "Ocurrió un error al realizar la consulta en Reniec";
    $response["data"] = null;

    header('Content-Type: application/json; charset=utf-8');

    // Imprimir el arreglo en formato JSON
    echo json_encode($response);

    // Procesar la respuesta
    $responseData = json_decode($response, true);
    
    // Mostrar la respuesta
    
    if(isset($responseData["nombre"])){
        /*
        // Obtener los datos del cuerpo de la solicitud POST en formato JSON
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);

        // Verificar si se recibieron los parámetros necesarios
        if (isset($data['dni'], $data['name'], $data['lastname'])) {
            // Crear una instancia de la clase PacientData con los parámetros recibidos
            $pacientData = new PacientData($data['dni'], $data['name'], $data['lastname']);

            // Acceder a los datos de la instancia de la clase
            $dni = $pacientData->getDni();
            $name = $pacientData->getName();
            $lastname = $pacientData->getLastname();

            // Realizar cualquier acción adicional con los datos recibidos
            // ...

            print_r($pacientData);


            // Conexión a la base de datos (ajusta los valores según tu configuración)
            $host = 'localhost';
            $db = 'bookmedik';
            $user = 'root';
            $password = 'Lupi0201';
            $port = '3308';
        
            try {
                $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
        
                // Crear una instancia de la conexión PDO
                $pdo = new PDO($dsn, $user, $password, $options);
        
                // Llamar al stored procedure con los parámetros
                $stmt = $pdo->prepare("CALL nombre_del_stored_procedure(?, ?, ?)");
                $stmt->bindParam(1, $dni, PDO::PARAM_STR);
                $stmt->bindParam(2, $name, PDO::PARAM_STR);
                $stmt->bindParam(3, $lastname, PDO::PARAM_STR);
                $stmt->execute();
        
                // Realizar cualquier acción adicional después de ejecutar el stored procedure
                // ...
            } catch (PDOException $e) {
                // Manejo de errores en caso de que ocurra una excepción PDO
                echo "Error: " . $e->getMessage();
            }

            
        } else {
            // Enviar una respuesta de error si los parámetros requeridos no están presentes
            http_response_code(400);
            echo json_encode(array('message' => 'Parámetros incompletos'));
        }

        */
    }
}

// Cerrar la solicitud CURL
curl_close($ch);






?>
<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);

// Indicamos que queremos recibir el resultado y no mostrarlo
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Configuramos la ruta al archivo de certificados CA
curl_setopt($ch, CURLOPT_CAINFO, "D:/Proyectos/cacert.pem");

$result = curl_exec($ch);

// Verificamos si hubo un error en la ejecución de curl_exec
if ($result === false) {
    $error = curl_error($ch);
    curl_close($ch);
    die("cURL Error: $error");
}

curl_close($ch);

// Verificamos el contenido de $result
echo "Result: $result\n";

$data = json_decode($result, true);

// Verificamos si hubo un error en la decodificación JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON Error: " . json_last_error_msg());
}

var_dump($data);

?>

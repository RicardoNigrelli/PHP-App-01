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
// echo "Result: $result\n";

$data = json_decode($result, true);

// Verificamos si hubo un error en la decodificación JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON Error: " . json_last_error_msg());
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película del MCU</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <section>
        <h2>La próxima película de Marvel</h2>

        <img src="<?= $data["poster_url"];?>" width="200" alt="Poster de <?= $data["title"]; ?>" style="border-radius: 16px"/>
    </section>

    <hgroup>
        <h3><?= $data["title"] ;?> se estrena en <?= $data["days_until"] . " " . "días"; ?> </h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"] ;?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>

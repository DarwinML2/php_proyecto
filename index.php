<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesion de cURL; = cURL handle
$ch = curl_init(API_URL);

//indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*Ejecutar la peticion y guardamos el resultado*/
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>La proxima pelicula de Marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>
<main>
    <!-- <pre>
        <?= var_dump($data); ?>
    </pre> -->

    <body>
        <h1>La proxima pelicula de Marvel</h1>
        <section>
            <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>"
                style="border-radius: 16px;" />
        </section>
        <hgroup>
            <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias.</h2>
            <p>Fecha de estreno: <?= $data["release_date"] ?></p>
            <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
        </hgroup>
    </body>
</main>


</html>

<style>
    :root {
        color-scheme: light dark;

    }

    body {
        display: grid;
        place-content: center;
    }

    img {
        margin: 0 auto;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>
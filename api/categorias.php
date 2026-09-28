<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

// API Key de TMDB (reemplaza con tu clave real)
$api_key = 'TU_API_KEY_AQUI'; // Obtén una en https://www.themoviedb.org/settings/api

$url = "https://api.themoviedb.org/3/genre/movie/list?api_key=$api_key&language=es-ES";

$context = stream_context_create([
    "http" => [
        "method" => "GET",
        "header" => "Accept: application/json\r\n"
    ]
]);

$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    echo json_encode(["success" => false, "error" => "Error al obtener géneros"]);
    exit;
}

$data = json_decode($response, true);

if (isset($data['genres'])) {
    echo json_encode(["success" => true, "genres" => $data['genres']]);
} else {
    echo json_encode(["success" => false, "error" => "Respuesta inválida de la API"]);
}
?>
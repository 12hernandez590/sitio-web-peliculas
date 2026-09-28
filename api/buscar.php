<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
require "conexion.php";

$id = $_GET['id'] ?? null;
$query = $_GET['q'] ?? '';
$type = $_GET['type'] ?? ''; // movie, tv, or empty for both

if ($id !== null) {
    // Buscar por ID específico
    $sql = "SELECT * FROM peliculas WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $pelicula = mysqli_fetch_assoc($result);

    if ($pelicula) {
        echo json_encode([
            "success" => true,
            "peliculas" => [$pelicula]
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "error" => "Película no encontrada"
        ]);
    }
} else {
    // Búsqueda normal
    $sql = "SELECT id, titulo, tipo, imagen_url FROM peliculas WHERE 1=1";
    $params = [];
    $types = "";

    if (!empty($query)) {
        $sql .= " AND titulo LIKE ?";
        $params[] = "%$query%";
        $types .= "s";
    }

    if (!empty($type)) {
        $sql .= " AND tipo = ?";
        $params[] = $type === 'movie' ? 'Película' : 'Serie';
        $types .= "s";
    }

    $sql .= " ORDER BY titulo ASC LIMIT 50";

    $stmt = mysqli_prepare($conexion, $sql);
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $resultados = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode([
        "success" => true,
        "total" => count($resultados),
        "datos" => $resultados
    ]);
}

mysqli_close($conexion);

<?php
require_once "../config.php";

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conexion) {
    echo json_encode(["error" => "Error de conexión: " . mysqli_connect_error()]);
    exit;
}

// Establecer charset
mysqli_set_charset($conexion, "utf8");
?>

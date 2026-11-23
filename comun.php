<?php

header('Content-Type: application/json; charset=utf-8');

function responder($datos, $codigo = 200) {
    http_response_code($codigo);

    echo json_encode(
        $datos,
        JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );

    exit;
}

function entrada($metodos) {

    $metodo = $_SERVER['REQUEST_METHOD'];

    if (!in_array($metodo, $metodos)) {
        responder(['error' => 'Método no permitido'], 405);
    }

    if ($metodo === 'GET') {
        return [];
    }

    $contenido = file_get_contents('php://input');

    $datos = json_decode($contenido, true);

    // Verificar que sea JSON válido
    if (!is_array($datos)) {
        responder(['error' => 'JSON inválido'], 400);
    }

    return $datos;
}

function texto($valor, $limite) {

    if (!is_string($valor)) {
        return false;
    }

    $valor = trim($valor);

    if ($valor === '') {
        return false;
    }

    if (mb_strlen($valor, 'UTF-8') > $limite) {
        return false;
    }

    return true;
}

function db($sql = null) {

    $carpeta = __DIR__ . '/data';

    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    $ruta = $carpeta . '/tickets.sqlite';

    try {

        $conexion = new PDO('sqlite:' . $ruta);

        $conexion->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );

        if ($sql !== null) {
            $conexion->exec($sql);
        }

        return $conexion;

    } catch (PDOException $e) {

        responder([
            'error' => 'Error al conectar con la base de datos'
        ], 500);
    }
}
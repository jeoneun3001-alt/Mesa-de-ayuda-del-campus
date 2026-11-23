<?php

require __DIR__ . '/../comun.php';

$b = entrada(['GET', 'POST', 'PATCH']);

$db = db("CREATE TABLE IF NOT EXISTS tickets (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    estado TEXT NOT NULL DEFAULT 'abierta'
)");

$m = $_SERVER['REQUEST_METHOD'];

if ($m === 'GET') {

    responder(
        $db->query(
            'SELECT * FROM tickets ORDER BY id DESC'
        )->fetchAll(PDO::FETCH_ASSOC)
    );

}

if ($m === 'POST') {

    if (!texto($b['titulo'] ?? null, 150)) {

        responder([
            'error' => 'Título inválido'
        ], 422);

    }

    $s = $db->prepare(
        'INSERT INTO tickets(titulo) VALUES(?)'
    );

    $s->execute([trim($b['titulo'])]);

    responder([
        'id' => (int) $db->lastInsertId(),
        'estado' => 'abierta'
    ], 201);

}

$id = filter_var(
    $_GET['id'] ?? '',
    FILTER_VALIDATE_INT
);

if (!$id || $id < 1 || ($b['estado'] ?? '') !== 'cerrada') {

    responder([
        'error' => 'ID o transición inválidos'
    ], 422);

}

$s = $db->prepare(
    "UPDATE tickets
     SET estado = 'cerrada'
     WHERE id = ? AND estado = 'abierta'"
);

$s->execute([$id]);

if ($s->rowCount() === 0) {

    $q = $db->prepare(
        'SELECT id FROM tickets WHERE id = ?'
    );

    $q->execute([$id]);

    if (!$q->fetch()) {

        responder([
            'error' => 'Ticket no encontrado'
        ], 404);

    }

    responder([
        'error' => 'El ticket ya está cerrado'
    ], 409);

}

responder([
    'id' => $id,
    'estado' => 'cerrada'
]);
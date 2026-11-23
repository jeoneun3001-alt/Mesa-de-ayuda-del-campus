
# Contrato de API - Mesa de ayuda del campus

## 1. Identificación del servicio

- **Servicio:** Mesa de ayuda del campus.
- **Consumidor:** Portal web escolar.
- **Proveedor:** Servicio de soporte técnico.
- **Capacidad de negocio:** Registrar, consultar y cerrar solicitudes de soporte técnico.

## 2. Recursos

El recurso principal es `tickets`.

| Campo | Tipo | Límite | Ejemplo |
|---|---|---|---|
| id | Integer | Mayor que 0, autogenerado | 1 |
| titulo | String | De 1 a 150 caracteres | No funciona el proyector |
| estado | String | Abierta o cerrada | abierta |

## 3. Operaciones

### GET - Consultar solicitudes

- Método: GET
- Ruta: api.php
- Entrada: Sin cuerpo.
- Respuesta: HTTP 200.

Ejemplo de respuesta:

[
  {
    "id": 1,
    "titulo": "No funciona el proyector",
    "estado": "abierta"
  }
]

### POST - Crear solicitud

- Método: POST
- Ruta: api.php
- Entrada: JSON con el campo titulo.
- Título obligatorio, máximo 150 caracteres.
- Respuesta exitosa: HTTP 201.

Ejemplo de entrada:

{
  "titulo": "No funciona el proyector"
}

Respuesta:

{
  "id": 1,
  "estado": "abierta"
}

### PATCH - Cerrar solicitud

- Método: PATCH
- Ruta: api.php?id=1
- Entrada: JSON con estado igual a cerrada.
- Respuesta exitosa: HTTP 200.

Ejemplo de entrada:

{
  "estado": "cerrada"
}

Respuesta:

{
  "id": 1,
  "estado": "cerrada"
}

## 4. Códigos HTTP

| Código | Descripción |
|---|---|
| 200 | Operación exitosa |
| 201 | Solicitud creada |
| 400 | JSON inválido |
| 404 | Ticket inexistente |
| 405 | Método no permitido |
| 409 | El ticket ya está cerrado |
| 422 | Datos o transición inválidos |
| 500 | Error interno del servidor |

## 5. Reglas de negocio

1. Todo ticket nuevo comienza en estado abierta.
2. El título es obligatorio.
3. El título no puede superar 150 caracteres.
4. Solamente se permite cerrar tickets existentes.
5. No se permite cerrar nuevamente un ticket cerrado.
6. La validación de las transiciones se realiza en el proveedor.

## 6. Transiciones de estado

| Estado actual | Acción | Estado resultante |
|---|---|---|
| Abierta | Cerrar | Cerrada |
| Cerrada | Cerrar nuevamente | Rechazada |
| Abierta | Crear nuevamente | No aplica |
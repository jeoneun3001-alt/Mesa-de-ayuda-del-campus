
# Pruebas - Mesa de ayuda del campus

| Caso | Petición | Resultado esperado | Resultado obtenido | Aprobación |
|---|---|---|---|---|
| Crear solicitud válida | POST api.php | 201 y estado abierta | Pendiente | Pendiente |
| Consultar solicitudes | GET api.php | 200 y lista de tickets | Pendiente | Pendiente |
| Cerrar solicitud | PATCH api.php?id=1 | 200 y estado cerrada | Pendiente | Pendiente |
| Cerrar nuevamente | PATCH api.php?id=1 | 409 | Pendiente | Pendiente |
| Cerrar ID inexistente | PATCH api.php?id=999 | 404 | Pendiente | Pendiente |
| Título vacío | POST api.php | 422 | Pendiente | Pendiente |
| Estado inventado | PATCH api.php?id=1 | 422 | Pendiente | Pendiente |

## Observaciones

Las pruebas se realizarán utilizando la interfaz web y verificando las respuestas HTTP del proveedor.

Los resultados y las aprobaciones se actualizarán después de ejecutar cada petición.
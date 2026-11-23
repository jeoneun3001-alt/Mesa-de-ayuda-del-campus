
# Reporte del Proyecto 3
## Mesa de ayuda del campus

### 1. Objetivo

Desarrollar un servicio web que permita registrar, consultar y cerrar solicitudes de soporte técnico mediante una API REST.

### 2. Desarrollo

Se implementó un proveedor utilizando PHP y SQLite, encargado de administrar los tickets y validar las operaciones solicitadas por el consumidor web.

Se desarrollaron tres métodos HTTP:

- GET para consultar solicitudes.
- POST para registrar nuevas solicitudes.
- PATCH para cerrar solicitudes existentes.

### 3. Capacidad de negocio

La capacidad de negocio consiste en administrar las solicitudes de soporte técnico del campus, permitiendo llevar un control de los problemas reportados y su estado de atención.

### 4. Validaciones

El proveedor verifica que los títulos sean válidos, que los tickets existan y que las transiciones de estado sean permitidas.

También evita que una solicitud cerrada vuelva a cerrarse.

### 5. Evidencias

- Captura 1: Registro exitoso de una solicitud.
- Captura 2: Consulta de solicitudes.
- Captura 3: Cierre exitoso de una solicitud.
- Captura 4: Error al intentar cerrar nuevamente un ticket.

### 6. Conclusión

El desarrollo permitió comprender cómo funciona una API REST y cómo se establece la comunicación entre un consumidor y un proveedor.

También se comprobó la importancia de validar las reglas de negocio desde el proveedor, evitando que las operaciones incorrectas puedan ejecutarse aunque el consumidor modifique los datos enviados.
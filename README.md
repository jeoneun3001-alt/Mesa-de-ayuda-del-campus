
# Proyecto 3 - Mesa de ayuda del campus

## Descripción

Sistema de gestión de solicitudes de soporte técnico mediante una API REST desarrollada con PHP y SQLite.

## Tecnologías utilizadas

- PHP
- SQLite
- HTML
- CSS
- JavaScript
- API REST

## Requisitos

- XAMPP
- PHP con extensiones PDO y PDO_SQLite habilitadas.

## Instalación

1. Colocar la carpeta p3 dentro de C:\xampp\htdocs.
2. Abrir una terminal.
3. Acceder a la carpeta del proyecto:

   cd C:\xampp\htdocs\p3

4. Iniciar el servidor:

   C:\xampp\php\php.exe -S 127.0.0.1:8003 -t public

5. Abrir en el navegador:

   http://127.0.0.1:8003/index.html

## Puerto

8003

## Base de datos

SQLite: data/tickets.sqlite

La base de datos y la tabla tickets se generan automáticamente.

## Métodos disponibles

- GET: Consultar tickets.
- POST: Crear tickets.
- PATCH: Cerrar tickets.

## Reglas de negocio

Los tickets solamente pueden pasar de abierta a cerrada. No se permite repetir la transición.

## Autor

Nombre del estudiante: __________________
Grupo: __________________
Asignatura: __________________
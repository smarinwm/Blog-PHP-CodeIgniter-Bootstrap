# Blog-PHP-CodeIgniter-Bootstrap
Blog PHP con CodeIgniter 3, Bootstrap y MySQL

Proyecto de ejemplo de un blog desarrollado con PHP, CodeIgniter 3 y Bootstrap, con persistencia en MySQL y una zona de administración para gestionar autores y publicaciones.

El repositorio muestra una aplicación web clásica basada en el patrón MVC (Modelo–Vista–Controlador) de CodeIgniter, separando la lógica de acceso a datos, los controladores y las vistas.

Funcionalidades

Listado público de publicaciones.

Visualización de una publicación individual.

Filtrado de publicaciones por autor.

Alta, edición y eliminación de publicaciones desde la zona de administración.

Alta, edición y eliminación de autores.

Inicio de sesión para autores/administración.

Activación o desactivación de autores y publicaciones.

Persistencia de datos en MySQL.

Maquetación de las vistas con Bootstrap.

Tecnologías utilizadas

PHP

CodeIgniter 3.1.9

MySQL / mysqli

Bootstrap

HTML y CSS

JavaScript

Estructura principal

application/
├── controllers/     # Controladores del blog y administración
├── models/          # Acceso a datos y consultas
├── views/           # Vistas públicas y de administración
├── libraries/       # Librerías auxiliares, como el sistema de layouts
├── helpers/         # Helpers de la aplicación
└── webroot/         # CSS, imágenes y recursos de Bootstrap

BLOG.sql              # Estructura de la base de datos
index.php              # Punto de entrada de CodeIgniter
system/                # Framework CodeIgniter

Modelo de datos

El archivo BLOG.sql contiene la estructura necesaria para trabajar con:

authors: autores del blog.

posts: publicaciones.

categories: categorías.

tags: etiquetas.

posts_tags: relación entre publicaciones y etiquetas.

Puesta en marcha en local

1. Requisitos

Para ejecutar el proyecto se necesita un entorno compatible con PHP y MySQL. Puede utilizarse, por ejemplo, XAMPP, WAMP, MAMP o un servidor LAMP equivalente.

El proyecto incorpora CodeIgniter 3.1.9 y su composer.json establece compatibilidad a partir de PHP 5.3.7. Al tratarse de un proyecto antiguo, para reproducirlo fielmente puede ser necesario utilizar una versión de PHP compatible con CodeIgniter 3 y con el código existente.

2. Clonar el repositorio

git clone https://github.com/smarinwm/Blog-PHP-CodeIgniter-Bootstrap.git

Coloca el proyecto dentro del directorio servido por tu entorno web local.

3. Crear la base de datos

Importa el fichero:

BLOG.sql

El volcado utiliza una base de datos llamada BLOG.

4. Configurar la conexión

Revisa:

application/config/database.php

y adapta hostname, username, password y database a tu instalación de MySQL.

No utilices credenciales de desarrollo en un entorno público o de producción.

5. Configurar la URL

Si es necesario, ajusta la configuración de CodeIgniter en:

application/config/config.php

Especialmente los valores relacionados con base_url e index_page, según la configuración del servidor.

Rutas y flujo de la aplicación

La configuración de rutas se encuentra en application/config/routes.php. Entre otras operaciones, la aplicación permite:

acceder al listado principal del blog;

consultar una publicación por identificador;

consultar publicaciones de un autor;

entrar en la zona de administración;

crear, editar y eliminar publicaciones y autores.

Objetivo del proyecto

Este repositorio se conserva como proyecto práctico de desarrollo web con PHP y CodeIgniter, útil para revisar conceptos como:

arquitectura MVC;

conexión entre PHP y MySQL;

operaciones CRUD;

routing con CodeIgniter;

separación entre frontend y administración;

reutilización de vistas mediante layouts;

integración de Bootstrap en una aplicación PHP.

Nota de seguridad y mantenimiento

Este proyecto refleja prácticas y versiones de su momento de desarrollo y no debe desplegarse directamente en producción sin una revisión previa.

En particular, el código existente utiliza MD5 para el tratamiento de contraseñas. En una aplicación actual debería sustituirse por mecanismos modernos como password_hash() y password_verify(), además de revisar validación de entradas, gestión de sesiones, protección CSRF y versiones soportadas de las dependencias.

Autor

Silverio Marín — Docente TIC en Valencia, especializado en programación y desarrollo de software.

Más contenidos sobre programación y desarrollo de software:

silveriomarin.com/programacion

GitHub: @smarinwm

Licencia y componentes de terceros

El proyecto incluye CodeIgniter y recursos de Bootstrap / Start Bootstrap, que conservan sus respectivas licencias y avisos incluidos en el repositorio.

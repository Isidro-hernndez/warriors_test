# Proyecto Warriors

Está es la guia para poder poner en producción el proyecto warriors


# Requerimientos

El proyecto se realizo con laravel 6.0 y VueJS 2.x

 - Php 7.2
 - Apache
 - Mysql 6.^
 - Composer
 - Node JS 8.10 o superior
 - Npm 6.11 o superior

## Poner en produccion el proyecto

 1. Descargar este repositorio
 2. instalar las dependencias de laravel con composer
    $ composer install
3. Copiar el .env.example a .env y poner las crdencias y configuracion de la base de datos que se utilizara
4.  Realizar las migraciones:
	$ php artisan migrate
5. Realizar el seeding para la tabla warriors
	$ php artisan db:seed
6. Realizar la construccion de los archivos utilizados por VueJS con npm
	$ npm run build  o $ npm run watch
7. Generar la llave para el servidor de artisan
	$ php artisan key:generate
8. Encender el servidor:
	$ php artisan serve

## Detalles tecnicos

Este proyecto esta construido con 2 tecnologias Laravel, para el back end,  en su versión 6.0 y VueJS, para el front end, en su versión 2.3, a demas de utilizar las clases de bootstrap en su versión 4.1

En cuanto al back end se utliza la arquitectura de micro-servicios, utilizando en su mayoria rutas api e intentando seguir el modelo REST.

En cuanto al front end, se decidio seguir el paradigma de las SPA, por lo que todas las vistas son componentes de vue, se utiliza local storage para almacenar el token proveniente del back end y así poder realizar peticiones al back end.
 
# Prueba Técnica

Este repositorio contiene el código de la prueba técnica. A continuación, se describen los pasos para la configuración y ejecución del proyecto.

## Configuración

1. Clonar el repositorio:
   ```sh
   git clone https://github.com/tuusuario/tu-repositorio.git
   cd tu-repositorio
   ```

2. Configurar el archivo `.env`:
   - Configurar la conexión a la base de datos en el archivo `.env`.

   Template:

   ```
    APP_NAME="Biblioteca Virtual"
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=biblioteca
    DB_USERNAME=root
    DB_PASSWORD=.
    ```


3. Crear la base de datos en MySQL:
   ```sql
   CREATE DATABASE biblioteca;
   ```

4. Ejecutar las migraciones:
   ```sh
   php artisan migrate
   ```

## Instalación de dependencias

5. Instalar las dependencias de PHP con Composer:
   ```sh
   composer install
   ```

6. Instalar las dependencias de JavaScript con npm:
   ```sh
   npm install
   ```

## Ejecución del proyecto

7. Compilar los assets con Vite:
   ```sh
   npm run dev
   ```

8. Iniciar el servidor de desarrollo de Laravel:
   ```sh
   php artisan serve
   ```

El proyecto ahora debería estar corriendo en `http://127.0.0.1:8000/`.

---

Si tienes alguna pregunta o problema, no dudes en contactarme. 🚀
 

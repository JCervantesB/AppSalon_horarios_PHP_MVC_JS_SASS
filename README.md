# AppSalon_horarios_PHP_MVC_JS_SASS

## AppSalon_horarios
Es un fork de AppSalon_PHP_MVC_JS_SASS del curso Desarrollo Web Completo del profesor Juan De La Torre
Que incorpora una serie de modificaciones al proyecto original.

# Lista de cambios

- Se Crearon 2 Endpoints en /public/index.php
- /api/horas lista todas las horas registradas en la tabla "horas" y las publica via json
- /api/horasdisponibles realiza una consulta a la base de datos mediante una fecha establecida en el formulario y se traer las horas no disponibles segun la fecha dada.
- Se modifico controllers/APIController.php para añadir los endpoins horas y horasDisponibles
- Se creo una nueva tabla llamada "horas" donde se establecen todos las horas disponibles con diferencia de 30min
- Se creo un nuevo modelo llamado "Horas"
- Se modifico la tabla "citas" cambiando la columna "hora" por horaId y se relacino con la tabla "horas"
- Se modifico el modelo "Cita.php" cambiando "hora" por "horaId"
- Se modifico src/js/app.js para listar las horas en el formulario y filtrar la horas disponibles.
- Se modifico src/scss/componentes/_formulario.scss para dar estilos al select de horas
- Se añadieron nuevas variables de entorno en /includes/.env para el funcionamiento de la API y los Email

```
DB_HOST = localhost
DB_USER = root
DB_PASS = root
DB_DBNAME = appsalon_horarios

MAIL_HOST = 
MAIL_USER = 
MAIL_PASSWORD = 
MAIL_PORT = 
SERVER_HOST = https://localhost:3000
```

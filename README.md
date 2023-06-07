# README - Instalación y Uso del Proyecto API Laravel
Este README proporciona instrucciones paso a paso para instalar y configurar un proyecto API Laravel de manera local. Además, se incluye la información necesaria para establecer una conexión exitosa, incluyendo el EndPoint, las credenciales, el método y otros datos adicionales requeridos para realizar pruebas exitosas a través de Postman.

## Requisitos previos
Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:

* PHP (versión recomendada: >= 7.4)
* Composer (https://getcomposer.org/)
* Laravel (versión recomendada: 8.x)
* MySQL o cualquier otro sistema de gestión de bases de datos compatible

# Pasos de instalación
Sigue los siguientes pasos para configurar el proyecto API Laravel en tu entorno local:

1. Clona el repositorio del proyecto desde GitHub `https://github.com/cristhianmoreno06/choho_services.git` o extrae el archivo ZIP.

2. Abre una terminal y navega hasta el directorio raíz del proyecto clonado.

3. Ejecuta el siguiente comando para instalar las dependencias del proyecto: `composer install`.

4. Crea un archivo .env en el directorio raíz del proyecto. Puedes copiar el archivo .env.example y modificarlo según tus necesidades. Asegúrate de configurar correctamente la conexión a la base de datos.

5. Genera una clave de aplicación ejecutando el siguiente comando: `php artisan key:generate` 

6. Ejecuta las migraciones para crear las tablas de la base de datos: `php artisan migrate`

7. Ejecuta el comando `php artisan data:import` para poblar la base de datos con datos de prueba

8. Inicia el servidor de desarrollo ejecutando el siguiente comando: `php artisan serve`

9. El proyecto API Laravel ahora debería estar disponible en http://localhost:8000 o en otro puerto especificado en la salida del comando anterior.

## Información de conexión
Utiliza la siguiente información para establecer una conexión exitosa y realizar pruebas en Postman:

* EndPoint: http://localhost:8000/api (o el URL correspondiente según el puerto utilizado)
* Método HTTP: GET, POST, PUT, DELETE (dependiendo de la funcionalidad requerida)


## Credenciales:

Crear una nueva solicitud a la URL con el EndPoint proporcionado anteriormente.

### ejemplo
    http://localhost:8000/api/login 
    usuario: Admin 
    contraseña 123456

Seguido a eso nos retornará un token de tipo **Bearer** el cual debe ir en la pestaña Authorization del postman como tipo Bearer Token.

### Ejemplo de respuesta de la solicitud anterior
    {
    "name": "Admin",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMDE1MzEwMDRiY2RmZTY4ZjU2MTg3MjUxNzMwMTkyMzA5ZTZkNmQ4MzRiMDZlMDBmZWY0YTE0NjQyODNkZWMyZGY0Njg4MDY0OGZiZWEyMzQiLCJpYXQiOjE2ODYxMTAxNjIuMjk1NzM5LCJuYmYiOjE2ODYxMTAxNjIuMjk1NzQyLCJleHAiOjE3MTc3MzI1NjIuMjkyMTQ1LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.D4Wxp9JaF4jOCt-qRt2UadqosYWB85-kFsmaWGFgANkjwubNZzhZ-rV8vTJ6UyMpz2jHPeQA-cSiKfSxRNXEPt5dfOIxAyTPzNarL-kXc1zPLZipWHdUWx31exKsRnr_U-QwcbK4xKfjO4_wqacIfc85QrcwYOlGN0E9Du4gBJUUiTONtxjArXaf55gniSNg-c8hSzgncTAJl2jrQN5TpFQmdFW-1suXDa5IqVadO3o8fiiXKq6cu4xvbq3A9jmSCLAL7bgMkxsDHSXzBkb9bOFNlJ5xXO5yUPkpSapZXch6IXCqKtS2wRHwcGzTObL4WvRY7yOcc8FJedG50lldCdrEE0A-gqY1CTOMOXbMFOPAMGeoXpb-Qm0T4plInLyfiuWSG5EPmigdnf78Uwil2wV2WS_ulphNp9ivfNuo4U8rhWUlKK1mt-_jKVySIY3NW4jRi_8ta166uQJYkF9VLHJYuVRAW7jofDhXCOTjn6uSrBtUrFknFg9aIqcY_iueiSm4DcsSh0pjG_LHCI8sf3UftgERUqilwON9-73SMTIsOPB91fSzTwFiK7pkjrhNMjeh4g9D0y8c4t35vnA-abkBxMhezoe_BM_F0_t5JHIrsBXz4CX8vp4XohLULTCFRIPv6wXECgZN-JZ2wef0_bDUfvc1UjuuN52ibYulmXY",
    "id": 2,
    "active": "1"
    }

<img src="https://res.cloudinary.com/alex-tech-blog/image/upload/t_Quality_80/v1563048747/Blog/2019.07/2.postman-copy-token_hihj68.jpg">

## Pruebas con Postman
Para realizar pruebas exitosas utilizando Postman, sigue estos pasos:

1. Abre Postman o descárgalo e instálalo desde https://www.postman.com/downloads/.

2. Crea una nueva solicitud en Postman.

3. Configura la URL de la solicitud utilizando el EndPoint `http://localhost:8000/api/orders/list`.

4. Selecciona el método HTTP **_`GET`_** para la solicitud.

5. Si es necesario, establece los parámetros de la solicitud, como el cuerpo de la solicitud en formato JSON o los parámetros de consulta.

6. Si la API requiere autenticación, agrega los encabezados necesarios o parámetros según lo especificado anteriormente en el apartado **`Credenciales`**.

7. Haz clic en "Send" para enviar la solicitud y obtener la respuesta de la API.

8. Analiza la respuesta obtenida y verifica si coincide con el resultado esperado.

### Ejemplo de respuesta de la solicitud
    {
        "orders": [
            {
                "id": 1,
                "fecha_pedido": "2008-08-12T00:00:00.000000Z",
                "prefijo": "odio",
                "num_pedido": 123894,
                "nit": 885577559,
                "razon_social": "Gerlach LLC",
                "vendedor": "Miss Ottilie Rice II",
                "id_ciudad": 335,
                "created_at": "2023-06-01T06:07:35.000000Z",
                "updated_at": "2023-06-06T00:58:19.000000Z",
                "deleted_at": null
            },
            {
                "id": 2,
                "fecha_pedido": "1979-07-16T00:00:00.000000Z",
                "prefijo": "esse",
                "num_pedido": 238048727,
                "nit": 122140367,
                "razon_social": "Strosin, Dickens and Doyle",
                "vendedor": "Hipolito Wehner",
                "id_ciudad": 762,
                "created_at": "2023-06-01T06:07:35.000000Z",
                "updated_at": "2023-06-01T06:07:35.000000Z",
                "deleted_at": null
            },
            {
                "id": 3,
                "fecha_pedido": "1996-08-13T00:00:00.000000Z",
                "prefijo": "nostrum",
                "num_pedido": 30,
                "nit": 192103834,
                "razon_social": "Wuckert, Hirthe and Stroman",
                "vendedor": "Mr. Kole Steuber DVM",
                "id_ciudad": 64,
                "created_at": "2023-06-01T06:07:36.000000Z",
                "updated_at": "2023-06-01T06:07:36.000000Z",
                "deleted_at": null
            },
            {
                "id": 4,
                "fecha_pedido": "1973-11-27T00:00:00.000000Z",
                "prefijo": "sunt",
                "num_pedido": 420998,
                "nit": 329940375,
                "razon_social": "Haag-Keeling",
                "vendedor": "Orval Gulgowski",
                "id_ciudad": 577,
                "created_at": "2023-06-01T06:07:36.000000Z",
                "updated_at": "2023-06-01T06:07:36.000000Z",
                "deleted_at": null
            },
            {
                "id": 5,
                "fecha_pedido": "2002-06-15T00:00:00.000000Z",
                "prefijo": "quidem",
                "num_pedido": 204148956,
                "nit": 965560204,
                "razon_social": "Powlowski PLC",
                "vendedor": "Willard Fahey",
                "id_ciudad": 215,
                "created_at": "2023-06-01T06:07:36.000000Z",
                "updated_at": "2023-06-01T06:07:36.000000Z",
                "deleted_at": null
            },
            {
                "id": 6,
                "fecha_pedido": "1973-06-30T00:00:00.000000Z",
                "prefijo": "Dolore architecto qu",
                "num_pedido": 23789456,
                "nit": 36123456789,
                "razon_social": "Perspiciatis quis v",
                "vendedor": "Non laboris incidunt",
                "id_ciudad": 559,
                "created_at": "2023-06-06T23:10:33.000000Z",
                "updated_at": "2023-06-06T23:11:23.000000Z",
                "deleted_at": null
            }
        ]
    }

### ¡Listo! Ahora estás preparado para utilizar el proyecto API Laravel localmente y realizar pruebas exitosas utilizando Postman.

#### Espero que esta guía te haya sido útil. Si tienes alguna otra pregunta, ¡no dudes en preguntar!

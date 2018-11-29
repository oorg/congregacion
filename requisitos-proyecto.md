# Requisitos a cumplir

Se espera un sistema web utilizando Laravel como framework de desarrollo.

## Base de datos

[x] * Uso de migraciones para crear y modificar tablas.
[x] * Implementar al menos un Seeder.
[x] * Agregar datos de prueba en al menos una tabla mediante Factory.

## Autenticación, autorización y seguridad

[x] * Realizar autenticación de usuarios mediante correo y contraseña.
[x] * Validar toda información que se reciba a partir de una formulario.
[x] * Implementar al menos dos middlewares: auth() y uno personalizado.

## GUI

[x] * Crear vistas utilizando blade
[x] * Crear al menos un layout e implementarlo en vistas
  [x] * Mostrar nombre, nombre de usuario o correo del usuario.
  [x] * Mostrar opción para ingresar (login) o salir (logout) del sistema según corresponda.
  [x] * Mostrar menú de navegación.
[x] * Implementar Bootstrap
[x] * **Importante:** Mostrar mensajes al usuario cuando:
  [x] * Exista un error de validación al completar un formulario.
  [x] * Se haya completado una tarea, sea con éxito, con errores o si require información adicional. (Ej. Al crear, eliminar o editar).
  [x] * Existan listados vacíos.
[x] * Cuando exista un error al validar un formulario o se esté editando información de un recurso existente, el formulario deberá mostrar la información capturada o a editar.
[x] * Los enlaces o inclusión de recursos locales (css, js, etc) deberán generarse utilizando los   helpers adecuados. (Ej. action, route, asset).
[x] * Utilizar paginación en un listado.

## Eloquent (Modelos, consultas)

[x] * Tener al menos una relación de cada uno de los siguientes tipos y sus inversas:
[x] * "uno a muchos" (1:n)
  [x] * "muchos a muchos" (n:n)
  [x] * polimórfica o polimórfica muchos a muchos.
[x] * Utilizar "Eager Loading" al consultar múltiples registros con n relaciones. with
* Utilizar al menos en una consulta "Constraining Eager Load". load
[x] * Declarar "fillable".
[x] * Almacenar información adicional en al menos una tabla pivote.
[x] * Implementar "time stamps" en al menos un modelo.
* Implementar "Soft Delete" en al menos un modelo.
[x] * Crear al menos un "accessor" y un "muttator" en al menos un modelo.
[x] * Agregar al menos un método tipo Scope en un modelo.

## Controladores

[x] * Crear al menos un controlador tipo resource.
* **Extra:** Crear un controlador tipo resource anidado.
[x] * Crear al menos un controlador con al menos un método personalizado.

## API

* Crear y consultar al menos un controlador con al menos un método que regrese un json.
    agregar actividades a los grupos

## Archivos

Se deberá crear e implementar un cargador de archivos que permita:

[x] * Cargar un archivo.
[x] * Listar los archivos cargados.
[x] * Eliminar un archivo.
[x] * Cargar múltiples archivos.

## Envío de correo electrónico

[x] * Enviar al menos una notificación vía correo electrónico.

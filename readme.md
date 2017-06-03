##**Descripcion**:

Para el desarrollo, se utiliza la estructura del Framework Laravel v: 5.3 en la cual, se realizaron 2 vistas, una perteneciente al formulario de recepción de datos, y otra para los resultados, utilizando el sistema de rutas para establecer como pantalla inicial la vista de formularios y 1 controlador, el mismo contiene una clase con diferentes métodos que se describen a continuación:

Ubicado en: app/Http/Controllers/matrizController Clase MatrizController:

- validar():  Realiza la operación general, recoge información por método post del formulario y redirecciona con los resultados.

- inicializar(): Inicializa en 0 cada uno de los campos de una matriz.

- ejecutar(): Valida el formato general de los scripts suministrados, determina el tipo de script y lo envía a otro método para su solución.

- actualiza(): Valida y ejecuta los querys del script suministrado de tipo UPDATE.

- sumar(): Valida y ejecuta los querys del script suministrado de tipo query.

Los resultados se guardan en un array que es recibido por el método validar y enviado en la redirección hacia la vista "resultados".
 
##**Pruebas**:
Se puede utilizar como prueba el mismo ejemplo que se presenta en la página:

	Tareas:    2
    Dimension: 4  Accion: 5
    Query:    UPDATE 2 2 2 4
              QUERY 1 1 1 3 3 3
              UPDATE 1 1 1 23
              QUERY 2 2 2 4 4 4
              QUERY 1 1 1 3 3 3
    Dimension  2  Accion 4
    query     UPDATE 2 2 2 1
              QUERY 1 1 1 1 1 1
              QUERY 1 1 1 2 2 2
              QUERY 2 2 2 2 2 2

Y el resultado: 4 4 27 para la primera tarea | 0 1 1 para la segunda tarea

##**Instalación**:

Descargar o clonar el repositorio.
1. Ingresar a la carpeta creada via cónsola en este caso CubeSumma y ejecutar composer install para descargar dependencias.
1. Ejecutar via cónsola el comando "php artisan serve" que ejecutará el servidor de desarrollo.
1. Ingresar al navegador http://localhost:8000/ que lo ubicará en la vista de inicio.

##**Refactoring**:
En la raíz del proyecto estan las respuestas al code Refactoring Challenge entre los archivos
- coderefactoring.php.
- DetallesCodeRefactoring.php.

# Challenge Back-End Laworatory

Este proyecto es un challenge de back-end para Laworatory. El objetivo es desarrollar un programa PHP que se conecte a una BDD (si no existe, el programa la crea y configura automáticamente) y muestre los resultados deseados en una tabla HTML.

## Requisitos
- Xampp con Apache y MySQL (se ha desarrollado y comprobado con Xampp v. 8.2.12)

## Instalación

1. Clona o descarga el repositorio (se ha comprobado previamente que sea público):
    ```bash
    git clone https://github.com/DavidGrandeJimenez/challengeBackendLaworatory.git
    ```
2. Accede a la carpeta htdocs de los directorios de Xampp (por defecto, suele ubicarse en sistemas Windws en C:\xampp\htdocs) en su equipo 

3. Pega o descarga en dicha ruta la carpeta general del proyecto challengeBackendLaworatory (puedes cambiarle el nombre a dicha carpeta a cualquiera de su agrado).
    

## Uso

1. Abre el programa Xampp y habilita el servidor Apache y MySQL

2. Accede al navegador de su preferencia e introduce en la barra de búsqueda la palabra ***localhost/*** seguido del ***nombre de la carpeta creada dentro de htdocs*** anteriormente (puede seguir siendo challengeBackendLaworatory o el nombre que haya decidido anteriormente). Por ejemplo: *localhost/challengeBackendLaworatory* ó *localhost/davidGrande*

3. Comprueba y disfruta del proyecto :)

## Aclaraciones
- Para una opción más realista y adecuada al contexto, se ha diseñado también una breve página de logIn en la que el usuario deberá introducir un ID de empresa válido (actualmente, son los IDs del 1 al 3, inclusive). De este modo, se presentarán tan solo los registros correspondientes al ID de la empresa que haya iniciado sesión.

- Podrás encontrar el documento de toma de requisitos en su carpeta correspondiente (***toma requisitos***). Están disponibles tanto en formato PDF como en MarkDown.

- No es necesario crear o insertar los registros necesarios antes de ejecutar el proyecto. Simplemente ya lo realiza éste por nosotros previniendo errores de inserción.

- Para simular la seguridad o "encapsulación" de las claves de acceso de la BDD SQL por defecto de Xampp, se ha decidido aislar dichas claves en un archivo externo sin cifrar (***server_credentials.txt***). En un proyecto real, dichas claves se encontrarían en otra sección cifrada del servidor y/o dicho fichero estaría cifrado.

- Las funciones (**functions.php**) han sido diseñadas como "generales" o "neutras", es decir, que están pensadas para permitir la escalabilidad por su utilización en diferentes contextos. Por ejemplo, se puede implementar con cualquier tabla o campo de SQL.

- La mayoría de errores referentes a la BDD han sido controlados mostrando su código de error correspondiente. Esto supone de gran utilidad para los desarrolladores.

- Los registros constan de 3 empresas de la tabla *empresa* y 20 registros de ventas de la tabla *venta* correspondiente a cada una de las empresas. Siendo así un total de 63 registros.

- Se han implementado los estilos CSS "puro" mediante los archivos de la carpeta **css**.

- Se ha implementado también la funcionalidad de generación y descarga del informe en formato PDF. Para ello, se ha utilizado la librería **domPdf**. No es necesario instalar adicionalmente ningún recurso para su utilización, pues dicha librería ya se encuentra descargada en el proyecto en la carpeta ***dompdf***.
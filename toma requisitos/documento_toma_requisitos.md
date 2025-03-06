# **Documento de Toma de Requisitos**  
## **Proyecto: Informe de Ventas - Último Trimestre 2024 (Challenge Backend)**  

## **1. Introducción**  
Ha surgido la necesidad de desarrollar una nueva funcionalidad en una de nuestras herramientas web para los clientes: presentar en la web los detalles de ventas de un periodo de tiempo concreto almacenbados en una base de datos. A continuación, se explican los datos y planificación del producto.

---

## **2. Objetivos del Proyecto**  
- Extraer los datos de ventas que ha tenido la empresa en el último trimestre de 2024 almacenados en la base de datos SQL.
- Procesar y validar la recepción de los datos con PHP.  
- Crear una plantilla web bien estructurada con HTML y CSS.  
- Organizar dichos datos en la plantilla web de forma clara y adecuada a las características de los datos.  
- Asegurar el control de posibles errores y el mantenimiento de la herramienta.  

###  **Alcance:**
El producto está diseñado para todos los usuarios de nuestras herramientas web cuya información de ventas se encuentren en las bases de datos. Para ello, el manejo y accesibilidad deberían ser lo suficientemente simples para que se puedan adaptar a esta nueva funcionalidad en el menor tiempo y con la mayor facilidad posible. 


---

## **3. Requisitos Funcionales**  

### **3.1 Extracción y manejo de datos de la empresa correspondinte**  

- Identificar correctamente mediante su ID único a la empresa de la cual mostrar sus datos.

- Conectar a la base de datos con los métodos de seguridad necesarios para evitar vulnerabilidades.

- Obtener los registros de ventas correspondientes al período **1 de octubre - 31 de diciembre de 2024**.  

- Controlar errores de conexión y del manejo de datos.

- Definir las funciones y métodos de forma general y escalable para asegurar su correcto funcionamiento con el menor código posible y reutilizable para las diferentes empresas y sus datos.

<br/>
<br/>
<br/>
<br/>

### **3.2 Interfaz Web**  
- Mostrar los datos en una tabla HTML bien organizada que se adecúe al número requerido de registros.  

- Los datos deben presentarse de la manera más clara, accesible e intuitiva posible.

- Si ocurre un fallo con la base de datos, reflejar ese fallo en la interfaz y en la tabla y evitar problemas en la ejecución del proyecto.

- Opcional: Incluir opciones de ordenamiento por columnas.  

- Opcional: Implementar un diseño responsivo para que el informe sea accesible desde cualquier dispositivo.


### **3.3 Opcional: Generación y descarga del reporte**  

- Implementar opción de **imprimir el informe**.  

- Permitir exportar los datos en formato **PDF**. 

### **3.4 Seguridad y Accesibilidad**  
- Implementar una breve autenticación para acceder al informe, sobre todo es necesario obtener el ID de la empresa.
  
- Proteger contra inyección SQL y otras vulnerabilidades comunes.  

---

## **4. Requisitos No Funcionales**  
| **Característica**           | **Detalle**                                      |
|-----------------------------|--------------------------------------------------|
| **Lenguaje de programación** | PHP 8.0 o superior (en desarrollo: v.8.2.12)    |
| **Base de datos (BDD)**      | MySQL (en desarrollo: MariaDB 10.4.32 con Xammp 8.2.12) |
| **Tecnología de conexión a BDD** | MySQLi                                   |
| **Front-end**               | HTML5 y CSS3                                   |
| **Servidor**                | Apache (v.2.4.58) a través de Xammp (v.8.2.12)            |
| **Entorno de Desarrollo (IDE)**                | Visual Studio Code           |
| **Compatibilidad**          | Chrome, Firefox, Edge, Safari|
| **Tiempo de respuesta**     | Máximo de 2 segundos en condiciones óptimas de conexión a internet por parte del usuario   |
| **Alojamiento del repositorio**     | Repositorio público en Github. Con posibilidad de mantenimiento e implementación de nuevas funciones con Git y buenas prácticas.    |

<br>
<br>
<br>

*Documento desarrollado utilizando el lenguaje de marcas Markdown en Visual Studio Code*

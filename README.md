Hola muy buen dia


Le habla Daniel Fernando Sosa Suárez, Tecnólogo en análisis y desarrollo de sistemas, como fue requerido en la prueba técnica de PHP se realizó el proyecto del inventario en Laravel framework de PHP (ya que se dio el paso para poder usarlos). Para la descarga y ejecución del proyecto, debe asegurarse de que su máquina local tenga PHP y Composer instalados y contar con phpMyAdmin para el manejo de bases de datos

como primer paso seria acceder al repositorio y descargar el proyecto en el siguiente URL https://github.com/danielsosa117/cafeteria_konecta

Como segundo paso seria importar la base de datos en el motor de bases de datos de su preferencia es necesario de que la base de datos cuenten con el nombre "cafeteria_konecta", es válido aclarar que el motor de bases de datos que se usó en la generación del proyecto fue MySQL con phpMyAdmin. Si algunos de los datos como el HOST o La puerta de enlace tienen datos diferentes es necesario modificarlos en el archivo .env en el apartado de bases de datos

Como siguiente paso, si cuenta con visual estudio code, el siguiente paso seria abrir el proyecto con IDEE, abrir la terminal y escribir el comando "php artisan serve" o si cuentas con otro IDEE debes acceder al cmd o al terminal del IDEE e ingresar a la carpeta del proyecto y ejecutar el comando anterior.

Al ejecutar el comando solo resta ir al siguiente link http://127.0.0.1:8000

como solicitaron se realizó las sentencias que son:
Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
SELECT * FROM productos WHERE stock = ( SELECT MAX(stock) FROM productos);

Realizar una consulta que permita conocer cuál es el producto más vendido. 
SELECT p.* , COUNT(producto_id) as ventas FROM ventas v INNER JOIN productos p ON p.id = v.producto_id GROUP BY producto_id ORDER BY ventas DESC LIMIT 1;

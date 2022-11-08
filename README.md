Hola muy buen dia

Le habla Daniel Fernando Sosa Suarez, Tecnologo en analisis y desarrollo de sistemas, como fue requerido en la 
prueba tecnica de php se realizo el proyecto del inventario en Laravel framework de php (ya que se dio el paso para poder
usarlos). Para la descarga y ejecucion del proyecto, debe asegurarse de que su máquina local tenga PHP y Composer 
instalados y contar con phpMyAdmin para el manejo de bases de datos


como primer paso seria acceder al repositorio y descargar el proyecto en el siguiente url
https://github.com/danielsosa117/cafeteria_konecta

como segundo paso seria importar la base de datos en el motor de bases de datos de su preferencia es necesario de que 
la base de datos cuenten con el nombre "cafeteria_konecta", es valido aclarar que el motor de bases de datos quie se 
uso en la generacion del proyecto fue mySQL con phpMyAdmin. si algunos de los datos como el HOST o La puerta de enlace
tienen datos diferentes es necesario modificarlos en el archivo .env en el apartado de bases de datos

como siguiente paso, si cuenta con visual estudio code, el siguiente paso seria abrir el proyecto con IDEE, abrir la terminal y escribir
el comando "php artisan serve" o si cuentas con otro IDEE debes acceder al cmd o al terminal del IDEE e ingresar a 
la carpeta del proyecto y ejecutar el comando anterior.

al ejecutar el comando solo resta ir a el siguiente link http://127.0.0.1:8000

como solicitaron se realizo las sentencias que son

Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
SELECT * FROM productos WHERE stock = ( SELECT MAX(stock) FROM productos);

Realizar una consulta que permita conocer cuál es el producto más vendido.
SELECT p.* , COUNT(producto_id) as ventas FROM ventas v INNER JOIN productos p ON p.id = v.producto_id GROUP BY producto_id ORDER BY ventas DESC LIMIT 1;

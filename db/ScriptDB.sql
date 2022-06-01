	Create Table usuarios(
		id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR(50) UNIQUE NOT NULL,
		password VARCHAR(15) NOT NULL,
		nombre VARCHAR(160) NOT NULL,
		apellido VARCHAR(160) NOT NULL,
		cargo VARCHAR(10) NOT NULL,
		sede VARCHAR(20) NOT NULL,
		estado INT(1) NOT NULL);

	Create Table producto(
		id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nombre_producto VARCHAR(160) NOT NULL,
		cantidad INT NOT NULL,
		precio INT NOT NULL,
		sede VARCHAR(20) NOT NULL);	

	CREATE TABLE ventas(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	producto VARCHAR(255),
	cantidad VARCHAR(255),
	fecha VARCHAR (255) NOT NULL,
	total DECIMAL(7,2),
	cod_venta VARCHAR(255),
	sede VARCHAR (20) NOT NULL);

CREATE TABLE productos_vendidos(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_producto VARCHAR NOT NULL,
	cantidad INT NOT NULL,
	id_venta VARCHAR NOT NULL,
	sede VARCHAR(20) NOT NULL,
	FOREIGN KEY(id_producto) REFERENCES producto(id),
	FOREIGN KEY(id_venta) REFERENCES ventas(id))
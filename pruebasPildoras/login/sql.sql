Crear tabla
CREATE TABLE usuarios (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, usuarios VARCHAR(20) NOT NULL, password VARCHAR(20) NOT NULL)

Meter un usuario
INSERT INTO usuarios (ID, usuarios, password) VALUES (1, "Juan", "1234")
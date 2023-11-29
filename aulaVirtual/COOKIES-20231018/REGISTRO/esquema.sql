DROP TABLE IF EXISTS reg_accesos;
DROP TABLE IF EXISTS reg_usuarios;
CREATE TABLE reg_usuarios
(
codigo int NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario varchar(100)
);
CREATE TABLE reg_accesos
(
codigo int, 
acceso date,
FOREIGN KEY (codigo) REFERENCES reg_usuarios( codigo )
);


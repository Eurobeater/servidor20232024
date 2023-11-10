
DROP TABLE IF EXISTS reg_personas;
CREATE TABLE reg_personas
(
codigo int NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre varchar(100),
apellidos varchar(100)
);

insert into reg_personas ( nombre, apellidos ) values ( "nombre", "apellidos");

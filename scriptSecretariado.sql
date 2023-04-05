-- DROP DATABASE secretariado;
CREATE DATABASE IF NOT EXISTS secretariado;
USE secretariado;

CREATE TABLE IF NOT EXISTS empresas(
	id INT auto_increment,
    nombre VARCHAR(256),
    personaContacto VARCHAR(256),
    mail VARCHAR(256),
    tlfn int,
    direccion VARCHAR(256),
    
    PRIMARY KEY(id)
    );
    
 CREATE TABLE IF NOT EXISTS tipoPracticas(
	id INT auto_increment,   
    nombre VARCHAR(256),
    horario VARCHAR(256),
    
    PRIMARY KEY(id)
    );

CREATE TABLE IF NOT EXISTS alumnos(
	id INT auto_increment,
    nombre VARCHAR(256),
    apellidos VARCHAR(256),
    dni VARCHAR(256) UNIQUE,
    fk_empresa INT, --
    fk_tipo INT,
    
    PRIMARY KEY(id),
    FOREIGN KEY(fk_empresa) REFERENCES empresas(id),
    FOREIGN KEY(fk_tipo) REFERENCES tipoPracticas(id)
    );
   -- 3 empresas 
INSERT INTO empresas(nombre,personaContacto,mail,tlfn,direccion) 
	VALUES ('GOOGLE','Larry Page','google@gmail.com',654257451,'sylcon valley');
    
INSERT INTO empresas(nombre,personaContacto,mail,tlfn,direccion) 
	VALUES ('Amazon','Jeff Bezos','amazon@gmail.com',614256232,'sylcon vidas');
INSERT INTO empresas(nombre,personaContacto,mail,tlfn,direccion) 
	VALUES ('Accenture','Arthur Andersen','accenture@gmail.com',985132044,'Jimena Fernández De La Vega (parq. Científico), 140 Bajo, 33203, Gijón (Asturias)');
    
    -- los horarios posibles
INSERT INTO tipoPracticas(nombre,horario)
	VALUES ('mañana','9-15');
INSERT INTO tipoPracticas(nombre,horario)
	VALUES ('tarde','15-21');
INSERT INTO tipoPracticas(nombre,horario)
	VALUES ('completa','9-18');
    
    -- alumnos
INSERT INTO alumnos(nombre,apellidos,dni,fk_empresa,fk_tipo)
	VALUES ('Alan','Brito','51288754R',1,1);
INSERT INTO alumnos(nombre,apellidos,dni,fk_empresa,fk_tipo)
	VALUES ('Clara','Mente','54136854D',2,1);
INSERT INTO alumnos(nombre,apellidos,dni,fk_empresa,fk_tipo)
	VALUES ('Elsa','Pato','15746521A',3,2);
    
SELECT a.nombre,a.apellidos,e.nombre
FROM alumnos AS a
LEFT JOIN empresas AS e
on e.id=a.fk_empresa;
    
    
    
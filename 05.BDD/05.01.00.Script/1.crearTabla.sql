CREATE DATABASE reserva;
USE reserva;
-- Crear tabla alumnos
CREATE TABLE alumnos(
    idAlumnos int NOT NULL IDENTITY, /*MySQL auto_increment*/
    nombre varchar(50) NOT NULL,
	apellidos varchar(50) NOT NULL,
	email varchar(150) UNIQUE NOT NULL,
    CONSTRAINT pk_idAlumnos PRIMARY KEY (idAlumnos)
);
-- Crear Base de datos
CREATE DATABASE minijuegos;
USE minijuegos;

-- Crear tabla ambitos
CREATE TABLE ambitos(
    idAmbito TINYINT unsigned AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    CONSTRAINT pk_ambitos PRIMARY KEY (idAmbito)
);

-- Crear tabla minijuegos
CREATE TABLE minijuegos(
    idMinijuego TINYINT unsigned AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    idAmbito TINYINT unsigned, 
    CONSTRAINT pk_minijuegos PRIMARY KEY (idMinijuego),
    CONSTRAINT fk_idAmbito FOREIGN KEY (idAmbito) REFERENCES ambitos(idAmbito)
);

-- INSERT TABLA AMBITOS

INSERT INTO ambitos(nombre) VALUES
('Equidad de género y coeducación'),
('Participación democrática'),
('Desarrollo humano y sostenible'), 
('Interculturalidad e inclusión'),
('Justicia Social');

-- INSERT TABLA MINIJUEGOS

INSERT INTO minijuegos(nombre,idAmbito) VALUES
('Equiquiz', 1), 
('Viaje entre culturas', 4), 
('Shooper Mario', 3),
('Decisiones de vida', 5),
('Democratic City', 2);
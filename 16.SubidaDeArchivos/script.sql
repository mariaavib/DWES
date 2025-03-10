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

ALTER TABLE minijuegos ADD COLUMN imagen VARCHAR(255);
ALTER TABLE minijuegos MODIFY idAmbito TINYINT UNSIGNED NULL;


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
('Democratic City', 2),
('Igualdad en el trabajo', 1),
('Elige tu futuro', 2),
('Economía verde', 3),
('Desarrollo sin fronteras', 3),
('Viaje cultural', 4),
('Lenguas y tradiciones', 4),
('Derechos para todos', 5),
('Lucha por la justicia', 5);

-- Consulta para extraer ek ambito seleccionado y el minijuego
SELECT ambitos.nombre AS NombreAmbito, minijuegos.nombre AS NombreMinijuego
FROM ambitos
INNER JOIN minijuegos
ON ambitos.idAmbito = minijuegos.idAmbito;
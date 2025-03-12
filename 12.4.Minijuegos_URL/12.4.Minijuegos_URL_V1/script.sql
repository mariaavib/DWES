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
    url VARCHAR(255) NOT NULL,
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

INSERT INTO minijuegos(nombre,idAmbito,url) VALUES
('Equiquiz', 1,'https://21.2daw.esvirgua.com/Proyecto-Equiquiz/app/user/view/js/menu/mainMenu.php'), 
('Viaje entre culturas', 4,'https://25.2daw.esvirgua.com/01Juego/index.php'), 
('Shooper Mario', 3, 'https://23.2daw.esvirgua.com/'),
('Decisiones de vida', 5,'https://24.2daw.esvirgua.com/game/'),
('Democratic City', 2,'https://26.2daw.esvirgua.com/');

-- Consulta para extraer ek ambito seleccionado y el minijuego
SELECT ambitos.nombre AS NombreAmbito, minijuegos.nombre AS NombreMinijuego
FROM ambitos
INNER JOIN minijuegos
ON ambitos.idAmbito = minijuegos.idAmbito;
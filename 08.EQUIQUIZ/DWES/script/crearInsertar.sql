-- Crear base de datos
CREATE DATABASE equiquiz;

-- Usar la base de datos
USE equiquiz;

-- Crear tabla Escenarios
CREATE TABLE Escenarios (
    idEscenarios TINYINT UNSIGNED AUTO_INCREMENT,
    ambito VARCHAR(25) NOT NULL,
    rutaImagen VARCHAR(250) NOT NULL,
    CONSTRAINT pk_escenarios PRIMARY KEY (idEscenarios)
);

-- Insertar datos en la tabla Escenarios
INSERT INTO Escenarios (ambito, rutaImagen) VALUES
('Educación', 'assets/EscenarioEducacion.png'),
('Laboral', 'assets/EscenarioLaboral.png'),
('Salud', 'assets/EscenarioSalud.jpeg');
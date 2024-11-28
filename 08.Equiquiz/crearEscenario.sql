-- Crear base de datos
CREATE DATABASE equiquiz;

-- Usar la base de datos
USE equiquiz;

-- Crear tabla Escenarios
CREATE TABLE Escenarios (
    idEscenario TINYINT UNSIGNED AUTO_INCREMENT,
    ambito VARCHAR(25) NOT NULL,
    rutaMapa longblob NOT NULL,
    CONSTRAINT pk_escenarios PRIMARY KEY (idEscenario)
);

-- Insert en Escenarios
INSERT INTO Escenarios (ambito, rutaMapa) VALUES
('Salud', './assets/escenarios/EscenarioSalud.jpeg'),
('Educación', './assets/escenarios/EscenarioEducacion.jpeg'),
('Laboral', './assets/escenarios/EscenarioEducacion.jpeg');

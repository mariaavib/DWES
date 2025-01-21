CREATE TABLE Pruebas (
    idPruebas TINYINT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    CONSTRAINT pk_pruebas PRIMARY KEY (idPruebas) 

CREATE TABLE Alumnos (
    idAlumno TINYINT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    idClase CHAR(4) NOT NULL,
    CONSTRAINT pk_alumnos PRIMARY KEY (idAlumno) 
);

    CREATE TABLE Inscripciones (
        idInscripciones TINYINT AUTO_INCREMENT,
        idAlumno TINYINT,
        idPruebas TINYINT,
        CONSTRAINT pk_inscripciones PRIMARY KEY (idInscripciones), 
        CONSTRAINT fk_alumnos FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno), 
        CONSTRAINT fk_pruebas FOREIGN KEY (idPruebas) REFERENCES Pruebas(idPruebas) 
    );



INSERT INTO Alumnos (idAlumno, nombre, idClase) VALUES
(1, 'Arias Carroza, Javier', '2DAW'),
(2, 'Caldito Gómez, Pablo', '2DAW'),
(3, 'Candeias De Figueiredo, Leví Josué', '2DAW'),
(4, 'Del Valle Del Pino, José Luis', '2DAW'),
(5, 'Fariña Morena, David', '2DAW'),
(6, 'Gómez Delgado, Álvaro', '2DAW'),
(7, 'González Bernáldez, Fernando José', '2DAW'),
(8, 'Guiberteau Franco, Ángel', '2DAW'),
(9, 'Hernández Sánchez, Paloma', '2DAW'),
(10, 'López Vega, Míriam', '2DAW'),
(11, 'Martín Llera, Ceus', '2DAW'),
(12, 'Moruno Herrojo, Celia', '2DAW'),
(13, 'Paz Bernal, Ismael', '2DAW'),
(14, 'Peña Domínguez, Mauricio', '2DAW'),
(15, 'Rodríguez Botello, Carlos', '2DAW'),
(16, 'Sánchez Díaz, Alberto', '2DAW'),
(17, 'Sánchez Gallardo, Hugo', '2DAW'),
(18, 'Silva Vega, David', '2DAW'),
(19, 'Telo Núñez, Joaquín Francisco', '2DAW'),
(20, 'Vidigal Barroso, María', '2DAW'),
(21, 'Adriana', '1DAW'),
(22, 'Alberto', '2SMR');

INSERT INTO Pruebas (nombre) values 
("Salto de altura"),
("Salto de longuitud"),
("800m");

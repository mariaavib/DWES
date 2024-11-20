-- Crear base de datos
CREATE DATABASE appLibros;

-- Usar la base de datos
USE appLibros;

-- Crear tabla Administradores
CREATE TABLE Administradores (
    idAdmin TINYINT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    correo VARCHAR(50) NOT NULL UNIQUE,
    contrasenia VARCHAR(255) NOT NULL,
    CONSTRAINT pk_administradores PRIMARY KEY (idAdmin)
);

-- Crear tabla Tutores
CREATE TABLE Tutores (
    idTutor TINYINT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    CONSTRAINT pk_tutores PRIMARY KEY (idTutor)
);

-- Crear tabla Editoriales
CREATE TABLE Editoriales (
    idEditorial SMALLINT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    telefono CHAR(9) NOT NULL,
    CONSTRAINT pk_editoriales PRIMARY KEY (idEditorial)
);

-- Crear tabla Cursos
CREATE TABLE Cursos (
    idCurso CHAR(6) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    CONSTRAINT pk_cursos PRIMARY KEY (idCurso)
);

-- Crear tabla Clases
CREATE TABLE Clases (
    idCurso CHAR(6) NOT NULL,
    letraClase CHAR(1) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    CONSTRAINT pk_clases PRIMARY KEY (idCurso, letraClase),
    CONSTRAINT fk_clases_cursos FOREIGN KEY (idCurso) REFERENCES Cursos(idCurso)
);

-- Crear tabla Asignaturas
CREATE TABLE Asignaturas (
    idAsignatura TINYINT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    CONSTRAINT pk_asignaturas PRIMARY KEY (idAsignatura)
);

-- Crear tabla clases_asignaturas
CREATE TABLE clases_asignaturas (
    idCurso CHAR(6) NOT NULL,
    letraClase CHAR(1) NOT NULL,
    idAsignatura TINYINT UNSIGNED NOT NULL,
    CONSTRAINT pk_clases_asignaturas PRIMARY KEY (idCurso, letraClase, idAsignatura),
    CONSTRAINT fk_clases_asignaturas_clases FOREIGN KEY (idCurso, letraClase) REFERENCES Clases(idCurso, letraClase) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_clases_asignaturas_asignaturas FOREIGN KEY (idAsignatura) REFERENCES Asignaturas(idAsignatura)
);

-- Crear tabla Libros
CREATE TABLE Libros (
    ISBN char (13),
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    idEditorial SMALLINT UNSIGNED NOT NULL,
    idAsignatura TINYINT UNSIGNED NOT NULL,
    CONSTRAINT pk_libros PRIMARY KEY (ISBN),
    CONSTRAINT fk_libros_editoriales FOREIGN KEY (idEditorial) REFERENCES Editoriales(idEditorial),
    CONSTRAINT fk_libros_asignaturas FOREIGN KEY (idAsignatura) REFERENCES Asignaturas(idAsignatura)
);
-- Crear tabla Reservas
CREATE TABLE Reservas (
    idReserva INT UNSIGNED AUTO_INCREMENT,
    dni CHAR(9) NOT NULL,
    nombreTutor VARCHAR(100) NOT NULL,
    correo VARCHAR(50) NOT NULL, 
    nombreAlumno VARCHAR(100) NOT NULL,
    documento VARCHAR(255) NOT NULL,
    apta BOOLEAN NOT NULL,
    fecha_reserva DATE NOT NULL,
    coste_total DECIMAL(10, 2) NOT NULL, 
    fecha_registro DATE NOT NULL,
    idCurso CHAR(6) NOT NULL,
    letraClase CHAR(1) NOT NULL,
    CONSTRAINT pk_reservas PRIMARY KEY (idReserva),
    CONSTRAINT fk_reservas_clases FOREIGN KEY (idCurso, letraClase) REFERENCES Clases(idCurso, letraClase) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Crear tabla Reservas_Libros
CREATE TABLE Reservas_Libros (
    ISBN char (13) NOT NULL,
    idReserva INT UNSIGNED NOT NULL,
    entregado BOOLEAN NOT NULL,
    CONSTRAINT pk_reservas_libros PRIMARY KEY (ISBN, idReserva),
    CONSTRAINT fk_reservas_libros_libros FOREIGN KEY (ISBN) REFERENCES Libros(ISBN),
    CONSTRAINT fk_reservas_libros_reservas FOREIGN KEY (idReserva) REFERENCES Reservas(idReserva)
);

-- INSERT en Cursos
INSERT INTO Cursos (idCurso, nombre) VALUES
('1Inf', '1º Infantil'),
('2Inf', '2º Infantil'),
('1BachC', '1º Bachillerato Ciencias'),
('2BachC', '2º Bachillerato Ciencias'),
('1BachL', '1º Bachillerato Letras'),
('2BachL', '2º Bachillerato Letras'),
('1DAW', '1º Desarrollo de Aplicaciones Web'),
('2DAW', '2º Desarrollo de Aplicaciones Web'),
('1SMR', '1º Sistemas Microinformáticos y Redes'),
('2SMR', '2º Sistemas Microinformáticos y Redes'),
('1EVA', '1º Electromecánica de Vehiculos Automoviles'),
('2EVA', '2º Electromecánica de Vehiculos Automoviles'),
('1GA', '1º Gestión Administrativa'),
('2GA', '2º Gestión Administrativa');

-- INSERT en Clases
INSERT INTO Clases (idCurso, letraClase, nombre)
VALUES
('1Inf', 'A', '1º Infantil Clase A'),
('1Inf', 'B', '1º Infantil Clase B'),
('2Inf', 'A', '2º Infantil Clase A'),
('2Inf', 'B', '2º Infantil Clase B'),
('1BachC', 'A', '1º Bachillerato Ciencias'),
('2BachC', 'A', '2º Bachillerato Ciencias'),
('1BachL', 'A', '1º Bachillerato Letras'),
('2BachL', 'A', '2º Bachillerato Letras'),
('1DAW', 'A', '1º Desarrollo de Aplicaciones Web'),
('2DAW', 'A', '2º Desarrollo de Aplicaciones Web'),
('1SMR', 'A', '1º Sistemas Microinformáticos y Redes'),
('2SMR', 'A', '2º Sistemas Microinformáticos y Redes'),
('1EVA', 'A', '1º Electromecánica de Vehiculos Automoviles'),
('2EVA', 'A', '2º Electromecánica de Vehiculos Automoviles'),
('1GA', 'A', '1º Gestión Administrativa'),
('2GA', 'A', '2º Gestión Administrativa');

-- INSERT en Tutores
INSERT INTO Tutores (nombre, correo)
VALUES
('Francisco Garcia', 'paco.garcia@example.com'),
('Isabel Munoz', 'imunoz@example.com'),
('Alberto Dominguez', 'aldominguez@example.com'),
('Ernesto Gonzalez', 'egonzalez@example.com');

-- INSERT en Editoriales
INSERT INTO Editoriales (nombre, correo, telefono)
VALUES
('Editorial SM', 'contacto@editorialsm.com', '912345678'),
('Santillana', 'info@santillana.com', '912876543'),
('Anaya', 'ventas@anaya.com', '913456789'),
('McGraw-Hill', 'support@mcgrawhill.com', '914567890');

-- INSERT en Asignaturas
INSERT INTO Asignaturas (nombre)
VALUES
('Matemáticas'),
('Lengua'),
('Biología'),
('Historia'),
('Programación'),
('Redes Informáticas'),
('Física'),
('Química');

-- INSERT en Libros
INSERT INTO Libros (ISBN, nombre, precio, idEditorial, idAsignatura)
VALUES
('9781234567897', 'Matemáticas 1º Infantil', 15.99, 1, 1),
('9781234567898', 'Lengua 1º Infantil', 14.50, 2, 2),
('9781234567899', 'Biología 1º Bachillerato', 25.75, 3, 3),
('9781234567800', 'Historia 1º Bachillerato Letras', 22.00, 4, 4),
('9781234567801', 'Programación Básica DAW', 35.50, 1, 5),
('9781234567802', 'Redes Informáticas SMR', 29.99, 2, 6);

-- INSERT en Libros_Cursos
INSERT INTO Libros_Cursos (ISBN, idCurso)
VALUES
('9781234567897', '1Inf'), -- Matemáticas 1º Infantil para 1 Infantil
('9781234567898', '1Inf'), -- Lengua 1º Infantil para 1 Infantil
('9781234567899', '1BachC'), -- Biología para 1 Bachillerato Ciencias
('9781234567800', '1BachL'), -- Historia para 1 Bachillerato Letras
('9781234567801', '1DAW'), -- Programación Básica para 1 DAW
('9781234567802', '1SMR'); -- Redes Informáticas para 1 SMR

-- INSERT en Reservas
INSERT INTO Reservas (dni, nombreTutor, correo, nombreAlumno, documento, apta, fecha_reserva, coste_total, fecha_registro, idCurso, letraClase)
VALUES
('12345678A', 'Isabel Munoz', 'imunoz@example.com', 'Luis Pérez', 'documento1.pdf', TRUE, '2024-01-15', 45.00, '2023-11-01', '1Inf', 'A'),
('23456789B', 'Francisco Garcia', 'paco.garcia@example.com', 'Sofía López', 'documento2.pdf', FALSE, '2024-01-16', 35.50, '2023-11-02','1BachC', 'A'),
('34567890C', 'Alberto Dominguez', 'aldominguez@example.com', 'Diego García', 'documento3.pdf', TRUE, '2024-01-17', 29.99, '2023-11-03', '1DAW', 'A'),
('45678901D', 'Ernesto Gonzalez', 'egonzalez@example.com', 'Lucía Fernández', 'documento4.pdf', TRUE, '2024-01-18', 60.00, '2023-11-04', '1SMR', 'A');

-- INSERT en clases_asignaturas
INSERT INTO clases_asignaturas (idCurso, letraClase, idAsignatura)
VALUES
-- 1 Infantil
('1Inf', 'A', 1), -- Matemáticas
('1Inf', 'A', 2), -- Lengua
-- 1 Bachillerato Ciencias
('1BachC', 'A', 3), -- Biología
('1BachC', 'A', 7), -- Física
('1BachC', 'A', 8), -- Química
-- 1 Bachillerato Letras
('1BachL', 'A', 4), -- Historia
('1BachL', 'A', 2), -- Lengua
-- 1 DAW
('1DAW', 'A', 5), -- Programación
('1DAW', 'A', 6), -- Redes Informáticas
-- 1 SMR
('1SMR', 'A', 6); -- Redes Informáticas

-- INSERT en Reservas_Libros
INSERT INTO Reservas_Libros (ISBN, idReserva, entregado)
VALUES
('9781234567897', 1, TRUE),
('9781234567898', 1, TRUE),
('9781234567899', 2, FALSE),
('9781234567800', 3, TRUE),
('9781234567801', 4, TRUE),
('9781234567802', 4, TRUE);
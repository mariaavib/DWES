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
    CONSTRAINT fk_libros_editoriales FOREIGN KEY (idEditorial) REFERENCES Editoriales(idEditorial) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_libros_asignaturas FOREIGN KEY (idAsignatura) REFERENCES Asignaturas(idAsignatura) ON DELETE CASCADE ON UPDATE CASCADE
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
    CONSTRAINT fk_reservas_libros_libros FOREIGN KEY (ISBN) REFERENCES Libros(ISBN) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_reservas_libros_reservas FOREIGN KEY (idReserva) REFERENCES Reservas(idReserva) 
);
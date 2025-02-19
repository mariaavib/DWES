CREATE TABLE usuario (
    idUsuario INT AUTO_INCREMENT,
    correo VARCHAR(100) NOT NULL UNIQUE,
    passw VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    CONSTRAINT pk_idUsuario PRIMARY KEY (idUsuario)
);

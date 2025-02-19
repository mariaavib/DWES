CREATE TABLE usuario (
    idUsuario INT AUTO_INCREMENT,
    correo VARCHAR(50) NOT NULL UNIQUE,
    passw VARCHAR(255) NOT NULL,
    CONSTRAINT pk_idUsuario PRIMARY KEY (idUsuario)
);
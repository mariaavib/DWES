CREATE TABLE usuario (
    idUsuario INT AUTO_INCREMENT,
    correo VARCHAR(50) NOT NULL,
    passw VARCHAR(30) NOT NULL,
    CONSTRAINT pk_idUsuario PRIMARY KEY (idUsuario)
);
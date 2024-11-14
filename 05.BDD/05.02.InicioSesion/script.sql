CREATE TABLE usuario(
	idUsuario int NOT NULL auto_increment, 
	usuario varchar(150) NOT NULL UNIQUE,
	contrasenia VARCHAR(100)NOT NULL,
   CONSTRAINT pk_idUsuario PRIMARY KEY (idUsuario)
);
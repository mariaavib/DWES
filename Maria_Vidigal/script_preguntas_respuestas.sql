CREATE DATABASE IF NOT EXISTS preguntas DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE preguntas;

CREATE TABLE preguntas (
    idPregunta smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    numPregunta smallint unsigned NOT NULL UNIQUE,
	textoPregunta varchar(255) NOT NULL,
	imagenRespuesta varchar(100) NULL,
	respuestCorrecta char(1) NULL
);

CREATE TABLE respuestas (
    idPregunta smallint unsigned NOT NULL,
	letraRespuesta char(1) NOT NULL,
	textoRespuesta varchar(100) NOT NULL,
    CONSTRAINT pk_respuestas PRIMARY KEY(idPregunta,letraRespuesta),
	CONSTRAINT fk_resp_preg FOREIGN KEY(idPregunta) REFERENCES preguntas(idPregunta) 
	ON DELETE CASCADE ON UPDATE CASCADE
);



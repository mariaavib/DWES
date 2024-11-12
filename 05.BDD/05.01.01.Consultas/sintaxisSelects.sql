/*SELECT | TODOS LOS DATOS DE UNA TABLA*/
SELECT *
FROM alumnos;

/*SELECT | X DATOS DE UNA TABLA*/
SELECT nombre
FROM alumnos;

/*WHERE | AND --> Busca valores que coincidan con todas las condiciones*/
SELECT nombre,apellidos
FROM alumnos
WHERE nombre='Adrian' AND email='adrian@gmail.com';

/*WHERE | OR --> Busca valores que coincidan con cualquiera de las condiciones*/
SELECT nombre,apellidos
FROM alumnos
WHERE nombre='Adrian' OR email='adrianvid@gmail.com';

/*WHERE | NOT --> Busca valores que no coincidan con una condición*/
SELECT nombre
FROM alumnos
WHERE NOT nombre='Adrian';

/*WHERE | IN --> Busca valores que coincidan con una lista de valores*/
SELECT nombre
FROM alumnos
WHERE nombre IN ('Adrian','Adriana','Celia');

/*WHERE | BETWEEN --> Busca valores dentro de un rango*/
SELECT idAlumnos,nombre
FROM alumnos
WHERE idAlumnos BETWEEN 1 AND 5;

/*NULL VALUES --> Busca campos con valores nulos*/
SELECT column_name(s)  
FROM table_name 
WHERE campo IS NULL;

/*LIKE --> Busca un patrón en una columna*/
SELECT apellidos
FROM alumnos
WHERE apellidos LIKE 'Vid%';

SELECT nombre
FROM alumnos
WHERE nombre LIKE '_d%';

/*ORDER BY --> Ordena los resultados en orden ascendente o descendente*/
SELECT apellidos,nombre
FROM alumnos
ORDER BY apellidos DESC;

/*UNION --> Devuelve los registros sin duplicados ambas tablas*/
SELECT nombre
FROM alumnos
UNION 
SELECT nombre
FROM alumnos;

/*UNION ALL --> Devuelve todos los registros de ambas tablas*/
SELECT nombre
FROM alumnos
UNION ALL
SELECT nombre
FROM alumnos;

/*DISTINCT --> Devuelve valores no repetidos*/
SELECT DISTINCT nombre
FROM alumnos;

/*COUNT --> Devuelve el número de filas que coinciden con una condición*/
SELECT COUNT(nombre)
FROM alumnos;

/*SUM --> Devuelve la suma de una columna*/
SELECT SUM(idAlumnos)
FROM alumnos;

/*MIN --> Devuelve el valor más bajo de una columna*/
SELECT MIN(idAlumnos)
FROM alumnos
WHERE idAlumnos BETWEEN 5 AND 10;

/*MAX --> Devuelve el valor más alto de una columna*/
SELECT MAX(idAlumnos),nombre
FROM alumnos
WHERE idAlumnos BETWEEN 5 AND 8;

/*MEDIA --> Devuelve la media de una columna*/
SELECT AVG(idAlumnos)
FROM alumnos
WHERE idAlumnos BETWEEN 5 AND 8;

/*INNER JOIN --> Devuelve los registros que tienen valores coincidentes en ambas tablas*/
SELECT nombre,asignatura,nombreCurso
FROM profesores
INNER JOIN curso_profesor
	ON profesores.idProfesores = curso_profesor.idProfesores
INNER JOIN cursos
	ON curso_profesor.idCurso = cursos.idCurso;

/* Enunciados para practicar con INNER JOIN */

/* 1. Obtener el nombre y apellidos de los alumnos junto con el nombre del curso en el que están inscritos. */
SELECT nombre,apellidos,nombreCurso
FROM alumnos
INNER JOIN cursos
	ON alumnos.idAlumnos = cursos.idAlumnos;

/* 2. Listar los nombres de los cursos y los nombres de los profesores que los imparten. */
SELECT nombreCurso,nombre
FROM cursos
INNER JOIN curso_profesor
	ON curso_profesor.idCurso = cursos.idCurso
INNER JOIN profesores
	ON profesores.idProfesores = curso_profesor.idProfesores;
/* 3. Mostrar el nombre del curso, la fecha de inicio y la fecha de fin junto con el nombre y apellidos del alumno que lo está tomando. */
SELECT nombreCurso,fechaInicio,fechaFin,nombre,apellidos
FROM cursos
INNER JOIN alumnos
	ON cursos.idAlumnos = alumnos.idAlumnos;
/* 4. Obtener el nombre y apellidos de los profesores junto con el nombre de la asignatura que imparten y el nombre del curso asociado.*/
SELECT nombre,apellidos,asignatura,nombreCurso
FROM profesores
INNER JOIN curso_profesor
	ON profesores.idProfesores = curso_profesor.idProfesores
INNER JOIN cursos
	ON curso_profesor.idCurso= cursos.idCurso;
/*5. Listar todos los cursos junto con los nombres de los alumnos y los profesores asociados a cada curso. */
SELECT nombreCurso,alumnos.nombre,profesores.nombre
FROM cursos
INNER JOIN alumnos
	ON cursos.idAlumnos = alumnos.idAlumnos
INNER JOIN curso_profesor
	ON cursos.idCurso = curso_profesor.idCurso
INNER JOIN profesores
	ON curso_profesor.idProfesores = profesores.idProfesores;


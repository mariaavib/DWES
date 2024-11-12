-- Mostrar el idAlumnos y nombre de los alumnos entre id 2 y 6
SELECT idAlumnos,nombre
FROM alumnos
WHERE idAlumnos<6 AND idAlumnos>2;

-- Ordenar la tabla por nombre ASC
SELECT nombre
FROM alumnos
ORDER BY nombre ASC;
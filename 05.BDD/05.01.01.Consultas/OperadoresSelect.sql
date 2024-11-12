 
----------- SQL And
	SELECT column1, column2, ...
	FROM table_name
	WHERE condition1 AND condition2 AND condition3 ...;

----------- SQL Or
	SELECT column1, column2, ...
	FROM table_name
	WHERE condition1 OR condition2 OR condition3 ...;

----------- SQL Not
	SELECT column1, column2, ...
	FROM table_name
	WHERE NOT condition;
	
----------- SQL In
	-- le permite especificar múltiples valores en una WHEREcláusula.
	SELECT column_name(s)
	FROM table_name
	WHERE column_name IN (value1, value2, ...);
	
----------- SQL Between
	-- selecciona valores dentro de un rango determinado. Los valores pueden ser números, texto o fechas.
	SELECT column_name(s)
	FROM table_name
	WHERE column_name BETWEEN value1 AND value2;
	
----------- SQL Null Values
	SELECT column_names
	FROM table_name
	WHERE column_name IS NOT NULL;
	
----------- SQL Like
	-- El LIKEoperador se utiliza en una WHEREcláusula para buscar un patrón específico en una columna.Hay dos comodines que se utilizan a menudo junto con el LIKEoperador: El signo de porcentaje %representa cero, uno o varios caracteres. El signo de subrayado _representa un solo carácter.
	SELECT column1, column2, ...
	FROM table_name
	WHERE columnN LIKE pattern;
	SELECT *
	FROM nombre
	COLUMN LIKE=('GARCIA')-- Cambiar
----------- SQL ORDER BY
	-- se utiliza para ordenar el conjunto de resultados en orden ascendente o descendente
	SELECT column1, column2, ...
	FROM table_name
	ORDER BY column1, column2, ... ASC|DESC;
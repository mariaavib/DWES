/*Numero de clientes*/
SELECT COUNT(account_id)
FROM account; 

/*INNER JOIN*/
SELECT customer.cust_id
FROM customer
INNER JOIN business
	ON customer.cust_id = business.cust_id
INNER JOIN individual
	ON customer.cust_id = individual.cust_id; 

/*** No salen filas ya que las primeras filas que salen del primer inner join no coinciden con ninguna fila del segundo inner join ***/

/*Sacar un listado de todos los clientes, con su nombre, y si es una empresa el nombre del representante*/
SELECT customer.cust_id, officer.fname AS nombreRepresentante,individual.fname AS nombreIndiv
FROM customer
LEFT JOIN 	business 
	ON customer.cust_id = business.cust_id
LEFT JOIN officer
	ON business.cust_id = officer.cust_id
LEFT JOIN individual
	ON customer.cust_id = individual.cust_id;

SELECT   customer.cust_id, officer.fname AS nombreRepre, individual.fname AS nombreIndiv
FROM business
INNER JOIN officer
	ON business.cust_id = officer.cust_id
RIGHT JOIN customer 
	ON business.cust_id = customer.cust_id
LEFT JOIN individual
	ON customer.cust_id = individual.cust_id;

/* Saber cuantos empleados hay*/

SELECT COUNT(emp_id) AS numEmpleados
FROM employee;

/* Saber el nombre de los empleados que son jefes y su id */

SELECT DISTINCT employee.emp_id, employee.fname
FROM employee
INNER JOIN employee AS jefes
	ON employee.emp_id = jefes.superior_emp_id;

/* Nombre de los empleados y nombre de los jefes */
SELECT employee.emp_id AS idTrabajador, employee.fname AS nombreTrabajador, jefes.emp_id AS idJefe, jefes.fname AS nombreJefe
FROM employee
LEFT JOIN employee AS jefes
    ON employee.superior_emp_id = jefes.emp_id;

/* Quitar los empleados que no tengan asignados jefes */
SELECT employee.emp_id AS idTrabajador, employee.fname AS nombreTrabajador, jefes.emp_id AS idJefe, jefes.fname AS nombreJefe
FROM employee
INNER JOIN employee AS jefes
    ON employee.superior_emp_id = jefes.emp_id;
	/*Solo se cumple la condicion, en cambio con en el left mostraba todos los empleados+los que tenian jefe*/

/*--Cuanto clientes tengo--*/
SELECT COUNT(*) AS clientes
FROM customer;
/*Clientes individuales*/
SELECT COUNT(*) AS clientesIndividuales
FROM individual; 
/*Clientes empresas*/
SELECT COUNT(*) AS empresas
FROM business; 

/*--Cuantas cuentas tengo--*/
SELECT count(*) AS totalCuentas
FROM account; 

/*--Suma del balance--*/
SELECT SUM(avail_balance) AS sumaBalance
FROM account; 

/*--Media del balance--*/
SELECT AVG(avail_balance) AS mediaBalance
FROM account; 

/*--Cuenta con mayor balance--*/
SELECT MAX(avail_balance) AS cuentaConBalanceMay
FROM account; 

/*--Cuantos epleados hay en cada departamento, hay que sacar el nombre del departamos y num de empleados por departamento--*/
SELECT department.`name` AS nombreDepart ,COUNT(*) AS numTrabajadores
FROM employee
INNER JOIN department
	ON employee.dept_id = department.dept_id
GROUP BY employee.dept_id;

/*--Empleados contratados en el 2002--*/
SELECT department.`name` AS nombreDepart ,COUNT(*) AS numTrabajadores
FROM employee
INNER JOIN department
	ON employee.dept_id = department.dept_id
WHERE YEAR(start_date) = 2002
GROUP BY employee.dept_id
ORDER BY numTrabajadores;

/*--Departamentos con años y numeros de trabajadores--*/
SELECT department.`name` AS nombreDepart, YEAR(start_date),COUNT(*) AS numTrabajadores
FROM employee
INNER JOIN department
	ON employee.dept_id = department.dept_id
GROUP BY department.dept_id, YEAR(start_date)
ORDER BY nombreDepart;

/*--Todos los departamentos que tienen mas de 2 empleados--*/
SELECT department.`name` AS nombreDepart ,COUNT(*) AS numTrabajadores
FROM employee
INNER JOIN department
	ON employee.dept_id = department.dept_id
WHERE YEAR(start_date) = 2002
GROUP BY employee.dept_id
HAVING COUNT(*)>2;

/*--Numeros de jefes que hay--*/
SELECT COUNT(DISTINCT jefes.emp_id) AS numJefes
FROM employee
INNER JOIN employee AS jefes
    ON employee.superior_emp_id = jefes.emp_id;

/*--Numeros de trabajadores sin jefe--*/
SELECT COUNT(employee.emp_id) AS numTrabajSinJefe
FROM employee
LEFT JOIN employee AS jefes
    ON employee.superior_emp_id = jefes.emp_id
WHERE jefes.emp_id IS NULL;

/*--Listado de clientes que han nacido antes del 1970--*/

/*--Usando la base de datos del banco, muestra todos los datos de los clientes con las personas autorizadas de la empresa (officer) .--*/
SELECT officer.fname,business.`name`,customer.cust_id,individual.fname
FROM officer
INNER JOIN business
ON officer.cust_id = business.cust_id
RIGHT JOIN customer
ON customer.cust_id = business.cust_id
LEFT JOIN individual
ON customer.cust_id = individual.cust_id;

/**** BDD Reconocimiento*/
/*Diferencias*/
SELECT COUNT(idAlumRecibe)
FROM reconocimiento

/*****Devuelve 9 ya que solo cuenta las filas que no son null*/

SELECT COUNT(*)
FROM reconocimiento 

/*****Devuelve 10 ya que cuenta todas las filas*/

/****** CORRECIÓN PRUEBAS *******/
/**** BDD Banco*/
CREATE UNIQUE INDEX ix_recibe
DROP INDEX ix_recibe 

/**** BDD Reconocimiento*/
SELECT alumEnvia.nombre AS nombreAlumEnvia, alumRecibe.nombre AS nombreAlumRecibe, reconocimiento.descripcion 
FROM reconocimiento 
INNER JOIN alumno alumEnvia ON reconocimiento.idAlumEnvia = alumEnvia.idAlumno
LEFT JOIN alumno alumRecibe ON reconocimiento.idAlumRecibe = alumRecibe.idAlumno;

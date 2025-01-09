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
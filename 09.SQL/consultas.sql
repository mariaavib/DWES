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
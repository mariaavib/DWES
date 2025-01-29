/*Usuario con todos los privilegios*/
CREATE USER 'user_pc'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'user_pc'@'localhost' WITH GRANT OPTION;

/*Usuario con permisos de consultar, insertar, ,modificar y eliminar*/
CREATE USER 'user_restrin'@'localhost' IDENTIFIED BY '123456';
GRANT SELECT, INSERT, UPDATE, DELETE ON libros.* TO 'user_restrin'@'localhost';
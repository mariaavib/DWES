-- INSERT en Cursos
INSERT INTO Cursos (idCurso, nombre) VALUES
('1Inf', '1º Infantil'),
('2Inf', '2º Infantil'),
('1BachC', '1º Bachillerato Ciencias'),
('2BachC', '2º Bachillerato Ciencias'),
('1BachL', '1º Bachillerato Letras'),
('2BachL', '2º Bachillerato Letras'),
('1DAW', '1º Desarrollo de Aplicaciones Web'),
('2DAW', '2º Desarrollo de Aplicaciones Weos y Redes'),
('2SMR', '2º Sistemas Microinformáb'),
('1SMR', '1º Sistemas Microinformáticticos y Redes'),
('1EVA', '1º Electromecánica de Vehiculos Automoviles'),
('2EVA', '2º Electromecánica de Vehiculos Automoviles'),
('1GA', '1º Gestión Administrativa'),
('2GA', '2º Gestión Administrativa');

-- INSERT en Clases
INSERT INTO Clases (idCurso, letraClase, nombre)
VALUES
('1Inf', 'A', '1º Infantil Clase A'),
('1Inf', 'B', '1º Infantil Clase B'),
('2Inf', 'A', '2º Infantil Clase A'),
('2Inf', 'B', '2º Infantil Clase B'),
('1BachC', 'A', '1º Bachillerato Ciencias'),
('2BachC', 'A', '2º Bachillerato Ciencias'),
('1BachL', 'A', '1º Bachillerato Letras'),
('2BachL', 'A', '2º Bachillerato Letras'),
('1DAW', 'A', '1º Desarrollo de Aplicaciones Web'),
('2DAW', 'A', '2º Desarrollo de Aplicaciones Web'),
('1SMR', 'A', '1º Sistemas Microinformáticos y Redes'),
('2SMR', 'A', '2º Sistemas Microinformáticos y Redes'),
('1EVA', 'A', '1º Electromecánica de Vehiculos Automoviles'),
('2EVA', 'A', '2º Electromecánica de Vehiculos Automoviles'),
('1GA', 'A', '1º Gestión Administrativa'),
('2GA', 'A', '2º Gestión Administrativa'),
('1BachL', 'B', 'Clase B 1º Bachillerato Letras'),
('1SMR', 'B', 'Clase B 1º Sistemas Microinformáticos y Redes'),
('1GA', 'C', 'Clase C 1º Gestión Administrativa');

-- INSERT en Tutores
INSERT INTO Tutores (nombre, correo)
VALUES
('Francisco Garcia', 'paco.garcia@example.com'),
('Isabel Munoz', 'imunoz@example.com'),
('Alberto Dominguez', 'aldominguez@example.com'),
('Ernesto Gonzalez', 'egonzalez@example.com');

-- INSERT en Editoriales
INSERT INTO Editoriales (nombre, correo, telefono)
VALUES
('Editorial SM', 'contacto@editorialsm.com', '912345678'),
('Santillana', 'info@santillana.com', '912876543'),
('Anaya', 'ventas@anaya.com', '913456789'),
('McGraw-Hill', 'support@mcgrawhill.com', '914567890');

-- INSERT en Asignaturas
INSERT INTO Asignaturas (nombre)
VALUES
('Matemáticas'),
('Lengua'),
('Biología'),
('Historia'),
('Programación'),
('Redes Informáticas'),
('Física'),
('Química'),
('Filosofía'),
('Arte'),
('Educación Física'),
('Inglés'),
('Francés'),
('Ciencias Sociales'),
('Economía'),
('Literatura'),
('Cálculo'),
('Estadística'),
('Electrotecnia'),
('Mecánica'),
('Electrónica'),
('Gestión Empresarial'),
('Ciberseguridad'),
('Bases de Datos'),
('Desarrollo Web'),
('Administración de Sistemas'),
('Mantenimiento Preventivo');

-- Libros para 1º Infantil
INSERT INTO Libros (ISBN, nombre, precio, idEditorial, idAsignatura)
VALUES
('9781234567897', 'Matemáticas 1º Infantil', 15.99, 1, 1), -- Matemáticas
('9781234567898', 'Lengua 1º Infantil', 14.50, 2, 2),
('9781234567818', 'Matemáticas Básicas Infantil', 15.50, 1, 1), -- Matemáticas
('9781234567819', 'Lengua y Comunicación Infantil', 14.75, 2, 2),
('9781234567899', 'Biología 1º Bachillerato', 25.75, 3, 3),      -- Biología
('9781234567824', 'Física 1º Bachillerato', 28.00, 3, 7),        -- Física
('9781234567825', 'Química Aplicada Bachillerato', 27.50, 4, 8),
('9781234567800', 'Historia 1º Bachillerato Letras', 22.00, 4, 4),  -- Historia
('9781234567826', 'Introducción a Filosofía Letras', 21.00, 1, 9),
('9781234567801', 'Programación Básica DAW', 35.50, 1, 5),         -- Programación
('9781234567831', 'Bases de Datos Avanzadas DAW', 39.99, 2, 25),   -- Bases de Datos
('9781234567822', 'Introducción a la Programación DAW', 37.99, 1, 5),
('9781234567802', 'Redes Informáticas SMR', 29.99, 2, 6),         -- Redes
('9781234567830', 'Técnicas de Ciberseguridad SMR', 35.99, 1, 23), -- Ciberseguridad
('9781234567823', 'Fundamentos de Redes SMR', 33.50, 2, 6),
('9781234567832', 'Mantenimiento de Equipos EVA', 32.00, 3, 27),
('9781234567833', 'Gestión Financiera GA', 29.50, 4, 22); -- Gestión Empresarial

INSERT INTO Reservas 
(dni, nombreTutor, correo, nombreAlumno, documento, apta, fecha_reserva, coste_total, fecha_registro, idCurso, letraClase)
VALUES
-- Reservas para 1Inf A
('12345678A', 'María López', 'maria.lopez@gmail.com', 'Carlos López', 'doc1.pdf', TRUE, '2024-09-01', 150.00, '2024-08-01', '1Inf', 'A'),
('12345678B', 'Ana Torres', 'ana.torres@gmail.com', 'Lucía Torres', 'doc2.pdf', FALSE, '2024-09-05', 150.00, '2024-08-03', '1Inf', 'A'),
('12345678C', 'Juan García', 'juan.garcia@gmail.com', 'Javier García', 'doc3.pdf', TRUE, '2024-09-10', 150.00, '2024-08-05', '1Inf', 'A'),

-- Reservas para 2Inf A
('23456789D', 'Luis Pérez', 'luis.perez@gmail.com', 'Marta Pérez', 'doc4.pdf', TRUE, '2024-09-15', 160.00, '2024-08-07', '2Inf', 'A'),
('23456789E', 'Sofía Gómez', 'sofia.gomez@gmail.com', 'Sara Gómez', 'doc5.pdf', FALSE, '2024-09-20', 160.00, '2024-08-09', '2Inf', 'A'),

-- Reservas para 1BachC A
('34567890F', 'Pedro Sánchez', 'pedro.sanchez@gmail.com', 'David Sánchez', 'doc6.pdf', TRUE, '2024-09-01', 200.00, '2024-08-01', '1BachC', 'A'),
('34567890G', 'Elena Ruiz', 'elena.ruiz@gmail.com', 'Laura Ruiz', 'doc7.pdf', FALSE, '2024-09-12', 200.00, '2024-08-15', '1BachC', 'A'),
('34567890H', 'Carlos Martín', 'carlos.martin@gmail.com', 'Diego Martín', 'doc8.pdf', TRUE, '2024-09-18', 200.00, '2024-08-20', '1BachC', 'A'),

-- Reservas para 1BachL A
('45678901I', 'Paula Romero', 'paula.romero@gmail.com', 'Adriana Romero', 'doc9.pdf', TRUE, '2024-09-05', 200.00, '2024-08-05', '1BachL', 'A'),
('45678901J', 'Javier Núñez', 'javier.nunez@gmail.com', 'Isabel Núñez', 'doc10.pdf', FALSE, '2024-09-10', 200.00, '2024-08-10', '1BachL', 'A'),

-- Reservas para 1DAW A
('56789012K', 'Cristina Ortega', 'cristina.ortega@gmail.com', 'Manuel Ortega', 'doc11.pdf', TRUE, '2024-09-01', 250.00, '2024-08-01', '1DAW', 'A'),
('56789012L', 'Mario Silva', 'mario.silva@gmail.com', 'Carmen Silva', 'doc12.pdf', FALSE, '2024-09-20', 250.00, '2024-08-20', '1DAW', 'A'),
('56789012M', 'Patricia López', 'patricia.lopez@gmail.com', 'Alberto López', 'doc13.pdf', TRUE, '2024-09-25', 250.00, '2024-08-25', '1DAW', 'A'),

-- Reservas para 1SMR A
('67890123N', 'Teresa Fernández', 'teresa.fernandez@gmail.com', 'Roberto Fernández', 'doc14.pdf', TRUE, '2024-09-01', 240.00, '2024-08-01', '1SMR', 'A'),
('67890123O', 'Diego Rojas', 'diego.rojas@gmail.com', 'Clara Rojas', 'doc15.pdf', FALSE, '2024-09-18', 240.00, '2024-08-18', '1SMR', 'A'),
('67890123P', 'Lucía Márquez', 'lucia.marquez@gmail.com', 'Gabriel Márquez', 'doc16.pdf', TRUE, '2024-09-24', 240.00, '2024-08-24', '1SMR', 'A'),

-- Reservas para 1EVA A
('78901234Q', 'Andrés Delgado', 'andres.delgado@gmail.com', 'Daniel Delgado', 'doc17.pdf', TRUE, '2024-09-01', 230.00, '2024-08-01', '1EVA', 'A'),
('78901234R', 'Mónica Ramos', 'monica.ramos@gmail.com', 'Irene Ramos', 'doc18.pdf', FALSE, '2024-09-05', 230.00, '2024-08-05', '1EVA', 'A'),
('78901234S', 'Raúl Herrera', 'raul.herrera@gmail.com', 'Paula Herrera', 'doc19.pdf', TRUE, '2024-09-15', 230.00, '2024-08-15', '1EVA', 'A'),

-- Reservas para 1GA C
('89012345T', 'Sandra Gil', 'sandra.gil@gmail.com', 'Álvaro Gil', 'doc20.pdf', TRUE, '2024-09-01', 220.00, '2024-08-01', '1GA', 'C'),
('89012345U', 'Pablo Navarro', 'pablo.navarro@gmail.com', 'Emma Navarro', 'doc21.pdf', FALSE, '2024-09-12', 220.00, '2024-08-12', '1GA', 'C'),
('89012345V', 'Claudia Medina', 'claudia.medina@gmail.com', 'Oscar Medina', 'doc22.pdf', TRUE, '2024-09-22', 220.00, '2024-08-22', '1GA', 'C');
-- INSERT en Reservas_Libros
INSERT INTO Reservas_Libros (ISBN, idReserva, entregado)
VALUES
('9781234567897', 1, TRUE), 
('9781234567898', 1, TRUE),
('9781234567899', 2, FALSE), 
('9781234567824', 2, FALSE), 
('9781234567825', 2, FALSE),
('9781234567801', 3, TRUE), 
('9781234567831', 3, TRUE), 
('9781234567822', 3, TRUE),
('9781234567802', 4, TRUE),
('9781234567830', 4, TRUE), 
('9781234567823', 4, TRUE),
('9781234567832', 11, TRUE),
('9781234567833', 10, TRUE); 

-- INSERT CLASES ASIGNATURAS
INSERT INTO clases_asignaturas (idCurso, letraClase, idAsignatura)
VALUES
('1Inf', 'A', 1),  
('1Inf', 'A', 2),  
('1BachC', 'A', 3), 
('1BachC', 'A', 7),
('1BachC', 'A', 8), 
('1BachL', 'A', 4), 
('1BachL', 'A', 9), 
('1DAW', 'A', 5),  
('1DAW', 'A', 25), 
('1SMR', 'A', 6),  
('1SMR', 'A', 23);

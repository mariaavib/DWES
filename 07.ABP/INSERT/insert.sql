

-- INSERT en Cursos
INSERT INTO Cursos (idCurso, nombre) VALUES
('1Inf', '1º Infantil'),
('2Inf', '2º Infantil'),
('1BachC', '1º Bachillerato Ciencias'),
('2BachC', '2º Bachillerato Ciencias'),
('1BachL', '1º Bachillerato Letras'),
('2BachL', '2º Bachillerato Letras'),
('1DAW', '1º Desarrollo de Aplicaciones Web'),
('2DAW', '2º Desarrollo de Aplicaciones Web'),
('1SMR', '1º Sistemas Microinformáticos y Redes'),
('2SMR', '2º Sistemas Microinformáticos y Redes'),
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

-- INSERT en Libros
INSERT INTO Libros (ISBN, nombre, precio, idEditorial, idAsignatura)
VALUES
('9781234567897', 'Matemáticas 1º Infantil', 15.99, 1, 1),
('9781234567898', 'Lengua 1º Infantil', 14.50, 2, 2),
('9781234567899', 'Biología 1º Bachillerato', 25.75, 3, 3),
('9781234567800', 'Historia 1º Bachillerato Letras', 22.00, 4, 4),
('9781234567801', 'Programación Básica DAW', 35.50, 1, 5),
('9781234567802', 'Redes Informáticas SMR', 29.99, 2, 6),
('9781234567818', 'Matemáticas Básicas Infantil', 15.50, 1, 1),
('9781234567819', 'Lengua y Comunicación Infantil', 14.75, 2, 2),
('9781234567820', 'Biología para Bachillerato Ciencias', 26.00, 3, 3),
('9781234567821', 'Historia Moderna Bachillerato Letras', 23.50, 4, 4),
('9781234567822', 'Introducción a la Programación DAW', 37.99, 1, 5),
('9781234567823', 'Fundamentos de Redes SMR', 33.50, 2, 6),
('9781234567824', 'Física 2º Bachillerato Ciencias', 28.00, 3, 7),
('9781234567825', 'Química Aplicada Bachillerato', 27.50, 4, 8),
('9781234567826', 'Introducción a Filosofía Letras', 21.00, 1, 9),
('9781234567827', 'Arte Clásico y Contemporáneo', 25.00, 2, 10),
('9781234567828', 'Educación Física Inicial', 11.50, 3, 11),
('9781234567829', 'Inglés Básico Infantil', 16.00, 4, 12),
('9781234567830', 'Técnicas de Ciberseguridad SMR', 35.99, 1, 16),
('9781234567831', 'Bases de Datos Avanzadas DAW', 39.99, 2, 17),
('9781234567832', 'Mantenimiento de Equipos EVA', 32.00, 3, 18),
('9781234567833', 'Gestión Financiera GA', 29.50, 4, 19); 

-- INSERT en Reservas
INSERT INTO Reservas (dni, nombreTutor, correo, nombreAlumno, documento, apta, fecha_reserva, coste_total, fecha_registro, idCurso, letraClase)
VALUES
('12345678A', 'Isabel Munoz', 'imunoz@example.com', 'Luis Pérez', 'documento1.pdf', TRUE, '2024-01-15', 45.00, '2023-11-01', '1Inf', 'A'),
('23456789B', 'Francisco Garcia', 'paco.garcia@example.com', 'Sofía López', 'documento2.pdf', FALSE, '2024-01-16', 35.50, '2023-11-02','1BachC', 'A'),
('34567890C', 'Alberto Dominguez', 'aldominguez@example.com', 'Diego García', 'documento3.pdf', TRUE, '2024-01-17', 29.99, '2023-11-03', '1DAW', 'A'),
('45678901D', 'Ernesto Gonzalez', 'egonzalez@example.com', 'Lucía Fernández', 'documento4.pdf', TRUE, '2024-01-18', 60.00, '2023-11-04', '1SMR', 'A'),
('34567890A', 'José Gómez', 'jgomez@example.com', 'María Pérez', 'documentoA.pdf', TRUE, '2024-02-01', 15.50, '2023-11-20', '1Inf', 'A'),
('45678901B', 'Laura Rodríguez', 'lrodriguez@example.com', 'Carlos García', 'documentoB.pdf', TRUE, '2024-02-02', 26.00, '2023-11-21', '1BachC', 'A'),
('56789012C', 'Antonio Ruiz', 'aruiz@example.com', 'Marta Sánchez', 'documentoC.pdf', TRUE, '2024-02-03', 23.50, '2023-11-22', '1BachL', 'B'),
('67890123D', 'Isabel Fernández', 'ifernandez@example.com', 'Luis Martínez', 'documentoD.pdf', FALSE, '2024-02-04', 37.99, '2023-11-23', '1DAW', 'A'),
('78901234E', 'Ricardo Torres', 'rtorres@example.com', 'Sara López', 'documentoE.pdf', TRUE, '2024-02-05', 33.50, '2023-11-24', '1SMR', 'B'),
('89012345F', 'Carmen Sánchez', 'csanchez@example.com', 'Iván Pérez', 'documentoF.pdf', TRUE, '2024-02-06', 29.50, '2023-11-25', '1GA', 'C'),
('90123456G', 'Luis Morales', 'lmorales@example.com', 'Adriana Torres', 'documentoG.pdf', TRUE, '2024-02-07', 32.00, '2023-11-26', '1EVA', 'A');

-- INSERT en clases_asignaturas
INSERT INTO clases_asignaturas (idCurso, letraClase, idAsignatura)
VALUES
-- 1 Infantil
('1Inf', 'A', 1), -- Matemáticas
('1Inf', 'A', 2), -- Lengua
-- 1 Bachillerato Ciencias
('1BachC', 'A', 3), -- Biología
('1BachC', 'A', 7), -- Física
('1BachC', 'A', 8), -- Química
-- 1 Bachillerato Letras
('1BachL', 'A', 4), -- Historia
('1BachL', 'A', 2), -- Lengua
-- 1 DAW
('1DAW', 'A', 5), -- Programación
('1DAW', 'A', 6), -- Redes Informáticas
-- 1 SMR
('1SMR', 'A', 6); -- Redes Informáticas

-- INSERT en Reservas_Libros
INSERT INTO Reservas_Libros (ISBN, idReserva, entregado)
VALUES
('9781234567897', 1, TRUE),
('9781234567898', 1, TRUE),
('9781234567899', 2, FALSE),
('9781234567800', 3, TRUE),
('9781234567801', 4, TRUE),
('9781234567802', 4, TRUE),
('9781234567818', 1, TRUE), 
('9781234567820', 2, FALSE), 
('9781234567821', 3, TRUE), 
('9781234567822', 4, TRUE), 
('9781234567823', 5, FALSE), 
('9781234567833', 6, TRUE),
('9781234567832', 7, TRUE);
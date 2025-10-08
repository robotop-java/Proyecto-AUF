SHOW DATABASES;
#DROP DATABASE BDdeAUF;

CREATE DATABASE BDdeAUF
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish_ci;
SHOW CREATE DATABASE BDdeAUF;
USE BDdeAUF;



CREATE TABLE Categoria(
Nombre_Categoria VARCHAR(60) PRIMARY KEY,
Descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE Clubes(
ID_CLUB INT AUTO_INCREMENT PRIMARY KEY,
CategoriaNombre VARCHAR(60),
NombreClub VARCHAR(255) UNIQUE,
Ciudad  ENUM('Canelones', 'Montevideo', 'Salto', 'Ciudad de la Costa', 'Paysandú', 'Maldonado','Colonia del Sacramento', 'San José de Mayo', 'Rivera', 'Tacuarembó','Fray Bentos', 'Mercedes', 'Durazno', 'Trinidad', 'Florida', 'Minas','San Carlos', 'Carmelo', 'Artigas', 'Rocha') NOT NULL,
Departamento ENUM('Montevideo', 'Salto', 'Canelones', 'Paysandú', 'Maldonado','Colonia', 'San José', 'Rivera', 'Tacuarembó', 'Río Negro','Soriano', 'Durazno', 'Flores', 'Florida', 'Lavalleja', 'Artigas', 'Rocha') NOT NULL,
FOREIGN KEY (CategoriaNombre) REFERENCES Categoria(Nombre_Categoria)
);

CREATE TABLE Jugadores(
CI INT(8) PRIMARY KEY,
Club_ID INT,
Nombre VARCHAR(255) NOT NULL,
Apellido VARCHAR(255) NOT NULL,
Posicion ENUM('Delantero', 'Medio', 'Defensa', 'Portero', 'Centrocampista') NOT NULL,
Numero INT(60) NOT NULL,
Goles INT(60) NOT NULL,
Tarjetas INT(60) NOT NULL,
Partidos INT(60) NOT NULL,
FOREIGN KEY (Club_ID) REFERENCES Clubes(ID_CLUB)
);

CREATE TABLE jugador_telefono(
Telefono int(9) PRIMARY KEY,
CI INT(8),
FOREIGN KEY (CI) REFERENCES Jugadores(CI)
);


CREATE TABLE Partidos(
ID_PARTIDOS INT AUTO_INCREMENT PRIMARY KEY,
Nombre_Categoria VARCHAR(60),
ResultadoVisitante int(2) NOT NULL,
ResultadoLocal int(2) NOT NULL,
Condicion ENUM('Local','Visitante','Neutral') NOT NULL,
Visitante VARCHAR(255) NOT NULL,
Local VARCHAR(255) NOT NULL,
Fecha DATE NOT NULL,
FOREIGN KEY (Nombre_Categoria) REFERENCES Categoria(Nombre_Categoria),
FOREIGN KEY (Local) REFERENCES Clubes(NombreClub),
FOREIGN KEY (Visitante) REFERENCES Clubes(NombreClub)
);

CREATE TABLE Torneos(
Nombre_Torneo VARCHAR(255) NOT NULL,
ID_Torneo INT AUTO_INCREMENT PRIMARY KEY,
ID_PARTIDOS INT,
Fecha_Inicio DATE NOT NULL,
Fecha_Fin DATE NOT NULL,
FOREIGN KEY (ID_PARTIDOS) REFERENCES Partidos(ID_PARTIDOS)

);


INSERT INTO Categoria (Nombre_Categoria, Descripcion) VALUES
('Primera División', 'Liga profesional de fútbol de Uruguay'),
('Sub-20', 'Categoría juvenil Sub-20'),
('Sub-17', 'Categoría juvenil Sub-17');


INSERT INTO Clubes (NombreClub, Ciudad, Departamento, CategoriaNombre) VALUES
('Club Atlético Peñarol', 'Montevideo', 'Montevideo', 'Primera División'),
('Club Nacional de Football', 'Montevideo', 'Montevideo', 'Primera División'),
('Liverpool Fútbol Club', 'Montevideo', 'Montevideo', 'Primera División'),
('Defensor Sporting Club', 'Montevideo', 'Montevideo', 'Primera División'),
('Danubio Fútbol Club', 'Montevideo', 'Montevideo', 'Primera División'),
('Cerro Largo Fútbol Club', 'Tacuarembó', 'Tacuarembó', 'Primera División'), -- Ajustado a ENUM
('Club Atlético Torque', 'Montevideo', 'Montevideo', 'Primera División'),
('Club Plaza Colonia de Deportes', 'Colonia del Sacramento', 'Colonia', 'Primera División'),
('Club Atlético Juventud de Las Piedras', 'Ciudad de la Costa', 'Canelones', 'Primera División'),
('Club Atlético Progreso', 'Montevideo', 'Montevideo', 'Primera División'),
('Club Atlético River Plate', 'Montevideo', 'Montevideo', 'Primera División'),
('Club Atlético Cerro', 'Montevideo', 'Montevideo', 'Primera División');


INSERT INTO Jugadores (CI, Club_ID, Nombre, Apellido, Posicion, Numero, Goles, Tarjetas, Partidos) VALUES
(12345678, 1, 'Luis', 'Suárez', 'Delantero', 9, 200, 30, 300),
(87654321, 2, 'Edinson', 'Cavani', 'Delantero', 21, 150, 25, 250),
(11223344, 3, 'Federico', 'Valverde', 'Centrocampista', 15, 50, 10, 150),
(44332211, 4, 'José', 'Giménez', 'Defensa', 2, 20, 5, 100),
(55667788, 5, 'Diego', 'Godín', 'Defensa', 3, 10, 3, 80),
(99887766, 6, 'Fernando', 'Muslera', 'Portero', 1, 0, 0, 200),
(66778899, 7, 'Maxi', 'Pereira', 'Defensa', 4, 5, 2, 120),
(33445566, 8, 'Carlos', 'Sánchez', 'Centrocampista', 8, 30, 15, 180),
(22334455, 9, 'Sebastián', 'Cáceres', 'Defensa', 6, 5, 1, 70),
(55667777, 10, 'Rodrigo', 'Bentancur', 'Centrocampista', 5, 20, 10, 160),
(77889900, 11, 'Darwin', 'Núñez', 'Delantero', 11, 40, 12, 140),
(88990011, 12, 'Matías', 'Viña', 'Defensa', 17, 10, 4, 110);


INSERT INTO Partidos (Nombre_Categoria, ResultadoVisitante, ResultadoLocal, Condicion, Visitante, Local, Fecha) VALUES
('Primera División', 1, 2, 'Local', 'Liverpool Fútbol Club', 'Club Atlético Peñarol', '2025-03-15'),
('Primera División', 1, 1, 'Visitante', 'Defensor Sporting Club', 'Club Nacional de Football', '2025-03-16'),
('Primera División', 0, 3, 'Neutral', 'Danubio Fútbol Club', 'Cerro Largo Fútbol Club', '2025-03-17'),
('Primera División', 2, 0, 'Local', 'Club Atlético Torque', 'Club Plaza Colonia de Deportes', '2025-03-18');



INSERT INTO Torneos (Nombre_Torneo, Fecha_Inicio, Fecha_Fin, ID_PARTIDOS) VALUES
('Torneo Apertura 2025', '2025-03-01', '2025-06-30', 1),
('Torneo Clausura 2025', '2025-07-01', '2025-10-31', 2);






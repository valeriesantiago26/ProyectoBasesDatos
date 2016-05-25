/* Delete the tables if they already exist */
drop table if exists Estudiante;
drop table if exists Supervisor;
drop table if exists CentroDePractica;
drop table if exists MaestroCooperador;
drop table if exists Evaluacion;
drop table if exists Competencia;
drop table if exists Componente;
drop table if exists Resultado;

/* Create the schema for our tables */

create table Estudiante(NumEst int,
						NombreEst varchar(80) not null,
						EspecialidadEst varchar(20),
						NivelEst varchar(10),
						CentroPracID int,
						AnoAcademico int,
						Semestre varchar(20),
						MaestroCoopID int,
						NumSupervisor int,
						CantidadHoras int,
						primary key (NumEst),
						foreign key (CentroPracID) references CentroDePractica(CentroPracID),
						foreign key (MaestroCoopID) references MaestroCooperador(MaestroCoopID),
						foreign key (NumSupervisor) references Supervisor(NumSupervisor) );

create table Supervisor(NumSupervisor int,
						NombreSupervisor varchar(80) not null,
						EspecialidadSupervisor varchar(20),
						primary key (NumSupervisor));

create table CentroDePractica(CentroPracID int,
								NombreEscuela varchar(50) not null,
								tipo varchar(7),
								region varchar(10),
								director varchar(80),
								AnoDeComienzo int,
								NivelEscuela varchar(10),
								primary key (CentroPracID));

create table MaestroCooperador(MaestroCoopID int,
								EscuelaID int,
								NombreMaestro varchar(80) not null,
								EspecialidadMaestro varchar(20),
								AnoComienzo int,
								AnoCurso int,
								NivelMaestro varchar(10),
								primary key (MaestroCoopID),
								foreign key (EscuelaID) references CentroDePractica (CentroPracID));

create table Evaluacion(NumEstudiante int,
						EvaluacionID int,
						Fecha date ,
						primary key (EvaluacionID, NumEstudiante));

create table Competencia(CompetenciaID int,
							DescripcionCompetencia varchar(255),
							primary KEY (CompetenciaID));

create table Componente(ComponenteID int, 
						CompetenciaID int,
						DescripcionComponente varchar(255),
						primary key (ComponenteID, CompetenciaID));

create table Resultado(Valor real,
						NumEstud int,
						EvaluacionID int,
						CompetenciaID int,
						ComponenteID int,
						primary key (NumEstud, EvaluacionID, ComponenteID, CompetenciaID));

/* Populate the tables with our data */
/* Add to Estudiante */
insert into Estudiante values(801001234, 'Nabriel Licea', 'Ingles', 'Secundaria', 2001, 20152016, 'primer', 3001, 1001, 300);
insert into Estudiante values(801004567, 'Hosue Todriguez', 'Ingles', 'Secundaria', 2002, 20152016, 'primer', 3002, 1001, 390);
insert into Estudiante values(801007890, 'Naria Balvarado', 'Kinder a Tercero', 'Elemental', 2003, 20152016, 'primer', 3003, 1002, 492);
insert into Estudiante values(801012345, 'Ingeli Sosa', 'K-3', 'Elemental', 2003, 20152016, 'primer', 3003, 1002, 396);
insert into Estudiante values(801005678, 'Leishla Veliciano', 'Matemática', 'Secundaria', 2004, 20142015, 'segundo', 3004, 1002, 311);

/* Add to Supervisor*/
INSERT INTO Supervisor (NumSupervisor, NombreSupervisor, EspecialidadSupervisor)
SELECT * FROM (SELECT 1001, 'Cristina Guerra', 'Ingles') AS tmp
WHERE NOT EXISTS (SELECT NumSupervisor FROM Supervisor WHERE NumSupervisor = 1001) LIMIT 1;

INSERT INTO Supervisor (NumSupervisor, NombreSupervisor, EspecialidadSupervisor)
SELECT * FROM (SELECT 1002, 'Carmen Pujols', 'K-3') AS tmp
WHERE NOT EXISTS (
SELECT NumSupervisor FROM Supervisor WHERE NumSupervisor = 1002) LIMIT 1;

INSERT INTO Supervisor (NumSupervisor, NombreSupervisor, EspecialidadSupervisor)
SELECT * FROM (SELECT 1003, 'Luis Lopez', 'Matemática') AS tmp
WHERE NOT EXISTS (
SELECT NumSupervisor FROM Supervisor WHERE NumSupervisor = 1003) LIMIT 1;

INSERT INTO Supervisor (NumSupervisor, NombreSupervisor, EspecialidadSupervisor)
SELECT * FROM (SELECT 1004, 'Adele Santiago', 'Educación Especial - Disturbios emocionales') AS tmp
WHERE NOT EXISTS (
SELECT NumSupervisor FROM Supervisor WHERE NumSupervisor = 1004) LIMIT 1;

INSERT INTO Supervisor (NumSupervisor, NombreSupervisor, EspecialidadSupervisor)
SELECT * FROM (SELECT 1005, 'Francisco Marrero', '4-6 Ciencia') AS tmp
WHERE NOT EXISTS (
SELECT NumSupervisor FROM Supervisor WHERE NumSupervisor = 1005) LIMIT 1;

/* Add to Centro de Practica */
INSERT INTO CentroDePractica (CentroPracID, NombreEscuela, tipo, region, director, AnoDeComienzo, NivelEscuela)
SELECT * FROM (SELECT 2001, 'UHS', 'publica', 'san juan', 'George Bonilla', 1970, 'Secundaria') AS tmp
WHERE NOT EXISTS (
SELECT CentroPracID FROM CentroDePractica WHERE CentroPracID = 2001) LIMIT 1;

INSERT INTO CentroDePractica (CentroPracID, NombreEscuela, tipo, region, director, AnoDeComienzo, NivelEscuela)
SELECT * FROM (SELECT 2002, 'The School of San Juan', 'privada', 'san juan', 'Maria Dov',  2010, 'Secundaria') AS tmp
WHERE NOT EXISTS (
SELECT CentroPracID FROM CentroDePractica WHERE CentroPracID = 2002) LIMIT 1;

INSERT INTO CentroDePractica (CentroPracID, NombreEscuela, tipo, region, director, AnoDeComienzo, NivelEscuela)
SELECT * FROM (SELECT 2003, 'EEUPR', 'publica', 'san juan', 'Grace Carro', 1970, 'Elemental') AS tmp
WHERE NOT EXISTS (
SELECT CentroPracID FROM CentroDePractica WHERE CentroPracID = 2003) LIMIT 1;

INSERT INTO CentroDePractica (CentroPracID, NombreEscuela, tipo, region, director, AnoDeComienzo, NivelEscuela)
SELECT * FROM (SELECT 2004, 'Ernesto Ramos  Aantonini', 'publica', 'san juan', 'Marisol Colon', 2003, 'Secundaria') AS tmp
WHERE NOT EXISTS (
SELECT CentroPracID FROM CentroDePractica WHERE CentroPracID = 2004) LIMIT 1;

INSERT INTO CentroDePractica (CentroPracID, NombreEscuela, tipo, region, director, AnoDeComienzo, NivelEscuela)
SELECT * FROM (SELECT 2005, 'Plaza Palmer', 'privada', 'Caguas', 'Cristobal Hernández', 2003, 'Secundaria') AS tmp
WHERE NOT EXISTS (
SELECT CentroPracID FROM CentroDePractica WHERE CentroPracID = 2005) LIMIT 1;

/* Add to Maestro Cooperador */
INSERT INTO MaestroCooperador (MaestroCoopID, EscuelaID, NombreMaestro, EspecialidadMaestro, AnoComienzo, AnoCurso, NivelMaestro)
SELECT * FROM (SELECT 3001, 2001, 'Myrna Gandía', 'Ingles', 2015, 2014, 'Secundaria') AS tmp
WHERE NOT EXISTS (
SELECT MaestroCoopID FROM MaestroCooperador WHERE MaestroCoopID = 3001) LIMIT 1;

INSERT INTO MaestroCooperador (MaestroCoopID, EscuelaID, NombreMaestro, EspecialidadMaestro, AnoComienzo, AnoCurso, NivelMaestro)
SELECT * FROM (SELECT 3002, 2002, 'Teresita Lebron', 'Ingles', 2015, 2013, 'Secundaria') AS tmp
WHERE NOT EXISTS (
SELECT MaestroCoopID FROM MaestroCooperador WHERE MaestroCoopID = 3002) LIMIT 1;

INSERT INTO MaestroCooperador (MaestroCoopID, EscuelaID, NombreMaestro, EspecialidadMaestro, AnoComienzo, AnoCurso, NivelMaestro)
SELECT * FROM (SELECT 3003, 2003, 'Rocio Torres', 'K-3', 2015, 2014, 'Elemental') AS tmp
WHERE NOT EXISTS (
SELECT MaestroCoopID FROM MaestroCooperador WHERE MaestroCoopID = 3003) LIMIT 1;

INSERT INTO MaestroCooperador (MaestroCoopID, EscuelaID, NombreMaestro, EspecialidadMaestro, AnoComienzo, AnoCurso, NivelMaestro)
SELECT * FROM (SELECT 3004, 2004, 'Marta Rodriguez', 'Matemática', 2003, 2011, 'Secundaria') AS tmp
WHERE NOT EXISTS (
SELECT MaestroCoopID FROM MaestroCooperador WHERE MaestroCoopID = 3004) LIMIT 1;

INSERT INTO MaestroCooperador (MaestroCoopID, EscuelaID, NombreMaestro, EspecialidadMaestro, AnoComienzo, AnoCurso, NivelMaestro)
SELECT * FROM (SELECT 3005, 2004, 'Luisa Delgado', '4-6 Ciencia', 2009, 2013, 'elemental') AS tmp
WHERE NOT EXISTS (
SELECT MaestroCoopID FROM MaestroCooperador WHERE MaestroCoopID = 3005) LIMIT 1;

/* Add to Evaluacion */
insert into Evaluacion values(801001234, 1, '2015-09-28');
insert into Evaluacion values(801001234, 2, '2015-11-02');
insert into Evaluacion values(801001234, 3, '2015-11-20');
insert into Evaluacion values(801004567, 1, '2015-10-05');
insert into Evaluacion values(801004567, 2, '2015-11-09');
insert into Evaluacion values(801004567, 3, '2015-12-07');
insert into Evaluacion values(801007890, 1, '2015-09-28');
insert into Evaluacion values(801007890, 2, '2015-10-26');
insert into Evaluacion values(801007890, 3, '2015-11-28');
insert into Evaluacion values(801012345, 1, '2015-09-28');
insert into Evaluacion values(801012345, 2, '2015-10-26');
insert into Evaluacion values(801012345, 3, '2015-11-28');
insert into Evaluacion values(801005678, 1, '2015-09-28');
insert into Evaluacion values(801005678, 2, '2015-10-26');
insert into Evaluacion values(801005678, 3, '2015-11-30');

/* Add to Competencia */
INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 01, 'Competencia 1: dominio y conocimiento de la materia') AS tmp
WHERE NOT EXISTS ( SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 01) LIMIT 1; 

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 02, 'Competencia 2: conocimiento del estudiante y delproceso de aprendizaje') AS tmp
WHERE NOT EXISTS (SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 02) LIMIT 1;

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 03, 'Competencia 3: planificación de la enseñanza') AS tmp
WHERE NOT EXISTS (SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 03) LIMIT 1;

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 04, 'Competencia 4: implantación e investigación de la enseñanza') AS tmp
WHERE NOT EXISTS (
SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 04) LIMIT 1;

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 05, 'Competencia 5: creación de ambiente de aprendizaje') AS tmp
WHERE NOT EXISTS (SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 05) LIMIT 1;

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 06, 'Competencia 6: comunicación') AS tmp
WHERE NOT EXISTS (
SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 06) LIMIT 1;

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 07, 'Competencia 7: integración de la tecnología educativa') AS tmp
WHERE NOT EXISTS (
SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 07) LIMIT 1;

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 08, 'Competencia 8: evaluación del aprendizaje') AS tmp
WHERE NOT EXISTS (
SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 08) LIMIT 1;

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 09, 'Competencia 9: relación con la comunidad') AS tmp
WHERE NOT EXISTS (
SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 09) LIMIT 1;

INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia)
SELECT * FROM (SELECT 10, 'Competencia 10: desarrollo y desempeño profesional') AS tmp
WHERE NOT EXISTS (
SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = 10) LIMIT 1;

/* Add to Componente */
insert into Componente values(1, 01, 'Componente 1: conocimiento amplio y profundo del contenido de materia que enseña');
insert into Componente values(2, 01, 'Componente 2: conexiones de la materia con otras disciplinas');
insert into Componente values(3, 01, 'Componente 3: integración de los estándares con el contenido de su disciplina');
insert into Componente values(4, 01, 'Componente 4: Como el estudiante organiza experiencias
de aprendizaje significativo de la materia para todos sus estudiantes');
insert into Componente values(1, 02, 'Componente 1: conocimiento de las diversas formas en que se desarrollan los estudiantes en lo cognitivo, social, emocional y físico, y de las diversas formas en que aprenden');
insert into Componente values(2, 02, 'Componente 2: conocimiento del perfil de los estudiantes y su diversidad,a través del empleo de diversas fuentes de información');
insert into Componente values(3, 02, 'Componente 3: conocimiento y organización de estrategias. recursos, y actividades de enseñanza  y aprendizaje que atienden las diversas necesidades, intereses y talentos de los estudiantes');
insert into Componente values(1, 03, 'Componente 1: alineamiento de los objetivos y actividades instruccionales con los estándares de la materia y las metas del currículo escolar');
insert into Componente values(2, 03, 'Componente 2: elección y secuencia de actividades de enseñanza apropiadas y pertinentes para los estudiantes y el logro de los objetivos de aprendizaje');
insert into Componente values(3, 03, 'Componente 3: planificación a corto y largo plazo, de acuerdo con las metas curriculares y el conocimiento de los estudiantes');
insert into Componente values(4, 03, 'Componente 4: planificación de la distribución del tiempo para lograr los objetivos de aprendizaje');
insert into Componente values(1, 04, 'Componente 1:  selección y utilización de diversas prácticas, estrategias, métodos y materiales apropiados para promover el aprendizaje de todos los estudiantes según sus diversas necesidades e intereses y niveles de desarrollo');
insert into Componente values(2, 04, 'Componente 2: selección y uso de prácticas, estrategia, métodos y materiales para promover el desarrollo de pensamiento crítico y la capacidad de solucionar problemas de todos los estudiantes');
insert into Componente values(3, 04, 'Componente 3:uso y distribución del tiempo para lograr la implantación efectiva de la enseñanza y los objetivos educativos con todos los estudiantes');
insert into Componente values(4, 04, 'Componente 4:  investigación sobre el proceso de enseñanza y aprendizaje para promover el aprendizaje de todos los estudiantes. Contiene la puntuación obtenida');
insert into Componente values(1, 05, 'Componente 1: uso del conocimiento del comportamiento individual y grupal para crear un ambiente socioemocional de respeto, basado en normas de sana convivencia');
insert into Componente values(2, 05, 'Componente 2:  promoción de la participación activa de todos los estudiantes en el proceso de aprendizaje . Contiene la puntuación obtenida');
insert into Componente values(3, 05, 'Componente 3: organización del ambiente educativo saludable, seguro, apropiado y estimulante para el aprendizaje de todos');
insert into Componente values(1, 06, 'Componente 1: corrección, propiedad y coherencia en la expresión oral');
insert into Componente values(2, 06, 'Componente 2: corrección, propiedad y coherencia en la expresión escrita');
insert into Componente values(3, 06, 'Componente 3: proyección y articulación efectiva en la expresión verbal y no verbal');
insert into Componente values(1, 07, 'Componente 1: integración de la tecnología para fortalecer y promover el aprendizaje activo y significativo de sus estudiantes y el proceso de enseñanza');
insert into Componente values(2, 07, 'Componente 2: tecnología para apoyar y fortalecer la evaluación del aprendizaje');
insert into Componente values(3, 07, 'Componente 3: tecnología para facilitar y fortalecer la comunicación, la colaboración, la investigación y la creación');
insert into Componente values(1, 08, 'Componente 1: selección, desarrollo, adaptación y uso de diversos medios y técnicas de recopilación para evaluar el aprendizaje que son apropiados y justos para todos los estudiantes');
insert into Componente values(2, 08, 'Componente 2: análisis de la información recopilada para tomar decisiones respecto alaprendizaje y el desarrollo continuo de cada estudiante y a su práctica educativa');
insert into Componente values(3, 08, 'Componente 3: desarrollo y aplicación de procedimientos apropiados, justos y éticos de calificación. Contiene la puntuación obtenida');
insert into Componente values(4, 08, 'Componente 4: organiza y comunica claramente los resulados de la evaluación estudiantil');
insert into Componente values(1, 09, 'Componente 1: conocimiento de los diversos contextos sociales que condicionan la enseñanza');
insert into Componente values(2, 09, 'Componente 2:  interacción colaborativa con colegas, la comunidad escolar y otras instituciones para apoyar el aprendizaje');
insert into Componente values(3, 09, 'Componente 3: participación en actividades escolares del núcleo escolar');
insert into Componente values(1, 10, 'Componente 1: reflexión sobre las responsabilidades profesionales');
insert into Componente values(2, 10, 'Componente 2: responsabilidad profesional con los requisitos académicos de la práctica docente');
insert into Componente values(3, 10, 'Componente 3: búsqueda activa de su propio desarrollo profesional');

/* Add to Resultado */
insert into Resultado values(1, 801001234, 1, 01, 1);
insert into Resultado values(0, 801001234, 1, 01, 2);
insert into Resultado values(2, 801001234, 1, 01, 3);
insert into Resultado values(2, 801001234, 1, 01, 4);
insert into Resultado values(1, 801001234, 1, 02, 1);
insert into Resultado values(1, 801001234, 1, 02, 2);
insert into Resultado values(1, 801001234, 1, 02, 3);
insert into Resultado values(1, 801001234, 1, 03, 1);
insert into Resultado values(2, 801001234, 1, 03, 2);
insert into Resultado values(1, 801001234, 1, 03, 3);
insert into Resultado values(1, 801001234, 1, 03, 4);
insert into Resultado values(2, 801001234, 1, 04, 1);
insert into Resultado values(1, 801001234, 1, 04, 2);
insert into Resultado values(1, 801001234, 1, 04, 3);
insert into Resultado values(1, 801001234, 1, 04, 4);
insert into Resultado values(1, 801001234, 1, 05, 1);
insert into Resultado values(2, 801001234, 1, 05, 2);
insert into Resultado values(2, 801001234, 1, 05, 3);
insert into Resultado values(2, 801001234, 1, 06, 1);
insert into Resultado values(2, 801001234, 1, 06, 2);
insert into Resultado values(1, 801001234, 1, 06, 3);
insert into Resultado values(2, 801001234, 1, 07, 1);
insert into Resultado values(3, 801001234, 1, 07, 2);
insert into Resultado values(3, 801001234, 1, 07, 3);
insert into Resultado values(2, 801001234, 1, 08, 1);
insert into Resultado values(2, 801001234, 1, 08, 2);
insert into Resultado values(2, 801001234, 1, 08, 3);
insert into Resultado values(1, 801001234, 1, 08, 4);
insert into Resultado values(1, 801001234, 1, 09, 1);
insert into Resultado values(2, 801001234, 1, 09, 2);
insert into Resultado values(2, 801001234, 1, 09, 3);
insert into Resultado values(1, 801001234, 1, 10, 1);
insert into Resultado values(2, 801001234, 1, 10, 2);
insert into Resultado values(2, 801001234, 1, 10, 3);

insert into Resultado values(2, 801001234, 2, 01, 1);
insert into Resultado values(3, 801001234, 2, 01, 2);
insert into Resultado values(3, 801001234, 2, 01, 3);
insert into Resultado values(3, 801001234, 2, 01, 4);
insert into Resultado values(2, 801001234, 2, 02, 1);
insert into Resultado values(3, 801001234, 2, 02, 2);
insert into Resultado values(2, 801001234, 2, 02, 3);
insert into Resultado values(3, 801001234, 2, 03, 1);
insert into Resultado values(3, 801001234, 2, 03, 2);
insert into Resultado values(2, 801001234, 2, 03, 3);
insert into Resultado values(2, 801001234, 2, 03, 4);
insert into Resultado values(3, 801001234, 2, 04, 1);
insert into Resultado values(3, 801001234, 2, 04, 2);
insert into Resultado values(2, 801001234, 2, 04, 3);
insert into Resultado values(2, 801001234, 2, 04, 4);
insert into Resultado values(3, 801001234, 2, 05, 1);
insert into Resultado values(3, 801001234, 2, 05, 2);
insert into Resultado values(3, 801001234, 2, 05, 3);
insert into Resultado values(3, 801001234, 2, 06, 1);
insert into Resultado values(3, 801001234, 2, 06, 2);
insert into Resultado values(3, 801001234, 2, 06, 3);
insert into Resultado values(4, 801001234, 2, 07, 1);
insert into Resultado values(4, 801001234, 2, 07, 2);
insert into Resultado values(4, 801001234, 2, 07, 3);
insert into Resultado values(3, 801001234, 2, 08, 1);
insert into Resultado values(3, 801001234, 2, 08, 2);
insert into Resultado values(3, 801001234, 2, 08, 3);
insert into Resultado values(3, 801001234, 2, 08, 4);
insert into Resultado values(3, 801001234, 2, 09, 1);
insert into Resultado values(3, 801001234, 2, 09, 2);
insert into Resultado values(3, 801001234, 2, 09, 3);
insert into Resultado values(2, 801001234, 2, 10, 1);
insert into Resultado values(3, 801001234, 2, 10, 2);
insert into Resultado values(3, 801001234, 2, 10, 3); 

insert into Resultado values(3, 801001234, 3, 01, 1);
insert into Resultado values(3, 801001234, 3, 01, 2);
insert into Resultado values(3, 801001234, 3, 01, 3);
insert into Resultado values(3, 801001234, 3, 01, 4);
insert into Resultado values(3, 801001234, 3, 02, 1);
insert into Resultado values(3, 801001234, 3, 02, 2);
insert into Resultado values(3, 801001234, 3, 02, 3);
insert into Resultado values(3, 801001234, 3, 03, 1);
insert into Resultado values(3, 801001234, 3, 03, 2);
insert into Resultado values(3, 801001234, 3, 03, 3);
insert into Resultado values(3, 801001234, 3, 03, 4);
insert into Resultado values(4, 801001234, 3, 04, 1);
insert into Resultado values(3, 801001234, 3, 04, 2);
insert into Resultado values(2, 801001234, 3, 04, 3);
insert into Resultado values(2, 801001234, 3, 04, 4);
insert into Resultado values(4, 801001234, 3, 05, 1);
insert into Resultado values(4, 801001234, 3, 05, 2);
insert into Resultado values(4, 801001234, 3, 05, 3);
insert into Resultado values(3, 801001234, 3, 06, 1);
insert into Resultado values(3, 801001234, 3, 06, 2);
insert into Resultado values(3, 801001234, 3, 06, 3);
insert into Resultado values(4, 801001234, 3, 07, 1);
insert into Resultado values(4, 801001234, 3, 07, 2);
insert into Resultado values(4, 801001234, 3, 07, 3);
insert into Resultado values(3, 801001234, 3, 08, 1);
insert into Resultado values(3, 801001234, 3, 08, 2);
insert into Resultado values(3, 801001234, 3, 08, 3);
insert into Resultado values(4, 801001234, 3, 08, 4);
insert into Resultado values(4, 801001234, 3, 09, 1);
insert into Resultado values(4, 801001234, 3, 09, 2);
insert into Resultado values(4, 801001234, 3, 09, 3);
insert into Resultado values(3, 801001234, 3, 10, 1);
insert into Resultado values(4, 801001234, 3, 10, 2);
insert into Resultado values(4, 801001234, 3, 10, 3);


insert into Resultado values(3, 801004567, 1, 01, 1);
insert into Resultado values(2, 801004567, 1, 01, 2);
insert into Resultado values(3, 801004567, 1, 01, 3);
insert into Resultado values(2, 801004567, 1, 01, 4);
insert into Resultado values(2, 801004567, 1, 02, 1);
insert into Resultado values(2, 801004567, 1, 02, 2);
insert into Resultado values(3, 801004567, 1, 02, 3);
insert into Resultado values(3, 801004567, 1, 03, 1);
insert into Resultado values(2, 801004567, 1, 03, 2);
insert into Resultado values(3, 801004567, 1, 03, 3);
insert into Resultado values(2, 801004567, 1, 03, 4);
insert into Resultado values(2, 801004567, 1, 04, 1);
insert into Resultado values(3, 801004567, 1, 04, 2);
insert into Resultado values(2, 801004567, 1, 04, 3);
insert into Resultado values(3, 801004567, 1, 04, 4);
insert into Resultado values(3, 801004567, 1, 05, 1);
insert into Resultado values(3, 801004567, 1, 05, 2);
insert into Resultado values(3, 801004567, 1, 05, 3);
insert into Resultado values(3, 801004567, 1, 06, 1);
insert into Resultado values(3, 801004567, 1, 06, 2);
insert into Resultado values(3, 801004567, 1, 06, 3);
insert into Resultado values(3, 801004567, 1, 07, 1);
insert into Resultado values(3, 801004567, 1, 07, 2);
insert into Resultado values(3, 801004567, 1, 07, 3);
insert into Resultado values(2, 801004567, 1, 08, 1);
insert into Resultado values(2, 801004567, 1, 08, 2);
insert into Resultado values(3, 801004567, 1, 08, 3);
insert into Resultado values(2, 801004567, 1, 08, 4);
insert into Resultado values(3, 801004567, 1, 09, 1);
insert into Resultado values(3, 801004567, 1, 09, 2);
insert into Resultado values(3, 801004567, 1, 09, 3);
insert into Resultado values(3, 801004567, 1, 10, 1);
insert into Resultado values(3, 801004567, 1, 10, 2);
insert into Resultado values(3, 801004567, 1, 10, 3);


insert into Resultado values(3, 801004567, 2, 01, 1);
insert into Resultado values(3, 801004567, 2, 01, 2);
insert into Resultado values(3, 801004567, 2, 01, 3);
insert into Resultado values(3, 801004567, 2, 01, 4);
insert into Resultado values(3, 801004567, 2, 02, 1);
insert into Resultado values(3, 801004567, 2, 02, 2);
insert into Resultado values(3, 801004567, 2, 02, 3);
insert into Resultado values(3, 801004567, 2, 03, 1);
insert into Resultado values(2, 801004567, 2, 03, 2);
insert into Resultado values(3, 801004567, 2, 03, 3);
insert into Resultado values(2, 801004567, 2, 03, 4);
insert into Resultado values(3, 801004567, 2, 04, 1);
insert into Resultado values(3, 801004567, 2, 04, 2);
insert into Resultado values(2, 801004567, 2, 04, 3);
insert into Resultado values(3, 801004567, 2, 04, 4);
insert into Resultado values(3, 801004567, 2, 05, 1);
insert into Resultado values(3, 801004567, 2, 05, 2);
insert into Resultado values(3, 801004567, 2, 05, 3);
insert into Resultado values(3, 801004567, 2, 06, 1);
insert into Resultado values(3, 801004567, 2, 06, 2);
insert into Resultado values(3, 801004567, 2, 06, 3);
insert into Resultado values(3, 801004567, 2, 07, 1);
insert into Resultado values(3, 801004567, 2, 07, 2);
insert into Resultado values(4, 801004567, 2, 07, 3);
insert into Resultado values(3, 801004567, 2, 08, 1);
insert into Resultado values(3, 801004567, 2, 08, 2);
insert into Resultado values(3, 801004567, 2, 08, 3);
insert into Resultado values(2, 801004567, 2, 08, 4);
insert into Resultado values(3, 801004567, 2, 09, 1);
insert into Resultado values(4, 801004567, 2, 09, 2);
insert into Resultado values(3, 801004567, 2, 09, 3);
insert into Resultado values(3, 801004567, 2, 10, 1);
insert into Resultado values(3, 801004567, 2, 10, 2);
insert into Resultado values(3, 801004567, 2, 10, 3);


insert into Resultado values(3, 801004567, 3, 01, 1);
insert into Resultado values(3, 801004567, 3, 01, 2);
insert into Resultado values(4, 801004567, 3, 01, 3);
insert into Resultado values(3, 801004567, 3, 01, 4);
insert into Resultado values(3, 801004567, 3, 02, 1);
insert into Resultado values(3, 801004567, 3, 02, 2);
insert into Resultado values(4, 801004567, 3, 02, 3);
insert into Resultado values(3, 801004567, 3, 03, 1);
insert into Resultado values(3, 801004567, 3, 03, 2);
insert into Resultado values(3, 801004567, 3, 03, 3);
insert into Resultado values(3, 801004567, 3, 03, 4);
insert into Resultado values(3, 801004567, 3, 04, 1);
insert into Resultado values(3, 801004567, 3, 04, 2);
insert into Resultado values(3, 801004567, 3, 04, 3);
insert into Resultado values(3, 801004567, 3, 04, 4);
insert into Resultado values(3, 801004567, 3, 05, 1);
insert into Resultado values(4, 801004567, 3, 05, 2);
insert into Resultado values(3, 801004567, 3, 05, 3);
insert into Resultado values(4, 801004567, 3, 06, 1);
insert into Resultado values(3, 801004567, 3, 06, 2);
insert into Resultado values(3, 801004567, 3, 06, 3);
insert into Resultado values(3, 801004567, 3, 07, 1);
insert into Resultado values(3, 801004567, 3, 07, 2);
insert into Resultado values(4, 801004567, 3, 07, 3);
insert into Resultado values(3, 801004567, 3, 08, 1);
insert into Resultado values(3, 801004567, 3, 08, 2);
insert into Resultado values(3, 801004567, 3, 08, 3);
insert into Resultado values(3, 801004567, 3, 08, 4);
insert into Resultado values(3, 801004567, 3, 09, 1);
insert into Resultado values(4, 801004567, 3, 09, 2);
insert into Resultado values(4, 801004567, 3, 09, 3);
insert into Resultado values(3, 801004567, 3, 10, 1);
insert into Resultado values(4, 801004567, 3, 10, 2);
insert into Resultado values(3, 801004567, 3, 10, 3);


insert into Resultado values(3, 801007890, 1, 01, 1);
insert into Resultado values(2, 801007890, 1, 01, 2);
insert into Resultado values(2, 801007890, 1, 01, 3);
insert into Resultado values(3, 801007890, 1, 01, 4);
insert into Resultado values(3, 801007890, 1, 02, 1);
insert into Resultado values(2, 801007890, 1, 02, 2);
insert into Resultado values(3, 801007890, 1, 02, 3);
insert into Resultado values(2, 801007890, 1, 03, 1);
insert into Resultado values(2, 801007890, 1, 03, 2);
insert into Resultado values(1, 801007890, 1, 03, 3);
insert into Resultado values(1, 801007890, 1, 03, 4);
insert into Resultado values(3, 801007890, 1, 04, 1);
insert into Resultado values(3, 801007890, 1, 04, 2);
insert into Resultado values(2, 801007890, 1, 04, 3);
insert into Resultado values(1, 801007890, 1, 04, 4);
insert into Resultado values(3, 801007890, 1, 05, 1);
insert into Resultado values(3, 801007890, 1, 05, 2);
insert into Resultado values(2, 801007890, 1, 05, 3);
insert into Resultado values(3, 801007890, 1, 06, 1);
insert into Resultado values(3, 801007890, 1, 06, 2);
insert into Resultado values(3, 801007890, 1, 06, 3);
insert into Resultado values(3, 801007890, 1, 07, 1);
insert into Resultado values(2, 801007890, 1, 07, 2);
insert into Resultado values(2, 801007890, 1, 07, 3);
insert into Resultado values(2, 801007890, 1, 08, 1);
insert into Resultado values(3, 801007890, 1, 08, 2);
insert into Resultado values(2, 801007890, 1, 08, 3);
insert into Resultado values(2, 801007890, 1, 08, 4);
insert into Resultado values(3, 801007890, 1, 09, 1);
insert into Resultado values(3, 801007890, 1, 09, 2);
insert into Resultado values(1, 801007890, 1, 09, 3);
insert into Resultado values(3, 801007890, 1, 10, 1);
insert into Resultado values(3, 801007890, 1, 10, 2);
insert into Resultado values(3, 801007890, 1, 10, 3);


insert into Resultado values(3, 801007890, 2, 01, 1);
insert into Resultado values(3, 801007890, 2, 01, 2);
insert into Resultado values(3, 801007890, 2, 01, 3);
insert into Resultado values(3, 801007890, 2, 01, 4);
insert into Resultado values(3, 801007890, 2, 02, 1);
insert into Resultado values(3, 801007890, 2, 02, 2);
insert into Resultado values(3, 801007890, 2, 02, 3);
insert into Resultado values(3, 801007890, 2, 03, 1);
insert into Resultado values(2, 801007890, 2, 03, 2);
insert into Resultado values(2, 801007890, 2, 03, 3);
insert into Resultado values(2, 801007890, 2, 03, 4);
insert into Resultado values(3, 801007890, 2, 04, 1);
insert into Resultado values(3, 801007890, 2, 04, 2);
insert into Resultado values(3, 801007890, 2, 04, 3);
insert into Resultado values(1, 801007890, 2, 04, 4);
insert into Resultado values(3, 801007890, 2, 05, 1);
insert into Resultado values(4, 801007890, 2, 05, 2);
insert into Resultado values(3, 801007890, 2, 05, 3);
insert into Resultado values(3, 801007890, 2, 06, 1);
insert into Resultado values(3, 801007890, 2, 06, 2);
insert into Resultado values(3, 801007890, 2, 06, 3);
insert into Resultado values(4, 801007890, 2, 07, 1);
insert into Resultado values(4, 801007890, 2, 07, 2);
insert into Resultado values(3, 801007890, 2, 07, 3);
insert into Resultado values(3, 801007890, 2, 08, 1);
insert into Resultado values(4, 801007890, 2, 08, 2);
insert into Resultado values(3, 801007890, 2, 08, 3);
insert into Resultado values(3, 801007890, 2, 08, 4);
insert into Resultado values(3, 801007890, 2, 09, 1);
insert into Resultado values(4, 801007890, 2, 09, 2);
insert into Resultado values(2, 801007890, 2, 09, 3);
insert into Resultado values(4, 801007890, 2, 10, 1);
insert into Resultado values(4, 801007890, 2, 10, 2);
insert into Resultado values(3, 801007890, 2, 10, 3);


insert into Resultado values(3, 801007890, 3, 01, 1);
insert into Resultado values(4, 801007890, 3, 01, 2);
insert into Resultado values(4, 801007890, 3, 01, 3);
insert into Resultado values(4, 801007890, 3, 01, 4);
insert into Resultado values(4, 801007890, 3, 02, 1);
insert into Resultado values(4, 801007890, 3, 02, 2);
insert into Resultado values(4, 801007890, 3, 02, 3);
insert into Resultado values(4, 801007890, 3, 03, 1);
insert into Resultado values(3, 801007890, 3, 03, 2);
insert into Resultado values(4, 801007890, 3, 03, 3);
insert into Resultado values(3, 801007890, 3, 03, 4);
insert into Resultado values(4, 801007890, 3, 04, 1);
insert into Resultado values(4, 801007890, 3, 04, 2);
insert into Resultado values(3, 801007890, 3, 04, 3);
insert into Resultado values(4, 801007890, 3, 04, 4);
insert into Resultado values(4, 801007890, 3, 05, 1);
insert into Resultado values(4, 801007890, 3, 05, 2);
insert into Resultado values(4, 801007890, 3, 05, 3);
insert into Resultado values(4, 801007890, 3, 06, 1);
insert into Resultado values(4, 801007890, 3, 06, 2);
insert into Resultado values(4, 801007890, 3, 06, 3);
insert into Resultado values(4, 801007890, 3, 07, 1);
insert into Resultado values(4, 801007890, 3, 07, 2);
insert into Resultado values(3, 801007890, 3, 07, 3);
insert into Resultado values(4, 801007890, 3, 08, 1);
insert into Resultado values(4, 801007890, 3, 08, 2);
insert into Resultado values(4, 801007890, 3, 08, 3);
insert into Resultado values(3, 801007890, 3, 08, 4);
insert into Resultado values(3, 801007890, 3, 09, 1);
insert into Resultado values(4, 801007890, 3, 09, 2);
insert into Resultado values(3, 801007890, 3, 09, 3);
insert into Resultado values(4, 801007890, 3, 10, 1);
insert into Resultado values(4, 801007890, 3, 10, 2);
insert into Resultado values(4, 801007890, 3, 10, 3);


insert into Resultado values(3, 801012345, 1, 01, 1);
insert into Resultado values(3, 801012345, 1, 01, 2);
insert into Resultado values(2, 801012345, 1, 01, 3);
insert into Resultado values(3, 801012345, 1, 01, 4);
insert into Resultado values(3, 801012345, 1, 02, 1);
insert into Resultado values(2, 801012345, 1, 02, 2);
insert into Resultado values(3, 801012345, 1, 02, 3);
insert into Resultado values(2, 801012345, 1, 03, 1);
insert into Resultado values(2, 801012345, 1, 03, 2);
insert into Resultado values(1, 801012345, 1, 03, 3);
insert into Resultado values(2, 801012345, 1, 03, 4);
insert into Resultado values(3, 801012345, 1, 04, 1);
insert into Resultado values(3, 801012345, 1, 04, 2);
insert into Resultado values(2, 801012345, 1, 04, 3);
insert into Resultado values(2, 801012345, 1, 04, 4);
insert into Resultado values(3, 801012345, 1, 05, 1);
insert into Resultado values(3, 801012345, 1, 05, 2);
insert into Resultado values(2, 801012345, 1, 05, 3);
insert into Resultado values(3, 801012345, 1, 06, 1);
insert into Resultado values(3, 801012345, 1, 06, 2);
insert into Resultado values(4, 801012345, 1, 06, 3);
insert into Resultado values(3, 801012345, 1, 07, 1);
insert into Resultado values(2, 801012345, 1, 07, 2);
insert into Resultado values(2, 801012345, 1, 07, 3);
insert into Resultado values(2, 801012345, 1, 08, 1);
insert into Resultado values(3, 801012345, 1, 08, 2);
insert into Resultado values(2, 801012345, 1, 08, 3);
insert into Resultado values(2, 801012345, 1, 08, 4);
insert into Resultado values(3, 801012345, 1, 09, 1);
insert into Resultado values(3, 801012345, 1, 09, 2);
insert into Resultado values(1, 801012345, 1, 09, 3);
insert into Resultado values(3, 801012345, 1, 10, 1);
insert into Resultado values(3, 801012345, 1, 10, 2);
insert into Resultado values(3, 801012345, 1, 10, 3);


insert into Resultado values(3, 801012345, 2, 01, 1);
insert into Resultado values(3, 801012345, 2, 01, 2);
insert into Resultado values(3, 801012345, 2, 01, 3);
insert into Resultado values(4, 801012345, 2, 01, 4);
insert into Resultado values(3, 801012345, 2, 02, 1);
insert into Resultado values(3, 801012345, 2, 02, 2);
insert into Resultado values(4, 801012345, 2, 02, 3);
insert into Resultado values(3, 801012345, 2, 03, 1);
insert into Resultado values(3, 801012345, 2, 03, 2);
insert into Resultado values(2, 801012345, 2, 03, 3);
insert into Resultado values(3, 801012345, 2, 03, 4);
insert into Resultado values(4, 801012345, 2, 04, 1);
insert into Resultado values(4, 801012345, 2, 04, 2);
insert into Resultado values(3, 801012345, 2, 04, 3);
insert into Resultado values(2, 801012345, 2, 04, 4);
insert into Resultado values(4, 801012345, 2, 05, 1);
insert into Resultado values(4, 801012345, 2, 05, 2);
insert into Resultado values(3, 801012345, 2, 05, 3);
insert into Resultado values(4, 801012345, 2, 06, 1);
insert into Resultado values(3, 801012345, 2, 06, 2);
insert into Resultado values(4, 801012345, 2, 06, 3);
insert into Resultado values(4, 801012345, 2, 07, 1);
insert into Resultado values(3, 801012345, 2, 07, 2);
insert into Resultado values(3, 801012345, 2, 07, 3);
insert into Resultado values(3, 801012345, 2, 08, 1);
insert into Resultado values(4, 801012345, 2, 08, 2);
insert into Resultado values(3, 801012345, 2, 08, 3);
insert into Resultado values(3, 801012345, 2, 08, 4);
insert into Resultado values(3, 801012345, 2, 09, 1);
insert into Resultado values(4, 801012345, 2, 09, 2);
insert into Resultado values(2, 801012345, 2, 09, 3);
insert into Resultado values(4, 801012345, 2, 10, 1);
insert into Resultado values(4, 801012345, 2, 10, 2);
insert into Resultado values(4, 801012345, 2, 10, 3);


insert into Resultado values(4, 801012345, 3, 01, 1);
insert into Resultado values(4, 801012345, 3, 01, 2);
insert into Resultado values(4, 801012345, 3, 01, 3);
insert into Resultado values(4, 801012345, 3, 01, 4);
insert into Resultado values(4, 801012345, 3, 02, 1);
insert into Resultado values(4, 801012345, 3, 02, 2);
insert into Resultado values(4, 801012345, 3, 02, 3);
insert into Resultado values(4, 801012345, 3, 03, 1);
insert into Resultado values(4, 801012345, 3, 03, 2);
insert into Resultado values(4, 801012345, 3, 03, 3);
insert into Resultado values(3, 801012345, 3, 03, 4);
insert into Resultado values(4, 801012345, 3, 04, 1);
insert into Resultado values(4, 801012345, 3, 04, 2);
insert into Resultado values(3, 801012345, 3, 04, 3);
insert into Resultado values(4, 801012345, 3, 04, 4);
insert into Resultado values(4, 801012345, 3, 05, 1);
insert into Resultado values(4, 801012345, 3, 05, 2);
insert into Resultado values(4, 801012345, 3, 05, 3);
insert into Resultado values(4, 801012345, 3, 06, 1);
insert into Resultado values(4, 801012345, 3, 06, 2);
insert into Resultado values(4, 801012345, 3, 06, 3);
insert into Resultado values(4, 801012345, 3, 07, 1);
insert into Resultado values(4, 801012345, 3, 07, 2);
insert into Resultado values(3, 801012345, 3, 07, 3);
insert into Resultado values(4, 801012345, 3, 08, 1);
insert into Resultado values(4, 801012345, 3, 08, 2);
insert into Resultado values(4, 801012345, 3, 08, 3);
insert into Resultado values(3, 801012345, 3, 08, 4);
insert into Resultado values(4, 801012345, 3, 09, 1);
insert into Resultado values(4, 801012345, 3, 09, 2);
insert into Resultado values(3, 801012345, 3, 09, 3);
insert into Resultado values(4, 801012345, 3, 10, 1);
insert into Resultado values(4, 801012345, 3, 10, 2);
insert into Resultado values(4, 801012345, 3, 10, 3);


insert into Resultado values(2, 801005678, 1, 01, 1);
insert into Resultado values(1, 801005678, 1, 01, 2);
insert into Resultado values(2, 801005678, 1, 01, 3);
insert into Resultado values(2, 801005678, 1, 01, 4);
insert into Resultado values(1, 801005678, 1, 02, 1);
insert into Resultado values(1, 801005678, 1, 02, 2);
insert into Resultado values(1, 801005678, 1, 02, 3);
insert into Resultado values(2, 801005678, 1, 03, 1);
insert into Resultado values(0, 801005678, 1, 03, 2);
insert into Resultado values(2, 801005678, 1, 03, 3);
insert into Resultado values(1, 801005678, 1, 03, 4);
insert into Resultado values(1, 801005678, 1, 04, 1);
insert into Resultado values(1, 801005678, 1, 04, 2);
insert into Resultado values(1, 801005678, 1, 04, 3);
insert into Resultado values(1, 801005678, 1, 04, 4);
insert into Resultado values(1, 801005678, 1, 05, 1);
insert into Resultado values(2, 801005678, 1, 05, 2);
insert into Resultado values(2, 801005678, 1, 05, 3);
insert into Resultado values(2, 801005678, 1, 06, 1);
insert into Resultado values(3, 801005678, 1, 06, 2);
insert into Resultado values(2, 801005678, 1, 06, 3);
insert into Resultado values(2, 801005678, 1, 07, 1);
insert into Resultado values(1, 801005678, 1, 07, 2);
insert into Resultado values(1, 801005678, 1, 07, 3);
insert into Resultado values(1, 801005678, 1, 08, 1);
insert into Resultado values(1, 801005678, 1, 08, 2);
insert into Resultado values(1, 801005678, 1, 08, 3);
insert into Resultado values(1, 801005678, 1, 08, 4);
insert into Resultado values(1, 801005678, 1, 09, 1);
insert into Resultado values(1, 801005678, 1, 09, 2);
insert into Resultado values(1, 801005678, 1, 09, 3);
insert into Resultado values(1, 801005678, 1, 10, 1);
insert into Resultado values(4, 801005678, 1, 10, 2);
insert into Resultado values(2, 801005678, 1, 10, 3);


insert into Resultado values(3, 801005678, 2, 01, 1);
insert into Resultado values(2, 801005678, 2, 01, 2);
insert into Resultado values(3, 801005678, 2, 01, 3);
insert into Resultado values(3, 801005678, 2, 01, 4);
insert into Resultado values(2, 801005678, 2, 02, 1);
insert into Resultado values(2, 801005678, 2, 02, 2);
insert into Resultado values(2, 801005678, 2, 02, 3);
insert into Resultado values(2.5, 801005678, 2, 03, 1);
insert into Resultado values(2, 801005678, 2, 03, 2);
insert into Resultado values(3, 801005678, 2, 03, 3);
insert into Resultado values(2.5, 801005678, 2, 03, 4);
insert into Resultado values(2, 801005678, 2, 04, 1);
insert into Resultado values(2, 801005678, 2, 04, 2);
insert into Resultado values(2.5, 801005678, 2, 04, 3);
insert into Resultado values(1, 801005678, 2, 04, 4);
insert into Resultado values(3, 801005678, 2, 05, 1);
insert into Resultado values(2, 801005678, 2, 05, 2);
insert into Resultado values(2.5, 801005678, 2, 05, 3);
insert into Resultado values(3, 801005678, 2, 06, 1);
insert into Resultado values(3, 801005678, 2, 06, 2);
insert into Resultado values(3, 801005678, 2, 06, 3);
insert into Resultado values(2.5, 801005678, 2, 07, 1);
insert into Resultado values(1.5, 801005678, 2, 07, 2);
insert into Resultado values(1, 801005678, 2, 07, 3);
insert into Resultado values(2.5, 801005678, 2, 08, 1);
insert into Resultado values(2, 801005678, 2, 08, 2);
insert into Resultado values(2.5, 801005678, 2, 08, 3);
insert into Resultado values(2.5, 801005678, 2, 08, 4);
insert into Resultado values(2, 801005678, 2, 09, 1);
insert into Resultado values(3, 801005678, 2, 09, 2);
insert into Resultado values(3, 801005678, 2, 09, 3);
insert into Resultado values(1, 801005678, 2, 10, 1);
insert into Resultado values(4, 801005678, 2, 10, 2);
insert into Resultado values(3, 801005678, 2, 10, 3);


insert into Resultado values(4, 801005678, 3, 01, 1);
insert into Resultado values(3, 801005678, 3, 01, 2);
insert into Resultado values(4, 801005678, 3, 01, 3);
insert into Resultado values(4, 801005678, 3, 01, 4);
insert into Resultado values(3, 801005678, 3, 02, 1);
insert into Resultado values(4, 801005678, 3, 02, 2);
insert into Resultado values(3, 801005678, 3, 02, 3);
insert into Resultado values(3.5, 801005678, 3, 03, 1);
insert into Resultado values(3, 801005678, 3, 03, 2);
insert into Resultado values(3, 801005678, 3, 03, 3);
insert into Resultado values(3, 801005678, 3, 03, 4);
insert into Resultado values(3, 801005678, 3, 04, 1);
insert into Resultado values(3, 801005678, 3, 04, 2);
insert into Resultado values(3.5, 801005678, 3, 04, 3);
insert into Resultado values(1.5, 801005678, 3, 04, 4);
insert into Resultado values(3.5, 801005678, 3, 05, 1);
insert into Resultado values(3.5, 801005678, 3, 05, 2);
insert into Resultado values(3.5, 801005678, 3, 05, 3);
insert into Resultado values(4, 801005678, 3, 06, 1);
insert into Resultado values(4, 801005678, 3, 06, 2);
insert into Resultado values(4, 801005678, 3, 06, 3);
insert into Resultado values(2.75, 801005678, 3, 07, 1);
insert into Resultado values(2, 801005678, 3, 07, 2);
insert into Resultado values(2, 801005678, 3, 07, 3);
insert into Resultado values(3.5, 801005678, 3, 08, 1);
insert into Resultado values(3, 801005678, 3, 08, 2);
insert into Resultado values(3, 801005678, 3, 08, 3);
insert into Resultado values(3, 801005678, 3, 08, 4);
insert into Resultado values(3, 801005678, 3, 09, 1);
insert into Resultado values(3.5, 801005678, 3, 09, 2);
insert into Resultado values(3.5, 801005678, 3, 09, 3);
insert into Resultado values(2.5, 801005678, 3, 10, 1);
insert into Resultado values(4, 801005678, 3, 10, 2);
insert into Resultado values(4, 801005678, 3, 10, 3);

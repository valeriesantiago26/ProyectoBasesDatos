<?php

  if(!empty($_POST))
  {

   // variables for input data
    $numEst= $_POST['NumEstudiante'];
    $nombreEst = $_POST['Nombre'];
    $especialidadEst = $_POST['Especialidad'];
    $nivelEst = $_POST['Nivel'];
    $anoAcademico = $_POST['AnoAcademico'];
    $semestre = $_POST['Semestre'];
    $horas = $_POST['Horas'];

    $centroID= $_POST['CentroPractica'];
    $nombreCentro= $_POST['NombreEscuela'];
    $tipo= $_POST['TipoCentroPractica'];
    $regioN= $_POST['Region'];
    $director= $_POST['Director'];
    $anoComienCentro= $_POST['AnoComienzoCentro'];
    $nivelEscuela= $_POST['NivelEscuela'];

    $nombreMaestro = $_POST['MaestroCoop'];
    $maestroID= $_POST['MaestroCoopID'];
    $especialidadMaestro= $_POST['EspecialidadMaestro'];
    $anoComienzoMaestro=$_POST['AnoComienzoMaestro'];
    $anoCurso= $_POST['AnoCursoMaestro'];
    $nivelMaestro= $_POST['NivelMaestro'];

    $nombreSupervisor = $_POST['Supervisor'];
    $supervisorID= $_POST['SupervisorID'];
    $especialidadSupervisor= $_POST['EspecialidadSupervisor'];

   // variables for input data
   
   // sql query for inserting data into database  
       
   $servername = "localhost:8889";
   $username = "root";
   $password = "root";
   $dbname = "proyectoFinal";

    if ($valid) {
      $conn =  new mysqli($servername, $username, $password, $dbname);
      echo "Se Conectó ";

      if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      } 
   

      $query_Supervisor= "INSERT INTO Supervisor (NumSupervisor, NombreSupervisor, EspecialidadSupervisor) VALUES('$supervisorID', '$nombreSupervisor', '$especialidadSupervisor')";

      $query_Centro= "INSERT INTO CentroDePractica (CentroPracID, NombreEscuela, tipo, region, director, AnoDeComienzo, NivelEscuela) VALUES('$centroID', '$nombreCentro', '$tipo', '$regioN', '$director', '$anoComienCentro', '$nivelEscuela')";

      $query_Maestro= "INSERT INTO MaestroCooperador (MaestroCoopID, EscuelaID, NombreMaestro, EspecialidadMaestro, AnoComienzo, AnoCurso, NivelMaestro) VALUES('$maestroID', '$centroID', '$nombreMaestro', '$especialidadMaestro', '$anoComienzoMaestro', '$anoCurso', '$nivelMaestro')";

      $query_Est = "INSERT INTO Estudiante (NumEst, NombreEst, EspecialidadEst, NivelEst, CentroPracID, AnoAcademico, Semestre, MaestroCoopID, NumSupervisor, CantidadHoras) VALUES('$numEst','$nombreEst','$especialidadEst', '$nivelEst', '$centroID', '$anoAcademico', '$semestre', '$maestroID', '$supervisorID', '$horas')";

      if ($conn->query($query_Supervisor) && $conn->query($query_Centro) && $conn->query($query_Maestro) && $conn->query($query_Est) ) {
          echo "New student created successfully";
      } else {
          echo "Error: " . $query_Est . "<br>" . $conn->error;
      }

      $conn->close();
    
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Practica Docente</title>
  <link rel="stylesheet" type="text/css" href="http://bootswatch.com/simplex/bootstrap.css">
</head>
<body>

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Práctica Docente</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="read_competencias.php">Competencias</a></li>
              <li><a href="read_centros.php">Centros de Práctica</a></li>
              <li><a href="read_maestros.php">Maestros Cooperadores</a></li>
              <li><a href="read_supervisores.php">Supervisores</a></li>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="create1.php">Nuevo Estudiante</a></li>
              <li><a href="competencia.php"> Nuevas Competencias</a></li>
            </ul>

            </ul>
          </div>
      </div>
    </nav>   


    <div class="alert alert-dismissible alert-success" align="center">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Estudiante Guardado</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
    </div>

</body>
</html>
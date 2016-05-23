<?php

  if(!empty($_POST))
  {
   // variables for input data
    $compeID= $_POST['competenciaId'];
    $descripcionCompe = $_POST['competenciaDescripcion'];
    $compoID = $_POST['componenteId'];
    $descripcionCompo = $_POST['componenteDescripcion'];

   // variables for input data
   
   // sql query for inserting data into database  
       
   $valid = true;
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
      

      $query_Competencia0= "SELECT CompetenciaID FROM Competencia WHERE CompetenciaID = $compeID";
      $result= $conn->query($query_Competencia0);

      if ($result->num_rows > 0) {

        $query_Componente= "INSERT INTO Componente (ComponenteID, CompetenciaID, DescripcionComponente) VALUES('$compoID', '$compeID', '$descripcionCompo')";

        $result_componente= $conn->query($query_Componente);
      }
      else{
        $query_Competencia= "INSERT INTO Competencia (CompetenciaID, DescripcionCompetencia) VALUES('$compeID', '$descripcionCompe')";

        $query_Componente= "INSERT INTO Componente (ComponenteID, CompetenciaID, DescripcionComponente) VALUES('$compoID', '$compeID', '$descripcionCompo')";


        if ($conn->query($query_Competencia) && $conn->query($query_Componente)) {
            echo "Competencia creada";
          } else {
              echo "Error: " . $query_Componente . "<br>" . $conn->error;
          }

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
      <strong>Competencia creada.</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
    </div>



</body>
</html>
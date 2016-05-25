<?php


  if(!empty($_POST))
  {
   // variables for input data
    $compeID= $_POST['competenciaId'];
    $compoID = $_POST['componenteId'];
    $numEstudiante= $_POST['NumEstudiante'];
    $fecha= $_POST['fecha'];
    $evaluacion= $_POST['evaluacionId'];
    $valor= $_POST['valor'];

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

      $query_Evaluacion0= "SELECT NumEstudiante, EvaluacionID FROM Evaluacion WHERE NumEstudiante = $numEstudiante and EvaluacionID= $evaluacion";
      $result= $conn->query($query_Evaluacion0);

      if ($result->num_rows > 0) {
        echo "Evaluacion already exists";

        $query_Resultado= "INSERT INTO Resultado (Valor, NumEstud, EvaluacionID, CompetenciaID, ComponenteID) VALUES('$valor', '$numEstudiante', '$evaluacion', '$compeID', '$compoID')";

        // $result_resultado= mysqli_query($conn, $query_Resultado);

        if ($conn->query($query_Resultado)) {
              echo "Evaluación creada";
          } else {
              echo "Error: " . $query_Resultado . "<br>" . $conn->error;
          }
      }
      else{
        echo "else ";
        $query_Evaluacion= "INSERT INTO Evaluacion (NumEstudiante, EvaluacionID, Fecha) VALUES('$numEstudiante', '$evaluacion', '$fecha')";

        $query_Resultado= "INSERT INTO Resultado (Valor, NumEstud, EvaluacionID, CompetenciaID, ComponenteID) VALUES('$valor', '$numEstudiante', '$evaluacion', '$compeID', '$compoID')";


       if ($conn->query($query_Evaluacion) && $conn->query($query_Resultado)) {
              echo "Evaluación creada";
          } else {
              echo "Error: " . $query_Resultado . "<br>" . $conn->error;
          }

      }

      $conn->close();
    
      echo "se desconectó";
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
      <strong>Evaluación creada.</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
    </div>


</body>
</html>
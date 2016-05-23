<?php 

    $servername = "localhost:8889";
    $username = "root";
    $password = "root";
    $dbname = "proyectoFinal";

    $id = null;
    if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
    }
    
    $conn =  new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT *
      FROM ((Estudiante Natural join MaestroCooperador) join CentroDePractica on Estudiante.CentroPracID = CentroDePractica.CentroPracID) join Supervisor on Estudiante.NumSupervisor = Supervisor.NumSupervisor WHERE NumEst= $id";
    $result=mysqli_query($conn,$sql);
    $data= mysqli_fetch_array($result);

    
    $conn->close();

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
              <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
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

  <form class="form-horizontal" method="post" action="read.php">
  <fieldset>
    <legend><?php echo $data['NombreEst'];?></legend>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label"># Estudiante</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['NumEst'];?>">  
        </div>
      </div>


      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Nombre</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['NombreEst'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Especialidad del Estudiante</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['EspecialidadEst'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Nivel</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['NivelEst'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Centro de Práctica ID</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['CentroPracID'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Centro de Práctica</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['NombreEscuela'];?>">  
        </div>
      </div>


      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Año Académico</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['AnoAcademico'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Semestre</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['Semestre'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Maestro Cooperador ID</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['MaestroCoopID'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Maestro Cooperador</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['NombreMaestro'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Supervisor ID</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['NumSupervisor'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Supervisor</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['NombreSupervisor'];?>">  
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label">Cantidad de Horas</label>
        <div class="col-lg-10 controls">
            <input class="form-control" id="focusedInput" type="text" value=" <?php echo $data['CantidadHoras'];?>">  
        </div>
      </div>

        <div class="form-actions">
          <a class="btn btn-success" href="index.php">Regresar</a>
          <a class="btn btn-warning" href="evaluacion.php?id= <?php echo $data['NumEst'];?>">Añadir Evaluación</a>
          <a href="read_evaluacion.php?id= <?php echo $data['NumEst'];?>" class="btn btn-info">Ver Evaluaciones</a>
        </div>
      </div>
    </fieldset>
  </form>


</body>
</html>
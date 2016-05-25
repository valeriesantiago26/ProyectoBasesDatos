<?php 
  $id = 0;
  
  if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
  }
  
  if ( !empty($_POST)) {

    $servername = "localhost:8889";
    $username = "root";
    $password = "root";
    $dbname = "proyectoFinal";

    $conn =  new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $borrar_resultado= "DELETE FROM Resultado  WHERE NumEstud = $id";
    $borrar_evaluacion= "DELETE FROM Evaluacion  WHERE NumEstudiante = $id";
    $borrar_est = "DELETE FROM Estudiante  WHERE NumEst = $id";

    if ($conn->query($borrar_resultado) && $conn->query($borrar_evaluacion) && $conn->query($borrar_est) ) {
          echo "Estudiante borrado";
      } else {
          echo "Error: " . $borrar_est . "<br>" . $conn->error;
      }

    $conn->close();
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

	<div class="container">
		<div class="span10 offset1">
			<div class="row">
    			<h3>Borrar un estudiante</h3>
    		</div>
    		
			<form class="form-horizontal" method="post" action="delete.php?id=<?php echo $id;?>">
			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
			  <p class="alert alert-error">¿Seguro que quieres borrar?</p>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-danger" href="index.php">Sí</button>
				  <a class="btn btn-info" href="index.php">No</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>

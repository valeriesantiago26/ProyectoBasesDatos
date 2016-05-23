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

    $nombre1= "SELECT * FROM Estudiante WHERE NumEst= $id";
    $result_nombre= mysqli_query($conn,$nombre);
    $nombre= mysqli_fetch_array($result_nombre);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM CentroDePractica";

    $result=mysqli_query($conn,$sql);

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
              <li><a href="index.php">Home </a></li>
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

    <h2>Hola <?php echo $nombre[0]; ?></h2>
   
    <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>ID Centro de Práctica</th>
            <th>Nombre de la escuela</th>
            <th>Tipo</th>
            <th>Región</th>
            <th>Director</th>
            <th>Año de Comienzo</th>
            <th>Nivel de la escuela</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while ($data= mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>'. $data['CentroPracID'] . '</td>';
                echo '<td>'. $data['NombreEscuela'] . '</td>';
                echo '<td>'. $data['tipo'] . '</td>';
                echo '<td>'. $data['region'] . '</td>';
                echo '<td>'. $data['director'] . '</td>';
                echo '<td>'. $data['AnoDeComienzo'] . '</td>';
                echo '<td>'. $data['NivelEscuela'] . '</td>'; 
                echo '</tr>';
          }
          $conn->close();
        ?>
        </tbody>
    </table> 

</body>
</html>
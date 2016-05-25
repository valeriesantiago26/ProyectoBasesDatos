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

        <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Número De Estudiante</th>
                <th>Especialidad</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php

              $servername = "localhost:8889";
              $username = "root";
              $password = "root";
              $dbname = "proyectoFinal";

              $conn =  new mysqli($servername, $username, $password, $dbname);

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
             
              $sql = "SELECT * FROM Estudiante";
              $result=mysqli_query($conn,$sql);

              while ($row= mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>'. $row[1] . '</td>';
                    echo '<td>'. $row[0] . '</td>';
                    echo '<td>'. $row[2] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn btn-info" href="read.php?id='.$row['NumEst'].'">Ver</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="update.php?id='.$row['NumEst'].'">Editar</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-primary" href="delete.php?id='.$row['NumEst'].'">Borrar</a>';
                    echo '</td>';
                    echo '</tr>';
              }
              $conn->close();
            ?>
            </tbody>
          </table> 
        
      </body>
</html>

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
    echo "Se Conectó ";

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT *
      FROM ((Estudiante Natural join MaestroCooperador) join CentroDePractica on Estudiante.CentroPracID = CentroDePractica.CentroPracID) join Supervisor on Estudiante.NumSupervisor = Supervisor.NumSupervisor WHERE NumEst= $id";
    $result=mysqli_query($conn,$sql);
    $data= mysqli_fetch_array($result);
    
    $conn->close();
    echo "se desconecto";

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

  <form class="form-horizontal" method="post" action="save_update.php">
    <fieldset>
      <legend><?php echo $data['NombreEst'];?></legend>

      <div class="form-group"  align="center">
        <label for="inputStudentNum" class="col-lg-2 control-label"># Estudiante</label>
        <div class="col-lg-10 controls">
          <input type="text" class="form-control" id="inputStudentNum" name="NumEstudiante" value="<?php echo $data['NumEst'];?>">
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="inputName" class="col-lg-2 control-label">Nombre</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="Nombre" value=" <?php echo $data['NombreEst'];?>">
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="select" class="col-lg-2 control-label">Especialidad del Estudiante</label>
        <div class="col-lg-10">
          <select class="form-control" name="Especialidad" id="select" >
            <option selected="selected"><?php echo $data['EspecialidadEst'];?></option>
            <option>Preescolar</option>
            <option>Kinder a Tercero</option>
            <option>4-6 Ciencia</option>
            <option>4-6 Sociales</option>
            <option>4-6 Español</option>
            <option>4-6 Matemática</option>
            <option>Inglés Elemental</option>
            <option>Educación Especial-Retardo</option>
            <option>Educación Especial-Impedimento Visual</option>
            <option>Educación Especial-Sordo</option>
            <option>Educación Especial-Problemas especificos de aprendizaje</option>
            <option>Educación Especial-Disturbio</option>
             <option>Español</option>
            <option>Matemática</option>
            <option>Ciencia General</option>
            <option>Biología</option>
            <option>Física</option>
            <option>Química</option>
            <option>Historia-Estudios Sociales</option>
            <option>Educación Comercial</option>
            <option>Inglés</option>
            <option>Educación Física</option>
            <option>Arte</option>
            <option>Música</option>
            <option>Teatro</option>
            <option>Ecología Familiar</option>
          </select>
        </div>
      </div>

      <div class="form-group"  align="center">
        <label for="select" class="col-lg-2 control-label">Nivel del Estudiante</label>
        <div class="col-lg-10">
          <select class="form-control" name="Nivel" id="select">
            <option selected="selected"><?php echo $data['NivelEst'];?></option>
            <option>Preescolar</option>
            <option>Elemental</option>
            <option>Secundaria</option>
          </select>
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="select" class="col-lg-2 control-label">Año Académico</label>
        <div class="col-lg-10">
          <select class="form-control" name="AnoAcademico" id="select">
          <option selected="selected"><?php echo $data['AnoAcademico'];?></option>
            <option>2013</option>
            <option>2014</option>
            <option>2015</option>
            <option>2016</option>
            <option>2017</option>
          </select>
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="select" class="col-lg-2 control-label">Semestre</label>
        <div class="col-lg-10">
          <select class="form-control" name="Semestre" id="select">
          <option selected="selected"><?php echo $data['Semestre'];?></option>
            <option>Fall</option>
            <option>Spring</option>
          </select>
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputHours" class="col-lg-2 control-label">Cantidad de Horas</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="Horas" value="<?php echo $data['CantidadHoras'];?>">
        </div>
      </div>


      <legend>Centro de Práctica</legend>
      
      <div class="form-group" align="center">
        <label for="inputCentroPractica" class="col-lg-2 control-label"> ID Centro De Práctica</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="CentroPractica" value="<?php echo $data['CentroPracID'];?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputNombreEscuela" class="col-lg-2 control-label">Nombre</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="NombreEscuela" value="<?php echo $data['NombreEscuela']?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="select" class="col-lg-2 control-label">Tipo</label>
        <div class="col-lg-10">
          <select class="form-control" name="TipoCentroPractica" id="select">
          <option selected="selected"><?php echo $data['tipo']?></option>
            <option>Privada</option>
            <option>Pública</option>
          </select>
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputCentroPractica" class="col-lg-2 control-label">Región</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="Region" value="<?php echo $data['region']?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputCentroPractica" class="col-lg-2 control-label">Director</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="Director" value="<?php echo $data['director']?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="select" class="col-lg-2 control-label">Año de Comienzo</label>
        <div class="col-lg-10">
          <select class="form-control" name="AnoComienzoCentro" id="select">
          <option><?php echo $data['AnoDeComienzo']?></option>
            <option>2013</option>
            <option>2014</option>
            <option>2015</option>
            <option>2016</option>
            <option>2017</option>
          </select>
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputCentroPractica" class="col-lg-2 control-label">Nivel de la Escuela</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="NivelEscuela" value="<?php echo $data['NivelEscuela']?>">
        </div>
      </div>


      <legend>Maestro Cooperador</legend>

      <div class="form-group" align="center">
        <label for="inputMaestroCoopID" class="col-lg-2 control-label">ID Maestro Cooperador</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="MaestroCoopID" value="<?php echo $data['MaestroCoopID']?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputMaestroCoop" class="col-lg-2 control-label">Nombre</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="MaestroCoop" value="<?php echo $data['NombreMaestro']?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputEspecMaestro" class="col-lg-2 control-label">Especialidad del Maestro</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="EspecialidadMaestro" value="<?php echo $data['EspecialidadMaestro']?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="select" class="col-lg-2 control-label">Año de Comienzo</label>
        <div class="col-lg-10">
          <select class="form-control" name="AnoComienzoMaestro" id="select">
          <option selected="selected"><?php echo $data['AnoComienzo']?></option>
            <option>2013</option>
            <option>2014</option>
            <option>2015</option>
            <option>2016</option>
            <option>2017</option>
          </select>
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="select" class="col-lg-2 control-label">Año de Curso</label>
        <div class="col-lg-10">
          <select class="form-control" name="AnoCursoMaestro" id="select">
          <option selected="selected"><?php echo $data['AnoCurso']?></option>
            <option>2013</option>
            <option>2014</option>
            <option>2015</option>
            <option>2016</option>
            <option>2017</option>
          </select>
        </div>
      </div>
      
      <div class="form-group" align="center">
        <label for="inputHours" class="col-lg-2 control-label">Nivel del Maestro</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="NivelMaestro" value="<?php echo $data['NivelMaestro']?>">
        </div>
      </div>


      <legend>Supervisor de Práctica</legend>

      <div class="form-group" align="center">
        <label for="inputSupervisorID" class="col-lg-2 control-label">ID Supervisor</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="SupervisorID" value="<?php echo $data['NumSupervisor']?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputMaestroCoop" class="col-lg-2 control-label">Nombre Supervisor</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="Supervisor" value="<?php echo $data['NombreSupervisor']?>">
        </div>
      </div>

      <div class="form-group" align="center">
        <label for="inputEspecMaestro" class="col-lg-2 control-label">Especialidad del Supervisor</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="EspecialidadSupervisor" value="<?php echo $data['EspecialidadSupervisor']?>">
        </div>
      </div>
    </fieldset>
  </form>

    <div class="form-actions">
      <div class="col-lg-10 col-lg-offset-2">
        <a class="btn btn-info" href="index.php">Regresar</a>
        <a type="reset" class="btn btn-default" href="update.php">Cancelar</a>
        <button type="submit" name="btn-submit" class="btn btn-primary" href="save_update.php">Enviar</button>
      </div>
    </div>
    </fieldset>
  </form>

</body>
</html>
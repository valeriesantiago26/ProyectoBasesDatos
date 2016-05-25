<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Practica Docente</title>
    <link rel="stylesheet" type="text/css" href="http://bootswatch.com/simplex/bootstrap.css"></head>

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
              <li ><a href="index.php">Home </a></li>
              <li><a href="read_competencias.php">Competencias</a></li>
              <li><a href="read_centros.php">Centros de Práctica</a></li>
              <li><a href="read_maestros.php">Maestros Cooperadores</a></li>
              <li><a href="read_supervisores.php">Supervisores</a></li>

            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="create1.php">Nuevo Estudiante <span class="sr-only">(current)</span></a></li>
              <li><a href="competencia.php"> Nuevas Competencias</a></li>
            </ul>

            </ul>
          </div>
      </div>
    </nav>   

 <form class="form-horizontal" method="post" action="save_create.php">
  <fieldset>
    <legend>Nuevo Estudiante</legend>

    <div class="form-group"  align="center">
      <label for="inputStudentNum" class="col-lg-2 control-label">Número del Estudiante</label>
      <div class="col-lg-10 controls">
        <input type="text" class="form-control" id="inputStudentNum" name="NumEstudiante" placeholder="801-xx-xxxx">
      </div>
    </div>

    <div class="form-group"  align="center">
      <label for="inputName" class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="Nombre" placeholder="Sam Smith">
      </div>
    </div>

    <div class="form-group"  align="center">
      <label for="select" class="col-lg-2 control-label">Especialidad del Estudiante</label>
      <div class="col-lg-10">
        <select class="form-control" name="Especialidad" id="select">
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
          <option>Primer</option>
          <option>Segundo</option>
        </select>
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="inputHours" class="col-lg-2 control-label">Cantidad de Horas</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="Horas" placeholder="Hours">
      </div>
    </div>


    <legend>Centro de Práctica</legend>
    
    <div class="form-group" align="center">
      <label for="inputCentroPractica" class="col-lg-2 control-label"> ID Centro De Práctica</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="CentroPractica" placeholder="7890">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="inputNombreEscuela" class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="NombreEscuela" placeholder="UHS">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="select" class="col-lg-2 control-label">Tipo</label>
      <div class="col-lg-10">
        <select class="form-control" name="TipoCentroPractica" id="select">
          <option>Privada</option>
          <option>Pública</option>
        </select>
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="inputCentroPractica" class="col-lg-2 control-label">Región</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="Region" placeholder="Bayamón">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="inputCentroPractica" class="col-lg-2 control-label">Director</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="Director" placeholder="Ada Rivera">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="select" class="col-lg-2 control-label">Año de Comienzo</label>
      <div class="col-lg-10">
        <select class="form-control" name="AnoComienzoCentro" id="select">
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
        <input type="text" class="form-control" name="NivelEscuela" placeholder="nivel">
      </div>
    </div>


    <legend>Maestro Cooperador</legend>

    <div class="form-group" align="center">
      <label for="inputMaestroCoopID" class="col-lg-2 control-label">ID Maestro Cooperador</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="MaestroCoopID" placeholder="4560">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="inputMaestroCoop" class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="MaestroCoop" placeholder="Jorge Piñero">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="inputEspecMaestro" class="col-lg-2 control-label">Especialidad del Maestro</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="EspecialidadMaestro" placeholder="____">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="select" class="col-lg-2 control-label">Año de Comienzo</label>
      <div class="col-lg-10">
        <select class="form-control" name="AnoComienzoMaestro" id="select">
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
        <input type="text" class="form-control" name="NivelMaestro" placeholder="NivelMaestro">
      </div>
    </div>


    <legend>Supervisor de Práctica</legend>

    <div class="form-group" align="center">
      <label for="inputSupervisorID" class="col-lg-2 control-label">ID Supervisor</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="SupervisorID" placeholder="4560">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="inputMaestroCoop" class="col-lg-2 control-label">Nombre Supervisor</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="Supervisor" placeholder="Jorge Piñero">
      </div>
    </div>

    <div class="form-group" align="center">
      <label for="inputEspecMaestro" class="col-lg-2 control-label">Especialidad del Supervisor</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="EspecialidadSupervisor" placeholder="____">
      </div>
    </div>



    <div class="form-actions">
      <div class="col-lg-10 col-lg-offset-2">
      	<a class="btn btn-info" href="index.php">Regresar</a>
        <a type="reset" class="btn btn-default" href="create1.php">Cancelar</a>
        <button type="submit" name="btn-submit" class="btn btn-primary" href="create1.php">Enviar</button>
      </div>
    </div>
    </fieldset>
  </form>



</body>
</html>
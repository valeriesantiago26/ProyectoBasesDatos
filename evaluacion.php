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

  <form class="form-horizontal" method="post" action="save_evaluacion.php">
  <fieldset>
    <legend>Evaluación</legend>

    <div class="form-group"  align="center">
      <label for="inputStudentNum" class="col-lg-2 control-label">Número del Estudiante</label>
      <div class="col-lg-10 controls">
        <input type="text" class="form-control" id="inputStudentNum" name="NumEstudiante" value="<?php if (!empty($_GET['id'])) { $id = $_REQUEST['id']; } echo $id ?>">
      </div>
    </div>

    <div class="form-group"  align="center">
      <label for="select" class="col-lg-2 control-label"># Evaluación</label>
      <div class="col-lg-10">
        <select class="form-control" name="evaluacionId" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
      </div>
    </div>

    <div class="form-group"  align="center">
      <label for="inputStudentNum" class="col-lg-2 control-label">Fecha</label>
      <div class="col-lg-10 controls">
        <input type="date" class="form-control" id="inputStudentNum" name="fecha" placeholder="2016-05-22">
      </div>
    </div>


    <legend>Resultados</legend>


    <div class="form-group"  align="center">
      <label for="select" class="col-lg-2 control-label"># Competencia</label>
      <div class="col-lg-10">
        <select class="form-control" name="competenciaId" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
        </select>
      </div>
    </div>

        <div class="form-group"  align="center">
      <label for="select" class="col-lg-2 control-label"># Componente</label>
      <div class="col-lg-10">
        <select class="form-control" name="componenteId" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
      </div>
    </div>


    <div class="form-group">
      <label for="inputValor" class="col-lg-2 control-label">Valor</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" name="valor" placeholder="0-4">
      </div>
    </div>


    <div class="form-actions">
      <div class="col-lg-10 col-lg-offset-2">
        <a class="btn btn-info" href="index.php">Regresar</a>
        <a type="reset" class="btn btn-default" href="evaluacion.php">Cancelar</a>
        <button type="submit" name="btn-submit" class="btn btn-primary" href="evaluacion.php">Enviar</button>
      </div>
    </div>
    </fieldset>
  </form>



</body>
</html>
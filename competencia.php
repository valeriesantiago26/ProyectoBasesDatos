
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
              <li><a href="index.php">Home </a></li>
              <li><a href="read_competencias.php">Competencias</a></li>
              <li><a href="read_centros.php">Centros de Práctica</a></li>
              <li><a href="read_maestros.php">Maestros Cooperadores</a></li>
              <li><a href="read_supervisores.php">Supervisores</a></li>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="create1.php">Nuevo Estudiante</a></li>
              <li class="active"><a href="competencia.php" > Nuevas Competencias <span class="sr-only">(current)</span></a></li>
            </ul>

            </ul>
          </div>
      </div>
    </nav> 

  <form class="form-horizontal" method="post" action="save_competencia.php">
  <fieldset>
    <legend>Competencias</legend>


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

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Descripción</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" name="competenciaDescripcion"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>


    <legend>Componentes</legend>

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
      <label for="textArea" class="col-lg-2 control-label">Descripción</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" name="componenteDescripcion"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>



    <div class="form-actions">
      <div class="col-lg-10 col-lg-offset-2">
        <a class="btn btn-info" href="index.php">Regresar</a>
        <a type="reset" class="btn btn-default" href="competencia.php">Cancelar</a>
        <button type="submit" name="btn-submit" class="btn btn-primary" href="competencia.php">Enviar</button>
      </div>
    </div>
    </fieldset>
  </form>



</body>
</html>
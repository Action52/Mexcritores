<?php
include('session.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de escritores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "../models/Book.php";
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Añadir escritor</h2>
            <form action="<?php echo Book::baseurl() ?>views/saveBook.php" method="POST">
                <div class="form-group">
                    <label for="titulo">titulo</label>
                    <input type="text" name="titulo" value="" class="form-control" id="titulo" placeholder="titulo">
                </div>
                 <div class="form-group">
                    <label for="id">Autor</label>
                    <select name="id" Id="id">
 <option value="">--- Select ---</option>
                    <?php

                    $conex = "host=localhost port=5432 dbname=mexcritoresp user=postgres password=";
                    $cnx = pg_connect($conex) or die ("<h1>Error de conexion.</h1> ". pg_last_error());
                

 $list = pg_query($cnx, "select * from escritor");

 while($row_list=pg_fetch_assoc($list)){
 ?>
 <option value=<?php echo $row_list['id']; ?>>
 <?php echo $row_list["nombre"]; ?>
  <?php echo " " ?> 
 <?php echo $row_list["apellidos"]; ?> 
 </option>
 <?php
 }
 ?>
 </select>
 


                    
                </div>
                <div class="form-group">
                    <label for="descripcion">descripcion</label>
                    <input type="text" name="descripcion" value="" class="form-control" id="descripcion" placeholder="descripcion">
                </div>
                <div class="form-group">
                    <label for="paginas">paginas</label>
                    <input type="int" name="paginas" value="" class="form-control" id="paginas" placeholder="paginas">
                </div>
                <div class="form-group">
                    <label for="genero">genero</label>
                    <input type="text" name="genero" value="" class="form-control" id="genero" placeholder="genero">
                </div>
                <div class="form-group">
                    <label for="url">url</label>
                    <input type="text" name="url" value="" class="form-control" id="url" placeholder="url">
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Guardar escritor" />
            </form>
        </div>
    </div>
</body>
</html>
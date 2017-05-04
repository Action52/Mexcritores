<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de lectores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "../models/Writer.php";
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Añadir escritor</h2>
            <form action="<?php echo Writer::baseurl() ?>app/savereader.php" method="POST">
                <div class="form-group">
                    <label for="nombrelec">nombre</label>
                    <input type="text" name="nombrelec" value="" class="form-control" id="nombrelec" placeholder="nombrelec">
                </div>
                <div class="form-group">
                    <label for="apellidos">apellidos</label>
                    <input type="text" name="apellidos" value="" class="form-control" id="apellidos" placeholder="apellidos">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" value="" class="form-control" id="email" placeholder="email">
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Guardar lector" />
            </form>
        </div>
    </div>
</body>
</html>
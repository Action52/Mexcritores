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
    require_once "../models/Writer.php";
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Añadir escritor</h2>
            <form action="<?php echo Writer::baseurl() ?>app/savewriter.php" method="POST">
                <div class="form-group">
                    <label for="nombre">nombre</label>
                    <input type="text" name="nombre" value="" class="form-control" id="nombre" placeholder="nombre">
                </div>
                <div class="form-group">
                    <label for="apellidos">apellidos</label>
                    <input type="text" name="apellidos" value="" class="form-control" id="apellidos" placeholder="apellidos">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" value="" class="form-control" id="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" value="" class="form-control" id="username" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" value="" class="form-control" id="password" placeholder="password">
                </div>
                <input type="submit" name="submit" class="btn btn-default" value="Guardar escritor" />
            </form>
        </div>
    </div>
</body>
</html>
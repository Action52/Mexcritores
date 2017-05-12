<?php
include('session.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de libros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "../models/Book.php";
    $id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
    if( ! $id )
    {
        header("Location:" . Books::baseurl() . "views/listBookss.php");
    }
    $db = new DatabasePsql;
    $dbm = new DatabaseMysql;
    $newUser = new Book($dbm,$db);
    $newUser->setId($id);
    $user = $newUser->get();
    $newUser->checkUser($user);
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Editar escritor:  <?php echo $user->titulo ?></h2>
            <form action="<?php echo Book::baseurl() ?>views/updateBooks.php" method="POST">
                <div class="form-group">
                    <label for="titulo">titulo</label>
                    <input type="text" name="titulo" value="<?php echo $user->titulo ?>" class="form-control" id="titulo" placeholder="titulo">
                </div>
                <div class="form-group">
                    <label for="descripcion">descripcion</label>
                    <input type="text" name="descripcion" value="<?php echo $user->descripcion ?>" class="form-control" id="descripcion" placeholder="descripcion">
                </div>
                <div class="form-group">
                    <label for="paginas">paginas</label>
                    <input type="int" name="paginas" value="<?php echo $user->paginas ?>" class="form-control" id="paginas" placeholder="paginas">
                </div>
                  <div class="form-group">
                    <label for="genero">genero</label>
                    <input type="text" name="genero" value="<?php echo $user->genero ?>" class="form-control" id="genero" placeholder="genero">
                </div>
                <div class="form-group">
                    <label for="url">url</label>
                    <input type="text" name="url" value="<?php echo $user->url ?>" class="form-control" id="url" placeholder="url">
                </div>
                <input type="hidden" name="username" value="<?php echo $user->username ?>" class="form-control" id="username" placeholder="">
                <input type="hidden" name="id" value="<?php echo $user->id ?>" />
                <input type="submit" name="submit" class="btn btn-default" value="Update user" />
            </form>
        </div>
    </div>
</body>
</html>
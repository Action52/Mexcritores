<?php
include('session.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de lectores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "../models/Reader.php";
    $id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
    if( ! $id )
    {
        header("Location:" . Reader::baseurl() . "app/listReaders.php");
    }
    $db = new DatabasePsql;
    $newUser = new Reader($db);
    $newUser->setId($id);
    $user = $newUser->get();
    $newUser->checkUser($user);
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Editar lector:  <?php echo $user->nombrelec ?></h2>
            <form action="<?php echo Reader::baseurl() ?>app/updateReader.php" method="POST">
                <div class="form-group">
                    <label for="nombrelec">nombre</label>
                    <input type="text" name="nombrelec" value="<?php echo $user->nombrelec ?>" class="form-control" id="nombrelec" placeholder="nombrelec">
                </div>
                <div class="form-group">
                    <label for="apellidos">apellidos</label>
                    <input type="text" name="apellidos" value="<?php echo $user->apellidos ?>" class="form-control" id="apellidos" placeholder="apellidos">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" value="<?php echo $user->email ?>" class="form-control" id="email" placeholder="email">
                </div>
                <input type="hidden" name="id" value="<?php echo $user->id ?>" />
                <input type="submit" name="submit" class="btn btn-default" value="Update user" />
            </form>
        </div>
    </div>
</body>
</html>
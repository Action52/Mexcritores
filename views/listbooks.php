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
        $db = new DatabasePsql;
        $dbm = new DatabaseMysql;
        $user = new Book($dbm,$db);
        $users = $user->get();
        ?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-center text-primary">Lista de libros</h2>
                <div class="col-lg-1 pull-right" style="margin-bottom: 10px">
                    <a class="btn btn-info" href="<?php echo Book::baseurl() ?>/views/addbook.php">Add user</a>
                </div>
                <?php
                if( ! empty( $users ) )
                {
                ?>
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>titulo</th>
                        <th>descripcion</th>
                        <th>paginas</th>
                        <th>genero</th>
                        <th>URL</th>
                    </tr>
                    <?php foreach( $users as $user )
                    {
                    ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->titulo ?></td>f
                            <td><?php echo $user->descripcion ?></td>
                            <td><?php echo $user->paginas ?></td>
                            <td><?php echo $user->genero ?></td>
                            <td><?php echo $user->url ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo Book::baseurl() ?>views/editbook.php?user=<?php echo $user->id ?>">Edit</a> 
                                <a class="btn btn-info" href="<?php echo Book::baseurl() ?>views/deletebook.php?user=<?php echo $user->id ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <?php
                }
                else
                {
                ?>
                <div class="alert alert-danger" style="margin-top: 100px">Any user has been registered</div>
                <?php
                }
                ?>
            </div>
        </div>

        <a href = "adminlanding.php">Go to index</a>
    </body>
</html>
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
        $db = new DatabasePsql;
        $dbm = new DatabaseMysql;
        $user = new Reader($dbm,$db);
        $users = $user->get();
        ?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-center text-primary">Lista de lectores</h2>
                <div class="col-lg-1 pull-right" style="margin-bottom: 10px">
                    <a class="btn btn-info" href="<?php echo Reader::baseurl() ?>/views/addReader.php">Add user</a>
                </div>
                <?php
                if( ! empty( $users ) )
                {
                ?>
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>E-mail</th>
                        <th>Username</th>
                    </tr>
                    <?php foreach( $users as $user )
                    {
                    ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->nombrelec ?></td>
                            <td><?php echo $user->apellidos ?></td>
                            <td><?php echo $user->email ?></td>
                            <td><?php echo $user->username ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo Reader::baseurl() ?>views/editReader.php?user=<?php echo $user->id ?>">Edit</a> 
                                <a class="btn btn-info" href="<?php echo Reader::baseurl() ?>views/deleteReader.php?user=<?php echo $user->username ?>">Delete</a>
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
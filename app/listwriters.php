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
        $db = new DatabasePsql;
        $user = new Writer($db);
        $users = $user->get();
        ?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-center text-primary">Lista de escritores</h2>
                <div class="col-lg-1 pull-right" style="margin-bottom: 10px">
                    <a class="btn btn-info" href="<?php echo Writer::baseurl() ?>/app/addwriter.php">Add user</a>
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
                        <th>Edad</th>
                        <th>Nacionalidad</th>
                    </tr>
                    <?php foreach( $users as $user )
                    {
                    ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->nombre ?></td>
                            <td><?php echo $user->apellidos ?></td>
                            <td><?php echo $user->email ?></td>
                            <td><?php echo $user->edad ?></td>
                            <td><?php echo $user->nacionalidad ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo Writer::baseurl() ?>app/editwriter.php?user=<?php echo $user->id ?>">Edit</a> 
                                <a class="btn btn-info" href="<?php echo Writer::baseurl() ?>app/deletewriter.php?user=<?php echo $user->id ?>">Delete</a>
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
    </body>
</html>
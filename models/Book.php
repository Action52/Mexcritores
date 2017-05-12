<?php
require_once("../database/DatabasePsql.php");
require_once("../database/DatabaseMysql.php");
require_once("../interfaces/IUser.php");

class Book implements IUser {
    private $con;
    private $con_m;
    private $id;
    private $titulo;
    private $autor;
    private $descripcion;
    private $paginas;
    private $genero;
    private $url;

    public function __construct(DatabaseMysql $dbm, DatabasePsql $db){
        $this->con = new $db;
        $this->con_m = new $dbm;
    }


    public function setId($id){
        $this->id = $id;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setPaginas($paginas){
        $this->paginas = $paginas;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function setUrl($url){
        $this->url = $url;
    }

    //insertamos libros en una tabla con postgreSql
    public function save() {
        try{
          //INSERT INTO libro (titulo,descripcion, paginas, genero, url) values ('Prueba','Prueba D',123,'Novela','books/prueba.pdf')
          //insercion en libro
            $query = $this->con->prepare('INSERT INTO libro (titulo,descripcion, paginas, genero, url) values (?,?,?,?,?)');
            $query->bindParam(1, $this->titulo, PDO::PARAM_STR);
            $query->bindParam(2, $this->descripcion, PDO::PARAM_STR);
            $query->bindParam(3, $this->paginas, PDO::PARAM_INT);
            $query->bindParam(4, $this->genero, PDO::PARAM_STR);
            $query->bindParam(5, $this->url, PDO::PARAM_STR);
            $query->execute();

            $latestBook = $this->con->lastInsertId('libro_id_seq');
           
            //insercion en libro_autor
            $query2 = $this->con->prepare('INSERT INTO escritor_libro(id_escritor,ref_libro) values (?,?)');
            $query2->bindParam(1, $this->autor, PDO::PARAM_INT);
            $query2->bindParam(2, $latestBook, PDO::PARAM_INT);
            

            $query2->execute();
            $this->con->close();


        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }





    public function update(){
        try{
            $query = $this->con->prepare('UPDATE libro SET titulo = ?, descripcion = ?, paginas = ?, genero = ?, url = ? WHERE id = ?');
            $query->bindParam(1, $this->titulo, PDO::PARAM_STR);
            $query->bindParam(2, $this->descripcion, PDO::PARAM_STR);
            $query->bindParam(3, $this->paginas, PDO::PARAM_STR);
            $query->bindParam(4, $this->genero, PDO::PARAM_INT);
            $query->bindParam(5, $this->url, PDO::PARAM_INT);
            $query->bindParam(6, $this->id, PDO::PARAM_INT);
            $query->execute();

            $this->con->close();
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public function updateWithData($new_name,$new_lastname,$new_mail, $u_name){
        try{
            $query = $this->con->prepare('UPDATE lector SET nombrelec = ?, apellidos = ?, email = ? WHERE username = ?');
            $query->bindParam(1, $new_name, PDO::PARAM_STR);
            $query->bindParam(2, $new_lastname, PDO::PARAM_STR);
            $query->bindParam(3, $new_mail, PDO::PARAM_STR);
            $query->bindParam(4, $u_name, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    //obtenemos usuarios de una tabla con postgreSql
    public function get(){
        try{
            if(is_int($this->id)){
                $query = $this->con->prepare('SELECT * FROM libro WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT * FROM libro');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }


    public function getAll(){
        try{
                $query = $this->con->prepare('SELECT * FROM libro');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public function delete(){
        try{
            $query = $this->con->prepare('DELETE FROM libro WHERE id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();

            return true;


        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public function deleteWithUsername($u_name){
        try{
            $query = $this->con->prepare('DELETE FROM lector WHERE username = ?');
            $query->bindParam(1, $u_name, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public function getMyBooks($u_name){
        try{
                $query1 = $this->con->prepare("SELECT id FROM lector WHERE username ='$u_name'");
                $query1->execute();
                $results = $query1->fetch();
                $myid = $results['id'];

                $query = $this->con->prepare("SELECT libro.id, libro.titulo, libro.url
                  FROM libro, lector_libro, lector
                  WHERE libro.id = lector_libro.ref_libro AND lector.id = lector_libro.id_lector AND lector_libro.id_lector = '$myid'");
                $query->execute();

                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public static function baseurl() {
         return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/Mexcritores/Mexcritores/";
    }

    public function checkUser($user) {
        if( ! $user ) {
            header("Location:" . Reader::baseurl() . "index.php");
        }
    }
}
?>
